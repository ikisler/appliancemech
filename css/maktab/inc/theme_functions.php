<?php
/* ================================================================================== */
/*      Include Plugins
  /* ================================================================================== */

require_once THEME_PATH . "/framework/plugins/install-plugin.php";

/* ================================================================================== */
/*      Register menu
  /* ================================================================================== */

register_nav_menus(array(
    'main' => 'Main Menu',
	'footer' => 'Footer Menu',
));

/* ================================================================================== */
/*      Theme Supports
  /* ================================================================================== */

add_action('after_setup_theme', 'otouch_setup');
if (!function_exists('otouch_setup')) {

    function otouch_setup() {
        add_editor_style();
        add_theme_support('post-thumbnails');
        add_theme_support('automatic-feed-links');
        add_theme_support( 'woocommerce' );
        load_theme_textdomain('otouch', THEME_PATH . '/languages/');
    }

}
if (!isset($content_width))
    $content_width = 960;


if ( function_exists( 'add_image_size' ) ) {
	add_image_size( 'full-size',  9999, 9999, false );
	add_image_size( 'page-head',  900, 350, false );
	add_image_size( 'slider_full',  1260, 600, true );
	add_image_size( 'ei_thump',  120, 50, true );
	add_image_size( 'slider_side',  1170, 650, true );
	add_image_size( 'flex_slider',  1000, 570, true );
	add_image_size( 'ei_slider',  1260, 570, true );	
	add_image_size( 'slide_thumb',  60, 40, true );
	add_image_size( 'admin-list-thumb',  80, 80, true );

}


		
		/* AUX LINKS
	================================================== */
	if (!function_exists('ott_top_links')) {
		function ott_top_links() {
		
			// VARIABLES
			$login_url = wp_login_url();
			$wp_register_url  = wp_registration_url();
			
			$logout_url = wp_logout_url( home_url() );
			$myaccount_page_id = get_option( 'woocommerce_myaccount_page_id' );
			if ( $myaccount_page_id ) {
				$logout_url = wp_logout_url( get_permalink( $myaccount_page_id ) );
			  	$login_url = get_permalink( $myaccount_page_id );
			  	if ( get_option( 'woocommerce_force_ssl_checkout' ) == 'yes' ) {
			    	$logout_url = str_replace( 'http:', 'https:', $logout_url );
					$login_url = str_replace( 'http:', 'https:', $login_url );
				}
			}
			$aux_links_output = $ss_enable = "";
			

			
			$aux_links_output .= '<nav class="ott-acc-menu-wrap ">'. "\n";
			

				if (is_user_logged_in()) {
					$aux_links_output .= '<div class="ott-acc-inside">'. "\n";	
						if ( $myaccount_page_id ) {
						$aux_links_output .= '<a href="'.get_permalink( $myaccount_page_id ).'" class="admin-link"><span>'. __("My Account", "otouch") .'</span><i class="icon-user-1"></i></a>'. "\n";
						} else {
						$aux_links_output .= '<a href="'.get_admin_url().'" class="admin-link"><span>'. __("My Account", "otouch") .'</span><i class="icon-user-1"></i></a>'. "\n";
						}
						$aux_links_output .= '<a href="'.wp_logout_url(home_url()).'"><span>'. __("Sign Out", "otouch") .'</span><i class="icon-lock-1"></i></a>'. "\n";
					$aux_links_output .= '</div>'. "\n";
				} else {
					
					$aux_links_output .= '<div class="ott-acc-menu">'. "\n";
					if(get_option('users_can_register')) 
					{
					$aux_links_output .= '<a href="'.$wp_register_url.'">'. __("Register", "otouch") .'</a>'. "\n";
					$aux_links_output .= '<span>'. __("or", "otouch") .'</span>'. "\n";	
					}	
					
					$aux_links_output .= '<a href="'.$login_url.'"><span>'. __("Sign In", "otouch") .'</span><i class="icon-user-1"></i></a>'. "\n";
					$aux_links_output .= '</div>'. "\n";	
				}
						

			
			$aux_links_output .= '</nav>'. "\n";
		
		
			// RETURN
			return $aux_links_output;
		}
	}
	
	
	
			/* AUX LINKS
	================================================== */
	if (!function_exists('ott_langs_links')) {
		function ott_langs_links() {
		
			// VARIABLES

			$aux_links_output = $ss_enable = "";

			
			// LINKS + SEARCH OUTPUT
			$aux_links_output .= '<nav class="langes-menu ">'. "\n";
			$aux_links_output .= '<ul class="menu">'. "\n";

				
				$aux_links_output .= '<li class="parent aux-languages"><a href="#">'. __("Language", "otouch") .'</a>'. "\n";
				$aux_links_output .= '<ul id="header-languages" class="sub-menu">'. "\n";
				if (function_exists( 'ott_language_flags' )) {
				$aux_links_output .= ott_language_flags();
				}
				$aux_links_output .= '</ul>'. "\n";
				$aux_links_output .= '</li>'. "\n";
			

			$aux_links_output .= '</ul>'. "\n";
			$aux_links_output .= '</nav>'. "\n";
		
		
			// RETURN
			return $aux_links_output;
		}
	}
			
	
	/* LANGUAGE FLAGS
	================================================== */
	function ott_language_flags() {
		
		$language_output = "";
		
		if (function_exists('icl_get_languages')) {
		    $languages = icl_get_languages('skip_missing=0&orderby=code');
		    if(!empty($languages)){
		        foreach($languages as $l){
		            $language_output .= '<li>';
		            if($l['country_flag_url']){
		                if(!$l['active']) {
		                	$language_output .= '<a href="'.$l['url'].'"><img src="'.$l['country_flag_url'].'" height="12" alt="'.$l['language_code'].'" width="18" /><span class="language name">'.$l['translated_name'].'</span></a>'."\n";
		                } else {
		                	$language_output .= '<div class="current-language"><img src="'.$l['country_flag_url'].'" height="12" alt="'.$l['language_code'].'" width="18" /><span class="language name">'.$l['translated_name'].'</span></div>'."\n";
		                }
		            }
		            $language_output .= '</li>';
		        }
		    }
	    } else {
	    	//echo '<li><div>No languages set.</div></li>';
	    	$flags_url = get_template_directory_uri() . '/images/flags';
	    	$language_output .= '<li><a href="#">DEMO - EXAMPLE PURPOSES</a></li><li><a href="#"><span class="language name">German</span></a></li><li><div class="current-language"><span class="language name">English</span></div></li><li><a href="#"><span class="language name">Spanish</span></a></li><li><a href="#"><span class="language name">French</span></a></li>'."\n";
	    }
	    
	    return $language_output;
	}

/* ================================================================================== */
/*      Enqueue Scripts
  /* ================================================================================== */

add_action('wp_enqueue_scripts', 'otouch_scripts');

