<?php
/**
 *
 *
 * This is the denied.php view layout for jobgrokapp
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
<div class="jg_ea" style="width: 100%; text-align: center; padding-top: 10%; padding-bottom: 10%;">
    <div id="not_registered">
<?php
    echo '<div>';
    $use_link =$this->params->get('registration_link','0');
    $menu_item = $this->params->get('registration_menu','');
    $link_text = $this->params->get('registration_text',JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_TMPL_DENIED_MUST_BE_A_REGISTERED_JOBSEEKER_TO_APPLY'));
    if ($menu_item == '' || $use_link == '0') {
        $registration_notice = $link_text;
    } else {
        $link = JRoute::_('index.php?Itemid='.$menu_item);
        $registration_notice = "<a href='".$link."'>".$link_text."</a>";
    }
    echo '<em>'.$registration_notice.'</em>';
    echo '</div>';
?>
    </div>
</div>