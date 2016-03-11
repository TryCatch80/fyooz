<?php
/**
 *
 *
 * This is the default.php view layout for jobgrokapp
 *
 * Created: November 18, 2014, 3:25 am
 *
 * Subversion Details
 * $Date: 2014-09-28 20:49:00 -0500 (Sun, 28 Sep 2014) $
 * $Revision: 6303 $
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

$editor =JFactory::getEditor();
JHTML::_('behavior.calendar');

// BAD FORM - MOVE OUT OF VIEW!
$db = JFactory::getDBO();
if (isset($this->application->uid)) {
    $query = "SELECT `type`,`size` FROM #__tst_jgapp_uploads WHERE uid='".$this->application->uid."'";
    $db->setQuery($query);
    $file_info = $db->loadObject();
} else {
    $file_info = "";
}

?>

<?php if ($this->viewtype == 'html') : ?>
<div style="text-align: right;"> 
    <?php if ($this->pdflink != '')
            { ?>
    <a target="_blank" href="<?php echo $this->pdflink; ?>"><em>[<?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_DEFAULT_EXPORT_PDF'); ?>]</em>
            <?php // echo JHTML::_('image','pdf_button.png'); ?>
    </a>&nbsp;&nbsp; <?php } ?>
            <?php if ($this->printlink != '')
    { ?>
    <a target="_blank" href="<?php echo $this->printlink; ?>"><em>[<?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_DEFAULT_PRINT_VERSION'); ?>]</em>
        <?php // echo JHTML::_('image','printButton.png'); ?>
    </a>
    <?php } ?>
</div>
<?php endif; ?>

<?php if (isset($this->application->id)) : ?>
<script language="javascript" type="text/javascript">

    function setSendemail() {
        link = "index.php?option=com_jobgrokapp&controller=application&task=sendemail&&Itemid=" + <?php echo $this->application->Itemid; ?> + "&cid[]="+<?php echo $this->application->id; ?> + "&template=" + document.getElementById('emailrecipient_id').value;
        document.getElementById('template').href = link;
    }
</script>
<?php endif; ?>
<style>
label { display: inline; }
label { display: initial; }
</style>
<form action="index.php" method="post" name="adminForm" id="adminForm"  enctype="multipart/form-data">


<?php
    if (isset($this->application->Itemid) && $this->application->Itemid != '')
    {
        $db = JFactory::getDBO();
        $query = "SELECT title as name, params FROM #__menu WHERE id=".$this->application->Itemid;
        // $query = "SELECT params FROM #__components WHERE parent=0 and `option`='com_jobgrokapp';";
        $db->setQuery($query);
        $result = $db->loadObject();
        if ($result) {
            $params = new JRegistry($result->params);
            $menuname = $result->name.'&nbsp;<a href="'.JURI::base().'index.php?option=com_menus&view=item&layout=edit&id=1'.$this->application->Itemid.'">'.
                '(Menu Item '.$this->application->Itemid.')</a>';
            /* $menuname = JText::_($result->name).'&nbsp;<a href="'.JURI::base().'index.php?option=com_menus&task=edit&cid[]='.$this->application->Itemid.'">'.
                '(Menu Item '.$this->application->Itemid.')</a>'; */
        } else {
            $menuname = "n/a";
        }
    }
    else
    {
        $menuname = "n/a";
    }
?>

<?php if ( isset($this->application->id) || isset($this->application->uid) )
            { ?>

<fieldset class="adminform">
        <legend><?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_DEFAULT_DATA_INFORMATION'); ?></legend>
<table width="100%"><tr><td width="50%" valign="top">
        <table class="admintable">
    <?php if ( isset($this->application->id))
    { ?>
            <tr>
                <td width="100" align="right" class="key">
        <?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_DEFAULT_UNIQUE_ID'); ?>:
                </td>
                <td>
        <?php echo $this->application->id;?>
                </td>
                <td></td>
            </tr>
    <?php } ?>
    <?php if ( isset($this->application->uid))
                        { ?>
            <?php /*?><tr>
                <td width="100" align="right" class="key">
                    <?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_DEFAULT_SECURITY_TOKEN'); ?>:
                </td>
                <td>
            <?php echo $this->application->uid;?>
                </td>
            </tr><?php */?>
    <?php } ?>
    <?php if ( isset($this->application->job_code))
                        { ?>
            <tr>
                <td width="100" align="right" class="key">
                    <?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_DEFAULT_JOB_CODE'); ?>:
                </td>
                <td>
            <?php echo $this->application->job_code;?>
                </td>
            </tr>
    <?php } ?>
            <?php /*?><tr>
                <td width="100" align="right" class="key" valign="top">
                    <?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_DEFAULT_APPLICATION_FORM'); ?>:
                </td>
                <td>
                    <?php echo $menuname; ?>
                </td>
            </tr><?php */?>
            <?php /*?><tr>
                <td width="100" align="right" class="key" valign="top">
                    <?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_DEFAULT_NOTES'); ?>:
                </td>
                <td>
                    <textarea name="notes" rows="5" cols="75" wrap="on"><?php if ( isset($this->application->notes)) echo $this->application->notes; ?></textarea>
                </td>    
            </tr><?php */?>
        </table>
        </td>
    </tr></table>
    </fieldset>
                    <?php } ?>
    <fieldset class="adminform">
        <legend><?php
                    echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_DEFAULT_DOWNLOAD_FILE');
                    ?></legend>
<?php if ((int)$this->params->get('file_upload_count','1') > 1) : ?>
        <table>
            <tr>
                <td>
            <?php 
                $db = JFactory::getDbo();
                $query = "SELECT id, uid, name, type, size FROM #__tst_jgapp_uploads WHERE uid='".$this->application->uid."'";
                $db->setQuery($query);
                $result = $db->loadObjectList();
                if (count($result) == 0) echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_DEFAULT_NO_FILES_UPLOADED');
                foreach ($result as $r) {
                    echo '<a href="index.php?option=com_jobgrokapp&view=application&format=raw&id='.$r->id.'&uid='.$r->uid.'">'.$r->name.'</a>&nbsp;'.$r->size.'&nbsp;Bytes&nbsp;<em>['.$r->type.']</em><br/>';
                }
            ?>
                </td>
            </tr>
        </table>
<?php else: ?>
        <table class="admintable">
            <tr>
                <td valign="top" rowspan="2" width="100" align="right" class="key">
                    <?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_DEFAULT_DOWNLOAD_FILE'); ?>:
                </td>
                <td>
                    <input class="text_area" type="file" onchange="document.getElementById('file_name').value=this.value" name="file_upload" id="file_upload" title="Pick a file to upload" size="50" value="<?php if ( isset($this->application->file_name) ) echo $this->application->file_name;?>"/>
                </td>
            </tr>
            <tr>
                <td>
                    <input type="hidden" id="file_name" name="file_name" value="<?php if (isset($this->application->file_name)) echo $this->application->file_name; ?>" />
                    <?php if ( $file_info != '') {
                        if ((isset($this->application->file_name) && $this->application->file_name != '') ||
                            (isset($file_info->size) && $file_info->size != '') ||
                            (isset($file_info->type) && $file_info->type != '')) {
                            echo '<a href="index.php?option=com_jobgrokapp&view=application&format=raw&uid='.$this->application->uid.'">'.$this->application->file_name.'</a>&nbsp;'.$file_info->size.'&nbsp;Bytes&nbsp;<em>['.$file_info->type.']</em>';
                        } else {
                            echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_DEFAULT_NO_FILE_UPLOADED');
                        }
                    } else {
                        echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_DEFAULT_NO_FILE_UPLOADED');
                    } ?>
                </td>
            </tr>
        </table>
<?php endif; ?>
    </fieldset>
