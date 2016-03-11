<?php
/**
 *
 *
 * This is the static_raw.php view layout for jobgrokapp
 *
 * Created: November 18, 2014, 3:25 am
 *
 * Subversion Details
 * $Date: 2010-04-16 19:42:38 -0500 (Fri, 16 Apr 2010) $
 * $Revision: 1784 $
 * $Author: jobgrok $
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

$pdf = $this->pdf;

$pdf->open();
$pdf->setCompression(false);
$pdf->addPage();

$pdf->outTitle($this->application->first_name." ".
    $this->application->last_name." - ".
    $this->params->get('title'));


if ($this->params->get('job_description_header','0') == '1' && isset($this->posting_id))
{
    $job_description = strip_tags(JHTML::_('jobgrokapp.job_description', $this->posting_id));
    // $pdf->outCombo(JHTML::_('jobgrokapp.posting_desc',$this->posting_id),$job_description);
    $pdf->outHeader(JHTML::_('jobgrokapp.posting_desc', $this->posting_id));
    $pdf->outCombo("", $job_description);
}


if ($this->params->get('personal_information','1') == '1')
{ 
    $pdf->outHeader($this->params->get('field_personal_information',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RAW_PERSONAL_INFORMATION')));
    if ($this->params->get('personal_information_first_name','1') == '1')
        $pdf->outCombo($this->params->get('field_first_name',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RAW_FIRST_NAME')),$this->application->first_name);
    if ($this->params->get('personal_information_middle_name','1') == '1')
        $pdf->outCombo($this->params->get('field_middle_name',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RAW_MIDDLE_NAME')),$this->application->middle_name);
    if ($this->params->get('personal_information_last_name','1') == '1')
        $pdf->outCombo($this->params->get('field_last_name',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RAW_LAST_NAME')),$this->application->last_name);
    if ($this->params->get('personal_information_home_phone','1') == '1')
        $pdf->outCombo($this->params->get('field_home_phone',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RAW_HOME_PHONE')),$this->application->home_phone);
    if ($this->params->get('personal_information_work_phone','1') == '1')
        $pdf->outCombo($this->params->get('field_work_phone',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RAW_WORK_PHONE')),$this->application->work_phone);
    if ($this->params->get('personal_information_cell_phone','1') == '1')
        $pdf->outCombo($this->params->get('field_cell_phone',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RAW_CELL_PHONE')),$this->application->cell_phone);
    if ($this->params->get('personal_information_email_address','1') == '1')
        $pdf->outCombo($this->params->get('field_email_address',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RAW_EMAIL_ADDRESS')),$this->application->email_address);
    if ($this->params->get('personal_information_ssn','1') == '1')
        $pdf->outCombo($this->params->get('field_ssn',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RAW_SSN')),$this->application->ssn);
}
if ($this->params->get('addresses','1') == '1')
{
    if ($this->params->get('addresses_current','1') == '1') {
    $pdf->outHeader($this->params->get('field_current_address',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RAW_CURRENT_ADDRESS')));
    if ($this->params->get('addresses_street','1') == '1')
        $pdf->outCombo($this->params->get('field_street',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RAW_STREET')),$this->application->street);
    if ($this->params->get('addresses_city','1') == '1')
        $pdf->outCombo($this->params->get('field_city',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RAW_CITY')),$this->application->city);
    if ($this->params->get('addresses_state','1') == '1')
        $pdf->outCombo($this->params->get('field_state',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RAW_STATE')),$this->application->state);
    if ($this->params->get('addresses_zip_code','1') == '1')
        $pdf->outCombo($this->params->get('field_zip_code',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RAW_ZIP_CODE')),$this->application->zip_code);
    if ($this->params->get('addresses_since') == '1')
        $pdf->outCombo($this->params->get('field_address_since',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RAW_SINCE_MOYR')),$this->application->from_date); }

    if ($this->params->get('addresses_1','1') == '1') {
    $pdf->outHeader($this->params->get('field_prior_address',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RAW_PRIOR_ADDRESS'))." (1)");
    if ($this->params->get('addresses_street','1') == '1')
        $pdf->outCombo($this->params->get('field_street',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RAW_STREET')),$this->application->street1);
    if ($this->params->get('addresses_city','1') == '1')
        $pdf->outCombo($this->params->get('field_city',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RAW_CITY')),$this->application->city1);
    if ($this->params->get('addresses_state','1') == '1')
        $pdf->outCombo($this->params->get('field_state',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RAW_STATE')),$this->application->state1);
    if ($this->params->get('addresses_zip_code','1') == '1')
        $pdf->outCombo($this->params->get('field_zip_code',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RAW_ZIP_CODE')),$this->application->zip_code1);
    if ($this->params->get('addresses_since','1') == '1')
        $pdf->outCombo($this->params->get('field_address_since',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RAW_SINCE_MOYR')),$this->application->from_date1);
    if ($this->params->get('addresses_to','1') == '1')
        $pdf->outCombo($this->params->get('field_address_to',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RAW_TO_MOYR')),$this->application->to_date1); }

    if ($this->params->get('addresses_2','1') == '1') {
    $pdf->outHeader($this->params->get('field_prior_address',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RAW_PRIOR_ADDRESS'))." (2)");
    if ($this->params->get('addresses_street','1') == '1')
        $pdf->outCombo($this->params->get('field_street',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RAW_STREET')),$this->application->street2);
    if ($this->params->get('addresses_city','1') == '1')
        $pdf->outCombo($this->params->get('field_city',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RAW_CITY')),$this->application->city2);
    if ($this->params->get('addresses_state','1') == '1')
        $pdf->outCombo($this->params->get('field_state',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RAW_STATE')),$this->application->state2);
    if ($this->params->get('addresses_zip_code','1') == '1')
        $pdf->outCombo($this->params->get('field_zip_code',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RAW_ZIP_CODE')),$this->application->zip_code2);
    if ($this->params->get('addresses_since','1') == '1')
        $pdf->outCombo($this->params->get('field_address_since',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RAW_SINCE_MOYR')),$this->application->from_date2);
    if ($this->params->get('addresses_to','1') == '1')
        $pdf->outCombo($this->params->get('field_address_to',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RAW_TO_MOYR')),$this->application->to_date2); }
}
if ($this->params->get('education','1') == '1')
{
    if ($this->params->get('education_high','1') == '1') {
    $pdf->outHeader($this->params->get('field_high_school',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RAW_HIGH_SCHOOL')));
    if ($this->params->get('education_school','1') == '1');
    $pdf->outCombo($this->params->get('field_school_attended',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RAW_SCHOOL_ATTENDED')),$this->application->school);
    if ($this->params->get('education_city','1') == '1')
        $pdf->outCombo($this->params->get('field_school_city',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RAW_CITY')),$this->application->school_city);
    if ($this->params->get('education_state','1') == '1')
        $pdf->outCombo($this->params->get('field_school_state',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RAW_STATE')),$this->application->school_state);
    if ($this->params->get('education_diploma','1') == '1')
        $pdf->outCombo($this->params->get('field_diploma',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RAW_DIPLOMA')),
                $this->application->school_diploma=='1'?JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RAW_YES'):
            JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RAW_NO')); }

    if ($this->params->get('education_undergrad','1') == '1') {
    $pdf->outHeader($this->params->get('field_undergrad_school',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RAW_UNDERGRAD_SCHOOL')));
    if ($this->params->get('education_school','1') == '1');
    $pdf->outCombo($this->params->get('field_school_attended',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RAW_SCHOOL_ATTENDED')),$this->application->school1);
    if ($this->params->get('education_city','1') == '1')
        $pdf->outCombo($this->params->get('field_school_city',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RAW_CITY')),$this->application->school_city1);
    if ($this->params->get('education_state','1') == '1')
        $pdf->outCombo($this->params->get('field_school_state',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RAW_STATE')),$this->application->school_state1);
    if ($this->params->get('education_diploma','1') == '1')
        $pdf->outCombo($this->params->get('field_diploma',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RAW_DIPLOMA')),
                $this->application->school_diploma1=='1'?JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RAW_YES'):
                JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RAW_NO'));
    if ($this->params->get('education_degree','1') == '1')
        $pdf->outCombo($this->params->get('field_deg_cert_dip_long',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RAW_DEGREECERTIFICATIONDIPLOMA')),$this->application->diploma_text1);
    if ($this->params->get('education_study','1') == '1')
        $pdf->outCombo($this->params->get('field_area_of_study',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RAW_AREA_OF_STUDY')),$this->application->study_area1); }

    if ($this->params->get('education_grad','1') == '1') {
    $pdf->outHeader($this->params->get('field_grad_school',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RAW_GRAD_SCHOOL')));
    if ($this->params->get('education_school','1') == '1');
    $pdf->outCombo($this->params->get('field_school_attended',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RAW_SCHOOL_ATTENDED')),$this->application->school2);
    if ($this->params->get('education_city','1') == '1')
        $pdf->outCombo($this->params->get('field_school_city',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RAW_CITY')),$this->application->school_city2);
    if ($this->params->get('education_state','1') == '1')
        $pdf->outCombo($this->params->get('field_school_state',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RAW_STATE')),$this->application->school_state2);
    if ($this->params->get('education_diploma','1') == '1')
        $pdf->outCombo($this->params->get('field_diploma',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RAW_DIPLOMA')),
                $this->application->school_diploma2=='1'?JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RAW_YES'):
                JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RAW_NO'));
    if ($this->params->get('education_degree','1') == '1')
        $pdf->outCombo($this->params->get('field_deg_cert_dip_long',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RAW_DEGREECERTIFICATIONDIPLOMA')),$this->application->diploma_text2);
    if ($this->params->get('education_study','1') == '1')
        $pdf->outCombo($this->params->get('field_area_of_study',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RAW_AREA_OF_STUDY')),$this->application->study_area2); }

    if ($this->params->get('education_other','1') == '1') {
    $pdf->outHeader($this->params->get('field_other_school',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RAW_OTHER_SCHOOL')));
    if ($this->params->get('education_school','1') == '1');
    $pdf->outCombo($this->params->get('field_school_attended',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RAW_SCHOOL_ATTENDED')),$this->application->school3);
    if ($this->params->get('education_city','1') == '1')
        $pdf->outCombo($this->params->get('field_school_city',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RAW_CITY')),$this->application->school_city3);
    if ($this->params->get('education_state','1') == '1')
        $pdf->outCombo($this->params->get('field_school_state',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RAW_STATE')),$this->application->school_state3);
    if ($this->params->get('education_diploma','1') == '1')
        $pdf->outCombo($this->params->get('field_diploma',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RAW_DIPLOMA')),
                $this->application->school_diploma3=='1'?JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RAW_YES'):
                JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RAW_NO'));
    if ($this->params->get('education_degree','1') == '1')
        $pdf->outCombo($this->params->get('field_deg_cert_dip_long',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RAW_DEGREECERTIFICATIONDIPLOMA')),$this->application->diploma_text3);
    if ($this->params->get('education_study','1') == '1')
        $pdf->outCombo($this->params->get('field_area_of_study',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RAW_AREA_OF_STUDY')),$this->application->study_area3); }
}

if ($this->params->get('employment_information','1') == '1')
{

    $pdf->outHeader($this->params->get('field_employment_information',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RAW_EMPLOYMENT_INFORMATION')));
    if ($this->params->get('employment_information_position','1') == '1')
        $pdf->outCombo($this->params->get('field_position_applied_for',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RAW_POSITION_APPLIED_FOR')),$this->application->position);
    if ($this->params->get('employment_information_date_you_can_start','1') == '1')
        $pdf->outCombo($this->params->get('field_date_you_can_start',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RAW_DATE_YOU_CAN_START')),$this->application->available_date);
    if ($this->params->get('employment_information_desired_salary','1') == '1')
        $pdf->outCombo($this->params->get('field_desired_salary',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RAW_DESIRED_SALARY')),$this->application->desired_pay);
    if ($this->params->get('employment_information_do_you_prefer','1') == '1')
        $pdf->outcombo($this->params->get('field_do_you_prefer',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RAW_DO_YOU_PREFER')),$this->application->work_preferences);
    if ($this->params->get('employment_information_shiftwork','1') == '1')
        $pdf->outcombo($this->params->get('field_shiftwork',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RAW_SHIFTWORK')),$this->application->shiftwork=='1'?JTEXT::_('YES'):JTEXT::_('NO'));
    
    if ($this->params->get('employment_information_can_you_work','1') == '1') 
        $pdf->outcombo($this->params->get('field_you_can_work',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RAW_YOU_CAN_WORK')),
                ($this->application->weekends == '1' ? $this->params->get('field_weekends',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RAW_WEEKENDS')):'').' '.
                ($this->application->evenings == '1' ? $this->params->get('field_evenings',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RAW_EVENINGS')):''));
    
    if ($this->params->get('employment_information_available','1') == '1')
        $pdf->outCombo($this->params->get('field_available',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RAW_AVAILABLE')),
            ($this->application->monday=='1'?$this->params->get('field_monday_abbr',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RAW_MONDAY')):'').' '.
            ($this->application->tuesday=='1'?$this->params->get('field_tuesday_abbr',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RAW_TUESDAY')):'').' '.
            ($this->application->wednesday=='1'?$this->params->get('field_wednesday_abbr',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RAW_WEDNESDAY')):'').' '.
            ($this->application->thursday=='1'?$this->params->get('field_thursday_abbr',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RAW_THURSDAY')):'').' '.
            ($this->application->friday=='1'?$this->params->get('field_friday_abbr',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RAW_FRIDAY')):'').' '.
            ($this->application->saturday=='1'?$this->params->get('field_saturday_abbr',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RAW_SATURDAY')):'').' '.
            ($this->application->sunday=='1'?$this->params->get('field_sunday_abbr',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RAW_SUNDAY')):''));
    if ($this->params->get('employment_information_not_available','1') == '1')
        $pdf->outCombo($this->params->get('field_not_available',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RAW_NOT_AVAILABLE')),$this->application->unavailability);
    if ($this->params->get('employment_information_question_1','1') == '1')
    {
        $pdf->outField($this->params->get('field_question',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RAW_QUESTION')));
        $pdf->outField($this->params->get('field_question_1',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RAW_QUESTION_1')));
        $pdf->outValue($this->application->eligible=='1'?JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RAW_YES'):
            JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RAW_NO'),true,true); 
        $pdf->outField($this->params->get('field_question_1_followup',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RAW_QUESTION_1_FOLLOWUP')));
        $pdf->outValue($this->application->provideproof=='1'?JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RAW_YES'):
            JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RAW_NO'),true,true); }
            
            
    if ($this->params->get('employment_information_question_2','1') == '1')
    {
        $pdf->outField($this->params->get('field_question',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RAW_QUESTION')));
        $pdf->outField($this->params->get('field_question_2',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RAW_QUESTION_2')));
        $pdf->outValue($this->application->worked_here_before=='1'?JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RAW_YES'):
            JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RAW_NO'),true,true);
        $pdf->outField($this->params->get('field_question_2_followup',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RAW_QUESTION_2_FOLLOWUP')));
        $pdf->outValue($this->application->worked_here_text,true,true); }
    if ($this->params->get('employment_information_question_3','1') == '1')
    {
        $pdf->outField($this->params->get('field_question',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RAW_QUESTION')));
        $pdf->outField($this->params->get('field_question_3',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RAW_QUESTION_3')));
        $pdf->outValue($this->application->job_desc_received=='1'?JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RAW_YES'):
            JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RAW_NO'),true,true); }
    if ($this->params->get('employment_information_question_4','1') == '1')
    {
        $pdf->outField($this->params->get('field_question',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RAW_QUESTION')));
        $pdf->outField($this->params->get('field_question_4',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RAW_QUESTION_4')));
        $pdf->outValue($this->application->understand_reqs=='1'?JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RAW_YES'):
            JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RAW_NO'),true,true);
        $pdf->outField($this->params->get('field_question_4_followup',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RAW_QUESTION_4_FOLLOWUP')));
        $pdf->outValue($this->application->no_understand_reqs,true,true); }
    if ($this->params->get('employment_information_question_5','1') == '1')
    {
        $pdf->outField($this->params->get('field_question',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RAW_QUESTION')));
        $pdf->outField($this->params->get('field_question_5',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RAW_QUESTION_5')));
        $pdf->outValue($this->application->on_layoff=='1'?JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RAW_YES'):
            JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RAW_NO'),true,true); }
    if ($this->params->get('employment_information_question_6','1') == '1')
    {
        $pdf->outField($this->params->get('field_question',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RAW_QUESTION')));
        $pdf->outField($this->params->get('field_question_6',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RAW_QUESTION_6')));
        $pdf->outValue($this->application->conf_agreement=='1'?JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RAW_YES'):
            JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RAW_NO'),true,true);
        $pdf->outField($this->params->get('field_question_6_followup',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RAW_QUESTION_6_FOLLOWUP')));
        $pdf->outValue($this->application->conf_explain,true,true); }
    if ($this->params->get('employment_information_question_7','1') == '1')
    {
        $pdf->outField($this->params->get('field_question',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RAW_QUESTION')));
        $pdf->outField($this->params->get('field_question_7',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RAW_QUESTION_7')));
        $pdf->outValue($this->application->discharged=='1'?JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RAW_YES'):
            JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RAW_NO'),true,true);
        $pdf->outField($this->params->get('field_question_7_followup',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RAW_QUESTION_7_FOLLOWUP')));
        $pdf->outValue($this->application->discharge_explain,true,true); }
    if ($this->params->get('employment_information_question_8','1') == '1')
    {
        $pdf->outField($this->params->get('field_question',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RAW_QUESTION')));
        $pdf->outField($this->params->get('field_question_8',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RAW_QUESTION_8')));
        $pdf->outValue($this->application->convict=='1'?JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RAW_YES'):
            JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RAW_NO'),true,true);
        $pdf->outField($this->params->get('field_question_8_followup',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RAW_QUESTION_8_FOLLOWUP')));
        $pdf->outValue($this->application->convict_explain,true,true); }
    if ($this->params->get('employment_information_question_9','1') == '1')
    {
        $pdf->outField($this->params->get('field_question',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RAW_QUESTION')));
        $pdf->outField($this->params->get('field_question_9',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RAW_QUESTION_9')));
        $pdf->outValue($this->application->family=='1'?JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RAW_YES'):
            JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RAW_NO'),true,true);
        $pdf->outField($this->params->get('field_question_9_followup',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RAW_QUESTION_9_FOLLOWUP')));
        $pdf->outValue($this->application->family_explain,true,true); }
}

if ($this->params->get('employment_history','1') =='1')
{
    if ($this->params->get('employment_history_currently_employed','1') == '1') {
    $pdf->outField($this->params->get('field_currently_employed',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RAW_CURRENTLY_EMPLOYED')));
    $pdf->outValue($this->application->currently_employed=='1'?JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RAW_YES'):JTEXT::_('NO'),true,true); }
    if ($this->params->get('employment_history_contact_current_employer','1') == '1') {
    $pdf->outField($this->params->get('field_contact_employer',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RAW_CONTACT_EMPLOYER')));
    $pdf->outValue($this->application->contact_emp=='1'?JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RAW_YES'):JTEXT::_('NO'),true,true); }
    if ($this->params->get('employment_history_recent','1') == '1') {
    $pdf->outHeader($this->params->get('field_most_recent_employer',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RAW_MOST_RECENT_EMPLOYER')));
    if ($this->params->get('employment_history_employer','1') == '1')
        $pdf->outCombo($this->params->get('field_employer',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RAW_EMPLOYER')),$this->application->employer);
    if ($this->params->get('employment_history_city','1') == '1')
        $pdf->outCombo($this->params->get('field_employer_city',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RAW_CITY')),$this->application->employer_city);
    if ($this->params->get('employment_history_state','1') == '1')
        $pdf->outCombo($this->params->get('field_employer_state',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RAW_STATE')),$this->application->employer_state);
    if ($this->params->get('employment_history_zip_code','1') == '1')
        $pdf->outCombo($this->params->get('field_employer_zip_code',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RAW_ZIP_CODE')),$this->application->employer_zip);
    if ($this->params->get('employment_history_phone','1') == '1')
        $pdf->outCombo($this->params->get('field_employer_phone',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RAW_PHONE')),$this->application->employer_phone);
    if ($this->params->get('employment_history_position','1') == '1')
        $pdf->outCombo($this->params->get('field_position_held',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RAW_POSITION_HELD')),$this->application->employer_pos);
    if ($this->params->get('employment_history_from','1') == '1')
        $pdf->outCombo($this->params->get('field_employer_from_myyyy',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RAW_FROM_MYYYY')),$this->application->employer_from);
    if ($this->params->get('employment_history_to','1') == '1')
        $pdf->outCombo($this->params->get('field_employer_to_myyyy',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RAW_TO_MYYYY')),$this->application->employer_to);
    if ($this->params->get('employment_history_pay','1') == '1')
        $pdf->outCombo($this->params->get('field_pay_upon_leaving',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RAW_PAY_UPON_LEAVING')),$this->application->employer_pay);
    if ($this->params->get('employment_history_supervisor','1') == '1')
        $pdf->outCombo($this->params->get('field_supervisor',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RAW_SUPERVISOR')),$this->application->employer_sup);
    if ($this->params->get('employment_history_duties','1') == '1')
        $pdf->outCombo($this->params->get('field_duties',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RAW_DUTIES')),$this->application->employer_dut);
    if ($this->params->get('employment_history_reason','1') == '1')
        $pdf->outCombo($this->params->get('field_reason_for_leaving',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RAW_REASON_FOR_LEAVING')),$this->application->employer_leave); }

    if ($this->params->get('employment_history_1','1') == '1') {
    $pdf->outHeader($this->params->get('field_prior_employer',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RAW_PRIOR_EMPLOYER')));
    if ($this->params->get('employment_history_employer','1') == '1')
        $pdf->outCombo($this->params->get('field_employer',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RAW_EMPLOYER')),$this->application->employer1);
    if ($this->params->get('employment_history_city','1') == '1')
        $pdf->outCombo($this->params->get('field_employer_city',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RAW_CITY')),$this->application->employer1_city);
    if ($this->params->get('employment_history_state','1') == '1')
        $pdf->outCombo($this->params->get('field_employer_state',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RAW_STATE')),$this->application->employer1_state);
    if ($this->params->get('employment_history_zip_code','1') == '1')
        $pdf->outCombo($this->params->get('field_employer_zip_code',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RAW_ZIP_CODE')),$this->application->employer1_zip);
    if ($this->params->get('employment_history_phone','1') == '1')
        $pdf->outCombo($this->params->get('field_employer_phone',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RAW_PHONE')),$this->application->employer1_phone);
    if ($this->params->get('employment_history_position','1') == '1')
        $pdf->outCombo($this->params->get('field_position_held',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RAW_POSITION_HELD')),$this->application->employer1_pos);
    if ($this->params->get('employment_history_from','1') == '1')
        $pdf->outCombo($this->params->get('field_employer_from_myyyy',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RAW_FROM_MYYYY')),$this->application->employer1_from);
    if ($this->params->get('employment_history_to','1') == '1')
        $pdf->outCombo($this->params->get('field_employer_to_myyyy',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RAW_TO_MYYYY')),$this->application->employer1_to);
    if ($this->params->get('employment_history_pay','1') == '1')
        $pdf->outCombo($this->params->get('field_pay_upon_leaving',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RAW_PAY_UPON_LEAVING')),$this->application->employer1_pay);
    if ($this->params->get('employment_history_supervisor','1') == '1')
        $pdf->outCombo($this->params->get('field_supervisor',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RAW_SUPERVISOR')),$this->application->employer1_sup);
    if ($this->params->get('employment_history_duties','1') == '1')
        $pdf->outCombo($this->params->get('field_duties',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RAW_DUTIES')),$this->application->employer1_dut);
    if ($this->params->get('employment_history_reason','1') == '1')
        $pdf->outCombo($this->params->get('field_reason_for_leaving',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RAW_REASON_FOR_LEAVING')),$this->application->employer1_leave); }

    if ($this->params->get('employment_history_2','1') == '1') {
    $pdf->outHeader($this->params->get('field_prior_employer',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RAW_PRIOR_EMPLOYER')));
    if ($this->params->get('employment_history_employer','1') == '1')
        $pdf->outCombo($this->params->get('field_employer',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RAW_EMPLOYER')),$this->application->employer2);
    if ($this->params->get('employment_history_city','1') == '1')
        $pdf->outCombo($this->params->get('field_employer_city',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RAW_CITY')),$this->application->employer2_city);
    if ($this->params->get('employment_history_state','1') == '1')
        $pdf->outCombo($this->params->get('field_employer_state',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RAW_STATE')),$this->application->employer2_state);
    if ($this->params->get('employment_history_zip_code','1') == '1')
        $pdf->outCombo($this->params->get('field_employer_zip_code',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RAW_ZIP_CODE')),$this->application->employer2_zip);
    if ($this->params->get('employment_history_phone','1') == '1')
        $pdf->outCombo($this->params->get('field_employer_phone',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RAW_PHONE')),$this->application->employer2_phone);
    if ($this->params->get('employment_history_position','1') == '1')
        $pdf->outCombo($this->params->get('field_position_held',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RAW_POSITION_HELD')),$this->application->employer2_pos);
    if ($this->params->get('employment_history_from','1') == '1')
        $pdf->outCombo($this->params->get('field_employer_from_myyyy',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RAW_FROM_MYYYY')),$this->application->employer2_from);
    if ($this->params->get('employment_history_to','1') == '1')
        $pdf->outCombo($this->params->get('field_employer_to_myyyy',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RAW_TO_MYYYY')),$this->application->employer2_to);
    if ($this->params->get('employment_history_pay','1') == '1')
        $pdf->outCombo($this->params->get('field_pay_upon_leaving',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RAW_PAY_UPON_LEAVING')),$this->application->employer2_pay);
    if ($this->params->get('employment_history_supervisor','1') == '1')
        $pdf->outCombo($this->params->get('field_supervisor',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RAW_SUPERVISOR')),$this->application->employer2_sup);
    if ($this->params->get('employment_history_duties','1') == '1')
        $pdf->outCombo($this->params->get('field_duties',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RAW_DUTIES')),$this->application->employer2_dut);
    if ($this->params->get('employment_history_reason','1') == '1')
        $pdf->outCombo($this->params->get('field_reason_for_leaving',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RAW_REASON_FOR_LEAVING')),$this->application->employer2_leave); }

    if ($this->params->get('employment_history_3','1') == '1') {
    $pdf->outHeader($this->params->get('field_prior_employer',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RAW_PRIOR_EMPLOYER')));
    if ($this->params->get('employment_history_employer','1') == '1')
        $pdf->outCombo($this->params->get('field_employer',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RAW_EMPLOYER')),$this->application->employer3);
    if ($this->params->get('employment_history_city','1') == '1')
        $pdf->outCombo($this->params->get('field_employer_city',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RAW_CITY')),$this->application->employer3_city);
    if ($this->params->get('employment_history_state','1') == '1')
        $pdf->outCombo($this->params->get('field_employer_state',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RAW_STATE')),$this->application->employer3_state);
    if ($this->params->get('employment_history_zip_code','1') == '1')
        $pdf->outCombo($this->params->get('field_employer_zip_code',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RAW_ZIP_CODE')),$this->application->employer3_zip);
    if ($this->params->get('employment_history_phone','1') == '1')
        $pdf->outCombo($this->params->get('field_employer_phone',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RAW_PHONE')),$this->application->employer3_phone);
    if ($this->params->get('employment_history_position','1') == '1')
        $pdf->outCombo($this->params->get('field_position_held',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RAW_POSITION_HELD')),$this->application->employer3_pos);
    if ($this->params->get('employment_history_from','1') == '1')
        $pdf->outCombo($this->params->get('field_employer_from_myyyy',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RAW_FROM_MYYYY')),$this->application->employer3_from);
    if ($this->params->get('employment_history_to','1') == '1')
        $pdf->outCombo($this->params->get('field_employer_to_myyyy',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RAW_TO_MYYYY')),$this->application->employer3_to);
    if ($this->params->get('employment_history_pay','1') == '1')
        $pdf->outCombo($this->params->get('field_pay_upon_leaving',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RAW_PAY_UPON_LEAVING')),$this->application->employer3_pay);
    if ($this->params->get('employment_history_supervisor','1') == '1')
        $pdf->outCombo($this->params->get('field_supervisor',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RAW_SUPERVISOR')),$this->application->employer3_sup);
    if ($this->params->get('employment_history_duties','1') == '1')
        $pdf->outCombo($this->params->get('field_duties',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RAW_DUTIES')),$this->application->employer3_dut);
    if ($this->params->get('employment_history_reason','1') == '1')
        $pdf->outCombo($this->params->get('field_reason_for_leaving',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RAW_REASON_FOR_LEAVING')),$this->application->employer3_leave); }
}


if ($this->params->get('job_related_skills','1') == '1')
{
    $pdf->outHeader($this->params->get('field_job_related_skills',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RAW_JOB_RELATED_SKILLS')));
    $pdf->outField($this->params->get('field_vehicle_questions',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RAW_VEHICLE_QUESTIONS')));
    if ($this->params->get('job_related_skills_q1','1') == '1')
    {
        $pdf->outField($this->params->get('field_vehicle_question_1',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RAW_VEHICLE_QUESTION_1')));
        $pdf->outValue($this->application->driver_license=='1'?JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RAW_YES'):
            JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RAW_NO'),true,true);
        $pdf->outField($this->params->get('field_vehicle_question_1_followup_a',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RAW_VEHICLE_QUESTION_1_FOLLOWUP_A')));
        $pdf->outValue($this->application->dl_number,true,true);
        $pdf->outField($this->params->get('field_vehicle_question_1_followup_b',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RAW_VEHICLE_QUESTION_1_FOLLOWUP_B')));
        $pdf->outValue($this->application->dl_issued,true,true); }
    if ($this->params->get('job_related_skills_q2','1') == '1')
    {
        $pdf->outField($this->params->get('field_vehicle_question_2',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RAW_VEHICLE_QUESTION_2')));
        $pdf->outValue($this->application->driving_offense=='1'?JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RAW_YES'):
            JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RAW_NO'),true,true);
        if ($this->params->get('job_related_skills_q2_reason','1') == '1')
        {
        $pdf->outField($this->params->get('field_vehicle_question_2',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RAW_VEHICLE_QUESTION_2_FOLLOWUP')));
        $pdf->outValue($this->application->driving_offense_reason); }
    }
    if ($this->params->get('job_related_skills_q3','1') == '1')
    {
        $pdf->outField($this->params->get('field_vehicle_question_3',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RAW_VEHICLE_QUESTION_3')));
        $pdf->outValue($this->application->dl_modified=='1'?JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RAW_YES'):
            JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RAW_NO'),true,true); 
        if ($this->params->get('job_related_skills_q3_reason','1') == '1')
        {
        $pdf->outField($this->params->get('field_vehicle_question_3_followup',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RAW_VEHICLE_QUESTION_3_FOLLOWUP')));
        $pdf->outValue($this->application->dl_modified_reason); }
    }
    if ($this->params->get('job_related_skills_states','1') == '1')
    {
        $pdf->outField($this->params->get('field_vehicle_states',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RAW_VEHICLE_STATES')));
        $pdf->outValue($this->application->dl_states,true,true); }
    if ($this->params->get('job_related_skills_skills','1') == '1')
    {
        $pdf->outField($this->params->get('field_other_skills',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RAW_SKILLS')));
        $pdf->outValue($this->application->skills,true,true); }
    if ($this->params->get('job_related_skills_designations') == '1')
    {
        $pdf->outField($this->params->get('field_prog_designations',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RAW_PROF_DESIGNATIONS')));
        $pdf->outValue($this->application->professional,true,true);
    }
    
    if (isset($this->application->lists)) {
        $mylists =  json_decode($this->application->lists, true);
        $db = JFactory::getDbo();
        $rows = null;
        
        foreach ($mylists as $key => $value) {
            $query = $db->getQuery(true);
            $query->select('*');
            $query->from('#__tst_jgapp_lists');
            $query->where($db->quoteName('id') . " = ". (int)$key);
            $db->setQuery($query);
            $record = $db->loadObject();
            
            $pdf->outField($record->list);
            $values = implode(" - ", $value);
            $pdf->outValue($values, true, true);
        }
    }
}

if ($this->params->get('references','1') == '1')
{
    if ($this->params->get('references_1','1') == '1') {
    $pdf->outHeader($this->params->get('field_reference',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RAW_REFERENCE'))." (1)");
    if ($this->params->get('references_name','1') == '1')
        $pdf->outCombo($this->params->get('field_reference_name',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RAW_NAME')),$this->application->ref1_name);
    if ($this->params->get('references_address','1') == '1')
        $pdf->outCombo($this->params->get('field_reference_address',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RAW_ADDRESS')),$this->application->ref1_address);
    if ($this->params->get('references_telephone','1') == '1')
        $pdf->outCombo($this->params->get('field_reference_telephone',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RAW_TELEPHONE')),$this->application->ref1_telephone);
    if ($this->params->get('references_relationship','1') == '1')
        $pdf->outCombo($this->params->get('field_reference_relationship',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RAW_RELATIONSHIP')),$this->application->ref1_relationship);
    if ($this->params->get('references_years_acquainted') == '1')
        $pdf->outCombo($this->params->get('field_reference_years_acquainted',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RAW_YEARS_ACQUAINTED')),$this->application->ref1_years); }

    if ($this->params->get('references_2','1') == '1') {
    $pdf->outHeader($this->params->get('field_reference',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RAW_REFERENCE'))." (2)");
    if ($this->params->get('references_name','1') == '1')
        $pdf->outCombo($this->params->get('field_reference_name',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RAW_NAME')),$this->application->ref2_name);
    if ($this->params->get('references_address','1') == '1')
        $pdf->outCombo($this->params->get('field_reference_address',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RAW_ADDRESS')),$this->application->ref2_address);
    if ($this->params->get('references_telephone','1') == '1')
        $pdf->outCombo($this->params->get('field_reference_telephone',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RAW_TELEPHONE')),$this->application->ref2_telephone);
    if ($this->params->get('references_relationship','1') == '1')
        $pdf->outCombo($this->params->get('field_reference_relationship',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RAW_RELATIONSHIP')),$this->application->ref2_relationship);
    if ($this->params->get('references_years_acquainted') == '1')
        $pdf->outCombo($this->params->get('field_reference_years_acquainted',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RAW_YEARS_ACQUAINTED')),$this->application->ref2_years); }

    if ($this->params->get('references_3','1') == '1') {
    $pdf->outHeader($this->params->get('field_reference',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RAW_REFERENCE'))." (3)");
    if ($this->params->get('references_name','1') == '1')
        $pdf->outCombo($this->params->get('field_reference_name',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RAW_NAME')),$this->application->ref3_name);
    if ($this->params->get('references_address','1') == '1')
        $pdf->outCombo($this->params->get('field_reference_address',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RAW_ADDRESS')),$this->application->ref3_address);
    if ($this->params->get('references_telephone','1') == '1')
        $pdf->outCombo($this->params->get('field_reference_telephone',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RAW_TELEPHONE')),$this->application->ref3_telephone);
    if ($this->params->get('references_relationship','1') == '1')
        $pdf->outCombo($this->params->get('field_reference_relationship',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RAW_RELATIONSHIP')),$this->application->ref3_relationship);
    if ($this->params->get('references_years_acquainted') == '1')
        $pdf->outCombo($this->params->get('field_reference_years_acquainted',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RAW_YEARS_ACQUAINTED')),$this->application->ref3_years); }

    if ($this->params->get('references_4','1') == '1') {
    $pdf->outHeader($this->params->get('field_reference',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RAW_REFERENCE'))." (4)");
    if ($this->params->get('references_name','1') == '1')
        $pdf->outCombo($this->params->get('field_reference_name',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RAW_NAME')),$this->application->ref4_name);
    if ($this->params->get('references_address','1') == '1')
        $pdf->outCombo($this->params->get('field_reference_address',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RAW_ADDRESS')),$this->application->ref4_address);
    if ($this->params->get('references_telephone','1') == '1')
        $pdf->outCombo($this->params->get('field_reference_telephone',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RAW_TELEPHONE')),$this->application->ref4_telephone);
    if ($this->params->get('references_relationship','1') == '1')
        $pdf->outCombo($this->params->get('field_reference_relationship',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RAW_RELATIONSHIP')),$this->application->ref4_relationship);
    if ($this->params->get('references_years_acquainted') == '1')
        $pdf->outCombo($this->params->get('field_reference_years_acquainted',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RAW_YEARS_ACQUAINTED')),$this->application->ref4_years); }
}


if ($this->params->get('text_resume','1') == '1')
{
    $pdf->outHeader($this->params->get('field_text_resume',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RAW_TEXT_RESUME')));
    $pdf->outField($this->params->get('field_text_resume_desc',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RAW_TEXT_RESUME_DESC')));
    $pdf->outValue($this->application->text_resume,true,true,110);
}

if ($this->params->get('file_upload','1') == '1' && $this->application->file_name != '')
{
    $pdf->outField(JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RAW_FILE_ATTACHMENT_EXISTS'));
    $pdf->outValue($this->application->file_name,true,true);
}

if ($this->params->get('agreement', '1') == '1') {
$pdf->outHeader($this->params->get('field_certification_agreement', JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RAW_CERTIFICATION_AGREEMENT')));
$numbering = 1;
if ($this->params->get('bullet1_on', '1') == '1') {
$pdf->outField($numbering.") ".$this->params->get('certification_agreement_bullet1', JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RAW_CERTIFICATION_AGREEMENT_BULLET1')));
$numbering++;
}
if ($this->params->get('bullet2_on', '1') == '1') {
$pdf->outField($numbering.") ".$this->params->get('certification_agreement_bullet2', JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RAW_CERTIFICATION_AGREEMENT_BULLET2')));
$numbering++;
}
if ($this->params->get('bullet3_on', '1') == '1') {
$pdf->outField($numbering.") ".$this->params->get('certification_agreement_bullet3', JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RAW_CERTIFICATION_AGREEMENT_BULLET3')));
$numbering++;
}
if ($this->params->get('bullet4_on', '1') == '1') {
$pdf->outField($numbering.") ".$this->params->get('certification_agreement_bullet4', JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RAW_CERTIFICATION_AGREEMENT_BULLET4')));
$numbering++;
}
if ($this->params->get('bullet5_on', '1') == '1') {
$pdf->outField($numbering.") ".$this->params->get('certification_agreement_bullet5', JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RAW_CERTIFICATION_AGREEMENT_BULLET5')));
$numbering++;
}
if ($this->params->get('bullet6_on', '1') == '1') {
$pdf->outField($numbering.") ".$this->params->get('certification_agreement_bullet6', JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RAW_CERTIFICATION_AGREEMENT_BULLET6')));
}
}

if ($this->params->get('display_custom_yes_no','1') == '1') {
    $pdf->outField($this->params->get('text_custom_yes_no',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RAW_SH_CUSTOM_YES_NO_TEXT')));
    $pdf->outValue($this->application->custom_yes_no=='1'?JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RAW_YES'):
        JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RAW_NO'),true,true);
}

if ($this->params->get('signature','1') == '1')
    $pdf->outCombo(JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RAW_CERTIFICATION_AGREEMENT_SIGNATURE'),$this->application->signature);
$pdf->outCombo(JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RAW_CREATE_DATE'),$this->application->create_date);
$pdf->output('foo.pdf');

?>

