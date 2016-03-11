<?php
/**
 * @package		Joomla.Site
 * @subpackage	mod_articles_latest
 * @copyright	Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// no direct access
defined('_JEXEC') or die;

require_once JPATH_SITE.'/components/com_content/helpers/route.php';

jimport('joomla.application.component.model');

JModelLegacy::addIncludePath(JPATH_SITE.'/components/com_content/models', 'ContentModel');

abstract class modaboutcountryimage
{
public static function getArticle(&$params)
    {
        // Get the dbo
        $db = JFactory::getDbo();

        // Get an instance of the generic articles model
        $model = JModel::getInstance('Article', 'ContentModel');

        // Set application parameters in model
        $app = JFactory::getApplication();
        $appParams = $app->getParams();
        $model->setState('params', $appParams);

        $item = $model->getItem($params->get('id', 1234));

        // $item->slug = $item->id . ':' . $item->alias;
        // $item->catslug = $item->catid . ':' . $item->category_alias;

        if ($access || in_array($item->access, $authorised)) {
            // We know that user has the privilege to view the article
            $item->link = JRoute::_(ContentHelperRoute::getArticleRoute($item->slug, $item->catslug));
            $item->categoryLink = JRoute::_(ContentHelperRoute::getCategoryRoute($item->catslug));
        } else {
            $item->link = JRoute::_('index.php?option=com_users&view=login');
            $item->categoryLink = $item->link;
        }
        $item->image = $params->get('image');
        $doc = new DOMDocument();
        @$doc->loadHTML($item->introtext);

        if (!isset($item->image)) {
            $tags = $doc->getElementsByTagName('img');
            $tag = $tags->item(0);
            if (isset($tag)) {
                $item->image = $tag->getAttribute('src');
            }
        }
        return $item;
    }
}
