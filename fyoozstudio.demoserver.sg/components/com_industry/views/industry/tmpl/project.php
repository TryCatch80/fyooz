<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_industry
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

$back_url = JRoute::_('index.php?option=com_industry&view=industry&id='.$this->project->indslug.'&Itemid=117');
?>
	<header class="navbar navbar-fixed-top" role="navigation">
        <div class="container container_bg">
            <div class="navbar-header page-scroll">
            	<a class="navbar-brand" href="<?php echo JURI::base();?>"><img src="templates/fyooz/images/logo.png" alt=""></a>
                <div class="work-sub-had">
                	<div class="work-close"><a href="<?php echo $back_url?>"><img src="templates/fyooz/images/work-close-icon.png"/></a></div>
                    <div class="insurance"><?php echo $this->project->industry_name;?>: <?php echo $this->project->client_name;?></div>

                    <?php
					$modules = JModuleHelper::getModules('share-this');
					foreach( $modules As $module ){ echo  JModuleHelper::renderModule($module); }
					?>
                </div>
            </div>
            <div class="menu_toggal">Menu</div>
        </div>
    </header>
    
    <!-- top Section -->
    <section class="top-section">
        <div class="top_img_bg" 
	<?php 
	$images  = json_decode($this->project->images);

	if (isset($images->image_fulltext) && !empty($images->image_fulltext)) : ?>
	<?php if ($images->image_fulltext_caption):
		echo 'class="caption"' . ' title="' . htmlspecialchars($images->image_fulltext_caption) . '"';
	endif; ?>
    style="background:url(<?php echo htmlspecialchars($images->image_fulltext); ?>) no-repeat scroll center center;"  alt="<?php echo htmlspecialchars($images->image_fulltext_alt); ?>"
	<?php endif; ?>
        >

        	<div class="container height-100">
            	<div class="row height-100">
        			&nbsp;		
            	</div>
            </div>
        </div>        
    </section>
    <!-- Idea Section -->
    <section class="idea-section pad-boti">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
               	  <div class="work-sub-secound">
                    <h1><a href="#" class="compaing"><?php echo $this->project->name;?></a></h1>
                    <div class="col-lg-8 pad-rl">
                        	<div class="idea-consectetur">
	                          <?php if (isset($this->project->client_logo) && !empty($this->project->client_logo)){ ?>
                              <div class="liberty-logo"><img src="<?php echo $this->project->client_logo;?>"/></div>
                              <?php } ?>
                            </div>
                    </div>
                 </div>
                </div>
           </div>
    	</div>
    </section>

	<?php echo $this->project->description;?>

    <br class="clear">
    <section class="idea-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                	<div class="work-sub-last-prt">
                        <div class="gallery-sec">
                        	<?php 
							$imagegallery_files = json_decode($this->project->imagegallery)->imagegallery_file;
							if(!empty($this->project->imagegallery) && count($imagegallery_files)>0){
								 ?>
                        	<div class="gallery-box">
                            	<div class="gallery-thumb">
                           	    	<a href="#"><img src="templates/fyooz/images/work-gallery-thumb.jpg"/></a>
                                    <div class="gallery-inr">                                    	
                                    	<table width="100%" height="100%" border="0" cellspacing="0" cellpadding="0">
                                          <tr align="center" valign="middle" height="100%">
                                            <td height="100%" align="center" valign="middle">                                            	
                                                <div class="gallery-link"><a href="javascript:;" data-reveal-id="myModal">Gallery</a></div>
                                            </td>
                                          </tr>
                                        </table>        
                                    </div>
                                    <div id="myModal" class="reveal-modal">
                   						<div class="gallery-slider-main">
                                        	<div class="flexslider-gallery">
                                              <ul class="slides">
                                              	<?php foreach($imagegallery_files as $imagegallery_file){ ?>
                                              	<li><img src="<?php echo $imagegallery_file;?>"/></li>
                                                <?php } ?>
                                              </ul>
                                            </div>	                                                
                                   	  </div>
                                      	<a class="close-reveal-modal"><img src="templates/fyooz/images/popup-close-iocn.png"/></a>
                                    </div>                                    
                                </div>
                            </div>
                            <?php } ?>
                            <?php if(!empty($this->project->imagegallery_text)){ ?>
                            <div class="col-lg-12 pad-rl">
                                <div class="work-sub-secound">
                                <div class="idea-consectetur">
                                    <div class="amet-desh">
                                        <p><?php echo $this->project->imagegallery_text;?></p>
                                    </div>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>                    
                        </div>
                        <div class="video-sec">
                        	<?php 
							$videgallery_files = json_decode($this->project->videogallery)->videogallery_description;
							if(!empty($this->project->videogallery) && count($videgallery_files)>0){
								 ?>
                        	<div class="video-box">
                            	<div class="film-thumb">
                           	    	<a href="#"><img src="templates/fyooz/images/work-video-thumb.jpg"/></a>
                                    <div class="video-inr">
                                    	<table width="100%" height="100%" border="0" cellspacing="0" cellpadding="0">
                                          <tr align="center" valign="middle" height="100%">
                                            <td height="100%" align="center" valign="middle">                                            	
                                                <div class="video-link"><a href="javascript:;" data-reveal-id="videoModal">video</a></div>
                                            </td>
                                          </tr>
                                        </table>
                                    </div>                                    
                   				  <div id="videoModal" class="reveal-modal video-center">
                                  	<div class="video-slab-main">
                                        	<div class="flexslider-gallery">
                                              <ul class="slides">
                                              	<?php foreach($videgallery_files as $videgallery_file) { ?>
                                              	<li><iframe src="<?php echo $videgallery_file;?>" frameborder="0" allowfullscreen></iframe></li>
                                                <?php } ?>
                                              </ul>
                                            </div>	                                                
                                   	  </div>
                   				  	<!--<div class="video-slab-main"><img src="templates/fyooz/images/video-thumb.jpg"/></div>-->
                                  	<a class="close-reveal-modal"><img src="templates/fyooz/images/popup-close-iocn.png"/></a>
                                  </div>
                                </div>
                            </div>
                            <?php } ?>
                            <?php if(!empty($this->project->videogallery_text)){ ?>
                            <div class="col-lg-12 pad-rl">
                                <div class="work-sub-secound">
                                <div class="idea-consectetur">
                                    <div class="amet-desh">
                                        <p><?php echo $this->project->videogallery_text;?></p>
                                    </div>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>                    
                        </div>
                  	</div>
                </div>
            </div>
        </div>
    </section>
	 <!-- /Idea Section -->


<link rel="stylesheet" href="templates/fyooz/css/flexslider.css" type="text/css" media="screen" />
<link href="templates/fyooz/css/reveal.css" rel="stylesheet" type="text/css">
<!--<script type="text/javascript" language="javascript" src="templates/fyooz/js/jquery-1-8-2.js"></script>-->
<script type="text/javascript" language="javascript" src="templates/fyooz/js/jquery.reveal.js"></script>

<script defer src="templates/fyooz/js/jquery.flexslider.js"></script>
<script type="text/javascript">
$(window).load(function(){
  $('.flexslider-gallery').flexslider({
	animation: "slide",
	slideshow: false,
	start: function(slider){
	  $('body').removeClass('loading');
	}
  });
});
</script>
<!-- Bootstrap Core JavaScript -->
<script src="templates/fyooz/js/bootstrap.min.js"></script>
<script src="templates/fyooz/js/bootstrap.js"></script>