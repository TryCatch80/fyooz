<?php
/**
 * @package		Joomla.Site
 * @subpackage	mod_articles_latest
 * @copyright	Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// no direct access
defined('_JEXEC') or die;

// Include the syndicate functions only once
require_once dirname(__FILE__).'/helper.php';

//$item = modArticlesImageBoxHelper::getArticle($params);

$moduleclass_sfx = htmlspecialchars($params->get('moduleclass_sfx'));
$desc	= trim(htmlspecialchars($params->get('desc',null)));


if(isset($image) && $image != '' && (strpos($image, "http") === false && strpos($image, "www") === false)) {
    $image = JURI::base() . $image;
}

require JModuleHelper::getLayoutPath('mod_about_country_image', $params->get('layout', 'default'));
