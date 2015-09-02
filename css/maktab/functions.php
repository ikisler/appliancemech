<?php

$theme_path = get_template_directory_uri();
define('THEME_PATH', get_template_directory());
define('THEME_DIR', get_template_directory_uri());
define('STYLESHEET_PATH', get_stylesheet_directory());
define('STYLESHEET_DIR', get_stylesheet_directory_uri());
define( 'WS_BASE_DIR', get_template_directory() . '/' );
define( 'WS_BASE_URL', get_template_directory_uri() . '/' );


/// admin
require_once (THEME_PATH . "/framework/admin/index.php");

/// theme_functions
require_once (THEME_PATH . "/inc/theme_functions.php");
require_once (THEME_PATH . "/inc/googlefonts.php");
require_once (THEME_PATH . "/inc/webink.php");
require_once (THEME_PATH . "/inc/aq_resizer.php");
require_once (THEME_PATH . "/inc/breadcrumbs.php");
require_once (THEME_PATH . "/inc/sidebar_generator.php");
require_once (THEME_PATH . "/inc/post-format.php");


// shortcode and page builder
require_once (THEME_PATH . "/framework/post-type/post-type.php");
require_once (THEME_PATH . "/framework/pagebuilder/pagebuilder.php");
require_once (THEME_PATH . "/framework/shortcode/shortcode.php");

// css
require_once (THEME_PATH . "/inc/theme_css.php");

// widgets
require_once (THEME_PATH . "/inc/lib/widget/dribbble_widget.php");
require_once (THEME_PATH . "/inc/lib/widget/flickr_widget.php");
require_once (THEME_PATH . "/inc/lib/widget/twitter_widget.php");
require_once (THEME_PATH . "/inc/lib/widget/contact_widget.php");
require_once (THEME_PATH . "/inc/lib/widget/portfolio_widget.php");
require_once (THEME_PATH . "/inc/lib/widget/posts_widget.php");
require_once (THEME_PATH . "/inc/lib/widget/why_widget.php");

require_once (THEME_PATH . "/inc/lib/widget/login_widget.php");
require_once (THEME_PATH . "/inc/lib/widget/advertising_widgets_small.php");
require_once (THEME_PATH . "/inc/lib/widget/advertising_widgets_lrg.php");
require_once (THEME_PATH . "/inc/lib/widget/Social_Widget.php");


// woocommerce
require_once (THEME_PATH . "/framework/woocommerce/woocommerce.php");
require_once (THEME_PATH . "/framework/woocommerce/int.php");


?>