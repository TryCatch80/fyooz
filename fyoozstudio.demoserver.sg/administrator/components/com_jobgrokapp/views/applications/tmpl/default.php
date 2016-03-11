<?php
/**
 *
 *
 * This is the default.php view layout for jobgrokapp
 *
 * Created: November 18, 2014, 3:25 am
 *
 * Subversion Details
 * $Date: 2014-04-29 20:37:31 -0500 (Tue, 29 Apr 2014) $
 * $Revision: 6012 $
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

?>
<script language="javascript" type="text/javascript">

    function tableOrdering( order, dir, task )
    {
        var form = document.adminForm;

        form.filter_applications_order.value    = order;
        form.filter_applications_order_Dir.value   = dir;
        document.adminForm.submit( task );
    }
</script>
<div id="editcell">
    <form action="index.php" method="post" name="adminForm" id="adminForm">
    <table class='table'>  
            <thead>
                <tr>
                    <th width="5"><?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATIONS_TMPL_DEFAULT_ID'); ?></th>
                    <th width="20">
                        <input type="checkbox" name="checkall-toggle" value title="Check All" onclick="Joomla.checkAll(this)" />
                    </th>
                    <th class="title"><?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATIONS_TMPL_DEFAULT_NAME'); ?></th>
                    <th><?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATIONS_TMPL_DEFAULT_PHONE'); ?></th>
                    <th><?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATIONS_TMPL_DEFAULT_EMAIL'); ?></th>
                    <th><?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATIONS_TMPL_DEFAULT_APPLIED_ON'); ?></th>
                    <th><?php //echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATIONS_TMPL_DEFAULT_HIRE_DATE'); ?></th>
                    <th><?php //echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATIONS_TMPL_DEFAULT_SERVICE_DATE'); ?></th>
                    <th><?php //echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATIONS_TMPL_DEFAULT_TERMED_ON'); ?></th>
                </tr>
            </thead>
            <?php
            jimport('joomla.filter.output');
            $k = 0;
            for ($i=0, $n=count( $this->items ); $i < $n; $i++)
            {
                $row = $this->items[$i]; $user_name = '';
                $checked = JHTML::_('grid.id', $i, $row->id);
                $link = JFilterOutput::ampReplace('index.php?option=com_jobgrokapp&controller=application&task=edit&cid[]='.$row->id);               
                if (isset($row->user_id)) {
                    $db = JFactory::getDBO();
                    $query = "SELECT name, username FROM #__users WHERE id=".$row->user_id;
                    $db->setQuery($query);
                    if ($result = $db->loadObject()) {
                        $user_name = $result->name;
                        $user_link = '<a href="'.JFilterOutput::ampReplace('index.php?option=com_users&view=user&layout=edit&id='.
                                    $row->user_id).'" title="'.$result->username.'">'.$result->name.'</a>';
                    } else {
                        $user_link = "N/A";
                    }
                } else {
                    $user_link="N/A";
                }
                ?>
            <tr valign="top" class="<?php echo "row$k"; ?>">
                <td><?php echo $row->id; ?></td>
                <td>
                        <?php echo $checked; ?>
                </td>
                <td>
                    <a href="<?php echo $link; ?>">
                        <?php 
                            $parentName = '';
                            if ($row->parent_id != 0) { $parentName = JHTML::_('jobgrokapp.parent_name',$row->parent_id); }
                        
                            if ($row->last_name == '' || $row->first_name == '') $comma = ""; else $comma = ", ";
                            if ($row->last_name == '' && $row->first_name == '') {
                                if ($user_name != '') echo $user_name;
                                if ($parentName != '') echo '<br/><span style="color:silver; font-style: italic">Parent Applicant Name: '.$parentName.'</span>';
                            } else {
                                echo $row->last_name.$comma.$row->first_name." ".$row->middle_name; 
                            }
                        ?></a>
                </td>
                <td>
                        <?php
                        if (!""==$row->home_phone) echo $row->home_phone."<br>";
                        if (!""==$row->work_phone) echo $row->work_phone;
                        ?>
                </td>
                <td>
                    <a href="mailto:<?php echo $row->email_address; ?>">
                        <?php echo $row->email_address; ?></a>
                </td>
                <td>
                        <?php echo $row->create_date; ?>
                </td>
                <?php /*?><td style="text-align: center;">
                        <?php if ( '0000-00-00 00:00:00' == $row->hire_date || !isset($row->hire_date) ) echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATIONS_TMPL_DEFAULT_NA'); else echo substr($row->hire_date,0,10); ?>
                </td>
                <td style="text-align: center;">
                        <?php if ( '0000-00-00 00:00:00' == $row->service_date || !isset($row->service_date) )echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATIONS_TMPL_DEFAULT_NA'); else echo  substr($row->service_date,0,10); ?>
                </td>
                <td style="text-align: center;">
                        <?php if ( '0000-00-00 00:00:00' == $row->termination_date || !isset($row->termination_date) ) echo JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATIONS_TMPL_DEFAULT_NA'); else echo substr($row->termination_date,0,10); ?>
                </td><?php */?>
            </tr>
                <?php
                $k = 1 - $k;
            }
            ?>
            <tr>
                <td colspan="9" style="text-align: center;">
                    <?php echo $this->pagination->getListFooter(); ?>
                </td>
            </tr>
        </table>
<input type="hidden" name="option" value="com_jobgrokapp" />
<input type="hidden" name="task" value="" />
<input type="hidden" name="controller" value="application"/>
<input type="hidden" name="boxchecked" value="0" />
<?php echo JHTML::_( 'form.token'); ?>
</form>
</div>
<?php echo "<table width='100%'><tbody><tr><td style='padding-top: 11px; text-align: right; vertical-align: middle;'><a href='http://www.tk-tek.com'><img style='vertical-align: middle;' src='components/com_jobgrokapp/assets/images/tk_logo_bar_h16.png' alt='TK Tek, LLC'></a>&nbsp;<img style='vertical-align: middle;' src='components/com_jobgrokapp/assets/images/jg_application_h16.png'>&nbsp;<span style='font-size: 10px;'>JobGrok Application Version 3.1-1.2.55 | Copyright 2008 - 2014 by <a href='http://www.tk-tek.com'>TK Tek, LLC</a> | License: <a href='http://www.gnu.org/copyleft/gpl.html'>GNU General Public License</a></td></tr></tbody></table>"; ?>