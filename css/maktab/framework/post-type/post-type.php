<?php
add_action('admin_enqueue_scripts', 'postsettings_admin_scripts');
add_action('admin_print_styles', 'postsettings_admin_styles');
if (!function_exists('postsettings_admin_scripts')) {
    function postsettings_admin_scripts(){
        global $post,$pagenow;

        if (current_user_can('edit_posts') && ($pagenow == 'post-new.php' || $pagenow == 'post.php')) {
            if( isset($post) ) {
                wp_localize_script( 'jquery', 'script_data', array(
                    'post_id' => $post->ID,
                    'nonce' => wp_create_nonce( 'otouch-ajax' ),
                    'image_ids' => get_post_meta( $post->ID, 'gallery_image_ids', true ),
                    'label_create' => __("Create Featured Gallery", "otouch"),
                    'label_edit' => __("Edit Featured Gallery", "otouch"),
                    'label_save' => __("Save Featured Gallery", "otouch"),
                    'label_saving' => __("Saving...", "otouch")
                ));
            }

            wp_register_script('post-colorpicker', THEME_DIR.'/framework/assets/js/colorpicker.js');       
            wp_register_script('post-metaboxes', THEME_DIR.'/framework/assets/js/metaboxes.js');        

            wp_enqueue_script('post-colorpicker');
            wp_enqueue_script('post-metaboxes');
        }
    }
}

if (!function_exists('postsettings_admin_styles')) {
    function postsettings_admin_styles(){
        global $pagenow;
        if (current_user_can('edit_posts') && ($pagenow == 'post-new.php' || $pagenow == 'post.php')) {
            wp_register_style('post-colorpicker', THEME_DIR.'/framework/assets/css/colorpicker.css', false, '1.00', 'screen');
            wp_register_style('post-metaboxes', THEME_DIR.'/framework/assets/css/metaboxes.css', false, '1.00', 'screen');

            wp_enqueue_style('post-colorpicker');
            wp_enqueue_style('post-metaboxes');
        }
    }
}

add_action("manage_posts_custom_column", "posttype_custom_columns");
if (!function_exists('posttype_custom_columns')) {
    function posttype_custom_columns($column) {
        global $post;
        switch ($column) {
            case "thumbnail":
                echo post_image_show() ? post_image_show(45,45) : ("<img src='".THEME_DIR."/resources/images/no-thumb.png'>");
                break;
            case "portfolio":
                echo get_the_term_list($post->ID, 'cat_portfolio', '', ', ', '');
                break;
			 case "slide":
                echo get_the_term_list($post->ID, 'slide_cat', '', ', ', '');
                break;
            case "price":
                echo get_the_term_list($post->ID, 'cat_price', '', ', ', '');
                break;
            case "project":
                echo get_the_term_list($post->ID, 'cat_project', '', ', ', '');
                break;	
            case "testimonial":
                echo get_the_term_list($post->ID, 'cat_testimonial', '', ', ', '');
                break;
        }
    }
}

function reflush_rules() {
  if ( is_admin() && isset($_GET['activated'] ) && $pagenow == "themes.php" ) {
    global $wp_rewrite;
    $wp_rewrite->flush_rules();
  }
}
add_action('init', 'reflush_rules');


/* * *********************** */
/* Custom post type: slide */
/* * *********************** */

add_action('init', 'slide_register');
function slide_register() {    
    $labels = array(
        'name' => __('Slides', 'otouch'),
        'singular_name' => __('Slides', 'otouch'),
        'add_new' => __('Add New', 'otouch'),
        'add_new_item' => __('Add New Slide', 'otouch'),
        'edit_item' => __('Edit Slide', 'otouch'),
        'new_item' => __('New Slide', 'otouch'),
        'all_items' => __('All Slides', 'otouch'),
        'view_item' => __('View Slide', 'otouch'),
        'search_items' => __('Search Slides', 'otouch'),
        'not_found' =>  __('No Slide found', 'otouch'),
        'not_found_in_trash' => __('No Slide found in Trash', 'otouch'),
        'menu_name' => __('Slide', 'otouch')
    );    
    $args = array(
        'labels' => $labels,      
        'public' => false,
        'has_archive' => false,
        'publicly_queryable' => true,
        'exclude_from_search' => true,
        'show_ui' => true,
        'hierarchical' => false,        
        'menu_icon' => THEME_DIR . '/framework/admin/assets/images/icons/team.png',
        'rewrite' => array( 'slug' => 'slide'),
        'supports' => array('title','editor', 'page-attributes', 'thumbnail', )
    );
    register_post_type('ott_slide', $args);
    flush_rewrite_rules( false );

}
register_taxonomy("slide_cat", array("ott_slide"), array("hierarchical" => true, "label" => __("Categories", "otouch"), "singular_label" => __("Slide Category", "otouch"), "rewrite" => true));

