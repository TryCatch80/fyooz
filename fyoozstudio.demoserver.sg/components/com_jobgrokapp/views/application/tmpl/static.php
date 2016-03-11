<?php
/**
 *
 *
 * This is the static.php view layout for jobgrokapp
 *
 * Created: November 18, 2014, 3:25 am
 *
 * Subversion Details
 * $Date: 2014-09-22 21:26:25 -0500 (Mon, 22 Sep 2014) $
 * $Revision: 6288 $
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

$document =JFactory::getDocument();
$css = "table.jg td { border: 0px none; padding: 2px; } ".
       "table.jg tr { border: 0px none; } ".
       "table.jg td label { font-weight: bold; }";
$document->addStyleDeclaration($css);
?>
<div class="jg_static">
<?php if ($this->viewtype == 'html') : ?>
<?php if ($this->params->get('display_submitted_data','1') == '1') : ?>
<div style="text-align: right;"> 
    <?php if ($this->params->get('show_pdf_option','1') == '1') : ?>
    <a href="<?php echo $this->pdflink; ?>"><?php echo JHTML::_('image','media'.DIRECTORY_SEPARATOR.'system'.DIRECTORY_SEPARATOR.'images'.DIRECTORY_SEPARATOR.'pdf_button.png','PDF'); ?></a><?php endif; 
          if ($this->params->get('show_print_option','1') == '1') : ?>&nbsp;<a href="<?php 
          echo $this->printlink; ?>"><?php echo JHTML::_('image','media'.DIRECTORY_SEPARATOR.'system'.DIRECTORY_SEPARATOR.'images'.DIRECTORY_SEPARATOR.'printButton.png','Print'); ?></a><?php endif; ?>
</div>
<?php endif; ?>
<div style="width: 100%">
    <?php if (isset($this->thankyou)) { echo $this->thankyou->introtext.$this->thankyou->fulltext; } ?>
</div>
<?php endif; ?>
<?php if ($this->params->get('display_submitted_data','1') == '1') : ?>
<?php if ($this->params->get('job_description_header','1') == '1' && isset($this->posting_id)) : ?>
<fieldset>
    <legend><?php echo JHTML::_('jobgrokapp.posting',$this->posting_id,true); ?> </legend>
    <?php echo JHTML::_('jobgrokapp.job_description',$this->posting_id); ?>
</fieldset>
<?php endif; ?>
<h1 id="jg_display_title"><?php echo $this->params->get('title'); ?></h1>
<?php if ($this->params->get('personal_information','1') == '1') : ?>
<fieldset>
<legend><?php echo $this->params->get('field_personal_information',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_PERSONAL_INFORMATION')); ?></legend>
    <table class="jg" width="100%">
    <?php if ($this->params->get('personal_information_first_name','1') == '1') : ?>
        <tr><td width="20%"><label><?php echo $this->params->get('field_first_name',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_FIRST_NAME')); ?>:</label></td>
        <td><span><?php echo $this->application->first_name; ?></span></td></tr>
    <?php endif; ?>
    <?php if ($this->params->get('personal_information_middle_name','1') == '1') : ?>
        <tr><td><label><?php echo $this->params->get('field_middle_name',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_MIDDLE_NAME')); ?>:</label></td>
        <td><span><?php echo $this->application->middle_name; ?></span></td></tr>
    <?php endif; ?>
    <?php if ($this->params->get('personal_information_last_name','1') == '1') : ?>
        <tr><td><label><?php echo $this->params->get('field_last_name',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_LAST_NAME')); ?>:</label></td>
        <td><span><?php echo $this->application->last_name; ?></span></td></tr>
    <?php endif; ?>
    <?php if ($this->params->get('personal_information_home_phone','1') == '1') : ?>
        <tr><td><label><?php echo $this->params->get('field_home_phone',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_HOME_PHONE')); ?>:</label></td>
        <td><span><?php echo $this->application->home_phone; ?></span></td></tr>
    <?php endif; ?>
    <?php if ($this->params->get('personal_information_work_phone','1') == '1') : ?>
        <tr><td><label><?php echo $this->params->get('field_work_phone',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_WORK_PHONE')); ?>:</label></td>
        <td><span><?php echo $this->application->work_phone; ?></span></td></tr>
    <?php endif; ?>
    <?php if ($this->params->get('personal_information_cell_phone','1') == '1') : ?>
        <tr><td><label><?php echo $this->params->get('field_cell_phone',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_CELL_PHONE')); ?>:</label></td>
        <td><span><?php echo $this->application->cell_phone; ?></span></td></tr>
    <?php endif; ?>
    <?php if ($this->params->get('personal_information_email_address','1') == '1') : ?>
        <tr><td><label><?php echo $this->params->get('field_email_address',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_EMAIL_ADDRESS')); ?>:</label></td>
        <td><span><?php echo $this->application->email_address; ?></span></td></tr>
    <?php endif; ?>
    <?php if ($this->params->get('personal_information_ssn','1') == '1') : ?>
        <tr><td><label><?php echo $this->params->get('field_ssn',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_SSN')); ?>:</label></td>
        <td><span><?php echo $this->application->ssn; ?></span></td></tr>
    <?php endif; ?>
    </table>
</fieldset>
<?php endif; ?>
<?php if ($this->params->get('addresses','1') == '1') : ?>
<?php if ($this->params->get('addresses_current','1') == '1') : ?>
<fieldset>
<legend><?php echo $this->params->get('field_current_address',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_CURRENT_ADDRESS')); ?></legend>
    <table  class="jg" width="100%">
    <?php if ($this->params->get('addresses_street','1') == '1') : ?>
        <tr><td width="20%"><label><?php echo $this->params->get('field_street',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_STREET')); ?>:</label></td>
        <td><span><?php echo $this->application->street; ?></span></td></tr>
    <?php endif; ?>
    <?php if ($this->params->get('addresses_city','1') == '1') : ?>
        <tr><td><label><?php echo $this->params->get('field_city',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_CITY')); ?>:</label></td>
        <td><span><?php echo $this->application->city; ?></span></td></tr>
    <?php endif; ?>
    <?php if ($this->params->get('addresses_state','1') == '1') : ?>
        <tr><td><label><?php echo $this->params->get('field_state',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_STATE')); ?>:</label></td>
        <td><span><?php echo $this->application->state; ?></span></td></tr>
    <?php endif; ?>
    <?php if ($this->params->get('addresses_zip_code','1') == '1') : ?>
        <tr><td><label><?php echo $this->params->get('field_zip_code',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_ZIP_CODE')); ?>:</label></td>
        <td><span><?php echo $this->application->zip_code; ?></span></td></tr>
    <?php endif; ?>
    <?php if ($this->params->get('addresses_since','1') == '1') : ?>
        <tr><td><label><?php echo $this->params->get('field_address_since',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_ADDRESS_SINCE')); ?>:</label></td>
        <td><span><?php echo $this->application->from_date; ?></span></td></tr>
    <?php endif; ?>
    </table>
</fieldset>
<?php endif; ?>
<?php if ($this->params->get('addresses_1','1') == '1') : ?>
<fieldset>
<legend><?php echo $this->params->get('field_prior_address',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_PRIOR_ADDRESS')); ?></legend>
    <table class="jg"  width="100%">
    <?php if ($this->params->get('addresses_street','1') == '1') : ?>
        <tr><td width="20%"><label><?php echo $this->params->get('field_street',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_STREET')); ?>:</label></td>
        <td><span><?php echo $this->application->street1; ?></span></td></tr>
    <?php endif; ?>
    <?php if ($this->params->get('addresses_city','1') == '1') : ?>
        <tr><td><label><?php echo $this->params->get('field_city',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_CITY')); ?>:</label></td>
        <td><span><?php echo $this->application->city1; ?></span></td></tr>
    <?php endif; ?>
    <?php if ($this->params->get('addresses_state','1') == '1') : ?>
        <tr><td><label><?php echo $this->params->get('field_state',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_STATE')); ?>:</label></td>
        <td><span><?php echo $this->application->state1; ?></span></td></tr>
    <?php endif; ?>
    <?php if ($this->params->get('addresses_zip_code','1') == '1') : ?>
        <tr><td><label><?php echo $this->params->get('field_zip_code',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_ZIP_CODE')); ?>:</label></td>
        <td><span><?php echo $this->application->zip_code1; ?></span></td></tr>
    <?php endif; ?>
    <?php if ($this->params->get('addresses_since','1') == '1') : ?>
        <tr><td><label><?php echo $this->params->get('field_address_since',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_ADDRESS_SINCE')); ?>:</label></td>
        <td><span><?php echo $this->application->from_date1; ?></span></td></tr>
    <?php endif; ?>
    <?php if ($this->params->get('addresses_to','1') == '1') : ?>
        <tr><td><label><?php echo $this->params->get('field_address_to',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_ADDRESS_TO')); ?>:</label></td>
        <td><span><?php echo $this->application->to_date1; ?></span></td></tr>
    <?php endif; ?>
    </table>
</fieldset>
<?php endif; ?>
<?php if ($this->params->get('addresses_2','1') == '1') : ?>
<fieldset>
<legend><?php echo $this->params->get('field_prior_address',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_PRIOR_ADDRESS')); ?></legend>
    <table class="jg"  width="600px">
    <?php if ($this->params->get('addresses_street','1') == '1') : ?>
        <tr><td width="20%"><label><?php echo $this->params->get('field_street',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_STREET')); ?>:</label></td>
        <td><span><?php echo $this->application->street2; ?></span></td></tr>
    <?php endif; ?>
    <?php if ($this->params->get('addresses_city','1') == '1') : ?>
        <tr><td><label><?php echo $this->params->get('field_city',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_CITY')); ?>:</label></td>
        <td><span><?php echo $this->application->city2; ?></span></td></tr>
    <?php endif; ?>
    <?php if ($this->params->get('addresses_state','1') == '1') : ?>
        <tr><td><label><?php echo $this->params->get('field_state',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_STATE')); ?>:</label></td>
        <td><span><?php echo $this->application->state2; ?></span></td></tr>
    <?php endif; ?>
    <?php if ($this->params->get('addresses_zip_code','1') == '1') : ?>
        <tr><td><label><?php echo $this->params->get('field_zip_code',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_ZIP_CODE')); ?>:</label></td>
        <td><span><?php echo $this->application->zip_code2; ?></span></td></tr>
    <?php endif; ?>
    <?php if ($this->params->get('addresses_since','1') == '1') : ?>
        <tr><td><label><?php echo $this->params->get('field_address_since',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_ADDRESS_SINCE')); ?>:</label></td>
        <td><span><?php echo $this->application->from_date2; ?></span></td></tr>
    <?php endif; ?>
    <?php if ($this->params->get('addresses_to','1') == '1') : ?>
        <tr><td><label><?php echo $this->params->get('field_address_to',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_ADDRESS_TO')); ?>:</label></td>
        <td><span><?php echo $this->application->to_date2; ?></span></td></tr>
    <?php endif; ?>
    </table>
</fieldset>
<?php endif; ?>
<?php endif; ?>
<?php if ($this->params->get('education','1') == '1') : ?>
<?php if ($this->params->get('education_high','1') == '1') : ?>
<fieldset>
<legend><?php echo $this->params->get('field_high_school',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_HIGH_SCHOOL')); ?></legend>
    <table class="jg"  width="100%">
    <?php if ($this->params->get('education_school','1') == '1') : ?>
        <tr><td width="20%"><label><?php echo $this->params->get('field_school_attended',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_SCHOOL_ATTENDED')); ?>:</label></td>
        <td><span><?php echo $this->application->school;?></span></td></tr>
    <?php endif; ?>
    <?php if ($this->params->get('education_city','1') == '1') : ?>
        <tr><td><label><?php echo $this->params->get('field_school_city',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_CITY')); ?>:</label></td>
        <td><span><?php echo $this->application->school_city;?></span></td></tr>
    <?php endif; ?>
    <?php if ($this->params->get('education_state','1') == '1') : ?>
        <tr><td><label><?php echo $this->params->get('field_school_state',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_STATE')); ?>:</label></td>
        <td><span><?php echo $this->application->school_state;?></span></td></tr>
    <?php endif; ?>
    <?php if ($this->params->get('education_diploma','1') == '1') : ?>
        <tr><td><label><?php echo $this->params->get('field_diploma',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_DIPLOMA')); ?>:</label></td>
        <td><span><?php echo ('1'==$this->application->school_diploma)?JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_YES'):JText::_('No'); ?></span></td></tr>
    <?php endif; ?>
    </table>
</fieldset>
<?php endif; ?>
<?php if ($this->params->get('education_undergrad','1') == '1') : ?>
<fieldset>
<legend><?php echo $this->params->get('field_undergrad_school',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_UNDERGRAD_SCHOOL')); ?></legend>
    <table class="jg"  width="100%">
    <?php if ($this->params->get('education_school','1') == '1') : ?>
        <tr><td width="20%"><label><?php echo $this->params->get('field_school_attended',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_SCHOOL_ATTENDED')); ?>:</label></td>
        <td><span><?php echo $this->application->school1;?></span></td></tr>
    <?php endif; ?>
    <?php if ($this->params->get('education_city','1') == '1') : ?>
        <tr><td><label><?php echo $this->params->get('field_school_city',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_CITY')); ?>:</label></td>
        <td><span><?php echo $this->application->school_city1;?></span></td></tr>
    <?php endif; ?>
    <?php if ($this->params->get('education_state','1') == '1') : ?>
        <tr><td><label><?php echo $this->params->get('field_school_state',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_STATE')); ?>:</label></td>
        <td><span><?php echo $this->application->school_state1;?></span></td></tr>
    <?php endif; ?>
    <?php if ($this->params->get('education_diploma','1') == '1') : ?>
        <tr><td><label><?php echo $this->params->get('field_diploma',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_DIPLOMA')); ?>:</label></td>
        <td><span><?php echo ('1'==$this->application->school_diploma1)?JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_YES'):JText::_('No'); ?></span></td></tr>
    <?php endif; ?>
    <?php if ($this->params->get('education_degree','1') == '1') : ?>
        <tr><td><label><?php echo $this->params->get('field_deg_cert_dip_long',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_DEG_CERT_DIP_LONG')); ?>:</label></td>
        <td><span><?php echo $this->application->diploma_text1;?></span></td></tr>
    <?php endif; ?>
    <?php if ($this->params->get('education_study','1') == '1') : ?>
        <tr><td><label><?php echo $this->params->get('field_area_of_study',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_AREA_OF_STUDY')); ?>:</label></td>
        <td><span><?php echo $this->application->study_area1;?></span></td></tr>
    <?php endif; ?>
    </table>
</fieldset>
<?php endif; ?>
<?php if ($this->params->get('education_grad','1') == '1') : ?>
<fieldset>
<legend><?php echo $this->params->get('field_grad_school',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_GRAD_SCHOOL')); ?></legend>
    <table class="jg"  width="100%">
    <?php if ($this->params->get('education_school','1') == '1') : ?>
        <tr><td width="20%"><label><?php echo $this->params->get('field_school_attended',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_SCHOOL_ATTENDED')); ?>:</label></td>
        <td><span><?php echo $this->application->school2;?></span></td></tr>
    <?php endif; ?>
    <?php if ($this->params->get('education_city','1') == '1') : ?>
        <tr><td><label><?php echo  $this->params->get('field_school_city',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_CITY')); ?>:</label></td>
        <td><span><?php echo $this->application->school_city2;?></span></td></tr>
    <?php endif; ?>
    <?php if ($this->params->get('education_state','1') == '1') : ?>
        <tr><td><label><?php echo $this->params->get('field_school_state',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_STATE')); ?>:</label></td>
        <td><span><?php echo $this->application->school_state2;?></span></td></tr>
    <?php endif; ?>
    <?php if ($this->params->get('education_diploma','1') == '1') : ?>
        <tr><td><label><?php echo $this->params->get('field_diploma',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_DIPLOMA')); ?>:</label></td>
        <td><span><?php echo ('1'==$this->application->school_diploma2)?JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_YES'):JText::_('No'); ?></span></td></tr>
    <?php endif; ?>
    <?php if ($this->params->get('education_degree','1') == '1') : ?>
        <tr><td><label><?php echo $this->params->get('field_deg_cert_dip_long',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_DEG_CERT_DIP_LONG')); ?>:</label></td>
        <td><span><?php echo $this->application->diploma_text2;?></span></td></tr>
    <?php endif; ?>
    <?php if ($this->params->get('education_study','1') == '1') : ?>
        <tr><td><label><?php echo $this->params->get('field_area_of_study',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_AREA_OF_STUDY')); ?>:</label></td>
        <td><span><?php echo $this->application->study_area2;?></span></td></tr>
    <?php endif; ?>
    </table>
</fieldset>
<?php endif; ?>
<?php if ($this->params->get('education_other','1') == '1') : ?>
<fieldset>
<legend><?php echo $this->params->get('field_other_school',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_OTHER_SCHOOL')); ?></legend>
    <table class="jg"  width="100%">
    <?php if ($this->params->get('education_school','1') == '1') : ?>
        <tr><td width="20%"><label><?php echo $this->params->get('field_school_attended',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_SCHOOL_ATTENDED')); ?>:</label></td>
        <td><span><?php echo $this->application->school3;?></span></td></tr>
    <?php endif; ?>
    <?php if ($this->params->get('education_city','1') == '1') : ?>
        <tr><td><label><?php echo $this->params->get('field_school_city',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_CITY')); ?>:</label></td>
        <td><span><?php echo $this->application->school_city3;?></span></td></tr>
    <?php endif; ?>
    <?php if ($this->params->get('education_state','1') == '1') : ?>
        <tr><td><label><?php echo $this->params->get('field_school_state',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_STATE')); ?>:</label></td>
        <td><span><?php echo $this->application->school_state3;?></span></td></tr>
    <?php endif; ?>
    <?php if ($this->params->get('education_diploma','1') == '1') : ?>
        <tr><td><label><?php echo $this->params->get('field_diploma',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_DIPLOMA')); ?>:</label></td>
        <td><span><?php echo ('1'==$this->application->school_diploma3)?JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_YES'):JText::_('No'); ?></span></td></tr>
    <?php endif; ?>
    <?php if ($this->params->get('education_degree','1') == '1') : ?>
        <tr><td><label><?php echo $this->params->get('field_deg_cert_dip_long',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_DEG_CERT_DIP_LONG')); ?>:</label></td>
        <td><span><?php echo $this->application->diploma_text3;?></span></td></tr>
    <?php endif; ?>
    <?php if ($this->params->get('education_study','1') == '1') : ?>
        <tr><td><label><?php echo $this->params->get('field_area_of_study',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_AREA_OF_STUDY')); ?>:</label></td>
        <td><span><?php echo $this->application->study_area3;?></span></td></tr>
    <?php endif; ?>
    </table>
</fieldset>
<?php endif; ?>
<?php endif; ?>
<?php if ($this->params->get('employment_information','1') == '1') : ?>
<fieldset>
<legend><?php echo $this->params->get('field_employment_information',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_EMPLOYMENT_INFORMATION')); ?></legend>
    <table class="jg"  width="100%">
    <?php if ($this->params->get('employment_information_position','1') == '1') : ?>
        <tr><td width="20%"><label><?php echo $this->params->get('field_position_applied_for',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_POSITION_APPLIED_FOR')); ?>:</label></td>
        <td><span><?php echo $this->application->position;?></span></td></tr>
    <?php endif; ?>
    <?php if ($this->params->get('employment_information_date_you_can_start','1') == '1') : ?>
        <tr><td><label><?php echo $this->params->get('field_date_you_can_start',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_DATE_YOU_CAN_START')); ?>:</label></td>
        <td><span><?php echo $this->application->available_date;?></span></td></tr>
    <?php endif; ?>
    <?php if ($this->params->get('employment_information_desired_salary','1') == '1') : ?>
        <tr><td><label><?php echo $this->params->get('field_desired_salary',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_DESIRED_SALARY')); ?>:</label></td>
        <td><?php echo $this->params->get('employment_information_currency',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_CURRENCY_SYMBOL')) ?>&nbsp;<?php echo $this->application->desired_pay;?></td></tr>
    <?php endif; ?>
    <?php if ($this->params->get('employment_information_do_you_prefer','1') == '1') : ?>
        <tr><td><label><?php echo $this->params->get('field_do_you_prefer',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_DO_YOU_PREFER')); ?>:</label></td>
        <td colspan="2" valign="top" ><span><?php echo $this->application->work_preferences; ?></span></td></tr>
    <?php endif; ?>
    <?php if ($this->params->get('employment_information_shiftwork','1') == '1') : ?>
        <tr><td><label><?php echo $this->params->get('field_shiftwork',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_SHIFTWORK')); ?>:</label></td>
        <td colspan="2" valign="top" ><span><?php if( '1' == $this->application->shiftwork) echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_YES'); else echo JText::_('NO'); ?></span></td></tr>
    <?php endif; ?>
    <?php if ($this->params->get('employment_information_can_you_work','1') == '1') : ?>
        <tr><td><label><?php echo $this->params->get('field_you_can_work',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_YOU_CAN_WORK')); ?>:</label></td>
        <td><span><?php if ( '1' == $this->application->weekends ) echo $this->params->get('field_weekends',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_WEEKENDS'))." "; 
        ?><?php if ( '1' == $this->application->evenings ) echo $this->params->get('field_evenings',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_EVENINGS'))." "; ?></span></td></tr>
    <?php endif; ?>
    <?php if ($this->params->get('employment_information_available','1') == '1') : ?>
        <tr><td><label><?php echo $this->params->get('field_available',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_AVAILABLE')); ?>:</label></td>
        <td><span><?php if ( '1' == $this->application->monday ) echo $this->params->get('field_monday_abbr',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_MONDAY'))." "; 
        ?><?php if ( '1' == $this->application->tuesday ) echo $this->params->get('field_tuesday_abbr',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_TUESDAY'))." "; 
        ?><?php if ( '1' == $this->application->wednesday ) echo $this->params->get('field_wednesday_abbr',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_WEDNESDAY'))." "; 
        ?><?php if ( '1' == $this->application->thursday ) echo $this->params->get('field_thursday_abbr',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_THURSDAY'))." "; 
        ?><?php if ( '1' == $this->application->friday ) echo $this->params->get('field_friday_abbr',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_FRIDAY'))." "; 
        ?><?php if ( '1' == $this->application->saturday ) echo $this->params->get('field_saturday_abbr',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_SATURDAY'))." "; 
        ?><?php if ( '1' == $this->application->sunday ) echo $this->params->get('field_sunday_abbr',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_SUNDAY'))." "; ?></span></td></tr>
    <?php endif; ?>
    <?php if ($this->params->get('employment_information_not_available','1') == '1') : ?>
        <tr><td><label><?php echo $this->params->get('field_not_available',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_NOT_AVAILABLE')); ?>:</label></td>
        <td><span><?php echo $this->application->unavailability;?></span></td></tr>
    <?php endif;?>
    </table>
</fieldset>

<fieldset>
<legend><?php echo $this->params->get('field_following_questions',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_FOLLOWING_QUESTIONS')); ?></legend>
    <table class="jg" width="100%">
    <?php $qcounter = 0; ?>
    <?php if ($this->params->get('employment_information_question_1','1') == '1') : ?>
    <?php $qcounter++; ?>
        <tr><td width="5%" valign="top"><label><?php echo $qcounter."."; ?></label></td>
        <td><span><?php echo $this->params->get('field_question_1',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_QUESTION_1')); 
        ?>&nbsp;<strong><?php echo ('1'==$this->application->eligible)?JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_YES'):JText::_('No'); ?></strong></span></td></tr>
        <tr><td></td>
        <td><span><?php echo $this->params->get('field_question_1_followup', JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_QUESTION_1_FOLLOWUP')); 
        ?>&nbsp;<strong><?php echo('1'==$this->application->provideproof)?JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_YES'):JText::_('NO'); ?><strong></span></td></tr>
    <?php endif; ?>
    <?php if ($this->params->get('employment_information_question_2','1') == '1') : ?>
    <?php $qcounter++; ?>
        <tr><td width="5%" valign="top"><label><?php echo $qcounter."."; ?></label></td>
        <td><span><?php echo $this->params->get('field_question_2',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_QUESTION_2')); 
        ?>&nbsp;<strong><?php echo ('1'==$this->application->worked_here_before)?JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_YES'):JText::_('No'); 
        ?></strong></span><br/><span><?php echo $this->params->get('field_question_2_followup',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_QUESTION_2_FOLLOWUP')); 
        ?>&nbsp;<strong><?php echo $this->application->worked_here_text;?></strong></span></td></tr>
    <?php endif; ?>
    <?php if ($this->params->get('employment_information_question_3','1') == '1') : ?>
    <?php $qcounter++; ?>
        <tr><td width="5%" valign="top"><label><?php echo $qcounter."."; ?></label></td>
        <td><span><?php echo $this->params->get('field_question_3',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_QUESTION_3')); 
        ?>&nbsp;<strong><?php echo ('1'==$this->application->job_desc_received)?JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_YES'):JText::_('No'); ?></strong></span></td></tr>
    <?php endif; ?>
    <?php if ($this->params->get('employment_information_question_4','1') == '1') : ?>
    <?php $qcounter++; ?>
        <tr><td width="5%" valign="top"><label><?php echo $qcounter."." ?></label></td>
        <td><span><?php echo $this->params->get('field_question_4',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_QUESTION_4')); 
        ?>&nbsp;<strong><?php echo ('1'==$this->application->understand_reqs)?JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_YES'):JText::_('No');
        ?></strong></span><br/><span><?php echo $this->params->get('field_question_4_followup',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_QUESTION_4_FOLLOWUP')); 
        ?>&nbsp;<strong><?php echo $this->application->no_understand_reqs; ?></strong></span></td></tr>
    <?php endif; ?>
    <?php if ($this->params->get('employment_information_question_5','1') == '1') : ?>
    <?php $qcounter++; ?>
        <tr><td width="5%" valign="top"><label><?php echo $qcounter."."; ?></label></td>
        <td><span><?php echo $this->params->get('field_question_5',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_QUESTION_5')); 
        ?>&nbsp;<strong><?php echo ('1'==$this->application->on_layoff)?JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_YES'):JText::_('No'); ?></strong></span></td></tr>
    <?php endif; ?>
    <?php if ($this->params->get('employment_information_question_6','1') == '1') : ?>
    <?php $qcounter++; ?>
        <tr><td width="5%" valign="top"><label><?php echo $qcounter."." ?></label></td>
        <td><span><?php echo $this->params->get('field_question_6',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_QUESTION_6')); 
        ?>&nbsp;<strong><?php echo ('1'==$this->application->conf_agreement)?JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_YES'):JText::_('No');
        ?></strong></span><br/><span><?php echo $this->params->get('field_question_6_followup',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_QUESTION_6_FOLLOWUP')); 
        ?>&nbsp;<strong><?php echo $this->application->conf_explain; ?></strong></span></td></tr>
    <?php endif; ?>
    <?php if ($this->params->get('employment_information_question_7','1') == '1') : ?>
    <?php $qcounter++; ?>
        <tr><td width="5%" valign="top"><label><?php echo $qcounter."." ?></label></td>
        <td><span><?php echo $this->params->get('field_question_7',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_QUESTION_7')); 
        ?>&nbsp;<strong><?php echo ('1'==$this->application->discharged)?JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_YES'):JText::_('No');
        ?></strong></span><br/><span><?php echo $this->params->get('field_question_7_followup',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_QUESTION_7_FOLLOWUP')); 
        ?>&nbsp;<strong><?php echo $this->application->discharge_explain; ?></strong></span></td></tr>
    <?php endif; ?>
    <?php if ($this->params->get('employment_information_question_8','1') == '1') : ?>
    <?php $qcounter++; ?>
        <tr><td width="5%" valign="top"><label><?php echo $qcounter."." ?></label></td>
        <td><span><?php echo $this->params->get('field_question_8',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_QUESTION_8')); 
        ?>&nbsp;<strong><?php echo ('1'==$this->application->convict)?JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_YES'):JText::_('No');
        ?></strong></span><br/><span><?php echo $this->params->get('field_question_8_followup',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_QUESTION_8_FOLLOWUP')); 
        ?>&nbsp;<strong><?php echo $this->application->convict_explain; ?></strong></span></td></tr>
    <?php endif; ?>
    <?php if ($this->params->get('employment_information_question_9','1') == '1') : ?>
    <?php $qcounter++; ?>
        <tr><td width="5%" valign="top"><label><?php echo $qcounter."." ?></label></td>
        <td><span><?php echo $this->params->get('field_question_9',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_QUESTION_9')); 
        ?>&nbsp;<strong><?php echo ('1'==$this->application->family)?JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_YES'):JText::_('No');
        ?></strong></span><br/><span><?php echo $this->params->get('field_question_9_followup',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_QUESTION_9_FOLLOWUP')); 
        ?>&nbsp;<strong><?php echo $this->application->family_explain; ?></strong></span></td></tr>
    <?php endif; ?>
    </table>
</fieldset>
<?php endif; ?>
<?php if ($this->params->get('employment_history','1') == '1') : ?>
<?php if ($this->params->get('employment_history_currently_employed','1') == '1') : ?>
    <tr><td><label><?php echo $this->params->get('field_currently_employed',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_CURRENTLY_EMPLOYED')); ?>:</label></td>
    <td colspan="2" valign="top" ><span><?php if( '1' == $this->application->currently_employed) echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_YES'); else echo JText::_('NO'); ?></span></td></tr>
<?php endif; ?>
<?php if ($this->params->get('employment_history_contact_current_employer','1') == '1') : ?>
    <tr><td><label><?php echo $this->params->get('field_contact_employer',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_CONTACT_EMPLOYER')); ?>:</label></td>
    <td colspan="2" valign="top" ><span><?php if( '1' == $this->application->contact_emp) echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_YES'); else echo JText::_('NO'); ?></span></td></tr>
<?php endif; ?>
<?php if ($this->params->get('employment_history_recent','1') == '1') : ?>
<fieldset>
<legend><?php echo $this->params->get('field_most_recent_employer',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_MOST_RECENT_EMPLOYER')); ?></legend>
    <table class="jg" width="100%">
    <?php if ( $this->params->get('employment_history_employer','1') == '1') : ?>
        <tr><td width="20%" valign="top"><label><?php echo $this->params->get('field_employer',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_EMPLOYER')); ?>:</label></td>
        <td><span><?php echo $this->application->employer;?></span></td></tr>
    <?php endif; ?>
    <?php if ( $this->params->get('employment_history_city','1') == '1') : ?>
        <tr><td><label><?php echo $this->params->get('field_employer_city',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_CITY')); ?>:</label></td>
        <td><span><?php echo $this->application->employer_city;?></span></td></tr>
    <?php endif; ?>
    <?php if ( $this->params->get('employment_history_state','1') == '1') : ?>
        <tr><td><label><?php echo $this->params->get('field_employer_state',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_STATE')); ?>:</label></td>
        <td><span><?php echo $this->application->employer_state;?></span></td></tr>
    <?php endif; ?>
    <?php if ( $this->params->get('employment_history_zip_code','1') == '1') : ?>
        <tr><td><label><?php echo $this->params->get('field_employer_zip_code',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_ZIP_CODE')); ?>:</label></td>
        <td><span><?php echo $this->application->employer_zip;?></span></td></tr>
    <?php endif; ?>
    <?php if ( $this->params->get('employment_history_phone','1') == '1') : ?>
        <tr><td><label><?php echo $this->params->get('field_employer_phone',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_PHONE')); ?>:</label></td>
        <td><span><?php echo $this->application->employer_phone;?></span></td></tr>
    <?php endif; ?>
    <?php if ( $this->params->get('employment_history_position','1') == '1') : ?>
        <tr><td><label><?php echo $this->params->get('field_position_held',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_POSITION_HELD')); ?>:</label></td>
        <td><span><?php echo $this->application->employer_pos;?></span></td></tr>
    <?php endif; ?>
    <?php if ( $this->params->get('employment_history_from','1') == '1') : ?>
        <tr><td><label><?php echo $this->params->get('field_employer_from_myyyy',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_FROM_MYYYY')); ?>:</label></td>
        <td><span><?php echo $this->application->employer_from;?></span></td></tr>
    <?php endif; ?>
    <?php if ( $this->params->get('employment_history_to','1') == '1') : ?>
        <tr><td><label><?php echo $this->params->get('field_employer_to_myyyy',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_TO_MYYYY')); ?>:</label></td>
        <td><span><?php echo $this->application->employer_to;?></span></td></tr>
    <?php endif; ?>
    <?php if ( $this->params->get('employment_history_pay','1') == '1') : ?>
        <tr><td><label><?php echo $this->params->get('field_pay_upon_leaving',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_PAY_UPON_LEAVING')); ?>:</label></td>
        <td><span><?php echo $this->application->employer_pay;?></span></td></tr>
    <?php endif; ?>
    <?php if ( $this->params->get('employment_history_supervisor','1') == '1') : ?>
        <tr><td><label><?php echo $this->params->get('field_supervisor',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_SUPERVISOR')); ?>:</label></td>
        <td><span><?php echo $this->application->employer_sup;?></span></td></tr>
    <?php endif; ?>
    <?php if ( $this->params->get('employment_history_duties','1') == '1') : ?>
        <tr><td><label><?php echo $this->params->get('field_duties',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_DUTIES')); ?>:</label></td>
        <td><span><?php echo $this->application->employer_dut;?></span></td></tr>
    <?php endif; ?>
    <?php if ( $this->params->get('employment_history_reason','1') == '1') : ?>
        <tr><td><label><?php echo $this->params->get('field_reason_for_leaving',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_REASON_FOR_LEAVING')); ?>:</label></td>
        <td><span><?php echo $this->application->employer_leave;?></span></td></tr>
    <?php endif; ?>
    </table>
</fieldset>
<?php endif; ?>
<?php if ($this->params->get('employment_history_1','1') == '1') : ?>
<fieldset>
<legend><?php echo $this->params->get('field_prior_employer',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_PRIOR_EMPLOYER')); ?></legend>
    <table class="jg"  width="100%">
    <?php if ( $this->params->get('employment_history_employer','1') == '1') : ?>
        <tr><td width="20%" valign="top"><label><?php echo $this->params->get('field_employer',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_EMPLOYER')); ?>:</label></td>
        <td><span><?php echo $this->application->employer1;?></span></td></tr>
    <?php endif; ?>
    <?php if ( $this->params->get('employment_history_city','1') == '1') : ?>
        <tr><td><label><?php echo $this->params->get('field_employer_city',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_CITY')); ?>:</label></td>
        <td><span><?php echo $this->application->employer1_city;?></span></td></tr>
    <?php endif; ?>
    <?php if ( $this->params->get('employment_history_state','1') == '1') : ?>
        <tr><td><label><?php echo $this->params->get('field_employer_state',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_STATE')); ?>:</label></td>
        <td><span><?php echo $this->application->employer1_state;?></span></td></tr>
    <?php endif; ?>
    <?php if ( $this->params->get('employment_history_zip_code','1') == '1') : ?>
        <tr><td><label><?php echo $this->params->get('field_employer_zip_code',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_ZIP_CODE')); ?>:</label></td>
        <td><span><?php echo $this->application->employer1_zip;?></span></td></tr>
    <?php endif; ?>
    <?php if ( $this->params->get('employment_history_phone','1') == '1') : ?>
        <tr><td><label><?php echo $this->params->get('field_employer_phone',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_PHONE')); ?>:</label></td>
        <td><span><?php echo $this->application->employer1_phone;?></span></td></tr>
    <?php endif; ?>
    <?php if ( $this->params->get('employment_history_position','1') == '1') : ?>
        <tr><td><label><?php echo $this->params->get('field_position_held',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_POSITION_HELD')); ?>:</label></td>
        <td><span><?php echo $this->application->employer1_pos;?></span></td></tr>
    <?php endif; ?>
    <?php if ( $this->params->get('employment_history_from','1') == '1') : ?>
        <tr><td><label><?php echo $this->params->get('field_employer_from_myyyy',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_FROM_MYYYY')); ?>:</label></td>
        <td><span><?php echo $this->application->employer1_from;?></span></td></tr>
    <?php endif; ?>
    <?php if ( $this->params->get('employment_history_to','1') == '1') : ?>
        <tr><td><label><?php echo $this->params->get('field_employer_to_myyyy',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_TO_MYYYY')); ?>:</label></td>
        <td><span><?php echo $this->application->employer1_to;?></span></td></tr>
    <?php endif; ?>
    <?php if ( $this->params->get('employment_history_pay','1') == '1') : ?>
        <tr><td><label><?php echo $this->params->get('field_pay_upon_leaving',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_PAY_UPON_LEAVING')); ?>:</label></td>
        <td><span><?php echo $this->application->employer1_pay; ?></span></td></tr>
    <?php endif; ?>
    <?php if ( $this->params->get('employment_history_supervisor','1') == '1') : ?>
        <tr><td><label><?php echo $this->params->get('field_supervisor',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_SUPERVISOR')); ?>:</label></td>
        <td><span><?php echo $this->application->employer1_sup;?></span></td></tr>
    <?php endif; ?>
    <?php if ( $this->params->get('employment_history_duties','1') == '1') : ?>
        <tr><td><label><?php echo $this->params->get('field_duties',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_DUTIES')); ?>:</label></td>
        <td><span><?php echo $this->application->employer1_dut;?></span></td></tr>
    <?php endif; ?>
    <?php if ( $this->params->get('employment_history_reason','1') == '1') : ?>
        <tr><td><label><?php echo $this->params->get('field_reason_for_leaving',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_REASON_FOR_LEAVING')); ?>:</label></td>
        <td><span><?php echo $this->application->employer1_leave;?></span></td></tr>
    <?php endif ?>
    </table>
</fieldset>
<?php endif; ?>
<?php if ($this->params->get('employment_history_2','1') == '1') : ?>
<fieldset>
<legend><?php echo $this->params->get('field_prior_employer',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_PRIOR_EMPLOYER')); ?></legend>
    <table class="jg"  width="100%">
    <?php if ( $this->params->get('employment_history_employer','1') == '1') : ?>
        <tr><td width="20%" valign="top"><label><?php echo $this->params->get('field_employer',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_EMPLOYER')); ?>:</label></td>
        <td><span><?php echo $this->application->employer2;?></span></td></tr>
    <?php endif; ?>
    <?php if ( $this->params->get('employment_history_city','1') == '1') : ?>
        <tr><td><label><?php echo $this->params->get('field_employer_city',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_CITY')); ?>:</label></td>
        <td><span><?php echo $this->application->employer2_city;?></span></td></tr>
    <?php endif; ?>
    <?php if ( $this->params->get('employment_history_state','1') == '1') : ?>
        <tr><td><label><?php echo $this->params->get('field_employer_state',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_STATE')); ?>:</label></td>
        <td><span><?php echo $this->application->employer2_state;?></span></td></tr>
    <?php endif; ?>
    <?php if ( $this->params->get('employment_history_zip_code','1') == '1') : ?>
        <tr><td><label><?php echo $this->params->get('field_employer_zip_code',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_ZIP_CODE')); ?>:</label></td>
        <td><span><?php echo $this->application->employer2_zip;?></span></td></tr>
    <?php endif; ?>
    <?php if ( $this->params->get('employment_history_phone','1') == '1') : ?>
        <tr><td><label><?php echo $this->params->get('field_employer_phone',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_PHONE')); ?>:</label></td>
        <td><span><?php echo $this->application->employer2_phone;?></span></td></tr>
    <?php endif; ?>
    <?php if ( $this->params->get('employment_history_position','1') == '1') : ?>
        <tr><td><label><?php echo $this->params->get('field_position_held',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_POSITION_HELD')); ?>:</label></td>
        <td><span><?php echo $this->application->employer2_pos;?></span></td></tr>
    <?php endif; ?>
    <?php if ( $this->params->get('employment_history_from','1') == '1') : ?>
        <tr><td><label><?php echo $this->params->get('field_employer_from_myyyy',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_FROM_MYYYY')); ?>:</label></td>
        <td><span><?php echo $this->application->employer2_from;?></span></td></tr>
    <?php endif; ?>
    <?php if ( $this->params->get('employment_history_to','1') == '1') : ?>
        <tr><td><label><?php echo $this->params->get('field_employer_to_myyyy',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_TO_MYYYY')); ?>:</label></td>
        <td><span><?php echo $this->application->employer2_to;?></span></td></tr>
    <?php endif; ?>
    <?php if ( $this->params->get('employment_history_pay','1') == '1') : ?>
        <tr><td><label><?php echo $this->params->get('field_pay_upon_leaving',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_PAY_UPON_LEAVING')); ?>:</label></td>
        <td><span><?php echo $this->application->employer2_pay;?></span></td></tr>
    <?php endif; ?>
    <?php if ( $this->params->get('employment_history_supervisor','1') == '1') : ?>
        <tr><td><label><?php echo $this->params->get('field_supervisor',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_SUPERVISOR')); ?>:</label></td>
        <td><span><?php echo $this->application->employer2_sup;?></span></td></tr>
    <?php endif; ?>
    <?php if ( $this->params->get('employment_history_duties','1') == '1') : ?>
        <tr><td><label><?php echo $this->params->get('field_duties',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_DUTIES')); ?>:</label></td>
        <td><span><?php echo $this->application->employer2_dut;?></span></td></tr>
    <?php endif; ?>
    <?php if ( $this->params->get('employment_history_reason','1') == '1') : ?>
        <tr><td><label><?php echo $this->params->get('field_reason_for_leaving',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_REASON_FOR_LEAVING')); ?>:</label></td>
        <td><span><?php echo $this->application->employer2_leave;?></span></td></tr>
    <?php endif; ?>
    </table>
</fieldset>
<?php endif; ?>
<?php if ($this->params->get('employment_history_3','1') == '1') : ?>
<fieldset>
<legend><?php echo $this->params->get('field_prior_employer',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_PRIOR_EMPLOYER')); ?></legend>
    <table class="jg" width="100%">
    <?php if ( $this->params->get('employment_history_employer','1') == '1') : ?>
        <tr><td width="20%" valign="top"><label><?php echo $this->params->get('field_employer',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_EMPLOYER')); ?>:</label></td>
        <td><span><?php echo $this->application->employer3;?></span></td></tr>
    <?php endif; ?>
    <?php if ( $this->params->get('employment_history_city','1') == '1') : ?>
        <tr><td><label><?php echo $this->params->get('field_employer_city',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_CITY')); ?>:</label></td>
        <td><span><?php echo $this->application->employer3_city;?></span></td></tr>
    <?php endif; ?>
    <?php if ( $this->params->get('employment_history_state','1') == '1') : ?>
        <tr><td><label><?php echo $this->params->get('field_employer_state',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_STATE')); ?>:</label></td>
        <td><span><?php echo $this->application->employer3_state;?></span></td></tr>
    <?php endif; ?>
    <?php if ( $this->params->get('employment_history_zip_code','1') == '1') : ?>
        <tr><td><label><?php echo $this->params->get('field_employer_zip_code',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_ZIP_CODE')); ?>:</label></td>
        <td><span><?php echo $this->application->employer3_zip;?></span></td></tr>
    <?php endif; ?>
    <?php if ( $this->params->get('employment_history_phone','1') == '1') : ?>
        <tr><td><label><?php echo $this->params->get('field_employer_phone',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_PHONE')); ?>:</label></td>
        <td><span><?php echo $this->application->employer3_phone;?></span></td></tr>
    <?php endif; ?>
    <?php if ( $this->params->get('employment_history_position','1') == '1') : ?>
        <tr><td><label><?php echo $this->params->get('field_position_held',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_POSITION_HELD')); ?>:</label></td>
        <td><span><?php echo $this->application->employer3_pos;?></span></td></tr>
    <?php endif; ?>
    <?php if ( $this->params->get('employment_history_from','1') == '1') : ?>
        <tr><td><label><?php echo $this->params->get('field_employer_from_myyyy',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_FROM_MYYYY')); ?>:</label></td>
        <td><span><?php echo $this->application->employer3_from;?></span></td></tr>
    <?php endif; ?>
    <?php if ( $this->params->get('employment_history_to','1') == '1') : ?>
        <tr><td><label><?php echo $this->params->get('field_employer_to_myyyy',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_TO_MYYYY')); ?>:</label></td>
        <td><span><?php echo $this->application->employer3_to;?></span></td></tr>
    <?php endif; ?>
    <?php if ( $this->params->get('employment_history_pay','1') == '1') : ?>
        <tr><td><label><?php echo $this->params->get('field_pay_upon_leaving',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_PAY_UPON_LEAVING')); ?>:</label></td>
        <td><span><?php echo $this->application->employer3_pay;?></span></td></tr>
    <?php endif; ?>
    <?php if ( $this->params->get('employment_history_supervisor','1') == '1') : ?>
        <tr><td><label><?php echo $this->params->get('field_supervisor',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_SUPERVISOR')); ?>:</label></td>
        <td><span><?php echo $this->application->employer3_sup;?></span></td></tr>
    <?php endif; ?>
    <?php if ( $this->params->get('employment_history_duties','1') == '1') : ?>
        <tr><td><label><?php echo $this->params->get('field_duties',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_DUTIES')); ?>:</label></td>
        <td><span><?php echo $this->application->employer3_dut;?></span></td></tr>
    <?php endif; ?>
    <?php if ( $this->params->get('employment_history_reason','1') == '1') : ?>
        <tr><td><label><?php echo $this->params->get('field_reason_for_leaving',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_REASON_FOR_LEAVING')); ?>:</label></td>
        <td><span><?php echo $this->application->employer3_leave;?></span></td></tr>
    <?php endif; ?>
    </table>
</fieldset>
<?php endif; ?>
<?php endif; ?>
<?php if ($this->params->get('job_related_skills','1') == '1') : ?>
<fieldset>
<legend><?php echo $this->params->get('field_job_related_skills',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_JOB_RELATED_SKILLS')); ?></legend>
    <table class="jg" width="100%">
    <tr><td colspan="2"><label><?php echo $this->params->get('field_vehicle_questions',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_VEHICLE_QUESTIONS')); ?></label></td></tr>
    <?php $qcounter = 0; ?>
    <?php if ( $this->params->get('job_related_skills_q1','1') == '1') : ?>
    <?php $qcounter++; ?>
        <tr><td width="5%" valign="top"><label><?php echo $qcounter."." ?></label></td>
        <td><span><?php echo $this->params->get('field_vehicle_question_1',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_VEHICLE_QUESTION_1')); 
        ?>&nbsp;<strong><?php echo ('1'==$this->application->driver_license)?JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_YES'):JText::_('No');
        ?></strong></span><br/>
        <span><?php echo $this->params->get('field_vehicle_question_1_followup_a',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_VEHICLE_QUESTION_1_FOLLOWUP_A')); 
        ?>&nbsp;<strong><?php echo $this->application->dl_number; 
        ?></strong></span><br/>
        <span><?php echo $this->params->get('field_vehicle_question_1_followup_b',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_VEHICLE_QUESTION_1_FOLLOWUP_B'));
        ?>&nbsp;<strong><?php echo $this->application->dl_issued; ?></strong></span></td></tr>
    <?php endif; ?>
    <?php if ( $this->params->get('job_related_skills_q2','1') == '1') : ?>
    <?php $qcounter++; ?>
        <tr><td valign="top"><label><?php echo $qcounter."."; ?></label></td>
        <td><span><?php echo $this->params->get('field_vehicle_question_2',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_VEHICLE_QUESTION_2')); 
        ?>&nbsp;<strong><?php echo ('1'==$this->application->driving_offense)?JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_YES'):JText::_('No'); 
        ?></strong></span></td></tr>
    <?php endif; ?>
    <?php if ($this->params->get('job_related_skills_q2_reason','1') == '1') : ?>
        <tr><td></td>
        <td><span><?php echo $this->params->get('field_vehicle_question_2_followup',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_VEHICLE_QUESTION_2_FOLLOWUP'));
        ?>&nbsp;<strong><?php echo $this->application->driving_offense_reason; 
        ?></strong></span></td></tr>
    <?php endif; ?>
    <?php if ( $this->params->get('job_related_skills_q2_reason','1') == '1') : ?>
        <tr><td valign="top"><label><?php echo $qcounter."."; ?></label></td>
        <td><span><?php echo $this->params->get('field_vehicle_question_3',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_VEHICLE_QUESTION_3')); 
        ?>&nbsp;<strong><?php echo ('1'==$this->application->dl_modified)?JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_YES'):JText::_('No');
        ?></strong></span></td></tr>
    <?php endif; ?>
    <?php if ( $this->params->get('job_related_skills_q3_reason','1') == '1') : ?>
        <tr><td></td>
        <td><span><?php echo $this->params->get('field_vehicle_question_3_followup',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_VEHICLE_QUESTION_3_FOLLOWUP')); 
        ?>&nbsp;<strong><?php echo $this->application->dl_modified_reason; 
        ?></strong></span></td></tr>
    <?php endif; ?>
    <?php if ( $this->params->get('job_related_skills_states','1') == '1') : ?>
    <?php $qcounter++; ?>
        <tr><td valign="top"><label><?php echo $qcounter."."; ?></label></td>
        <td><span><?php echo $this->params->get('field_vehicle_states',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_VEHICLE_STATES')); 
        ?>&nbsp;<strong><?php echo $this->application->dl_states; 
        ?></strong></span></td></tr>
    <?php endif; ?>
    <?php if ( $this->params->get('job_related_skills_skills','1') == '1') : ?>
        <tr><td></td>
        <td><strong><?php echo $this->params->get('field_other_skills',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_SKILLS')); ?>:</strong><br/>
        <?php echo $this->application->skills; ?></td></tr>
    <?php endif; ?>
    <?php if ( $this->params->get('job_related_skills_designations','1') == '1') : ?>
        <tr><td></td>
        <td><strong><?php echo $this->params->get('field_prof_designations',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_PROF_DESIGNATIONS')); ?>:</strong><br/>
        <?php echo $this->application->professional; ?></td></tr>
    <?php endif; ?>
    <tr><td></td><td><?php echo JHTML::_('jobgrokapp.renderLists',$this->application->lists); ?></td></tr>
    </table>
</fieldset>
<?php endif; ?>
<?php if ($this->params->get('references','1') == '1') : ?>
<?php if ($this->params->get('references_1','1') == '1') : ?>
<fieldset>
<legend><?php echo $this->params->get('field_reference',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_REFERENCE')); ?></legend>
    <table class="jg" width="100%">
    <?php if ( $this->params->get('references_name','1') == '1') : ?>
        <tr><td width="20%"><label><?php echo $this->params->get('field_reference_name',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_NAME')); ?>:</label></td>
        <td><span><?php echo $this->application->ref1_name;?></span></td></tr>
    <?php endif; ?>
    <?php if ( $this->params->get('references_address','1') == '1') : ?>
        <tr><td><label><?php echo $this->params->get('field_reference_address',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_ADDRESS')); ?>:</label></td>
        <td><span><?php echo $this->application->ref1_address;?></span></td></tr>
    <?php endif; ?>
    <?php if ( $this->params->get('references_telephone','1') == '1') : ?>
        <tr><td><label><?php echo $this->params->get('field_reference_telephone',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_TELEPHONE')); ?>:</label></td>
        <td><span><?php echo $this->application->ref1_telephone;?></span></td></tr>
    <?php endif ?>
    <?php if ( $this->params->get('references_relationship','1') == '1') : ?>
        <tr><td><label><?php echo $this->params->get('field_reference_relationship',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RELATIONSHIP')); ?>:</label></td>
        <td><span><?php echo $this->application->ref1_relationship;?></span></td></tr>
    <?php endif; ?>
    <?php if ( $this->params->get('references_years_acquainted','1') == '1') : ?>
        <tr><td><label><?php echo $this->params->get('field_reference_years_acquainted',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_YEARS_ACQUAINTED')); ?>:</label></td>
        <td><span><?php echo $this->application->ref1_years;?></span></td></tr>
    <?php endif; ?>
    </table>
</fieldset>
<?php endif; ?>
<?php if ($this->params->get('references_2','1') == '1') : ?>
<fieldset>
<legend><?php echo $this->params->get('field_reference',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_REFERENCE')); ?></legend>
    <table class="jg" width="100%">
    <?php if ( $this->params->get('references_name','1') == '1') : ?>
        <tr><td width="20%"><label><?php echo $this->params->get('field_reference_name',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_NAME')); ?>:</label></td>
        <td><span><?php echo $this->application->ref2_name;?></span></td></tr>
    <?php endif; ?>
    <?php if ( $this->params->get('references_address','1') == '1') : ?>
        <tr><td><label><?php echo $this->params->get('field_reference_address',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_ADDRESS')); ?>:</label></td>
        <td><span><?php echo $this->application->ref2_address;?></span></td></tr>
    <?php endif; ?>
    <?php if ( $this->params->get('references_telephone','1') == '1') : ?>
        <tr><td><label><?php echo $this->params->get('field_reference_telephone',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_TELEPHONE')); ?>:</label></td>
        <td><span><?php echo $this->application->ref2_telephone;?></span></td></tr>
    <?php endif; ?>
    <?php if ( $this->params->get('references_relationship','1') == '1') : ?>
        <tr><td><label><?php echo $this->params->get('field_reference_relationship',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RELATIONSHIP')); ?>:</label></td>
        <td><span><?php echo $this->application->ref2_relationship;?></span></td></tr>
    <?php endif; ?>
    <?php if ( $this->params->get('references_years_acquainted','1') == '1') : ?>
        <tr><td><label><?php echo $this->params->get('field_reference_years_acquainted',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_YEARS_ACQUAINTED')); ?>:</label></td>
        <td><span><?php echo $this->application->ref2_years;?></span></td></tr>
    <?php endif; ?>
    </table>
</fieldset>
<?php endif; ?>
<?php if ($this->params->get('references_3','1') == '1') : ?>
<fieldset>
<legend><?php echo $this->params->get('field_reference',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_REFERENCE')); ?></legend>
    <table class="jg" width="100%">
    <?php if ( $this->params->get('references_name','1') == '1') : ?>
        <tr><td width="20%"><label><?php echo $this->params->get('field_reference_name',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_NAME')); ?>:</label></td>
        <td><span><?php echo $this->application->ref3_name;?></span></td></tr>
    <?php endif; ?>
    <?php if ( $this->params->get('references_address','1') == '1') : ?>
        <tr><td><label><?php echo $this->params->get('field_reference_address',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_ADDRESS')); ?>:</label></td>
        <td><span><?php echo $this->application->ref3_address;?></span></td></tr>
    <?php endif; ?>
    <?php if ( $this->params->get('references_telephone','1') == '1') : ?>
        <tr><td><label><?php echo $this->params->get('field_reference_telephone',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_TELEPHONE')); ?>:</label></td>
        <td><span><?php echo $this->application->ref3_telephone;?></span></td></tr>
    <?php endif; ?>
    <?php if ( $this->params->get('references_relationship','1') == '1') : ?>
        <tr><td><label><?php echo $this->params->get('field_reference_relationship',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RELATIONSHIP')); ?>:</label></td>
        <td><span><?php echo $this->application->ref3_relationship;?></span></td></tr>
    <?php endif; ?>
    <?php if ( $this->params->get('references_years_acquainted','1') == '1') : ?>
        <tr><td><label><?php echo $this->params->get('field_reference_years_acquainted',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_YEARS_ACQUAINTED')); ?>:</label></td>
        <td><span><?php echo $this->application->ref3_years;?></span></td></tr>
    <?php endif; ?>
    </table>
</fieldset>
<?php endif; ?>
<?php if ($this->params->get('references_4','1') == '1') : ?>
<fieldset>
<legend><?php echo $this->params->get('field_reference',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_REFERENCE')); ?></legend>
    <table class="jg" width="100%">
    <?php if ( $this->params->get('references_name','1') == '1') : ?>
        <tr><td width="20%"><label><?php echo $this->params->get('field_reference_name',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_NAME')); ?>:</label></td>
        <td><span><?php echo $this->application->ref4_name;?></span></td></tr>
    <?php endif; ?>
    <?php if ( $this->params->get('references_address','1') == '1') : ?>
        <tr><td><label><?php echo $this->params->get('field_reference_address',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_ADDRESS')); ?>:</label></td>
        <td><span><?php echo $this->application->ref4_address;?></span></td></tr>
    <?php endif; ?>
    <?php if ( $this->params->get('references_telephone','1') == '1') : ?>
        <tr><td><label><?php echo $this->params->get('field_reference_telephone',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_TELEPHONE')); ?>:</label></td>
        <td><span><?php echo $this->application->ref4_telephone;?></span></td></tr>
    <?php endif; ?>
    <?php if ( $this->params->get('references_relationship','1') == '1') : ?>
        <tr><td><label><?php echo $this->params->get('field_reference_relationship',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RELATIONSHIP')); ?>:</label></td>
        <td><span><?php echo $this->application->ref4_relationship;?></span></td></tr>
    <?php endif; ?>
    <?php if ( $this->params->get('references_years_acquainted','1') == '1') : ?>
        <tr><td><label><?php echo $this->params->get('field_reference_years_acquainted',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_YEARS_ACQUAINTED')); ?>:</label></td>
        <td><span><?php echo $this->application->ref4_years;?></span></td></tr>
    <?php endif; ?>
    </table>
</fieldset>
<?php endif; ?>
<?php endif; ?>
<?php if ($this->params->get('text_resume','1') == '1') : ?>
<fieldset>
<legend><?php echo $this->params->get('field_text_resume',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_TEXT_RESUME')); ?></legend>
    <table class="jg" width="100%">
        <tr><td><label><?php echo $this->params->get('field_text_resume_desc',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_TEXT_RESUME')); ?>:</label><br/>
        <?php echo $this->application->text_resume;?></td></tr>
    </table>
</fieldset>
<?php endif; ?>
<?php if ($this->params->get('display_custom_yes_no','0') == '1') : ?>
<fieldset>
    <table class="jg" width="100%">
        <tr><td><span><?php echo $this->params->get('text_custom_yes_no',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_SH_CUSTOM_YES_NO_TEXT')); 
        ?></span>&nbsp;<?php echo ('1'==$this->application->custom_yes_no)?JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_YES'):JText::_('No'); ?></td></tr>
    </table>
</fieldset>
<?php endif; ?>
<?php if ($this->params->get('agreement','1') == '1') : ?>
<fieldset>
    <?php echo '<legend>'.JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_CERTIFICATION_AGREEMENT').'</legend>'; ?>
    <?php if (isset($this->agreement)) echo $this->agreement->introtext.$this->agreement->fulltext; ?>
    <table class="jg" width="100%">
    <?php $bullet = 0; ?>
    <?php if ($this->params->get('bullet1_on','1') == '1') : ?>
    <?php $bullet++; ?>
        <tr><td width="5%"><label><?php echo $bullet."."; ?></label></td>
        <td><span><?php echo $this->params->get('certification_agreement_bullet1',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_CERTIFICATION_AGREEMENT_BULLET1')); ?></span></td></tr>
    <?php endif; ?>
    <?php if ($this->params->get('bullet2_on','1') == '1') : ?>
    <?php $bullet++; ?>
        <tr><td width="5%"><label><?php echo $bullet."."; ?></label></td>
        <td><span><?php echo $this->params->get('certification_agreement_bullet2',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_CERTIFICATION_AGREEMENT_BULLET2')); ?></span></td></tr>
    <?php endif; ?>
    <?php if ($this->params->get('bullet3_on','1') == '1') : ?>
    <?php $bullet++; ?>
        <tr><td width="5%"><label><?php echo $bullet."."; ?></label></td>
        <td><span><?php echo $this->params->get('certification_agreement_bullet3',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_CERTIFICATION_AGREEMENT_BULLET3')); ?></span></td></tr>
    <?php endif; ?>
    <?php if ($this->params->get('bullet4_on','1') == '1') : ?>
    <?php $bullet++; ?>
        <tr><td width="5%"><label><?php echo $bullet."."; ?></label></td>
        <td><span><?php echo $this->params->get('certification_agreement_bullet4',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_CERTIFICATION_AGREEMENT_BULLET4')); ?></span></td></tr>
    <?php endif; ?>
    <?php if ($this->params->get('bullet5_on','1') == '1') : ?>
    <?php $bullet++; ?>
        <tr><td width="5%"><label><?php echo $bullet."."; ?></label></td>
        <td><span><?php echo $this->params->get('certification_agreement_bullet5',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_CERTIFICATION_AGREEMENT_BULLET5')); ?></span></td></tr>
    <?php endif; ?>
    <?php if ($this->params->get('bullet6_on','1') == '1') : ?>
    <?php $bullet++; ?>
        <tr><td width="5%"><label><?php echo $bullet."."; ?></label></td>
        <td><span><?php echo $this->params->get('certification_agreement_bullet6',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_CERTIFICATION_AGREEMENT_BULLET6')); ?></span></td></tr>
    <?php endif; ?>
    </table>
</fieldset>
<?php endif; ?>

<?php if ($this->params->get('signature','1') == '1') : ?>
<fieldset>
    <legend><?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_CERTIFICATION_AGREEMENT_SIGNATURE'); ?></legend>
    <table class="jg" width="100%">
        <tr><td style="border-bottom: 1px solid silver;"><?php echo "<br/>".$this->application->signature; ?></td></tr>
    </table>
</fieldset>
<?php endif; ?>
        
<?php

echo $this->params->get('app_todays_date_text',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_TODAYS_DATE')); ?>:&nbsp;<?php
                            $timenow = new JDate($this->application->create_date);
                            $mysqlTime = JHTML::_('date', $timenow,$this->params->get('app_create_date_format',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_MDY')));

echo "<span id='jg_create_data'>".$mysqlTime."</span>";

?>
<?php endif; ?>
</div>
