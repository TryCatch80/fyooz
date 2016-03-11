<?php
/**
 *
 *
 * This is the application.php table for jobgrokapp
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

// our table class for the application data
class TableApplication extends JTable
{
// data for admins
    var $id = null;
    var $uid = null;
    var $email_uid = null;
    var $ssn = null;
    var $hired = null;
    var $create_date = null;
    var $hire_date = null;
    var $service_date = null;
    var $termination_date = null;
    var $termination_reason = null;
    var $job_code = null;

    var $Itemid = null;
    var $NextItemid = null;
    var $parent_id = null;
    var $child_id = null;
    var $level = null;

    // Personal Information
    var $first_name = null;
    var $last_name = null;
    var $middle_name = null;
    var $home_phone = null;
    var $work_phone = null;
    var $cell_phone = null;
    var $email_address = null;

    // Addresses (Current to Prior 2)
    var $street = null;
    var $city = null;
    var $state = null;
    var $zip_code = null;
    var $from_date = null;

    var $street1 = null;
    var $city1 = null;
    var $state1 = null;
    var $zip_code1 = null;
    var $from_date1 = null;
    var $to_date1 = null;

    var $street2 = null;
    var $city2 = null;
    var $state2 = null;
    var $zip_code2 = null;
    var $from_date2 = null;
    var $to_date2 = null;

    // Education
    var $school = null;
    var $school_city = null;
    var $school_state = null;
    var $school_diploma = null;

    var $school1 = null;
    var $school_city1 = null;
    var $school_state1 = null;
    var $school_diploma1 = null;
    var $diploma_text1 = null;
    var	$study_area1 = null;

    var $school2 = null;
    var $school_city2 = null;
    var $school_state2 = null;
    var $school_diploma2 = null;
    var $diploma_text2 = null;
    var	$study_area2 = null;

    var $school3 = null;
    var $school_city3 = null;
    var $school_state3 = null;
    var $school_diploma3 = null;
    var $diploma_text3 = null;
    var	$study_area3 = null;

    // Employment Information
    var $position = null;
    var $available_date = null;
    var $desired_pay = null;
    var $work_preferences = null;
    var $shiftwork = null;
    var $weekends = null;
    var $evenings = null;
    var $monday = null;
    var $tuesday = null;
    var $wednesday = null;
    var $thursday = null;
    var $friday = null;
    var $saturday = null;
    var $sunday = null;
    var $unavailability = null;
    var $eligible = null;
    var $provideproof = null;
    var $worked_here_before = null;
    var $worked_here_text = null;
    var $job_desc_received = null;
    var $understand_reqs = null;
    var $no_understand_reqs = null;
    var $on_layoff = null;
    var $conf_agreement = null;
    var $conf_explain = null;
    var $discharged = null;
    var $discharge_explain = null;
    var $convict = null;
    var $convict_explain = null;
    var $family = null;
    var $family_explain = null;

    // Employment History
    var $currently_employed = null;
    var $contact_emp = null;

    var $employer = null;
    var $employer_city = null;
    var $employer_state = null;
    var $employer_zip = null;
    var $employer_phone = null;
    var $employer_pos = null;
    var $employer_from = null;
    var $employer_to = null;
    var $employer_pay = null;
    var $employer_sup = null;
    var $employer_dut = null;
    var $employer_leave = null;

    var $employer1 = null;
    var $employer1_city = null;
    var $employer1_state = null;
    var $employer1_zip = null;
    var $employer1_phone = null;
    var $employer1_pos = null;
    var $employer1_from = null;
    var $employer1_to = null;
    var $employer1_pay = null;
    var $employer1_sup = null;
    var $employer1_dut = null;
    var $employer1_leave = null;

    var $employer2 = null;
    var $employer2_city = null;
    var $employer2_state = null;
    var $employer2_zip = null;
    var $employer2_phone = null;
    var $employer2_pos = null;
    var $employer2_from = null;
    var $employer2_to = null;
    var $employer2_pay = null;
    var $employer2_sup = null;
    var $employer2_dut = null;
    var $employer2_leave = null;

    var $employer3 = null;
    var $employer3_city = null;
    var $employer3_state = null;
    var $employer3_zip = null;
    var $employer3_phone = null;
    var $employer3_pos = null;
    var $employer3_from = null;
    var $employer3_to = null;
    var $employer3_pay = null;
    var $employer3_sup = null;
    var $employer3_dut = null;
    var $employer3_leave = null;

    // Job-related Skills
    var $driver_license = null;
    var $dl_number = null;
    var $dl_issued = null;
    var $driving_offense = null;
    var $driving_offense_reason = null;
    var $dl_modified = null;
    var $dl_modified_reason = null;
    var $dl_states = null;
    var $skills = null;
    var $professional = null;
    var $lists = null;

    // References
    var $ref1_name = null;
    var $ref1_address = null;
    var $ref1_telephone = null;
    var $ref1_relationship = null;
    var $ref1_years = null;

    var $ref2_name = null;
    var $ref2_address = null;
    var $ref2_telephone = null;
    var $ref2_relationship = null;
    var $ref2_years = null;

    var $ref3_name = null;
    var $ref3_address = null;
    var $ref3_telephone = null;
    var $ref3_relationship = null;
    var $ref3_years = null;

    var $ref4_name = null;
    var $ref4_address = null;
    var $ref4_telephone = null;
    var $ref4_relationship = null;
    var $ref4_years = null;

    var $custom_yes_no = null;

    var $file_name = null;
    var $text_resume = null;
    var $signature = null;
    var $referral_id = null;

    var $_params = null;
    var $_notices = null;
    
    var $_req_personal = false;
    var $_req_addresses = false;
    var $_req_education = false;
    var $_req_employment = false;
    var $_req_employers = false;
    var $_req_skills = false;
    var $_req_references = false;
    
    var $notes = null;
    var $flag_fields = array();

    function __construct(&$db)
    {
        parent::__construct( '#__tst_jgapp_applications', 'id' , $db );
    }

    function validEmail($email,$params)
    {
        /*
         *
         * Special thanks to Douglas Lovell for this function.
         * An article posted at LinuxJournal.com can be found here:
         * http://www.linuxjournal.com/article/9585?page=0,0
         *
         * 
         */
        $isValid = true;
        $atIndex = strrpos($email, "@");
        if (is_bool($atIndex) && !$atIndex)
        {
            $isValid = false;
        }
        else
        {
            $domain = substr($email, $atIndex+1);
            $local = substr($email, 0, $atIndex);
            $localLen = strlen($local);
            $domainLen = strlen($domain);
            if ($localLen < 1 || $localLen > 64)
            {
                // local part length exceeded
                $isValid = false;
            }
            else if ($domainLen < 1 || $domainLen > 255)
            {
                // domain part length exceeded
                $isValid = false;
            }
            else if ($local[0] == '.' || $local[$localLen-1] == '.')
            {
                // local part starts or ends with '.'
                $isValid = false;
            }
            else if (preg_match('/\\.\\./', $local))
            {
                // local part has two consecutive dots
                $isValid = false;
            }
            else if (!preg_match('/^[A-Za-z0-9\\-\\.]+$/', $domain))
            {
                // character not valid in domain part
                $isValid = false;
            }
            else if (preg_match('/\\.\\./', $domain))
            {
                // domain part has two consecutive dots
                $isValid = false;
            }
            else if (!preg_match('/^(\\\\.|[A-Za-z0-9!#%&`_=\\/$\'*+?^{}|~.-])+$/', str_replace("\\\\","",$local)))
            {
                // character not valid in local part unless
                // local part is quoted
                if (!preg_match('/^"(\\\\"|[^"])+"$/', str_replace("\\\\","",$local)))
                {
                    $isValid = false;
                }
            }
            $app = JFactory::getApplication();
            if ($app->isAdmin()) {
                $prefix = 'data.params.';
            } else {
                $prefix = '';
            }
            $result = true;
            if ($params->get('email_validate_checkdnsrr','0')=='1')
            {
                if ($isValid && !(checkdnsrr($domain,"MX") || checkdnsrr($domain,"A")))
                {
                    // domain not found in DNS
                    $isValid = false;
                }
            }
        }
        return $isValid;
    }


    /**
     * Validation
     *
     * @return boolean True if buffer is valid
     *
     */
    function check()
    {
        $app = JFactory::getApplication();
        $params = null;
        if ($app->isSite()) {
            $menu = new JMenuSite();
            $params = $menu->getParams(JRequest::getVar('Itemid'));
//            $menuitem   = $app->getMenu()->getActive();
//            $params = $menuitem->params;
//            $inprogress = $params->get('default_appstatus_inprogress','1');
//            $status = JRequest::getVar('status');
//            $params = $status!=$inprogress?$params:null;
        }        
        if (!$params) return true;
        

        $result = true;
        

        if ($params->get('personal_information','1') == '1')
        {
            if ($params->get('required_first_name','1') == '0' &&
                $params->get('personal_information_first_name','1') == '1')
            {
                if (!$this->first_name)
                {
                    $this->_notices[] = $params->get('required_notice_first_name',JTEXT::_('COM_JOBGROKAPP_TABLES_APPLICATION_FIRST_NAME_REQUIRED'));
                    $this->_req_personal = true;
                    $this->flag_fields[] = 'first_name';
                    $result = false;
                }
            }

            if ($params->get('required_middle_name','1') == '0' &&
                $params->get('personal_information_middle_name','1') == '1')
            {
                if (!$this->middle_name)
                {
                    $this->_notices[] = $params->get('required_notice_middle_name',JTEXT::_('COM_JOBGROKAPP_TABLES_APPLICATION_MIDDLE_NAME_REQUIRED'));
                    $this->_req_personal = true;
                    $this->flag_fields[] = 'middle_name';
                    $result = false;
                }
            }

            if ($params->get('required_last_name','1') == '0' &&
                $params->get('personal_information_last_name','1') == '1')
            {
                if (!$this->last_name)
                {
                    $this->_notices[] = $params->get('required_notice_last_name',JTEXT::_('COM_JOBGROKAPP_TABLES_APPLICATION_LAST_NAME_REQUIRED'));
                    $this->_req_personal = true;
                    $this->flag_fields[] = 'last_name';
                    $result = false;
                }
            }

            if ($params->get('required_home_phone','1') == '0'&&
                $params->get('personal_information_home_phone','1') == '1')
            {
                if (!$this->home_phone)
                {
                    $this->_notices[] = $params->get('required_notice_home_phone',JTEXT::_('COM_JOBGROKAPP_TABLES_APPLICATION_HOME_PHONE_REQUIRED'));
                    $this->_req_personal = true;
                    $this->flag_fields[] = 'home_phone';
                    $result = false;
                }
            }

            if ($params->get('required_work_phone','1') == '0'&&
                $params->get('personal_information_work_phone','1') == '1')
            {
                if (!$this->work_phone)
                {
                    $this->_notices[] = $params->get('required_notice_work_phone',JTEXT::_('COM_JOBGROKAPP_TABLES_APPLICATION_WORK_PHONE_REQUIRED'));
                    $this->_req_personal = true;
                    $this->flag_fields[] = 'work_phone';
                    $result = false;
                }
            }

            if ($params->get('required_cell_phone','1') == '0'&&
                $params->get('personal_information_cell_phone','1') == '1')
            {
                if (!$this->cell_phone)
                {
                    $this->_notices[] = $params->get('required_notice_cell_phone',JTEXT::_('COM_JOBGROKAPP_TABLES_APPLICATION_CELL_PHONE_REQUIRED'));
                    $this->_req_personal = true;
                    $this->flag_fields[] = 'cell_phone';
                    $result = false;
                }
            }
            
            if ($this->email_address && !$this->validEmail($this->email_address,$params) &&
                    $params->get('personal_information_email_address','1') == '1')
            {
                $this->email_address = null; $this->_set('email_address',null);
                $this->_notices[] = $params->get('required_notice_invalid_email',JTEXT::_('COM_JOBGROKAPP_TABLES_APPLICATION_INVALID_EMAIL_ADDRESS'));
                $this->_req_personal = true;
                $this->flag_fields[] = 'email_address';
                $result = false;
            }

            if ($params->get('required_email_address','1') == '0'&&
                $params->get('personal_information_email_address','1') == '1')
            {
                if (!$this->email_address)
                {
                    $this->_notices[] = $params->get('required_notice_email_address',JTEXT::_('COM_JOBGROKAPP_TABLES_APPLICATION_EMAIL_ADDRESS_REQUIRED'));
                    $this->_req_personal = true;
                    $this->flag_fields[] = 'email_address';
                    $result = false;
                }
            }
            
            if ($params->get('required_ssn','1') == '0' &&
                $params->get('personal_information_ssn','0') == '1')
            {
                if (!$this->ssn)
                {
                    $this->_notices[] = $params->get('required_notice_ssn',JTEXT::_('COM_JOBGROKAPP_TABLES_APPLICATION_SSN_REQUIRED'));
                    $this->_req_personal = true;
                    $this->flag_fields[] = 'ssn';
                    $result = false;
                }
            }

        }
        if ($params->get('addresses_current','1') == '1')
        {
            if ($params->get('required_address_street','1') == '0'&&
                $params->get('addresses_street','1') == '1')
            {
                if (!$this->street)
                {
                    $this->_notices[] = $params->get('required_notice_address_street',JTEXT::_('COM_JOBGROKAPP_TABLES_APPLICATION_STREET_REQUIRED'));
                    $this->_req_addresses = true;
                    $this->flag_fields[] = 'street';
                    $result = false;
                }
            }

            if ($params->get('required_address_city','1') == '0'&&
                $params->get('addresses_city','1') == '1')
            {
                if (!$this->city)
                {
                    $this->_notices[] = $params->get('required_notice_address_city',JTEXT::_('COM_JOBGROKAPP_TABLES_APPLICATION_CITY_REQUIRED'));
                    $this->_req_addresses = true;
                    $this->flag_fields[] = 'city';
                    $result = false;
                }
            }

            if ($params->get('required_address_state','1') == '0'&&
                $params->get('addresses_state','1') == '1')
            {
                if (!$this->state)
                {
                    $this->_notices[] = $params->get('required_notice_address_state',JTEXT::_('COM_JOBGROKAPP_TABLES_APPLICATION_STATE_REQUIRED'));
                    $this->_req_addresses = true;
                    $this->flag_fields[] = 'state';
                    $result = false;
                }
            }

            if ($params->get('required_address_zip_code','1') == '0'&&
                $params->get('addresses_zip_code','1') == '1')
            {
                if (!$this->zip_code)
                {
                    $this->_notices[] = $params->get('required_notice_address_zip_code',JTEXT::_('COM_JOBGROKAPP_TABLES_APPLICATION_ZIP_CODE_REQUIRED'));
                    $this->_req_addresses = true;
                    $this->flag_fields[] = 'zip_code';
                    $result = false;
                }
            }

            if ($params->get('required_address_from_date','1') == '0'&&
                $params->get('addresses_since','1') == '1')
            {
                if (!$this->from_date)
                {
                    $this->_notices[] = $params->get('required_notice_address_from_date',JTEXT::_('COM_JOBGROKAPP_TABLES_APPLICATION_FROM_DATE_REQUIRED'));
                    $this->_req_addresses = true;
                    $this->flag_fields[] = 'from_date';
                    $result = false;
                }
            }
        }
        if ($params->get('employment_history','1') == '1')
        {
            if ($params->get('required_employment_history_employer','1') == '0' &&
                $params->get('employment_history_employer','1') == '1')
            {
                if (!$this->employer)
                {
                    $this->_notices[] = $params->get('required_notice_employment_history_employer',JTEXT::_('COM_JOBGROKAPP_TABLES_APPLICATION_EMPLOYER_REQUIRED'));
                    $this->_req_employers = true;
                    $this->flag_fields[] = 'employer';
                    $result = false;
                }
            }

            if ($params->get('required_employment_history_city','1') == '0' &&
                $params->get('employment_history_city','1') == '1')
            {
                if (!$this->employer_city)
                {
                    $this->_notices[] = $params->get('required_notice_employment_history_city',JTEXT::_('COM_JOBGROKAPP_TABLES_APPLICATION_EMPLOYER_CITY_REQUIRED'));
                    $this->_req_employers = true;
                    $this->flag_fields[] = 'employer_city';
                    $result = false;
                }
            }

            if ($params->get('required_employment_history_state','1') == '0' &&
                $params->get('employment_history_state','1') == '1')
            {
                if (!$this->employer_state)
                {
                    $this->_notices[] = $params->get('required_notice_employment_history_state',JTEXT::_('COM_JOBGROKAPP_TABLES_APPLICATION_EMPLOYER_STATE_REQUIRED'));
                    $this->_req_employers = true;
                    $this->flag_fields[] = 'employer_state';
                    $result = false;
                }
            }

            if ($params->get('required_employment_history_zip_code','1') == '0' &&
                $params->get('employment_history_zip_code','1') == '1')
            {
                if (!$this->employer_zip)
                {
                    $this->_notices[] = $params->get('required_notice_employment_history_zip_code',JTEXT::_('COM_JOBGROKAPP_TABLES_APPLICATION_EMPLOYER_ZIP_CODE_REQUIRED'));
                    $this->_req_employers = true;
                    $this->flag_fields[] = 'employer_zip';
                    $result = false;
                }
            }

            if ($params->get('required_employment_history_phone','1') == '0' &&
                $params->get('employment_history_phone','1') == '1')
            {
                if (!$this->employer_phone)
                {
                    $this->_notices[] = $params->get('required_notice_employment_history_phone',JTEXT::_('COM_JOBGROKAPP_TABLES_APPLICATION_EMPLOYER_PHONE_REQUIRED'));
                    $this->_req_employers = true;
                    $this->flag_fields[] = 'employer_phone';
                    $result = false;
                }
            }

            if ($params->get('required_employment_history_position','1') == '0' &&
                $params->get('employment_history_position','1') == '1')
            {
                if (!$this->employer_pos)
                {
                    $this->_notices[] = $params->get('required_notice_employment_history_position',JTEXT::_('COM_JOBGROKAPP_TABLES_APPLICATION_EMPLOYER_POSITION_REQUIRED'));
                    $this->_req_employers = true;
                    $this->flag_fields[] = 'employer_pos';
                    $result = false;
                }
            }

            if ($params->get('required_employment_history_from','1') == '0' &&
                $params->get('employment_history_from','1') == '1')
            {
                if (!$this->employer_from)
                {
                    $this->_notices[] = $params->get('required_notice_employment_history_from',JTEXT::_('COM_JOBGROKAPP_TABLES_APPLICATION_EMPLOYER_FROM_REQUIRED'));
                    $this->_req_employers = true;
                    $this->flag_fields[] = 'employer_from';
                    $result = false;
                }
            }

            if ($params->get('required_employment_history_to','1') == '0' &&
                $params->get('employment_history_to','1') == '1')
            {
                if (!$this->employer_to)
                {
                    $this->_notices[] = $params->get('required_notice_employment_history_to',JTEXT::_('COM_JOBGROKAPP_TABLES_APPLICATION_EMPLOYER_TO_REQUIRED'));
                    $this->_req_employers = true;
                    $this->flag_fields[] = 'employer_to';
                    $result = false;
                }
            }

            if ($params->get('required_employment_history_pay','1') == '0' &&
                $params->get('employment_history_pay','1') == '1')
            {
                if (!$this->employer_pay)
                {
                    $this->_notices[] = $params->get('required_notice_employment_history_pay',JTEXT::_('COM_JOBGROKAPP_TABLES_APPLICATION_EMPLOYER_PAY_REQUIRED'));
                    $this->_req_employers = true;
                    $this->flag_fields[] = 'employer_pay';
                    $result = false;
                }
            }

            if ($params->get('required_employment_history_supervisor','1') == '0' &&
                $params->get('employment_history_supervisor','1') == '1')
            {
                if (!$this->employer_sup)
                {
                    $this->_notices[] = $params->get('required_notice_employment_history_supervisor',JTEXT::_('COM_JOBGROKAPP_TABLES_APPLICATION_EMPLOYER_SUPERVISOR_REQUIRED'));
                    $this->_req_employers = true;
                    $this->flag_fields[] = 'employer_sup';
                    $result = false;
                }
            }

            if ($params->get('required_employment_history_duties','1') == '0' &&
                $params->get('employment_history_duties','1') == '1')
            {
                if (!$this->employer_dut)
                {
                    $this->_notices[] = $params->get('required_notice_employment_history_duties',JTEXT::_('COM_JOBGROKAPP_TABLES_APPLICATION_EMPLOYER_DUTIES_REQUIRED'));
                    $this->_req_employers = true;
                    $this->flag_fields[] = 'employer_dut';
                    $result = false;
                }
            }

            if ($params->get('required_employment_history_reason','1') == '0' &&
                $params->get('employment_history_reason','1') == '1')
            {
                if (!$this->employer_leave)
                {
                    $this->_notices[] = $params->get('required_notice_employment_history_reason',JTEXT::_('COM_JOBGROKAPP_TABLES_APPLICATION_EMPLOYER_REASON_REQUIRED'));
                    $this->_req_employers = true;
                    $this->flag_fields[] = 'employer_leave';
                    $result = false;
                }
            }
        }
        if ($params->get('references','1') == '1')
        {
            if ($params->get('required_references_name','1') == '0')
            {
                if ((!$this->ref1_name && $params->get('references_1','1') == '1') ||
                    (!$this->ref2_name && $params->get('references_2','1') == '1') ||
                    (!$this->ref3_name && $params->get('references_3','1') == '1') ||
                    (!$this->ref3_name && $params->get('references_4','1') == '1'))
                {
                    $this->_notices[] = $params->get('required_notice_references_name',JTEXT::_('COM_JOBGROKAPP_TABLES_APPLICATION_REFERENCES_NAME_REQUIRED'));
                    $this->_req_references = true;
                    $result = false;
                }
            }

            if ($params->get('required_references_address','1') == '0')
            {
                if ((!$this->ref1_address && $params->get('references_1','1') == '1') ||
                    (!$this->ref2_address && $params->get('references_2','1') == '1') ||
                    (!$this->ref3_address && $params->get('references_3','1') == '1') ||
                    (!$this->ref4_address && $params->get('references_4','1') == '1'))
                {
                    $this->_notices[] = $params->get('required_notice_references_address',JTEXT::_('COM_JOBGROKAPP_TABLES_APPLICATION_REFERENCES_ADDRESS_REQUIRED'));
                    $this->_req_references = true;
                    $result = false;
                }
            }

            if ($params->get('required_references_telephone','1') == '0')
            {
                if ((!$this->ref1_telephone && $params->get('references_1','1') == '1') ||
                    (!$this->ref2_telephone && $params->get('references_2','1') == '1') ||
                    (!$this->ref3_telephone && $params->get('references_3','1') == '1') ||
                    (!$this->ref4_telephone && $params->get('references_4','1') == '1'))
                {
                    $this->_notices[] = $params->get('required_notice_references_telephone',JTEXT::_('COM_JOBGROKAPP_TABLES_APPLICATION_REFERENCES_TELEPHONE_REQUIRED'));
                    $this->_req_references = true;
                    $result = false;
                }
            }

            if ($params->get('required_references_relationship','1') == '0')
            {
                if ((!$this->ref1_relationship && $params->get('references_1','1') == '1') ||
                    (!$this->ref2_relationship && $params->get('references_2','1') == '1') ||
                    (!$this->ref3_relationship && $params->get('references_3','1') == '1') ||
                    (!$this->ref4_relationship && $params->get('references_4','1') == '1'))
                {
                    $this->_notices[] = $params->get('required_notice_references_relationship',JTEXT::_('COM_JOBGROKAPP_TABLES_APPLICATION_REFERENCES_RELATIONSHIP_REQUIRED'));
                    $this->_req_references = true;
                    $result = false;
                }
            }

            if ($params->get('required_references_years','1') == '0')
            {
                if ((!$this->ref1_years && $params->get('references_1','1') == '1') ||
                    (!$this->ref2_years && $params->get('references_2','1') == '1') ||
                    (!$this->ref3_years && $params->get('references_3','1') == '1') ||
                    (!$this->ref4_years && $params->get('references_4','1') == '1'))
                {
                    $this->_notices[] = $params->get('required_notice_references_years',JTEXT::_('COM_JOBGROKAPP_TABLES_APPLICATION_REFERENCES_YEARS_REQUIRED'));
                    $this->_req_references = true;
                    $result = false;
                }
            }
        }

        if ($params->get('education','1') == '1')
        {
            if ($params->get('school_diploma1','1') == '1')
            {
                if ($this->school_diploma1 == '1')
                {
                    if (!$this->diploma_text1)
                    {
                        $this->_notices[] = $params->get('education_notice_diploma',JTEXT::_('COM_JOBGROKAPP_TABLES_APPLICATION_DIPLOMA_REQUIRED'));
                        $this->_req_education = true;
                        $this->flag_fields[] = 'diploma_text';
                        $result = false;
                    }
                    if (!$this->study_area1)
                    {
                        $this->_notices[] = $params->get('education_notice_study',JTEXT::_('COM_JOBGROKAPP_TABLES_APPLICATION_STUDY_AREA_REQUIRED'));
                        $this->_req_education = true;
                        $this->flag_fields[] = 'study_area1';
                        $result = false;
                    }
                }
            }

            if ($params->get('school_diploma2','1') == '1')
            {
                if ($this->school_diploma2 == '1')
                {
                    if (!$this->diploma_text2)
                    {
                        $this->_notices[] = $params->get('education_notice_diploma',JTEXT::_('COM_JOBGROKAPP_TABLES_APPLICATION_DIPLOMA_REQUIRED'));
                        $this->_req_education = true;
                        $this->flag_fields[] = 'diploma_text2';
                        $result = false;
                    }
                    if (!$this->study_area2)
                    {
                        $this->_notices[] = $params->get('education_notice_study',JTEXT::_('COM_JOBGROKAPP_TABLES_APPLICATION_STUDY_AREA_REQUIRED'));
                        $this->_req_education = true;
                        $this->flag_fields[] = 'study_area2';
                        $result = false;
                    }
                }
            }

            if ($params->get('school_diploma3','1') == '1')
            {
                if ($this->school_diploma3 == '1')
                {
                    if (!$this->diploma_text3)
                    {
                        $this->_notices[] = $params->get('education_notice_diploma',JTEXT::_('COM_JOBGROKAPP_TABLES_APPLICATION_DIPLOMA_REQUIRED'));
                        $this->_req_education = true;
                        $this->flag_fields[] = 'diploma_text3';
                        $result = false;
                    }
                    if (!$this->study_area3)
                    {
                        $this->_notices[] = $params->get('education_notice_study',JTEXT::_('COM_JOBGROKAPP_TABLES_APPLICATION_STUDY_AREA_REQUIRED'));
                        $this->_req_education = true;
                        $this->flag_fields[] = 'study_area3';
                        $result = false;
                    }
                }
            }
        }

        if ($params->get('employment_information','1') == '1')
        {
            if ($params->get('employment_information_question_1','1') == '1')
            {
                if ($this->eligible == '0')
                {
                    if (!($this->provideproof == '1' || $this->provideproof == '0')) 
                    {
                        $this->_notices[] = $params->get('employment_notice_information_question_1',JTEXT::_('COM_JOBGROKAPP_TABLES_APPLICATION_PROVIDE_PROOF_REQUIRED'));
                        $this->_req_employment = true;
                        $result = false;
                    }
                }
            }
            
            if ($params->get('employment_information_question_2','1') == '1')
            {
                if ($this->worked_here_before == $params->get('force_question_2_followup','1'))
                {
                    if (!$this->worked_here_text)
                    {
                        $this->_notices[] = $params->get('employment_notice_information_question_2',JTEXT::_('COM_JOBGROKAPP_TABLES_APPLICATION_WORKED_HERE_REQUIRED'));
                        $this->_req_employment = true;
                        $this->flag_fields[] = 'worked_here_text';
                        $result = false;
                    }
                }
            }

            if ($params->get('employment_information_question_4','1') == '1')
            {
                if ($this->understand_reqs == $params->get('force_question_4_followup','0'))
                {
                    if (!$this->no_understand_reqs)
                    {
                        $this->_notices[] =  $params->get('employment_notice_information_question_4',JTEXT::_('COM_JOBGROKAPP_TABLES_APPLICATION_UNDERSTAND_REQS_REQUIRED'));
                        $this->_req_employment = true;
                        $this->flag_fields[] = 'no_understand_reqs';
                        $result = false;
                    }
                }
            }

            if ($params->get('employment_information_question_6','1') == '1')
            {
                if ($this->conf_agreement == $params->get('force_question_6_followup','1'))
                {
                    if (!$this->conf_explain)
                    {
                        $this->_notices[] =  $params->get('employment_notice_information_question_6',JTEXT::_('COM_JOBGROKAPP_TABLES_APPLICATION_CONF_EXPLAIN_REQUIRED'));
                        $this->_req_employment = true;
                        $this->flag_fields[] = 'conf_explain';
                        $result = false;
                    }
                }
            }

            if ($params->get('employment_information_question_7','1') == '1')
            {
                if ($this->discharged == $params->get('force_question_7_followup','1'))
                {
                    if (!$this->discharge_explain)
                    {
                        $this->_notices[] =  $params->get('employment_notice_information_question_7',JTEXT::_('COM_JOBGROKAPP_TABLES_APPLICATION_DISCHARGE_EXPLAIN_REQUIRED'));
                        $this->_req_employment = true;
                        $this->flag_fields[] = 'discharge_explain';
                        $result = false;
                    }
                }
            }

            if ($params->get('employment_information_question_8','1') == '1')
            {
                if ($this->convict == $params->get('force_question_8_followup','1'))
                {
                    if (!$this->convict_explain)
                    {
                        $this->_notices[] =  $params->get('employment_notice_information_question_8',JTEXT::_('COM_JOBGROKAPP_TABLES_APPLICATION_CONVICT_EXPLAIN_REQUIRED'));
                        $this->_req_employment = true;
                        $this->flag_fields[] = 'convict_explain';
                        $result = false;
                    }
                }
            }
            
            if ($params->get('employment_information_question_9','1') == '1')
            {
                if ($this->family == $params->get('force_question_9_followup','1'))
                {
                    if (!$this->family_explain)
                    {
                        $this->_notices[] =  $params->get('employment_notice_information_question_9',JTEXT::_('COM_JOBGROKAPP_TABLES_APPLICATION_FAMILY_EXPLAINED_REQUIRED'));
                        $this->_req_employment = true;
                        $this->flag_fields[] = 'family_explain';
                        $result = false;
                    }
                }
            }
        }

        if ($params->get('job_related_skills','1') == '1')
        {
            if ($params->get('job_related_skills_q1','1') == '1')
            {
                if ($this->driver_license == $params->get('force_vquestion_1_followup','1'))
                {
                    if (!$this->dl_number)
                    {
                        $this->_notices[] = $params->get('job_related_skills_notice_q1a',JTEXT::_('COM_JOBGROKAPP_TABLES_APPLICATION_DL_NUMBER_REQUIRED'));
                        $this->_req_skills = true;
                        $this->flag_fields[] = 'dl_number';
                        $result = false;
                    }
                    if (!$this->dl_issued)
                    {
                        $this->_notices[] = $params->get('job_related_skills_notice_q1b',JTEXT::_('COM_JOBGROKAPP_TABLES_APPLICATION_DL_ISSUED_REQUIRED'));
                        $this->_req_skills = true;
                        $this->flag_fields[] = 'dl_issued';
                        $result = false;
                    }
                }
            }
            if ($params->get('job_related_skills_q2','1') == '1')
            {
                if ($params->get('job_related_skills_q2_reason','1') == '1')
                {
                    if ($this->driving_offense == $params->get('force_vquestion_2_followup','1'))
                    {
                        if (!$this->driving_offense_reason)
                        {
                            $this->_notices[] = $params->get('job_related_skills_notice_q2',JTEXT::_('COM_JOBGROKAPP_TABLES_APPLICATION_DRIVING_OFFENSE_REASON_REQUIRED'));
                            $this->_req_skills = true;
                            $this->flag_fields[] = 'driving_offense_reason';
                            $result = false;
                        }
                    }
                }
            }
            if ($params->get('job_related_skills_q3','1') == '1')
            {
                if ($params->get('job_related_skills_q3_reason','1') == '1')
                {
                    if ($this->dl_modified == $params->get('force_vquestion_3_followup','1'))
                    {
                        if (!$this->dl_modified_reason)
                        {
                            $this->_notices[] = $params->get('job_related_skills_notice_q3',JTEXT::_('COM_JOBGROKAPP_TABLES_APPLICATION_DL_MODIFIED_REASON_REQUIRED'));
                            $this->_req_skills = true;
                            $this->flag_fields[] = 'dl_modified_reason';
                            $result = false;
                        }
                    }
                }
            }
        }

        if ($params->get('use_captcha','1') == '1')
        {
            $captcha_entered = JRequest::getVar('captcha_entered','','POST','ALNUM');
            $session = JFactory::getSession();
            $captcha = $session->get('captcha',null,'application');
            if ($captcha_entered != $captcha)
            {
                $this->_notices[] = JTEXT::_('COM_JOBGROKAPP_TABLES_APPLICATION_CAPTCHA_INCORRECT');
                $this->flag_fields[] = 'captcha';
                $result = false;
            }
        }
        
        if ($params->get('use_captcha','1') == '2')
        {
            require_once('components/com_jobgrokapp/views/application/tmpl/recaptchalib.php');
            $privatekey = $params->get('recaptcha_privatekey');
            $resp = recaptcha_check_answer ($privatekey,
                                            $_SERVER["REMOTE_ADDR"],
                                            $_POST["recaptcha_challenge_field"],
                                            $_POST["recaptcha_response_field"]);
            if (!$resp->is_valid) {
                $this->_notices[] = JTEXT::_('COM_JOBGROKAPP_TABLES_APPLICATION_CAPTCHA_INCORRECT');
                $this->flag_fields[] = 'captcha';
                $result = false;
            } 
        }

        if ($params->get('signature','1') == '1' &&
            $params->get('required_signature','1') == '0' &&
            !$this->signature)
        {
            $this->_notices[] = $params->get('required_notice_signature',JTEXT::_('COM_JOBGROKAPP_TABLES_APPLICATION_SIGNATURE_REQUIRED'));
            $this->flag_fields[] = 'signature';
            $result = false;
        }

        $file = JRequest::getVar('file_upload', null, 'files', 'array');        
        if ($file['error'] == '0' && $this->file_name) {
            jimport('joomla.filesystem.file');
            $allowed_file_extensions = explode(",", $params->get('file_upload_types','doc,docx,pdf,txt'));
            $allowed_mime_types = explode(",", $params->get('file_mime_types',''));
            $allowed_file_size = (int)$params->get('file_upload_max_size','1045876');
            $check_mime_type = $params->get('file_restrict_by_mimetype','0')=='0'?false:true;
            $file_extension = JFile::getExt($file['name']);
            if (!in_array($file_extension,$allowed_file_extensions)) {
                $this->_notices[] = JTEXT::_('COM_JOBGROKAPP_TABLES_APPLICATION_INVALID_FILE_EXTENSION').JTEXT::_('ALLOWED_FILE_EXTENSION').': '.$params->get('file_upload_types','doc,docx,pdf,txt');
                $result = false;
            }
            if ($check_mime_type) {
                if (!in_array($file['type'],$allowed_mime_types)) {
                    $this->_notices[] = JTEXT::_('COM_JOBGROKAPP_TABLES_APPLICATION_INVALID_FILE_MIME_TYPE').' '.JTEXT::_('ALLOWED_FILE_MIME_TYPE').': '.$params->get('file_mime_types','');
                    $result = false;
                }
            }
            if ($file['size'] > $allowed_file_size) {
                $this->_notices[] = JTEXT::_('COM_JOBGROKAPP_TABLES_APPLICATION_FILE_SIZE_TOO_LARGE').' '.JTEXT::_('MAX_FILE_SIZE').' '.$allowed_file_size.' Bytes';
                $result = false;
            }
        } elseif ($file['error'] == '2') {
                $this->_notices[] = JTEXT::_('COM_JOBGROKAPP_TABLES_APPLICATION_FILE_SIZE_TOO_LARGE').' '.JTEXT::_('MAX_FILE_SIZE').' '.$allowed_file_size.' Bytes';
                $result = false;            
        }

        
        if (!$result) {
            if ($this->file_name) {
                $this->file_name = null;
                $this->_notices[] = JTEXT::_('COM_JOBGROKAPP_TABLES_APPLICATION_RESELECT_FILE');
            }
            $this->saveSubmittedDataForRepost();
        }
        
        // if (!$result) $this->saveSubmittedDataForRepost();
        return $result;
    }

    function saveSubmittedDataForRepost()
    {

        $first_name = $this->_get('first_name');
        $middle_name = $this->_get('middle_name');
        $last_name = $this->_get('last_name');
        $home_phone = $this->_get('home_phone');
        $work_phone = $this->_get('work_phone');
        $cell_phone = $this->_get('cell_phone');
        $email_address = $this->_get('email_address');
        $ssn = $this->_get('ssn');

        $street = $this->_get('street');
        $city = $this->_get('city');
        $state = $this->_get('state');
        $zip_code = $this->_get('zip_code');
        $from_date = $this->_get('from_date');

        $street1 = $this->_get('street1');
        $city1 = $this->_get('city1');
        $state1 = $this->_get('state1');
        $zip_code1 = $this->_get('zip_code1');
        $from_date1 = $this->_get('from_date1');
        $to_date1 = $this->_get('to_date1');

        $street2 = $this->_get('street2');
        $city2 = $this->_get('city2');
        $state2 = $this->_get('state2');
        $zip_code2 = $this->_get('zip_code2');
        $from_date2 = $this->_get('from_date2');
        $to_date2 = $this->_get('to_date2');

        $school = $this->_get('school');
        $school_city = $this->_get('school_city');
        $school_state = $this->_get('school_state');
        $school_diploma = $this->_get('school_diploma');

        $school1 = $this->_get('school1');
        $school_city1 = $this->_get('school_city1');
        $school_state1 = $this->_get('school_state1');
        $school_diploma1 = $this->_get('school_diploma1');
        $diploma_text1 = $this->_get('diploma_text1');
        $study_area1 = $this->_get('study_area1');

        $school2 = $this->_get('school2');
        $school_city2 = $this->_get('school_city2');
        $school_state2 = $this->_get('school_state2');
        $school_diploma2 = $this->_get('school_diploma2');
        $diploma_text2 = $this->_get('diploma_text2');
        $study_area2 = $this->_get('study_area2');

        $school3 = $this->_get('school3');
        $school_city3 = $this->_get('school_city3');
        $school_state3 = $this->_get('school_state3');
        $school_diploma3 = $this->_get('school_diploma3');
        $diploma_text3 = $this->_get('diploma_text3');
        $study_area3 = $this->_get('study_area3');

        $position = $this->_get('position');
        $available_date = $this->_get('available_date');
        $desired_pay = $this->_get('desired_pay');
        $work_preferences = $this->_get('work_preferences');
        $weekends = $this->_get('weekends');
        $evenings = $this->_get('evenings');
        $monday = $this->_get('monday');
        $tuesday = $this->_get('tuesday');
        $wednesday = $this->_get('wednesday');
        $thursday = $this->_get('thursday');
        $friday = $this->_get('friday');
        $saturday = $this->_get('saturday');
        $sunday = $this->_get('sunday');
        $unavailability = $this->_get('unavailability');
        $shiftwork = $this->_get('shiftwork');
        $eligible = $this->_get('eligible');
        $worked_here_before = $this->_get('worked_here_before');
        $worked_here_text = $this->_get('worked_here_text');
        $job_desc_received = $this->_get('job_desc_received');
        $understand_reqs = $this->_get('understand_reqs');
        $no_understand_reqs = $this->_get('no_understand_reqs');
        $on_layoff = $this->_get('on_layoff');
        $conf_agreement = $this->_get('conf_agreement');
        $conf_explain = $this->_get('conf_explain');
        $discharged = $this->_get('discharged');
        $discharge_explain = $this->_get('discharge_explain');
        $convict = $this->_get('convict');
        $convict_explain = $this->_get('convict_explain');
        $family = $this->_get('family');
        $family_explain = $this->_get('family_explain');

        // Employment History
        $contact_emp = $this->_get('contact_emp');

        $employer = $this->_get('employer');
        $employer_city = $this->_get('employer_city');
        $employer_state = $this->_get('employer_state');
        $employer_zip = $this->_get('employer_zip');
        $employer_phone = $this->_get('employer_phone');
        $employer_pos = $this->_get('employer_pos');
        $employer_from = $this->_get('employer_from');
        $employer_to = $this->_get('employer_to');
        $employer_pay = $this->_get('employer_pay');
        $employer_sup = $this->_get('employer_sup');
        $employer_dut = $this->_get('employer_dut');
        $employer_leave = $this->_get('employer_leave');

        $employer1 = $this->_get('employer1');
        $employer1_city = $this->_get('employer1_city');
        $employer1_state = $this->_get('employer1_state');
        $employer1_zip = $this->_get('employer1_zip');
        $employer1_phone = $this->_get('employer1_phone');
        $employer1_pos = $this->_get('employer1_pos');
        $employer1_from = $this->_get('employer1_from');
        $employer1_to = $this->_get('employer1_to');
        $employer1_pay = $this->_get('employer1_pay');
        $employer1_sup = $this->_get('employer1_sup');
        $employer1_dut = $this->_get('employer1_dut');
        $employer1_leave = $this->_get('employer1_leave');

        $employer2 = $this->_get('employer2');
        $employer2_city = $this->_get('employer2_city');
        $employer2_state = $this->_get('employer2_state');
        $employer2_zip = $this->_get('employer2_zip');
        $employer2_phone = $this->_get('employer2_phone');
        $employer2_pos = $this->_get('employer2_pos');
        $employer2_from = $this->_get('employer2_from');
        $employer2_to = $this->_get('employer2_to');
        $employer2_pay = $this->_get('employer2_pay');
        $employer2_sup = $this->_get('employer2_sup');
        $employer2_dut = $this->_get('employer2_dut');
        $employer2_leave = $this->_get('employer2_leave');

        $employer3 = $this->_get('employer3');
        $employer3_city = $this->_get('employer3_city');
        $employer3_state = $this->_get('employer3_state');
        $employer3_zip = $this->_get('employer3_zip');
        $employer3_phone = $this->_get('employer3_phone');
        $employer3_pos = $this->_get('employer3_pos');
        $employer3_from = $this->_get('employer3_from');
        $employer3_to = $this->_get('employer3_to');
        $employer3_pay = $this->_get('employer3_pay');
        $employer3_sup = $this->_get('employer3_sup');
        $employer3_dut = $this->_get('employer3_dut');
        $employer3_leave = $this->_get('employer3_leave');

        $driver_license = $this->_get('driver_license');
        $dl_number = $this->_get('dl_number');
        $dl_issued = $this->_get('dl_issued');
        $driving_offense = $this->_get('driving_offense');
        $driving_offense_reason = $this->_get('driving_offense_reason');
        $dl_modified = $this->_get('dl_modified');
        $dl_modified_reason = $this->_get('dl_modified_reason');
        $dl_states = $this->_get('dl_states');
        $skills = $this->_get('skills');
        $professional = $this->_get('professional');

        $ref1_name = $this->_get('ref1_name');
        $ref1_address = $this->_get('ref1_address');
        $ref1_telephone = $this->_get('ref1_telephone');
        $ref1_relationship = $this->_get('ref1_relationship');
        $ref1_years = $this->_get('ref1_years');

        $ref2_name = $this->_get('ref2_name');
        $ref2_address = $this->_get('ref2_address');
        $ref2_telephone = $this->_get('ref2_telephone');
        $ref2_relationship = $this->_get('ref2_relationship');
        $ref2_years = $this->_get('ref2_years');

        $ref3_name = $this->_get('ref3_name');
        $ref3_address = $this->_get('ref3_address');
        $ref3_telephone = $this->_get('ref3_telephone');
        $ref3_relationship = $this->_get('ref3_relationship');
        $ref3_years = $this->_get('ref3_years');

        $ref4_name = $this->_get('ref4_name');
        $ref4_address = $this->_get('ref4_address');
        $ref4_telephone = $this->_get('ref4_telephone');
        $ref4_relationship = $this->_get('ref4_relationship');
        $ref4_years = $this->_get('ref4_years');

        $text_resume = $this->_get('text_resume');
        $lists = json_encode($this->_get('lists','array'));

        $file_name = $this->_get('file_name');
        $signature = $this->_get('signature');
        $referral_id = $this->_get('referral_id');


        $this->_set('first_name',$first_name);
        $this->_set('middle_name',$middle_name);
        $this->_set('last_name',$last_name);
        $this->_set('home_phone',$home_phone);
        $this->_set('work_phone',$work_phone);
        $this->_set('cell_phone',$cell_phone);
        $this->_set('email_address',$email_address);
        $this->_set('ssn',$ssn);

        $this->_set('street',$street);
        $this->_set('city',$city);
        $this->_set('state',$state);
        $this->_set('zip_code',$zip_code);
        $this->_set('from_date',$from_date);

        $this->_set('street1',$street1);
        $this->_set('city1',$city1);
        $this->_set('state1',$state1);
        $this->_set('zip_code1',$zip_code1);
        $this->_set('from_date1',$from_date1);
        $this->_set('to_date1',$to_date1);

        $this->_set('street2',$street2);
        $this->_set('city2',$city2);
        $this->_set('state2',$state2);
        $this->_set('zip_code2',$zip_code2);
        $this->_set('from_date2',$from_date2);
        $this->_set('to_date2',$to_date2);

        $this->_set('school',$school);
        $this->_set('school_city',$school_city);
        $this->_set('school_state',$school_state);
        $this->_set('school_diploma',$school_diploma);

        $this->_set('school1',$school1);
        $this->_set('school_city1',$school_city1);
        $this->_set('school_state1',$school_state1);
        $this->_set('school_diploma1',$school_diploma1);
        $this->_set('diploma_text1',$diploma_text1);
        $this->_set('study_area1',$study_area1);

        $this->_set('school2',$school2);
        $this->_set('school_city2',$school_city2);
        $this->_set('school_state2',$school_state2);
        $this->_set('school_diploma2',$school_diploma2);
        $this->_set('diploma_text2',$diploma_text2);
        $this->_set('study_area2',$study_area2);

        $this->_set('school3',$school3);
        $this->_set('school_city3',$school_city3);
        $this->_set('school_state3',$school_state3);
        $this->_set('school_diploma3',$school_diploma3);
        $this->_set('diploma_text3',$diploma_text3);
        $this->_set('study_area3',$study_area3);

        $this->_set('position',$position);
        $this->_set('available_date',$available_date);
        $this->_set('desired_pay',$desired_pay);
        $this->_set('work_preferences',$work_preferences);
        $this->_set('weekends',$weekends);
        $this->_set('evenings',$evenings);
        $this->_set('monday',$monday);
        $this->_set('tuesday',$tuesday);
        $this->_set('wednesday',$wednesday);
        $this->_set('thursday',$thursday);
        $this->_set('friday',$friday);
        $this->_set('saturday',$saturday);
        $this->_set('sunday',$sunday);
        $this->_set('unavailability',$unavailability);
        $this->_set('shiftwork',$shiftwork);
        $this->_set('eligible',$eligible);
        $this->_set('worked_here_before',$worked_here_before);
        $this->_set('worked_here_text',$worked_here_text);
        $this->_set('job_desc_received',$job_desc_received);
        $this->_set('understand_reqs',$understand_reqs);
        $this->_set('no_understand_reqs',$no_understand_reqs);
        $this->_set('on_layoff',$on_layoff);
        $this->_set('conf_agreement',$conf_agreement);
        $this->_set('conf_explain',$conf_explain);
        $this->_set('discharged',$discharged);
        $this->_set('discharge_explain',$discharge_explain);
        $this->_set('convict',$convict);
        $this->_set('convict_explain',$convict_explain);
        $this->_set('contact_emp',$contact_emp);
        $this->_set('family',$family);
        $this->_set('family_explain',$family_explain);

        $this->_set('employer',$employer);
        $this->_set('employer_city',$employer_city);
        $this->_set('employer_state',$employer_state);
        $this->_set('employer_zip',$employer_zip);
        $this->_set('employer_phone',$employer_phone);
        $this->_set('employer_pos',$employer_pos);
        $this->_set('employer_from',$employer_from);
        $this->_set('employer_to',$employer_to);
        $this->_set('employer_pay',$employer_pay);
        $this->_set('employer_sup',$employer_sup);
        $this->_set('employer_dut',$employer_dut);
        $this->_set('employer_leave',$employer_leave);

        $this->_set('employer1',$employer1);
        $this->_set('employer1_city',$employer1_city);
        $this->_set('employer1_state',$employer1_state);
        $this->_set('employer1_zip',$employer1_zip);
        $this->_set('employer1_phone',$employer1_phone);
        $this->_set('employer1_pos',$employer1_pos);
        $this->_set('employer1_from',$employer1_from);
        $this->_set('employer1_to',$employer1_to);
        $this->_set('employer1_pay',$employer1_pay);
        $this->_set('employer1_sup',$employer1_sup);
        $this->_set('employer1_dut',$employer1_dut);
        $this->_set('employer1_leave',$employer1_leave);

        $this->_set('employer2',$employer2);
        $this->_set('employer2_city',$employer2_city);
        $this->_set('employer2_state',$employer2_state);
        $this->_set('employer2_zip',$employer2_zip);
        $this->_set('employer2_phone',$employer2_phone);
        $this->_set('employer2_pos',$employer2_pos);
        $this->_set('employer2_from',$employer2_from);
        $this->_set('employer2_to',$employer2_to);
        $this->_set('employer2_pay',$employer2_pay);
        $this->_set('employer2_sup',$employer2_sup);
        $this->_set('employer2_dut',$employer2_dut);
        $this->_set('employer2_leave',$employer2_leave);

        $this->_set('employer3',$employer3);
        $this->_set('employer3_city',$employer3_city);
        $this->_set('employer3_state',$employer3_state);
        $this->_set('employer3_zip',$employer3_zip);
        $this->_set('employer3_phone',$employer3_phone);
        $this->_set('employer3_pos',$employer3_pos);
        $this->_set('employer3_from',$employer3_from);
        $this->_set('employer3_to',$employer3_to);
        $this->_set('employer3_pay',$employer3_pay);
        $this->_set('employer3_sup',$employer3_sup);
        $this->_set('employer3_dut',$employer3_dut);
        $this->_set('employer3_leave',$employer3_leave);

        $this->_set('driver_license',$driver_license);
        $this->_set('dl_number',$dl_number);
        $this->_set('dl_issued',$dl_issued);
        $this->_set('driving_offense',$driving_offense);
        $this->_set('driving_offense_reason',$driving_offense_reason);
        $this->_set('dl_modified',$dl_modified);
        $this->_set('dl_modified_reason',$dl_modified_reason);
        $this->_set('dl_states',$dl_states);
        $this->_set('skills',$skills);
        $this->_set('professional',$professional);

        $this->_set('ref1_name',$ref1_name);
        $this->_set('ref1_address',$ref1_address);
        $this->_set('ref1_telephone',$ref1_telephone);
        $this->_set('ref1_relationship',$ref1_relationship);
        $this->_set('ref1_years',$ref1_years);

        $this->_set('ref2_name',$ref2_name);
        $this->_set('ref2_address',$ref2_address);
        $this->_set('ref2_telephone',$ref2_telephone);
        $this->_set('ref2_relationship',$ref2_relationship);
        $this->_set('ref2_years',$ref2_years);

        $this->_set('ref3_name',$ref3_name);
        $this->_set('ref3_address',$ref3_address);
        $this->_set('ref3_telephone',$ref3_telephone);
        $this->_set('ref3_relationship',$ref3_relationship);
        $this->_set('ref3_years',$ref3_years);

        $this->_set('ref4_name',$ref4_name);
        $this->_set('ref4_address',$ref4_address);
        $this->_set('ref4_telephone',$ref4_telephone);
        $this->_set('ref4_relationship',$ref4_relationship);
        $this->_set('ref4_years',$ref4_years);

        $this->_set('text_resume',$text_resume);
        $this->_set('file_name',$file_name);
        $this->_set('signature',$signature);
        $this->_set('referral_id',$referral_id);
        $this->_set('lists',$lists);

        $this->_set('retry','retry');
        
        $this->_set('req_personal',$this->_req_personal);
        $this->_set('req_education',$this->_req_education);
        $this->_set('req_addresses',$this->_req_addresses);
        $this->_set('req_employment',$this->_req_employment);
        $this->_set('req_employers',$this->_req_employers);
        $this->_set('req_skills',$this->_req_skills);
        $this->_set('req_references',$this->_req_references);
        
        $this->_set('flag_fields', implode("|", $this->flag_fields));
        
    }

    function _set($field_name,$value)
    {
        $session = JFactory::getSession();
        $session->set($field_name,$value,'application');
    }

    function _get($field_name,$type='string')
    {
        $result = null;
        switch($type)
        {
            case 'string':
                $result = JRequest::getString($field_name,'','POST','JREQUEST_ALLOWRAW');
                break;
            case 'int':
                $result = JRequest::getInt($field_name); //,'','POST','JREQUEST_ALLOWRAW');
                break;
            case 'file':
                $result = JRequest::getVar($field_name, null, 'FILES');
                break;
            case 'array':
                $jinput = JFactory::getApplication()->input;
                $result = $jinput->getArray(array('lists' => ''));
                break;
        }

        return $result;

    }

    function getNotices()
    {
        return $this->_notices;
    }
    
}

?>
