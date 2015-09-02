<?php    
$selectsidebar = array();
$selectsidebar["Default sidebar"] = "Default sidebar";
$sidebars = get_option('sbg_sidebars');
if (!empty($sidebars)) {
    foreach ($sidebars as $sidebar) {
        $selectsidebar[$sidebar] = $sidebar;
    }
}
$slides = get_terms('slides', 'hide_empty=0');
$header_type = array(
    'subtitle'=>'Title and Subtitle',
    'slider'=>'Flex Slider',
	'flex2'=>'Camera Slider',
	'flex3'=>'Flex Minimal',
	'revolution_slider'=>'Revolution slider',
    'none'=>'None');


/* * *********************** */
/* Post options */
/* * *********************** */
$ott_post_settings = Array(
    Array(        
        'name' => __('Post Author Show?', 'otouch'),
        'desc' => __('Default setting will take from theme options.', 'otouch'),
        'id' => 'post_authorr',
        'std' => 'default',
        'type' => 'selectbox'),
    Array(        
        'name' => __('Featured Media Show?', 'otouch'),
        'desc' => __('Default setting will take from theme options.', 'otouch'),
        'id' => 'feature_show',
        'std' => 'default',
        'type' => 'selectbox'),
    Array(        
        'name' => __('Featured Image Height?', 'otouch'),
        'desc' => __('Image height (px).', 'otouch'),
        'id' => 'image_height',
        'std' => '350',
        'type' => 'text'),
    Array(        
        'name' => __('Breadcrumbs on this page?', 'otouch'),
        'desc' => __('Default setting will take from theme options.', 'otouch'),
        'id' => 'breadcrumps',
        'std' => 'default',
        'type' => 'selectbox'),
    Array(        
        'name' => __('Choose Post Layout?', 'otouch'),
        'desc' => __('', 'otouch'),
        'id' => 'layout',
        'std' => 'right',
        'type' => 'layout'),
    Array(        
        'name' => __('Choose Sidebar ?', 'otouch'),
        'desc' => __('', 'otouch'),
        'id' => 'sidebar',
        'options' => $selectsidebar,
        'std' => 'Default sidebar',
        'type' => 'select')
);


/* * *********************** */
/* Page options */
/* * *********************** */
$ott_page_settings = Array(
    Array(
        'name' => __('Header type ?', 'otouch'),
        'desc' => __('', 'otouch'),
        'id' => 'header_type',
        'std' => 'subtitle',
        'options' => $header_type,
        'type' => 'select'),
    Array(
        'name' => __('Select Slideshow', 'otouch'),
        'desc' => __('All of your created sliders will be included here.', 'otouch'),
        'id' => 'slider_id',
        'type' => 'slideshow'),
    Array(
        'name' => __('Sub Title', 'otouch'),
        'desc' => __('', 'otouch'),
        'id' => 'subtitle',
        'type' => 'text'),
    Array(
        'name' => __('Background image of page title', 'otouch'),
        'desc' => __('', 'otouch'),
        'id' => 'bg_image',
        'type' => 'file'),
    Array(        
        'name' => __('Breadcrumbs on this post?', 'otouch'),
        'desc' => __('Default setting will take from theme options.', 'otouch'),
        'id' => 'breadcrumps',
        'std' => 'default',
        'type' => 'selectbox'),
);


/* * *********************** */
/* slides options */
/* * *********************** */
$ott_slide_settings = Array(
    Array(
        'name' => __('Custom url', 'otouch'),
        'desc' => __('Please Enter Slide Custom url', 'otouch'),
        'id' => 'custom_link',
        'type' => 'text'),
    Array(
        'name' => __('Slide Custom url Text', 'otouch'),
        'desc' => __('Please Enter Slide Custom url Text', 'otouch'),
        'id' => 'custom_link_text',
        'type' => 'text'),
);