add_filter('manage_edit-ott_slide_columns', 'slide_edit_columns');
function slide_edit_columns($columns){	
        $columns = array(
            "cb" => "<input type=\"checkbox\" />",
            "thumbnail" => __("Image", "otouch"),
            "title" => __("Name", "otouch"),
            "team" => __("Categories", "otouch"),
            "date" => __("Date", "otouch"),
        );
        return $columns;
}


/* * *********************** */
/* Custom post type: Portfolio */
/* * *********************** */

add_action('init', 'portfolio_register');
function portfolio_register() {
    $slug = ott_option('translate_portfolio') ? ott_option('translate_portfolio') : 'portfolio';
    $labels = array(
        'name' => $slug,
        'singular_name' => $slug,
        'add_new' => __('Add New', 'otouch'),
        'add_new_item' => __('Add New Portfolio', 'otouch'),
        'edit_item' => __('Edit Portfolio', 'otouch'),
        'new_item' => __('New Portfolio', 'otouch'),
        'all_items' => __('All Portfolios', 'otouch'),
        'view_item' => __('View Portfolio', 'otouch'),
        'search_items' => __('Search Portfolios', 'otouch'),
        'not_found' =>  __('No Portfolio found', 'otouch'),
        'not_found_in_trash' => __('No Portfolio found in Trash', 'otouch'),
        'menu_name' => __('Portfolios', 'otouch')
    );    
    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => false,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'show_ui' => true,
        'hierarchical' => false,

        'menu_icon' => THEME_DIR . '/framework/admin/assets/images/icons/slider.png',
        'rewrite' => array( 'slug' => $slug),
        'supports' => array('title', 'editor','page-attributes','thumbnail','revisions')
    );
    register_post_type('ott_portfolio', $args);
    flush_rewrite_rules( false );

}
$slug = ott_option('translate_portfolio') ? ott_option('translate_portfolio') : 'portfolio';
register_taxonomy("cat_portfolio", array("ott_portfolio"), array("hierarchical" => true, "label" => __("Categories", "otouch"), "singular_label" => __("Portfolio Category", "otouch"), 'rewrite' => array( 'slug' => $slug.'_cat')));

add_filter('manage_edit-ott_portfolio_columns', 'portfolio_edit_columns');
function portfolio_edit_columns($columns){	
    $columns = array(
        "cb" => "<input type=\"checkbox\" />",
        "title" => __("Portfolio Title", "otouch"),
        "portfolio" => __("Categories", "otouch"),
        "date" => __("Date", "otouch"),
    );
    return $columns;
}

/* * *********************** */
/* Custom post type: Pricing Table */
/* * *********************** */

add_action('init', 'price_register');
function price_register() {
    $labels = array(
        'name' => __('Pricing Tables', 'otouch'),
        'singular_name' => __('Price Item', 'otouch'),
        'add_new' => __('Add New', 'otouch'),
        'add_new_item' => __('Add New Item', 'otouch'),
        'edit_item' => __('Edit Item', 'otouch'),
        'new_item' => __('New Item', 'otouch'),
        'all_items' => __('All Tables', 'otouch'),
        'view_item' => __('View Price Item', 'otouch'),
        'search_items' => __('Search Pricing Tables', 'otouch'),
        'not_found' =>  __('No Tables found', 'otouch'),
        'not_found_in_trash' => __('No Tables in Trash', 'otouch'),
        'menu_name' => __('Pricing Tables', 'otouch')
    );    
    $args = array(
        'labels' => $labels,

        'public' => false,
        'has_archive' => false,
        'publicly_queryable' => true,
        'exclude_from_search' => true,
        'show_ui' => true,
        'hierarchical' => false,

            'menu_icon' => THEME_DIR . '/framework/admin/assets/images/icons/footer.png',
        'rewrite' => array( 'slug' => 'price'),
        'supports' => array('title', 'editor','page-attributes','revisions', 'custom-fields')
    );
    register_post_type('ott_price', $args);
    flush_rewrite_rules( false );

}
register_taxonomy("cat_price", array("ott_price"), array("hierarchical" => true, "label" => __("Categories", "otouch"), "singular_label" => __("Price Category","otouch"), "rewrite" => true));

