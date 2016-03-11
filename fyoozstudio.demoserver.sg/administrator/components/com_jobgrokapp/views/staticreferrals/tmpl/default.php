<?php
/**
 *
 *
 * This is the default.php view layout for jobgrokapp
 *
 * Created: November 18, 2014, 3:25 am
 *
 * Subversion Details
 * $Date: 2010-04-21 22:21:56 -0500 (Wed, 21 Apr 2010) $
 * $Revision: 1798 $
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

<form action="index.php" method="post" name="adminForm" id="adminForm" >
    <div id="editcell">
        <table class='table'>
            <thead>
                <tr>
                    <th width="5"><?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_STATICREFERRALS_TMPL_DEFAULT_ID'); ?></th>
                    <th width="20"><input type="checkbox" name="checkall-toggle" value title="Check All" onclick="Joomla.checkAll(this)" /></th>
                    <th style="text-align: left;"><?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_STATICREFERRALS_TMPL_DEFAULT_REFERRAL'); ?></th>
                </tr>
            </thead>
            <?php
            $k = 0;
            for ($i=0, $n=count( $this->items ); $i < $n; $i++)
            {
                $row = $this->items[$i];
                $checked = JHTML::_( 'grid.id', $i, $row->id );
                $link = JRoute::_( 'index.php?option=com_jobgrokapp&controller=staticreferral&task=edit&cid[]='. $row->id );
                ?>
            <tr class="<?php echo "row$k"; ?>">
                <td>
                        <?php echo $row->id; ?>
                </td>
                <td>
                        <?php echo $checked; ?>
                </td>
                <td>
                        <a href="<?php echo $link; ?>"><?php echo $row->referral; ?></a>
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
    <input type="hidden" name="controller" value="staticreferral" />
    <?php echo JHTML::_( 'form.token'); ?>
</form>
<?php echo "<table width='100%'><tbody><tr><td style='padding-top: 11px; text-align: right; vertical-align: middle;'><a href='http://www.tk-tek.com'><img style='vertical-align: middle;' src='components/com_jobgrokapp/assets/images/tk_logo_bar_h16.png' alt='TK Tek, LLC'></a>&nbsp;<img style='vertical-align: middle;' src='components/com_jobgrokapp/assets/images/jg_application_h16.png'>&nbsp;<span style='font-size: 10px;'>JobGrok Application Version 3.1-1.2.55 | Copyright 2008 - 2014 by <a href='http://www.tk-tek.com'>TK Tek, LLC</a> | License: <a href='http://www.gnu.org/copyleft/gpl.html'>GNU General Public License</a></td></tr></tbody></table>"; ?>