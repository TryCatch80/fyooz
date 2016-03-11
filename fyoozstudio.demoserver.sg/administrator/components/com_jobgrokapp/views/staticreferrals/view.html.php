<?php
/**
 *
 *
 * This is the view.html.php file for jobgrokapp
 *
 * Created: November 18, 2014, 3:25 am
 *
 * Subversion Details
 * $Date: 2010-04-21 22:21:56 -0500 (Wed, 21 Apr 2010) $
 * $Revision: 1798 $
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
 * Job Type View
 *
 */
class JobgrokappViewStaticreferrals extends JViewLegacy
{
    
/**
 *
 * Renders the View
 *
 */
    function display($tpl = null)
    {
        //
        global $option;
        $mainframe = JFactory::getApplication();

        JToolBarHelper :: title(JTEXT::_('COM_JOBGROKAPP_VIEWS_STATICREFERRALS_VIEW_HTML_STATIC_REFERRALS'),'referralstatic');
        JToolBarHelper :: addNew();
        JToolBarHelper :: editList();
        JToolBarHelper :: custom('copy','copy.png','copy_f2.png',JTEXT::_('COM_JOBGROKAPP_VIEWS_STATICREFERRALS_VIEW_HTML_COPY'));
        JToolBarHelper :: deleteList();
        JToolBarHelper :: cancel();

        $items = $this->get('Data');
        $this->assignRef('items', $items);

        $pagination = $this->get('Pagination');
        $this->assignRef('pagination', $pagination);

        parent :: display($tpl);
    }
}
?>
