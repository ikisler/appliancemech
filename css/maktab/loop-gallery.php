<?php
global $ott_options, $ott_isArchive;
$block = isset($ott_options['block']) ? intval($ott_options['block']) : 1;
$layout = !empty($ott_options['layout']) ? $ott_options['layout'] : 'standard';
$show_pagination = isset($ott_options['show_pagination']) ? $ott_options['show_pagination'] : true;
if (!empty($ott_options['more_text'])) {
    $readMore = $ott_options['more_text'];
} else {
    $readMore = ott_option('translate_readmore') ? ott_option('translate_readmore') : __('Continue Reading', 'otouch');
}

if ($ott_isArchive || is_tag() || is_search()) {
    $nofeatured = true;
    $layout = 'standard';
    $ott_options['excerpt_count'] = 50;
}


if (have_posts()) {

    $width = 350;
    $class = isset($ott_options['column'])?"span".$ott_options['column']:'span4';


    echo $layout != 'standard' ? "<div class='row'><div class='isotope-container'>" : "";

    while (have_posts()) : the_post();
        $format = get_post_format() == "" ? "standard" : get_post_format();
        $featured = true;
        if (!has_post_thumbnail($post->ID)) {
            if (in_array($format, array('aside', 'chat', 'standard')))
                $featured = false;
        }

        if ($layout == 'standard') {
            ?>

<article id="post-<?php the_ID(); ?>" <?php post_class($class); ?>>
<div class="item-inner">
<?php
                    $ids = get_metabox('gallery_image_ids');
                    $video_embed = get_metabox('format_video_embed');
                    $video_url   = get_metabox('pretty_video_url');
					$category =  get_the_term_list(get_the_ID(), 'cat_portfolio');
					$height = !empty($ott_options['height']) ? $ott_options['height'] : 450;


                    if (has_post_thumbnail($post->ID)) {
                        if(!empty($video_url)&&get_metabox('pretty_video')==='true'){
                            portfolio_image($width,$height,true,$video_url);                            
                        }else{
                            portfolio_image($width,$height);
                        }
                    } elseif($ids!="false" && $ids!="") {
                        portfolio_gallery($width,$height,$ids);
                    } elseif(!empty($video_embed)) {
                        echo apply_filters("the_content", htmlspecialchars_decode($video_embed));
                    } ?>
<div class="itemco-wrap">
  <div class="portfolio_top"></div>
  <div class="portfolio-content">
  <h2 class="itemco-title"><a href="<?php the_permalink(); ?>">
    <?php the_title(); ?>
    </a></h2>
  <div class="loop-content">
    <?php loop_content(); ?>
  </div> </div>
  <div class="bottom-meta"> <span class="ott-date"><i class="icon-clock-1"></i>
            <?php the_time('j M Y'); ?>
          </span><a href="<?php the_permalink(); ?>" class="ott-more-item"><span><?php echo apply_filters("widget_title", $readMore); ?></span></a> </div>
</div>
</article>
<?php     ?>
<?php
        }
    endwhile;
    echo $layout != 'standard' ? "</div></div>" : "";
    if(isset($ott_options['pagination'])){
        if($ott_options['pagination']=="simple"){
            pagination();
        }elseif($ott_options['pagination']=="infinite"){
            infinite();
        }
    }else{
        if ($show_pagination) {
            pagination();
        }
    }
    wp_reset_query();
}


