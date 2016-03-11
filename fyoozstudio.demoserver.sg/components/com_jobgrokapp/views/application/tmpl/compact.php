<?php
/**
 *
 *
 * This is the compact.php view layout for jobgrokapp
 *
 * Created: November 18, 2014, 3:25 am
 *
 * Subversion Details
 * $Date: 2014-10-28 22:30:01 -0500 (Tue, 28 Oct 2014) $
 * $Revision: 6477 $
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
$editor =JFactory::getEditor();
JHTML::_('behavior.calendar');
//JHTML::_('behavior.uploader');

if ($this->params->get('use_session_keepalive','0') == '1') { JHTML::_('behavior.keepalive'); }

// note: use_default_css has been deprecated
if ($this->params->get('use_default_css','1') == '1' ||
    $this->params->get('use_jobgrok_css','0') == '1') {
    $css = ".jg_ea fieldset#intro {	background-color: ".$this->params->get('form_background_color','#f6f6f6')."; } ".
            ".jg_ea fieldset table, .jg_ea fieldset table tr, .jg_ea fieldset td { border: 0px none; } ".
            ".jg_ea td.required { color: red; font-weight: bold; } ".
            ".jg_ea td input.required { border-color: #faa; } ".
            ".jg_ea tr, .jg_ea td { border: 0px none; } ";
    $css .= "#jg_personal_information table td { font-size: 8pt; padding: 2px; } ".
            "#jg_personal_information table td.jg_field { width: 100px; } ".
            "#jg_personal_information table input.jg_input { width: 100px; } ".
            "#jg_personal_information table input#email_address { width: 300px; } ";
    $css .= "#jg_addresses table td { font-size: 8pt; padding: 2px; } ".
            "#jg_addresses table input.jg_field { width: 100px; } ".
            "#jg_addresses table td input.jg_input { width: 100px; } ".
            "#jg_addresses table td input.jg_street { width: 100px; } ".
            "#jg_addresses table td input.jg_city { width: 100px; } ".
            "#jg_addresses table td input.jg_state { width: 50px; } ".
            "#jg_addresses table td input.jg_zip_code { width: 50px; } ".
            "#jg_addresses table td input.jg_from_date { width: 50px; } ".
            "#jg_addresses table td input.jg_to_date { width: 50px; }";
    $css .= "#jg_education table td { font-size: 8pt; padding: 2px; } ".
            "#jg_education table input.jg_field { width: 100px; } ".
            "#jg_education table td input.jg_input { width: 100px; } ".
            "#jg_education table td input.jg_school { width: 100px; } ".
            "#jg_education table td input.jg_city { width: 100px; } ".
            "#jg_education table td input.jg_state { width: 50px; } ".
            "#jg_education table td input.jg_diploma { width: 50px; } ".
            "#jg_education table td input.jg_study { width: 50px; }";
    $css .= "table.jg_employment_information td, table.jg_employment_information_questions td, table.jg_employment_information_followups td { font-size: 8pt; padding: 2px; vertical-align: top; } ".
            "table.jg_employment_information_questions td input.jg_input { width: 265px; } ".
            "table.jg_employment_information_followups td input.jg_input { width: 265px; } ".
            "table.jg_employment_information_questions td.jg_field { width: 540px; font-size: 8pt; padding: 2px; } ".
            "table.jg_employment_information_followups td.jg_field { width: 360px; font-size: 8pt; padding: 2px; } ".
            "table.jg_employment_information_questions td.jg_number { width: 20px; } ".
            "table.jg_employment_information_followups td.jg_number { width: 20px; } ";
    $css .= "table.jg_employment_history_contact_employer td { font-size: 8pt; padding: 2px; } ".
            "table.jg_employment_history td { font-size: 8pt; padding: 2px; } ".
            "table.jg_employment_history td input.jg_field { width: 100px; } ".
            "table.jg_employment_history td input.jg_input { width: 100px; }";
    $css .= "table.jg_skills td, table.jg_skills_questions td, table.jg_skills_followups td { font-size: 8pt; padding: 2px; vertical-align: top; } ".
            "table.jg_skills_questions td input.jg_input { width: 265px; } ".
            "table.jg_skills_followups td input.jg_input { width: 265px; } ".
            "table.jg_skills_questions td.jg_field { width: 540px; font-size: 8pt; padding: 2px; } ".
            "table.jg_skills_followups td.jg_field { width: 360px; font-size: 8pt; padding: 2px; } ".
            "table.jg_skills_questions td.jg_number { width: 20px; } ".
            "table.jg_skills_followups td.jg_number { width: 20px; } "; 
    $css .= "table.jg_references td { font-size: 8pt; padding: 2px; } ".
            "table.jg_references td input.jg_field { width: 100px; } ".
            "table.jg_references td input.jg_input { width: 125px; }";    
    $css .= "table.jg_text_resume td { font-size: 8pt; padding: 2px; } ".
            "table.jg_text_resume td input.jg_input { width: 265px; } ".
            "table.jg_text_resume td.jg_field { width: 360px; font-size: 8pt; padding: 2px; } ".
            "table.jg_text_resume td.jg_number { width: 20px; } "; 
    $css .= "table.jg_file_upload td { font-size: 8pt; padding: 2px; } ".
            "table.jg_file_upload td input.jg_input { width: 265px; } ".
            "table.jg_file_upload td.jg_field { width: 360px; font-size: 8pt; padding: 2px; } ".
            "table.jg_file_upload td.jg_number { width: 20px; } "; 
    $css .= "table.jg_agreements td { font-size: 8pt; padding: 2px; vertical-align: top; } ".
            "table.jg_agreements td input.jg_input { width: 265px; } ".
            "table.jg_agreements td.jg_field { width: 360px; font-size: 8pt; padding: 2px; } ".
            "table.jg_agreements td.jg_number { width: 20px; } "; 
    $document->addStyleDeclaration($css);
}

$css_other = $this->params->get('css_other','');
$css_personal_information = $this->params->get('personal_information_css','');
$css_addresses = $this->params->get('addresses_css','');
$css_education = $this->params->get('education_css','');
$css_employment_information = $this->params->get('employment_information_css','');
$css_employment_history = $this->params->get('employment_history_css','');
$css_job_related_skills = $this->params->get('job_related_skills_css','');
$css_references = $this->params->get('references_css','');
$css_text_resume = $this->params->get('text_resume_css','');
$css_file_upload = $this->params->get('file_upload_css','');
$css_agreement = $this->params->get('agreement_css','');

if ($css_other != '') $document->addStyleDeclaration($css_other);
if ($css_personal_information != '') $document->addStyleDeclaration($css_personal_information);
if ($css_addresses != '') $document->addStyleDeclaration($css_addresses);
if ($css_education != '') $document->addStyleDeclaration($css_education);
if ($css_employment_information != '') $document->addStyleDeclaration($css_employment_information);
if ($css_employment_history != '') $document->addStyleDeclaration($css_employment_history);
if ($css_job_related_skills != '') $document->addStyleDeclaration($css_job_related_skills);
if ($css_references != '') $document->addStyleDeclaration($css_references);
if ($css_text_resume != '') $document->addStyleDeclaration($css_text_resume);
if ($css_file_upload != '') $document->addStyleDeclaration($css_file_upload);
if ($css_agreement != '') $document->addStyleDeclaration($css_agreement);

$required_class = "";
if ($this->retry) $required_class = " required";
?>
<div class="jg_ea">
    <?php if ($this->params->get('display_title','1') == '1') : ?>
    <h1 id="jg_display_title"><?php echo $this->params->get('title'); ?></h1>
    <?php endif; ?>
    <?php
    if ($this->params->get('app_create_date_location','bottom') == 'top') {
        echo $this->params->get('app_todays_date_text',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_COMPACT_TODAYS_DATE')); ?>:&nbsp;<?php 
        $timenow = new JDate();
        $mysqlTime = JHTML::_('date', $timenow,$this->params->get('jg_date_format','Y-m-d G:i:s'));
        echo "<span id='jg_date_format'>".$mysqlTime."</span>";
        //echo date($this->params->get('jg_date_format','Y-m-d H:i:s')); 
    }
    ?><br />
    <?php if ($this->params->get('display_intro','1') == '1') : ?>
    <fieldset id="jg_display_intro">
        <strong><?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_COMPACT_INTRO_BOLD'); ?></strong>
        <?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_COMPACT_INTRO_TEXT'); ?>
    </fieldset>
    <?php endif; ?>
    <?php if ($this->params->get('job_description_header','1') == '1' && isset($this->posting_id)) : ?>
    <fieldset>
        <legend><?php echo JHTML::_('jobgrokapp.posting',$this->posting_id,true); ?> </legend>
        <?php echo JHTML::_('jobgrokapp.job_description',$this->posting_id); ?>
    </fieldset>
    <?php endif; ?>
    <?php if ($this->params->get('file_upload','1') == '0') : ?>
    <form action="index.php" method="post" name="adminForm" id="adminForm" >
        <?php else : ?>
        <form action="index.php" method="post" name="adminForm" id="adminForm"  enctype="multipart/form-data">
            <?php endif; ?>
            <?php if ($this->params->get('personal_information','1') == '1') : ?>
            <fieldset id="jg_personal_information">
                <legend><?php echo $this->params->get('field_personal_information',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_COMPACT_PERSONAL_INFORMATION')); ?></legend>
                <?php if ($this->params->get('personal_information_first_name','1') == '1' ||
                            $this->params->get('personal_information_first_name','1') == '1' ||
                            $this->params->get('personal_information_first_name','1') == '1') : ?>
                <table width="100%">                    
                    <tr>
                        <?php if ($this->params->get('personal_information_first_name','1') == '1') : ?>
                        <td id="jg_personal_information_first_name" class="jg_field<?php echo ($this->params->get('required_first_name','1')=='0'&&!$this->application->first_name)?$required_class:''; ?>" >
                            <label><?php echo $this->params->get('field_first_name',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_COMPACT_FIRST_NAME')); ?><?php echo ($this->params->get('required_first_name','1')=='0')?'*':''; ?></label>
                        </td>
                        <td>
                            <input class="jg_input<?php echo ($this->params->get('required_first_name','1')=='0'&&!$this->application->first_name)?$required_class:''; ?>" type="text" name="first_name" id="first_name" maxlength="250" value = "<?php if (isset($this->application)) echo $this->application->first_name;?>" />
                        </td>
                        <?php endif; ?>
                        <?php if ($this->params->get('personal_information_middle_name','1') == '1') : ?>
                        <td id="jg_personal_information_middle_name" class="jg_field<?php echo ($this->params->get('required_middle_name','1')=='0'&&!$this->application->middle_name)?$required_class:''; ?>" >
                            <label><?php echo $this->params->get('field_middle_name',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_COMPACT_MIDDLE_NAME')); ?><?php echo ($this->params->get('required_middle_name','1')=='0')?'*':''; ?></label>
                        </td>
                        <td>
                            <input class="jg_input<?php echo ($this->params->get('required_middle_name','1')=='0'&&!$this->application->middle_name)?$required_class:''; ?>" type="text" name="middle_name" id="middle_name" maxlength="250" value = "<?php if (isset($this->application)) echo $this->application->middle_name;?>" />
                        </td>
                        <?php endif; ?>
                        <?php if ($this->params->get('personal_information_last_name','1') == '1') : ?>
                        <td id="jg_personal_information_last_name" class="jg_field<?php echo ($this->params->get('required_last_name','1')=='0'&&!$this->application->last_name)?$required_class:''; ?>" >
                            <label><?php echo $this->params->get('field_last_name',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_COMPACT_LAST_NAME')); ?><?php echo ($this->params->get('required_last_name','1')=='0')?'*':''; ?></label>
                        </td>
                        <td>
                            <input class="jg_input<?php echo ($this->params->get('required_last_name','1')=='0'&&!$this->application->last_name)?$required_class:''; ?>" type="text" name="last_name" id="last_name" maxlength="250" value = "<?php if (isset($this->application)) echo $this->application->last_name;?>" />
                        </td>
                        <?php endif; ?>
                    </tr>
                </table>
                <?php endif; ?>
                <?php if ($this->params->get('personal_information_home_phone','1') == '1' ||
                            $this->params->get('personal_information_work_phone','1') == '1' ||
                            $this->params->get('personal_information_cell_phone','1') == '1') : ?>
                <table width="100%">
                    <tr>
                        <?php if ($this->params->get('personal_information_home_phone','1') == '1') : ?>
                        <td id="jg_personal_information_home_phone" class="jg_field<?php echo ($this->params->get('required_home_phone','1')=='0'&&!$this->application->home_phone)?$required_class:''; ?>" >
                            <label><?php echo $this->params->get('field_home_phone',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_COMPACT_HOME_PHONE')); ?><?php echo ($this->params->get('required_home_phone','1')=='0')?'*':''; ?></label>
                        </td>
                        <td>
                            <input class="jg_input<?php echo ($this->params->get('required_home_phone','1')=='0'&&!$this->application->home_phone)?$required_class:''; ?>" type="text" name="home_phone" id="home_phone" maxlength="20" value = "<?php if (isset($this->application)) echo $this->application->home_phone;?>" />
                        </td>
                        <?php endif; ?>
                        <?php if ($this->params->get('personal_information_work_phone','1') == '1') : ?>
                        <td id="jg_personal_information_work_phone" class="jg_field<?php echo ($this->params->get('required_work_phone','1')=='0'&&!$this->application->work_phone)?$required_class:''; ?>">
                            <label><?php echo $this->params->get('field_work_phone',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_COMPACT_WORK_PHONE')); ?><?php echo ($this->params->get('required_work_phone','1')=='0')?'*':''; ?></label>
                        </td>
                        <td>
                            <input class="jg_input<?php echo ($this->params->get('required_work_phone','1')=='0'&&!$this->application->work_phone)?$required_class:''; ?>" type="text" name="work_phone" id="work_phone" maxlength="20" value = "<?php if (isset($this->application)) echo $this->application->work_phone;?>" />
                        </td>
                        <?php endif; ?>
                        <?php if ($this->params->get('personal_information_cell_phone','1') == '1') : ?>
                        <td id="jg_personal_information_cell_phone" class="jg_field<?php echo ($this->params->get('required_cell_phone','1')=='0'&&!$this->application->cell_phone)?$required_class:''; ?>" >
                            <label><?php echo $this->params->get('field_cell_phone',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_COMPACT_CELL_PHONE')); ?><?php echo ($this->params->get('required_cell_phone','1')=='0')?'*':''; ?></label>
                        </td>
                        <td>
                            <input class="jg_input<?php echo ($this->params->get('required_cell_phone','1')=='0'&&!$this->application->cell_phone)?$required_class:''; ?>" type="text" name="cell_phone" id="cell_phone" maxlength="20" value = "<?php if (isset($this->application)) echo $this->application->cell_phone;?>" />
                        </td>
                        <?php endif; ?>
                    </tr>
                </table>
                <?php endif; ?>
                <?php if ($this->params->get('personal_information_email_address','1') == '1' ||
                            $this->params->get('personal_information_ssn','0') == '1') : ?>
                <table width="100%">
                    <tr>
                        <?php if ($this->params->get('personal_information_email_address','1') == '1') : ?>
                        <td id="jg_personal_information_email_address" class="jg_field<?php echo ($this->params->get('required_email_address','1')=='0'&&!$this->application->email_address)?$required_class:''; ?>" >
                            <label><?php echo $this->params->get('field_email_address',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_COMPACT_EMAIL_ADDRESS')); ?><?php echo ($this->params->get('required_email_address','1')=='0')?'*':''; ?></label>
                        </td>
                        <td>
                            <input class="jg_input<?php echo ($this->params->get('required_email_address','1')=='0'&&!$this->application->email_address)?$required_class:''; ?>" type="text" name="email_address" id="email_address" size="50" maxlength="250" value = "<?php if (isset($this->application)) echo $this->application->email_address;?>" />
                        </td>
                        <?php endif; ?>
                        <?php if ($this->params->get('personal_information_ssn','0') == '1') : ?>
                        <td id="jg_personal_information_ssn" class="jg_field<?php echo ($this->params->get('required_ssn','1')=='0'&&!$this->application->ssn)?$required_class:''; ?>" >
                            <label><?php echo $this->params->get('field_ssn',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_COMPACT_SSN')); ?><?php echo ($this->params->get('required_ssn','1')=='0')?'*':''; ?></label>
                        </td>
                        <td>
                            <input class="jg_input<?php echo ($this->params->get('required_ssn','1')=='0'&&!$this->application->ssn)?$required_class:''; ?>" type="text" name="ssn" id="ssn" maxlength="250" value = "<?php if (isset($this->application)) echo $this->application->ssn;?>" />
                        </td>
                        <?php endif; ?>
                    </tr>
                    <?php if ($this->params->get('personal_photo','1') == '0') : ?>
                    <tr>
                        <td colspan="4" id="jg_personal_photo">
                        <?php 
                            echo "<label>";
                            echo $this->params->get('field_personal_photo',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_COMPACT_PERSONAL_PHOTO')); 
                            echo "</label>";
                            echo "&nbsp;(";
                            echo $this->params->get('field_personal_photo_allowed',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_COMPACT_PERSONAL_PHOTO_MIMETYPES_ALLOWED'));
                            echo ":&nbsp;";
                            echo $this->params->get('personal_photo_mimetypes','image/png,image/jpeg,image/gif').")"; 
                            echo "&nbsp;(";
                            echo $this->params->get('field_personal_photo_max_size',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_COMPACT_PERSONAL_PHOTO_MAX_SIZE'));
                            echo ":&nbsp;";
                            echo $this->params->get('personal_photo_maxupload','1048576')."Bytes )";
                        ?><br/><input class="jg_input" type="file" name="photo" id="photo" />
                        </td>
                    </tr>
                    <?php endif; ?>
                </table>
                <?php endif; ?>
            </fieldset>
            <?php endif; ?>
            <?php if ($this->params->get('addresses','1') == '1') : ?>
            <fieldset id="jg_addresses">
                <legend><?php echo $this->params->get('field_addresses',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_COMPACT_ADDRESSES')); ?></legend>
                <table width="100%">
                    <tr id="jg_addresses_header">
                        <td class="jg_field"></td>
                        <?php if ($this->params->get('addresses_street','1') == '1') : ?>
                        <td class="jg_field_street<?php echo ($this->params->get('required_address_street','1')=='0'&&!$this->application->street)?$required_class:''; ?>" >
                                <?php echo $this->params->get('field_street',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_COMPACT_STREET')); ?><?php echo ($this->params->get('required_address_street','1')=='0')?'*':''; ?>
                        </td>
                        <?php endif; ?>
                        <?php if ($this->params->get('addresses_city','1') == '1') : ?>
                        <td class="jg_field_city<?php echo ($this->params->get('required_address_city','1')=='0'&&!$this->application->city)?$required_class:''; ?>" >
                                <?php echo $this->params->get('field_city',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_COMPACT_CITY')); ?><?php echo ($this->params->get('required_address_city','1')=='0')?'*':''; ?>
                        </td>
                        <?php endif; ?>
                        <?php if ($this->params->get('addresses_state','1') == '1') : ?>
                        <td class="jg_field_state<?php echo ($this->params->get('required_address_state','1')=='0'&&!$this->application->state)?$required_class:''; ?>" >
                                <?php echo $this->params->get('field_state',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_COMPACT_STATE')); ?><?php echo ($this->params->get('required_address_state','1')=='0')?'*':''; ?>
                        </td>
                        <?php endif; ?>
                        <?php if ($this->params->get('addresses_zip_code','1') == '1') : ?>
                        <td class="jg_field_zip_code<?php echo ($this->params->get('required_address_zip_code','1')=='0'&&!$this->application->zip_code)?$required_class:''; ?>" >
                                <?php echo $this->params->get('field_zip_code',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_COMPACT_ZIP_CODE')); ?><?php echo ($this->params->get('required_address_zip_code','1')=='0')?'*':''; ?>
                        </td>
                        <?php endif; ?>
                        <?php if ($this->params->get('addresses_since','1') == '1') : ?>
                        <td class="jg_field_from_date<?php echo ($this->params->get('required_address_from_date','1')=='0'&&!$this->application->from_date)?$required_class:''; ?>" >
                                <?php echo $this->params->get('field_address_since',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_COMPACT_ADDRESS_SINCE')); ?><?php echo ($this->params->get('required_address_from_date','1')=='0')?'*':''; ?>
                        </td>
                        <?php endif; ?>
                        <?php if ($this->params->get('addresses_to','1') == '1') : ?>
                        <td class="jg_field_to_date">
                                <?php echo $this->params->get('field_address_to',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_COMPACT_ADDRESS_TO')); ?>
                        </td>
                        <?php endif; ?>
                    </tr>
                    <?php if ($this->params->get('addresses_current','1') == '1') : ?>
                    <tr id="jg_addresses_current">
                        <td class="jg_field">
                            <?php echo $this->params->get('field_current_address',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_COMPACT_CURRENT_ADDRESS')); ?>
                            <?php echo ($this->params->get('required_address_street','1')=='0'||
                                        $this->params->get('required_address_city','1')=='0'||
                                        $this->params->get('required_address_state','1')=='0'||
                                        $this->params->get('required_address_zip_code','1')=='0'||
                                        $this->params->get('required_address_from_date','1')=='0')?'*':''; ?>
                        </td>
                        <?php if ($this->params->get('addresses_street','1') == '1') : ?>
                        <td>
                            <input class="jg_input jg_street<?php echo ($this->params->get('required_address_street','1')=='0'&&!$this->application->street)?$required_class:''; ?>" type="text" name="street" id="street" maxlength="250" value = "<?php if (isset($this->application)) echo $this->application->street;?>" />
                        </td>
                        <?php endif; ?>
                        <?php if ($this->params->get('addresses_city','1') == '1') : ?>
                        <td>
                            <input class="jg_input jg_city<?php echo ($this->params->get('required_address_city','1')=='0'&&!$this->application->city)?$required_class:''; ?>" type="text" name="city" id="city" maxlength="20" value = "<?php if (isset($this->application)) echo $this->application->city;?>" />
                        </td>
                        <?php endif; ?>
                        <?php if ($this->params->get('addresses_state','1') == '1') : ?>
                        <td>
                            <input class="jg_input jg_state<?php echo ($this->params->get('required_address_state','1')=='0'&&!$this->application->state)?$required_class:''; ?>" type="text" name="state" id="state" maxlength="20" value = "<?php if (isset($this->application)) echo $this->application->state;?>" />
                        </td>
                        <?php endif; ?>
                        <?php if ($this->params->get('addresses_zip_code','1') == '1') : ?>
                        <td>
                            <input class="jg_input jg_zip_code<?php echo ($this->params->get('required_address_zip_code','1')=='0'&&!$this->application->zip_code)?$required_class:''; ?>" type="text" name="zip_code" id="zip_code" maxlength="20" value = "<?php if (isset($this->application)) echo $this->application->zip_code;?>" />
                        </td>
                        <?php endif; ?>
                        <?php if ($this->params->get('addresses_since','1') == '1') : ?>
                        <td>
                            <input class="jg_input jg_from_date<?php echo ($this->params->get('required_address_from_date','1')=='0'&&!$this->application->from_date)?$required_class:''; ?>" type="text" name="from_date" id="from_date" maxlength="10" value = "<?php if (isset($this->application)) echo $this->application->from_date;?>" />
                        </td>
                        <?php endif; ?>
                        <?php if ($this->params->get('addresses_to','1') == '1') : ?>
                        <td>
                        </td>
                        <?php endif; ?>
                    </tr>
                    <?php endif; ?>
                    <?php if ($this->params->get('addresses_1','1') == '1') : ?>
                    <tr id="jg_addresses_address1">
                        <td class="jg_field" >
                                <?php echo $this->params->get('field_prior_address',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_COMPACT_PRIOR_ADDRESS')); ?>
                        </td>
                        <?php if ($this->params->get('addresses_street','1') == '1') : ?>
                        <td>
                            <input class="jg_input jg_street" type="text" name="street1" id="street1" maxlength="250" value = "<?php if (isset($this->application)) echo $this->application->street1;?>" />
                        </td>
                        <?php endif; ?>
                        <?php if ($this->params->get('addresses_city','1') == '1') : ?>
                        <td>
                            <input class="jg_input jg_city" type="text" name="city1" id="city1" maxlength="20" value = "<?php if (isset($this->application)) echo $this->application->city1;?>" />
                        </td>
                        <?php endif; ?>
                        <?php if ($this->params->get('addresses_state','1') == '1') : ?>
                        <td>
                            <input class="jg_input jg_state" type="text" name="state1" id="state1" maxlength="20" value = "<?php if (isset($this->application)) echo $this->application->state1;?>" />
                        </td>
                        <?php endif; ?>
                        <?php if ($this->params->get('addresses_zip_code','1') == '1') : ?>
                        <td>
                            <input class="jg_input jg_zip_code" type="text" name="zip_code1" id="zip_code1" maxlength="20" value = "<?php if (isset($this->application)) echo $this->application->zip_code1;?>" />
                        </td>
                        <?php endif; ?>
                        <?php if ($this->params->get('addresses_since','1') == '1') : ?>
                        <td>
                            <input class="jg_input jg_from_date" type="text" name="from_date1" id="from_date1" maxlength="10" value = "<?php if (isset($this->application)) echo $this->application->from_date1;?>" />
                        </td>
                        <?php endif; ?>
                        <?php if ($this->params->get('addresses_to','1') == '1') : ?>
                        <td>
                            <input class="jg_input jg_to_date" type="text" name="to_date1" id="to_date1" maxlength="10" value = "<?php if (isset($this->application)) echo $this->application->to_date1;?>" />
                        </td>
                        <?php endif; ?>
                    </tr>
                    <?php endif; ?>
                    <?php if ($this->params->get('addresses_2','1') == '1') : ?>
                    <tr id="jg_addresses_address2">
                        <td class="jg_field" >
                                <?php echo $this->params->get('field_prior_address', JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_COMPACT_PRIOR_ADDRESS')); ?>:
                        </td>
                        <?php if ($this->params->get('addresses_street','1') == '1') : ?>
                        <td>
                            <input class="jg_input jg_street" type="text" name="street2" id="street2" maxlength="250" value = "<?php if (isset($this->application)) echo $this->application->street2;?>" />
                        </td>
                        <?php endif; ?>
                        <?php if ($this->params->get('addresses_city','1') == '1') : ?>
                        <td>
                            <input class="jg_input jg_city" type="text" name="city2" id="city2" maxlength="20" value = "<?php if (isset($this->application)) echo $this->application->city2;?>" />
                        </td>
                        <?php endif; ?>
                        <?php if ($this->params->get('addresses_state','1') == '1') : ?>
                        <td>
                            <input class="jg_input jg_state" type="text" name="state2" id="state2" maxlength="20" value = "<?php if (isset($this->application)) echo $this->application->state2;?>" />
                        </td>
                        <?php endif; ?>
                        <?php if ($this->params->get('addresses_zip_code','1') == '1') : ?>
                        <td>
                            <input class="jg_input jg_zip_code" type="text" name="zip_code2" id="zip_code2" maxlength="20" value = "<?php if (isset($this->application)) echo $this->application->zip_code2;?>" />
                        </td>
                        <?php endif; ?>
                        <?php if ($this->params->get('addresses_since','1') == '1') : ?>
                        <td>
                            <input class="jg_input jg_from_date" type="text" name="from_date2" id="from_date2" maxlength="10" value = "<?php if (isset($this->application)) echo $this->application->from_date2;?>" />
                        </td>
                        <?php endif; ?>
                        <?php if ($this->params->get('addresses_to','1') == '1') : ?>
                        <td>
                            <input class="jg_input jg_to_date" type="text" name="to_date2" id="to_date2" maxlength="10" value = "<?php if (isset($this->application)) echo $this->application->to_date2;?>" />
                        </td>
                        <?php endif; ?>
                    </tr>
                    <?php endif; ?>
                </table>
            </fieldset>
            <?php endif; ?>
            <?php if ($this->params->get('education','1') == '1') : ?>
            <fieldset id="jg_education">
                <legend><?php echo $this->params->get('field_education',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_COMPACT_EDUCATION')); ?></legend>
                <table width="100%">
                    <tr id="jg_education_headers">
                        <td>
                        </td>
                        <?php if ($this->params->get('education_school','1') == '1') : ?>
                        <td class="jg_field">
                                <?php echo $this->params->get('field_school_attended',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_COMPACT_SCHOOL_ATTENDED')); ?>
                        </td>
                        <?php endif; ?>
                        <?php if ($this->params->get('education_city','1') == '1') : ?>
                        <td class="jg_field">
                                <?php echo $this->params->get('field_school_city',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_COMPACT_CITY')); ?>
                        </td>
                        <?php endif; ?>
                        <?php if ($this->params->get('education_state','1') == '1') : ?>
                        <td class="jg_field">
                                <?php echo $this->params->get('field_school_state',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_COMPACT_STATE')); ?>
                        </td>
                        <?php endif; ?>
                        <?php if ($this->params->get('education_diploma','1') == '1') : ?>
                        <td class="jg_field">
                                <?php echo $this->params->get('field_diploma',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_COMPACT_DIPLOMA')); ?>
                        </td>
                        <?php endif; ?>
                        <?php if ($this->params->get('education_degree','1') == '1') : ?>
                        <td class="jg_field">
                                <?php echo $this->params->get('field_deg_cert_dip_long',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_COMPACT_DEGREE_CERT')); ?>
                        </td>
                        <?php endif; ?>
                        <?php if ($this->params->get('education_study','1') == '1') : ?>
                        <td class="jg_field">
                                <?php echo $this->params->get('field_area_of_study',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_COMPACT_AREA_OF_STUDY')); ?>
                        </td>
                        <?php endif; ?>
                    </tr>
                    <?php if ($this->params->get('education_high','1') == '1') : ?>
                    <tr id="jg_education_highschool">
                        <td class="jg_field">
                                <?php echo $this->params->get('field_high_school',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_COMPACT_HIGH_SCHOOL')); ?>
                        </td>
                        <?php if ($this->params->get('education_school','1') == '1') : ?>
                        <td>
                            <input class="jg_input jg_school" type="text" name="school" id="school" maxlength="250" value = "<?php if (isset($this->application)) echo $this->application->school;?>" />
                        </td>
                        <?php endif; ?>
                        <?php if ($this->params->get('education_city','1') == '1') : ?>
                        <td>
                            <input class="jg_input jg_city" type="text" name="school_city" id="school_city" maxlength="250" value = "<?php if (isset($this->application)) echo $this->application->school_city;?>" />
                        </td>
                        <?php endif; ?>
                        <?php if ($this->params->get('education_state','1') == '1') : ?>
                        <td>
                            <input class="jg_input jg_state" type="text" name="school_state" id="school_state" maxlength="250" value = "<?php if (isset($this->application)) echo $this->application->school_state;?>" />
                        </td>
                        <?php endif; ?>
                        <?php if ($this->params->get('education_diploma','1') == '1') : ?>
                        <td><?php echo $this->options['school_diploma']; ?></td>
                        <?php endif; ?>
                        <?php if ($this->params->get('education_degree','1') == '1') : ?>
                        <td class="jg_field jg_ged"><?php echo $this->params->get('field_ged',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_COMPACT_GED')); ?></td>
                        <?php endif; ?>
                        <?php if ($this->params->get('education_study','1') == '1') : ?>
                        <td></td>
                        <?php endif; ?>
                    </tr>
                    <?php endif; ?>
                    <?php if ($this->params->get('education_undergrad','1') == '1') : ?>
                    <tr id="jg_education_undergrad">
                        <td class="jg_field">
                                <?php echo $this->params->get('field_undergrad_school',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_COMPACT_UNDERGRAD_SCHOOL')); ?>
                        </td>
                        <?php if ($this->params->get('education_school','1') == '1') : ?>
                        <td>
                            <input class="jg_input jg_school" type="text" name="school1" id="school1" maxlength="250" value = "<?php if (isset($this->application)) echo $this->application->school1;?>" />
                        </td>
                        <?php endif; ?>
                        <?php if ($this->params->get('education_city','1') == '1') : ?>
                        <td>
                            <input class="jg_input jg_city" type="text" name="school_city1" id="school_city1" size="10" maxlength="250" value = "<?php if (isset($this->application)) echo $this->application->school_city1;?>" />
                        </td>
                        <?php endif; ?>
                        <?php if ($this->params->get('education_state','1') == '1') : ?>
                        <td>
                            <input class="jg_input jg_state" type="text" name="school_state1" id="school_state1" size="4" maxlength="250" value = "<?php if (isset($this->application)) echo $this->application->school_state1;?>" />
                        </td>
                        <?php endif; ?>
                        <?php if ($this->params->get('education_diploma','1') == '1') : ?>
                        <td><?php echo $this->options['school_diploma1']; ?></td>
                        <?php endif; ?>
                        <?php if ($this->params->get('education_degree','1') == '1') : ?>
                        <td>
                            <input  class="jg_input jg_diploma<?php echo ($this->application->school_diploma1=='1'&&!$this->application->diploma_text1)?$required_class:''; ?>" type="text" name="diploma_text1" id="diploma_text1" maxlength="250" value = "<?php if (isset($this->application)) echo $this->application->diploma_text1;?>" />
                        </td>
                        <?php endif; ?>
                        <?php if ($this->params->get('education_study','1') == '1') : ?>
                        <td>
                            <input class="jg_input jg_study<?php echo ($this->application->school_diploma1=='1'&&!$this->application->study_area1)?$required_class:''; ?>" type="text" name="study_area1" id="study_area1" maxlength="250" value = "<?php if (isset($this->application)) echo $this->application->study_area1;?>" />
                        </td>
                        <?php endif; ?>
                    </tr>
                    <?php endif; ?>
                    <?php if ($this->params->get('education_grad','1') == '1') : ?>
                    <tr id="jg_education_gradschool">
                        <td class="jg_field">
                                <?php echo $this->params->get('field_grad_school',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_COMPACT_GRAD_SCHOOL')); ?>
                        </td>
                        <?php if ($this->params->get('education_school','1') == '1') : ?>
                        <td>
                            <input class="jg_input jg_school" type="text" name="school2" id="school2" maxlength="250" value = "<?php if (isset($this->application)) echo $this->application->school2;?>" />
                        </td>
                        <?php endif; ?>
                        <?php if ($this->params->get('education_city','1') == '1') : ?>
                        <td>
                            <input class="jg_input jg_city" type="text" name="school_city2" id="school_city2" maxlength="250" value = "<?php if (isset($this->application)) echo $this->application->school_city2;?>" />
                        </td>
                        <?php endif; ?>
                        <?php if ($this->params->get('education_state','1') == '1') : ?>
                        <td>
                            <input class="jg_input jg_state" type="text" name="school_state2" id="school_state2" maxlength="250" value = "<?php if (isset($this->application)) echo $this->application->school_state2;?>" />
                        </td>
                        <?php endif; ?>
                        <?php if ($this->params->get('education_diploma','1') == '1') : ?>
                        <td><?php echo $this->options['school_diploma2']; ?></td>
                        <?php endif; ?>
                        <?php if ($this->params->get('education_degree','1') == '1') : ?>
                        <td>
                            <input class="jg_input jg_diploma<?php echo ($this->application->school_diploma2=='1'&&!$this->application->diploma_text2)?$required_class:''; ?>" type="text" name="diploma_text2" id="diploma_text2" maxlength="250" value = "<?php if (isset($this->application)) echo $this->application->diploma_text2;?>" />
                        </td>
                        <?php endif; ?>
                        <?php if ($this->params->get('education_study','1') == '1') : ?>
                        <td>
                            <input class="jg_input jg_study<?php echo ($this->application->school_diploma2=='1'&&!$this->application->study_area2)?$required_class:''; ?>" type="text" name="study_area2" id="study_area2" maxlength="250" value = "<?php if (isset($this->application)) echo $this->application->study_area2;?>" />
                        </td>
                        <?php endif; ?>
                    </tr>
                    <?php endif; ?>
                    <?php if ($this->params->get('education_other','1') == '1') : ?>
                    <tr id="jg_education_otherschool">
                        <td class="jg_field">
                                <?php echo $this->params->get('field_other_school',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_COMPACT_OTHER_SCHOOL')); ?>
                        </td>
                        <?php if ($this->params->get('education_school','1') == '1') : ?>
                        <td>
                            <input class="jg_input jg_school" type="text" name="school3" id="school3" maxlength="250" value = "<?php if (isset($this->application)) echo $this->application->school3;?>" />
                        </td>
                        <?php endif; ?>
                        <?php if ($this->params->get('education_city','1') == '1') : ?>
                        <td>
                            <input class="jg_input jg_city" type="text" name="school_city3" id="school_city3" maxlength="250" value = "<?php if (isset($this->application)) echo $this->application->school_city3;?>" />
                        </td>
                        <?php endif; ?>
                        <?php if ($this->params->get('education_state','1') == '1') : ?>
                        <td>
                            <input class="jg_input jg_state" type="text" name="school_state3" id="school_state3" maxlength="250" value = "<?php if (isset($this->application)) echo $this->application->school_state3;?>" />
                        </td>
                        <?php endif; ?>
                        <?php if ($this->params->get('education_diploma','1') == '1') : ?>
                        <td><?php echo $this->options['school_diploma3']; ?></td>
                        <?php endif; ?>
                        <?php if ($this->params->get('education_degree','1') == '1') : ?>
                        <td>
                            <input class="jg_input jg_diploma<?php echo ($this->application->school_diploma3=='1'&&!$this->application->diploma_text3)?$required_class:''; ?>" type="text" name="diploma_text3" id="diploma_text3" maxlength="250" value = "<?php if (isset($this->application)) echo $this->application->diploma_text3;?>" />
                        </td>
                        <?php endif; ?>
                        <?php if ($this->params->get('education_study','1') == '1') : ?>
                        <td>
                            <input class="jg_input jg_study<?php echo ($this->application->school_diploma3=='1'&&!$this->application->study_area3)?$required_class:''; ?>" type="text" name="study_area3" id="study_area3" maxlength="250" value = "<?php if (isset($this->application)) echo $this->application->study_area3;?>" />
                        </td>
                        <?php endif; ?>
                    </tr>
                    <?php endif; ?>
                </table>
            </fieldset>
            <?php endif; ?>
            <?php if ($this->params->get('employment_information','1') == '1') : ?>
            <fieldset>
                <legend><?php echo $this->params->get('field_employment_information',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_COMPACT_EMPLOYMENT_INFORMATION')); ?></legend>
                <?php if ($this->params->get('employment_information_position','1') == '1' || 
                        $this->params->get('employment_information_date_you_can_start','1') == '1' ||
                        $this->params->get('employment_information_desired_salary','1') == '1') : ?>
                <table class="jg_employment_information" width="100%">
                    <tr>
                        <?php if ($this->params->get('employment_information_position','1') == '1') : ?>
                        <td class="jg_field">
                                <?php echo $this->params->get('field_position_applied_for',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_COMPACT_POSITION_APPLIED_FOR')); ?>
                        </td>
                        <td>
                            <input class="jg_input" type="text" name="position" id="position" maxlength="250" value = "<?php
                            if ($this->params->get('employment_information_position_auto','1') == '1') {
                                if (isset($this->application->position) && $this->application->position != "" && $this->application->position != 'no-title') {
                                    echo $this->application->position;
                                } else {
                                    if  (isset($this->posting_id) && $this->posting_id != '0')
                                            echo JHTML::_('jobgrokapp.posting',$this->posting_id,true);
                                }
                            }
                                ?>" />
                        </td>
                        <?php endif; ?>
                        <?php if ($this->params->get('employment_information_date_you_can_start','1') == '1') : ?>
                        <td class="jg_field">
                                <?php echo $this->params->get('field_date_you_can_start',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_COMPACT_DATE_YOU_CAN_START')); ?>
                        </td>
                        <td>
                            <?php echo JHTML::calendar(isset($this->application->available_date)?$this->application->available_date:'','available_date','available_date'); ?>&nbsp;(yyyy-mm-dd)
                        </td>
                        <?php endif; ?>
                        <?php if ($this->params->get('employment_information_desired_salary','1') == '1') : ?>
                        <td class="jg_field">
                                <?php echo $this->params->get('field_desired_salary',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_COMPACT_DESIRED_SALARY')); ?>:&nbsp;<?php 
                                echo $this->params->get('employment_information_currency',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_COMPACT_CURRENCY_SYMBOL')); ?>
                        </td>
                        <td>
                            <input class="text_area" type="text" name="desired_pay" id="desired_pay" size="8" maxlength="250" value = "<?php if (isset($this->application)) echo $this->application->desired_pay;?>" />
                        </td>
                        <?php endif; ?>
                    </tr>
                </table>
                <?php endif; ?>
                <?php if ($this->params->get('employment_information_do_you_prefer','1') == '1' || 
                        $this->params->get('employment_information_can_you_work','1') == '1' ||
                        $this->params->get('employment_information_availabl','1') == '1') : ?>
                <table class="jg_employment_information" width="100%">
                    <tr>
                        <?php if ($this->params->get('employment_information_do_you_prefer','1') == '1') : ?>
                        <td class="jg_field">
                                <?php echo $this->params->get('field_do_you_prefer',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_COMPACT_DO_YOU_PREFER')); ?>
                        </td>
                        <td valign="top" ><?php echo $this->options['work_preferences']; ?></td>
                        <?php endif; ?>
                        <?php if ($this->params->get('employment_information_can_you_work','1') == '1') : ?>
                        <td class="jg_field">
                                <?php echo $this->params->get('field_can_you_work',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_COMPACT_CAN_YOU_WORK')); ?>
                        </td>
                        <td>
                            <input type="checkbox" name="weekends" id="weekends" class="inputbox" value="1" <?php if (isset($this->application))
                                       { if ( '1' == $this->application->weekends ) echo "checked "; } ?> />&nbsp;<?php
                                       echo $this->params->get('field_weekends',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_COMPACT_WEEKENDS'));
                                       ?><br />
                            <input type="checkbox" name="evenings" id="evenings" class="inputbox" value="1" <?php if (isset($this->application))
                                       { if ( '1' == $this->application->evenings ) echo "checked "; } ?> />&nbsp;<?php
                                       echo $this->params->get('field_evenings',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_COMPACT_EVENINGS')); 
                                       ?>
                        </td>
                        <?php endif; ?>
                        <?php if ($this->params->get('employment_information_available','1') == '1') : ?>
                        <td class="jg_field">
                                <?php echo $this->params->get('field_available',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_COMPACT_AVAILABLE')); ?>:
                        </td>
                        <td>
                            <input type="checkbox" name="monday" id="monday" class="inputbox" value="1" <?php if (isset($this->application))
                                       { if ( '1' == $this->application->monday ) echo "checked "; } ?> /><?php echo $this->params->get('field_monday_abbr',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_COMPACT_MONDAY_ABBR')); ?>
                            <input type="checkbox" name="tuesday" id="tuesday" class="inputbox" value="1" <?php if (isset($this->application))
                                       { if ( '1' == $this->application->tuesday ) echo "checked "; } ?> /><?php echo $this->params->get('field_tuesday_abbr',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_COMPACT_TUESDAY_ABBR')); ?>
                            <input type="checkbox" name="wednesday" id="wednesday" class="inputbox" value="1" <?php if (isset($this->application))
                                       { if ( '1' == $this->application->wednesday ) echo "checked "; } ?> /><?php echo $this->params->get('field_wednesday_abbr',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_COMPACT_WEDNESDAY_ABBR')); ?>
                            <input type="checkbox" name="thursday" id="thursday" class="inputbox" value="1" <?php if (isset($this->application))
                                       { if ( '1' == $this->application->thursday ) echo "checked "; } ?> /><?php echo $this->params->get('field_thursday_abbr',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_COMPACT_THURSDAY_ABBR')); ?>
                            <input type="checkbox" name="friday" id="friday" class="inputbox" value="1" <?php if (isset($this->application))
                                       { if ( '1' == $this->application->friday ) echo "checked "; } ?> /><?php echo $this->params->get('field_friday_abbr',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_COMPACT_FRIDAY_ABBR')); ?>
                            <input type="checkbox" name="saturday" id="saturday" class="inputbox" value="1" <?php if (isset($this->application))
                                       { if ( '1' == $this->application->saturday ) echo "checked "; } ?> /><?php echo $this->params->get('field_saturday_abbr',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_COMPACT_SATURDAY_ABBR')); ?>
                            <input type="checkbox" name="sunday" id="sunday" class="inputbox" value="1" <?php if (isset($this->application))
                                       { if ( '1' == $this->application->sunday ) echo "checked "; } ?> /><?php echo $this->params->get('field_sunday_abbr',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_COMPACT_SUNDAY_ABBR')); ?>
                        </td>
                        <?php endif; ?>
                    </tr>
                </table>
                <?php endif; ?>
                <?php if ($this->params->get('employment_information_not_available','1') == '1' ||
                          $this->params->get('employment_information_shiftwork') == '1') : ?>
                <table class="jg_employment_information" width="100%">
                    <tr>
                        <?php if ($this->params->get('employment_information_shiftwork') == '1') : ?>
                        <td class="jg_field">
                                <?php echo $this->params->get('field_shiftwork',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_COMPACT_SHIFTWORK')); ?>
                        </td>
                        <td><?php echo $this->options['shiftwork']; ?></td>
                        <?php endif; ?>
                        <?php if ($this->params->get('employment_information_not_available') == '1') : ?>
                        <td class="jg_field">
                                <?php echo $this->params->get('field_not_available',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_COMPACT_NOT_AVAILABLE')); ?>
                        </td>
                        <td>
                            <input class="jg_input" type="text" name="unavailability" id="unavailability" maxlength="250" value = "<?php if (isset($this->application)) echo $this->application->unavailability;?>" />
                        </td>
                        <?php endif; ?>
                    </tr>
                </table>
                <?php endif; ?>
                <table class="jg_employment_information_questions">
                    <tr>
                        <td class="jg_number"></td>
                        <td class="jg_field">
                            <strong><?php echo $this->params->get('field_following_questions',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_COMPACT_FOLLOWING_QUESTIONS')); ?></strong>
                        </td>
                        <td></td>
                    </tr>
                </table>
                <?php $question_number = 1; ?>
                <?php if ($this->params->get('employment_information_question_1','1') == '1') : ?>
                <table class="jg_employment_information_questions">
                    <tr>
                        <td class="jg_number"><?php echo $question_number; $question_number++; ?>.</td>
                        <td class="jg_field">
                            <?php echo $this->params->get('field_question_1',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_COMPACT_QUESTION_1')); ?>
                        </td>
                        <td><?php echo $this->options['eligible']; ?></td>
                    </tr>
                    <tr>
                        <td class="jg_number"></td>
                        <td class="jg_field">
                            <?php echo $this->params->get('field_question_1_followup',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_COMPACT_QUESTION_1_FOLLOWUP')); ?>
                        </td>
                        <td>
                            <?php echo $this->options['provideproof']; ?>
                        </td>
                    </tr>
                </table>
                <?php endif; ?>
                <?php if ($this->params->get('employment_information_question_2','1') == '1') : ?>
                <table class="jg_employment_information_questions">
                    <tr>
                        <td class="jg_number"><?php echo $question_number; $question_number++; ?>.</td>
                        <td class="jg_field">
                            <?php echo $this->params->get('field_question_2',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_COMPACT_QUESTION_2')); ?>
                        </td>
                        <td><?php echo $this->options['worked_here_before']; ?></td>
                    </tr>
                </table>
                <table class="jg_employment_information_followups">
                    <tr>
                        <td class="jg_number"></td>
                        <td class="jg_field">
                            <?php echo $this->params->get('field_question_2_followup',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_COMPACT_QUESTION_2_FOLLOWUP')); ?>
                        </td>
                        <td>
                            <input class="jg_input<?php echo ($this->application->worked_here_before==$this->params->get('force_question_2_followup','1')&&!$this->application->worked_here_text)?$required_class:''; ?>" type="text" name="worked_here_text" id="worked_here_text" maxlength="250" value = "<?php if (isset($this->application)) echo $this->application->worked_here_text;?>" />
                        </td>
                    </tr>
                </table>
                <?php endif; ?>
                <?php if ($this->params->get('employment_information_question_3','1') == '1') : ?>
                <table class="jg_employment_information_questions">
                    <tr>
                        <td class="jg_number"><?php echo $question_number; $question_number++; ?>.</td>
                        <td class="jg_field">
                            <?php echo $this->params->get('field_question_3',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_COMPACT_QUESTION_3')); ?>
                        </td>
                        <td><?php echo $this->options['job_desc_received']; ?></td>
                    </tr>
                </table>
                <?php endif; ?>
                <?php if ($this->params->get('employment_information_question_4','1') == '1') : ?>
                <table class="jg_employment_information_questions">
                    <tr>
                        <td class="jg_number"><?php echo $question_number; $question_number++; ?>.</td>
                        <td class="jg_field">
                            <?php echo $this->params->get('field_question_4',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_COMPACT_QUESTION_4')); ?>
                        </td>
                        <td><?php echo $this->options['understand_reqs']; ?></td>
                    </tr>
                </table>
                <table class="jg_employment_information_followups">
                    <tr>
                        <td class="jg_number"></td>
                        <td class="jg_field">
                            <?php echo $this->params->get('field_question_4_followup',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_COMPACT_QUESTION_4_FOLLOWUP')); ?>
                        </td>
                        <td>
                            <input class="jg_input<?php echo ($this->application->understand_reqs==$this->params->get('force_question_4_followup','0')&&!$this->application->no_understand_reqs)?$required_class:''; ?>" type="text" name="no_understand_reqs" id="no_understand_reqs" maxlength="250" value = "<?php if (isset($this->application)) echo $this->application->no_understand_reqs;?>" />
                        </td>
                    </tr>
                </table>
                <?php endif; ?>
                <?php if ($this->params->get('employment_information_question_5','1') == '1') : ?>
                <table class="jg_employment_information_questions">
                    <tr>
                        <td class="jg_number"><?php echo $question_number; $question_number++; ?>.</td>
                        <td class="jg_field">
                            <?php echo $this->params->get('field_question_5',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_COMPACT_QUESTION_5')); ?>
                        </td>
                        <td><?php echo $this->options['on_layoff']; ?></td>
                    </tr>
                </table>
                <?php endif; ?>
                <?php if ($this->params->get('employment_information_question_6','1') == '1') : ?>
                <table class="jg_employment_information_questions">
                    <tr>
                        <td class="jg_number"><?php echo $question_number; $question_number++; ?>.</td>
                        <td class="jg_field">
                            <?php echo $this->params->get('field_question_6',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_COMPACT_QUESTION_6')); ?>
                        </td>
                        <td><?php echo $this->options['conf_agreement']; ?></td>
                    </tr>
                </table>
                <table class="jg_employment_information_followups">
                    <tr>
                        <td class="jg_number"></td>
                        <td class="jg_field">
                            <?php echo $this->params->get('field_question_6_followup',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_COMPACT_QUESTION_6_FOLLOWUP')); ?>
                        </td>
                        <td>
                            <input class="jg_input<?php echo ($this->application->conf_agreement==$this->params->get('force_question_6_followup','1')&&!$this->application->conf_explain)?$required_class:''; ?>" type="text" name="conf_explain" id="conf_explain" maxlength="250" value = "<?php if (isset($this->application)) echo $this->application->conf_explain;?>" />
                        </td>
                    </tr>
                </table>
                <?php endif; ?>
                <?php if ($this->params->get('employment_information_question_7','1') == '1') : ?>
                <table class="jg_employment_information_questions">
                    <tr>
                        <td class="jg_number"><?php echo $question_number; $question_number++; ?>.</td>
                        <td class="jg_field">
                            <?php echo $this->params->get('field_question_7',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_COMPACT_QUESTION_7')); ?>
                        </td>
                        <td><?php echo $this->options['discharged']; ?></td>
                    </tr>
                </table>
                <table class="jg_employment_information_followups">
                    <tr>
                        <td class="jg_number"></td>
                        <td class="jg_field">
                            <?php echo $this->params->get('field_question_7_followup',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_COMPACT_QUESTION_7_FOLLOWUP')); ?>
                        </td>
                        <td>
                            <input class="jg_input<?php echo (($this->application->discharged==$this->params->get('force_question_7_followup','1'))&&!$this->application->discharge_explain)?$required_class:''; ?>" type="text" name="discharge_explain" id="discharge_explain" maxlength="250" value = "<?php if (isset($this->application)) echo $this->application->discharge_explain;?>" />
                        </td>
                    </tr>
                </table>
                <?php endif; ?>
                <?php if ($this->params->get('employment_information_question_8','1') == '1') : ?>
                <table class="jg_employment_information_questions">
                    <tr>
                        <td class="jg_number"><?php echo $question_number; $question_number++; ?>.</td>
                        <td class="jg_field">
                            <?php echo $this->params->get('field_question_8',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_COMPACT_QUESTION_8')); ?>
                        </td>
                        <td><?php echo $this->options['convict']; ?></td>
                    </tr>
                </table>
                <table class="jg_employment_information_followups">
                    <tr>
                        <td class="jg_number"></td>
                        <td class="jg_field">
                            <?php echo $this->params->get('field_question_8_followup',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_COMPACT_QUESTION_8_FOLLOWUP')); ?>
                        </td>
                        <td>
                            <input class="jg_input<?php echo ($this->application->convict==$this->params->get('force_question_8_followup','1')&&!$this->application->convict_explain)?$required_class:''; ?>" type="text" name="convict_explain" id="convict_explain" maxlength="250" value = "<?php if (isset($this->application)) echo $this->application->convict_explain;?>" />
                        </td>
                    </tr>
                </table>
                <?php endif; ?>
                <?php if ($this->params->get('employment_information_question_9','1') == '1') : ?>
                <table class="jg_employment_information_questions">
                    <tr>
                        <td class="jg_number"><?php echo $question_number; $question_number++; ?>.</td>
                        <td class="jg_field">
                            <?php echo $this->params->get('field_question_9',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_COMPACT_QUESTION_9')); ?>
                        </td>
                        <td><?php echo $this->options['family']; ?></td>
                    </tr>
                </table>
                <table class="jg_employment_information_followups">
                    <tr>
                        <td class="jg_number"></td>
                        <td class="jg_field">
                            <?php echo $this->params->get('field_question_9_followup',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_COMPACT_QUESTION_9_FOLLOWUP')); ?>
                        </td>
                        <td>
                            <input class="jg_input<?php echo ($this->application->family==$this->params->get('force_question_9_followup','1')&&!$this->application->family_explain)?$required_class:''; ?>" type="text" name="family_explain" id="family_explain" maxlength="250" value = "<?php if (isset($this->application)) echo $this->application->family_explain;?>" />
                        </td>
                    </tr>
                </table>
                <?php endif; ?>
                </table>
            </fieldset>
            <?php endif; ?>
            <?php if ($this->params->get('employment_history','1') == '1') : ?>
            <fieldset>
                <legend><?php echo $this->params->get('field_employment_history',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_COMPACT_EMPLOYMENT_HISTORY')); ?></legend>
                <?php  if ($this->params->get('employment_history_currently_employed','1') == '1') : ?>
                <table class="jg_employment_history_currently_employed" width="100%">
                    <tr>
                        <td class="jg_field" >
                            <?php echo $this->params->get('field_currently_employed',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_COMPACT_CURRENTLY_EMPLOYED')); ?>
                        </td>
                        <td>
                            <?php echo $this->options['currently_employed']; ?>
                        </td>
                    </tr>
                </table>
                <?php endif; ?>
                <?php  if ($this->params->get('employment_history_contact_current_employer','1') == '1') : ?>
                <table class="jg_employment_history_contact_employer" width="100%">
                    <tr>
                        <td class="jg_field" >
                            <?php echo $this->params->get('field_contact_employer',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_COMPACT_CONTACT_EMPLOYER')); ?>
                        </td>
                        <td>
                            <?php echo $this->options['contact_emp']; ?>
                        </td>
                    </tr>
                </table>
                <?php endif; ?>               
                <table class="jg_employment_history" width="100%">
                    <tr>
                        <td>
                        </td>
                        <?php if ($this->params->get('employment_history_recent','1') == '1') : ?>
                        <td class="jg_employment_history_employer">
                                <?php echo $this->params->get('field_most_recent_employer',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_COMPACT_MOST_RECENT_EMPLOYER')); ?>
                                <?php echo ($this->params->get('required_employment_history_employer','1')=='0'||
                                                                                    $this->params->get('required_employment_history_city','1')=='0'||
                                                                                    $this->params->get('required_employment_history_state','1')=='0'||
                                                                                    $this->params->get('required_employment_history_zip_code','1')=='0'||
                                                                                    $this->params->get('required_employment_history_phone','1')=='0'||
                                                                                    $this->params->get('required_employment_history_position','1')=='0'||
                                                                                    $this->params->get('required_employment_history_from','1')=='0'||
                                                                                    $this->params->get('required_employment_history_to','1')=='0'||
                                                                                    $this->params->get('required_employment_history_pay','1')=='0'||
                                                                                    $this->params->get('required_employment_history_supervisor','1')=='0'||
                                                                                    $this->params->get('required_employment_history_duties','1')=='0'||
                                                                                    $this->params->get('required_employment_history_reason','1')=='0')?'*':''; ?>
                        </td>
                        <?php endif; ?>
                        <?php if ($this->params->get('employment_history_1','1') == '1') : ?>
                        <td class="jg_employment_history_employer">
                                <?php echo $this->params->get('field_prior_employer',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_COMPACT_PRIOR_EMPLOYER')); ?>
                        </td>
                        <?php endif; ?>
                        <?php if ($this->params->get('employment_history_2','1') == '1') : ?>
                        <td class="jg_employment_history_employer">
                                <?php echo $this->params->get('field_prior_employer',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_COMPACT_PRIOR_EMPLOYER')); ?>
                        </td>
                        <?php endif; ?>
                        <?php if ($this->params->get('employment_history_3','1') == '1') : ?>
                        <td class="jg_employement_history_employer">
                                <?php echo $this->params->get('field_prior_employer',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_COMPACT_PRIOR_EMPLOYER')); ?>
                        </td>
                        <?php endif; ?>
                    </tr>
                    <?php if ($this->params->get('employment_history_employer','1') == '1') : ?>
                    <tr>
                        <td class="jg_field<?php echo ($this->params->get('required_employment_history_employer','1')=='0'&&!$this->application->employer)?$required_class:''; ?>" >
                                <?php echo $this->params->get('field_employer',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_COMPACT_EMPLOYER')); ?><?php echo ($this->params->get('required_employment_history_employer','1')=='0')?'*':''; ?>
                        </td>
                        <?php if ($this->params->get('employment_history_recent','1') == '1') : ?>
                        <td>
                            <input class="jg_input jg_employer<?php echo ($this->params->get('required_employment_history_employer','1')=='0'&&!$this->application->employer)?$required_class:''; ?>" type="text" name="employer" id="employer" maxlength="250" value = "<?php if (isset($this->application)) echo $this->application->employer;?>" />
                        </td>
                        <?php endif; ?>
                        <?php if ($this->params->get('employment_history_1','1') == '1') : ?>
                        <td>
                            <input class="jg_input jg_employer1" type="text" name="employer1" id="employer1" maxlength="250" value = "<?php if (isset($this->application)) echo $this->application->employer1;?>" />
                        </td>
                        <?php endif; ?>
                        <?php if ($this->params->get('employment_history_2','1') == '1') : ?>
                        <td>
                            <input class="jg_input jg_employer2" type="text" name="employer2" id="employer2" maxlength="250" value = "<?php if (isset($this->application)) echo $this->application->employer2;?>" />
                        </td>
                        <?php endif; ?>
                        <?php if ($this->params->get('employment_history_3','1') == '1') : ?>
                        <td>
                            <input class="jg_input jg_employer3" type="text" name="employer3" id="employer3" maxlength="250" value = "<?php if (isset($this->application)) echo $this->application->employer3;?>" />
                        </td>
                        <?php endif; ?>
                    </tr>
                    <?php endif; ?>
                    <?php if ($this->params->get('employment_history_city','1') == '1') : ?>
                    <tr>
                        <td class="jg_field<?php echo ($this->params->get('required_employment_history_city','1')=='0'&&!$this->application->employer_city)?$required_class:''; ?>" >
                                <?php echo $this->params->get('field_employer_city',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_COMPACT_CITY')); ?><?php echo ($this->params->get('required_employment_history_city','1')=='0')?'*':''; ?>
                        </td>
                        <?php if ($this->params->get('employment_history_recent','1') == '1') : ?>
                        <td>
                            <input class="jg_input jg_city<?php echo ($this->params->get('required_employment_history_city','1')=='0'&&!$this->application->employer_city)?$required_class:''; ?>" type="text" name="employer_city" id="employer_city" maxlength="250" value = "<?php if (isset($this->application)) echo $this->application->employer_city;?>" />
                        </td>
                        <?php endif; ?>
                        <?php if ($this->params->get('employment_history_1','1') == '1') : ?>
                        <td>
                            <input class="jg_input jg_city" type="text" name="employer1_city" id="employer1_city" maxlength="250" value = "<?php if (isset($this->application)) echo $this->application->employer1_city;?>" />
                        </td>
                        <?php endif; ?>
                        <?php if ($this->params->get('employment_history_2','1') == '1') : ?>
                        <td>
                            <input class="jg_input jg_city" type="text" name="employer2_city" id="employer2_city" maxlength="250" value = "<?php if (isset($this->application)) echo $this->application->employer2_city;?>" />
                        </td>
                        <?php endif; ?>
                        <?php if ($this->params->get('employment_history_3','1') == '1') : ?>
                        <td>
                            <input class="jg_input jg_city" type="text" name="employer3_city" id="employer3_city" maxlength="250" value = "<?php if (isset($this->application)) echo $this->application->employer3_city;?>" />
                        </td>
                        <?php endif; ?>
                    </tr>
                    <?php endif; ?>
                    <?php if ($this->params->get('employment_history_state','1') == '1') : ?>
                    <tr>
                        <td class="jg_field<?php echo ($this->params->get('required_employment_history_state','1')=='0'&&!$this->application->employer_state)?$required_class:''; ?>" >
                                <?php echo $this->params->get('field_employer_state',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_COMPACT_STATE')); ?><?php echo ($this->params->get('required_employment_history_state','1')=='0')?'*':''; ?>
                        </td>
                        <?php if ($this->params->get('employment_history_recent','1') == '1') : ?>
                        <td>
                            <input class="jg_input jg_state<?php echo ($this->params->get('required_employment_history_state','1')=='0'&&!$this->application->employer_state)?$required_class:''; ?>" type="text" name="employer_state" id="employer_state" maxlength="250" value = "<?php if (isset($this->application)) echo $this->application->employer_state;?>" />
                        </td>
                        <?php endif; ?>
                        <?php if ($this->params->get('employment_history_1','1') == '1') : ?>
                        <td>
                            <input class="jg_input jg_state" type="text" name="employer1_state" id="employer1_state" maxlength="250" value = "<?php if (isset($this->application)) echo $this->application->employer1_state;?>" />
                        </td>
                        <?php endif; ?>
                        <?php if ($this->params->get('employment_history_2','1') == '1') : ?>
                        <td>
                            <input class="jg_input jg_state" type="text" name="employer2_state" id="employer2_state" maxlength="250" value = "<?php if (isset($this->application)) echo $this->application->employer2_state;?>" />
                        </td>
                        <?php endif; ?>
                        <?php if ($this->params->get('employment_history_3','1') == '1') : ?>
                        <td>
                            <input class="jg_input jg_state" type="text" name="employer3_state" id="employer3_state" maxlength="250" value = "<?php if (isset($this->application)) echo $this->application->employer3_state;?>" />
                        </td>
                        <?php endif; ?>
                    </tr>
                    <?php endif; ?>
                    <?php if ($this->params->get('employment_history_zip_code','1') == '1') : ?>
                    <tr>
                        <td class="jg_field<?php echo ($this->params->get('required_employment_history_zip_code','1')=='0'&&!$this->application->employer_zip)?$required_class:''; ?>" >
                                <?php echo $this->params->get('field_employer_zip_code',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_COMPACT_ZIP_CODE')); ?><?php echo ($this->params->get('required_employment_history_zip_code','1')=='0')?'*':''; ?>
                        </td>
                        <?php if ($this->params->get('employment_history_recent','1') == '1') : ?>
                        <td>
                            <input class="jg_input jg_zip_code<?php echo ($this->params->get('required_employment_history_zip_code','1')=='0'&&!$this->application->employer_zip)?$required_class:''; ?>" type="text" name="employer_zip" id="employer_zip" maxlength="250" value = "<?php if (isset($this->application)) echo $this->application->employer_zip;?>" />
                        </td>
                        <?php endif; ?>
                        <?php if ($this->params->get('employment_history_1','1') == '1') : ?>
                        <td>
                            <input class="jg_input jg_zip_code" type="text" name="employer1_zip" id="employer1_zip" maxlength="250" value = "<?php if (isset($this->application)) echo $this->application->employer1_zip;?>" />
                        </td>
                        <?php endif; ?>
                        <?php if ($this->params->get('employment_history_2','1') == '1') : ?>
                        <td>
                            <input class="jg_input jg_zip_code" type="text" name="employer2_zip" id="employer2_zip" maxlength="250" value = "<?php if (isset($this->application)) echo $this->application->employer2_zip;?>" />
                        </td>
                        <?php endif; ?>
                        <?php if ($this->params->get('employment_history_3','1') == '1') : ?>
                        <td>
                            <input class="jg_input jg_zip_code" type="text" name="employer3_zip" id="employer3_zip" maxlength="250" value = "<?php if (isset($this->application)) echo $this->application->employer3_zip;?>" />
                        </td>
                        <?php endif; ?>
                    </tr>
                    <?php endif; ?>
                    <?php if ($this->params->get('employment_history_phone','1') == '1') : ?>
                    <tr>
                        <td class="jg_field<?php echo ($this->params->get('required_employment_history_phone','1')=='0'&&!$this->application->employer_phone)?$required_class:''; ?>" >
                                <?php echo $this->params->get('field_employer_phone',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_COMPACT_PHONE')); ?><?php echo ($this->params->get('required_employment_history_phone','1')=='0')?'*':''; ?>
                        </td>
                        <?php if ($this->params->get('employment_history_recent','1') == '1') : ?>
                        <td>
                            <input class="jg_input jg_phone<?php echo ($this->params->get('required_employment_history_phone','1')=='0'&&!$this->application->employer_phone)?$required_class:''; ?>" type="text" name="employer_phone" id="employer_phone" maxlength="250" value = "<?php if (isset($this->application)) echo $this->application->employer_phone;?>" />
                        </td>
                        <?php endif; ?>
                        <?php if ($this->params->get('employment_history_1','1') == '1') : ?>
                        <td>
                            <input class="jg_input jg_phone" type="text" name="employer1_phone" id="employer1_phone" maxlength="250" value = "<?php if (isset($this->application)) echo $this->application->employer1_phone;?>" />
                        </td>
                        <?php endif; ?>
                        <?php if ($this->params->get('employment_history_2','1') == '1') : ?>
                        <td>
                            <input class="jg_input jg_phone" type="text" name="employer2_phone" id="employer2_phone" maxlength="250" value = "<?php if (isset($this->application)) echo $this->application->employer2_phone;?>" />
                        </td>
                        <?php endif; ?>
                        <?php if ($this->params->get('employment_history_3','1') == '1') : ?>
                        <td>
                            <input class="jg_input jg_phone" type="text" name="employer3_phone" id="employer3_phone" maxlength="250" value = "<?php if (isset($this->application)) echo $this->application->employer3_phone;?>" />
                        </td>
                        <?php endif; ?>
                    </tr>
                    <?php endif; ?>
                    <?php if ($this->params->get('employment_history_position','1') == '1') : ?>
                    <tr>
                        <td class="jg_field<?php echo ($this->params->get('required_employment_history_position','1')=='0'&&!$this->application->employer_pos)?$required_class:''; ?>" >
                                <?php echo $this->params->get('field_position_held',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_COMPACT_POSITION_HELD')); ?><?php echo ($this->params->get('required_employment_history_position','1')=='0')?'*':''; ?>
                        </td>
                        <?php if ($this->params->get('employment_history_recent','1') == '1') : ?>
                        <td>
                            <input class="jg_input jg_position<?php echo ($this->params->get('required_employment_history_position','1')=='0'&&!$this->application->employer_pos)?$required_class:''; ?>" type="text" name="employer_pos" id="employer_pos" maxlength="250" value = "<?php if (isset($this->application)) echo $this->application->employer_pos;?>" />
                        </td>
                        <?php endif; ?>
                        <?php if ($this->params->get('employment_history_1','1') == '1') : ?>
                        <td>
                            <input class="jg_input jg_position" type="text" name="employer1_pos" id="employer1_pos" maxlength="250" value = "<?php if (isset($this->application)) echo $this->application->employer1_pos;?>" />
                        </td>
                        <?php endif; ?>
                        <?php if ($this->params->get('employment_history_2','1') == '1') : ?>
                        <td>
                            <input class="jg_input jg_position" type="text" name="employer2_pos" id="employer2_pos" maxlength="250" value = "<?php if (isset($this->application)) echo $this->application->employer2_pos;?>" />
                        </td>
                        <?php endif; ?>
                        <?php if ($this->params->get('employment_history_3','1') == '1') : ?>
                        <td>
                            <input class="jg_input jg_position" type="text" name="employer3_pos" id="employer3_pos" maxlength="250" value = "<?php if (isset($this->application)) echo $this->application->employer3_pos;?>" />
                        </td>
                        <?php endif; ?>
                    </tr>
                    <?php endif; ?>
                    <?php if ($this->params->get('employment_history_from','1') == '1') : ?>
                    <tr>
                        <td class="jg_field<?php echo ($this->params->get('required_employment_history_from','1')=='0'&&!$this->application->employer_from)?$required_class:''; ?>" >
                                <?php echo $this->params->get('field_employer_from_myyyy',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_COMPACT_FROM_MYYYY')); ?><?php echo ($this->params->get('required_employment_history_from','1')=='0')?'*':''; ?>
                        </td>
                        <?php if ($this->params->get('employment_history_recent','1') == '1') : ?>
                        <td>
                            <input class="jg_input jg_from<?php echo ($this->params->get('required_employment_history_from','1')=='0'&&!$this->application->employer_from)?$required_class:''; ?>" type="text" name="employer_from" id="employer_from" maxlength="250" value = "<?php if (isset($this->application)) echo $this->application->employer_from;?>" />
                        </td>
                        <?php endif; ?>
                        <?php if ($this->params->get('employment_history_1','1') == '1') : ?>
                        <td>
                            <input class="jg_input jg_from" type="text" name="employer1_from" id="employer1_from" maxlength="250" value = "<?php if (isset($this->application)) echo $this->application->employer1_from;?>" />
                        </td>
                        <?php endif; ?>
                        <?php if ($this->params->get('employment_history_2','1') == '1') : ?>
                        <td>
                            <input class="jg_input jg_from" type="text" name="employer2_from" id="employer2_from" maxlength="250" value = "<?php if (isset($this->application)) echo $this->application->employer2_from;?>" />
                        </td>
                        <?php endif; ?>
                        <?php if ($this->params->get('employment_history_3','1') == '1') : ?>
                        <td>
                            <input class="jg_input jg_from" type="text" name="employer3_from" id="employer3_from" maxlength="250" value = "<?php if (isset($this->application)) echo $this->application->employer3_from;?>" />
                        </td>
                        <?php endif; ?>
                    </tr>
                    <?php endif; ?>
                    <?php if ($this->params->get('employment_history_to','1') == '1') : ?>
                    <tr>
                        <td class="jg_field<?php echo ($this->params->get('required_employment_history_to','1')=='0'&&!$this->application->employer_to)?$required_class:''; ?>" >
                                <?php echo $this->params->get('field_employer_to_myyyy',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_COMPACT_TO_MYYYY')); ?><?php echo ($this->params->get('required_employment_history_to','1')=='0')?'*':''; ?>
                        </td>
                        <?php if ($this->params->get('employment_history_recent','1') == '1') : ?>
                        <td>
                            <input class="jg_input jg_to<?php echo ($this->params->get('required_employment_history_to','1')=='0'&&!$this->application->employer_to)?$required_class:''; ?>" type="text" name="employer_to" id="employer_to" maxlength="250" value = "<?php if (isset($this->application)) echo $this->application->employer_to;?>" />
                        </td>
                        <?php endif; ?>
                        <?php if ($this->params->get('employment_history_1','1') == '1') : ?>
                        <td>
                            <input class="jg_input jg_to" type="text" name="employer1_to" id="employer1_to" maxlength="250" value = "<?php if (isset($this->application)) echo $this->application->employer1_to;?>" />
                        </td>
                        <?php endif; ?>
                        <?php if ($this->params->get('employment_history_2','1') == '1') : ?>
                        <td>
                            <input class="jg_input jg_to" type="text" name="employer2_to" id="employer2_to" maxlength="250" value = "<?php if (isset($this->application)) echo $this->application->employer2_to;?>" />
                        </td>
                        <?php endif; ?>
                        <?php if ($this->params->get('employment_history_3','1') == '1') : ?>
                        <td>
                            <input class="jg_input jg_to" type="text" name="employer3_to" id="employer3_to" maxlength="250" value = "<?php if (isset($this->application)) echo $this->application->employer3_to;?>" />
                        </td>
                        <?php endif; ?>
                    </tr>
                    <?php endif; ?>
                    <?php if ($this->params->get('employment_history_pay','1') == '1') : ?>
                    <tr>
                        <td class="jg_field<?php echo ($this->params->get('required_employment_history_pay','1')=='0'&&!$this->application->employer_pay)?$required_class:''; ?>" >
                                <?php echo $this->params->get('field_pay_upon_leaving',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_COMPACT_PAY_UPON_LEAVING')); ?><?php echo ($this->params->get('required_employment_history_pay','1')=='0')?'*':''; ?>
                        </td>
                        <?php if ($this->params->get('employment_history_recent','1') == '1') : ?>
                        <td>
                            <input class="jg_input jg_pay<?php echo ($this->params->get('required_employment_history_pay','1')=='0'&&!$this->application->employer_pay)?$required_class:''; ?>" type="text" name="employer_pay" id="employer_pay" maxlength="250" value = "<?php if (isset($this->application)) echo $this->application->employer_pay;?>" />
                        </td>
                        <?php endif; ?>
                        <?php if ($this->params->get('employment_history_1','1') == '1') : ?>
                        <td>
                            <input class="jg_input jg_pay" type="text" name="employer1_pay" id="employer1_pay" maxlength="250" value = "<?php if (isset($this->application)) echo $this->application->employer1_pay;?>" />
                        </td>
                        <?php endif; ?>
                        <?php if ($this->params->get('employment_history_2','1') == '1') : ?>
                        <td>
                            <input class="jg_input jg_pay" type="text" name="employer2_pay" id="employer2_pay" maxlength="250" value = "<?php if (isset($this->application)) echo $this->application->employer2_pay;?>" />
                        </td>
                        <?php endif; ?>
                        <?php if ($this->params->get('employment_history_3','1') == '1') : ?>
                        <td>
                            <input class="jg_input jg_pay" type="text" name="employer3_pay" id="employer3_pay" maxlength="250" value = "<?php if (isset($this->application)) echo $this->application->employer3_pay;?>" />
                        </td>
                        <?php endif; ?>
                    </tr>
                    <?php endif; ?>
                    <?php if ($this->params->get('employment_history_supervisor','1') == '1') : ?>
                    <tr>
                        <td class="jg_field<?php echo ($this->params->get('required_employment_history_supervisor','1')=='0'&&!$this->application->employer_sup)?$required_class:''; ?>" >
                                <?php echo $this->params->get('field_supervisor',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_COMPACT_SUPERVISOR')); ?><?php echo ($this->params->get('required_employment_history_supervisor','1')=='0')?'*':''; ?>
                        </td>
                        <?php if ($this->params->get('employment_history_recent','1') == '1') : ?>
                        <td>
                            <input class="jg_input jg_supervisor<?php echo ($this->params->get('required_employment_history_supervisor','1')=='0'&&!$this->application->employer_sup)?$required_class:''; ?>" type="text" name="employer_sup" id="employer_sup" maxlength="250" value = "<?php if (isset($this->application)) echo $this->application->employer_sup;?>" />
                        </td>
                        <?php endif; ?>
                        <?php if ($this->params->get('employment_history_1','1') == '1') : ?>
                        <td>
                            <input class="jg_input jg_supervisor" type="text" name="employer1_sup" id="employer1_sup" maxlength="250" value = "<?php if (isset($this->application)) echo $this->application->employer1_sup;?>" />
                        </td>
                        <?php endif; ?>
                        <?php if ($this->params->get('employment_history_2','1') == '1') : ?>
                        <td>
                            <input class="jg_input jg_supervisor" type="text" name="employer2_sup" id="employer2_sup" maxlength="250" value = "<?php if (isset($this->application)) echo $this->application->employer2_sup;?>" />
                        </td>
                        <?php endif; ?>
                        <?php if ($this->params->get('employment_history_3','1') == '1') : ?>
                        <td>
                            <input class="jg_input jg_supervisor" type="text" name="employer3_sup" id="employer3_sup" maxlength="250" value = "<?php if (isset($this->application)) echo $this->application->employer3_sup;?>" />
                        </td>
                        <?php endif; ?>
                    </tr>
                    <?php endif; ?>
                    <?php if ($this->params->get('employment_history_duties','1') == '1') : ?>
                    <tr>
                        <td class="jg_field<?php echo ($this->params->get('required_employment_history_duties','1')=='0'&&!$this->application->employer_dut)?$required_class:''; ?>" >
                                <?php echo $this->params->get('field_duties',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_COMPACT_DUTIES')); ?><?php echo ($this->params->get('required_employment_history_duties','1')=='0')?'*':''; ?>
                        </td>
                        <?php if ($this->params->get('employment_history_recent','1') == '1') : ?>
                        <td>
                            <input class="jg_input jg_duties<?php echo ($this->params->get('required_employment_history_duties','1')=='0'&&!$this->application->employer_dut)?$required_class:''; ?>" type="text" name="employer_dut" id="employer_dut" maxlength="250" value = "<?php if (isset($this->application)) echo $this->application->employer_dut;?>" />
                        </td>
                        <?php endif; ?>
                        <?php if ($this->params->get('employment_history_1','1') == '1') : ?>
                        <td>
                            <input class="jg_input jg_duties" type="text" name="employer1_dut" id="employer1_dut" maxlength="250" value = "<?php if (isset($this->application)) echo $this->application->employer1_dut;?>" />
                        </td>
                        <?php endif; ?>
                        <?php if ($this->params->get('employment_history_2','1') == '1') : ?>
                        <td>
                            <input class="jg_input jg_duties" type="text" name="employer2_dut" id="employer2_dut" maxlength="250" value = "<?php if (isset($this->application)) echo $this->application->employer2_dut;?>" />
                        </td>
                        <?php endif; ?>
                        <?php if ($this->params->get('employment_history_3','1') == '1') : ?>
                        <td>
                            <input class="jg_input jg_duties" type="text" name="employer3_dut" id="employer3_dut" maxlength="250" value = "<?php if (isset($this->application)) echo $this->application->employer3_dut;?>" />
                        </td>
                        <?php endif; ?>
                    </tr>
                    <?php endif; ?>
                    <?php if ($this->params->get('employment_history_reason','1') == '1') : ?>
                    <tr>
                        <td class="jg_field<?php echo ($this->params->get('required_employment_history_reason','1')=='0'&&!$this->application->employer_leave)?$required_class:''; ?>" >
                                <?php echo $this->params->get('field_reason_for_leaving',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_COMPACT_REASON_FOR_LEAVING')); ?><?php echo ($this->params->get('required_employment_history_reason','1')=='0')?'*':''; ?>
                        </td>
                        <?php if ($this->params->get('employment_history_recent','1') == '1') : ?>
                        <td>
                            <input class="jg_input jg_reason<?php echo ($this->params->get('required_employment_history_reason','1')=='0'&&!$this->application->employer_leave)?$required_class:''; ?>" type="text" name="employer_leave" id="employer_leave" size="18" maxlength="250" value = "<?php if (isset($this->application)) echo $this->application->employer_leave;?>" />
                        </td>
                        <?php endif; ?>
                        <?php if ($this->params->get('employment_history_1','1') == '1') : ?>
                        <td>
                            <input class="jg_input jg_reason" type="text" name="employer1_leave" id="employer1_leave" maxlength="250" value = "<?php if (isset($this->application)) echo $this->application->employer1_leave;?>" />
                        </td>
                        <?php endif; ?>
                        <?php if ($this->params->get('employment_history_2','1') == '1') : ?>
                        <td>
                            <input class="jg_input jg_reason" type="text" name="employer2_leave" id="employer2_leave" maxlength="250" value = "<?php if (isset($this->application)) echo $this->application->employer2_leave;?>" />
                        </td>
                        <?php endif; ?>
                        <?php if ($this->params->get('employment_history_3','1') == '1') : ?>
                        <td>
                            <input class="jg_input jg_reason" type="text" name="employer3_leave" id="employer3_leave" maxlength="250" value = "<?php if (isset($this->application)) echo $this->application->employer3_leave;?>" />
                        </td>
                        <?php endif; ?>
                    </tr>
                    <?php endif; ?>
                </table>
            </fieldset>
            <?php endif; ?>
            <?php $qcounter = 1; ?>
            <?php if ($this->params->get('job_related_skills','1') == '1') : ?>
            <fieldset>
                <legend><?php echo $this->params->get('field_job_related_skills',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_COMPACT_JOB_RELATED_SKILLS')); ?></legend>
                <?php if ($this->params->get('job_related_skills_q1','1') == '1' || 
                          $this->params->get('job_related_skills_q2','1') == '1' ||
                          $this->params->get('job_related_skills_q2_reason','1') == '1' ||
                          $this->params->get('job_related_skills_q3','1') == '1' ||
                          $this->params->get('job_related_skills_q3_reason','1') == '1' ||
                          $this->params->get('job_related_skills_states','1') == '1') : ?>
                <?php if ($this->params->get('job_related_skills_text','1') == '1' ) : ?>
                <table class="jg_skills" width="100%">
                    <tr>
                        <td class="jg_number"></td>
                        <td colspan="2">
                            <strong><?php echo $this->params->get('field_vehicle_questions',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_COMPACT_VEHICLE_QUESTIONS')); ?></strong>
                        </td>
                    </tr>
                </table>
                <?php endif; ?>
                <?php endif; ?>
                <?php if ($this->params->get('job_related_skills_q1','1') == '1') : ?>
                <table class="jg_skills_questions" width="100%">
                    <tr>
                        <td class="jg_number"><?php echo $qcounter; $qcounter++; ?>.</td>
                        <td class="jg_field">
                                <?php echo $this->params->get('field_vehicle_question_1',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_COMPACT_VEHICLE_QUESTION_1')); ?>
                        </td>
                        <td>
                                <?php echo $this->options['driver_license']; ?>
                        </td>
                    </tr>
                </table>
                <table class="jg_skills_followups" width="100%">
                    <tr>
                        <td class="jg_number"></td>
                        <td class="jg_field">
                                <?php echo $this->params->get('field_vehicle_question_1_followup_a',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_COMPACT_VEHICLE_QUESTION_1_FOLLOWUP_A')); ?>
                        </td>
                        <td>
                            <input class="text_area<?php echo ($this->application->driver_license==$this->params->get('force_vquestion_1_followup','1')&&!$this->application->dl_number)?$required_class:''; ?>" type="text" name="dl_number" id="dl_number" maxlength="250" value = "<?php if (isset($this->application)) echo $this->application->dl_number;?>" />
                        </td>
                    </tr>
                    <tr>
                        <td class="jg_number"></td>
                        <td class="jg_field">
                            <?php echo $this->params->get('field_vehicle_question_1_followup_b',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_COMPACT_VEHICLE_QUESTION_1_FOLLOWUP_B')); ?>
                        </td>
                        <td>
                            <input class="jg_input jg_driver_license<?php echo ($this->application->driver_license==$this->params->get('force_vquestion_1_followup','1')&&!$this->application->dl_issued)?$required_class:''; ?>" type="text" name="dl_issued" id="dl_issued" maxlength="250" value = "<?php if (isset($this->application)) echo $this->application->dl_issued;?>" />
                        </td>
                    </tr>
                </table>
                <?php endif; ?>
                <?php if ($this->params->get('job_related_skills_q2','1') == '1') : ?>
                <table class="jg_skills_questions" width="100%">
                    <tr>
                        <td class="jg_number"><?php echo $qcounter; $qcounter++; ?>.</td>
                        <td class="jg_field">
                                <?php echo $this->params->get('field_vehicle_question_2',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_COMPACT_VEHICLE_QUESTION_2')); ?>
                        </td>
                        <td>
                                <?php echo $this->options['driving_offense']; ?>
                        </td>
                    </tr>
                </table>
                <?php endif; ?>
                <?php if ($this->params->get('job_related_skills_q2_reason','1') == '1') : ?>
                <table class="jg_skills_followups" width="100%">
                    <tr>
                        <td class="jg_number"></td>
                        <td class="jg_field">
                            <?php echo $this->params->get('field_vehicle_question_2_followup',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_COMPACT_VEHICLE_QUESTION_2_FOLLOWUP')); ?>
                        </td>
                        <td>
                            <input class="jg_input jg_driving_offense<?php echo ($this->application->driving_offense==$this->params->get('force_vquestion_2_followup','1')&&!$this->application->driving_offense_reason)?$required_class:''; ?>" type="text" name="driving_offense_reason" id="driving_offense_reason" maxlength="250" value="<?php if (isset($this->application)) echo $this->application->driving_offense_reason; ?>" />
                        </td>
                    </tr>
                </table>
                <?php endif; ?>
                <?php if ($this->params->get('job_related_skills_q3','1') == '1') : ?>
                <table class="jg_skills_questions" width="100%">
                    <tr>
                        <td class="jg_number"><?php echo $qcounter; $qcounter++; ?>.</td>
                        <td class="jg_field">
                                <?php echo $this->params->get('field_vehicle_question_3',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_COMPACT_VEHICLE_QUESTION_3')); ?>
                        </td>
                        <td>
                                <?php echo $this->options['dl_modified']; ?>
                        </td>
                    </tr>
                </table>
                <?php endif; ?>
                <?php if ($this->params->get('job_related_skills_q3_reason','1') == '1') : ?>
                <table class="jg_skills_followups" width="100%">
                    <tr>
                        <td class="jg_number"></td>
                        <td class="jg_field">
                            <?php echo $this->params->get('field_vehicle_question_3_followup',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_COMPACT_VEHICLE_QUESTION_3_FOLLOWUP')); ?>
                        </td>
                        <td>
                            <input class="jg_input jg_dl_modified<?php echo ($this->application->dl_modified==$this->params->get('force_vquestion_3_followup','1')&&!$this->application->dl_modified_reason)?$required_class:''; ?>" type="text" name="dl_modified_reason" id="dl_modified_reason" maxlength="250" value="<?php if (isset($this->application)) echo $this->application->dl_modified_reason; ?>" />
                        </td>
                    </tr>
                </table>
                <?php endif; ?>
                <?php if ($this->params->get('job_related_skills_states','1') == '1') : ?>
                <table class="jg_skills_questions" width="100%">
                    <tr>
                        <td class="jg_number"><?php echo $qcounter; $qcounter++; ?>.</td>
                        <td class="jg_field">
                                <?php echo $this->params->get('field_vehicle_states',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_COMPACT_VEHICLE_STATES')); ?>
                        </td>
                        <td>
                            <input class="jg_field jg_dl_states" type="text" name="dl_states" id="dl_states" maxlength="250" value = "<?php if (isset($this->application)) echo $this->application->dl_states;?>" />
                        </td>
                    </tr>
                </table>
                <?php endif; ?>
                <?php if ($this->params->get('job_related_skills_skills','1') == '1') : ?>
                <table class="jg_skills_questions" width="100%">
                    <tr>
                        <td class="jg_number"><?php echo $qcounter; $qcounter++; ?>.</td>
                        <td class="jg_field"><?php echo $this->params->get('field_other_skills',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_COMPACT_OTHER_SKILLS')); ?></td>
                    </tr>
                    <tr>
                        <td class="jg_number"></td>
                        <td colspan="2"><textarea name="skills" rows="5" cols="75"><?php if (isset($this->application)) echo $this->application->skills; ?></textarea></td>
                    </tr>
                </table>
                <?php endif; ?>
                <?php if ($this->params->get('job_related_skills_designations','1') == '1') : ?>
                <table class="jg_skills_questions" width="100%">
                    <tr>
                        <td class="jg_number"><?php echo $qcounter; $qcounter++; ?>.</td>
                        <td class="jg_field"><?php echo $this->params->get('field_prof_designations',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_COMPACT_OTHER_CERTIFICATIONS')); ?></td>
                    </tr>
                    <tr>
                        <td class="jg_number"></td>
                        <td colspan="2"><textarea name="professional" rows="5" cols="75"><?php if (isset($this->application)) echo $this->application->professional; ?></textarea></td>
                    </tr>
                </table>
                <?php endif; ?>
            </fieldset>
            <?php echo $this->lists['lists']; ?>
            <?php endif; ?>
            <?php if ($this->params->get('references','1') == '1') : ?>
            <fieldset>
                <legend style="font-size: 10pt;"><?php echo $this->params->get('field_references',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_COMPACT_REFERENCES')); ?></legend>
                <table class="jg_references">
                    <tr>
                        <td></td>
                        <?php if ($this->params->get('references_1','1') == '1') : ?>
                        <td class="jg_field">
                                <?php echo $this->params->get('field_reference',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_COMPACT_REFERENCE')); ?>&nbsp;(1)
                                <?php echo ($this->params->get('required_references_name','1')=='0'||
                                                                                            $this->params->get('required_references_address','1')=='0'||
                                                                                            $this->params->get('required_references_telephone','1')=='0'||
                                                                                            $this->params->get('required_references_relationship','1')=='0'||
                                                                                            $this->params->get('required_references_years','1')=='0')?'*':''; ?>
                        </td>
                        <?php endif; ?>
                        <?php if ($this->params->get('references_2','1') == '1') : ?>
                        <td class="jg_field">
                                <?php echo $this->params->get('field_reference',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_COMPACT_REFERENCE')); ?>&nbsp;(2)
                                <?php echo ($this->params->get('required_references_name','1')=='0'||
                                                                                            $this->params->get('required_references_address','1')=='0'||
                                                                                            $this->params->get('required_references_telephone','1')=='0'||
                                                                                            $this->params->get('required_references_relationship','1')=='0'||
                                                                                            $this->params->get('required_references_years','1')=='0')?'*':''; ?>
                        </td>
                        <?php endif; ?>
                        <?php if ($this->params->get('references_3','1') == '1') : ?>
                        <td class="jg_field">
                                <?php echo $this->params->get('field_reference',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_COMPACT_REFERENCE')); ?>&nbsp;(3)
                                <?php echo ($this->params->get('required_references_name','1')=='0'||
                                                                                            $this->params->get('required_references_address','1')=='0'||
                                                                                            $this->params->get('required_references_telephone','1')=='0'||
                                                                                            $this->params->get('required_references_relationship','1')=='0'||
                                                                                            $this->params->get('required_references_years','1')=='0')?'*':''; ?>
                        </td>
                        <?php endif; ?>
                        <?php if ($this->params->get('references_4','1') == '1') : ?>
                        <td class="jg_field">
                                <?php echo $this->params->get('field_reference',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_COMPACT_REFERENCE')); ?>&nbsp;(4)
                                <?php echo ($this->params->get('required_references_name','1')=='0'||
                                                                                            $this->params->get('required_references_address','1')=='0'||
                                                                                            $this->params->get('required_references_telephone','1')=='0'||
                                                                                            $this->params->get('required_references_relationship','1')=='0'||
                                                                                            $this->params->get('required_references_years','1')=='0')?'*':''; ?>
                        </td>
                        <?php endif; ?>
                    </tr>
                    <?php if ($this->params->get('references_name','1') == '1') : ?>
                    <tr>
                        <td class="jg_field<?php echo ($this->params->get('required_references_address','1')=='0'&&(!$this->application->ref1_name ||
                                !$this->application->ref2_name || !$this->application->ref3_name || !$this->application->ref4_name))?$required_class:''; ?>" >
                                <?php echo $this->params->get('field_reference_name',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_COMPACT_NAME')); ?>
                                <?php echo ($this->params->get('required_references_name','1')=='0')?'*':''; ?>
                        </td>
                        <?php if ($this->params->get('references_1','1') == '1') : ?>
                        <td>
                            <input class="jg_input jg_name<?php echo ($this->params->get('required_references_name','1')=='0'&&!$this->application->ref1_name)?$required_class:''; ?>" type="text" name="ref1_name" id="ref1_name" maxlength="250" value = "<?php if (isset($this->application)) echo $this->application->ref1_name;?>" />
                        </td>
                        <?php endif; ?>
                        <?php if ($this->params->get('references_2','1') == '1') : ?>
                        <td>
                            <input class="jg_input jg_name<?php echo ($this->params->get('required_references_name','1')=='0'&&!$this->application->ref2_name)?$required_class:''; ?>" type="text" name="ref2_name" id="ref2_name" maxlength="250" value = "<?php if (isset($this->application)) echo $this->application->ref2_name;?>" />
                        </td>
                        <?php endif; ?>
                        <?php if ($this->params->get('references_3','1') == '1') : ?>
                        <td>
                            <input class="jg_input jg_name<?php echo ($this->params->get('required_references_name','1')=='0'&&!$this->application->ref3_name)?$required_class:''; ?>" type="text" name="ref3_name" id="ref3_name" maxlength="250" value = "<?php if (isset($this->application)) echo $this->application->ref3_name;?>" />
                        </td>
                        <?php endif; ?>
                        <?php if ($this->params->get('references_4','1') == '1') : ?>
                        <td>
                            <input class="jg_input jg_name<?php echo ($this->params->get('required_references_name','1')=='0'&&!$this->application->ref4_name)?$required_class:''; ?>" type="text" name="ref4_name" id="ref4_name" maxlength="250" value = "<?php if (isset($this->application)) echo $this->application->ref4_name;?>" />
                        </td>
                        <?php endif; ?>
                    </tr>
                    <?php endif; ?>
                    <?php if ($this->params->get('references_address','1') == '1') : ?>
                    <tr>
                        <td class="jg_field<?php echo ($this->params->get('required_references_address','1')=='0'&&(!$this->application->ref1_address ||
                                !$this->application->ref2_address || !$this->application->ref3_address || !$this->application->ref4_address))?$required_class:''; ?>" >
                                <?php echo $this->params->get('field_reference_address',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_COMPACT_ADDRESS')); ?>
                                <?php echo ($this->params->get('required_references_address','1')=='0')?'*':''; ?>
                        </td>
                        <?php if ($this->params->get('references_1','1') == '1') : ?>
                        <td>
                            <input class="jg_input jg_address<?php echo ($this->params->get('required_references_address','1')=='0'&&!$this->application->ref1_address)?$required_class:''; ?>" type="text" name="ref1_address" id="ref1_address" maxlength="250" value = "<?php if (isset($this->application)) echo $this->application->ref1_address;?>" />
                        </td>
                        <?php endif; ?>
                        <?php if ($this->params->get('references_2','1') == '1') : ?>
                        <td>
                            <input class="jg_input jg_address<?php echo ($this->params->get('required_references_address','1')=='0'&&!$this->application->ref2_address)?$required_class:''; ?>" type="text" name="ref2_address" id="ref2_address" maxlength="250" value = "<?php if (isset($this->application)) echo $this->application->ref2_address;?>" />
                        </td>
                        <?php endif; ?>
                        <?php if ($this->params->get('references_3','1') == '1') : ?>
                        <td>
                            <input class="jg_input jg_address<?php echo ($this->params->get('required_references_address','1')=='0'&&!$this->application->ref3_address)?$required_class:''; ?>" type="text" name="ref3_address" id="ref3_address" maxlength="250" value = "<?php if (isset($this->application)) echo $this->application->ref3_address;?>" />
                        </td>
                        <?php endif; ?>
                        <?php if ($this->params->get('references_4','1') == '1') : ?>
                        <td>
                            <input class="jg_input jg_address<?php echo ($this->params->get('required_references_address','1')=='0'&&!$this->application->ref4_address)?$required_class:''; ?>" type="text" name="ref4_address" id="ref4_address" maxlength="250" value = "<?php if (isset($this->application)) echo $this->application->ref4_address;?>" />
                        </td>
                        <?php endif; ?>
                    </tr>
                    <?php endif; ?>
                    <?php if ($this->params->get('references_telephone','1') == '1') : ?>
                    <tr>
                        <td class="jg_field<?php echo ($this->params->get('required_references_telephone','1')=='0'&&(!$this->application->ref1_telephone ||
                                !$this->application->ref2_telephone || !$this->application->ref3_telephone || !$this->application->ref4_telephone))?$required_class:''; ?>" >
                                <?php echo $this->params->get('field_reference_telephone',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_COMPACT_TELEPHONE')); ?>
                                <?php echo ($this->params->get('required_references_telephone','1')=='0')?'*':''; ?>
                        </td>
                        <?php if ($this->params->get('references_1','1') == '1') : ?>
                        <td>
                            <input class="jg_input jg_telephone<?php echo ($this->params->get('required_references_telephone','1')=='0'&&!$this->application->ref1_telephone)?$required_class:''; ?>" type="text" name="ref1_telephone" id="ref1_telephone" maxlength="250" value = "<?php if (isset($this->application)) echo $this->application->ref1_telephone;?>" />
                        </td>
                        <?php endif; ?>
                        <?php if ($this->params->get('references_2','1') == '1') : ?>
                        <td>
                            <input class="jg_input jg_telephone<?php echo ($this->params->get('required_references_telephone','1')=='0'&&!$this->application->ref2_telephone)?$required_class:''; ?>" type="text" name="ref2_telephone" id="ref2_telephone" maxlength="250" value = "<?php if (isset($this->application)) echo $this->application->ref2_telephone;?>" />
                        </td>
                        <?php endif; ?>
                        <?php if ($this->params->get('references_3','1') == '1') : ?>
                        <td>
                            <input class="jg_input jg_telephone<?php echo ($this->params->get('required_references_telephone','1')=='0'&&!$this->application->ref3_telephone)?$required_class:''; ?>" type="text" name="ref3_telephone" id="ref3_telephone" maxlength="250" value = "<?php if (isset($this->application)) echo $this->application->ref3_telephone;?>" />
                        </td>
                        <?php endif; ?>
                        <?php if ($this->params->get('references_4','1') == '1') : ?>
                        <td>
                            <input class="jg_input jg_telephone<?php echo ($this->params->get('required_references_telephone','1')=='0'&&!$this->application->ref4_telephone)?$required_class:''; ?>" type="text" name="ref4_telephone" id="ref4_telephone" maxlength="250" value = "<?php if (isset($this->application)) echo $this->application->ref4_telephone;?>" />
                        </td>
                        <?php endif; ?>
                    </tr>
                    <?php endif; ?>
                    <?php if ($this->params->get('reference_relationship','1') == '1') : ?>
                    <tr>
                        <td class="jg_field<?php echo ($this->params->get('required_references_relationship','1')=='0'&&(!$this->application->ref1_relationship ||
                                !$this->application->ref2_relationship || !$this->application->ref3_relationship || !$this->application->ref4_relationship))?$required_class:''; ?>" style="border: 0px; font-size: 8pt;">
                                <?php echo $this->params->get('field_reference_relationship',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_COMPACT_RELATIONSHIP')); ?>
                                <?php echo ($this->params->get('required_references_relationship','1')=='0')?'*':''; ?>
                        </td>
                        <?php if ($this->params->get('references_1','1') == '1') : ?>
                        <td>
                            <input class="jg_input jg_relationship<?php echo ($this->params->get('required_references_relationship','1')=='0'&&!$this->application->ref1_relationship)?$required_class:''; ?>" type="text" name="ref1_relationship" id="ref1_relationship" maxlength="250" value = "<?php if (isset($this->application)) echo $this->application->ref1_relationship;?>" />
                        </td>
                        <?php endif; ?>
                        <?php if ($this->params->get('references_2','1') == '1') : ?>
                        <td>
                            <input class="jg_input jg_relationship<?php echo ($this->params->get('required_references_relationship','1')=='0'&&!$this->application->ref2_relationship)?$required_class:''; ?>" type="text" name="ref2_relationship" id="ref2_relationship" maxlength="250" value = "<?php if (isset($this->application)) echo $this->application->ref2_relationship;?>" />
                        </td>
                        <?php endif; ?>
                        <?php if ($this->params->get('references_3','1') == '1') : ?>
                        <td>
                            <input class="jg_input jg_relationship<?php echo ($this->params->get('required_references_relationship','1')=='0'&&!$this->application->ref3_relationship)?$required_class:''; ?>" type="text" name="ref3_relationship" id="ref3_relationship" maxlength="250" value = "<?php if (isset($this->application)) echo $this->application->ref3_relationship;?>" />
                        </td>
                        <?php endif; ?>
                        <?php if ($this->params->get('references_4','1') == '1') : ?>
                        <td>
                            <input class="jg_input jg_relationship<?php echo ($this->params->get('required_references_relationship','1')=='0'&&!$this->application->ref4_telephone)?$required_class:''; ?>" type="text" name="ref4_relationship" id="ref4_relationship" maxlength="250" value = "<?php if (isset($this->application)) echo $this->application->ref4_relationship;?>" />
                        </td>
                        <?php endif; ?>
                    </tr>
                    <?php endif; ?>
                    <?php if ($this->params->get('references_years_acquainted','1') == '1') : ?>
                    <tr>
                        <td class="jg_field<?php echo ($this->params->get('required_references_years','1')=='0'&&(!$this->application->ref1_years ||
                                !$this->application->ref2_years || !$this->application->ref3_years || !$this->application->ref4_years))?$required_class:''; ?>" >
                                <?php echo $this->params->get('field_reference_years_acquainted',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_COMPACT_YEARS_ACQUAINTED')); ?>
                                <?php echo ($this->params->get('required_references_years','1')=='0')?'*':''; ?>
                        </td>
                        <?php if ($this->params->get('references_1','1') == '1') : ?>
                        <td>
                            <input class="jg_input jg_years<?php echo ($this->params->get('required_references_years','1')=='0'&&!$this->application->ref1_years)?$required_class:''; ?>" type="text" name="ref1_years" id="ref1_years" maxlength="250" value = "<?php if (isset($this->application)) echo $this->application->ref1_years;?>" />
                        </td>
                        <?php endif; ?>
                        <?php if ($this->params->get('references_2','1') == '1') : ?>
                        <td>
                            <input class="jg_input jg_years<?php echo ($this->params->get('required_references_years','1')=='0'&&!$this->application->ref2_years)?$required_class:''; ?>" type="text" name="ref2_years" id="ref2_years" maxlength="250" value = "<?php if (isset($this->application)) echo $this->application->ref2_years;?>" />
                        </td>
                        <?php endif; ?>
                        <?php if ($this->params->get('references_3','1') == '1') : ?>
                        <td>
                            <input class="jg_input jg_years<?php echo ($this->params->get('required_references_years','1')=='0'&&!$this->application->ref3_years)?$required_class:''; ?>" type="text" name="ref3_years" id="ref3_years" maxlength="250" value = "<?php if (isset($this->application)) echo $this->application->ref3_years;?>" />
                        </td>
                        <?php endif; ?>
                        <?php if ($this->params->get('references_4','1') == '1') : ?>
                        <td>
                            <input class="jg_input jg_years<?php echo ($this->params->get('required_references_years','1')=='0'&&!$this->application->ref4_years)?$required_class:''; ?>" type="text" name="ref4_years" id="ref4_years" maxlength="250" value = "<?php if (isset($this->application)) echo $this->application->ref4_years;?>" />
                        </td>
                        <?php endif; ?>
                    </tr>
                    <?php endif; ?>
                </table>
            </fieldset>
            <?php endif; ?>
            <?php if ($this->params->get('text_resume','1') == '1') : ?>
            <fieldset>
                <legend><?php echo $this->params->get('field_text_resume',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_COMPACT_TEXT_RESUME')); ?></legend>
                <table width="100%" class="jg_text_resume">
                    <tr>
                        <td class="jg_number"></td>
                        <td class="jg_field">
                                <?php echo $this->params->get('field_text_resume_desc',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_COMPACT_TEXT_RESUME_DESC')); ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="jg_number">
                        <td class="jg_field">
                            <textarea cols="75" rows="10" name="text_resume"><?php if (isset($this->application)) echo $this->application->text_resume; ?></textarea>
                        </td>
                    </tr>
                </table>
            </fieldset>
            <?php endif; ?>
            <?php if ($this->params->get('file_upload','1') == '1') : ?>
            <fieldset>
                <legend><?php echo $this->params->get('field_upload_file',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_COMPACT_UPLOAD_FILE')); ?></legend>
                <?php if ((int)$this->params->get('file_upload_count','1') == 1) : ?>
                <table width="100%" class="jg_file_upload">
                    <tr>
                        <td class="jg_number"></td>
                        <td class="jg_field">
                            <?php echo $this->params->get('field_upload_file_desc',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_COMPACT_UPLOAD_FILE_DESC')); ?>&nbsp;<span style="font-size: smaller;">(<?php
                                echo $this->params->get('field_permitted_types',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_COMPACT_PERMITTED_FILE_TYPES')); ?>:&nbsp;<?php 
                                echo $this->params->get('file_upload_types','doc,docx,pdf,txt'); ?>&nbsp;-&nbsp;<?php
                                echo $this->params->get('field_max_file_size',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_COMPACT_MAX_FILE_SIZE')); ?>:&nbsp;<?php  
                                echo $this->params->get('file_upload_max_size','1045876'); ?>&nbsp;bytes)</span>                        </td>
                    </tr>
                    <tr>
                        <td class="jg_number"></td>
                        <td class="jg_field">
                            <input type="hidden" id="file_name" name="file_name" value="<?php if (isset($this->application->file_name)) echo $this->application->file_name; ?>" />
                            <input class="text_area" type="file" onchange="document.getElementById('file_name').value=this.value" name="file_upload" id="file_upload" title="Pick a file to upload" size="50" value="<?php if ( isset($this->application->file_name) ) echo $this->application->file_name;?>"/>
                        </td>
                    </tr>
                </table>
                <?php else: ?>
                <?php 
                    $parms_bad = false; $count = 0;
                    $files_field_upload_file_desc = explode("|", $this->params->get('field_upload_file_desc',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_COMPACT_UPLOAD_FILE_DESC')));
                    $files_field_upload_file_desc_count = count($files_field_upload_file_desc);
                    $max_defined = $files_field_upload_file_desc_count;
                    $files_field_permitted_types = explode("|", $this->params->get('field_permitted_types',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_COMPACT_PERMITTED_FILE_TYPES')));
                    $files_field_permitted_types_count = count($files_field_permitted_types);
                    if ($max_defined !== $files_field_permitted_types_count) $parms_bad = true;
                    $files_file_upload_types = explode("|", $this->params->get('file_upload_types','doc,docx,pdf,txt'));
                    $files_file_upload_types_count = count($files_file_upload_types);
                    if ($max_defined !== $files_file_upload_types_count) $parms_bad = true;
                    $files_field_max_file_size = explode("|", $this->params->get('field_max_file_size',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_COMPACT_MAX_FILE_SIZE')));
                    $files_field_max_file_size_count = count($files_field_max_file_size);
                    if ($max_defined !== $files_field_max_file_size_count) $parms_bad = true;
                    $files_file_upload_max_size = explode("|", $this->params->get('file_upload_max_size','1045876'));
                    $files_file_upload_max_size_count = count($files_file_upload_max_size);
                    if ($max_defined !== $files_file_upload_max_size_count) $parms_bad = true;
                    if ($max_defined !== (int)$this->params->get('file_upload_count','1')) $parms_bad = true;
                    
                    if ($parms_bad) {
                        echo "<h1>Parameters for multiple uploads are not matching.</h1>";
                        echo "<p>Make sure you have defined all parameters correctly using a pipe | to delimit for each file. Check the following:</p>";
                        echo "<ul><li>Upload file description</li>";
                        echo "<li>Permitted types description</li>";
                        echo "<li>Upload types</li>";
                        echo "<li>Maximum file size description</li>";
                        echo "<li>Maximum file size</li>";
                        echo "<p>Define each parameter using the pipe | as a delimiter.</p>";
                    } else {
                        foreach ($files_field_upload_file_desc as $desc) {
                ?>
                <table width="100%" class="jg_file_upload">
                    <tr>
                        <td class="jg_number"></td>
                        <td class="jg_field">
                            <?php echo $files_field_upload_file_desc[$count]; ?>&nbsp;<span style="font-size: smaller;">(<?php
                                echo $files_field_permitted_types[$count]; ?>:&nbsp;<?php 
                                echo $files_file_upload_types[$count]; ?>&nbsp;-&nbsp;<?php
                                echo $files_field_max_file_size[$count]; ?>:&nbsp;<?php  
                                echo $files_file_upload_max_size[$count]; ?>&nbsp;bytes)</span>
                        </td>
                    </tr>
                    <tr>
                        <td class="jg_number"></td>
                        <td class="jg_field">
                            <input type="hidden" id="file_name<?php echo $count; ?>" name="file_name[]" value="<?php // echo (isset($this->application->file_name))?$this->application->file_name:""; ?>" />
                            <input type="file" name="jform[file_name][]" id="file_upload<?php echo $count; ?>" title="Pick a file to upload" size="50" value="<?php // echo ( isset($this->application->file_name) ) ? $this->application->file_name:"";?>"/>
                        </td>
                    </tr>
                </table>
                <?php        
                        $count++;
                        }
                    }
                    
                ?>
                <?php endif; ?>
            </fieldset>
            <?php endif; ?>
            <?php if ($this->params->get('agreement','1') == '1') : ?>
            <fieldset>
                <legend style="font-size: 10pt;"><?php echo $this->params->get('field_certification_agreement',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_COMPACT_CERTIFICATION_AGREEMENT')); ?></legend>
                <?php if (isset($this->agreement)) echo $this->agreement->introtext.$this->agreement->fulltext; ?>
                <?php if ($this->params->get('bullet1_on','1') == '1' || 
                            $this->params->get('bullet2_on','1') == '1' || 
                            $this->params->get('bullet3_on','1') == '1' || 
                            $this->params->get('bullet4_on','1') == '1' || 
                            $this->params->get('bullet5_on','1') == '1' || 
                            $this->params->get('bullet6_on','1') == '1' ) : ?>
                <table width="100%" class="jg_agreements">
                    <?php $bullet = 0; ?>
                    <?php if ($this->params->get('bullet1_on','1') == '1') : ?>
                    <?php $bullet++; ?>
                    <tr>
                        <td class="jg_number"><?php echo $bullet; ?>.</td>
                        <td class="jg_field">
                                <?php echo $this->params->get('certification_agreement_bullet1','Certification Agreement Bullet 1'); ?>
                        </td>
                    </tr>
                    <?php endif; ?>
                    <?php if ($this->params->get('bullet2_on','1') == '1') : ?>
                    <?php $bullet++; ?>
                    <tr>
                        <td class="jg_number"><?php echo $bullet; ?>.</td>
                        <td class="jg_field">
                                <?php echo $this->params->get('certification_agreement_bullet2','Certification Agreement Bullet 2'); ?>
                        </td>
                    </tr>
                    <?php endif; ?>
                    <?php if ($this->params->get('bullet3_on','1') == '1') : ?>
                    <?php $bullet++; ?>
                    <tr>
                        <td class="jg_number"><?php echo $bullet; ?>.</td>
                        <td class="jg_field">
                                <?php echo $this->params->get('certification_agreement_bullet3','Certification Agreement Bullet 3'); ?>
                        </td>
                    </tr>
                    <?php endif; ?>
                    <?php if ($this->params->get('bullet4_on','1') == '1') : ?>
                    <?php $bullet++; ?>
                    <tr>
                        <td class="jg_number"><?php echo $bullet; ?>.</td>
                        <td class="jg_field">
                                <?php echo $this->params->get('certification_agreement_bullet4','Certification Agreement Bullet 4'); ?>
                        </td>
                    </tr>
                    <?php endif; ?>
                    <?php if ($this->params->get('bullet5_on','1') == '1') : ?>
                    <?php $bullet++; ?>
                    <tr>
                        <td class="jg_number"><?php echo $bullet; ?>.</td>
                        <td class="jg_field">
                                <?php echo $this->params->get('certification_agreement_bullet5','Certification Agreement Bullet 5'); ?>
                        </td>
                    </tr>
                    <?php endif; ?>
                    <?php if ($this->params->get('bullet6_on','1') == '1') : ?>
                    <?php $bullet++; ?>
                    <tr>
                        <td class="jg_number"><?php echo $bullet; ?>.</td>
                        <td class="jg_field">
                                <?php echo $this->params->get('certification_agreement_bullet6','Certification Agreement Bullet 6'); ?>
                        </td>
                    </tr>
                    <?php endif; ?>
                </table>
                <?php endif; ?>
                <?php if ($this->params->get('display_custom_yes_no','0') == '1') : ?>
                <table class="jg_custom_yes_no">
                    <tr>
                        <td class="jg_number"></td>
                        <td class="jg_field">
                            <?php echo $this->params->get('text_custom_yes_no',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_COMPACT_SH_CUSTOM_YES_NO_TEXT')); ?>
                        </td>
                        <td>
                            <?php echo $this->options['custom_yes_no']; ?>
                        </td>
                    </tr>
                </table>
                <?php endif; ?>
            </fieldset>
            <?php endif; ?>
            <?php if ($this->params->get('use_captcha','1') == '1') : ?>
            <fieldset id="jg_captcha">
                <legend><?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_COMPACT_CAPTCHA_TEXT'); ?></legend>
                <table width="100%" class="jg_captcha">
                    <tr>
                        <td>
                            <input size="40" onclick="if (this.value=='<?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_COMPACT_ENTER_CAPTCHA_INSTRUCTIONS'); ?>') this.value='';" type="text" name="captcha_entered" id="captcha_entered" maxlength="8" value="<?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_COMPACT_ENTER_CAPTCHA_INSTRUCTIONS'); ?>" />&nbsp;
                            <img name="captcha_img" id="captcha_img" alt="captcha" src="<?php echo 'index.php?option=com_jobgrokapp&amp;view=application&amp;format=captcha&amp;Itemid='.JRequest::getVar('Itemid'); ?>" />
                        </td>
                    </tr>
                </table>
            </fieldset>
            <?php endif; ?>
            <?php if ($this->params->get('use_captcha','1') == '2') : ?>
            <fieldset id="jg_captcha">
                <legend><?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_COMPACT_CAPTCHA_TEXT'); ?></legend>
                <table width="100%" class="admintable">
                    <tr>
                        <td>
                            <script type="text/javascript">
                            var RecaptchaOptions = { theme : '<?php echo $this->params->get('recaptcha_style','clean'); ?>' };
                            </script>
                            <?php
                            require_once('recaptchalib.php');
                            $publickey = $this->params->get('recaptcha_publickey',''); // you got this from the signup page
                            if ($publickey == '')
                                echo "You must enter your reCaptcha key in the extension's parameters.";
                            else
                                echo recaptcha_get_html($publickey, null, $this->params->get('recaptcha_ssl','0')=='0'?false:true);
                            ?>
                        </td>
                    </tr>
                </table>
            </fieldset>
            <?php endif; ?>            
            <table width="100%" class="admintable">
                <?php if ($this->params->get('signature','1') == '1') : ?>
                <tr>
                    <td>
                    </td>
                    <td valign="top" align="left" class="key<?php echo ($this->params->get('required_signature','1')=='0'&&!$this->application->signature)?$required_class:''; ?>" style="border: 0px; font-size: 8pt;">
                        <?php echo $this->params->get('field_type_name_in_signature_box',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_COMPACT_TYPE_NAME_IN_SIGNATURE_BOX')); echo ($this->params->get('required_signature','1')=='0')?'*':''; ?>:
                        <input class="text_area<?php echo ($this->params->get('required_signature','1')=='0'&&!$this->application->signature)?$required_class:''; ?>" type="text" name="signature" id="signature" size="35" maxlength="250" value = "<?php if (isset($this->application)) echo $this->application->signature;?>" />
                    </td>
                    <td valign="top" align="right" class="key" style="border: 0px; font-size: 8pt;">
                        <?php
                            if ($this->params->get('app_create_date_location','bottom') == 'bottom') {
                                echo $this->params->get('app_todays_date_text',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_COMPACT_TODAYS_DATE')); ?>:&nbsp;<?php 
                                $timenow = new JDate();
                                $mysqlTime = JHTML::_('date', $timenow,$this->params->get('jg_date_format','Y-m-d G:i:s'));
                                echo "<span id='jg_date_format'>".$mysqlTime."</span>";
                                //echo date($this->params->get('jg_date_format','Y-m-d H:i:s')); 
                            }
                        ?><br />
                    </td>
                </tr>
                <?php endif; ?>
                <tr>
                    <td colspan="3" align="center">
                        <input type="button" name="submit_app" onclick="document.adminForm.submit();" value="<?php echo $this->params->get('submit_application_text',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_COMPACT_SUBMIT_APPLICATION')); ?>" />
                    </td>
                </tr>
            </table>
            <input type="hidden" name="id" value="<?php if (isset($this->application)) echo $this->application->id; ?>" />
            <input type="hidden" name="controller" value="application" />
            <input type="hidden" name="view" value="application" />
            <input type="hidden" name="source" value="compact" />
            <input type="hidden" name="layout" value="static" />
            <input type="hidden" name="uid" value="<?php echo $this->uid; ?>" />
            <input type="hidden" name="option" value="com_jobgrokapp" />
            <input type="hidden" name="Itemid" value="<?php echo (isset($this->application->Itemid)?$this->application->Itemid:$this->Itemid); ?>" />
            <input type="hidden" name="task" value="save" />
            <input type="hidden" name="thankyou" value="<?php echo $this->params->get('thankyou_article'); ?>" />
<?php if ($this->params->get('invite_code','') != '') : ?>
            <input type="hidden" name="invite_code" value="<?php echo JRequest::getVar('invite_code'); ?>" />
<?php endif; ?>
<?php if ($this->params->get('display_job_selection','0') == '1' && isset($this->posting_id)) : ?>
            <input type="hidden" value="<?php echo $this->posting_id; ?>" name="posting_id" id="posting_id" />
<?php endif; ?>
            <?php echo JHTML::_( 'form.token'); ?>
        </form>
</div>
<div id="credits" style="width: 100%"><?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_COMPACT_POWERED_BY'); 
?>&nbsp;<a href="http://www.jobgrok.com"><?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_COMPACT_JOBGROK'); ?></a></div>
