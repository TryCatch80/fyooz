<?php

/**
 * (?=.*?\bindex\b)^(?!.*Itemid).* 
 * This is the entrance point to jobgrokapp (admin)
 *
 * Created: November 18, 2014, 3:25 am
 *
 * Subversion Details
 * $Date: 2014-10-29 22:05:32 -0500 (Wed, 29 Oct 2014) $
 * $Revision: 6486 $
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

$document = JFactory::getDocument();
$cssFile = JURI::base(true).'/components/com_jobgrokapp/assets/css/jobgrokapp.css';
$document->addStyleSheet($cssFile, 'text/css', null, array());

JHTML::addIncludePath(JPATH_COMPONENT.DIRECTORY_SEPARATOR.'helpers');

$params = JComponentHelper::getParams('com_jobgrokapp');
if ($params->get('display_errors','99') == '0') {
    ini_set('display_errors', '0');
} elseif ($params->get('display_errors','99') == '1') {
    ini_set('display_errors', '1');
} 

require_once (JPATH_COMPONENT .DIRECTORY_SEPARATOR. 'controller.php');

// sets our default controller, if none is set
if ($c = JRequest :: getCmd('controller', 'panel')) {
    $path = JPATH_COMPONENT .DIRECTORY_SEPARATOR. 'controllers' .DIRECTORY_SEPARATOR. $c . '.php';
    jimport('joomla.filesystem.file');

    if (JFile :: exists($path)) {
        // chosen controller - all the action happens here
        require_once ($path);
    }
    else {
        JError :: raiseError('500', JText::_('Unknown controller: <br>' . $c . ':' . $path));
    }
}

$task = JRequest::getCmd('task','display');
if ( $c == 'panel' || $c == 'application' || $c == 'list' ) {
    $application = 'index.php?option=com_jobgrokapp&controller=application';
    $panel = 'index.php?option=com_jobgrokapp&controller=panel';
    $list = 'index.php?option=com_jobgrokapp&controller=list';
    JSubMenuHelper::addEntry(JTEXT::_('COM_JOBGROKAPP_ADMIN_JOBGROK_COM_JOBGROK_CONTROL_PANEL'), $panel, $c=='panel');
    JSubMenuHelper::addEntry(JTEXT::_('COM_JOBGROKAPP_ADMIN_JOBGROK_APPLICATIONS'), $application, $c=='application');
    JSubMenuHelper::addEntry(JTEXT::_('COM_JOBGROKAPP_ADMIN_JOBGROK_LIST'), $list, $c=='list');
}

$c = 'JobgrokappController' . $c;
$controller = new $c();
$controller->execute($task);
$controller->redirect();
?>
