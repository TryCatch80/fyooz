<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_industry
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
?>

<?php
/*
echo "<br />";
echo JRoute::_('index.php?option=com_industry&view=industry&layout=default&id=4:alias&Itemid=117')."<br />";
echo JRoute::_('index.php?option=com_industry&view=industry&layout=slide&id=4:aliasdaf&Itemid=117')."<br />";
echo JRoute::_('index.php?option=com_industry&view=industry&layout=project&id=4:aliasssss&Itemid=117')."<br />";

		//$break=explode(':',$segments[1]);
		//$vars['id'] = $break[0];

echo "here";die;*/

/*$this->subtemplatename = 'items';
echo JLayoutHelper::render('joomla.content.category_default', $this);*/
?>


<!-- top Section -->
<section class="top-section" style="background:url(templates/fyooz/images/work-top-bg.jpg) repeat center;">
    <div class="top_img_bg" style="background:url(templates/fyooz/images/work-main-banner.jpg) no-repeat center bottom; background-size: auto 100%;">
        <div class="container height-100">
            <div class="row height-100">
                <div class="the-team-main">
                    <div class="work-btn-sec">
                        <div class="container">
                    <section>
                    <?php foreach($this->industries as $industry){ ?>
                        <button onclick="document.location.href='<?php echo JRoute::_('index.php?option=com_industry&view=industry&layout=default&id='.$industry->slug.'&Itemid=117');?>'" class="work-btn wk-btn-1b <?php if($industry->id==$this->industry_id){ echo ' active'; }?>"><?php echo $industry->name;?></button>
                    <?php } ?>
                    </section>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- Portfolio Title Section -->
<?php if(!empty($this->active_ourwork)){ ?>
<section class="work-prt">
  <div class="container">
    <div class="row">
      <div class="col-lg-8">
        <h1><?php echo JText::_('COM_INDUSTRY_OURWORK_LABEL');?></h1>
        <div class="about_text">
        	<p><?php echo $this->active_ourwork;?></p>
        </div>
      </div>
    </div>
  </div>
</section>
<?php } ?>

<?php
$layout = new JLayoutFile('projects', JPATH_ROOT .'/components/com_industry/views/industry/tmpl');
echo $html = $layout->render($this);
?>