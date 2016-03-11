<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_industry
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

use Joomla\Registry\Registry;

/**
 * HTML View class for the Industrys component
 *
 * @since  1.5
 */
class IndustryViewIndustry extends JViewLegacy
{
	/**
	 * @var    string  The name of the extension for the category
	 * @since  3.2
	 */
	protected  $extension = 'com_industry';

	/**
	 * @var    string  Default title to use for page title
	 * @since  3.2
	 */
	protected  $defaultPageTitle = 'COM_INDUSTRY_DEFAULT_PAGE_TITLE';

	/**
	 * @var    string  The name of the view to link individual items to
	 * @since  3.2
	 */
	protected $viewName = 'industry';

	/**
	 * Execute and display a template script.
	 *
	 * @param   string  $tpl  The name of the template file to parse; automatically searches through the template paths.
	 *
	 * @return  mixed  A string if successful, otherwise a Error object.
	 */
	public function display($tpl = null)
	{
		$id = (int) JRequest::getVar('id');
		$layout = JRequest::getVar('layout','default');
		$model = $this->getModel('Industry','IndustryModel'); $model->getState(); $model->setState('list.limit', 0);

		if($layout=='project')
		{
			//Get Project Details
			$this->project = $this->get('Project');
		}else{
			//Get Industry List and Project List for specific industry
			if($layout=='slide'){

				$this->industry_id = $id;

				$this->slides = $model->getSlides($this->industry_id);
				$this->active_ourwork = $model->getOurWorkText($this->industry_id);
			}else{
				$this->industries = $this->get('Industries');

				$this->industry_id = $id;
				$this->active_ourwork = $model->getOurWorkText($this->industry_id);
			}

			list($this->items,$start,$limit) = $this->get('Items');
			//$this->pagination = $this->get('Pagination');
			$this->state = $this->get('State');
		}

		$this->limit=9;
		$this->start=0+$this->limit;

		return parent::display($tpl);
	}
}