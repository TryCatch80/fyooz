<?php
/**
 *
 *
 * This is the static_pdf.php view layout for jobgrokapp
 *
 * Created: November 18, 2014, 3:25 am
 *
 * Subversion Details
 * $Date: 2013-05-22 19:17:39 -0500 (Wed, 22 May 2013) $
 * $Revision: 5166 $
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
 
 // if request['source']='form' then coming from compact form
 // if request['source']='long' then coming from long form
 
?>
<?php if ($this->viewtype == 'html') { ?>
<div style="text-align: right;"><a href="<?php echo $this->pdflink; ?>">
<?php echo JHTML::_('image',DIRECTORY_SEPARATOR.'media'.DIRECTORY_SEPARATOR.'system'.DIRECTORY_SEPARATOR.'images'.DIRECTORY_SEPARATOR.'pdf_button.png','PDF'); ?>
</a><a href="<?php echo $this->printlink; ?>">
<?php echo JHTML::_('image',DIRECTORY_SEPARATOR.'media'.DIRECTORY_SEPARATOR.'system'.DIRECTORY_SEPARATOR.'images'.DIRECTORY_SEPARATOR.'printButton.png','Print'); ?>
</a></div>
<?php } ?>
<h1>
<?php echo $this->params->get('title'); ?>
</h1>
<?php if ($this->params->get('personal_information') == '1') { ?>
<h3>Personal Information</h3><p><table>
<?php if ($this->params->get('personal_information_first_name') == '1') { ?>
<tr><td><strong><?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_PDF_FIRST_NAME'); ?>:</strong></td><td><?php echo $this->application->first_name; ?></td></tr>
<?php } ?>
<?php if ($this->params->get('personal_information_middle_name') == '1') { ?>
<tr><td><strong><?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_PDF_MIDDLE_NAME'); ?>:</strong></td><td><?php echo $this->application->middle_name; ?></td></tr>
<?php } ?>
<?php if ($this->params->get('personal_information_last_name') == '1') { ?>
<tr><td><strong><?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_PDF_LAST_NAME'); ?>:</strong></td><td><?php echo $this->application->last_name; ?></td></tr>
<?php } ?>
<?php if ($this->params->get('personal_information_home_phone') == '1') { ?>
<tr><td><strong><?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_PDF_HOME_PHONE'); ?>:</strong></td><td><?php echo $this->application->home_phone; ?></td></tr>
<?php } ?>
<?php if ($this->params->get('personal_information_work_phone') == '1') { ?>
<tr><td><strong><?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_PDF_WORK_PHONE'); ?>:</strong></td><td><?php echo $this->application->work_phone; ?></td></tr>
<?php } ?>
<?php if ($this->params->get('personal_information_cell_phone') == '1') { ?>
<tr><td><strong><?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_PDF_CELL_PHONE'); ?>:</strong></td><td><?php echo $this->application->cell_phone; ?></td></tr>
<?php } ?>
<?php if ($this->params->get('personal_information_email_address') == '1') { ?>
<tr><td><strong><?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_PDF_EMAIL_ADDRESS'); ?>:</strong></td><td><?php echo $this->application->email_address; ?></td></tr>
<?php } ?>
</table></p>
<?php } ?>
<?php if ($this->params->get('addresses') == '1') { ?>
<h3><?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_PDF_CURRENT_ADDRESS'); ?></h3><p><table>
<?php if ($this->params->get('addresses_street') == '1') { ?>
<tr><td><strong><?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_PDF_STREET'); ?>:</strong></td><td><?php echo $this->application->street; ?></td></tr>
<?php } ?>
<?php if ($this->params->get('addresses_city') == '1') { ?>
<tr><td><strong><?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_PDF_CITY'); ?>:</strong></td><td><?php echo $this->application->city; ?></td></tr>
<?php } ?>
<?php if ($this->params->get('addresses_state') == '1') { ?>
<tr><td><strong><?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_PDF_STATE'); ?>:</strong></td><td><?php echo $this->application->state; ?></td></tr>
<?php } ?>
<?php if ($this->params->get('addresses_zip_code') == '1') { ?>
<tr><td><strong><?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_PDF_ZIP_CODE'); ?>:</strong></td><td><?php echo $this->application->zip_code; ?></td></tr>
<?php } ?>
<?php if ($this->params->get('addresses_since') == '1') { ?>
<tr><td><strong><?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_PDF_ADDRESS_SINCE'); ?>:</strong></td><td><?php echo $this->application->from_date; ?></td></tr>
<?php } ?>
</table></p><h3><?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_PDF_PRIOR_ADDRESS'); ?>&nbsp;(1)</h3><p><table>
<?php if ($this->params->get('addresses_street') == '1') { ?>
<tr><td><strong><?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_PDF_STREET'); ?>:</strong></td><td><?php echo $this->application->street1; ?></td></tr>
<?php } ?>
<?php if ($this->params->get('addresses_city') == '1') { ?>
<tr><td><strong><?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_PDF_CITY'); ?>:</strong></td><td><?php echo $this->application->city1; ?></td></tr>
<?php } ?>
<?php if ($this->params->get('addresses_state') == '1') { ?>
<tr><td><strong><?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_PDF_STATE'); ?>:</strong></td><td><?php echo $this->application->state1; ?></td></tr>
<?php } ?>
<?php if ($this->params->get('addresses_zip_code') == '1') { ?>
<tr><td><strong><?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_PDF_ZIP_CODE'); ?>:</strong></td><td><?php echo $this->application->zip_code1; ?></td></tr>
<?php } ?>
<?php if ($this->params->get('addresses_since') == '1') { ?>
<tr><td><strong><?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_PDF_ADDRESS_SINCE'); ?>:</strong></td><td><?php echo $this->application->from_date1; ?></td></tr>
<?php } ?>
<?php if ($this->params->get('addresses_to') == '1') { ?>
<tr><td><strong><?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_PDF_ADDRESS_TO'); ?>:</strong></td><td><?php echo $this->application->to_date1; ?></td></tr>
<?php } ?>
</table></p><h3><?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_PDF_PRIOR_ADDRESS'); ?>&nbsp;(2)</h3><p><table>
<?php if ($this->params->get('addresses_street') == '1') { ?>
<tr><td><strong><?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_PDF_STREET'); ?>:</strong></td><td><?php echo $this->application->street2; ?></td></tr>
<?php } ?>
<?php if ($this->params->get('addresses_city') == '1') { ?>
<tr><td><strong><?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_PDF_CITY'); ?>:</strong></td><td><?php echo $this->application->city2; ?></td></tr>
<?php } ?>
<?php if ($this->params->get('addresses_state') == '1') { ?>
<tr><td><strong><?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_PDF_STATE'); ?>:</strong></td><td><?php echo $this->application->state2; ?></td></tr>
<?php } ?>
<?php if ($this->params->get('addresses_zip_code') == '1') { ?>
<tr><td><strong><?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_PDF_ZIP_CODE'); ?>:</strong></td><td><?php echo $this->application->zip_code2; ?></td></tr>
<?php } ?>
<?php if ($this->params->get('addresses_since') == '1') { ?>
<tr><td><strong><?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_PDF_ADDRESS_SINCE'); ?>:</strong></td><td><?php echo $this->application->from_date2; ?></td></tr>
<?php } ?><?php if ($this->params->get('addresses_to') == '1') { ?>
<tr><td><strong><?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_PDF_ADDRESS_TO'); ?>:</strong></td><td><?php echo $this->application->to_date2; ?></td></tr>
<?php } ?>
</table></p>
<?php } ?>
<?php if ($this->params->get('education') == '1') { ?>
<h3><?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_PDF_HIGH_SCHOOL'); ?></h3><p><table>
<?php if ($this->params->get('education_school') == '1') { ?>
<tr><td><strong><?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_PDF_SCHOOL_ATTENDED'); ?>:</strong></td><td><?php echo $this->application->school;?></td></tr>
<?php } ?>
<?php if ($this->params->get('education_city') == '1') { ?>
<tr><td><strong><?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_PDF_CITY'); ?>:</strong></td><td><?php echo $this->application->school_city;?></td></tr>
<?php } ?>
<?php if ($this->params->get('education_state') == '1') { ?>
<tr><td><strong><?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_PDF_STATE'); ?>:</strong></td><td><?php echo $this->application->school_state;?></td></tr>
<?php } ?>
<?php if ($this->params->get('education_diploma') == '1') { ?>
<tr><td><strong><?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_PDF_DIPLOMA'); ?>:</strong></td><td><?php if ( '1' == $this->application->school_diploma) echo JText::_('YES'); else echo JText::_('NO');?></td></tr>
<?php } ?>
</table></p><h3><?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_PDF_UNDERGRAD_SCHOOL'); ?></h3><p><table>
<?php if ($this->params->get('education_school') == '1') { ?>
<tr><td><strong><?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_PDF_SCHOOL_ATTENDED'); ?>:</strong></td><td><?php echo $this->application->school1;?></td></tr>
<?php } ?>
<?php if ($this->params->get('education_city') == '1') { ?>
<tr><td><strong><?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_PDF_CITY'); ?>:</strong></td><td><?php echo $this->application->school_city1;?></td></tr>
<?php } ?>
<?php if ($this->params->get('education_state') == '1') { ?>
<tr><td><strong><?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_PDF_STATE'); ?>:</strong></td><td><?php echo $this->application->school_state1;?></td></tr>
<?php } ?>
<?php if ($this->params->get('education_diploma') == '1') { ?>
<tr><td><strong><?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_PDF_DIPLOMA'); ?>:</strong></td><td><?php if ( '1' == $this->application->school_diploma1) echo JText::_('YES'); else echo JText::_('NO');?></td></tr>
<?php } ?>
<?php if ($this->params->get('education_degree') == '1') { ?>
<tr><td><strong><?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_PDF_DEG_CERT_DIP_LONG'); ?>:</strong></td><td><?php echo $this->application->diploma_text1;?></td></tr>
<?php } ?>
<?php if ($this->params->get('education_study') == '1') { ?>
<tr><td><strong><?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_PDF_AREA_OF_STUDY'); ?>:</strong></td><td><?php echo $this->application->study_area1;?></td></tr>
<?php } ?>
</table></p><h3><?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_PDF_GRAD_SCHOOL'); ?></h3><p><table>
<?php if ($this->params->get('education_school') == '1') { ?>
<tr><td><strong><?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_PDF_SCHOOL_ATTENDED'); ?>:</strong></td><td><?php echo $this->application->school2;?></td></tr>
<?php } ?>
<?php if ($this->params->get('education_city') == '1') { ?>
<tr><td><strong><?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_PDF_CITY'); ?>:</strong></td><td><?php echo $this->application->school_city2;?></td></tr>
<?php } ?>
<?php if ($this->params->get('education_state') == '1') { ?>
<tr><td><strong><?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_PDF_STATE'); ?>:</strong></td><td><?php echo $this->application->school_state2;?></td></tr>
<?php } ?>
<?php if ($this->params->get('education_diploma') == '1') { ?>
<tr><td><strong><?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_PDF_DIPLOMA'); ?>:</strong></td><td><?php if ( '1' == $this->application->school_diploma2) echo JText::_('YES'); else echo JText::_('NO');?></td></tr>
<?php } ?>
<?php if ($this->params->get('education_degree') == '1') { ?>
<tr><td><strong><?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_PDF_DEG_CERT_DIP_LONG'); ?>:</strong></td><td><?php echo $this->application->diploma_text2;?></td></tr>
<?php } ?>
<?php if ($this->params->get('education_study') == '1') { ?>
<tr><td><strong><?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_PDF_AREA_OF_STUDY'); ?>:</strong></td><td><?php echo $this->application->study_area2;?></td></tr>
<?php } ?>
</table></p><h3><?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_PDF_OTHER_SCHOOL'); ?></h3><p><table>
<?php if ($this->params->get('education_school') == '1') { ?>
<tr><td><strong><?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_PDF_SCHOOL_ATTENDED'); ?>:</strong></td><td><?php echo $this->application->school3;?></td></tr>
<?php } ?>
<?php if ($this->params->get('education_city') == '1') { ?>
<tr><td><strong><?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_PDF_CITY'); ?>:</strong></td><td><?php echo $this->application->school_city3;?></td></tr>
<?php } ?>
<?php if ($this->params->get('education_state') == '1') { ?>
<tr><td><strong><?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_PDF_STATE'); ?>:</strong></td><td><?php echo $this->application->school_state3;?></td></tr>
<?php } ?>
<?php if ($this->params->get('education_diploma') == '1') { ?>
<tr><td><strong><?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_PDF_DIPLOMA'); ?>:</strong></td><td><?php if ( '1' == $this->application->school_diploma3) echo JText::_('YES'); else echo JText::_('NO');?></td></tr>
<?php } ?>
<?php if ($this->params->get('education_degree') == '1') { ?>
<tr><td><strong><?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_PDF_DEG_CERT_DIP_LONG'); ?>:</strong></td><td><?php echo $this->application->diploma_text3;?></td></tr>
<?php } ?>
<?php if ($this->params->get('education_study') == '1') { ?>
<tr><td><strong><?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_PDF_AREA_OF_STUDY'); ?>:</strong></td><td><?php echo $this->application->study_area3;?></td></tr>
<?php } ?>
</table></p>
<?php } ?>
<?php if ($this->params->get('employment_information') == '1') { ?>
<h3><?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_PDF_EMPLOYMENT_INFORMATION'); ?></h3><table>
<?php if ($this->params->get('employment_information_position') == '1') { ?>
<tr><td><strong><?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_PDF_POSITION_APPLIED_FOR'); ?>:</strong></td><td colspan="2" ><?php echo $this->application->position;?></td></tr>
<?php } ?>
<?php if ($this->params->get('employment_information_date_you_can_start') == '1') { ?>
<tr><td><strong><?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_PDF_DATE_YOU_CAN_START'); ?>:</strong></td><td colspan="2" ><?php echo $this->application->available_date;?></td></tr>
<?php } ?>
<?php if ($this->params->get('employment_information_desired_salary','1') == '1') { ?>
<tr><td><strong><?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_PDF_DESIRED_SALARY'); ?>:</strong></td><td colspan="2" >$&nbsp;<?php echo $this->application->desired_pay;?></td></tr>
<?php } ?>
<?php if ($this->params->get('employment_information_do_you_prefer','1') == '1') { ?>
<tr><td><strong><?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_PDF_DO_YOU_PREFER'); ?>:</strong></td><td colspan="2" valign="top" ><?php echo $this->application->work_preferences; ?></td></tr>
<?php } ?>
<?php if ( '1' == $this->application->saturday ) echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_PDF_SATURDAY')." "; ?><?php if ( '1' == $this->application->sunday ) echo JText::_('SUNDAY')." "; ?></td></tr>
<?php } ?>
<?php if ($this->params->get('employment_information_not_available') == '1') { ?>
<tr><td><strong><?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_PDF_NOT_AVAILABLE'); ?>:</strong></td><td colspan="2" ><?php echo $this->application->unavailability;?></td></tr>
<?php }?>
<tr><td></td><td><strong><?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_PDF_FOLLOWING_QUESTIONS'); ?>.</strong></td></tr>
<?php if ($this->params->get('employment_information_question_1') == '1') { ?>
<tr><td valign="top"><strong>1.</strong></td><td><strong><?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_PDF_QUESTION_1'); ?></strong></td><td><br /><?php if( '1' == $this->application->eligible) echo JText::_('YES'); else echo JText::_('NO'); ?></td></tr>
<?php } ?>
<?php if ($this->params->get('employment_information_question_2') == '1') { ?>
<tr><td valign="top"><strong>2.</strong></td><td><strong><?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_PDF_QUESTION_2'); ?><?php echo JText::_('QUESTION_2_FOLLOWUP'); ?></strong></td><td><br/><?php if ( '1' == $this->application->worked_here_before) echo JText::_('YES'); else echo JText::_('NO'); ?></td></tr>
<tr><td></td><td><?php echo $this->application->worked_here_text;?></td></tr><?php } ?>
<?php if ($this->params->get('employment_information_question_3') == '1') { ?>
<tr><td valign="top"><strong>3.</strong></td><td><strong><?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_PDF_QUESTION_3'); ?></strong></td><td><br /><?php if ( '1' == $this->application->job_desc_received) echo JText::_('YES'); else echo JText::_('NO'); ?></td></tr>
<?php } ?>
<?php if ($this->params->get('employment_information_question_4') == '1') { ?>
<tr><td valign="top"><strong>4.</strong></td><td><strong><?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_PDF_QUESTION_4'); ?><?php echo JText::_('QUESTION_4_FOLLOWUP'); ?></strong></td><td><br/><?php if ( '1' == $this->application->understand_reqs) echo JText::_('YES'); else echo JText::_('NO'); ?></td></tr>
<tr><td></td><td><?php echo $this->application->no_understand_reqs;?></td></tr>
<?php } ?>
<?php if ($this->params->get('employment_information_question_5') == '1') { ?>
<tr><td valign="top"><strong>5.</strong></td><td><strong><?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_PDF_QUESTION_5'); ?></td><td><br /><?php if ( '1' == $this->application->on_layoff) echo JText::_('YES'); else echo JText::_('NO'); ?></td></tr>
<?php } ?>
<?php if ($this->params->get('employment_information_question_6') == '1') { ?>
<tr><td valign="top"><strong>6.</strong></td><td><strong><?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_PDF_QUESTION_6'); ?><?php echo JText::_('QUESTION_6_FOLLOWUP'); ?></strong></td><td><br/><?php if ( '1' == $this->application->conf_agreement) echo JText::_('YES'); else echo JText::_('NO'); ?></td></tr>
<tr><td></td><td><?php echo $this->application->conf_explain;?></td></tr>
<?php } ?>
<?php if ($this->params->get('employment_information_question_7') == '1') { ?>
<tr><td valign="top"><strong>7.</strong></td><td><strong><?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_PDF_QUESTION_7'); ?><?php echo JText::_('QUESTION_7_FOLLOWUP'); ?></strong></td><td><br/><?php if ( '1' == $this->application->discharged) echo JText::_('YES'); else echo JText::_('NO'); ?></td></tr>
<tr><td></td><td><?php echo $this->application->discharge_explain;?></td></tr>
<?php } ?>
<?php if ($this->params->get('employment_information_question_8') == '1') { ?>
<tr><td valign="top"><strong>8.</strong></td><td><strong><?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_PDF_QUESTION_8'); ?><?php echo JText::_('QUESTION_8_FOLLOWUP'); ?></td><td><br /><?php if ( '1' == $this->application->convict) echo JText::_('YES'); else echo JText::_('NO'); ?></td></tr>
<tr><td><td><?php echo $this->application->convict_explain;?></td></tr>
<?php } ?>
</table></p>

<?php if ($this->params->get('employment_history') == '1') { ?>
<h3><?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_PDF_MOST_RECENT_EMPLOYER'); ?></h3><p><table>
<?php if ( $this->params->get('employment_history_employer') == '1') { ?>
<tr><td><strong><?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_PDF_EMPLOYER'); ?>:</strong></td><td><?php echo $this->application->employer;?></td></tr>
<?php } ?>
<?php if ( $this->params->get('employment_history_city') == '1') { ?>
<tr><td><strong><?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_PDF_CITY'); ?>:</strong></td><td><?php echo $this->application->employer_city;?></td></tr>
<?php } ?>
<?php if ( $this->params->get('employment_history_state') == '1') { ?>
<tr><td><strong><?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_PDF_STATE'); ?>:</strong></td><td><?php echo $this->application->employer_state;?></td></tr>
<?php } ?>
<?php if ( $this->params->get('employment_history_zip_code') == '1') { ?>
<tr><td><strong><?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_PDF_ZIP_CODE'); ?>:</strong></td><td><?php echo $this->application->employer_zip;?></td></tr>
<?php } ?>
<?php if ( $this->params->get('employment_history_phone') == '1') { ?>
<tr><td><strong><?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_PDF_PHONE'); ?>:</strong></td><td><?php echo $this->application->employer_phone;?></td></tr>
<?php } ?>
<?php if ( $this->params->get('employment_history_position') == '1') { ?>
<tr><td><strong><?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_PDF_POSITION_HELD'); ?>:</strong></td><td><?php echo $this->application->employer_pos;?></td></tr>
<?php } ?>
<?php if ( $this->params->get('employment_history_from') == '1') { ?>
<tr><td><strong><?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_PDF_FROM_MYYYY'); ?>:</strong></td><td><?php echo $this->application->employer_from;?></td></tr>
<?php } ?>
<?php if ( $this->params->get('employment_history_to') == '1') { ?>
<tr><td><strong><?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_PDF_TO_MMYYYY'); ?>:</strong></td><td><?php echo $this->application->employer_to;?></td></tr>
<?php } ?>
<?php if ( $this->params->get('employment_history_pay') == '1') { ?>
<tr><td><strong><?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_PDF_PAY_UPON_LEAVING'); ?>:</strong></td><td><?php echo $this->application->employer_pay;?></td></tr>
<?php } ?>
<?php if ( $this->params->get('employment_history_supervisor') == '1') { ?>
<tr><td><strong><?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_PDF_SUPERVISOR'); ?>:</strong></td><td><?php echo $this->application->employer_sup;?></td></tr>
<?php } ?>
<?php if ( $this->params->get('employment_history_duties') == '1') { ?>
<tr><td><strong><?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_PDF_DUTIES'); ?>:</strong></td><td><?php echo $this->application->employer_dut;?></td></tr>
<?php } ?>
<?php if ( $this->params->get('employment_history_reason') == '1') { ?>
<tr><td><strong><?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_PDF_REASON_FOR_LEAVING'); ?>:</strong></td><td><?php echo $this->application->employer_leave;?></td></tr>
<?php } ?>
</table></p><h3><?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_PDF_PRIOR_EMPLOYER'); ?>&nbsp;(1)</h3><p><table>
<?php if ( $this->params->get('employment_history_employer') == '1') { ?>
<tr><td><strong><?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_PDF_EMPLOYER'); ?>:</strong></td><td><?php echo $this->application->employer1;?></td></tr>
<?php } ?>
<?php if ( $this->params->get('employment_history_city') == '1') { ?>
<tr><td><strong><?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_PDF_CITY'); ?>:</strong></td><td><?php echo $this->application->employer1_city;?></td></tr>
<?php } ?>
<?php if ( $this->params->get('employment_history_state') == '1') { ?>
<tr><td><strong><?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_PDF_STATE'); ?>:</strong></td><td><?php echo $this->application->employer1_state;?></td></tr>
<?php } ?>
<?php if ( $this->params->get('employment_history_zip_code') == '1') { ?>
<tr><td><strong><?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_PDF_ZIP_CODE'); ?>:</strong></td><td><?php echo $this->application->employer1_zip;?></td></tr>
<?php } ?>
<?php if ( $this->params->get('employment_history_phone') == '1') { ?>
<tr><td><strong><?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_PDF_PHONE'); ?>:</strong></td><td><?php echo $this->application->employer1_phone;?></td></tr>
<?php } ?>
<?php if ( $this->params->get('employment_history_position') == '1') { ?>
<tr><td><strong><?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_PDF_POSITION_HELD'); ?>:</strong></td><td><?php echo $this->application->employer1_pos;?></td></tr>
<?php } ?>
<?php if ( $this->params->get('employment_history_from') == '1') { ?>
<tr><td><strong><?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_PDF_FROM_MYYYY'); ?>:</strong></td><td><?php echo $this->application->employer1_from;?></td></tr>
<?php } ?>
<?php if ( $this->params->get('employment_history_to') == '1') { ?>
<tr><td><strong><?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_PDF_TO_MYYYY'); ?>:</strong></td><td><?php echo $this->application->employer1_to;?></td></tr>
<?php } ?>
<?php if ( $this->params->get('employment_history_pay') == '1') { ?>
<tr><td><strong><?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_PDF_PAY_UPON_LEAVING'); ?>:</strong></td><td><?php echo $this->application->employer1_pay;?></td></tr>
<?php } ?>
<?php if ( $this->params->get('employment_history_supervisor') == '1') { ?>
<tr><td><strong><?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_PDF_SUPERVISOR'); ?>:</strong></td><td><?php echo $this->application->employer1_sup;?></td></tr>
<?php } ?>
<?php if ( $this->params->get('employment_history_duties') == '1') { ?>
<tr><td><strong><?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_PDF_DUTIES'); ?>:</strong></td><td><?php echo $this->application->employer1_dut;?></td></tr>
<?php } ?>
<?php if ( $this->params->get('employment_history_reason') == '1') { ?>
<tr><td><strong><?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_PDF_REASON_FOR_LEAVING'); ?>:</strong></td><td><?php echo $this->application->employer1_leave;?></td></tr>
<?php } ?>
</table></p><h3><?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_PDF_PRIOR_EMPLOYER'); ?>&nbsp;(2)</h3><p><table>
<?php if ( $this->params->get('employment_history_employer') == '1') { ?>
<tr><td><strong><?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_PDF_EMPLOYER'); ?>:</strong></td><td><?php echo $this->application->employer2;?></td></tr>
<?php } ?>
<?php if ( $this->params->get('employment_history_city') == '1') { ?>
<tr><td><strong><?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_PDF_CITY'); ?>:</strong></td><td><?php echo $this->application->employer2_city;?></td></tr>
<?php } ?>
<?php if ( $this->params->get('employment_history_state') == '1') { ?>
<tr><td><strong><?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_PDF_STATE'); ?>:</strong></td><td><?php echo $this->application->employer2_state;?></td></tr>
<?php } ?>
<?php if ( $this->params->get('employment_history_zip_code') == '1') { ?>
<tr><td><strong><?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_PDF_ZIP_CODE'); ?>:</strong></td><td><?php echo $this->application->employer2_zip;?></td></tr>
<?php } ?>
<?php if ( $this->params->get('employment_history_phone') == '1') { ?>
<tr><td><strong><?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_PDF_PHONE'); ?>:</strong></td><td><?php echo $this->application->employer2_phone;?></td></tr>
<?php } ?>
<?php if ( $this->params->get('employment_history_position') == '1') { ?>
<tr><td><strong><?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_PDF_POSITION_HELD'); ?>:</strong></td><td><?php echo $this->application->employer2_pos;?></td></tr>
<?php } ?>
<?php if ( $this->params->get('employment_history_from') == '1') { ?>
<tr><td><strong><?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_PDF_FROM_MYYYY'); ?>:</strong></td><td><?php echo $this->application->employer2_from;?></td></tr>
<?php } ?>
<?php if ( $this->params->get('employment_history_to') == '1') { ?>
<tr><td><strong><?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_PDF_TO_MYYYY'); ?>:</strong></td><td><?php echo $this->application->employer2_to;?></td></tr>
<?php } ?>
<?php if ( $this->params->get('employment_history_pay') == '1') { ?>
<tr><td><strong><?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_PDF_PAY_UPON_LEAVING'); ?>:</strong></td><td><?php echo $this->application->employer2_pay;?></td></tr>
<?php } ?>
<?php if ( $this->params->get('employment_history_supervisor') == '1') { ?>
<tr><td><strong><?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_PDF_SUPERVISOR'); ?>:</strong></td><td><?php echo $this->application->employer2_sup;?></td></tr>
<?php } ?>
<?php if ( $this->params->get('employment_history_duties') == '1') { ?>
<tr><td><strong><?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_PDF_DUTIES'); ?>:</strong></td><td><?php echo $this->application->employer2_dut;?></td></tr>
<?php } ?>
<?php if ( $this->params->get('employment_history_reason') == '1') { ?>
<tr><td><strong><?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_PDF_REASON_FOR_LEAVING'); ?>:</strong></td><td><?php echo $this->application->employer2_leave;?></td></tr>
<?php } ?>
</table></p><h3><?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_PDF_PRIOR_EMPLOYER'); ?>&nbsp;(3)</h3><p><table>
<?php if ( $this->params->get('employment_history_employer') == '1') { ?>
<tr><td><strong><?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_PDF_EMPLOYER'); ?>:</strong></td><td><?php echo $this->application->employer3;?></td></tr>
<?php } ?>
<?php if ( $this->params->get('employment_history_city') == '1') { ?>
<tr><td><strong><?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_PDF_CITY'); ?>:</strong></td><td><?php echo $this->application->employer3_city;?></td></tr>
<?php } ?>
<?php if ( $this->params->get('employment_history_state') == '1') { ?>
<tr><td><strong><?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_PDF_STATE'); ?>:</strong></td><td><?php echo $this->application->employer3_state;?></td></tr>
<?php } ?>
<?php if ( $this->params->get('employment_history_zip_code') == '1') { ?>
<tr><td><strong><?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_PDF_ZIP_CODE'); ?>:</strong></td><td><?php echo $this->application->employer3_zip;?></td></tr>
<?php } ?>
<?php if ( $this->params->get('employment_history_phone') == '1') { ?>
<tr><td><strong><?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_PDF_PHONE'); ?>:</strong></td><td><?php echo $this->application->employer3_phone;?></td></tr>
<?php } ?>
<?php if ( $this->params->get('employment_history_position') == '1') { ?>
<tr><td><strong><?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_PDF_POSITION_HELD'); ?>:</strong></td><td><?php echo $this->application->employer3_pos;?></td></tr>
<?php } ?>
<?php if ( $this->params->get('employment_history_from') == '1') { ?>
<tr><td><strong><?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_PDF_FROM_MYYYY'); ?>:</strong></td><td><?php echo $this->application->employer3_from;?></td></tr>
<?php } ?>
<?php if ( $this->params->get('employment_history_to') == '1') { ?>
<tr><td><strong><?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_PDF_TO_MYYYY'); ?>:</strong></td><td><?php echo $this->application->employer3_to;?></td></tr>
<?php } ?>
<?php if ( $this->params->get('employment_history_pay') == '1') { ?>
<tr><td><strong><?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_PDF_PAY_UPON_LEAVING'); ?>:</strong></td><td><?php echo $this->application->employer3_pay;?></td></tr>
<?php } ?>
<?php if ( $this->params->get('employment_history_supervisor') == '1') { ?>
<tr><td><strong><?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_PDF_SUPERVISOR'); ?>:</strong></td><td><?php echo $this->application->employer3_sup;?></td></tr>
<?php } ?>
<?php if ( $this->params->get('employment_history_duties') == '1') { ?>
<tr><td><strong><?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_PDF_DUTIES'); ?>:</strong></td><td><?php echo $this->application->employer3_dut;?></td></tr>
<?php } ?>
<?php if ( $this->params->get('employment_history_reason') == '1') { ?>
<tr><td><strong><?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_PDF_REASON_FOR_LEAVING'); ?>:</strong></td><td><?php echo $this->application->employer3_leave;?></td></tr>
<?php } ?>
</table></p>
<?php } ?>
<?php if ($this->params->get('job_related_skills') == '1') { ?>
<h3><?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_PDF_JOB_RELATED_SKILLS'); ?></h3><p><table><tr><td></td><td><strong><?php echo JText::_('VEHICLE_QUESTIONS'); ?></strong></td></tr>
<?php if ( $this->params->get('job_related_skills_q1') == '1') { ?>
<tr><td valign="top"><strong>1.</strong></td><td><strong><?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_PDF_VEHICLE_QUESTION_1'); ?></strong></td><td><br/><?php if ( '1' == $this->application->driver_license) echo JTEXT::_("Yes"); else echo JTEXT::_("No"); ?></td></tr>
<tr><td></td><td colspan="2"><strong><?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_PDF_VEHICLE_QUESTION_1_FOLLOWUP_A'); ?>:</strong>&nbsp;<?php echo $this->application->dl_number;?><strong><?php echo JText::_('VEHICLE_QUESTION_1_FOLLOWUP_B'); ?>:</strong>&nbsp;<?php echo $this->application->dl_issued;?></td></tr>
<?php } ?>
<?php if ( $this->params->get('job_related_skills_q2') == '1') { ?>
<tr><td valign="top"><strong>2.</strong></td><td><strong><?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_PDF_VEHICLE_QUESTION_2'); ?></strong></td><td><br/><?php if ( '1' == $this->application->driving_offense) echo JText::_('YES'); else echo JText::_('NO'); ?></td></tr>
<?php } ?>
<?php if ( $this->params->get('job_related_skills_q3') == '1') { ?>
<tr><td valign="top"><strong>3.</strong></td><td><strong><?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_PDF_VEHICLE_QUESTION_3'); ?></strong></td><td><br/><?php if ( '1' == $this->application->dl_modified) echo JText::_('YES'); else JText::_('NO'); ?></td></tr>
<?php } ?>
<?php if ( $this->params->get('job_related_skills_states') == '1') { ?>
<tr><td valign="top"><strong>4.</strong></td><td><strong><?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_PDF_VEHICLE_STATES'); ?></strong><?php $this->application->dl_states; ?></td><td></td></tr>
<?php } ?>
<?php if ( $this->params->get('job_related_skills_skills') == '1') { ?>
<tr><td></td><td><strong><?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_PDF_SKILLS'); ?>:</strong><br /><?php echo $this->application->skills; ?></td><td></td></tr>
<?php } ?>
<?php if ( $this->params->get('job_related_skills_designations') == '1') { ?>
<tr><td></td><td><strong><?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_PDF_PROF_DESIGNATIONS'); ?>:</strong><br /><?php echo $this->application->professional; ?></td><td></td></tr>
<?php } ?>
</table></p>
<?php } ?>
<?php if ($this->params->get('references') == '1') { ?>
<h3><?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_PDF_REFERENCE'); ?>&nbsp;(1)</h3><table><?php if ( $this->params->get('references_name') == '1') { ?>
<tr><td><strong><?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_PDF_NAME'); ?>:</strong></td><td><?php echo $this->application->ref1_name;?></td></tr>
<?php } ?>
<?php if ( $this->params->get('references_address') == '1') { ?>
<tr><td><strong><?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_PDF_ADDRESS'); ?>:</strong></td><td><?php echo $this->application->ref1_address;?></td></tr>
<?php } ?>
<?php if ( $this->params->get('references_telephone') == '1') { ?>
<tr><td><strong><?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_PDF_TELEPHONE'); ?>:</strong></td><td><?php echo $this->application->ref1_telephone;?></td></tr>
<?php } ?>
<?php if ( $this->params->get('references_relationship') == '1') { ?>
<tr><td><strong><?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_PDF_RELATIONSHIP'); ?>:</strong></td><td><?php echo $this->application->ref1_relationship;?></td></tr>
<?php } ?>
<?php if ( $this->params->get('references_years_acquainted') == '1') { ?>
<tr><td><strong><?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_PDF_YEARS_ACQUAINTED'); ?>:</strong></td><td><?php echo $this->application->ref1_years;?></td></tr>
<?php } ?>
</table></p><h3><?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_PDF_REFERENCE'); ?>&nbsp;(2)</h3><p><table>
<?php if ( $this->params->get('references_name') == '1') { ?>
<tr><td><strong><?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_PDF_NAME'); ?>:</strong></td><td><?php echo $this->application->ref2_name;?></td></tr>
<?php } ?>
<?php if ( $this->params->get('references_address') == '1') { ?>
<tr><td><strong><?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_PDF_ADDRESS'); ?>:</strong></td><td><?php echo $this->application->ref2_address;?></td></tr>
<?php } ?>
<?php if ( $this->params->get('references_telephone') == '1') { ?>
<tr><td><strong><?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_PDF_TELEPHONE'); ?>:</strong></td><td><?php echo $this->application->ref2_telephone;?></td></tr>
<?php } ?>
<?php if ( $this->params->get('references_relationship') == '1') { ?>
<tr><td><strong><?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_PDF_RELATIONSHIP'); ?>:</strong></td><td><?php echo $this->application->ref2_relationship;?></td></tr>
<?php } ?>
<?php if ( $this->params->get('references_years_acquainted') == '1') { ?>
<tr><td><strong><?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_PDF_YEARS_ACQUAINTED'); ?>:</strong></td><td><?php echo $this->application->ref2_years;?></td></tr>
<?php } ?>
</table></p><h3><?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_PDF_REFERENCE'); ?>&nbsp;(3)</h3><p><table>
<?php if ( $this->params->get('references_name') == '1') { ?>
<tr><td><strong><?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_PDF_NAME'); ?>:</strong></td><td><?php echo $this->application->ref3_name;?></td></tr>
<?php } ?>
<?php if ( $this->params->get('references_address') == '1') { ?>
<tr><td><strong><?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_PDF_ADDRESS'); ?>:</strong></td><td><?php echo $this->application->ref3_address;?></td></tr>
<?php } ?>
<?php if ( $this->params->get('references_telephone') == '1') { ?>
<tr><td><strong><?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_PDF_TELEPHONE'); ?>:</strong></td><td><?php echo $this->application->ref3_telephone;?></td></tr>
<?php } ?>
<?php if ( $this->params->get('references_relationship') == '1') { ?>
<tr><td><strong><?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_PDF_RELATIONSHIP'); ?>:</strong></td><td><?php echo $this->application->ref3_relationship;?></td></tr>
<?php } ?>
<?php if ( $this->params->get('references_years_acquainted') == '1') { ?>
<tr><td><strong><?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_PDF_YEARS_ACQUAINTED'); ?>:</strong></td><td><?php echo $this->application->ref3_years;?></td></tr>
<?php } ?>
</table></p><h3><?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_PDF_REFERENCE'); ?>&nbsp;(4)</h3><p><table>
<?php if ( $this->params->get('references_name') == '1') { ?>
<tr><td><strong><?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_PDF_NAME'); ?>:</strong></td><td><?php echo $this->application->ref4_name;?></td></tr>
<?php } ?>
<?php if ( $this->params->get('references_address') == '1') { ?>
<tr><td><strong><?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_PDF_ADDRESS'); ?>:</strong></td><td><?php echo $this->application->ref4_address;?></td></tr>
<?php } ?>
<?php if ( $this->params->get('references_telephone') == '1') { ?>
<tr><td><strong><?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_PDF_TELEPHONE'); ?>:</strong></td><td><?php echo $this->application->ref4_telephone;?></td></tr>
<?php } ?>
<?php if ( $this->params->get('references_relationship') == '1') { ?>
<tr><td><strong><?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_PDF_RELATIONSHIP'); ?>:</strong></td><td><?php echo $this->application->ref4_relationship;?></td></tr>
<?php } ?>
<?php if ( $this->params->get('references_years_acquainted') == '1') { ?>
<tr><td><strong><?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_PDF_YEARS_ACQUAINTED'); ?>:</strong></td><td><?php echo $this->application->ref4_years;?></td></tr>
<?php } ?>
</table></p><?php if ($this->params->get('text_resume') == '1') { ?>
<h3><?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_PDF_REFERENCE'); ?>&nbsp;(4)</h3><p><table>
<tr><td><strong><?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_PDF_TEXT_RESUME'); ?>:</strong></td><td><?php echo $this->application->text_resume;?></td></tr>
</table>
<?php } ?>
</fieldset>	
<?php } ?>
