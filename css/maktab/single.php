<?php get_header(); ?>
<?php
the_post();
$col = "span9";
if (get_metabox("layout") == "full") {
    $col = "span12";
}
$klas = get_metabox("layout") ? get_metabox("layout") : 'right';
?>

<div class="row">
  <div class="<?php
    echo $col;
    echo " content-" . $klas;
    ?>">
    <?php
        $feature = false;
        $class = "single";
        if (get_metabox("feature_show") == "true") {
            $feature = true;
        } else if (get_metabox("feature_show") != "false") {
            if (ott_option("feature_show")) {
                $feature = true;
            }
        }

        $format_options = get_post_meta($post->ID, 'themewave_post_format', true);
        $format = get_post_format() == "" ? "standard" : get_post_format();
        if ($format == "status") {
            if (preg_match("#http://instagr(\.am|am\.com)/p/.*#i", $format_options["status_url"]))
                $class .= " instagram-post";
            elseif (preg_match("|https?://(www\.)?twitter\.com/(#!/)?@?([^/]*)|", $format_options["status_url"]))
                $class .= " twitter-post";
        }
        ?>
    <article <?php post_class($class); ?>>
      <?php
            if ($feature) {
                echo '<div class="loop-media">';
                call_user_func('format_' . $format, $format_options);
                echo '</div>';
            }
            ?>
      <div class="content-block">
        <h1 class="single-title">
          <?php the_title(); ?>
        </h1>
        <?php if(ott_option('meta_on_single')) { ?>
        <div class="meta-container">
          <ul class="loop-meta inline">
            <li class="date"><i class="icon-clock-1"></i><span class="date">
              <?php the_time('j M Y'); ?>
              </span></li>
            <li class="author"><i class="icon-user"></i>
              <?php the_author_posts_link() ?>
            </li>
            <li class="category"><i class="icon-folder-open-1"></i> <?php echo get_the_category_list(', '); ?></li>
            <li class="comments"> <i class="icon-chat-1"></i><?php echo comment_count(); ?></li>
          </ul>
        </div>
        <?php } ?>
        <?php the_content(); ?>
        <?php wp_link_pages(); ?>
        <div class="clear"></div>
        <?php if (get_the_tag_list() || ott_option('social_share')) { ?>
        <div class="meta-container tag clearfix">
          <div class="loop-meta tag"> <?php echo get_the_tag_list(__("", "otouch"), ' ', ''); ?> </div>
          <?php echo ott_social_share(); ?> </div>
        <?php } ?>
      </div>
      <div class="post_pagination ">
      	      <div class="pagination">
        <ul>
          <li class="prev_post_nav">
          <i class="icon-left-open"></i>
            <?php previous_post_link('%link', '&#8592;', FALSE); ?>
          </li>
           <li class="nxt_post_nav">
          <i class="icon-right-open"></i>
            <?php next_post_link('%link', '&#8594;', FALSE); ?>
          </li>
        </ul>
      </div>
      
      </div>
      <?php about_author(); ?>
      <?php comments_template('', true); ?>

    </article>
  </div>
  <?php
    if (get_metabox("layout") != "full") {
        get_sidebar();
    }
    ?>
</div>
<?php get_footer(); ?>
