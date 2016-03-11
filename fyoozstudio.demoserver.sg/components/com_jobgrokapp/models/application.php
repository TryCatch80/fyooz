<?php

/**
 *
 *
 * This is the application.php model for jobgrokapp
 *
 * Created: November 18, 2014, 3:25 am
 *
 * Subversion Details
 * $Date: 2014-10-28 20:11:56 -0500 (Tue, 28 Oct 2014) $
 * $Revision: 6468 $
 * $Author: bobsteen $
 *
 * @author TK Tek, LLC. info@jobgrok.com
 * @version 3.1-1.2.55
 * @package com_jobgrokapp
 *
 * @copyright Copyright {c} 2008-2014
 * @license GNU Public License Version 2
 *
 * This file is part of JobGrok.
 *
 * JobGrok is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 2 of the License, or
 * (at your option) any later version.
 *
 * JobGrok is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with JobGrok.  If not, see <http://www.gnu.org/licenses/>.
 *
 */

defined('_JEXEC') or die('Restricted access');
jimport('joomla.application.component.model');
jimport('joomla.html.html');
jimport('joomla.filesystem.folder');

JLoader::import('helpers.apphtml',JPATH_COMPONENT);

class JobgrokappModelApplication extends JModelLegacy

{
// give ourselves a private id member <<--- not used
    var $_id = null;
    // a private security token member
    var $_uid = null;
    // a private application object
    var $_application = null;
    // all of the options we use
    var $_options = null;
    // params - used for required fields
    var $_params = null;
    // notices from table check
    var $_notices = null;
    // required groups
    var $_req_personal = false;
    var $_req_education = false;
    var $_req_addresses = false;
    var $_req_employment = false;
    var $_req_employers = false;
    var $_req_skills = false;
    var $_req_references = false;
    // is retry
    var $_retry = null;
    var $_file_location = null;
    var $_folder_location = null;

    // our constructor, a little more interesting...
    function __construct()
    {
        parent :: __construct();

        // we're assuming that we'll only ever be pulling one row
        $id = JRequest :: getVar('id', 0);  // <<<<----- not used
        if ( strlen($id) == 30 ) // <<<<---- not so great solution here...
            $uid = JRequest :: getVar('id', 'none');
        else
            $uid = JRequest :: getVar('uid', 'none');

        // assuming we've got a valid id, let's initialize
        // as of Ver0.7.0 this should always be 0
        // $this->setId($id); // <<<<---- not used
        // if uid is set to something other than none,
        // we're displaying what was submitted
        if ( 'none' != $uid && '' != $uid )
        {
            $this->setUid($uid);
            $this->_query = $uid;
        }
        else
        {
            $this->generateUid();
            $this->_query = $this->_uid;
        }
    // make sure we init those options we'll need
    //$this->getOptions();
    }

    // if you don't understand what these methods are
    // close this file right now!
    function getUid()
    {
        return $this->_uid;
    }

    function getId()
    {
        return $this->_id;
    }

    function getParams()
    {
        return $this->_params;
    }


    // let's return a random uid and get application data
    // I'm thinking that application data isn't going to return
    // anything - ever...
    function generateUid($clear = true)
    {
        $this->_uid = $this->randomString(30);
        
        while($this->checkUid($this->_uid) > 0) { 
            $this->_uid = $this->randomString(30);            
        }
        
        if ($clear) $this->_application = null; // $this->getApplicationbyuid(); // <<<--- should probably just be null
        $this->_set('guid', $this->_uid);
        return $this->_uid;
    }
    
    function checkUid($uid, $field='uid') {
        $db = JFactory::getDbo();
        
        $sql = 'LOCK TABLES '.$db->quoteName('#__tst_jgapp_uids').' WRITE';
        $db->setQuery($sql);
        $db->Execute();
        
        $sql = 'SELECT COUNT('.$db->quoteName($field).') FROM '.
                    $db->quoteName('#__tst_jgapp_uids').' WHERE '.
                    $db->quoteName('uid').'='.$db->Quote($uid);
        $db->setQuery($sql);
        $val = $db->loadResult();
        if ($val == 0) {
            $sql = 'INSERT INTO '.$db->quoteName('#__tst_jgapp_uids').' ('.
                        $db->quoteName('uid').') VALUES ('.$db->Quote($uid).')';
            $db->setQuery($sql);
            $db->Execute();
        }
        
        $sql = 'UNLOCK TABLES';
        $db->setQuery($sql);
        $db->Execute();
        
        return $val;
    }

    // set our id and get application data
    function setId($id) // <<<--- this isn't used

    {
    // Set id and get data
        $this->_id = $id;
        $this->_application = $this->getApplication();
    }

    function setParams($params)
    {
        $this->_params = $params;
    }

    // to avoid others from pulling data we'll always use the uid
    function setUid($uid)
    {
        $this->_uid = $uid;
        $this->_application = $this->getApplicationbyuid();
    }

    function getNotices()
    {
        return $this->_notices;
    }
    
    function getSubmissionCount() {
        $app = JFactory::getApplication();
        $params = $app->getPageParameters();
        $my_field = $params->get('max_applicant_field','id');
        $db = $this->getDbo();
        $query = "select count(distinct ".$db->quoteName($my_field).") from ".$db->quoteName('#__tst_jgapp_applications')." where ".
                $db->quoteName('Itemid')."=".$db->Quote(JRequest::getVar('Itemid'));
        $db->setQuery($query);
        $val = $db->loadResult();
        return $val;
    }
    // get application for the set id
    function &getApplication() // <<<--- this isn't used

    {
        $db =$this->getDBO();
        $query = "SELECT * FROM ".$db->quoteName('#__tst_jgapp_applications')." WHERE ".$db->quoteName('id')." = ".$db->Quote($this->_id);
        $db->setQuery($query);
        $this->_application = $db->loadObject();
        return $this->_application;
    }