function otouch_scripts() {
	
	if(onetouch_woocommerce_enabled())
        wp_enqueue_style('ott_woocommerce', THEME_DIR . '/framework/woocommerce/css/woocommerce-css.css');
    wp_enqueue_style('fontello', THEME_DIR . '/assets/css/fontello/css/fontello.css');
    wp_enqueue_style('slider', THEME_DIR . '/assets/css/slider.css');
		
	  if (ott_option('theme_width') == "1260re") {
         wp_enqueue_style('bootstrap', THEME_DIR . '/assets/css/responsive/bootstrap.min.css');
   		 wp_enqueue_style('responsive', THEME_DIR . '/assets/css/responsive/bootstrap-responsive.min.css'); 
		 wp_enqueue_style('otouch', STYLESHEET_DIR . '/style.css');
		wp_enqueue_style('elements', THEME_DIR . '/assets/css/elements.css');
		 wp_enqueue_style('ott-responsive', THEME_DIR . '/assets/css/responsive/responsive.css'); 

    } else{
		 wp_enqueue_style('bootstrap', THEME_DIR . '/assets/css/responsive/bootstrap.min.css');
		 wp_enqueue_style('responsive', THEME_DIR . '/assets/css/responsive/bootstrap-responsive-1000.min.css');
		 wp_enqueue_style('otouch', STYLESHEET_DIR . '/style.css');
		wp_enqueue_style('elements', THEME_DIR . '/assets/css/elements.css');
		 wp_enqueue_style('ott-responsive', THEME_DIR . '/assets/css/responsive/responsive_2.css'); 

	}
   
    wp_enqueue_style('prettyphoto', THEME_DIR . '/assets/css/prettyPhoto.css');

    
		wp_enqueue_style('animate', THEME_DIR . '/assets/css/animate-custom.css');
		$protocol = is_ssl() ? 'https' : 'http';
    $defaultfonts = array(
            'Helvetica Neue',
            'Verdana, Geneva',
            'Trebuchet',
            'Georgia',
            'Times New Roman',
            'Tahoma, Geneva',
            'Palatino');
    $ott_googlefonts = array(
        ott_option('body_text_font','face'),
        ott_option('menu_font','face'),
        ott_option('sidebar_widgets_title','face'),
        ott_option('footer_widgets_title','face'),
        ott_option('heading_font'),
		ott_option('slide_heading_font'),	
		ott_option('ptitle_heading_font'),
		ott_option('submenu_font','face')
	
		
		
    );
	
	
	
	if(ott_option('body_text_font','face') !='') {
    $googlefont = '';
    foreach($ott_googlefonts as $font) {
        if(!in_array($font, $defaultfonts)) {
            $googlefont = str_replace(' ', '+', $font). ':400,400italic,700,700italic|' . $googlefont;
	}
    }
    
        wp_enqueue_style('google-font', "$protocol://fonts.googleapis.com/css?family=" . substr_replace($googlefont ,"",-1) . "&subset=".ott_option('google_font_subset'));
	}

    wp_enqueue_script('jquery');
    if ( is_single() && comments_open() ) wp_enqueue_script( 'comment-reply' );
    wp_enqueue_script('scripts', THEME_DIR . '/assets/js/scripts.js', false, false, true);
    wp_enqueue_script('hoverIntent', THEME_DIR . '/assets/js/jquery.hoverIntent.minified.js', false, false, true);
		  if (ott_option('theme_width') == "1260re") {
    wp_enqueue_script('otouch-script', THEME_DIR . '/assets/js/otouch_1260.js', false, false, true);


    } else{
    wp_enqueue_script('otouch-script', THEME_DIR . '/assets/js/otouch.js', false, false, true);


	}
    wp_enqueue_script('flexslider', THEME_DIR . '/assets/js/jquery.flexslider-min.js', false, false, true);
    wp_enqueue_script('easing', THEME_DIR . '/assets/js/jquery.easing.1.3.js', false, false, true);
    wp_enqueue_script('panel', THEME_DIR . '/assets/js/panel.js', false, false, true);
    wp_enqueue_script('camera', THEME_DIR . '/assets/js/camera.js', false, false, true);
    wp_enqueue_script('cookie', THEME_DIR . '/assets/js/jquery.cookie.js', false, false, true);

	




if(is_page_template('contact.php')) {

	wp_enqueue_script('sg-maps-api', 'http://maps.google.com/maps/api/js?v=3.5&amp;sensor=false',  array('jquery'), '1.8', true );
	wp_enqueue_script('sg-maps-markermanager', THEME_DIR. '/assets/js/maps/vendor/markermanager.js',  array('jquery'), '1.8', true );
	wp_enqueue_script('sg-maps-StyledMarker', THEME_DIR. '/assets/js/maps/vendor/StyledMarker.js',  array('jquery'), '1.8', true );
	wp_enqueue_script('jquery.metadata', THEME_DIR. '/assets/js/maps/vendor/jquery.metadata.js',  array('jquery'), '1.8', true );
	wp_enqueue_script('jmapping', THEME_DIR. '/assets/js/maps/jquery.jmapping.js',  array('jquery'), '1.8', true );
	wp_enqueue_script('map.int', THEME_DIR. '/assets/js/map.int.js',  array('jquery'), '1.8', true );
    wp_enqueue_script('map', THEME_DIR . '/assets/js/map.int.js', false, false, true);

	
}

	
    if(onetouch_woocommerce_enabled())
        wp_enqueue_script('ott_woocommerce', THEME_DIR . '/framework/woocommerce/js/woocommerce-js.js', false, false, true);
    if(ott_option('nicescroll'))
        wp_enqueue_script('ott_scroll', THEME_DIR . '/assets/js/jquery.nicescroll.min.js', false, false, true);
    
    if(ott_option('social_share')) {
        if(ott_option('twitter_share'))
            wp_enqueue_script('ott_share_twitter', $protocol.'://platform.twitter.com/widgets.js','','',true);
        if(ott_option('googleplus_share'))
            wp_enqueue_script('ott_share_google', $protocol.'://apis.google.com/js/plusone.js','','',true);
        if(ott_option('linkedin_share'))
            wp_enqueue_script('ott_share_linkedin', $protocol.'://platform.linkedin.com/in.js','','',true);
        if(ott_option('pinterest_share'))
            wp_enqueue_script('ott_share_pinterest', $protocol.'://assets.pinterest.com/js/pinit.js','','',true);
    }
}

/* ================================================================================== */
/*      Register Widget Sidebar
  /* ================================================================================== */

if (!function_exists('theme_widgets_init')) {

    function theme_widgets_init() {

        register_sidebar(array(
            'name' => 'Default sidebar',
            'id' => 'default-sidebar',
            'before_widget' => '<aside class="widget %2$s" id="%1$s">',
            'after_widget' => '</aside>',
            'before_title' => '<div class="ott-widget-title-container"><h3 class="widget-title">',
            'after_title' => '</h3></div><div class="sidebar-line"><span></span></div>',
        ));
        
        
        if(onetouch_woocommerce_enabled()){
            register_sidebar(array(
                'name' => 'Shop Sidebar',
                'id' => 'shop-widget',
                'before_widget' => '<aside class="widget %2$s" id="%1$s">',
                'after_widget' => '</aside>',
                'before_title' => '<div class="ott-widget-title-container"><h3 class="widget-title">',
                'after_title' => '</h3></div><div class="sidebar-line"><span></span></div>',
            ));
        }
        
        /* footer sidebar */
        $grid = ott_option('footer_layout')!="" ? ott_option('footer_layout') : '3-3-3-3';
        $i = 1;
        foreach (explode('-', $grid) as $g) {
            register_sidebar(array(
                'name' => __("Footer sidebar ", "otouch") . $i,
                'id' => "footer-sidebar-$i",
                'description' => __('The footer sidebar widget area', 'otouch'),
                'before_widget' => '<aside class="widget %2$s" id="%1$s">',
                'after_widget' => '</aside>',
                'before_title' => '<div class="ott-widget-title-container"><h3 class="widget-title">',
                'after_title' => '</h3></div><div class="sidebar-line"><span></span></div>',
            ));
            $i++;
        }
    }

}
add_action('widgets_init', 'theme_widgets_init');
add_filter('widget_text', 'do_shortcode');






/* ================================================================================== */
/*      Has more in post
  /* ================================================================================== */

function has_more() {
    global $post;
    if (empty($post))
        return;
    return (bool) preg_match('/<!--more(.*?)?-->/', $post->post_content);
}

