<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_industry
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

/**
 * Industry component helper.
 *
 * @since  1.6
 */
class IndustryHelper extends JHelperContent
{
	/**
	 * Configure the Linkbar.
	 *
	 * @param   string  $vName  The name of the active view.
	 *
	 * @return  void
	 *
	 * @since   1.6
	 */
	public static function addSubmenu($vName)
	{
		JHtmlSidebar::addEntry(
			JText::_('COM_INDUSTRY_SUBMENU_INDUSTRIES'),//COM_INDUSTRY_SUBMENU_
			'index.php?option=com_industry&view=industries',
			$vName == 'industries'
		);

		JHtmlSidebar::addEntry(
			JText::_('COM_INDUSTRY_SUBMENU_PROJECTS'),
			'index.php?option=com_industry&view=projects',
			$vName == 'projects'
		);

		JHtmlSidebar::addEntry(
			JText::_('COM_INDUSTRY_SUBMENU_SLIDERS'),
			'index.php?option=com_industry&view=slides',
			$vName == 'slides'
		);
	}
}
