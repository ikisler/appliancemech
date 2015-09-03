<?php

add_action('init','of_options');

if (!function_exists('of_options'))
{
	function of_options()
	{
		//Access the WordPress Categories via an Array
		$of_categories 		= array();  
		$of_categories_obj 	= get_categories('hide_empty=0');
		foreach ($of_categories_obj as $of_cat) {
		    $of_categories[$of_cat->cat_ID] = $of_cat->cat_name;}
		$categories_tmp 	= array_unshift($of_categories, "Select a category:");    
	       
		//Access the WordPress Pages via an Array
		$of_pages 			= array();
		$of_pages_obj 		= get_pages('sort_column=post_parent,menu_order');    
		foreach ($of_pages_obj as $of_page) {
		$of_pages[$of_page->ID] = $of_page->post_name; }
		$of_pages_tmp 		= array_unshift($of_pages, "Select a page:");   
		$of_menu_style	= array("icon+desc" => "Mobile Menu","only_icon" => "Icon Menu", "minimal" => "Minimal" , "bottom" => "Bottom Menu" , "static" => "Backgrdound Menu");
		$title_layout 	= array("left" => "left","center" => "center" ,"centerBottom" => "centerBottom");
		$fixed_layout 	= array("dark" => "dark","light" => "light");

	
		//Testing 
		$of_layout_select 	= array("fullwidth" => "Fullwidth","boxed" => "Boxed Layout");
		$of_layout_width 	= array("1260re" => "1260 Layout","1000re" => "1000 Layout");
		
                $of_options_bg_repeat   = array("stretch" => "Strech Image","repeat" => "repeat","no-repeat" => "no-repeat","repeat-y" => "repeat-y","repeat-x" => "repeat-x");
        $of_options_bg_size   = array("auto" => "Auto","cover" => "Cover","contain" => "Contain");
		$of_options_radio 	= array("one" => "One","two" => "Two","three" => "Three","four" => "Four","five" => "Five");
        $border_width   	= array("1px" => "1px","2px" => "2px","3px" => "3px","4px" => "4px","5px" => "5px");
		
		$of_flex_trans	= array("slide" => "slide","fade" => "fade");
		$of_flex_type	= array("true" => "true","false" => "false");

		$of_camera_trans 	= array("random" => "random","simpleFade" => "simpleFade","curtainTopLeft" => "curtainTopLeft"
		,"curtainTopRight" => "curtainTopRight","curtainBottomLeft" => "curtainBottomLeft","curtainBottomRight" => "curtainBottomRight",
		"curtainSliceLeft" => "curtainSliceLeft","curtainSliceRight" => "curtainSliceRight","blindCurtainTopLeft" => "blindCurtainTopLeft",	"curtainTopLeft" => "curtainTopLeft","blindCurtainBottomLeft" => "blindCurtainBottomLeft","blindCurtainBottomRight" => "blindCurtainBottomRight"	,"blindCurtainSliceBottom" => "blindCurtainSliceBottom","blindCurtainSliceTop" => "blindCurtainSliceTop","stampede" => "stampede",		"mosaic" => "mosaic","mosaicReverse" => "mosaicReverse","mosaicRandom" => "mosaicRandom","mosaicSpiral" => "mosaicSpiral",	"mosaicSpiralReverse" => "mosaicSpiralReverse","topLeftBottomRight" => "topLeftBottomRight","bottomRightTopLeft" => "bottomRightTopLeft",		"bottomLeftTopRight" => "bottomLeftTopRight", "scrollLeft" => "scrollLeft","scrollRight" => "scrollRight",		"scrollHorz" => "scrollHorz",		"scrollBottom" => "scrollBottom","scrollTop" => "scrollTop",
		
		);
		
		
		
		//Sample Homepage blocks for the layout manager (sorter)
		$of_options_homepage_blocks = array
		( 
			"disabled" => array (
				"placebo" 		=> "placebo", //REQUIRED!
				"block_one"		=> "Block One",
				"block_two"		=> "Block Two",
				"block_three"	=> "Block Three",
			), 
			"enabled" => array (
				"placebo" 		=> "placebo", //REQUIRED!
				"block_four"	=> "Block Four",
			),
		);


		//Stylesheets Reader
		$alt_stylesheet_path = LAYOUT_PATH;
		$alt_stylesheets = array();
		
		if ( is_dir($alt_stylesheet_path) ) 
		{
		    if ($alt_stylesheet_dir = opendir($alt_stylesheet_path) ) 
		    { 
		        while ( ($alt_stylesheet_file = readdir($alt_stylesheet_dir)) !== false ) 
		        {
		            if(stristr($alt_stylesheet_file, ".css") !== false)
		            {
		                $alt_stylesheets[] = $alt_stylesheet_file;
		            }
		        }    
		    }
		}


		//Background Images Reader
		$bg_images_path = get_stylesheet_directory(). '/images/bg/'; // change this to where you store your bg images
		$bg_images_url = get_template_directory_uri().'/images/bg/'; // change this to where you store your bg images
		$bg_images = array();
		
		if ( is_dir($bg_images_path) ) {
		    if ($bg_images_dir = opendir($bg_images_path) ) { 
		        while ( ($bg_images_file = readdir($bg_images_dir)) !== false ) {
		            if(stristr($bg_images_file, ".png") !== false || stristr($bg_images_file, ".jpg") !== false) {
		                $bg_images[] = $bg_images_url . $bg_images_file;
		            }
		        }    
		    }
		}
		

		/*-----------------------------------------------------------------------------------*/
		/* TO DO: Add options/functions that use these */
		/*-----------------------------------------------------------------------------------*/
		
		//More Options
		$uploads_arr 		= wp_upload_dir();
		$all_uploads_path 	= $uploads_arr['path'];
		$all_uploads 		= get_option('of_uploads');
		$other_entries 		= array("Select a number:","1","2","3","4","5","6","7","8","9","10","11","12","13","14","15","16","17","18","19");
		$body_repeat 		= array("no-repeat","repeat-x","repeat-y","repeat");
		$body_pos 			= array("top left","top center","top right","center left","center center","center right","bottom left","bottom center","bottom right");
		
		// Image Alignment radio box
		$of_options_thumb_align = array("alignleft" => "Left","alignright" => "Right","aligncenter" => "Center"); 
		
		// Image Links to Options
		$of_options_image_link_to = array("image" => "The Image","post" => "The Post"); 


/*-----------------------------------------------------------------------------------*/
/* The Options Array */
/*-----------------------------------------------------------------------------------*/

// Set the Options Array
global $of_options,$ott_googlefonts;
$of_options = array();

/*      otouch custom admin section started     */
//      General TAB
$of_options[] = array( 	"name" 		=> "General",
						"type" 		=> "heading"
				);
				
$of_options[] = array( 	"name" 		=> __('Logo option heading','otouch'),
						"desc" 		=> "",
						"id" 		=> "logo_opt_info",
						"std" 		=> "<h3 style=\"margin: 3px;\">Logo options</h3>",
						"icon" 		=> true,
						"type" 		=> "info"
				);
$of_options[] = array( 	"name" 		=> __('Upload Standard Logo','otouch') ,
						"desc" 		=> __('Please insert your logo.','otouch')  ,
						"id" 		=> "theme_logo",
						"std" 		=> "",
						"mod" 		=> "min",
						"type" 		=> "upload"
				);				
$of_options[] = array( 	"name" 		=>  __('Logo Margin from Top','otouch'),
						"desc" 		=> __('Note: You need to insert only value.','otouch')  ,
						"id" 		=> "logo_top",
						"std" 		=> "30",
						"type" 		=> "text"
				);
$of_options[] = array( 	"name" 		=>  __('Logo Margin from Left','otouch')  ,
						"desc" 		=>  __('Note: You need to insert only value.','otouch') ,
						"id" 		=> "logo_left",
						"std" 		=> "0",
						"type" 		=> "text"
				);		


$of_options[] = array( 	"name" 		=>   __('Logo Margin from Bottom','otouch') ,
						"desc" 		=>   __('Note: You need to insert only value.','otouch')  ,
						"id" 		=> "logo_bottom",
						"std" 		=> "30",
						"type" 		=> "text"
				);		
				
				
$of_options[] = array( 	"name" 		=> __('Retina Logo','otouch') ,
						"desc" 		=> "",
						"id" 		=> "logo_retina",
						"std" 		=> 0,
						"folds" 	=> 1,
						"type" 		=> "switch"
				);
$of_options[] = array( 	"name" 		=>  __('Upload Retina Logo (2x)','otouch')  ,
						"desc" 		=>  __('Note: You retina logo must be larger than 2x. Example: Main logo 100x200 then Retina must be 200x400.','otouch'),
						"id" 		=> "theme_logo_retina",
						"std" 		=> "",
						"mod" 		=> "min",
                        "fold" 		=> "logo_retina", /* the checkbox hook */
						"type" 		=> "upload"
				);
				
$of_options[] = array( 	"name" 		=> __('Standard Logo Width','otouch')  ,
						"desc" 		=> __('You need to insert Non retina logo width. Height auto','otouch')   ,
						"id" 		=> "logo_width",
						"std" 		=> "",
						"fold" 		=> "logo_retina", /* the checkbox hook */
						"type" 		=> "text"
				);
				
	
		
$of_options[] = array( 	"name" 		=>   __('Favicon option heading','otouch') ,
						"desc" 		=> "",
						"id" 		=> "favicon_opt_info",
						"std" 		=> "<h3 style=\"margin: 3px;\">Favicon options</h3>",
						"icon" 		=> true,
						"type" 		=> "info"
				);
$of_options[] = array( 	"name" 		=>  __('Upload Standard Favicon','otouch')  ,
						"desc" 		=> "Please insert your favicon 16x16 icon. You may use <a href='http://www.favicon.cc/' target='_blank'>favicon.cc</a>",
						"id" 		=> "theme_favicon",
						"std" 		=> "",
						"mod" 		=> "min",
						"type" 		=> "upload"
				);
$of_options[] = array( 	"name" 		=> __('Retina Favicon','otouch')  ,
						"desc" 		=> "",
						"id" 		=> "favicon_retina",
						"std" 		=> 0,
						"folds" 	=> 1,
						"type" 		=> "switch"
				);
$of_options[] = array( 	"name" 		=> __('Favicon for iPhone (57x57)','otouch')  ,
						"desc" 		=> __('Please upload your favicon 57x57.','otouch')  ,
						"id" 		=> "favicon_iphone",
						"std" 		=> "",
						"mod" 		=> "min",
                                                "fold" 		=> "favicon_retina", /* the checkbox hook */
						"type" 		=> "upload"
				);
$of_options[] = array( 	"name" 		=> __('Retina Favicon for iPhone (114x114)','otouch') ,
						"desc" 		=> __('Please upload your favicon 114x114.','otouch')  ,
						"id" 		=> "favicon_iphone_retina",
						"std" 		=> "",
						"mod" 		=> "min",
                          "fold" 		=> "favicon_retina", /* the checkbox hook */
						"type" 		=> "upload"
				);



$of_options[] = array( 	"name" 		=> __('Tracking','otouch') ,
						"desc" 		=> "",
						"id" 		=> "track_code_info",
						"std" 		=> "<h3 style=\"margin: 3px;\">Tracking</h3>",
						"icon" 		=> true,
						"type" 		=> "info"
				);
$of_options[] = array( 	"name" 		=> __('Tracking Code','otouch') ,
						"desc" 		=> __('Paste your Google Analytics (or other) tracking code here. This will be added into the footer template of your theme.','otouch') ,
						"id" 		=> "tracking_code",
						"std" 		=> "",
						"type" 		=> "textarea"
				);
				
				
//     Layout Options

$of_options[] = array( 	"name" 		=> __('Layout Options','otouch') ,
						"type" 		=> "heading"
				);

$of_options[] = array( 	"name" 		=> __('Theme Layout','otouch') ,
						"desc" 		=> "",
						"id" 		=> "layout_theme_info",
						"std" 		=> "<h3 style=\"margin: 3px;\">Theme Layout</h3>",
						"icon" 		=> true,
						"type" 		=> "info"
				);
$of_options[] = array( 	"name" 		=> __('Theme Layout Style','otouch') ,
						"desc" 		=> __('Choose the Theme layout style.','otouch') ,
						"id" 		=> "theme_layout",
						"std" 		=> "boxed",
						"type" 		=> "select",
						"options" 	=> $of_layout_select
				);
		


$of_options[] = array( 	"name" 		=> __('Theme Layout Widht','otouch')  ,
						"desc" 		=> __('Choose the Theme layout style.','otouch'),
						"id" 		=> "theme_width",
						"std" 		=> "1000",
						"type" 		=> "select",
						"options" 	=> $of_layout_width
				);		

$of_options[] = array( 	"name" 		=> __('Boxed Wrapper Margin Top','otouch') ,
						"desc" 		=> __('Boxed Layout margin top.','otouch')  ,
						"id" 		=> "margin_top",
						"std" 		=> "30",
						"type" 		=> "text"
				);
$of_options[] = array( 	"name" 		=> __('Boxed Wrapper Margin Bottom','otouch') ,
						"desc" 		=> __('Boxed Layout margin bottom.','otouch') ,
						"id" 		=> "margin_bottom",
						"std" 		=> "30",
						"type" 		=> "text"
				);					


$of_options[] = array( 	"name" 		=> "General",
						"desc" 		=> "",
						"id" 		=> "general_info",
						"std" 		=> "<h3 style=\"margin: 3px;\">General Options</h3>",
						"icon" 		=> true,
						"type" 		=> "info"
				);
$of_options[] = array( 	"name" 		=> __('Page builder','otouch') ,
						"desc" 		=> __('Enable/Disable Page Builder for all pages.','otouch') ,
						"id" 		=> "pagebuilder",
						"std" 		=> 1,
						"folds" 	=> 1,
						"type" 		=> "switch"
				);
$of_options[] = array( 	"name" 		=> __('Ajax Page Scroll','otouch')  ,
						"desc" 		=> __('Enable/Disable Ajax Page Scroll.','otouch')  ,
						"id" 		=> "nicescroll",
						"std" 		=> 0,
						"folds" 	=> 1,
						"type" 		=> "switch"
				);
$of_options[] = array( 	"name" 		=>  __('Mobile animations','otouch')  ,
						"desc" 		=> __('Enable/Disable Mobile animations.','otouch')  ,
						"id" 		=> "moblile_animation",
						"std" 		=> 0,
						"type" 		=> "switch"
				);
$of_options[] = array( 	"name" 		=> __('Page Breadcrumps','otouch')  ,
						"desc" 		=> __('Enable/Disable Page Breadcrumps','otouch')    ,
						"id" 		=> "breadcrumps",
						"std" 		=> 1,
						"folds" 	=> 1,
						"type" 		=> "switch"
				);			
				
				
$of_options[] = array( 	"name" 		=> __('Sticky Menu','otouch')   ,
						"desc" 		=> __('Enable/Disable Page Sticky Menu','otouch')  ,
						"id" 		=> "menu_fixed",
						"std" 		=> 1,
						"folds" 	=> 1,
						"type" 		=> "switch"
				);					
					


$of_options[] = array( 	"name" 		=>  __('Top Page Settings','otouch')   ,
						"desc" 		=> "",
						"id" 		=> "top_social_bar",
						"std" 		=> "<h3 style=\"margin: 3px;\">Top Page Settings</h3>",
						"icon" 		=> true,
						"type" 		=> "info"
				);
				



$of_options[] = array( 	"name" 		=>  __('Header Search','otouch') ,
						"desc" 		=>  __('Enable/disable Header Search','otouch')  ,
						"id" 		=> "header_saerch",
						"std" 		=> 1,
                        "folds" 	=> 1,
						"type" 		=> "switch"
				);
								
	
$of_options[] = array( 	"name" 		=> 	__('Top Page Slide Panel','otouch')    ,
						"desc" 		=> __('Enable/disable Top Page Slide Panel','otouch')   ,
						"id" 		=> "slide_bar",
						"std" 		=> 0,
                        "folds" 	=> 0,
						"type" 		=> "switch"
				);
				
$of_options[] = array( 	"name" 		=> __('Top Panel Message','otouch')     ,
						"desc" 		=> __('Top Enter the Top Panel Message.','otouch')    ,
						"id" 		=> "toll_free",
						"std" 		=> "",
						"type" 		=> "textarea"
				);		
				
				
$of_options[] = array( 	"name" 		=> __('Header Hotline','otouch')     ,
						"desc" 		=> __('Enable/disable Header Hotline','otouch')     ,
						"id" 		=> "header_hotline",
						"std" 		=> 1,
                        "fold" 	=> "cart_bar",
						"type" 		=> "switch"
				);		
	
$of_options[] = array( 	"name" 		=> __('Header Right Area','otouch')     ,
						"desc" 		=> __('Enable/disable Header Right Area','otouch')      ,
						"id" 		=> "social_bar",
						"std" 		=> 1,
                        "folds" 	=> 1,
						"type" 		=> "switch"
				);

	
$of_options[] = array( 	"name" 		=> __('Header Cart','otouch')     ,
						"desc" 		=> __('Enable/disable Header Cart','otouch')     ,
						"id" 		=> "header_cart",
						"std" 		=> 1,
                        "fold" 	=> "social_bar",
						"type" 		=> "switch"
				);			


				
$of_options[] = array( 	"name" 		=> 	__('Social Icons','otouch')    ,
						"desc" 		=> __('Enable/Diable Top Page Social Icons','otouch') 	,
						"id" 		=> "social_icons",
						"std" 		=> 1,
                         "fold" 	=> "",
						"type" 		=> "switch"
				);	
				

$of_options[] = array( 	"name" 		=> __('Top Menu','otouch')    ,
						"desc" 		=> __('Enable/Diable Top Page Top Menu.','otouch')    ,
						"id" 		=> "tp_menu",
						"std" 		=> 1,
                         "fold" 	=> "social_bar",
						"type" 		=> "switch"
				);		

$of_options[] = array( 	"name" 		=> __('Top Language menu','otouch') ,
						"desc" 		=> __('Enable/Diable Top Page Top Language menu.','otouch')  ,
						"id" 		=> "tp_langs",
						"std" 		=> 1,
                         "fold" 	=> "social_bar",
						"type" 		=> "switch"
				);					

$of_options[] = array( 	"name" 		=> __('Boxed Layout','otouch')   ,
						"desc" 		=> "",
						"id" 		=> "layout_opt_boxed_info",
						"std" 		=> "<h3 style=\"margin: 3px;\">Boxed Layout Settings.</h3>",
						"icon" 		=> true,
						"type" 		=> "info"
				);
$of_options[] = array( 	"name" 		=> __('Background Color','otouch') ,
						"desc" 		=> __('Choose the background color.','otouch')    ,
						"id" 		=> "background_color",
						"std" 		=> "#d1d1d1",
						"type" 		=> "color"
				);
$of_options[] = array( 	"name" 		=> __('Background Image','otouch')   ,
						"desc" 		=> __('This option will only works under boxed layout chosen.','otouch')   ,
						"id" 		=> "mainbackground_image",
						"std" 		=> "",
						"mod" 		=> "min",
						"type" 		=> "upload"
				);
$of_options[] = array( 	"name" 		=> __('Background Image Repeat','otouch')   ,
						"desc" 		=> __('Choose the repeat or stretch image option.','otouch')   ,
						"id" 		=> "background_repeat",
						"std" 		=> "repeat",
						"type" 		=> "select",
						"options" 	=> $of_options_bg_repeat
				);
			

				

		
				
				
//      Pages Tab
$of_options[] = array( 	"name" 		=> "Pages",
						"type" 		=> "heading"
				);


$of_options[] = array( 	"name" 		=> __('Page Title Background Image','otouch')  ,
						"desc" 		=> __('Please Uplaod Geberal Page Title Background Image','otouch')  ,
						"id" 		=> "title_bg_image",
						"std" 		=> "",
						"mod" 		=> "min",
						"type" 		=> "upload"
				);

$of_options[] = array( 	"name" 		=> __('Portfolio page','otouch')  ,
						"desc" 		=> __('Please Enter Portfolio Page Link.','otouch')  ,
						"id" 		=> "page_portfolio",
						"std" 		=> "",
						"type" 		=> "text"
						
				);

$of_options[] = array( 	"name" 		=> __('Team page','otouch')  ,
						"desc" 		=> __('Please Enter Team post link.','otouch')  ,
						"id" 		=> "team_page_select",
						"std" 		=> "",
						"type" 		=> "text"
						
				);


$of_options[] = array( 	"name" 		=> __('Gallery page','otouch') ,
						"desc" 		=> __('Please Enter Gallery Page Link.','otouch') ,
						"id" 		=> "gallery_page_select",
						"std" 		=> "",
						"type" 		=> "text"
						
				);				
				
	
				
				

$of_options[] = array( 	"name" 		=> __('Portfolio Page Settings','otouch')  ,
						"desc" 		=> "",
						"id" 		=> "port_add_opt_info",
						"std" 		=> "<h3 style=\"margin: 3px;\">Portfolios</h3>",
						"icon" 		=> true,
						"type" 		=> "info"
				);

						

						
$of_options[] = array( 	"name" 		=> __('Portfolio post type slug','otouch')  ,
						"desc" 		=> __('Portfolio post type slug.','otouch')  ,
						"id" 		=> "translate_portfolio",
						"std" 		=> "portfolio",
						"type" 		=> "text"
				);
				
				
$of_options[] = array( 	"name" 		=> __('Portfolio single favorites','otouch')  ,
						"desc" 		=> __('Enable/Disable portfolio single favorites','otouch')  ,
						"id" 		=> "hide_favorites",
						"std" 		=> 0,
						"type" 		=> "switch"
				);
$of_options[] = array( 	"name" 		=> __('Single portfolios related','otouch')  ,
						"desc" 		=> __('Enable/Disable Single portfolios related','otouch')  ,
						"id" 		=> "port_related",
						"std" 		=> 0,
						"type" 		=> "switch"
				);
$of_options[] = array( 	"name" 		=> __('Portfolio image height','otouch')  ,
						"desc" 		=> __('Related portfolios height and Default portfolio image height.','otouch')  ,
						"id" 		=> "port_height",
						"std" 		=> "250",
						"type" 		=> "text"
				);
				
$of_options[] = array( 	"name" 		=> __('Single portfolios Header','otouch')  ,
						"desc" 		=> __('Enable/Disable Single portfolios Header','otouch')  ,
						"id" 		=> "port_header",
						"std" 		=> 1,
						"type" 		=> "switch"
				);
		
$of_options[] = array( 	"name" 		=> __('Portfolio Page Title','otouch')  ,
						"desc" 		=> __('Insert Title of your Portfolio page.','otouch')  ,
						"id" 		=> "sportfolio_title",
						"std" 		=> "Our Work sample",
						"type" 		=> "text"
				);	
		
				
$of_options[] = array( 	"name" 		=>  __('Portfolio Single Page Background','otouch')  ,
						"desc" 		=> __('Inserted picture must be above 1600px width and height is atleast 120px. You can redefine or choose other option to your specific page on meta options.','otouch')  ,
						"id" 		=> "worksingle_bg_image",
						"std" 		=> "",
						"mod" 		=> "min",
						"type" 		=> "upload"
				);		
				
$of_options[] = array( 	"name" 		=> __('TBlog Setting','otouch') ,
						"desc" 		=> "",
						"id" 		=> "blog_add_opt_info",
						"std" 		=> "<h3 style=\"margin: 3px;\">Blog</h3>",
						"icon" 		=> true,
						"type" 		=> "info"
				);
$of_options[] = array( 	"name" 		=> __('Blog Post Single Meta','otouch') ,
						"desc" 		=> __('Enable/Disable Single Blog Post Single Meta.','otouch') ,
						"id" 		=> "meta_on_single",
						"std" 		=> 1,
						"folds" 	=> 1,
						"type" 		=> "switch"
				);
$of_options[] = array( 	"name" 		=> __('Featured Media section on post single','otouch') ,
						"desc" 		=> __('Enable/Disable Single Featured Media .','otouch') ,
						"id" 		=> "feature_show",
						"std" 		=> 1,
						"folds" 	=> 1,
						"type" 		=> "switch"
				);
$of_options[] = array( 	"name" 		=> __('Post Author section on post single','otouch') ,
						"desc" 		=> __('Enable/Disable Post Author .','otouch') ,
						"id" 		=> "post_author",
						"std" 		=> 1,
						"folds" 	=> 1,
						"type" 		=> "switch"
				);
				
$of_options[] = array( 	"name" 		=> __('Single Post Page Title','otouch') ,
						"desc" 		=> __('Enable/Disable Single Post Page Title.','otouch') ,
						"id" 		=> "post_sintitle",
						"std" 		=> 1,
						"folds" 	=> 1,
						"type" 		=> "switch"
				);
							
$of_options[] = array( 	"name" 		=> __('Blog Page Title','otouch') ,
						"desc" 		=> __('Insert Title of your Blog page.','otouch') ,
						"id" 		=> "blog_title",
						"std" 		=> "Blog",
						"type" 		=> "text"
				);
$of_options[] = array( 	"name" 		=> __('Blog Page Subtitle','otouch') ,
						"desc" 		=> __('Insert Sub Title of your Blog page.','otouch') ,
						"id" 		=> "blog_subtitle",
						"std" 		=> "",
						"type" 		=> "text"
				);

$of_options[] = array( 	"name" 		=> __('Blog Single Page Background','otouch'),
						"desc" 		=> __('Inserted picture must be above 1600px width and height is atleast 120px. You can redefine or choose other option to your specific page on meta options.','otouch')  ,
						"id" 		=> "blogsingle_bg_image",
						"std" 		=> "",
						"mod" 		=> "min",
						"type" 		=> "upload"
				);
		
$of_options[] = array( 	"name" 		=> __('Facebook comment?','otouch')  ,
						"desc" 		=> __('On will be enabling facebook comment, Off will be Wordpress default comment','otouch')  ,
						"id" 		=> "facebook_comment",
						"std" 		=> 0,
						"folds" 	=> 1,
						"type" 		=> "switch"
				);

	
				
$of_options[] = array( 	"name" 		=> __('Facebook api key','otouch')  ,
						"desc" 		=> "Create your own Facebook Application and <a href='https://developers.facebook.com/apps' target='_blank'>get ID</a>.",
						"id" 		=> "facebook_app_id",
						"std" 		=> "",
                                                "fold" 		=> "facebook_comment", /* the checkbox hook */
						"type" 		=> "text"
				);	


$of_options[] = array( 	"name" 		=> __('Social Share on Posts?','otouch')  ,
						"desc" 		=> "",
						"id" 		=> "social_share",
						"std" 		=> 1,
						"type" 		=> "switch"
				);
$of_options[] = array( 	"name" 		=> __('Social Share on Portfolios?','otouch')  ,
						"desc" 		=> "",
						"id" 		=> "portfolio_share",
						"std" 		=> 1,
						"type" 		=> "switch"
				);
$of_options[] = array( 	"name" 		=> __('Facebook Like','otouch') ,
						"desc" 		=> "",
						"id" 		=> "facebook_share",
						"std" 		=> 1,
						"type" 		=> "switch"
				);
$of_options[] = array( 	"name" 		=> "Twitter",
						"desc" 		=> "",
						"id" 		=> "twitter_share",
						"std" 		=> 1,
						"type" 		=> "switch"
				);
$of_options[] = array( 	"name" 		=> "GooglePlus",
						"desc" 		=> "",
						"id" 		=> "googleplus_share",
						"std" 		=> 1,
						"type" 		=> "switch"
				);
$of_options[] = array( 	"name" 		=> "Pinterest",
						"desc" 		=> "",
						"id" 		=> "pinterest_share",
						"std" 		=> 0,
						"type" 		=> "switch"
				);
$of_options[] = array( 	"name" 		=> "LinkedIn",
						"desc" 		=> "",
						"id" 		=> "linkedin_share",
						"std" 		=> 0,
						"type" 		=> "switch"
				);





		

				
$of_options[] = array( 	"name" 		=> __('Shop Page Setting','otouch')  ,
						"desc" 		=> "",
						"id" 		=> "facebook_twitter_info",
						"std" 		=> "<h3 style=\"margin: 3px;\">Shop Page Setting</h3>",
						"icon" 		=> true,
						"type" 		=> "info"
				);	
				
$of_options[] = array( 	"name" 		=> __('Shop Page title','otouch')  ,
						"desc" 		=> "",
						"id" 		=> "shoppage_title",
						"std" 		=> 1,
						"type" 		=> "switch"
				);

				
$of_options[] = array( 	"name" 		=> __('Shop Page breadcrumb','otouch')  ,
						"desc" 		=> "",
						"id" 		=> "shoppage_breadcrumb_enable",
						"std" 		=> 0,
						"type" 		=> "switch"
				);
				
$of_options[] = array( 	"name" 		=> __('Shop Page Sidebar','otouch')  ,
						"desc" 		=> "",
						"id" 		=> "shoppage_sidebar_enable",
						"std" 		=> 1,
						"type" 		=> "switch"
				);	
				

						
$of_options[] = array( 	"name" 		=> __('Shop Page Title','otouch')  ,
						"desc" 		=> __('Insert Title of your Shop page.','otouch')  ,
						"id" 		=> "shop_title",
						"std" 		=> "Our Shop",
						"type" 		=> "text",
				);
$of_options[] = array( 	"name" 		=> __('Shop Page Subtitle','otouch')  ,
						"desc" 		=> __('Insert Sub Title of your Shop page.','otouch')  ,
						"id" 		=> "shop_subtitle",
						"std" 		=> "",
						"type" 		=> "text",
				);
				
$of_options[] = array( 	"name" 		=> __('Shop Page Header Background','otouch')  ,
						"desc" 		=> __('Please Upload Shop Page Header Background.','otouch')  ,
						"id" 		=> "shop_background",
						"std" 		=> "",
						"type" 		=> "upload",
				);	



				
$of_options[] = array( 	"name" 		=> __('Team Page Setting','otouch') ,
						"desc" 		=> "",
						"id" 		=> "",
						"std" 		=> "<h3 style=\"margin: 3px;\">Team Page Setting</h3>",
						"icon" 		=> true,
						"type" 		=> "info"
				);	
				
$of_options[] = array( 	"name" 		=> __('Team Page title','otouch')  ,
						"desc" 		=> "",
						"id" 		=> "team_title",
						"std" 		=> 1,
						"type" 		=> "switch"
				);	
				
$of_options[] = array( 	"name" 		=> __('Team Page Title','otouch')  ,
						"desc" 		=> __('Insert Title of your Shop page.','otouch')  ,
						"id" 		=> "steam_title",
						"std" 		=> "Our Team",
						"type" 		=> "text",
				);
$of_options[] = array( 	"name" 		=> __('Team Page Subtitle','otouch')  ,
						"desc" 		=> __('Insert Sub Title of your Shop page.','otouch') ,
						"id" 		=> "steam_subtitle",
						"std" 		=> "",
						"type" 		=> "text",
				);

$of_options[] = array( 	"name" 		=> __('Team Page Header Background','otouch')  ,
						"desc" 		=> __('Please Upload Team Page Header Background.','otouch')  ,
						"id" 		=> "team_background",
						"std" 		=> "",
						"type" 		=> "upload",
				);	


$of_options[] = array( 	"name" 		=> __('Gallery Page Setting','otouch')  ,
						"desc" 		=> "",
						"id" 		=> "",
						"std" 		=> "<h3 style=\"margin: 3px;\">Gallery Page Setting</h3>",
						"icon" 		=> true,
						"type" 		=> "info"
				);	
				
$of_options[] = array( 	"name" 		=> __('Gallery Page title','otouch')  ,
						"desc" 		=> "",
						"id" 		=> "gallery_title",
						"std" 		=> 1,
						"type" 		=> "switch"
				);	
				
$of_options[] = array( 	"name" 		=> __('Team Page Title','otouch')  ,
						"desc" 		=> __('Insert Title of your Gallery page.','otouch')  ,
						"id" 		=> "sgallery_title",
						"std" 		=> "Our Gallery",
						"type" 		=> "text",
				);
$of_options[] = array( 	"name" 		=> __('Gallery Page Subtitle','otouch')  ,
						"desc" 		=> __('Insert Sub Title of your Gallery  page.','otouch')  ,
						"id" 		=> "sgallery_subtitle",
						"std" 		=> "",
						"type" 		=> "text",
				);
				
$of_options[] = array( 	"name" 		=> __('Gallery Page Header Background','otouch')  ,
						"desc" 		=> __('Please Upload Gallery Page Header Background.','otouch')  ,
						"id" 		=> "gallery_background",
						"std" 		=> "",
						"type" 		=> "upload",
				);	
	

//      Header and Footer TAB
$of_options[] = array( 	"name" 		=> __('Slider Settings','otouch')  ,
						"type" 		=> "heading"
				);
				

$of_options[] = array( 	"name" 		=> "Camera Slider Setting",
						"desc" 		=> "",
						"id" 		=> "camera_slider_setting",
						"std" 		=> "<h3 style=\"margin: 3px;\">Camera Slider</h3>",
						"icon" 		=> true,
						"type" 		=> "info"	
						);			
				
$of_options[] = array( 	"name" 		=> "Camera Slider Transaction.",
						"desc" 		=> "Choose Camera Slider Transaction.",
						"id" 		=> "camera_trans",
						"std" 		=> "random",
						"type" 		=> "select",
						"options" 	=> $of_camera_trans
				);	
				
$of_options[] = array( 	"name" 		=> "Camera Slider Type.",
						"desc" 		=> "Choose Camera Slider Transaction.",
						"id" 		=> "camera_type",
						"std" 		=> "random",
						"type" 		=> "select",
						"options" 	=> $of_flex_type	
				);	
				
$of_options[] = array( 	"name" 		=> "Camera Slider Pause Time",
						"desc" 		=> "Please Set Camera Pause Time.",
						"id" 		=> "camera_paused",
						"std" 		=> "5000",
						"type" 		=> "text",

				);	
				
$of_options[] = array( 	"name" 		=> "Camera Slider Animation Time",
						"desc" 		=> "Please Set Camera Pause Time.",
						"id" 		=> "camera_animspeed",
						"std" 		=> "1000",
						"type" 		=> "text",

				);	

$of_options[] = array( 	"name" 		=> "Flex Slider Setting",
						"desc" 		=> "",
						"id" 		=> "flex_slider_setting",
						"std" 		=> "<h3 style=\"margin: 3px;\">Flex Slider</h3>",
						"icon" 		=> true,
						"type" 		=> "info"	
						);			
				
$of_options[] = array( 	"name" 		=> "Flex Slider Transaction",
						"desc" 		=> "Choose Flex Slider Transaction.",
						"id" 		=> "flex_trans",
						"std" 		=> "fade",
						"type" 		=> "select",
						"options" 	=> $of_flex_trans
				);	
				
$of_options[] = array( 	"name" 		=> "Flex Slider Pause Time",
						"desc" 		=> "Please Set Camera Pause Time.",
						"id" 		=> "flex_paused",
						"std" 		=> "5000",
						"type" 		=> "text",

				);	
				
$of_options[] = array( 	"name" 		=> "Flex Slider Animation Time",
						"desc" 		=> "Please Set Camera Pause Time.",
						"id" 		=> "flex_animspeed",
						"std" 		=> "1000",
						"type" 		=> "text",

				);	



//      Footer TAB
				
$of_options[] = array( 	"name" 		=> "Footer",
						"type" 		=> "heading"
				);			
				

$of_options[] = array( 	"name" 		=> "Footer Settings",
						"desc" 		=> "",
						"id" 		=> "footer_section_info",
						"std" 		=> "<h3 style=\"margin: 3px;\">Footer Settings</h3>",
						"icon" 		=> true,
						"type" 		=> "info"
				);
$of_options[] = array( 	"name" 		=> "Footer Widget",
						"desc" 		=> "",
						"id" 		=> "footer_widget",
						"std" 		=> 1,
						"folds" 	=> 1,
						"type" 		=> "switch"
                                );
$url =  ADMIN_DIR . 'assets/images/footer/';
$of_options[] = array( 	"name" 		=> "Footer Layout",
						"desc" 		=> "Choose footer layout.",
						"id" 		=> "footer_layout",
						"std" 		=> "3-3-3-3",
						"type" 		=> "images",
                         "fold" 		=> "footer_widget", /* the checkbox hook */
						"options" 	=> array(
											'12' 	  => $url . '1col.png',
											'6-6' 	  => $url . '2col.png',
											'4-4-4'   => $url . '3col.png',
											'3-3-3-3' => $url . '4col.png'
										)
				);
$of_options[] = array( 	"name" 		=> "Footer Bottom",
						"desc" 		=> "",
						"id" 		=> "footer_bottom",
						"std" 		=> 1,
						"folds" 	=> 1,
						"type" 		=> "switch"
                                );

$of_options[] = array( 	"name" 		=> "Footer Contacts",
						"desc" 		=> "",
						"id" 		=> "footer_contacts",
						"std" 		=> 1,
						"fold" 		=> "footer_bottom", /* the checkbox hook */
						"type" 		=> "switch"
                                );
				
$of_options[] = array( 	"name" 		=> "Copyright Text",
						"desc" 		=> "Insert Copyright Text.",
						"id" 		=> "copyright_text",
						"fold" 		=> "footer_bottom", /* the checkbox hook */
						"std" 		=> " Copyright © 2013 otouch | All Rights Reserved.",
						"type" 		=> "textarea"
				);		
				


//      Colors and Styling TAB
$of_options[] = array( 	"name" 		=> "Styling",
						"type" 		=> "heading"
				);
$of_options[] = array( 	"name" 		=> "General",
						"desc" 		=> "",
						"id" 		=> "colors_and_styling_info",
						"std" 		=> "<h3 style=\"margin: 3px;\">General</h3>",
						"icon" 		=> true,
						"type" 		=> "info"
				);
$of_options[] = array( 	"name" 		=> "Primary Color",
						"desc" 		=> "Theme Primary color has all of accent colors of this theme. Default: #E12E36",
						"id" 		=> "primary_color",
						"std" 		=> "#E12E36",
						"type" 		=> "color"
				);
				
$of_options[] = array( 	"name" 		=> "Main Container Background",
						"desc" 		=> "Please set Main body container Background",
						"id" 		=> "main_background",
						"std" 		=> "",
						"type" 		=> "color"
				);
				
$of_options[] = array( 	"name" 		=> "Gay Effect",
						"desc" 		=> "Enable/Disable Gay Effect for all images.",
						"id" 		=> "gary_effect",
						"std" 		=> 1,
						"folds" 	=> 1,
						"type" 		=> "switch"
				);
							
$of_options[] = array( 	"name" 		=> "Link Color",
						"desc" 		=> "Pick a tag color (default: #E12E36).",
						"id" 		=> "link_color",
						"std" 		=> "#999",
						"type" 		=> "color"
				);
$of_options[] = array( 	"name" 		=> "Link Hover Color",
						"desc" 		=> "Pick a tag's hover color (default: #E12E36).",
						"id" 		=> "link_hover_color",
						"std" 		=> "#E12E36",
						"type" 		=> "color"
				);
$of_options[] = array( 	"name" 		=> "Hedaer and Page Title Colors",
						"desc" 		=> "",
						"id" 		=> "header_colors_info",
						"std" 		=> "<h3 style=\"margin: 3px;\">Header and Page Title Setting</h3>",
						"icon" 		=> true,
						"type" 		=> "info"
				);
$of_options[] = array( 	"name" 		=> "Header background Color",
						"desc" 		=> "Please set Header Background Color.",
						"id" 		=> "header_background",
						"std" 		=> "#fff",
						"type" 		=> "color"
				);
$of_options[] = array( 	"name" 		=> "Slider background Color",
						"desc" 		=> "Please set Slider Background Color.",
						"id" 		=> "slider_background",
						"std" 		=> "#333",
						"type" 		=> "color"
				);			
				

$of_options[] = array( 	"name" 		=> "Top Page background Color",
						"desc" 		=> "Please set Top Page background Color.",
						"id" 		=> "toppage_background",
						"std" 		=> "",
						"type" 		=> "color"
				);
				
$of_options[] = array( 	"name" 		=> "Top Page Border Bottom Color",
						"desc" 		=> "Please set Top Page Border Bottom Color.",
						"id" 		=> "toppage_border",
						"std" 		=> "",
						"type" 		=> "color"
				);
	
							

$of_options[] = array( 	"name" 		=> "Top Page social Icon Color",
						"desc" 		=> "Please set Top Page social Icon Color.",
						"id" 		=> "toppage_social",
						"std" 		=> "#999",
						"type" 		=> "color"
				);
				


$of_options[] = array( 	"name" 		=> "Top Page Link Color",
						"desc" 		=> "Please set Top Page Link Color.",
						"id" 		=> "toppage_text",
						"std" 		=> "#999",
						"type" 		=> "color"
				);
				

$of_options[] = array( 	"name" 		=> "Top Page Text Hover Color",
						"desc" 		=> "Please set Top Page Link Hover Color.",
						"id" 		=> "toppage_text_hover",
						"std" 		=> "#666",
						"type" 		=> "color"
				);		
				

$of_options[] = array( 	"name" 		=> "Header Cart",
						"desc" 		=> "",
						"id" 		=> "menu_colors_info",
						"std" 		=> "<h3 style=\"margin: 3px;\">Cart Header Settings</h3>",
						"icon" 		=> true,
						"type" 		=> "info"
				);


$of_options[] = array( 	"name" 		=> "Header Cart Background color",
						"desc" 		=> "Please set Header Cart Background color.",
						"id" 		=> "cart_bg",
						"std" 		=> "#333",
						"type" 		=> "color"
				);	

$of_options[] = array( 	"name" 		=> "Header Cart Icon color",
						"desc" 		=> "Please set Header Cart Icon color.",
						"id" 		=> "cart_icon",
						"std" 		=> "#fff",
						"type" 		=> "color"
				);

$of_options[] = array( 	"name" 		=> "Header Cart Border color",
						"desc" 		=> "Please set Header Cart Border color.",
						"id" 		=> "cart_border",
						"std" 		=> "#111",
						"type" 		=> "color"
				);	

$of_options[] = array( 	"name" 		=> "Page Title Colors Options",
						"desc" 		=> "",
						"id" 		=> "menu_colors_info",
						"std" 		=> "<h3 style=\"margin: 3px;\">Page Title Settings</h3>",
						"icon" 		=> true,
						"type" 		=> "info"
				);

				
$of_options[] = array( 	"name" 		=> "Page Title  Background Color",
						"desc" 		=> "Please set Page Title Background Color.",
						"id" 		=> "Page_header_background",
						"std" 		=> "#fafafa",
						"type" 		=> "color"
				);


				
$of_options[] = array( 	"name" 		=> "Page Title Border Color",
						"desc" 		=> "Please Select Page Title Borde Color.",
						"id" 		=> "Page_title_border_color",
						"std" 		=> "#e7e7e7",
						"type" 		=> "color"
				);
				
				
				
$of_options[] = array( 	"name" 		=> "Page Title Pattern Background Color",
						"desc" 		=> "Please Select Page Title Borde Color.",
						"id" 		=> "Page_title_patt_color",
						"std" 		=> "",
						"type" 		=> "color"
				);
						
				


$of_options[] = array( 	"name" 		=> "Menu Colors Options",
						"desc" 		=> "",
						"id" 		=> "menu_colors_info",
						"std" 		=> "<h3 style=\"margin: 3px;\">Menu</h3>",
						"icon" 		=> true,
						"type" 		=> "info"
				);
$of_options[] = array( 	"name" 		=> "Menu Link Hover Color",
						"desc" 		=> "Default: #fff",
						"id" 		=> "menu_hover",
						"std" 		=> "#fff",
						"type" 		=> "color"
				);
				
$of_options[] = array( 	"name" 		=> "Menu Link Active Color",
						"desc" 		=> "Default: #fff",
						"id" 		=> "menu_active",
						"std" 		=> "#fff",
						"type" 		=> "color"
				);

				
$of_options[] = array( 	"name" 		=> "Sub Menu Background Color",
						"desc" 		=> "Default: #2A2E33",
						"id" 		=> "submenu_bg",
						"std" 		=> "#2A2E33",
						"type" 		=> "color"
				);
				
				
				
$of_options[] = array( 	"name" 		=> "Sub Menu Active Link Color",
						"desc" 		=> "Default: #aaa",
						"id" 		=> "submenu_aclink",
						"std" 		=> "#aaa",
						"type" 		=> "color"
				);
						
$of_options[] = array( 	"name" 		=> "Sub Menu Hover Background Color",
						"desc" 		=> "Default: #2A2E33",
						"id" 		=> "submenu_hover_background",
						"std" 		=> "#2A2E33",
						"type" 		=> "color"
				);
$of_options[] = array( 	"name" 		=> "Sub Menu Link Hover Color",
						"desc" 		=> "Default: #fff",
						"id" 		=> "submenu_hover",
						"std" 		=> "#fff",
						"type" 		=> "color"
				);
	


$of_options[] = array( 	"name" 		=> "Footer Color Setting",
						"desc" 		=> "",
						"id" 		=> "footer_colors_info",
						"std" 		=> "<h3 style=\"margin: 3px;\">Footer Color Setting</h3>",
						"icon" 		=> true,
						"type" 		=> "info"
				);
$of_options[] = array( 	"name" 		=> "Footer Background Color",
						"desc" 		=> "Please Select Footer Background Color.",
						"id" 		=> "footer_background",
						"std" 		=> "",
						"type" 		=> "color"
				);
				
				
$of_options[] = array( 	"name" 		=> "Footer Widgets Title Color",
						"desc" 		=> "Please Select Footer Text Color.",
						"id" 		=> "footer_widget_color",
						"std" 		=> "",
						"type" 		=> "color"
				);
				
		
$of_options[] = array( 	"name" 		=> "Footer Text Color",
						"desc" 		=> "Please Select Footer Text Color.",
						"id" 		=> "footer_text_color",
						"std" 		=> "",
						"type" 		=> "color"
				);



$of_options[] = array( 	"name" 		=> "Footer Link Color",
						"desc" 		=> "Please Select Footer Link Color.",
						"id" 		=> "footer_link_color",
						"std" 		=> "",
						"type" 		=> "color"
				);
$of_options[] = array( 	"name" 		=> "Footer Link Hover Color",
						"desc" 		=> "Please Select Footer Link Hover Color.",
						"id" 		=> "footer_link_hover_color",
						"std" 		=> "",
						"type" 		=> "color"
				);


$of_options[] = array( 	"name" 		=> "Footer Bottom Background Color",
						"desc" 		=> "Please Select Footer Copyright Background Color.",
						"id" 		=> "copyrights_bg",
						"std" 		=> "",
						"type" 		=> "color"
				);
$of_options[] = array( 	"name" 		=> "Footer Bottom Text Color",
						"desc" 		=> "Please Select Footer Copyright Text Color.",
						"id" 		=> "copyrights_text_color",
						"std" 		=> "#e8e8e8",
						"type" 		=> "color"
				);				
$of_options[] = array( 	"name" 		=> "Footer Bottom Link Color",
						"desc" 		=> "Please Select Footer Copyright Link Color.",
						"id" 		=> "copyrights_link_color",
						"std" 		=> "#e8e8e8",
						"type" 		=> "color"
				);					
				

$of_options[] = array( 	"name" 		=> "Footer Bottom Link Hover Color",
						"desc" 		=> "Please Select Footer Copyright Link Hover Color.",
						"id" 		=> "copyrights_link_color_hover",
						"std" 		=> "#fafafa",
						"type" 		=> "color"
				);					



//      Typography TAB
$of_options[] = array( 	"name" 		=> "Typography",
						"type" 		=> "heading"
				);
$of_options[] = array( 	"name" 		=> "Body",
						"desc" 		=> "",
						"id" 		=> "body_info",
						"std" 		=> "<h3 style=\"margin: 3px;\">Body</h3>",
						"icon" 		=> true,
						"type" 		=> "info"
				);
$of_options[] = array( 	"name" 		=> "Body text font",
						"desc" 		=> "Specify the body font properties",
						"id" 		=> "body_text_font",
						"std" 		=> array('size' => '13px','face' => '','style' => 'normal','color' => '#aaa'),
						"type" 		=> "typography"
				);
$of_options[] = array( 	"name" 		=> "Widget",
						"desc" 		=> "",
						"id" 		=> "menu_link_info",
						"std" 		=> "<h3 style=\"margin: 3px;\">Menu</h3>",
						"icon" 		=> true,
						"type" 		=> "info"
				);
$of_options[] = array( 	"name" 		=> "Menu Link customize",
						"desc" 		=> "Specify the body font properties",
						"id" 		=> "menu_font",
						"std" 		=> array('size' => '13px','face' => 'Open Sans','style' => 'normal','color' => '#808080'),
						"type" 		=> "typography"
				);
				
$of_options[] = array( 	"name" 		=> "Menu SubLink customize",
						"desc" 		=> "Specify the body font properties",
						"id" 		=> "submenu_font",
						"std" 		=> array('size' => '12px','face' => 'Open Sans','style' => 'normal','color' => '#808080'),
						"type" 		=> "typography"
				);
								
				
$of_options[] = array( 	"name" 		=> "Widget",
						"desc" 		=> "",
						"id" 		=> "widget_info",
						"std" 		=> "<h3 style=\"margin: 3px;\">Widget</h3>",
						"icon" 		=> true,
						"type" 		=> "info"
				);
$of_options[] = array( 	"name" 		=> "Sidebar Widgets Title",
						"desc" 		=> "Specify the sidebar headline font properties",
						"id" 		=> "sidebar_widgets_title",
						"std" 		=> array('size' => '13px','face' => 'Roboto Slab','style' => 'normal','color' => '#2f2f2f'),
						"type" 		=> "typography"
				);
$of_options[] = array( 	"name" 		=> "Footer Widgets Title",
						"desc" 		=> "Specify the sidebar headline font properties",
						"id" 		=> "footer_widgets_title",
						"std" 		=> array('size' => '12px','face' => 'Open Sans','style' => 'normal','color' => '#fff'),
						"type" 		=> "typography"
				);

				
$of_options[] = array( 	"name" 		=> "Headers font styling",
						"desc" 		=> "",
						"id" 		=> "header_font_info",
						"std" 		=> "<h3 style=\"margin: 3px;\">Headlines</h3>",
						"icon" 		=> true,
						"type" 		=> "info"
				);
				
$of_options[] = array( 	"name" 		=> "Slide Header Font Famliy",
						"desc" 		=> "",
						"id" 		=> "slide_heading_font",
						"std" 		=> "Roboto Slab",
						"type" 		=> "select_google_font",
						"options" 	=> $ott_googlefonts
				);	
				
				
$of_options[] = array( 	"name" 		=> "Slide Header Font Size",
						"desc" 		=> "Please Set Slide Header Font Size.",
						"id" 		=> "slide_heading_text",
						"std" 		=> "",
						"type" 		=> "text"
				);				
				
$of_options[] = array( 	"name" 		=> "Slide Header Font Color",
						"desc" 		=> "Please Select Slide Header Font Color.",
						"id" 		=> "slide_heading_color",
						"std" 		=> "",
						"type" 		=> "color"
				);

				
				
$of_options[] = array( 	"name" 		=> "Page Title Font Family",
						"desc" 		=> "",
						"id" 		=> "ptitle_heading_font",
						"std" 		=> "Roboto Slab",
						"type" 		=> "select_google_font",
						"options" 	=> $ott_googlefonts
				);	
				
				
				
$of_options[] = array( 	"name" 		=> "Page Title Header Color",
						"desc" 		=> "Please Select Page Title Header Color.",
						"id" 		=> "Page_header_color",
						"std" 		=> "#222",
						"type" 		=> "color"
				);
$of_options[] = array( 	"name" 		=> "Page Title Font Size",
						"desc" 		=> "Please Set Page Title Font Size.",
						"id" 		=> "Page_header_text",
						"std" 		=> "25",
						"type" 		=> "text"
				);


				
$of_options[] = array( 	"name" 		=> "Page SubTitle Color",
						"desc" 		=> "Please Select Page Title Subtitle color.",
						"id" 		=> "Page_desc_color",
						"std" 		=> "#666",
						"type" 		=> "color"
				);		
				
$of_options[] = array( 	"name" 		=> "Page SubTitle Font Size",
						"desc" 		=> "Please Set Page SubTitle Font Size.",
						"id" 		=> "Page_subheader_text",
						"std" 		=> "#fff",
						"type" 		=> "text"
				);	
				
				
$of_options[] = array( 	"name" 		=> "Heading Font Family",
						"desc" 		=> "",
						"id" 		=> "heading_font",
						"std" 		=> "Roboto Slab",
						"type" 		=> "select_google_font",
						"options" 	=> $ott_googlefonts
				);
				
$of_options[] = array( 	"name" 		=> "Item Title properties",
						"desc" 		=> "Specify the sidebar headline font properties",
						"id" 		=> "heading_title_font",
						"std" 		=> array('size' => '12px','face' => 'Roboto Slab','style' => 'normal','color' => '#222'),
						"type" 		=> "typography"
				);	
				
$of_options[] = array( 	"name" 		=> "H1 - Specify Font Properties",
						"desc" 		=> "",
						"id" 		=> "h1_spec_font",
						"std" 		=> array('size' => '28px','color' => '#2f2f2f'),
						"type" 		=> "typography"
				);
$of_options[] = array( 	"name" 		=> "H2 - Specify Font Properties",
						"desc" 		=> "",
						"id" 		=> "h2_spec_font",
						"std" 		=> array('size' => '22px','color' => '#2f2f2f'),
						"type" 		=> "typography"
				);
$of_options[] = array( 	"name" 		=> "H3 - Specify Font Properties",
						"desc" 		=> "",
						"id" 		=> "h3_spec_font",
						"std" 		=> array('size' => '18px','color' => '#2f2f2f'),
						"type" 		=> "typography"
				);
$of_options[] = array( 	"name" 		=> "H4 - Specify Font Properties",
						"desc" 		=> "",
						"id" 		=> "h4_spec_font",
						"std" 		=> array('size' => '16px','color' => '#2f2f2f'),
						"type" 		=> "typography"
				);
$of_options[] = array( 	"name" 		=> "H5 - Specify Font Properties",
						"desc" 		=> "",
						"id" 		=> "h5_spec_font",
						"std" 		=> array('size' => '14px','color' => '#2f2f2f'),
						"type" 		=> "typography"
				);
$of_options[] = array( 	"name" 		=> "H6 - Specify Font Properties",
						"desc" 		=> "",
						"id" 		=> "h6_spec_font",
						"std" 		=> array('size' => '12px','color' => '#2f2f2f'),
						"type" 		=> "typography"
				);
$of_options[] = array( 	"name" 		=> "Google Font Subset",
						"desc" 		=> "",
						"id" 		=> "google_font_subset",
						"std" 		=> "<h3 style=\"margin: 3px;\">Google Font Subset</h3>",
						"icon" 		=> true,
						"type" 		=> "info"
				);
$of_options[] = array( 	"name" 		=> "Google Font Subset",
						"desc" 		=> "Some of Google fonts have additional subsets. Please insert those subsets seperated with comma (,). More information <a href='https://developers.google.com/fonts/docs/getting_started' target='_blank'>Google Font Subset</a>",
						"id" 		=> "google_font_subset",
						"std" 		=> "",
						"type" 		=> "text"
				);
//      Social Icons TAB
$of_options[] = array( 	"name" 		=> "Contacts",
						"type" 		=> "heading"
				);
				
$of_options[] = array( 	"name" 		=> "Contact Page Setting",
						"desc" 		=> "",
						"id" 		=> "contact_title",
						"std" 		=> "<h3 style=\"margin: 3px;\">Contact Page Setting.</h3>",
						"icon" 		=> true,
						"type" 		=> "info"
				);				

$of_options[] = array( 	"name" 		=> "Contact Map",
						"desc" 		=> "Enable/disable Top Page Social and contact Bar",
						"id" 		=> "contact_map",
						"std" 		=> 1,
                        "folds" 	=> 1,
						"type" 		=> "switch"
				);


$of_options[] = array( 	"name" 		=> "Contact Map Latitude",
						"desc" 		=> "Please Set Contact Map Latitude",
						"id" 		=> "map_latitude",
						"std" 		=> "",
                         "fold" 	=> "contact_map",
						"type" 		=> "text"
				);	
				


$of_options[] = array( 	"name" 		=> "Contact Map longitude",
						"desc" 		=> "Please Set Contact Map longitude ",
						"id" 		=> "map_longitude",
						"std" 		=> "",
                         "fold" 	=> "contact_map",
						"type" 		=> "text"
				);					



$of_options[] = array( 	"name" 		=> "Contact Address",
						"desc" 		=> "Please Enter Contact Address",
						"id" 		=> "map_adreess",
						"std" 		=> "",
                         "fold" 	=> "contact_map",
						"type" 		=> "textarea"
				);						

				

				
				
				
$of_options[] = array( 	"name" 		=> "Conatct Email",
						"desc" 		=> "Enter the Conatct Email.",
						"id" 		=> "ott_contact_email",
						"std" 		=> "info@website.com",
						"type" 		=> "text"
				);
					
$of_options[] = array( 	"name" 		=> "Conatct Phone",
						"desc" 		=> "Enter the Conatct Email.",
						"id" 		=> "contact_phone",
						"std" 		=> "00201238547",
						"type" 		=> "text"
				);			



				

				
$of_options[] = array( 	"name" 		=> "Social Icons heading",
						"desc" 		=> "",
						"id" 		=> "social_icons_info",
						"std" 		=> "<h3 style=\"margin: 3px;\">Inserted Social Icons will be displayed on top Header section.</h3>",
						"icon" 		=> true,
						"type" 		=> "info"
				);
$of_options[] = array( 	"name" 		=> "RSS URL",
						"desc" 		=> "Enter the RSS URL.",
						"id" 		=> "rss_url",
						"std" 		=> "#",
						"type" 		=> "text"
				);
				
				
$of_options[] = array( 	"name" 		=> "Twitter Username",
						"desc" 		=> "Enter the Twitter Username.",
						"id" 		=> "twitter_username",
						"std" 		=> "#",
						"type" 		=> "text"
				);	
				
$of_options[] = array( 	"name" 		=> "Facebook ID",
						"desc" 		=> "Enter the Facebook ID.",
						"id" 		=> "facebook_username",
						"std" 		=> "#",
						"type" 		=> "text"
				);
$of_options[] = array( 	"name" 		=> "Flickr Username",
						"desc" 		=> "Enter the Flickr Username.",
						"id" 		=> "flickr_username",
						"std" 		=> "#",
						"type" 		=> "text"
				);
				
$of_options[] = array( 	"name" 		=> "Youtube Username",
						"desc" 		=> "Enter the Youtube Username.",
						"id" 		=> "youtube_username",
						"std" 		=> "",
						"type" 		=> "text"
				);
				
$of_options[] = array( 	"name" 		=> "Vimeo Username",
						"desc" 		=> "Enter the Vimeo Username.",
						"id" 		=> "vimeo_username",
						"std" 		=> "",
						"type" 		=> "text"
				);
	
				
$of_options[] = array( 	"name" 		=> "tumblr Username",
						"desc" 		=> "Enter the tumblr Username.",
						"id" 		=> "tumblr_url",
						"std" 		=> "",
						"type" 		=> "text"
				);

					
$of_options[] = array( 	"name" 		=> "Google + ID",
						"desc" 		=> "Enter the Google + Username.",
						"id" 		=> "googleplus_username",
						"std" 		=> "",
						"type" 		=> "text"
				);
				
				
$of_options[] = array( 	"name" 		=> "Dribbble Username",
						"desc" 		=> "Enter the Dribbble Username.",
						"id" 		=> "dribbble_username",
						"std" 		=> "",
						"type" 		=> "text"
				);	
				
$of_options[] = array( 	"name" 		=> "Digg Username",
						"desc" 		=> "Enter the Digg Username.",
						"id" 		=> "digg_username",
						"std" 		=> "",
						"type" 		=> "text"
				);					
				
				
$of_options[] = array( 	"name" 		=> "Linkedin Username",
						"desc" 		=> "Enter the Linkedin Username.",
						"id" 		=> "linkedin_username",
						"std" 		=> "",
						"type" 		=> "text"
				);		
				
$of_options[] = array( 	"name" 		=> "Pinterest Username",
						"desc" 		=> "Enter the Pinterest Username.",
						"id" 		=> "pinterest_username",
						"std" 		=> "",
						"type" 		=> "text"
				);		
				

$of_options[] = array( 	"name" 		=> "Instagram Username",
						"desc" 		=> "Enter the Instagram Username.",
						"id" 		=> "instagram_username",
						"std" 		=> "",
						"type" 		=> "text"
				);
				
				

$of_options[] = array( 	"name" 		=> "Skype Username",
						"desc" 		=> "Enter the Skype Username.",
						"id" 		=> "skype_username",
						"std" 		=> "",
						"type" 		=> "text"
				);

//      FB Twitter TAB

$of_options[] = array( 	"name" 		=> "Twitter API",
						"type" 		=> "heading"
				);




$of_options[] = array( 	"name" 		=> "Facebook & Twitter",
						"desc" 		=> "",
						"id" 		=> "facebook_twitter_info2",
						"std" 		=> "<h3 style=\"margin: 3px;\">Twitter API section (Note this will Required!)</h3>",
						"icon" 		=> true,
						"type" 		=> "info"
				);
$of_options[] = array( 	"name" 		=> "Consumer key",
                                                "desc" 		=> "You need to Create your Twitter APP and <a href='https://dev.twitter.com/apps' target='_blank'>insert the ID</a>.",
                                                "id" 		=> "consumerkey",
                                                "std" 		=> "",
                                                "type" 		=> "text");
$of_options[] = array( 	"name" 		=> "Consumer secret",
                                                "desc" 		=> "",
                                                "id" 		=> "consumersecret",
                                                "std" 		=> "",
                                                "type" 		=> "text");
$of_options[] = array( 	"name" 		=> "Access token",
                                                "desc" 		=> "",
                                                "id" 		=> "accesstoken",
                                                "std" 		=> "",
                                                "type" 		=> "text");
$of_options[] = array( 	"name" 		=> "Access token secret",
                                                "desc" 		=> "",
                                                "id" 		=> "accesstokensecret",
                                                "std" 		=> "",
                                                "type" 		=> "text");

//      Translate option TAB
$of_options[] = array( 	"name" 		=> "Translate",
						"type" 		=> "heading"
				);
$of_options[] = array( 	"name" 		=> "Translate text",
						"desc" 		=> "",
						"id" 		=> "translate_info",
						"std" 		=> "<h3 style=\"margin: 3px;\">All of our theme additional translation text translate able here.</h3>",
						"icon" 		=> true,
						"type" 		=> "info"
				);
$of_options[] = array( 	"name" 		=> "Continue Reading",
						"desc" 		=> "Continue Reading text on category page.",
						"id" 		=> "translate_readmore",
						"std" 		=> "Continue Reading",
						"type" 		=> "text"
				);
$of_options[] = array( 	"name" 		=> "Project Description",
						"desc" 		=> "Project Description text on portfolio single page.",
						"id" 		=> "translate_projectdesc",
						"std" 		=> "Overview",
						"type" 		=> "text"
				);
$of_options[] = array( 	"name" 		=> "Live Preview",
						"desc" 		=> "Live Preview text on portfolio single page.",
						"id" 		=> "translate_livepreview",
						"std" 		=> "Live Preview",
						"type" 		=> "text"
				);
$of_options[] = array( 	"name" 		=> "Related Portfolio",
						"desc" 		=> "Related Portfolio text on portfolio single page.",
						"id" 		=> "translate_relatedportfolio",
						"std" 		=> "Related Portfolio",
						"type" 		=> "text"
				);
$of_options[] = array( 	"name" 		=> "Show All",
						"desc" 		=> "Change it to your custom translate.",
						"id" 		=> "portfolio_show_all",
						"std" 		=> "Show All",
						"type" 		=> "text"
				);
$of_options[] = array( 	"name" 		=> "Posts",
						"desc" 		=> "",
						"id" 		=> "translate_post",
						"std" 		=> "<h3 style=\"margin: 3px;\">Posts</h3>",
						"icon" 		=> true,
						"type" 		=> "info"
				);
$of_options[] = array( 	"name" 		=> "Posted on",
						"desc" 		=> "Change it to your custom translate.",
						"id" 		=> "pp_date",
						"std" 		=> "Posted on",
						"type" 		=> "text"
				);
$of_options[] = array( 	"name" 		=> "By",
						"desc" 		=> "Change it to your custom translate.",
						"id" 		=> "pp_author",
						"std" 		=> "By",
						"type" 		=> "text"
				);
$of_options[] = array( 	"name" 		=> "In",
						"desc" 		=> "Change it to your custom translate.",
						"id" 		=> "pp_cateogry",
						"std" 		=> "In",
						"type" 		=> "text"
				);
$of_options[] = array( 	"name" 		=> "Twitter section",
						"desc" 		=> "",
						"id" 		=> "translate_post",
						"std" 		=> "<h3 style=\"margin: 3px;\">Twitter and Twitter Carousel</h3>",
						"icon" 		=> true,
						"type" 		=> "info"
				);
$of_options[] = array( 	"name" 		=> "Follow Us",
						"desc" 		=> "Change it to your custom translate.",
						"id" 		=> "ott_car_follow",
						"std" 		=> "Follow Us",
						"type" 		=> "text"
				);
$of_options[] = array( 	"name" 		=> "Right now",
						"desc" 		=> "Change it to your custom translate.",
						"id" 		=> "ott_car_rn",
						"std" 		=> "right now",
						"type" 		=> "text"
				);
$of_options[] = array( 	"name" 		=> " Seconds ago",
						"desc" 		=> "Change it to your custom translate.",
						"id" 		=> "ott_car_sa",
						"std" 		=> " seconds ago",
						"type" 		=> "text"
				);
$of_options[] = array( 	"name" 		=> "About 1 minute ago",
						"desc" 		=> "Change it to your custom translate.",
						"id" 		=> "ott_car_aoma",
						"std" 		=> "about 1 minute ago",
						"type" 		=> "text"
				);
$of_options[] = array( 	"name" 		=> " Minutes ago",
						"desc" 		=> "Change it to your custom translate.",
						"id" 		=> "ott_car_ma",
						"std" 		=> " minutes ago",
						"type" 		=> "text"
				);
$of_options[] = array( 	"name" 		=> "About 1 hour ago",
						"desc" 		=> "Change it to your custom translate.",
						"id" 		=> "ott_car_aoha",
						"std" 		=> "about 1 hour ago",
						"type" 		=> "text"
				);
$of_options[] = array( 	"name" 		=> " Hours ago",
						"desc" 		=> "Change it to your custom translate.",
						"id" 		=> "ott_car_ha",
						"std" 		=> " hours ago",
						"type" 		=> "text"
				);
$of_options[] = array( 	"name" 		=> "Yesterday",
						"desc" 		=> "Change it to your custom translate.",
						"id" 		=> "ott_car_yes",
						"std" 		=> "yesterday",
						"type" 		=> "text"
				);
$of_options[] = array( 	"name" 		=> " Days ago",
						"desc" 		=> "Change it to your custom translate.",
						"id" 		=> "ott_car_da",
						"std" 		=> " days ago",
						"type" 		=> "text"
				);
$of_options[] = array( 	"name" 		=> " Over a year ago",
						"desc" 		=> "Change it to your custom translate.",
						"id" 		=> "ott_car_oaya",
						"std" 		=> "over a year ago",
						"type" 		=> "text"
				);
$of_options[] = array( 	"name" 		=> "Page Title section",
						"desc" 		=> "",
						"id" 		=> "translate_page_title",
						"std" 		=> "<h3 style=\"margin: 3px;\">Page Title section</h3>",
						"icon" 		=> true,
						"type" 		=> "info"
				);
$of_options[] = array( 	"name" 		=> "Category",
						"desc" 		=> "Change it to your custom translate.",
						"id" 		=> "pt_category",
						"std" 		=> "Category",
						"type" 		=> "text"
				);
$of_options[] = array( 	"name" 		=> "Portfolio",
						"desc" 		=> "Change it to your custom translate.",
						"id" 		=> "pt_portfolio",
						"std" 		=> "Portfolio",
						"type" 		=> "text"
				);
$of_options[] = array( 	"name" 		=> "Tag",
						"desc" 		=> "Change it to your custom translate.",
						"id" 		=> "pt_tag",
						"std" 		=> "Tag",
						"type" 		=> "text"
				);
$of_options[] = array( 	"name" 		=> "404 Page",
						"desc" 		=> "Change it to your custom translate.",
						"id" 		=> "pt_nothing_found",
						"std" 		=> "404 Page",
						"type" 		=> "text"
				);
$of_options[] = array( 	"name" 		=> "Author",
						"desc" 		=> "Change it to your custom translate.",
						"id" 		=> "pt_author",
						"std" 		=> "Author",
						"type" 		=> "text"
				);
$of_options[] = array( 	"name" 		=> "Daily Archives",
						"desc" 		=> "Change it to your custom translate.",
						"id" 		=> "pt_daily_arch",
						"std" 		=> "Daily Archives",
						"type" 		=> "text"
				);
$of_options[] = array( 	"name" 		=> "Monthly Archives",
						"desc" 		=> "Change it to your custom translate.",
						"id" 		=> "pt_monthly_arch",
						"std" 		=> "Monthly Archives",
						"type" 		=> "text"
				);
$of_options[] = array( 	"name" 		=> "Yearly Archives",
						"desc" 		=> "Change it to your custom translate.",
						"id" 		=> "pt_yearly_arch",
						"std" 		=> "Yearly Archives",
						"type" 		=> "text"
				);
$of_options[] = array( 	"name" 		=> "Blog Archives",
						"desc" 		=> "Change it to your custom translate.",
						"id" 		=> "pt_blog_arch",
						"std" 		=> "Blog Archives",
						"type" 		=> "text"
				);
$of_options[] = array( 	"name" 		=> "Search results for",
						"desc" 		=> "Change it to your custom translate.",
						"id" 		=> "pt_search_result",
						"std" 		=> "Search results for",
						"type" 		=> "text"
				);
$of_options[] = array( 	"name" 		=> "Breadcrump text",
						"desc" 		=> "",
						"id" 		=> "translate_breadcrump",
						"std" 		=> "<h3 style=\"margin: 3px;\">Breadcrump section</h3>",
						"icon" 		=> true,
						"type" 		=> "info"
				);
$of_options[] = array( 	"name" 		=> "Home",
						"desc" 		=> "Change it to your custom translate.",
						"id" 		=> "br_home",
						"std" 		=> "Home",
						"type" 		=> "text"
				);
$of_options[] = array( 	"name" 		=> "Archive by Category",
						"desc" 		=> "Change it to your custom translate.",
						"id" 		=> "br_category",
						"std" 		=> "Archive by Category",
						"type" 		=> "text"
				);
$of_options[] = array( 	"name" 		=> "Search Results for",
						"desc" 		=> "Change it to your custom translate.",
						"id" 		=> "br_search",
						"std" 		=> "Search Results for",
						"type" 		=> "text"
				);
$of_options[] = array( 	"name" 		=> "Posts Tagged",
						"desc" 		=> "Change it to your custom translate.",
						"id" 		=> "br_tag",
						"std" 		=> "Posts Tagged",
						"type" 		=> "text"
				);
$of_options[] = array( 	"name" 		=> "Articles Posted by",
						"desc" 		=> "Change it to your custom translate.",
						"id" 		=> "br_author",
						"std" 		=> "Articles Posted by",
						"type" 		=> "text"
				);
$of_options[] = array( 	"name" 		=> "Error 404",
						"desc" 		=> "Change it to your custom translate.",
						"id" 		=> "br_404",
						"std" 		=> "Error 404",
						"type" 		=> "text"
				);


//      Custom CSS TAB
$of_options[] = array( 	"name" 		=> "Custom CSS",
						"type" 		=> "heading"
				);
$of_options[] = array( 	"name" 		=> "Custom CSS",
						"desc" 		=> "",
						"id" 		=> "custom_css_info",
						"std" 		=> "<h3 style=\"margin: 3px;\">Enter the Custom CSS of your custom Modify.</h3>",
						"icon" 		=> true,
						"type" 		=> "info"
				);
$of_options[] = array( 	"name" 		=> "Custom CSS",
						"desc" 		=> "Paste your own customized CSS code.",
						"id" 		=> "custom_css",
						"std" 		=> "",
						"type" 		=> "textarea"
				);
//     Backup Options
$of_options[] = array( 	"name" 		=> "Backup Options",
						"type" 		=> "heading"
				);
				
$of_options[] = array( 	"name" 		=> "Backup and Restore Options",
						"id" 		=> "of_backup",
						"std" 		=> "",
						"type" 		=> "backup",
						"desc" 		=> 'You can use the two buttons below to backup your current options, and then restore it back at a later time. This is useful if you want to experiment on the options but would like to keep the old settings in case you need it back.',
				);
				
$of_options[] = array( 	"name" 		=> "Transfer Theme Options Data",
						"id" 		=> "of_transfer",
						"std" 		=> "",
						"type" 		=> "transfer",
						"desc" 		=> 'You can tranfer the saved options data between different installs by copying the text inside the text box. To import data from another install, replace the data in the text box with the one from another install and click "Import Options".',
				);

	}//End function: of_options()
}//End chack if function exists: of_options()
?>
