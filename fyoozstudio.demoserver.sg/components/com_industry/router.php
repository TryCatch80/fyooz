<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_industry
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

/**
 * Routing class from com_industry
 *
 * @since  3.3
 */
class IndustryRouter extends JComponentRouterBase
{
	/**
	 * Build the route for the com_industry component
	 *
	 * @param   array  &$query  An array of URL arguments
	 *
	 * @return  array  The URL arguments to use to assemble the subsequent URL.
	 *
	 * @since   3.3
	 */
	public function build(&$query)
	{
		$segments = array();

		// Get a menu item based on Itemid or currently active
		$params = JComponentHelper::getParams('com_industry');
		$advanced = $params->get('sef_advanced_link', 0);

		if (empty($query['Itemid']))
		{
			$menuItem = $this->menu->getActive();
		}
		else
		{
			$menuItem = $this->menu->getItem($query['Itemid']);
		}

		$mView = (empty($menuItem->query['view'])) ? null : $menuItem->query['view'];
		$mLayout = (empty($menuItem->query['layout'])) ? 'default' : $menuItem->query['layout'];
		$mId = (empty($menuItem->query['id'])) ? null : $menuItem->query['id'];


		if (isset($query['view']))
		{
			$view = $query['view'];

			if (empty($query['Itemid']) || empty($menuItem) || $menuItem->component != 'com_industry')
			{
				$segments[] = $query['view'];
			}

			unset($query['view']);
		}

		// Are we dealing with a industry that is attached to a menu item?
		if (isset($view) && ($mView == $view) && ($mLayout == $query['layout']) and (isset($query['id'])) and ($mId == (int) $query['id']))
		{
			unset($query['view']);
			unset($query['catid']);
			unset($query['id']);
			unset($query['layout']);
			return $segments;
		}

		if (isset($query['layout']))
		{
			if ($query['layout'] == 'default'){
				unset($query['layout']);
			}else{
				$segments[]=$query['layout'];
				unset($query['layout']);
			}
		}

		if (isset($query['id']))
		{
			$segments[]=$query['id'];
			unset($query['id']);
		}

		$total = count($segments);

		for ($i = 0; $i < $total; $i++)
		{
			$segments[$i] = str_replace(':', '-', $segments[$i]);
		}

		return $segments;
	}

	/**
	 * Parse the segments of a URL.
	 *
	 * @param   array  &$segments  The segments of the URL to parse.
	 *
	 * @return  array  The URL attributes to be used by the application.
	 *
	 * @since   3.3
	 */
	public function parse(&$segments)
	{
		$total = count($segments);
		$vars = array();
		$vars['view'] = 'industry';
		
		for ($i = 0; $i < $total; $i++)
		{
			$segments[$i] = preg_replace('/-/', ':', $segments[$i], 1);
		}

		// Get the active menu item.
		$item = $this->menu->getActive();
		$params = JComponentHelper::getParams('com_industry');
		$advanced = $params->get('sef_advanced_link', 0);

		// Count route segments
		$count = count($segments);

		// Standard routing for newsfeeds.
		if (!isset($item))
		{
			$vars['view'] = $segments[0];
			$vars['id'] = $segments[$count - 1];
			return $vars;
		}

		// From the categories view, we can only jump to a category.
		$vars['layout'] = $segments[$count - 2];
		$vars['id'] = $segments[$count - 1];
		$found = 0;

		return $vars;
	}
}

/**
 * Industry router functions
 *
 * These functions are proxys for the new router interface
 * for old SEF extensions.
 *
 * @param   array  &$query  An array of URL arguments
 *
 * @return  array  The URL arguments to use to assemble the subsequent URL.
 *
 * @deprecated  4.0  Use Class based routers instead
 */
function IndustryBuildRoute(&$query)
{
	$router = new IndustryRouter;

	return $router->build($query);
}

/**
 * Industry router functions
 *
 * These functions are proxys for the new router interface
 * for old SEF extensions.
 *
 * @param   array  &$segments  The segments of the URL to parse.
 *
 * @return  array  The URL attributes to be used by the application.
 *
 * @deprecated  4.0  Use Class based routers instead
 */
function IndustryParseRoute($segments)
{
	$router = new IndustryRouter;

	return $router->parse($segments);
}
