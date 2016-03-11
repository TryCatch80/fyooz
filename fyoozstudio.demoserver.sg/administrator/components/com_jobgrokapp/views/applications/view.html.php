<?php
/**
 *
 *
 * This is the view.html.php file for jobgrokapp
 *
 * Created: November 18, 2014, 3:25 am
 *
 * Subversion Details
 * $Date: 2014-04-20 21:04:41 -0500 (Sun, 20 Apr 2014) $
 * $Revision: 5973 $
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

// this is our view class for all applications
class JobgrokappViewApplications extends JViewLegacy
{
	// display method
	function display($tpl = null)
	{
		global $option;
		$mainframe = JFactory::getApplication();

		$display_import = $this->get('ComCount');
		$display_import_halt = $this->get('RecordCount'); // must not be any data
		
		JToolBarHelper :: title(JTEXT::_('COM_JOBGROKAPP_VIEWS_APPLICATIONS_VIEW_HTML_EMPLOYMENT_APPLICATIONS'),'application');
		if ($display_import && !$display_import_halt) JToolBarHelper :: custom('import','jobgrokimport.png','jobgrokimport.png','Import', false, false); 
		if ($display_import && $display_import_halt) JToolBarHelper :: custom('','jobgrokimport_disabled.png','jobgrokimport_disabled.png','Import Disabled', false, false);
		if ($display_import) JToolBarHelper :: spacer(10);
        JToolBarHelper :: preferences("com_jobgrokapp",'400');
        JToolBarHelper :: spacer(10);

		//JToolBarHelper :: addNew();
		JToolBarHelper :: editList();
		//JToolBarHelper :: custom('copy','copy.png','copy_f2.png','Copy');
		JToolBarHelper :: deleteList();
		JToolBarHelper :: cancel();
		//JToolBarHelper :: spacer(10);

		$items = $this->get('Data');
		$this->assignRef('items', $items);

		$pagination = $this->get('Pagination');
		$this->assignRef('pagination', $pagination);

                
		// display the stuff
		parent :: display($tpl);
	}
}
?>
