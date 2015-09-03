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

    $width = 870;
    $class = isset($ott_options['column'])?"span".$ott_options['column']:'span3';

    if ($layout != 'standard') {
        $class = "span" . $layout;
        $width = 270;
        if ($class == 'span6') {
            $width = 570;
        } elseif ($class == 'span4') {
            $width = 370;
        }
    }
	
	if($class=='span6'){
                    $width = 570;
                }elseif($class=='span4'){
                    $width = 370;  
                } 


    echo $layout != 'standard' ? "<div class='row'><div class='isotope-container'>" : "";

    while (have_posts()) : the_post();
	
	                $imgwidth = 270;
                if($class=='span6'){
                    $imgwidth = 570;
                }elseif($class=='span4'){
                    $imgwidth = 370;  
                }
        $format = get_post_format() == "" ? "standard" : get_post_format();
        $featured = true;
        if (!has_post_thumbnail($post->ID)) {
            if (in_array($format, array('aside', 'chat', 'standard')))
                $featured = false;
        }

        if ($layout == 'standard') {
            ?>

<article id="post-<?php the_ID(); ?>" <?php post_class("loop"); ?>>
  <div class="item-inner blog-main">
    <div class="row-fluid">
      <?php if ($format == 'quote') { ?>
      <div class="loop-block ">
        <div class="loop-media">
          <div class="loop-format"> <span class="post-format <?php echo $format; ?>"></span> </div>
        </div>
        <?php call_user_func('format_' . $format); ?>
      </div>
           
      <?php } elseif ($format == 'link') {     
 ?>
      <div class="loop-block">
        <div class="portfolio_top"></div>
        <div class="one-third">
          <div class="meta-container">
            <ul class="loop-meta inline">
              <li>
                <div class="loop-format"> <span class="post-format <?php echo $format; ?>"></span> </div>
              </li>
              <li class="author"><?php echo ott_option('pp_author') ? ott_option('pp_author') : __('By', 'otouch'); ?>
                <?php the_author_posts_link() ?>
              </li>
              <li class="category"><?php echo ott_option('pp_cateogry') ? ott_option('pp_cateogry') : __('In', 'otouch'); ?> <?php echo get_the_category_list(', '); ?></li>
              <li class="comments"> <?php echo ott_option('pp_commtent') ? ott_option('pp_commtent') : __('Comments', 'otouch'); ?> <?php echo comment_count(); ?></li>
            </ul>
          </div>
        </div>
        <div class="two-third last">
          <?php   $link_url = get_post_meta($post->ID, 'format_link_url', true); $url = !empty($link_url) ? to_url($link_url) : "#"; ?>
          <h2 class="loop-title"><a href="<?php echo $url; ?>">
            <?php the_title(); ?>
            </a></h2>
          <div class="loop-content clearfix">
            <?php loop_content(); ?>
          </div>
        </div>
      </div>
      <?php } elseif ($format == 'audio') {     
 ?>
      <div class="loop-media">
        <?php call_user_func('format_' . $format); ?>
      </div>
      <div class="loop-block">
        <div class="portfolio_top"></div>
        <div class="one-third">
          <div class="meta-container">
            <ul class="loop-meta inline">
              <li>
                <div class="loop-format"> <span class="post-format <?php echo $format; ?>"></span> </div>
              </li>
              <li class="author"><?php echo ott_option('pp_author') ? ott_option('pp_author') : __('By', 'otouch'); ?>
                <?php the_author_posts_link() ?>
              </li>
              <li class="category"><?php echo ott_option('pp_cateogry') ? ott_option('pp_cateogry') : __('In', 'otouch'); ?> <?php echo get_the_category_list(', '); ?></li>
              <li class="comments"> <?php echo ott_option('pp_commtent') ? ott_option('pp_commtent') : __('Comments', 'otouch'); ?> <?php echo comment_count(); ?></li>
            </ul>
          </div>
        </div>
        <div class="two-third last">
          <?php   $link_url = get_post_meta($post->ID, 'format_link_url', true); $url = !empty($link_url) ? to_url($link_url) : "#"; ?>
          <h2 class="loop-title"><a href="<?php echo $url; ?>">
            <?php the_title(); ?>
            </a></h2>
          <div class="loop-content clearfix">
            <?php loop_content(); ?>
          </div>
        </div>
      </div>
      <?php } elseif ($format == 'status') { ?>
      <div class="loop-block">
        <div class="span12">
          <?php call_user_func('format_' . $format); ?>
        </div>
      </div>
      <?php } else {?>
      <?php if (!isset($nofeatured) && $featured) { ?>
      <div class="loop-media">
        <?php call_user_func('format_' . $format); ?>
      </div>
      <?php } ?>
      <div class="loop-block">
        <div class="portfolio_top"></div>
        <div class="one-third">
          <div class="meta-container">
            <ul class="loop-meta inline">
              <li>
                <div class="loop-format"> <span class="post-format <?php echo $format; ?>"></span> </div>
              </li>
              <li class="author"><?php echo ott_option('pp_author') ? ott_option('pp_author') : __('By', 'otouch'); ?>
                <?php the_author_posts_link() ?>
              </li>
              <li class="category"><?php echo ott_option('pp_cateogry') ? ott_option('pp_cateogry') : __('In', 'otouch'); ?> <?php echo get_the_category_list(', '); ?></li>
              <li class="comments"> <?php echo ott_option('pp_date') ? ott_option('pp_date') : __('Comments', 'otouch'); ?> <?php echo comment_count(); ?></li>
            </ul>
          </div>
        </div>
        <div class="two-third last">
          <h2 class="loop-title"><a href="<?php the_permalink(); ?>">
            <?php the_title(); ?>
            </a></h2>
          <div class="loop-content clearfix">
            <?php loop_content(); ?>
          </div>
          <div class="entry-meta"> <span class="ott-date"><i class="icon-clock-1"></i>
            <?php the_time('j M Y'); ?>
            </span><a href="<?php the_permalink(); ?>" class="ott-more-item"><span><?php echo apply_filters("widget_title", $readMore); ?></span></a> </div>
        </div>
      </div>
      <?php } ?>
    </div>
  </div>
</article>
<?php } else {
            ?>
<article id="post-<?php the_ID(); ?>" <?php post_class("loop $class"); ?>>
  <div class="item-inner">
    <?php if ($format == 'link') { ?>
    <div class="loop-block">
      <div class="loop-media">
        <div class="loop-format"> <span class="post-format <?php echo $format; ?>"></span> </div>
        <?php call_user_func('format_' . $format); ?>
      </div>
      
    </div>
    <div class="bottom-meta"> <span class="ott-date"><i class="icon-clock-1"></i>
        <?php the_time('j M Y'); ?>
        </span><a href="<?php the_permalink(); ?>" class="ott-more-item"><span><?php echo apply_filters("widget_title", $readMore); ?></span></a> </div>
         <?php } elseif ($format == 'quote') {     
 ?>
 <div class="loop-block">
      <div class="loop-media">
        
        <?php call_user_func('format_' . $format); ?>
      </div>
      
    </div>
    <div class="bottom-meta"> <span class="ott-date"><i class="icon-clock-1"></i>
        <?php the_time('j M Y'); ?>
        </span><a href="<?php the_permalink(); ?>" class="ott-more-item"><span><?php echo apply_filters("widget_title", $readMore); ?></span></a> </div>
 
     <?php } elseif ($format == 'standard') {     
 ?>
       <?php if (!isset($nofeatured) && $featured) { ?>
      <?php call_user_func('format_standard_small'); ?>
      <?php } ?>
      <div class="loop-block">
      <div class="portfolio_top"></div>
      <h2 class="loop-title"><a href="<?php the_permalink(); ?>">
        <?php the_title(); ?>
        </a></h2>
      <div class="loop-content clearfix">
        <?php loop_content(); ?>
      </div>

    </div>
          <?php if($ott_options['excerpt_count']!='0') { ?>
      <div class="bottom-meta"> <span class="ott-date"><i class="icon-clock-1"></i>
        <?php the_time('j M Y'); ?>
        </span><a href="<?php the_permalink(); ?>" class="ott-more-item"><span><?php echo apply_filters("widget_title", $readMore); ?></span></a> </div>
      <?php } ?>
      
    
    <?php } elseif ($format == 'status') { ?>
    <div class="loop-block">
      <div class="loop-media">
        <?php call_user_func('format_' . $format); ?>
      </div>
    </div>
    <?php
                } else {
                    ?>
    <?php if (!isset($nofeatured) && $featured) { ?>
    <div class="loop-media">
      <?php call_user_func('format_' . $format); ?>
    </div>
    <?php } ?>
    <div class="loop-block">
      <div class="portfolio_top"></div>
      <h2 class="loop-title"><a href="<?php the_permalink(); ?>">
        <?php the_title(); ?>
        </a></h2>
      <div class="loop-content clearfix">
        <?php loop_content(); ?>
      </div>
    </div>
          <?php if($ott_options['excerpt_count']!='0') { ?>
      <div class="bottom-meta"> <span class="ott-date"><i class="icon-clock-1"></i>
        <?php the_time('j M Y'); ?>
        </span><a href="<?php the_permalink(); ?>" class="ott-more-item"><span><?php echo apply_filters("widget_title", $readMore); ?></span></a> </div>
      <?php } ?>
    <?php } ?>
  </div>
</article>
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


