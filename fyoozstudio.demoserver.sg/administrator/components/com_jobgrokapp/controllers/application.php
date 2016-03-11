<?php

/**
 *
 *
 * This is the application.php controller for jobgrokapp
 *
 * Created: November 18, 2014, 3:25 am
 *
 * Subversion Details
 * $Date: 2014-01-06 19:52:05 -0600 (Mon, 06 Jan 2014) $
 * $Revision: 5719 $
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
jimport('joomla.application.component.controller');

class JobgrokappControllerApplication extends JControllerLegacy

{

    public function __construct($config = array())
    {
        parent::__construct($config);
        // This conditional lets the ACL check run only on Joomla! 1.6+

        // Register Extra tasks
        $this->registerTask('add', 'edit');
    }

    function edit()
    {
        if( version_compare( JVERSION, '1.6.0', 'ge') ) {
            $user = JFactory::getUser();
            if (!$user->authorise('core.edit', 'com_jobgrokapp')) {
                return JError::raiseWarning(403, JTEXT::_('COM_JOBGROKAPP_CONTROLLERS_APPLICATION_JERROR_ALERTNOAUTHOR'));
            }
            if (!$user->authorise('core.create', 'com_jobgrokapp')) {
                return JError::raiseWarning(403, JTEXT::_('COM_JOBGROKAPP_CONTROLLERS_APPLICATION_JERROR_ALERTNOAUTHOR'));
            }
        }
    // Set up the desired variables for editing a category
        JRequest :: setVar('view', 'application');
        JRequest :: setVar('layout', 'default');
        JRequest :: setVar('hidemainmenu', 1);
        // Display based on the set variables
        parent :: display();
    }
    function import()
    {
        if( version_compare( JVERSION, '1.6.0', 'ge') ) {
            $user = JFactory::getUser();
            if (!$user->authorise('core.manage', 'com_jobgrokapp')) {
                return JError::raiseWarning(403, JTEXT::_('COM_JOBGROKAPP_CONTROLLERS_APPLICATION_JERROR_ALERTNOAUTHOR'));
            }
        }
        $model = $this->getModel('application');
        if ( !$model->import())
        {
            $msg = JTEXT::_('COM_JOBGROKAPP_CONTROLLERS_APPLICATION_ERROR_COULD_NOT_IMPORT_FROM_PRIOR_VERSION');
        }
        else
        {
            $msg = JTEXT::_('COM_JOBGROKAPP_CONTROLLERS_APPLICATION_IMPORTED_DATA_FROM_PRIOR_VERSION');
        }
        $this->setRedirect('index.php?option=com_jobgrokapp&controller=application',$msg);
    }
    function remove()
    {
        if( version_compare( JVERSION, '1.6.0', 'ge') ) {
            $user = JFactory::getUser();
            if (!$user->authorise('core.delete', 'com_jobgrokapp')) {
                return JError::raiseWarning(403, JTEXT::_('COM_JOBGROKAPP_CONTROLLERS_APPLICATION_JERROR_ALERTNOAUTHOR'));
            }
        }
        JRequest::checkToken() or die( 'Invalid Token');
        $model = $this->getModel('application');
        if (!$model->delete())
        {
            $msg = JTEXT::_('COM_JOBGROKAPP_CONTROLLERS_APPLICATION_ERROR_COULD_NOT_DELETE');
        }
        else
        {
            $msg = JTEXT::_('COM_JOBGROKAPP_CONTROLLERS_APPLICATION_EMPLOYMENT_APP_DELETED');
        }

        $this->setRedirect('index.php?option=com_jobgrokapp&controller=application', $msg);
    }

    function cancel()
    {
        $msg = JTEXT::_('COM_JOBGROKAPP_CONTROLLERS_APPLICATION_OPERATION_CANCELLED');
        $this->setRedirect('index.php?option=com_jobgrokapp&controller=application', $msg);
    }
    function save()
    {
        if( version_compare( JVERSION, '1.6.0', 'ge') ) {
            $user = JFactory::getUser();
            if (!$user->authorise('core.edit', 'com_jobgrokapp')) {
                return JError::raiseWarning(403, JTEXT::_('COM_JOBGROKAPP_CONTROLLERS_APPLICATION_JERROR_ALERTNOAUTHOR'));
            }
            if (!$user->authorise('core.create', 'com_jobgrokapp')) {
                return JError::raiseWarning(403, JTEXT::_('COM_JOBGROKAPP_CONTROLLERS_APPLICATION_JERROR_ALERTNOAUTHOR'));
            }
        }
        JRequest::checkToken() or die( 'Invalid Token');
        $model = $this->getModel('application');

        if ($model->store())
        {
            $msg = JTEXT::_('COM_JOBGROKAPP_CONTROLLERS_APPLICATION_EMPLOYMENT_APP_SAVED');
            $msg_type = "message";
        }
        else
        {
            $msg = JTEXT::_('COM_JOBGROKAPP_CONTROLLERS_APPLICATION_ERROR_SAVING_EMPLOYMENT_APP');
            foreach($model->getErrors() as $err)
            {
                $msg = $msg . "<br /><span style='padding-left: 30px;'>" . $err . "</span>";
            }
            $msg_type = "error";
        }

        $link = 'index.php?option=com_jobgrokapp&controller=application';
        $this->setRedirect($link, $msg, $msg_type);
    }

    function display($cachable = false, $urlparams = false)
    {
        if( version_compare( JVERSION, '1.6.0', 'ge') ) {
            $user = JFactory::getUser();
            if (!$user->authorise('core.manage', 'com_jobgrokapp')) {
                return JError::raiseWarning(403, JTEXT::_('COM_JOBGROKAPP_CONTROLLERS_APPLICATION_JERROR_ALERTNOAUTHOR'));
            }
        }
        $document = JFactory :: getDocument();
        $viewName = JRequest :: getVar('view', 'applications');
        $viewType = $document->getType();
        $view = $this->getView($viewName, $viewType);
        $model = $this->getModel('application', 'JobgrokappModel');
        if (!JError :: isError($model))
        {
            $view->setModel($model, true);
        }
        $layoutName = JRequest :: getVar('layout','default');
        $view->setLayout($layoutName);
        $view->display();
    }

}
?>