    // get application for the set uid
    function &getApplicationbyuid()
    {
        $db =$this->getDBO();
        

        $query = "SELECT * FROM ".$db->quoteName('#__tst_jgapp_applications')
                    ." WHERE "
                    .$db->quoteName('uid')." = ".$db->Quote($this->_uid)
                    ;

        if (JRequest::getVar('e') == '1') {
            $query = "SELECT * FROM ".$db->quoteName('#__tst_jgapp_applications')
                    ." WHERE "
                    .$db->quoteName('uid')." = ".$db->Quote(JRequest::getVar('uid'))
                    ." AND "
                    .$db->quoteName('email_uid')." = ".$db->Quote(JRequest::getVar('email_uid'));
        }
        

        $db->setQuery($query);
        $this->_application = $db->loadObject();

        if (!$this->_application)
        {

            $this->_application = $this->getTable();


            $this->_application->first_name = $this->_get('first_name');
            $this->_application->middle_name = $this->_get('middle_name');
            $this->_application->last_name = $this->_get('last_name');
            $this->_application->home_phone = $this->_get('home_phone');
            $this->_application->work_phone = $this->_get('work_phone');
            $this->_application->cell_phone = $this->_get('cell_phone');
            $this->_application->email_address = $this->_get('email_address');
            $this->_application->ssn = $this->_get('ssn');

            $this->_application->street = $this->_get('street');
            $this->_application->city = $this->_get('city');
            $this->_application->state = $this->_get('state');
            $this->_application->zip_code = $this->_get('zip_code');
            $this->_application->from_date = $this->_get('from_date');

            $this->_application->street1 = $this->_get('street1');
            $this->_application->city1 = $this->_get('city1');
            $this->_application->state1 = $this->_get('state1');
            $this->_application->zip_code1 = $this->_get('zip_code1');
            $this->_application->from_date1 = $this->_get('from_date1');
            $this->_application->to_date1 = $this->_get('to_date1');

            $this->_application->street2 = $this->_get('street2');
            $this->_application->city2 = $this->_get('city2');
            $this->_application->state2 = $this->_get('state2');
            $this->_application->zip_code2 = $this->_get('zip_code2');
            $this->_application->from_date2 = $this->_get('from_date2');
            $this->_application->to_date2 = $this->_get('to_date2');

            $this->_application->school = $this->_get('school');
            $this->_application->school_city = $this->_get('school_city');
            $this->_application->school_state = $this->_get('school_state');
            $this->_application->school_diploma = $this->_get('school_diploma');

            $this->_application->school1 = $this->_get('school1');
            $this->_application->school_city1 = $this->_get('school_city1');
            $this->_application->school_state1 = $this->_get('school_state1');
            $this->_application->school_diploma1 = $this->_get('school_diploma1');
            $this->_application->diploma_text1 = $this->_get('diploma_text1');
            $this->_application->study_area1 = $this->_get('study_area1');

            $this->_application->school2 = $this->_get('school2');
            $this->_application->school_city2 = $this->_get('school_city2');
            $this->_application->school_state2 = $this->_get('school_state2');
            $this->_application->school_diploma2 = $this->_get('school_diploma2');
            $this->_application->diploma_text2 = $this->_get('diploma_text2');
            $this->_application->study_area2 = $this->_get('study_area2');

            $this->_application->school3 = $this->_get('school3');
            $this->_application->school_city3 = $this->_get('school_city3');
            $this->_application->school_state3 = $this->_get('school_state3');
            $this->_application->school_diploma3 = $this->_get('school_diploma3');
            $this->_application->diploma_text3 = $this->_get('diploma_text3');
            $this->_application->study_area3 = $this->_get('study_area3');

            $this->_application->position = $this->_get('position');
            $this->_application->available_date = $this->_get('available_date');
            $this->_application->desired_pay = $this->_get('desired_pay');
            $this->_application->work_preferences = $this->_get('work_preferences');
            $this->_application->weekends = $this->_get('weekends');
            $this->_application->evenings = $this->_get('evenings');
            $this->_application->monday = $this->_get('monday');
            $this->_application->tuesday = $this->_get('tuesday');
            $this->_application->wednesday = $this->_get('wednesday');
            $this->_application->thursday = $this->_get('thursday');
            $this->_application->friday = $this->_get('friday');
            $this->_application->saturday = $this->_get('saturday');
            $this->_application->sunday = $this->_get('sunday');
            $this->_application->unavailability = $this->_get('unavailability');
            $this->_application->shiftwork = $this->_get('shiftwork');
            $this->_application->eligible = $this->_get('eligible');
            $this->_application->worked_here_before = $this->_get('worked_here_before');
            $this->_application->worked_here_text = $this->_get('worked_here_text');
            $this->_application->job_desc_received = $this->_get('job_desc_received');
            $this->_application->understand_reqs = $this->_get('understand_reqs');
            $this->_application->no_understand_reqs = $this->_get('no_understand_reqs');
            $this->_application->on_layoff = $this->_get('on_layoff');
            $this->_application->conf_agreement = $this->_get('conf_agreement');
            $this->_application->conf_explain = $this->_get('conf_explain');
            $this->_application->discharged = $this->_get('discharged');
            $this->_application->discharge_explain = $this->_get('discharge_explain');
            $this->_application->convict = $this->_get('convict');
            $this->_application->convict_explain = $this->_get('convict_explain');
            $this->_application->contact_emp = $this->_get('contact_emp');
            $this->_application->family = $this->_get('family');
            $this->_application->family_explain = $this->_get('family_explain');

            $this->_application->employer = $this->_get('employer');
            $this->_application->employer_city = $this->_get('employer_city');
            $this->_application->employer_state = $this->_get('employer_state');
            $this->_application->employer_zip = $this->_get('employer_zip');
            $this->_application->employer_phone = $this->_get('employer_phone');
            $this->_application->employer_pos = $this->_get('employer_pos');
            $this->_application->employer_from = $this->_get('employer_from');
            $this->_application->employer_to = $this->_get('employer_to');
            $this->_application->employer_pay = $this->_get('employer_pay');
            $this->_application->employer_sup = $this->_get('employer_sup');
            $this->_application->employer_dut = $this->_get('employer_dut');
            $this->_application->employer_leave = $this->_get('employer_leave');

            $this->_application->employer1 = $this->_get('employer1');
            $this->_application->employer1_city = $this->_get('employer1_city');
            $this->_application->employer1_state = $this->_get('employer1_state');
            $this->_application->employer1_zip = $this->_get('employer1_zip');
            $this->_application->employer1_phone = $this->_get('employer1_phone');
            $this->_application->employer1_pos = $this->_get('employer1_pos');
            $this->_application->employer1_from = $this->_get('employer1_from');
            $this->_application->employer1_to = $this->_get('employer1_to');
            $this->_application->employer1_pay = $this->_get('employer1_pay');
            $this->_application->employer1_sup = $this->_get('employer1_sup');
            $this->_application->employer1_dut = $this->_get('employer1_dut');
            $this->_application->employer1_leave = $this->_get('employer1_leave');

            $this->_application->employer2 = $this->_get('employer2');
            $this->_application->employer2_city = $this->_get('employer2_city');
            $this->_application->employer2_state = $this->_get('employer2_state');
            $this->_application->employer2_zip = $this->_get('employer2_zip');
            $this->_application->employer2_phone = $this->_get('employer2_phone');
            $this->_application->employer2_pos = $this->_get('employer2_pos');
            $this->_application->employer2_from = $this->_get('employer2_from');
            $this->_application->employer2_to = $this->_get('employer2_to');
            $this->_application->employer2_pay = $this->_get('employer2_pay');
            $this->_application->employer2_sup = $this->_get('employer2_sup');
            $this->_application->employer2_dut = $this->_get('employer2_dut');
            $this->_application->employer2_leave = $this->_get('employer2_leave');

            $this->_application->employer3 = $this->_get('employer3');
            $this->_application->employer3_city = $this->_get('employer3_city');
            $this->_application->employer3_state = $this->_get('employer3_state');
            $this->_application->employer3_zip = $this->_get('employer3_zip');
            $this->_application->employer3_phone = $this->_get('employer3_phone');
            $this->_application->employer3_pos = $this->_get('employer3_pos');
            $this->_application->employer3_from = $this->_get('employer3_from');
            $this->_application->employer3_to = $this->_get('employer3_to');
            $this->_application->employer3_pay = $this->_get('employer3_pay');
            $this->_application->employer3_sup = $this->_get('employer3_sup');
            $this->_application->employer3_dut = $this->_get('employer3_dut');
            $this->_application->employer3_leave = $this->_get('employer3_leave');

            $this->_application->driver_license = $this->_get('driver_license');
            $this->_application->dl_number = $this->_get('dl_number');
            $this->_application->dl_issued = $this->_get('dl_issued');
            $this->_application->driving_offense = $this->_get('driving_offense');
            $this->_application->driving_offense_reason = $this->_get('driving_offense_reason');
            $this->_application->dl_modified = $this->_get('dl_modified');
            $this->_application->dl_modified_reason = $this->_get('dl_modified_reason');
            $this->_application->dl_states = $this->_get('dl_states');
            $this->_application->skills = $this->_get('skills');
            $this->_application->professional = $this->_get('professional');

            $this->_application->ref1_name = $this->_get('ref1_name');
            $this->_application->ref1_address = $this->_get('ref1_address');
            $this->_application->ref1_telephone = $this->_get('ref1_telephone');
            $this->_application->ref1_relationship = $this->_get('ref1_relationship');
            $this->_application->ref1_years = $this->_get('ref1_years');

            $this->_application->ref2_name = $this->_get('ref2_name');
            $this->_application->ref2_address = $this->_get('ref2_address');
            $this->_application->ref2_telephone = $this->_get('ref2_telephone');
            $this->_application->ref2_relationship = $this->_get('ref2_relationship');
            $this->_application->ref2_years = $this->_get('ref2_years');

            $this->_application->ref3_name = $this->_get('ref3_name');
            $this->_application->ref3_address = $this->_get('ref3_address');
            $this->_application->ref3_telephone = $this->_get('ref3_telephone');
            $this->_application->ref3_relationship = $this->_get('ref3_relationship');
            $this->_application->ref3_years = $this->_get('ref3_years');

            $this->_application->ref4_name = $this->_get('ref4_name');
            $this->_application->ref4_address = $this->_get('ref4_address');
            $this->_application->ref4_telephone = $this->_get('ref4_telephone');
            $this->_application->ref4_relationship = $this->_get('ref4_relationship');
            $this->_application->ref4_years = $this->_get('ref4_years');

            $this->_application->text_resume = $this->_get('text_resume');
            $this->_application->file_name = $this->_get('file_name');
            $this->_application->signature = $this->_get('signature');
            $this->_application->referral_id = $this->_get('referral_id');
            $this->_application->lists = $this->_get('lists');
            
            if ($this->_get('retry') == 'retry')
                $this->_retry = true;
            else
                $this->_retry = false;
            
            if ($this->_get('req_personal')) $this->_req_personal = true;
            if ($this->_get('req_education')) $this->_req_education = true;
            if ($this->_get('req_addresses')) $this->_req_addresses = true;
            if ($this->_get('req_employment')) $this->_req_employment = true;
            if ($this->_get('req_employers')) $this->_req_employers = true;
            if ($this->_get('req_skills')) $this->_req_skills = true;
            if ($this->_get('req_references')) $this->_req_references = true;
        }

        $this->_application->flag_fields = explode("|", $this->_get('flag_fields'));
        
        return $this->_application;
    }

    function &getRetry()
    {
        return $this->_retry;
    }
    
    function getRequiredgroups() {
        $val = array( 'req_personal' => $this->_req_personal,
                        'req_education' => $this->_req_education,
                        'req_addresses' => $this->_req_addresses,
                        'req_employment' => $this->_req_employment,
                        'req_employers' => $this->_req_employers,
                        'req_skills' => $this->_req_skills,
                        'req_references' => $this->_req_references);
        return $val;
    }

    function _get($field_name,$default=null,$type='string')
    {
        $session = JFactory::getSession();

        switch($type)
        {
            case 'string':
                $value = $session->get($field_name,$default,'application');
                break;
            case 'int':
                $value = (int)$session->get($field_name,$default,'application');
                break;
        }
        $session->clear($field_name,'application');

        return $value;
    }
    
    function _set($field_name,$value)
    {
        $session = JFactory::getSession();
        $session->set($field_name,$value,'application');
    }

/*
    function uidExists($uid)
    {
        $db = JFactory::DBO();
        $query = "SELECT COUNT(*) as qty FROM ".$db->quoteName('#__tst_jgapp_applications')." WHERE ".$db->quoteName('uid')." = ".$db->Quote($this->_uid);
        $db->setQuery($query);
        $result = $db->loadResult();
        return $result;
    }
*/

    function getCustomRedirect() {
        $redirect = $this->_params->get('custom_redirect',JURI::root().'the-team/#email_address');
		
        return $redirect;
    }
    
