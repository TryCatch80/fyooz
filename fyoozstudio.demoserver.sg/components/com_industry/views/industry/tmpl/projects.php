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
<?php /*?><link rel="stylesheet" href="<?php echo JURI::root();?>templates/fyooz/css/slider.css" media="all">
<script type="text/javascript" src="<?php echo JURI::root();?>templates/fyooz/js/modernizr.js"></script>
<script type="text/javascript" src="<?php echo JURI::root();?>templates/fyooz/js/jquery-1.10.2.min.js"></script>
<script>var sliderTimeout = 5000</script>
<style>.controls{ display:none;}</style>
<link rel="stylesheet" type="text/css" href="<?php echo JURI::root();?>templates/fyooz/css/dropdown.css" />
<script type='text/javascript' src='<?php echo JURI::root();?>templates/fyooz/js/select_demo2.js'></script>
<!-- /////////////////////////////////////////////////////// -->
<?php */?>

<!-- Portfolio Section -->
<section> 
	<div class="row outer cog-portfolio-main">    
    	<div class="cog-portfolio">
        	<ul class="grid effect-1" id="grid">
				<?php 
				if($displayData->items=="" && count($this->items)>0) $displayData=$this;
				
				if($displayData->items){
					foreach($displayData->items as $item){
						$images  = json_decode($item->images);
						
						$project_link=JRoute::_("index.php?option=com_industry&view=industry&layout=project&id=".$item->slug."&Itemid=117");
				 ?>

                <li class="lpitem">
                	<a href="<?php echo $project_link;?>">
                    <div class="cog-box">
                    	<?php if (isset($images->image_intro) && !empty($images->image_intro)){ ?>
                    	<img src="<?php echo JURI::base().htmlspecialchars($images->image_intro); ?>" alt="<?php echo htmlspecialchars($images->image_intro_alt); ?>"
	                        <?php if ($images->image_intro_caption)  echo 'class="caption"' . ' title="' . htmlspecialchars($images->image_intro_caption) . '"'; ?>
                        />
                        <?php } ?>
                    	<div class="cog-logo">
                    		<table width="100%" height="100%" border="0" cellspacing="0" cellpadding="0">
                              <tr align="center" valign="middle" height="100%">
                                <td height="100%" align="center" valign="middle">
									<?php if (isset($item->client_logo) && !empty($item->client_logo)){ ?>
                                    <img src="<?php echo JURI::base().$item->client_logo;?>" />
                                    <?php } ?></td>
                              </tr>
                            </table>
                    	</div>
                    </div>
                    </a>
                </li>

				<?php }
				}else{ $message = "No Projects available to display."; } ?>
            </ul>
        </div>
    </div>

    <?php if($message!=""){ ?><div class="container"><div class="row">
			<?php if(JRequest::getVar('layout')=='slide'){ ?>
            <div class="col-lg-12"><div class="display_message" style="text-align:center;"><?php echo $message;?></div></div>
            <?php }else{ ?>
            <div class="col-lg-8"><div class="display_message"><?php echo $message;?></div></div>
            <?php } ?>
        </div></div><?php } ?>
</section>

<!-- jQuery --> 
<!-- slider jQuery --> 
<script type="text/javascript" src="<?php echo JURI::root();?>templates/fyooz/js/handlebars-v1.js"></script> 
<script type="text/javascript" src="<?php echo JURI::root();?>templates/fyooz/js/jquery.hammer.min.js"></script> 
<script type="text/javascript" src="<?php echo JURI::root();?>templates/fyooz/js/main.js"></script>

<?php 
$layout = new JLayoutFile('loading', JPATH_ROOT .'/components/com_industry/views/industry/tmpl');
echo $layout->render();
?>

<script type="text/javascript">
var loading_x=0;
var start=<?php echo $displayData->start;?>;
//.find("#result");
$(window).bind('scroll', function() {
	if($(window).scrollTop() >= $('#grid').offset().top + $('#grid').outerHeight() - window.innerHeight) {
		if(loading_x==0)
		{
			loading_x=1;
			 $.ajax({
				url: "<?php echo str_replace('&amp;','&',JRoute::_('index.php?option=com_industry&view=industry&id='.JRequest::getVar('id',3).'&Itemid=117&task=loaddata&tmpl=component&start='));?>"+start,
			 	success: function(result){
					if($(result).find('.lpitem').length>0){
						$('#grid').append($(result).find('.lpitem'));
						
						new AnimOnScroll( document.getElementById( 'grid' ), {
							minDuration : 0.4,
							maxDuration : 0.7,
							viewportFactor : 0.2
						} );
						
						loading_x=0;
						start=start+<?php echo $displayData->limit;?>;
					}else{
						//loaded all data/no data found
					}
		    	}
			});
		}
	}
});
</script>
<?php //echo $displayData->pagination->getListFooter(); ?>