/* * *********************** */
/* Portfolio options */
/* * *********************** */
$ott_portfolio_settings = Array(
    Array(
        'name' => __('Sub Title', 'otouch'),
        'desc' => __('', 'otouch'),
        'id' => 'subtitle',
        'type' => 'text'),
    Array(
        'name' => __('Background image of page title', 'otouch'),
        'desc' => __('', 'otouch'),
        'id' => 'bg_image',
        'type' => 'file'),
    Array(
        'name' => __('Preview url', 'otouch'),
        'desc' => __('Preview url', 'otouch'),
        'id' => 'preview_url',
        'type' => 'text'),
    Array(
        'name' => __('Image height', 'otouch'),
        'desc' => __('Image height on single portfolio', 'otouch'),
        'id' => 'image_height',
        'type' => 'text'),
    Array(
        'name' => __('Project Date', 'otouch'),
        'desc' => __('Project date', 'otouch'),
        'id' => 'project_date',
        'type' => 'text'),
    Array(
        'name' => __('Project Cost', 'otouch'),
        'desc' => __('Project Cost', 'otouch'),
        'id' => 'project_cost',
        'type' => 'text'),
    Array(
        'name' => __('Client Name', 'otouch'),
        'desc' => __('Project Client Name', 'otouch'),
        'id' => 'project_name',
        'type' => 'text'),
		
		
);
$ott_portfolio_gallery = array(
        array( "name" => __('Upload images', 'otouch'),
                        "desc" => __('Select the images that should be upload to this gallery', 'otouch'),
                        "id" => "gallery_image_ids",
                        "type" => 'gallery'
                ),
        array( "name" => __('Gallery height', 'otouch'),
                        "desc" => __('Gallery height on single portfolio', 'otouch'),
                        "id" => "format_image_height",
                        "type" => 'text'
                )
);
$ott_portfolio_video = array(
        array( "name" => __('Embeded Code','otouch'),
                        "desc" => __('If you\'re not using self hosted video then you can include embeded code here.','otouch'),
                        "id" => "format_video_embed",
                        "type" => "textarea",
                        'std' => ''
        ),
        array(
            'name' => __('Show light box?', 'otouch'),
            'desc' => __('It works when featured image is selected.', 'otouch'),
            'id' => 'pretty_video',
            'options' => array('true'=>'Yes','false'=>'No'),
            'std' => 'false',
            'type' => 'select'
        ),
        array( 
            "name" => __('Pretty Video URL', 'otouch'),
            "desc" => __('', 'otouch'),
            "id" => "pretty_video_url",
            "type" => 'text'
        ),
);


/* * *********************** */
/* Testimonial options */
/* * *********************** */
$ott_testimonial_settings = Array(
    Array(
        'name' => __('Name', 'otouch'),
        'desc' => __('', 'otouch'),
        'id' => 'name',
        'type' => 'text'),
    Array(
        'name' => __('Company name', 'otouch'),
        'desc' => __('', 'otouch'),
        'id' => 'company',
        'type' => 'text'),
    Array(
        'name' => __('Link to url', 'otouch'),
        'desc' => __('', 'otouch'),
        'id' => 'url',
        'type' => 'text'),
);




/* * *********************** */
/* Team options */
/* * *********************** */
$ott_team_settings = Array(

    Array(
        'name' => __('Position', 'otouch'),
        'desc' => __('Member position', 'otouch'),
        'id' => 'position',
        'type' => 'text'),
    Array(
        'name' => __('Facebook url', 'otouch'),
        'desc' => __('Facebook url', 'otouch'),
        'id' => 'facebook',
        'type' => 'text'),
    Array(
        'name' => __('Google Plus url', 'otouch'),
        'desc' => __('Google Plus url', 'otouch'),
        'id' => 'google',
        'type' => 'text'),
    Array(
        'name' => __('Twitter url', 'otouch'),
        'desc' => __('Twitter url', 'otouch'),
        'id' => 'twitter',
        'type' => 'text'),
    Array(
        'name' => __('Linkedin url', 'otouch'),
        'desc' => __('Linkedin url', 'otouch'),
        'id' => 'linkedin',
        'type' => 'text'),
    Array(
        'name' => __('Dribbble User Name', 'onetouch'),
        'desc' => __('Dribbble User Name', 'onetouch'),
        'id' => 'dribbble',
        'type' => 'text'),

);


/* * *********************** */
/* Partner options */
/* * *********************** */
$ott_partner_settings = Array(
    Array(
        'name' => __('Partner Link to URL', 'otouch'),
        'desc' => __('', 'otouch'),
        'id' => 'link',
        'type' => 'text'),
);


/* * *********************** */
/* News options */
/* * *********************** */
$ott_news_settings = Array(
    Array(
        'name' => __('Partner Link to URL', 'otouch'),
        'desc' => __('', 'otouch'),
        'id' => 'link',
        'type' => 'text'),
		
);




/* * *********************** */
/* Partner options */
/* * *********************** */
$ott_gallery_settings = Array(
    Array(
        'name' => __('Partner Link to URL', 'otouch'),
        'desc' => __('', 'otouch'),
        'id' => 'link',
        'type' => 'text'),
);

$ott_gallery_gallery = array(
        array( "name" => __('Upload images', 'otouch'),
                        "desc" => __('Select the images that should be upload to this gallery', 'otouch'),
                        "id" => "gallery_image_ids",
                        "type" => 'gallery'
                ),
        array( "name" => __('Gallery height', 'otouch'),
                        "desc" => __('Gallery height on single portfolio', 'otouch'),
                        "id" => "format_image_height",
                        "type" => 'text'
                )
);



