<?php
/**
 *
 *
 * This is the long.php view layout for jobgrokapp
 *
 * Created: November 18, 2014, 3:25 am
 *
 * Subversion Details
 * $Date: 2014-10-05 20:45:43 -0500 (Sun, 05 Oct 2014) $
 * $Revision: 6324 $
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
JHTML::_('behavior.calendar');

if ($this->params->get('use_session_keepalive','0') == '1') { JHTML::_('behavior.keepalive'); }

$document =JFactory::getDocument();
$dtype = $this->params->get('form_display','none');

$options = array(
    'onActive' => 'function(title, description){
        description.setStyle("display", "block");
        title.addClass("open").removeClass("closed");
    }',
    'onBackground' => 'function(title, description){
        description.setStyle("display", "none");
        title.addClass("closed").removeClass("open");
    }',
    'startOffset' => 0,  // 0 starts on the first tab, 1 starts the second, etc...
    'useCookie' => false, // this must not be a string. Don't use quotes.
);

$css = ".jg_ea .pane-sliders .panel h3, .jg_ea fieldset#intro, .jg_ea dl.tabs dt.closed span { background-color: ".$this->params->get('form_background_color','#f6f6f6')."; } "
       .".jg_ea_field.required div { color: red; font-weight: bold; } "
       ."div.required input { background-color: #faa; } "
       ."div.required label { color: red; }"
       .".jg_ea2 label { width: 20%; display: inline-block; } "
       .".jg_ea2 input { width: 70%; } "
       .".jg_ea2 input.radio, .jg_ea2 input.checkbox { width: auto; } "
       .".jg_ea2 fieldset { padding: 10px; } "
       .".jg_ea2 legend { font-weight: bold; }"
       .".jg_ea2 h4 { border-top: 3px double #ccc; border-bottom: 3px double #ccc; padding: 10px; }";

$css2 = "
.jg_ea2 .pane-sliders .panel { border: 1px solid #cccccc; margin-bottom: 3px; padding-bottom: 0px; }
.jg_ea2 .pane-sliders .panel h3 { margin: 0px; background: #f6f6f6 repeat scroll 0px 0px; color: #666666; font-size: 13px; }
.jg_ea2 .pane-sliders .panel h3 a { text-decoration: none; }
.jg_ea2 .pane-sliders .panel span { padding-left: 20px; }
.jg_ea2 .pane-sliders .title { cursor: pointer; margin: 0px; padding: 2px; color: #666666; }
.jg_ea2 .pane-sliders .panel h3.pane-toggler span { background: url(".JURI::base()."components/com_jobgrokapp/assets/images/arrow_right.gif) no-repeat 5px 5px; }
.jg_ea2 .pane-sliders .panel h3.pane-toggler-down span { background: url(".JURI::base()."components/com_jobgrokapp/assets/images/arrow_down.gif) no-repeat 5px 5px; }
.jg_ea2 .pane-toggler-down { border-bottom: 1px solid #cccccc; }
.jg_ea2 .pane-toggler-down span { padding-left: 20px; }
.jg_ea2 .pane-slider fieldset { border: 0px none; }
.jg_ea2 .pane-slider input { margin: 1px; }

.jg_ea2 dl.tabs { clear: both; float: left; margin: 50px 0 0; z-index: 50; }
.jg_ea2 dl.tabs dt.open { background: none repeat scroll 0 0 #f9f9f9; border-bottom: 1px solid #f9f9f9; color: #000000; z-index: 100; }
.jg_ea2 dl.tabs dt { margin-bottom: 3px; height: 18px; background: none repeat scroll 0 0 #f0f0f0; border-left: 1px solid #ccc; border-right: 1px solid #ccc; border-top: 1px solid #ccc; color: #666; float: left; margin-right: 3px; padding: 4px 10px; }
.jg_ea2 div.current { border: 1px solid #ccc; clear: both; padding: 10px; }
.jg_ea2 .tabs fieldset { border: 0px none; }
.jg_ea2 .tabs input { margin: 1px; }
";

if ($this->retry) $required_class = " required"; else $required_class = "";

$requiredgroups = $this->requiredgroups;
$document->addStyleDeclaration($css);

$css_other = $this->params->get('css_other','');
$css_employment_information = $this->params->get('employment_information_css','');
if ($css_employment_information != '') $document->addStyleDeclaration($css_employment_information);

if ($css_other != '') $document->addStyleDeclaration($css_other);
if ($this->params->get("use_jobgrok_css","0") == "1" ||
    $this->params->get("use_default_css","1") == "1") $document->addStyleDeclaration($css2);

?>

<div class="jg_ea2">
    <?php if ($this->params->get('display_title','1') == '1') : ?>
    <h1><?php echo $this->params->get('title'); ?></h1>
    <?php endif; ?>
    <?php
    if ($this->params->get('app_create_date_location','bottom') == 'top') {
        echo $this->params->get('app_todays_date_text',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_LONG_TODAYS_DATE')); ?>:&nbsp;<?php 
        $timenow = new JDate();
        $mysqlTime = JHTML::_('date', $timenow,$this->params->get('jg_date_format','Y-m-d G:i:s'));
        echo "<span id='jg_date_format'>".$mysqlTime."</span>";
        //echo date($this->params->get('jg_date_format','Y-m-d H:i:s')); 
    }
    ?><br />
    <?php if ($this->params->get('display_intro','1') == '1') : ?>
    <fieldset id="intro">
        <strong><?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_LONG_INTRO_BOLD'); ?></strong>
        <?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_LONG_INTRO_TEXT'); ?>
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
            <?php if ($requiredgroups['req_personal']) { 
                    $group_css = "h3#panel_1_id a span, dt.panel_1_id span h3 a:link, dt.panel_1_id span h3 a:visited { color: red; }"; $document->addStyleDeclaration($group_css); } ?>
                <?php echo ($dtype != 'none') ?
                        JHtml::_( $dtype.'.panel', $this->params->get('field_personal',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_LONG_PERSONAL')), 'panel_1_id') :
                        "<h4>".$this->params->get('field_personal',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_LONG_PERSONAL'))."</h4>";
                ?>
                <fieldset>
                <?php if ($this->params->get('personal_information_first_name','1') == '1') : ?>
                    <div class="jg_ea_field<?php echo ($this->params->get('required_first_name','1')=='0'&&!$this->application->first_name)?$required_class:''; ?>" id="personal_information_first_name">
                        <label><?php echo $this->params->get('field_first_name',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_LONG_FIRST_NAME')); echo ($this->params->get('required_first_name','1')==='0')?'*':''; ?>:</label>
                        <input type="text" name="first_name" id="first_name" maxlength="250" value = "<?php echo (isset($this->application))?$this->application->first_name:"";?>" />
                    </div>
                <?php endif; ?>
                <?php if ($this->params->get('personal_information_middle_name','1') == '1') : ?>
                    <div class="jg_ea_field<?php echo ($this->params->get('required_middle_name','1')=='0'&&!$this->application->middle_name)?$required_class:''; ?>" id="personal_information_middle_name">
                        <label><?php echo $this->params->get('field_middle_name',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_LONG_MIDDLE_NAME')); echo ($this->params->get('required_middle_name','1')==='0')?'*':''; ?>:</label>
                        <input type="text" name="middle_name" id="middle_name" maxlength="250" value = "<?php echo (isset($this->application))?$this->application->middle_name:"";?>" />
                    </div>
                <?php endif; ?>
                <?php if ($this->params->get('personal_information_last_name','1') == '1') : ?>
                    <div class="jg_ea_field<?php echo ($this->params->get('required_last_name','1')=='0'&&!$this->application->last_name)?$required_class:''; ?>" id="personal_information_last_name">
                        <label><?php echo $this->params->get('field_last_name',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_LONG_LAST_NAME')); echo ($this->params->get('required_last_name','1')==='0')?'*':''; ?>:</label>
                        <input type="text" name="last_name" id="last_name" maxlength="250" value = "<?php echo (isset($this->application))?$this->application->last_name:"";?>" />
                    </div>
                <?php endif; ?>
                <?php if ($this->params->get('personal_information_home_phone','1') == '1') : ?>
                    <div class="jg_ea_field<?php echo ($this->params->get('required_home_phone','1')=='0'&&!$this->application->home_phone)?$required_class:''; ?>" id="personal_information_home_phone">
                        <label><?php echo $this->params->get('field_home_phone',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_LONG_HOME_PHONE')); echo ($this->params->get('required_home_phone','1')==='0')?'*':''; ?>:</label>
                        <input type="text" name="home_phone" id="home_phone" maxlength="20" value = "<?php echo (isset($this->application))?$this->application->home_phone:"";?>" />
                    </div>
                <?php endif; ?>
                <?php if ($this->params->get('personal_information_work_phone','1') == '1') : ?>
                    <div class="jg_ea_field<?php echo ($this->params->get('required_work_phone','1')=='0'&&!$this->application->work_phone)?$required_class:''; ?>" id="personal_information_work_phone">
                        <label><?php echo $this->params->get('field_work_phone',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_LONG_WORK_PHONE')); echo ($this->params->get('required_work_phone','1')==='0')?'*':''; ?>:</label>
                        <input type="text" name="work_phone" id="work_phone" maxlength="20" value = "<?php echo (isset($this->application))?$this->application->work_phone:"";?>" />
                    </div>
                <?php endif; ?>
                <?php if ($this->params->get('personal_information_cell_phone','1') == '1') : ?>
                    <div class="jg_ea_field<?php echo ($this->params->get('required_cell_phone','1')=='0'&&!$this->application->cell_phone)?$required_class:''; ?>" id="personal_information_cell_phone">
                        <label><?php echo $this->params->get('field_cell_phone',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_LONG_CELL_PHONE')); echo ($this->params->get('required_cell_phone','1')==='0')?'*':''; ?>:</label>
                        <input type="text" name="cell_phone" id="cell_phone" maxlength="20" value = "<?php echo (isset($this->application))?$this->application->cell_phone:"";?>" />
                    </div>
                <?php endif; ?>
                <?php if ($this->params->get('personal_information_email_address','1') == '1') : ?>
                    <div class="jg_ea_field<?php echo ($this->params->get('required_email_address','1')=='0'&&!$this->application->email_address)?$required_class:''; ?>" id="personal_information_email_address">
                        <label><?php echo $this->params->get('field_email_address',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_LONG_EMAIL_ADDRESS')); echo ($this->params->get('required_email_address','1')==='0')?'*':''; ?>:</label>
                        <input type="text" name="email_address" id="email_address" maxlength="250" value = "<?php echo (isset($this->application))?$this->application->email_address:"";?>" />
                    </div>
                <?php endif; ?>
                <?php if ($this->params->get('personal_information_ssn','0') == '1') : ?>
                    <div class="jg_ea_field<?php echo ($this->params->get('required_ssn','1')=='0'&&!$this->application->ssn)?$required_class:''; ?>" id="personal_information_ssn">
                        <label><?php echo $this->params->get('field_ssn',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_LONG_SSN')); echo ($this->params->get('required_ssn','1')==='0')?'*':''; ?>:</label>
                        <input type="text" name="ssn" id="ssn" maxlength="250" value = "<?php echo (isset($this->application))?$this->application->ssn:"";?>" />
                    </div>
                <?php endif; ?>
                <?php if ($this->params->get('personal_photo','1') == '0') : ?>
                    <div class="jg_ea_field" id="personal_photo">
                        <?php 
                            echo "<label>";
                            echo $this->params->get('field_personal_photo',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_LONG_PERSONAL_PHOTO')); 
                            echo "</label>";
                            echo "&nbsp;<small>(";
                            echo $this->params->get('field_personal_photo_allowed',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_LONG_PERSONAL_PHOTO_MIMETYPES_ALLOWED'));
                            echo ":&nbsp;";
                            echo $this->params->get('personal_photo_mimetypes','image/png,image/jpeg,image/gif').")"; 
                            echo "&nbsp;(";
                            echo $this->params->get('field_personal_photo_max_size',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_LONG_PERSONAL_PHOTO_MAX_SIZE'));
                            echo ":&nbsp;";
                            echo $this->params->get('personal_photo_maxupload','1048576')."Bytes )</small>";
                        ?><br/><input class="jg_input" type="file" name="photo" id="photo" />
                    </div>
                <?php endif; ?>
                </fieldset>
            <?php endif; ?>        

            <?php if ($this->params->get('addresses','1') == '1') : ?>
            <?php if ($requiredgroups['req_addresses']) { 
                    $group_css = "h3#panel_2_id a span, dt.panel_2_id span h3 a:link, dt.panel_2_id span h3 a:visited { color: red; }"; $document->addStyleDeclaration($group_css); } ?>
                <?php echo ($dtype != 'none') ?
                        JHtml::_( $dtype.'.panel', $this->params->get('field_addresses',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_LONG_ADDRESSES')), 'panel_2_id') :
                        "<h4>".$this->params->get('field_addresses',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_LONG_ADDRESSES'))."</h4>";
                ?>
                <?php if ($this->params->get('addresses_current','1') == '1') : ?>
                <fieldset>
                <legend><?php echo $this->params->get('field_current_address',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_LONG_CURRENT_ADDRESS')); ?></legend>
                <?php if ($this->params->get('addresses_street','1') == '1') : ?>
                    <div class="jg_ea_field<?php echo ($this->params->get('required_address_street','1') == '0'&&!$this->application->street)?$required_class:''; ?>" id="addresses_street">
                        <label><?php echo $this->params->get('field_street',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_LONG_STREET')); echo ($this->params->get('required_address_street','1')==='0')?'*':''; ?>:</label>
                        <input type="text" name="street" id="street" maxlength="250" value = "<?php echo (isset($this->application))?$this->application->street:"";?>" />
                    </div>
                <?php endif; ?>
                <?php if ($this->params->get('addresses_city','1') == '1') : ?>
                    <div class="jg_ea_field<?php echo ($this->params->get('required_address_city','1') == '0'&&!$this->application->city)?$required_class:''; ?>" id="addresses_city">
                        <label><?php echo $this->params->get('field_city',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_LONG_CITY')); echo ($this->params->get('required_address_city','1')==='0')?'*':''; ?>:</label>
                        <input type="text" name="city" id="city" maxlength="250" value = "<?php echo (isset($this->application))?$this->application->city:"";?>" />
                    </div>
                <?php endif; ?>
                <?php if ($this->params->get('addresses_state','1') == '1') : ?>
                    <div class="jg_ea_field<?php echo ($this->params->get('required_address_state','1') == '0'&&!$this->application->state)?$required_class:''; ?>" id="addresses_state">
                        <label><?php echo $this->params->get('field_state',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_LONG_STATE')); echo ($this->params->get('required_address_state','1')==='0')?'*':''; ?>:</label>
                        <input type="text" name="state" id="state" maxlength="20" value = "<?php echo (isset($this->application))?$this->application->state:"";?>" />
                    </div>
                <?php endif; ?>
                <?php if ($this->params->get('addresses_zip_code','1') == '1') : ?>
                    <div class="jg_ea_field<?php echo ($this->params->get('required_address_zip_code','1') == '0'&&!$this->application->zip_code)?$required_class:''; ?>" id="address_zip_code">
                        <label><?php echo $this->params->get('field_zip_code',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_LONG_ZIP_CODE')); echo ($this->params->get('required_address_zip_code','1')==='0')?'*':''; ?>:</label>
                        <input type="text" name="zip_code" id="zip_code" maxlength="20" value = "<?php echo (isset($this->application))?$this->application->zip_code:"";?>" />
                    </div>
                <?php endif; ?>
                <?php if ($this->params->get('addresses_since','1') == '1') : ?>
                    <div class="jg_ea_field<?php echo ($this->params->get('required_address_from_date','1') == '0'&&!$this->application->from_date)?$required_class:''; ?>" id="addresses_since">
                        <label><?php echo $this->params->get('field_address_since',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_LONG_ADDRESS_SINCE')); echo ($this->params->get('required_address_from_date','1')==='0')?'*':''; ?>:</label>
                        <input type="text" name="from_date" id="from_date" maxlength="20" value = "<?php echo (isset($this->application))?$this->application->from_date:"";?>" />
                    </div>
                <?php endif; ?>
                </fieldset>
                <?php endif; ?>
                <?php if ($this->params->get('addresses_1','1') == '1') : ?>
                <fieldset>
                <legend><?php echo $this->params->get('field_prior_address',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_LONG_PRIOR_ADDRESS')); ?></legend>
                <?php if ($this->params->get('addresses_street','1') == '1') : ?>
                    <div class="jg_ea_field" id="addresses_street1">
                        <label><?php echo $this->params->get('field_street',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_LONG_STREET')); ?>:</label>
                        <input type="text" name="street1" id="street1" maxlength="250" value = "<?php echo (isset($this->application))?$this->application->street1:"";?>" />
                    </div>
                <?php endif; ?>
                <?php if ($this->params->get('addresses_city','1') == '1') : ?>
                    <div class="jg_ea_field" id="addresses_city1">
                        <label><?php echo $this->params->get('field_city',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_LONG_CITY')); ?>:</label>
                        <input type="text" name="city1" id="city1" maxlength="250" value = "<?php echo (isset($this->application))?$this->application->city1:"";?>" />
                    </div>
                <?php endif; ?>
                <?php if ($this->params->get('addresses_state','1') == '1') : ?>
                    <div class="jg_ea_field" id="addresses_state1">
                        <label><?php echo $this->params->get('field_state',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_LONG_STATE')); ?>:</label>
                        <input type="text" name="state1" id="state1" maxlength="20" value = "<?php echo (isset($this->application))?$this->application->state1:"";?>" />
                    </div>
                <?php endif; ?>
                <?php if ($this->params->get('addresses_zip_code','1') == '1') : ?>
                    <div class="jg_ea_field" id="addresses_zip_code1">
                        <label><?php echo $this->params->get('field_zip_code',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_LONG_ZIP_CODE')); ?>:</label>
                        <input type="text" name="zip_code1" id="zip_code1" maxlength="20" value = "<?php echo (isset($this->application))?$this->application->zip_code1:"";?>" />
                    </div>
                <?php endif; ?>
                <?php if ($this->params->get('addresses_since','1') == '1') : ?>
                    <div class="jg_ea_field" id="addresses_since1">
                        <label><?php echo $this->params->get('field_address_since',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_LONG_ADDRESS_SINCE')); ?>:</label>
                        <input type="text" name="from_date1" id="from_date1" maxlength="20" value = "<?php echo (isset($this->application))?$this->application->from_date1:"";?>" />
                    </div>
                <?php endif; ?>
                <?php if ($this->params->get('addresses_to','1') == '1') : ?>
                    <div class="jg_ea_field" id="addresses_to1">
                        <label><?php echo $this->params->get('field_address_to',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_LONG_ADDRESS_TO')); ?>:</label>
                        <input type="text" name="to_date1" id="to_date1" maxlength="20" value = "<?php echo (isset($this->application))?$this->application->to_date1:"";?>" />
                    </div>
                <?php endif; ?>
                </fieldset>
                <?php endif; ?>
                <?php if ($this->params->get('addresses_2','1') == '1') : ?>
                <fieldset>
                <legend><?php echo $this->params->get('field_prior_address',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_LONG_PRIOR_ADDRESS')); ?></legend>
                <?php if ($this->params->get('addresses_street','1') == '1') : ?>
                <div class="jg_ea_field" id="addresses_street2">
                    <label><?php echo $this->params->get('field_street',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_LONG_STREET')); ?>:</label>
                    <input type="text" name="street2" id="street2" maxlength="250" value = "<?php echo (isset($this->application))?$this->application->street2:"";?>" />
                </div>
                <?php endif; ?>
                <?php if ($this->params->get('addresses_city','1') == '1') : ?>
                <div class="jg_ea_field" id="addresses_city2">
                    <label><?php echo $this->params->get('field_city',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_LONG_CITY')); ?>:</label>
                    <input type="text" name="city2" id="city2" maxlength="250" value = "<?php echo (isset($this->application))?$this->application->city2:"";?>" />
                </div>
                <?php endif; ?>
                <?php if ($this->params->get('addresses_state','1') == '1') : ?>
                <div class="jg_ea_field" id="addresses_state2">
                    <label><?php echo $this->params->get('field_state',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_LONG_STATE')); ?>:</label>
                    <input type="text" name="state2" id="state2" maxlength="20" value = "<?php echo (isset($this->application))?$this->application->state2:"";?>" />
                </div>
                <?php endif; ?>
                <?php if ($this->params->get('addresses_zip_code','1') == '1') : ?>
                <div class="jg_ea_field" id="addresses_zip_code2">
                    <label><?php echo $this->params->get('field_zip_code',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_LONG_ZIP_CODE')); ?>:</label>
                    <input type="text" name="zip_code2" id="zip_code2" maxlength="20" value = "<?php echo (isset($this->application))?$this->application->zip_code2:"";?>" />
                </div>
                <?php endif; ?>
                <?php if ($this->params->get('addresses_since','1') == '1') : ?>
                <div class="jg_ea_field" id="addresses_since2">
                    <label><?php echo $this->params->get('field_address_since',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_LONG_ADDRESS_SINCE')); ?>:</label>
                    <input type="text" name="from_date2" id="from_date2" maxlength="20" value = "<?php echo (isset($this->application))?$this->application->from_date2:"";?>" />
                </div>
                <?php endif; ?>
                <?php if ($this->params->get('addresses_to','1') == '1') : ?>
                <div class="jg_ea_field" id="addresses_to2">
                    <label><?php echo $this->params->get('field_address_to',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_LONG_ADDRESS_TO')); ?>:</label>
                    <input type="text" name="to_date2" id="to_date2" maxlength="20" value = "<?php echo (isset($this->application))?$this->application->to_date2:"";?>" />
                </div>
                <?php endif; ?>
                </fieldset>
                <?php endif; ?>
            <?php endif; ?>
                    
            <?php if ($this->params->get('education','1') == '1') : ?>
            <?php if ($requiredgroups['req_education']) { 
                    $group_css = "h3#panel_3_id a span, dt.panel_3_id span h3 a:link, dt.panel_3_id span h3 a:visited { color: red; }"; $document->addStyleDeclaration($group_css); } ?>
                <?php echo ($dtype != 'none')? 
                        JHtml::_( $dtype.'.panel', $this->params->get('field_education',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_LONG_EDUCATION')), 'panel_3_id') :
                        "<h4 id='field_education'>".$this->params->get('field_education',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_LONG_EDUCATION'))."</h4>";
                ?>
                <?php if ($this->params->get('education_high','1') == '1') : ?>
                <fieldset>
                    <legend><?php echo $this->params->get('field_high_school',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_LONG_HIGH_SCHOOL')); ?></legend>
                    <?php if ($this->params->get('education_school','1') == '1') : ?>
                    <div class="jg_ea_field" id="education_school">
                        <label><?php echo $this->params->get('field_school',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_LONG_SCHOOL')); ?>:</label>
                        <input type="text" name="school" id="school" maxlength="250" value = "<?php echo (isset($this->application))?$this->application->school:"";?>" />
                    </div>
                    <?php endif; ?>
                    <?php if ($this->params->get('education_city','1') == '1') : ?>
                    <div class="jg_ea_field" id="education_city">
                        <label><?php echo $this->params->get('field_school_city',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_LONG_CITY')); ?>:</label>
                        <input type="text" name="school_city" id="school_city" maxlength="250" value = "<?php echo (isset($this->application))?$this->application->school_city:"";?>" />
                    </div>
                    <?php endif; ?>
                    <?php if ($this->params->get('education_state','1') == '1') : ?>
                    <div class="jg_ea_field" id="education_state">
                        <label><?php echo $this->params->get('field_school_state',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_LONG_STATE')); ?>:</label>
                        <input type="text" name="school_state" id="school_state" maxlength="20" value = "<?php echo (isset($this->application))?$this->application->school_state:"";?>" />
                    </div>
                    <?php endif; ?>
                    <?php if ($this->params->get('education_diploma','1') == '1') : ?>
                    <div class="jg_ea_field" id="education_diploma">
                        <label><?php echo $this->params->get('field_diploma',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_LONG_DIPLOMA')); ?>:</label>
                        <?php echo $this->options['school_diploma']; ?>
                    </div>
                    <?php endif; ?>
                </fieldset>
                <?php endif; ?>
                <?php if ($this->params->get('education_undergrad','1') == '1') : ?>
                <fieldset>
                    <legend><?php echo $this->params->get('field_undergrad_school',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_LONG_UNDERGRAD_SCHOOL')); ?></legend>
                    <?php if ($this->params->get('education_school','1') == '1') : ?>
                    <div class="jg_ea_field" id="education_school1">
                        <label><?php echo $this->params->get('field_school',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_LONG_SCHOOL')); ?>:</label>
                        <input type="text" name="school1" id="school1" maxlength="250" value = "<?php echo (isset($this->application))?$this->application->school1:"";?>" />
                    </div>
                    <?php endif; ?>
                    <?php if ($this->params->get('education_city','1') == '1') : ?>
                    <div class="jg_ea_field" id="education_city1">
                        <label><?php echo $this->params->get('field_school_city',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_LONG_CITY')); ?>:</label>
                        <input type="text" name="school_city1" id="school_city1" maxlength="250" value = "<?php echo (isset($this->application))?$this->application->school_city1:"";?>" />
                    </div>
                    <?php endif; ?>
                    <?php if ($this->params->get('education_state','1') == '1') : ?>
                    <div class="jg_ea_field" id="education_state1">
                        <label><?php echo $this->params->get('field_school_state',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_LONG_STATE')); ?>:</label>
                        <input type="text" name="school_state1" id="school_state1" maxlength="20" value = "<?php echo (isset($this->application))?$this->application->school_state1:"";?>" />
                    </div>
                    <?php endif; ?>
                    <?php if ($this->params->get('education_diploma','1') == '1') : ?>
                    <div class="jg_ea_field" id="education_diploma1">
                        <label><?php echo $this->params->get('field_diploma',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_LONG_DIPLOMA')); ?>:</label>
                        <?php echo $this->options['school_diploma1']; ?>
                    </div>
                    <?php endif; ?>
                    <?php if ($this->params->get('education_degree','1') == '1') : ?>
                    <div class="jg_ea_field<?php echo ($this->application->school_diploma1 == '1'&&!$this->application->diploma_text1)?$required_class:''; ?>" id="education_degree1">
                        <label><?php echo $this->params->get('field_deg_cert_dip_long',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_LONG_DEG_CERT_DIP')); ?>:</label>
                        <input type="text" name="diploma_text1" id="diploma_text1" maxlength="20" value = "<?php echo (isset($this->application))?$this->application->diploma_text1:"";?>" />
                    </div>
                    <?php endif; ?>
                    <?php if ($this->params->get('education_study','1') == '1') : ?>
                    <div class="jg_ea_field<?php echo ($this->application->school_diploma1 == '1'&&!$this->application->study_area1)?$required_class:''; ?>" id="education_study1">
                        <label><?php echo $this->params->get('field_area_of_study',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_LONG_AREA_OF_STUDY')); ?>:</label>
                        <input type="text" name="study_area1" id="study_area1" maxlength="20" value = "<?php echo (isset($this->application))?$this->application->study_area1:"";?>" />
                    </div>
                    <?php endif; ?>
                </fieldset>
                <?php endif; ?>
                <?php if ($this->params->get('education_grad','1') == '1') : ?>
                <fieldset>
                    <legend><?php echo $this->params->get('field_grad_school',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_LONG_GRAD_SCHOOL')); ?></legend>
                    <?php if ($this->params->get('education_school','1') == '1') : ?>
                    <div class="jg_ea_field" id="education_school2">
                        <label><?php echo $this->params->get('field_school',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_LONG_SCHOOL')); ?>:</label>
                        <input type="text" name="school2" id="school2" maxlength="250" value = "<?php echo (isset($this->application))?$this->application->school2:"";?>" />
                    </div>
                    <?php endif; ?>
                    <?php if ($this->params->get('education_city','1') == '1') : ?>
                    <div class="jg_ea_field" id="education_city2">
                        <label><?php echo $this->params->get('field_school_city',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_LONG_CITY')); ?>:</label>
                        <input type="text" name="school_city2" id="school_city2" maxlength="250" value = "<?php echo (isset($this->application))?$this->application->school_city2:"";?>" />
                    </div>
                    <?php endif; ?>
                    <?php if ($this->params->get('education_state','1') == '1') : ?>
                    <div class="jg_ea_field" id="education_state2">
                        <label><?php echo $this->params->get('field_school_state',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_LONG_STATE')); ?></label>
                        <input class="text_area" type="text" name="school_state2" id="school_state2" maxlength="20" value = "<?php echo (isset($this->application))?$this->application->school_state2:"";?>" />
                    </div>
                    <?php endif; ?>
                    <?php if ($this->params->get('education_diploma','1') == '1') : ?>
                    <div class="jg_ea_field" id="education_diploma2">
                        <label><?php echo $this->params->get('field_diploma',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_LONG_DIPLOMA')); ?>:</label>
                        <?php echo $this->options['school_diploma2']; ?>
                    </div>
                    <?php endif; ?>
                    <?php if ($this->params->get('education_degree','1') == '1') : ?>
                    <div class="jg_ea_field<?php echo ($this->application->school_diploma2 == '1'&&!$this->application->diploma_text2)?$required_class:''; ?>" id="education_degree2">
                        <label><?php echo $this->params->get('field_deg_cert_dip_long',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_LONG_DEG_CERT_DIP')); ?>:</label>
                        <input type="text" name="diploma_text2" id="diploma_text2" maxlength="20" value = "<?php echo (isset($this->application))?$this->application->diploma_text2:"";?>" />
                    </div>
                    <?php endif; ?>
                    <?php if ($this->params->get('education_study','1') == '1') : ?>
                    <div class="jg_ea_field<?php echo ($this->application->school_diploma2 == '1'&&!$this->application->study_area2)?$required_class:''; ?>" id="education_study2">
                        <label><?php echo $this->params->get('field_area_of_study',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_LONG_AREA_OF_STUDY')); ?>:</label>
                        <input type="text" name="study_area2" id="study_area2" maxlength="20" value = "<?php echo (isset($this->application))?$this->application->study_area2:"";?>" />
                    </div>
                    <?php endif; ?>
                </fieldset>
                <?php endif; ?>
                <?php if ($this->params->get('education_other','1') == '1') : ?>
                <fieldset>
                    <legend><?php echo $this->params->get('field_other_school',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_LONG_OTHER_SCHOOL')); ?></legend>
                    <?php if ($this->params->get('education_school','1') == '1') : ?>
                    <div class="jg_ea_field" id="education_school3">
                        <label><?php echo $this->params->get('field_school',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_LONG_SCHOOL')); ?>:</label>
                        <input type="text" name="school3" id="school3" maxlength="250" value = "<?php echo (isset($this->application))?$this->application->school3:"";?>" />
                    </div>
                    <?php endif; ?>
                    <?php if ($this->params->get('education_city','1') == '1') : ?>
                    <div class="jg_ea_field" id="education_city3">
                        <label><?php echo $this->params->get('field_school_city',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_LONG_CITY')); ?>:</label>
                        <input type="text" name="school_city3" id="school_city3" maxlength="250" value = "<?php echo (isset($this->application))?$this->application->school_city3:"";?>" />
                    </div>
                    <?php endif; ?>
                    <?php if ($this->params->get('education_state','1') == '1') : ?>
                    <div class="jg_ea_field" id="education_state3">
                        <label><?php echo $this->params->get('field_school_state',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_LONG_STATE')); ?>:</label>
                        <input class="text_area" type="text" name="school_state3" id="school_state3" maxlength="20" value = "<?php echo (isset($this->application))?$this->application->school_state3:"";?>" />
                    </div>
                    <?php endif; ?>
                    <?php if ($this->params->get('education_diploma','1') == '1') : ?>
                    <div class="jg_ea_field" id="education_diploma3">
                        <label><?php echo $this->params->get('field_diploma',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_LONG_DIPLOMA')); ?>:</label>
                        <?php echo $this->options['school_diploma3']; ?>
                    </div>
                    <?php endif; ?>
                    <?php if ($this->params->get('education_degree','1') == '1') : ?>
                    <div class="jg_ea_field<?php echo ($this->application->school_diploma3 == '1'&&!$this->application->diploma_text3)?$required_class:''; ?>" id="education_degree3">
                        <label><?php echo $this->params->get('field_deg_cert_dip_long',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_LONG_DEG_CERT_DIP')); ?>:</label>
                        <input type="text" name="diploma_text3" id="diploma_text3" maxlength="20" value = "<?php echo (isset($this->application))?$this->application->diploma_text3:"";?>" />
                    </div>
                    <?php endif; ?>
                    <?php if ($this->params->get('education_study') == '1') : ?>
                    <div class="jg_ea_field<?php echo ($this->application->school_diploma3 == '1'&&!$this->application->study_area3)?$required_class:''; ?>" id="education_study3">
                        <label><?php echo $this->params->get('field_area_of_study',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_LONG_AREA_OF_STUDY')); ?>:</label>
                        <input type="text" name="study_area3" id="study_area3" maxlength="20" value = "<?php echo (isset($this->application))?$this->application->study_area3:"";?>" />
                    </div>
                    <?php endif; ?>
                </fieldset>
                <?php endif; ?>
            <?php endif; ?>

            <?php if ($this->params->get('employment_information','1') == '1') : ?>
            <?php if ($requiredgroups['req_employment']) { 
                    $group_css = "h3#panel_4_id a span, dt.panel_4_id span h3 a:link, dt.panel_4_id span h3 a:visited { color: red; }"; $document->addStyleDeclaration($group_css); } ?>
                <?php echo ($dtype != 'none') ?
                        JHtml::_( $dtype.'.panel',  $this->params->get('field_employment',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_LONG_EMPLOYMENT')), 'panel_4_id') :
                        "<h4>". $this->params->get('field_employment',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_LONG_EMPLOYMENT'))."</h4>";
                ?>
                <fieldset>
                <legend><?php echo $this->params->get('field_employment_information',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_LONG_EMPLOYMENT_INFORMATION')); ?></legend>              
                <?php if ($this->params->get('employment_information_position','1') == '1') : ?>
                <div class="jg_ea_field" id="employment_information_position">
                    <label><?php echo $this->params->get('field_position_applied_for',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_LONG_POSITION_APPLIED_FOR')); ?>:</label>
                    <input type="text" name="position" id="position" maxlength="250" 
                           value = "<?php 
                           if ($this->params->get('employment_information_position_auto','1') == '1') {
                            echo (isset($this->application->position) && $this->application->position != "") ?
                                $this->application->position :
                                (isset($this->posting_id))?JHTML::_('jobgrokapp.posting',$this->posting_id,true):"";
                           }
                    ?>" />
                </div>
                <?php endif; ?>
                <?php if ($this->params->get('employment_information_date_you_can_start','1') == '1') : ?>
                <div class="jg_ea_field" id="employment_information_date_you_can_start">
                    <label><?php echo $this->params->get('field_date_you_can_start',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_LONG_DATE_YOU_CAN_START')); ?>:</label>
                    <?php echo JHTML::calendar(isset($this->application->available_date)?$this->application->available_date:'','available_date','available_date'); ?>&nbsp;(yyyy-mm-dd)
                </div>
                <?php endif; ?>
                <?php if ($this->params->get('employment_information_desired_salary','1') == '1') : ?>
                <div class="jg_ea_field" id="employment_information_desired_salary">
                    <label><?php echo $this->params->get('field_desired_salary',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_LONG_DESIRED_SALARY')).
                        " (".$this->params->get('employment_information_currency',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_LONG_CURRENCY_SYMBOL')).")"; ?>:</label>
                    <input type="text" name="desired_pay" id="desired_pay" maxlength="250" value = "<?php echo (isset($this->application))?$this->application->desired_pay:"";?>" />
                </div>
                <?php endif; ?>
                <?php if ($this->params->get('employment_information_do_you_prefer','1') == '1') : ?>
                <div class="jg_ea_field" id="employment_information_do_you_refer">
                    <label><?php echo $this->params->get('field_do_you_prefer',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_LONG_DO_YOU_PREFER')); ?>:</label>
                    <?php echo $this->options['work_preferences']; ?>
                </div>
                <?php endif; ?>
                <?php if ($this->params->get('employment_information_can_you_work','1') == '1') : ?>
                <div class="jg_ea_field" id="employment_information_can_you_work">
                    <label><?php echo $this->params->get('field_can_you_work',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_LONG_CAN_YOU_WORK')); ?>:</label>
                    <input type="checkbox" name="weekends" id="weekends" class="checkbox" value="1" <?php echo (isset($this->application))?(( '1' == $this->application->weekends )?"checked ":""):""; ?> />&nbsp;<?php echo $this->params->get('field_weekends',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_LONG_WEEKENDS')); ?>
                    <input type="checkbox" name="evenings" id="evenings" class="checkbox" value="1" <?php echo (isset($this->application))?(( '1' == $this->application->evenings )?"checked ":""):""; ?> />&nbsp;<?php echo $this->params->get('field_evenings',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_LONG_EVENINGS')); ?>
                </div>
                <?php endif; ?>
                <?php if ($this->params->get('employment_information_available','1') == '1') : ?>
                <div class="jg_ea_field" id="employment_information_available">
                    <label><?php echo $this->params->get('field_available',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_LONG_AVAILABLE')); ?>:</label>
                    <input type="checkbox" name="monday" id="monday" class="checkbox" value="1" <?php echo (isset($this->application)) ? (( '1' == $this->application->monday )?"checked ":""):""; ?> />&nbsp;<?php echo $this->params->get('field_monday_abbr',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_LONG_MONDAY_ABBR')); ?>
                    <input type="checkbox" name="tuesday" id="tuesday" class="checkbox" value="1" <?php echo (isset($this->application)) ? (( '1' == $this->application->tuesday )?"checked ":""):""; ?> />&nbsp;<?php echo $this->params->get('field_tuesday_abbr',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_LONG_TUESDAY_ABBR')); ?>
                    <input type="checkbox" name="wednesday" id="wednesday" class="checkbox" value="1" <?php echo (isset($this->application)) ? (( '1' == $this->application->wednesday )?"checked ":""):""; ?> />&nbsp;<?php echo $this->params->get('field_wednesday_abbr',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_LONG_WEDNESDAY_ABBR')); ?>
                    <input type="checkbox" name="thursday" id="thursday" class="checkbox" value="1" <?php echo (isset($this->application))? (( '1' == $this->application->thursday )?"checked ":""):""; ?> />&nbsp;<?php echo $this->params->get('field_thursday_abbr',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_LONG_THURSDAY_ABBR')); ?>
                    <input type="checkbox" name="friday" id="friday" class="checkbox" value="1" <?php echo (isset($this->application))? (( '1' == $this->application->friday )?"checked ":""):""; ?> />&nbsp;<?php echo $this->params->get('field_friday_abbr',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_LONG_FRIDAY_ABBR')); ?>
                    <input type="checkbox" name="saturday" id="saturday" class="checkbox" value="1" <?php echo (isset($this->application)) ? (( '1' == $this->application->saturday )?"checked ":""):""; ?> />&nbsp;<?php echo $this->params->get('field_saturday_abbr',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_LONG_SATURDAY_ABBR')); ?>
                    <input type="checkbox" name="sunday" id="sunday" class="checkbox" value="1" <?php echo (isset($this->application)) ? (( '1' == $this->application->sunday )?"checked ":""):""; ?> />&nbsp;<?php echo $this->params->get('field_sunday_abbr',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_LONG_SUNDAY_ABBR')); ?>
                </div>
                <?php endif; ?>
                <?php if ($this->params->get('employment_information_shiftwork','1') == '1') : ?>
                <div class="jg_ea_field" id="employment_shiftwork">
                    <label><?php echo $this->params->get('field_shiftwork',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_LONG_SHIFTWORK')); ?>:</label>
                    <?php echo $this->options['shiftwork']; ?>
                </div>
                <?php endif; ?>
                <?php if ($this->params->get('employment_information_not_available','1') == '1') : ?>
                <div class="jg_ea_field" id="employment_information_not_available">
                    <label><?php echo $this->params->get('field_not_available',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_LONG_NOT_AVAILABLE')); ?>:</label>
                    <input type="text" name="unavailability" id="unavailability" maxlength="250" value = "<?php echo (isset($this->application))?$this->application->unavailability:"";?>" />
                </div>
                <?php endif; ?>
                </fieldset>
                <?php if ($this->params->get('employment_information_question_1','1') == '1' ||
                    $this->params->get('employment_information_question_2','1') == '1' ||
                    $this->params->get('employment_information_question_3','1') == '1' ||
                    $this->params->get('employment_information_question_4','1') == '1' ||
                    $this->params->get('employment_information_question_5','1') == '1' ||
                    $this->params->get('employment_information_question_6','1') == '1' ||
                    $this->params->get('employment_information_question_7','1') == '1' ||
                    $this->params->get('employment_information_question_8','1') == '1')
                : ?>
                <fieldset>
                <legend><?php echo $this->params->get('field_following_questions',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_LONG_FOLLOWING_QUESTIONS')); ?></legend>
                <?php $qcounter = 1; ?>
                <?php if ($this->params->get('employment_information_question_1','1') == '1') : ?>
                <div class="jg_ea_field" id="employment_information_question_1">
                    <div>
                        <span><?php echo $qcounter.")&nbsp;"; $qcounter++; 
                            echo $this->params->get('field_question_1',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_LONG_QUESTION_1')); ?></span>
                            <div><?php echo $this->options['eligible']; ?></div>
                    </div>
                   <div><span><?php
                        echo $this->params->get('field_question_1_followup', JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_LONG_QUESTION_1_FOLLOWUP')); ?></span>
                        <div><?php echo $this->options['provideproof']; ?></div>
                    </div>
                </div>
                <?php endif; ?>
                <?php if ($this->params->get('employment_information_question_2','1') == '1') : ?>
                <div class="jg_ea_field<?php echo ($this->application->worked_here_before == $this->params->get('force_question_2_followup','1')&&!$this->application->worked_here_text)?$required_class:''; ?>" id="employment_information_question_2">
                    <div>
                        <span><?php echo $qcounter.")&nbsp;"; $qcounter++;
                            echo $this->params->get('field_question_2',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_LONG_QUESTION_2')); ?></span>
                        <div><?php echo $this->options['worked_here_before']; ?></div>
                    </div>
                    <div>
                        <label>&nbsp;</label>
                        <div><?php echo $this->params->get('field_question_2_followup',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_LONG_QUESTION_2_FOLLOWUP')); ?></div>
                    </div>
                    <div>
                        <label>&nbsp;</label>
                        <input type="text" name="worked_here_text" id="worked_here_text" maxlength="250" value = "<?php echo (isset($this->application))?$this->application->worked_here_text:"";?>" />
                    </div>
                </div>
                <?php endif; ?>
                <?php if ($this->params->get('employment_information_question_3','1') == '1') : ?>
                <div class="jg_ea_field" id="employment_information_question_3">
                    <div>
                        <span><?php echo $qcounter.")&nbsp;"; $qcounter++; 
                            echo $this->params->get('field_question_3',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_LONG_QUESTION_3')); ?></span>
                        <div><?php echo $this->options['job_desc_received']; ?></div>
                    </div>
                </div>
                <?php endif; ?>
                <?php if ($this->params->get('employment_information_question_4','1') == '1') : ?>
                <div class="jg_ea_field<?php echo ($this->application->understand_reqs == $this->params->get('force_question_4_followup','0')&&!$this->application->no_understand_reqs)?$required_class:''; ?>" id="employment_information_question_4">
                    <div>
                        <span><?php echo $qcounter.")&nbsp;"; $qcounter++;
                            echo $this->params->get('field_question_4',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_LONG_QUESTION_4')); ?></span>
                        <div><?php echo $this->options['understand_reqs']; ?></div>
                    </div>
                    <div>
                        <label>&nbsp;</label>
                        <div><?php echo $this->params->get('field_question_4_followup',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_LONG_QUESTION_4_FOLLOWUP')); ?></div>
                    </div>
                    <div>
                        <label>&nbsp;</label>
                        <input type="text" name="no_understand_reqs" id="no_understand_reqs" maxlength="250" value = "<?php echo (isset($this->application))?$this->application->no_understand_reqs:"";?>" />
                    </div>
                </div>
                <?php endif; ?>
                <?php if ($this->params->get('employment_information_question_5','1') == '1') : ?>
                <div class="jg_ea_field" id="employment_information_question_5">
                    <div>
                        <span><?php echo $qcounter.")&nbsp;"; $qcounter++;
                            echo $this->params->get('field_question_5',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_LONG_QUESTION_5')); ?></span>
                        <div><?php echo $this->options['on_layoff']; ?></div>
                    </div>
                </div>
                <?php endif; ?>
                <?php if ($this->params->get('employment_information_question_6','1') == '1') : ?>
                <div class="jg_ea_field<?php echo ($this->application->conf_agreement == $this->params->get('force_question_6_followup','1')&&!$this->application->conf_explain)?$required_class:''; ?>" id="employment_information_question_6">
                    <div>
                        <span><?php echo $qcounter.")&nbsp;"; $qcounter++; 
                            echo $this->params->get('field_question_6',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_LONG_QUESTION_6')); ?></span>
                        <div><?php echo $this->options['conf_agreement']; ?></div>
                    </div>
                    <div>
                        <label>&nbsp;</label>
                        <div><?php echo $this->params->get('field_question_6_followup',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_LONG_QUESTION_6_FOLLOWUP')); ?></div>
                    </div>
                    <div>
                        <label>&nbsp;</label>
                        <input type="text" name="conf_explain" id="conf_explain" maxlength="250" value = "<?php echo (isset($this->application))?$this->application->conf_explain:"";?>" />
                    </div>
                </div>
                <?php endif; ?>
                <?php if ($this->params->get('employment_information_question_7','1') == '1') : ?>
                <div class="jg_ea_field<?php echo ($this->application->discharged == $this->params->get('force_question_7_followup','1')&&!$this->application->discharge_explain)?$required_class:''; ?>" id="employment_information_question_7">
                    <div>
                        <span><?php echo $qcounter.")&nbsp;"; $qcounter++; 
                            echo $this->params->get('field_question_7',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_LONG_QUESTION_7')); ?></span>
                        <div><?php echo $this->options['discharged']; ?></div>
                    </div>
                    <div>
                        <label>&nbsp;</label>
                        <div><?php echo $this->params->get('field_question_7_followup',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_LONG_QUESTION_7_FOLLOWUP')); ?></div>
                    </div>
                    <div>
                        <label>&nbsp;</label>
                        <input type="text" name="discharge_explain" id="discharge_explain" maxlength="250" value = "<?php echo (isset($this->application))?$this->application->discharge_explain:"";?>" />
                    </div>
                </div>
                <?php endif; ?>
                <?php if ($this->params->get('employment_information_question_8','1') == '1') : ?>
                <div class="jg_ea_field<?php echo ($this->application->convict == $this->params->get('force_question_8_followup','1')&&!$this->application->convict_explain)?$required_class:''; ?>" id="employment_information_question_8">
                    <div>
                        <span><?php echo $qcounter.")&nbsp;"; $qcounter++;
                            echo $this->params->get('field_question_8',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_LONG_QUESTION_8')); ?></span>
                        <div><?php echo $this->options['convict']; ?></div>
                    </div>
                    <div>
                        <label>&nbsp;</label>
                        <div><?php echo $this->params->get('field_question_8_followup',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_LONG_QUESTION_8_FOLLOWUP')); ?></div>
                    </div>
                    <div>
                        <label>&nbsp;</label>
                        <input type="text" name="convict_explain" id="convict_explain" maxlength="250" value = "<?php echo (isset($this->application))?$this->application->convict_explain:"";?>" />
                    </div>
                </div>
                <?php endif; ?>
                <?php if ($this->params->get('employment_information_question_9','1') == '1') : ?>
                <div class="jg_ea_field<?php echo ($this->application->family == $this->params->get('force_question_9_followup','1')&&!$this->application->family_explain)?$required_class:''; ?>" id="employment_information_question_9">
                    <div>
                        <span><?php echo $qcounter.")&nbsp;"; $qcounter++;
                            echo $this->params->get('field_question_9',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_LONG_QUESTION_9')); ?></span>
                        <div><?php echo $this->options['family']; ?></div>
                    </div>
                    <div>
                        <label>&nbsp;</label>
                        <div><?php echo $this->params->get('field_question_9_followup',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_LONG_QUESTION_9_FOLLOWUP')); ?></div>
                    </div>
                    <div>
                        <label>&nbsp;</label>
                        <input type="text" name="family_explain" id="family_explain" maxlength="250" value = "<?php echo (isset($this->application))?$this->application->family_explain:"";?>" />
                    </div>
                </div>
                <?php endif; ?>
                </fieldset>
                <?php endif; ?>
            <?php endif; ?>
                
            <?php if ($this->params->get('employment_history','1') == '1') : ?>
            <?php if ($requiredgroups['req_employers']) { 
                    $group_css = "h3#panel_5_id a span, dt.panel_5_id span h3 a:link, dt.panel_5_id span h3 a:visited { color: red; }"; $document->addStyleDeclaration($group_css); } ?>
                <?php echo ($dtype != 'none') ?
                        JHtml::_( $dtype.'.panel',  $this->params->get('field_employers',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_LONG_EMPLOYERS')), 'panel_5_id') :
                        "<h4>". $this->params->get('field_employers',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_LONG_EMPLOYERS'))."</h4>";
                ?>
                <?php if ($this->params->get('employment_history_currently_employed','1') == '1') : ?>
                <fieldset>
                <div class="jg_ea_field" id="employment_history_currently_employed">
                    <div class="question_row">
                        <span><?php echo $this->params->get('field_currently_employed_text',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_LONG_CURRENTLY_EMPLOYED')); ?></span>
                        <?php echo $this->options['currently_employed']; ?>
                    </div>
                </div>                    
                </fieldset>
                <?php endif; ?>
                <?php if ($this->params->get('employment_history_contact_current_employer','1') == '1') : ?>
                <fieldset>
                <div class="jg_ea_field" id="employment_history_contact_current_employer">
                    <div class="question_row">
                        <span><?php echo $this->params->get('field_contact_employer_text',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_LONG_CONTACT_EMPLOYER')); ?></span>
                        <?php echo $this->options['contact_emp']; ?>
                    </div>
                </div>                    
                </fieldset>
                <?php endif; ?>
                <?php if ($this->params->get('employment_history_recent','1') == '1') : ?>
                    <fieldset>
                    <legend><?php echo $this->params->get('field_most_recent_employer',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_LONG_EMPLOYMENT_HISTORY_RECENT')); ?></legend>
                    <?php if ( $this->params->get('employment_history_employer','1') == '1') : ?>
                    <div class="jg_ea_field<?php echo ($this->params->get('required_employment_history_employer','1') == '0'&&!$this->application->employer)?$required_class:''; ?>" id="employment_history_employer">
                        <label><?php echo $this->params->get('field_employer',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_LONG_EMPLOYER')); 
                            echo ($this->params->get('required_employment_history_employer','1')==='0')?'*':''; ?>:</label>
                        <input class="text_area" type="text" name="employer" id="employer" maxlength="250"
                                value = "<?php echo (isset($this->application))?$this->application->employer:""; ?>" />
                    </div>
                    <?php endif; ?>
                    <?php if ( $this->params->get('employment_history_city','1') == '1') : ?>
                    <div class="jg_ea_field<?php echo ($this->params->get('required_employment_history_city','1') == '0'&&!$this->application->employer_city)?$required_class:''; ?>" id="employment_history_city">
                        <label><?php echo $this->params->get('field_employer_city',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_LONG_CITY')); echo ($this->params->get('required_employment_history_city','1')==='0')?'*':''; ?>:</label>
                        <input type="text" name="employer_city" id="employer_city" maxlength="250" value = "<?php echo (isset($this->application))?$this->application->employer_city:"";?>" />
                    </div>
                    <?php endif; ?>
                    <?php if ( $this->params->get('employment_history_state','1') == '1') : ?>
                        <div class="jg_ea_field<?php echo ($this->params->get('required_employment_history_state','1') == '0'&&!$this->application->employer_state)?$required_class:''; ?>" id="employment_history_state">
                            <label><?php echo $this->params->get('field_employer_state',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_LONG_STATE')); echo ($this->params->get('required_employment_history_state','1')==='0')?'*':''; ?>:</label>
                            <input type="text" name="employer_state" id="employer_state" maxlength="20" value = "<?php echo (isset($this->application))?$this->application->employer_state:"";?>" />
                        </div>
                    <?php endif; ?>
                    <?php if ( $this->params->get('employment_history_zip_code','1') == '1') : ?>
                        <div class="jg_ea_field<?php echo ($this->params->get('required_employment_history_zip_code','1') == '0'&&!$this->application->employer_zip)?$required_class:''; ?>" id="employment_history_zip_code">
                            <label><?php echo $this->params->get('field_employer_zip_code',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_LONG_ZIP_CODE')); echo ($this->params->get('required_employment_history_zip_code','1')==='0')?'*':''; ?>:</label>
                            <input class="text_area" type="text" name="employer_zip" id="employer_zip" maxlength="20" value = "<?php echo (isset($this->application))?$this->application->employer_zip:"";?>" />
                    </div>
                    <?php endif; ?>
                    <?php if ( $this->params->get('employment_history_phone','1') == '1') : ?>
                    <div class="jg_ea_field<?php echo ($this->params->get('required_employment_history_phone','1') == '0'&&!$this->application->employer_phone)?$required_class:''; ?>" id="employment_history_phone">
                        <label><?php echo $this->params->get('field_employer_phone',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_LONG_PHONE')); echo ($this->params->get('required_employment_history_phone','1')==='0')?'*':''; ?>:</label>
                        <input type="text" name="employer_phone" id="employer_phone" maxlength="20" value = "<?php echo (isset($this->application))?$this->application->employer_phone:"";?>" />
                    </div>
                    <?php endif; ?>
                    <?php if ( $this->params->get('employment_history_position','1') == '1') : ?>
                    <div class="jg_ea_field<?php echo ($this->params->get('required_employment_history_position','1') == '0'&&!$this->application->employer_pos)?$required_class:''; ?>" id="employment_history_position">
                        <label><?php echo $this->params->get('field_position_held',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_LONG_POSITION_HELD')); echo ($this->params->get('required_employment_history_position','1')==='0')?'*':''; ?>:</label>
                        <input class="text_area" type="text" name="employer_pos" id="employer_pos" maxlength="250" value = "<?php echo (isset($this->application))?$this->application->employer_pos:"";?>" />
                    </div>
                    <?php endif; ?>
                    <?php if ( $this->params->get('employment_history_from','1') == '1') : ?>
                    <div class="jg_ea_field<?php echo ($this->params->get('required_employment_history_from','1') == '0'&&!$this->application->employer_from)?$required_class:''; ?>" id="employment_history_from">
                        <label><?php echo $this->params->get('field_employer_from_myyyy',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_LONG_FROM_MYYYY')); echo ($this->params->get('required_employment_history_from','1')==='0')?'*':''; ?>:</label>
                        <input type="text" name="employer_from" id="employer_from" maxlength="20" value = "<?php echo (isset($this->application))?$this->application->employer_from:"";?>" />
                    </div>
                    <?php endif; ?>
                    <?php if ( $this->params->get('employment_history_to','1') == '1') : ?>
                    <div class="jg_ea_field<?php echo ($this->params->get('required_employment_history_to','1') == '0'&&!$this->application->employer_to)?$required_class:''; ?>" id="employment_history_to">
                        <label><?php echo $this->params->get('field_employer_to_myyyy',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_LONG_TO_MYYYY')); echo ($this->params->get('required_employment_history_to','1')==='0')?'*':''; ?>:</label>
                        <input type="text" name="employer_to" id="employer_to" maxlength="20" value = "<?php echo (isset($this->application))?$this->application->employer_to:"";?>" />
                    </div>
                    <?php endif; ?>
                    <?php if ( $this->params->get('employment_history_pay','1') == '1') : ?>
                    <div class="jg_ea_field<?php echo ($this->params->get('required_employment_history_pay','1') == '0'&&!$this->application->employer_pay)?$required_class:''; ?>" id="employment_history_pay">
                        <label><?php echo $this->params->get('field_pay_upon_leaving',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_LONG_PAY_UPON_LEAVING')); echo ($this->params->get('required_employment_history_pay','1')==='0')?'*':''; ?>:</label>
                        <input type="text" name="employer_pay" id="employer_pay" maxlength="250" value = "<?php echo (isset($this->application))?$this->application->employer_pay:"";?>" />
                    </div>
                    <?php endif; ?>
                    <?php if ( $this->params->get('employment_history_supervisor','1') == '1') : ?>
                    <div class="jg_ea_field<?php echo ($this->params->get('required_employment_history_supervisor','1') == '0'&&!$this->application->employer_sup)?$required_class:''; ?>" id="employment_history_supervisor">
                        <label><?php echo $this->params->get('field_supervisor',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_LONG_SUPERVISOR')); echo ($this->params->get('required_employment_history_supervisor','1')==='0')?'*':''; ?>:</label>
                        <input type="text" name="employer_sup" id="employer_sup" maxlength="250" value = "<?php echo (isset($this->application))?$this->application->employer_sup:"";?>" />
                    </div>
                    <?php endif; ?>
                    <?php if ( $this->params->get('employment_history_duties','1') == '1') : ?>
                    <div class="jg_ea_field<?php echo ($this->params->get('required_employment_history_duties','1') == '0'&&!$this->application->employer_dut)?$required_class:''; ?>" id="employment_history_duties">
                        <label><?php echo $this->params->get('field_duties',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_LONG_DUTIES')); echo ($this->params->get('required_employment_history_duties','1')==='0')?'*':''; ?>:</label>
                        <input type="text" name="employer_dut" id="employer_dut" maxlength="250" value = "<?php echo (isset($this->application))?$this->application->employer_dut:"";?>" />
                    </div>
                    <?php endif; ?>
                    <?php if ( $this->params->get('employment_history_reason','1') == '1') : ?>
                    <div class="jg_ea_field<?php echo ($this->params->get('required_employment_history_reason','1') == '0'&&!$this->application->employer_leave)?$required_class:''; ?>" id="employment_history_reason">
                        <label><?php echo $this->params->get('field_reason_for_leaving',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_LONG_REASON_FOR_LEAVING')); echo ($this->params->get('required_employment_history_reason','1')==='0')?'*':''; ?>:</label>
                        <input type="text" name="employer_leave" id="employer_leave" maxlength="250" value = "<?php echo (isset($this->application))?$this->application->employer_leave:"";?>" />
                    </div>
                    <?php endif; ?>
                    </fieldset>
                <?php endif; ?>
                <?php if ( $this->params->get('employment_history_1','1') == '1') : ?>
                    <fieldset>
                    <legend><?php echo $this->params->get('field_prior_employer',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_LONG_PRIOR_EMPLOYER')); ?></legend>
                    <?php if ( $this->params->get('employment_history_employer','1') == '1') : ?>
                    <div class="jg_ea_field" id="employment_history_employer1">
                        <label><?php echo $this->params->get('field_employer',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_LONG_EMPLOYER')); ?>:</label>
                        <input type="text" name="employer1" id="employer1" maxlength="250" value = "<?php echo (isset($this->application))?$this->application->employer1:"";?>" />
                    </div>
                    <?php endif; ?>
                    <?php if ( $this->params->get('employment_history_city','1') == '1') : ?>
                    <div class="jg_ea_field" id="employment_history_city1">
                        <label><?php echo $this->params->get('field_employer_city',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_LONG_CITY')); ?>:</label>
                        <input type="text" name="employer1_city" id="employer1_city" maxlength="250" value = "<?php echo (isset($this->application))?$this->application->employer1_city:"";?>" />
                    </div>
                    <?php endif; ?>
                    <?php if ( $this->params->get('employment_history_state','1') == '1') : ?>
                    <div class="jg_ea_field" id="employment_history_state1">
                        <label><?php echo $this->params->get('field_employer_state',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_LONG_STATE')); ?>:</label>
                        <input type="text" name="employer1_state" id="employer1_state" maxlength="20" value = "<?php echo (isset($this->application))?$this->application->employer1_state:"";?>" />
                    </div>
                    <?php endif; ?>
                    <?php if ( $this->params->get('employment_history_zip_code','1') == '1') : ?>
                    <div class="jg_ea_field" id="employment_history_zip_code1">
                        <label><?php echo $this->params->get('field_employer_zip_code',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_LONG_ZIP_CODE')); ?>:</label>
                        <input type="text" name="employer1_zip" id="employer1_zip" maxlength="20" value = "<?php echo (isset($this->application))?$this->application->employer1_zip:"";?>" />
                    </div>
                    <?php endif; ?>
                    <?php if ( $this->params->get('employment_history_phone','1') == '1') : ?>
                    <div class="jg_ea_field" id="employment_history_phone1">
                        <label><?php echo $this->params->get('field_employer_phone',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_LONG_PHONE')); ?>:</label>
                        <input type="text" name="employer1_phone" id="employer1_phone" maxlength="20" value = "<?php echo (isset($this->application))?$this->application->employer1_phone:"";?>" />
                    </div>
                    <?php endif; ?>
                    <?php if ( $this->params->get('employment_history_position','1') == '1') : ?>
                    <div class="jg_ea_field" id="employment_history_position1">
                        <label><?php echo $this->params->get('field_position_held',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_LONG_POSITION_HELD')); ?>:</label>
                        <input type="text" name="employer1_pos" id="employer1_pos" maxlength="250" value = "<?php echo (isset($this->application))?$this->application->employer1_pos:"";?>" />
                    </div>
                    <?php endif; ?>
                    <?php if ( $this->params->get('employment_history_from','1') == '1') : ?>
                    <div class="jg_ea_field" id="employment_history_from1">
                        <label><?php echo $this->params->get('field_employer_from_myyyy',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_LONG_FROM_MYYYY')); ?>:</label>
                        <input type="text" name="employer1_from" id="employer1_from" maxlength="20" value = "<?php echo (isset($this->application))?$this->application->employer1_from:"";?>" />
                    </div>
                    <?php endif; ?>
                    <?php if ( $this->params->get('employment_history_to','1') == '1') : ?>
                    <div class="jg_ea_field" id="employment_history_to1">
                        <label><?php echo $this->params->get('field_employer_to_myyyy',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_LONG_TO_MYYYY')); ?>:</label>
                        <input type="text" name="employer1_to" id="employer1_to" maxlength="20" value = "<?php echo (isset($this->application))?$this->application->employer1_to:"";?>" />
                    </div>
                    <?php endif; ?>
                    <?php if ( $this->params->get('employment_history_pay','1') == '1') : ?>
                    <div class="jg_ea_field" id="employment_history_pay1">
                        <label><?php echo $this->params->get('field_pay_upon_leaving',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_LONG_PAY_UPON_LEAVING')); ?>:</label>
                        <input type="text" name="employer1_pay" id="employer1_pay" maxlength="250" value = "<?php echo (isset($this->application))?$this->application->employer1_pay:"";?>" />
                    </div>
                    <?php endif; ?>
                    <?php if ( $this->params->get('employment_history_supervisor','1') == '1') : ?>
                    <div class="jg_ea_field" id="employment_history_supervisor1">
                        <label><?php echo $this->params->get('field_supervisor',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_LONG_SUPERVISOR')); ?>:</label>
                        <input type="text" name="employer1_sup" id="employer1_sup" maxlength="250" value = "<?php echo (isset($this->application))?$this->application->employer1_sup:"";?>" />
                    </div>
                    <?php endif; ?>
                    <?php if ( $this->params->get('employment_history_duties','1') == '1') : ?>
                    <div class="jg_ea_field" id="employment_history_duties1">
                        <label><?php echo $this->params->get('field_duties',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_LONG_DUTIES')); ?>:</label>
                        <input type="text" name="employer1_dut" id="employer1_dut" maxlength="250" value = "<?php echo (isset($this->application))?$this->application->employer1_dut:"";?>" />
                    </div>
                    <?php endif; ?>
                    <?php if ( $this->params->get('employment_history_reason','1') == '1') : ?>
                    <div class="jg_ea_field" id="employment_history_reason1">
                        <label><?php echo $this->params->get('field_reason_for_leaving',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_LONG_REASON_FOR_LEAVING')); ?>:</label>
                        <input type="text" name="employer1_leave" id="employer1_leave" maxlength="250" value = "<?php echo (isset($this->application))?$this->application->employer1_leave:"";?>" />
                    </div>
                    <?php endif; ?>
                    </fieldset>
                <?php endif; ?>
                <?php if ( $this->params->get('employment_history_2','1') == '1') : ?>
                    <fieldset>
                    <legend><?php echo $this->params->get('field_prior_employer',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_LONG_PRIOR_EMPLOYER')); ?></legend>
                    <?php if ( $this->params->get('employment_history_employer','1') == '1') : ?>
                    <div class="jg_ea_field" id="employment_history_employer2">
                        <label><?php echo $this->params->get('field_employer',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_LONG_EMPLOYER')); ?>:</label>
                        <input type="text" name="employer2" id="employer2" maxlength="250" value = "<?php echo (isset($this->application))?$this->application->employer2:"";?>" />
                    </div>
                    <?php endif; ?>
                    <?php if ( $this->params->get('employment_history_city','1') == '1') : ?>
                    <div class="jg_ea_field" id="employment_history_city2">
                        <label><?php echo $this->params->get('field_employer_city',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_LONG_CITY')); ?>:</label>
                        <input type="text" name="employer2_city" id="employer2_city" maxlength="250" value = "<?php echo (isset($this->application))?$this->application->employer2_city:"";?>" />
                    </div>
                    <?php endif; ?>
                    <?php if ( $this->params->get('employment_history_state','1') == '1') : ?>
                    <div class="jg_ea_field" id="employment_history_state2">
                        <label><?php echo $this->params->get('field_employer_state',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_LONG_STATE')); ?>:</label>
                        <input type="text" name="employer2_state" id="employer2_state" maxlength="20" value = "<?php echo (isset($this->application))?$this->application->employer2_state:"";?>" />
                    </div>
                    <?php endif; ?>
                    <?php if ( $this->params->get('employment_history_zip_code','1') == '1') : ?>
                    <div class="jg_ea_field" id="employment_history_zip_code2">
                        <label><?php echo $this->params->get('field_employer_zip_code',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_LONG_ZIP_CODE')); ?>:</label>
                        <input type="text" name="employer2_zip" id="employer2_zip" maxlength="20" value = "<?php echo (isset($this->application))?$this->application->employer2_zip:"";?>" />
                    </div>
                    <?php endif; ?>
                    <?php if ( $this->params->get('employment_history_phone','1') == '1') : ?>
                    <div class="jg_ea_field" id="employment_history_phone2">
                        <label><?php echo $this->params->get('field_employer_phone',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_LONG_PHONE')); ?>:</label>
                        <input type="text" name="employer2_phone" id="employer2_phone" maxlength="20" value = "<?php echo (isset($this->application))?$this->application->employer2_phone:"";?>" />
                    </div>
                    <?php endif; ?>
                    <?php if ( $this->params->get('employment_history_position','1') == '1') : ?>
                    <div class="jg_ea_field" id="employment_history_position2">
                        <label><?php echo $this->params->get('field_position_held',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_LONG_POSITION_HELD')); ?>:</label>
                        <input type="text" name="employer2_pos" id="employer2_pos" maxlength="250" value = "<?php echo (isset($this->application))?$this->application->employer2_pos:"";?>" />
                    </div>
                    <?php endif; ?>
                    <?php if ( $this->params->get('employment_history_from','1') == '1') : ?>
                    <div class="jg_ea_field" id="employment_history_from2">
                        <label><?php echo $this->params->get('field_employer_from_myyyy',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_LONG_FROM_MYYYY')); ?>:</label>
                        <input type="text" name="employer2_from" id="employer2_from" maxlength="20" value = "<?php echo (isset($this->application))?$this->application->employer2_from:"";?>" />
                    </div>
                    <?php endif; ?>
                    <?php if ( $this->params->get('employment_history_to','1') == '1') : ?>
                    <div class="jg_ea_field" id="employment_history_to2">
                        <label><?php echo $this->params->get('field_employer_to_myyyy',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_LONG_TO_MYYYY')); ?>:</label>
                        <input type="text" name="employer2_to" id="employer2_to" maxlength="20" value = "<?php echo (isset($this->application))?$this->application->employer2_to:"";?>" />
                    </div>
                    <?php endif; ?>
                    <?php if ( $this->params->get('employment_history_pay','1') == '1') : ?>
                    <div class="jg_ea_field" id="employment_history_pay2">
                        <label><?php echo $this->params->get('field_pay_upon_leaving',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_LONG_PAY_UPON_LEAVING')); ?>:</label>
                        <input type="text" name="employer2_pay" id="employer2_pay" maxlength="250" value = "<?php echo (isset($this->application))?$this->application->employer2_pay:"";?>" />
                    </div>
                    <?php endif; ?>
                    <?php if ( $this->params->get('employment_history_supervisor','1') == '1') : ?>
                    <div class="jg_ea_field" id="employment_history_supervisor2">
                        <label><?php echo $this->params->get('field_supervisor',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_LONG_SUPERVISOR')); ?>:</label>
                        <input type="text" name="employer2_sup" id="employer2_sup" maxlength="250" value = "<?php echo (isset($this->application))?$this->application->employer2_sup:"";?>" />
                    </div>
                    <?php endif; ?>
                    <?php if ( $this->params->get('employment_history_duties','1') == '1') : ?>
                    <div class="jg_ea_field" id="employment_history_duties2">
                        <label><?php echo $this->params->get('field_duties',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_LONG_DUTIES')); ?>:</label>
                        <input type="text" name="employer2_dut" id="employer2_dut" maxlength="250" value = "<?php echo (isset($this->application))?$this->application->employer2_dut:"";?>" />
                    </div>
                    <?php endif; ?>
                    <?php if ( $this->params->get('employment_history_reason','1') == '1') : ?>
                    <div class="jg_ea_field" id="employment_history_reason2">
                        <label><?php echo $this->params->get('field_reason_for_leaving',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_LONG_REASON_FOR_LEAVING')); ?>:</label>
                        <input type="text" name="employer2_leave" id="employer2_leave" maxlength="250" value = "<?php echo (isset($this->application))?$this->application->employer2_leave:"";?>" />
                    </div>
                    <?php endif; ?>
                    </fieldset>
                <?php endif; ?>
                <?php if ( $this->params->get('employment_history_3','1') == '1') : ?>
                    <fieldset>
                    <legend><?php echo $this->params->get('field_prior_employer',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_LONG_PRIOR_EMPLOYER')); ?></legend>
                    <?php if ( $this->params->get('employment_history_employer','1') == '1') : ?>
                    <div class="jg_ea_field" id="employment_history_employer3">
                        <label><?php echo $this->params->get('field_employer',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_LONG_EMPLOYER')); ?>:</label>
                        <input type="text" name="employer3" id="employer3" maxlength="250" value = "<?php echo (isset($this->application))?$this->application->employer3:"";?>" />
                    </div>
                    <?php endif; ?>
                    <?php if ( $this->params->get('employment_history_city','1') == '1') : ?>
                    <div class="jg_ea_field" id="employment_history_city3">
                        <label><?php echo $this->params->get('field_employer_city',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_LONG_CITY')); ?>:</label>
                        <input type="text" name="employer3_city" id="employer3_city" maxlength="250" value = "<?php echo (isset($this->application))?$this->application->employer3_city:"";?>" />
                    </div>
                    <?php endif; ?>
                    <?php if ( $this->params->get('employment_history_state','1') == '1') : ?>
                    <div class="jg_ea_field" id="employment_history_state3">
                        <label><?php echo $this->params->get('field_employer_state',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_LONG_STATE')); ?>:</label>
                        <input type="text" name="employer3_state" id="employer3_state" maxlength="20" value = "<?php echo (isset($this->application))?$this->application->employer3_state:"";?>" />
                    </div>
                    <?php endif; ?>
                    <?php if ( $this->params->get('employment_history_zip_code','1') == '1') : ?>
                    <div class="jg_ea_field" id="employment_history_zip_code3">
                        <label><?php echo $this->params->get('field_employer_zip_code',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_LONG_ZIP_CODE')); ?>:</label>
                        <input type="text" name="employer3_zip" id="employer3_zip" maxlength="20" value = "<?php echo (isset($this->application))?$this->application->employer3_zip:"";?>" />
                    </div>
                    <?php endif; ?>
                    <?php if ( $this->params->get('employment_history_phone','1') == '1') : ?>
                    <div class="jg_ea_field" id="employment_history_phone3">
                        <label><?php echo $this->params->get('field_employer_phone',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_LONG_PHONE')); ?>:</label>
                        <input type="text" name="employer3_phone" id="employer3_phone" maxlength="20" value = "<?php echo (isset($this->application))?$this->application->employer3_phone:"";?>" />
                    </div>
                    <?php endif; ?>
                    <?php if ( $this->params->get('employment_history_position','1') == '1') : ?>
                    <div class="jg_ea_field" id="employment_history_position3">
                        <label><?php echo $this->params->get('field_position_held',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_LONG_POSITION_HELD')); ?>:</label>
                        <input type="text" name="employer3_pos" id="employer3_pos" maxlength="250" value = "<?php echo (isset($this->application))?$this->application->employer3_pos:"";?>" />
                    </div>
                    <?php endif; ?>
                    <?php if ( $this->params->get('employment_history_from','1') == '1') : ?>
                    <div class="jg_ea_field" id="employment_history_from3">
                        <label><?php echo $this->params->get('field_employer_from_myyyy',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_LONG_FROM_MYYYY')); ?>:</label>
                        <input type="text" name="employer3_from" id="employer3_from" maxlength="20" value = "<?php echo (isset($this->application))?$this->application->employer3_from:"";?>" />
                    </div>
                    <?php endif; ?>
                    <?php if ( $this->params->get('employment_history_to','1') == '1') : ?>
                    <div class="jg_ea_field" id="employment_history_to3">
                        <label><?php echo $this->params->get('field_employer_to_myyyy',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_LONG_TO_MYYYY')); ?>:</label>
                        <input type="text" name="employer3_to" id="employer3_to" maxlength="20" value = "<?php echo (isset($this->application))?$this->application->employer3_to:"";?>" />
                    </div>
                    <?php endif; ?>
                    <?php if ( $this->params->get('employment_history_pay','1') == '1') : ?>
                    <div class="jg_ea_field" id="employment_history_pay3">
                        <label><?php echo $this->params->get('field_pay_upon_leaving',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_LONG_PAY_UPON_LEAVING')); ?>:</label>
                        <input type="text" name="employer3_pay" id="employer3_pay" maxlength="250" value = "<?php echo (isset($this->application))?$this->application->employer3_pay:"";?>" />
                    </div>
                    <?php endif; ?>
                    <?php if ( $this->params->get('employment_history_supervisor','1') == '1') : ?>
                    <div class="jg_ea_field" id="employment_history_supervisor3">
                        <label><?php echo $this->params->get('field_supervisor',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_LONG_SUPERVISOR')); ?>:</label>
                        <input type="text" name="employer3_sup" id="employer3_sup" maxlength="250" value = "<?php echo (isset($this->application))?$this->application->employer3_sup:"";?>" />
                    </div>
                    <?php endif; ?>
                    <?php if ( $this->params->get('employment_history_duties','1') == '1') : ?>
                    <div class="jg_ea_field" id="employment_history_duties3">
                        <label><?php echo $this->params->get('field_duties',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_LONG_DUTIES')); ?>:</label>
                        <input type="text" name="employer3_dut" id="employer3_dut" maxlength="250" value = "<?php echo (isset($this->application))?$this->application->employer3_dut:"";?>" />
                    </div>
                    <?php endif; ?>
                    <?php if ( $this->params->get('employment_history_reason','1') == '1') : ?>
                    <div class="jg_ea_field" id="employment_history_reason3">
                        <label><?php echo $this->params->get('field_reason_for_leaving',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_LONG_REASON_FOR_LEAVING')); ?>:</label>
                        <input type="text" name="employer3_leave" id="employer3_leave" maxlength="250" value = "<?php echo (isset($this->application))?$this->application->employer3_leave:"";?>" />
                    </div>
                    <?php endif; ?>
                    </fieldset>
                <?php endif; ?>
            <?php endif; ?>
                   
            <?php if ($this->params->get('job_related_skills','1') == '1') : ?>
            <?php if ($requiredgroups['req_skills']) { 
                    $group_css = "h3#panel_6_id a span, dt.panel_6_id span h3 a:link, dt.panel_6_id span h3 a:visited { color: red; }"; $document->addStyleDeclaration($group_css); } ?>
                <?php echo ($dtype != 'none') ?
                        JHtml::_( $dtype.'.panel',  $this->params->get('field_skills',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_LONG_SKILLS')), 'panel_6_id') :
                        "<h4>". $this->params->get('field_skills',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_LONG_SKILLS'))."</h4>";
                ?>
                <fieldset>
                <legend><?php echo $this->params->get('field_job_related_skills',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_LONG_JOB_RELATED_SKILLS')); ?></legend>
                <?php if ($this->params->get('job_related_skills_q1','1') == '1' || 
                            $this->params->get('job_related_skills_q2','1') == '1' ||
                            $this->params->get('job_related_skills_q2_reason','1') == '1' ||
                            $this->params->get('job_related_skills_q3','1') == '1' ||
                            $this->params->get('job_related_skills_q3_reason','1') == '1' ||
                            $this->params->get('job_related_skills_states','1') == '1' ) : ?>
                <?php if ($this->params->get('job_related_skills_text','1') == '1') : ?>
                <div class="jg_ea_field" id="job_related_skills">
                    <div class="sub_title"><?php echo $this->params->get('field_vehicle_questions',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_LONG_VEHICLE_QUESTIONS')); ?>:</div>
                </div>
                <?php endif; ?>
                <?php endif; ?>
                <?php $qcounter = 1; ?>
                <?php if ( $this->params->get('job_related_skills_q1','1') == '1') : ?>
                <div class="jg_ea_field" id="job_related_skills_q1">
                    <div class="question_row">
                        <span><?php echo $qcounter.")&nbsp;"; $qcounter++; 
                            echo $this->params->get('field_vehicle_question_1',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_LONG_VEHICLE_QUESTION_1')); ?></span>
                        <div class="options"><?php echo $this->options['driver_license']; ?></div>
                    </div>
                </div>
                <div class="jg_ea_field<?php echo ($this->application->driver_license == $this->params->get('force_vquestion_1_followup','1')&&(!$this->application->dl_number||!$this->application->dl_issued))?$required_class:''; ?>" id="job_related_skills_q1_followup">
                    <div class="question_row">
                        <span>&nbsp;</span>
                        <div class="question"><?php echo $this->params->get('field_vehicle_question_1_followup_a',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_LONG_VEHICLE_QUESTION_1_FOLLOWUP_A')); ?>:</div>
                    </div>
                    <div class="input_row">
                        <span>&nbsp;</span>
                        <input type="text" name="dl_number" id="dl_number"  maxlength="250" value = "<?php echo (isset($this->application))?$this->application->dl_number:"";?>" />
                    </div>
                    <div class="question_row">
                        <span>&nbsp;</span>
                        <div class="question"><?php echo $this->params->get('field_vehicle_question_1_followup_b',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_LONG_VEHICLE_QUESTION_1_FOLLOWUP_B')); ?>:</div>
                    </div>
                    <div class="input_row">
                        <span>&nbsp;</span>
                        <input type="text" name="dl_issued" id="dl_issued" maxlength="250" value = "<?php echo (isset($this->application))?$this->application->dl_issued:"";?>" />
                    </div>
                </div>
                <?php endif; ?>
                <?php if ( $this->params->get('job_related_skills_q2','1') == '1') : ?>
                <div class="jg_ea_field" id="job_related_skills_q2">
                    <div class="question_row">
                        <span><?php echo $qcounter.")&nbsp;"; $qcounter++; 
                            echo $this->params->get('field_vehicle_question_2',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_LONG_VEHICLE_QUESTION_2')); ?></span>
                        <div class="options"><?php echo $this->options['driving_offense']; ?></div>
                    </div>
                </div>
                <?php endif; ?>
                <?php if ( $this->params->get('job_related_skills_q2_reason','1') == '1') : ?>
                <div class="jg_ea_field<?php echo ($this->application->driving_offense == $this->params->get('force_vquestion_2_followup','1')&&(!$this->application->driving_offense_reason))?$required_class:''; ?>" id="job_related_skills_q2_reason">
                    <div class="question_row">
                        <span>&nbsp;</span>
                        <div class="question"><?php echo $this->params->get('field_vehicle_question_2_followup',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_LONG_VEHICLE_QUESTION_2_FOLLOWUP')); ?></div>
                    </div>
                    <div class="input_row">
                        <span>&nbsp;</span>
                        <input type="text" name="driving_offense_reason" id="driving_offense_reason" maxlength="250" value ="<?php echo (isset($this->application))?$this->application->driving_offense_reason:""; ?>" />
                    </div>
                </div>
                <?php endif; ?>
                <?php if ( $this->params->get('job_related_skills_q3','1') == '1') : ?>
                <div class="jg_ea_field" id="job_related_skills_q3">
                    <div class="question_row">
                        <span><?php echo $qcounter.")&nbsp;"; $qcounter++; 
                            echo $this->params->get('field_vehicle_question_3',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_LONG_VEHICLE_QUESTION_3')); ?></span>
                        <div class="options"><?php echo $this->options['dl_modified']; ?></div>
                    </div>
                </div>
                <?php endif; ?>
                <?php if ( $this->params->get('job_related_skills_q3_reason','1') == '1') : ?>
                <div class="jg_ea_field<?php echo ($this->application->dl_modified == $this->params->get('force_vquestion_3_followup','1')&&(!$this->application->dl_modified_reason))?$required_class:''; ?>" id="job_related_skills_q3_reason">
                    <div class="question_row">
                        <span>&nbsp;</span>
                        <div class="question"><?php echo $this->params->get('field_vehicle_question_3_followup',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_LONG_VEHICLE_QUESTION_3_FOLLOWUP')); ?></div>
                    </div>
                    <div class="input_row">
                        <span>&nbsp;</span>
                        <input type="text" name="dl_modified_reason" id="dl_modified_reason" maxlength="250" value ="<?php echo (isset($this->application))?$this->application->dl_modified_reason:""; ?>" />
                    </div>
                </div>
                <?php endif; ?>
                <?php if ( $this->params->get('job_related_skills_states','1') == '1') : ?>
                <div class="jg_ea_field" id="job_related_skills_states">
                    <div class="question_row">
                        <span><?php echo $qcounter.")&nbsp;"; $qcounter++; 
                            echo $this->params->get('field_vehicle_states',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_LONG_VEHICLE_STATES')); ?>:</span>
                    </div>
                    <div class="input_row">
                        <span>&nbsp;</span>
                        <input type="text" name="dl_states" id="dl_states" maxlength="250" value = "<?php echo (isset($this->application))?$this->application->dl_states:"";?>" />
                    </div>
                </div>
                <?php endif; ?>
                <?php if ( $this->params->get('job_related_skills_skills','1') == '1') : ?>
                <div class="jg_ea_field" id="job_related_skills_skills">
                    <div class="question_row">
                        <span>&nbsp;</span>
                        <div class="question"><?php echo $this->params->get('field_other_skills',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_LONG_SKILLS')); ?></div>
                    </div>
                    <div class="input_row">
                        <span>&nbsp;</span>
                        <textarea style="width: 90%;"  name="skills" rows="10" cols="10"><?php echo (isset($this->application))?$this->application->skills:""; ?></textarea>
                    </div>
                </div>
                <?php endif; ?>
                <?php if ( $this->params->get('job_related_skills_designations','1') == '1') : ?>
                <div class="jg_ea_field" id="job_related_skills_designations">
                    <div class="question_row">
                        <span>&nbsp;</span>
                        <div class="question"><?php echo $this->params->get('field_prof_designations',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_LONG_PROF_DESIGNATIONS')); ?></div>
                    </div>
                    <div class="input_row">
                        <span>&nbsp;</span>
                        <textarea style="width: 90%;" name="professional" rows="10" cols="10"><?php echo (isset($this->application))?$this->application->professional:""; ?></textarea>
                    </div>
                </div>
                <?php endif; ?>
                <?php echo $this->lists['lists']; ?>
                </fieldset>
            <?php endif; ?>

            <?php if ($this->params->get('references','1') == '1') : ?>
            <?php if ($requiredgroups['req_references']) { 
                    $group_css = "h3#panel_7_id a span, dt.panel_7_id span h3 a:link, dt.panel_7_id span h3 a:visited { color: red; }"; $document->addStyleDeclaration($group_css); } ?>
                <?php echo ($dtype != 'none') ?
                        JHtml::_( $dtype.'.panel',  $this->params->get('field_references',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_LONG_REFERENCES')), 'panel_7_id') :
                        "<h4>". $this->params->get('field_references',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_LONG_REFERENCES'))."</h4>";
                ?>
                <?php if ($this->params->get('references_1','1') == '1') : ?>
                    <fieldset>
                    <legend><?php echo $this->params->get('field_reference',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_LONG_REFERENCE')); ?></legend>
                    <?php if ( $this->params->get('references_name','1') == '1') : ?>
                    <div class="jg_ea_field<?php echo ($this->params->get('required_references_name','1') == '0'&&!$this->application->ref1_name)?$required_class:''; ?>" id="references_name">
                        <label><?php echo $this->params->get('field_reference_name',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_LONG_NAME')); echo ($this->params->get('required_references_name','1')==='0')?'*':''; ?>:</label>
                        <input type="text" name="ref1_name" id="ref1_name" maxlength="250" value = "<?php echo (isset($this->application))?$this->application->ref1_name:"";?>" />
                    </div>
                    <?php endif; ?>
                    <?php if ( $this->params->get('references_address','1') == '1') : ?>
                    <div class="jg_ea_field<?php echo ($this->params->get('required_references_address','1') == '0'&&!$this->application->ref1_address)?$required_class:''; ?>" id="references_address">
                        <label><?php echo $this->params->get('field_reference_address',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_LONG_ADDRESS')); echo ($this->params->get('required_references_address','1')==='0')?'*':''; ?>:</label>
                        <input type="text" name="ref1_address" id="ref1_address" maxlength="250" value = "<?php echo (isset($this->application))?$this->application->ref1_address:"";?>" />
                    </div>
                    <?php endif; ?>
                    <?php if ( $this->params->get('references_telephone','1') == '1') : ?>
                    <div class="jg_ea_field<?php echo ($this->params->get('required_references_telephone','1') == '0'&&!$this->application->ref1_telephone)?$required_class:''; ?>" id="references_telephone">
                        <label><?php echo $this->params->get('field_reference_telephone',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_LONG_TELEPHONE')); echo ($this->params->get('required_references_telephone','1')==='0')?'*':''; ?>:</label>
                        <input type="text" name="ref1_telephone" id="ref1_telephone" maxlength="250" value = "<?php echo (isset($this->application))?$this->application->ref1_telephone:"";?>" />
                    </div>
                    <?php endif; ?>
                    <?php if ( $this->params->get('references_relationship','1') == '1') : ?>
                    <div class="jg_ea_field<?php echo ($this->params->get('required_references_relationship','1') == '0'&&!$this->application->ref1_relationship)?$required_class:''; ?>" id="references_relationship">
                        <label><?php echo $this->params->get('field_reference_relationship',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_LONG_RELATIONSHIP')); echo ($this->params->get('required_references_relationship','1')==='0')?'*':''; ?>:</label>
                        <input type="text" name="ref1_relationship" id="ref1_relationship" maxlength="250" value = "<?php echo (isset($this->application))?$this->application->ref1_relationship:"";?>" />
                    </div>
                    <?php endif; ?>
                    <?php if ( $this->params->get('references_years_acquainted','1') == '1') : ?>
                    <div class="jg_ea_field<?php echo ($this->params->get('required_references_years','1') == '0'&&!$this->application->ref1_years)?$required_class:''; ?>" id="references_years_acquainted">
                        <label><?php echo $this->params->get('field_reference_years_acquainted',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_LONG_YEARS_ACQUAINTED')); echo ($this->params->get('required_references_years','1')==='0')?'*':''; ?>:</label>
                        <input type="text" name="ref1_years" id="ref1_years" maxlength="250" value = "<?php echo (isset($this->application))?$this->application->ref1_years:"";?>" />
                    </div>
                    <?php endif; ?>
                    </fieldset>
                <?php endif; ?>
                <?php if ($this->params->get('references_2','1') == '1') : ?>    
                    <fieldset>
                    <legend><?php echo $this->params->get('field_reference',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_LONG_REFERENCE')); ?></legend>
                    <?php if ( $this->params->get('references_name','1') == '1') : ?>
                    <div class="jg_ea_field<?php echo ($this->params->get('required_references_name','1') == '0'&&!$this->application->ref2_name)?$required_class:''; ?>" id="references_name2">
                        <label><?php echo $this->params->get('field_reference_name',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_LONG_NAME')); echo ($this->params->get('required_references_name','1')==='0')?'*':''; ?>:</label>
                        <input type="text" name="ref2_name" id="ref2_name" maxlength="250" value = "<?php echo (isset($this->application))?$this->application->ref2_name:"";?>" />
                    </div>
                    <?php endif; ?>
                    <?php if ( $this->params->get('references_address','1') == '1') : ?>
                    <div class="jg_ea_field<?php echo ($this->params->get('required_references_address','1') == '0'&&!$this->application->ref2_address)?$required_class:''; ?>" id="reference_address2">
                        <label><?php echo $this->params->get('field_reference_address',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_LONG_ADDRESS')); echo ($this->params->get('required_references_address','1')==='0')?'*':''; ?>:</label>
                        <input type="text" name="ref2_address" id="ref2_address" maxlength="250" value = "<?php echo (isset($this->application))?$this->application->ref2_address:"";?>" />
                    </div>
                    <?php endif; ?>
                    <?php if ( $this->params->get('references_telephone','1') == '1') : ?>
                    <div class="jg_ea_field<?php echo ($this->params->get('required_references_telephone','1') == '0'&&!$this->application->ref2_telephone)?$required_class:''; ?>" id="references_telephone2">
                        <label><?php echo $this->params->get('field_reference_telephone',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_LONG_TELEPHONE')); echo ($this->params->get('required_references_telephone','1')==='0')?'*':''; ?>:</label>
                        <input type="text" name="ref2_telephone" id="ref2_telephone" maxlength="250" value = "<?php echo (isset($this->application))?$this->application->ref2_telephone:"";?>" />
                    </div>
                    <?php endif; ?>
                    <?php if ( $this->params->get('references_relationship','1') == '1') : ?>
                    <div class="jg_ea_field<?php echo ($this->params->get('required_references_relationship','1') == '0'&&!$this->application->ref2_relationship)?$required_class:''; ?>" id="references_relationship2">
                        <label><?php echo $this->params->get('field_reference_relationship',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_LONG_RELATIONSHIP')); echo ($this->params->get('required_references_relationship','1')==='0')?'*':''; ?>:</label>
                        <input type="text" name="ref2_relationship" id="ref2_relationship" maxlength="250" value = "<?php echo (isset($this->application))?$this->application->ref2_relationship:"";?>" />
                    </div>
                    <?php endif; ?>
                    <?php if ( $this->params->get('references_years_acquainted','1') == '1') : ?>
                    <div class="jg_ea_field<?php echo ($this->params->get('required_references_years','1') == '0'&&!$this->application->ref2_years)?$required_class:''; ?>" id="references_years_acquainted2">
                        <label><?php echo $this->params->get('field_reference_years_acquainted',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_LONG_YEARS_ACQUAINTED')); echo ($this->params->get('required_references_years','1')==='0')?'*':''; ?>:</label>
                        <input type="text" name="ref2_years" id="ref2_years" maxlength="250" value = "<?php echo (isset($this->application))?$this->application->ref2_years:"";?>" />
                    </div>
                    <?php endif; ?>
                    </fieldset>
                <?php endif; ?>
                <?php if ($this->params->get('references_3','1') == '1') : ?>
                    <fieldset>
                    <legend><?php echo $this->params->get('field_reference',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_LONG_REFERENCE')); ?></legend>
                    <?php if ( $this->params->get('references_name','1') == '1') : ?>
                    <div class="jg_ea_field<?php echo ($this->params->get('required_references_name','1') == '0'&&!$this->application->ref3_name)?$required_class:''; ?>" id="references_name3">
                        <label><?php echo $this->params->get('field_reference_name',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_LONG_NAME')); echo ($this->params->get('required_references_name','1')==='0')?'*':''; ?>:</label>
                        <input type="text" name="ref3_name" id="ref3_name" maxlength="250" value = "<?php echo (isset($this->application))?$this->application->ref3_name:"";?>" />
                    </div>
                    <?php endif; ?>
                    <?php if ( $this->params->get('references_address','1') == '1') : ?>
                    <div class="jg_ea_field<?php echo ($this->params->get('required_references_address','1') == '0'&&!$this->application->ref3_address)?$required_class:''; ?>" id="references_address3">
                        <label><?php echo $this->params->get('field_reference_address',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_LONG_ADDRESS')); echo ($this->params->get('required_references_address','1')==='0')?'*':''; ?>:</label>
                        <input type="text" name="ref3_address" id="ref3_address" maxlength="250" value = "<?php echo (isset($this->application))?$this->application->ref3_address:"";?>" />
                    </div>
                    <?php endif; ?>
                    <?php if ( $this->params->get('references_telephone','1') == '1') : ?>
                    <div class="jg_ea_field<?php echo ($this->params->get('required_references_telephone','1') == '0'&&!$this->application->ref3_telephone)?$required_class:''; ?>" id="references_telephone3">
                        <label><?php echo $this->params->get('field_reference_telephone',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_LONG_TELEPHONE')); echo ($this->params->get('required_references_telephone','1')==='0')?'*':''; ?>:</label>
                        <input type="text" name="ref3_telephone" id="ref3_telephone" maxlength="250" value = "<?php echo (isset($this->application))?$this->application->ref3_telephone:"";?>" />
                    </div>
                    <?php endif; ?>
                    <?php if ( $this->params->get('references_relationship','1') == '1') : ?>
                    <div class="jg_ea_field<?php echo ($this->params->get('required_references_relationship','1') == '0'&&!$this->application->ref3_relationship)?$required_class:''; ?>" id="references_relationship3">
                        <label><?php echo $this->params->get('field_reference_relationship',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_LONG_RELATIONSHIP')); echo ($this->params->get('required_references_relationship','1')==='0')?'*':''; ?>:</label>
                        <input type="text" name="ref3_relationship" id="ref3_relationship" maxlength="250" value = "<?php echo (isset($this->application))?$this->application->ref3_relationship:"";?>" />
                    </div>
                    <?php endif; ?>
                    <?php if ( $this->params->get('references_years_acquainted','1') == '1') : ?>
                    <div class="jg_ea_field<?php echo ($this->params->get('required_references_years','1') == '0'&&!$this->application->ref3_years)?$required_class:''; ?>" id="references_years_acquainted3">
                        <label><?php echo $this->params->get('field_reference_years_acquainted',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_LONG_YEARS_ACQUAINTED')); echo ($this->params->get('required_references_years','1')==='0')?'*':''; ?>:</label>
                        <input type="text" name="ref3_years" id="ref3_years" maxlength="250" value = "<?php echo (isset($this->application))?$this->application->ref3_years:"";?>" />
                    </div>
                    <?php endif; ?>
                    </fieldset>
                <?php endif; ?>
                <?php if ($this->params->get('references_4','1') == '1') : ?>
                    <fieldset>
                    <legend><?php echo $this->params->get('field_reference',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_LONG_REFERENCE')); ?></legend>
                    <?php if ( $this->params->get('references_name','1') == '1') : ?>
                    <div class="jg_ea_field<?php echo ($this->params->get('required_references_name','1') == '0'&&!$this->application->ref4_name)?$required_class:''; ?>" id="references_name4">
                        <label><?php echo $this->params->get('field_reference_name',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_LONG_NAME')); echo ($this->params->get('required_references_name','1')==='0')?'*':''; ?>:</label>
                        <input type="text" name="ref4_name" id="ref4_name" maxlength="250" value = "<?php echo (isset($this->application))?$this->application->ref4_name:"";?>" />
                    </div>
                    <?php endif; ?>
                    <?php if ( $this->params->get('references_address','1') == '1') : ?>
                    <div class="jg_ea_field<?php echo ($this->params->get('required_references_address','1') == '0'&&!$this->application->ref4_address)?$required_class:''; ?>" id="references_address4">
                        <label><?php echo $this->params->get('field_reference_address',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_LONG_ADDRESS')); echo ($this->params->get('required_references_address','1')==='0')?'*':''; ?>:</label>
                        <input type="text" name="ref4_address" id="ref4_address" maxlength="250" value = "<?php echo (isset($this->application))?$this->application->ref4_address:"";?>" />
                    </div>
                    <?php endif; ?>
                    <?php if ( $this->params->get('references_telephone','1') == '1') : ?>
                    <div class="jg_ea_field<?php echo ($this->params->get('required_references_telephone','1') == '0'&&!$this->application->ref4_telephone)?$required_class:''; ?>" id="references_telephone4">
                        <label><?php echo $this->params->get('field_reference_telephone',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_LONG_TELEPHONE')); echo ($this->params->get('required_references_telephone','1')==='0')?'*':''; ?>:</label>
                        <input type="text" name="ref4_telephone" id="ref4_telephone" maxlength="250" value = "<?php echo (isset($this->application))?$this->application->ref4_telephone:"";?>" />
                    </div>
                    <?php endif; ?>
                    <?php if ( $this->params->get('references_relationship','1') == '1') : ?>
                    <div class="jg_ea_field<?php echo ($this->params->get('required_references_relationship','1') == '0'&&!$this->application->ref4_relationship)?$required_class:''; ?>" id="references_relationship4">
                        <label><?php echo $this->params->get('field_reference_relationship',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_LONG_RELATIONSHIP')); echo ($this->params->get('required_references_relationship','1')==='0')?'*':''; ?>:</label>
                        <input type="text" name="ref4_relationship" id="ref4_relationship" maxlength="250" value = "<?php echo (isset($this->application))?$this->application->ref4_relationship:"";?>" />
                    </div>
                    <?php endif; ?>
                    <?php if ( $this->params->get('references_years_acquainted','1') == '1') : ?>
                    <div class="jg_ea_field<?php echo ($this->params->get('required_references_years','1') == '0'&&!$this->application->ref4_years)?$required_class:''; ?>" id="references_years_acquainted4">
                        <label><?php echo $this->params->get('field_reference_years_acquainted',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_LONG_YEARS_ACQUAINTED')); echo ($this->params->get('required_references_years','1')==='0')?'*':''; ?>:</label>
                        <input type="text" name="ref4_years" id="ref4_years" maxlength="250" value = "<?php echo (isset($this->application))?$this->application->ref4_years:"";?>" />
                    </div>
                    <?php endif; ?>
                    </fieldset>
                <?php endif; ?>
            <?php endif; ?>
                                       
            <?php if ($this->params->get('text_resume','1') == '1' ||
                      $this->params->get('file_upload','1') == '1') : ?>
                <?php echo ($dtype != 'none') ?
                        JHtml::_( $dtype.'.panel',  $this->params->get('field_resumes',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_LONG_RESUMES')), 'panel_8_id') :
                        "<h4>". $this->params->get('field_resumes',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_LONG_RESUMES'))."</h4>";
                ?>
                <?php if ($this->params->get('text_resume','1') == '1') : ?>
                <fieldset>
                <legend><?php echo $this->params->get('field_text_resume',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_LONG_TEXT_RESUME')); ?></legend>
                <div class="jg_ea_field" id="text_resume">
                    <div class="question_row">
                        <div class="question"><?php echo $this->params->get('field_text_resume_desc',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_LONG_TEXT_RESUME_DESC')); ?></div>
                    </div>
                    <div class="input_row">
                        <textarea style="width: 90%" rows="10" cols="10" name="text_resume"><?php echo (isset($this->application))?$this->application->text_resume:""; ?></textarea>
                    </div>
                </div>
                </fieldset>
                <?php endif; ?>
                <?php if ($this->params->get('file_upload','1') == '1') : ?>
                <fieldset>
                <legend><?php echo $this->params->get('field_upload_file',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_LONG_UPLOAD_FILE')); ?></legend>
                <?php if ((int)$this->params->get('file_upload_count','1') == 1) : ?>
                <div class="jg_ea_field" id="file_upload_div">
                    <div class="question_row">
                        <div class="question"><?php echo $this->params->get('field_upload_file_desc',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_LONG_UPLOAD_FILE_DESC')); ?>&nbsp;<span style="font-size: smaller;">(<?php
                                echo $this->params->get('field_permitted_types',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_LONG_PERMITTED_FILE_TYPES')); ?>:&nbsp;<?php 
                                echo $this->params->get('file_upload_types','doc,docx,pdf,txt'); ?>&nbsp;-&nbsp;<?php
                                echo $this->params->get('field_max_file_size',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_LONG_MAX_FILE_SIZE')); ?>:&nbsp;<?php  
                                echo $this->params->get('file_upload_max_size','1045876'); ?>&nbsp;bytes)</span></div>
                    </div>
                    <div class="followup_row">
                        <input type="hidden" id="file_name" name="file_name" value="<?php echo (isset($this->application->file_name))?$this->application->file_name:""; ?>" />
                        <input type="file" onchange="document.getElementById('file_name').value=this.value" name="file_upload" id="file_upload" title="Pick a file to upload" size="50" value="<?php echo ( isset($this->application->file_name) ) ? $this->application->file_name:"";?>"/>
                    </div>
                </div>
                <?php else: ?>
                <?php 
                    $parms_bad = false; $count = 0;
                    $files_field_upload_file_desc = explode("|", $this->params->get('field_upload_file_desc',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_LONG_UPLOAD_FILE_DESC')));
                    $files_field_upload_file_desc_count = count($files_field_upload_file_desc);
                    $max_defined = $files_field_upload_file_desc_count;
                    $files_field_permitted_types = explode("|", $this->params->get('field_permitted_types',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_LONG_PERMITTED_FILE_TYPES')));
                    $files_field_permitted_types_count = count($files_field_permitted_types);
                    if ($max_defined !== $files_field_permitted_types_count) $parms_bad = true;
                    $files_file_upload_types = explode("|", $this->params->get('file_upload_types','doc,docx,pdf,txt'));
                    $files_file_upload_types_count = count($files_file_upload_types);
                    if ($max_defined !== $files_file_upload_types_count) $parms_bad = true;
                    $files_field_max_file_size = explode("|", $this->params->get('field_max_file_size',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_LONG_MAX_FILE_SIZE')));
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
                <div class="jg_ea_field" id="file_upload_div">
                    <div class="question_row">
                        <div class="question"><?php echo $files_field_upload_file_desc[$count]; ?>&nbsp;<span style="font-size: smaller;">(<?php
                                echo $files_field_permitted_types[$count]; ?>:&nbsp;<?php 
                                echo $files_file_upload_types[$count]; ?>&nbsp;-&nbsp;<?php
                                echo $files_field_max_file_size[$count]; ?>:&nbsp;<?php  
                                echo $files_file_upload_max_size[$count]; ?>&nbsp;bytes)</span></div>
                    </div>
                    <div class="followup_row">
                        <input type="hidden" id="file_name<?php echo $count; ?>" name="file_name[]" value="<?php // echo (isset($this->application->file_name))?$this->application->file_name:""; ?>" />
                        <input type="file" name="jform[file_name][]" id="file_upload<?php echo $count; ?>" title="Pick a file to upload" size="50" value="<?php // echo ( isset($this->application->file_name) ) ? $this->application->file_name:"";?>"/>
                    </div>
                </div>
                <?php        
                        $count++;
                        }
                    }
                    
                ?>
                <?php endif; ?>
                </fieldset>
                <?php endif; ?>
            <?php endif; ?>


            <?php if ($this->params->get('agreement','1') == '1') : ?>
                <?php echo ($dtype != 'none') ?
                        JHtml::_( $dtype.'.panel',  $this->params->get('field_agreement',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_LONG_AGREEMENT')), 'panel_9_id') :
                        "<h4>". $this->params->get('field_agreement',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_LONG_AGREEMENT'))."</h4>";
                ?>
                <fieldset>
                <legend><?php echo $this->params->get('field_certification_agreement',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_LONG_CERTIFICATION_AGREEMENT')); ?></legend>
                <?php if (isset($this->agreement)) echo $this->agreement->introtext.$this->agreement->fulltext; ?>
                <?php $bullet = 0; ?>
                <?php if ($this->params->get('bullet1_on','1') == '1') : ?>
                <?php $bullet++; ?>
                <div style="padding-top: 10px;" class="question_row">
                    <span><?php echo $bullet; ?>.&nbsp;<?php 
                        echo $this->params->get('certification_agreement_bullet1',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_LONG_CERTIFICATION_AGREEMENT_BULLET1'));
                            ?></span>
                </div>
                <?php endif; ?>
                <?php if ($this->params->get('bullet2_on','1') == '1') : ?>
                <?php $bullet++; ?>
                <div style="padding-top: 10px;" class="question_row">
                    <span><?php echo $bullet; ?>.&nbsp;<?php
                        echo $this->params->get('certification_agreement_bullet2',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_LONG_CERTIFICATION_AGREEMENT_BULLET2'));
                            ?></span>
                </div>
                <?php endif; ?>
                <?php if ($this->params->get('bullet3_on','1') == '1') : ?>
                <?php $bullet++; ?>
                <div style="padding-top: 10px;" class="question_row">
                    <span><?php echo $bullet; ?>.&nbsp;<?php
                        echo $this->params->get('certification_agreement_bullet3',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_LONG_CERTIFICATION_AGREEMENT_BULLET3'));
                            ?></span>
                </div>
                <?php endif; ?>
                <?php if ($this->params->get('bullet4_on','1') == '1') : ?>
                <?php $bullet++; ?>
                <div style="padding-top: 10px;" class="question_row">
                    <span><?php echo $bullet; ?>.&nbsp;<?php
                        echo $this->params->get('certification_agreement_bullet4',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_LONG_CERTIFICATION_AGREEMENT_BULLET4'));
                            ?></span>
                </div>
                <?php endif; ?>
                <?php if ($this->params->get('bullet5_on','1') == '1') : ?>
                <?php $bullet++; ?>
                <div style="padding-top: 10px;" class="question_row">
                    <span><?php echo $bullet; ?>.&nbsp;<?php
                        echo $this->params->get('certification_agreement_bullet5',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_LONG_CERTIFICATION_AGREEMENT_BULLET5'));
                            ?></span>
                </div>
                <?php endif; ?>
                <?php if ($this->params->get('bullet6_on','1') == '1') : ?>
                <?php $bullet++; ?>
                <div style="padding-top: 10px;" class="question_row">
                    <span><?php echo $bullet; ?>.&nbsp;<?php
                         echo $this->params->get('certification_agreement_bullet6',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_LONG_CERTIFICATION_AGREEMENT_BULLET6'));
                            ?></span>
                </div>
                <?php endif; ?>
                <?php if ($this->params->get('display_custom_yes_no','0') == '1') : ?>
                <div style="padding-top: 10px;" class="question_row">
                    <span><?php echo $this->params->get('text_custom_yes_no',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_LONG_SH_CUSTOM_YES_NO_TEXT')); ?></span>
                    <div><?php echo $this->options['custom_yes_no']; ?></div>
                </div>
                <?php endif; ?>
                </fieldset>
            <?php endif; ?>

            <?php if ($dtype != 'none') echo JHtml::_( $dtype.'.end'); ?>       
                    
            <?php if ($this->params->get('use_captcha','1') == '1') : ?>
            <fieldset>
                <legend><?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_LONG_CAPTCHA_TEXT'); ?></legend>
                <div class="jg_ea_field" id="captcha">
                    <div class="question_row">
                        <div class="number">&nbsp;</div>
                        <div class="question"><?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_LONG_ENTER_CAPTCHA'); ?></div>
                    </div>
                    <div class="followup_row">
                        <div class="number">&nbsp;</div>
                        <input onclick="if (this.value=='<?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_LONG_ENTER_CAPTCHA_INSTRUCTIONS'); ?>') this.value='';" type="text" name="captcha_entered" id="captcha_entered" maxlength="8" value="<?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_LONG_ENTER_CAPTCHA_INSTRUCTIONS'); ?>" />&nbsp;
                        <img name="captcha_img" id="captcha_img" alt="captcha" src="<?php echo 'index.php?option=com_jobgrokapp&amp;view=application&amp;format=captcha&amp;Itemid='.JRequest::getVar('Itemid'); ?>" />
                    </div>
                </div>
            </fieldset>
            <?php endif; ?>
            <?php if ($this->params->get('use_captcha','1') == '2') : ?>
            <fieldset>
                <legend><?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_LONG_CAPTCHA_TEXT'); ?></legend>
                <div class="jg_ea_field" id="captcha">
                    <div class="question_row">
                        <div class="number">&nbsp;</div>
                        <div class="question"><?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_LONG_ENTER_CAPTCHA'); ?></div>
                    </div>
                    <div class="followup_row">
                        <div class="number">&nbsp;</div>
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
                    </div>
                </div>
            </fieldset>
            <?php endif; ?>            
            <?php if ($this->params->get('signature','1') == '1') : ?>
            <fieldset>
                <legend><?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_LONG_CERTIFICATION_AGREEMENT_SIGNATURE'); ?></legend>
                <div class="jg_ea_field<?php echo ($this->params->get('required_signature','1')=='0'&&!$this->application->signature)?$required_class:''; ?>" id="certification_agreement_signature">
                    <div class="question_row">
                        <div class="number">&nbsp;</div>
                        <div class="question"><?php echo $this->params->get('field_type_name_in_signature_box',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_LONG_TYPE_NAME_IN_SIGNATURE_BOX')); echo ($this->params->get('required_signature','1')==='0')?'*':''; ?>:</div>
                    </div>
                    <div class="followup_row">
                        <div class="number">&nbsp;</div>
                        <input style="width: 60%;" type="text" name="signature" id="signature" maxlength="250" value = "<?php echo (isset($this->application))?$this->application->signature:"";?>" />
                        <input class="submitbutton" type="button" name="submit_app" onclick="document.adminForm.submit();" value="<?php echo $this->params->get('submit_application_text',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_LONG_SUBMIT_APPLICATION'));  ?>" />

                    </div>
                    <div class="followup_row">
                        <div class="number">&nbsp;</div>
                        <div class="followup"><?php if ($this->params->get('app_create_date_location','bottom') == 'bottom') {  
                            echo $this->params->get('app_todays_date_text',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_LONG_TODAYS_DATE')); ?>:&nbsp;<?php
                            $timenow = new JDate();
                            $mysqlTime = JHTML::_('date', $timenow,$this->params->get('jg_date_format','Y-m-d G:i:s'));
                            echo "<span id='jg_date_format'>".$mysqlTime."</span>";
                        }
                        ?></div>
                    </div>
                </div>
            </fieldset>
            <?php else : ?>
            <div class="question_row" style="text-align: center; width: 100%;">
                <input class="submitbutton" type="button" name="submit_app" onclick="document.adminForm.submit();" value="<?php echo $this->params->get('submit_application_text',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_LONG_SUBMIT_APPLICATION'));  ?>" />
            </div>
            <?php endif; ?>
            <input type="hidden" name="id" value="<?php echo (isset($this->application))?$this->application->id:""; ?>" />
            <input type="hidden" name="controller" value="application" />
            <input type="hidden" name="view" value="application" />
            <input type="hidden" name="source" value="long" />
            <input type="hidden" name="layout" value="static" />
            <input type="hidden" name="uid" value="<?php echo (isset($this->application->uid)?$this->application->uid:$this->uid); ?>" />
            <input type="hidden" name="option" value="com_jobgrokapp" />
            <input type="hidden" name="Itemid" value="<?php echo (isset($this->application->Itemid)?$this->application->Itemid:$this->Itemid) ?>" />
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
<div id="credits" style="width: 100%"><?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_LONG_POWERED_BY'); 
?>&nbsp;<a href="http://www.jobgrok.com"><?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_LONG_JOBGROK'); ?></a></div>
