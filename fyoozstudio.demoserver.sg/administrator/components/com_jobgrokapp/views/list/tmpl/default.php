<?php
/**
 *
 *
 * This is the default.php view layout for jobgrokapp
 *
 * Created: November 18, 2014, 3:25 am
 *
 * Subversion Details
 * $Date: 2012-08-14 20:50:52 -0500 (Tue, 14 Aug 2012) $
 * $Revision: 4276 $
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

defined('_JEXEC') or die('Restricted access'); ?>

<?php
if (isset($this->lists['link']))
    echo "<html><head></head>".$this->lists['link']."<body>";

if (isset($this->lists['css']))
    echo "<style>".$this->lists['css']."</style>";
?>

<form action="index.php" method="post" name="adminForm" id="adminForm" >
    <div class="col100">
        <fieldset class="adminform">
            <legend><?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_LIST_TMPL_DEFAULT_DETAILS'); ?></legend>
            <table class="admintable">

                <tr>
                    <td width="100" align="right" class="key">
                        <label for="list">
                            <?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_LIST_TMPL_DEFAULT_LIST'); ?>:
                        </label>
                    </td>
                    <td>
                        <input class="text_area" type="text" name="list" id="list" size="32" maxlength="250" value="<?php if (isset($this->list->list)) echo $this->list->list;?>" />
                    </td>
                </tr>
                <tr>
                    <td width="100" valign="top" align="right" class="key">
                        <label for="description">
                            <?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_LIST_TMPL_DEFAULT_LIST_DESCRIPTION'); ?>:
                        </label>
                    </td>
                    <td>
                        <textarea class="text_area" type="text" name="description" id="description" cols="50" rows="5"><?php if (isset($this->list->description)) echo $this->list->description;?></textarea>
                    </td>
                </tr>
                <tr>
                    <td width="100" valign="top" align="right" class="key">
                        <label for="list_text">
                            <?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_LIST_TMPL_DEFAULT_LIST_TEXT'); ?>:
                        </label>
                    </td>
                    <td>
                        <?php 
                        $value = ""; $result = null;
                        if (isset($this->list->list_text)) {
                            $v = json_decode($this->list->list_text, true);
                            foreach ($v as $vv) { $result[] = trim($vv,'"'); }
                            $value = implode(", ", $result);
                        } 
                        ?>
                        <textarea class="text_area" type="text" name="list_text" id="list_text" cols="50" rows="5"><?php echo $value; ?></textarea>
                    </td>
                </tr>
                <tr>
                    <td width="100" valign="top" align="right" class="key">
                        <label for="tags">
                            <?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_LIST_TMPL_DEFAULT_TAGS'); ?>:
                        </label>
                    </td>
                    <td>
                        <?php 
                        $value = ""; $result = null;
                        if (isset($this->list->tags)) {
                            $v = json_decode($this->list->tags, true);
                            foreach ($v as $vv) { $result[] = trim($vv,'"'); }
                            $value = implode(", ", $result);
                        } 
                        ?>
                        <textarea class="text_area" type="text" name="tags" id="tags" cols="50" rows="5"><?php echo $value; ?></textarea>
                    </td>
                </tr>
                <tr>
                    <td colspan="2"><em><?php echo JTEXT::_('COM_JOBGROKAPP_VIEWS_LIST_TMPL_DEFAULT_LIST_TAG_INSTRUCTIONS'); ?></em></td>
                </tr>
            </table>
        </fieldset>
    </div>

    <div class="clr"></div>

    <?php
    echo (isset($this->lists['submit'])?$this->lists['submit']:'');
    echo (isset($this->lists['format'])?$this->lists['format']:'');
    echo (isset($this->lists['view'])?$this->lists['view']:'');
    ?>

    <input type="hidden" name="option" value="com_jobgrokapp" />
    <input type="hidden" name="id" value="<?php if ( isset($this->list->id)) echo $this->list->id; ?>" />
    <input type="hidden" name="task" value="<?php echo (isset($this->lists['submit'])?'save':''); ?>" />
    <input type="hidden" name="controller" value="list" />
    <?php echo JHTML::_( 'form.token'); ?>
</form>
<?php echo "<table width='100%'><tbody><tr><td style='padding-top: 11px; text-align: right; vertical-align: middle;'><a href='http://www.tk-tek.com'><img style='vertical-align: middle;' src='components/com_jobgrokapp/assets/images/tk_logo_bar_h16.png' alt='TK Tek, LLC'></a>&nbsp;<img style='vertical-align: middle;' src='components/com_jobgrokapp/assets/images/jg_application_h16.png'>&nbsp;<span style='font-size: 10px;'>JobGrok Application Version 3.1-1.2.55 | Copyright 2008 - 2014 by <a href='http://www.tk-tek.com'>TK Tek, LLC</a> | License: <a href='http://www.gnu.org/copyleft/gpl.html'>GNU General Public License</a></td></tr></tbody></table>"; ?>
<?php
if (isset($this->lists['css']))
    echo "</body></html>";
?> 
