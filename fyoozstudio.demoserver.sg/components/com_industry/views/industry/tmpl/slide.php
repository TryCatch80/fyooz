<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_industry
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

//$layout = new JLayoutFile('projects', JPATH_ROOT .'/components/com_industry/views/industry/tmpl');
//echo $layout->render($this);exit;

?>
<!-- slider CSS -->
<link rel="stylesheet" href="<?php echo JURI::base() ?>templates/fyooz/css/slider.css" media="all">
<!--<script type="text/javascript" src="<?php echo JURI::base() ?>templates/fyooz/js/modernizr.js"></script>
<script type="text/javascript" src="<?php echo JURI::base() ?>templates/fyooz/js/jquery-1.10.2.min.js"></script>-->
<script>var sliderTimeout = 5000</script>

<section id="slidecontainer">
  <div class="slider">
    <?php 
	foreach($this->slides as $key)
	{
	?>
    <div class="slide">
      <div style="background-image:url(<?php echo JURI::base().$key->images;?>)" class="inner effect-bg lazy" data-original="<?php echo JURI::base().$key->images;?>" data-tablet-image="<?php echo JURI::base().$key->images;?>" data-smartphone-image="<?php echo JURI::base().$key->images;?>">
        <div class="content">
        <div class="caption">
          <h2><?php echo $key->introtitle;?></h2>
          <h4><?php echo $key->introtext;?></h4>
          <?php if(!empty($key->introtitle) && !empty($key->introtext)){ ?>
          <h4><?php if($key->readlink!=""){ ?><a href="<?php echo $key->readlink;//JRoute::_('index.php?option=com_industry&view=industry&id='.JRequest::getVar('id',3));?>" class="readmore">Read More</a><?php } ?></h4>
          <?php } ?>
          </div>
        </div>
      </div>
    </div>
    <?php }?>
  </div>
</section>

<!-- Portfolio Title Section -->
<?php if(!empty($this->active_ourwork)){ ?>
<section class="cog-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
            	<h1>our work</h1>
            	<div class="about_text"><?php echo $this->active_ourwork;?></div>
            </div>
        </div>
    </div>
</section>
<?php }?>

<!-- Portfolio Section -->
<?php
$layout = new JLayoutFile('projects', JPATH_ROOT .'/components/com_industry/views/industry/tmpl');
echo $layout->render($this);
?>