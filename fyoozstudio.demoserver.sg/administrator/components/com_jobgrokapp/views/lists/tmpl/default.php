<?php
/**
 *
 *
 * This is the default.php view layout for jobgrokapp
 *
 * Created: November 18, 2014, 3:25 am
 *
 * Subversion Details
 * $Date: 2013-11-17 13:48:40 -0600 (Sun, 17 Nov 2013) $
 * $Revision: 5598 $
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
<script language="javascript" type="text/javascript">

    function tableOrdering( order, dir, task )
    {
        var form = document.adminForm;

        form.filter_lists_order.value    = order;
        form.filter_lists_order_Dir.value   = dir;
        document.adminForm.submit( task );
    }
</script>
<form action="index.php" method="post" name="adminForm" id="adminForm" >
    <div id="editcell">
        <table class='table'>
            <thead>
                <tr>
                    <th width="20"><input type="checkbox" name="checkall-toggle" value title="Check All" onclick="Joomla.checkAll(this)" /></th>
                    <th width="5"><?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_LISTS_TMPL_DEFAULT_ID'); ?></th>
                    <th style="text-align: left;"><?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_LISTS_TMPL_DEFAULT_LIST'); ?></th>
                </tr>
            </thead>
            <?php
            $k = 0;
            for ($i=0, $n=count( $this->items ); $i < $n; $i++)
            {
                $row = $this->items[$i];
                $checked = JHTML::_( 'grid.id', $i, $row->id );
                $link = JRoute::_( 'index.php?option=com_jobgrokapp&controller=list&task=edit&cid[]='. $row->id );
                ?>
            <tr class="<?php echo "row$k"; ?>">
                <td>
                        <?php echo $checked; ?>
                </td>
                <td>
                        <?php echo $row->id; ?>
                </td>
                <td>
                    <a href="<?php echo $link; ?>"><?php echo $row->list; ?></a>
                </td>
            </tr>
                <?php
                $k = 1 - $k;
            }
            ?>
            <tr>
                <td colspan="3" style="text-align: center;">
                    <?php echo $this->pagination->getListFooter(); ?>
                </td>
            </tr>
        </table>
    </div>
    <input type="hidden" name="option" value="com_jobgrokapp" />
    <input type="hidden" name="task" value="" />
    <input type="hidden" name="boxchecked" value="0" />
    <input type="hidden" name="controller" value="list" />
    <?php echo JHTML::_( 'form.token'); ?>
</form>
<?php echo "<table width='100%'><tbody><tr><td style='padding-top: 11px; text-align: right; vertical-align: middle;'><a href='http://www.tk-tek.com'><img style='vertical-align: middle;' src='components/com_jobgrokapp/assets/images/tk_logo_bar_h16.png' alt='TK Tek, LLC'></a>&nbsp;<img style='vertical-align: middle;' src='components/com_jobgrokapp/assets/images/jg_application_h16.png'>&nbsp;<span style='font-size: 10px;'>JobGrok Application Version 3.1-1.2.55 | Copyright 2008 - 2014 by <a href='http://www.tk-tek.com'>TK Tek, LLC</a> | License: <a href='http://www.gnu.org/copyleft/gpl.html'>GNU General Public License</a></td></tr></tbody></table>"; ?>