/* ================================================================================== */
/*      Exclude pages from search
  /* ================================================================================== */

if (!function_exists('exclude_pages_from_search')) :

    function exclude_pages_from_search($query) {
        if ($query->is_search) {
            $query->set('post_type', array('post', 'portfolio', 'page'));
        }
        return $query;
    }

    add_filter('pre_get_posts', 'exclude_pages_from_search');
endif;





/* ================================================================================== */
/*      Support upload .ico file
  /* ================================================================================== */

if (!function_exists('custom_upload_mimes')) {
    add_filter('upload_mimes', 'custom_upload_mimes');

    function custom_upload_mimes($existing_mimes = array()) {
        $existing_mimes['ico'] = "image/x-icon";
        return $existing_mimes;
    }

}



/* ================================================================================== */
/*     Search Form Customize
  /* ================================================================================== */

function my_search_form() {

    $form = '<form role="search" method="get" id="searchform" action="' . home_url('/') . '" >
    <div class="input">
        <i class="icon-search"></i><input class="span12" type="text" value="' . get_search_query() . '" name="s" id="s" placeholder="' . __('Type and hit enter', 'otouch') . '">
    </div>
    </form>';

    return $form;
}

add_filter('get_search_form', 'my_search_form');



/* ================================================================================== */
/*      IE
  /* ================================================================================== */

function my_render_css3_pie() {
    echo '
<!--[if lte IE 7]> <html class="ie7"> <![endif]-->
<!--[if IE 8]>     <html class="ie8"> <![endif]-->
<!--[if lte IE 8]><style type="text/css" media="screen">
.image-overlay{background:transparent;filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#50000000,endColorstr=#50000000);zoom: 1;}
</style><![endif]-->
';
}

add_filter("wpcf7_mail_tag_replaced", "suppress_wpcf7_filter");

function suppress_wpcf7_filter($value, $sub = "") {
    $out = !empty($sub) ? $sub : $value;
    $out = strip_tags($out);
    $out = wptexturize($out);
    return $out;
}


/* Wordpress Edit Gallery */
add_filter( 'use_default_gallery_style', '__return_false' );
add_filter( 'wp_get_attachment_link', 'ott_pretty_gallery', 10, 5); 
function ott_pretty_gallery ($content, $id, $size, $permalink) {
    if(!$permalink)
	$content = preg_replace("/<a/","<a rel=\"prettyPhoto[gallery]\"",$content,1);
    return $content;
}


/* Facebook Open Graph Meta */
function facebookOpenGraphMeta() {
    global $post;
    if(!empty($post->ID)) {
        $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID),'full');
        $image = isset($image[0])?$image[0]:'';
        if(!$image){$image=ott_option("theme_logo");};
        if (is_single()) { ?>
            <meta property="og:url" content="<?php the_permalink() ?>"/>
            <meta property="og:title" content="<?php single_post_title(''); ?>" />
            <meta property="og:description" content="<?php echo strip_tags(get_the_excerpt()); ?>" />
            <meta property="og:type" content="article" />
            <meta property="og:image" content="<?php echo $image; ?>" /><?php
        } else {
            if(!is_page()&&ott_option("theme_logo")!==''){$image=ott_option("theme_logo");} ?>
            <meta property="og:site_name" content="<?php bloginfo('name'); ?>" />  
            <meta property="og:description" content="<?php bloginfo('description'); ?>" />  
            <meta property="og:type" content="website" />  
            <meta property="og:image" content="<?php echo $image; ?>" /> <?php 
        }
    }
}

// To excerpt
//=======================================================
if (!function_exists('to_excerpt')) {

    function to_excerpt($str, $length) {
        $str = strip_tags($str);
        $str = explode(" ", $str);
        return implode(" ", array_slice($str, 0, $length));
    }

}

// Go url
//=======================================================
if (!function_exists('to_url')) {

    function to_url($url) {
        if (!preg_match_all('!https?://[\S]+!', $url, $matches))
            $url = "http://" . $url;
        return $url;
    }

}

// Page,Post get, print content
//=======================================================

function loop_content() {
    global $ott_options, $more;
    $more = 0;    

    if (has_excerpt()) {
        the_excerpt();
    } elseif (has_more()) {
        the_content("");
        //echo '<a href="' . get_permalink() . '" class="more-link">' . $readMore . '</a>';
    } elseif ($ott_options['excerpt_count']!='') {
        echo to_excerpt(strip_shortcodes(get_the_content()), $ott_options['excerpt_count']);
        //echo '<a href="' . get_permalink() . '" class="more-link">' . $readMore . '</a>';
    } else {
        echo apply_filters("the_content", strip_shortcodes(get_the_content("")));
    }
}

function ott_option($index1, $index2 = false) {
    global $smof_data;
    if ($index2) {
        $output = isset($smof_data[$index1][$index2]) ? $smof_data[$index1][$index2] : false;
        return $output;
    }
    $output = isset($smof_data[$index1]) ? $smof_data[$index1] : false;
    return $output;
}

// Page, Post custom metaboxes
//=======================================================
function get_metabox($name) {
    global $post;
    if ($post) {
        $metabox = get_post_meta($post->ID, 'otouch_' . strtolower(THEMENAME) . '_options', true);
        return isset($metabox[$name]) ? $metabox[$name] : "";
    }
    return false;
}

function set_metabox($name, $val) {
    global $post;
    if ($post) {
        $metabox = get_post_meta($post->ID, 'otouch_' . strtolower(THEMENAME) . '_options', true);
        $metabox[$name] = $val;
        return update_post_meta($post->ID, 'otouch_' . strtolower(THEMENAME) . '_options', $metabox);
    }
    return false;
}

// Print menu
//=======================================================
function theme_menu() {	
	$nav_menu = get_metabox('page_menu');
    if($nav_menu) {
        wp_nav_menu(array(
            'container' => 'div',
            'container_class' => 'ott-menu-container',
            'menu' => $nav_menu,
            'menu_id' => 'menu',
            'menu_class' => 'sf-menu',
            'fallback_cb' => 'no_main')
        );
    } else {
        wp_nav_menu(array(
            'container' => 'div',
            'container_class' => 'ott-menu-container',
            'menu_id' => 'menu',
            'menu_class' => 'sf-menu',
            'fallback_cb' => 'no_main',
            'theme_location' => 'main')
        );
    }	
}

function no_main() {
    echo "<div class='ott-menu-container clearfix'><ul id='menu' class='sf-menu'>";
    wp_list_pages(array('title_li' => ''));
    echo "</ul></div>";
}

function mobile_menu() {
	$nav_menu = get_metabox('page_menu');
    if($nav_menu) {
        wp_nav_menu(array(
			'container' => false,
			'menu' => $nav_menu,
			'menu_id' => '',
			'menu_class' => 'clearfix',
			'fallback_cb' => 'no_mobile')
        );
    } else {
        wp_nav_menu(array(
			'container' => false,
			'menu_id' => '',
			'menu_class' => 'clearfix',
			'fallback_cb' => 'no_mobile',
			'theme_location' => 'main')
		);
    }
}

function no_mobile() {
    echo "<ul class='clearfix'>";
    wp_list_pages(array('title_li' => ''));
    echo "</ul>";
}

// Footer menu
//=======================================================
function footer_menu() {
    wp_nav_menu(array('container' => false,
        'menu_class' => 'footer-menu inline',
        'fallback_cb' => 'no_footer',
        'depth' => 1,
        'theme_location' => 'footer'));
}

function no_footer() {
    //echo "<ul class='footer-menu inline'>"; wp_list_pages(array('depth'=>1,'title_li'=>'')); echo "</ul>";
}