<?php if ($this->params->get('personal_information','1') == '1') : ?>
    <fieldset class="adminform">
        <legend><?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_DEFAULT_PERSONAL_INFORMATION'); ?></legend>
        <table>
            <tr>
                <td valign="top">`
        <table class="admintable">
            <?php /*?><tr>
                <td width="100" align="right" class="key">
<?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_DEFAULT_ELECTRONIC_SIGNATURE'); ?>
                </td>
                <td>
                    <input class="text_area" type="text" name="signature" id="signature" size="50" maxlength="250" value = "<?php if ( isset($this->application->signature) ) echo $this->application->signature;?>" />
                </td>
            </tr><?php */?>
            <?php if ($this->params->get('personal_information_first_name','1') == '1') : ?>
            <tr>
                <td width="100" align="right" class="key">
<?php echo JTEXT::_('Name'); ?>
                </td>
                <td>
                    <input class="text_area" type="text" name="first_name" id="first_name" size="50" maxlength="250" value = "<?php if ( isset($this->application->first_name) ) echo $this->application->first_name;?>" />
                </td>
            </tr>
            <?php endif; ?>
            <?php if ($this->params->get('personal_information_middle_name','1') == '1') : ?>
            <tr>
                <td width="100" align="right" class="key">
<?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_DEFAULT_MIDDLE_NAME'); ?>
                </td>
                <td>
                    <input class="text_area" type="text" name="middle_name" id="middle_name" size="50" maxlength="250" value = "<?php if (isset($this->application->middle_name) ) echo $this->application->middle_name;?>" />
                </td>
            </tr>
            <?php endif; ?>
            <?php if ($this->params->get('personal_information_last_name','1') == '1') : ?>
            <tr>
                <td width="100" align="right" class="key">
<?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_DEFAULT_LAST_NAME'); ?>
                </td>
                <td>
                    <input class="text_area" type="text" name="last_name" id="last_name" size="50" maxlength="250" value = "<?php if ( isset($this->application->last_name)) echo $this->application->last_name;?>" />
                </td>
            </tr>
            <?php endif; ?>
            <?php /*?><tr>
                <td width="100" align="right" class="key">
<?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_DEFAULT_SSN'); ?>
                </td>
                <td>
                    <input class="text_area" type="text" name="ssn" id="ssn" size="20" maxlength="20" value = "<?php if ( isset($this->application->ssn)) echo $this->application->ssn;?>" />
                </td>
            </tr><?php */?>
            <?php if ($this->params->get('personal_information_home_phone','1') == '1') : ?>
            <tr>
                <td width="100" align="right" class="key">
<?php echo JTEXT::_('Phone'); ?>
                </td>
                <td>
                    <input class="text_area" type="text" name="home_phone" id="home_phone" size="20" maxlength="20" value = "<?php if ( isset($this->application->home_phone)) echo $this->application->home_phone;?>" />
                </td>
            </tr>
            <?php endif; ?>
            <?php if ($this->params->get('personal_information_work_phone','1') == '1') : ?>
            <tr>
                <td width="100" align="right" class="key">
<?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_DEFAULT_WORK_PHONE'); ?>
                </td>
                <td>
                    <input class="text_area" type="text" name="work_phone" id="work_phone" size="20" maxlength="20" value = "<?php if ( isset($this->application->work_phone)) echo $this->application->work_phone;?>" />
                </td>
            </tr>
            <?php endif; ?>
            <?php if ($this->params->get('personal_information_cell_phone','1') == '1') : ?>
            <tr>
                <td width="100" align="right" class="key">
<?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_DEFAULT_CELL_PHONE'); ?>
                </td>
                <td>
                    <input class="text_area" type="text" name="cell_phone" id="cell_phone" size="20" maxlength="20" value = "<?php if ( isset($this->application->cell_phone)) echo $this->application->cell_phone;?>" />
                </td>
            </tr>
            <?php endif; ?>
            <?php if ($this->params->get('personal_information_email_address','1') == '1') : ?>
            <tr>
                <td width="100" align="right" class="key">
<?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_DEFAULT_EMAIL_ADDRESS'); ?>
                </td>
                <td>
                    <input class="text_area" type="text" name="email_address" id="email_address" size="50" maxlength="250" value = "<?php if ( isset($this->application->email_address)) echo $this->application->email_address;?>" />
                </td>
            </tr>
            <?php endif; ?>
            <tr>
                <td width="100" align="right" class="key">
					<?php echo JTEXT::_('Intrest'); ?>
                </td>
                <td>
                    <input class="text_area" type="text" name="interest" id="interest" size="50" maxlength="250" value = "<?php if ( isset($this->application->interest)) echo $this->application->interest;?>" />
                </td>
            </tr>
            <tr>
                <td width="100" align="right" class="key">
					<?php echo JTEXT::_('Position'); ?>
                </td>
                <td>
                	<?php 
						$db = JFactory::getDbo();
						$query = $db->getQuery(true);
						$query->select($db->quoteName(array('title')));
						$query->from($db->quoteName('#__tst_jglist_jobs'));
						$db->setQuery($query);
						$key = $db->loadAssocList();
					?>
                    <select name="positionnew" id="positionnew">
                        <option value="">Position</option>
                        <?php foreach ($key as $value) {?>
                        <option value="<?php echo $value["title"];?>" <?php if($this->application->positionnew == $value["title"]) { echo 'selected="selected"'; } ?>><?php echo $value["title"];?></option>
                        <?php }?>
                    </select> 
                </td>
            </tr>
            <?php /*?><tr>
                <td width="100" align="right" class="key">
				<?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_DEFAULT_HIRED'); ?>
                </td>
                <td><?php echo $this->options['hired']; ?>
                </td>
            </tr>
            <tr>
                <td width="100" align="right" class="key">
				<?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_DEFAULT_CREATE_DATE'); ?>
                </td>
                <td>
					<?php  if ( isset($this->application->create_date))
                		echo $this->application->create_date;
                    else
    					echo JHTML::calendar(JFactory::getDate()->format('Y-m-d H:i:s'),'create_date','create_date'); ?>
                </td>
            </tr>
            <tr>
                <td width="100" align="right" class="key">
					<?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_DEFAULT_HIRE_DATE'); ?>
                </td>
                <td>
					<?php  if ( isset($this->application->hire_date) && '0000-00-00 00:00:00' != $this->application->hire_date) 
    					echo JHTML::calendar($this->application->hire_date,'hire_date','hire_date');
                    else
    					echo JHTML::calendar('','hire_date','hire_date'); ?>
                </td>
            </tr>
            <tr>
                <td width="100" align="right" class="key">
					<?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_DEFAULT_SERVICE_DATE'); ?>
                </td>
                <td>
					<?php if ( isset($this->application->service_date) && '0000-00-00 00:00:00' != $this->application->service_date)
    					echo JHTML::calendar($this->application->service_date,'service_date','service_date');
                    else
    					echo JHTML::calendar('','service_date','service_date'); ?>
                </td>
            </tr>
            <tr>
                <td width="100" align="right" class="key">
					<?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_DEFAULT_TERMINATION_DATE'); ?>
                </td>
                <td>
					<?php  if ( isset($this->application->termination_date) && '0000-00-00 00:00:00' != $this->application->termination_date)
    					echo JHTML::calendar($this->application->termination_date,'termination_date','termination_date');
                    else
    					echo JHTML::calendar('','termination_date','termination_date'); ?>
                </td>
            </tr>
            <tr>
                <td width="100" aligh="right" class="key">
					<?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_DEFAULT_TERMINATION_REASON'); ?>
                </td>
                <td><?php echo $this->options['termination_reason']; ?>
                </td>
            </tr><?php */?>
        </table>
                </td>
                <td valign="top"><?php echo $this->photo; ?></td>
            </tr>
        </table>
    </fieldset>
<?php endif; ?>
<?php if ($this->params->get('addresses','1') == '1') : ?>
<?php if ($this->params->get('addresses_current','1') == '1') : ?>
    <fieldset class="adminform">
<legend><?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_DEFAULT_CURRENT_ADDRESS'); ?></legend>
        <table class="admintable">
            <?php if ($this->params->get('addresses_street','1') == '1') : ?>
            <tr>
                <td width="100" align="right" class="key">
<?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_DEFAULT_STREET'); ?>:
                </td>
                <td>
                    <input class="text_area" type="text" name="street" id="street" size="50" maxlength="250" value = "<?php if ( isset($this->application->street)) echo $this->application->street;?>" />
                </td>
            </tr>
            <?php endif; ?>
            <?php if ($this->params->get('addresses_city','1') == '1') : ?>
            <tr>
                <td width="100" align="right" class="key">
<?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_DEFAULT_CITY'); ?>:
                </td>
                <td>
                    <input class="text_area" type="text" name="city" id="city" size="50" maxlength="250" value = "<?php if ( isset($this->application->city)) echo $this->application->city;?>" />
                </td>
            </tr>
            <?php endif; ?>
            <?php if ($this->params->get('addresses_state','1') == '1') : ?>
            <tr>
                <td width="100" align="right" class="key">
<?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_DEFAULT_STATE'); ?>:
                </td>
                <td>
                    <input class="text_area" type="text" name="state" id="state" size="20" maxlength="20" value = "<?php if ( isset($this->application->state)) echo $this->application->state;?>" />
                </td>
            </tr>
            <?php endif; ?>
            <?php if ($this->params->get('addresses_zip_code','1') == '1') : ?>
            <tr>
                <td width="100" align="right" class="key">
<?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_DEFAULT_ZIP_CODE'); ?>:
                </td>
                <td>
                    <input class="text_area" type="text" name="zip_code" id="zip_code" size="20" maxlength="20" value = "<?php if ( isset($this->application->zip_code)) echo $this->application->zip_code;?>" />
                </td>
            </tr>
            <?php endif; ?>
            <?php if ($this->params->get('addresses_zip_code','1') == '1') : ?>
            <tr>
                <td width="100" align="right" class="key">
<?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_DEFAULT_ADDRESS_SINCE'); ?>:
                </td>
                <td>
                    <input class="text_area" type="text" name="from_date" id="from_date" size="20" maxlength="20" value = "<?php if ( isset($this->application->from_date)) echo $this->application->from_date;?>" />
                </td>
            </tr>
            <?php endif; ?>
        </table>
    </fieldset>
<?php endif; ?>
<?php if($this->params->get('addresses_1','1') == '1') : ?>
    <fieldset class="adminform">
<legend><?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_DEFAULT_PRIOR_ADDRESS'); ?>&nbsp;(1)</legend>
        <table class="admintable">
            <?php if ($this->params->get('addresses_street','1') == '1') : ?>
            <tr>
                <td width="100" align="right" class="key">
<?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_DEFAULT_STREET'); ?>:
                </td>
                <td>
                    <input class="text_area" type="text" name="street1" id="street1" size="50" maxlength="250" value = "<?php if ( isset($this->application->street1)) echo $this->application->street1;?>" />
                </td>
            </tr>
            <?php endif; ?>
            <?php if ($this->params->get('addresses_city','1') == '1') : ?>
            <tr>
                <td width="100" align="right" class="key">
<?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_DEFAULT_CITY'); ?>:
                </td>
                <td>
                    <input class="text_area" type="text" name="city1" id="city1" size="50" maxlength="250" value = "<?php if ( isset($this->application->city1)) echo $this->application->city1;?>" />
                </td>
            </tr>
            <?php endif; ?>
            <?php if ($this->params->get('addresses_state','1') == '1') : ?>
            <tr>
                <td width="100" align="right" class="key">
<?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_DEFAULT_STATE'); ?>:
                </td>
                <td>
                    <input class="text_area" type="text" name="state1" id="state1" size="20" maxlength="20" value = "<?php if ( isset($this->application->state1)) echo $this->application->state1;?>" />
                </td>
            </tr>
            <?php endif; ?>
            <?php if ($this->params->get('addresses_zip_code','1') == '1') : ?>
            <tr>
                <td width="100" align="right" class="key">
<?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_DEFAULT_ZIP_CODE'); ?>:
                </td>
                <td>
                    <input class="text_area" type="text" name="zip_code1" id="zip_code1" size="20" maxlength="20" value = "<?php if ( isset($this->application->zip_code1)) echo $this->application->zip_code1;?>" />
                </td>
            </tr>
            <?php endif; ?>
            <?php if ($this->params->get('addresses_zip_code','1') == '1') : ?>
            <tr>
                <td width="100" align="right" class="key">
<?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_DEFAULT_ADDRESS_SINCE'); ?>:
                </td>
                <td>
                    <input class="text_area" type="text" name="from_date1" id="from_date1" size="20" maxlength="20" value = "<?php if ( isset($this->application->from_date1)) echo $this->application->from_date1;?>" />
                </td>
            </tr>
            <?php endif; ?>
            <?php if ($this->params->get('addresses_to','1') == '1') : ?>
            <tr>
                <td width="100" align="right" class="key">
<?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_DEFAULT_ADDRESS_TO'); ?>:
                </td>
                <td>
                    <input class="text_area" type="text" name="to_date1" id="to_date1" size="20" maxlength="20" value = "<?php if ( isset($this->application->to_date1)) echo $this->application->to_date1;?>" />
                </td>
            </tr>
            <?php endif; ?>
        </table>
    </fieldset>
<?php endif; ?>
<?php if ($this->params->get('addresses_2','1') == '1') : ?>
    <fieldset class="adminform">
<legend><?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_DEFAULT_PRIOR_ADDRESS'); ?>&nbsp;(2)</legend>
        <table class="admintable">
            <?php if ($this->params->get('addresses_street','1') == '1') : ?>
            <tr>
                <td width="100" align="right" class="key">
<?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_DEFAULT_STREET'); ?>:
                </td>
                <td>
                    <input class="text_area" type="text" name="street2" id="street2" size="50" maxlength="250" value = "<?php if ( isset($this->application->street2)) echo $this->application->street2;?>" />
                </td>
            </tr>
            <?php endif; ?>
            <?php if ($this->params->get('addresses_city','1') == '1') : ?>
            <tr>
                <td width="100" align="right" class="key">
<?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_DEFAULT_CITY'); ?>:
                </td>
                <td>
                    <input class="text_area" type="text" name="city2" id="city2" size="50" maxlength="250" value = "<?php if ( isset($this->application->city2)) echo $this->application->city2;?>" />
                </td>
            </tr>
            <?php endif; ?>
            <?php if ($this->params->get('addresses_state','1') == '1') : ?>
            <tr>
                <td width="100" align="right" class="key">
<?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_DEFAULT_STATE'); ?>:
                </td>
                <td>
                    <input class="text_area" type="text" name="state2" id="state2" size="20" maxlength="20" value = "<?php if ( isset($this->application->state2)) echo $this->application->state2;?>" />
                </td>
            </tr>
            <?php endif; ?>
            <?php if ($this->params->get('addresses_zip_code','1') == '1') : ?>
            <tr>
                <td width="100" align="right" class="key">
<?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_DEFAULT_ZIP_CODE'); ?>:
                </td>
                <td>
                    <input class="text_area" type="text" name="zip_code2" id="zip_code2" size="20" maxlength="20" value = "<?php if ( isset($this->application->zip_code2)) echo $this->application->zip_code2;?>" />
                </td>
            </tr>
            <?php endif; ?>
            <?php if ($this->params->get('addresses_since','1') == '1') : ?>
            <tr>
                <td width="100" align="right" class="key">
<?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_DEFAULT_ADDRESS_SINCE'); ?>:
                </td>
                <td>
                    <input class="text_area" type="text" name="from_date2" id="from_date2" size="20" maxlength="20" value = "<?php if ( isset($this->application->from_date2)) echo $this->application->from_date2;?>" />
                </td>
            </tr>
            <?php endif; ?>
            <?php if ($this->params->get('addresses_to','1') == '1') : ?>
            <tr>
                <td width="100" align="right" class="key">
<?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_DEFAULT_ADDRESS_TO'); ?>
                </td>
                <td>
                    <input class="text_area" type="text" name="to_date2" id="to_date2" size="20" maxlength="20" value = "<?php if ( isset($this->application->to_date2)) echo $this->application->to_date2;?>" />
                </td>
            </tr>
            <?php endif; ?>
        </table>
    </fieldset>
<?php endif; ?>
<?php endif; ?>
<?php if ($this->params->get('education','1') == '1') : ?>
<?php if ($this->params->get('education_high','1') == '1') : ?>
    <fieldset class="adminform">
<legend><?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_DEFAULT_HIGH_SCHOOL'); ?></legend>
        <table class="admintable">
            <?php if ($this->params->get('education_school','1') == '1') : ?>
            <tr>
                <td width="100" align="right" class="key">
<?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_DEFAULT_SCHOOL_ATTENDED'); ?>:
                </td>
                <td>
                    <input class="text_area" type="text" name="school" id="school" size="50" maxlength="250" value = "<?php if ( isset($this->application->school)) echo $this->application->school;?>" />
                </td>
            </tr>
            <?php endif; ?>
            <?php if ($this->params->get('education_city','1') == '1') : ?>
            <tr>
                <td width="100" align="right" class="key">
<?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_DEFAULT_CITY'); ?>:
                </td>
                <td>
                    <input class="text_area" type="text" name="school_city" id="school_city" size="50" maxlength="250" value = "<?php if ( isset($this->application->school_city)) echo $this->application->school_city;?>" />
                </td>
            </tr>
            <?php endif; ?>
            <?php if ($this->params->get('education_state','1') == '1') : ?>
            <tr>
                <td width="100" align="right" class="key">
<?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_DEFAULT_STATE'); ?>:
                </td>
                <td>
                    <input class="text_area" type="text" name="school_state" id="school_state" size="20" maxlength="20" value = "<?php if ( isset($this->application->school_state)) echo $this->application->school_state;?>" />
                </td>
            </tr>
            <?php endif; ?>
            <?php if ($this->params->get('education_diploma','1') == '1') : ?>
            <tr>
                <td width="100" align="right" class="key">
<?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_DEFAULT_DIPLOMA'); ?>:
                </td>
                <td>
                    <?php echo $this->options['school_diploma']; ?>
                </td>
            </tr>
            <?php endif; ?>
        </table>
    </fieldset>
<?php endif; ?>
<?php if ($this->params->get('education_undergrad','1') == '1') : ?>
    <fieldset class="adminform">
<legend><?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_DEFAULT_UNDERGRAD_SCHOOL'); ?></legend>
        <table class="admintable">
            <?php if ($this->params->get('education_school','1') == '1') : ?>
            <tr>
                <td width="100" align="right" class="key">
<?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_DEFAULT_SCHOOL'); ?>:
                </td>
                <td>
                    <input class="text_area" type="text" name="school1" id="school1" size="50" maxlength="250" value = "<?php if ( isset($this->application->school1)) echo $this->application->school1;?>" />
                </td>
            </tr>
            <?php endif; ?>
            <?php if ($this->params->get('education_city','1') == '1') : ?>
            <tr>
                <td width="100" align="right" class="key">
<?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_DEFAULT_CITY'); ?>:
                </td>
                <td>
                    <input class="text_area" type="text" name="school_city1" id="school_city1" size="50" maxlength="250" value = "<?php if ( isset($this->application->city1)) echo $this->application->school_city1;?>" />
                </td>
            </tr>
            <?php endif; ?>
            <?php if ($this->params->get('education_state','1') == '1') : ?>
            <tr>
                <td width="100" align="right" class="key">
<?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_DEFAULT_STATE'); ?>:
                </td>
                <td>
                    <input class="text_area" type="text" name="school_state1" id="school_state1" size="20" maxlength="20" value = "<?php if ( isset($this->application->school_state1)) echo $this->application->school_state1;?>" />
                </td>
            </tr>
            <?php endif; ?>
            <?php if ($this->params->get('education_diploma','1') == '1') : ?>
            <tr>
                <td width="100" align="right" class="key">
<?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_DEFAULT_DIPLOMA'); ?>:
                </td>
                <td><?php echo $this->options['school_diploma1']; ?>
                </td>
            </tr>
            <?php endif; ?>
            <?php if ($this->params->get('education_degree','1') == '1') : ?>
            <tr>
                <td width="100" align="right" class="key">
<?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_DEFAULT_DEG_CERT_DIP_LONG'); ?>:
                </td>
                <td>
                    <input class="text_area" type="text" name="diploma_text1" id="diploma_text1" size="20" maxlength="20" value = "<?php if ( isset($this->application->diploma_text1)) echo $this->application->diploma_text1;?>" />
                </td>
            </tr>
            <?php endif; ?>
            <?php if ($this->params->get('education_study','1') == '1') : ?>
            <tr>
                <td width="100" align="right" class="key">
<?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_DEFAULT_AREA_OF_STUDY'); ?>:
                </td>
                <td>
                    <input class="text_area" type="text" name="study_area1" id="study_area1" size="20" maxlength="20" value = "<?php if ( isset($this->application->study_area1)) echo $this->application->study_area1;?>" />
                </td>
            </tr>
            <?php endif; ?>
        </table>
    </fieldset>
<?php endif; ?>
<?php if ($this->params->get('education_grad','1') == '1') : ?>
    <fieldset class="adminform">
<legend><?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_DEFAULT_GRAD_SCHOOL'); ?></legend>
        <table class="admintable">
            <?php if ($this->params->get('education_school','1') == '1') : ?>
            <tr>
                <td width="100" align="right" class="key">
<?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_DEFAULT_SCHOOL'); ?>:
                </td>
                <td>
                    <input class="text_area" type="text" name="school2" id="school2" size="50" maxlength="250" value = "<?php if ( isset($this->application->school2)) echo $this->application->school2;?>" />
                </td>
            </tr>
            <?php endif; ?>
            <?php if ($this->params->get('education_city','1') == '1') : ?>
            <tr>
                <td width="100" align="right" class="key">
<?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_DEFAULT_CITY'); ?>:
                </td>
                <td>
                    <input class="text_area" type="text" name="school_city2" id="school_city2" size="50" maxlength="250" value = "<?php if ( isset($this->application->school_city2)) echo $this->application->school_city2;?>" />
                </td>
            </tr>
            <?php endif; ?>
            <?php if ($this->params->get('education_state','1') == '1') : ?>
            <tr>
                <td width="100" align="right" class="key">
<?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_DEFAULT_STATE'); ?>:
                </td>
                <td>
                    <input class="text_area" type="text" name="school_state2" id="school_state2" size="20" maxlength="20" value = "<?php if ( isset($this->application->school_state2)) echo $this->application->school_state2;?>" />
                </td>
            </tr>
            <?php endif; ?>
            <?php if ($this->params->get('education_diploma','1') == '1') : ?>
            <tr>
                <td width="100" align="right" class="key">
<?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_DEFAULT_DIPLOMA'); ?>:
                </td>
                <td><?php echo $this->options['school_diploma2']; ?>
                </td>
            </tr>
            <?php endif; ?>
            <?php if ($this->params->get('education_degree','1') == '1') : ?>
            <tr>
                <td width="100" align="right" class="key">
<?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_DEFAULT_DEG_CERT_DIP_LONG'); ?>:
                </td>
                <td>
                    <input class="text_area" type="text" name="diploma_text2" id="diploma_text2" size="20" maxlength="20" value = "<?php if ( isset($this->application->diploma_text2)) echo $this->application->diploma_text2;?>" />
                </td>
            </tr>
            <?php endif; ?>
            <?php if ($this->params->get('education_study','1') == '1') : ?>
            <tr>
                <td width="100" align="right" class="key">
<?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_DEFAULT_AREA_OF_STUDY'); ?>:
                </td>
                <td>
                    <input class="text_area" type="text" name="study_area2" id="study_area2" size="20" maxlength="20" value = "<?php if ( isset($this->application->study_area2)) echo $this->application->study_area2;?>" />
                </td>
            </tr>
            <?php endif; ?>
        </table>
    </fieldset>
<?php endif; ?>
<?php if ($this->params->get('education_other','1') == '1') : ?>
    <fieldset class="adminform">
<legend><?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_DEFAULT_OTHER_SCHOOL'); ?></legend>
        <table class="admintable">
            <?php if ($this->params->get('education_school','1') == '1') : ?>
            <tr>
                <td width="100" align="right" class="key">
<?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_DEFAULT_SCHOOL'); ?>:
                </td>
                <td>
                    <input class="text_area" type="text" name="school3" id="school3" size="50" maxlength="250" value = "<?php if ( isset($this->application->school3)) echo $this->application->school3;?>" />
                </td>
            </tr>
            <?php endif; ?>
            <?php if ($this->params->get('education_city','1') == '1') : ?>
            <tr>
                <td width="100" align="right" class="key">
<?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_DEFAULT_CITY'); ?>:
                </td>
                <td>
                    <input class="text_area" type="text" name="school_city3" id="school_city3" size="50" maxlength="250" value = "<?php if ( isset($this->application->school_city3)) echo $this->application->school_city3;?>" />
                </td>
            </tr>
            <?php endif; ?>
            <?php if ($this->params->get('education_state','1') == '1') : ?>
            <tr>
                <td width="100" align="right" class="key">
<?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_DEFAULT_STATE'); ?>:
                </td>
                <td>
                    <input class="text_area" type="text" name="school_state3" id="school_state3" size="20" maxlength="20" value = "<?php if ( isset($this->application->school_state3)) echo $this->application->school_state3;?>" />
                </td>
            </tr>
            <?php endif; ?>
            <?php if ($this->params->get('education_diploma','1') == '1') : ?>
            <tr>
                <td width="100" align="right" class="key">
<?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_DEFAULT_DIPLOMA'); ?>:
                </td>
                <td><?php echo $this->options['school_diploma3']; ?></td>
            </tr>
            <?php endif; ?>
            <?php if ($this->params->get('education_degree','1') == '1') : ?>
            <tr>
                <td width="100" align="right" class="key">
<?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_DEFAULT_DEG_CERT_DIP_LONG'); ?>:
                </td>
                <td>
                    <input class="text_area" type="text" name="diploma_text3" id="diploma_text3" size="20" maxlength="20" value = "<?php if ( isset($this->application->diploma_text3)) echo $this->application->diploma_text3;?>" />
                </td>
            </tr>
            <?php endif; ?>
            <?php if ($this->params->get('education_study','1') == '1') : ?>
            <tr>
                <td width="100" align="right" class="key">
<?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_DEFAULT_AREA_OF_STUDY'); ?>:
                </td>
                <td>
                    <input class="text_area" type="text" name="study_area3" id="study_area3" size="20" maxlength="20" value = "<?php if ( isset($this->application->study_area3)) echo $this->application->study_area3;?>" />
                </td>
            </tr>
            <?php endif; ?>
        </table>
    </fieldset>
<?php endif; ?>
<?php endif; ?>
<?php if ($this->params->get('employment_information','1') == '1') : ?>
    <fieldset class="adminform">
<legend style="font-size: 10pt;"><?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_DEFAULT_EMPLOYMENT_INFORMATION'); ?></legend>
        <table class="admintable">
            <?php if ($this->params->get('employment_information_position','1') == '1') : ?>
            <tr>
                <td width="100" align="right" class="key">
<?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_DEFAULT_POSITION_APPLIED_FOR'); ?>:
                </td>
                <td colspan="2" >
                    <input class="text_area" type="text" name="position" id="position" size="15" maxlength="250" value = "<?php if ( isset($this->application->position)) echo $this->application->position;?>" />
                </td>
            </tr>
            <?php endif; ?>
            <?php if ($this->params->get('employment_information_date_you_can_start','1') == '1') : ?>
            <tr>
                <td width="100" align="right" class="key">
<?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_DEFAULT_DATE_YOU_CAN_START'); ?>:
                </td>
                <td colspan="2" >
                    <input class="text_area" type="text" name="available_date" id="available_date" size="8" maxlength="250" value = "<?php if ( isset($this->application->available_date)) echo $this->application->available_date;?>" />
                </td>
            </tr>
            <?php endif; ?>
            <?php if ($this->params->get('employment_information_desired_salary','1') == '1') : ?>
            <tr>
                <td width="100"align="right" class="key">
<?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_DEFAULT_DESIRED_SALARY'); ?>:
                </td>
                <td colspan="2" >
<?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_DEFAULT_CURRENCY_SYMBOL'); ?>&nbsp;<input class="text_area" type="text" name="desired_pay" id="desired_pay" size="8" maxlength="250" value = "<?php if ( isset($this->application->desired_pay)) echo $this->application->desired_pay;?>" />
                </td>
            </tr>
            <?php endif; ?>
            <?php if ($this->params->get('employment_information_do_you_prefer','1') == '1') : ?>
            <tr>
                <td width="100" align="right" class="key">
<?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_DEFAULT_DO_YOU_PREFER'); ?>:
                </td>
                <td colspan="2" valign="top" ><?php echo $this->options['work_preferences']; ?>
                </td>
            </tr>
            <?php endif; ?>
            <?php if ($this->params->get('employment_information_shiftwork','1') == '1') : ?>
            <tr>
                <td width="100" align="right" class="key">
<?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_DEFAULT_SHIFTWORK'); ?>:
                </td>
                <td colspan="2" valign="top" ><?php echo $this->options['shiftwork']; ?>
                </td>
            </tr>
            <?php endif; ?>
            <?php if ($this->params->get('employment_information_can_you_work','1') == '1') : ?>
            <tr>
                <td width="80" align="right" class="key">
<?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_DEFAULT_CAN_YOU_WORK'); ?>:
                </td>
                <td colspan="2" >
                    <fieldset>
                    <label class="checkbox-inline"><input type="checkbox" name="weekends" id="weekends" value="1" <?php if (isset($this->application->weekends) && '1' == $this->application->weekends ) echo "checked "; ?> >&nbsp;<?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_DEFAULT_WEEKENDS'); ?></label>
                    <label class="checkbox-inline"><input type="checkbox" name="evenings" id="evenings" value="1" <?php if (isset($this->application->evenings) && '1' == $this->application->evenings ) echo "checked "; ?> >&nbsp;<?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_DEFAULT_EVENINGS'); ?></label>
                </fieldset></td>
            </tr>
            <?php endif; ?>
            <?php if ($this->params->get('employment_inforamtion_availabel','1') == '1') : ?>
            <tr>
                <td class="key">
<?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_DEFAULT_AVAILABLE'); ?>:
                </td>
                <td colspan="2" >
                    <fieldset>
                    <label class="checkbox-inline"><input type="checkbox" name="monday" id="monday" style="inputbox" value="1" <?php if (isset($this->application->monday) && '1' == $this->application->monday ) echo "checked "; ?> ><?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_DEFAULT_MONDAY_ABBR'); ?></label>
                    <label class="checkbox-inline"><input type="checkbox" name="tuesday" id="tuesday" style="inputbox" value="1" <?php if (isset($this->application->tuesday) && '1' == $this->application->tuesday ) echo "checked "; ?> ><?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_DEFAULT_TUESDAY_ABBR'); ?></label>
                    <label class="checkbox-inline"><input type="checkbox" name="wednesday" id="wednesday" style="inputbox" value="1" <?php if (isset($this->application->wednesday) && '1' == $this->application->wednesday ) echo "checked "; ?> ><?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_DEFAULT_WEDNESDAY_ABBR'); ?></label>
                    <label class="checkbox-inline"><input type="checkbox" name="thursday" id="thursday" style="inputbox" value="1" <?php if (isset($this->application->thursday) && '1' == $this->application->thursday ) echo "checked "; ?> ><?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_DEFAULT_THURSDAY_ABBR'); ?></label>
                    <label class="checkbox-inline"><input type="checkbox" name="friday" id="friday" style="inputbox" value="1" <?php if (isset($this->application->friday) && '1' == $this->application->friday ) echo "checked "; ?> ><?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_DEFAULT_FRIDAY_ABBR'); ?></label>
                    <label class="checkbox-inline"><input type="checkbox" name="saturday" id="saturday" style="inputbox" value="1" <?php if (isset($this->application->saturday) && '1' == $this->application->saturday ) echo "checked "; ?> ><?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_DEFAULT_SATURDAY_ABBR'); ?></label>
                    <label class="checkbox-inline"><input type="checkbox" name="sunday" id="sunday" style="inputbox" value="1" <?php if (isset($this->application->sunday) && '1' == $this->application->sunday ) echo "checked "; ?> ><?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_DEFAULT_SUNDAY_ABBR'); ?></label>
                    </fieldset>
                </td>
            </tr>
            <?php endif; ?>
            <?php if ($this->params->get('employment_information_not_available','1') == '1') : ?>
            <tr>
                <td width="100" class="key">
<?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_DEFAULT_NOT_AVAILABLE'); ?>
                </td>
                <td colspan="2" >
                    <input class="text_area" type="text" name="unavailability" id="unavailability" size="80" maxlength="250" value = "<?php if ( isset($this->application->unavailability)) echo $this->application->unavailability;?>" />
                </td>
            </tr>
            <?php endif; ?>

            <tr>
                <td>
                </td>
                <td colspan=2>
<strong><?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_DEFAULT_FOLLOWING_QUESTIONS'); ?></strong>
                </td>
            </tr>
            <?php $qcounter = 1; ?>
            <?php if ($this->params->get('employment_information_question_1','1') == '1') : ?>
            <tr>
                <td valign="top" width="100" align="right" class="key">
							<?php echo $qcounter; $qcounter++; ?>
                </td>
                <td>
<?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_DEFAULT_QUESTION_1'); ?>
                </td>
                <td width="200"><?php echo $this->options['eligible']; ?>
                </td>
            </tr>
            <tr>
                <td valign="top" width="100" align="right" class="key"></td>
                <td>
<?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_DEFAULT_QUESTION_1_FOLLOWUP'); ?>
                </td>
                <td><?php echo $this->options['provideproof']; ?>
                </td>
            </tr>
            <?php endif; ?>
            <?php if ($this->params->get('employment_information_question_2','1') == '1') : ?>
            <tr>
                <td rowspan="2" valign="top" width="100" align="right" class="key">
                        <?php echo $qcounter; $qcounter++; ?>
                </td>
                <td>
<?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_DEFAULT_QUESTION_2'); ?><br>
<?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_DEFAULT_QUESTION_2_FOLLOWUP'); ?>
                </td>
                <td width="200"><?php echo $this->options['worked_here_before']; ?></td>
            </tr>
            <tr>
                <td colspan="2">
                    <input class="text_area" type="text" name="worked_here_text" id="worked_here_text" size="80" maxlength="250" value = "<?php if ( isset($this->application->worked_here_text)) echo $this->application->worked_here_text;?>" />
                </td>
            </tr>
            <?php endif; ?>
            <?php if ($this->params->get('employment_information_question_3','1') == '1') : ?>
            <tr>
                <td valign="top" width="100" align="right" class="key">
							<?php echo $qcounter; $qcounter++; ?>
                </td>
                <td>
<?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_DEFAULT_QUESTION_3'); ?>
                </td>
                <td width="200"><?php echo $this->options['job_desc_received']; ?>
                </td>
            </tr>
            <?php endif; ?>
            <?php if ($this->params->get('employment_information_question_4','1') == '1') : ?>
            <tr>
                <td rowspan="2" valign="top" width="100" align="right" class="key">
							<?php echo $qcounter; $qcounter++; ?>
                </td>
                <td>
<?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_DEFAULT_QUESTION_4'); ?><br/>
<?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_DEFAULT_QUESTION_4_FOLLOWUP'); ?>
                </td>
                <td width="200"><?php echo $this->options['understand_reqs']; ?>
                </td>
            </tr>
            <?php endif; ?>
            <?php if ($this->params->get('employment_information_question_5','1') == '1') : ?>
            <tr>
                <td colspan="2">
                    <input class="text_area" type="text" name="no_understand_reqs" id="no_understand_reqs" size="80" maxlength="250" value = "<?php if ( isset($this->application->no_understand_reqs)) echo $this->application->no_understand_reqs;?>" />
                </td>
            </tr>
            <tr>
                <td valign="top" width="100" align="right" class="key">
							<?php echo $qcounter; $qcounter++; ?>
                </td>
                <td>
<?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_DEFAULT_QUESTION_5'); ?>
                </td>
                <td width="200"><?php echo $this->options['on_layoff']; ?>
                </td>
            </tr>
            <?php endif; ?>
            <?php if ($this->params->get('employment_information_question_6','1') == '1') : ?>
            <tr>
                <td rowspan="2" valign="top" width="100" align="right" class="key">
							<?php echo $qcounter; $qcounter++; ?>
                </td>
                <td>
<?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_DEFAULT_QUESTION_6'); ?><br/>
<?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_DEFAULT_QUESTION_6_FOLLOWUP'); ?>
                </td>
                <td width="200"><?php echo $this->options['conf_agreement']; ?>
                </td>
            </tr>
            <?php endif; ?>
            <?php if ($this->params->get('employment_information_question_7','1') == '1') : ?>
            <tr>
                <td colspan="2">
                    <input class="text_area" type="text" name="conf_explain" id="conf_explain" size="80" maxlength="250" value = "<?php if ( isset($this->application->conf_explain)) echo $this->application->conf_explain;?>" />
                </td>
            </tr>
            <tr>
                <td rowspan="2" valign="top" width="100" align="right" class="key">
							<?php echo $qcounter; $qcounter++; ?>
                </td>
                <td>
<?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_DEFAULT_QUESTION_7'); ?><br/>
<?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_DEFAULT_QUESTION_7_FOLLOWUP'); ?>
                </td>
                <td valign="top" width="200"><?php echo $this->options['discharged']; ?>
                </td>
            </tr>
            <?php endif; ?>
            <?php if ($this->params->get('employment_information_question_8','1') == '1') : ?>
            <tr>
                <td colspan="2">
                    <input class="text_area" type="text" name="discharge_explain" id="discharge_explain" size="80" maxlength="250" value = "<?php if ( isset($this->application->discharge_explain))  echo $this->application->discharge_explain;?>" />
                </td>
            </tr>
            <tr>
                <td rowspan="2" valign="top" width="100" align="right" class="key">
							<?php echo $qcounter; $qcounter++; ?>
                </td>
                <td>
<?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_DEFAULT_QUESTION_8'); ?><br/>
<?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_DEFAULT_QUESTION_8_FOLLOWUP'); ?>
                </td>
                <td width="200"><?php echo $this->options['convict']; ?></td>
            </tr>
            <tr>
                <td colspan="2">
                    <input class="text_area" type="text" name="convict_explain" id="convict_explain" size="80" maxlength="250" value = "<?php if ( isset($this->application->convict_explain)) echo $this->application->convict_explain;?>" />
                </td>
            </tr>
            <?php endif; ?>
            <?php if ($this->params->get('employment_information_question_9','1') == '1') : ?>
            <tr>
                <td rowspan="2" valign="top" width="100" align="right" class="key">
							<?php echo $qcounter; $qcounter++; ?>
                </td>
                <td>
<?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_DEFAULT_QUESTION_9'); ?><br/>
<?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_DEFAULT_QUESTION_9_FOLLOWUP'); ?>
                </td>
                <td width="200"><?php echo $this->options['family']; ?></td>
            </tr>
            <tr>
                <td colspan="2">
                    <input class="text_area" type="text" name="family_explain" id="family_explain" size="80" maxlength="250" value = "<?php if ( isset($this->application->family_explain)) echo $this->application->family_explain;?>" />
                </td>
            </tr>
            <?php endif; ?>
        </table>
    </fieldset>
<?php endif; ?>
<?php if ($this->params->get('employment_history','1') == '1') : ?>
<?php if ($this->params->get('employment_history_recent','1') == '1') : ?>
    <fieldset class="adminform">
<legend><?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_DEFAULT_MOST_RECENT_EMPLOYER'); ?></legend>
        <table class="admintable">
            <tr>
                <td width="100" align="right" class="key">
<?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_DEFAULT_CURRENTLY_EMPLOYED'); ?>
                </td>
                <td><?php echo $this->options['currently_employed']; ?></td>
            </tr>
            <tr>
                <td width="100" align="right" class="key">
<?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_DEFAULT_CONTACT_EMPLOYER'); ?>
                </td>
                <td><?php echo $this->options['contact_emp']; ?></td>
            </tr>
            <?php if ($this->params->get('employment_history_employer','1') == '1') : ?>
            <tr>
                <td width="100" align="right" class="key">
<?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_DEFAULT_EMPLOYER'); ?>:
                </td>
                <td>
                    <input class="text_area" type="text" name="employer" id="employer" size="80" maxlength="250" value = "<?php if ( isset($this->application->employer)) echo $this->application->employer;?>" />
                </td>
            </tr>
            <?php endif; ?>
            <?php if ($this->params->get('employment_history_city','1') == '1') : ?>
            <tr>
                <td width="100" align="right" class="key">
<?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_DEFAULT_CITY'); ?>:
                </td>
                <td>
                    <input class="text_area" type="text" name="employer_city" id="employer_city" size="80" maxlength="250" value = "<?php if ( isset($this->application->employer_city))  echo $this->application->employer_city;?>" />
                </td>
            </tr>
            <?php endif; ?>
            <?php if ($this->params->get('employement_history_state','1') == '1') : ?>
            <tr>
                <td width="100" align="right" class="key">
<?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_DEFAULT_STATE'); ?>:
                </td>
                <td>
                    <input class="text_area" type="text" name="employer_state" id="employer_state" size="20" maxlength="20" value = "<?php if ( isset($this->application->employer_state))  echo $this->application->employer_state;?>" />
                </td>
            </tr>
            <?php endif; ?>
            <?php if ($this->params->get('employment_history_zip_code','1') == '1') : ?>
            <tr>
                <td width="100" align="right" class="key">
<?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_DEFAULT_ZIP_CODE'); ?>:
                </td>
                <td>
                    <input class="text_area" type="text" name="employer_zip" id="employer_zip" size="20" maxlength="20" value = "<?php if ( isset($this->application->employer_zip)) echo $this->application->employer_zip;?>" />
                </td>
            </tr>
            <?php endif; ?>
            <?php if ($this->params->get('employment_history_phone','1') == '1') : ?>
            <tr>
                <td width="100" align="right" class="key">
<?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_DEFAULT_PHONE'); ?>:
                </td>
                <td>
                    <input class="text_area" type="text" name="employer_phone" id="employer_phone" size="20" maxlength="20" value = "<?php if ( isset($this->application->employer_phone)) echo $this->application->employer_phone;?>" />
                </td>
            </tr>
            <?php endif; ?>
            <?php if ($this->params->get('employment_history_position','1') == '1') : ?>
            <tr>
                <td width="100" align="right" class="key">
<?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_DEFAULT_POSITION_HELD'); ?>:
                </td>
                <td>
                    <input class="text_area" type="text" name="employer_pos" id="employer_pos" size="80" maxlength="250" value = "<?php if ( isset($this->application->employer_pos)) echo $this->application->employer_pos;?>" />
                </td>
            </tr>
            <?php endif; ?>
            <?php if ($this->params->get('employment_history_from','1') == '1') : ?>
            <tr>
                <td width="100" align="right" class="key">
<?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_DEFAULT_FROM_MYYYY'); ?>:
                </td>
                <td>
                    <input class="text_area" type="text" name="employer_from" id="employer_from" size="20" maxlength="20" value = "<?php if ( isset($this->application->employer_from)) echo $this->application->employer_from;?>" />
                </td>
            </tr>
            <?php endif; ?>
            <?php if ($this->params->get('employment_history_to','1') == '1') : ?>
            <tr>
                <td width="100" align="right" class="key">
<?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_DEFAULT_TO_MYYYY'); ?>:
                </td>
                <td>
                    <input class="text_area" type="text" name="employer_to" id="employer_to" size="20" maxlength="20" value = "<?php if ( isset($this->application->employer_to)) echo $this->application->employer_to;?>" />
                </td>
            </tr>
            <?php endif; ?>
            <?php if ($this->params->get('employment_history_pay','1') == '1') : ?>
            <tr>
                <td width="100" align="right" class="key">
<?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_DEFAULT_PAY_UPON_LEAVING'); ?>
                </td>
                <td>
                    <input class="text_area" type="text" name="employer_pay" id="employer_pay" size="80" maxlength="250" value = "<?php if ( isset($this->application->employer_pay)) echo $this->application->employer_pay;?>" />
                </td>
            </tr>
            <?php endif; ?>
            <tr>
                <td width="100" align="right" class="key">
<?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_DEFAULT_SUPERVISOR'); ?>:
                </td>
                <td>
                    <input class="text_area" type="text" name="employer_sup" id="employer_sup" size="80" maxlength="250" value = "<?php if ( isset($this->application->employer_sup)) echo $this->application->employer_sup;?>" />
                </td>
            </tr>
            <tr>
                <td width="100" align="right" class="key">
<?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_DEFAULT_DUTIES'); ?>:
                </td>
                <td>
                    <input class="text_area" type="text" name="employer_dut" id="employer_dut" size="80" maxlength="250" value = "<?php if ( isset($this->application->employer_dut)) echo $this->application->employer_dut;?>" />
                </td>
            </tr>
            <tr>
                <td width="100" align="right" class="key">
<?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_DEFAULT_REASON_FOR_LEAVING'); ?>:
                </td>
                <td>
                    <input class="text_area" type="text" name="employer_leave" id="employer_leave" size="80" maxlength="250" value = "<?php if ( isset($this->application->employer_leave)) echo $this->application->employer_leave;?>" />
                </td>
            </tr>
        </table>
    </fieldset>
<?php endif; ?>
<?php if ($this->params->get('employment_history_1','1') == '1') : ?>
    <fieldset class="adminform">
<legend><?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_DEFAULT_PRIOR_EMPLOYER'); ?>&nbsp;(1)</legend>
        <table class="admintable">
            <tr>
                <td width="100" align="right" class="key">
<?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_DEFAULT_EMPLOYER'); ?>:
                </td>
                <td>
                    <input class="text_area" type="text" name="employer1" id="employer1" size="80" maxlength="250" value = "<?php if ( isset($this->application->employer1)) echo $this->application->employer1;?>" />
                </td>
            </tr>
            <tr>
                <td width="100" align="right" class="key">
<?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_DEFAULT_CITY'); ?>:
                </td>
                <td>
                    <input class="text_area" type="text" name="employer1_city" id="employer1_city" size="80" maxlength="250" value = "<?php if ( isset($this->application->employer1_city))  echo $this->application->employer1_city;?>" />
                </td>
            </tr>
            <tr>
                <td width="100" align="right" class="key">
<?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_DEFAULT_STATE'); ?>:
                </td>
                <td>
                    <input class="text_area" type="text" name="employer1_state" id="employer1_state" size="20" maxlength="20" value = "<?php if ( isset($this->application->employer1_state))  echo $this->application->employer1_state;?>" />
                </td>
            </tr>
            <tr>
                <td width="100" align="right" class="key">
<?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_DEFAULT_ZIP_CODE'); ?>
                </td>
                <td>
                    <input class="text_area" type="text" name="employer1_zip" id="employer1_zip" size="20" maxlength="20" value = "<?php if ( isset($this->application->employer1_zip)) echo $this->application->employer1_zip;?>" />
                </td>
            </tr>
            <tr>
                <td width="100" align="right" class="key">
<?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_DEFAULT_PHONE'); ?>:
                </td>
                <td>
                    <input class="text_area" type="text" name="employer1_phone" id="employer1_phone" size="20" maxlength="20" value = "<?php if ( isset($this->application->employer1_phone)) echo $this->application->employer1_phone;?>" />
                </td>
            </tr>
            <tr>
                <td width="100" align="right" class="key">
<?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_DEFAULT_POSITION_HELD'); ?>:
                </td>
                <td>
                    <input class="text_area" type="text" name="employer1_pos" id="employer1_pos" size="80" maxlength="250" value = "<?php if ( isset($this->application->employer1_pos)) echo $this->application->employer1_pos;?>" />
                </td>
            </tr>
            <tr>
                <td width="100" align="right" class="key">
<?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_DEFAULT_FROM_MYYYY'); ?>:
                </td>
                <td>
                    <input class="text_area" type="text" name="employer1_from" id="employer1_from" size="20" maxlength="20" value = "<?php if ( isset($this->application->employer1_from)) echo $this->application->employer1_from;?>" />
                </td>
            </tr>
            <tr>
                <td width="100" align="right" class="key">
<?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_DEFAULT_TO_MYYYY'); ?>:
                </td>
                <td>
                    <input class="text_area" type="text" name="employer1_to" id="employer1_to" size="20" maxlength="20" value = "<?php if ( isset($this->application->employer1_to)) echo $this->application->employer1_to;?>" />
                </td>
            </tr>
            <tr>
                <td width="100" align="right" class="key">
<?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_DEFAULT_PAY_UPON_LEAVING'); ?>:
                </td>
                <td>
                    <input class="text_area" type="text" name="employer1_pay" id="employer1_pay" size="80" maxlength="250" value = "<?php if ( isset($this->application->employer1_pay)) echo $this->application->employer1_pay;?>" />
                </td>
            </tr>
            <tr>
                <td width="100" align="right" class="key">
<?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_DEFAULT_SUPERVISOR'); ?>
                </td>
                <td>
                    <input class="text_area" type="text" name="employer1_sup" id="employer1_sup" size="80" maxlength="250" value = "<?php if ( isset($this->application->employer1_sup)) echo $this->application->employer1_sup;?>" />
                </td>
            </tr>
            <tr>
                <td width="100" align="right" class="key">
<?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_DEFAULT_DUTIES'); ?>:
                </td>
                <td>
                    <input class="text_area" type="text" name="employer1_dut" id="employer1_dut" size="80" maxlength="250" value = "<?php if ( isset($this->application->employer1_dut)) echo $this->application->employer1_dut;?>" />
                </td>
            </tr>
            <tr>
                <td width="100" align="right" class="key">
<?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_DEFAULT_REASON_FOR_LEAVING'); ?>:
                </td>
                <td>
                    <input class="text_area" type="text" name="employer1_leave" id="employer1_leave" size="80" maxlength="250" value = "<?php if ( isset($this->application->employer1_leave)) echo $this->application->employer1_leave;?>" />
                </td>
            </tr>
        </table>
    </fieldset>
<?php endif; ?>
<?php if ($this->params->get('employment_history_2','1') == '1') : ?>
    <fieldset class="adminform">
<legend><?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_DEFAULT_PRIOR_EMPLOYER'); ?>&nbsp;(2)</legend>
        <table class="admintable">
            <tr>
                <td width="100" align="right" class="key">
<?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_DEFAULT_EMPLOYER'); ?>:
                </td>
                <td>
                    <input class="text_area" type="text" name="employer2" id="employer2" size="80" maxlength="250" value = "<?php if ( isset($this->application->employer2)) echo $this->application->employer2;?>" />
                </td>
            </tr>
            <tr>
                <td width="100" align="right" class="key">
<?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_DEFAULT_CITY'); ?>:
                </td>
                <td>
                    <input class="text_area" type="text" name="employer2_city" id="employer2_city" size="80" maxlength="250" value = "<?php if ( isset($this->application->employer2_city)) echo $this->application->employer2_city;?>" />
                </td>
            </tr>
            <tr>
                <td width="100" align="right" class="key">
<?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_DEFAULT_STATE'); ?>:
                </td>
                <td>
                    <input class="text_area" type="text" name="employer2_state" id="employer2_state" size="20" maxlength="20" value = "<?php if ( isset($this->application->employer2_state)) echo $this->application->employer2_state;?>" />
                </td>
            </tr>
            <tr>
                <td width="100" align="right" class="key">
<?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_DEFAULT_ZIP_CODE'); ?>:
                </td>
                <td>
                    <input class="text_area" type="text" name="employer2_zip" id="employer2_zip" size="20" maxlength="20" value = "<?php if ( isset($this->application->employer2_zip)) echo $this->application->employer2_zip;?>" />
                </td>
            </tr>
            <tr>
                <td width="100" align="right" class="key">
<?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_DEFAULT_PHONE'); ?>:
                </td>
                <td>
                    <input class="text_area" type="text" name="employer2_phone" id="employer2_phone" size="20" maxlength="20" value = "<?php if ( isset($this->application->employer2_phone)) echo $this->application->employer2_phone;?>" />
                </td>
            </tr>
            <tr>
                <td width="100" align="right" class="key">
<?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_DEFAULT_POSITION_HELD'); ?>:
                </td>
                <td>
                    <input class="text_area" type="text" name="employer2_pos" id="employer2_pos" size="80" maxlength="250" value = "<?php if ( isset($this->application->employer2_pos)) echo $this->application->employer2_pos;?>" />
                </td>
            </tr>
            <tr>
                <td width="100" align="right" class="key">
<?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_DEFAULT_FROM_MYYYY'); ?>:
                </td>
                <td>
                    <input class="text_area" type="text" name="employer2_from" id="employer2_from" size="20" maxlength="20" value = "<?php if ( isset($this->application->employer2_from)) echo $this->application->employer2_from;?>" />
                </td>
            </tr>
            <tr>
                <td width="100" align="right" class="key">
<?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_DEFAULT_TO_MYYYY'); ?>:
                </td>
                <td>
                    <input class="text_area" type="text" name="employer2_to" id="employer2_to" size="20" maxlength="20" value = "<?php if ( isset($this->application->employer2_to)) echo $this->application->employer2_to;?>" />
                </td>
            </tr>
            <tr>
                <td width="100" align="right" class="key">
<?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_DEFAULT_PAY_UPON_LEAVING'); ?>:
                </td>
                <td>
                    <input class="text_area" type="text" name="employer2_pay" id="employer2_pay" size="80" maxlength="250" value = "<?php if ( isset($this->application->employer2_pay)) echo $this->application->employer2_pay;?>" />
                </td>
            </tr>
            <tr>
                <td width="100" align="right" class="key">
<?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_DEFAULT_SUPERVISOR'); ?>:
                </td>
                <td>
                    <input class="text_area" type="text" name="employer2_sup" id="employer2_sup" size="80" maxlength="250" value = "<?php if ( isset($this->application->employer2_sup)) echo $this->application->employer2_sup;?>" />
                </td>
            </tr>
            <tr>
                <td width="100" align="right" class="key">
<?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_DEFAULT_DUTIES'); ?>:
                </td>
                <td>
                    <input class="text_area" type="text" name="employer2_dut" id="employer2_dut" size="80" maxlength="250" value = "<?php if ( isset($this->application->employer2_dut)) echo $this->application->employer2_dut;?>" />
                </td>
            </tr>
            <tr>
                <td width="100" align="right" class="key">
<?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_DEFAULT_REASON_FOR_LEAVING'); ?>:
                </td>
                <td>
                    <input class="text_area" type="text" name="employer2_leave" id="employer2_leave" size="80" maxlength="250" value = "<?php if ( isset($this->application->employer2_leave)) echo $this->application->employer2_leave;?>" />
                </td>
            </tr>
        </table>
    </fieldset>
<?php endif; ?>
<?php if ($this->params->get('employment_history_3','1') == '1') : ?>
    <fieldset class="adminform">
<legend><?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_DEFAULT_PRIOR_EMPLOYER'); ?>&nbsp;(3)</legend>
        <table class="admintable">
            <tr>
                <td width="100" align="right" class="key">
<?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_DEFAULT_EMPLOYER'); ?>:
                </td>
                <td>
                    <input class="text_area" type="text" name="employer3" id="employer3" size="80" maxlength="250" value = "<?php if ( isset($this->application->employer3)) echo $this->application->employer3;?>" />
                </td>
            </tr>
            <tr>
                <td width="100" align="right" class="key">
<?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_DEFAULT_CITY'); ?>:
                </td>
                <td>
                    <input class="text_area" type="text" name="employer3_city" id="employer3_city" size="80" maxlength="250" value = "<?php if ( isset($this->application->employer3_city)) echo $this->application->employer3_city;?>" />
                </td>
            </tr>
            <tr>
                <td width="100" align="right" class="key">
<?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_DEFAULT_STATE'); ?>:
                </td>
                <td>
                    <input class="text_area" type="text" name="employer3_state" id="employer3_state" size="20" maxlength="20" value = "<?php if ( isset($this->application->employer3_state)) echo $this->application->employer3_state;?>" />
                </td>
            </tr>
            <tr>
                <td width="100" align="right" class="key">
<?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_DEFAULT_ZIP_CODE'); ?>:
                </td>
                <td>
                    <input class="text_area" type="text" name="employer3_zip" id="employer3_zip" size="20" maxlength="20" value = "<?php if ( isset($this->application->employer3_zip)) echo $this->application->employer3_zip;?>" />
                </td>
            </tr>
            <tr>
                <td width="100" align="right" class="key">
<?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_DEFAULT_PHONE'); ?>:
                </td>
                <td>
                    <input class="text_area" type="text" name="employer3_phone" id="employer3_phone" size="20" maxlength="20" value = "<?php if ( isset($this->application->employer3_phone)) echo $this->application->employer3_phone;?>" />
                </td>
            </tr>
            <tr>
                <td width="100" align="right" class="key">
<?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_DEFAULT_POSITION_HELD'); ?>:
                </td>
                <td>
                    <input class="text_area" type="text" name="employer3_pos" id="employer3_pos" size="80" maxlength="250" value = "<?php if ( isset($this->application->employer3_pos)) echo $this->application->employer3_pos;?>" />
                </td>
            </tr>
            <tr>
                <td width="100" align="right" class="key">
<?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_DEFAULT_FROM_MYYYY'); ?>:
                </td>
                <td>
                    <input class="text_area" type="text" name="employer3_from" id="employer3_from" size="20" maxlength="20" value = "<?php if ( isset($this->application->employer3_from)) echo $this->application->employer3_from;?>" />
                </td>
            </tr>
            <tr>
                <td width="100" align="right" class="key">
<?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_DEFAULT_TO_MYYYY'); ?>:
                </td>
                <td>
                    <input class="text_area" type="text" name="employer3_to" id="employer3_to" size="20" maxlength="20" value = "<?php if ( isset($this->application->employer3_to)) echo $this->application->employer3_to;?>" />
                </td>
            </tr>
            <tr>
                <td width="100" align="right" class="key">
<?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_DEFAULT_PAY_UPON_LEAVING'); ?>:
                </td>
                <td>
                    <input class="text_area" type="text" name="employer3_pay" id="employer3_pay" size="80" maxlength="250" value = "<?php if ( isset($this->application->employer3_pay)) echo $this->application->employer3_pay;?>" />
                </td>
            </tr>
            <tr>
                <td width="100" align="right" class="key">
<?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_DEFAULT_SUPERVISOR'); ?>:
                </td>
                <td>
                    <input class="text_area" type="text" name="employer3_sup" id="employer3_sup" size="80" maxlength="250" value = "<?php if ( isset($this->application->employer3_sup)) echo $this->application->employer3_sup;?>" />
                </td>
            </tr>
            <tr>
                <td width="100" align="right" class="key">
<?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_DEFAULT_DUTIES'); ?>:
                </td>
                <td>
                    <input class="text_area" type="text" name="employer3_dut" id="employer3_dut" size="80" maxlength="250" value = "<?php if ( isset($this->application->employer3_dut)) echo $this->application->employer3_dut;?>" />
                </td>
            </tr>
            <tr>
                <td width="100" align="right" class="key">
<?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_DEFAULT_REASON_FOR_LEAVING'); ?>:
                </td>
                <td>
                    <input class="text_area" type="text" name="employer3_leave" id="employer3_leave" size="80" maxlength="250" value = "<?php if ( isset($this->application->employer3_leave)) echo $this->application->employer3_leave;?>" />
                </td>
            </tr>
        </table>
    </fieldset>
<?php endif; ?>
<?php endif; ?>

    <?php /*?><fieldset class="adminform">
<legend style="font-size: 10px;"><?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_DEFAULT_JOB_RELATED_SKILLS'); ?></legend>
        <table class="admintable">
            <tr>
                <td>
                </td>
                <td colspan=2>
<strong><?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_DEFAULT_FOLLOWING_QUESTIONS'); ?>:</strong>
                </td>
            </tr>
            <tr>
                <td valign="top" rowspan="2" width="100" align="right" class="key">
							1.
                </td>
                <td>
<?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_DEFAULT_VEHICLE_QUESTION_1'); ?>:
                </td>
                <td width="200"><?php echo $this->options['driver_license']; ?>
                </td>
            </tr>
            <tr>
                <td colspan="2"><table><tr>
<td><?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_DEFAULT_VEHICLE_QUESTION_1_FOLLOWUP_A'); ?>:</td>
                    <td><input class="text_area" type="text" name="dl_number" id="dl_number" size="20" maxlength="250" value = "<?php if ( isset($this->application->dl_number)) echo $this->application->dl_number;?>" /></td>
<td><?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_DEFAULT_VEHICLE_QUESTION_1_FOLLOWUP_B'); ?>:</td>
                    <td><input class="text_area" type="text" name="dl_issued" id="dl_issued" size="20" maxlength="250" value = "<?php if ( isset($this->application->dl_issued))  echo $this->application->dl_issued;?>" /></td>
                    </tr></table></td>
            </tr>
            <tr>
                <td width="100" valign="top" align="right" class="key" rowspan="2">
							2.
                </td>
                <td>
<?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_DEFAULT_VEHICLE_QUESTION_2'); ?><br/>
<?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_DEFAULT_VEHICLE_QUESTION_2_FOLLOWUP'); ?>
                </td>
                <td width="200"><?php echo $this->options['driving_offense']; ?>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <input class="text_area" type="text" name="driving_offense_reason" id="driving_offense_reason" size="80" maxlength="250" value = "<?php if ( isset($this->application->driving_offense_reason))  echo $this->application->driving_offense_reason;?>" />
                </td>
            </tr>
            <tr>
                <td width="100" valign="top" align="right" class="key" rowspan="2">
							3.
                </td>
                <td>
<?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_DEFAULT_VEHICLE_QUESTION_3'); ?><br/>
<?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_DEFAULT_VEHICLE_QUESTION_3_FOLLOWUP'); ?>
                </td>
                <td width="200" valign="top"><?php echo $this->options['dl_modified']; ?>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <input class="text_area" type="text" name="dl_modified_reason" id="dl_modified_reason" size="80" maxlength="250" value = "<?php if ( isset($this->application->dl_modified_reason))  echo $this->application->dl_modified_reason;?>" />
                </td>
            </tr>
            <tr>
                <td width="100" align="right" class="key" valign="top">
							4.
                </td>
                <td colspan="2"><table><tr>
<td><?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_DEFAULT_VEHICLE_STATES'); ?></td>
                    <td><input class="text_area" type="text" name="dl_states" id="dl_states" size="40" maxlength="250" value = "<?php if ( isset($this->application->dl_states)) echo $this->application->dl_states;?>" /></td>
                </td></table></td>
            </tr>
            <tr>
                <td width="100" align="right" class="key" valign="top">
<?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_DEFAULT_SKILLS'); ?>
                </td>
                <td colspan="2">
                    <textarea name="skills" rows="5" cols="75" wrap="on"><?php if ( isset($this->application->skills)) echo $this->application->skills; ?></textarea>
                </td>
            </tr>
            <tr>
                <td width="100" align="right" class="key" valign="top">
<?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_DEFAULT_PROF_DESIGNATIONS'); ?>
                </td>
                <td colspan="2">
                    <textarea name="professional" rows="5" cols="75" wrap="on"><?php if ( isset($this->application->professional)) echo $this->application->professional; ?></textarea>
                </td>
            </tr>
            <tr>
                <td></td>
                <td colspan="2">
                    <?php echo $this->lists['lists']; ?>
                </td>
            </tr>
        </table>
    </fieldset><?php */?>
    <?php /*?><fieldset class="adminform">
<legend style="font-size: 10pt;"><?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_DEFAULT_REFERENCE'); ?>&nbsp;(1)</legend>
        <table class="admintable">
            <tr>
                <td width="100" valign="top" align="right" class="key">
<?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_DEFAULT_NAME'); ?>:
                </td>
                <td>
                    <input class="text_area" type="text" name="ref1_name" id="ref1_name" size="50" maxlength="250" value = "<?php if ( isset($this->application->ref1_name)) echo $this->application->ref1_name;?>" />
                </td>
            </tr>
            <tr>
                <td width="100" valign="top" align="right" class="key">
<?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_DEFAULT_ADDRESS'); ?>:
                </td>
                <td>
                    <input class="text_area" type="text" name="ref1_address" id="ref1_address" size="50" maxlength="250" value = "<?php if ( isset($this->application->ref1_address)) echo $this->application->ref1_address;?>" />
                </td>
            </tr>
            <tr>
                <td width="100" valign="top" align="right" class="key">
<?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_DEFAULT_TELEPHONE'); ?>:
                </td>
                <td>
                    <input class="text_area" type="text" name="ref1_telephone" id="ref1_telephone" size="50" maxlength="250" value = "<?php if ( isset($this->application->ref1_telephone)) echo $this->application->ref1_telephone;?>" />
                </td>
            </tr>
            <tr>
                <td width="100" valign="top" align="right" class="key">
<?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_DEFAULT_RELATIONSHIP'); ?>:
                </td>
                <td>
                    <input class="text_area" type="text" name="ref1_relationship" id="ref1_relationship" size="50" maxlength="250" value = "<?php if ( isset($this->application->ref1_relationship)) echo $this->application->ref1_relationship;?>" />
                </td>
            </tr>
            <tr>
                <td width="100" valign="top" align="right" class="key">
<?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_DEFAULT_YEARS_ACQUAINTED'); ?>:
                </td>
                <td>
                    <input class="text_area" type="text" name="ref1_years" id="ref1_years" size="50" maxlength="250" value = "<?php if ( isset($this->application->ref1_years)) echo $this->application->ref1_years;?>" />
                </td>
            </tr>
        </table>
    </fieldset><?php */?>
    <?php /*?><fieldset class="adminform">
<legend style="font-size: 10pt;"><?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_DEFAULT_REFERENCE'); ?>&nbsp;(2)</legend>
        <table class="admintable">
            <tr>
                <td width="100" valign="top" align="right" class="key">
<?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_DEFAULT_NAME'); ?>:
                </td>
                <td>
                    <input class="text_area" type="text" name="ref2_name" id="ref2_name" size="50" maxlength="250" value = "<?php if ( isset($this->application->ref2_name)) echo $this->application->ref2_name;?>" />
                </td>
            </tr>
            <tr>
                <td width="100" valign="top" align="right" class="key">
<?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_DEFAULT_ADDRESS'); ?>:
                </td>
                <td>
                    <input class="text_area" type="text" name="ref2_address" id="ref2_address" size="50" maxlength="250" value = "<?php if ( isset($this->application->ref2_address)) echo $this->application->ref2_address;?>" />
                </td>
            </tr>
            <tr>
                <td width="100" valign="top" align="right" class="key">
<?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_DEFAULT_TELEPHONE'); ?>:
                </td>
                <td>
                    <input class="text_area" type="text" name="ref2_telephone" id="ref2_telephone" size="50" maxlength="250" value = "<?php if ( isset($this->application->ref2_telephone)) echo $this->application->ref2_telephone;?>" />
                </td>
            </tr>
            <tr>
                <td width="100" valign="top" align="right" class="key">
<?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_DEFAULT_RELATIONSHIP'); ?>:
                </td>
                <td>
                    <input class="text_area" type="text" name="ref2_relationship" id="ref2_relationship" size="50" maxlength="250" value = "<?php if ( isset($this->application->ref2_relationship)) echo $this->application->ref2_relationship;?>" />
                </td>
            </tr>
            <tr>
                <td width="100" valign="top" align="right" class="key">
<?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_DEFAULT_YEARS_ACQUAINTED'); ?>:
                </td>
                <td>
                    <input class="text_area" type="text" name="ref2_years" id="ref2_years" size="50" maxlength="250" value = "<?php if ( isset($this->application->ref2_years)) echo $this->application->ref2_years;?>" />
                </td>
            </tr>
        </table>
    </fieldset><?php */?>
    <?php /*?><fieldset class="adminform">
<legend><?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_DEFAULT_REFERENCE'); ?>&nbsp;(3)</legend>
        <table class="admintable">
            <tr>
                <td width="100" valign="top" align="right" class="key">
<?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_DEFAULT_NAME'); ?>:
                </td>
                <td>
                    <input class="text_area" type="text" name="ref3_name" id="ref3_name" size="50" maxlength="250" value = "<?php if ( isset($this->application->ref3_name)) echo $this->application->ref3_name;?>" />
                </td>
            </tr>
            <tr>
                <td width="100" valign="top" align="right" class="key">
<?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_DEFAULT_ADDRESS'); ?>:
                </td>
                <td>
                    <input class="text_area" type="text" name="ref3_address" id="ref3_address" size="50" maxlength="250" value = "<?php if ( isset($this->application->ref3_address)) echo $this->application->ref3_address;?>" />
                </td>
            </tr>
            <tr>
                <td width="100" valign="top" align="right" class="key">
<?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_DEFAULT_TELEPHONE'); ?>:
                </td>
                <td>
                    <input class="text_area" type="text" name="ref3_telephone" id="ref3_telephone" size="50" maxlength="250" value = "<?php if ( isset($this->application->ref3_telephone)) echo $this->application->ref3_telephone;?>" />
                </td>
            </tr>
            <tr>
                <td width="100" valign="top" align="right" class="key">
<?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_DEFAULT_RELATIONSHIP'); ?>:
                </td>
                <td>
                    <input class="text_area" type="text" name="ref3_relationship" id="ref3_relationship" size="50" maxlength="250" value = "<?php if ( isset($this->application->ref3_relationship)) echo $this->application->ref3_relationship;?>" />
                </td>
            </tr>
            <tr>
                <td width="100" valign="top" align="right" class="key">
<?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_DEFAULT_YEARS_ACQUAINTED'); ?>:
                </td>
                <td>
                    <input class="text_area" type="text" name="ref3_years" id="ref3_years" size="50" maxlength="250" value = "<?php if ( isset($this->application->ref3_years)) echo $this->application->ref3_years;?>" />
                </td>
            </tr>
        </table>
    </fieldset><?php */?>
    <?php /*?><fieldset class="adminform">
<legend style="font-size: 10px;"><?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_DEFAULT_REFERENCE'); ?>&nbsp;(4)</legend>
        <table class="admintable">
            <tr>
                <td width="100" valign="top" align="right" class="key">
<?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_DEFAULT_NAME'); ?>:
                </td>
                <td>
                    <input class="text_area" type="text" name="ref4_name" id="ref4_name" size="50" maxlength="250" value = "<?php if ( isset($this->application->ref4_name)) echo $this->application->ref4_name;?>" />
                </td>
            </tr>
            <tr>
                <td width="100" valign="top" align="right" class="key">
<?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_DEFAULT_ADDRESS'); ?>:
                </td>
                <td>
                    <input class="text_area" type="text" name="ref4_address" id="ref4_address" size="50" maxlength="250" value = "<?php if ( isset($this->application->ref4_address)) echo $this->application->ref4_address;?>" />
                </td>
            </tr>
            <tr>
                <td width="100" valign="top" align="right" class="key">
<?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_DEFAULT_TELEPHONE'); ?>:
                </td>
                <td>
                    <input class="text_area" type="text" name="ref4_telephone" id="ref4_telephone" size="50" maxlength="250" value = "<?php if ( isset($this->application->ref4_telephone)) echo $this->application->ref4_telephone;?>" />
                </td>
            </tr>
            <tr>
                <td width="100" valign="top" align="right" class="key">
<?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_DEFAULT_RELATIONSHIP'); ?>:
                </td>
                <td>
                    <input class="text_area" type="text" name="ref4_relationship" id="ref4_relationship" size="50" maxlength="250" value = "<?php if ( isset($this->application->ref4_relationship)) echo $this->application->ref4_relationship;?>" />
                </td>
            </tr>
            <tr>
                <td width="100" valign="top" align="right" class="key">
<?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_DEFAULT_YEARS_ACQUAINTED'); ?>:
                </td>
                <td>
                    <input class="text_area" type="text" name="ref4_years" id="ref4_years" size="50" maxlength="250" value = "<?php if ( isset($this->application->ref4_years)) echo $this->application->ref4_years;?>" />
                </td>
            </tr>
        </table>
    </fieldset><?php */?>
    <?php /*?><fieldset class="adminform">
<legend><?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_DEFAULT_TEXT_RESUME'); ?></legend>
        <table class="admintable">
            <tr>
                <td class="key" colspan="2">
                    <textarea cols="100" rows="20" name="text_resume"><?php if ( isset($this->application->text_resume)) echo $this->application->text_resume;?></textarea>
                </td>
            </tr>
        </table>
    </fieldset><?php */?>

<fieldset class="adminform">

<?php if ($this->params->get('display_custom_yes_no','0') == '1') : ?>
    <legend style="font-size: 10pt;">Custom Question</legend>
    <table class="admintable">
        <tr>
            <td valign="top" width="100" align="right" class="key"></td>
            <td><?php echo $this->params->get('text_custom_yes_no',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_DEFAULT_SH_CUSTOM_YES_NO_TEXT')); ?></td>
            <td><?php echo $this->options['custom_yes_no']; ?></td>
        </tr>
    </table>
<?php endif; ?>



    <input type="hidden" name="id" value="<?php if (isset($this->application->id)) echo $this->application->id; ?>" />
    <input type="hidden" name="option" value="com_jobgrokapp" />
    <input type="hidden" id="task" name="task" value="" />
    <input type="hidden" name="uid" value="<?php if (isset($this->application->uid)) echo $this->application->uid; else echo $this->uid; ?>" />
    <input type="hidden" name="controller" value="application" />
<?php echo JHTML::_( 'form.token'); ?>			
</form>
<?php echo "<table width='100%'><tbody><tr><td style='padding-top: 11px; text-align: right; vertical-align: middle;'><a href='http://www.tk-tek.com'><img style='vertical-align: middle;' src='components/com_jobgrokapp/assets/images/tk_logo_bar_h16.png' alt='TK Tek, LLC'></a>&nbsp;<img style='vertical-align: middle;' src='components/com_jobgrokapp/assets/images/jg_application_h16.png'>&nbsp;<span style='font-size: 10px;'>JobGrok Application Version 3.1-1.2.55 | Copyright 2008 - 2014 by <a href='http://www.tk-tek.com'>TK Tek, LLC</a> | License: <a href='http://www.gnu.org/copyleft/gpl.html'>GNU General Public License</a></td></tr></tbody></table>"; ?>