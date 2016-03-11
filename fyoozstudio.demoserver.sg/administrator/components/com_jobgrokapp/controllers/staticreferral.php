<?php

/**
 *
 *
 * This is the staticreferral.php controller for jobgrokapp
 *
 * Created: November 18, 2014, 3:25 am
 *
 * Subversion Details
 * $Date: 2010-04-16 19:42:38 -0500 (Fri, 16 Apr 2010) $
 * $Revision: 1784 $
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

class JobgrokappControllerStaticReferral extends JControllerLegacy

{
	/*
	 * constructor (registers additional tasks to methods)
	 */
    function __construct()
    {
        parent :: __construct();

        // Register Extra tasks
        $this->registerTask('add', 'edit');
    }

	/*
	 * display the edit form
	 */
    function edit()
    {
		/*
		 * Set up the desired variables for editing a job type
		 */
        JRequest :: setVar('view', 'staticreferral');
        JRequest :: setVar('layout', 'default');
        JRequest :: setVar('hidemainmenu', 1);
		/*
		 * Display based on the set variables
		 */
        parent :: display();
    }

	/*
	 * remove record(s)
	 */
    function remove()
    {
        JRequest::checkToken() or die( 'Invalid Token');
        $model = $this->getModel('staticreferral');
        if (!$model->delete())
        {
            $msg = JTEXT::_('COM_JOBGROKAPP_CONTROLLERS_STATICREFERRAL_REFERRAL_REMOVE_ERROR');
        }
        else
        {
            $msg = JTEXT::_('COM_JOBGROKAPP_CONTROLLERS_STATICREFERRAL_REFERRAL_REMOVE_SUCCESS');
        }

        $this->setRedirect('index.php?option=com_jobgrokapp&controller=staticreferral', $msg);
    }

	/*
	 * cancel editing a record
	 */
    function cancel()
    {
        $msg = JTEXT::_('COM_JOBGROKAPP_CONTROLLERS_STATICREFERRAL_REFERRAL_CANCEL');
        $this->setRedirect('index.php?option=com_jobgrokapp&controller=staticreferral', $msg);
    }

    function copy()
    {
        JRequest::checkToken() or die( 'Invalid Token');
        // copy the selected record
        $model = $this->getModel('staticreferral');
        if (!$model->copy())
        {
            $msg = JTEXT::_('COM_JOBGROKAPP_CONTROLLERS_STATICREFERRAL_REFERRAL_COPY_ERROR');
        }
        else
        {
            $msg = JTEXT::_('COM_JOBGROKAPP_CONTROLLERS_STATICREFERRAL_REFERRAL_COPY_SUCCESS');
        }
        $this->setRedirect('index.php?option=com_jobgrokapp&controller=staticreferral', $msg);
    }


	/*
	 * save a record (and redirect to main page)
	 */
    function save()
    {
        JRequest::checkToken() or die( 'Invalid Token');
        $model = $this->getModel('Staticreferral');

        if ($model->store())
        {
            $msg = JTEXT::_('COM_JOBGROKAPP_CONTROLLERS_STATICREFERRAL_REFERRAL_SAVED_SUCCESS');
        }
        else
        {
            $msg = JTEXT::_('COM_JOBGROKAPP_CONTROLLERS_STATICREFERRAL_REFERRAL_SAVED_ERROR');
        }

        $link = 'index.php?option=com_jobgrokapp&controller=staticreferral';
        $this->setRedirect($link, $msg);
    }

	/* 
	 * Display 
	 */
    function display($cachable = false, $urlparams = false)
    {
        $document = JFactory :: getDocument();
        $viewName = JRequest :: getVar('view', 'staticreferrals');
        $viewType = $document->getType();
        $view = $this->getView($viewName, $viewType);
        $model = $this->getModel('staticreferral', 'JobgrokappModel');
        if (!JError :: isError($model))
        {
            $view->setModel($model, true);
        }
        $view->setLayout('default');
        $view->display();
    }

}
?>
