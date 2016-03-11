<?php

/**
 *
 *
 * This is the application.php model for jobgrokapp
 *
 * Created: November 18, 2014, 3:25 am
 *
 * Subversion Details
 * $Date: 2014-09-28 21:42:06 -0500 (Sun, 28 Sep 2014) $
 * $Revision: 6307 $
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

// model class for application on admin site
class JobgrokappModelApplication extends JModelLegacy

{
// private member for id
    var $_id;
    // the application data
    var $_application;
    // and our options
    var $_options;
    // and our security token
    var $_uid;
    // pagination object
    var $_pagination = null;
    var $_total = null;

    // build query pulls all data
    function _buildQuery()
    {
            $query = 'SELECT a.* FROM #__tst_jgapp_applications a '.
            "";
        return $query;
    }


    function getPagination()
    {
        if (empty($this->_pagination))
        {
            jimport('joomla.html.pagination');

            $total = $this->getTotal();
            $limitstart = $this->getState('limitstart');
            $limit = $this->getState('limit');

            $this->_pagination = new JPagination($total, $limitstart, $limit);
        }
        return $this->_pagination;
    }
    function getComCount()
    {
        $db = JFactory::getDBO();
        $query = "SELECT COUNT(name) FROM #__extensions WHERE name='com_employmentapplication'";
        $db->setQuery($query);
        return $db->loadResult();
    }

    function getRecordCount()
    {
        $db = JFactory::getDBO();
        $query = "SELECT COUNT(id) FROM #__tst_jgapp_applications";
        $db->setQuery($query);
        return $db->loadResult();
    }

    function import()
    {
        try
        {
            $db = $this->_db;
            $query = "INSERT INTO #__tst_jgapp_uploads SELECT * FROM #__tst_ea_uploads";
            $db->setQuery($query);$db->Query();;

            $query = "INSERT INTO #__tst_jgapp_applications SELECT * FROM #__tst_ea_application";
            $db->setQuery($query);$db->Query();;
        }
        catch (Exception $e)
        {
            return false;
        }
        return true;
    }
    
    function getTotal()
    {
        if (empty($this->_total))
        {
            $query = $this->_buildQuery();
            $this->_total = $this->_getListCount($query);
        }
        return $this->_total;
    }

    function & getData()
    {
        if (empty ($this->_application))
        {
            $query = $this->_buildQuery();
            $limitstart = $this->getState('limitstart');
            $limit = $this->getState('limit');
            $this->_application = $this->_getList($query,$limitstart,$limit);
        }
        return $this->_application;
    }

    // set the id
    function setId($id)
    {
    // Set id and wipe data
        $this->_id = $id;
        $this->_application = null;
    }

    // let's get any data on construct
    function __construct()
    {
        parent :: __construct();

        // get the cid array from the default request hash
        $cid = JRequest :: getVar('cid', false, 'DEFAULT', 'array');
        if ($cid)
        {
            $id = $cid[0];
        }
        else
        {
            $id = JRequest :: getInt('id', 0);
        }
        $this->setId($id);

        global $option;
		$mainframe = JFactory::getApplication();

        // Get pagination request variables
        $limit = $mainframe->getUserStateFromRequest('global.list.limit', 'limit', $mainframe->getCfg('list_limit'));
        //$limitstart = $mainframe->getUserStateFromRequest($option.'.limitstart', 'limitstart', 0);

        //$limitstart = mosGetParam($_REQUEST, 'limitstart', 0);
        // Am I missing something, is this a hack, or an OK solution?
        $limitstart = JRequest::getVar('limitstart',0);

        // In case limit has been changed, adjust it
        $limitstart = ($limit != 0 ? (floor($limitstart / $limit) * $limit) : 0);

        $this->setState('limit', $limit);
        $this->setState('limitstart', $limitstart);
    }

    // delete the data requested
    function delete()
    {
        $cids = JRequest :: getVar('cid', array (
            0
            ), 'post', 'array');
        $row = $this->getTable();

        foreach ($cids as $cid)
        {
            if (!$row->delete($cid))
            {
                $this->setError($row->getErrorMsg());
                return false;
            }
        }

        return true;
    }
    
    // save any data sent
    function store()
    {

        $row = $this->getTable();

        $data = JRequest :: get('post');
        if (isset($data['lists'])) { $data['lists'] = json_encode($data['lists']); }
        
        if (!isset($data['weekends']) || $data['weekends'] != "1" ) $data['weekends'] = "0";
        if (!isset($data['evenings']) || $data['evenings'] != "1" ) $data['evenings'] = "0";
        if (!isset($data['monday']) || $data['monday'] != "1" ) $data['monday'] = "0";
        if (!isset($data['tuesday']) || $data['tuesday'] != "1" ) $data['tuesday'] = "0";
        if (!isset($data['wednesday']) || $data['wednesday'] != "1" ) $data['wednesday'] = "0";
        if (!isset($data['thursday']) || $data['thursday'] != "1" ) $data['thursday'] = "0";
        if (!isset($data['friday']) || $data['friday'] != "1" ) $data['friday'] = "0";
        if (!isset($data['saturday']) || $data['saturday'] != "1" ) $data['saturday'] = "0";
        if (!isset($data['sunday']) || $data['sunday'] != "1" ) $data['sunday'] = "0";

        // Bind the form fields to the table
        if (!$row->bind($data))
        {
            $this->setError($this->_db->getErrorMsg());
            return false;
        }

        // Make sure the record is valid
        if (!$row->check())
        {
            $this->setError($this->_db->getErrorMsg());
            return false;
        }

        // Store the web link table to the database
        if (!$row->store())
        {
            $this->setError($this->_db->getErrorMsg());
            return false;
        }

        if (!$this->upload($data['uid']))
        {
            $this->setError(JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_ERROR_UPLOADING_FILE'));
            return false;
        }
        
        return true;

    }

    function getLastId() {
        return $this->_last_id;
    }
    
    function upload($uid = null)
    {
        $params = JComponentHelper::getParams('com_jobgrokapp');
        $userfile = JRequest::getVar('file_upload',null,'files','array');
        $allow_types_params = $params->get('file_upload_types','doc,docx,pdf,txt');
        $allow_types = explode(',',$allow_types_params);
        $sent_type = explode('.',$userfile['name']);

        if (!isset($userfile)) { return true; }
        
        // no file to upload, is ok - return true
        if ( $userfile['error'] == 4 && $userfile['name'] == '') return true;

        // check if any file types are set

        if ($allow_types_params == '')
        {
            $this->setError(JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_NO_FILE_TYPES_SET'));
            return false;
        }

        // poorly formatted file type e.g. not application/xml
        if ( count($sent_type) < 2)
        {
            $this->setError(JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_NO_FILE_EXTENSION_FOUND'));
            return false;
        }

        // is this file an allowable file type
        if (!in_array($sent_type[count($sent_type)-1],$allow_types))
        {
            $this->setError(JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_NOT_ALLOWABLE_FILE_TYPE'));
            return  false;
        }

        // something crapped out
        if ( $userfile['error'] || $userfile['size'] < 1 )
        {
            $this->setError(JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_TROUBLE_UPLOADING_FILE')." :".$userfile['error']);
            return false;
        }

        try
        {
            $fp = fopen($userfile['tmp_name'],'r');
            $content = fread($fp, filesize($userfile['tmp_name']));
            // $content = addslashes($content); // -- addslashes
            fclose($fp);
        }
        catch (Exception $e)
        {
            $this->setError(JTEXT::_('COM_JOBGROKAPP_MODELS_APPLICATION_TROUBLE_READING_FILE').": ".$e->getMessage());
            return false;
        }

        // At this point we have file content
        // Need to insert file content into table
        $db = $this->getDBO();

        $query = "DELETE FROM ".$db->quoteName('#__tst_jgapp_uploads'). " WHERE ".
            $db->quoteName('uid')."=".$db->Quote($uid);
        $db->setQuery($query);$db->Query();;

        // new file
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

    // get's single application data (1 row by id)
    function & getApplication()
    {
        if (!$this->_application && $this->_id != null)
        {
            $db = $this->getDBO();
            $query = "SELECT * FROM " . $db->quoteName('#__tst_jgapp_applications') . " WHERE " .
                $db->quoteName('id') . " = " . $this->_id;
            $db->setQuery($query);
            $this->_application = $db->loadObject();
            $this->getOptions();
        }
        return $this->_application;
    }

    // save the current data
    function save($data)
    {
        $table = $this->getTable();
        if (!$table->save($data))
        {
            $this->setError($table->getError());
            return false;
        }
        return true;
    }

    // increment the hit counter <<---- not used
    function hit()
    {
        $db = JFactory :: getDBO();
        $db->setQuery("UPDATE " . $db->quoteName('#_tst_jg_applications') . " SET " .
            $db->quoteName('hits') . " = " . $db->quoteName('hits') . " + 1 " .
            "WHERE id = " . $this->_id);
        $db->query();
    }

    function & getUid()
    {
        $this->_uid = $this->randomString(30);
        return $this->_uid;
    }

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

    // load the options for our templates
    function yesnoOption($option) {
        return JHTML::_('jobgrokapp.static_yesno',isset($this->_application->$option)?$this->_application->$option:null,'',$option);
    }
        
    function &getOptions()
    {
        if ( !$this->_options )
        {
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
            
            $this->_options['termination_reason']   = JHTML::_('select.genericList', $termination_reason, 'termination_reason', 'class="inputbox" '. '', 'value', 'text',
                                                             isset($this->_application->termination_reason)?$this->_application->termination_reason:null);
            $this->_options['work_preferences']     = JHTML::_('select.genericList', $work_preferences, 'work_preferences', 'class="inputbox" '. '', 'value', 'text',
                                                             isset($this->_application->work_preferences)?$this->_application->work_preferences:null);
            
            $this->_options['hired']                = $this->yesnoOption('hired');
            $this->_options['school_diploma']       = $this->yesnoOption('school_diploma');
            $this->_options['school_diploma1']      = $this->yesnoOption('school_diploma1');
            $this->_options['school_diploma2']      = $this->yesnoOption('school_diploma2');
            $this->_options['school_diploma3']      = $this->yesnoOption('school_diploma3');
            $this->_options['shiftwork']            = $this->yesnoOption('shiftwork');
            $this->_options['family']               = $this->yesnoOption('family');
            $this->_options['provideproof']         = $this->yesnoOption('provideproof');            
            $this->_options['currently_employed']   = $this->yesnoOption('currently_employed');            
            $this->_options['eligible']             = $this->yesnoOption('eligible');  
            $this->_options['worked_here_before']   = $this->yesnoOption('worked_here_before'); 
            $this->_options['job_desc_received']    = $this->yesnoOption('job_desc_received'); 
            $this->_options['understand_reqs']      = $this->yesnoOption('understand_reqs'); 
            $this->_options['on_layoff']            = $this->yesnoOption('on_layoff'); 
            $this->_options['conf_agreement']       = $this->yesnoOption('conf_agreement'); 
            $this->_options['discharged']           = $this->yesnoOption('discharged'); 
            $this->_options['convict']              = $this->yesnoOption('convict'); 
            $this->_options['contact_emp']          = $this->yesnoOption('contact_emp'); 
            $this->_options['driver_license']       = $this->yesnoOption('driver_license'); 
            $this->_options['driving_offense']      = $this->yesnoOption('driving_offense'); 
            $this->_options['dl_modified']          = $this->yesnoOption('dl_modified'); 
            $this->_options['custom_yes_no']        = $this->yesnoOption('custom_yes_no'); 
        }
        return $this->_options;
    }
}
?>
