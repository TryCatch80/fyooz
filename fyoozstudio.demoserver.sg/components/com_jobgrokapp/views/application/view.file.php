<?php
/**
 *
 *
 * This is the view.file.php file for jobgrokapp
 *
 * Created: November 18, 2014, 3:25 am
 *
 * Subversion Details
 * $Date: 2009-10-05 23:05:13 -0500 (Mon, 05 Oct 2009) $
 * $Revision: 553 $
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

/**
 *
 * Posting View
 *
 */
class JobgrokappViewApplication extends JViewLegacy

{
/**
 *
 * Renders the View
 *
 */
    function display($tpl = null)
    {
        $document = JFactory::getDocument();

        $uid = JRequest::getVar('uid',0,'GET','ALNUM');

        $db = JFactory::getDBO();
        $query = "SELECT * FROM #__tst_jgapp_uploads WHERE uid='$uid'";
        $db->setQuery($query);
        $row = $db->loadObject();

        if ( !$row->uid == '')
        {
            JResponse::setHeader('Content-Disposition','attachment; filename="'.$row->name.'"',true);
            $document->setMimeEncoding($row->type);
            $document->setType($row->type);
            $document->setLink($row->name);
            echo $row->content;
        }
        else
        {
            $document->setMimeEncoding('text/html');
            echo "File not found!";
        }

    }
}
?>