<?php
/**
 *
 *
 * This is the view.html.php file for jobgroklist
 *
 * Created: November 11, 2014, 3:25 pm
 *
 * Subversion Details
 * $Date: 2014-05-04 20:12:43 -0500 (Sun, 04 May 2014) $
 * $Revision: 6050 $
 * $Author: bobsteen $
 *
 * @author TK Tek, LLC. info@jobgrok.com
 * @version 3.1-1.2.58
 * @package com_jobgroklist
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

/*jimport('joomla.application.component.view');
jimport('joomla.application.component.helper');
jimport('joomla.html.parameter');
/**
 *
 * Job Type View
 *
 */
class JobgroklistViewJobdetail extends JViewLegacy
{

    function display($tpl = null)
    {
        global $mainframe;
		$id = str_replace("/fyooz/jobdetail/","",$_SERVER['REQUEST_URI']);
        
        if (JRequest::getInt('Itemid','0') != '0')
        {
            $db = JFactory::getDBO();

			$query1 = "SELECT 
					`T1`.`id`,
					`T1`.`department_id`,
					`T1`.`job_description`,
					`T3`.`department`,
					`T1`.`position`,
					`T4`.`location`
				FROM 
					`#__tst_jglist_jobs` AS `T1`
					LEFT JOIN `#__tst_jglist_departments` AS `T3` ON `T3`.`id` = `T1`.`department_id`
					LEFT JOIN `#__tst_jglist_locations` AS `T4` ON `T4`.`id` = `T1`.`location_id`
					where `T1`.`id` = '".$id."'";
			$db->setQuery($query1);
			$results1 = $db->loadObject();

            $this->assignRef('jobdetail',$results1);
        }

        parent :: display($tpl);
    }
}
?>
