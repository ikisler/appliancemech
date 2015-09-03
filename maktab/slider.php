<?php
if (is_page()) {
    if (get_metabox("header_type") == "revolution_slider") {
        ?>
        <section id="slider">
            <?php echo do_shortcode(get_metabox("slider_id")); ?>
        </section>
        <?php
    } 
	elseif (get_metabox("header_type") == "slider") {
        ?>
				<?php    get_template_part('/inc/lib/sliders/flex'); ?>
        <?php
    } 
	elseif (get_metabox("header_type") == "flex2") {
        ?>
				<?php    get_template_part('/inc/lib/sliders/flex-2'); ?>
        <?php
    } 
	
		elseif (get_metabox("header_type") == "flex3") {
        ?>
				<?php    get_template_part('/inc/lib/sliders/flex-3'); ?>
        <?php
    } 
	
	elseif (get_metabox("header_type") != "none") {
        get_template_part('page', 'title');
    }
} 

elseif (is_singular('ott_portfolio')) {
	    if (ott_option('port_header')) {

	    get_template_part('page', 'title');
		
		}
}

else {
    get_template_part('page', 'title');
}

?>