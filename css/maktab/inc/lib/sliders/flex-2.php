<section id="slider-home">
  <?php
	$args = array(
		'post_type' =>'ott_slide',
		'numberposts' => 9,
		'order' => 'DESC'
	);
	$slides = get_posts($args);
?>
  <?php if($slides) { ?>
  <div class="fluid_container camera_thumb">
    <div class="camera_wrap" id="camera_wrap_1">
      <?php
            foreach($slides as $post) : setup_postdata($post);

  $featured_image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'slider');			
  $slider_thumb = wp_get_attachment_image_src(get_post_thumbnail_id(), 'slide_thumb');
  $slidelink = get_metabox('custom_link');
    $slidelinktext = get_metabox('custom_link_text'); 	
	 $slides_url_target = get_metabox('slides_url_target'); 

			 ?>
      <div data-thumb="<?php echo $slider_thumb[0] ;?>" data-src="<?php echo $featured_image[0] ;?>">
        <div class="camera_caption fadeIn">
          <div class="container">
           <div class="camera_caption_inner">
           	 <h3>
              <?php the_title();?>
            </h3>
            <?php the_content();?>
           </div>
            <?php  if(!empty($slidelink)) { ?>
            <a href="<?php echo $slidelink ?>" class="btn btn-flat rounded " target="<?php echo $slides_url_target ?>">
            	<?php echo ($slidelinktext) ? stripslashes($slidelinktext) : "Read More";?><span></span>
            </a>   
            <?php } ?>
          </div>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
  
  <!-- #camera_wrap_1 -->
  <?php	     
  			
		$camera_effects = ott_option('camera_trans');
		$camera_paused = ott_option('camera_paused');
		$camera_animspeed = ott_option('camera_animspeed');
		$of_flex_type = ott_option('of_flex_type');
  	 ;?>
  <script>
		jQuery(function(){
			
			jQuery('#camera_wrap_1').camera({
				height: '470px',
				fx: "<?php echo ott_option('camera_trans'); ?>",
				pagination: <?php echo ott_option('camera_type'); ?>,
				loader: false,
				thumbnails:true,
				hover: true,
				opacityOnGrid: true,
				time: <?php echo ($camera_paused) ? stripslashes($camera_paused) : "7000";?>,
				transPeriod:<?php echo ($camera_animspeed) ? stripslashes($camera_animspeed) : "1500";?> 
			});

		});
	</script>
  <?php } wp_reset_postdata(); ?>
</section>
