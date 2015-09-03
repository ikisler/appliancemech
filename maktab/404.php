<?php
get_header();
?>

<div class="row">
    <div class="span12">
        <section class="content">
            <div class="one-half">
            <div id="error404-container">
                <h2 class="errorh2"><?php _e("Oops! We couldn’t find it ...", "otouch");?></h2>

                <div class="ott-404-error">
                    <ul class="borderlist">
                        <li><?php _e("Always double check your spelling.", "otouch");?></li>
                        <li><?php _e("Try similar keywords.", "otouch");?></li>
                        <li><?php _e("Try using more than one keyword.", "otouch");?></li>
                    </ul>
                </div>
                <div class="ott-404-search-container">
                <?php get_search_form(); ?>
                </div>
            </div>
            </div>
            <div class="one-half last">
            	<div class="error_img"></div>
            </div>
            
        </section>
    </div>
</div>

<?php
get_footer();
?>