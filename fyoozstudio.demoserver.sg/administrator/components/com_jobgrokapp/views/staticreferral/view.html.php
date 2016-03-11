<?php
/**
 *
 *
 * This is the view.html.php file for jobgrokapp
 *
 * Created: November 18, 2014, 3:25 am
 *
 * Subversion Details
 * $Date: 2010-04-21 22:21:22 -0500 (Wed, 21 Apr 2010) $
 * $Revision: 1797 $
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
class JobgrokappViewStaticreferral extends JViewLegacy

{

    function display($tpl = null)
    {

        $referral = $this->get('Staticreferral');
        if (!isset($status->id))
            $isNew = true;
        else
            $isNew = false;

        $text = $isNew ? JTEXT::_('COM_JOBGROKAPP_VIEWS_STATICREFERRAL_VIEW_HTML_ADD') :
            JTEXT::_('COM_JOBGROKAPP_VIEWS_STATICREFERRAL_VIEW_HTML_EDIT');
        JToolBarHelper :: title(JTEXT::_('COM_JOBGROKAPP_VIEWS_STATICREFERRAL_VIEW_HTML_STATIC_REFERRAL') . ': <small><small>[ ' . $text . ' ]</small></small>','referralstatic');
        JToolBarHelper :: save();
        if ($isNew)
        {
            JToolBarHelper :: cancel();
        }
        else
        {
        // for existing items the button is renamed `close`
            JToolBarHelper :: cancel('cancel', JTEXT::_('COM_JOBGROKAPP_VIEWS_STATICREFERRAL_VIEW_HTML_CLOSE'));
        }
        $this->assignRef('lists', $lists);

        $this->assignRef('referral', $referral);
        parent :: display($tpl);
    }
}
?>
