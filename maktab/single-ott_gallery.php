<?php get_header(); ?>
<?php the_post(); 
			$gallery_page_select = ott_option('gallery_page_select');


?>

<article id="post-<?php the_ID(); ?>" <?php post_class('single-gallery');?>>
  <div class="row">
    <div class="span12 single-title-container">
      <div class="ott-title-container">
        <div class="section-title-content">
          <h3 class="ott-section-title">
            <?php the_title();?>
          </h3>
          <span class="section-line"></span></div>
        <div class="single_pagination pagination"> <span><i class="icon-left-open"></i>
          <?php previous_post_link('%link', ';', FALSE); ?>
          </span>  <?php if ($gallery_page_select !="") { ?> <span><a href="<?php echo $gallery_page_select ;?>"><i class="icon-th"></i></a></span> <?php } ?><span><i class="icon-right-open"></i>
          <?php next_post_link('%link', ';', FALSE); ?>
          </span> </div>
      </div>
    </div>
    <div class="span8">
      <?php
            global $post;
           
            $ids = get_metabox('gallery_image_ids');
            if($ids!="false" && $ids!="") {
                $height = get_metabox('format_image_height');
                gallery_gallery(270, 270, $ids, false);
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
			
			echo '<h3 class="ott-single-title">' .  $project_desc . '</h3>';
            the_content();
            
            echo get_the_term_list( $post->ID, 'cat_portfolio', '<div class="meta-cat"><i class="icon-tags"></i>', ', ', '</div>' );
            if(!ott_option('hide_favorites')){ ?>
        <?php
            }
			
			
            $project_date = get_metabox("project_date");
			$project_cost = get_metabox("project_cost");
			$project_name = get_metabox("project_name");
			
			echo '<ul class="por_single_meta">';
			if (get_metabox("project_date") != "") {  echo '<li><i class="icon-calendar-1"></i><span>' .  $project_date . '</span></li>';  } 
			if (get_metabox("project_cost") != "") {  echo '<li><i class="icon-wallet"></i><span>' .  $project_cost . '</span></li>';  } 
			if (get_metabox("project_name") != "") {  echo '<li><i class="icon-folder-open-1"></i><span>' .  $project_name . '</span></li>';  } 
			
			echo '</ul>';
          {?>
        <?php } ?>
      </div>
    </div>
  </div>
</article>
<?php 
if(!ott_option('port_related')) {
    related_portfolios();
}?>
<?php get_footer(); ?>