/* * *********************** */
/* Project options */
/* * *********************** */
$ott_project_settings = Array(

    Array(
        'name' => __('project_technology', 'otouch'),
        'desc' => __('project_technologyl', 'otouch'),
        'id' => 'project_technology',
        'type' => 'text'),
    Array(
        'name' => __('Project Date', 'otouch'),
        'desc' => __('Project date', 'otouch'),
        'id' => 'project_date',
        'type' => 'text'),
    Array(
        'name' => __('Project Cost', 'otouch'),
        'desc' => __('Project Cost', 'otouch'),
        'id' => 'project_cost',
        'type' => 'text'),
    Array(
        'name' => __('project_client', 'otouch'),
        'desc' => __('', 'otouch'),
        'id' => 'project_client',
        'type' => 'text'),
    Array(
        'name' => __('project_client_brief', 'otouch'),
        'desc' => __('project_client_brief', 'otouch'),
        'id' => 'project_client_brief',
        'type' => 'text'),

    Array(
        'name' => __('project_client_logo', 'otouch'),
        'desc' => __('', 'otouch'),
        'id' => 'project_client_logo',
        'type' => 'file'),


		
		
);
$ott_project_gallery = array(
        array( "name" => __('Upload images', 'otouch'),
                        "desc" => __('Select the images that should be upload to this gallery', 'otouch'),
                        "id" => "gallery_image_ids",
                        "type" => 'gallery'
                ),
        array( "name" => __('Gallery height', 'otouch'),
                        "desc" => __('Gallery height on single portfolio', 'otouch'),
                        "id" => "format_image_height",
                        "type" => 'text'
                )
);
$ott_project_video = array(
        array( "name" => __('Embeded Code','otouch'),
                        "desc" => __('If you\'re not using self hosted video then you can include embeded code here.','otouch'),
                        "id" => "format_video_embed",
                        "type" => "textarea",
                        'std' => ''
        ),
        array(
            'name' => __('Show light box?', 'otouch'),
            'desc' => __('It works when featured image is selected.', 'otouch'),
            'id' => 'pretty_video',
            'options' => array('true'=>'Yes','false'=>'No'),
            'std' => 'false',
            'type' => 'select'
        ),
        array( 
            "name" => __('Pretty Video URL', 'otouch'),
            "desc" => __('', 'otouch'),
            "id" => "pretty_video_url",
            "type" => 'text'
        ),
);

/* * *********************** */
/* Pricing table options */
/* * *********************** */
$ott_price_settings = Array(
    Array(
        'name' => __('Color', 'otouch'),
        'desc' => __('', 'otouch'),
        'id' => 'color',
        'type' => 'color'),
    Array(
        'name' => __('Type', 'onetouch'),
        'desc' => __('', 'onetouch'),
        'id' => 'type',
        'options' => array('general' => 'General', 'featured' => 'Featured'),
        'type' => 'select'),

    Array(
        'name' => __('Price', 'otouch'),
        'desc' => __('Please insert with $ symbol.', 'otouch'),
        'id' => 'price',
        'type' => 'text'),
	Array(
        'name' => __('SubTitle', 'onetouch'),
        'desc' => __('This will displayed bottom of your Pricing Table title.', 'onetouch'),
        'id' => 'subtitle',
        'type' => 'text'),
	Array(
        'name' => __('Sub Price', 'otouch'),
        'desc' => __('Please insert value.', 'otouch'),
        'id' => 'subprice',
        'std' => __(".00", "otouch"),
        'type' => 'text'),
    Array(
        'name' => __('Price Time', 'otouch'),
        'desc' => __('Price time option. Example: Month, Day, Year etc.', 'otouch'),        
        'id' => 'time',
        'std' => __("month", "otouch"),
        'type' => 'text'),
    Array(
        'name' => __('Button text', 'otouch'),
        'desc' => __('', 'otouch'),
        'id' => 'buttontext',
        'type' => 'text'),
    Array(
        'name' => __('Button URL', 'otouch'),
        'desc' => __('', 'otouch'),
        'id' => 'buttonlink',
        'type' => 'text'),
);


add_action('admin_init', 'post_settings_custom_box', 1);
if (!function_exists('post_settings_custom_box')) {
    function post_settings_custom_box() {
        global $ott_post_settings;
        add_meta_box('post_meta_settings',__( 'Post settings', 'otouch' ),'metabox_render','post','normal','high',$ott_post_settings);
    }
}