// Print logo
//=======================================================
function theme_logo() {
    $top = ott_option('logo_top') != "" ? (' padding-top:' . ott_option('logo_top') . 'px;') : '';
	$left = ott_option('logo_left') != "" ? (' padding-left:' . ott_option('logo_left') . 'px;') : '';
	$bottom = ott_option('logo_bottom') != "" ? (' padding-bottom:' . ott_option('logo_bottom') . 'px;') : '';

    echo '<div class="ott-logo" style="' . $top  . $bottom . $left . '">';
    echo '<a class="logo" href="' . home_url() . '">';
    if (ott_option("theme_logo") == "") {
        bloginfo('name');
    } else {
        if (ott_option("logo_retina"))
            echo '<img class="logo-img" src="' . ott_option("theme_logo_retina") . '" style="width:' . ott_option('logo_width') . 'px" alt="' . get_bloginfo('name') . '"/>';
        else
            echo '<img class="logo-img" src="' . ott_option("theme_logo") . '" alt="' . get_bloginfo('name') . '"/>';
    }
    echo '</a>';
    echo '</div>';
    
}



// Get featured text
//=======================================================
function get_featuredtext() {
    global $post;

    if (is_singular()) {
        $return = "<h1 class='page-title'>" . $post->post_title . "</h1>";
        return $return;
    } elseif (is_category()) {
        $return = "<h1 class='page-title'>";
        $return .= (ott_option('pt_category') ? ott_option('pt_category') : __("Category", "otouch")) . " : " . single_cat_title("", false);
        $return .= "</h1>";
        return $return;
    } elseif (is_tax('cat_portfolio')) {
        $return = "<h1 class='page-title'>";
        $return .= (ott_option('pt_portfolio') ? ott_option('pt_portfolio') : __("Portfolio", "otouch")) . " : " . single_cat_title("", false);
        $return .= "</h1>";
        return $return;
    } elseif (is_tag()) {
        $return = "<h1 class='page-title'>";
        $return .= (ott_option('pt_tag') ? ott_option('pt_tag') : __("Tag", "otouch")) . " : " . single_tag_title("", false);
        $return .= "</h1>";
        return $return;
    } elseif (is_404()) {
        $return = "<h1 class='page-title'>" . (ott_option('pt_nothing_found') ? ott_option('pt_nothing_found') : __("404 Page: ", "otouch")) .	"</h1>";

        return $return;
    } elseif (is_author()) {
        global $author;
        $userdata = get_userdata($author);
        $return = "<h1 class='page-title'>" . (ott_option('pt_author') ? ott_option('pt_author') : __("Author: ", "otouch")) . $userdata->display_name . "</h1>";
        return $return;
    } elseif (is_archive()) {
        $return = "<h1 class='page-title'>";
        if (is_day()) {
            $return .= (ott_option('pt_daily_arch') ? ott_option('pt_daily_arch') : __("Daily Archives", "otouch")) . " : " . get_the_date();
        } elseif (is_month()) {
            $return .=(ott_option('pt_monthly_arch') ? ott_option('pt_monthly_arch') : __("Monthly Archives", "otouch")) . " : " . get_the_date("F Y");
        } elseif (is_year()) {
            $return .= (ott_option('pt_yearly_arch') ? ott_option('pt_yearly_arch') : __("Yearly Archives", "otouch")) . " : " . get_the_date("Y");
        } else {
            $return .= ott_option('pt_blog_arch') ? ott_option('pt_blog_arch') : __("Blog Archives", "otouch");
        }
        $return .= "</h1>";
        return $return;
    } elseif (is_search()) {
        $return = "<h1 class='page-title'>" . (ott_option('pt_search_result') ? ott_option('pt_search_result') : __("Search results for", "otouch")) . " : " . get_search_query() . "</h1>";
        return $return;
    }
}

// Sidebar
//=======================================================
function sidebar($sidebar = 'sidebar') {
    if (function_exists('dynamic_sidebar') && dynamic_sidebar($sidebar)) {
        
    }
}

function print_styles($links) {
    for ($i = 0; $i < count($links); $i++) {
        echo '<link type="text/css" rel="stylesheet" href="' . file_require(get_template_directory_uri() . '/' . $links[$i], true) . '" />';
    }

    echo '<link type="text/css" rel="stylesheet" href="http://fonts.googleapis.com/css?family=' . str_replace(" ", "+", get_settings_value('head_felement')) . ':300,300italic,400,400italic,700,700italic,600,600italic" />';
    if (get_settings_value('body_felement') != get_settings_value('head_felement')) {
        echo '<link type="text/css" rel="stylesheet" href="http://fonts.googleapis.com/css?family=' . str_replace(" ", "+", get_settings_value('body_felement')) . ':400,400italic,700,700italic" />';
    }
}

if (!function_exists("current_title")) {

    function current_title() {
        global $page, $paged;
        echo "<title>";
        wp_title('|', true, 'right');
        bloginfo('name');
        $site_description = get_bloginfo('description', 'display');
        if ($site_description && ( is_home() || is_front_page() ))
            echo " | $site_description";
        if ($paged >= 2 || $page >= 2)
            echo ' | ' . sprintf(__('Page %s', 'otouch'), max($paged, $page));
        echo "</title>";
    }

}

function favicon() {
    if (ott_option('theme_favicon') == "") {
        echo '<link rel="shortcut icon" href="' . THEME_DIR . '/assets/img/favicon.ico"/>';
    } else {
        echo '<link rel="shortcut icon" href="' . ott_option('theme_favicon') . '"/>';
    }
    if (ott_option('favicon_retina')) {
        echo ott_option('favicon_iphone') != "" ? ('<link rel="apple-touch-icon" href="' . ott_option('favicon_iphone') . '"/>') : '';
        echo ott_option('favicon_iphone_retina') != "" ? ('<link rel="apple-touch-icon" sizes="114x114" href="' . ott_option('favicon_iphone_retina') . '"/>') : '';
        echo ott_option('favicon_ipad') != "" ? ('<link rel="apple-touch-icon" sizes="72x72" href="' . ott_option('favicon_ipad') . '"/>') : '';
        echo ott_option('favicon_ipad_retina') != "" ? ('<link rel="apple-touch-icon" sizes="144x144" href="' . ott_option('favicon_ipad_retina') . '"/>') : '';
    }
}
function portfolio_image($width = 270, $height = "", $prettyphoto = true, $prettyVideoURL='') {
    global $post,$portAtts;
    if (has_post_thumbnail($post->ID)) {
        $portAtts['hide_hover'] =isset($portAtts['hide_hover']) ?$portAtts['hide_hover'] :'false';
        $portAtts['link_type']  =isset($portAtts['link_type'])  ?$portAtts['link_type']  :'view_large';
        $portAtts['hide_gray'] =isset($portAtts['hide_gray']) ?$portAtts['hide_gray'] :'true';

        $portURL = post_image_show(0, 0, true);
        if($portAtts['link_type']==='permalink'){
            $portURL = get_permalink($post->ID);
        }elseif($portAtts['link_type']==='preview_url'){
            $portURL = get_metabox("preview_url");
        }elseif(!empty($prettyVideoURL)){
            $portURL = $prettyVideoURL;
        }
        
        ?>
        <div class="loop-image  <?php if($portAtts['hide_gray']==='true'){ echo' gary-image ' ;}   ?> "><?php
            if($prettyphoto&&$portAtts['hide_hover']==='true') {echo'<a href="'.$portURL.'"'.($portAtts['link_type']==='view_large'?' data-rel="prettyPhoto"':'') .'>';}
                echo post_image_show($width, $height);
            if($prettyphoto&&$portAtts['hide_hover']==='true') {echo'</a>';}
            if($prettyphoto&&$portAtts['hide_hover']==='false') { ?>
                    <div class="image-overlay">
                        <div class="image-links">
                            <a class="btn btn-border"<?php if($portAtts['link_type']==='view_large'){echo 'data-rel="prettyPhoto"';} ?> href="<?php echo $portURL; ?>">
                            	<i class="icon-camera-4"></i>
                            </a>
                        </div>
                    </div><?php
            } ?>
        </div><?php
    } ?>
    <?php
}


