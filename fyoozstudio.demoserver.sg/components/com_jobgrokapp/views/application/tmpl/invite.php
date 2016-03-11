<?php
/**
 *
 *
 * This is the invite.php view layout for jobgrokapp
 *
 * Created: November 18, 2014, 3:25 am
 *
 * Subversion Details
 * $Date: 2013-03-27 20:49:26 -0500 (Wed, 27 Mar 2013) $
 * $Revision: 4883 $
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
<div class="jg_ea" style="width: 100%; text-align: center;">
<form style="padding-top: 5%; padding-bottom: 15%; padding-left: 15%; padding-right: 15%;" action="index.php?option=com_jobgrokapp" method="post" name="adminForm" id="adminForm" >
    <div>
        <span style="margin: 5%; font-size: 120%;"><?php echo $this->params->get('invite_code_text',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_INVITE_ENTER_INVITE_CODE')); ?>:</span><br/>
        <input class="input-medium search-query" style="margin-top: 5%; text-align: center;" type="text" value="" name="invite_code" id="invite_code" /><br/>
        <input class="btn btn-success" style="margin-top: 5%;" type="button" name="submit_app" onclick="document.adminForm.submit();" value="Submit">
    </div>
<input type="hidden" name="controller" value="application" />
<input type="hidden" name="view" value="application" />
<input type="hidden" name="layout" value="<?php echo JRequest::getVar('layout'); ?>" />
<input type="hidden" name="Itemid" value="<?php echo JRequest::getVar('Itemid'); ?>" />
<input type="hidden" value="<?php echo $this->posting_id; ?>" name="posting_id" id="posting_id" />
<?php echo JHTML::_( 'form.token'); ?>
</form></div>