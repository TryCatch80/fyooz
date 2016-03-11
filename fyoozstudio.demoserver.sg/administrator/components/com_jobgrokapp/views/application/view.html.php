<?php
/**
 *
 *
 * This is the view.html.php file for jobgrokapp
 *
 * Created: November 18, 2014, 3:25 am
 *
 * Subversion Details
 * $Date: 2014-09-28 20:49:00 -0500 (Sun, 28 Sep 2014) $
 * $Revision: 6303 $
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

// view class in the admin site for single application
class JobgrokappViewApplication extends JViewLegacy

{
// display method
    function display($tpl = null)
    {

        $isNew = true;

        $application = $this->get('Application');

        if ( isset($application->uid))
        {
            $pdflink = 'index.php?option=com_jobgrokapp&controller=application&view=application&layout=static&format=jgpdf&cid[]='.$application->id;
            $printlink = 'index.php?option=com_jobgrokapp&controller=application&view=application&layout=static&tmpl=component&cid[]='.$application->id;
        }
        else
        {
            $pdflink = '';
            $printlink = '';
        }

        $options = $this->get('Options');

        $uid = $this->get('Uid');

        $viewtype = 'html';

        if ( isset($application->id) ) $isNew = false;

        // if we're new we're adding if we're not we're editing
        $text = $isNew ? JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_VIEW_HTML_ADD') : 
            JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_VIEW_HTML_EDIT');
        // set our title
        JToolBarHelper :: title(JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_VIEW_HTML_EMPLOYMENT_APPLICATION') . ': <small><small>[ ' . $text . ' ]</small></small>','application');
        // show our buttons
        JToolBarHelper :: save();
        if ($isNew)
        {
            JToolBarHelper :: cancel();
        }
        else
        {
        // for existing items the button is renamed `close`
            JToolBarHelper :: cancel('cancel', JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATION_VIEW_HTML_CLOSE'));
        }

        // make our data available to the template
        $this->assignRef('application', $application);
        // and our options as well
        $this->assignRef('options', $options);
        // and our uid
        $this->assignRef('uid', $uid);
        $this->assignRef('pdflink', $pdflink);
        $this->assignRef('printlink', $printlink);
        $this->assignRef('viewtype', $viewtype);
        
        $photo = $this->get('ImageSrcHTML');
        $this->assignRef('photo',$photo);

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
        $lists['lists'] = JHTML::_('jobgrokapp.lists',$params->get('job_related_skills_lists'),$application->lists);
        $this->assignRef('lists',$lists);

        // dispaly the view
        parent :: display($tpl);
    }

}
?>
