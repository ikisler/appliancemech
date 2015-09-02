<?php
/*
Template Name: Contact Page
*/
?>
<?php get_header(); ?>
<!-- Start Feature -->
<?php if (ott_option('contact_map')) { ?>
<?php get_template_part( '/inc/lib/com/map');  ?>
<?php } ?>

<?php 
the_post();
if(ott_option('pagebuilder')&&pbGetContentBuilder()){
    echo apply_filters('widget_text', pbGetContentBuilder());
}else{
    echo '<div class="container">';
        echo '<div class="row">';
            if(get_metabox('layout') == "left" || get_metabox('layout') == "right"){
                get_sidebar();
                echo "<div class='span9'>";
                    the_content();
                    wp_link_pages();
                    comments_template('', true);
                echo "</div>";
            }else{
                echo "<div class='span12'>";
                    the_content();
                    wp_link_pages();
                    comments_template('', true);
                echo "</div>";
            }
        echo "</div>";
    echo "</div>";
}
get_footer(); ?>