add_filter('manage_edit-ott_price_columns', 'price_edit_columns');
function price_edit_columns($columns){	
    $columns = array(
        "cb" => "<input type=\"checkbox\" />",
        "title" => __("Table name", "otouch"),
        "price" => __("Categories", "otouch"),
        "date" => __("Date", "otouch"),
    );
    return $columns;
}




/* * *********************** */
/* Custom post type: Team */
/* * *********************** */

add_action('init', 'team_register');
function team_register() {    
    $labels = array(
        'name' => __('Member', 'otouch'),
        'singular_name' => __('Member', 'otouch'),
        'add_new' => __('Add New', 'otouch'),
        'add_new_item' => __('Add New Member', 'otouch'),
        'edit_item' => __('Edit Member', 'otouch'),
        'new_item' => __('New Member', 'otouch'),
        'all_items' => __('All Members', 'otouch'),
        'view_item' => __('View Member', 'otouch'),
        'search_items' => __('Search Member', 'otouch'),
        'not_found' =>  __('No member found', 'otouch'),
        'not_found_in_trash' => __('No member found in Trash', 'otouch'),
        'menu_name' => __('Team', 'otouch')
    );    
    $args = array(
        'labels' => $labels,
        
        'public' => false,
        'has_archive' => false,
        'publicly_queryable' => true,
        'exclude_from_search' => true,
        'show_ui' => true,
        'hierarchical' => false,
        
        'menu_icon' => THEME_DIR . '/framework/admin/assets/images/icons/team.png',
        'rewrite' => array( 'slug' => 'team'),
        'supports' => array('title','editor', 'page-attributes', 'thumbnail', 'revisions', 'custom-fields')
    );
    register_post_type('ott_team', $args);
    flush_rewrite_rules();
}
register_taxonomy("cat_team", array("ott_team"), array("hierarchical" => true, "label" => __("Categories", "otouch"), "singular_label" => __("Team Category", "otouch"), "rewrite" => true));

add_filter('manage_edit-ott_team_columns', 'team_edit_columns');
function team_edit_columns($columns){	
        $columns = array(
            "cb" => "<input type=\"checkbox\" />",
            "thumbnail" => __("Image", "otouch"),
            "title" => __("Name", "otouch"),
            "team" => __("Categories", "otouch"),
            "date" => __("Date", "otouch"),
        );
        return $columns;
}

/* * *********************** */
/* Custom post type: Testimonial */
/* * *********************** */

add_action('init', 'testimonial_register');
function testimonial_register() {    
    $labels = array(
        'name' => __('Testimonial', 'otouch'),
        'singular_name' => __('Testimonial', 'otouch'),
        'add_new' => __('Add New', 'otouch'),
        'add_new_item' => __('Add New Testimonial', 'otouch'),
        'edit_item' => __('Edit Testimonial', 'otouch'),
        'new_item' => __('New Testimonial', 'otouch'),
        'all_items' => __('All Testimonials', 'otouch'),
        'view_item' => __('View Testimonial', 'otouch'),
        'search_items' => __('Search Testimonials', 'otouch'),
        'not_found' =>  __('No testimonial found', 'otouch'),
        'not_found_in_trash' => __('No testimonial found in Trash', 'otouch'),
        'menu_name' => __('Testimonials', 'otouch')
    );    
    $args = array(
        'labels' => $labels,
        
        'public' => false,
        'has_archive' => false,
        'publicly_queryable' => true,
        'exclude_from_search' => true,
        'show_ui' => true,
        'hierarchical' => false,
        
        'menu_icon' => THEME_DIR . '/framework/admin/assets/images/icons/test.png',
        'rewrite' => array( 'slug' => 'testimonial'),
        'supports' => array('title', 'editor', 'page-attributes', 'thumbnail', 'revisions', 'custom-fields')
    );
    register_post_type('ott_testimonial', $args);
    flush_rewrite_rules( false );

}
register_taxonomy("cat_testimonial", array("ott_testimonial"), array("hierarchical" => true, "label" => __("Categories", "otouch"), "singular_label" => __("Testimonial Category", "otouch"), "rewrite" => true));