    function store()
    {

        // setting $row to the pulled data
        $row =$this->getTable();
        // getting any posted data
        $data = JRequest :: get('post');

        if (isset($data['lists'])) { $data['lists'] = json_encode($data['lists']); }
        
        // Bind the form fields to the application table
        if (!$row->bind($data))
        {
            $this->setError($this->_db->getErrorMsg());
            return false;
        }
        if (!$row->uid) $row->uid = $this->_get('guid');
        
        $inprogress = $this->_params->get('default_appstatus_inprogress','1');
        $status = JRequest::getVar('status');
        // Make sure the application record is valid
        if (!$row->check($status!=$inprogress?$this->_params:null))
        {
            $this->_notices = $row->getNotices();
            $this->setError($this->_db->getErrorMsg());
            return false;
        }

        $timenow = new JDate();
        $mysqlTime = JHTML::_('date', $timenow,"Y-m-d G:i:s");
        //if (!$row->create_date) $row->create_date = date('Y-m-d H:i:s');
        if (!$row->create_date) $row->create_date = $mysqlTime;
        $row->email_uid = $this->randomString(30);
        $row->NextItemid = (int)$this->getWorkflow($row);
        $row->parent_id = (int)$this->_get("parent_id");
        $row->level = (int)$this->_get("level"); $level = $row->level + 1;
        // Store the web link table to the database
        if (!$row->store())
        {
            $this->setError($this->_db->getErrorMsg());
            return false;
        }
        if (!$this->upload($this->_uid)) {
            $this->setError(JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_ERROR_UPLOADING_FILE'));
            return false;
        }
        if ($this->_params->get('personal_photo','1') == '0') {
            if (!$this->uploadPhoto($this->_uid)) {
                $this->setError(JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_ERROR_UPLOADING_PHOTO'));
                return false;
            }
        }
        
        $this->notify($row);
		
        //if ($this->_folder_location)
        //{
        //    JFolder::delete($this->_folder_location);
        //    $this->_folder_location = null;
        //}
        
        $app = JFactory::getApplication();
        if (is_array($this->_file_location)) {
            foreach ($this->_file_location as $f) {
                if (JFile::exists($f)) JFile::delete($f);
            }
            foreach ($this->_folder_location as $f) {
                if (JFolder::exists($f)) JFolder::delete($f);        
            }
        } else {
            if (isset($this->_file_location) && JFile::exists($this->_file_location)) JFile::delete($this->_file_location);
            if (isset($this->_folder_location) && JFolder::exists($this->_folder_location)) JFolder::delete($this->_folder_location);        
        }
        
        if ($row->parent_id != 0) {
            $this->setChildOnParent((int)$row->parent_id, (int)$row->id);
        }
        
        if ($row->NextItemid != 0) {
            $this->_set("level", $level);
            $this->_set("parent_id", $row->id); 
            $this->_set("NextItemid", $row->NextItemid);
        } else {
            $this->_set("level",0);
            $this->_set("parent_id", 0);
            $this->_set("NextItemid", 0);
        }
        
        return true;
    }
    
    function setChildOnParent($parent_id, $child_id) {
        
        $table = JTable::getInstance('application','Table');
        if (!$table->load((int)$parent_id)) return false;
        
        $table->set('child_id',(int)$child_id);
        if (!$table->store(true)) return false;
        
        return true;
    }
    
    function getWorkflow($row) {
        
        $params = JComponentHelper::getParams('com_jobgrokapp');
        $wf_active = $params->get('wf_active','0');
        $wf_conditions = $params->get('wf_conditions','');

        if ($wf_active == '1') {
            $eq = $this->getEquations($wf_conditions, $row);
            foreach ($eq as $condition) {
                $new_ors = null;
                foreach ($condition['Equations'] as $ors) {
                    $new_ands = null;
                    foreach ($ors as $ands) {
                        $new_ands[] = ($this->checkCondition($ands, $row)?'true':'false');
                    }
                    $converted = null;
                    $converted = implode(' && ',$new_ands);
                    $new_ors[] = ($this->getTruthValue($converted)?'true':'false');
                }
                $converted = null;
                $converted = implode(' || ',$new_ors);
                $cTrue = ($this->getTruthValue($converted));
                if ($cTrue) return $condition['ItemId'];
            }
            /*
            $conditions = explode("\n",$wf_conditions);
            foreach ($conditions as $condition) {
                $c = explode(":",$condition);
                $cTrue = $this->checkCondition($c[1],$row);
                if ($cTrue) return $c[0]; // to Form ItemId
            }
            */
        }
        return false;
    }
       
    function getEquations($text) {
        $lines = explode("\n", $text);
        $count = -1;
        $booleanExpression = null;
        foreach ($lines as $line) {
            if (strpos($line, ":") !== false) {
                $count++;
                $l = explode(":", $line);
                if (count($l) == 2) {
                    $booleanExpression[$count]['ItemId'] = $l[0];
                    $booleanExpression[$count]['Equations'][] = $this->getEquationAND($l[1]);
                }
            } else {
                if ($count == -1)
                    return false;
                $booleanExpression[$count]['Equations'][] = $this->getEquationAND($line);
            }
        }    
        return $booleanExpression;
    }

    function getEquationAND($text) {
        $l = explode("AND", $text);
        $lines = null;
        foreach ($l as $line) {
            $lines[] = trim($line);
        }
        return $lines;
    }

    function getTruthValue($tv) {
        // YES! This is using 'eval' but the equation is made by us so we're safe!
        return eval('return '.$tv.';');
    }
    
    function checkCondition($c, $row) {
        
        $statement = explode(" ",$c);
        if (count($statement) != 3) return false;
        
        $c_field = trim($statement[0]);
        $c_op = trim($statement[1]);
        $c_value = trim($statement[2]);
        
        $value = false;
                
        switch ($c_op) {
            case "eq":
                if (strtoupper($row->$c_field) === strtoupper($c_value)) $value = true;
                break;
            case "ne":
                if (strtoupper($row->$c_field) !== strtoupper($c_value)) $value = true;
                break;
            default:
                $value = false;
                break;
        }
        
        return $value;
    }

    function uploadFile($uid,$userfile,$constraints) {

        if (!is_array($userfile)) return true;
        if ($userfile['tmp_name'] == '') return true;

        $max_size = $constraints['max_size']; // $this->_params->get('file_upload_max_size','1048576');
        $allowed_types = explode(',', $constraints['allowed_types']); // $this->_params->get('file_upload_types','doc,docx,pdf,txt'));
        $mime_types = $constraints['mime_types']; // $this->_params->get('file_mime_types');
        $restrict_by_mime = $constraints['restrict_by_mime']; $this->_params->get('file_restrict_by_mimetype','0');
        
        $app = JFactory::getApplication();

        // get mime type
        if (function_exists('finfo_file')) {
            $finfo = finfo_open(FILEINFO_MIME);
            $mimetype = finfo_file($finfo, $userfile['tmp_name']);
            finfo_close($finfo);
        } elseif (function_exists('mime_content_type')) {
            $mimetype = mime_content_type($userfile['tmp_name']);
        } else {
            $mimetype = $userfile['type'];
        }

        if ($userfile['size'] < 1) return true;

        if ($userfile['error']) { // set error message
            $app->enqueueMessage(JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_UPLOAD_ERROR_OCCURED_ERROR_CODE_').$userfile['error']);
            return false;
        }

        if ($userfile['size'] > $max_size) { // file to large!
            $app->enqueueMessage(JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_FILE_SIZE_TOO_LARGE_JOOMLA_COMPONENT_FILE_SIZE_RESTRICTION'));
            return false;
        }

        if ($userfile['size'] > $this->getMaxUploadSizeInBytes()) { // file to large - PHP setting
            $app->enqueueMessage(JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_FILE_SIZE_TOO_LARGE_RESTRICTED_BY_SERVER_SETTINGS'));
            return false;
        }

        if ((boolean)ini_get('file_uploads') == false) { // file uploads not enabled in php
            $app->enqueueMessage(JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_FILE_UPLOADS_NOT_PERMITTED_RESTRICTED_BY_SERVER_SETTINGS'));
            return false;
        }

        if (!is_uploaded_file($userfile['tmp_name'])) { // set error message to handle potential attack
            $app->enqueueMessage(JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_FILE_UPLOAD_INVALID_SUSPECTED_FILE_TAMPERING'));
            return false;
        }

        $extension = JFile::getExt($userfile['name']);
        if (!in_array($extension,$allowed_types)) { // set error message - bad type
            $app->enqueueMessage(JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_FILE_TYPE_NOT_VALID_RESTRICTED_BY_JOOMLA_COMPONENT_SETTINGS'));
            return false;
        }

        if ($restrict_by_mime == '1') {
            if (!in_array($mimetype,$mime_types)) { // set error - not allowed mime type
                $app->enqueueMessage(JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_MIME_TYPE_INVALID_RESTRICTED_BY_JOOMLA_COMPONENT_SETTINGS'));
                return false;
            }
        }

        $config = JFactory::getConfig();
        $folderPath = $config->get('tmp_path').DIRECTORY_SEPARATOR.JFile::getName($userfile['tmp_name']).'_tmp';
        JFolder::create($folderPath);
        $fileDest = $folderPath.DIRECTORY_SEPARATOR.$userfile['name'];

        $uploaded = JFile::upload($userfile['tmp_name'], $fileDest);
        $content = JFile::read($fileDest);
        
        $this->_folder_location[] = $folderPath;
        $this->_file_location[] = $fileDest;

        // At this point we have file content
        // Need to insert file content into table
        $db = $this->getDBO();

        // new file
        /*
        $query = "DELETE FROM ".$db->quoteName('#__tst_jgapp_uploads'). " WHERE ".
            $db->quoteName('uid')."=".$db->Quote($uid);
        $db->setQuery($query);$db->Query();;
         *
         */

        $query = "INSERT INTO " .$db->quoteName('#__tst_jgapp_uploads'). " ( " .
            $db->quoteName('uid') . ", " .
            $db->quoteName('name') . ", " .
            $db->quoteName('type') . ", " .
            $db->quoteName('size') . ", " .
            $db->quoteName('content') . " ) VALUES ( " .
            $db->Quote($uid)." , ".
            $db->Quote($userfile['name']).", ".
            $db->Quote($userfile['type']).", ".
            $userfile['size'].", ".$db->Quote($content)." )";
        $db->setQuery($query);$db->Query();;
        
        return true;
        
    }
    
    function uploadMultiples($uid) {

        $this->_folder_location = null;
        $this->_file_location = null;
        
        $db = $this->getDBO();
        $query = "DELETE FROM ".$db->quoteName('#__tst_jgapp_uploads'). " WHERE ".
            $db->quoteName('uid')."=".$db->Quote($uid);
        $db->setQuery($query);$db->Query();;
        
        $jinput = JFactory::getApplication()->input;
        $userfiles = $jinput->files->get('jform');
        
        $count = 0;
        
        $files_file_upload_max_size = explode("|", $this->_params->get('file_upload_max_size','1045876'));
        $files_file_upload_types = explode("|", str_replace(' ','',$this->_params->get('file_upload_types','doc,docx,pdf,txt')));
        $files_mime_types = explode("|", str_replace(' ','',$this->_params->get('file_mime_types')));
        $files_restrict_by_mime = $this->_params->get('file_restrict_by_mimetype','0');
        
        foreach ($userfiles['file_name'] as $userfile) {
            if (!$this->uploadFile($uid, $userfile, array('max_size' => $files_file_upload_max_size[$count],
                                               'allowed_types' => $files_file_upload_types[$count],
                                               'mime_types' => $files_mime_types[$count],
                                               'restrict_by_mime' => $files_restrict_by_mime))) return false;
            $count++;
        }
        
        return true;
    }
    
   function uploadPhoto($uid = null)
    {
	$app = JFactory::getApplication();	
        $userfile = JRequest::getVar('photo',null,'files','array');
        
        $max_size = $this->_params->get('personal_photo_maxupload','1048576');
        $allowed_types = explode(',',$this->_params->get('personal_photo_extension','png,jpg,jpeg,gif'));
        $mime_types = explode(",",$this->_params->get('personal_photo_mimetypes','image/png,image/jpeg,image/gif'));

        // get mime type
        if (function_exists('finfo_file')) {
            $finfo = finfo_open(FILEINFO_MIME);
            $mimetype = finfo_file($finfo, $userfile['tmp_name']);
            finfo_close($finfo);
        } elseif (function_exists('mime_content_type')) {
            $mimetype = mime_content_type($userfile['tmp_name']);
        } else {
            $mimetype = $userfile['type'];
        }
        if (strpos($mimetype,";") !== false) { $s = explode(";",$mimetype); $mimetype = $s[0]; }
        //$app->enqueueMessage('Mime type found: '.$mimetype);

        if ($userfile['size'] < 1) return true;

        if ($userfile['error']) { // set error message
            $app->enqueueMessage(JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_UPLOAD_ERROR_OCCURED_ERROR_CODE_').$userfile['error']);
            return false;
        }

        if ($userfile['size'] > $max_size) { // file to large!
            $app->enqueueMessage(JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_FILE_SIZE_TOO_LARGE_JOOMLA_COMPONENT_FILE_SIZE_RESTRICTION'));
            return false;
        }

        if ($userfile['size'] > $this->getMaxUploadSizeInBytes()) { // file to large - PHP setting
            $app->enqueueMessage(JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_FILE_SIZE_TOO_LARGE_RESTRICTED_BY_SERVER_SETTINGS'));
            return false;
        }

        if ((boolean)ini_get('file_uploads') == false) { // file uploads not enabled in php
            $app->enqueueMessage(JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_FILE_UPLOADS_NOT_PERMITTED_RESTRICTED_BY_SERVER_SETTINGS'));
            return false;
        }
		
        if (!is_uploaded_file($userfile['tmp_name'])) { // set error message to handle potential attack
            $app->enqueueMessage(JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_FILE_UPLOAD_INVALID_SUSPECTED_FILE_TAMPERING'));
	    return false;
    	}

        $extension = JFile::getExt($userfile['name']);
        if (!in_array($extension,$allowed_types)) { // set error message - bad type
            $app->enqueueMessage(JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_FILE_TYPE_NOT_VALID_RESTRICTED_BY_COMPONENT_SETTINGS'));
            return false;
        }

        if (!in_array($mimetype,$mime_types)) { // set error - not allowed mime type
            $app->enqueueMessage(JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_MIME_TYPE_INVALID_RESTRICTED_BY_COMPONENT_SETTINGS'));
            return false;
        }

        $config = JFactory::getConfig();
        $folderPath = $config->get('tmp_path').DIRECTORY_SEPARATOR.JFile::getName($userfile['tmp_name']).'_tmp';
	JFolder::create($folderPath);
	$fileDest = $folderPath.DIRECTORY_SEPARATOR.$userfile['name'];
        $uploaded = JFile::upload($userfile['tmp_name'], $fileDest);
		
        switch ($mimetype) {
                case "image/png":
                        $src_image = imagecreatefrompng($fileDest);
                        break;
                case "image/jpg":
                case "image/pjpeg":
                case "image/jpeg":
                        $src_image = imagecreatefromjpeg($fileDest);
                        break;
                case "image/gif":
                        $src_image = imagecreatefromgif($fileDest);
                        break;
        }

        list($width,$height) = getimagesize($fileDest);
        //$app->enqueueMessage("Old Dimensions: $width x $height\n");

        //file_put_contents('php://stderr',"File Dimensions: $width x $height\n");

        $newheight = 100*3;
        $newwidth = ($width*$newheight)/$height;
        //$app->enqueueMessage("New Dimensions: $newwidth x $newheight\n");
        $tmp_image = imagecreatetruecolor($newwidth,$newheight);
        imagecopyresampled($tmp_image,$src_image,0,0,0,0,$newwidth,$newheight,$width,$height);

        switch ($mimetype) {
                case "image/png":
                        imagepng($tmp_image,$fileDest);
                        break;
                case "image/jpg":
                case "image/pjpeg":
                case "image/jpeg":
                        imagejpeg($tmp_image,$fileDest);
                        break;
                case "image/gif":
                        imagegif($tmp_image,$fileDest);
                        break;
        }

        //imagedestroy($tmp_image); imagedestroy($src_image);
        //file_put_contents('php://stderr',"Reading file: ".$fileDest."\n");
        //$app->enqueueMessage("Reading: ".$fileDest);	
        $content = JFile::read($fileDest);
		
        $this->_folder_location = $folderPath;
        $this->_file_location = $fileDest;

        // At this point we have file content
        // Need to insert file content into table
        $db = $this->getDBO();

        // new file
        $query = "DELETE FROM ".$db->quoteName('#__tst_jgapp_photos'). " WHERE ".
            $db->quoteName('uid')."=".$db->Quote($uid);
        $db->setQuery($query);$db->Query();;

        $query = "INSERT INTO " .$db->quoteName('#__tst_jgapp_photos'). " ( " .
            $db->quoteName('uid') . ", " .
            $db->quoteName('name') . ", " .
            $db->quoteName('type') . ", " .
            $db->quoteName('size') . ", " .
            $db->quoteName('content') . " ) VALUES ( " .
            $db->Quote($uid)." , ".
            $db->Quote($userfile['name']).", ".
            $db->Quote($userfile['type']).", ".
            //$userfile['size'].", ".$db->Quote($content)." )";
			strlen($content).", ".$db->Quote($content)." )";
        $db->setQuery($query);$db->Query();;
        
        return true;
    }

    function getImageSrcHTML($uid=null) {
        
        if($uid) {
            $db = JFactory::getDbo();
            $query = "SELECT `name`, `type`, `content` FROM #__tst_jgapp_photos WHERE uid='".$uid."'";
            $db->setQuery($query);
            if ($result = $db->loadObject()) {
                // base64 encode the binary data, then break it
                // into chunks according to RFC 2045 semantics
                $base64 = chunk_split(base64_encode($result->content));
                $tag = '<img ' .
                    'src="data:'.$result->type.';base64,' . $base64 .
                    '" alt="'.$result->name.'" />';
                return $tag;
            }
        } 
        return "";

    }
    
    function upload($uid = null)
    {
        $upload_count = (int)$this->_params->get('file_upload_count','1');
        if ($upload_count > 1) {
            return $this->uploadMultiples($uid);
        }
        
        $userfile = JRequest::getVar('file_upload',null,'files','array');
        if (!is_array($userfile)) return true;
        if ($userfile['tmp_name'] == '') return true;

        $max_size = $this->_params->get('file_upload_max_size','1048576');
        $allowed_types = explode(',',$this->_params->get('file_upload_types','doc,docx,pdf,txt'));
        $mime_types = $this->_params->get('file_mime_types');
        $restrict_by_mime = $this->_params->get('file_restrict_by_mimetype','0');
        
        $app = JFactory::getApplication();

        // get mime type
        if (function_exists('finfo_file')) {
            $finfo = finfo_open(FILEINFO_MIME);
            $mimetype = finfo_file($finfo, $userfile['tmp_name']);
            finfo_close($finfo);
        } elseif (function_exists('mime_content_type')) {
            $mimetype = mime_content_type($userfile['tmp_name']);
        } else {
            $mimetype = $userfile['type'];
        }

        if ($userfile['size'] < 1) return true;

        if ($userfile['error']) { // set error message
            $app->enqueueMessage(JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_UPLOAD_ERROR_OCCURED_ERROR_CODE_').$userfile['error']);
            return false;
        }
        /*
        if ($userfile['size'] < 1) {
            $app->enqueueMessage(JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_FILE_SIZE_APPEARS_TO_BE_0_BYTES_UPLOAD_ABORTED'));
            return false;
        }
        */
        if ($userfile['size'] > $max_size) { // file to large!
            $app->enqueueMessage(JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_FILE_SIZE_TOO_LARGE_JOOMLA_COMPONENT_FILE_SIZE_RESTRICTION'));
            return false;
        }

        if ($userfile['size'] > $this->getMaxUploadSizeInBytes()) { // file to large - PHP setting
            $app->enqueueMessage(JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_FILE_SIZE_TOO_LARGE_RESTRICTED_BY_SERVER_SETTINGS'));
            return false;
        }

        if ((boolean)ini_get('file_uploads') == false) { // file uploads not enabled in php
            $app->enqueueMessage(JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_FILE_UPLOADS_NOT_PERMITTED_RESTRICTED_BY_SERVER_SETTINGS'));
            return false;
        }

        if (!is_uploaded_file($userfile['tmp_name'])) { // set error message to handle potential attack
            $app->enqueueMessage(JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_FILE_UPLOAD_INVALID_SUSPECTED_FILE_TAMPERING'));
            return false;
        }

        $extension = JFile::getExt($userfile['name']);
        if (!in_array($extension,$allowed_types)) { // set error message - bad type
            $app->enqueueMessage(JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_FILE_TYPE_NOT_VALID_RESTRICTED_BY_JOOMLA_COMPONENT_SETTINGS'));
            return false;
        }

        if ($restrict_by_mime == '1') {
            if (!in_array($mimetype,$mime_types)) { // set error - not allowed mime type
                $app->enqueueMessage(JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_MIME_TYPE_INVALID_RESTRICTED_BY_JOOMLA_COMPONENT_SETTINGS'));
                return false;
            }
        }

        $config = JFactory::getConfig();
        $folderPath = $config->get('tmp_path').DIRECTORY_SEPARATOR.JFile::getName($userfile['tmp_name']).'_tmp';
        JFolder::create($folderPath);
        $fileDest = $folderPath.DIRECTORY_SEPARATOR.$userfile['name'];

        $uploaded = JFile::upload($userfile['tmp_name'], $fileDest);
        $content = JFile::read($fileDest);

        $this->_folder_location = $folderPath;
        $this->_file_location = $fileDest;

        // At this point we have file content
        // Need to insert file content into table
        $db = $this->getDBO();

        // new file
        $query = "DELETE FROM ".$db->quoteName('#__tst_jgapp_uploads'). " WHERE ".
            $db->quoteName('uid')."=".$db->Quote($uid);
        $db->setQuery($query);$db->Query();;

        $query = "INSERT INTO " .$db->quoteName('#__tst_jgapp_uploads'). " ( " .
            $db->quoteName('uid') . ", " .
            $db->quoteName('name') . ", " .
            $db->quoteName('type') . ", " .
            $db->quoteName('size') . ", " .
            $db->quoteName('content') . " ) VALUES ( " .
            $db->Quote($uid)." , ".
            $db->Quote($userfile['name']).", ".
            $db->Quote($userfile['type']).", ".
            $userfile['size'].", ".$db->Quote($content)." )";
        $db->setQuery($query);$db->Query();;

        //if ($params->get('email_include_filelink','0')!='2') {
        //    if (JFile::exists($fileDest)) JFile::delete($fileDest);
        //    if (JFolder::exists($folderPath)) JFolder::delete($folderPath);
        //}
        
        return true;

    }

    function isUploaded($uid) {
        $db = JFactory::getDBO();
        $query = "select count(*) from #__tst_jgapp_uploads where uid=".$db->Quote($uid);
        $db->setQuery($query);
        $result = $db->loadResult();
        return ($result>0?true:false);
    }
    
    function getAppOutput(&$data,$isHTML=true)
    {
        $params = JComponentHelper::getParams('com_jobgrokapp');

        $menuitemid = JRequest::getInt('Itemid');
        if ($menuitemid)
        {
            $app = JFactory::getApplication();
            $menu = $app->getMenu();
            $menuparams = $menu->getParams($menuitemid);
            $params->merge($menuparams);
        }

        $apphtml = new appHTML();
        $apphtml->setHTML($isHTML);
        if ($isHTML) $result = '<table>';

			//$result .= $apphtml->outTitle($data->first_name." ".$data->last_name." - ".$params->get('title'));
			$result .= "Dear Admin <br /><br />";
			$result .= "You received new application from ".$data->first_name;
        if ($isHTML) $result .= $this->getImageSrcHTML($this->_uid);
        if ($params->get('personal_information','1') == '1')
        {
            $result .= $apphtml->outHeader(JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_PERSONAL_INFORMATION'));
            if ($params->get('personal_information_first_name','1') == '1')
                $result .= $apphtml->outCombo(JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_FIRST_NAME'),$data->first_name);
            if ($params->get('personal_information_middle_name','1') == '1')
                $result .= $apphtml->outCombo(JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_MIDDLE_NAME'),$data->middle_name);
            if ($params->get('personal_information_last_name','1') == '1')
                $result .= $apphtml->outCombo(JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_LAST_NAME'),$data->last_name);
            if ($params->get('personal_information_home_phone','1') == '1')
                $result .= $apphtml->outCombo(JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_HOME_PHONE'),$data->home_phone);
            if ($params->get('personal_information_work_phone','1') == '1')
                $result .= $apphtml->outCombo(JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_WORK_PHONE'),$data->work_phone);
            if ($params->get('personal_information_cell_phone','1') == '1')
                $result .= $apphtml->outCombo(JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_CELL_PHONE'),$data->cell_phone);
            if ($params->get('personal_information_email_address','1') == '1')
                $result .= $apphtml->outCombo(JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_EMAIL_ADDRESS'),$data->email_address);
            if ($params->get('personal_information_ssn','1') == '1') 
                $result .= $apphtml->outCombo(JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_SSN'),$data->ssn);
        }
		
		$result .= $apphtml->outCombo(JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_INTEREST'),nl2br($data->interest));
		$result .= $apphtml->outCombo(JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_POSITION'),$data->positionnew);
		
        if ($params->get('addresses','1') == '1')
        {
            if ($params->get('addresses_current','1') == '1')
            {
                $result .= $apphtml->outHeader(JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_CURRENT_ADDRESS'));
                if ($params->get('addresses_street','1') == '1')
                    $result .= $apphtml->outCombo(JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_STREET'),$data->street);
                if ($params->get('addresses_city','1') == '1')
                    $result .= $apphtml->outCombo(JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_CITY'),$data->city);
                if ($params->get('addresses_state','1') == '1')
                    $result .= $apphtml->outCombo(JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_STATE'),$data->state);
                if ($params->get('addresses_zip_code','1') == '1')
                    $result .= $apphtml->outCombo(JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_ZIP_CODE'),$data->zip_code);
                if ($params->get('addresses_since') == '1')
                    $result .= $apphtml->outCombo(JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_ADDRESS_SINCE'),$data->from_date);}

            if ($params->get('addresses_1','1') == '1')
            {
                $result .= $apphtml->outHeader(JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_PRIOR_ADDRESS')." (1)");
                if ($params->get('addresses_street','1') == '1')
                    $result .= $apphtml->outCombo(JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_STREET'),$data->street1);
                if ($params->get('addresses_city','1') == '1')
                    $result .= $apphtml->outCombo(JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_CITY'),$data->city1);
                if ($params->get('addresses_state','1') == '1')
                    $result .= $apphtml->outCombo(JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_STATE'),$data->state1);
                if ($params->get('addresses_zip_code','1') == '1')
                    $result .= $apphtml->outCombo(JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_ZIP_CODE'),$data->zip_code1);
                if ($params->get('addresses_since','1') == '1')
                    $result .= $apphtml->outCombo(JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_ADDRESS_SINCE'),$data->from_date1);
                if ($params->get('addresses_to','1') == '1')
                    $result .= $apphtml->outCombo(JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_ADDRESS_TO'),$data->to_date1);}

            if ($params->get('addresses_2','1') == '1')
            {
                $result .= $apphtml->outHeader(JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_PRIOR_ADDRESS')." (2)");
                if ($params->get('addresses_street','1') == '1')
                    $result .= $apphtml->outCombo(JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_STREET'),$data->street2);
                if ($params->get('addresses_city','1') == '1')
                    $result .= $apphtml->outCombo(JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_CITY'),$data->city2);
                if ($params->get('addresses_state','1') == '1')
                    $result .= $apphtml->outCombo(JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_STATE'),$data->state2);
                if ($params->get('addresses_zip_code','1') == '1')
                    $result .= $apphtml->outCombo(JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_ZIP_CODE'),$data->zip_code2);
                if ($params->get('addresses_since','1') == '1')
                    $result .= $apphtml->outCombo(JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_ADDRESS_SINCE'),$data->from_date2);
                if ($params->get('addresses_to','1') == '1')
                    $result .= $apphtml->outCombo(JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_ADDRESS_TO'),$data->to_date2);}
        }
        if ($params->get('education','1'))
        {
            if ($params->get('education_high','1') == '1')
            {
                $result .= $apphtml->outHeader(JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_HIGH_SCHOOL'));
                if ($params->get('education_school','1') == '1');
                $result .= $apphtml->outCombo(JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_SCHOOL_ATTENDED'),$data->school);
                if ($params->get('education_city','1') == '1')
                    $result .= $apphtml->outCombo(JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_CITY'),$data->school_city);
                if ($params->get('education_state','1') == '1')
                    $result .= $apphtml->outCombo(JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_STATE'),$data->school_state);
                if ($params->get('education_diploma','1') == '1')
                    $result .= $apphtml->outCombo(JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_DIPLOMA'),$data->school_diploma=='1'?JTEXT::_('YES'):JTEXT::_('NO')); }

            if ($params->get('education_undergrad','1') == '1')
            {
                $result .= $apphtml->outHeader(JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_UNDERGRAD_SCHOOL'));
                if ($params->get('education_school','1') == '1');
                $result .= $apphtml->outCombo(JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_SCHOOL_ATTENDED'),$data->school1);
                if ($params->get('education_city','1') == '1')
                    $result .= $apphtml->outCombo(JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_CITY'),$data->school_city1);
                if ($params->get('education_state','1') == '1')
                    $result .= $apphtml->outCombo(JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_STATE'),$data->school_state1);
                if ($params->get('education_diploma','1') == '1')
                    $result .= $apphtml->outCombo(JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_DIPLOMA'),$data->school_diploma1=='1'?JTEXT::_('YES'):JTEXT::_('NO'));
                if ($params->get('education_degree','1') == '1')
                    $result .= $apphtml->outCombo(JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_DEG_CERT_DIP_LONG'),$data->diploma_text1);
                if ($params->get('education_study','1') == '1')
                    $result .= $apphtml->outCombo(JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_AREA_OF_STUDY'),$data->study_area1); }

            if ($params->get('education_grad','1') == '1')
            {
                $result .= $apphtml->outHeader(JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_GRAD_SCHOOL'));
                if ($params->get('education_school','1') == '1');
                $result .= $apphtml->outCombo(JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_SCHOOL_ATTENDED'),$data->school2);
                if ($params->get('education_city','1') == '1')
                    $result .= $apphtml->outCombo(JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_CITY'),$data->school_city2);
                if ($params->get('education_state','1') == '1')
                    $result .= $apphtml->outCombo(JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_STATE'),$data->school_state2);
                if ($params->get('education_diploma','1') == '1')
                    $result .= $apphtml->outCombo(JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_DIPLOMA'),$data->school_diploma2=='1'?JTEXT::_('YES'):JTEXT::_('NO'));
                if ($params->get('education_degree','1') == '1')
                    $result .= $apphtml->outCombo(JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_DEG_CERT_DIP_LONG'),$data->diploma_text2);
                if ($params->get('education_study','1') == '1')
                    $result .= $apphtml->outCombo(JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_AREA_OF_STUDY'),$data->study_area2); }

            if ($params->get('education_other','1') == '1')
            {
                $result .= $apphtml->outHeader(JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_OTHER_SCHOOL'));
                if ($params->get('education_school','1') == '1');
                $result .= $apphtml->outCombo(JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_SCHOOL_ATTENDED'),$data->school3);
                if ($params->get('education_city','1') == '1')
                    $result .= $apphtml->outCombo(JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_CITY'),$data->school_city3);
                if ($params->get('education_state','1') == '1')
                    $result .= $apphtml->outCombo(JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_STATE'),$data->school_state3);
                if ($params->get('education_diploma','1') == '1')
                    $result .= $apphtml->outCombo(JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_DIPLOMA'),$data->school_diploma3=='1'?JTEXT::_('YES'):JTEXT::_('NO'));
                if ($params->get('education_degree','1') == '1')
                    $result .= $apphtml->outCombo(JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_DEG_CERT_DIP_LONG'),$data->diploma_text3);
                if ($params->get('education_study','1') == '1')
                    $result .= $apphtml->outCombo(JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_AREA_OF_STUDY'),$data->study_area3); }
        }

        if ($params->get('employment_information','1'))
        {

            $result .= $apphtml->outHeader(JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_EMPLOYMENT_INFORMATION'));
            if ($params->get('employment_information_position','1') == '1')
                $result .= $apphtml->outCombo(JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_POSITION_APPLIED_FOR'),$data->position);
            if ($params->get('employment_information_date_you_can_start','1') == '1')
                $result .= $apphtml->outCombo(JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_DATE_YOU_CAN_START'),$data->available_date);
            if ($params->get('employment_information_desired_salary','1') == '1')
                $result .= $apphtml->outCombo(JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_DESIRED_SALARY'),$data->desired_pay);
            if ($params->get('employment_information_do_you_prefer','1') == '1')
                $result .= $apphtml->outcombo(JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_DO_YOU_PREFER'),$data->work_preferences);
            if ($params->get('employment_information_available','1') == '1')
                $result .= $apphtml->outCombo(JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_AVAILABLE'),
                    ($data->monday=='1'?'Monday':'').' '.
                    ($data->tuesday=='1'?'Tuesday':'').' '.
                    ($data->wednesday=='1'?'Wednesday':'').' '.
                    ($data->thursday=='1'?'Thursday':'').' '.
                    ($data->friday=='1'?'Friday':'').' '.
                    ($data->saturday=='1'?'Saturday':'').' '.
                    ($data->sunday=='1'?'Sunday':''));
            if ($params->get('employment_information_not_available','1') == '1')
                $result .= $apphtml->outCombo(JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_NOT_AVAILABLE'),$data->unavailability);
            if ($params->get('employment_information_question_1','1') == '1')
            {
                $result .= $apphtml->outField(JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_QUESTION'));
                $result .= $apphtml->outField(JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_QUESTION_1'));
                $result .= $apphtml->outValue($data->eligible=='1'?JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_YES'):JTEXT::_('NO')); }
            if ($params->get('employment_information_question_2','1') == '1')
            {
                $result .= $apphtml->outField(JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_QUESTION'));
                $result .= $apphtml->outField(JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_QUESTION_2'));
                $result .= $apphtml->outValue($data->worked_here_before=='1'?JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_YES'):JTEXT::_('NO'));
                $result .= $apphtml->outField(JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_QUESTION_2_FOLLOWUP'));
                $result .= $apphtml->outValue($data->worked_here_text); }
            if ($params->get('employment_information_question_3','1') == '1')
            {
                $result .= $apphtml->outField(JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_QUESTION'));
                $result .= $apphtml->outField(JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_QUESTION_3'));
                $result .= $apphtml->outValue($data->job_desc_received=='1'?JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_YES'):JTEXT::_('NO')); }
            if ($params->get('employment_information_question_4','1') == '1')
            {
                $result .= $apphtml->outField(JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_QUESTION'));
                $result .= $apphtml->outField(JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_QUESTION_4'));
                $result .= $apphtml->outValue($data->understand_reqs=='1'?JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_YES'):JTEXT::_('NO'));
                $result .= $apphtml->outField(JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_QUESTION_4_FOLLOWUP'));
                $result .= $apphtml->outValue($data->no_understand_reqs); }
            if ($params->get('employment_information_question_5','1') == '1')
            {
                $result .= $apphtml->outField(JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_QUESTION'));
                $result .= $apphtml->outField(JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_QUESTION_5'));
                $result .= $apphtml->outValue($data->on_layoff=='1'?JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_YES'):JTEXT::_('NO')); }
            if ($params->get('employment_information_question_6','1') == '1')
            {
                $result .= $apphtml->outField(JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_QUESTION'));
                $result .= $apphtml->outField(JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_QUESTION_6'));
                $result .= $apphtml->outValue($data->conf_agreement=='1'?JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_YES'):JTEXT::_('NO'));
                $result .= $apphtml->outField(JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_QUESTION_6_FOLLOWUP'));
                $result .= $apphtml->outValue($data->conf_explain); }
            if ($params->get('employment_information_question_7','1') == '1')
            {
                $result .= $apphtml->outField(JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_QUESTION'));
                $result .= $apphtml->outField(JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_QUESTION_7'));
                $result .= $apphtml->outValue($data->discharged=='1'?JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_YES'):JTEXT::_('NO'));
                $result .= $apphtml->outField(JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_QUESTION_7_FOLLOWUP'));
                $result .= $apphtml->outValue($data->discharge_explain); }
            if ($params->get('employment_information_question_8','1') == '1')
            {
                $result .= $apphtml->outField(JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_QUESTION'));
                $result .= $apphtml->outField(JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_QUESTION_8'));
                $result .= $apphtml->outValue($data->convict=='1'?JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_YES'):JTEXT::_('NO'));
                $result .= $apphtml->outField(JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_QUESTION_8_FOLLOWUP'));
                $result .= $apphtml->outValue($data->convict_explain); }
            if ($params->get('employment_information_question_9','1') == '1')
            {
                $result .= $apphtml->outField(JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_QUESTION'));
                $result .= $apphtml->outField(JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_QUESTION_9'));
                $result .= $apphtml->outValue($data->family=='1'?JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_YES'):JTEXT::_('NO'));
                $result .= $apphtml->outField(JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_QUESTION_9_FOLLOWUP'));
                $result .= $apphtml->outValue($data->family_explain); }
        }

        if ($params->get('employment_history','1'))
        {
            if ($params->get('employment_history_recent','1') == '1')
            {
                $result .= $apphtml->outHeader(JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_MOST_RECENT_EMPLOYER'));
                if ($params->get('employment_history_employer','1') == '1')
                    $result .= $apphtml->outCombo(JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_EMPLOYER'),$data->employer);
                if ($params->get('employment_history_city','1') == '1')
                    $result .= $apphtml->outCombo(JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_CITY'),$data->employer_city);
                if ($params->get('employment_history_state','1') == '1')
                    $result .= $apphtml->outCombo(JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_STATE'),$data->employer_state);
                if ($params->get('employment_history_zip_code','1') == '1')
                    $result .= $apphtml->outCombo(JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_ZIP_CODE'),$data->employer_zip);
                if ($params->get('employment_history_phone','1') == '1')
                    $result .= $apphtml->outCombo(JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_PHONE'),$data->employer_phone);
                if ($params->get('employment_history_position','1') == '1')
                    $result .= $apphtml->outCombo(JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_POSITION_HELD'),$data->employer_pos);
                if ($params->get('employment_history_from','1') == '1')
                    $result .= $apphtml->outCombo(JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_FROM_MYYYY'),$data->employer_from);
                if ($params->get('employment_history_to','1') == '1')
                    $result .= $apphtml->outCombo(JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_TO_MYYYY'),$data->employer_to);
                if ($params->get('employment_history_pay','1') == '1')
                    $result .= $apphtml->outCombo(JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_PAY_UPON_LEAVING'),$data->employer_pay);
                if ($params->get('employment_history_supervisor','1') == '1')
                    $result .= $apphtml->outCombo(JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_SUPERVISOR'),$data->employer_sup);
                if ($params->get('employment_history_duties','1') == '1')
                    $result .= $apphtml->outCombo(JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_DUTIES'),$data->employer_dut);
                if ($params->get('employment_history_reason','1') == '1')
                    $result .= $apphtml->outCombo(JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_REASON_FOR_LEAVING'),$data->employer_leave); }

            if ($params->get('employment_history_1','1') == '1')
            {
                $result .= $apphtml->outHeader(JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_PRIOR_EMPLOYER'));
                if ($params->get('employment_history_employer','1') == '1')
                    $result .= $apphtml->outCombo(JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_EMPLOYER'),$data->employer1);
                if ($params->get('employment_history_city','1') == '1')
                    $result .= $apphtml->outCombo(JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_CITY'),$data->employer1_city);
                if ($params->get('employment_history_state','1') == '1')
                    $result .= $apphtml->outCombo(JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_STATE'),$data->employer1_state);
                if ($params->get('employment_history_zip_code','1') == '1')
                    $result .= $apphtml->outCombo(JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_ZIP_CODE'),$data->employer1_zip);
                if ($params->get('employment_history_phone','1') == '1')
                    $result .= $apphtml->outCombo(JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_PHONE'),$data->employer1_phone);
                if ($params->get('employment_history_position','1') == '1')
                    $result .= $apphtml->outCombo(JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_POSITION_HELD'),$data->employer1_pos);
                if ($params->get('employment_history_from','1') == '1')
                    $result .= $apphtml->outCombo(JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_FROM_MYYYY'),$data->employer1_from);
                if ($params->get('employment_history_to','1') == '1')
                    $result .= $apphtml->outCombo(JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_TO_MYYYY'),$data->employer1_to);
                if ($params->get('employment_history_pay','1') == '1')
                    $result .= $apphtml->outCombo(JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_PAY_UPON_LEAVING'),$data->employer1_pay);
                if ($params->get('employment_history_supervisor','1') == '1')
                    $result .= $apphtml->outCombo(JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_SUPERVISOR'),$data->employer1_sup);
                if ($params->get('employment_history_duties','1') == '1')
                    $result .= $apphtml->outCombo(JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_DUTIES'),$data->employer1_dut);
                if ($params->get('employment_history_reason','1') == '1')
                    $result .= $apphtml->outCombo(JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_REASON_FOR_LEAVING'),$data->employer1_leave); }

            if ($params->get('employment_history_2','1') == '1')
            {
                $result .= $apphtml->outHeader(JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_PRIOR_EMPLOYER'));
                if ($params->get('employment_history_employer','1') == '1')
                    $result .= $apphtml->outCombo(JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_EMPLOYER'),$data->employer2);
                if ($params->get('employment_history_city','1') == '1')
                    $result .= $apphtml->outCombo(JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_CITY'),$data->employer2_city);
                if ($params->get('employment_history_state','1') == '1')
                    $result .= $apphtml->outCombo(JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_STATE'),$data->employer2_state);
                if ($params->get('employment_history_zip_code','1') == '1')
                    $result .= $apphtml->outCombo(JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_ZIP_CODE'),$data->employer2_zip);
                if ($params->get('employment_history_phone','1') == '1')
                    $result .= $apphtml->outCombo(JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_PHONE'),$data->employer2_phone);
                if ($params->get('employment_history_position','1') == '1')
                    $result .= $apphtml->outCombo(JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_POSITION_HELD'),$data->employer2_pos);
                if ($params->get('employment_history_from','1') == '1')
                    $result .= $apphtml->outCombo(JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_FROM_MYYYY'),$data->employer2_from);
                if ($params->get('employment_history_to','1') == '1')
                    $result .= $apphtml->outCombo(JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_TO_MYYYY'),$data->employer2_to);
                if ($params->get('employment_history_pay','1') == '1')
                    $result .= $apphtml->outCombo(JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_PAY_UPON_LEAVING'),$data->employer2_pay);
                if ($params->get('employment_history_supervisor','1') == '1')
                    $result .= $apphtml->outCombo(JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_SUPERVISOR'),$data->employer2_sup);
                if ($params->get('employment_history_duties','1') == '1')
                    $result .= $apphtml->outCombo(JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_DUTIES'),$data->employer2_dut);
                if ($params->get('employment_history_reason','1') == '1')
                    $result .= $apphtml->outCombo(JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_REASON_FOR_LEAVING'),$data->employer2_leave); }

            if ($params->get('employment_history_3','1') == '1')
            {
                $result .= $apphtml->outHeader(JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_PRIOR_EMPLOYER'));
                if ($params->get('employment_history_employer','1') == '1')
                    $result .= $apphtml->outCombo(JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_EMPLOYER'),$data->employer3);
                if ($params->get('employment_history_city','1') == '1')
                    $result .= $apphtml->outCombo(JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_CITY'),$data->employer3_city);
                if ($params->get('employment_history_state','1') == '1')
                    $result .= $apphtml->outCombo(JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_STATE'),$data->employer3_state);
                if ($params->get('employment_history_zip_code','1') == '1')
                    $result .= $apphtml->outCombo(JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_ZIP_CODE'),$data->employer3_zip);
                if ($params->get('employment_history_phone','1') == '1')
                    $result .= $apphtml->outCombo(JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_PHONE'),$data->employer3_phone);
                if ($params->get('employment_history_position','1') == '1')
                    $result .= $apphtml->outCombo(JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_POSITION_HELD'),$data->employer3_pos);
                if ($params->get('employment_history_from','1') == '1')
                    $result .= $apphtml->outCombo(JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_FROM_MYYYY'),$data->employer3_from);
                if ($params->get('employment_history_to','1') == '1')
                    $result .= $apphtml->outCombo(JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_TO_MYYYY'),$data->employer3_to);
                if ($params->get('employment_history_pay','1') == '1')
                    $result .= $apphtml->outCombo(JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_PAY_UPON_LEAVING'),$data->employer3_pay);
                if ($params->get('employment_history_supervisor','1') == '1')
                    $result .= $apphtml->outCombo(JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_SUPERVISOR'),$data->employer3_sup);
                if ($params->get('employment_history_duties','1') == '1')
                    $result .= $apphtml->outCombo(JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_DUTIES'),$data->employer3_dut);
                if ($params->get('employment_history_reason','1') == '1')
                    $result .= $apphtml->outCombo(JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_REASON_FOR_LEAVING'),$data->employer3_leave); }
        }


        if ($params->get('job_related_skills','1'))
        {
            $result .= $apphtml->outHeader(JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_JOB_RELATED_SKILLS'));
            $result .= $apphtml->outField(JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_VEHICLE_QUESTIONS'));
            if ($params->get('job_related_skills_q1','1') == '1')
            {
                $result .= $apphtml->outField(JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_VEHICLE_QUESTION_1'));
                $result .= $apphtml->outValue($data->driver_license=='1'?JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_YES'):JTEXT::_('NO'));
                $result .= $apphtml->outField(JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_VEHICLE_QUESTION_1_FOLLOWUP_A'));
                $result .= $apphtml->outValue($data->dl_number);
                $result .= $apphtml->outField(JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_VEHICLE_QUESTION_1_FOLLOWUP_B'));
                $result .= $apphtml->outValue($data->dl_issued); }
            if ($params->get('job_related_skills_q2','1') == '1')
            {
                $result .= $apphtml->outField(JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_VEHICLE_QUESTION_2'));
                $result .= $apphtml->outValue($data->driving_offense=='1'?JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_YES'):JTEXT::_('NO')); }
            if ($params->get('job_related_skills_q3','1') == '1')
            {
                $result .= $apphtml->outField(JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_VEHICLE_QUESTION_3'));
                $result .= $apphtml->outValue($data->dl_modified=='1'?JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_YES'):JTEXT::_('NO')); }
            if ($params->get('job_related_skills_states','1') == '1')
            {
                $result .= $apphtml->outField(JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_VEHICLE_STATES'));
                $result .= $apphtml->outValue($data->dl_states); }
            if ($params->get('job_related_skills_skills','1') == '1')
            {
                $result .= $apphtml->outField(JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_SKILLS'));
                $result .= $apphtml->outValue($data->skills); }
            if ($params->get('job_related_skills_designations') == '1')
            {
                $result .= $apphtml->outField(JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_PROF_DESIGNATIONS'));
                $result .= $apphtml->outValue($data->professional);
            }
        }

        if ($params->get('references') == '1')
        {
            if ($params->get('references_1','1') == '1')
            {
                $result .= $apphtml->outHeader(JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_REFERENCE')." (1)");
                if ($params->get('references_name','1') == '1')
                    $result .= $apphtml->outCombo(JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_NAME'),$data->ref1_name);
                if ($params->get('references_address','1') == '1')
                    $result .= $apphtml->outCombo(JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_ADDRESS'),$data->ref1_address);
                if ($params->get('references_telephone','1') == '1')
                    $result .= $apphtml->outCombo(JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_TELEPHONE'),$data->ref1_telephone);
                if ($params->get('references_relationship','1') == '1')
                    $result .= $apphtml->outCombo(JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_RELATIONSHIP'),$data->ref1_relationship);
                if ($params->get('references_years_acquainted') == '1')
                    $result .= $apphtml->outCombo(JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_YEARS_ACQUAINTED'),$data->ref1_years); }

            if ($params->get('references_2','1') == '1')
            {
                $result .= $apphtml->outHeader(JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_REFERENCE')." (2)");
                if ($params->get('references_name','1') == '1')
                    $result .= $apphtml->outCombo(JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_NAME'),$data->ref2_name);
                if ($params->get('references_address','1') == '1')
                    $result .= $apphtml->outCombo(JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_ADDRESS'),$data->ref2_address);
                if ($params->get('references_telephone','1') == '1')
                    $result .= $apphtml->outCombo(JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_TELEPHONE'),$data->ref2_telephone);
                if ($params->get('references_relationship','1') == '1')
                    $result .= $apphtml->outCombo(JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_RELATIONSHIP'),$data->ref2_relationship);
                if ($params->get('references_years_acquainted') == '1')
                    $result .= $apphtml->outCombo(JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_YEARS_ACQUAINTED'),$data->ref2_years); }

            if ($params->get('references_3','1') == '1')
            {
                $result .= $apphtml->outHeader(JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_REFERENCE')." (3)");
                if ($params->get('references_name','1') == '1')
                    $result .= $apphtml->outCombo(JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_NAME'),$data->ref3_name);
                if ($params->get('references_address','1') == '1')
                    $result .= $apphtml->outCombo(JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_ADDRESS'),$data->ref3_address);
                if ($params->get('references_telephone','1') == '1')
                    $result .= $apphtml->outCombo(JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_TELEPHONE'),$data->ref3_telephone);
                if ($params->get('references_relationship','1') == '1')
                    $result .= $apphtml->outCombo(JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_RELATIONSHIP'),$data->ref3_relationship);
                if ($params->get('references_years_acquainted') == '1')
                    $result .= $apphtml->outCombo(JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_YEARS_ACQUAINTED'),$data->ref3_years); }

            if ($params->get('references_4','1') == '1')
            {
                $result .= $apphtml->outHeader(JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_REFERENCE')." (4)");
                if ($params->get('references_name','1') == '1')
                    $result .= $apphtml->outCombo(JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_NAME'),$data->ref4_name);
                if ($params->get('references_address','1') == '1')
                    $result .= $apphtml->outCombo(JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_ADDRESS'),$data->ref4_address);
                if ($params->get('references_telephone','1') == '1')
                    $result .= $apphtml->outCombo(JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_TELEPHONE'),$data->ref4_telephone);
                if ($params->get('references_relationship','1') == '1')
                    $result .= $apphtml->outCombo(JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_RELATIONSHIP'),$data->ref4_relationship);
                if ($params->get('references_years_acquainted') == '1')
                    $result .= $apphtml->outCombo(JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_YEARS_ACQUAINTED'),$data->ref4_years); }
        }

        if ($params->get('text_resume','1' == '1'))
        {
            $result .= $apphtml->outHeader(JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_TEXT_RESUME'));
            $result .= $apphtml->outField(JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_TEXT_RESUME_DESC'));
            $result .= $apphtml->outValue($data->text_resume);
        }
        
        if ($this->isUploaded($data->uid)) {
            if ($params->get('file_upload','1') == '1' && $data->file_name != '')
            {
                if ($params->get('email_include_filelink','0') == '1')
                    $link = JROUTE::_(JURI::base()."index.php?option=com_jobgrokapp&view=application&format=file&uid=".$data->uid);
                else
                    $link = null;
            
			//    $result .= $apphtml->outField(JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_FILE_ATTACHMENT_EXISTS'));
             //   $result .= $apphtml->outValue($data->file_name,$link);
           }
        }

        if ($params->get('agreement','1') == '1')
        {
            $result .= $apphtml->outHeader(JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_CERTIFICATION_AGREEMENT'));
            
            if (isset($data->agreement)) {
                echo $this->agreement->introtext.$this->agreement->fulltext; 
            }
            
            $result .= $apphtml->outField("1) ".$params->get('certification_agreement_bullet1',JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_CERTIFICATION_AGREEMENT_BULLET1')));
            $result .= $apphtml->outField("2) ".$params->get('certification_agreement_bullet2',JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_CERTIFICATION_AGREEMENT_BULLET2')));
            $result .= $apphtml->outField("3) ".$params->get('certification_agreement_bullet3',JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_CERTIFICATION_AGREEMENT_BULLET3')));
            $result .= $apphtml->outField("4) ".$params->get('certification_agreement_bullet4',JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_CERTIFICATION_AGREEMENT_BULLET4')));
            $result .= $apphtml->outField("5) ".$params->get('certification_agreement_bullet5',JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_CERTIFICATION_AGREEMENT_BULLET5')));
            $result .= $apphtml->outField("6) ".$params->get('certification_agreement_bullet6',JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_CERTIFICATION_AGREEMENT_BULLET6'))); }

        if ($params->get('signature','1') == '1')
            $result .= $apphtml->outCombo(JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_CERTIFICATION_AGREEMENT_SIGNATURE'),$data->signature);
            $my_create_date = new JDate($data->create_date);
            $result .= $apphtml->outCombo(JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_CREATE_DATE'),$my_create_date->format($params->get('app_create_date_format',JText::_('m-d-Y'))));

        if ($isHTML) $result .= "</table>";

        return $result;

    }
    function notify(&$data, $includeinfo = true, $submission = null)
    {
		$fileName = '';
        $folderPath = '';
        $params = JComponentHelper::getParams('com_jobgrokapp');
        $html = ($params->get('email_notification_html','1')=='1'?true:false);
        
        $menuitemid = JRequest::getInt('Itemid');
        if ($menuitemid)
        {
            $app = JFactory::getApplication();
            $menu = $app->getMenu();
            $menuparams = $menu->getParams($menuitemid);
            $params->merge($menuparams);
        }
                
        if ($params->get('email_notification','1') == '1')
        {

            $mailer = JFactory::getMailer();
            $config = JFactory::getConfig();
            if (isset($data->job_code) && $data->job_code != "") $job_code = "JobCode [".$data->job_code."] - "; else $job_code = "";

            $sender = $params->get('email_notification_reply',$config->get( 'mailfrom'));
            if ($params->get('email_notification_reply_use_applicant_email','0') == '1') $replyto = $data->email_address;
            $recipient = $params->get('email_notification_recipient',$config->get( 'mailfrom'));
            $subject = $job_code.$params->get('email_notification_subject','[Fyooz Studio] New Job Application Received');
            
            if ($recipient != '')
            {
                $mailer->setSender($sender);
                $mailer->addReplyTo($replyto);
                $mailer->addRecipient($recipient);
                $mailer->setSubject($subject);
				
                if ($this->_file_location && $params->get('email_include_filelink','0')=='2') {
                    $mailer->addAttachment($this->_file_location);
                    //if (JFile::exists($this->_file_location)) JFile::delete($this->_file_location);
                    //if (JFolder::exists($this->_folder_location)) JFolder::delete($this->_folder_location);
                }
                if ($params->get('email_notification_include','1') == '1')
                {
                    if ($html) $mailer->IsHTML($html);
					$body = $this->getAppOutPut($data,$html);
					//echo $body;exit;
				}
                else $body = 'Someone has submitted an application';
                $mailer->setBody($body);
                $mailer->Send();
				$session = JFactory::getSession();
        		$session->set('enq_success',1);
			}
            if ($params->get('email_notify_applicant','0') == '1' &&
                    $data->validEmail($data->email_address,$params))
            {
                // email to applicant
                $mailer = null;
                $mailer = JFactory::getMailer();
                if ($html) $mailer->IsHTML($html);
                $mailer->setSender(array($replyto, $replyto));
                $mailer->addRecipient($data->email_address);
                if ($params->get('email_notify_applicant_inc_data','0') == '1') {
                    $mailer->setBody($params->get('email_applicant_body',JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_EMAIL_APPLICANT_BODY_TEXT')).$body);
                } else {
                    $mailer->setBody($params->get('email_applicant_body',JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_EMAIL_APPLICANT_BODY_TEXT')));
                }
                if ($params->get('email_notify_applicant_inc_pdf','0') == '1') {
                    if (!JFile::exists($fileName)) {
                        $data_as_file = JFile::read(JURI::base().'index.php?option=com_jobgrokapp&controller=application&view=application&layout=static&format=raw&uid='.$data->uid.'&email_uid='.$data->email_uid.'&e=1');
                        if (!JFolder::exists($folderPath)) JFolder::create($folderPath);
                        JFile::write($fileName,$data_as_file);
                    }
                    $mailer->addAttachment($fileName);
                }
                $mailer->Send();
            }
            
            if ($params->get('community_builder_inbox','0') == '1') {
                require_once (JPATH_SITE.DIRECTORY_SEPARATOR.'components'.DIRECTORY_SEPARATOR.'com_community'.DIRECTORY_SEPARATOR.'models'.DIRECTORY_SEPARATOR.'inbox.php');
                
                $vars['to'] = $params->get('community_builder_use','');
                $vars['subject'] = $params->get('community_builder_subject','');
                $vars['body'] = $params->get('community_builder_html','');
                
                $inbox_model = new CommunityModelInbox();
                $msgid = $inbox_model->send($vars);
                
                if ($msgid == 0) {
                    JError::raiseNotice(100,'Could not send to Community User\'s inbox.');
                }
            }
            
            if ($fileName != '') if (JFile::exists($fileName)) JFile::delete($fileName);
            if ($folderPath != '') if (JFolder::exists($folderPath)) JFolder::delete ($folderPath);   
        }
    }
    

    // this is kind of clever so I'm using it, I modified it to create
    // a 64 character string instead of 32
    // it can be found here:
    // http://www.tutorialized.com/view/tutorial/PHP-Random-String-Generator/13903
    function randomString($length)
    {
    // Generate random 64 character string
        $string = md5(time());
        $string = md5($string).$string;

        // Position Limiting
        $highest_startpoint = 64-$length;

        // Take a random starting point in the randomly
        // Generated String, not going any higher then $highest_startpoint
        $randomString = substr($string,rand(0,$highest_startpoint),$length);

        return $randomString;
    }

    // we're just setting our option type values for the html output
    function setOptions()
    {
        global $mainframe;

        $params = JComponentHelper::getParams('com_jobgrokapp');

        $menuitemid = JRequest::getInt('Itemid');
        if ($menuitemid)
        {
            $app = JFactory::getApplication();
            $menu = $app->getMenu();
            $menuparams = $menu->getParams($menuitemid);
            $params->merge($menuparams);
        }
        
        $this->_options = array();
        $termination_reason = array(
            '0' => array('value' => JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_NOT_APPLICABLE'),
            'text' => JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_NOT_APPLICABLE')),
            '1' => array('value' => JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_JOB_CHANGE'),
            'text' => JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_JOB_CHANGE')),
            '2' => array('value' => JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_RETURN_TO_SCHOOL'),
            'text' => JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_RETURN_TO_SCHOOL'),),
            '3' => array('value' => JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_TERMINATED_BY_EMPLOYER'),
            'text' => JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_TERMINATED_BY_EMPLOYER')),
            '4' => array('value' => JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_NO_REASON_GIVEN'),
            'text' => JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_NO_REASON_GIVEN')),);
        $work_preferences = array(
            '0' => array('value' => JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_FULLTIME'),
            'text' => JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_FULLTIME')),
            '1' => array('value' => JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_PARTTIME'),
            'text' => JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_PARTTIME')),
            '2' => array('value' => JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_EITHER'),
            'text' => JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_EITHER')),);

        if ( isset($this->_application) )
        {
            $this->_options['termination_reason'] = JHTML::_('select.genericList', $termination_reason, 'termination_reason', 'class="inputbox" '. '', 'value', 'text', (isset($this->_application->termination_reason)?$this->_application->termination_reason:''));
            $this->_options['hired'] = JHTML::_('select.booleanlist', 'hired', 'class="radio"', (isset($this->_application->hired)?$this->_application->hired:-1));
            $this->_options['school_diploma'] = JHTML::_('select.booleanlist', 'school_diploma', 'class="radio"', (isset($this->_application->school_diploma)?$this->_application->school_diploma:-1));
            $this->_options['school_diploma1'] = JHTML::_('select.booleanlist', 'school_diploma1', 'class="radio"', (isset($this->_application->school_diploma1)?$this->_application->school_diploma1:-1));
            $this->_options['school_diploma2'] = JHTML::_('select.booleanlist', 'school_diploma2', 'class="radio"', (isset($this->_application->school_diploma2)?$this->_application->school_diploma2:-1));
            $this->_options['school_diploma3'] = JHTML::_('select.booleanlist', 'school_diploma3', 'class="radio"', (isset($this->_application->school_diploma3)?$this->_application->school_diploma3:-1));
            $this->_options['work_preferences'] = JHTML::_('select.genericList', $work_preferences, 'work_preferences', 'class="inputbox" '. '', 'value', 'text', $this->_application->work_preferences);
            $this->_options['shiftwork'] = JHTML::_('select.booleanlist', 'shiftwork', 'class="radio"', (isset($this->_application->shiftwork)?$this->_application->shiftwork:-1));
            $this->_options['eligible'] = JHTML::_('select.booleanlist', 'eligible', 'class="radio"', isset($this->_application->eligible)?$this->_application->eligible:$params->get('default_question_1','0'));
            $this->_options['provideproof'] = JHTML::_('select.booleanlist', 'provideproof', 'class="radio"', (isset($this->_application->provideproof)?$this->_application->provideproof:$params->get('default_question_1_followup','0')));
            $this->_options['worked_here_before'] = JHTML::_('select.booleanlist', 'worked_here_before', 'class="radio"', isset($this->_application->worked_here_before)?$this->_application->worked_here_before:$params->get('default_question_2','0'));
            $this->_options['job_desc_received'] = JHTML::_('select.booleanlist', 'job_desc_received', 'class="radio"', isset($this->_application->job_desc_received)?$this->_application->job_desc_received:$params->get('default_question_3','0'));
            $this->_options['understand_reqs'] = JHTML::_('select.booleanlist', 'understand_reqs', 'class="radio"', isset($this->_application->understand_reqs)?$this->_application->understand_reqs:$params->get('default_question_4','1'));
            $this->_options['on_layoff'] = JHTML::_('select.booleanlist', 'on_layoff', 'class="radio"', isset($this->_application->on_layoff)?$this->_application->on_layoff:$params->get('default_question_5','0'));
            $this->_options['conf_agreement'] = JHTML::_('select.booleanlist', 'conf_agreement', 'class="radio"', isset($this->_application->conf_agreement)?$this->_application->conf_agreement:$params->get('default_question_6','0'));
            $this->_options['discharged'] = JHTML::_('select.booleanlist', 'discharged', 'class="radio"', isset($this->_application->discharged)?$this->_application->discharged:$params->get('default_question_7','0'));
            $this->_options['convict'] = JHTML::_('select.booleanlist', 'convict', 'class="radio"', isset($this->_application->convict)?$this->_application->convict:$params->get('default_question_8','0'));
            $this->_options['family'] = JHTML::_('select.booleanlist', 'family', 'class="radio"', isset($this->_application->family)?$this->_application->family:$params->get('default_question_9','0'));
            $this->_options['contact_emp'] = JHTML::_('select.booleanlist', 'contact_emp', 'class="radio"', isset($this->_application->contact_emp)?$this->_application->contact_emp:$params->get('default_equestion_1','0'));
            $this->_options['currently_employed'] = JHTML::_('select.booleanlist', 'currently_employed', 'class="radio"', isset($this->_application->currently_employed)?$this->_application->currently_employed:$params->get('default_cquestion_1','0'));
            $this->_options['driver_license'] = JHTML::_('select.booleanlist', 'driver_license', 'class="radio"', isset($this->_application->driver_license)?$this->_application->driver_license:$params->get('default_vquestion_1','0'));
            $this->_options['driving_offense'] = JHTML::_('select.booleanlist', 'driving_offense', 'class="radio"', isset($this->_application->driving_offense)?$this->_application->driving_offense:$params->get('default_vquestion_2','0'));
            $this->_options['dl_modified'] = JHTML::_('select.booleanlist', 'dl_modified', 'class="radio"', isset($this->_application->dl_modified)?$this->_application->dl_modified:$params->get('default_vquestion_3','0'));
            $this->_options['custom_yes_no'] = JHTML::_('select.booleanlist', 'custom_yes_no', 'class="radio"', isset($this->_application->custom_yes_no)?$this->_application->custom_yes_no:$params->get('default_custom_yes_no','0'));

        }
        else
        {
            $this->_options['termination_reason'] = JHTML::_('select.genericList', $termination_reason, 'termination_reason', 'class="inputbox" '. '', 'value', 'text', null);
            $this->_options['hired'] = JHTML::_('select.booleanlist', 'hired', 'class="radio"', -1);
            $this->_options['school_diploma'] = JHTML::_('select.booleanlist', 'school_diploma', 'class="radio"', -1);
            $this->_options['school_diploma1'] = JHTML::_('select.booleanlist', 'school_diploma1', 'class="radio"', -1);
            $this->_options['school_diploma2'] = JHTML::_('select.booleanlist', 'school_diploma2', 'class="radio"', -1);
            $this->_options['school_diploma3'] = JHTML::_('select.booleanlist', 'school_diploma3', 'class="radio"', -1);
            $this->_options['work_preferences'] = JHTML::_('select.genericList', $work_preferences, 'work_preferences', 'class="inputbox" '. '', 'value', 'text', '');
            $this->_options['shiftwork'] = JHTML::_('select.booleanlist', 'shiftwork', 'class="radio"', -1);
            $this->_options['eligible'] = JHTML::_('select.booleanlist', 'eligible', 'class="radio"', $params->get('default_question_1','0'));
            $this->_options['provideproof'] = JHTML::_('select.booleanlist', 'provideproof', 'class="radio"', $params->get('default_question_1_followup','0'));
            $this->_options['worked_here_before'] = JHTML::_('select.booleanlist', 'worked_here_before', 'class="radio"', $params->get('default_question_2','0'));
            $this->_options['job_desc_received'] = JHTML::_('select.booleanlist', 'job_desc_received', 'class="radio"', $params->get('default_question_3','0'));
            $this->_options['understand_reqs'] = JHTML::_('select.booleanlist', 'understand_reqs', 'class="radio"', $params->get('default_question_4','1'));
            $this->_options['on_layoff'] = JHTML::_('select.booleanlist', 'on_layoff', 'class="radio"', $params->get('default_question_5','0'));
            $this->_options['conf_agreement'] = JHTML::_('select.booleanlist', 'conf_agreement', 'class="radio"', $params->get('default_question_6','0'));
            $this->_options['discharged'] = JHTML::_('select.booleanlist', 'discharged', 'class="radio"', $params->get('default_question_7','0'));
            $this->_options['convict'] = JHTML::_('select.booleanlist', 'convict', 'class="radio"', $params->get('default_question_8','0'));
            $this->_options['family'] = JHTML::_('select.booleanlist', 'family', 'class="radio"', $params->get('default_question_9','0'));
            $this->_options['contact_emp'] = JHTML::_('select.booleanlist', 'contact_emp', 'class="radio"', $params->get('default_equestion_1','0'));
            $this->_options['currently_employed'] = JHTML::_('select.booleanlist','currently_employed','class="radio"', $params->get('default_cquestion_1','0'));
            $this->_options['driver_license'] = JHTML::_('select.booleanlist', 'driver_license', 'class="radio"', $params->get('default_vquestion_1','0'));
            $this->_options['driving_offense'] = JHTML::_('select.booleanlist', 'driving_offense', 'class="radio"', $params->get('default_vquestion_2','0'));
            $this->_options['dl_modified'] = JHTML::_('select.booleanlist', 'dl_modified', 'class="radio"', $params->get('default_vquestion_3','0'));
            $this->_options['custom_yes_no'] = JHTML::_('select.booleanlist', 'custom_yes_no', 'class="radio"', $params->get('default_custom_yes_no','0'));
        }

    }
    
    function &getOptions()
    {
        if (!$this->_options) $this->setOptions();
        return $this->_options;
    }

    function getMaxUploadSizeInBytes()
    {
        $uploadSize = trim(ini_get('upload_max_filesize'));
        $last = strtolower($uploadSize[strlen($uploadSize)-1]);
        switch ($last)
        {
            case 'g':
                $uploadSize *= 1024;
            case 'm':
                $uploadSize *= 1024;
            case 'k':
                $uploadSize *= 1024;
        }
        return $uploadSize;
    }
}

?>
