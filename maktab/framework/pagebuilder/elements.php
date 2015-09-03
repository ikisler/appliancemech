<?php
$order = array(
    "date_desc" => "Date Desc",
    "date_asc" => "Date Asc",
    "title_desc" => "Title Desc",
    "title_asc" => "Title Asc",    
    "random" => "Random",
);

$ott_pbRowSettings = array(
    "row_custom_class" => array(
        "title" => "Custom Class and ID",
        "type" => "text",
        "holder" => "",
        "default" => "",
        "desc" => "If you wanna enable ONE PAGE check our Knowledge Base center",
    ),
    "background_color" => array(
        "title" => "Background color",
        "type" => "color",
        "holder" => "",
        "default" => "",
        "desc" => "Choose background color.",
    ),
	"row_border" => array(
        "title" => "Show Bottom Border",
        "type" => "checkbox",
        "holder" => "",
        "default" => "",
        "desc" => "",
    ),
    "background_image" => array(
        "title" => "Background image",
        "type" => "text",
        "holder" => "",
        "default" => "",
        "desc" => "Upload background image.",
    ),
    "add_background_image" => array(
        "title" => "",
        "type" => "button",
        "save_to" => "background_image",
        "default" => "Upload",
        "desc" => "",
    ),
    "background_repeat" => array(
        "title" => "Background image repeat",
        "type" => "select",
        "options" => array("repeat"=>"repeat","no-repeat"=>"no-repeat","repeat-x"=>"repeat-x","repeat-y"=>"repeat-y"),
        "default" => "",
        "desc" => "Upload background image.",
    ),
    "background_position" => array(
        "title" => "Background image position",
        "type" => "select",
        "options" => $bgposition,
        "default" => "",
        "desc" => "Upload background image.",
    ),
    "background_attachment" => array(
        "title" => "Background image position",
        "type" => "select",
        "options" => array("scroll"=>"scroll", "fixed"=>"fixed"),
        "default" => "",
        "desc" => "Upload background image.",
    ),
    "background_prllx" => array(
        "title" => "Enable Background parallax ( Please Disable Bottom Border & bototm Shadow)?",
        "type" => "checkbox",
        "holder" => "",
        "default" => "",
        "desc" => "",
    ),
    "default_row" => array(
        "title" => "",
        "type" => "hidden",
        "holder" => "",
        "default" => "true",
        "desc" => "",
    ),
    "row_layout" => array(
        "title" => "",
        "type" => "hidden",
        "holder" => "",
        "default" => "full",
        "desc" => "",
    ),
    "row_contrast" => array(
        "title" => "Container Color Scheme",
        "type" => "select",
        "options" => array('dark' => 'Dark', 'light' => 'Light'),
        "default" => "light",
        "desc" => "",
    ),
);
$ott_pbHeadSettings = array(
    "item_title" => array(
        "title" => "Insert title here",
        "type" => "text",
        "holder" => "",
        "default" => "",
        "desc" => "Insert title here",
    ),
    "item_custom_class" => array(
        "title" => "Custom Class",
        "type" => "text",
        "holder" => "",
        "default" => "",
        "desc" => "",
    ),
    "item_animation" => array(
        "title" => "Animation",
        "type" => "select",
        "options" => $genAnimationArray,
        "default" => "none",
        "desc" => "Animation.",
    ),
    "item_animation_offset" => array(
        "title" => "Animation offset",
        "type" => "text",
        "holder" => "Example:50% or 100px",
        "default" => "",
        "desc" => "Animation start offset control",
    ),
	
	"item_icon" => array(
		"title"   => "Item Header Icon",
		"type"    => "text",
		"holder"  => "Custom Class",
		"default" => "",
		"desc"    => "Custom Class",
	),


	"item_link" => array(
		"title"   => "Item Link URL",
		"type"    => "text",
		"holder"  => "",
		"default" => "",
		"desc"    => "Please insert link url",
	),
	
	
	"item_link_text" => array(
		"title"   => "Item Link Text",
		"type"    => "text",
		"holder"  => "",
		"default" => "",
		"desc"    => "Please insert item link text",
	),

);
$ott_pbItems = array(
    "accordion" => array(
        "name" => "Accordion",
        "size" => "size-1-3",
        "content" => "items",
        "settings" => array(

            "add_item" => array(
                "title" => "",
                "type" => "button",
                "data" => array("item" => "accordion", "settings" => "items"),
                "default" => "Add Accordion",
                "desc" => "",
            ),
            "items" => array(
                "title" => "Items",
                "type" => "container",
                "container_type" => "toggle",
                "title_as" => "item_title",
                "add_button" => "add_item",
                "default" => array(
                    array(
                        "item_title" => array(
                            "title" => "",
                            "type" => "text",
                            "holder" => "",
                            "default" => "Accordion Title",
                            "desc" => "",
                        ),
                        "item_animation" => array(
                            "title" => "Animation",
                            "type" => "select",
                            "options" => $genAnimationArray,
                            "default" => "none",
                            "desc" => "Animation.",
                        ),
                        "item_animation_offset" => array(
                            "title" => "Animation offset",
                            "type" => "text",
                            "holder" => "Example:50% or 100px",
                            "default" => "",
                            "desc" => "Animation start offset control",
                        ),
                        "item_icon" => array(
                            "title" => "",
                            "type" => "text",
                            "holder" => "icon-flash",
                            "default" => "icon-flash",
                            "desc" => '<a href="' . THEME_DIR . '/assets/css/fontello/demo.html" target="_blank" title="700+ Icons list">700+ icons</a>. Copy the Icon name and paste here',
                        ),
                        "item_expand" => array(
                            "title" => "Expand item",
                            "type" => "checkbox",
                            "default" => "false",
                            "desc" => "Expand ?",
                        ),
                        "item_content" => array(
                            "title" => "",
                            "type" => "textArea",
                            "holder" => "Completely synergize resource sucking relationships via premier niche markets.",
                            "default" => "Completely synergize resource sucking relationships via premier niche markets.",
                            "desc" => "",
                        ),
                    )
                ),
                "desc" => "Items",
            ),
        ),
    ),
    "blog" => array(
        "name" => "Blog",
        "size" => "size-3-4",
        "min-size" => "size-1-2",
		"row-type" => "row",
        "only" => "builder",
        "settings" => array(
            "category" => array(
                "title" => "Blog category",
                "type" => "category",
                "options" => $post_categories,
                "default" => "0",
                "desc" => "If you want to display Specify category then choose.",
            ),
            "category_ids" => array(
                "type" => "hidden",
                "selector" => "category",
                "default" => "",
            ),
            "post_count" => array(
                "title" => "Post Count",
                "type" => "text",
                "holder" => "10",
                "default" => "10",
                "desc" => "Insert how many posts will displayed in blog.",
            ),
			"layout" => array(
                "title" => "Blog Layout",
                "type" => "select",
                "options" => array('standard'=>'Standard','2'=>'2 Columns','3'=>'3 Columns','4'=>'4 Columns'),
                "default" => "standard",
                "desc" => "",
            ),
            "pagination" => array(
                "title" => "Display Pagination?",
                "type" => "select",
                "options" => array('none' => 'None', 'simple' => 'Simple pagination', 'infinite' => 'Infinite scroll'),
                "default" => "none",
                "desc" => "",
            ),
            "excerpt_count" => array(
                "title" => "Excerpt Count",
                "type" => "text",
                "holder" => "50",
                "default" => "50",
                "desc" => "How much blog words displayed in blog Excerpt. Must insert Digits including 0.",
            ),
            "more_text" => array(
                "title" => "Read more text",
                "type" => "text",
                "holder" => "",
                "default" => "",
                "desc" => "Insert custom 'Read More' text",
            ),
        ),
    ),
	    "sidenews" => array(
        "name" => "Side News",
        "size" => "size-1-2",
        "min-size" => "size-1-4",
        "only" => "builder",
        "settings" => array(
            "category" => array(
                "title" => "Blog category",
                "type" => "category",
                "options" => $post_categories,
                "default" => "0",
                "desc" => "If you want to display Specify category then choose.",
            ),
            "category_ids" => array(
                "type" => "hidden",
                "selector" => "category",
                "default" => "",
            ),
            "post_count" => array(
                "title" => "Post Count",
                "type" => "text",
                "holder" => "3",
                "default" => "3",
                "desc" => "Insert how many posts will displayed in Side News.",
            ),
            "excerpt_count" => array(
                "title" => "Excerpt Count",
                "type" => "text",
                "holder" => "10",
                "default" => "10",
                "desc" => "How much blog words displayed in blog Excerpt. Must insert Digits including 0.",
            ),
            "more_text" => array(
                "title" => "Read more text",
                "type" => "text",
                "holder" => "",
                "default" => "",
                "desc" => "Insert custom 'Read More' text",
            ),
        ),
    ),
 "button" => array(
        "name" => "Button",
        "only" => "shortcode", //builder
        "content" => "text",
        "settings" => array(
            "text" => array(
                "title" => "Button Text",
                "type" => "text",
                "holder" => "Button",
                "default" => "Button",
                "desc" => "Insert your button text",
            ),
            "link" => array(
                "title" => "Button Link",
                "type" => "text",
                "holder" => "",
                "default" => "",
                "desc" => "Insert button link URL",
            ),
            "size" => array(
                "title" => "Button Size",
                "type" => "select",
                "options" => array("small" => "Small", "medium" => "Medium", "large" => "Large"),
                "holder" => "",
                "default" => "medium",
                "desc" => "Choose button size",
            ),
            "rounded" => array(
                "title" => "Rounded",
                "type" => "checkbox",
                "default" => "false",
                "desc" => "",
            ),
            "style" => array(
                "title" => "Button Style",
                "type" => "select",
                "options" => array("flat" => "Flat", "border" => "Border" , "iconed" => "Iconed" , "iconed" => "Iconed" ),
                "holder" => "",
                "default" => "flat",
                "desc" => "Choose button size",
            ),

            "hover" => array(
                "title" => "Hover Style",
                "type" => "select",
                "options" => array("default" => "default", "hover2" => "style 2", "hover3" => "style 3", "hover4" => "style 4", "hover5" => "style 5", "hover6" => "style 6"),
                "holder" => "",
                "default" => "nohover",
                "desc" => "Choose button hover effect",
            ),
			"icon" => array(
                "title" => "Iconed Button icon",
                "type" => "text",
                "holder" => "",
                "default" => "",
                "desc" => "Insert icon class",
            ),
            "color" => array(
                "title" => "Button Color",
                "type" => "color",
                "holder" => "",
                "default" => "",
                "desc" => "Choose color",
            ),
            "target" => array(
                "title" => "Button Target",
                "type" => "select",
                "options" => $linkTarget,
                "holder" => "",
                "default" => "_blank",
                "desc" => "Blank will open new window, self will current window",
            ),
        ),
    ),

    "callout" => array(
        "name" => "Callout",
        "size" => "size-1-1",
		"min-size" => "size-1-2",
        "content" => "callout_text",
        "settings" => array(
            "callout_text" => array(
                "title" => "Callout Title",
                "type" => "textArea",
                "holder" => "Edit this section for custom Callout Title",
                "default" => 'Maktab Clean Minimal Wordpress theme',
                "desc" => "",
            ),
            "description" => array(
                "title" => "Callout Content",
                "type" => "textArea",
                "holder" => "Edit this section for custom Callout Text",
                "default" => 'Maktab Clean Minimal Wordpress theme',
                "desc" => "",
            ),
            "btn_text" => array(
                "title" => "",
                "type" => "text",
                "holder" => "Button text",
                "default" => "Purchase Now",
                "desc" => "Custom 'Read More'",
            ),
            "btn_icon" => array(
                "title" => "",
                "type" => "text",
                "holder" => "icon",
                "default" => "icon-right-big",
                "desc" => "",
            ),
            "btn_url" => array(
                "title" => "",
                "type" => "text",
                "holder" => "Only URL here",
                "default" => "",
                "desc" => "Read More Link URL",
            ),
            "btn_color" => array(
                "title" => "",
                "type" => "color",
                "holder" => "",
                "default" => "",
                "desc" => "Button background color",
            ),
            "btn_target" => array(
                "title" => "",
                "type" => "select",
                "options" => $linkTarget,
                "default" => "_blank",
                "desc" => "Blank is opened new window. Self is opened current.",
            ),	
           				
        ),
    ),
	
	    "callout_small" => array(
        "name" => "Tagline Small",
        "size" => "size-1-1",
        "content" => "callout_text",
        "settings" => array(
            "callout_text" => array(
                "title" => "Tagline Title",
                "type" => "textArea",
                "holder" => "",
                "default" => 'Maktab Clean Minimal Wordpress theme.',
                "desc" => "",
            ),
            "btn_text" => array(
                "title" => "",
                "type" => "text",
                "holder" => "Button text",
                "default" => "Purchase Now",
                "desc" => "Custom 'Read More'",
            ),
            "btn_icon" => array(
                "title" => "",
                "type" => "text",
                "holder" => "icon",
                "default" => "icon-right-big",
                "desc" => "",
            ),
			
            "btn_url" => array(
                "title" => "",
                "type" => "text",
                "holder" => "Only URL here",
                "default" => "#",
                "desc" => "Read More Link URL",
            ),
            "btn_color" => array(
                "title" => "",
                "type" => "color",
                "holder" => "",
                "default" => "",
                "desc" => "Button background color",
            ),
            "btn_target" => array(
                "title" => "",
                "type" => "select",
                "options" => $linkTarget,
                "default" => "_blank",
                "desc" => "Blank is opened new window. Self is opened current.",
            ),		
        ),
    ),
	
	"teaser" => array(
        "name" => "Teaser ",
        "size" => "size-1-1",
        "content" => "callout_text",
        "settings" => array(
            "callout_text" => array(
                "title"   => "Teaser Title",
                "type"    => "textArea",
                "holder"  => "",
                "default" => 'Maktab Clean Minimal Wordpress theme.',
                "desc"    => "This is callout title section",
            ),
            "description" => array(
                "title" => "Teaser Content",
                "type" => "textArea",
                "holder" => "Edit this section for custom Callout Text",
                "default" => 'Maktab Clean Minimal Wordpress theme.',
                "desc" => "",
            ),
            "btn_text" => array(
                "title"   => "",
                "type"    => "text",
                "holder"  => "button text",
                "default" => "Purchase Now",
                "desc"    => "You can insert custom Read More text",
            ),
            "btn_icon" => array(
                "title" => "",
                "type" => "text",
                "holder" => "icon",
                "default" => "icon-right-big",
                "desc" => "",
            ),
            "btn_url" => array(
                "title"   => "",
                "type"    => "text",
                "holder"  => "Only URL here",
                "default" => "#",
                "desc"    => "Read More Link URL",
            ),
            "btn_target" => array(
                "title"   => "",
                "type"    => "select",
                "options" => $linkTarget,
                "default" => "_blank",
                "desc"    => "Blank is opened new windows. Self is opened current windows.",
            ),
        ),
    ),
	
	
"service_box" => array(
        "name"    => "Service Box",
        "size"    => "size-1-4",
		"min-size" => "size-2-4",
        "only" => "builder",
        "settings" => array(
		"iconed_box_title" => array(
                "title"   => "Service Box Title",
                "type"    => "text",
                "holder"  => "",
                "default" => "Service Box Title",
                "desc"    => "",
            ),

		"servicebox_subtitle" => array(
                "title"   => "Service Box Title",
                "type"    => "text",
                "holder"  => "",
                "default" => "Service Box Title",
                "desc"    => "",
            ),


		"iconed_box_ccontent" => array(
                "title"   => "Service Box Text",
                "type"    => "textArea",
                "holder"  => "",
                "default" => "Service Box Text",
                "desc"    => "",
            ),
		  "image" => array(
                    "title" => "Thumbnail Image",
                    "type" => "text",
                    "holder" => "",
                    "default" => "",
                    "desc" => "The preivew image.",
            ),
             "add_image" => array(
                    "title" => "",
                    "type" => "button",
                    "save_to" => "image",
                    "default" => "Upload",
                    "desc" => "",
             ),			 
		"iconed_box_link" => array(
                "title"   => "Ser Box URL",
                "type"    => "text",
                "holder"  => "",
                "default" => "",
                "desc"    => "",
            ),
		"iconed_box_link_txt" => array(
                "title"   => "Iconed Box link text",
                "type"    => "text",
                "holder"  => "Read More",
                "default" => "Read More",
                "desc"    => "",
         ),
            
        ),
    ),
		
	
		"text_block" => array(
        "name" => "Text Block ",
        "size" => "size-1-1",
		"min-size" => "size-1-1",
        "content" => "callout_brief",
        "help"    => THEME_DIR.'/assets/help.html',
        "settings" => array(
         "callout_text" => array(
                "title"   => "Text Block Title",
                "type"    => "textArea",
                "holder"  => "",
                "default" => 'Text Block Title',
                "desc"    => "This is text block title section",
            ),
         "callout_brief" => array(
                "title"   => "Text Block Content",
                "type"    => "textArea",
                "holder"  => "",
                "default" => 'Text Block Content',
                "desc"    => "This is Text Block Content section",
          ), 
			"item_icon" => array(
				"title"   => "Item Header Icon",
				"type"    => "text",
				"holder"  => "Custom Class",
				"default" => "",
				"desc"    => "Custom Class",
			),

            "btn_text" => array(
                "title" => "",
                "type" => "text",
                "holder" => "button text",
                "default" => "Purchase Now",
                "desc" => "Custom 'Read More'",
            ),
            "btn_url" => array(
                "title" => "",
                "type" => "text",
                "holder" => "Only URL here",
                "default" => "#",
                "desc" => "Read More Link URL",
            ),
            "btn_color" => array(
                "title" => "",
                "type" => "color",
                "holder" => "",
                "default" => "",
                "desc" => "Button background color",
            ),
            "btn_target" => array(
                "title" => "",
                "type" => "select",
                "options" => $linkTarget,
                "default" => "_blank",
                "desc" => "Blank is opened new window. Self is opened current.",
            ),
        ),
    ),

	
	
		"background_Text" => array(
        "name" => "Note Block ",
        "size" => "size-1-4",
        "content" => "callout_brief",
        "settings" => array(
         "callout_text" => array(
                "title"   => "Text Block Title",
                "type"    => "textArea",
                "holder"  => "",
                "default" => 'Text Block Title',
                "desc"    => "This is text block title section",
            ),
         "callout_brief" => array(
                "title"   => "Text Block Content",
                "type"    => "textArea",
                "holder"  => "",
                "default" => 'Text Block Content',
                "desc"    => "This is Text Block Content section",
          ), 
		   "background_color" => array(
                "title" => "Background Color",
                "type" => "color",
                "holder" => "",
                "default" => "",
                "desc" => "Button background color",
            ),

		   "text_color" => array(
                "title" => "Text Color",
                "type" => "color",
                "holder" => "",
                "default" => "",
                "desc" => "Button background color",
            ),
		  
            "btn_text" => array(
                "title" => "",
                "type" => "text",
                "holder" => "button text",
                "default" => "Purchase Now",
                "desc" => "Custom 'Read More'",
            ),
            "btn_url" => array(
                "title" => "",
                "type" => "text",
                "holder" => "Only URL here",
                "default" => "#",
                "desc" => "Read More Link URL",
            ),
            "btn_color" => array(
                "title" => "",
                "type" => "color",
                "holder" => "",
                "default" => "",
                "desc" => "Button background color",
            ),
        ),
    ),	
	
	"icon_title" => array(
        "name" => "Iconed Title ",
        "size" => "size-1-1",
        "help"    => THEME_DIR.'/assets/help.html',
        "settings" => array(		
            "sec_title" => array(
                    "title" => "Title",
                    "type" => "text",
                    "holder" => "",
                    "default" => "",
                    "desc" => "The title image.",
            ),
            "item_icon" => array(
                            "title" => "",
                            "type" => "text",
                            "holder" => "icon-flash",
                            "default" => "icon-flash",
                            "desc" => '<a href="' . THEME_DIR . '/assets/css/fontello/demo.html" target="_blank" title="700+ Icons list">700+ icons</a>. Copy the Icon name and paste here',
                        ),

        ),
    ),
	
	"image_block" => array(
        "name" => "Image Block ",
        "size" => "size-1-2",
        "settings" => array(		
			"img_flaot" => array(
                 "title"   => "",
                 "type"    => "select",
                 "options" => array('left' => 'Left Image','right' => 'Right Image' ,'center' => 'Center Image' ),
                 "default" => "style_1",
                 "desc"    => "Choose your style.",
           ),
          // Image
            "image" => array(
                    "title" => "Thumbnail Image",
                    "type" => "text",
                    "holder" => "",
                    "default" => "",
                    "desc" => "The preivew image.",
            ),
             "add_image" => array(
                    "title" => "",
                    "type" => "button",
                    "save_to" => "image",
                    "default" => "Upload",
                    "desc" => "",
             ),
	
			
			
        ),
    ),
	
	"contactinfo" => array(
        "name"    => "Contact Info",
        "size"    => "size-1-1",
		"min-size" => "size-1-1",
        "only" => "builder",
        "settings" => array(
		"contact_title" => array(
                "title"   => "Contact Us Title",
                "type"    => "text",
                "holder"  => "",
                "default" => "",
                "desc"    => "",
            ),
		       "item_icon" => array(
                "title" => "Contact Us Iconed",
                "type" => "text",
                 "holder" => "icon-location-3",
                 "default" => "icon-location-3",
                  "desc" => '<a href="' . THEME_DIR . '/assets/css/fontello/demo.html" target="_blank" title="700+ Icons list">700+ icons</a>. Copy the Icon name and paste here',
           ),
	
		"contact_adess" => array(
                "title"   => "Contact Info Address",
                "type"    => "text",
                "holder"  => "",
                "default" => "",
                "desc"    => "",
            ),
		"contact_phone" => array(
                "title"   => "Contact Info Phone",
                "type"    => "text",
                "holder"  => "",
                "default" => "",
                "desc"    => "",
            ),
		"contact_email" => array(
                "title"   => "Contact Info Email",
                "type"    => "text",
                "holder"  => "",
                "default" => "",
                "desc"    => "",
            ),

			
		"contact_twitter_url" => array(
                "title"   => "Contact Twitter URL",
                "type"    => "text",
                "holder"  => "",
                "default" => "",
                "desc"    => "",
            ),	
			  

		"contact_facebook_url" => array(
                "title"   => "Contact Facebook URL",
                "type"    => "text",
                "holder"  => "",
                "default" => "",
                "desc"    => "",
            ),     
 
 
 		"contact_linked_url" => array(
                "title"   => "Contact Linkedin URL",
                "type"    => "text",
                "holder"  => "",
                "default" => "",
                "desc"    => "",
            ),   
            
        ),
    ),
	
	
	"image_box" => array(
        "name" => "Image Ad Block ",
        "size" => "size-1-1",
        "content" => "callout_text",
        "settings" => array(
         "textblock_ad" => array(
                "title"   => "Text Block Title",
                "type"    => "textArea",
                "holder"  => "",
                "default" => 'Kiwcky Work Multipurpose & Responsive Wordpress Theme',
                "desc"    => "This is callout title section",
            ),
            "image" => array(
                    "title" => "Thumbnail Image",
                    "type" => "text",
                    "holder" => "",
                    "default" => "",
                    "desc" => "The preivew image.",
            ),
             "add_image" => array(
                    "title" => "",
                    "type" => "button",
                    "save_to" => "image",
                    "default" => "Upload",
                    "desc" => "",
             ),
            "btn_text" => array(
                "title" => "",
                "type" => "text",
                "holder" => "button text",
                "default" => "Purchase Now",
                "desc" => "Custom 'Read More'",
            ),
            "btn_url" => array(
                "title" => "",
                "type" => "text",
                "holder" => "Only URL here",
                "default" => "#",
                "desc" => "Read More Link URL",
            ),
            "btn_color" => array(
                "title" => "",
                "type" => "color",
                "holder" => "",
                "default" => "",
                "desc" => "Button background color",
            ),
            "btn_target" => array(
                "title" => "",
                "type" => "select",
                "options" => $linkTarget,
                "default" => "_blank",
                "desc" => "Blank is opened new window. Self is opened current.",
            ),
        ),
    ),

	
    "chart_circle" => array(
        "name" => "Chart Circle",
        "size" => "size-1-3",
        "settings" => array(
            "item_animation_offset" => array(
                "title" => "Animation offset",
                "type" => "text",
                "holder" => "Example:50% or 100px",
                "default" => "",
                "desc" => "Animation start offset control",
            ),
            "cc" => array(
                "title" => "Edit Chart",
                "type" => "cc",
                "holder" => "",
                "default" => "",
                "desc" => "",
            ),
            "cc_type" => array(
                "title" => "Type",
                "type" => "select",
                "options" => array('text' => 'Text', 'fa' => 'Retina Icon'),
                "default" => "text",
                "desc" => "",
            ),
            "cc_line_width" => array(
                "title" => "Line Width",
                "type" => "hidden",
                "holder" => "",
                "default" => "6",
                "desc" => "",
            ),
            "cc_text" => array(
                "title" => "Text",
                "type" => "hidden",
                "holder" => "",
                "default" => "80%",
                "desc" => "",
            ),
            "cc_percent" => array(
                "title" => "Percent",
                "type" => "hidden",
                "holder" => "",
                "default" => "80",
                "desc" => "",
            ),
            "cc_size" => array(
                "title" => "Size",
                "type" => "hidden",
                "holder" => "",
                "default" => "100",
                "desc" => "",
            ),
            "cc_font_size" => array(
                "title" => "Font Size",
                "type" => "hidden",
                "holder" => "",
                "default" => "28",
                "desc" => "",
            ),
            "cc_font_color" => array(
                "title" => "Font Color",
                "type" => "hidden",
                "holder" => "",
                "default" => "#E12E36",
                "desc" => "",
            ),
            "cc_color" => array(
                "title" => "Color",
                "type" => "hidden",
                "holder" => "",
                "default" => "#E12E36",
                "desc" => "",
            ),
            "cc_track_color" => array(
                "title" => "Track Color",
                "type" => "hidden",
                "holder" => "",
                "default" => "#f5f5f5",
                "desc" => "",
            ),
            "cc_icon" => array(
                "title" => "Icon",
                "type" => "hidden",
                "holder" => "",
                "default" => "icon-html5",
                "desc" => "",
            ),
        ),
    ),
    "chart_graph" => array(
        "name" => "Chart Graph",
        "size" => "size-1-3",
        "content" => "items",
        "settings" => array(
            "add_item" => array(
                "title" => "",
                "type" => "button",
                "data" => array("item" => "chart_graph", "settings" => "items"),
                "default" => "Add Chart Item",
                "desc" => "",
            ),
            "item_animation_offset" => array(
                "title" => "Animation offset",
                "type" => "text",
                "holder" => "Example:50% or 100px",
                "default" => "",
                "desc" => "Animation start offset control",
            ),
            "item_height" => array(
                "title" => "Height",
                "type" => "text",
                "holder" => "Example: Empty or 100px",
                "default" => "",
                "desc" => "",
            ),
            "type" => array(
                "title" => "Chart Type",
                "type" => "select",
                "options" => array('Line' => 'Line', 'Bar' => 'Bar', 'Radar' => 'Radar'),
                "default" => "Line",
                "desc" => "All chart types and more information <a href='http://www.chartjs.org/docs/' target='_blank'>here</a>.",
            ),
            "labels" => array(
                "title" => "",
                "type" => "text",
                "holder" => "",
                "default" => "January , February , March , April",
                "desc" => "",
            ),
            "items" => array(
                "title" => "Items",
                "type" => "container",
                "container_type" => "toggle",
                "title_as" => "datas",
                "add_button" => "add_item",
                "default" => array(
                    array(
                        "fill_color" => array(
                            "title" => "Fill Color",
                            "type" => "color",
                            "holder" => "#E12E36",
                            "default" => "#E12E36",
                            "desc" => "Fill Color",
                        ),
                        "stroke_color" => array(
                            "title" => "Stroke Color",
                            "type" => "color",
                            "holder" => "#E12E36",
                            "default" => "#E12E36",
                            "desc" => "Stroke Color",
                        ),
                        "point_color" => array(
                            "title" => "Point Color",
                            "type" => "color",
                            "holder" => "#E12E36",
                            "default" => "#E12E36",
                            "desc" => "Point Color",
                        ),
                        "point_stroke_color" => array(
                            "title" => "Point Stroke Color",
                            "type" => "color",
                            "holder" => "#E12E36",
                            "default" => "#E12E36",
                            "desc" => "Point Stroke Color",
                        ),
                        "datas" => array(
                            "title" => "Datas",
                            "type" => "text",
                            "holder" => "",
                            "default" => "40,45,50,60",
                            "desc" => "Example: 40,45,50,60. Note: Digits only",
                        ),
                    )
                ),
                "desc" => "Items",
            ),
        ),
    ),
    "chart_pie" => array(
        "name" => "Chart Pie",
        "size" => "size-1-3",
        "content" => "items",
        "settings" => array(
            "add_item" => array(
                "title" => "",
                "type" => "button",
                "data" => array("item" => "chart_pie", "settings" => "items"),
                "default" => "Add Chart Item",
                "desc" => "",
            ),
            "item_animation_offset" => array(
                "title" => "Animation offset",
                "type" => "text",
                "holder" => "Example:50% or 100px",
                "default" => "",
                "desc" => "Animation start offset control",
            ),
            "type" => array(
                "title" => "Chart Type",
                "type" => "select",
                "options" => array( 'Doughnut' => 'Doughnut', 'Pie' => 'Pie'),
                "default" => "Doughnut",
                "desc" => "",
            ),
            "items" => array(
                "title" => "Items",
                "type" => "container",
                "container_type" => "toggle",
                "title_as" => "value",
                "add_button" => "add_item",
                "default" => array(
                    array(
                        "value" => array(
                            "title" => "100",
                            "type" => "text",
                            "holder" => "100",
                            "default" => "100",
                            "desc" => "Note: Only Digit",
                        ),
                        "color" => array(
                            "title" => "",
                            "type" => "color",
                            "holder" => "#E12E36",
                            "default" => "#E12E36",
                            "desc" => "Choose color",
                        ),
                    )
                ),
                "desc" => "Items",
            ),
        ),
    ),
    "column" => array(
        "name" => "Column",
        "size" => "size-1-3",
        "content" => "column_content",
        "only" => "builder",
        "settings" => array(
            "column_content" => array(
                "title" => "",
                "type" => "textArea",
                "tinyMCE" => "true",
                "holder" => "",
                "default" => "Column Content",
                "desc" => "",
            ),
        ),
    ),
    "sh_column" => array(
        "name" => "Column Shortcode",
        "size" => "size-1-3",
        "only" => "shortcode",
        "content" => "items",
        "settings" => array(
            "add_item" => array(
                "title" => "",
                "type" => "button",
                "data" => array("item" => "sh_column", "settings" => "items"),
                "default" => "Add Column",
                "desc" => "",
            ),
            "items" => array(
                "title" => "Items",
                "type" => "container",
                "container_type" => "toggle",
                "title_as" => "column_size",
                "add_button" => "add_item",
                "default" => array(
                    array(
                        "item_animation" => array(
                            "title" => "Animation",
                            "type" => "select",
                            "options" => $genAnimationArray,
                            "default" => "none",
                            "desc" => "Animation.",
                        ),
                        "item_animation_offset" => array(
                            "title" => "Animation offset",
                            "type" => "text",
                            "holder" => "Example:50% or 100px",
                            "default" => "",
                            "desc" => "Animation start offset control",
                        ),
                        "column_size" => array(
                            "title" => "Choose Column Size",
                            "type" => "select",
                            "options" => array("1 / 4" => "1 / 4", "1 / 3" => "1 / 3", "1 / 2" => "1 / 2", "2 / 3" => "2 / 3", "3 / 4" => "3 / 4", "1 / 1" => "1 / 1"),
                            "default" => "1 / 3",
                            "desc" => "",
                        ),
                        "column_content" => array(
                            "title" => "",
                            "type" => "textArea",
                            "holder" => "Completely synergize resource sucking relationships via premier niche markets.",
                            "default" => "Completely synergize resource sucking relationships via premier niche markets.",
                            "desc" => ".",
                        ),
                    )
                ),
                "desc" => "Items",
            ),
        ),
    ),
    
    "content" => array(
        "name" => "Content",
        "size" => "size-1-1",
        "only" => "builder",
        "settings" => array(
            "description" => array(
                "title" => "This element displays content of your Core Editor",
                "type" => "button",
                "data" => array(),
                "default" => "",
                "desc" => "",
            ),
        ),
    ),
    "divider" => array(
        "name" => "Divider",
        "size" => "size-1-1",
        "settings" => array(
            "type" => array(
                "title"   => "Choose Divider Type",
                "type"    => "select",
                "options" => array("line"=>"Line","space"=>"Space","icon"=>"Icon"),
                "hide"    => array("line" => "item_icon" ,"space" => "", "space" => "item_icon","icon" => "align" ),
                "default" => "line",
                "desc"    => "",
            ),
            "height" => array(
                "title"   => "Insert Height of the Space",
                "type"    => "text",
                "holder"  => "20",
                "default" => "20",
                "desc"    => "",
            ),	
			
			 "item_icon" => array(
                 "title"   => "Icon code here",
                  "type"    => "text",
                  "holder"  => "icon-ok",
                  "default" => "icon-ok",
                  "desc"    => '<a href="'.THEME_DIR.'/assets/css/fontello/demo.html" target="_blank" title="700+  Retina icons">700+ Retina icons</a>. Copy the Icon name and insert the input section.',
              ),

        ),
    ),
    "dropcap" => array(
        "name" => "Dropcap",
        "only" => "shortcode", //builder
        "content" => "text",
        "settings" => array(
            "text" => array(
                "title" => "Dropcap Text",
                "type" => "text",
                "holder" => "",
                "default" => "",
                "desc" => "Insert dropcap text.",
            ),
            "color" => array(
                "title" => "Dropcap Color",
                "type" => "color",
                "holder" => "#E12E36",
                "default" => "#E12E36",
                "desc" => "Choose dropcap background color.",
            ),
            "style" => array(
                "title" => "Dropcap Style",
                "type" => "select",
                "options" => array("square" => "Square Flat", "circle" => "Circle Flat", "square_border" => "Square Border", "circle_border" => "Circle Border"),
                "holder" => "",
                "default" => "square",
                "desc" => "Choose dropcap text color.",
            ),
        ),
    ),
    "fontawesome" => array(
        "name" => "Retina Icon",
        "only" => "shortcode",
        "size" => "size-1-3",
        "settings" => array(
            "fa" => array(
                "title" => "Add Icon",
                "type" => "fa",
                "holder" => "",
                "default" => "",
                "desc" => "",
            ),
            "fa_type" => array(
                "title" => "Type",
                "type" => "select",
                "holder" => "",
                "options" => array("circle" => "Circle", "square" => "square"),
                "default" => "circle",
                "desc" => "type.",
            ),
            "fa_size" => array(
                "title" => "Size",
                "type" => "hidden",
                "holder" => "",
                "default" => "30",
                "desc" => "Size.",
            ),
            "fa_padding" => array(
                "title" => "Padding",
                "type" => "hidden",
                "holder" => "",
                "default" => "20",
                "desc" => "Padding.",
            ),
            "fa_color" => array(
                "title" => "Color",
                "type" => "hidden",
                "holder" => "",
                "default" => "#aaaaaa",
                "desc" => "Color.",
            ),
            "fa_bg_color" => array(
                "title" => "Background Color",
                "type" => "hidden",
                "holder" => "",
                "default" => "",
                "desc" => "Background Color.",
            ),
            "fa_border_color" => array(
                "title" => "Border Color",
                "type" => "hidden",
                "holder" => "",
                "default" => "#aaaaaa",
                "desc" => "Border Color.",
            ),
            "fa_rounded" => array(
                "title" => "Border Size",
                "type" => "hidden",
                "holder" => "",
                "default" => "6",
                "desc" => "Border Size.",
            ),
            "fa_icon" => array(
                "title" => "Icon",
                "type" => "hidden",
                "holder" => "",
                "default" => "icon-umbrella",
                "desc" => "Icon.",
            ),
        ),
    ),
    "label" => array(
        "name" => "Label",
        "only" => "shortcode", //builder
        "content" => "text",
        "settings" => array(
            "text" => array(
                "title" => "Label Text",
                "type" => "text",
                "holder" => "",
                "default" => "",
                "desc" => "Insert label text.",
            ),
            "color" => array(
                "title" => "Label Color",
                "type" => "color",
                "holder" => "",
                "default" => "",
                "desc" => "Choose label color.",
            ),
        ),
    ),
    "list" => array(
        "name" => "List",
        "size" => "size-1-3",
        "content" => "items",
        "settings" => array(
            "add_item" => array(
                "title" => "",
                "type" => "button",
                "data" => array("item" => "list", "settings" => "items"),
                "default" => "Add List",
                "desc" => "",
            ),
            "items" => array(
                "title" => "Items",
                "type" => "container",
                "container_type" => "toggle",
                "title_as" => "item_icon",
                "add_button" => "add_item",
                "default" => array(
                    array(
                        "item_title" => array(
                            "title" => "",
                            "type" => "hidden",
                            "holder" => "",
                            "default" => "List Element",
                            "desc" => '',
                        ),
                        "item_animation" => array(
                            "title" => "Animation",
                            "type" => "select",
                            "options" => $genAnimationArray,
                            "default" => "none",
                            "desc" => "Animation.",
                        ),
                        "item_animation_offset" => array(
                            "title" => "Animation offset",
                            "type" => "text",
                            "holder" => "Example:50% or 100px",
                            "default" => "",
                            "desc" => "Animation start offset control",
                        ),
                        "item_icon" => array(
                            "title" => "",
                            "type" => "text",
                            "holder" => "icon-ok",
                            "default" => "icon-ok",
                            "desc" => '<a href="' . THEME_DIR . '/assets/css/fontello/demo.html" target="_blank" title="700+ Icons list">700+ icons</a>. Copy the Icon name and paste here',
                        ),
                        "item_text" => array(
                            "title" => "",
                            "type" => "textArea",
                            "holder" => "Insert some text",
                            "default" => "Insert some text",
                            "desc" => "",
                        ),
                    )
                ),
                "desc" => "Items",
            ),
        ),
    ),
    "milestones" => array(
        "name" => "Stats",
        "size" => "size-1-3",
        "content" => "items",
        "settings" => array(
            "add_item" => array(
                "title" => "",
                "type" => "button",
                "data" => array("item" => "milestones", "settings" => "items"),
                "default" => "Add Milestone",
                "desc" => "",
            ),
            "items" => array(
                "title" => "Items",
                "type" => "container",
                "container_type" => "toggle",
                "title_as" => "title",
                "add_button" => "add_item",
                "default" => array(
                    array(
                        "item_animation" => array(
                            "title" => "Animation",
                            "type" => "select",
                            "options" => $genAnimationArray,
                            "default" => "none",
                            "desc" => "Animation.",
                        ),
                        "item_animation_offset" => array(
                            "title" => "Animation offset",
                            "type" => "text",
                            "holder" => "Example:50% or 100px",
                            "default" => "",
                            "desc" => "Animation start offset control",
                        ),
                        "thumb_type" => array(
                            "title" => "Choose Thumb type",
                            "type" => "select",
                            "options" => array("image" => "Image", "fa" => "Retina Icon"),
                            "hide" => array("image" => "fa,fa_type", "fa" => "image,add_image"),
                            "default" => "fa",
                            "desc" => "Chosen type will be displayed.",
                        ),
                        // Image
                        "image" => array(
                            "title" => "Thumbnail Image",
                            "type" => "text",
                            "holder" => "",
                            "default" => "",
                            "desc" => "The preivew image.",
                        ),
                        "add_image" => array(
                            "title" => "",
                            "type" => "button",
                            "save_to" => "image",
                            "default" => "Upload",
                            "desc" => "",
                        ),
                        // Retina Icon
                        "fa" => array(
                            "title" => "Add Icon",
                            "type" => "fa",
                            "holder" => "",
                            "default" => "",
                            "desc" => "",
                        ),
                        "fa_type" => array(
                            "need_fa" => "true",
                            "title" => "Type",
                            "type" => "select",
                            "holder" => "",
                            "options" => array("circle" => "Circle", "square" => "square"),
                            "default" => "circle",
                            "desc" => "type.",
                        ),
                        "fa_size" => array(
                            "title" => "Size",
                            "type" => "hidden",
                            "holder" => "",
                            "default" => "25",
                            "desc" => "Size.",
                        ),
                        "fa_padding" => array(
                            "title" => "Padding",
                            "type" => "hidden",
                            "holder" => "",
                            "default" => "30",
                            "desc" => "Padding.",
                        ),
                        "fa_color" => array(
                            "title" => "Color",
                            "type" => "hidden",
                            "holder" => "",
                            "default" => "#E12E36",
                            "desc" => "Color.",
                        ),
                        "fa_border_color" => array(
                            "title" => "Border Color",
                            "type" => "hidden",
                            "holder" => "",
                            "default" => "#E12E36",
                            "desc" => "Border Color.",
                        ),
                        "fa_bg_color" => array(
                            "title" => "Background Color",
                            "type" => "hidden",
                            "holder" => "",
                            "default" => "",
                            "desc" => "Background Color.",
                        ),
                        "fa_border_color" => array(
                            "title" => "Border Color",
                            "type" => "hidden",
                            "holder" => "",
                            "default" => "#E12E36",
                            "desc" => "Border Color.",
                        ),
                        "fa_rounded" => array(
                            "title" => "Border Size",
                            "type" => "hidden",
                            "holder" => "",
                            "default" => "4",
                            "desc" => "Border Size.",
                        ),
                        "fa_icon" => array(
                            "title" => "Icon",
                            "type" => "hidden",
                            "holder" => "",
                            "default" => "icon-group",
                            "desc" => "Icon.",
                        ),
                        // -----------------------
                        "title" => array(
                            "title" => "",
                            "type" => "text",
                            "holder" => "Our Customers",
                            "default" => "Our Customers",
                            "desc" => "Insert your Milestone",
                        ),
                        "count" => array(
                            "title" => "",
                            "type" => "text",
                            "holder" => "1500",
                            "default" => "1500",
                            "desc" => "Count Number. Note: Only Digit",
                        ),
                    ),
                ),
                "desc" => "Items",
            ),
        ),
    ),
    "message_box" => array(
        "name" => "Message Box",
        "size" => "size-1-2",
        "content" => "items",
        "settings" => array(
            "add_item" => array(
                "title" => "",
                "type" => "button",
                "data" => array("item" => "message_box", "settings" => "items"),
                "default" => "Add Message Box",
                "desc" => "",
            ),
            "items" => array(
                "title" => "Items",
                "type" => "container",
                "container_type" => "toggle",
                "title_as" => "type",
                "add_button" => "add_item",
                "default" => array(
                    array(
                        "item_animation" => array(
                            "title" => "Animation",
                            "type" => "select",
                            "options" => $genAnimationArray,
                            "default" => "none",
                            "desc" => "Animation.",
                        ),
                        "item_animation_offset" => array(
                            "title" => "Animation offset",
                            "type" => "text",
                            "holder" => "Example:50% or 100px",
                            "default" => "",
                            "desc" => "Animation start offset control",
                        ),
                        "type" => array(
                            "title" => "",
                            "type" => "select",
                            "options" => array("default" => "Default", "alert" => "Alert", "info" => "Info", "success" => "Success", "error" => "Error"),
                            "default" => "default",
                            "desc" => "",
                        ),
                        "message_content" => array(
                            "title" => "",
                            "type" => "textArea",
                            "holder" => "Insert here Box Content",
                            "default" => "Insert here Box Content",
                            "desc" => "",
                        ),
                    )
                ),
                "desc" => "Items",
            ),
        ),
    ),
    "partner" => array(
        "name" => "Partner Carousel",
        "size" => "size-1-1",
        "settings" => array(
            "partner_category" => array(
                "title" => "Choose Post category",
                "type" => "category",
                "options" => $partner_categories,
                "default" => "0",
                "desc" => ".",
            ),
            "partner_category_list" => array(
                "type" => "hidden",
                "selector" => "partner_category",
                "default" => "",
            ),
            "image_height" => array(
                "title" => "Height",
                "type" => "text",
                "holder" => "100",
                "default" => "",
                "desc" => "Image height",
            ),
            "order" => array(
                "title" => "Order",
                "type" => "select",
                "options" => $order,
                "default" => "date_desc",
                "desc" => "",
            )
        ),
    ),
	
	"partner_list" => array(
        "name" => "Partner List",
        "size" => "size-1-1",
        "min-size" => "size-1-2",
		"row-type" => "row",
        "only" => "builder",
        "settings" => array(
            "partner_category" => array(
                "title" => "Choose Post category",
                "type" => "category",
                "options" => $partner_categories,
                "default" => "0",
                "desc" => ".",
            ),
            "partner_category_list" => array(
                "type" => "hidden",
                "selector" => "partner_category",
                "default" => "",
            ),
			"column" => array(
                "title" => "Column count",
                "type" => "select",
                "options" => array('6' => '6 Columns', '3' => '3 Columns', '4' => '4 Columns'),
                "default" => "4",
                "desc" => "This option will only 3 Column width when you are using portfolio with Sidebar. (Not a Fullwidth layout)",
            ),
            "count" => array(
                "title" => "Count",
                "type" => "text",
                "holder" => "10",
                "default" => "10",
                "desc" => "",
            ),

            "image_height" => array(
                "title" => "Height",
                "type" => "text",
                "holder" => "100",
                "default" => "",
                "desc" => "Image height",
            ),
            "order" => array(
                "title" => "Order",
                "type" => "select",
                "options" => $order,
                "default" => "date_desc",
                "desc" => "",
            )
        ),
    ),
	
    "portfolio" => array(
        "name" => "Portfolio",
        "size" => "size-1-1",
        "min-size" => "size-1-1",
        "row-type" => "row",
        "only" => "builder",
        "settings" => array(
            "port_category" => array(
                "title" => "Choose Portfolio category",
                "type" => "category",
                "options" => $port_categories,
                "default" => "0",
                "desc" => "Chosen categories will be included.",
            ),
            "category_ids" => array(
                "type" => "hidden",
                "selector" => "port_category",
                "default" => "",
            ),
            "column" => array(
                "title" => "Column count",
                "type" => "select",
                "options" => array('2' => '2 Columns', '3' => '3 Columns', '4' => '4 Columns'),
                "default" => "4",
                "desc" => "This option will only 3 Column width when you are using portfolio with Sidebar. (Not a Fullwidth layout)",
            ),
            "count" => array(
                "title" => "Count",
                "type" => "text",
                "holder" => "10",
                "default" => "10",
                "desc" => "",
            ),
            "height" => array(
                "title" => "Height",
                "type" => "text",
                "holder" => "250",
                "default" => "",
                "desc" => "Portfolio item height",
            ),
            "filter" => array(
                "title" => "Display Filter?",
                "type" => "select",
                "options" => $arrayYesNo,
                "default" => "true",
                "desc" => "",
            ),
            "pagination" => array(
                "title" => "Display Pagination?",
                "type" => "select",
                "options" => array('none' => 'None', 'simple' => 'Simple pagination', 'infinite' => 'Infinite scroll'),
                "default" => "none",
                "desc" => "",
            ),
            "order" => array(
                "title" => "Order",
                "type" => "select",
                "options" => $order,
                "default" => "date_desc",
                "desc" => "",
            ),
            "link_type" => array(
                "title" => "Link Open Type?",
                "type" => "select",
                "options" => array('view_large'=>'View large','permalink'=>'Permalink','preview_url'=>'Preview URL'),
                "default" => "view_large",
                "desc" => "Preview Url is located in Portfolio Single",
            ),
        ),
    ),
	


   "gallery" => array(
        "name" => "Gallery",
        "size" => "size-1-1",
        "min-size" => "size-1-1",
        "row-type" => "row",
        "only" => "builder",
        "settings" => array(
            "category" => array(
                "title" => "Blog category",
                "type" => "category",
                "options" => $post_categories,
                "default" => "0",
                "desc" => "If you want to display Specify category then choose.",
            ),
            "category_ids" => array(
                "type" => "hidden",
                "selector" => "category",
                "default" => "",
            ),
            "post_count" => array(
                "title" => "Post Count",
                "type" => "text",
                "holder" => "10",
                "default" => "10",
                "desc" => "Insert how many posts will displayed in blog.",
            ),
            "height" => array(
                "title" => "Height",
                "type" => "text",
                "holder" => "250",
                "default" => "",
                "desc" => "Portfolio item height",
            ),
            "pagination" => array(
                "title" => "Display Pagination?",
                "type" => "select",
                "options" => array('none' => 'None', 'simple' => 'Simple pagination', 'infinite' => 'Infinite scroll'),
                "default" => "none",
                "desc" => "",
            ),
            "excerpt_count" => array(
                "title" => "Excerpt Count",
                "type" => "text",
                "holder" => "50",
                "default" => "50",
                "desc" => "How much blog words displayed in blog Excerpt. Must insert Digits including 0.",
            ),
            "more_text" => array(
                "title" => "Read more text",
                "type" => "text",
                "holder" => "",
                "default" => "",
                "desc" => "Insert custom 'Read More' text",
            ),
        ),
    ),
	

    "recent_portfolios" => array(
        "name" => "Portfolio Carousel",
        "size" => "size-1-1",
        "only" => "builder",
        "settings" => array(
            "port_category" => array(
                "title" => "Portfolio category",
                "type" => "category",
                "options" => $port_categories,
                "default" => "0",
                "desc" => "Chosen categories will be included.",
            ),
            "port_category_list" => array(
                "type" => "hidden",
                "selector" => "port_category",
                "default" => "",
            ),
            "post_count" => array(
                "title" => "Post Count",
                "type" => "text",
                "holder" => "10",
                "default" => "6",
                "desc" => "Insert how many posts will displayed.",
            ),
            "image_height" => array(
                "title" => "Height",
                "type" => "text",
                "holder" => "250",
                "default" => "",
                "desc" => "Image height",
            ),
            "order" => array(
                "title" => "Order",
                "type" => "select",
                "options" => $order,
                "default" => "date_desc",
                "desc" => "",
            ),
            "description_title" => array(
                "title" => "Description Title",
                "type" => "text",
                "holder" => "Title",
                "default" => "",
                "desc" => "",
            ),
            "description_text" => array(
                "title" => "Description Text",
                "type" => "textArea",
                "holder" => "Description text",
                "default" => "",
                "desc" => "",
            ),            
            "link_type" => array(
                "title" => "Link Open Type?",
                "type" => "select",
                "options" => array('view_large'=>'View large','permalink'=>'Permalink','preview_url'=>'Preview URL'),
                "default" => "view_large",
                "desc" => "Preview Url is located in Portfolio Single",
            ),
			
        ),
    ),
    "recent_posts" => array(
        "name" => "Post Carousel",
        "size" => "size-1-1",
        "only" => "builder",
        "settings" => array(
            "post_category" => array(
                "title" => "Choose Post category",
                "type" => "category",
                "options" => $post_categories,
                "default" => "0",
                "desc" => ".",
            ),
            "post_category_list" => array(
                "type" => "hidden",
                "selector" => "post_category",
                "default" => "",
            ),
            "post_count" => array(
                "title" => "Post Count",
                "type" => "text",
                "holder" => "10",
                "default" => "6",
                "desc" => "Insert how many posts will displayed.",
            ),
            "more_link" => array(
                "title" => "More Link",
                "type" => "text",
                "holder" => "",
                "default" => "",
                "desc" => "Insert how many posts will displayed.",
            ),
            "excerpt_count" => array(
                "title" => "Excerpt Count",
                "type" => "text",
                "holder" => "50",
                "default" => "50",
                "desc" => "How much blog words displayed in blog Excerpt. Must insert Digits including 0.",
            ),
            "more_text_show" => array(
                "title" => "Read more",
                "type" => "select",
                "options" => $arrayYesNo,
                "default" => "false",
                "desc" => "Enable or Disable more text.",
            ),
            "more_text" => array(
                "title" => "Read more text",
                "type" => "text",
                "holder" => "",
                "default" => "",
                "desc" => "Insert custom 'Read More' text",
            ),
            "image_height" => array(
                "title" => "Height",
                "type" => "text",
                "holder" => "250",
                "default" => "",
                "desc" => "Image height",
            ),
            "order" => array(
                "title" => "Order",
                "type" => "select",
                "options" => $order,
                "default" => "date_desc",
                "desc" => "",
            ),
            "hide_hover" => array(
                "title" => "Disable Hover Feature?",
                "type" => "select",
                "options" => $arrayYesNo,
                "default" => "false",
                "desc" => "",
            ),	
            "link_type" => array(
                "title" => "Link Open Type?",
                "type" => "select",
                "options" => array('view_large'=>'View large','permalink'=>'Permalink'),
                "default" => "view_large",
                "desc" => "Preview Url is located in Portfolio Single",
            ),
            "hide_meta" => array(
                "title" => "Disable Meta?",
                "type" => "select",
                "options" => $arrayYesNo,
                "default" => "false",
                "desc" => "",
            )
        ),
    ),
	
	    "recent_news" => array(
        "name" => "News Carousel",
        "size" => "size-1-1",
        "only" => "builder",
        "settings" => array(
            "post_category" => array(
                "title" => "Choose Post category",
                "type" => "category",
                "options" => $post_categories,
                "default" => "0",
                "desc" => ".",
            ),
            "post_category_list" => array(
                "type" => "hidden",
                "selector" => "post_category",
                "default" => "",
            ),
            "post_count" => array(
                "title" => "Post Count",
                "type" => "text",
                "holder" => "10",
                "default" => "6",
                "desc" => "Insert how many posts will displayed.",
            ),
            "excerpt_count" => array(
                "title" => "Excerpt Count",
                "type" => "text",
                "holder" => "10",
                "default" => "10",
                "desc" => "How much blog words displayed in blog Excerpt. Must insert Digits including 0.",
            ),
            "more_text_show" => array(
                "title" => "Read more",
                "type" => "select",
                "options" => $arrayYesNo,
                "default" => "false",
                "desc" => "Enable or Disable more text.",
            ),
            "more_text" => array(
                "title" => "Read more text",
                "type" => "text",
                "holder" => "",
                "default" => "",
                "desc" => "Insert custom 'Read More' text",
            ),
            "order" => array(
                "title" => "Order",
                "type" => "select",
                "options" => $order,
                "default" => "date_desc",
                "desc" => "",
            ),

        ),
    ),
	   "recent_products" => array(
        "name" => "Products Carousel",
        "size" => "size-1-1",
        "only" => "builder",
        "settings" => array(

            "post_count" => array(
                "title" => "Post Count",
                "type" => "text",
                "holder" => "10",
                "default" => "6",
                "desc" => "Insert how many posts will displayed.",
            ),
            "image_height" => array(
                "title" => "Height",
                "type" => "text",
                "holder" => "250",
                "default" => "",
                "desc" => "Image height",
            ),

        ),
    ),
	
    "html" => array(
        "name" => "HTML",
        "size" => "size-1-3",
        "only" => "builder",
        "content" => "html_content",
        "settings" => array(
            "html_content" => array(
                "title"   => "",
                "type"    => "textArea",
                "holder"  => "",
                "default" => "",
                "desc"    => "",
            ),
        ),
    ),
    "pricing_table" => array(
        "name" => "Pricing Table",
        "size" => "size-1-1",
        "min-size" => "size-1-2",
        "settings" => array(
            "column" => array(
                "title" => "Choose the Pricing Tables Column",
                "type" => "select",
                "options" => array("2" => "2 Columns", "3" => "3 Columns", "4" => "4 Columns", "5" => "5 Columns"),
                "default" => "2",
                "desc" => "",
            ),
            "price_category" => array(
                "title" => "Pricing Table category",
                "type" => "category",
                "options" => $price_categories,
                "default" => "0",
                "desc" => "Choose the Pricing Table category you want to include.",
            ),
            "price_category_list" => array(
                "type" => "hidden",
                "selector" => "price_category",
                "default" => "",
            ),
        ),
    ),
    "progress" => array(
        "name" => "Progress Bar",
        "size" => "size-1-3",
        "content" => "items",
        "settings" => array(
            "add_item" => array(
                "title" => "",
                "type" => "button",
                "data" => array("item" => "progress", "settings" => "items"),
                "default" => "Add Progress Bar",
                "desc" => "",
            ),
            "items" => array(
                "title" => "Items",
                "type" => "container",
                "container_type" => "toggle",
                "title_as" => "progress_title",
                "add_button" => "add_item",
                "default" => array(
                    array(
                        "progress_title" => array(
                            "title" => "",
                            "type" => "text",
                            "holder" => "Progress title",
                            "default" => "Progress title",
                            "desc" => "",
                        ),
                        "item_animation" => array(
                            "title" => "Animation",
                            "type" => "select",
                            "options" => $genAnimationArray,
                            "default" => "none",
                            "desc" => "Animation.",
                        ),
                        "item_animation_offset" => array(
                            "title" => "Animation offset",
                            "type" => "text",
                            "holder" => "Example:50% or 100px",
                            "default" => "",
                            "desc" => "Animation start offset control",
                        ),
                        "percent" => array(
                            "title" => "Progress Percent",
                            "type" => "text",
                            "holder" => "Progress percent",
                            "default" => "50",
                            "desc" => "integer value in 0-100.",
                        ),
                        "type" => array(
                            "title" => "Choose Type",
                            "type" => "select",
                            "options" => array("default" => "Default", "striped" => "Striped", "animated" => "Animated"),
                            "desc" => "Choose Type",
                        ),
                        "color" => array(
                            "title" => "Color of Progress",
                            "type" => "color",
                            "holder" => "Color of Progress",
                            "default" => "#E12E36",
                            "desc" => "",
                        ),
                    )
                ),
                "desc" => "Items",
            ),
        ),
    ),
	
"product_show" => array(
        "name" => "Product Show",
        "size" => "size-1-1",
		"min-size" => "size-1-1",
        "only" => "builder",
        "help"    => THEME_DIR.'/assets/help.html',
        "settings" => array(
            "product_count" => array(
                "title"   => "Post Count",
                "type"    => "text",
                "holder"  => "10",
                "default" => "10",
                "desc"    => "Insert how many posts will displayed in blog.",
            ),

        ),
    ),
 
 	"product_featured" => array(
        "name" => "Featured Products",
        "size" => "size-1-1",
		"min-size" => "size-2-3",
        "only" => "builder",
        "help"    => THEME_DIR.'/assets/help.html',
        "settings" => array(
            "product_count" => array(
                "title"   => "Post Count",
                "type"    => "text",
                "holder"  => "4",
                "default" => "4",
                "desc"    => "Insert how many posts will displayed in blog.",
            ),

        ),
    ),
 
	
    "service" => array(
        "name" => "Featured Box",
        "size" => "size-1-3",
        "content" => "items",
        "settings" => array(
            "add_item" => array(
                "title" => "",
                "type" => "button",
                "data" => array("item" => "service", "settings" => "items"),
                "default" => "Add Featured Box",
                "desc" => "",
            ),
            "items" => array(
                "title" => "Items",
                "type" => "container",
                "container_type" => "toggle",
                "title_as" => "title",
                "add_button" => "add_item",
                "default" => array(
                    array(
                        "item_animation" => array(
                            "title" => "Animation",
                            "type" => "select",
                            "options" => $genAnimationArray,
                            "default" => "none",
                            "desc" => "Animation.",
                        ),
                        "item_animation_offset" => array(
                            "title" => "Animation offset",
                            "type" => "text",
                            "holder" => "Example:50% or 100px",
                            "default" => "",
                            "desc" => "Animation start offset control",
                        ),
						"hover_style" => array(
                            "title" => "Icon Hover Style",
                            "type" => "select",
                            "options" => array('rotateY' => 'rotateY', 'rotateScale' => 'rotate + Scale' , 'offest' => 'offest', 'hover' => 'Hover Color'  , 'none' => 'none'),
                            "default" => "none		",
                            "desc" => "Please set your Icon Hover Style.",
                        ),

                        "service_style" => array(
                            "title" => "Featured Box item style",
                            "type" => "select",
                            "options" => array('style_1' => 'Center Icon', 'style_2' => 'Left Icon', 'style_3' => 'Right Icon'),
                            "default" => "style_1",
                            "desc" => "Please set your featured box item style .",
                        ),

                        "thumb_type" => array(
                            "title" => "Choose Thumb type",
                            "type" => "select",
                            "options" => array("image" => "Image", "fa" => "Retina Icon", "cc" => "Circle Chart"),
                            "hide" => array("image" => "fa,fa_type,cc", "fa" => "service_thumb,add_thumb,service_thumb_height,service_thumb_width,fa_type,cc", "cc" => "service_thumb,add_thumb,service_thumb_height,service_thumb_width,fa_type,fa"),
                            "default" => "fa",
                            "desc" => "Chosen Post type will be displayed.",
                        ),
                        "service_thumb_width" => array(
                            "title" => "Featured Box Item Thumbnail Image Width",
                            "type" => "text",
                            "holder" => "",
                            "default" => "20",
                            "desc" => "The preivew image width.",
                        ),
                        "service_thumb" => array(
                            "title" => "Featured Box Item Thumbnail Image",
                            "type" => "text",
                            "holder" => "",
                            "default" => "",
                            "desc" => "The preivew image.",
                        ),
                        "add_thumb" => array(
                            "title" => "",
                            "type" => "button",
                            "save_to" => "service_thumb",
                            "default" => "Upload",
                            "desc" => "",
                        ),
                        // Retina Icon
                        "fa" => array(
                            "title" => "Add Icon",
                            "type" => "fa",
                            "holder" => "",
                            "default" => "",
                            "desc" => "",
                        ),
                        "fa_type" => array(
                            "need_fa" => "true",
                            "title" => "Type",
                            "type" => "select",
                            "holder" => "",
                            "options" => array("circle" => "Circle", "square" => "square"),
                            "default" => "circle",
                            "desc" => "type.",
                        ),
                        "fa_size" => array(
                            "title" => "Size",
                            "type" => "hidden",
                            "holder" => "",
                            "default" => "30",
                            "desc" => "Size.",
                        ),
                        "fa_padding" => array(
                            "title" => "Padding",
                            "type" => "hidden",
                            "holder" => "",
                            "default" => "20",
                            "desc" => "Padding.",
                        ),
                        "fa_color" => array(
                            "title" => "Color",
                            "type" => "hidden",
                            "holder" => "",
                            "default" => "#e7e7e7",
                            "desc" => "Color.",
                        ),
                        "fa_bg_color" => array(
                            "title" => "Background Color",
                            "type" => "hidden",
                            "holder" => "",
                            "default" => "",
                            "desc" => "Background Color.",
                        ),
                        "fa_border_color" => array(
                            "title" => "Border Color",
                            "type" => "hidden",
                            "holder" => "",
                            "default" => "#e7e7e7",
                            "desc" => "Border Color.",
                        ),
                        "fa_rounded" => array(
                            "title" => "Border Size",
                            "type" => "hidden",
                            "holder" => "",
                            "default" => "2",
                            "desc" => "Border Size.",
                        ),
                        "fa_icon" => array(
                            "title" => "Icon",
                            "type" => "hidden",
                            "holder" => "",
                            "default" => "icon-suitcase",
                            "desc" => "Icon.",
                        ),
                        // Circle Chart
                        "cc" => array(
                            "title" => "Add Chart",
                            "type" => "cc",
                            "holder" => "",
                            "default" => "",
                            "desc" => "",
                        ),
                        "cc_type" => array(
                            "need_cc" => "true",
                            "title" => "Type",
                            "type" => "select",
                            "options" => array('text' => 'Text', 'fa' => 'Retina Icon'),
                            "default" => "text",
                            "desc" => "",
                        ),
                        "cc_line_width" => array(
                            "title" => "Line Width",
                            "type" => "hidden",
                            "holder" => "",
                            "default" => "4",
                            "desc" => "",
                        ),
                        "cc_text" => array(
                            "title" => "Text",
                            "type" => "hidden",
                            "holder" => "",
                            "default" => "60%",
                            "desc" => "",
                        ),
                        "cc_percent" => array(
                            "title" => "Percent",
                            "type" => "hidden",
                            "holder" => "",
                            "default" => "60",
                            "desc" => "",
                        ),
                        "cc_size" => array(
                            "title" => "Size",
                            "type" => "hidden",
                            "holder" => "",
                            "default" => "120",
                            "desc" => "",
                        ),
                        "cc_font_size" => array(
                            "title" => "Font Size",
                            "type" => "hidden",
                            "holder" => "",
                            "default" => "40",
                            "desc" => "",
                        ),
                        "cc_font_color" => array(
                            "title" => "Font Color",
                            "type" => "hidden",
                            "holder" => "",
                            "default" => "#E12E36",
                            "desc" => "",
                        ),
                        "cc_color" => array(
                            "title" => "Color",
                            "type" => "hidden",
                            "holder" => "",
                            "default" => "#E12E36",
                            "desc" => "",
                        ),
                        "cc_track_color" => array(
                            "title" => "Track Color",
                            "type" => "hidden",
                            "holder" => "",
                            "default" => "#f9f9f9",
                            "desc" => "",
                        ),
                        "cc_icon" => array(
                            "title" => "Icon",
                            "type" => "hidden",
                            "holder" => "",
                            "default" => "icon-html5",
                            "desc" => "",
                        ),
                        // -----------------------

                        "title" => array(
                            "title" => "",
                            "type" => "text",
                            "holder" => "Featured Box Title",
                            "default" => "Your Featured Box Title",
                            "desc" => "",
                        ),
                        "content" => array(
                            "title" => "",
                            "type" => "textArea",
                            "holder" => "Column Content",
                            "default" => "Column Content",
                            "desc" => "",
                        ),
                        "more_text" => array(
                            "title" => "",
                            "type" => "text",
                            "holder" => "Read More",
                            "default" => "Read More",
                            "desc" => "Insert Custom Read More text",
                        ),
                        "more_url" => array(
                            "title" => "",
                            "type" => "text",
                            "holder" => "Only URL here",
                            "default" => "",
                            "desc" => "Read More URL.",
                        ),
                        "more_target" => array(
                            "title" => "",
                            "type" => "select",
                            "options" => $linkTarget,
                            "default" => "_blank",
                            "desc" => "Set to Blank to open in new",
                        ),
                    ),
                ),
                "desc" => "Items",
            ),
        ),
    ),
	
 "iconed_box" => array(
        "name"    => "Iconed Box",
        "size"    => "size-1-4",
		"min-size" => "size-2-4",
        "only" => "builder",
        "settings" => array(
		"iconed_box_title" => array(
                "title"   => "Iconed Box Title",
                "type"    => "text",
                "holder"  => "",
                "default" => "Iconed Box Title",
                "desc"    => "",
            ),

		"iconed_box_ccontent" => array(
                "title"   => "Iconed Box Content",
                "type"    => "textArea",
                "holder"  => "",
                "default" => "Iconed Box Content",
                "desc"    => "",
            ),
		"item_icon" => array(
				"title"   => "Icon code here",
				"type"    => "text",
				"holder"  => "icon-ok",
				"default" => "icon-ok",
				"desc"    => '<a href="'.THEME_DIR.'/assets/css/fontello/demo.html" target="_blank" title="700+  Retina icons">700+ Retina icons</a>. Copy the Icon name and insert the input section.',
		 ),		
				 
		"iconed_box_link" => array(
                "title"   => "Iconed Box URL",
                "type"    => "text",
                "holder"  => "",
                "default" => "",
                "desc"    => "",
            ),
		"iconed_box_link_txt" => array(
                "title"   => "Iconed Box link text",
                "type"    => "text",
                "holder"  => "Read More",
                "default" => "Read More",
                "desc"    => "",
         ),
            
        ),
    ),
	
 "side_Featured" => array(
        "name"    => "Side Featured",
        "size"    => "size-1-4",
		"min-size" => "size-2-4",
        "only" => "builder",
        "settings" => array(
		"iconed_box_title" => array(
                "title"   => "Side Featured  Title",
                "type"    => "text",
                "holder"  => "",
                "default" => "Side Featured Title",
                "desc"    => "",
            ),

		"iconed_box_ccontent" => array(
                "title"   => "Side Featured Content",
                "type"    => "textArea",
                "holder"  => "",
                "default" => "Side Featured Content",
                "desc"    => "",
            ),
		"item_icon" => array(
				"title"   => "Icon code here",
				"type"    => "text",
				"holder"  => "icon-ok",
				"default" => "icon-ok",
				"desc"    => '<a href="'.THEME_DIR.'/assets/css/fontello/demo.html" target="_blank" title="700+  Retina icons">700+ Retina icons</a>. Copy the Icon name and insert the input section.',
		 ),	
				 
		"iconed_box_link" => array(
                "title"   => "Side Featured URL",
                "type"    => "text",
                "holder"  => "",
                "default" => "",
                "desc"    => "",
            ),
		"iconed_box_link_txt" => array(
                "title"   => "Side Featured link text",
                "type"    => "text",
                "holder"  => "Read More",
                "default" => "Read More",
                "desc"    => "",
         ),
            
        ),
    ),

"iconed_text" => array(
        "name"    => "Iconed Text",
        "size"    => "size-1-4",
		"min-size" => "size-2-4",
        "only" => "builder",
        "settings" => array(
		"iconed_box_title" => array(
                "title"   => "Iconed Text Title",
                "type"    => "text",
                "holder"  => "",
                "default" => "",
                "desc"    => "",
            ),

		"iconed_box_ccontent" => array(
                "title"   => "Iconed Text Content",
                "type"    => "textArea",
                "holder"  => "",
                "default" => "",
                "desc"    => "",
            ),
		"item_icon" => array(
				"title"   => "Icon code here",
				"type"    => "text",
				"holder"  => "icon-ok",
				"default" => "icon-ok",
				"desc"    => '<a href="'.THEME_DIR.'/assets/css/fontello/demo.html" target="_blank" title="700+  Retina icons">700+ Retina icons</a>. Copy the Icon name and insert the input section.',
		 ),            
        ),
    ),
	

	
	
	
	
    "sidebar" => array(
        "name" => "Sidebar",
        "size" => "size-1-4",
        "only" => "builder",
        "settings" => array(
            "name" => array(
                "title" => "",
                "type" => "select",
                "options" => $arraySidebar,
                "default" => "Default sidebar",
                "desc" => "Please creat your own Sidebar in Theme Options Sidebar Creater then Choose here.",
            ),
        ),
    ),
    "slider" => array(
        "name" => "Slider",
        "size" => "size-1-1",
        "settings" => array(
            "id" => array(
                "title" => "",
                "type" => "select",
                "options" => $arraySlider,
                "default" => "0",
                "desc" => "Your created Sliders will be displayed here",
            ),
        ),
    ),
    "tab" => array(
        "name" => "Tab",
        "size" => "size-1-3",
        "content" => "items",
        "settings" => array(
            "add_item" => array(
                "title" => "",
                "type" => "button",
                "data" => array("item" => "tab", "settings" => "items"),
                "default" => "Add Tab",
                "desc" => "",
            ),
            "position" => array(
                "title" => "Choose Tab position",
                "type" => "select",
                "options" => array("top" => "Top", "left" => "Left", "right" => "Right"),
                "default" => "top",
                "desc" => "Tab Titles can be displayed top, right, left position.",
            ),
            "items" => array(
                "title" => "Items",
                "type" => "container",
                "container_type" => "toggle",
                "title_as" => "title",
                "add_button" => "add_item",
                "default" => array(
                    array(
                        "title" => array(
                            "title" => "",
                            "type" => "text",
                            "holder" => "",
                            "default" => "Tab Title",
                            "desc" => "",
                        ),
                        "title_icon" => array(
                            "title" => "Icon code here",
                            "type" => "text",
                            "holder" => "icon-ok",
                            "default" => "icon-ok",
                            "desc" => '<a href="' . THEME_DIR . '/assets/css/fontello/demo.html" target="_blank" title="700+ Icons list">700+ icons</a>. Copy the Icon name and paste here',
                        ),
                        "item_content" => array(
                            "title" => "",
                            "type" => "textArea",
                            "holder" => "Tab Content",
                            "default" => "Tab Content",
                            "desc" => "",
                        ),
                    )
                ),
                "desc" => "Items",
            ),
        ),
    ),
	
	"testimonials_list" => array(
        "name" => "Testimonials List",
        "size" => "size-1-1",
        "min-size" => "size-1-3",
        "only" => "builder",
		"settings" => array(
            "testim_category" => array(
                "title" => "",
                "type" => "category",
                "options" => $testim_categories,
                "default" => "0",
                "desc" => "Chosen categories will be displayed.",
            ),
            "category_ids" => array(
                "type" => "hidden",
                "selector" => "testim_category",
                "default" => "",
            ),
            "count" => array(
                "title" => "Count",
                "type" => "text",
                "holder" => "5",
                "default" => "5",
                "desc" => "",
            ),
        ),
    ),
	

	
    "team" => array(
        "name" => "Team",
        "size" => "size-1-1",
        "size" => "size-1-1",
        "row-type" => "row",
        "only" => "builder",
        "settings" => array(
            "team_category" => array(
                "title" => "Choose Team category",
                "type" => "category",
                "options" => $team_categories,
                "default" => "0",
                "desc" => "Chosen categories will be displayed.",
            ),
            "category_ids" => array(
                "type" => "hidden",
                "selector" => "team_category",
                "default" => "",
            ),
			"single_link" => array(
                            "title" => "Enable Single Team Link",
                            "type" => "checkbox",
                            "default" => "false",
            ),
            "height" => array(
                "title" => "Height",
                "type" => "text",
                "holder" => "250",
                "default" => "250",
                "desc" => "image height (px)",
            ),
            "count" => array(
                "title" => "Count",
                "type" => "text",
                "holder" => "4",
                "default" => "4",
                "desc" => "",
            ),
        ),
    ),
	
    "testimonials" => array(
        "name" => "Testimonials",
        "size" => "size-1-2",
        "settings" => array(
            "testim_category" => array(
                "title" => "",
                "type" => "category",
                "options" => $testim_categories,
                "default" => "0",
                "desc" => "Chosen categories will be displayed.",
            ),
            "category_ids" => array(
                "type" => "hidden",
                "selector" => "testim_category",
                "default" => "",
            ),
            "count" => array(
                "title" => "Count",
                "type" => "text",
                "holder" => "5",
                "default" => "5",
                "desc" => "",
            ),
            "direction" => array(
                "title" => "Choose Testimonials direction",
                "type" => "select",
                "options" => array("up" => "UP", "down" => "DOWN", "left" => "LEFT", "right" => "RIGHT"),
                "default" => "up",
                "desc" => "Chosen direction.",
            ),
            "duration" => array(
                "title" => "Duration",
                "type" => "text",
                "holder" => "1000",
                "default" => "1000",
                "desc" => "",
            ),
            "timeout" => array(
                "title" => "timeout",
                "type" => "text",
                "holder" => "2000",
                "default" => "2000",
                "desc" => "",
            ),
        ),
    ),
	
    "toggle" => array(
        "name" => "Toggle",
        "size" => "size-1-3",
        "content" => "items",
        "settings" => array(
            "add_item" => array(
                "title" => "",
                "type" => "button",
                "data" => array("item" => "toggle", "settings" => "items"),
                "default" => "Add Toggle",
                "desc" => "",
            ),
            "items" => array(
                "title" => "Items",
                "type" => "container",
                "container_type" => "toggle",
                "title_as" => "item_title",
                "add_button" => "add_item",
                "default" => array(
                    array(
                        "item_title" => array(
                            "title" => "",
                            "type" => "text",
                            "holder" => "",
                            "default" => "Toggle Title",
                            "desc" => "",
                        ),
                        "item_animation" => array(
                            "title" => "Animation",
                            "type" => "select",
                            "options" => $genAnimationArray,
                            "default" => "none",
                            "desc" => "Animation.",
                        ),
                        "item_animation_offset" => array(
                            "title" => "Animation offset",
                            "type" => "text",
                            "holder" => "Example:50% or 100px",
                            "default" => "",
                            "desc" => "Animation start offset control",
                        ),
						          "item_icon" => array(
                            "title" => "",
                            "type" => "text",
                            "holder" => "icon-flash",
                            "default" => "icon-flash",
                            "desc" => '<a href="' . THEME_DIR . '/assets/css/fontello/demo.html" target="_blank" title="700+ Icons list">700+ icons</a>. Copy the Icon name and paste here',
                        ),	
                        "item_expand" => array(
                            "title" => "Expand?",
                            "type" => "checkbox",
                            "default" => "false",
                            "desc" => "",
                        ),
                        "item_content" => array(
                            "title" => "",
                            "type" => "textArea",
                            "holder" => "Toggle Content",
                            "default" => "Toggle Content",
                            "desc" => "",
                        ),
                    )
                ),
                "desc" => "Items",
            ),
        ),
    ),
    "twitter" => array(
        "name" => "Twitter",
        "size" => "size-1-3",
        "settings" => array(
            "username" => array(
                "title" => "Insert Twitter Username",
                "type" => "text",
                "holder" => "",
                "default" => "otouch",
                "desc" => "Only twitter username.",
            ),
            "tweetstoshow" => array(
                "title" => "Count",
                "type" => "select",
                "options" => array("1" => "1", "2" => "2", "3" => "3", "4" => "4", "5" => "5", "6" => "6", "7" => "7", "8" => "8", "9" => "9", "10" => "10"),
                "default" => "3",
                "desc" => "",
            ),
            "cachetime" => array(
                "title" => "Cache Tweets in every * hours",
                "type" => "text",
                "holder" => "",
                "default" => "1",
                "desc" => "",
            ),
        ),
    ),
    "twitter_carousel" => array(
        "name" => "Twitter Carousel",
        "size" => "size-1-1",
        "settings" => array(
            "username" => array(
                "title" => "Insert Twitter Username",
                "type" => "text",
                "holder" => "",
                "default" => "otouch",
                "desc" => "Only twitter username.",
            ),
            "tweetstoshow" => array(
                "title" => "Count",
                "type" => "select",
                "options" => array("1" => "1", "2" => "2", "3" => "3", "4" => "4", "5" => "5", "6" => "6", "7" => "7", "8" => "8", "9" => "9", "10" => "10"),
                "default" => "3",
                "desc" => "",
            ),
            "cachetime" => array(
                "title" => "Cache Tweets in every * hours",
                "type" => "text",
                "holder" => "",
                "default" => "1",
                "desc" => "",
            ),
        ),
    ),
    "video" => array(
        "name" => "Video",
        "size" => "size-1-3",
        "content" => "video_embed",
        "settings" => array(
            "insert_type" => array(
                "title" => "Choose Post type",
                "type" => "select",
                "options" => array("type_url" => "URL", "type_embed" => "Embed"),
                "hide" => array("type_url" => "video_embed", "type_embed" => "video_m4v,add_video,video_thumb,add_thumb"),
                "default" => "post",
                "desc" => "Chosen Post type will be displayed.",
            ),
            "video_m4v" => array(
                "title" => "M4V File URL",
                "type" => "text",
                "holder" => "",
                "default" => "",
                "desc" => "The URL to the .m4v video file.",
            ),
            "add_video" => array(
                "title" => "",
                "type" => "button",
                "save_to" => "video_m4v",
                "default" => "Upload",
                "desc" => "",
            ),
            "video_thumb" => array(
                "title" => "Video Thumbnail Image",
                "type" => "text",
                "holder" => "",
                "default" => "",
                "desc" => "The preivew image.",
            ),
            "add_thumb" => array(
                "title" => "",
                "type" => "button",
                "save_to" => "video_thumb",
                "default" => "Upload",
                "desc" => "",
            ),
            "video_embed" => array(
                "title" => "Embeded Code",
                "type" => "textArea",
                "holder" => "",
                "default" => "",
                "desc" => "",
            ),
        ),
    ),
);
?>