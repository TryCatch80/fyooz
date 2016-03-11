<?php
/**
 *
 *
 * This is the view.raw.php file for jobgrokapp
 *
 * Created: November 18, 2014, 3:25 am
 *
 * Subversion Details
 * $Date: 2013-05-12 19:43:27 -0500 (Sun, 12 May 2013) $
 * $Revision: 5089 $
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

        $uid = JRequest::getVar('uid',0);
        $id = JRequest::getVar('id',0);

        $posting_id = $this->get('PostingId');
        $this->assignRef('posting_id',$posting_id);

        $db = JFactory::getDBO();
        if ($id == 0) {
            $query = "SELECT * FROM #__tst_jgapp_uploads WHERE uid='$uid'";
        } else {
            $query = "SELECT * FROM #__tst_jgapp_uploads WHERE uid='$uid' AND id=$id";
        }
        $db->setQuery($query);
        $row = $db->loadObject();

        $params = JComponentHelper::getParams('com_jobgrokapp');
        $db = JFactory::getDBO();
        if (isset($application->Itemid) && $application->Itemid !='')
        {
            $query = "SELECT params FROM #__menu WHERE id=".$application->Itemid;
        }
        else
        {
            $query = "SELECT params FROM #__extensions WHERE `name`='com_jobgrokapp';";
        }
        $db->setQuery($query);
        $menuparams = new JRegistry($db->loadResult());
        $params->merge($menuparams);
        $this->assignRef('params',$params);

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