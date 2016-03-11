<?php
/**
 * @package		Joomla.Site
 * @subpackage	mod_articles_latest
 * @copyright	Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// no direct access
defined ( '_JEXEC' ) or die ();

$document = JFactory::getDocument();
$modulePath = JURI::base() . 'modules/mod_about_country_image/';

$document->addScript($modulePath.'tmpl/js/scripts.js');
$document->addStyleSheet($modulePath.'tmpl/css/stylesheet.css');
?>
<div class="row outer">
	<div class="city_main">
    	<?php $pictures = json_decode($module->params);?>
		<?php echo $pictures->{'desc'};?>
		
	</div>
</div>