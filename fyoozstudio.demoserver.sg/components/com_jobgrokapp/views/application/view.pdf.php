<?php
/**
 *
 *
 * This is the view.pdf.php file for jobgrokapp
 *
 * Created: November 18, 2014, 3:25 am
 *
 * Subversion Details
 * $Date: 2012-04-14 23:34:52 -0500 (Sat, 14 Apr 2012) $
 * $Revision: 3570 $
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

// this is the PDF view for our front end application
class JobgrokappViewApplication extends JViewLegacy

{
// display method for displaying our pdf (not implemented yet)
    function display($tpl = 'pdf')
    {
    // make our mainframe available so we can get the params
        global $mainframe;

        // what's our view type <<-- should use "format" var here
        $viewtype = 'pdf';
        // get our options for our forms (not used in static view)
        $options = $this->get('Options');
        // pull in our component parameters
        $params = JComponentHelper::getParams('com_jobgrokapp');
        // get our security token id
        $uid = $this->get('Uid');
        // get our id <<--- never used...
        $id = $this->get('Id');

        // let's get the data we need if we have a security token
        $application = $this->get('Applicationbyuid');

        // make our application data accessable to our templates
        $this->assignRef('application', $application);
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

        // display the template that we're using
        parent :: display($tpl);

    }

}
?>
