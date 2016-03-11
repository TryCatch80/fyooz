<?php
/**
 *
 *
 * This is the static.php view layout for jobgrokapp
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


?>

<?php if ($this->viewtype == 'html')
{ ?>
<div style="text-align: right;"> 
    <a href="<?php echo $this->pdflink; ?>">
            <?php echo JHTML::_('image', DIRECTORY_SEPARATOR.'media'.DIRECTORY_SEPARATOR.'system'.DIRECTORY_SEPARATOR.'images'.DIRECTORY_SEPARATOR.'pdf_button.png','PDF'); ?>
    </a>
    <a href="<?php echo $this->printlink; ?>">
            <?php echo JHTML::_('image', DIRECTORY_SEPARATOR.'media'.DIRECTORY_SEPARATOR.'system'.DIRECTORY_SEPARATOR.'images'.DIRECTORY_SEPARATOR.'printButton.png','Print'); ?>
    </a>
</div>
<div style="width: 100%">
    <?php if (isset($this->thankyou)) echo $this->thankyou->introtext.$this->thankyou->fulltext; ?>
</div>
<?php } ?>
<h1><?php echo $this->params->get('title'); ?></h1>
<?php if ($this->params->get('personal_information','1') == '1')
{ ?>
<h3><?php echo $this->params->get('field_personal_information',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_PERSONAL_INFORMATION')); ?></h3>
<p>
<table width="600px">
        <?php if ($this->params->get('personal_information_first_name','1') == '1')
        { ?>
    <tr>
        <td>
            <strong><?php echo $this->params->get('field_first_name',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_FIRST_NAME')); ?>:</strong>
        </td>
        <td>
                    <?php echo $this->application->first_name; ?>
        </td>
    </tr>
        <?php } ?>
        <?php if ($this->params->get('personal_information_middle_name','1') == '1')
        { ?>
    <tr>
        <td>
            <strong><?php echo $this->params->get('field_middle_name',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_MIDDLE_NAME')); ?>:</strong>
        </td>
        <td>
                    <?php echo $this->application->middle_name; ?>
        </td>
    </tr>
        <?php } ?>
        <?php if ($this->params->get('personal_information_last_name','1') == '1')
        { ?>
    <tr>
        <td>
            <strong><?php echo $this->params->get('field_last_name',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_LAST_NAME')); ?>:</strong>
        </td>
        <td>
                    <?php echo $this->application->last_name; ?><br/>
        </td>
    </tr>
        <?php } ?>
        <?php if ($this->params->get('personal_information_home_phone','1') == '1')
        { ?>
    <tr>
        <td>
            <strong><?php echo $this->params->get('field_home_phone',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_HOME_PHONE')); ?>:</strong>
        </td>
        <td>
                    <?php echo $this->application->home_phone; ?><br/>
        </td>
    </tr>
        <?php } ?>
        <?php if ($this->params->get('personal_information_work_phone','1') == '1')
        { ?>
    <tr>
        <td>
            <strong><?php echo $this->params->get('field_work_phone',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_WORK_PHONE')); ?>:</strong>
        </td>
        <td>
                    <?php echo $this->application->work_phone; ?><br/>
        </td>
    </tr>
        <?php } ?>
        <?php if ($this->params->get('personal_information_cell_phone','1') == '1')
        { ?>
    <tr>
        <td>
            <strong><?php echo $this->params->get('field_cell_phone',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_CELL_PHONE')); ?>:</strong>
        </td>
        <td>
                    <?php echo $this->application->cell_phone; ?><br/>
        </td>
    </tr>
        <?php } ?>
        <?php if ($this->params->get('personal_information_email_address','1') == '1')
        { ?>
    <tr>
        <td>
            <strong><?php echo $this->params->get('field_email_address',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_EMAIL_ADDRESS')); ?>:</strong>
        </td>
        <td>
                    <?php echo $this->application->email_address; ?><br/>
        </td>
    </tr>
        <?php } ?>
        <?php if ($this->params->get('personal_information_ssn','1') == '1')
        { ?>
    <tr>
        <td>
            <strong><?php echo $this->params->get('field_ssn',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_SSN')); ?>:</strong>
        </td>
        <td>
                    <?php echo $this->application->ssn; ?><br/>
        </td>
    </tr>
        <?php } ?>
</table>
</p>
<?php } ?>
<?php if ($this->params->get('addresses','1') == '1') { ?>
<?php if ($this->params->get('addresses_current','1') == '1') { ?>
<h3><?php echo $this->params->get('field_current_address',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_CURRENT_ADDRESS')); ?></h3>
<p>
<table width="600px">
        <?php if ($this->params->get('addresses_street','1') == '1')
        { ?>
    <tr>
        <td>
            <strong><?php echo $this->params->get('field_street',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_STREET')); ?>:</strong>
        </td>
        <td>
                    <?php echo $this->application->street; ?><br/>
        </td>
    </tr>
        <?php } ?>
        <?php if ($this->params->get('addresses_city','1') == '1')
        { ?>
    <tr>
        <td>
            <strong><?php echo $this->params->get('field_city',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_CITY')); ?>:</strong>
        </td>
        <td>
                    <?php echo $this->application->city; ?><br/>
        </td>
    </tr>
        <?php } ?>
        <?php if ($this->params->get('addresses_state','1') == '1')
        { ?>
    <tr>
        <td>
            <strong><?php echo $this->params->get('field_state',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_STATE')); ?>:</strong>
        </td>
        <td>
                    <?php echo $this->application->state; ?><br/>
        </td>
    </tr>
        <?php } ?>
        <?php if ($this->params->get('addresses_zip_code','1') == '1')
        { ?>
    <tr>
        <td>
            <strong><?php echo $this->params->get('field_zip_code',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_ZIP_CODE')); ?>:</strong>
        </td>
        <td>
                    <?php echo $this->application->zip_code; ?><br/>
        </td>
    </tr>
        <?php } ?>
        <?php if ($this->params->get('addresses_since','1') == '1')
        { ?>
    <tr>
        <td>
            <strong><?php echo $this->params->get('field_address_since',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_ADDRESS_SINCE')); ?>:</strong>
        </td>
        <td>
                    <?php echo $this->application->from_date; ?><br/>
        </td>
    </tr>
        <?php } ?>
</table>
</p>
<?php } ?>
<?php if ($this->params->get('addresses_1','1') == '1') { ?>
<h3><?php echo $this->params->get('field_prior_address',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_PRIOR_ADDRESS')); ?>&nbsp;(1)</h3>
<p>
<table width="600px">
        <?php if ($this->params->get('addresses_street','1') == '1')
        { ?>
    <tr>
        <td>
            <strong><?php echo $this->params->get('field_street',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_STREET')); ?>:</strong>
        </td>
        <td>
                    <?php echo $this->application->street1; ?><br/>
        </td>
    </tr>
        <?php } ?>
        <?php if ($this->params->get('addresses_city','1') == '1')
        { ?>
    <tr>
        <td>
            <strong><?php echo $this->params->get('field_city',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_CITY')); ?>:</strong>
        </td>
        <td>
                    <?php echo $this->application->city1; ?><br/>
        </td>
    </tr>
        <?php } ?>
        <?php if ($this->params->get('addresses_state','1') == '1')
        { ?>
    <tr>
        <td>
            <strong><?php echo $this->params->get('field_state',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_STATE')); ?>:</strong>
        </td>
        <td>
                    <?php echo $this->application->state1; ?><br/>
        </td>
    </tr>
        <?php } ?>
        <?php if ($this->params->get('addresses_zip_code','1') == '1')
        { ?>
    <tr>
        <td>
            <strong><?php echo $this->params->get('field_zip_code',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_ZIP_CODE')); ?>:</strong>
        </td>
        <td>
                    <?php echo $this->application->zip_code1; ?><br/>
        </td>
    </tr>
        <?php } ?>
        <?php if ($this->params->get('addresses_since','1') == '1')
        { ?>
    <tr>
        <td>
            <strong><?php echo $this->params->get('field_address_since',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_ADDRESS_SINCE')); ?>:</strong>
        </td>
        <td>
                    <?php echo $this->application->from_date1; ?><br/>
        </td>
    </tr>
        <?php } ?>
        <?php if ($this->params->get('addresses_to','1') == '1')
        { ?>
    <tr>
        <td>
            <strong><?php echo $this->params->get('field_address_to',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_ADDRESS_TO')); ?>:</strong>
        </td>
        <td>
                    <?php echo $this->application->to_date1; ?><br/>
        </td>
    </tr>
        <?php } ?>
</table>
</p>
<?php } ?>
<?php if ($this->params->get('addresses_2','1') == '1') { ?>
<h3><?php echo $this->params->get('field_prior_address',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_PRIOR_ADDRESS')); ?>&nbsp;(2)</h3>
<p>
<table width="600px">
        <?php if ($this->params->get('addresses_street','1') == '1')
        { ?>
    <tr>
        <td>
            <strong><?php echo $this->params->get('field_street',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_STREET')); ?>:</strong>
        </td>
        <td>
                    <?php echo $this->application->street2; ?><br/>
        </td>
    </tr>
        <?php } ?>
        <?php if ($this->params->get('addresses_city','1') == '1')
        { ?>
    <tr>
        <td>
            <strong><?php echo $this->params->get('field_city',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_CITY')); ?>:</strong>
        </td>
        <td>
                    <?php echo $this->application->city2; ?><br/>
        </td>
    </tr>
        <?php } ?>
        <?php if ($this->params->get('addresses_state','1') == '1')
        { ?>
    <tr>
        <td>
            <strong><?php echo $this->params->get('field_state',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_STATE')); ?>:</strong>
        </td>
        <td>
                    <?php echo $this->application->state2; ?><br/>
        </td>
    </tr>
        <?php } ?>
        <?php if ($this->params->get('addresses_zip_code','1') == '1')
        { ?>
    <tr>
        <td>
            <strong><?php echo $this->params->get('field_zip_code',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_ZIP_CODE')); ?>:</strong>
        </td>
        <td>
                    <?php echo $this->application->zip_code2; ?><br/>
        </td>
    </tr>
        <?php } ?>
        <?php if ($this->params->get('addresses_since','1') == '1')
        { ?>
    <tr>
        <td>
            <strong><?php echo $this->params->get('field_address_since',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_ADDRESS_SINCE')); ?>:</strong>
        </td>
        <td>
                    <?php echo $this->application->from_date2; ?><br/>
        </td>
    </tr>
        <?php } ?>
        <?php if ($this->params->get('addresses_to','1') == '1')
        { ?>
    <tr>
        <td>
            <strong><?php echo $this->params->get('field_address_to',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_ADDRESS_TO')); ?>:</strong>
        </td>
        <td>
                    <?php echo $this->application->to_date2; ?><br/>
        </td>
    </tr>
        <?php } ?>
</table>
</p>
<?php } ?>
<?php } ?>
<?php if ($this->params->get('education','1') == '1') { ?>
<?php if ($this->params->get('education_high','1') == '1') { ?>
<h3><?php echo $this->params->get('field_high_school',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_HIGH_SCHOOL')); ?></h3>
<p>
<table width="600px">
        <?php if ($this->params->get('education_school','1') == '1')
        { ?>
    <tr>
        <td>
            <strong><?php echo $this->params->get('field_school_attended',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_SCHOOL_ATTENDED')); ?>:</strong>
        </td>
        <td>
                    <?php echo $this->application->school;?>
        </td>
    </tr>
        <?php } ?>
        <?php if ($this->params->get('education_city','1') == '1')
        { ?>
    <tr>
        <td>
            <strong><?php echo $this->params->get('field_school_city',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_CITY')); ?>:</strong>
        </td>
        <td>
                    <?php echo $this->application->school_city;?>
        </td>
    </tr>
        <?php } ?>
        <?php if ($this->params->get('education_state','1') == '1')
        { ?>
    <tr>
        <td>
            <strong><?php echo $this->params->get('field_school_state',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_STATE')); ?>:</strong>
        </td>
        <td>
                    <?php echo $this->application->school_state;?>
        </td>
    </tr>
        <?php } ?>
        <?php if ($this->params->get('education_diploma','1') == '1')
        { ?>
    <tr>
        <td>
            <strong><?php echo $this->params->get('field_diploma',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_DIPLOMA')); ?>:</strong>
        </td>
        <td>
                    <?php if ( '1' == $this->application->school_diploma) echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_YES'); else echo JText::_('NO');?>
        </td>
    </tr>
        <?php } ?>
</table>
</p>
<?php } ?>
<?php if ($this->params->get('education_undergrad','1') == '1') { ?>
<h3><?php echo $this->params->get('field_undergrad_school',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_UNDERGRAD_SCHOOL')); ?></h3>
<p>
<table width="600px">
        <?php if ($this->params->get('education_school','1') == '1')
        { ?>
    <tr>
        <td>
            <strong><?php echo $this->params->get('field_school_attended',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_SCHOOL_ATTENDED')); ?>:</strong>
        </td>
        <td>
                    <?php echo $this->application->school1;?>
        </td>
    </tr>
        <?php } ?>
        <?php if ($this->params->get('education_city','1') == '1')
        { ?>
    <tr>
        <td>
            <strong><?php echo $this->params->get('field_school_city',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_CITY')); ?>:</strong>
        </td>
        <td>
                    <?php echo $this->application->school_city1;?>
        </td>
    </tr>
        <?php } ?>
        <?php if ($this->params->get('education_state','1') == '1')
        { ?>
    <tr>
        <td>
            <strong><?php echo $this->params->get('field_school_state',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_STATE')); ?>:</strong>
        </td>
        <td>
                    <?php echo $this->application->school_state1;?>
        </td>
    </tr>
        <?php } ?>
        <?php if ($this->params->get('education_diploma','1') == '1')
        { ?>
    <tr>
        <td>
            <strong><?php echo $this->params->get('field_diploma',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_DIPLOMA')); ?>:</strong>
        </td>
        <td>
                    <?php if ( '1' == $this->application->school_diploma1) echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_YES'); else echo JText::_('NO');?>
        </td>
    </tr>
        <?php } ?>
        <?php if ($this->params->get('education_degree','1') == '1')
        { ?>
    <tr>
        <td>
            <strong><?php echo $this->params->get('field_deg_cert_dip_long',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_DEG_CERT_DIP_LONG')); ?>:</strong>
        </td>
        <td>
                    <?php echo $this->application->diploma_text1;?>
        </td>
    </tr>
        <?php } ?>
        <?php if ($this->params->get('education_study','1') == '1')
        { ?>
    <tr>
        <td>
            <strong><?php echo $this->params->get('field_area_of_study',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_AREA_OF_STUDY')); ?>:</strong>
        </td>
        <td>
                    <?php echo $this->application->study_area1;?>
        </td>
    </tr>
        <?php } ?>
</table>
</p>
<?php } ?>
<?php if ($this->params->get('education_grad','1') == '1') { ?>
<h3><?php echo $this->params->get('field_grad_school',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_GRAD_SCHOOL')); ?></h3>
<p>
<table width="600px">
        <?php if ($this->params->get('education_school','1') == '1')
        { ?>
    <tr>
        <td>
            <strong><?php echo $this->params->get('field_school_attended',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_SCHOOL_ATTENDED')); ?>:</strong>
        </td>
        <td>
                    <?php echo $this->application->school2;?>
        </td>
    </tr>
        <?php } ?>
        <?php if ($this->params->get('education_city','1') == '1')
        { ?>
    <tr>
        <td>
            <strong><?php echo  $this->params->get('field_school_city',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_CITY')); ?>:</strong>
        </td>
        <td>
                    <?php echo $this->application->school_city2;?>
        </td>
    </tr>
        <?php } ?>
        <?php if ($this->params->get('education_state','1') == '1')
        { ?>
    <tr>
        <td>
            <strong><?php echo $this->params->get('field_school_state',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_STATE')); ?>:</strong>
        </td>
        <td>
                    <?php echo $this->application->school_state2;?>
        </td>
    </tr>
        <?php } ?>
        <?php if ($this->params->get('education_diploma','1') == '1')
        { ?>
    <tr>
        <td>
            <strong><?php echo $this->params->get('field_diploma',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_DIPLOMA')); ?>:</strong>
        </td>
        <td>
                    <?php if ( '1' == $this->application->school_diploma2) echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_YES'); else echo JText::_('NO');?>
        </td>
    </tr>
        <?php } ?>
        <?php if ($this->params->get('education_degree','1') == '1')
        { ?>
    <tr>
        <td>
            <strong><?php echo $this->params->get('field_deg_cert_dip_long',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_DEG_CERT_DIP_LONG')); ?>:</strong>
        </td>
        <td>
                    <?php echo $this->application->diploma_text2;?>
        </td>
    </tr>
        <?php } ?>
        <?php if ($this->params->get('education_study','1') == '1')
        { ?>
    <tr>
        <td>
            <strong><?php echo $this->params->get('field_area_of_study',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_AREA_OF_STUDY')); ?>:</strong>
        </td>
        <td>
                    <?php echo $this->application->study_area2;?>
        </td>
    </tr>
        <?php } ?>
</table>
</p>
<?php } ?>
<?php if ($this->params->get('education_other','1') == '1') { ?>
<h3><?php echo $this->params->get('field_other_school',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_OTHER_SCHOOL')); ?></h3>
<p>
<table width="600px">
        <?php if ($this->params->get('education_school','1') == '1')
        { ?>
    <tr>
        <td>
            <strong><?php echo $this->params->get('field_school_attended',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_SCHOOL_ATTENDED')); ?>:</strong>
        </td>
        <td>
                    <?php echo $this->application->school3;?>
        </td>
    </tr>
        <?php } ?>
        <?php if ($this->params->get('education_city','1') == '1')
        { ?>
    <tr>
        <td>
            <strong><?php echo $this->params->get('field_school_city',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_CITY')); ?>:</strong>
        </td>
        <td>
                    <?php echo $this->application->school_city3;?>
        </td>
    </tr>
        <?php } ?>
        <?php if ($this->params->get('education_state','1') == '1')
        { ?>
    <tr>
        <td>
            <strong><?php echo $this->params->get('field_school_state',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_STATE')); ?>:</strong>
        </td>
        <td>
                    <?php echo $this->application->school_state3;?>
        </td>
    </tr>
        <?php } ?>
        <?php if ($this->params->get('education_diploma','1') == '1')
        { ?>
    <tr>
        <td>
            <strong><?php echo $this->params->get('field_diploma',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_DIPLOMA')); ?>:</strong>
        </td>
        <td>
                    <?php if ( '1' == $this->application->school_diploma3) echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_YES'); else echo JText::_('NO');?>
        </td>
    </tr>
        <?php } ?>
        <?php if ($this->params->get('education_degree','1') == '1')
        { ?>
    <tr>
        <td>
            <strong><?php echo $this->params->get('field_deg_cert_dip_long',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_DEG_CERT_DIP_LONG')); ?>:</strong>
        </td>
        <td>
                    <?php echo $this->application->diploma_text3;?>
        </td>
    </tr>
        <?php } ?>
        <?php if ($this->params->get('education_study','1') == '1')
        { ?>
    <tr>
        <td>
            <strong><?php echo $this->params->get('field_area_of_study',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_AREA_OF_STUDY')); ?>:</strong>
        </td>
        <td>
                    <?php echo $this->application->study_area3;?>
        </td>
    </tr>
        <?php } ?>
</table>
</p>
<?php } ?>
<?php } ?>
<?php if ($this->params->get('employment_information','1') == '1')
{ ?>
<h3><?php echo $this->params->get('field_employment_information',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_EMPLOYMENT_INFORMATION')); ?></h3>
<table width="600px">
        <?php if ($this->params->get('employment_information_position','1') == '1')
        { ?>
    <tr>
        <td>
            <strong><?php echo $this->params->get('field_position_applied_for',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_POSITION_APPLIED_FOR')); ?>:</strong>
        </td>
        <td colspan="2" >
                    <?php echo $this->application->position;?>
        </td>
    </tr>
        <?php } ?>
        <?php if ($this->params->get('employment_information_date_you_can_start','1') == '1')
        { ?>
    <tr>
        <td>
            <strong><?php echo $this->params->get('field_date_you_can_start',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_DATE_YOU_CAN_START')); ?>:</strong>
        </td>
        <td colspan="2" >
                    <?php echo $this->application->available_date;?>
        </td>
    </tr>
        <?php } ?>
        <?php if ($this->params->get('employment_information_desired_salary','1') == '1')
        { ?>
    <tr>
        <td>
            <strong><?php echo $this->params->get('field_desired_salary',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_DESIRED_SALARY')); ?>:</strong>
        </td>
        <td colspan="2" >
			$&nbsp;<?php echo $this->application->desired_pay;?>
        </td>
    </tr>
        <?php } ?>
        <?php if ($this->params->get('employment_information_do_you_prefer','1') == '1')
        { ?>
    <tr>
        <td>
            <strong><?php echo $this->params->get('field_do_you_prefer',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_DO_YOU_PREFER')); ?>:</strong>
        </td>
        <td colspan="2" valign="top" >
                    <?php echo $this->application->work_preferences; ?>
        </td>
    </tr>
        <?php } ?>
        <?php if ($this->params->get('employment_information_shiftwork','1') == '1')
        { ?>
    <tr>
        <td>
            <strong><?php echo $this->params->get('field_shiftwork',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_SHIFTWORK')); ?>:</strong>
        </td>
        <td colspan="2" valign="top" >
            <?php if( '1' == $this->application->shiftwork) echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_YES'); else echo JText::_('NO'); ?>
        </td>
    </tr>
        <?php } ?>
        <?php if ($this->params->get('employment_information_can_you_work','1') == '1')
        { ?>
    <tr>
        <td>
            <strong><?php echo $this->params->get('field_you_can_work',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_YOU_CAN_WORK')); ?>:</strong>
        </td>
        <td colspan="2" >
                    <?php if ( '1' == $this->application->weekends ) echo $this->params->get('field_weekends',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_WEEKENDS'))." "; ?>
                    <?php if ( '1' == $this->application->evenings ) echo $this->params->get('field_evenings',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_EVENINGS'))." "; ?>
        </td>
    </tr>
        <?php } ?>
        <?php if ($this->params->get('employment_information_available','1') == '1')
        { ?>
    <tr>
        <td>
            <strong><?php echo $this->params->get('field_available',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_AVAILABLE')); ?>:</strong>
        </td>
        <td colspan="2" >
                    <?php if ( '1' == $this->application->monday ) echo $this->params->get('field_monday_abbr',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_MONDAY'))." "; ?>
                    <?php if ( '1' == $this->application->tuesday ) echo $this->params->get('field_tuesday_abbr',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_TUESDAY'))." "; ?>
                    <?php if ( '1' == $this->application->wednesday ) echo $this->params->get('field_wednesday_abbr',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_WEDNESDAY'))." "; ?>
                    <?php if ( '1' == $this->application->thursday ) echo $this->params->get('field_thursday_abbr',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_THURSDAY'))." "; ?>
                    <?php if ( '1' == $this->application->friday ) echo $this->params->get('field_friday_abbr',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_FRIDAY'))." "; ?>
                    <?php if ( '1' == $this->application->saturday ) echo $this->params->get('field_saturday_abbr',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_SATURDAY'))." "; ?>
                    <?php if ( '1' == $this->application->sunday ) echo $this->params->get('field_sunday_abbr',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_SUNDAY'))." "; ?>
        </td>
    </tr>
        <?php } ?>
        <?php if ($this->params->get('employment_information_not_available','1') == '1')
        { ?>
    <tr>
        <td>
            <strong><?php echo $this->params->get('field_not_available',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_NOT_AVAILABLE')); ?>:</strong>
        </td>
        <td colspan="2" >
                    <?php echo $this->application->unavailability;?>
        </td>
    </tr>
        <?php }?>
    <tr>
        <td>
        </td>
        <td>
            <strong><?php echo $this->params->get('field_following_questions',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_FOLLOWING_QUESTIONS')); ?>.</strong>
        </td>
    </tr>
        <?php $qcounter = 0; ?>
        <?php if ($this->params->get('employment_information_question_1','1') == '1')
        { $qcounter++; ?>
    <tr>
        <td valign="top">
            <strong><?php echo $qcounter; ?>.</strong>
        </td>
        <td>
            <strong><?php echo $this->params->get('field_question_1',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_QUESTION_1')); ?></strong>
        </td>
        <td>
                    <?php if( '1' == $this->application->eligible) echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_YES'); else echo JText::_('NO'); ?>
        </td>
    </tr>
    <tr>
        <td></td>
        <td>
            <strong><?php echo $this->params->get('field_question_1_followup', JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_QUESTION_1_FOLLOWUP')); ?></strong>
        </td>
        <td>
                    <?php if ( '1' == $this->application->provideproof) echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_YES'); else echo JText::_('NO'); ?>
        </td>
    </tr>
        <?php } ?>
        <?php if ($this->params->get('employment_information_question_2','1') == '1')
        { $qcounter++; ?>
    <tr>
        <td valign="top">
            <strong><?php echo $qcounter; ?>.</strong>
        </td>
        <td>
            <strong><?php echo $this->params->get('field_question_2',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_QUESTION_2')); ?><br/>
                    <?php echo $this->params->get('field_question_2_followup',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_QUESTION_2_FOLLOWUP')); ?></strong>
        </td>
        <td>
                    <?php if ( '1' == $this->application->worked_here_before) echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_YES'); else echo JText::_('NO'); ?>
        </td>
    </tr>
    <tr>
        <td>
        </td>
        <td>
                    <?php echo $this->application->worked_here_text;?>
        </td>
    </tr>
        <?php } ?>
        <?php if ($this->params->get('employment_information_question_3','1') == '1')
        { $qcounter++; ?>
    <tr>
        <td valign="top">
            <strong><?php echo $qcounter; ?>.</strong>
        </td>
        <td>
            <strong><?php echo $this->params->get('field_question_3',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_QUESTION_3')); ?></strong>
        </td>
        <td>
                    <?php if ( '1' == $this->application->job_desc_received) echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_YES'); else echo JText::_('NO'); ?>
        </td>
    </tr>
        <?php } ?>
        <?php if ($this->params->get('employment_information_question_4','1') == '1')
        { $qcounter++; ?>
    <tr>
        <td valign="top">
            <strong><?php echo $qcounter; ?>.</strong>
        </td>
        <td>
            <strong><?php echo $this->params->get('field_question_4',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_QUESTION_4')); ?><br/>
                    <?php echo $this->params->get('field_question_4_followup',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_QUESTION_4_FOLLOWUP')); ?></strong>
        </td>
        <td>
                    <?php if ( '1' == $this->application->understand_reqs) echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_YES'); else echo JText::_('NO'); ?>
        </td>
    </tr>
    <tr>
        <td>
        </td>
        <td>
                    <?php echo $this->application->no_understand_reqs;?>
        </td>
    </tr>
        <?php } ?>
        <?php if ($this->params->get('employment_information_question_5','1') == '1')
        { $qcounter++; ?>
    <tr>
        <td valign="top">
            <strong><?php echo $qcounter; ?>.</strong>
        </td>
        <td>
            <strong><?php echo $this->params->get('field_question_5',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_QUESTION_5')); ?></strong>
        </td>
        <td>
                    <?php if ( '1' == $this->application->on_layoff) echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_YES'); else echo JText::_('NO'); ?>
        </td>
    </tr>
        <?php } ?>
        <?php if ($this->params->get('employment_information_question_6','1') == '1')
        { $qcounter++; ?>
    <tr>
        <td valign="top">
            <strong><?php echo $qcounter; ?>.</strong>
        </td>
        <td>
            <strong><?php echo $this->params->get('field_question_6',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_QUESTION_6')); ?><br/>
                    <?php echo $this->params->get('field_question_6_followup',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_QUESTION_6_FOLLOWUP')); ?></strong>
        </td>
        <td>
                    <?php if ( '1' == $this->application->conf_agreement) echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_YES'); else echo JText::_('NO'); ?>
        </td>
    </tr>
    <tr>
        <td>
        </td>
        <td>
                    <?php echo $this->application->conf_explain;?>
        </td>
    </tr>
        <?php } ?>
        <?php if ($this->params->get('employment_information_question_7','1') == '1')
        { $qcounter++; ?>
    <tr>
        <td valign="top">
            <strong><?php echo $qcounter; ?>.</strong>
        </td>
        <td>
            <strong><?php echo $this->params->get('field_question_7',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_QUESTION_7')); ?><br/>
                    <?php echo $this->params->get('field_question_7_followup',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_QUESTION_7_FOLLOWUP')); ?></strong>
        </td>
        <td>
                    <?php if ( '1' == $this->application->discharged) echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_YES'); else echo JText::_('NO'); ?>
        </td>
    </tr>
    <tr>
        <td>
        </td>
        <td>
                    <?php echo $this->application->discharge_explain;?>
        </td>
    </tr>
        <?php } ?>
        <?php if ($this->params->get('employment_information_question_8','1') == '1')
        { $qcounter++; ?>
    <tr>
        <td valign="top">
            <strong><?php echo $qcounter; ?>.</strong>
        </td>
        <td>
            <strong><?php echo $this->params->get('field_question_8',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_QUESTION_8')); ?><br>
                        <?php echo $this->params->get('field_question_8_followup',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_QUESTION_8_FOLLOWUP')); ?></strong>
                </td>
                <td>
                            <?php if ( '1' == $this->application->convict) echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_YES'); else echo JText::_('NO'); ?>
                </td>
    </tr>
    <tr>
        <td>
        <td>
                    <?php echo $this->application->convict_explain;?>
        </td>
    </tr>
        <?php } ?>
        <?php if ($this->params->get('employment_information_question_9','1') == '1')
        { $qcounter++; ?>
    <tr>
        <td valign="top">
            <strong><?php echo $qcounter; ?>.</strong>
        </td>
        <td>
            <strong><?php echo $this->params->get('field_question_9',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_QUESTION_9')); ?><br>
                        <?php echo $this->params->get('field_question_9_followup',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_QUESTION_9_FOLLOWUP')); ?></strong>
                </td>
                <td>
                            <?php if ( '1' == $this->application->family) echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_YES'); else echo JText::_('NO'); ?>
                </td>
    </tr>
    <tr>
        <td>
        <td>
                    <?php echo $this->application->family_explain;?>
        </td>
    </tr>
        <?php } ?>
</table>
</p>
<?php } ?>
<?php if ($this->params->get('employment_history','1') == '1') { ?>
<?php if ($this->params->get('employment_history_currently_employed','1') == '1') : ?>
<table>
    <tr><td><label><?php echo $this->params->get('field_currently_employed',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_CURRENTLY_EMPLOYED')); ?>:</label></td>
    <td colspan="2" valign="top" ><span><?php if( '1' == $this->application->currently_employed) echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_YES'); else echo JText::_('NO'); ?></span></td></tr>
</table>
<?php endif; ?>
<?php if ($this->params->get('employment_history_contact_current_employer','1') == '1') : ?>
<table>
    <tr><td><label><?php echo $this->params->get('field_contact_employer',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_CONTACT_EMPLOYER')); ?>:</label></td>
    <td colspan="2" valign="top" ><span><?php if( '1' == $this->application->contact_emp) echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_YES'); else echo JText::_('NO'); ?></span></td></tr>
</table>
<?php endif; ?>
<?php if ($this->params->get('employment_history_recent','1') == '1') { ?>
<h3><?php echo $this->params->get('field_most_recent_employer',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_MOST_RECENT_EMPLOYER')); ?></h3>
<p>
<table width="600px">
        <?php if ( $this->params->get('employment_history_employer','1') == '1')
        { ?>
    <tr>
        <td>
            <strong><?php echo $this->params->get('field_employer',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_EMPLOYER')); ?>:</strong>
        </td>
        <td>
                    <?php echo $this->application->employer;?>
        </td>
    </tr>
        <?php } ?>
        <?php if ( $this->params->get('employment_history_city','1') == '1')
        { ?>
    <tr>
        <td>
            <strong><?php echo $this->params->get('field_employer_city',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_CITY')); ?>:</strong>
        </td>
        <td>
                    <?php echo $this->application->employer_city;?>
        </td>
    </tr>
        <?php } ?>
        <?php if ( $this->params->get('employment_history_state','1') == '1')
        { ?>
    <tr>
        <td>
            <strong><?php echo $this->params->get('field_employer_state',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_STATE')); ?>:</strong>
        </td>
        <td>
                    <?php echo $this->application->employer_state;?>
        </td>
    </tr>
        <?php } ?>
        <?php if ( $this->params->get('employment_history_zip_code','1') == '1')
        { ?>
    <tr>
        <td>
            <strong><?php echo $this->params->get('field_employer_zip_code',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_ZIP_CODE')); ?>:</strong>
        </td>
        <td>
                    <?php echo $this->application->employer_zip;?>
        </td>
    </tr>
        <?php } ?>
        <?php if ( $this->params->get('employment_history_phone','1') == '1')
        { ?>
    <tr>
        <td>
            <strong><?php echo $this->params->get('field_employer_phone',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_PHONE')); ?>:</strong>
        </td>
        <td>
                    <?php echo $this->application->employer_phone;?>
        </td>
    </tr>
        <?php } ?>
        <?php if ( $this->params->get('employment_history_position','1') == '1')
        { ?>
    <tr>
        <td>
            <strong><?php echo $this->params->get('field_position_held',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_POSITION_HELD')); ?>:</strong>
        </td>
        <td>
                    <?php echo $this->application->employer_pos;?>
        </td>
    </tr>
        <?php } ?>
        <?php if ( $this->params->get('employment_history_from','1') == '1')
        { ?>
    <tr>
        <td>
            <strong><?php echo $this->params->get('field_employer_from_myyyy',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_FROM_MYYYY')); ?>:</strong>
        </td>
        <td>
                    <?php echo $this->application->employer_from;?>
        </td>
    </tr>
        <?php } ?>
        <?php if ( $this->params->get('employment_history_to','1') == '1')
        { ?>
    <tr>
        <td>
            <strong><?php echo $this->params->get('field_employer_to_myyyy',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_TO_MYYYY')); ?>:</strong>
        </td>
        <td>
                    <?php echo $this->application->employer_to;?>
        </td>
    </tr>
        <?php } ?>
        <?php if ( $this->params->get('employment_history_pay','1') == '1')
        { ?>
    <tr>
        <td>
            <strong><?php echo $this->params->get('field_pay_upon_leaving',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_PAY_UPON_LEAVING')); ?>:</strong>
        </td>
        <td>
                    <?php echo $this->application->employer_pay;?>
        </td>
    </tr>
        <?php } ?>
        <?php if ( $this->params->get('employment_history_supervisor','1') == '1')
        { ?>
    <tr>
        <td>
            <strong><?php echo $this->params->get('field_supervisor',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_SUPERVISOR')); ?>:</strong>
        </td>
        <td>
                    <?php echo $this->application->employer_sup;?>
        </td>
    </tr>
        <?php } ?>
        <?php if ( $this->params->get('employment_history_duties','1') == '1')
        { ?>
    <tr>
        <td>
            <strong><?php echo $this->params->get('field_duties',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_DUTIES')); ?>:</strong>
        </td>
        <td>
                    <?php echo $this->application->employer_dut;?>
        </td>
    </tr>
        <?php } ?>
        <?php if ( $this->params->get('employment_history_reason','1') == '1')
        { ?>
    <tr>
        <td>
            <strong><?php echo $this->params->get('field_reason_for_leaving',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_REASON_FOR_LEAVING')); ?>:</strong>
        </td>
        <td>
                    <?php echo $this->application->employer_leave;?>
        </td>
    </tr>
        <?php } ?>
</table>
</p>
<?php } ?>
<?php if ($this->params->get('employment_history_1','1') == '1') { ?>
<h3><?php echo $this->params->get('field_prior_employer',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_PRIOR_EMPLOYER')); ?>&nbsp;(1)</h3>
<p>
<table width="600px">
        <?php if ( $this->params->get('employment_history_employer','1') == '1')
        { ?>
    <tr>
        <td>
            <strong><?php echo $this->params->get('field_employer',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_EMPLOYER')); ?>:</strong>
        </td>
        <td>
                    <?php echo $this->application->employer1;?>
        </td>
    </tr>
        <?php } ?>
        <?php if ( $this->params->get('employment_history_city','1') == '1')
        { ?>
    <tr>
        <td>
            <strong><?php echo $this->params->get('field__employer_city',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_CITY')); ?>:</strong>
        </td>
        <td>
                    <?php echo $this->application->employer1_city;?>
        </td>
    </tr>
        <?php } ?>
        <?php if ( $this->params->get('employment_history_state','1') == '1')
        { ?>
    <tr>
        <td>
            <strong><?php echo $this->params->get('field__employer_city',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_STATE')); ?>:</strong>
        </td>
        <td>
                    <?php echo $this->application->employer1_state;?>
        </td>
    </tr>
        <?php } ?>
        <?php if ( $this->params->get('employment_history_zip_code','1') == '1')
        { ?>
    <tr>
        <td>
            <strong><?php echo $this->params->get('field_employer_zip_code',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_ZIP_CODE')); ?>:</strong>
        </td>
        <td>
                    <?php echo $this->application->employer1_zip;?>
        </td>
    </tr>
        <?php } ?>
        <?php if ( $this->params->get('employment_history_phone','1') == '1')
        { ?>
    <tr>
        <td>
            <strong><?php echo $this->params->get('field_employer_phone',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_PHONE')); ?>:</strong>
        </td>
        <td>
                    <?php echo $this->application->employer1_phone;?>
        </td>
    </tr>
        <?php } ?>
        <?php if ( $this->params->get('employment_history_position','1') == '1')
        { ?>
    <tr>
        <td>
            <strong><?php echo $this->params->get('field_position_held',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_POSITION_HELD')); ?>:</strong>
        </td>
        <td>
                    <?php echo $this->application->employer1_pos;?>
        </td>
    </tr>
        <?php } ?>
        <?php if ( $this->params->get('employment_history_from','1') == '1')
        { ?>
    <tr>
        <td>
            <strong><?php echo $this->params->get('field_employer_from_myyyy',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_FROM_MYYYY')); ?>:</strong>
        </td>
        <td>
                    <?php echo $this->application->employer1_from;?>
        </td>
    </tr>
        <?php } ?>
        <?php if ( $this->params->get('employment_history_to','1') == '1')
        { ?>
    <tr>
        <td>
            <strong><?php echo $this->params->get('field_employer_to_myyyy',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_TO_MYYYY')); ?>:</strong>
        </td>
        <td>
                    <?php echo $this->application->employer1_to;?>
        </td>
    </tr>
        <?php } ?>
        <?php if ( $this->params->get('employment_history_pay','1') == '1')
        { ?>
    <tr>
        <td>
            <strong><?php echo $this->params->get('field_pay_upon_leaving',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_PAY_UPON_LEAVING')); ?>:</strong>
        </td>
        <td>
                    <?php echo $this->application->employer1_pay;?>
        </td>
    </tr>
        <?php } ?>
        <?php if ( $this->params->get('employment_history_supervisor','1') == '1')
        { ?>
    <tr>
        <td>
            <strong><?php echo $this->params->get('field_supervisor',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_SUPERVISOR')); ?>:</strong>
        </td>
        <td>
                    <?php echo $this->application->employer1_sup;?>
        </td>
    </tr>
        <?php } ?>
        <?php if ( $this->params->get('employment_history_duties','1') == '1')
        { ?>
    <tr>
        <td>
            <strong><?php echo $this->params->get('field_duties',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_DUTIES')); ?>:</strong>
        </td>
        <td>
                    <?php echo $this->application->employer1_dut;?>
        </td>
    </tr>
        <?php } ?>
        <?php if ( $this->params->get('employment_history_reason','1') == '1')
        { ?>
    <tr>
        <td>
            <strong><?php echo $this->params->get('field_reason_for_leaving',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_REASON_FOR_LEAVING')); ?>:</strong>
        </td>
        <td>
                    <?php echo $this->application->employer1_leave;?>
        </td>
    </tr>
        <?php } ?>
</table>
</p>
<?php } ?>
<?php if ($this->params->get('employment_history_2','1') == '1') { ?>
<h3><?php echo $this->params->get('field_prior_employer',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_PRIOR_EMPLOYER')); ?>&nbsp;(2)</h3>
<p>
<table width="600px">
        <?php if ( $this->params->get('employment_history_employer','1') == '1')
        { ?>
    <tr>
        <td>
            <strong><?php echo $this->params->get('field_employer',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_EMPLOYER')); ?>:</strong>
        </td>
        <td>
                    <?php echo $this->application->employer2;?>
        </td>
    </tr>
        <?php } ?>
        <?php if ( $this->params->get('employment_history_city','1') == '1')
        { ?>
    <tr>
        <td>
            <strong><?php echo $this->params->get('field_employer_city',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_CITY')); ?>:</strong>
        </td>
        <td>
                    <?php echo $this->application->employer2_city;?>
        </td>
    </tr>
        <?php } ?>
        <?php if ( $this->params->get('employment_history_state','1') == '1')
        { ?>
    <tr>
        <td>
            <strong><?php echo $this->params->get('field_employer_state',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_STATE')); ?>:</strong>
        </td>
        <td>
                    <?php echo $this->application->employer2_state;?>
        </td>
    </tr>
        <?php } ?>
        <?php if ( $this->params->get('employment_history_zip_code','1') == '1')
        { ?>
    <tr>
        <td>
            <strong><?php echo $this->params->get('field_employer_zip_code',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_ZIP_CODE')); ?>:</strong>
        </td>
        <td>
                    <?php echo $this->application->employer2_zip;?>
        </td>
    </tr>
        <?php } ?>
        <?php if ( $this->params->get('employment_history_phone','1') == '1')
        { ?>
    <tr>
        <td>
            <strong><?php echo $this->params->get('field_employer_phone',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_PHONE')); ?>:</strong>
        </td>
        <td>
                    <?php echo $this->application->employer2_phone;?>
        </td>
    </tr>
        <?php } ?>
        <?php if ( $this->params->get('employment_history_position','1') == '1')
        { ?>
    <tr>
        <td>
            <strong><?php echo $this->params->get('field_position_held',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_POSITION_HELD')); ?>:</strong>
        </td>
        <td>
                    <?php echo $this->application->employer2_pos;?>
        </td>
    </tr>
        <?php } ?>
        <?php if ( $this->params->get('employment_history_from','1') == '1')
        { ?>
    <tr>
        <td>
            <strong><?php echo $this->params->get('field_employer_from_myyyy',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_FROM_MYYYY')); ?>:</strong>
        </td>
        <td>
                    <?php echo $this->application->employer2_from;?>
        </td>
    </tr>
        <?php } ?>
        <?php if ( $this->params->get('employment_history_to','1') == '1')
        { ?>
    <tr>
        <td>
            <strong><?php echo $this->params->get('field_employer_to_myyyy',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_TO_MYYYY')); ?>:</strong>
        </td>
        <td>
                    <?php echo $this->application->employer2_to;?>
        </td>
    </tr>
        <?php } ?>
        <?php if ( $this->params->get('employment_history_pay','1') == '1')
        { ?>
    <tr>
        <td>
            <strong><?php echo $this->params->get('field_pay_upon_leaving',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_PAY_UPON_LEAVING')); ?>:</strong>
        </td>
        <td>
                    <?php echo $this->application->employer2_pay;?>
        </td>
    </tr>
        <?php } ?>
        <?php if ( $this->params->get('employment_history_supervisor','1') == '1')
        { ?>
    <tr>
        <td>
            <strong><?php echo $this->params->get('field_supervisor',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_SUPERVISOR')); ?>:</strong>
        </td>
        <td>
                    <?php echo $this->application->employer2_sup;?>
        </td>
    </tr>
        <?php } ?>
        <?php if ( $this->params->get('employment_history_duties','1') == '1')
        { ?>
    <tr>
        <td>
            <strong><?php echo $this->params->get('field_duties',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_DUTIES')); ?>:</strong>
        </td>
        <td>
                    <?php echo $this->application->employer2_dut;?>
        </td>
    </tr>
        <?php } ?>
        <?php if ( $this->params->get('employment_history_reason','1') == '1')
        { ?>
    <tr>
        <td>
            <strong><?php echo $this->params->get('field_reason_for_leaving',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_REASON_FOR_LEAVING')); ?>:</strong>
        </td>
        <td>
                    <?php echo $this->application->employer2_leave;?>
        </td>
    </tr>
        <?php } ?>
</table>
</p>
<?php } ?>
<?php if ($this->params->get('employment_history_3','1') == '1') { ?>
<h3><?php echo $this->params->get('field_prior_employer',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_PRIOR_EMPLOYER')); ?>&nbsp;(3)</h3>
<p>
<table width="600px">
        <?php if ( $this->params->get('employment_history_employer','1') == '1')
        { ?>
    <tr>
        <td>
            <strong><?php echo $this->params->get('field_employer',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_EMPLOYER')); ?>:</strong>
        </td>
        <td>
                    <?php echo $this->application->employer3;?>
        </td>
    </tr>
        <?php } ?>
        <?php if ( $this->params->get('employment_history_city','1') == '1')
        { ?>
    <tr>
        <td>
            <strong><?php echo $this->params->get('field_employer_city',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_CITY')); ?>:</strong>
        </td>
        <td>
                    <?php echo $this->application->employer3_city;?>
        </td>
    </tr>
        <?php } ?>
        <?php if ( $this->params->get('employment_history_state','1') == '1')
        { ?>
    <tr>
        <td>
            <strong><?php echo $this->params->get('field_employer_state',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_STATE')); ?>:</strong>
        </td>
        <td>
                    <?php echo $this->application->employer3_state;?>
        </td>
    </tr>
        <?php } ?>
        <?php if ( $this->params->get('employment_history_zip_code','1') == '1')
        { ?>
    <tr>
        <td>
            <strong><?php echo $this->params->get('field_employer_zip_code',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_ZIP_CODE')); ?>:</strong>
        </td>
        <td>
                    <?php echo $this->application->employer3_zip;?>
        </td>
    </tr>
        <?php } ?>
        <?php if ( $this->params->get('employment_history_phone','1') == '1')
        { ?>
    <tr>
        <td>
            <strong><?php echo $this->params->get('field_employer_phone',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_PHONE')); ?>:</strong>
        </td>
        <td>
                    <?php echo $this->application->employer3_phone;?>
        </td>
    </tr>
        <?php } ?>
        <?php if ( $this->params->get('employment_history_position','1') == '1')
        { ?>
    <tr>
        <td>
            <strong><?php echo $this->params->get('field_position_held',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_POSITION_HELD')); ?>:</strong>
        </td>
        <td>
                    <?php echo $this->application->employer3_pos;?>
        </td>
    </tr>
        <?php } ?>
        <?php if ( $this->params->get('employment_history_from','1') == '1')
        { ?>
    <tr>
        <td>
            <strong><?php echo $this->params->get('field_employer_from_myyyy',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_FROM_MYYYY')); ?>:</strong>
        </td>
        <td>
                    <?php echo $this->application->employer3_from;?>
        </td>
    </tr>
        <?php } ?>
        <?php if ( $this->params->get('employment_history_to','1') == '1')
        { ?>
    <tr>
        <td>
            <strong><?php echo $this->params->get('field_employer_to_myyyy',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_TO_MYYYY')); ?>:</strong>
        </td>
        <td>
                    <?php echo $this->application->employer3_to;?>
        </td>
    </tr>
        <?php } ?>
        <?php if ( $this->params->get('employment_history_pay','1') == '1')
        { ?>
    <tr>
        <td>
            <strong><?php echo $this->params->get('field_pay_upon_leaving',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_PAY_UPON_LEAVING')); ?>:</strong>
        </td>
        <td>
                    <?php echo $this->application->employer3_pay;?>
        </td>
    </tr>
        <?php } ?>
        <?php if ( $this->params->get('employment_history_supervisor','1') == '1')
        { ?>
    <tr>
        <td>
            <strong><?php echo $this->params->get('field_supervisor',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_SUPERVISOR')); ?>:</strong>
        </td>
        <td>
                    <?php echo $this->application->employer3_sup;?>
        </td>
    </tr>
        <?php } ?>
        <?php if ( $this->params->get('employment_history_duties','1') == '1')
        { ?>
    <tr>
        <td>
            <strong><?php echo $this->params->get('field_duties',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_DUTIES')); ?>:</strong>
        </td>
        <td>
                    <?php echo $this->application->employer3_dut;?>
        </td>
    </tr>
        <?php } ?>
        <?php if ( $this->params->get('employment_history_reason','1') == '1')
        { ?>
    <tr>
        <td>
            <strong><?php echo $this->params->get('field_reason_for_leaving',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_REASON_FOR_LEAVING')); ?>:</strong>
        </td>
        <td>
                    <?php echo $this->application->employer3_leave;?>
        </td>
    </tr>
        <?php } ?>
</table>
</p>
<?php } ?>
<?php } ?>
<?php if ($this->params->get('job_related_skills','1') == '1')
{ ?>
<h3><?php echo $this->params->get('field_job_related_skills',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_JOB_RELATED_SKILLS')); ?></h3>
<p>
<table width="600px">
    <tr>
        <td>
        </td>
        <td>
            <strong><?php echo $this->params->get('field_vehicle_questions',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_VEHICLE_QUESTIONS')); ?></strong>
        </td>
    </tr>
        <?php $qcounter = 0; ?>
        <?php if ( $this->params->get('job_related_skills_q1','1') == '1')
        { $qcounter++; ?>
    <tr>
        <td valign="top">
            <strong><?php echo $qcounter; ?>.</strong>
        </td>
        <td>
            <strong><?php echo $this->params->get('field_vehicle_question_1',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_VEHICLE_QUESTION_1')); ?></strong>
        </td>
        <td>
                    <?php if ( '1' == $this->application->driver_license) echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_YES'); else echo JText::_('NO'); ?>
        </td>
    </tr>

    <tr>
        <td>
        </td>
        <td colspan="2">
            <strong><?php echo $this->params->get('field_vehicle_question_1_followup_a',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_VEHICLE_QUESTION_1_FOLLOWUP_A')); ?>:</strong>&nbsp;<?php echo $this->application->dl_number;?><br>
            <strong><?php echo $this->params->get('field_vehicle_question_1_followup_b',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_VEHICLE_QUESTION_1_FOLLOWUP_B')); ?>:</strong>&nbsp;<?php echo $this->application->dl_issued;?>
        </td>
    </tr>
        <?php } ?>
        <?php if ( $this->params->get('job_related_skills_q2','1') == '1')
        { $qcounter++; ?>
    <tr>
        <td valign="top">
            <strong><?php echo $qcounter; ?>.</strong>
        </td>
        <td>
            <strong><?php echo $this->params->get('field_vehicle_question_2',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_VEHICLE_QUESTION_2')); ?></strong>
        </td>
        <td>
                    <?php if ( '1' == $this->application->driving_offense) echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_YES'); else echo JText::_('NO'); ?>
        </td>
    </tr>
        <?php } ?>
        <?php if ( $this->params->get('job_related_skills_q2_reason','1') == '1')
        { ?>
    <tr>
        <td valign="top">
        </td>
        <td>
            <strong><?php echo $this->params->get('field_vehicle_question_2_followup',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_VEHICLE_QUESTION_2_FOLLOWUP')); ?></strong>
        </td>
        <td>
            <?php echo $this->application->driving_offense_reason; ?>
        </td>
    </tr>
        <?php } ?>
        <?php if ( $this->params->get('job_related_skills_q3','1') == '1')
        { $qcounter++; ?>
    <tr>
        <td valign="top">
            <strong><?php echo $qcounter; ?>.</strong>
        </td>
        <td>
            <strong><?php echo $this->params->get('field_vehicle_question_3',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_VEHICLE_QUESTION_3')); ?></strong>
        </td>
        <td>
                    <?php if ( '1' == $this->application->dl_modified) echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_YES'); else echo JText::_('NO'); ?>
        </td>
    </tr>
        <?php } ?>
        <?php if ( $this->params->get('job_related_skills_q3_reason','1') == '1')
        { ?>
    <tr>
        <td valign="top">

        </td>
        <td>
            <strong><?php echo $this->params->get('field_vehicle_question_3_followup',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_VEHICLE_QUESTION_3_FOLLOWUP')); ?></strong>
        </td>
        <td>
            <?php echo $this->application->dl_modified_reason; ?>
        </td>
    </tr>
        <?php } ?>
        <?php if ( $this->params->get('job_related_skills_states','1') == '1')
        { $qcounter++; ?>
    <tr>
        <td valign="top">
            <strong><?php echo $qcounter; ?>.</strong>
        </td>
        <td>
            <strong><?php echo $this->params->get('field_vehicle_states',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_VEHICLE_STATES')); ?></strong><br>
                    <?php echo $this->application->dl_states; ?>
        </td>
        <td>
        </td>
    </tr>
        <?php } ?>
        <?php if ( $this->params->get('job_related_skills_skills','1') == '1')
        { ?>
    <tr>
        <td>
        </td>
        <td>
            <strong><?php echo $this->params->get('field_other_skills',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_SKILLS')); ?>:</strong><br>
                    <?php echo $this->application->skills; ?>
        </td>
        <td>
        </td>
    </tr>
        <?php } ?>
        <?php if ( $this->params->get('job_related_skills_designations','1') == '1')
        { ?>
    <tr>
        <td>
        </td>
        <td>
            <strong><?php echo $this->params->get('field_prof_designations',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_PROF_DESIGNATIONS')); ?>:</strong><br>
                    <?php echo $this->application->professional; ?>
        </td>
        <td>
        </td>
    </tr>
    <tr><td></td><td><?php echo JHTML::_('jobgrokapp.renderLists',$this->application->lists); ?></td><td></td></tr>
        <?php } ?>
</table>
</p>
<?php } ?>
<?php if ($this->params->get('references','1') == '1') { ?>
<?php if ($this->params->get('references_1','1') == '1') { ?>
<h3><?php echo $this->params->get('field_reference',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_REFERENCE')); ?>&nbsp;(1)</h3>
<table width="600px">
    <tr>
        <td colspan="2">
            <?php echo $this->params->get('field_currently_employed',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_CURRENTLY_EMPLOYED')); ?>:
            <?php if( '1' == $this->application->currently_employed) echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_YES'); else echo JText::_('NO'); ?>
        </td>
    </tr>
    <tr>
        <td colspan="2">
            <?php echo $this->params->get('field_contact_employer',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_CONTACT_EMPLOYER')); ?>:
            <?php if( '1' == $this->application->contact_emp) echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_YES'); else echo JText::_('NO'); ?>
        </td>
    </tr>
        <?php if ( $this->params->get('references_name','1') == '1')
        { ?>
    <tr>
        <td>
            <strong><?php echo $this->params->get('field_reference_name',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_NAME')); ?>:</strong>
        </td>
        <td>
                    <?php echo $this->application->ref1_name;?>
        </td>
    </tr>
        <?php } ?>
        <?php if ( $this->params->get('references_address','1') == '1')
        { ?>
    <tr>
        <td>
            <strong><?php echo $this->params->get('field_reference_address',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_ADDRESS')); ?>:</strong>
        </td>
        <td>
                    <?php echo $this->application->ref1_address;?>
        </td>
    </tr>
        <?php } ?>
        <?php if ( $this->params->get('references_telephone','1') == '1')
        { ?>
    <tr>
        <td>
            <strong><?php echo $this->params->get('field_reference_telephone',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_TELEPHONE')); ?>:</strong>
        </td>
        <td>
                    <?php echo $this->application->ref1_telephone;?>
        </td>
    </tr>
        <?php } ?>
        <?php if ( $this->params->get('references_relationship','1') == '1')
        { ?>
    <tr>
        <td>
            <strong><?php echo $this->params->get('field_reference_relationship',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RELATIONSHIP')); ?>:</strong>
        </td>
        <td>
                    <?php echo $this->application->ref1_relationship;?>
        </td>
    </tr>
        <?php } ?>
        <?php if ( $this->params->get('references_years_acquainted','1') == '1')
        { ?>
    <tr>
        <td>
            <strong><?php echo $this->params->get('field_reference_years_acquainted',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_YEARS_ACQUAINTED')); ?>:</strong>
        </td>
        <td>
                    <?php echo $this->application->ref1_years;?>
        </td>
    </tr>
        <?php } ?>
</table>
</p>
<?php } ?>
<?php if ($this->params->get('references_2','1') == '1') { ?>
<h3><?php echo $this->params->get('field_reference',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_REFERENCE')); ?>&nbsp;(2)</h3>
<p>
<table width="600px">
        <?php if ( $this->params->get('references_name','1') == '1')
        { ?>
    <tr>
        <td>
            <strong><?php echo $this->params->get('field_reference_name',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_NAME')); ?>:</strong>
        </td>
        <td>
                    <?php echo $this->application->ref2_name;?>
        </td>
    </tr>
        <?php } ?>
        <?php if ( $this->params->get('references_address','1') == '1')
        { ?>
    <tr>
        <td>
            <strong><?php echo $this->params->get('field_reference_address',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_ADDRESS')); ?>:</strong>
        </td>
        <td>
                    <?php echo $this->application->ref2_address;?>
        </td>
    </tr>
        <?php } ?>
        <?php if ( $this->params->get('references_telephone','1') == '1')
        { ?>
    <tr>
        <td>
            <strong><?php echo $this->params->get('field_reference_telephone',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_TELEPHONE')); ?>:</strong>
        </td>
        <td>
                    <?php echo $this->application->ref2_telephone;?>
        </td>
    </tr>
        <?php } ?>
        <?php if ( $this->params->get('references_relationship','1') == '1')
        { ?>
    <tr>
        <td>
            <strong><?php echo $this->params->get('field_reference_relationship',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RELATIONSHIP')); ?>:</strong>
        </td>
        <td>
                    <?php echo $this->application->ref2_relationship;?>
        </td>
    </tr>
        <?php } ?>
        <?php if ( $this->params->get('references_years_acquainted','1') == '1')
        { ?>
    <tr>
        <td>
            <strong><?php echo $this->params->get('field_reference_years_acquainted',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_YEARS_ACQUAINTED')); ?>:</strong>
        </td>
        <td>
                    <?php echo $this->application->ref2_years;?>
        </td>
    </tr>
        <?php } ?>
</table>
</p>
<?php } ?>
<?php if ($this->params->get('references_3','1') == '1') { ?>
<h3><?php echo $this->params->get('field_reference',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_REFERENCE')); ?>&nbsp;(3)</h3>
<p>
<table width="600px">
        <?php if ( $this->params->get('references_name','1') == '1')
        { ?>
    <tr>
        <td>
            <strong><?php echo $this->params->get('field_reference_name',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_NAME')); ?>:</strong>
        </td>
        <td>
                    <?php echo $this->application->ref3_name;?>
        </td>
    </tr>
        <?php } ?>
        <?php if ( $this->params->get('references_address','1') == '1')
        { ?>
    <tr>
        <td>
            <strong><?php echo $this->params->get('field_reference_address',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_ADDRESS')); ?>:</strong>
        </td>
        <td>
                    <?php echo $this->application->ref3_address;?>
        </td>
    </tr>
        <?php } ?>
        <?php if ( $this->params->get('references_telephone','1') == '1')
        { ?>
    <tr>
        <td>
            <strong><?php echo $this->params->get('field_reference_telephone',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_TELEPHONE')); ?>:</strong>
        </td>
        <td>
                    <?php echo $this->application->ref3_telephone;?>
        </td>
    </tr>
        <?php } ?>
        <?php if ( $this->params->get('references_relationship','1') == '1')
        { ?>
    <tr>
        <td>
            <strong><?php echo $this->params->get('field_reference_relationship',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RELATIONSHIP')); ?>:</strong>
        </td>
        <td>
                    <?php echo $this->application->ref3_relationship;?>
        </td>
    </tr>
        <?php } ?>
        <?php if ( $this->params->get('references_years_acquainted','1') == '1')
        { ?>
    <tr>
        <td>
            <strong><?php echo $this->params->get('field_reference_years_acquainted',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_YEARS_ACQUAINTED')); ?>:</strong>
        </td>
        <td>
                    <?php echo $this->application->ref3_years;?>
        </td>
    </tr>
        <?php } ?>
</table>
</p>
<?php } ?>
<?php if ($this->params->get('references_4','1') == '1') { ?>
<h3><?php echo $this->params->get('field_reference',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_REFERENCE')); ?>&nbsp;(4)</h3>
<p>
<table width="600px">
        <?php if ( $this->params->get('references_name','1') == '1')
        { ?>
    <tr>
        <td>
            <strong><?php echo $this->params->get('field_reference_name',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_NAME')); ?>:</strong>
        </td>
        <td>
                    <?php echo $this->application->ref4_name;?>
        </td>
    </tr>
        <?php } ?>
        <?php if ( $this->params->get('references_address','1') == '1')
        { ?>
    <tr>
        <td>
            <strong><?php echo $this->params->get('field_reference_address',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_ADDRESS')); ?>:</strong>
        </td>
        <td>
                    <?php echo $this->application->ref4_address;?>
        </td>
    </tr>
        <?php } ?>
        <?php if ( $this->params->get('references_telephone','1') == '1')
        { ?>
    <tr>
        <td>
            <strong><?php echo $this->params->get('field_reference_telephone',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_TELEPHONE')); ?>:</strong>
        </td>
        <td>
                    <?php echo $this->application->ref4_telephone;?>
        </td>
    </tr>
        <?php } ?>
        <?php if ( $this->params->get('references_relationship','1') == '1')
        { ?>
    <tr>
        <td>
            <strong><?php echo $this->params->get('field_reference_relationship',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_RELATIONSHIP')); ?>:</strong>
        </td>
        <td>
                    <?php echo $this->application->ref4_relationship;?>
        </td>
    </tr>
        <?php } ?>
        <?php if ( $this->params->get('references_years_acquainted','1') == '1')
        { ?>
    <tr>
        <td>
            <strong><?php echo $this->params->get('field_reference_years_acquainted',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_YEARS_ACQUAINTED')); ?>:</strong>
        </td>
        <td>
                    <?php echo $this->application->ref4_years;?>
        </td>
    </tr>
        <?php } ?>
</table>
</p>
<?php } ?>

<?php } ?>
<?php if ($this->params->get('text_resume','1') == '1') { ?>
<h3><?php echo $this->params->get('field_text_resume',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_TEXT_RESUME')); ?></h3>
<p>
<table width="600px">
    <tr>
        <td>
            <strong><?php echo $this->params->get('field_text_resume_desc',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_TEXT_RESUME')); ?>:</strong>
        </td>
        <td>
                    <?php echo $this->application->text_resume;?>
        </td>
    </tr>
</table>
</p>
    <?php } ?>
<?php if ($this->params->get('display_custom_yes_no','0') == '1') { ?>
<p>
<table width="600px">
    <tr>
        <td>
            <strong><?php echo $this->params->get('text_custom_yes_no',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_SH_CUSTOM_YES_NO_TEXT')); ?>:</strong>
        </td>
        <td>
                    <?php if ( '1' == $this->application->custom_yes_no) echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_STATIC_YES'); else echo JText::_('NO'); ?>
        </td>
    </tr>
</table>
</p>
    <?php } ?>
</fieldset>
<?php
echo "<br/>".$this->application->signature;
echo "<br/>".$this->application->create_date;
?>

