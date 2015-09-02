<?php

######################################################################
# remove backend options by removing them from the config array
######################################################################
add_filter('woocommerce_general_settings','otouch_woocommerce_general_settings_filter');
add_filter('woocommerce_page_settings','otouch_woocommerce_general_settings_filter');
add_filter('woocommerce_catalog_settings','otouch_woocommerce_general_settings_filter');
add_filter('woocommerce_inventory_settings','otouch_woocommerce_general_settings_filter');
add_filter('woocommerce_shipping_settings','otouch_woocommerce_general_settings_filter');
add_filter('woocommerce_tax_settings','otouch_woocommerce_general_settings_filter');


function otouch_woocommerce_general_settings_filter($options)
{  
	$remove   = array('woocommerce_enable_lightbox', 'woocommerce_frontend_css');
	//$remove = array('image_options', 'woocommerce_enable_lightbox', 'woocommerce_catalog_image', 'woocommerce_single_image', 'woocommerce_thumbnail_image', 'woocommerce_frontend_css');

	foreach ($options as $key => $option)
	{
		if( isset($option['id']) && in_array($option['id'], $remove) ) 
		{  
			unset($options[$key]); 
		}
	}

	return $options;
}

/* Theme Activation Hook */
add_action('admin_init','otouch_theme_activation');
function otouch_theme_activation()
{
	global $pagenow;
	if(is_admin() && 'themes.php' == $pagenow && isset($_GET['activated'])) 
	{
		update_option('shop_catalog_image_size', array('width' => 500, 'height' => 500, 0));
		update_option('shop_single_image_size', array('width' => 500, 'height' => 500, 0));
		update_option('shop_thumbnail_image_size', array('width' => 150, 'height' => 150, 0));
	}
}

function avada_plugins_loaded() {
	if(!function_exists('is_woocommerce')) {
		function is_woocommerce() { return false; }
	}
}

// Woocommerce Hooks
remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);
remove_action('woocommerce_before_shop_loop', 'woocommerce_result_count', 20);
remove_action('woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30);



//on theme activation set default image size, disable woo lightbox and woo stylesheet. options are already hidden by previous filter function
function otouch_woocommerce_set_defaults()
{
	global $otouch_config;



	//set custom
	
	update_option('otouch_woocommerce_column_count', 3);
	update_option('otouch_woocommerce_product_count', 15);
	
	//set blank
	$set_false = array('woocommerce_enable_lightbox', 'woocommerce_frontend_css');
	foreach ($set_false as $option) { update_option($option, false); }
	
	//set blank
	$set_no = array('woocommerce_single_image_crop');
	foreach ($set_no as $option) { update_option($option, 'no'); }

}

add_action( 'otouch_backend_theme_activation', 'otouch_woocommerce_set_defaults', 10);


//add new options to the catalog settings
add_filter('woocommerce_general_settings','otouch_woocommerce_page_settings_filter');

function otouch_woocommerce_page_settings_filter($options)
{  

	$options[] = array(
		'name' => 'Column and Product Count',
        'type' => 'title',
        'desc' => 'The following settings allow you to choose how many columns and items should appear on your default shop overview page and your product archive pages.<br/><small>Notice: These options are added by the <strong>'.THEMENAME.' Theme</strong> and wont appear on other themes</small>',
        'id'   => 'column_options'
	);
	
	$options[] = array(
			'name' => 'Column Count',
            'desc' => '',
            'id' => 'otouch_woocommerce_column_count',
            'css' => 'min-width:175px;',
            'std' => '3',
            'desc_tip' => "This controls how many columns should appear on overview pages.",
            'type' => 'select',
            'options' => array
                (
                    '2' => '2',
                    '3' => '3',
                    '4' => '4',
                    '5' => '5'
                )
	);
	
	$itemcount = array('-1'=>'All');
	for($i = 3; $i<101; $i++) $itemcount[$i] = $i;	
	
		$options[] = array(
			'name' => 'Product Count',
            'desc' => "",
            'id' => 'otouch_woocommerce_product_count',
            'css' => 'min-width:175px;',
            'desc_tip' => 'This controls how many products should appear on overview pages.',
            'std' => '24',
            'type' => 'select',
            'options' => $itemcount
	);
	
	$options[] = array(
        
            'type' => 'sectionend',
            'id' => 'column_options'
        );
	
	
	return $options;
}


#
# add custom product mety boxes
#

add_filter('avf_builder_boxes','otouch_woocommerce_product_options');

function otouch_woocommerce_product_options($boxes)
{
	$boxes[] = array( 'title' =>__('Product Hover','otouch_framework' ), 'id'=>'otouch_product_hover', 'page'=>array('product'), 'context'=>'side', 'priority'=>'low');
	return $boxes;
}

add_filter('avf_builder_elements','otouch_woocommerce_product_elements');

function otouch_woocommerce_product_elements($el)
{	

	$el[] = array("slug"	=> "otouch_product_hover",
        "name" 	=> "Hover effect on <strong>Overview Pages</strong>",
        "desc" 	=> "Do you want to display a hover effect on overview pages and replace the default thumbnail with the first image of the gallery?",
        "id" 	=> "_product_hover",
        "type" 	=> "select",
        "std" 	=> "",
        "class" => "otouch-style",
        "subtype" => array("Yes - show first gallery image on hover" => 'hover_active', "No hover effect" => ''));

	return $el;
}


