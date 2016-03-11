<?php

/**
 *
 *
 * This is the cresponsive.php view layout for jobgrokapp
 *
 * Created: November 18, 2014, 3:25 am
 *
 * Subversion Details
 * $Date: 2014-03-25 21:44:12 -0500 (Tue, 25 Mar 2014) $
 * $Revision: 5883 $
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

jimport('bootstrap.framework');

if ($this->params->get('use_session_keepalive','0') == '1') { JHTML::_('behavior.keepalive'); }

JHTML::_('behavior.calendar');

$document =JFactory::getDocument();
$editor =JFactory::getEditor();

$css_static = ""; // "td { white-space: nowrap; } input { width: 100%; }";
$css_other = $this->params->get('other_css','');
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
$document->addStyleDeclaration($css_static);

$required_class = "";
if ($this->retry) $required_class = " error";
?>

<section class="position-app-form" id="positionform">
    <div class="container">
    	<div class="row">
    		<div class="position-app-center">                	
    			<div class="enquiries-form-box">                    	
                    <div class="jg_responsive">
                    <?php if ($this->params->get('display_title','1') == '1') : ?>
                    <h1 id="jg_title"><?php echo $this->params->get('title'); ?></h1>
                    <?php endif; ?>
                    <h4>Apply now!</h4>
                    <div class="enquiries-form">
                        <div class="required">* required</div>
                    <?php
                    if ($this->params->get('app_create_date_location','bottom') == 'top') {
                        echo $this->params->get('app_todays_date_text',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_CRESPONSIVE_TODAYS_DATE')); ?>:&nbsp;<?php 
                        $timenow = new JDate();
                        $mysqlTime = JHTML::_('date', $timenow,$this->params->get('jg_date_format','Y-m-d G:i:s'));
                        echo "<span id='jg_date_format'>".$mysqlTime."</span>";
                        //echo date($this->params->get('jg_date_format','Y-m-d H:i:s')); 
                    }
                    ?>
                    <?php if ($this->params->get('file_upload','1') == '0') : ?>
                    <form action="index.php" method="post" name="adminForm" id="adminForm" >
                    <?php else : ?>
                    <form action="index.php" method="post" name="adminForm" id="adminForm"  enctype="multipart/form-data">
                    <?php endif; ?>
                    <?php if ($this->params->get('display_intro','1') == '1') : ?>
                    <fieldset id="jg_introtext">
                        <strong id="jg_introtext_bold"><?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_CRESPONSIVE_INTRO_BOLD'); ?></strong>
                        <?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_CRESPONSIVE_INTRO_TEXT'); ?>
                    </fieldset>
                    <?php endif; ?>
                    <?php if ($this->params->get('job_description_header','1') == '1' && isset($this->posting_id)) : ?>
                    <fieldset>
                        <legend><?php echo JHTML::_('jobgrokapp.posting',$this->posting_id,true); ?> </legend>
                        <?php echo JHTML::_('jobgrokapp.job_description',$this->posting_id); ?>
                    </fieldset>
                    <?php endif; ?>
                    
                    <!-- PERSONAL INFORMATION -->
                    <?php if ($this->params->get('personal_information','1') == '1') : ?>
                    <?php /*?><fieldset id="jg_personal_information"><?php */?>
                        <?php /*?><legend><?php echo $this->params->get('field_personal_information',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_CRESPONSIVE_PERSONAL_INFORMATION')); ?></legend><?php */?>
                        <?php 
                            $jg_fields['personal_information'][] = array( "first_name", "middle_name", "last_name" );
                            $jg_fields['personal_information'][] = array( "home_phone", "work_phone", "cell_phone" );
                            $jg_fields['personal_information'][] = array( "email_address", "ssn");
                            $span = 0;
                            
                            $jtext['first_name']            = $this->params->get('field_first_name', JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_CRESPONSIVE_FIRST_NAME'));
                            $jtext['middle_name']           = $this->params->get('field_middle_name', JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_CRESPONSIVE_MIDDLE_NAME'));
                            $jtext['last_name']             = $this->params->get('field_last_name', JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_CRESPONSIVE_LAST_NAME'));
                            $jtext['home_phone']            = $this->params->get('field_home_phone', JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_CRESPONSIVE_HOME_PHONE'));
                            $jtext['work_phone']            = $this->params->get('field_work_phone', JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_CRESPONSIVE_WORK_PHONE'));
                            $jtext['cell_phone']            = $this->params->get('field_cell_phone', JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_CRESPONSIVE_CELL_PHONE'));
                            $jtext['email_address']         = $this->params->get('field_email_address', JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_CRESPONSIVE_EMAIL_ADDRESS'));
                            $jtext['ssn']                   = $this->params->get('field_ssn', JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_CRESPONSIVE_SSN'));
							
                            foreach ($jg_fields["personal_information"] as $jgf) {
                                $span = 0;
                                foreach ($jgf as $f) { $span = $span + (int)$this->params->get('personal_information_'.$f, '1'); }
                                $css_span = "span".(string)(12/$span); 
                                // 1 or more fields in row is/are displayed
                                if ($span > 0) {
                                    echo '<div class="row-fluid">'."\n";
                                    foreach ($jgf as $f) {
                                        if ($this->params->get('personal_information_'.$f,'1') == '1') {
                                            $iserror = '';
                                            if (in_array($f, $this->application->flag_fields)) $iserror = 'error';
											echo '<div class="form-fild">'."\n";
                                            echo '<div class="'.$css_span.' jg_personal_information_'.$f.'">'."\n";
                                            echo '<div class="control-group '.$iserror.' '.(($this->params->get('required_'.$f,'1')=='0'&&!$this->application->$f)?$required_class:'').'">'."\n";
                                            //echo '<label class="control-label '.$iserror.'">'.($this->params->get('field_'.$f, $jtext[$f])).(($this->params->get('required_'.$f,'1')=='0')?'*':'').'</label>'."\n";
                                            echo '<input class="span12 '.$iserror.' enquiries-input" type="text" name="'.$f.'" id="'.$f.'" maxlength="250" value = "'.((isset($this->application))?$this->application->$f:'').'" />'."\n";
                                            echo '</div>'."\n";
                                            echo '</div>'."\n";
											echo '</div>'."\n";
                                        }
                                    }
                                    echo '</div>'."\n";
                                }
                            }
                        ?>
                
                            <?php if ($this->params->get('personal_photo','1') == '0') : ?>
                            <div class="row-fluid">
                                <label><?php echo $this->params->get('field_personal_photo',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_CRESPONSIVE_PERSONAL_PHOTO')); ?></label>
                            </div>
                            <?php 
                                echo "<p class='muted'>(";
                                echo $this->params->get('field_personal_photo_allowed',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_CRESPONSIVE_PERSONAL_PHOTO_MIMETYPES_ALLOWED'));
                                echo ":&nbsp;";
                                echo $this->params->get('personal_photo_mimetypes','image/png,image/jpeg,image/gif').")"; 
                                echo "&nbsp;(";
                                echo $this->params->get('field_personal_photo_max_size',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_CRESPONSIVE_PERSONAL_PHOTO_MAX_SIZE'));
                                echo ":&nbsp;";
                                echo $this->params->get('personal_photo_maxupload','1048576')."Bytes )</p>"."\n";
                            ?><input type="file" name="photo" id="photo" />
                            <?php endif; ?>
                    <?php /*?></fieldset><?php */?>
                    <?php endif; ?>
                    
                    <?php if ($this->params->get('addresses','1') == '1') : ?>
                    <fieldset id="jg_addresses">
                
                        <legend><?php echo $this->params->get('field_addresses',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_CRESPONSIVE_ADDRESSES')); ?></legend>
                        <?php
                        $jg_fields = null;
                        $jg_fields['cols']['1'] = 'current';
                        $jg_fields['cols']['2'] = '1';
                        $jg_fields['cols']['3'] = '2';
                
                        $jg_fields['addresses']['1'] = array("street", "city", "state", "zip_code", "from_date", "to_date");
                        $jg_fields['addresses']['2'] = array("street1", "city1", "state1", "zip_code1", "from_date1", "to_date1");
                        $jg_fields['addresses']['3'] = array("street2", "city2", "state2", "zip_code2", "from_date2", "to_date2");
                        $span = 0;
                        
                        $param_street       = array("street", "street1", "street2");
                        $param_city         = array("city", "city1", "city2");
                        $param_state        = array("state", "state1", "state2");
                        $param_zip_code     = array("zip_code", "zip_code1", "zip_code2");
                        $param_from_date    = array("from_date", "from_date1", "from_date2");
                        $param_to_date      = array("to_date", "to_date1", "to_date2");
                
                        $jtext['current'] 	= $this->params->get('field_current_address', JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_CRESPONSIVE_CURRENT_ADDRESS'));
                        $jtext['1'] 		= $this->params->get('field_prior_address', JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_CRESPONSIVE_PRIOR_ADDRESS'));
                        $jtext['2'] 		= $this->params->get('field_prior_address', JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_CRESPONSIVE_PRIOR_ADDRESS'));
                
                
                        $jtext['street'] 	= $this->params->get('field_street', JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_CRESPONSIVE_STREET'));
                        $jtext['street1'] 	= $this->params->get('field_street', JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_CRESPONSIVE_STREET'));
                        $jtext['street2'] 	= $this->params->get('field_street', JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_CRESPONSIVE_STREET'));
                        $jtext['city'] 		= $this->params->get('field_city', JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_CRESPONSIVE_CITY'));
                        $jtext['city1'] 	= $this->params->get('field_city', JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_CRESPONSIVE_CITY'));
                        $jtext['city2'] 	= $this->params->get('field_city', JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_CRESPONSIVE_CITY'));
                        $jtext['state'] 	= $this->params->get('field_state', JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_CRESPONSIVE_STATE'));
                        $jtext['state1'] 	= $this->params->get('field_state', JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_CRESPONSIVE_STATE'));
                        $jtext['state2'] 	= $this->params->get('field_state', JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_CRESPONSIVE_STATE'));
                        $jtext['zip_code'] 	= $this->params->get('field_zip_code', JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_CRESPONSIVE_ZIP_CODE'));
                        $jtext['zip_code1'] 	= $this->params->get('field_zip_code', JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_CRESPONSIVE_ZIP_CODE'));
                        $jtext['zip_code2'] 	= $this->params->get('field_zip_code', JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_CRESPONSIVE_ZIP_CODE'));
                        $jtext['from_date'] 	= $this->params->get('field_address_since', JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_CRESPONSIVE_ADDRESS_SINCE'));
                        $jtext['from_date1'] 	= $this->params->get('field_address_since', JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_CRESPONSIVE_ADDRESS_SINCE'));
                        $jtext['from_date2'] 	= $this->params->get('field_address_since', JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_CRESPONSIVE_ADDRESS_SINCE'));
                        $jtext['to_date'] 	= $this->params->get('field_address_since', JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_CRESPONSIVE_ADDRESS_TO'));
                        $jtext['to_date1'] 	= $this->params->get('field_address_since', JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_CRESPONSIVE_ADDRESS_TO'));
                        $jtext['to_date2'] 	= $this->params->get('field_address_since', JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_CRESPONSIVE_ADDRESS_TO'));
                        $jtext['since'] 	= $this->params->get('field_address_since', JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_CRESPONSIVE_ADDRESS_SINCE'));
                    $jtext['from']		= $this->params->get('field_address_since', JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_CRESPONSIVE_ADDRESS_SINCE'));
                    $jtext['to']		= $this->params->get('field_address_to', JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_CRESPONSIVE_ADDRESS_TO'));
                
                        echo '<div class="row-fluid">';
                        $span = 3;
                        $counter = 1;
                        $labels_displayed = false;
                        $column_labels_displayed = false;
                
                        $col_count = 0;
                        $suffix = 0;
                        foreach ($jg_fields['cols'] as $jgc => $jgspan) {
                            if ($suffix == 0) {
                                if ($this->params->get('addresses_current','1') == '1') $col_count++;
                            } else {
                                if ($this->params->get('addresses_'.$suffix,'1') == '1') $col_count++;
                            }
                            $suffix++;
                        }
                
                        foreach ($jg_fields['addresses'] as $fields) {
                            $suffix = $counter - 1;
                            $remainder = 3;
                            $myparam = '';
                            if ($suffix == 0) {
                                $myparam = 'addresses_current';
                            } else {
                                $myparam = 'addresses_'.$suffix;
                            }
                            if ($this->params->get($myparam, '1') == '1') {
                                if (!$column_labels_displayed) {
                                    if ($col_count != 4) {
                                        echo "<div class='span" . ($remainder + (5 - $col_count)) . "'>";
                                    } else {
                                        echo "<div class='span5'>";
                                    }
                                } else {
                                    if ($col_count == 4) {
                                        echo "<div class='span2'>";
                                    } else {
                                        if ($col_count == 1)
                                            $remainder = $remainder + 3;
                                        if ($col_count == 2)
                                            $remainder = $remainder + 2;
                                        echo "<div class='span$remainder'>";
                                        if ($col_count == 3)
                                            $remainder = $remainder + 1;
                                    }
                                }
                                if (!$column_labels_displayed) {
                                    echo "<div style='white-space: nowrap' class='span7 offset4'><h4>" . $jtext[$jg_fields['cols'][$counter]] . "&nbsp;" . $counter . "</h4></div>";
                                } else {
                                    echo "<div class='span12'><h4>" . $jtext[$jg_fields['cols'][$counter]] . "</h4></div>";
                                }
                                
                                foreach ($fields as $element) {
                                    $myoutput = "";
                                    $myparam = "";
                                    if (in_array($element,$param_street)) $myparam = 'street';
                                    if (in_array($element,$param_city)) $myparam = 'city';
                                    if (in_array($element,$param_state)) $myparam = 'state';
                                    if (in_array($element,$param_zip_code)) $myparam = 'zip_code';
                                    if (in_array($element,$param_from_date)) $myparam = 'since';
                                    if (in_array($element,$param_to_date)) $myparam = 'to';
                                                        
                                    if ($this->params->get('addresses_' . $myparam, '1') == '1') {
                                        $isrequired = ($this->params->get('required_address_'.$element,'1')=='0'?'*':'');
                                        $iserror = ''; if (in_array($element, $this->application->flag_fields)) $iserror = 'error text-error';
                                        //$myfield = "ref".$counter."_".$element;
                                        //$iserror = ($this->params->get('required_address_'.$element,'1')=='0'&&!$this->application->$element)?'error':'';
                                        if (!$column_labels_displayed) {
                                            $myoutput = $myoutput . "<div style='white-space: nowrap' class='span4 hidden-phone $iserror'><label class='control-label span2 $iserror'>" . $jtext[$element] . $isrequired . "</label></div>";
                                            $labels_displayed = true;
                                        }
                                        $myoutput = $myoutput . "<div style='white-space: nowrap' class='span4 visible-phone $iserror'><label class='control-label span2 $iserror'>" . ($element=='to_date'?'':$jtext[$element]) . $isrequired . "</label></div>";
                                        if (!$column_labels_displayed) {
                                            $myoutput = $myoutput .  "<div class='span7 $iserror'>";
                                        } else {
                                            $myoutput = $myoutput .  "<div class='span12 $iserror'>";
                                        }
                                        if ($element != 'to_date') $myoutput = $myoutput .  "<input class='span12 $iserror' type='text' name='".$element."' id='".$element."' value='".(isset($this->application)?$this->application->$element:'')."' />";
                                        $myoutput = $myoutput . "</div>";
                                    }
                                    $myoutput = "<div class='control-group $iserror'>" . $myoutput . "</div>";
                                    echo $myoutput; 
                                }
                                $column_labels_displayed = $labels_displayed;
                                echo "</div>";
                            }
                            $counter++;
                        }
                        echo '</div>';
                        ?>
                    </fieldset>
                    <?php endif; ?>
                    <?php if ($this->params->get('education','1') == '1') : ?>
                    <fieldset id="jg_education">
                        <legend><?php echo $this->params->get('field_education',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_CRESPONSIVE_EDUCATION')); ?></legend>
                        <?php
                            $jg_fields = null;
                            $jg_fields['cols']  = array( "label" => 2,
                                                         "school" => 2, 
                                                         "school_city" => 2,
                                                         "school_state" => 1,
                                                         "diploma" => 1,
                                                         "diploma_text" => 2,
                                                         "study_area" => 2);
                            $jg_fields['rows']  = array( "high", "undergrad", "grad", "other" );
                            $jg_fields['education']['high']         = array( "school", "school_city", "school_state", "school_diploma", "ged", "" );
                            $jg_fields['education']['undergrad']    = array( "school1", "school_city1", "school_state1", "school_diploma1", "diploma_text1", "study_area1" );
                            $jg_fields['education']['grad']         = array( "school2", "school_city2", "school_state2", "school_diploma2", "diploma_text2", "study_area2" );
                            $jg_fields['education']['other']        = array( "school3", "school_city3", "school_state3", "school_diploma3", "diploma_text3", "study_area3" );
                            $span = 0;
                            
                            $jtext['high']      = $this->params->get('field_high_school', JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_CRESPONSIVE_HIGH_SCHOOL'));
                            $jtext['undergrad'] = $this->params->get('field_undergrad_school', JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_CRESPONSIVE_UNDERGRAD_SCHOOL'));
                            $jtext['grad']      = $this->params->get('field_grad_school', JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_CRESPONSIVE_GRAD_SCHOOL'));
                            $jtext['other']     = $this->params->get('field_other_school', JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_CRESPONSIVE_OTHER_SCHOOL'));
                            
                            $jtext['school']        = $this->params->get('field_school_attended', JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_CRESPONSIVE_SCHOOL_ATTENDED'));
                            $jtext['school_city']   = $this->params->get('field_school_city', JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_CRESPONSIVE_CITY'));
                            $jtext['school_state']  = $this->params->get('field_school_state', JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_CRESPONSIVE_STATE'));
                            $jtext['diploma']       = $this->params->get('field_diploma', JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_CRESPONSIVE_DIPLOMA'));
                            $jtext['school_diploma']= $this->params->get('field_diploma', JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_CRESPONSIVE_DIPLOMA'));
                            $jtext['diploma_text']  = $this->params->get('field_deg_cert_dip_long', JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_CRESPONSIVE_DEGREE_CERT'));
                            $jtext['study_area']    = $this->params->get('field_area_of_study', JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_CRESPONSIVE_AREA_OF_STUDY'));
                            $jtext['ged']           = $this->params->get('field_ged', JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_CRESPONSIVE_GED'));
                            
                            $unused_span = 0; $col_count = 0;
                            foreach ($jg_fields["cols"] as $jgf => $jgc) { 
                                if ($this->params->get('education_'.$jgf, '1') == '1') {
                                    $jg_fields['cols'][$jgf] = $jgc + $unused_span;
                                    $unused_span = 0;
                                } else {
                                    $unused_span = $jgc;
                                }
                            }
                            if ($unused_span !== 0) $jg_fields["cols"]["label"] = 2 + $unused_span;
                            
                            foreach ($jg_fields['cols'] as $jgc => $jgspan) { if ($this->params->get('education_'.$jgc,'1') == '1') $col_count++; }
                            
                            if ($col_count > 1) {
                                // COLS
                                echo '<div class="row-fluid">'."\n";
                                // echo '<div class="span'.$jg_fields["cols"]["label"].'"></div>'."\n";
                                foreach ($jg_fields['cols'] as $jgc => $jgspan) {
                                    echo '<div class="hidden-phone span'.$jgspan.'">'."\n";
                                    if ($this->params->get('education_'.$jgc,'1') == '1') echo '<div class="'.$css_span.'"><label class="control-label">'.$jtext[$jgc].'</label></div>'."\n";
                                    echo '</div>'."\n";
                                }
                                echo '</div>'."\n";
                                // ROWS
                                reset($jg_fields['cols']); $current_row = 0;
                                foreach ($jg_fields['rows'] as $jgr) {
                                    if ($this->params->get('education_'.$jgr,'1') == '1') {
                                        echo '<h3 class="visible-phone span12">'.$jtext[$jgr].'</h3>';
                                        echo '<div class="row-fluid">'."\n";
                                        echo '<div class="hidden-phone span'.current($jg_fields['cols']).'"><label class="control-label">'.$jtext[$jgr].'</label></div>'."\n";
                                        $current_col = 1;
                                        foreach ($jg_fields['education'][$jgr] as $jgf) {
                                            echo '<div class="span'.next($jg_fields['cols']).'">'."\n"; $current_col++;
                                            echo '';
                                            if ($jgf == 'ged') {
                                                echo $jtext['ged'];
                                            } elseif ($jgf !== '') {
                                                echo '<label class="visible-phone">'.$jtext[($current_row>0?substr($jgf,0,-1):$jgf)].'</label>';
                                                if (substr($jgf,7,3) === 'dip') {
                                                    echo $this->options['school_diploma2'];
                                                } else {
                                                    echo '<input class="span12 jg_'.$jgf.'" type="text" name="'.$jgf.'" id="'.$jgf.'" maxlength="250" value="'.((isset($this->application))?$this->application->$jgf:'').'" />'."\n";
                                                }
                                            }
                                            echo '</div>'."\n";
                                        }
                                        reset($jg_fields['cols']);
                                        echo '</div>'."\n";
                                    }
                                    $current_row++;
                                }
                            }
                
                        ?>
                    </fieldset>
                    <?php endif; ?>
                	<div class="form-fild">
                    	<textarea name="interest" id="interest" cols="" rows="" placeholder="Interest"></textarea>
					</div>
                    <?php 
						$db = JFactory::getDbo();
						$query = $db->getQuery(true);
						$query->select($db->quoteName(array('title')));
						$query->from($db->quoteName('#__tst_jglist_jobs'));
						$db->setQuery($query);
						$key = $db->loadAssocList();
						?>
                        <div class="form-fild">
						<div class="select-catrgory">	
							<select class="turnintodropdown_demo2" name="positionnew" id="positionnew">
								<option value="">Position</option>
								<?php foreach ($key as $value) {?>
								<option value="<?php echo $value["title"];?>"><?php echo $value["title"];?></option>
								<?php }?>
							</select>                    					
						</div>
                    	</div>	
                    
                    <?php if ($this->params->get('employment_information','1') == '1') : ?>
                    <fieldset id="jg_employment_information">
                        <legend><?php echo $this->params->get('field_employment_information',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_CRESPONSIVE_EMPLOYMENT_INFORMATION')); ?></legend>
                        <?php
                            $jg_fields['employment_information'][] = array( "position", "date_you_can_start", "desired_pay" );
                            $jg_fields['employment_information'][] = array( "do_you_prefer", "can_you_work", "available" );
                            $jg_fields['employment_information'][] = array( "shiftwork", "unavailability" );
                                    
                            //$jtext['position']              = JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_CRESPONSIVE_POSITION_APPLIED_FOR');
                            $jtext['date_you_can_start']    = JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_CRESPONSIVE_DATE_YOU_CAN_START').'&nbsp;('.
                                                              JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_CRESPONSIVE_MYSQL_DATE_FORMAT').')';
                            //$jtext['desired_pay']           = JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_CRESPONSIVE_DESIRED_SALARY').'&nbsp;'.
                                                              JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_CRESPONSIVE_CURRENCY_SYMBOL');
                            $jtext['do_you_prefer']         = JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_CRESPONSIVE_DO_YOU_PREFER');
                            $jtext['can_you_work']          = JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_CRESPONSIVE_CAN_YOU_WORK');
                            $jtext['available']             = JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_CRESPONSIVE_AVAILABLE');
                            $jtext['shiftwork']             = JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_CRESPONSIVE_SHIFTWORK');
                            //$jtext['unavailability']         = JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_CRESPONSIVE_NOT_AVAILABLE');
                                    
                            foreach ($jg_fields["employment_information"] as $jgf) {
                                $span = 0;
                                foreach ($jgf as $f) { $span = $span + (int)$this->params->get('employment_information_'.$f, '1'); }
                                $css_span = "span".(string)(12/$span);
                                if ($span > 0) {
                                    echo '<div class="row-fluid">'."\n";
                                    foreach ($jgf as $f) {
                                        if ($this->params->get('employment_information_'.$f,'1') == '1') {
											echo '<div class="form-fild">'."\n";
                                            echo '<div class="'.$css_span.' jg_employment_information_'.$f.'">'."\n";
                                            echo '<div class="control-group">'."\n";
                                            echo '<label class="control-label">'.($this->params->get('field_'.$f, $jtext[$f])).'</label>'."\n";
                                            
                                            if ($f == 'position') {
                                                if ($this->params->get('employment_information_position_auto','1') == '1') {
                                                    if (isset($this->application->position) && $this->application->position != "" && $this->application->position != 'no-title') {
                                                        $fvalue = $this->application->position;
                                                    } else {
                                                        if  (isset($this->posting_id) && $this->posting_id != '0')
                                                        $fvalue = JHTML::_('jobgrokapp.posting',$this->posting_id,true);
                                                    }
                                                }   
                                            } else {
                                                $fvalue = ((isset($this->application))?$this->application->$f:'');
                                            } ?>
                                            
                                           
                                            <?php if ($f == 'date_you_can_start') {
                                                echo JHTML::calendar(isset($this->application->available_date)?$this->application->available_date:'','available_date','available_date');
                                            } elseif ($f == 'do_you_prefer') {
                                                echo $this->options['work_preferences'];
                                            } elseif ($f == 'can_you_work') {
                                                echo '<input type="checkbox" name="weekends" id="weekends" class="inputbox" value="1" ';
                                                if (isset($this->application)) { if ( '1' == $this->application->weekends ) echo "checked "; }
                                                echo '/>&nbsp;';
                                                echo $this->params->get('field_weekends',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_CRESPONSIVE_WEEKENDS')).'&nbsp;';
                                                echo '<input type="checkbox" name="evenings" id="evenings" class="inputbox" value="1" ';
                                                if (isset($this->application)) { if ( '1' == $this->application->evenings ) echo "checked "; } 
                                                echo '/>&nbsp;';
                                                echo $this->params->get('field_evenings',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_CRESPONSIVE_EVENINGS')); 
                                            } elseif ($f == 'available') {
                                                echo '<input type="checkbox" name="monday" id="monday" class="inputbox" value="1" ';
                                                if (isset($this->application)) { if ( '1' == $this->application->monday ) echo "checked "; } 
                                                echo '\>&nbsp;'.$this->params->get('field_monday_abbr',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_CRESPONSIVE_MONDAY_ABBR')).'&nbsp;';
                                                echo '<input type="checkbox" name="tuesday" id="tuesday" class="inputbox" value="1" ';
                                                if (isset($this->application)) { if ( '1' == $this->application->tuesday ) echo "checked "; } 
                                                echo '\>&nbsp;'.$this->params->get('field_tuesday_abbr',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_CRESPONSIVE_TUESDAY_ABBR')).'&nbsp;';
                                                echo '<input type="checkbox" name="wednesday" id="wednesday" class="inputbox" value="1" ';
                                                if (isset($this->application)) { if ( '1' == $this->application->wednesday ) echo "checked "; } 
                                                echo '/>&nbsp;'.$this->params->get('field_wednesday_abbr',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_CRESPONSIVE_WEDNESDAY_ABBR')).'&nbsp;';
                                                echo '<input type="checkbox" name="thursday" id="thursday" class="inputbox" value="1" ';
                                                if (isset($this->application)) { if ( '1' == $this->application->thursday ) echo "checked "; }
                                                echo '/>&nbsp;'.$this->params->get('field_thursday_abbr',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_CRESPONSIVE_THURSDAY_ABBR')).'&nbsp;';
                                                echo '<input type="checkbox" name="friday" id="friday" class="inputbox" value="1" ';
                                                if (isset($this->application)) { if ( '1' == $this->application->friday ) echo "checked "; } 
                                                echo '/>&nbsp;'.$this->params->get('field_friday_abbr',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_CRESPONSIVE_FRIDAY_ABBR')).'&nbsp;';
                                                echo '<input type="checkbox" name="saturday" id="saturday" class="inputbox" value="1" ';
                                                if (isset($this->application)) { if ( '1' == $this->application->saturday ) echo "checked "; }
                                                echo '/>&nbsp;'.$this->params->get('field_saturday_abbr',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_CRESPONSIVE_SATURDAY_ABBR')).'&nbsp;';
                                                echo '<input type="checkbox" name="sunday" id="sunday" class="inputbox" value="1" ';
                                                if (isset($this->application)) { if ( '1' == $this->application->sunday ) echo "checked "; } 
                                                echo '/>&nbsp;'.$this->params->get('field_sunday_abbr',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_CRESPONSIVE_SUNDAY_ABBR')).'&nbsp;';
                                            } elseif ($f == 'shiftwork') {
                                                echo $this->options['shiftwork'];
                                            } else {
                                                echo '<input class="span12" type="text" name="'.$f.'" id="'.$f.'" maxlength="250" value = "'.$fvalue.'" />'."\n";
                                            }
                                            echo '</div>'."\n";
                                            echo '</div>'."\n";
											echo '</div>'."\n";
                                        }
                                    }
                                    echo '</div>'."\n";
                               }
                            }
                        ?>                
                        <strong><?php //echo $this->params->get('field_following_questions',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_CRESPONSIVE_FOLLOWING_QUESTIONS')); ?></strong>
                        <?php $question_number = 1; ?>
                        <?php if ($this->params->get('employment_information_question_1','1') == '1') : ?>
                        <div class="row-fluid">
                            <div class="span12 jg_employment_information_question_1">
                                <div class="span1 hidden-phone"><?php echo $question_number; $question_number++; ?>.</div>
                                <div class="span9"><?php echo $this->params->get('field_question_1',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_CRESPONSIVE_QUESTION_1')); ?></div>
                                <div class="span2"><?php echo $this->options['eligible']; ?></div>
                            </div>                
                        </div>
                        <div class="row-fluid">
                            <div class="span12 jg_employment_information_question_1_followup">
                                <div class="span1"></div>
                                <div class="span9"><?php echo $this->params->get('field_question_1_followup',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_CRESPONSIVE_QUESTION_1_FOLLOWUP')); ?></div>
                                <div class="span2"><?php echo $this->options['provideproof']; ?></div>
                            </div>
                        </div>
                        <?php endif; ?>
                        <?php if ($this->params->get('employment_information_question_2','1') == '1') : ?>
                        <div class="row-fluid">
                            <?php $iserror = ''; if (in_array('worked_here_text', $this->application->flag_fields)) $iserror = 'error text-error'; ?>
                            <div class="span12 jg_employment_information_question_2 control-group <?php echo $iserror; ?>">
                                <div class="span1 <?php echo $iserror; ?>"><?php echo $question_number; $question_number++; ?>.</div>
                                <div class="span9 <?php echo $iserror; ?>"><?php echo $this->params->get('field_question_2',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_CRESPONSIVE_QUESTION_2')); ?></div>
                                <div class="span2 <?php echo $iserror; ?>"><?php echo $this->options['worked_here_before']; ?></div>
                            </div>                
                        </div>
                        <div class="row-fluid">
                            <div class="span12 jg_employment_information_question_2_followup control-group <?php echo $iserror; ?>">
                                <div class="span1"></div>
                                <div class="span4 <?php echo $iserror; ?>"><?php echo $this->params->get('field_question_2_followup',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_CRESPONSIVE_QUESTION_2_FOLLOWUP')); ?></div>
                                <input class="span7 <?php echo $iserror; ?>" type="text" name="worked_here_text" id="worked_here_text" maxlength="250" value = "<?php 
                                        if (isset($this->application)) echo $this->application->worked_here_text;
                                ?>" />
                            </div>
                        </div>
                        <?php endif; ?>
                        <?php if ($this->params->get('employment_information_question_3','1') == '1') : ?>
                        <div class="row-fluid">
                            <div class="span12 jg_employment_information_question_3">
                                <div class="span1"><?php echo $question_number; $question_number++; ?>.</div>
                                <div class="span9"><?php echo $this->params->get('field_question_3',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_CRESPONSIVE_QUESTION_3')); ?></div>
                                <div class="span2"><?php echo $this->options['job_desc_received']; ?></div>
                            </div>                
                        </div>        
                        <?php endif; ?>
                        <?php if ($this->params->get('employment_information_question_4','1') == '1') : ?>
                        <div class="row-fluid">
                            <?php $iserror = ''; if (in_array('no_understand_reqs', $this->application->flag_fields)) $iserror = 'error text-error'; ?>
                            <div class="span12 jg_employment_information_question_4 control-group <?php echo $iserror; ?>">
                                <div class="span1 <?php echo $iserror; ?>"><?php echo $question_number; $question_number++; ?>.</div>
                                <div class="span9 <?php echo $iserror; ?>"><?php echo $this->params->get('field_question_4',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_CRESPONSIVE_QUESTION_4')); ?></div>
                                <div class="span2 <?php echo $iserror; ?>"><?php echo $this->options['understand_reqs']; ?></div>
                            </div>
                        </div>
                        <div class="row-fluid">
                            <div class="span12 jg_employment_information_question_4_followup control-group <?php echo $iserror; ?>">
                                <div class="span1"></div>
                                <div class="span4 <?php echo $iserror; ?>"><?php echo $this->params->get('field_question_4_followup',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_CRESPONSIVE_QUESTION_4_FOLLOWUP')); ?></div>
                                <input class="span7 <?php echo $iserror; ?>" type="text" name="no_understand_reqs" id="no_understand_reqs" maxlength="250" value = "<?php 
                                        if (isset($this->application)) echo $this->application->no_understand_reqs;
                                ?>" />
                            </div>
                        </div>
                        <?php endif; ?>
                        <?php if ($this->params->get('employment_information_question_5','1') == '1') : ?>
                        <div class="row-fluid">
                            <div class="span12 jg_employment_information_question_5">
                                <div class="span1"><?php echo $question_number; $question_number++; ?>.</div>
                                <div class="span9"><?php echo $this->params->get('field_question_5',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_CRESPONSIVE_QUESTION_5')); ?></div>
                                <div class="span2"><?php echo $this->options['on_layoff']; ?></div>
                            </div>
                        </div>
                        <?php endif; ?>
                        <?php if ($this->params->get('employment_information_question_6','1') == '1') : ?>
                        <div class="row-fluid">
                            <?php $iserror = ''; if (in_array('conf_explain', $this->application->flag_fields)) $iserror = 'error text-error'; ?>
                            <div class="span12 jg_employment_information_question_6 control-group <?php echo $iserror; ?>">
                                <div class="span1 <?php echo $iserror; ?>"><?php echo $question_number; $question_number++; ?>.</div>
                                <div class="span9 <?php echo $iserror; ?>"><?php echo $this->params->get('field_question_6',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_CRESPONSIVE_QUESTION_6')); ?></div>
                                <div class="span2 <?php echo $iserror; ?>"><?php echo $this->options['conf_agreement']; ?></div>
                            </div>
                        </div>
                        <div class="row-fluid">
                            <div class="span12 jg_employment_information_question_6_followup control-group  <?php echo $iserror; ?>">
                                <div class="span1"></div>
                                <div class="span4 <?php echo $iserror; ?>"><?php echo $this->params->get('field_question_6_followup',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_CRESPONSIVE_QUESTION_6_FOLLOWUP')); ?></div>
                                <input class="span7  <?php echo $iserror; ?>" type="text" name="conf_explain" id="conf_explain" maxlength="250" value = "<?php 
                                        if (isset($this->application)) echo $this->application->conf_explain;
                                ?>" />
                            </div>
                        </div>
                        <?php endif; ?>
                        <?php if ($this->params->get('employment_information_question_7','1') == '1') : ?>
                        <div class="row-fluid">
                            <?php $iserror = ''; if (in_array('discharge_explain', $this->application->flag_fields)) $iserror = 'error text-error'; ?>
                            <div class="span12 jg_employment_information_question_7 control-group <?php echo $iserror; ?>">
                                <div class="span1 <?php echo $iserror; ?>"><?php echo $question_number; $question_number++; ?>.</div>
                                <div class="span9 <?php echo $iserror; ?>"><?php echo $this->params->get('field_question_7',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_CRESPONSIVE_QUESTION_7')); ?></div>
                                <div class="span2 <?php echo $iserror; ?>"><?php echo $this->options['discharged']; ?></div>
                            </div>
                        </div>
                        <div class="row-fluid">
                            <div class="span12 jg_employment_information_question_7_followup control-group <?php echo $iserror; ?>">
                                <div class="span1"></div>
                                <div class="span4 <?php echo $iserror; ?>"><?php echo $this->params->get('field_question_7_followup',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_CRESPONSIVE_QUESTION_7_FOLLOWUP')); ?></div>
                                <input class="span7 <?php echo $iserror; ?>" type="text" name="discharge_explain" id="discharge_explain" maxlength="250" value = "<?php 
                                        if (isset($this->application)) echo $this->application->discharge_explain;
                                ?>" />
                            </div>
                        </div>
                        <?php endif; ?>
                        <?php if ($this->params->get('employment_information_question_8','1') == '1') : ?>
                        <div class="row-fluid">
                            <?php $iserror = ''; if (in_array('convict_explain', $this->application->flag_fields)) $iserror = 'error text-error'; ?>
                            <div class="span12 jg_employment_information_question_8 control-group <?php echo $iserror; ?>">
                                <div class="span1 <?php echo $iserror; ?>"><?php echo $question_number; $question_number++; ?>.</div>
                                <div class="span9 <?php echo $iserror; ?>"><?php echo $this->params->get('field_question_8',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_CRESPONSIVE_QUESTION_8')); ?></div>
                                <div class="span2 <?php echo $iserror; ?>"><?php echo $this->options['convict']; ?></div>
                            </div>
                        </div>
                        <div class="row-fluid">
                            <div class="span12 jg_employment_information_question_8_followup control-group <?php echo $iserror; ?>">
                                <div class="span1"></div>
                                <div class="span4 <?php echo $iserror; ?>"><?php echo $this->params->get('field_question_8_followup',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_CRESPONSIVE_QUESTION_8_FOLLOWUP')); ?></div>
                                <input class="span7 <?php echo $iserror; ?>" type="text" name="convict_explain" id="convict_explain" maxlength="250" value = "<?php 
                                        if (isset($this->application)) echo $this->application->convict_explain;
                                ?>" />
                            </div>
                        </div>
                        <?php endif; ?>
                        <?php if ($this->params->get('employment_information_question_9','1') == '1') : ?>
                        <div class="row-fluid">
                            <?php $iserror = ''; if (in_array('family_explain', $this->application->flag_fields)) $iserror = 'error text-error'; ?>
                            <div class="span12 jg_employment_information_question_9 control-group <?php echo $iserror; ?>">
                                <div class="span1"><?php echo $question_number; $question_number++; ?>.</div>
                                <div class="span9 <?php echo $iserror; ?>"><?php echo $this->params->get('field_question_9',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_CRESPONSIVE_QUESTION_9')); ?></div>
                                <div class="span2 <?php echo $iserror; ?>"><?php echo $this->options['family']; ?></div>
                            </div>
                        </div>
                        <div class="row-fluid">
                            <div class="span12 jg_employment_information_question_9_followup control-group <?php echo $iserror; ?>">
                                <div class="span1"></div>
                                <div class="span4 <?php echo $iserror; ?>"><?php echo $this->params->get('field_question_9_followup',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_CRESPONSIVE_QUESTION_9_FOLLOWUP')); ?></div>
                                <input class="span7 <?php echo $iserror; ?>" type="text" name="family_explain" id="family_explain" maxlength="250" value = "<?php 
                                        if (isset($this->application)) echo $this->application->family_explain;
                                ?>" />
                            </div>
                        </div>
                        <?php endif; ?>
                    </fieldset>
                    <?php endif; ?>
                    <?php if ($this->params->get('employment_history','1') == '1') : ?>
                    <fieldset id="jg_employment_history">
                        <legend><?php echo $this->params->get('field_employment_history',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_CRESPONSIVE_EMPLOYMENT_HISTORY')); ?></legend>
                        <?php  if ($this->params->get('employment_history_currently_employed','1') == '1') : ?>
                        <div class="row-fluid">
                            <div class="span12 jg_employment_history_on_layoff">
                                <div class="span10"><?php echo $this->params->get('field_currently_employed',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_CRESPONSIVE_CURRENTLY_EMPLOYED')); ?></div>
                                <div class="span2"><?php echo $this->options['currently_employed']; ?></div>
                            </div>
                        </div>
                        <?php endif; ?>
                        <?php  if ($this->params->get('employment_history_contact_current_employer','1') == '1') : ?>
                        <div class="row-fluid">
                            <div class="span12 jg_employment_history_contact_emp">
                                <div class="span10"><?php echo $this->params->get('field_contact_employer',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_CRESPONSIVE_CONTACT_EMPLOYER')); ?></div>
                                <div class="span2"><?php echo $this->options['contact_emp']; ?></div>
                            </div>
                        </div>
                        <?php endif; ?>               
                        <?php
                        $jg_fields = null;
                        $jg_fields['cols']['1'] = 'current';
                        $jg_fields['cols']['2'] = 'prior1';
                        $jg_fields['cols']['3'] = 'prior2';
                        $jg_fields['cols']['4'] = 'prior3';
                
                        $jg_fields['employer']['1'] = array("employer", "employer_city", "employer_state", "employer_zip", "employer_phone", "employer_pos", "employer_from", "employer_to", "employer_pay", "employer_sup", "employer_dut", "employer_leave");
                        $jg_fields['employer']['2'] = array("employer1", "employer1_city", "employer1_state", "employer1_zip", "employer1_phone", "employer1_pos", "employer1_from", "employer1_to", "employer1_pay", "employer1_sup", "employer1_dut", "employer1_leave");
                        $jg_fields['employer']['3'] = array("employer2", "employer2_city", "employer2_state", "employer2_zip", "employer2_phone", "employer2_pos", "employer2_from", "employer2_to", "employer2_pay", "employer2_sup", "employer2_dut", "employer2_leave");
                        $jg_fields['employer']['4'] = array("employer3", "employer3_city", "employer3_state", "employer3_zip", "employer3_phone", "employer3_pos", "employer3_from", "employer3_to", "employer3_pay", "employer3_sup", "employer3_dut", "employer3_leave");
                        $span = 0;
                        
                        $jg_fields['required'] = array ( "employer" => "employer", "employer_city" => "city", "employer_state" => "state", "employer_zip" => "zip_code",
                                                         "employer_phone" => "phone", "employer_pos" => "position", "employer_from" => "from", "employer_to" => "to",
                                                         "employer_pay" => "pay", "employer_sup" => "supervisor", "employer_dut" => "duties", "employer_leave" => "reason");
                
                        $jtext['current'] = $this->params->get('field_current_employer', JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_CRESPONSIVE_EMPLOYMENT_HISTORY_RECENT'));
                        $jtext['prior1'] = $this->params->get('field_prior_employer', JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_CRESPONSIVE_EMPLOYMENT_HISTORY_1'));
                        $jtext['prior2'] = $this->params->get('field_prior_employer', JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_CRESPONSIVE_EMPLOYMENT_HISTORY_2'));
                        $jtext['prior3'] = $this->params->get('field_prior_employer', JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_CRESPONSIVE_EMPLOYMENT_HISTORY_3'));
                
                        $jtext['employer'] = $this->params->get('field_employer', JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_CRESPONSIVE_EMPLOYER'));
                        $jtext['city'] = $this->params->get('field_employer_city', JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_CRESPONSIVE_CITY'));
                        $jtext['state'] = $this->params->get('field_employer_state', JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_CRESPONSIVE_STATE'));
                        $jtext['zip'] = $this->params->get('field_employer_zip_code', JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_CRESPONSIVE_ZIP_CODE'));
                        $jtext['phone'] = $this->params->get('field_employer_phone', JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_CRESPONSIVE_PHONE'));
                        $jtext['pos'] = $this->params->get('field_employer_position', JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_CRESPONSIVE_POSITION_HELD'));
                        $jtext['from'] = $this->params->get('field_employer_from_myyyy', JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_CRESPONSIVE_FROM_MYYYY'));
                        $jtext['to'] = $this->params->get('field_employer_to_myyyy', JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_CRESPONSIVE_TO_MYYYY'));
                        $jtext['pay'] = $this->params->get('field_employer_pay', JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_CRESPONSIVE_PAY_UPON_LEAVING'));
                        $jtext['sup'] = $this->params->get('field_employer_supervisor', JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_CRESPONSIVE_SUPERVISOR'));
                        $jtext['dut'] = $this->params->get('field_employer_duties', JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_CRESPONSIVE_DUTIES'));
                        $jtext['leave'] = $this->params->get('field_employer_reason', JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_CRESPONSIVE_REASON'));
                
                        echo '<div class="row-fluid">';
                        $span = 3;
                        $counter = 1;
                        $labels_displayed = false;
                        $column_labels_displayed = false;
                
                        $col_count = 0;
                        $suffix = -1;
                        foreach ($jg_fields['cols'] as $jgc => $jgspan) {
                            if ($this->params->get('employment_history_' . ($suffix == 0 ? 'recent' : $suffix), '1') == '1')
                                $col_count++;
                            $suffix++;
                        }
                
                        foreach ($jg_fields['employer'] as $fields) {
                            $suffix = $counter - 1;
                            $remainder = 3;
                            if ($this->params->get('employment_history_' . ($suffix == 0 ? 'recent' : $suffix), '1') == '1') {
                                if (!$column_labels_displayed) {
                                    if ($col_count != 4) {
                                        echo "<div class='span" . ($remainder + (5 - $col_count)) . "'>";
                                    } else {
                                        echo "<div class='span5'>";
                                    }
                                } else {
                                    if ($col_count == 4) {
                                        echo "<div class='span2'>";
                                    } else {
                                        if ($col_count == 1)
                                            $remainder = $remainder + 3;
                                        if ($col_count == 2)
                                            $remainder = $remainder + 2;
                                        echo "<div class='span$remainder'>";
                                        if ($col_count == 3)
                                            $remainder = $remainder + 1;
                                    }
                                }
                                if (!$column_labels_displayed) {
                                    echo "<div style='white-space: nowrap' class='span7 offset4'><h4>" . $jtext[$jg_fields['cols'][$counter]] . "</h4></div>";
                                } else {
                                    echo "<div class='span12'><h4>" . $jtext[$jg_fields['cols'][$counter]] . "</h4></div>";
                                }
                
                                foreach ($fields as $element) {
                                    $myoutput = "";
                                    if ($this->params->get('employment_history_' . $element, '1') == '1') {
                                        $isrequired = (($this->params->get('required_employment_history_'.$jg_fields['required'][$element],'1')=='0'&&$counter==1)?'*':'');
                                        //$myfield = "ref".$counter."_".$element;
                                        $jtextelement = str_replace('employer'.($counter==1?'':$counter-1).'_','',$element);
                                        $iserror = ''; if (in_array($element, $this->application->flag_fields)) $iserror = 'error text-error';
                                        // $iserror = (($this->params->get('required_employment_history_'.$jg_fields['required'][$element],'1')=='0'&&!$this->application->$element&&$counter==1))?'error':'';
                                        if (!$column_labels_displayed) {
                                            $myoutput = $myoutput . "<div style='white-space: nowrap' class='span4 hidden-phone $iserror'><label class='control-label span2 $iserror'>" . $jtext[$jtextelement] . $isrequired . "</label></div>";
                                            $labels_displayed = true;
                                        }
                                        $myoutput = $myoutput . "<div style='white-space: nowrap' class='span4 visible-phone $iserror'><label class='control-label span2 $iserror'>" . $jtext[$jtextelement] . $isrequired . "</label></div>";
                                        if (!$column_labels_displayed) {
                                            $myoutput = $myoutput . "<div class='span7 $iserror'>";
                                        } else {
                                            $myoutput = $myoutput . "<div class='span12 $iserror'>";
                                        }
                                        $myoutput = $myoutput . "<input class='span12 $iserror' type='text' name='".$element."' id='".$element."' value='".(isset($this->application)?$this->application->$element:'')."' /></div>";
                                    }
                                    $myoutput = "<div class='control-group $iserror'>" . $myoutput . "</div>";
                                    echo $myoutput; 
                                }
                                $column_labels_displayed = $labels_displayed;
                                echo "</div>";
                            }
                            $counter++;
                        }
                        echo '</div>';
                        ?>
                        </fieldset>
                    <?php endif; ?>
                            <?php $qcounter = 1; ?>
                            <?php if ($this->params->get('job_related_skills','1') == '1') : ?>
                            <fieldset>
                                <legend><?php echo $this->params->get('field_job_related_skills',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_CRESPONSIVE_JOB_RELATED_SKILLS')); ?></legend>
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
                                            <strong><?php echo $this->params->get('field_vehicle_questions',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_CRESPONSIVE_VEHICLE_QUESTIONS')); ?></strong>
                                        </td>
                                    </tr>
                                </table>
                                <?php endif; ?>
                                <?php endif; ?>
                                
                                
                        <?php if ($this->params->get('job_related_skills_q1','1') == '1') : ?>
                        <div class="row-fluid">
                            <?php $iserror = ''; if (in_array('dl_number', $this->application->flag_fields) || in_array('dl_issued', $this->application->flag_fields)) $iserror = 'error text-error'; ?>
                            <div class="span12 jg_skills_vehicle_question_1 control-group <?php echo $iserror; ?>">
                                <div class="span1 hidden-phone <?php echo $iserror; ?>"><?php echo $qcounter; $qcounter++; ?>.</div>
                                <div class="span9 <?php echo $iserror; ?>"><?php echo $this->params->get('field_vehicle_question_1',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_CRESPONSIVE_VEHICLE_QUESTION_1')); ?></div>
                                <div class="span2 <?php echo $iserror; ?>"><?php echo $this->options['driver_license']; ?></div>
                            </div>                
                        </div>
                        <div class="row-fluid">
                            <div class="span12 jg_skills_vehicle_question_1_followup_a control-group <?php echo $iserror; ?>">
                                <div class="span1"></div>
                                <div class="span9 <?php echo $iserror; ?>"><?php echo $this->params->get('field_vehicle_question_1_followup_a',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_CRESPONSIVE_VEHICLE_QUESTION_1_FOLLOWUP_A')); ?></div>
                                <div class="span2 <?php echo $iserror; ?>">
                                    <input class="span12 <?php echo $iserror; ?>" type="text" name="dl_number" id="dl_number" maxlength="250" value = "<?php 
                                        if (isset($this->application)) echo $this->application->dl_number;
                                    ?>" />
                                </div>
                            </div>
                        </div>
                        <div class="row-fluid">
                            <div class="span12 jg_skills_vehicle_question_1_followup_b control-group <?php echo $iserror; ?>">
                                <div class="span1"></div>
                                <div class="span9 <?php echo $iserror; ?>"><?php echo $this->params->get('field_vehicle_question_1_followup_b',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_CRESPONSIVE_VEHICLE_QUESTION_1_FOLLOWUP_B')); ?></div>
                                <div class="span2 <?php echo $iserror; ?>">
                                    <input class="span12 <?php echo $iserror; ?>" type="text" name="dl_issued" id="dl_issued" maxlength="250" value = "<?php 
                                        if (isset($this->application)) echo $this->application->dl_issued;
                                    ?>" />
                                </div>
                            </div>
                        </div>
                        <?php endif; ?>
                        <?php if ($this->params->get('job_related_skills_q2','1') == '1') : ?>
                        <div class="row-fluid">
                            <?php $iserror = ''; if (in_array('driving_offense_reason', $this->application->flag_fields)) $iserror = 'error text-error'; ?>
                            <div class="span12 jg_skills_vehicle_question_2 control-group <?php echo $iserror; ?>">
                                <div class="span1 hidden-phone <?php echo $iserror; ?>"><?php echo $qcounter; $qcounter++; ?>.</div>
                                <div class="span9 <?php echo $iserror; ?>"><?php echo $this->params->get('field_vehicle_question_2',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_CRESPONSIVE_VEHICLE_QUESTION_2')); ?></div>
                                <div class="span2 <?php echo $iserror; ?>"><?php echo $this->options['driving_offense']; ?></div>
                            </div>                
                        </div>
                        <?php endif; ?>
                        <?php if ($this->params->get('job_related_skills_q2_reason','1') == '1') : ?>
                        <div class="row-fluid">
                            <div class="span12 jg_skills_vehicle_question_2_reason control-group <?php echo $iserror; ?>">
                                <div class="span1"></div>
                                <div class="span9 <?php echo $iserror; ?>"><?php echo $this->params->get('field_vehicle_question_2_followup',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_CRESPONSIVE_VEHICLE_QUESTION_2_FOLLOWUP')); ?></div>
                                <div class="span2 <?php echo $iserror; ?>">
                                    <input class="span12  <?php echo $iserror; ?>" type="text" name="driving_offense_reason" id="driving_offense_reason" maxlength="250" value = "<?php 
                                        if (isset($this->application)) echo $this->application->driving_offense_reason;
                                    ?>" />
                                </div>
                            </div>
                        </div>
                        <?php endif; ?>
                        <?php if ($this->params->get('job_related_skills_q3','1') == '1') : ?>
                        <div class="row-fluid">
                            <?php $iserror = ''; if (in_array('dl_modified_reason', $this->application->flag_fields)) $iserror = 'error text-error'; ?>
                            <div class="span12 jg_skills_vehicle_question_3 control-group <?php echo $iserror; ?>">
                                <div class="span1 hidden-phone <?php echo $iserror; ?>"><?php echo $qcounter; $qcounter++; ?>.</div>
                                <div class="span9 <?php echo $iserror; ?>"><?php echo $this->params->get('field_vehicle_question_3',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_CRESPONSIVE_VEHICLE_QUESTION_3')); ?></div>
                                <div class="span2 <?php echo $iserror; ?>"><?php echo $this->options['dl_modified']; ?></div>
                            </div>                
                        </div>
                        <?php endif; ?>
                        <?php if ($this->params->get('job_related_skills_q3_reason','1') == '1') : ?>
                        <div class="row-fluid">
                            <div class="span12 jg_skills_vehicle_question_3_reason control-group <?php echo $iserror; ?>">
                                <div class="span1"></div>
                                <div class="span9 <?php echo $iserror; ?>"><?php echo $this->params->get('field_vehicle_question_3_followup',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_CRESPONSIVE_VEHICLE_QUESTION_3_FOLLOWUP')); ?></div>
                                <div class="span2 <?php echo $iserror; ?>">
                                    <input class="span12 <?php echo $iserror; ?>" type="text" name="dl_modified_reason" id="dl_modified_reason" maxlength="250" value = "<?php 
                                        if (isset($this->application)) echo $this->application->dl_modified_reason;
                                    ?>" />
                                </div>
                            </div>
                        </div>
                        <?php endif; ?>
                        <?php if ($this->params->get('job_related_skills_states','1') == '1') : ?>
                        <div class="row-fluid">
                            <div class="span12 jg_skills_states">
                                <div class="span1 hidden-phone"><?php echo $qcounter; $qcounter++; ?>.</div>
                                <div class="span9"><?php echo $this->params->get('field_vehicle_states',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_CRESPONSIVE_VEHICLE_STATES')); ?></div>
                                <div class="span2">
                                    <input class="span12" type="text" name="dl_states" id="dl_states" maxlength="250" value = "<?php 
                                        if (isset($this->application)) echo $this->application->dl_states;
                                    ?>" />
                                </div>
                            </div>
                        </div>
                        <?php endif; ?>
                        <?php if ($this->params->get('job_related_skills_skills','1') == '1') : ?>
                        <div class="row-fluid">
                            <div class="span12 jg_skills_states">
                                <div class="span1 hidden-phone"><?php echo $qcounter; $qcounter++; ?>.</div>
                                <div class="span11"><?php echo $this->params->get('field_other_skills',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_CRESPONSIVE_OTHER_SKILLS')); ?><br />
                                    <textarea name="dl_states" id="dl_states" rows="5" style="width: 100%"><?php if (isset($this->application)) echo $this->application->dl_states; ?></textarea>
                                </div>
                            </div>
                        </div>
                        <?php endif; ?>
                        <?php if ($this->params->get('job_related_skills_designations','1') == '1') : ?>
                        <div class="row-fluid">
                            <div class="span12 jg_skills_designations">
                                <div class="span1 hidden-phone"><?php echo $qcounter; $qcounter++; ?>.</div>
                                <div class="span11"><?php echo $this->params->get('field_prof_designations',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_CRESPONSIVE_OTHER_CERTIFICATIONS')); ?><br />
                                    <textarea name="professional" id="professional" rows="5" style="width: 100%"><?php if (isset($this->application)) echo $this->application->professional; ?></textarea>
                                </div>
                            </div>
                        </div>
                        <?php endif; ?>
                        <?php echo $this->lists['lists']; ?>
                    </fieldset>
                    <?php endif; ?>
                    
                        <?php if ($this->params->get('references','1') == '1') : ?>
                    <fieldset id="jg_references">
                        <legend><?php echo $this->params->get('field_references',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_CRESPONSIVE_REFERENCES')); ?></legend>
                        <?php
                        $jg_fields = null;
                        $jg_fields['cols']['1'] = 'reference1';
                        $jg_fields['cols']['2'] = 'reference2';
                        $jg_fields['cols']['3'] = 'reference3';
                        $jg_fields['cols']['4'] = 'reference4';
                
                        $jg_fields['reference']['1'] = array("name", "address", "telephone", "relationship", "years");
                        $jg_fields['reference']['2'] = array("name", "address", "telephone", "relationship", "years");
                        $jg_fields['reference']['3'] = array("name", "address", "telephone", "relationship", "years");
                        $jg_fields['reference']['4'] = array("name", "address", "telephone", "relationship", "years");
                        $span = 0;
                
                        $jtext['reference1'] = $this->params->get('field_reference', JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_CRESPONSIVE_REFERENCE'));
                        $jtext['reference2'] = $this->params->get('field_reference', JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_CRESPONSIVE_REFERENCE'));
                        $jtext['reference3'] = $this->params->get('field_reference', JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_CRESPONSIVE_REFERENCE'));
                        $jtext['reference4'] = $this->params->get('field_reference', JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_CRESPONSIVE_REFERENCE'));
                
                        $jtext['name'] = $this->params->get('field_reference_name', JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_CRESPONSIVE_NAME'));
                        $jtext['address'] = $this->params->get('field_reference_address', JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_CRESPONSIVE_ADDRESS'));
                        $jtext['telephone'] = $this->params->get('field_reference_telephone', JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_CRESPONSIVE_TELEPHONE'));
                        $jtext['relationship'] = $this->params->get('field_reference_relationship', JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_CRESPONSIVE_RELATIONSHIP'));
                        $jtext['years'] = $this->params->get('field_reference_years', JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_CRESPONSIVE_YEARS_ACQUAINTED'));
                
                        echo '<div class="row-fluid">';
                        $span = 3;
                        $counter = 1;
                        $labels_displayed = false;
                        $column_labels_displayed = false;
                
                        $col_count = 0;
                        $suffix = 1;
                        foreach ($jg_fields['cols'] as $jgc => $jgspan) {
                            if ($this->params->get('references_'.$suffix, '1') == '1') $col_count++;
                            $suffix++;
                        }
                
                        foreach ($jg_fields['reference'] as $fields) {
                            $suffix = $counter - 1;
                            $remainder = 3;
                            if ($this->params->get('references_'.$counter, '1') == '1') {
                                if (!$column_labels_displayed) {
                                    if ($col_count != 4) {
                                        echo "<div class='span" . ($remainder + (5 - $col_count)) . "'>";
                                    } else {
                                        echo "<div class='span5'>";
                                    }
                                } else {
                                    if ($col_count == 4) {
                                        echo "<div class='span2'>";
                                    } else {
                                        if ($col_count == 1)
                                            $remainder = $remainder + 3;
                                        if ($col_count == 2)
                                            $remainder = $remainder + 2;
                                        echo "<div class='span$remainder'>";
                                        if ($col_count == 3)
                                            $remainder = $remainder + 1;
                                    }
                                }
                                if (!$column_labels_displayed) {
                                    echo "<div style='white-space: nowrap' class='span7 offset4'><h4>" . $jtext[$jg_fields['cols'][$counter]] . "&nbsp;" . $counter . "</h4></div>";
                                } else {
                                    echo "<div class='span12'><h4>" . $jtext[$jg_fields['cols'][$counter]] . "&nbsp;" . $counter . "</h4></div>";
                                }
                                
                                foreach ($fields as $element) {
                                    $myoutput = "";
                                    if ($this->params->get('references_' . $element, '1') == '1') {
                                        $isrequired = ($this->params->get('required_references_'.$element,'1')=='0'?'*':'');
                                        $myfield = "ref".$counter."_".$element;
                                        // $iserror = ($this->params->get('required_references_'.$element,'1')=='0'&&!$this->application->$myfield)?'error':'';
                                        $iserror = ''; if (in_array($myfield, $this->application->flag_fields)) $iserror = 'error text-error';
                                        if (!$column_labels_displayed) {
                                            $myoutput = $myoutput . "<div style='white-space: nowrap' class='span4 hidden-phone $iserror'><label class='control-label span2 $iserror'>" . $jtext[$element] . $isrequired . "</label></div>";
                                            $labels_displayed = true;
                                        }
                                        $myoutput = $myoutput . "<div style='white-space: nowrap' class='span4 visible-phone $iserror'><label class='control-label span2 $iserror'>" . $jtext[$element] . $isrequired . "</label></div>";
                                        if (!$column_labels_displayed) {
                                            $myoutput = $myoutput .  "<div class='span7 $iserror'>";
                                        } else {
                                            $myoutput = $myoutput .  "<div class='span12 $iserror'>";
                                        }
                                        $myoutput = $myoutput .  "<input class='span12 $iserror' type='text' name='ref".$counter."_".$element."' id='ref".$counter."_".$element."' value='".(isset($this->application)?$this->application->$myfield:'')."' /></div>";
                                    }
                                    $myoutput = "<div class='control-group $iserror'>" . $myoutput . "</div>";
                                    echo $myoutput; 
                                }
                                $column_labels_displayed = $labels_displayed;
                                echo "</div>";
                            }
                            $counter++;
                        }
                        echo '</div>';
                        ?>
                        </fieldset>
                        <?php endif; ?>
                        <?php if ($this->params->get('text_resume','1') == '1') : ?>
                        <fieldset>
                            <legend><?php echo $this->params->get('field_text_resume',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_CRESPONSIVE_TEXT_RESUME')); ?></legend>
                            <div class="row-fluid">
                                <div class="span12 jg_text_resume">
                                    <div class="span12"><?php echo $this->params->get('field_text_resume_desc',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_CRESPONSIVE_TEXT_RESUME_DESC')); ?><br />
                                        <textarea name="text_resume" id="text_resume" rows="5" style="width: 100%"><?php if (isset($this->application)) echo $this->application->text_resume; ?></textarea>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                        <?php endif; ?>
                                
                            <?php if ($this->params->get('file_upload','1') == '1') : ?>
                            <?php /*?><fieldset>
                                <legend><?php echo $this->params->get('field_upload_file',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_CRESPONSIVE_UPLOAD_FILE')); ?></legend><?php */?>
                                <?php if ((int)$this->params->get('file_upload_count','1') == 1) : ?>
                                <div class="form-fild">
								<div class="inputBtnSection">
                                <div class="row-fluid">
                                    <div class="span12 jg_file_upload">
                                        <div class="span12">
                                            <?php /*?><?php echo $this->params->get('field_upload_file_desc',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_CRESPONSIVE_UPLOAD_FILE_DESC')); ?>&nbsp;<em>(<?php
                                                echo $this->params->get('field_permitted_types',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_CRESPONSIVE_PERMITTED_FILE_TYPES')); ?>:&nbsp;<?php 
                                                echo $this->params->get('file_upload_types','doc,docx,pdf,txt'); ?>&nbsp;-&nbsp;<?php
                                                echo $this->params->get('field_max_file_size',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_CRESPONSIVE_MAX_FILE_SIZE')); ?>:&nbsp;<?php  
                                                echo $this->params->get('file_upload_max_size','1045876'); ?>&nbsp;bytes)</em><br/><?php */?>
												<input type="hidden" name="file_name" id="file_name" value="<?php if (isset($this->application->file_name)) echo $this->application->file_name; ?>" />
                                                <input id="file_name_d" name="file_name_d" value="<?php if (isset($this->application->file_name)) echo $this->application->file_name; ?>" class="disableInputField" style="width:100%;" placeholder="Attach resume*" disabled="disabled"/>
                                                <label class="fileUpload"><input type="file" onchange="document.getElementById('file_name').value=this.value" name="file_upload" id="file_upload" title="Pick a file to upload" value="<?php if ( isset($this->application->file_name) ) echo $this->application->file_name;?>" class="upload"/></label>
                                        		<script>
                                                    document.getElementById("file_upload").onchange = function () {
														document.getElementById("file_name").value = this.value;
                                                        document.getElementById("file_name_d").value = this.value;
													};
													jQuery(function() {
														jQuery('#file_upload').checkFileType({
															//allowedExtensions: ['doc', 'docx', 'pdf'],
															allowedExtensions: ['pdf'],
															success: function() {
																//alert('Success');
																jQuery('#file_name').parents('.inputBtnSection').removeClass('error');
																jQuery('#file_name').parents('.form-fild').find('.compulsory-msg-box').remove();
															},
															error: function() {
																//alert('Error');
																jQuery('#file_name').parents('.form-fild').find('.compulsory-msg-box').remove();
																jQuery('#file_name').parents('.form-fild').append('<div class="compulsory-msg-box"><div class="compulsory-msg block-err">Please upload valid resume file.</br> Allowed Extension is pdf.</div></div>');
																jQuery('#file_name').val('');
															}
														});
													});
                                                </script>
                                        </div>
                                    </div>
                                </div>
                                </div>
                                </div>
                                
                                
                                
                                <?php else: ?>
                                <?php 
                                    $parms_bad = false; $count = 0;
                                    $files_field_upload_file_desc = explode("|", $this->params->get('field_upload_file_desc',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_CRESPONSIVE_UPLOAD_FILE_DESC')));
                                    $files_field_upload_file_desc_count = count($files_field_upload_file_desc);
                                    $max_defined = $files_field_upload_file_desc_count;
                                    $files_field_permitted_types = explode("|", $this->params->get('field_permitted_types',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_CRESPONSIVE_PERMITTED_FILE_TYPES')));
                                    $files_field_permitted_types_count = count($files_field_permitted_types);
                                    if ($max_defined !== $files_field_permitted_types_count) $parms_bad = true;
                                    $files_file_upload_types = explode("|", $this->params->get('file_upload_types','doc,docx,pdf,txt'));
                                    $files_file_upload_types_count = count($files_file_upload_types);
                                    if ($max_defined !== $files_file_upload_types_count) $parms_bad = true;
                                    $files_field_max_file_size = explode("|", $this->params->get('field_max_file_size',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_CRESPONSIVE_MAX_FILE_SIZE')));
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
                                <div class="row-fluid">
                                    <div class="span12 jg_file_upload">
                                        <div class="span12">
                                            <?php echo $files_field_upload_file_desc[$count]; ?>&nbsp;<em>(<?php
                                                echo $files_field_permitted_types[$count]; ?>:&nbsp;<?php 
                                                echo $files_file_upload_types[$count]; ?>&nbsp;-&nbsp;<?php
                                                echo $files_field_max_file_size[$count]; ?>:&nbsp;<?php  
                                                echo $files_file_upload_max_size[$count];  ?>&nbsp;bytes)</em><br/>
                                                <input type="hidden" id="file_name<?php echo $count; ?>" name="file_name[]" value="" />
                                                <input type="file" name="jform[file_name][]" id="file_upload<?php echo $count; ?>" title="Pick a file to upload" value=""/>
                                        </div>
                                    </div>
                                </div>
                                <?php      
                                        $count++;
                                        }
                                    }
                                ?>
                                <?php endif; ?>
                            <?php /*?></fieldset><?php */?>
                            <?php endif; ?>
                    
                            <?php if ($this->params->get('agreement','1') == '1') : ?>
                            <fieldset>
                                <legend><?php echo $this->params->get('field_certification_agreement',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_CRESPONSIVE_CERTIFICATION_AGREEMENT')); ?></legend>
                                <?php if (isset($this->agreement)) echo '<div id="agreement_article">'.JHTML::_('content.prepare',$this->agreement->introtext.$this->agreement->fulltext).'</div>'; ?>
                                <?php if ($this->params->get('bullet1_on','1') == '1' || 
                                            $this->params->get('bullet2_on','1') == '1' || 
                                            $this->params->get('bullet3_on','1') == '1' || 
                                            $this->params->get('bullet4_on','1') == '1' || 
                                            $this->params->get('bullet5_on','1') == '1' || 
                                            $this->params->get('bullet6_on','1') == '1' ) : ?>
                                <?php $bullet = 1; ?>
                                <?php if ($this->params->get('bullet1_on','1') == '1') : ?>
                                <div class="row-fluid">
                                    <div class="span12 jg_bullet1">
                                        <div class="span1 hidden-phone"><?php echo $bullet; $bullet++; ?>.</div>
                                        <div class="span11"><?php echo $this->params->get('certification_agreement_bullet1','Certification Agreement Bullet 1'); ?></div>
                                    </div>
                                </div>
                                <?php endif; ?>
                                <?php if ($this->params->get('bullet2_on','1') == '1') : ?>
                                <div class="row-fluid">
                                    <div class="span12 jg_bullet2">
                                        <div class="span1 hidden-phone"><?php echo $bullet; $bullet++; ?>.</div>
                                        <div class="span11"><?php echo $this->params->get('certification_agreement_bullet2','Certification Agreement Bullet 2'); ?></div>
                                    </div>
                                </div>
                                <?php endif; ?>
                                <?php if ($this->params->get('bullet3_on','1') == '1') : ?>
                                <div class="row-fluid">
                                    <div class="span12 jg_bullet3">
                                        <div class="span1 hidden-phone"><?php echo $bullet; $bullet++; ?>.</div>
                                        <div class="span11"><?php echo $this->params->get('certification_agreement_bullet3','Certification Agreement Bullet 3'); ?></div>
                                    </div>
                                </div>
                                <?php endif; ?>
                                <?php if ($this->params->get('bullet4_on','1') == '1') : ?>
                                <div class="row-fluid">
                                    <div class="span12 jg_bullet4">
                                        <div class="span1 hidden-phone"><?php echo $bullet; $bullet++; ?>.</div>
                                        <div class="span11"><?php echo $this->params->get('certification_agreement_bullet4','Certification Agreement Bullet 4'); ?></div>
                                    </div>
                                </div>
                                <?php endif; ?>
                                <?php if ($this->params->get('bullet5_on','1') == '1') : ?>
                                <div class="row-fluid">
                                    <div class="span12 jg_bullet5">
                                        <div class="span1 hidden-phone"><?php echo $bullet; $bullet++; ?>.</div>
                                        <div class="span11"><?php echo $this->params->get('certification_agreement_bullet5','Certification Agreement Bullet 5'); ?></div>
                                    </div>
                                </div>
                                <?php endif; ?>
                                <?php if ($this->params->get('bullet6_on','1') == '1') : ?>
                                <div class="row-fluid">
                                    <div class="span12 jg_bullet6">
                                        <div class="span1 hidden-phone"><?php echo $bullet; ?>.</div>
                                        <div class="span11"><?php echo $this->params->get('certification_agreement_bullet6','Certification Agreement Bullet 6'); ?></div>
                                    </div>
                                </div>
                                <?php endif; ?>
                                <?php if ($this->params->get('display_custom_yes_no','0') == '1') : ?>
                                <div class="row-fluid">
                                    <div class="span12">
                                        <div class="span10"><?php echo $this->params->get('text_custom_yes_no',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_CRESPONSIVE_SH_CUSTOM_YES_NO_TEXT')); ?></div>
                                        <div class="span2"><?php echo $this->options['custom_yes_no']; ?>
                                    </div>
                                </div>
                                <?php endif; ?>
                                <?php endif; ?>
                            </fieldset>
                            <?php endif; ?>
                    
                            <?php if ($this->params->get('use_captcha','1') == '1') : ?>
                            <fieldset id="jg_captcha">
                                <legend><?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_CRESPONSIVE_CAPTCHA_TEXT'); ?></legend>
                                <table width="100%" class="jg_captcha">
                                    <tr>
                                        <td>
                                            <input size="40" onclick="if (this.value=='<?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_CRESPONSIVE_ENTER_CAPTCHA_INSTRUCTIONS'); ?>') this.value='';" type="text" name="captcha_entered" id="captcha_entered" maxlength="8" value="<?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_CRESPONSIVE_ENTER_CAPTCHA_INSTRUCTIONS'); ?>" />&nbsp;
                                            <img name="captcha_img" id="captcha_img" alt="captcha" src="<?php echo 'index.php?option=com_jobgrokapp&amp;view=application&amp;format=captcha&amp;Itemid='.JRequest::getVar('Itemid'); ?>" />
                                        </td>
                                    </tr>
                                </table>
                            </fieldset>
                            <?php endif; ?>
                            <?php if ($this->params->get('use_captcha','1') == '2') : ?>
                            <fieldset id="jg_captcha">
                                <legend><?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_CRESPONSIVE_CAPTCHA_TEXT'); ?></legend>
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
                                        <?php echo $this->params->get('field_type_name_in_signature_box',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_CRESPONSIVE_TYPE_NAME_IN_SIGNATURE_BOX')); echo ($this->params->get('required_signature','1')=='0')?'*':''; ?>:
                                        <input class="text_area<?php echo ($this->params->get('required_signature','1')=='0'&&!$this->application->signature)?$required_class:''; ?>" type="text" name="signature" id="signature" size="35" maxlength="250" value = "<?php if (isset($this->application)) echo $this->application->signature;?>" />
                                    </td>
                                    <td valign="top" align="right" class="key" style="border: 0px; font-size: 8pt;">
                                        <?php
                                            if ($this->params->get('app_create_date_location','bottom') == 'bottom') {
                                                echo $this->params->get('app_todays_date_text',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_CRESPONSIVE_TODAYS_DATE')); ?>:&nbsp;<?php 
                                                $timenow = new JDate();
                                                $mysqlTime = JHTML::_('date', $timenow,$this->params->get('jg_date_format','Y-m-d G:i:s'));
                                                echo "<span id='jg_date_format'>".$mysqlTime."</span>";
                                                //echo date($this->params->get('jg_date_format','Y-m-d H:i:s')); 
                                            }
                                        ?><br />
                                    </td>
                                </tr>
                                <?php endif; ?>
                                <?php /*?><tr>
                                    <td colspan="3" align="center">
                                        <input type="button" name="submit_app" onclick="document.adminForm.submit();" value="<?php echo $this->params->get('submit_application_text',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_CRESPONSIVE_SUBMIT_APPLICATION')); ?>" />
                                    </td>
                                </tr><?php */?>
                            </table>
                            
                            <div class="form-fild">
                            	<div class="enquiries-send"><input type="button" name="submit_app"<?php /*?> onclick="document.adminForm.submit();"<?php */?> onclick="checkValid()" value="<?php echo $this->params->get('submit_application_text',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_CRESPONSIVE_SUBMIT_APPLICATION')); ?>" /></div>
                            </div>
                            <?php 
								$session =& JFactory::getSession();
								$success = $session->get('enq_success');
								if($success==1){
							?>
                            <div id="message">
                                <div class="sec-msg-box">
                                	<div class="sec-msg"><h5>Thank you.</h5>Your Employment Application has been successfully sent.</div>
                                </div>
                            </div>
                            <?php } 
							?>
                            <div id="compulsoryid" class="compulsory-msg-box" style="display:none;">
                            	<div class="compulsory-msg"><h5>Compulsory.</h5>Please enter your information.</div>
                            </div>
                            <input type="hidden" name="id" value="<?php if (isset($this->application)) echo $this->application->id; ?>" />
                            <input type="hidden" name="controller" value="application" />
                            <input type="hidden" name="view" value="application" />
                            <input type="hidden" name="source" value="cresponsive" />
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
            	</div>
                </div>
            </div>
        </div>
	</div>
</section>
<br class="clear">
<script language="javascript">
function emailInvalid(s)
{
	if(!(s.match(/^[\w]+([_|\.-][\w]{1,})*@[\w]{1,}([_|-|\.-][\w]{1,})*\.([a-z]{1,5})$/i) ))
		{
		return false;
	}
	else
		return true;
}

function checkValid()
{
	jQuery("#message").remove();
	var first_name = jQuery('#first_name').val()
	var home_phone = jQuery('#home_phone').val()
	var email_address = jQuery('#email_address').val()
	var file_name = jQuery('#file_name').val()
	
	if(first_name != '' && home_phone != '' && email_address != '' && emailInvalid(email_address) && file_name != '')
	{
		document.adminForm.submit();
		//document.getElementById('positionform').scrollIntoView();
	}
	else
	{
		if(first_name=='')
		{
			jQuery('#first_name').addClass('error');
			jQuery('#first_name').parents('.form-fild').find('.compulsory-msg-box').remove();
			jQuery('#first_name').parents('.form-fild').append('<div class="compulsory-msg-box"><div class="compulsory-msg block-err">Please enter name.</div></div>');
		}
		else
		{
			jQuery('#first_name').removeClass('error');
			jQuery('#first_name').parents('.form-fild').find('.compulsory-msg-box').remove();
		}
		if(home_phone=='')
		{
			jQuery('#home_phone').addClass('error');
			jQuery('#home_phone').parents('.form-fild').find('.compulsory-msg-box').remove();
			jQuery('#home_phone').parents('.form-fild').append('<div class="compulsory-msg-box"><div class="compulsory-msg block-err">Please enter contact number.</div></div>');
		}
		else
		{
			jQuery('#home_phone').removeClass('error');
			jQuery('#home_phone').parents('.form-fild').find('.compulsory-msg-box').remove();
		}
		if(email_address=='' || !emailInvalid(email_address))
		{
			jQuery('#email_address').addClass('error');
			jQuery('#email_address').parents('.form-fild').find('.compulsory-msg-box').remove();
			jQuery('#email_address').parents('.form-fild').append('<div class="compulsory-msg-box"><div class="compulsory-msg block-err">Please enter email address.</div></div>');
		}
		else
		{
			jQuery('#email_address').removeClass('error');
			jQuery('#email_address').parents('.form-fild').find('.compulsory-msg-box').remove();
		}
		if(file_name=='')
		{
			jQuery('#file_name').parents('.inputBtnSection').addClass('error');
			jQuery('#file_name').parents('.form-fild').find('.compulsory-msg-box').remove();
			jQuery('#file_name').parents('.form-fild').append('<div class="compulsory-msg-box"><div class="compulsory-msg block-err">Please upload resume.</div></div>');
		}
		else
		{
			jQuery('#file_name').parents('.inputBtnSection').removeClass('error');
			jQuery('#file_name').parents('.form-fild').find('.compulsory-msg-box').remove();
		}
		
		
		
		jQuery("#compulsoryid").show();
	}
}
jQuery( document ).ready(function() {
	jQuery("#first_name").attr("placeholder", "Name*").blur();
	jQuery("#home_phone").attr("placeholder", "Contact number*").blur();
	jQuery("#email_address").attr("placeholder", "Email address*").blur();

	jQuery('#email_address').focus(function(){
		var email_address = jQuery('#email_address').val()
		jQuery('#email_address').removeClass('velidation_success velidation_error').addClass('velidation_waiting');
	});
	jQuery('#email_address').blur(function(){
		var email_address = jQuery('#email_address').val();
		if(email_address=='' || !emailInvalid(email_address))
		{
			jQuery('#email_address').addClass('error');
			jQuery('#email_address').removeClass('velidation_waiting').addClass('velidation_error').parents('.form-fild').find('.compulsory-msg-box').remove();
			jQuery('#email_address').parents('.form-fild').append('<div class="compulsory-msg-box"><div class="compulsory-msg block-err">Please enter a valid email address.</div></div>');
		}
		else
		{
			jQuery('#email_address').removeClass('error');
			jQuery('#email_address').removeClass('velidation_waiting velidation_error').addClass('velidation_success').parents('.form-fild').find('.compulsory-msg-box').remove();
		}
	});
});

(function(jQuery) {
    jQuery.fn.checkFileType = function(options) {
		
        var defaults = {
            allowedExtensions: [],
            success: function() {},
            error: function() {}
        };
        options = jQuery.extend(defaults, options);
		
        return this.each(function() {
				
            jQuery(this).on('change', function() {
				var value = jQuery(this).val(),					
                    file = value.toLowerCase(),
                    extension = file.substring(file.lastIndexOf('.') + 1);
					
                if (jQuery.inArray(extension, options.allowedExtensions) == -1) {
                    options.error();
                    jQuery(this).focus();
                } else {
                    options.success();

                }

            });

        });
    };

})(jQuery);
</script>

<?php 
$session = JFactory::getSession();
$session->clear('enq_success')
?>