function post_image($width = 270, $height = "", $prettyphoto = true, $prettyVideoURL='') {
    global $post,$portAtts;
    if (has_post_thumbnail($post->ID)) {
        $portAtts['hide_hover'] =isset($portAtts['hide_hover']) ?$portAtts['hide_hover'] :'false';
        $portAtts['link_type']  =isset($portAtts['link_type'])  ?$portAtts['link_type']  :'view_large';
        $portURL = post_image_show(0, 0, true);
        if($portAtts['link_type']==='permalink'){
            $portURL = get_permalink($post->ID);
        }elseif($portAtts['link_type']==='preview_url'){
            $portURL = get_metabox("preview_url");
        }elseif(!empty($prettyVideoURL)){
            $portURL = $prettyVideoURL;
        }
		
		$gray_link ='gary-image';

        if (is_single()) {
			$gray_link ='';
        }
        
        ?>
        <div class="loop-image <?php echo $gray_link ; ?>"><?php
            if($prettyphoto&&$portAtts['hide_hover']==='true') {echo'<a href="'.$portURL.'"'.($portAtts['link_type']==='view_large'?' data-rel="prettyPhoto"':'') .'>';}
                echo post_image_show($width, $height);
            if($prettyphoto&&$portAtts['hide_hover']==='true') {echo'</a>';}
            if($prettyphoto&&$portAtts['hide_hover']==='false') { ?>
                    <div class="image-overlay">
                        <div class="image-links">
                            <a class="btn btn-border"<?php if($portAtts['link_type']==='view_large'){echo 'data-rel="prettyPhoto"';} ?> href="<?php echo $portURL; ?>">
                            	<i class=" <?php if($portAtts['link_type']==='view_large'){echo 'icon-camera-4';} ?>  <?php if($portAtts['link_type'] !='view_large'){echo 'icon-doc-3';} ?>  "></i>
                                
                            </a>
                        </div>
                    </div><?php
            } ?>
        </div><?php
    } ?>
    <?php
}






function single_portfolio_image($width = 270, $height = "", $prettyphoto = true, $prettyVideoURL='') {
    global $post,$portAtts;
    if (has_post_thumbnail($post->ID)) {
        $portAtts['hide_hover'] = 'false';
        $portAtts['link_type']  =isset($portAtts['link_type'])  ?$portAtts['link_type']  :'view_large';
        $portURL = post_image_show(0, 0, true);
        if($portAtts['link_type']==='permalink'){
            $portURL = get_permalink($post->ID);
        }elseif($portAtts['link_type']==='preview_url'){
            $portURL = get_metabox("preview_url");
        }elseif(!empty($prettyVideoURL)){
            $portURL = $prettyVideoURL;
        }
        
        ?>
        <div class="loop-image"><?php
            echo'<a href="'.$portURL.'"'.($portAtts['link_type']==='view_large'?' data-rel="prettyPhoto"':'') .'>';
                echo post_image_show($width, $height);
            echo'</a>';
            { ?>
                    <div class="image-overlay">
                        <div class="image-links">
                            <a class="btn btn-border"<?php if($portAtts['link_type']==='view_large'){echo 'data-rel="prettyPhoto"';} ?> href="<?php echo $portURL; ?>">
                            	<i class="icon-camera-4"></i>
                            </a>
                        </div>
                    </div><?php
            } ?>
        </div><?php
    } ?>
    <?php
}



function single_team_image($width = 270, $height = 270, $prettyphoto = true, $prettyVideoURL='') {
    global $post,$portAtts;
    if (has_post_thumbnail($post->ID)) {
        $portAtts['hide_hover'] = 'false';
        $portAtts['link_type']  =isset($portAtts['link_type'])  ?$portAtts['link_type']  :'view_large';
        $portURL = post_image_show(0, 0, true);
        if($portAtts['link_type']==='permalink'){
            $portURL = get_permalink($post->ID);
        }elseif($portAtts['link_type']==='preview_url'){
            $portURL = get_metabox("preview_url");
        }elseif(!empty($prettyVideoURL)){
            $portURL = $prettyVideoURL;
        }
        
        ?>
        <div class="loop-image"><?php
                echo post_image_show($width, $height); ?>
                  <div class="image-overlay">
                        <div class="image-links">
                            <a class="btn btn-border"<?php if($portAtts['link_type']==='view_large'){echo 'data-rel="prettyPhoto"';} ?> href="<?php echo $portURL; ?>">
                            	<i class="icon-camera-4"></i>
                            </a>
                        </div>
                    </div>
        </div><?php
    } ?>
    <?php
}


function portfolio_gallery($width = 270, $height = "", $ids = "", $prettyphoto = true) {
    if (!empty($ids)) {
		 $garyclass = 'gary-image';
		if(is_single() ){
            $garyclass = '';
        }
        ?>
        <div class="gallery-container clearfix">
                <div class="gallery-slide">
                    <?php
                    foreach (explode(',', $ids) as $id) {
                        if (!empty($id)) {
                            $imgurl0 = aq_resize(wp_get_attachment_url($id), $width, $height, true);
                            $imgurl = !empty($imgurl0) ? $imgurl0 : wp_get_attachment_url($id);
                            ?>
                            <div class="slide-item">
                                <div class="loop-image <?php echo $garyclass; ?>">
                                    <img src="<?php echo $imgurl; ?>" alt="<?php the_title(); ?>">
                                </div>
                            </div>
                            <?php
                        }
                    }
                    ?>                  
                </div>
                <div class="carousel-arrow">
                    <a class="carousel-prev" href="#"><i class="icon-left-open-1"></i></a>
                    <a class="carousel-next" href="#"><i class="icon-right-open-1"></i></a>
                </div>  
        </div>    
        <?php
    }
}


function gallery_gallery($width = 270, $height = "", $ids = "", $prettyphoto = true) {
    if (!empty($ids)) {
        ?>
        <div class="gallery-items clearfix">
                <div class="gallery-inner">
                    <?php
                    foreach (explode(',', $ids) as $id) {
                        if (!empty($id)) {
                            $imgurl0 = aq_resize(wp_get_attachment_url($id), $width, $height, true);
							$imgurl1 = aq_resize(wp_get_attachment_url($id), true);
                            $imgurl = !empty($imgurl0) ? $imgurl0 : wp_get_attachment_url($id);
							$imgurl_full = !empty($imgurl1) ? $imgurl1 : wp_get_attachment_url($id);
			
	
                            ?>
                            <div class="gallery-item">
                                <div class="loop-image">
                                    <img src="<?php echo $imgurl; ?>" alt="<?php the_title(); ?>">
                                    <div class="image-overlay">
                        <div class="image-links">
                            <a class="btn btn-border" data-rel="prettyPhoto" href="<?php echo $imgurl_full; ?>">
                            	<i class="icon-camera-4"></i>
                            </a>
                        </div>
                    </div>
                                </div>
                            </div>
                            <?php
                        }
                    }
                    ?>                  
                </div>
        </div>    
        <?php
    }
}




