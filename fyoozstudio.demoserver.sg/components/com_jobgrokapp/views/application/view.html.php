<?php
/**
 *
 *
 * This is the view.html.php file for jobgrokapp
 *
 * Created: November 18, 2014, 3:25 am
 *
 * Subversion Details
 * $Date: 2014-10-20 20:55:59 -0500 (Mon, 20 Oct 2014) $
 * $Revision: 6379 $
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

jimport('joomla.application.component.view');
jimport('joomla.application.component.helper');

// this is the HTML view for our front end application
class JobgrokappViewApplication extends JViewLegacy

{
    function display($tpl = null)
    {

        $app = JFactory::getApplication();
        // $params = JComponentHelper::getParams('com_jobgrokapp');        
        $params = $app->getPageParameters();
                
        
        if ($params->get('use_captcha','1') == '1')
        {
            $string = md5(time());
            $string = md5($string).$string;
            $secret = substr($string,rand(0,56),4);
            $session = JFactory::getSession();
            $session->set('captcha',$secret,'application');
        }
        

        $Itemid = JRequest::getInt('Itemid');
        $thankyou_article = JRequest::getInt('thankyou');
        $db = JFactory::getDBO();
        $query = "SELECT `introtext`, `fulltext` FROM #__content WHERE id=".$thankyou_article;
        $db->setQuery($query);
        if ($thankyou = $db->loadObject()) {
            $thankyou->introtext = JHTML::_('content.prepare',$thankyou->introtext);
            $thankyou->fulltext = JHTML::_('content.prepare',$thankyou->fulltext);
        } else {
            $thankyou = null;
        }
        
        $agreement_article = $params->get('agreement_article','0');
        if ($agreement_article != '0') {
            $query = "SELECT `introtext`, `fulltext` FROM #__content WHERE id=".$agreement_article;
            $db->setQuery($query);
            $agreement = $db->loadObject();
            $agreement->introtext = JHTML::_('content.prepare',$agreement->introtext);
            $agreement->fulltext = JHTML::_('content.prepare',$agreement->fulltext);
        } else {
            $agreement = null;
        }

        // set viewtype to html
        $viewtype = 'html';
        
        // get our security token id
        $uid = $this->get('Uid');
        // get our id <<--- never used...
        $id = $this->get('Id');
        // set our link for any pdf view - breaks in some SEF components
        $pdflink = JRoute::_('index.php?option=com_jobgrokapp&view=application&layout=static&format=raw&uid='.$uid."&Itemid=".$Itemid);
        //$pdflink = 'index.php?option=com_jobgrokapp&view=application&layout=static&format=raw&uid='.$uid;
        // set our link for any print view
        $printlink = JRoute::_('index.php?option=com_jobgrokapp&view=application&layout=static&uid='.$uid.'&tmpl=component');
        
        // let's get the data we need if we have a security token
            $application = $this->get('Applicationbyuid');
            $this->assignRef('application', $application);
        $options = $this->get('Options');
        
        $retry = $this->get('Retry');  
        $requiredgroups = $this->get('Requiredgroups');
                
        // and our options
        $this->assignRef('options', $options);
        // and our params
        $this->assignRef('params', $params);
        // and the view type
        $this->assignRef('viewtype', $viewtype);
        // and our security token
        $this->assignRef('uid', $uid);
        // and our id <<---- not used
        $this->assignRef('id', $id);
        // and our pdflink
        $this->assignRef('pdflink', $pdflink);
        // and our printlink
        $this->assignRef('printlink', $printlink);
        $this->assignRef('thankyou',$thankyou);
        $this->assignRef('agreement',$agreement);
        $this->assignRef('retry',$retry);
        $this->assignRef('requiredgroups',$requiredgroups);

        $this->assignRef('Itemid', $Itemid);
        if (isset($application)) {
            $lists['lists'] = JHTML::_('jobgrokapp.lists',$params->get('job_related_skills_lists'), $application->lists);
            $this->assignRef('lists', $lists);
        }
        // display the template that we're using

        $document = JFactory::getDocument();
        $document->setMetaData('keywords',$params->get('menu-meta_keywords'));
        $document->setMetaData('description',$params->get('menu-meta_description'));
        
        if (JRequest::getVar('layout') != 'email') {
            if (!JFactory::getUser()->guest &&
                 JRequest::getVar('layout') != 'static' &&
                 JRequest::getVar('layout') != 'profile' &&
                 $this->_layout != 'invite' &&
                 $params->get('profile_panel_above_application','1') == '1' &&
                 $params->get('user_profiles','0') == '1') parent::display('profile');
        }
        
        parent :: display($tpl);
        
        if (JRequest::getVar('layout') != 'email') {
            if (!JFactory::getUser()->guest &&
                 JRequest::getVar('layout') == 'profile' &&
                 $this->_layout != 'invite' &&
                 $params->get('user_profiles','0') == '1') parent::display('profile');
        }
    }

}
?>