add_filter('manage_edit-ott_testimonial_columns', 'testimonial_edit_columns');
function testimonial_edit_columns($columns){	
        $columns = array(
            "cb" => "<input type=\"checkbox\" />",
            "title" => __("Name", "otouch"),
            "testimonial" => __("Categories", "otouch"),
            "date" => __("Date", "otouch"),
        );
        return $columns;
}


/* * *********************** */
/* Custom post type: Partner */
/* * *********************** */

add_action('init', 'partner_register');
function partner_register() {    
    $labels = array(
        'name' => __('Our Partners', 'otouch'),
        'singular_name' => __('Partner', 'otouch'),
        'add_new' => __('Add New', 'otouch'),
        'add_new_item' => __('Add New Partner', 'otouch'),
        'edit_item' => __('Edit Item', 'otouch'),
        'new_item' => __('New Item', 'otouch'),
        'all_items' => __('All Partners', 'otouch'),
        'view_item' => __('View Partner', 'otouch'),
        'search_items' => __('Search Partners', 'otouch'),
        'not_found' =>  __('No Partner found', 'otouch'),
        'not_found_in_trash' => __('No partner in Trash', 'otouch'),
        'menu_name' => __('Partners', 'otouch')
    );    
    $args = array(
        'labels' => $labels,
        
        'public' => false,
        'has_archive' => false,
        'publicly_queryable' => true,
        'exclude_from_search' => true,
        'show_ui' => true,
        'hierarchical' => false,
        
        'menu_icon' => THEME_DIR . '/framework/admin/assets/images/icons/client.png',
        'rewrite' => array( 'slug' => 'partner'),
        'supports' => array('title', 'page-attributes', 'thumbnail', 'revisions', 'custom-fields')
    );
    register_post_type('ott_partner', $args);
    flush_rewrite_rules( false );

}
register_taxonomy("cat_partner", array("ott_partner"), array("hierarchical" => true, "label" => __("Categories", "otouch"), "singular_label" => __("Partner Category", "otouch"), "rewrite" => true));

add_filter('manage_edit-ott_partner_columns', 'partner_edit_columns');
function partner_edit_columns($columns){	
        $columns = array(
            "cb" => "<input type=\"checkbox\" />",
            "thumbnail" => __("Image", "otouch"),
            "title" => __("Partners", "otouch"),
            "partner" => __("Categories", "otouch"),
            "date" => __("Date", "otouch"),
        );
        return $columns;
}

/* * *********************** */
/* Custom post type: Gallery */
/* * *********************** */


add_action('init', 'gallery_register');
function gallery_register() {
    $slug = ott_option('translate_gallery') ? ott_option('translate_gallery') : 'gallery';
    $labels = array(
        'name' => $slug,
        'singular_name' => $slug,
        'add_new' => __('Add New', 'otouch'),
        'add_new_item' => __('Add New Gallery', 'otouch'),
        'edit_item' => __('Edit Gallery', 'otouch'),
        'new_item' => __('New Gallery', 'otouch'),
        'all_items' => __('All Galleries', 'otouch'),
        'view_item' => __('View Gallery', 'otouch'),
        'search_items' => __('Search Galleries', 'otouch'),
        'not_found' =>  __('No Gallery found', 'otouch'),
        'not_found_in_trash' => __('No Gallery found in Trash', 'otouch'),
        'menu_name' => __('Galleries', 'otouch')
    );    
    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => false,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'show_ui' => true,
        'hierarchical' => false,

        'menu_icon' => THEME_DIR . '/framework/admin/assets/images/icons/slider.png',
        'rewrite' => array( 'slug' => $slug),
        'supports' => array('title', 'editor','page-attributes','thumbnail','revisions')
    );
    register_post_type('ott_gallery', $args);
    flush_rewrite_rules( false );

}
$slug = ott_option('translate_gallery') ? ott_option('translate_gallery') : 'gallery';
register_taxonomy("cat_gallery", array("ott_gallery"), array("hierarchical" => true, "label" => __("Categories", "otouch"), "singular_label" => __("Portfolio Category", "otouch"), 'rewrite' => array( 'slug' => $slug.'_cat')));

add_filter('manage_edit-ott_gallery_columns', 'gallery_edit_columns');
function gallery_edit_columns($columns){	
    $columns = array(
        "cb" => "<input type=\"checkbox\" />",
        "title" => __("Portfolio Title", "otouch"),
        "portfolio" => __("Categories", "otouch"),
        "date" => __("Date", "otouch"),
    );
    return $columns;
}



