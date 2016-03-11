<?php
/**
 *
 *
 * This is the max.php view layout for jobgrokapp
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

$max_applicant_article = $this->params->get('max_applicant_article','0');
if ($max_applicant_article != '0') {
    $db = JFactory::getDBO();
    $query = "SELECT `introtext`, `fulltext` FROM #__content WHERE id=".$max_applicant_article;
    $db->setQuery($query);
    $applicant_article = $db->loadObject();
    $applicant_article->introtext = JHTML::_('content.prepare',$applicant_article->introtext);
    $applicant_article->fulltext = JHTML::_('content.prepare',$applicant_article->fulltext);
}

?>
<div class="jg_ea" style="width: 100%; text-align: center; padding-top: 10%; padding-bottom: 10%;">
    <?php if ($max_applicant_article != '0') : ?>
    <div><?php echo $applicant_article->introtext.$applicant_article->fulltext; ?></div>
    <?php endif; ?>
    <div>
        <span style="margin: 5%; font-size: 120%;"><?php echo $this->params->get('max_applicant_text',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_MAX_MAX_APPLICANT_TEXT')); ?>:</span><br/>
        <input disabled="disabled" class="input-medium search-query" style="margin-top: 5%; text-align: center;" type="text" value="" name="invite_code" id="invite_code" /><br/>
        <input disabled="disabled" class="btn btn-success" style="margin-top: 5%;" type="button" name="submit_app" onclick="document.adminForm.submit();" value="Submit">
    </div>
</div>