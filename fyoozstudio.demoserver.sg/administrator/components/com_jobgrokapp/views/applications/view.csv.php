<?php
/**
 *
 *
 * This is the view.csv.php file for jobgrokapp
 *
 * Created: November 18, 2014, 3:25 am
 *
 * Subversion Details
 * $Date: 2010-04-04 11:00:32 -0500 (Sun, 04 Apr 2010) $
 * $Revision: 1723 $
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

jimport('joomla.application.component.view');

// this is our view class for all applications
class JobgrokappViewApplications extends JViewLegacy
{
	// display method
	function display($tpl = null)
	{
            global $option;
		$mainframe = JFactory::getApplication();

            $items = $this->get('Data');
            $this->assignRef('items', $items);

            $db = JFactory::getDBO();
            $prefix = $db->getPrefix();
            $table = $prefix.'tst_jgapp_applications';
            $result = $db->getTableColumns($table);

            $out = '';
            foreach ($result as $field=>$type)
            {
                $out .= '"'.$field.'",';
            }
            $out = substr($out,0,-1);

            $out .= "\n";
            foreach ($items as $item)
            {
                $line = '';
                foreach ($result as $field=>$type)
                {
                    $item->$field = str_replace('"','""', $item->$field);
                    if (isset($type))
                    {
                        if ($type == 'varchar' || $type == 'text')
                            $line .= '"'.$item->$field.'",';
                        else
                            $line .= $item->$field.",";
                    }
                    else
                        $line .= ",";
                }
                $line = substr($line,0,-1);
                $line = str_replace("\n",'',$line);
                $line = str_replace("\r",'',$line);
                $out .= $line."\n";
            }

            $document = JFactory::getDocument();

            JResponse::setHeader('Content-Disposition','attachment; filename="export.csv"',true);
            $document->setMimeEncoding('text/csv');
            $document->setType('text/csv');
            $document->setLink('export.csv');

            echo $out;
	}
}
?>
