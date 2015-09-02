<?php get_header(); ?>
<?php the_post(); 
			$portfolio_page = ott_option('page_portfolio');


?>

<article id="post-<?php the_ID(); ?>" <?php post_class('single-portfolio');?>>
  <div class="row">
    <div class="span12 single-title-container">
      <div class="ott-title-container">
        <div class="section-title-content">
          <h3 class="ott-section-title">
            <?php the_title();?>
          </h3>
         
          <span class="section-line"></span></div>
          <div class="single_pagination pagination">
              <span><i class="icon-left-open"></i><?php previous_post_link('%link', ';', FALSE); ?> </span>
              <?php if ($portfolio_page !="") { ?> <span><a href="<?php echo $portfolio_page ;?>"><i class="icon-th"></i></a></span><?php } ?>
              <span><i class="icon-right-open"></i><?php next_post_link('%link', ';', FALSE); ?>  </span>
          </div>
      </div>
    </div>
    <div class="span8">
      <?php
            global $post;
			
            
            $ids = get_metabox('gallery_image_ids');
            $video_embed = get_metabox('format_video_embed');
            if($ids!="false" && $ids!="") {
                $height = get_metabox('format_image_height');
                portfolio_gallery(770, $height, $ids, false);
            } elseif(!empty($video_embed)) {
                echo apply_filters("the_content", htmlspecialchars_decode($video_embed));
            } else {
                $height = get_metabox('image_height');
                single_portfolio_image(770, $height,false);
            }
            

            ?>
    </div>
    <div class="span4">
      <div class="single-portfolio-inner">
        <?php
            $project_desc = ott_option('translate_projectdesc') ? ott_option('translate_projectdesc') : __('Overview', 'otouch');
            $live_preview = ott_option('translate_livepreview') ? ott_option('translate_livepreview') : __('LIVE PREVIEW', 'otouch');
			
			echo '<h3 class="ott-single-title">' .  $project_desc . '</h3>';
            the_content();
            
            echo get_the_term_list( $post->ID, 'cat_portfolio', '<div class="meta-cat"><i class="icon-tags"></i>', ', ', '</div>' );
			
			
            $project_date = get_metabox("project_date");
			$project_cost = get_metabox("project_cost");
			$project_name = get_metabox("project_name");
			
			echo '<ul class="por_single_meta">';
			if (get_metabox("project_date") != "") {  echo '<li><i class="icon-calendar-1"></i><span>' .  $project_date . '</span></li>';  } 
			if (get_metabox("project_cost") != "") {  echo '<li><i class="icon-wallet"></i><span>' .  $project_cost . '</span></li>';  } 
			if (get_metabox("project_name") != "") {  echo '<li><i class="icon-folder-open-1"></i><span>' .  $project_name . '</span></li>';  } 
			
			echo '</ul>';
            if (get_metabox("preview_url") != "") {?>
        <div class="tmbutton_wrap"> <a href="<?php echo get_metabox("preview_url"); ?>" target="_blank" class="btn btn-flat rounded  btn-small"><?php echo $live_preview; ?><span></span></a> </div>
        <?php } ?>

      </div>
              <?php
            global $post;

                        
            if (ott_option('portfolio_share')) {
                echo ott_social_share();
            }
            ?>
      
    </div>
  </div>
</article>
<?php 
if(!ott_option('port_related')) {
    related_portfolios();
}?>
<?php get_footer(); ?>