add_action('admin_init', 'page_settings_custom_box', 2);
if (!function_exists('page_settings_custom_box')) {
    function page_settings_custom_box() {
        global $ott_page_settings;
        add_meta_box('page_meta_settings',__( 'Page settings', 'otouch' ),'metabox_render','page','normal','high',$ott_page_settings);
    }
}

add_action('admin_init', 'portfolio_settings_custom_box');
if (!function_exists('portfolio_settings_custom_box')) {
    function portfolio_settings_custom_box() {
        global $ott_portfolio_settings,$ott_portfolio_gallery,$ott_portfolio_video;
        add_meta_box('portfolio_meta_settings',__( 'Portfolio settings', 'otouch' ),'metabox_render','ott_portfolio','normal','high',$ott_portfolio_settings);
        add_meta_box('portfolio_gallery_settings',__( 'Portfolio gallery settings', 'otouch' ),'metabox_render','ott_portfolio','normal','high',$ott_portfolio_gallery);
        add_meta_box('portfolio_video_settings',__( 'Portfolio video settings', 'otouch' ),'metabox_render','ott_portfolio','normal','high',$ott_portfolio_video);
    }
}

add_action('admin_init', 'testimonial_settings_custom_box');
if (!function_exists('testimonial_settings_custom_box')) {
    function testimonial_settings_custom_box() {
        global $ott_testimonial_settings;
        add_meta_box('testimonial_meta_settings',__( 'Testimonial settings', 'otouch' ),'metabox_render','ott_testimonial','normal','high',$ott_testimonial_settings);
    }
}

add_action('admin_init', 'team_settings_custom_box');
if (!function_exists('team_settings_custom_box')) {
    function team_settings_custom_box() {
        global $ott_team_settings;
        add_meta_box('team_meta_settings',__( 'Team settings', 'otouch' ),'metabox_render','ott_team','normal','high',$ott_team_settings);
    }
}


add_action('admin_init', 'slide_settings_custom_box');
if (!function_exists('slide_settings_custom_box')) {
    function slide_settings_custom_box() {
        global $ott_slide_settings;
        add_meta_box('slide_meta_settings',__( 'Slide settings', 'otouch' ),'metabox_render','ott_slide','normal','high',$ott_slide_settings);
    }
}

add_action('admin_init', 'partner_settings_custom_box');
if (!function_exists('partner_settings_custom_box')) {
    function partner_settings_custom_box() {
        global $ott_partner_settings;
        add_meta_box('partner_meta_settings',__( 'Partner settings', 'otouch' ),'metabox_render','ott_partner','normal','high',$ott_partner_settings);
    }
}


add_action('admin_init', 'news_settings_custom_box');
if (!function_exists('news_settings_custom_box')) {
    function news_settings_custom_box() {
        global $ott_news_settings;
        add_meta_box('news_meta_settings',__( 'News settings', 'otouch' ),'metabox_render','ott_news','normal','high',$ott_news_settings);
    }
}


add_action('admin_init', 'project_settings_custom_box');
if (!function_exists('project_settings_custom_box')) {
    function project_settings_custom_box() {
        global $ott_project_settings,$ott_project_gallery,$ott_project_video;
        add_meta_box('portfolio_meta_settings',__( 'Portfolio settings', 'otouch' ),'metabox_render','ott_project','normal','high',$ott_project_settings);
        add_meta_box('portfolio_gallery_settings',__( 'Portfolio gallery settings', 'otouch' ),'metabox_render','ott_project','normal','high',$ott_project_gallery);
        add_meta_box('portfolio_video_settings',__( 'Portfolio video settings', 'otouch' ),'metabox_render','ott_project','normal','high',$ott_project_video);
    }
}



add_action('admin_init', 'gallery_settings_custom_box');
if (!function_exists('gallery_settings_custom_box')) {
    function gallery_settings_custom_box() {
        global $ott_gallery_settings ,$ott_gallery_gallery;
        add_meta_box('gallery_meta_settings',__( 'Gallery settings', 'otouch' ),'metabox_render','ott_gallery','normal','high',$ott_gallery_settings);
		add_meta_box('gallery_gallery_settings',__( 'Project Photos settings', 'otouch' ),'metabox_render','ott_gallery','normal','high',$ott_gallery_gallery);
	
    }
}

add_action('admin_init', 'price_settings_custom_box');
if (!function_exists('price_settings_custom_box')) {
    function price_settings_custom_box() {
        global $ott_price_settings;
        add_meta_box('price_meta_settings',__( 'Price settings', 'otouch' ),'metabox_render','ott_price','normal','high',$ott_price_settings);
    }
} ?>