function format_standard() {
    global $post;
    if (has_post_thumbnail($post->ID)) {
        $portAtts['hide_hover'] =isset($portAtts['hide_hover']) ?$portAtts['hide_hover'] :'false';
		$layout = !empty($ott_options['layout']) ? $ott_options['layout'] : 'standard';

        $link = get_permalink();
        $rell = '';
        $width = 1260;
		if(is_single() ){
            $width = 1260;
        }
        $height = 350;
		$zoom_icon = 'icon-doc-3';
		$gray_link ='gary-image';
		if(is_single() ){
             $height = get_metabox('image_height');
        }
        if (is_single()) {
            $lrg_img = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full');
            $link = $lrg_img[0];
            $overlay = "hover-zoom";
            $rell = ' data-rel="prettyPhoto"';
			$zoom_icon = 'icon-camera-4';
			$gray_link ='';
        }


        ?>
        <div class="loop-image <?php echo $gray_link ?>"><?php
                echo post_image_show($width, $height);  ?>
                    <div class="image-overlay">
                        <div class="image-links">
                            <a class="btn btn-border" <?php echo $rell; ?>  href="<?php echo $link; ?>">
                            	<i class="<?php echo $zoom_icon; ?>"></i>
                            </a>
                        </div>
                    </div>
        </div>
        
        


        <?php
    }
}


function format_standard_small() {
    global $post;
    if (has_post_thumbnail($post->ID)) {
        $portAtts['hide_hover'] =isset($portAtts['hide_hover']) ?$portAtts['hide_hover'] :'false';
		$layout = !empty($ott_options['layout']) ? $ott_options['layout'] : 'standard';

        $link = get_permalink();
        $rell = '';
        $width = 570;
		$gray_link ='gary-image';
		if(is_single() ){
            $width = 1260;
        }
        if (is_single()) {
            $lrg_img = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full');
            $link = $lrg_img[0];
            $overlay = "hover-zoom";
            $rell = ' data-rel="prettyPhoto"';
			$zoom_icon = 'icon-camera-4';
			$gray_link ='';
        }
        $height = 250;
		$zoom_icon = 'icon-doc-3';

        ?>
        <div class="loop-image <?php echo $gray_link ?>"><?php
                echo post_image_show($width, $height);  ?>
                    <div class="image-overlay">
                        <div class="image-links">
                            <a class="btn btn-border" <?php echo $rell; ?>  href="<?php echo $link; ?>">
                            	<i class="<?php echo $zoom_icon; ?>"></i>
                            </a>
                        </div>
                    </div>
        </div>
        
        


        <?php
    }
}

function format_gallery() {
    global $post;
    $ids = get_post_meta($post->ID, 'gallery_image_ids', true);
    $height = 350;
    $width = 870;
	 		 $garyclass = 'gary-image';
		if(is_single() ){
            $garyclass = '';
        }
	if(is_single() ){
             $height = get_metabox('image_height');
     }
	 
    if (!empty($ids)) {
        ?>
        <div class="loop-gallery gallery-container clearfix">
                <div class="gallery-slide">
                    <?php
                    foreach (explode(',', $ids) as $id) {
                        if (!empty($id)) {
                            $imgurl0 = aq_resize(wp_get_attachment_url($id), $width, $height, true);
                            $imgurl = !empty($imgurl0) ? $imgurl0 : wp_get_attachment_url($id);
                            ?>
                            <div class="slide-item <?php echo $garyclass; ?>">
                                <img src="<?php echo $imgurl; ?>" alt="<?php the_title(); ?>">                                  
                            </div>
                            <?php
                        }
                    }
                    ?>                  
                </div>
                <div class="carousel-arrow">
                    <a class="carousel-prev" href="#"><i class="icon-left-open-1"></i></a>
                    <a class="carousel-next" href="#"><i class="icon-right-open-1"></i></a>
                </div>  
        </div>    
        <?php
    }
}

function format_image() {
    format_standard();
}

function jplayer_script() {
    wp_enqueue_script('jplayer_script', THEME_DIR . '/assets/js/jquery.jplayer.min.js', false, false, true);
}

function format_audio() {
    global $post;

    $audio_url = get_post_meta($post->ID, 'format_audio_mp3', true);
    $embed = get_post_meta($post->ID, 'format_audio_embed', true);
    if (!empty($embed)) {
        echo apply_filters("the_content", htmlspecialchars_decode($embed));
    } else {
        echo post_image_show();
        if (!empty($audio_url)) {
                wp_enqueue_script('jplayer_script', THEME_DIR . '/assets/js/jquery.jplayer.min.js', false, false, true);
            ?>
            <div id="jquery_jplayer_<?php echo $post->ID; ?>" class="jp-jplayer jp-jplayer-audio" data-pid="<?php echo $post->ID; ?>" data-mp3="<?php echo $audio_url; ?>"></div>
            <div class="jp-audio-container">
                <div class="jp-audio">
                    <div class="jp-type-single">
                        <div id="jp_interface_<?php echo $post->ID; ?>" class="jp-interface">
                            <ul class="jp-controls">
                                <li><div class="seperator-first"></div></li>
                                <li><div class="seperator-second"></div></li>
                                <li><a href="#" class="jp-play" tabindex="1">play</a></li>
                                <li><a href="#" class="jp-pause" tabindex="1">pause</a></li>
                                <li><a href="#" class="jp-mute" tabindex="1">mute</a></li>
                                <li><a href="#" class="jp-unmute" tabindex="1">unmute</a></li>
                            </ul>
                            <div class="jp-progress-container">
                                <div class="jp-progress">
                                    <div class="jp-seek-bar">
                                        <div class="jp-play-bar"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="jp-volume-bar-container">
                                <div class="jp-volume-bar">
                                    <div class="jp-volume-bar-value"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        }
    }
}

