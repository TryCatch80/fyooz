<?php
/**
 *
 *
 * This is the panel.php controller for jobgrokapp
 *
 * Created: November 18, 2014, 3:25 am
 *
 * Subversion Details
 * $Date: 2014-04-21 21:56:52 -0500 (Mon, 21 Apr 2014) $
 * $Revision: 6000 $
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
jimport('joomla.application.component.model');
jimport('joomla.database.database.mysqlexporter');

// model class for application on admin site
class JobgrokappModelPanel extends JModelLegacy {

    function getNews() {
        $news = (int)JRequest::getVar('news','0');
        
        $db = JFactory::getDBO();
        $query = "SELECT `value` FROM #__tst_jgapp_values WHERE `variable`='news';";
        $db->setQuery($query);     
        $result = $db->loadResult();
        
        if ($news === 1) {
            $result = ($result=='0'?'1':'0');
            $this->setNews($result);
        }
        
        return ($result=='1'?true:false);
    }
    
    function setNews($value) {
        $db = JFactory::getDBO();
        $query = "UPDATE `#__tst_jgapp_values` SET `value`= '".$value."' WHERE `variable`='news';";
        $db->setQuery($query);
        $db->Query();      
    }
    
}
