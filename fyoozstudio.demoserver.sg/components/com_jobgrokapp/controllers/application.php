<?php
	
/**
 *
 *
 * This is the application.php controller for jobgrokapp
 *
 * Created: November 18, 2014, 3:25 am
 *
 * Subversion Details
 * $Date: 2014-05-06 20:16:51 -0500 (Tue, 06 May 2014) $
 * $Revision: 6056 $
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

jimport('joomla.application.component.controller');
jimport('joomla.application.component.helper');

// this is our controller class for the front end of our application component
class JobgrokappControllerApplication extends JControllerLegacy {
// just our constructor here, move along...

    function __construct() {
		
        parent :: __construct();
    }


    // saving a record and redirecting somewhere...
    function save() {
		
		
	
        JRequest::checkToken() or die('Invalid Token');
		 $app = JFactory::getApplication();
		 $session = JFactory::getSession();
		//$captcha = $session->get('captcha',null,'application');
		

        $model = $this->getModel('Application');
        $session = JFactory::getSession();
	
								
        $uid = JRequest::getString('uid', 'none');
        $params = JComponentHelper::getParams('com_jobgrokapp');
        $menuitemid = JRequest::getInt('Itemid');
        if ($menuitemid) {
            $menu = $app->getMenu();
            $menuparams = $menu->getParams($menuitemid);
            $params->merge($menuparams);
        }

        $thankyou = JRequest::getInt('thankyou');
        $Itemid = JRequest::getInt('Itemid');
        $layoutName = JRequest::getVar('layout');
        $viewName = JRequest::getVar('view');
        $task = JRequest::getCmd('task');
        $source = JRequest::getVar('source');
        $user = JFactory::getUser();
	 	
        $model->setParams($params);
	
        if ($model->store()) {
            $msg = JTEXT::_('COM_JOBGROKAPP_CONTROLLERS_APPLICATION_EMPLOYMENT_APP_SAVED');
            $link = JRoute::_('index.php?option=com_jobgrokapp&view=application&layout=static&uid=' . $uid . '&Itemid=' . $Itemid . '&thankyou=' . $thankyou, false);
            if ($model->getCustomRedirect() != '' && $params->get('eeo', '0') == '0')
                $link = $model->getCustomRedirect();
            if ($params->get('display_app_saved_message','1') == '1') 
                $this->setRedirect($link,$msg);
            else
                $this->setRedirect($link);
        }
        else {
			
			
             $notices = $model->getNotices();
			
			$msg = '';
            if (count($notices) < 1) {
                $msg = JTEXT::_('COM_JOBGROKAPP_CONTROLLERS_APPLICATION_ERROR_SAVING_EMPLOYMENT_APP');
            } else {
                //$msg = JTEXT::_('COM_JOBGROKAPP_CONTROLLERS_APPLICATION_MISSING_FIELDS');
                foreach ($notices as $notice) {
                    $msg .=  $notice;
                }
				
				$session = JFactory::getSession();
				$session->set('enq_error',1);
				$session->set('enq_msg',$msg);
				
				$link=$model->getCustomRedirect();
				$this->setRedirect($link, $msg, 'error');
			 }
            // $link = JRoute::_('index.php?option=com_jobgrokapp&view=application&layout='.$layout.'&uid='.$uid.'&Itemid='.$Itemid.'&thankyou='.$thankyou,false);
            // index.php?option=com_jobgrokboard&controller=jobseeker&source=profiles&view=application&Itemid=33
            $link = JRoute::_('index.php?option=com_jobgrokapp&view=application&layout=' . $source . '&Itemid=' . $Itemid . '&thankyou=' . $thankyou, false);
            if ( JRequest::getVar('invite_code','') != '') $link = $link."&invite_code=".JRequest::getVar('invite_code');
           
		   	 //$this->setRedirect($link, $msg, 'error');
        }
    }

    // displaying our view(s)
    function display($cachable = false, $urlparams = false) {

	
        $app = JFactory::getApplication();
        $params = $app->getPageParameters();

        $document = JFactory :: getDocument();
        $viewName = JRequest :: getVar('view', 'application');
        $viewType = $document->getType();
        $model = $this->getModel('application', 'JobgrokappModel');
		
        $view = $this->getView($viewName, $viewType);
        $layoutName = JRequest :: getVar('layout', 'form');
		
        
        // check if max_applicant has been set, if so check if reached and flag
        
        if ( in_array($layoutName, array('compact', 'form', 'long')) ) {
            $p_invite_code = strtoupper($params->get('invite_code',''));
            $p_max_applicant = (int)$params->get('max_applicant');
            
            $session = JFactory::getSession();
            $hasInvite = $session->get('has_invite','false','invite');
            if ($p_invite_code != '' && $hasInvite == 'false') {
                // an invite code has been set
                $invite_code = strtoupper(JRequest::getVar('invite_code',''));
                if ($invite_code == '' || $p_invite_code != $invite_code) {
                    // no invite code or invite code is incorrect
                    $layoutName = 'invite';
                } else {
                    $session->set('has_invite','true','invite');
                }
            }
            if ( $p_max_applicant > 0) {    
                // applicant limit has been set
                if ((int) $model->getSubmissionCount() >= $p_max_applicant) {
                    $layoutName = 'max';
                }
            }
        }
        
        if (JFactory::getUser()->guest && 
            $params->get('require_registration','0') == '1' &&
            JRequest::getVar('e') != '1') $layoutName = "denied"; 
        
        if (!JError :: isError($model)) {
            $view->setModel($model, true);
        }
        $view->setLayout($layoutName);
		
       $view->display();
    }

}
?>