function format_video() {
    global $post;
    $video_embed = get_post_meta($post->ID, 'format_video_embed', true);
    $video_thumb = get_post_meta($post->ID, 'format_video_thumb', true);
    $video_m4v = get_post_meta($post->ID, 'format_video_m4v', true);

    if (!empty($video_embed)) {
            echo apply_filters("the_content", htmlspecialchars_decode($video_embed));
    } elseif (!empty($video_m4v)) {
            wp_enqueue_script('jplayer_script', THEME_DIR . '/assets/js/jquery.jplayer.min.js', false, false, true);

        ?>

        <div id="jquery_jplayer_<?php echo $post->ID; ?>" class="jp-jplayer jp-jplayer-video" data-pid="<?php echo $post->ID; ?>" data-m4v="<?php echo $video_m4v; ?>" data-thumb="<?php echo $video_thumb; ?>"></div>
        <div class="jp-video-container">
            <div class="jp-video">
                <div class="jp-type-single">
                    <div id="jp_interface_<?php echo $post->ID; ?>" class="jp-interface">
                        <ul class="jp-controls">
                            <li><div class="seperator-first"></div></li>
                            <li><div class="seperator-second"></div></li>
                            <li><a href="#" class="jp-play" tabindex="1">play</a></li>
                            <li><a href="#" class="jp-pause" tabindex="1">pause</a></li>
                            <li><a href="#" class="jp-mute" tabindex="1">mute</a></li>
                            <li><a href="#" class="jp-unmute" tabindex="1">unmute</a></li>
                        </ul>
                        <div class="jp-progress-container">
                            <div class="jp-progress">
                                <div class="jp-seek-bar">
                                    <div class="jp-play-bar"></div>
                                </div>
                            </div>
                        </div>
                        <div class="jp-volume-bar-container">
                            <div class="jp-volume-bar">
                                <div class="jp-volume-bar-value"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
}

function format_quote() {
    global $post;

    $quote_text = get_post_meta($post->ID, 'format_quote_text', true);
    $quote_author = get_post_meta($post->ID, 'format_quote_author', true);

    if (!empty($quote_text)) {
        echo '<blockquote>';
        echo "<p>" . $quote_text . "</p>";
        if (!empty($quote_author)) {
            echo "<span>" . $quote_author . "</span>";
        }
        echo "</blockquote>";
    }
}

function format_link() {
    global $post;

    $link_url = get_post_meta($post->ID, 'format_link_url', true);
    $url = !empty($link_url) ? to_url($link_url) : "#";
    echo '<div class="link-content">';
    echo '<h2 class="link-text"><a href="' . $url . '" target="_blank">' . get_the_title() . '</a></h2>';
    echo '<a href="' . $url . '" target="_blank"><span class="sub-title">' . $url . '</span></a></div>';
}

function format_status() {
    global $post;

    $status_url = get_post_meta($post->ID, 'format_status_url', true);
    if (!empty($status_url)) {
        echo apply_filters("the_content", $status_url);
    }
}

function pagination() {
    global $wp_query;

    $pages = $wp_query->max_num_pages;
    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

    if (empty($pages)) {
        $pages = 1;
    }

    if (1 != $pages) {

        $big = 9999; // need an unlikely integer
        echo "<div class='ott-pagination pagination'>";

        $pagination = paginate_links(
                array(
                    'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
                    'end_size' => 3,
                    'mid_size' => 6,
                    'format' => '?paged=%#%',
                    'current' => max(1, get_query_var('paged')),
                    'total' => $wp_query->max_num_pages,
                    'type' => 'list',
                    'prev_text' => __('&laquo;', 'otouch'),
                    'next_text' => __('&raquo;', 'otouch'),
        ));

        echo $pagination;

        echo "</div>";
    }
}

if (!function_exists('infinite')) {

    function infinite() {
        global $wp_query;
        $pages = intval($wp_query->max_num_pages);
        $paged = (get_query_var('paged')) ? intval(get_query_var('paged')) : 1;
        if (empty($pages)) {
            $pages = 1;
        }
        if (1 != $pages) {
            echo '<div class="ott-pagination ott-infinite-scroll" data-has-next="' . ($paged === $pages ? 'false' : 'true') . '">';
            echo '<a class="inf-btn no-more" href="#">' . __('No more posts', 'otouch') . '</a>';
            echo '<a class="inf-btn loading" href="#"><span>' . __('Loading posts ...', 'otouch') . '</span></a>';
            echo '<a class="inf-btn next" href="' . get_pagenum_link($paged + 1) . '"><i class="icon-tasks"></i>' . __('Load More Items', 'otouch') . '</a>';
            echo '</div>';
        }
    }

}

function comment_count() {

    if (comments_open()) {

//        if (get_settings_value('facebook_comment')) {
//            return '<fb:comments-count data-href="' . get_permalink() . '"></fb:comments-count>';
//        } else {

        $comment_count = get_comments_number('0', '1', '%');
        if ($comment_count == 0) {
            $comment_trans = __('No comment', 'otouch');
        } elseif ($comment_count == 1) {
            $comment_trans = __('One comment', 'otouch');
        } else {
            $comment_trans = $comment_count . ' ' . __('comments', 'otouch');
        }
        return "<a href='" . get_comments_link() . "' title='" . $comment_trans . "' class='comment-count'>" . $comment_trans . "</a>";
//        }
    }
}

if (!function_exists('mytheme_comment')) {

    function mytheme_comment($comment, $args, $depth) {

        $GLOBALS['comment'] = $comment;
        print '<div class="comment-block">';
        ?>	
        <div class="comment" id="comment-<?php comment_ID(); ?>">
            <div class="comment-author"><span class="reply-line"></span>
                        <?php echo get_avatar($comment, $size = '70'); ?>
                <div class="comment-meta">
                    <span class="comment-author-link">
                        <?php echo __('By', 'otouch') . " " . get_comment_author_link() . " - "; ?>
                    </span>                            
                    <span class="comment-date">
        <?php printf(__('%1$s', 'otouch'), get_comment_date('j F Y')); ?>
                    </span>
                    <span class="comment-replay-link"><?php comment_reply_link(array_merge($args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?></span>
                </div>
            </div>
            <div class="comment-body">
        <?php comment_text() ?>
            </div>
        </div><?php
    }

}






if (!function_exists('ott_comment_form')) {

    function ott_comment_form($fields) {
        global $id, $post_id;
        if (null === $post_id)
            $post_id = $id;
        else
            $id = $post_id;

        $commenter = wp_get_current_commenter();

        $req = get_option('require_name_email');
        $aria_req = ( $req ? " aria-required='true'" : '' );
        $fields = array(
            'author' => '<div class="row-fluid"><div class="comment-form-author"><p>' .
            '<input placeholder="' . __('Name', 'otouch') . '" id="author" name="author" type="text" value="' . esc_attr($commenter['comment_author']) . '" size="30"' . $aria_req . ' /></p>',
            'email' => '<p class="comment-form-email">' .
            '<input placeholder="' . __('Email', 'otouch') . '" id="email" name="email" type="text" value="' . esc_attr($commenter['comment_author_email']) . '" size="30"' . $aria_req . ' /></p></div>'
        );
        return $fields;
    }

    add_filter('comment_form_default_fields', 'ott_comment_form');
}
if (!function_exists('post_image_show')) {

    function post_image_show($width = 0, $height = "", $returnURL = false) {
        global $post;
        if (has_post_thumbnail($post->ID)) {
            $attachment = get_post(get_post_thumbnail_id($post->ID));
            if (isset($attachment)) {
                $lrg_img = wp_get_attachment_image_src($attachment->ID, 'full');
                $url = $lrg_img[0];
                if($returnURL) {
                    return $url;
                } else {
                    $alt = get_post_meta($attachment->ID, '_wp_attachment_image_alt', true);
                    $alt = !empty($alt) ? $alt : $attachment->post_title;
                    if ($width != 0) {
                        $url = aq_resize($url, $width, $height, true);
                    }
                    $urll = !empty($url) ? $url : $lrg_img[0];
                    return '<img src="' . $urll . '" alt="' . $alt . '"/>';
                }  
            }
            else
                return false;
        }
        return false;
    }

}
if (!function_exists('about_author')) {

    function about_author() {
        $ott_author = false;
        if (get_metabox("post_authorr") == "true") {
            $ott_author = true;
        } else if (get_metabox("post_authorr") != "false") {
            if (ott_option('post_author')) {
                $ott_author = true;
            }
        }
        if ($ott_author) {
            ?>
            <div class="ott-author clearfix">
                <div class="author-image"><?php
                    $ott_author_email = get_the_author_meta('email');
                    echo get_avatar($ott_author_email, $size = '70');
                    ?>
                </div>
                <h3><?php
                    _e("Written by ", "otouch");
                    if (is_author())
                        the_author();
                    else
                        the_author_posts_link();
                    ?>
                </h3>
                <div class="author-title-line"></div>
                <p><?php
                    $description = get_the_author_meta('description');
                    if ($description != '')
                        echo $description;
                    else
                        _e('The author didnt add any Information to his profile yet', 'otouch');
                    ?>
                </p>
            </div><?php
        }
    }

}

function related_portfolios() {
    global $post, $ott_options, $portAtts;

    $tags = wp_get_post_terms($post->ID, 'cat_portfolio', array("fields" => "ids"));

    if ($tags) {
        $rel_title = ott_option('translate_relatedportfolio') ? ott_option('translate_relatedportfolio') : __('Related portfolio items', 'otouch');
        echo '<div class="ott-divider" style="margin:30px 0;"></div><div class="ott-title-container"><div class="section-title-content">';
		echo '<h3 class="ott-section-title">' . $rel_title . '</h3>';
		echo '<span class="section-line"></span></div></div>';
	
		
        $tag_ids = "";
        foreach ($tags as $tag)
            $tag_ids .= $tag . ",";


        $query = Array(
            'post_type' => 'ott_portfolio',
            'posts_per_page' => '4',
            'post__not_in' => array($post->ID),
            'tax_query' => Array(Array(
                    'taxonomy' => 'cat_portfolio',
                    'terms' => $tag_ids,
                    'field' => 'id'
                ))
        );
        query_posts($query);
        $ott_options['pagination'] = 'none';
        $portAtts['hide_favorites'] = ott_option('hide_favorites')?'true':'false';
        echo '<div class="row"><div class="span12 related_portfolios"><div class="ott-portfolio">';
        get_template_part("loop", "portfolio");
        echo '</div></div>';
    }
}

function related_news() {
    global $post, $ott_options, $portAtts;

    $tags = wp_get_post_terms($post->ID, 'cat_news', array("fields" => "ids"));

    if ($tags) {
        $rel_title = ott_option('translate_relatedportfolio') ? ott_option('translate_relatedportfolio') : __('Related portfolio items', 'otouch');
        echo '<div class="ott-divider" style="margin:30px 0;"></div><div class="ott-title-container"><div class="section-title-content">';
		echo '<h3 class="ott-section-title">' . $rel_title . '</h3>';
		echo '<span class="section-line"></span></div></div>';
	
		
        $tag_ids = "";
        foreach ($tags as $tag)
            $tag_ids .= $tag . ",";


        $query = Array(
            'post_type' => 'ott_news',
            'posts_per_page' => '4',
            'post__not_in' => array($post->ID),
            'tax_query' => Array(Array(
                    'taxonomy' => 'cat_news',
                    'terms' => $tag_ids,
                    'field' => 'id'
                ))
        );
        query_posts($query);
        $ott_options['pagination'] = 'none';
        $portAtts['hide_favorites'] = ott_option('hide_favorites')?'true':'false';
        echo '<div class="row"><div class="span12 related_portfolios"><div class="ott-portfolio">';
        get_template_part("loop", "portfolio");
        echo '</div></div>';
    }
}



function related_team() {
    global $post, $ott_options, $portAtts;

    $tags = wp_get_post_terms($post->ID, 'cat_team', array("fields" => "ids"));

    if ($tags) {
        $rel_title = ott_option('translate_relatedportfolio') ? ott_option('translate_relatedportfolio') : __('Related Team items', 'otouch');
        echo '<div class="ott-divider" style="margin:30px 0;"></div><div class="ott-title-container"><div class="section-title-content">';
		echo '<h3 class="ott-section-title">' . $rel_title . '</h3>';
		echo '<span class="section-line"></span></div></div>';
	
		
        $tag_ids = "";
        foreach ($tags as $tag)
            $tag_ids .= $tag . ",";


        $query = Array(
            'post_type' => 'ott_team',
            'posts_per_page' => '4',
            'post__not_in' => array($post->ID),
            'tax_query' => Array(Array(
                    'taxonomy' => 'cat_team',
                    'terms' => $tag_ids,
                    'field' => 'id'
                ))
        );
        query_posts($query);
        $ott_options['pagination'] = 'none';
        $portAtts['hide_favorites'] = ott_option('hide_favorites')?'true':'false';
        echo '<div class="row"><div class="span12 related_portfolios"><div class="ott-portfolio">';
        get_template_part("loop", "portfolio");
        echo '</div></div>';
    }
}

function vimeo_youtube_image($embed) {

    preg_match('/src=\"(.*?)\"/si', $embed, $filteredContent);

    if (!empty($filteredContent[1])) {
        $url = $filteredContent[1];
        $youtube = strpos($url, 'youtube.com');
        $youtu = strpos($url, 'youtu.be');
        $vimeo = strpos($url, 'vimeo.com');

        $video_id = '';
        $spliturl = explode("/", $url);
        $video_id = $spliturl[count($spliturl) - 1];
        if ($video_id == "") {
            $video_id = $spliturl[count($spliturl) - 2];
        }
    } else {
        $url = $embed;
        $youtube = strpos($url, 'youtube.com');
        $youtu = strpos($url, 'youtu.be');
        $vimeo = strpos($url, 'vimeo.com');

        $video_id = '';
        $spliturl = explode("/", $url);
        $video_id = $spliturl[count($spliturl) - 1];
        if ($video_id == "") {
            $video_id = $spliturl[count($spliturl) - 2];
        } else {
            $spliturl = explode("=", $url);
            $video_id = $spliturl[count($spliturl) - 1];
        }
    }

    $video_img = '';

    if ($youtube || $youtu) {
        $video_img = '<img src="http://img.youtube.com/vi/' . $video_id . '/0.jpg" class="image_youtube" />';
    } else if ($vimeo) {
        $json = @file_get_contents("http://vimeo.com/api/oembed.json?url=http%3A//vimeo.com/" . $video_id, true);
        if (strpos($http_response_header[0], "200")) {
            $data = json_decode($json, true);
            $video_thumb = $data['thumbnail_url'];
            $video_thumb = str_replace("_1280", "_640", $video_thumb);
            $video_img = '<img src="' . $video_thumb . '" class="image_vimeo" />';
        }
        if (strlen($video_img) < 1) {
            $video_img = "";
        }
    }

    return $video_img;
}




function ott_social_share() {
    $post_link = get_permalink();
    
    $output = '<div class="ott_post_sharebox clearfix">';
    
    if(ott_option('facebook_share'))
    $output .= '<div class="facebook_share"><iframe src="http'.(is_ssl()?'s':'').'://www.facebook.com/plugins/like.php?href=' . urlencode($post_link) . '&amp;layout=button_count&amp;show_faces=false&amp;width=70&amp;action=like&amp;font=verdana&amp;colorscheme=light&amp;height=21" scrolling="no" frameborder="0" allowTransparency="true"></iframe></div>';

    if(ott_option('googleplus_share'))
    $output .= '<div class="googleplus_share"><g:plusone size="medium" href="' . $post_link . '"></g:plusone></div>';

    if(ott_option('twitter_share')) {
        $post_title = get_the_title();
        $output .= '<div class="twitter_share"><a href="http'.(is_ssl()?'s':'').'://twitter.com/share" class="twitter-share-button" data-url="'. $post_link .'" data-width="100"  data-text="'. $post_title . '" data-count="horizontal"></a></div>';
    }
    
    if(ott_option('pinterest_share')) {
        $post_image = post_image_show(0,0,true);
        $output .= '<div class="pinterest_share"><a href="http'.(is_ssl()?'s':'').'://pinterest.com/pin/create/button/?url=' . $post_link . '&media=' . $post_image . '" class="pin-it-button" count-layout="horizontal"></a></div>';
    }
    
    if(ott_option('linkedin_share'))
    $output .= '<div class="linkedin_share"><script type="in/share" data-url="' . $post_link . '" data-counter="right"></script></div>';
    
    $output .= '</div>';

    return $output;
}
function isMobile(){return(preg_match('/(alcatel|amoi|android|avantgo|blackberry|benq|cell|cricket|docomo|elaine|htc|iemobile|iphone|ipad|ipaq|ipod|j2me|java|midp|mini|mmp|mobi|motorola|nec-|nokia|palm|panasonic|philips|phone|sagem|sharp|sie-|smartphone|sony|symbian|t-mobile|telus|up\.browser|up\.link|vodafone|wap|webos|wireless|xda|xoom|zte)/i', $_SERVER['HTTP_USER_AGENT']));}

?>