require_once ( THEME_PATH . '/framework/post-type/metaboxes.php');
require_once ( THEME_PATH . '/framework/post-type/post-options.php');   

function metabox_render($post, $metabox) {
    global $post; 
    $options = get_post_meta($post->ID, 'otouch_'.strtolower(THEMENAME).'_options', true);?>
        <input type="hidden" name="otouch_meta_box_nonce" value="<?php echo wp_create_nonce(basename(__FILE__));?>" />
        <table class="form-table ott-metaboxes">
            <tbody>
                    <?php	                              
                    foreach ($metabox['args'] as $settings) {
                        $settings['value'] = isset($options[$settings['id']]) ? $options[$settings['id']] : (isset($settings['std']) ? $settings['std'] : '');
                        call_user_func('settings_'.$settings['type'], $settings);	
                    }
                    ?>
            </tbody>
        </table>
<?php 
}

add_action('save_post', 'savePostMeta');
function savePostMeta($post_id) {
    global $ott_post_settings, $ott_page_settings,  $ott_portfolio_settings, $ott_portfolio_gallery, $ott_portfolio_video, $ott_price_settings, $ott_testimonial_settings, $ott_team_settings, $ott_partner_settings, $ott_slide_settings, $ott_gallery_settings,$ott_gallery_gallery  ;

    $meta = 'otouch_'.strtolower(THEMENAME).'_options';
    
    // verify nonce
    if (!isset($_POST['otouch_meta_box_nonce']) || !wp_verify_nonce($_POST['otouch_meta_box_nonce'], basename(__FILE__))) {
            return $post_id;
    }
    
    // check autosave
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return $post_id;
    }
    // check permissions
    if ('page' == $_POST['post_type']) {
            if (!current_user_can('edit_page', $post_id)) {
                    return $post_id;
            }
    } elseif (!current_user_can('edit_post', $post_id)) {
            return $post_id;
    }
    
    if($_POST['post_type']=='post')
        $metaboxes = $ott_post_settings;
    elseif($_POST['post_type']=='page')
        $metaboxes = array_merge($ott_page_settings);
    elseif($_POST['post_type']=='ott_portfolio')
        $metaboxes = array_merge($ott_portfolio_settings,$ott_portfolio_gallery,$ott_portfolio_video);
    elseif($_POST['post_type']=='ott_team')
        $metaboxes = $ott_team_settings;
    elseif($_POST['post_type']=='ott_testimonial')
        $metaboxes = $ott_testimonial_settings; 
    elseif($_POST['post_type']=='ott_price')
        $metaboxes = $ott_price_settings; 
    elseif($_POST['post_type']=='ott_partner')
        $metaboxes = $ott_partner_settings; 
    elseif($_POST['post_type']=='ott_gallery')
        $metaboxes = array_merge($ott_gallery_settings,$ott_gallery_gallery);    
    elseif($_POST['post_type']=='ott_slide')
        $metaboxes = $ott_slide_settings; 
    if(!empty($metaboxes)) {
        $myMeta = array();

        foreach ($metaboxes as $metabox) {
            $myMeta[$metabox['id']] = isset($_POST[$metabox['id']]) ? $_POST[$metabox['id']] : "";
        }

        update_post_meta($post_id, $meta, $myMeta);        

    }
}

/* ================================================================================== */
/*      Save gallery images
/* ================================================================================== */

function otouch_save_images() {

	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) 
		return;
	
	if ( !isset($_POST['ids']) || !isset($_POST['nonce']) || !wp_verify_nonce( $_POST['nonce'], 'otouch-ajax' ) )
		return;
	
	if ( !current_user_can( 'edit_posts' ) ) return;
 
	$ids = strip_tags(rtrim($_POST['ids'], ','));
	update_post_meta($_POST['post_id'], 'gallery_image_ids', $ids);

	// update thumbs
	$thumbs = explode(',', $ids);
	$gallery_thumbs = '';
	foreach( $thumbs as $thumb ) {
		$gallery_thumbs .= '<li>' . wp_get_attachment_image( $thumb, array(32,32) ) . '</li>';
	}

	echo $gallery_thumbs;

	die();
}
add_action('wp_ajax_otouch_save_images', 'otouch_save_images');
?>