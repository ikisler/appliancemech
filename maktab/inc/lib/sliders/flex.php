<?php
		$flex_paused = ott_option('flex_paused');
		$flex_animspeed = ott_option('flex_animspeed');
?>

<section id="slider-home" class="full clearfix">
  <?php
	global $options, $theme_data;
	$args = array(
		'post_type' =>'ott_slide',
		'numberposts' => -1,
		'order' => 'DESC'
	);
	$slides = get_posts($args);
?>
<div class="slider_to visible-desktopp"></div>
  <div class="">
    <?php if($slides) { ?>
      <div id="inner-slides" class="flexslider clearfix">
        <ul class="slides">
          <?php
            foreach($slides as $post) : setup_postdata($post);

           $featured_image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'slider_full');
    		$slidelinktext = get_metabox('custom_link_text'); 	
  			$slidelink = get_metabox('custom_link');

			   ?>
          <?php if($featured_image) { ?>
          <li class="slide"> <img src="<?php echo $featured_image[0] ;?>" width="<?php echo $featured_image[1]; ?>" height="<?php echo $featured_image[2]; ?>" alt="" />
            <div class="flex-slider-caption-wrap ">
              <div class="flex-slider-caption container">
                <div class="camera_caption_inner">
                
                  <h2>
                    <?php the_title(); ?>
                  </h2>
                    <?php the_content();?>
                      </div>
                  <?php  if(!empty($slidelink)) { ?>
                  <a href="<?php echo $slidelink ?>" class="btn btn-flat rounded" ><?php echo ($slidelinktext) ? stripslashes($slidelinktext) : "Read More";?>
                  <i class="icon-right-dir"></i><span></span></a>
                  <?php } ?>
              
              </div>
            </div>
          </li>
          <?php  } ?>
          <?php endforeach; ?>
        </ul>
      </div>
      <script type="text/javascript">
      jQuery(window).load(function($) {
			jQuery('.flexslider').flexslider({
                            animation: "<?php echo ott_option('flex_trans'); ?>",
                            easing: "easeOutExpo",
                            direction: "horizontal",
                            slideshowSpeed: <?php echo ($flex_paused) ? stripslashes($flex_paused) : "7000";?>,
                            animationSpeed: <?php echo ($flex_animspeed) ? stripslashes($flex_animspeed) : "1500";?>,
                            pauseOnAction: true,
                            pauseOnHover: true,
                            useCSS: true,
                            touch: true,
                            video: true,
                            controlNav:true,
                            directionNav: true,
                            keyboard: true


		
			});
      });
</script> 
  
  </div>
  <?php } wp_reset_postdata(); ?>
</section>
