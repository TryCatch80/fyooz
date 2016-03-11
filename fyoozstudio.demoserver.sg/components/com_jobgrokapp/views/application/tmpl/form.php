<?php
/**
 *
 *
 * This is the form.php view layout for jobgrokapp
 *
 * Created: November 18, 2014, 3:25 am
 *
 * Subversion Details
 * $Date: 2014-02-06 20:38:10 -0600 (Thu, 06 Feb 2014) $
 * $Revision: 5763 $
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
$document =JFactory::getDocument();
$editor =JFactory::getEditor();
JHTML::_('behavior.calendar');
//JHTML::_('behavior.uploader');

$css = ".jg_ea fieldset#intro {	background-color: ".$this->params->get('form_background_color','#f6f6f6')."; }
        .jg_ea fieldset table, .jg_ea fieldset table tr, .jg_ea fieldset td { border: 0px none; }
        .jg_ea td.required { color: red; font-weight: bold; }
        .jg_ea td input.required { border-color: #faa; }
        .jg_ea tr, .jg_ea td { border: 0px none; } ";

$document->addStyleDeclaration($css);

if ($this->retry) $required_class = " required"; else $required_class = "";
?>
<div class="jg_ea">
    <?php if ($this->params->get('display_title','1') == '1') : ?>
    <h1 id="jg_display_title"><?php echo $this->params->get('title'); ?></h1>
    <?php endif; ?>
    <?php if ($this->params->get('display_intro','1') == '1') : ?>
    <fieldset id="jg_display_intro">
        <strong><?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_FORM_INTRO_BOLD'); ?></strong>
        <?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_FORM_INTRO_TEXT'); ?>
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
            <fieldset id="jg_personal_information" class="form">
                <legend style="font-size: 10pt;"><?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_FORM_PERSONAL_INFORMATION'); ?></legend>
                <table class="admintable">
                    <tr>
                        <td id="jg_personal_information_first_name" width="100" align="right" class="key<?php echo ($this->params->get('required_first_name','1')=='0'&&!$this->application->first_name)?$required_class:''; ?>" style="border: 0px; font-size: 8pt;">
                                <?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_FORM_FIRST_NAME'); ?>
                                <?php echo ($this->params->get('required_first_name','1')=='0')?'*':''; ?>:
                        </td>
                        <td>
                            <input class="text_area<?php echo ($this->params->get('required_first_name','1')=='0'&&!$this->application->first_name)?$required_class:''; ?>" type="text" name="first_name" id="first_name" size="20" maxlength="250" value = "<?php if (isset($this->application)) echo $this->application->first_name;?>" />
                        </td>
                        <td id="jg_personal_information_middle_name" width="100" align="right" class="key<?php echo ($this->params->get('required_middle_name','1')=='0'&&!$this->application->middle_name)?$required_class:''; ?>" style="border: 0px; font-size: 8pt;">
                                <?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_FORM_MIDDLE_NAME'); ?>
                                <?php echo ($this->params->get('required_middle_name','1')=='0')?'*':''; ?>:
                        </td>
                        <td>
                            <input class="text_area<?php echo ($this->params->get('required_middle_name','1')=='0'&&!$this->application->middle_name)?$required_class:''; ?>" type="text" name="middle_name" id="middle_name" size="20" maxlength="250" value = "<?php if (isset($this->application)) echo $this->application->middle_name;?>" />
                        </td>
                        <td id ="jg_personal_information_last_name" width="100" align="right" class="key<?php echo ($this->params->get('required_last_name','1')=='0'&&!$this->application->last_name)?$required_class:''; ?>" style="border: 0px; font-size: 8pt;">
                                <?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_FORM_LAST_NAME'); ?>
                                <?php echo ($this->params->get('required_last_name','1')=='0')?'*':''; ?>:
                        </td>
                        <td>
                            <input class="text_area<?php echo ($this->params->get('required_last_name','1')=='0'&&!$this->application->last_name)?$required_class:''; ?>" type="text" name="last_name" id="last_name" size="20" maxlength="250" value = "<?php if (isset($this->application)) echo $this->application->last_name;?>" />
                        </td>
                    </tr>
                    <tr>
                        <td id="jg_personal_information_home_phone" width="100" align="right" class="key<?php echo ($this->params->get('required_home_phone','1')=='0'&&!$this->application->home_phone)?$required_class:''; ?>" style="border: 0px; font-size: 8pt;">
                                <?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_FORM_HOME_PHONE'); ?>
                                <?php echo ($this->params->get('required_home_phone','1')=='0')?'*':''; ?>:
                        </td>
                        <td>
                            <input class="text_area<?php echo ($this->params->get('required_home_phone','1')=='0'&&!$this->application->home_phone)?$required_class:''; ?>" type="text" name="home_phone" id="home_phone" size="20" maxlength="20" value = "<?php if (isset($this->application)) echo $this->application->home_phone;?>" />
                        </td>
                        <td id="jg_personal_information_work_phone" width="100" align="right" class="key<?php echo ($this->params->get('required_work_phone','1')=='0'&&!$this->application->work_phone)?$required_class:''; ?>" style="border: 0px; font-size: 8pt;">
                                <?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_FORM_WORK_PHONE'); ?>
                                <?php echo ($this->params->get('required_work_phone','1')=='0')?'*':''; ?>:
                        </td>
                        <td>
                            <input class="text_area<?php echo ($this->params->get('required_work_phone','1')=='0'&&!$this->application->work_phone)?$required_class:''; ?>" type="text" name="work_phone" id="work_phone" size="20" maxlength="20" value = "<?php if (isset($this->application)) echo $this->application->work_phone;?>" />
                        </td>
                        <td id="jg_personal_information_cell_phone" width="100" align="right" class="key<?php echo ($this->params->get('required_cell_phone','1')=='0'&&!$this->application->cell_phone)?$required_class:''; ?>" style="border: 0px; font-size: 8pt;">
                                <?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_FORM_CELL_PHONE'); ?>
                                <?php echo ($this->params->get('required_cell_phone','1')=='0')?'*':''; ?>:
                        </td>
                        <td>
                            <input class="text_area<?php echo ($this->params->get('required_cell_phone','1')=='0'&&!$this->application->cell_phone)?$required_class:''; ?>" type="text" name="cell_phone" id="cell_phone" size="20" maxlength="20" value = "<?php if (isset($this->application)) echo $this->application->cell_phone;?>" />
                        </td>
                    </tr>
                    <tr>
                        <td id="jg_personal_information_email_address" colspan="1" width="100" align="right" class="key<?php echo ($this->params->get('required_email_address','1')=='0'&&!$this->application->email_address)?$required_class:''; ?>" style="border: 0px; font-size: 8pt;">
                                <?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_FORM_EMAIL_ADDRESS'); ?>
                                <?php echo ($this->params->get('required_email_address','1')=='0')?'*':''; ?>:
                        </td>
                        <td colspan="5">
                            <input class="text_area<?php echo ($this->params->get('required_email_address','1')=='0'&&!$this->application->email_address)?$required_class:''; ?>" type="text" name="email_address" id="email_address" size="50" maxlength="250" value = "<?php if (isset($this->application)) echo $this->application->email_address;?>" />
                        </td>
                    </tr>
                </table>
                <br/>
            </fieldset>
            <?php endif; ?>
            <?php if ($this->params->get('addresses','1') == '1')
            { ?>
            <fieldset id="jg_addresses">
                <legend style="font-size: 10pt;"><?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_FORM_ADDRESSES'); ?></legend>
                <table class="admintable">
                    <tr id="jg_addresses_header">
                        <td>
                        </td>
                        <td class="<?php echo ($this->params->get('required_address_street','1')=='0'&&!$this->application->street)?$required_class:''; ?>" style="font-size: 8pt; text-align: center;">
                                <?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_FORM_STREET'); ?>
                                <?php echo ($this->params->get('required_address_street','1')=='0')?'*':''; ?>:
                        </td>
                        <td class="<?php echo ($this->params->get('required_address_city','1')=='0'&&!$this->application->city)?$required_class:''; ?>" style="font-size: 8pt; text-align: center;">
                                <?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_FORM_CITY'); ?>
                                <?php echo ($this->params->get('required_address_city','1')=='0')?'*':''; ?>:
                        </td>
                        <td class="<?php echo ($this->params->get('required_address_state','1')=='0'&&!$this->application->state)?$required_class:''; ?>" style="font-size: 8pt; text-align: center;">
                                <?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_FORM_STATE'); ?>
                                <?php echo ($this->params->get('required_address_state','1')=='0')?'*':''; ?>:
                        </td>
                        <td class="<?php echo ($this->params->get('required_address_zip_code','1')=='0'&&!$this->application->zip_code)?$required_class:''; ?>" style="font-size: 8pt; text-align: center;">
                                <?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_FORM_ZIP_CODE'); ?>
                                <?php echo ($this->params->get('required_address_zip_code','1')=='0')?'*':''; ?>:
                        </td>
                        <td class="<?php echo ($this->params->get('required_address_from_date','1')=='0'&&!$this->application->from_date)?$required_class:''; ?>" style="font-size: 8pt; text-align: center;">
                                <?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_FORM_ADDRESS_SINCE'); ?>
                                <?php echo ($this->params->get('required_address_from_date','1')=='0')?'*':''; ?>:
                        </td>
                        <td style="font-size: 8pt; text-align: center;">
                                <?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_FORM_ADDRESS_TO'); ?>:
                        </td>
                    </tr>
                    <?php if ($this->params->get('addresses_current','1') == '1') { ?>
                    <tr id="jg_addresses_current">
                        <td width="100" align="right" class="key" style="border: 0px; font-size: 8pt;">
                                <?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_FORM_CURRENT_ADDRESS'); ?>
                                <?php echo ($this->params->get('required_address_street','1')=='0'||
                                                                            $this->params->get('required_address_city','1')=='0'||
                                                                            $this->params->get('required_address_state','1')=='0'||
                                                                            $this->params->get('required_address_zip_code','1')=='0'||
                                                                            $this->params->get('required_address_from_date','1')=='0')?'*':''; ?>:
                        </td>
                        <td>
                            <input class="text_area<?php echo ($this->params->get('required_address_street','1')=='0'&&!$this->application->street)?$required_class:''; ?>" type="text" name="street" id="street" size="30" maxlength="250" value = "<?php if (isset($this->application)) echo $this->application->street;?>" />
                        </td>
                        <td>
                            <input class="text_area<?php echo ($this->params->get('required_address_city','1')=='0'&&!$this->application->city)?$required_class:''; ?>" type="text" name="city" id="city" size="8" maxlength="20" value = "<?php if (isset($this->application)) echo $this->application->city;?>" />
                        </td>
                        <td>
                            <input class="text_area<?php echo ($this->params->get('required_address_state','1')=='0'&&!$this->application->state)?$required_class:''; ?>" type="text" name="state" id="state" size="8" maxlength="20" value = "<?php if (isset($this->application)) echo $this->application->state;?>" />
                        </td>
                        <td>
                            <input class="text_area<?php echo ($this->params->get('required_address_zip_code','1')=='0'&&!$this->application->zip_code)?$required_class:''; ?>" type="text" name="zip_code" id="zip_code" size="8" maxlength="20" value = "<?php if (isset($this->application)) echo $this->application->zip_code;?>" />
                        </td>
                        <td>
                            <input class="text_area<?php echo ($this->params->get('required_address_from_date','1')=='0'&&!$this->application->from_date)?$required_class:''; ?>" type="text" name="from_date" id="from_date" size="8" maxlength="10" value = "<?php if (isset($this->application)) echo $this->application->from_date;?>" />
                        </td>
                        <td>
                        </td>
                    </tr>
                    <?php } ?>
                    <?php if ($this->params->get('addresses_1','1') == '1') { ?>
                    <tr id="jg_addresses_address1">
                        <td width="100" align="right" class="key" style="border: 0px; font-size: 8pt;">
                                <?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_FORM_PRIOR_ADDRESS'); ?>:
                        </td>
                        <td>
                            <input class="text_area" type="text" name="street1" id="street1" size="30" maxlength="250" value = "<?php if (isset($this->application)) echo $this->application->street1;?>" />
                        </td>
                        <td>
                            <input class="text_area" type="text" name="city1" id="city1" size="8" maxlength="20" value = "<?php if (isset($this->application)) echo $this->application->city1;?>" />
                        </td>
                        <td>
                            <input class="text_area" type="text" name="state1" id="state1" size="8" maxlength="20" value = "<?php if (isset($this->application)) echo $this->application->state1;?>" />
                        </td>
                        <td>
                            <input class="text_area" type="text" name="zip_code1" id="zip_code1" size="8" maxlength="20" value = "<?php if (isset($this->application)) echo $this->application->zip_code1;?>" />
                        </td>
                        <td>
                            <input class="text_area" type="text" name="from_date1" id="from_date1" size="8" maxlength="10" value = "<?php if (isset($this->application)) echo $this->application->from_date1;?>" />
                        </td>
                        <td>
                            <input class="text_area" type="text" name="to_date1" id="to_date1" size="8" maxlength="10" value = "<?php if (isset($this->application)) echo $this->application->to_date1;?>" />
                        </td>
                    </tr>
                    <?php } ?>
                    <?php if ($this->params->get('addresses_2','1') == '1') { ?>
                    <tr id="jg_addresses_address2">
                        <td width="100" align="right" class="key" style="border: 0px; font-size: 8pt;">
                                <?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_FORM_PRIOR_ADDRESS'); ?>:
                        </td>
                        <td>
                            <input class="text_area" type="text" name="street2" id="street2" size="30" maxlength="250" value = "<?php if (isset($this->application)) echo $this->application->street2;?>" />
                        </td>
                        <td>
                            <input class="text_area" type="text" name="city2" id="city2" size="8" maxlength="20" value = "<?php if (isset($this->application)) echo $this->application->city2;?>" />
                        </td>
                        <td>
                            <input class="text_area" type="text" name="state2" id="state2" size="8" maxlength="20" value = "<?php if (isset($this->application)) echo $this->application->state2;?>" />
                        </td>
                        <td>
                            <input class="text_area" type="text" name="zip_code2" id="zip_code2" size="8" maxlength="20" value = "<?php if (isset($this->application)) echo $this->application->zip_code2;?>" />
                        </td>
                        <td>
                            <input class="text_area" type="text" name="from_date2" id="from_date2" size="8" maxlength="10" value = "<?php if (isset($this->application)) echo $this->application->from_date2;?>" />
                        </td>
                        <td>
                            <input class="text_area" type="text" name="to_date2" id="to_date2" size="8" maxlength="10" value = "<?php if (isset($this->application)) echo $this->application->to_date2;?>" />
                        </td>
                    </tr>
                    <?php } ?>
                </table>
            </fieldset>
            <?php } ?>
            <?php if ($this->params->get('education','1') == '1')
            { ?>
            <fieldset id="jg_education">
                <legend style="font-size: 10pt;"><?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_FORM_EDUCATION'); ?></legend>
                <table class="admintable">
                    <tr id="jg_education_headers">
                        <td>
                        </td>
                        <td style="font-size: 8pt; text-align: center;">
                                <?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_FORM_SCHOOL_ATTENDED'); ?>:
                        </td>
                        <td style="font-size: 8pt; text-align: center;">
                                <?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_FORM_CITY'); ?>:
                        </td>
                        <td style="font-size: 8pt; text-align: center;">
                                <?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_FORM_STATE'); ?>:
                        </td>
                        <td style="font-size: 8pt; text-align: center;">
                                <?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_FORM_DIPLOMA'); ?>:
                        </td>
                        <td style="font-size: 8pt; text-align: center;">
                                <?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_FORM_DEGREE_CERT'); ?>:
                        </td>
                        <td style="font-size: 8pt; text-align: center;">
                                <?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_FORM_AREA_OF_STUDY'); ?>
                        </td>
                    </tr>
                    <?php if ($this->params->get('education_high','1') == '1') { ?>
                    <tr id="jg_education_highschool">
                        <td width="100" align="right" class="key" style="border: 0px; font-size: 8pt;">
                                <?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_FORM_HIGH_SCHOOL'); ?>:
                        </td>
                        <td>
                            <input class="text_area" type="text" name="school" id="school" size="25" maxlength="250" value = "<?php if (isset($this->application)) echo $this->application->school;?>" />
                        </td>
                        <td>
                            <input class="text_area" type="text" name="school_city" id="school_city" size="10" maxlength="250" value = "<?php if (isset($this->application)) echo $this->application->school_city;?>" />
                        </td>
                        <td>
                            <input class="text_area" type="text" name="school_state" id="school_state" size="4" maxlength="250" value = "<?php if (isset($this->application)) echo $this->application->school_state;?>" />
                        </td>
                        <td width="100" style="font-size: 8pt; text-align: center;">
                                <?php
                                echo $this->options['school_diploma'];
                                ?>
                        </td>
                        <td style="font-size: 8pt; text-align: center;">
                                <?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_FORM_GED'); ?>
                        </td>
                        <td>
                        </td>
                    </tr>
                    <?php } ?>
                    <?php if ($this->params->get('education_undergrad','1') == '1') { ?>
                    <tr id="jg_education_undergrad">
                        <td width="100" align="right" class="key" style="border: 0px; font-size: 8pt;">
                                <?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_FORM_UNDERGRAD_SCHOOL'); ?>:
                        </td>
                        <td>
                            <input class="text_area" type="text" name="school1" id="school1" size="25" maxlength="250" value = "<?php if (isset($this->application)) echo $this->application->school1;?>" />
                        </td>
                        <td>
                            <input class="text_area" type="text" name="school_city1" id="school_city1" size="10" maxlength="250" value = "<?php if (isset($this->application)) echo $this->application->school_city1;?>" />
                        </td>
                        <td>
                            <input class="text_area" type="text" name="school_state1" id="school_state1" size="4" maxlength="250" value = "<?php if (isset($this->application)) echo $this->application->school_state1;?>" />
                        </td>
                        <td width="100" style="font-size: 8pt; text-align: center;">
                                <?php
                                echo $this->options['school_diploma1'];
                                ?>
                        </td>
                        <td>
                            <input  class="text_area<?php echo ($this->application->school_diploma1=='1'&&!$this->application->diploma_text1)?$required_class:''; ?>" type="text" name="diploma_text1" id="diploma_text1" size="8" maxlength="250" value = "<?php if (isset($this->application)) echo $this->application->diploma_text1;?>" />
                        </td>
                        <td>
                            <input class="text_area<?php echo ($this->application->school_diploma1=='1'&&!$this->application->study_area1)?$required_class:''; ?>" type="text" name="study_area1" id="study_area1" size="8" maxlength="250" value = "<?php if (isset($this->application)) echo $this->application->study_area1;?>" />
                        </td>
                    </tr>
                    <?php } ?>
                    <?php if ($this->params->get('education_grad','1') == '1') { ?>
                    <tr id="jg_education_gradschool">
                        <td width="100" align="right" class="key" style="border: 0px; font-size: 8pt;">
                                <?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_FORM_GRAD_SCHOOL'); ?>:
                        </td>
                        <td>
                            <input class="text_area" type="text" name="school2" id="school2" size="25" maxlength="250" value = "<?php if (isset($this->application)) echo $this->application->school2;?>" />
                        </td>
                        <td>
                            <input class="text_area" type="text" name="school_city2" id="school_city2" size="10" maxlength="250" value = "<?php if (isset($this->application)) echo $this->application->school_city2;?>" />
                        </td>
                        <td>
                            <input class="text_area" type="text" name="school_state2" id="school_state2" size="4" maxlength="250" value = "<?php if (isset($this->application)) echo $this->application->school_state2;?>" />
                        </td>
                        <td width="100" style="font-size: 8pt; text-align: center;">
                                <?php
                                echo $this->options['school_diploma2'];
                                ?>
                        </td>
                        <td>
                            <input class="text_area<?php echo ($this->application->school_diploma2=='1'&&!$this->application->diploma_text2)?$required_class:''; ?>" type="text" name="diploma_text2" id="diploma_text2" size="8" maxlength="250" value = "<?php if (isset($this->application)) echo $this->application->diploma_text2;?>" />
                        </td>
                        <td>
                            <input class="text_area<?php echo ($this->application->school_diploma2=='1'&&!$this->application->study_area2)?$required_class:''; ?>" type="text" name="study_area2" id="study_area2" size="8" maxlength="250" value = "<?php if (isset($this->application)) echo $this->application->study_area2;?>" />
                        </td>
                    </tr>
                    <?php } ?>
                    <?php if ($this->params->get('education_other','1') == '1') { ?>
                    <tr id="jg_education_otherschool">
                        <td width="100" align="right" class="key" style="border: 0px; font-size: 8pt;">
                                <?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_FORM_OTHER_SCHOOL'); ?>:
                        </td>
                        <td>
                            <input class="text_area" type="text" name="school3" id="school3" size="25" maxlength="250" value = "<?php if (isset($this->application)) echo $this->application->school3;?>" />
                        </td>
                        <td>
                            <input class="text_area" type="text" name="school_city3" id="school_city3" size="10" maxlength="250" value = "<?php if (isset($this->application)) echo $this->application->school_city3;?>" />
                        </td>
                        <td>
                            <input class="text_area" type="text" name="school_state3" id="school_state3" size="4" maxlength="250" value = "<?php if (isset($this->application)) echo $this->application->school_state3;?>" />
                        </td>
                        <td width="100" style="display: block; font-size: 8pt; text-align: center;">
                                <?php
                                echo $this->options['school_diploma3'];
                                ?>
                        </td>
                        <td>
                            <input class="text_area<?php echo ($this->application->school_diploma3=='1'&&!$this->application->diploma_text3)?$required_class:''; ?>" type="text" name="diploma_text3" id="diploma_text3" size="8" maxlength="250" value = "<?php if (isset($this->application)) echo $this->application->diploma_text3;?>" />
                        </td>
                        <td>
                            <input class="text_area<?php echo ($this->application->school_diploma3=='1'&&!$this->application->study_area3)?$required_class:''; ?>" type="text" name="study_area3" id="study_area3" size="8" maxlength="250" value = "<?php if (isset($this->application)) echo $this->application->study_area3;?>" />
                        </td>
                    </tr>
                    <?php } ?>
                </table>
            </fieldset>
            <?php } ?>
            <?php if ($this->params->get('employment_information','1') == '1')
            { ?>
            <fieldset>
                <legend style="font-size: 10pt;"><?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_FORM_EMPLOYMENT_INFORMATION'); ?></legend>
                <table class="admintable">
                    <tr>
                        <td width="100" align="right" class="key" style="border: 0px; font-size: 8pt;">
                                <?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_FORM_POSITION_APPLIED_FOR'); ?>:
                        </td>
                        <td>
                            <input class="jg_input" type="text" name="position" id="position" size="15" maxlength="250" value = "<?php
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
                        <td width="100" align="right" class="key" style="border: 0px; font-size: 8pt;">
                                <?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_FORM_DATE_YOU_CAN_START'); ?>:
                        </td>
                        <td>
                            <!--<input class="text_area" type="text" name="available_date" id="available_date" size="8" maxlength="250" value = "<?php if (isset($this->application)) echo $this->application->available_date;?>" />-->
                            <?php echo JHTML::calendar(isset($this->application->available_date)?$this->application->available_date:'','available_date','available_date'); ?>&nbsp;(yyyy-mm-dd)
                        </td>
                        <td width="100" align="right" class="key" style="border: 0px; font-size: 8pt;">
                                <?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_FORM_DESIRED_SALARY'); ?>:&nbsp;<?php 
                                echo $this->params->get('employment_information_currency',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_FORM_CURRENCY_SYMBOL')); ?>
                        </td>
                        <td style="font-size: 8pt; text-align: center;">
                            <input class="text_area" type="text" name="desired_pay" id="desired_pay" size="8" maxlength="250" value = "<?php if (isset($this->application)) echo $this->application->desired_pay;?>" />
                        </td>
                    </tr>
                </table>
                <table class="admintable">
                    <tr>
                        <td width="100" valign="top" align="right" class="key" style="border: 0px; font-size: 8pt;">
                                <?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_FORM_DO_YOU_PREFER'); ?>:
                        </td>
                        <td valign="top" >
                                <?php
                                echo $this->options['work_preferences'];
                                ?>
                        </td>
                        <td width="80" valign="top" align="right" class="key" style="border: 0px; font-size: 8pt;">
                                <?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_FORM_CAN_YOU_WORK'); ?>:
                        </td>
                        <td width="80" valign="top" align="left" class="key" style="border: 0px; font-size: 8pt;">
                            <input type="checkbox" name="weekends" id="weekends" class="inputbox" value="1" <?php if (isset($this->application))
                                       { if ( '1' == $this->application->weekends ) echo "checked "; } ?> />&nbsp;<?php
                                       echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_FORM_WEEKENDS');
                                       ?><br />
                            <input type="checkbox" name="evenings" id="evenings" class="inputbox" value="1" <?php if (isset($this->application))
                                       { if ( '1' == $this->application->evenings ) echo "checked "; } ?> />&nbsp;<?php
                                       echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_FORM_EVENINGS');
                                       ?>
                        </td>
                        <td width="80" valign="top" align="center" class="key" style="border: 0px; font-size: 8pt;">
                                <?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_FORM_AVAILABLE'); ?>:
                        </td>
                        <td align="right" valign="top" class="key" style="border: 0px; font-size: 8pt;">
                            <input type="checkbox" name="monday" id="monday" class="inputbox" value="1" <?php if (isset($this->application))
                                       { if ( '1' == $this->application->monday ) echo "checked "; } ?> /><?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_FORM_MONDAY_ABBR'); ?>
                            <input type="checkbox" name="tuesday" id="tuesday" class="inputbox" value="1" <?php if (isset($this->application))
                                       { if ( '1' == $this->application->tuesday ) echo "checked "; } ?> /><?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_FORM_TUESDAY_ABBR'); ?>
                            <input type="checkbox" name="wednesday" id="wednesday" class="inputbox" value="1" <?php if (isset($this->application))
                                       { if ( '1' == $this->application->wednesday ) echo "checked "; } ?> /><?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_FORM_WEDNESDAY_ABBR'); ?>
                            <input type="checkbox" name="thursday" id="thursday" class="inputbox" value="1" <?php if (isset($this->application))
                                       { if ( '1' == $this->application->thursday ) echo "checked "; } ?> /><?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_FORM_THURSDAY_ABBR'); ?>
                            <input type="checkbox" name="friday" id="friday" class="inputbox" value="1" <?php if (isset($this->application))
                                       { if ( '1' == $this->application->friday ) echo "checked "; } ?> /><?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_FORM_FRIDAY_ABBR'); ?>
                            <input type="checkbox" name="saturday" id="saturday" class="inputbox" value="1" <?php if (isset($this->application))
                                       { if ( '1' == $this->application->saturday ) echo "checked "; } ?> /><?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_FORM_SATURDAY_ABBR'); ?>
                            <input type="checkbox" name="sunday" id="sunday" class="inputbox" value="1" <?php if (isset($this->application))
                                       { if ( '1' == $this->application->sunday ) echo "checked "; } ?> /><?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_FORM_SUNDAY_ABBR'); ?>
                        </td>
                    </tr>
                </table>
                <table>
                    <tr>
                        <td width="100" valign="top" align="right" class="key" style="border: 0px; font-size: 8pt;">
                                <?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_FORM_NOT_AVAILABLE'); ?>:
                        </td>
                        <td>
                            <input class="text_area" type="text" name="unavailability" id="unavailability" size="80" maxlength="250" value = "<?php if (isset($this->application)) echo $this->application->unavailability;?>" />
                        </td>
                    </tr>
                </table>
                <table>
                    <tr>
                        <td>
                        </td>
                        <td colspan="2" style="font-size: 8pt; text-align: left;">
                            <strong><?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_FORM_FOLLOWING_QUESTIONS'); ?></strong>
                        </td>
                    </tr>
                        <?php $question_number = 1; ?>
                        <?php if ($this->params->get('employment_information_question_1','1') == '1')
                        { ?>
                    <tr>
                        <td valign="top" width="50" align="right" class="key" style="border: 0px; font-size: 8pt;">
                                    <?php echo $question_number; $question_number++; ?>.
                        </td>
                        <td valign="top" align="left" class="key" style="border: 0px; font-size: 8pt;">
                                    <?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_FORM_QUESTION_1'); ?>
                        </td>
                        <td valign="top" width="100">
                                    <?php echo $this->options['eligible']; ?>
                        </td>
                    </tr>
                        <?php } ?>
                        <?php if ($this->params->get('employment_information_question_2','1') == '1')
                        { ?>
                    <tr>
                        <td width="50" valign="top" align="right" class="key" style="border: 0px; font-size: 8pt;">
                                    <?php echo $question_number; $question_number++; ?>.
                        </td>
                        <td valign="top" align="left" class="key" style="border: 0px; font-size: 8pt;">
                                    <?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_FORM_QUESTION_2'); ?>
                        </td>
                        <td valign="top" width="100">
                                    <?php echo $this->options['worked_here_before']; ?>
                        </td>
                    </tr>
                    <tr>
                        <td width="50" valign="top" align="right" class="key" style="border: 0px; font-size: 8pt;">

                        </td>
                        <td colspan="2" valign="top" align="left" class="key" style="border: 0px; font-size: 8pt;">
                                    <?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_FORM_QUESTION_2_FOLLOWUP'); ?>
                            <input class="text_area<?php echo ($this->application->worked_here_before==$this->params->get('force_question_2_followup','1')&&!$this->application->worked_here_text)?$required_class:''; ?>" type="text" name="worked_here_text" id="worked_here_text" size="50" maxlength="250" value = "<?php if (isset($this->application)) echo $this->application->worked_here_text;?>" />
                        </td>
                    </tr>
                        <?php } ?>
                        <?php if ($this->params->get('employment_information_question_3','1') == '1')
                        { ?>
                    <tr>
                        <td width="50" valign="top" align="right" class="key" style="border: 0px; font-size: 8pt;">
                                    <?php echo $question_number; $question_number++; ?>.
                        </td>
                        <td valign="top" align="left" class="key" style="border: 0px; font-size: 8pt;">
                                    <?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_FORM_QUESTION_3'); ?>
                        </td>
                        <td valign="top" width="100">
                                    <?php echo $this->options['job_desc_received']; ?>
                        </td>
                    </tr>
                        <?php } ?>
                        <?php if ($this->params->get('employment_information_question_4','1') == '1')
                        { ?>
                    <tr>
                        <td width="50" valign="top" align="right" class="key" style="border: 0px; font-size: 8pt;">
                                    <?php echo $question_number; $question_number++; ?>.
                        </td>
                        <td valign="top" align="left" class="key" style="border: 0px; font-size: 8pt;">
                                    <?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_FORM_QUESTION_4'); ?>
                        </td>
                        <td valign="top" width="100">
                                    <?php echo $this->options['understand_reqs']; ?>
                        </td>
                    </tr>
                    <tr>
                        <td width="50" valign="top" align="right" class="key" style="border: 0px; font-size: 8pt;">

                        </td>
                        <td colspan="2" valign="top" align="left" class="key" style="border: 0px; font-size: 8pt;">
                                    <?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_FORM_QUESTION_4_FOLLOWUP'); ?>
                            <input class="text_area<?php echo ($this->application->understand_reqs==$this->params->get('force_question_4_followup','0')&&!$this->application->no_understand_reqs)?$required_class:''; ?>" type="text" name="no_understand_reqs" id="no_understand_reqs" size="50" maxlength="250" value = "<?php if (isset($this->application)) echo $this->application->no_understand_reqs;?>" />
                        </td>
                    </tr>
                        <?php } ?>
                        <?php if ($this->params->get('employment_information_question_5','1') == '1')
                        { ?>
                    <tr>
                        <td width="50" valign="top" align="right" class="key" style="border: 0px; font-size: 8pt;">
                                    <?php echo $question_number; $question_number++; ?>.
                        </td>
                        <td valign="top" align="left" class="key" style="border: 0px; font-size: 8pt;">
                                    <?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_FORM_QUESTION_5'); ?>
                        </td>
                        <td valign="top" width="100">
                                    <?php echo $this->options['on_layoff']; ?>
                        </td>
                    </tr>
                        <?php } ?>
                        <?php if ($this->params->get('employment_information_question_6','1') == '1')
                        { ?>
                    <tr>
                        <td width="50" valign="top" align="right" class="key" style="border: 0px; font-size: 8pt;">
                                    <?php echo $question_number; $question_number++; ?>.
                        </td>
                        <td valign="top" align="left" class="key" style="border: 0px; font-size: 8pt;">
                                    <?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_FORM_QUESTION_6'); ?>
                        </td>
                        <td valign="top" width="100">
                                    <?php echo $this->options['conf_agreement']; ?>
                        </td>
                    </tr>
                    <tr>
                        <td width="50" valign="top" align="right" class="key" style="border: 0px; font-size: 8pt;">

                        </td>
                        <td colspan="2" valign="top" align="left" class="key" style="border: 0px; font-size: 8pt;">
                                    <?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_FORM_QUESTION_6_FOLLOWUP'); ?>
                            <input class="text_area<?php echo ($this->application->conf_agreement==$this->params->get('force_question_6_followup','1')&&!$this->application->conf_explain)?$required_class:''; ?>" type="text" name="conf_explain" id="conf_explain" size="50" maxlength="250" value = "<?php if (isset($this->application)) echo $this->application->conf_explain;?>" />
                        </td>
                    </tr>
                        <?php } ?>
                        <?php if ($this->params->get('employment_information_question_7','1') == '1')
                        { ?>
                    <tr>
                        <td width="50" valign="top" align="right" class="key" style="border: 0px; font-size: 8pt;">
                                    <?php echo $question_number; $question_number++; ?>.
                        </td>
                        <td valign="top" align="left" class="key" style="border: 0px; font-size: 8pt;">
                                    <?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_FORM_QUESTION_7'); ?>
                        </td>
                        <td valign="top" width="100">
                                    <?php echo $this->options['discharged']; ?>
                        </td>
                    </tr>
                    <tr>
                        <td width="50" valign="top" align="right" class="key" style="border: 0px; font-size: 8pt;">

                        </td>
                        <td colspan="2" valign="top" align="left" class="key" style="border: 0px; font-size: 8pt;">
                                    <?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_FORM_QUESTION_7_FOLLOWUP'); ?>
                            <input class="text_area<?php echo (($this->application->discharged==$this->params->get('force_question_7_followup','1'))&&!$this->application->discharge_explain)?$required_class:''; ?>" type="text" name="discharge_explain" id="discharge_explain" size="50" maxlength="250" value = "<?php if (isset($this->application)) echo $this->application->discharge_explain;?>" />
                        </td>
                    </tr>
                        <?php } ?>
                        <?php if ($this->params->get('employment_information_question_8','1') == '1')
                        { ?>
                    <tr>
                        <td width="50" valign="top" align="right" class="key" style="border: 0px; font-size: 8pt;">
                                    <?php echo $question_number; $question_number++; ?>.
                        </td>
                        <td valign="top" align="left" class="key" style="border: 0px; font-size: 8pt;">
                                    <?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_FORM_QUESTION_8'); ?>
                        </td>
                        <td valign="top" width="100">
                                    <?php echo $this->options['convict']; ?>
                        </td>
                    </tr>
                    <tr>
                        <td width="50" valign="top" align="right" class="key" style="border: 0px; font-size: 8pt;">

                        </td>
                        <td colspan="2" valign="top" align="left" class="key" style="border: 0px; font-size: 8pt;">
                                    <?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_FORM_QUESTION_8_FOLLOWUP'); ?>
                            <input class="text_area<?php echo ($this->application->convict==$this->params->get('force_question_8_followup','1')&&!$this->application->convict_explain)?$required_class:''; ?>" type="text" name="convict_explain" id="convict_explain" size="50" maxlength="250" value = "<?php if (isset($this->application)) echo $this->application->convict_explain;?>" />
                        </td>
                    </tr>
                        <?php } ?>
                </table>
            </fieldset>
            <?php } ?>
            <?php if ($this->params->get('employment_history','1') == '1') { ?>
            <fieldset>
                <legend style="font-size: 10pt;"><?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_FORM_EMPLOYMENT_HISTORY'); ?></legend>
                <table width="100%" class="admintable">
                    <?php  if ($this->params->get('employment_history_contact_current_employer','1') == '1') { ?>
                    <tr>
                        <td valign="top" align="left" class="key" style="border: 0px; font-size: 8pt;">
                                <?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_FORM_CONTACT_EMPLOYER'); ?>
                        </td>
                        <td align="center" valign="top" width="100">
                                <?php echo $this->options['contact_emp']; ?>
                        </td>
                    </tr>
                    <?php } ?>
                    <tr>
                        <td colspan="2" style="font-size: 8pt; text-align: left;">
                            <strong><?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_FORM_CONTACT_EMPLOYER_TEXT'); ?>:</strong>
                        </td>
                    </tr>
                </table>
                <table class="admintable">
                    <tr>
                        <td>
                        </td>
                        <?php if ($this->params->get('employment_history_recent','1') == '1') { ?>
                        <td style="font-size: 8pt; text-align: center;">
                                <?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_FORM_MOST_RECENT_EMPLOYER'); ?>
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
                        <?php } ?>
                        <?php if ($this->params->get('employment_history_1','1') == '1') { ?>
                        <td style="font-size: 8pt; text-align: center;">
                                <?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_FORM_PRIOR_EMPLOYER'); ?>&nbsp;(1)
                        </td>
                        <?php } ?>
                        <?php if ($this->params->get('employment_history_2','1') == '1') { ?>
                        <td style="font-size: 8pt; text-align: center;">
                                <?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_FORM_PRIOR_EMPLOYER'); ?>&nbsp;(2)
                        </td>
                        <?php } ?>
                        <?php if ($this->params->get('employment_history_3','1') == '1') { ?>
                        <td style="font-size: 8pt; text-align: center;">
                                <?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_FORM_PRIOR_EMPLOYER'); ?>&nbsp;(3)
                        </td>
                        <?php } ?>
                    </tr>
                    <tr>
                        <td width="100" valign="top" align="right" class="key<?php echo ($this->params->get('required_employment_history_employer','1')=='0'&&!$this->application->employer)?$required_class:''; ?>" style="border: 0px; font-size: 8pt;">
                                <?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_FORM_EMPLOYER'); ?>
                                <?php echo ($this->params->get('required_employment_history_employer','1')=='0')?'*':''; ?>:
                        </td>
                        <?php if ($this->params->get('employment_history_recent','1') == '1') { ?>
                        <td>
                            <input class="text_area<?php echo ($this->params->get('required_employment_history_employer','1')=='0'&&!$this->application->employer)?$required_class:''; ?>" type="text" name="employer" id="employer" size="18" maxlength="250" value = "<?php if (isset($this->application)) echo $this->application->employer;?>" />
                        </td>
                        <?php } ?>
                        <?php if ($this->params->get('employment_history_1','1') == '1') { ?>
                        <td>
                            <input class="text_area" type="text" name="employer1" id="employer1" size="18" maxlength="250" value = "<?php if (isset($this->application)) echo $this->application->employer1;?>" />
                        </td>
                        <?php } ?>
                        <?php if ($this->params->get('employment_history_2','1') == '1') { ?>
                        <td>
                            <input class="text_area" type="text" name="employer2" id="employer2" size="18" maxlength="250" value = "<?php if (isset($this->application)) echo $this->application->employer2;?>" />
                        </td>
                        <?php } ?>
                        <?php if ($this->params->get('employment_history_3','1') == '1') { ?>
                        <td>
                            <input class="text_area" type="text" name="employer3" id="employer3" size="18" maxlength="250" value = "<?php if (isset($this->application)) echo $this->application->employer3;?>" />
                        </td>
                        <?php } ?>
                    </tr>
                    <tr>
                        <td width="100" valign="top" align="right" class="key<?php echo ($this->params->get('required_employment_history_city','1')=='0'&&!$this->application->employer_city)?$required_class:''; ?>" style="border: 0px; font-size: 8pt;">
                                <?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_FORM_CITY'); ?>
                                <?php echo ($this->params->get('required_employment_history_city','1')=='0')?'*':''; ?>:
                        </td>
                        <?php if ($this->params->get('employment_history_recent','1') == '1') { ?>
                        <td>
                            <input class="text_area<?php echo ($this->params->get('required_employment_history_city','1')=='0'&&!$this->application->employer_city)?$required_class:''; ?>" type="text" name="employer_city" id="employer_city" size="18" maxlength="250" value = "<?php if (isset($this->application)) echo $this->application->employer_city;?>" />
                        </td>
                        <?php } ?>
                        <?php if ($this->params->get('employment_history_1','1') == '1') { ?>
                        <td>
                            <input class="text_area" type="text" name="employer1_city" id="employer1_city" size="18" maxlength="250" value = "<?php if (isset($this->application)) echo $this->application->employer1_city;?>" />
                        </td>
                        <?php } ?>
                        <?php if ($this->params->get('employment_history_2','1') == '1') { ?>
                        <td>
                            <input class="text_area" type="text" name="employer2_city" id="employer2_city" size="18" maxlength="250" value = "<?php if (isset($this->application)) echo $this->application->employer2_city;?>" />
                        </td>
                        <?php } ?>
                        <?php if ($this->params->get('employment_history_3','1') == '1') { ?>
                        <td>
                            <input class="text_area" type="text" name="employer3_city" id="employer3_city" size="18" maxlength="250" value = "<?php if (isset($this->application)) echo $this->application->employer3_city;?>" />
                        </td>
                        <?php } ?>
                    </tr>
                    <tr>
                        <td width="100" valign="top" align="right" class="key<?php echo ($this->params->get('required_employment_history_state','1')=='0'&&!$this->application->employer_state)?$required_class:''; ?>" style="border: 0px; font-size: 8pt;">
                                <?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_FORM_STATE'); ?>
                                <?php echo ($this->params->get('required_employment_history_state','1')=='0')?'*':''; ?>:
                        </td>
                        <?php if ($this->params->get('employment_history_recent','1') == '1') { ?>
                        <td>
                            <input class="text_area<?php echo ($this->params->get('required_employment_history_state','1')=='0'&&!$this->application->employer_state)?$required_class:''; ?>" type="text" name="employer_state" id="employer_state" size="18" maxlength="250" value = "<?php if (isset($this->application)) echo $this->application->employer_state;?>" />
                        </td>
                        <?php } ?>
                        <?php if ($this->params->get('employment_history_1','1') == '1') { ?>
                        <td>
                            <input class="text_area" type="text" name="employer1_state" id="employer1_state" size="18" maxlength="250" value = "<?php if (isset($this->application)) echo $this->application->employer1_state;?>" />
                        </td>
                        <?php } ?>
                        <?php if ($this->params->get('employment_history_2','1') == '1') { ?>
                        <td>
                            <input class="text_area" type="text" name="employer2_state" id="employer2_state" size="18" maxlength="250" value = "<?php if (isset($this->application)) echo $this->application->employer2_state;?>" />
                        </td>
                        <?php } ?>
                        <?php if ($this->params->get('employment_history_3','1') == '1') { ?>
                        <td>
                            <input class="text_area" type="text" name="employer3_state" id="employer3_state" size="18" maxlength="250" value = "<?php if (isset($this->application)) echo $this->application->employer3_state;?>" />
                        </td>
                        <?php } ?>
                    </tr>
                    <tr>
                        <td width="100" valign="top" align="right" class="key<?php echo ($this->params->get('required_employment_history_zip_code','1')=='0'&&!$this->application->employer_zip)?$required_class:''; ?>" style="border: 0px; font-size: 8pt;">
                                <?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_FORM_ZIP_CODE'); ?>
                                <?php echo ($this->params->get('required_employment_history_zip_code','1')=='0')?'*':''; ?>:
                        </td>
                        <?php if ($this->params->get('employment_history_recent','1') == '1') { ?>
                        <td>
                            <input class="text_area<?php echo ($this->params->get('required_employment_history_zip_code','1')=='0'&&!$this->application->employer_zip)?$required_class:''; ?>" type="text" name="employer_zip" id="employer_zip" size="18" maxlength="250" value = "<?php if (isset($this->application)) echo $this->application->employer_zip;?>" />
                        </td>
                        <?php } ?>
                        <?php if ($this->params->get('employment_history_1','1') == '1') { ?>
                        <td>
                            <input class="text_area" type="text" name="employer1_zip" id="employer1_zip" size="18" maxlength="250" value = "<?php if (isset($this->application)) echo $this->application->employer1_zip;?>" />
                        </td>
                        <?php } ?>
                        <?php if ($this->params->get('employment_history_2','1') == '1') { ?>
                        <td>
                            <input class="text_area" type="text" name="employer2_zip" id="employer2_zip" size="18" maxlength="250" value = "<?php if (isset($this->application)) echo $this->application->employer2_zip;?>" />
                        </td>
                        <?php } ?>
                        <?php if ($this->params->get('employment_history_3','1') == '1') { ?>
                        <td>
                            <input class="text_area" type="text" name="employer3_zip" id="employer3_zip" size="18" maxlength="250" value = "<?php if (isset($this->application)) echo $this->application->employer3_zip;?>" />
                        </td>
                        <?php } ?>
                    </tr>
                    <tr>
                        <td width="100" valign="top" align="right" class="key<?php echo ($this->params->get('required_employment_history_phone','1')=='0'&&!$this->application->employer_phone)?$required_class:''; ?>" style="border: 0px; font-size: 8pt;">
                                <?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_FORM_PHONE'); ?>
                                <?php echo ($this->params->get('required_employment_history_phone','1')=='0')?'*':''; ?>:
                        </td>
                        <?php if ($this->params->get('employment_history_recent','1') == '1') { ?>
                        <td>
                            <input class="text_area<?php echo ($this->params->get('required_employment_history_phone','1')=='0'&&!$this->application->employer_phone)?$required_class:''; ?>" type="text" name="employer_phone" id="employer_phone" size="18" maxlength="250" value = "<?php if (isset($this->application)) echo $this->application->employer_phone;?>" />
                        </td>
                        <?php } ?>
                        <?php if ($this->params->get('employment_history_1','1') == '1') { ?>
                        <td>
                            <input class="text_area" type="text" name="employer1_phone" id="employer1_phone" size="18" maxlength="250" value = "<?php if (isset($this->application)) echo $this->application->employer1_phone;?>" />
                        </td>
                        <?php } ?>
                        <?php if ($this->params->get('employment_history_2','1') == '1') { ?>
                        <td>
                            <input class="text_area" type="text" name="employer2_phone" id="employer2_phone" size="18" maxlength="250" value = "<?php if (isset($this->application)) echo $this->application->employer2_phone;?>" />
                        </td>
                        <?php } ?>
                        <?php if ($this->params->get('employment_history_3','1') == '1') { ?>
                        <td>
                            <input class="text_area" type="text" name="employer3_phone" id="employer3_phone" size="18" maxlength="250" value = "<?php if (isset($this->application)) echo $this->application->employer3_phone;?>" />
                        </td>
                        <?php } ?>
                    </tr>
                    <tr>
                        <td width="100" valign="top" align="right" class="key<?php echo ($this->params->get('required_employment_history_position','1')=='0'&&!$this->application->employer_pos)?$required_class:''; ?>" style="border: 0px; font-size: 8pt;">
                                <?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_FORM_POSITION_HELD'); ?>
                                <?php echo ($this->params->get('required_employment_history_position','1')=='0')?'*':''; ?>:
                        </td>
                        <?php if ($this->params->get('employment_history_recent','1') == '1') { ?>
                        <td>
                            <input class="text_area<?php echo ($this->params->get('required_employment_history_position','1')=='0'&&!$this->application->employer_pos)?$required_class:''; ?>" type="text" name="employer_pos" id="employer_pos" size="18" maxlength="250" value = "<?php if (isset($this->application)) echo $this->application->employer_pos;?>" />
                        </td>
                        <?php } ?>
                        <?php if ($this->params->get('employment_history_1','1') == '1') { ?>
                        <td>
                            <input class="text_area" type="text" name="employer1_pos" id="employer1_pos" size="18" maxlength="250" value = "<?php if (isset($this->application)) echo $this->application->employer1_pos;?>" />
                        </td>
                        <?php } ?>
                        <?php if ($this->params->get('employment_history_2','1') == '1') { ?>
                        <td>
                            <input class="text_area" type="text" name="employer2_pos" id="employer2_pos" size="18" maxlength="250" value = "<?php if (isset($this->application)) echo $this->application->employer2_pos;?>" />
                        </td>
                        <?php } ?>
                        <?php if ($this->params->get('employment_history_3','1') == '1') { ?>
                        <td>
                            <input class="text_area" type="text" name="employer3_pos" id="employer3_pos" size="18" maxlength="250" value = "<?php if (isset($this->application)) echo $this->application->employer3_pos;?>" />
                        </td>
                        <?php } ?>
                    </tr>
                    <tr>
                        <td width="100" valign="top" align="right" class="key<?php echo ($this->params->get('required_employment_history_from','1')=='0'&&!$this->application->employer_from)?$required_class:''; ?>" style="border: 0px; font-size: 8pt;">
                                <?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_FORM_FROM_MYYYY'); ?>
                                <?php echo ($this->params->get('required_employment_history_from','1')=='0')?'*':''; ?>:
                        </td>
                        <?php if ($this->params->get('employment_history_recent','1') == '1') { ?>
                        <td>
                            <input class="text_area<?php echo ($this->params->get('required_employment_history_from','1')=='0'&&!$this->application->employer_from)?$required_class:''; ?>" type="text" name="employer_from" id="employer_from" size="18" maxlength="250" value = "<?php if (isset($this->application)) echo $this->application->employer_from;?>" />
                        </td>
                        <?php } ?>
                        <?php if ($this->params->get('employment_history_1','1') == '1') { ?>
                        <td>
                            <input class="text_area" type="text" name="employer1_from" id="employer1_from" size="18" maxlength="250" value = "<?php if (isset($this->application)) echo $this->application->employer1_from;?>" />
                        </td>
                        <?php } ?>
                        <?php if ($this->params->get('employment_history_2','1') == '1') { ?>
                        <td>
                            <input class="text_area" type="text" name="employer2_from" id="employer2_from" size="18" maxlength="250" value = "<?php if (isset($this->application)) echo $this->application->employer2_from;?>" />
                        </td>
                        <?php } ?>
                        <?php if ($this->params->get('employment_history_3','1') == '1') { ?>
                        <td>
                            <input class="text_area" type="text" name="employer3_from" id="employer3_from" size="18" maxlength="250" value = "<?php if (isset($this->application)) echo $this->application->employer3_from;?>" />
                        </td>
                        <?php } ?>
                    </tr>
                    <tr>
                        <td width="100" valign="top" align="right" class="key<?php echo ($this->params->get('required_employment_history_to','1')=='0'&&!$this->application->employer_to)?$required_class:''; ?>" style="border: 0px; font-size: 8pt;">
                                <?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_FORM_TO_MYYYY'); ?>
                                <?php echo ($this->params->get('required_employment_history_to','1')=='0')?'*':''; ?>:
                        </td>
                        <?php if ($this->params->get('employment_history_recent','1') == '1') { ?>
                        <td>
                            <input class="text_area<?php echo ($this->params->get('required_employment_history_to','1')=='0'&&!$this->application->employer_to)?$required_class:''; ?>" type="text" name="employer_to" id="employer_to" size="18" maxlength="250" value = "<?php if (isset($this->application)) echo $this->application->employer_to;?>" />
                        </td>
                        <?php } ?>
                        <?php if ($this->params->get('employment_history_1','1') == '1') { ?>
                        <td>
                            <input class="text_area" type="text" name="employer1_to" id="employer1_to" size="18" maxlength="250" value = "<?php if (isset($this->application)) echo $this->application->employer1_to;?>" />
                        </td>
                        <?php } ?>
                        <?php if ($this->params->get('employment_history_2','1') == '1') { ?>
                        <td>
                            <input class="text_area" type="text" name="employer2_to" id="employer2_to" size="18" maxlength="250" value = "<?php if (isset($this->application)) echo $this->application->employer2_to;?>" />
                        </td>
                        <?php } ?>
                        <?php if ($this->params->get('employment_history_3','1') == '1') { ?>
                        <td>
                            <input class="text_area" type="text" name="employer3_to" id="employer3_to" size="18" maxlength="250" value = "<?php if (isset($this->application)) echo $this->application->employer3_to;?>" />
                        </td>
                        <?php } ?>
                    </tr>
                    <tr>
                        <td width="100" valign="top" align="right" class="key<?php echo ($this->params->get('required_employment_history_pay','1')=='0'&&!$this->application->employer_pay)?$required_class:''; ?>" style="border: 0px; font-size: 8pt;">
                                <?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_FORM_PAY_UPON_LEAVING'); ?>
                                <?php echo ($this->params->get('required_employment_history_pay','1')=='0')?'*':''; ?>:
                        </td>
                        <?php if ($this->params->get('employment_history_recent','1') == '1') { ?>
                        <td>
                            <input class="text_area<?php echo ($this->params->get('required_employment_history_pay','1')=='0'&&!$this->application->employer_pay)?$required_class:''; ?>" type="text" name="employer_pay" id="employer_pay" size="18" maxlength="250" value = "<?php if (isset($this->application)) echo $this->application->employer_pay;?>" />
                        </td>
                        <?php } ?>
                        <?php if ($this->params->get('employment_history_1','1') == '1') { ?>
                        <td>
                            <input class="text_area" type="text" name="employer1_pay" id="employer1_pay" size="18" maxlength="250" value = "<?php if (isset($this->application)) echo $this->application->employer1_pay;?>" />
                        </td>
                        <?php } ?>
                        <?php if ($this->params->get('employment_history_2','1') == '1') { ?>
                        <td>
                            <input class="text_area" type="text" name="employer2_pay" id="employer2_pay" size="18" maxlength="250" value = "<?php if (isset($this->application)) echo $this->application->employer2_pay;?>" />
                        </td>
                        <?php } ?>
                        <?php if ($this->params->get('employment_history_3','1') == '1') { ?>
                        <td>
                            <input class="text_area" type="text" name="employer3_pay" id="employer3_pay" size="18" maxlength="250" value = "<?php if (isset($this->application)) echo $this->application->employer3_pay;?>" />
                        </td>
                        <?php } ?>
                    </tr>
                    <tr>
                        <td width="100" valign="top" align="right" class="key<?php echo ($this->params->get('required_employment_history_supervisor','1')=='0'&&!$this->application->employer_sup)?$required_class:''; ?>" style="border: 0px; font-size: 8pt;">
                                <?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_FORM_SUPERVISOR'); ?>
                                <?php echo ($this->params->get('required_employment_history_supervisor','1')=='0')?'*':''; ?>:
                        </td>
                        <?php if ($this->params->get('employment_history_recent','1') == '1') { ?>
                        <td>
                            <input class="text_area<?php echo ($this->params->get('required_employment_history_supervisor','1')=='0'&&!$this->application->employer_sup)?$required_class:''; ?>" type="text" name="employer_sup" id="employer_sup" size="18" maxlength="250" value = "<?php if (isset($this->application)) echo $this->application->employer_sup;?>" />
                        </td>
                        <?php } ?>
                        <?php if ($this->params->get('employment_history_1','1') == '1') { ?>
                        <td>
                            <input class="text_area" type="text" name="employer1_sup" id="employer1_sup" size="18" maxlength="250" value = "<?php if (isset($this->application)) echo $this->application->employer1_sup;?>" />
                        </td>
                        <?php } ?>
                        <?php if ($this->params->get('employment_history_2','1') == '1') { ?>
                        <td>
                            <input class="text_area" type="text" name="employer2_sup" id="employer2_sup" size="18" maxlength="250" value = "<?php if (isset($this->application)) echo $this->application->employer2_sup;?>" />
                        </td>
                        <?php } ?>
                        <?php if ($this->params->get('employment_history_3','1') == '1') { ?>
                        <td>
                            <input class="text_area" type="text" name="employer3_sup" id="employer3_sup" size="18" maxlength="250" value = "<?php if (isset($this->application)) echo $this->application->employer3_sup;?>" />
                        </td>
                        <?php } ?>
                    </tr>
                    <tr>
                        <td width="100" valign="top" align="right" class="key<?php echo ($this->params->get('required_employment_history_duties','1')=='0'&&!$this->application->employer_dut)?$required_class:''; ?>" style="border: 0px; font-size: 8pt;">
                                <?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_FORM_DUTIES'); ?>
                                <?php echo ($this->params->get('required_employment_history_duties','1')=='0')?'*':''; ?>:
                        </td>
                        <?php if ($this->params->get('employment_history_recent','1') == '1') { ?>
                        <td>
                            <input class="text_area<?php echo ($this->params->get('required_employment_history_duties','1')=='0'&&!$this->application->employer_dut)?$required_class:''; ?>" type="text" name="employer_dut" id="employer_dut" size="18" maxlength="250" value = "<?php if (isset($this->application)) echo $this->application->employer_dut;?>" />
                        </td>
                        <?php } ?>
                        <?php if ($this->params->get('employment_history_1','1') == '1') { ?>
                        <td>
                            <input class="text_area" type="text" name="employer1_dut" id="employer1_dut" size="18" maxlength="250" value = "<?php if (isset($this->application)) echo $this->application->employer1_dut;?>" />
                        </td>
                        <?php } ?>
                        <?php if ($this->params->get('employment_history_2','1') == '1') { ?>
                        <td>
                            <input class="text_area" type="text" name="employer2_dut" id="employer2_dut" size="18" maxlength="250" value = "<?php if (isset($this->application)) echo $this->application->employer2_dut;?>" />
                        </td>
                        <?php } ?>
                        <?php if ($this->params->get('employment_history_3','1') == '1') { ?>
                        <td>
                            <input class="text_area" type="text" name="employer3_dut" id="employer3_dut" size="18" maxlength="250" value = "<?php if (isset($this->application)) echo $this->application->employer3_dut;?>" />
                        </td>
                        <?php } ?>
                    </tr>
                    <tr>
                        <td width="100" valign="top" align="right" class="key<?php echo ($this->params->get('required_employment_history_reason','1')=='0'&&!$this->application->employer_leave)?$required_class:''; ?>" style="border: 0px; font-size: 8pt;">
                                <?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_FORM_REASON_FOR_LEAVING');?>
                                <?php echo ($this->params->get('required_employment_history_reason','1')=='0')?'*':''; ?>:
                        </td>
                        <?php if ($this->params->get('employment_history_recent','1') == '1') { ?>
                        <td>
                            <input class="text_area<?php echo ($this->params->get('required_employment_history_reason','1')=='0'&&!$this->application->employer_leave)?$required_class:''; ?>" type="text" name="employer_leave" id="employer_leave" size="18" maxlength="250" value = "<?php if (isset($this->application)) echo $this->application->employer_leave;?>" />
                        </td>
                        <?php } ?>
                        <?php if ($this->params->get('employment_history_1','1') == '1') { ?>
                        <td>
                            <input class="text_area" type="text" name="employer1_leave" id="employer1_leave" size="18" maxlength="250" value = "<?php if (isset($this->application)) echo $this->application->employer1_leave;?>" />
                        </td>
                        <?php } ?>
                        <?php if ($this->params->get('employment_history_2','1') == '1') { ?>
                        <td>
                            <input class="text_area" type="text" name="employer2_leave" id="employer2_leave" size="18" maxlength="250" value = "<?php if (isset($this->application)) echo $this->application->employer2_leave;?>" />
                        </td>
                        <?php } ?>
                        <?php if ($this->params->get('employment_history_3','1') == '1') { ?>
                        <td>
                            <input class="text_area" type="text" name="employer3_leave" id="employer3_leave" size="18" maxlength="250" value = "<?php if (isset($this->application)) echo $this->application->employer3_leave;?>" />
                        </td>
                        <?php } ?>
                    </tr>
                </table>
            </fieldset>
            <?php } ?>
            <?php $qcounter = 1; ?>
            <?php if ($this->params->get('job_related_skills','1') == '1')
            { ?>
            <fieldset>
                <legend style="font-size: 10pt;"><?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_FORM_JOB_RELATED_SKILLS'); ?></legend>
                <table class="admintable">
                    <?php if ($this->params->get('job_related_skills_q1','1') == '1' || 
                            $this->params->get('job_related_skills_q2','1') == '1' ||
                            $this->params->get('job_related_skills_q2_reason','1') == '1' ||
                            $this->params->get('job_related_skills_q3','1') == '1' ||
                            $this->params->get('job_related_skills_q3_reason','1') == '1' ||
                            $this->params->get('job_related_skills_states','1') == '1') : ?>
                    <?php if ($this->params->get('job_related_skills_text','1') == '1') : ?>
                    <tr>
                        <td>
                        </td>
                        <td colspan="2" style="font-size: 8pt; text-align: left;">
                            <strong><?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_FORM_VEHICLE_QUESTIONS'); ?>:</strong>
                        </td>
                    </tr>
                    <?php endif; ?>
                    <?php endif; ?>
                    <tr>
                        <td width="50" valign="top" align="right" class="key" style="border: 0px; font-size: 8pt;"><?php echo $qcounter; $qcounter++; ?>.</td>
                        <td valign="top" align="left" class="key" style="border: 0px; font-size: 8pt;">
                                <?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_FORM_VEHICLE_QUESTION_1'); ?>
                        </td>
                        <td valign="top" width="100">
                                <?php echo $this->options['driver_license']; ?>
                        </td>
                    </tr>
                    <tr>
                        <td width="50" valign="top" align="right" class="key" style="border: 0px; font-size: 8pt;">

                        </td>
                        <td colspan="2" valign="top" align="left" class="key" style="border: 0px; font-size: 8pt;">
                                <?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_FORM_VEHICLE_QUESTION_1_FOLLOWUP_A'); ?>:
                            <input class="text_area<?php echo ($this->application->driver_license==$this->params->get('force_vquestion_1_followup','1')&&!$this->application->dl_number)?$required_class:''; ?>" type="text" name="dl_number" id="dl_number" size="20" maxlength="250" value = "<?php if (isset($this->application)) echo $this->application->dl_number;?>" />
                                <?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_FORM_VEHICLE_QUESTION_1_FOLLOWUP_B'); ?>:
                            <input class="text_area<?php echo ($this->application->driver_license==$this->params->get('force_vquestion_1_followup','1')&&!$this->application->dl_issued)?$required_class:''; ?>" type="text" name="dl_issued" id="dl_issued" size="20" maxlength="250" value = "<?php if (isset($this->application)) echo $this->application->dl_issued;?>" />
                        </td>
                    </tr>
                    <tr>
                        <td width="50" valign="top" align="right" class="key" style="border: 0px; font-size: 8pt;"><?php echo $qcounter; $qcounter++; ?>.</td>
                        <td valign="top" align="left" class="key" style="border: 0px; font-size: 8pt;">
                                <?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_FORM_VEHICLE_QUESTION_2'); ?>
                        </td>
                        <td valign="top" width="100">
                                <?php echo $this->options['driving_offense']; ?>
                        </td>
                    </tr>
                    <tr>
                        <td width="50" valign="top" align="right" class="key" style="border: 0px; font-size: 8pt;"></td>
                        <td colspan="2" valign="top" align="left" class="key" style="border: 0px; font-size: 8pt;">
                            <?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_FORM_VEHICLE_QUESTION_2_FOLLOWUP'); ?>
                            <input class="text_area<?php echo ($this->application->driving_offense==$this->params->get('force_vquestion_2_followup','1')&&!$this->application->driving_offense_reason)?$required_class:''; ?>" type="text" name="driving_offense_reason" id="driving_offense_reason" size="50" maxlength="250" value="<?php if (isset($this->application)) echo $this->application->driving_offense_reason; ?>" />
                        </td>
                    </tr>
                    <tr>
                        <td width="50" valign="top" align="right" class="key" style="border: 0px; font-size: 8pt;"><?php echo $qcounter; $qcounter++; ?>.</td>
                        <td valign="top" align="left" class="key" style="border: 0px; font-size: 8pt;">
                                <?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_FORM_VEHICLE_QUESTION_3'); ?>
                        </td>
                        <td valign="top" width="100">
                                <?php echo $this->options['dl_modified']; ?>
                        </td>
                    </tr>
                    <tr>
                        <td width="50" valign="top" align="right" class="key" style="border: 0px; font-size: 8pt;"></td>
                        <td colspan="2" valign="top" align="left" class="key" style="border: 0px; font-size: 8pt;">
                            <?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_FORM_VEHICLE_QUESTION_3_FOLLOWUP'); ?>
                            <input class="text_area<?php echo ($this->application->dl_modified==$this->params->get('force_vquestion_3_followup','1')&&!$this->application->dl_modified_reason)?$required_class:''; ?>" type="text" name="dl_modified_reason" id="dl_modified_reason" size="50" maxlength="250" value="<?php if (isset($this->application)) echo $this->application->dl_modified_reason; ?>" />
                        </td>
                    </tr>
                    <tr>
                        <td width="50" align="right" class="key" style="border: 0px; font-size: 8pt;"><?php echo $qcounter; $qcounter++; ?>.</td>
                        <td colspan="2" align="left" class="key" style="border: 0px; font-size: 8pt;">
                                <?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_FORM_VEHICLE_STATES'); ?>:
                            <input class="text_area" type="text" name="dl_states" id="dl_states" size="40" maxlength="250" value = "<?php if (isset($this->application)) echo $this->application->dl_states;?>" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                        </td>
                        <td colspan="2" align="left" class="key" style="border: 0px; font-size: 8pt;">
                                <?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_FORM_OTHER_SKILLS'); ?>:
                            <textarea name="skills" rows="5" cols="75"><?php if (isset($this->application)) echo $this->application->skills; ?></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td>
                        </td>
                        <td colspan="2" align="left" class="key" style="border: 0px; font-size: 8pt;">
                                <?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_FORM_OTHER_CERTIFICATIONS'); ?><br/>
                            <textarea name="professional" rows="5" cols="75"><?php if (isset($this->application)) echo $this->application->professional; ?></textarea>
                        </td>
                    </tr>
                </table>
            </fieldset>
            <?php } ?>
            <?php if ($this->params->get('references','1') == '1')
            { ?>
            <fieldset>
                <legend style="font-size: 10pt;"><?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_FORM_REFERENCES'); ?></legend>
                <table class="admintable">
                    <tr>
                        <td>
                        </td>
                        <?php if ($this->params->get('references_1','1') == '1') { ?>
                        <td style="font-size: 8pt; text-align: center;">
                                <?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_FORM_REFERENCE'); ?>&nbsp;(1)
                                <?php echo ($this->params->get('required_references_name','1')=='0'||
                                                                                            $this->params->get('required_references_address','1')=='0'||
                                                                                            $this->params->get('required_references_telephone','1')=='0'||
                                                                                            $this->params->get('required_references_relationship','1')=='0'||
                                                                                            $this->params->get('required_references_years','1')=='0')?'*':''; ?>
                        </td>
                        <?php } ?>
                        <?php if ($this->params->get('references_2','1') == '1') {?>
                        <td style="font-size: 8pt; text-align: center;">
                                <?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_FORM_REFERENCE'); ?>&nbsp;(2)
                                <?php echo ($this->params->get('required_references_name','1')=='0'||
                                                                                            $this->params->get('required_references_address','1')=='0'||
                                                                                            $this->params->get('required_references_telephone','1')=='0'||
                                                                                            $this->params->get('required_references_relationship','1')=='0'||
                                                                                            $this->params->get('required_references_years','1')=='0')?'*':''; ?>
                        </td>
                        <?php } ?>
                        <?php if ($this->params->get('references_3','1') == '1') {?>
                        <td style="font-size: 8pt; text-align: center;">
                                <?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_FORM_REFERENCE'); ?>&nbsp;(3)
                                <?php echo ($this->params->get('required_references_name','1')=='0'||
                                                                                            $this->params->get('required_references_address','1')=='0'||
                                                                                            $this->params->get('required_references_telephone','1')=='0'||
                                                                                            $this->params->get('required_references_relationship','1')=='0'||
                                                                                            $this->params->get('required_references_years','1')=='0')?'*':''; ?>
                        </td>
                        <?php } ?>
                        <?php if ($this->params->get('references_4','1') == '1') {?>
                        <td style="font-size: 8pt; text-align: center;">
                                <?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_FORM_REFERENCE'); ?>&nbsp;(4)
                                <?php echo ($this->params->get('required_references_name','1')=='0'||
                                                                                            $this->params->get('required_references_address','1')=='0'||
                                                                                            $this->params->get('required_references_telephone','1')=='0'||
                                                                                            $this->params->get('required_references_relationship','1')=='0'||
                                                                                            $this->params->get('required_references_years','1')=='0')?'*':''; ?>
                        </td>
                        <?php } ?>
                    </tr>
                    <tr>
                        <td width="100" valign="top" align="right" class="key<?php echo ($this->params->get('required_references_address','1')=='0'&&(!$this->application->ref1_name ||
                                !$this->application->ref2_name || !$this->application->ref3_name || !$this->application->ref4_name))?$required_class:''; ?>" style="border: 0px; font-size: 8pt;">
                                <?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_FORM_NAME'); ?>
                                <?php echo ($this->params->get('required_references_name','1')=='0')?'*':''; ?>:
                        </td>
                        <?php if ($this->params->get('references_1','1') == '1') {?>
                        <td>
                            <input class="text_area<?php echo ($this->params->get('required_references_name','1')=='0'&&!$this->application->ref1_name)?$required_class:''; ?>" type="text" name="ref1_name" id="ref1_name" size="18" maxlength="250" value = "<?php if (isset($this->application)) echo $this->application->ref1_name;?>" />
                        </td>
                        <?php } ?>
                        <?php if ($this->params->get('references_2','1') == '1') {?>
                        <td>
                            <input class="text_area<?php echo ($this->params->get('required_references_name','1')=='0'&&!$this->application->ref2_name)?$required_class:''; ?>" type="text" name="ref2_name" id="ref2_name" size="18" maxlength="250" value = "<?php if (isset($this->application)) echo $this->application->ref2_name;?>" />
                        </td>
                        <?php } ?>
                        <?php if ($this->params->get('references_3','1') == '1') {?>
                        <td>
                            <input class="text_area<?php echo ($this->params->get('required_references_name','1')=='0'&&!$this->application->ref3_name)?$required_class:''; ?>" type="text" name="ref3_name" id="ref3_name" size="18" maxlength="250" value = "<?php if (isset($this->application)) echo $this->application->ref3_name;?>" />
                        </td>
                        <?php } ?>
                        <?php if ($this->params->get('references_4','1') == '1') {?>
                        <td>
                            <input class="text_area<?php echo ($this->params->get('required_references_name','1')=='0'&&!$this->application->ref4_name)?$required_class:''; ?>" type="text" name="ref4_name" id="ref4_name" size="18" maxlength="250" value = "<?php if (isset($this->application)) echo $this->application->ref4_name;?>" />
                        </td>
                        <?php } ?>
                    </tr>
                    <tr>
                        <td width="100" valign="top" align="right" class="key<?php echo ($this->params->get('required_references_address','1')=='0'&&(!$this->application->ref1_address ||
                                !$this->application->ref2_address || !$this->application->ref3_address || !$this->application->ref4_address))?$required_class:''; ?>" style="border: 0px; font-size: 8pt;">
                                <?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_FORM_ADDRESS'); ?>
                                <?php echo ($this->params->get('required_references_address','1')=='0')?'*':''; ?>:
                        </td>
                        <?php if ($this->params->get('references_1','1') == '1') {?>
                        <td>
                            <input class="text_area<?php echo ($this->params->get('required_references_address','1')=='0'&&!$this->application->ref1_address)?$required_class:''; ?>" type="text" name="ref1_address" id="ref1_address" size="18" maxlength="250" value = "<?php if (isset($this->application)) echo $this->application->ref1_address;?>" />
                        </td>
                        <?php } ?>
                        <?php if ($this->params->get('references_2','1') == '1') {?>
                        <td>
                            <input class="text_area<?php echo ($this->params->get('required_references_address','1')=='0'&&!$this->application->ref2_address)?$required_class:''; ?>" type="text" name="ref2_address" id="ref2_address" size="18" maxlength="250" value = "<?php if (isset($this->application)) echo $this->application->ref2_address;?>" />
                        </td>
                        <?php } ?>
                        <?php if ($this->params->get('references_3','1') == '1') {?>
                        <td>
                            <input class="text_area<?php echo ($this->params->get('required_references_address','1')=='0'&&!$this->application->ref3_address)?$required_class:''; ?>" type="text" name="ref3_address" id="ref3_address" size="18" maxlength="250" value = "<?php if (isset($this->application)) echo $this->application->ref3_address;?>" />
                        </td>
                        <?php } ?>
                        <?php if ($this->params->get('references_4','1') == '1') {?>
                        <td>
                            <input class="text_area<?php echo ($this->params->get('required_references_address','1')=='0'&&!$this->application->ref4_address)?$required_class:''; ?>" type="text" name="ref4_address" id="ref4_address" size="18" maxlength="250" value = "<?php if (isset($this->application)) echo $this->application->ref4_address;?>" />
                        </td>
                        <?php } ?>
                    </tr>
                    <tr>
                        <td width="100" valign="top" align="right" class="key<?php echo ($this->params->get('required_references_telephone','1')=='0'&&(!$this->application->ref1_telephone ||
                                !$this->application->ref2_telephone || !$this->application->ref3_telephone || !$this->application->ref4_telephone))?$required_class:''; ?>" style="border: 0px; font-size: 8pt;">
                                <?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_FORM_TELEPHONE'); ?>
                                <?php echo ($this->params->get('required_references_telephone','1')=='0')?'*':''; ?>:
                        </td>
                        <?php if ($this->params->get('references_1','1') == '1') {?>
                        <td>
                            <input class="text_area<?php echo ($this->params->get('required_references_telephone','1')=='0'&&!$this->application->ref1_telephone)?$required_class:''; ?>" type="text" name="ref1_telephone" id="ref1_telephone" size="18" maxlength="250" value = "<?php if (isset($this->application)) echo $this->application->ref1_telephone;?>" />
                        </td>
                        <?php } ?>
                        <?php if ($this->params->get('references_2','1') == '1') {?>
                        <td>
                            <input class="text_area<?php echo ($this->params->get('required_references_telephone','1')=='0'&&!$this->application->ref2_telephone)?$required_class:''; ?>" type="text" name="ref2_telephone" id="ref2_telephone" size="18" maxlength="250" value = "<?php if (isset($this->application)) echo $this->application->ref2_telephone;?>" />
                        </td>
                        <?php } ?>
                        <?php if ($this->params->get('references_3','1') == '1') {?>
                        <td>
                            <input class="text_area<?php echo ($this->params->get('required_references_telephone','1')=='0'&&!$this->application->ref3_telephone)?$required_class:''; ?>" type="text" name="ref3_telephone" id="ref3_telephone" size="18" maxlength="250" value = "<?php if (isset($this->application)) echo $this->application->ref3_telephone;?>" />
                        </td>
                        <?php } ?>
                        <?php if ($this->params->get('references_4','1') == '1') {?>
                        <td>
                            <input class="text_area<?php echo ($this->params->get('required_references_telephone','1')=='0'&&!$this->application->ref4_telephone)?$required_class:''; ?>" type="text" name="ref4_telephone" id="ref4_telephone" size="18" maxlength="250" value = "<?php if (isset($this->application)) echo $this->application->ref4_telephone;?>" />
                        </td>
                        <?php } ?>
                    </tr>
                    <tr>
                        <td width="100" valign="top" align="right" class="key<?php echo ($this->params->get('required_references_relationship','1')=='0'&&(!$this->application->ref1_relationship ||
                                !$this->application->ref2_relationship || !$this->application->ref3_relationship || !$this->application->ref4_relationship))?$required_class:''; ?>" style="border: 0px; font-size: 8pt;">
                                <?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_FORM_RELATIONSHIP'); ?>
                                <?php echo ($this->params->get('required_references_relationship','1')=='0')?'*':''; ?>:
                        </td>
                        <?php if ($this->params->get('references_1','1') == '1') {?>
                        <td>
                            <input class="text_area<?php echo ($this->params->get('required_references_relationship','1')=='0'&&!$this->application->ref1_relationship)?$required_class:''; ?>" type="text" name="ref1_relationship" id="ref1_relationship" size="18" maxlength="250" value = "<?php if (isset($this->application)) echo $this->application->ref1_relationship;?>" />
                        </td>
                        <?php } ?>
                        <?php if ($this->params->get('references_2','1') == '1') {?>
                        <td>
                            <input class="text_area<?php echo ($this->params->get('required_references_relationship','1')=='0'&&!$this->application->ref2_relationship)?$required_class:''; ?>" type="text" name="ref2_relationship" id="ref2_relationship" size="18" maxlength="250" value = "<?php if (isset($this->application)) echo $this->application->ref2_relationship;?>" />
                        </td>
                        <?php } ?>
                        <?php if ($this->params->get('references_3','1') == '1') {?>
                        <td>
                            <input class="text_area<?php echo ($this->params->get('required_references_relationship','1')=='0'&&!$this->application->ref3_relationship)?$required_class:''; ?>" type="text" name="ref3_relationship" id="ref3_relationship" size="18" maxlength="250" value = "<?php if (isset($this->application)) echo $this->application->ref3_relationship;?>" />
                        </td>
                        <?php } ?>
                        <?php if ($this->params->get('references_4','1') == '1') {?>
                        <td>
                            <input class="text_area<?php echo ($this->params->get('required_references_relationship','1')=='0'&&!$this->application->ref4_telephone)?$required_class:''; ?>" type="text" name="ref4_relationship" id="ref4_relationship" size="18" maxlength="250" value = "<?php if (isset($this->application)) echo $this->application->ref4_relationship;?>" />
                        </td>
                        <?php } ?>
                    </tr>
                    <tr>
                        <td width="100" valign="top" align="right" class="key<?php echo ($this->params->get('required_references_years','1')=='0'&&(!$this->application->ref1_years ||
                                !$this->application->ref2_years || !$this->application->ref3_years || !$this->application->ref4_years))?$required_class:''; ?>" style="border: 0px; font-size: 8pt;">
                                <?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_FORM_YEARS_ACQUAINTED'); ?>
                                <?php echo ($this->params->get('required_references_years','1')=='0')?'*':''; ?>:
                        </td>
                        <?php if ($this->params->get('references_1','1') == '1') {?>
                        <td>
                            <input class="text_area<?php echo ($this->params->get('required_references_years','1')=='0'&&!$this->application->ref1_years)?$required_class:''; ?>" type="text" name="ref1_years" id="ref1_years" size="18" maxlength="250" value = "<?php if (isset($this->application)) echo $this->application->ref1_years;?>" />
                        </td>
                        <?php } ?>
                        <?php if ($this->params->get('references_2','1') == '1') {?>
                        <td>
                            <input class="text_area<?php echo ($this->params->get('required_references_years','1')=='0'&&!$this->application->ref2_years)?$required_class:''; ?>" type="text" name="ref2_years" id="ref2_years" size="18" maxlength="250" value = "<?php if (isset($this->application)) echo $this->application->ref2_years;?>" />
                        </td>
                        <?php } ?>
                        <?php if ($this->params->get('references_3','1') == '1') {?>
                        <td>
                            <input class="text_area<?php echo ($this->params->get('required_references_years','1')=='0'&&!$this->application->ref3_years)?$required_class:''; ?>" type="text" name="ref3_years" id="ref3_years" size="18" maxlength="250" value = "<?php if (isset($this->application)) echo $this->application->ref3_years;?>" />
                        </td>
                        <?php } ?>
                        <?php if ($this->params->get('references_4','1') == '1') {?>
                        <td>
                            <input class="text_area<?php echo ($this->params->get('required_references_years','1')=='0'&&!$this->application->ref4_years)?$required_class:''; ?>" type="text" name="ref4_years" id="ref4_years" size="18" maxlength="250" value = "<?php if (isset($this->application)) echo $this->application->ref4_years;?>" />
                        </td>
                        <?php } ?>
                    </tr>
                </table>
            </fieldset>
            <?php } ?>
            <?php if ($this->params->get('text_resume','1') == '1')
            { ?>
            <fieldset>
                <legend style="font-size: 10pt;"><?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_FORM_TEXT_RESUME'); ?></legend>
                <table width="100%" class="admintable">
                    <tr>
                        <td valign="top" align="left" class="key" style="border: 0px; font-size: 8pt;">
                                <?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_FORM_TEXT_RESUME_DESC'); ?>
                        </td>
                    </tr>
                    <tr>
                        <td valign="top" align="left" class="key" style="border: 0px; font-size: 8pt;">
                            <textarea cols="60" rows="10" name="text_resume"><?php if (isset($this->application)) echo $this->application->text_resume; ?></textarea>
                        </td>
                    </tr>
                </table>
            </fieldset>
            <?php } ?>
            <?php if ($this->params->get('file_upload','1') == '1') : ?>
            <fieldset>
                <legend style="font-size: 10pt;"><?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_FORM_UPLOAD_FILE'); ?></legend>
                <table width="100%" class="admintable">
                    <tr>
                        <td valign="top" align="left" class="key" style="border: 0px; font-size: 8pt;">
                                <?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_FORM_UPLOAD_FILE_DESC'); ?><span style="font-size: smaller;">&nbsp;<span style="font-size: smaller;">(<?php 
                                        echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_FORM_PERMITTED_FILE_TYPES'); ?>&nbsp;<?php 
                                        echo $this->params->get('file_upload_types','doc,docx,pdf,txt');  ?>&nbsp;<?php
                                        echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_FORM_MAX_FILE_SIZE'); ?>&nbsp;<?php  
                                        echo $this->params->get('file_upload_max_size','1045876'); ?>&nbsp;bytes)</span>
                        </td>
                    </tr>
                    <tr>
                        <td valign="top" align="left" class="key" style="border: 0px; font-size: 8pt;">
                            <input type="hidden" id="file_name" name="file_name" value="<?php if (isset($this->application->file_name)) echo $this->application->file_name; ?>" />
                            <input class="text_area" type="file" onchange="document.getElementById('file_name').value=this.value" name="file_upload" id="file_upload" title="Pick a file to upload" size="50" value="<?php if ( isset($this->application->file_name) ) echo $this->application->file_name;?>"/>
                        </td>
                    </tr>
                </table>
            </fieldset>
            <?php endif; ?>
            <?php if ($this->params->get('agreement','1') == '1') : ?>
            <fieldset>
                <legend style="font-size: 10pt;"><?php echo $this->params->get('field_certification_agreement',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_FORM_CERTIFICATION_AGREEMENT')); ?></legend>
                <?php if (isset($this->agreement)) echo $this->agreement->introtext.$this->agreement->fulltext; ?>
                <?php if ($this->params->get('bullet1_on','1') == '1' || 
                            $this->params->get('bullet2_on','1') == '1' || 
                            $this->params->get('bullet3_on','1') == '1' || 
                            $this->params->get('bullet4_on','1') == '1' || 
                            $this->params->get('bullet5_on','1') == '1' || 
                            $this->params->get('bullet6_on','1') == '1' ) : ?>
                <table width="100%" class="admintable">
                    <?php $bullet = 0; ?>
                    <?php if ($this->params->get('bullet1_on','1') == '1') { $bullet++; ?>
                    <tr>
                        <td width="50" valign="top" align="right" class="key" style="border: 0px; font-size: 8pt;">
							<?php echo $bullet; ?>.
                        </td>
                        <td colspan="2" align="left" valign="top" class="key" style="border: 0px; font-size: 8pt;">
                                <?php // echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_FORM_CERTIFICATION_AGREEMENT_BULLET1'); ?>
                                <?php echo $this->params->get('certification_agreement_bullet1','Certification Agreement Bullet 1'); ?>
                        </td>
                    </tr>
                    <?php } ?>
                    <?php if ($this->params->get('bullet2_on','1') == '1') { $bullet++; ?>
                    <tr>
                        <td width="50" valign="top" align="right" class="key" style="border: 0px; font-size: 8pt;">
							<?php echo $bullet; ?>.
                        </td>
                        <td colspan="2" align="left" valign="top" class="key" style="border: 0px; font-size: 8pt;">
                                <?php // echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_FORM_CERTIFICATION_AGREEMENT_BULLET2'); ?>
                                <?php echo $this->params->get('certification_agreement_bullet2','Certification Agreement Bullet 2'); ?>
                        </td>
                    </tr>
                    <?php } ?>
                    <?php if ($this->params->get('bullet3_on','1') == '1') { $bullet++; ?>
                    <tr>
                        <td width="50" valign="top" align="right" class="key" style="border: 0px; font-size: 8pt;">
							<?php echo $bullet; ?>.
                        </td>
                        <td colspan="2" align="left" valign="top" class="key" style="border: 0px; font-size: 8pt;">
                                <?php // echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_FORM_CERTIFICATION_AGREEMENT_BULLET3'); ?>
                                <?php echo $this->params->get('certification_agreement_bullet3','Certification Agreement Bullet 3'); ?>
                        </td>
                    </tr>
                    <?php } ?>
                    <?php if ($this->params->get('bullet4_on','1') == '1') { $bullet++; ?>
                    <tr>
                        <td width="50" valign="top" align="right" class="key" style="border: 0px; font-size: 8pt;">
							<?php echo $bullet; ?>.
                        </td>
                        <td colspan="2" align="left" valign="top" class="key" style="border: 0px; font-size: 8pt;">
                                <?php // echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_FORM_CERTIFICATION_AGREEMENT_BULLET4'); ?>
                                <?php echo $this->params->get('certification_agreement_bullet4','Certification Agreement Bullet 4'); ?>
                        </td>
                    </tr>
                    <?php } ?>
                    <?php if ($this->params->get('bullet5_on','1') == '1') { $bullet++; ?>
                    <tr>
                        <td width="50" valign="top" align="right" class="key" style="border: 0px; font-size: 8pt;">
							<?php echo $bullet; ?>.
                        </td>
                        <td colspan="2" align="left" valign="top" class="key" style="border: 0px; font-size: 8pt;">
                                <?php // echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_FORM_CERTIFICATION_AGREEMENT_BULLET5'); ?>
                                <?php echo $this->params->get('certification_agreement_bullet5','Certification Agreement Bullet 5'); ?>
                        </td>
                    </tr>
                    <?php } ?>
                    <?php if ($this->params->get('bullet6_on','1') == '1') { $bullet++; ?>
                    <tr>
                        <td width="50" valign="top" align="right" class="key" style="border: 0px; font-size: 8pt;">
							<?php echo $bullet; ?>.
                        </td>
                        <td colspan="2" align="left" valign="top" class="key" style="border: 0px; font-size: 8pt;">
                                <?php // echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_FORM_CERTIFICATION_AGREEMENT_BULLET6'); ?>
                                <?php echo $this->params->get('certification_agreement_bullet6','Certification Agreement Bullet 6'); ?>
                        </td>
                    </tr>
                    <?php } ?>

                    <?php if ($this->params->get('display_custom_yes_no','0') == '1') : ?>
                    <tr>
                        <td valign="top" width="50" align="right" class="key" style="border: 0px; font-size: 8pt;">
                        </td>
                        <td valign="top" align="left" class="key" style="border: 0px; font-size: 8pt;">
                            <?php echo $this->params->get('text_custom_yes_no',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_FORM_SH_CUSTOM_YES_NO_TEXT')); ?>
                        </td>
                        <td valign="top" width="100">
                                    <?php echo $this->options['custom_yes_no']; ?>
                        </td>
                    </tr>
                    <?php endif; ?>

                </table>
                <?php endif; ?>
            </fieldset>
            <?php endif; ?>
            <?php if ($this->params->get('use_captcha','1') == '1') { ?>
            <fieldset id="jg_captcha">
                <legend><?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_FORM_CAPTCHA_TEXT'); ?></legend>
                <table width="100%" class="admintable">
                    <tr>
                        <td>
                            <input size="40" onclick="if (this.value=='<?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_FORM_ENTER_CAPTCHA_INSTRUCTIONS'); ?>') this.value='';" type="text" name="captcha_entered" id="captcha_entered" maxlength="8" value="<?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_FORM_ENTER_CAPTCHA_INSTRUCTIONS'); ?>" />&nbsp;
                            <img name="captcha_img" id="captcha_img" alt="captcha" src="<?php echo 'index.php?option=com_jobgrokapp&amp;view=application&amp;format=captcha&amp;Itemid='.JRequest::getVar('Itemid'); ?>" />
                        </td>
                    </tr>
                </table>
            </fieldset>
            <?php } ?>
            <?php if ($this->params->get('use_captcha','1') == '2') { ?>
            <fieldset id="jg_captcha">
                <legend><?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_FORM_CAPTCHA_TEXT'); ?></legend>
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
            <?php } ?>            
            <table width="100%" class="admintable">
                <tr>
                    <td colspan="3" align="center">
                        <input type="button" name="submit_app" onclick="document.adminForm.submit();" value="<?php echo $this->params->get('submit_application_text',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_FORM_SUBMIT_APPLICATION')); ?>" />
                    </td>
                </tr>
                <?php if ($this->params->get('signature','1') == '1') { ?>
                <tr>
                    <td>
                    </td>
                    <td valign="top" align="left" class="key<?php echo ($this->params->get('required_signature','1')=='0'&&!$this->application->signature)?$required_class:''; ?>" style="border: 0px; font-size: 8pt;">
                        <?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_FORM_TYPE_NAME_IN_SIGNATURE_BOX'); echo ($this->params->get('required_signature','1')=='0')?'*':''; ?>:
                        <input class="text_area<?php echo ($this->params->get('required_signature','1')=='0'&&!$this->application->signature)?$required_class:''; ?>" type="text" name="signature" id="signature" size="35" maxlength="250" value = "<?php if (isset($this->application)) echo $this->application->signature;?>" />
                    </td>
                    <td valign="top" align="right" class="key" style="border: 0px; font-size: 8pt;">
                        <?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_FORM_TODAYS_DATE'); ?>:&nbsp;<?php 
                            $timenow = new JDate();
                            $mysqlTime = JHTML::_('date', $timenow,$this->params->get('jg_date_format','Y-m-d G:i:s'));
                            echo "<span id='jg_date_format'>".$mysqlTime."</span>";
                            //echo date($this->params->get('jg_date_format','Y-m-d H:i:s')); 
                        ?><br />
                    </td>
                </tr>
                <?php } ?>
            </table>
            <input type="hidden" name="id" value="<?php if (isset($this->application)) echo $this->application->id; ?>" />
            <input type="hidden" name="controller" value="application" />
            <input type="hidden" name="view" value="application" />
            <input type="hidden" name="source" value="form" />
            <input type="hidden" name="layout" value="static" />
            <input type="hidden" name="uid" value="<?php echo $this->uid; ?>" />
            <input type="hidden" name="option" value="com_jobgrokapp" />
            <input type="hidden" name="Itemid" value="<?php echo (isset($this->application->Itemid)?$this->application->Itemid:$this->Itemid); ?>" />
            <input type="hidden" name="task" value="save" />
            <input type="hidden" name="thankyou" value="<?php echo $this->params->get('thankyou_article'); ?>" />
<?php if ($this->params->get('display_job_selection','0') == '1' && isset($this->posting_id)) : ?>
            <input type="hidden" value="<?php echo $this->posting_id; ?>" name="posting_id" id="posting_id" />
<?php endif; ?>
            <?php echo JHTML::_( 'form.token'); ?>
        </form>
</div>
<div id="credits" style="width: 100%"><?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_FORM_POWERED_BY'); 
?>&nbsp;<a href="http://www.jobgrok.com"><?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_FORM_JOBGROK'); ?></a></div>
