<?php


function onetouch_woocommerce_enabled()
{
	if ( class_exists( 'woocommerce' ) ){ return true; }
	return false;
}


global $onetouch_config;

//product thumbnails
$onetouch_config['imgSize']['shop_thumbnail'] 	= array('width'=>120, 'height'=>120);
$onetouch_config['imgSize']['shop_catalog'] 	= array('width'=>450, 'height'=>450);
$onetouch_config['imgSize']['shop_single'] 		= array('width'=>450, 'height'=>999, 'crop' => false);

//onetouch_backend_add_thumbnail_size($onetouch_config);

add_theme_support( 'woocommerce' );

//check if the plugin is enabled, otherwise stop the script
if(!onetouch_woocommerce_enabled()) { return false; }

add_filter( 'woocommerce_enqueue_styles', '__return_false' );
/*advanced title + breadcrumb function*/
function onetouch_title($post = "", $_product = "", $title = "")
{


	 if (ott_option('shop_page_title')) {
		 
	
	 
		 
		 
	$shop_title =  ott_option('shop_title');
	$shop_subtitle =  ott_option('shop_subtitle');
	
	
$bg_image =  ott_option('shop_background');	if(!empty($bg_image)){
	echo "<div id='page-title'>";
	echo "<div class='container'><div class='row'><div class='ott-header withbg'>";   
	echo "<div><h1>";	
	echo ($shop_title) ? stripslashes($shop_title) : __('Our Products','onetouch');
	echo "</h1><div class='page_description_wrap'><span class='page_description'>";		
	echo $shop_subtitle;
	echo "</span></div>";

	echo "</div>";

	echo "</div></div></div></div>";
	}
	else
	{

	echo "<div id='page-title'>";
	echo "<div class='container'><div class='row'><div class='ott-header'>";   
	echo "<div><h1>";	
	echo ($shop_title) ? stripslashes($shop_title) : __('Our Products','onetouch');
	echo "</h1><div class='page_description_wrap'><span class='page_description'>";		
	echo $shop_subtitle;
	echo "</span></div>";

	echo "</div>";

	echo "</div></div></div></div>";
		
		}
	
	}
}


add_filter( 'woocommerce_breadcrumb_defaults', 'jk_change_breadcrumb_delimiter' );
function jk_change_breadcrumb_delimiter( $defaults ) {
// Change the breadcrumb delimeter from '/' to '>'
$defaults['delimiter'] = ' &raquo;   ';
return $defaults;
}



######################################################################
# config
######################################################################

//add onetouch config defaults

$onetouch_config['shop_overview_column']  = get_option('otouch_woocommerce_column_count');  // columns for the overview page
$onetouch_config['shop_overview_products']= get_option('otouch_woocommerce_product_count'); // products for the overview page

$onetouch_config['shop_single_column'] 	 	 = 4;			// columns for related products and upsells
$onetouch_config['shop_single_column_items'] = 4;	// number of items for related products and upsells
$onetouch_config['shop_overview_excerpt'] = false;		// display excerpt

if(!$onetouch_config['shop_overview_column']) $onetouch_config['shop_overview_column'] = 3;


######################################################################
# Create the correct template html structure
######################################################################

//remove woo defaults
remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10);
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10);
remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0);
remove_action( 'woocommerce_pagination', 'woocommerce_catalog_ordering', 20 );
remove_action( 'woocommerce_pagination', 'woocommerce_pagination', 10 );
remove_action( 'woocommerce_before_single_product', array($woocommerce, 'show_messages'), 10);



//add theme actions && filter
add_action( 'woocommerce_after_shop_loop_item_title', 'onetouch_woocommerce_overview_excerpt', 10);
add_filter( 'loop_shop_columns', 'onetouch_woocommerce_loop_columns');
add_filter( 'loop_shop_per_page', 'onetouch_woocommerce_product_count' );

//single page adds
add_action( 'onetouch_add_to_cart', 'woocommerce_template_single_add_to_cart', 30, 2 );



/*update woocommerce v2*/

remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 ); /*remove result count above products*/
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 ); /*remove woocommerce ordering dropdown*/
remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 ); //remove rating
remove_action( 'woocommerce_after_shop_loop', 'woocommerce_pagination', 10 ); //remove woo pagination



######################################################################
# FUNCTIONS
######################################################################


#
# removes the default post image from shop overview pages and replaces it with this image
#
add_action( 'woocommerce_before_shop_loop_item_title', 'onetouch_woocommerce_thumbnail', 10);
remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10);

function onetouch_woocommerce_thumbnail($asdf)
{
	global $product, $onetouch_config;
	$rating = $product->get_rating_html(); //get rating
	
	$id = get_the_ID();
	$size = 'shop_catalog';
	
	echo "<div class='thumbnail_container loop-image gary-image'>";
		echo get_the_post_thumbnail( $id , $size );
		if(!empty($rating)) echo "<span class='rating_container'>".$rating."</span>";
		if($product->product_type == 'simple') echo "<span class='cart-loading'></span>";
		 echo "<div class='image-overlay'>";
         echo " <div class='image-links'> ";
         echo "  <a class='btn btn-border' 'data-rel='prettyPhoto' href='".get_permalink($product->id)."'>";
         echo " <i class='icon-doc-3'></i>";
         echo "  </a></div></div>";
                        
                    
		
	echo "</div>";
}


function onetouch_woocommerce_gallery_first_thumbnail($id, $size)
{
	$active_hover = get_post_meta( $id, '_product_hover', true );


		$product_gallery = get_post_meta( $id, '_product_image_gallery', true );
		
		if(!empty($product_gallery))
		{
			$gallery	= explode(',',$product_gallery);
			$image_id 	= $gallery[0];
			$image 		= wp_get_attachment_image( $image_id, $size, false, array( 'class' => "attachment-$size onetouch-product-hover" ));
			
			if(!empty($image)) return $image;
		}
	
}




#
# add ajax cart / options buttons to the product
#

add_action( 'woocommerce_after_shop_loop_item', 'onetouch_add_cart_button', 16);
function onetouch_add_cart_button()
{
	global $product, $onetouch_config;

	if ($product->product_type == 'bundle' ){
		$product = new WC_Product_Bundle($product->id);
	}

	$extraClass  = "";

	ob_start();
	woocommerce_template_loop_add_to_cart();
	$output = ob_get_clean();

	if(!empty($output))
	{
		$pos = strpos($output, ">");
		
		if ($pos !== false) {
		    $output = substr_replace($output,"><i class='icon-cart'></i> ", $pos , strlen(1));
		}
	}
	

	if($product->product_type == 'variable' && empty($output))
	{
		$output = "<a class='add_to_cart_button button product_type_variable' href='".get_permalink($product->id)."'><i class='icon-doc-text-1'></i> ".__('Select options','onetouch')."</a>";
	}

	if($product->product_type == 'simple')
	{
		$output .= "<a class='button show_details_button' href='".get_permalink($product->id)."'><i class='icon-doc-text-1'></i> ".__('Show Details','onetouch')."</a>";
	}
	else
	{
		$extraClass  = "single_button";
	}
	 
	
	
	if($output) echo "<div class='onetouch_cart_buttons $extraClass'>$output</div>";
}





#
# wrap products on overview pages into an extra div for improved styling options. adds "product_on_sale" class if prodct is on sale
#

add_action( 'woocommerce_before_shop_loop_item', 'onetouch_shop_overview_extra_div', 5);
function onetouch_shop_overview_extra_div()
{
	global $product;
	$product_class = $product->is_on_sale() ? "product_on_sale" : "";

	echo "<div class='inner_product main_color wrapped_style noLightbox $product_class'>";
}

add_action( 'woocommerce_after_shop_loop_item',  'onetouch_close_div', 1000);
function onetouch_close_div()
{
	echo "</div>";
}


#
# wrap product titles and sale number on overview pages into an extra div for improved styling options
#

add_action( 'woocommerce_before_shop_loop_item_title', 'onetouch_shop_overview_extra_header_div', 20);
function onetouch_shop_overview_extra_header_div()
{
	echo "<div class='inner_product_header'><div class='portfolio_top'></div>";
}

add_action( 'woocommerce_after_shop_loop_item_title',  'onetouch_close_div', 1000);


#
# remove on sale badge from usual location and add it to the bottom of the product
#
remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10);
add_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10);

#
# helper function that collects all the necessary urls for the shop navigation
#

function onetouch_collect_shop_urls()
{
	global $woocommerce;

	$url['cart']				= $woocommerce->cart->get_cart_url();
	$url['checkout']			= $woocommerce->cart->get_checkout_url();
	$url['account_overview'] 	= get_permalink(get_option('woocommerce_myaccount_page_id'));
	$url['account_edit_adress']	= get_permalink(get_option('woocommerce_edit_address_page_id'));
	$url['account_view_order']	= get_permalink(get_option('woocommerce_view_order_page_id'));
	$url['account_change_pw'] 	= get_permalink(get_option('woocommerce_change_password_page_id'));
	$url['logout'] 				= wp_logout_url(home_url('/'));

	return $url;
}






function onetouch_add_to_cart($post, $product )
{
	echo "<div class='onetouch_cart onetouch_cart_".$product->product_type."'>";
	do_action( 'onetouch_add_to_cart', $post, $product );
	echo "</div>";
}


#
# creates the onetouch framework container arround the shop pages
#
add_action( 'woocommerce_before_main_content', 'onetouch_woocommerce_before_main_content', 10);


function onetouch_woocommerce_before_main_content()
{
	global $onetouch_config;

	if(!isset($onetouch_config['shop_overview_column'])) $onetouch_config['shop_overview_column'] = "auto";
		if($new = get_metabox( ott_option('woocommerce_shop_page_id'), 'layout'))

	{
		 //split up result
	 	 $results = explode(' : ', $new);
	 	 foreach($results as $result)
	 	 {
	 	 	$result = explode('|', $result);
	 	 	$onetouch_config[$result[0]] = $result[1];
	 	 }

	 	 $onetouch_config['layout'] = apply_filters('onetouch_layout_filter',  $onetouch_config['layout']);
	}

	$title_args = array();

	if(is_woocommerce())
	{
		$t_link = "";

		if(is_shop()) $title  = get_option('woocommerce_shop_page_title');

		$shop_id = woocommerce_get_page_id('shop');
		if($shop_id && $shop_id != -1)
		{
			if(empty($title)) $title = get_the_title($shop_id);
			$t_link = get_permalink($shop_id);
		}

		if(!$title) $title  = __("Shop",'onetouch');

		if(is_product_category() || is_product_tag())
        {
            global $wp_query;
            $tax = $wp_query->get_queried_object();
            $title = $tax->name;
            $t_link = '';
        }

		$title_args = array('title' => $title, 'link' => $t_link);
	}

	echo onetouch_title($title_args);
	
	

	echo "</header><div class='template-shop shop_columns_".$onetouch_config['shop_overview_column']."'>";

		echo "<div class='container'> <div class='row'>";

		if(!is_singular()) { $onetouch_config['overview'] = true; }
}

#
# closes the onetouch framework container arround the shop pages
#

add_action( 'woocommerce_after_main_content', 'onetouch_woocommerce_after_main_content', 10);
function onetouch_woocommerce_after_main_content()
{
	global $onetouch_config;
	$onetouch_config['currently_viewing'] = "shop";

			//reset all previous queries
			wp_reset_query();

			//get the sidebar
			if(!is_singular())
			if (ott_option('shoppage_sidebar_enable')) {
			 get_template_part( 'sidebar', 'shop' ) ;
			 
			}

	//	echo "</div>"; // end container - gets already closed at the top of footer.php
	
	echo "</div></div>"; // end tempate-shop content
}




#
# wrap an empty product search into extra div
#
add_action( 'woocommerce_before_main_content', 'onetouch_woocommerce_404_search', 9111);
function onetouch_woocommerce_404_search()
{
	global $wp_query;

	if( (is_search() || is_archive()) && empty($wp_query->found_posts) )
	{
		echo "<div class='template-page template-search template-search-none content  units'>";
		echo "<div class='entry entry-content' id='search-fail'>";
			  get_template_part('includes/error404');
		echo "</div>";
	}
}

add_action( 'woocommerce_after_main_content', 'onetouch_woocommerce_404_search_close', 1);
function onetouch_woocommerce_404_search_close()
{
	global $wp_query;
	if( is_search() && empty($wp_query->found_posts) ){ echo "</div>";}
}





#
# creates the onetouch framework content container arround the shop loop
#
add_action( 'woocommerce_before_shop_loop', 'onetouch_woocommerce_before_shop_loop', 1);

function onetouch_woocommerce_before_shop_loop()
{

	global $onetouch_config;
	if(isset($onetouch_config['dynamic_template'])) return;
	if (ott_option('shoppage_sidebar_enable')) {
	echo "<div class='template-shop span9 content units'><div class='entry-content'>";
	} else {
		echo "<div class='template-shop span12 content units'><div class='entry-content'>";
	}

}

#
# closes the onetouch framework content container arround the shop loop
#
add_action( 'woocommerce_after_shop_loop', 'onetouch_woocommerce_after_shop_loop', 10);

function onetouch_woocommerce_after_shop_loop()
{
			global $onetouch_config;
			if(isset($onetouch_config['dynamic_template'])) return;
			if(isset($onetouch_config['overview'] )) echo 	pagination();
			echo "</div></div>"; //end content
}



#
# echo the excerpt
#
function onetouch_woocommerce_overview_excerpt()
{
	global $onetouch_config;

	if(!empty($onetouch_config['shop_overview_excerpt']))
	{
		echo "<div class='product_excerpt'>";
		the_excerpt();
		echo "</div>";
	}
}



#
# creates the preview images based on page/category image
#
remove_action( 'woocommerce_archive_description', 'woocommerce_taxonomy_archive_description', 10 );
remove_action( 'woocommerce_product_archive_description', 'woocommerce_product_archive_description', 10 );


//add_action( 'woocommerce_before_shop_loop', 'woocommerce_product_archive_description', 12 ); //causes warning



#
# removes the default post image from shop overview pages and replaces it with this image
#
add_action( 'ava_main_header', 'onetouch_woocommerce_cart_dropdown', 10);

function onetouch_woocommerce_cart_dropdown()
{
	global $woocommerce, $onetouch_config;
	$cart_subtotal = $woocommerce->cart->get_cart_subtotal();
	$link = $woocommerce->cart->get_cart_url();
	$checkout_link = get_permalink(get_option('woocommerce_checkout_page_id'));
	
	$output = "";
	$output .= "<ul class = 'cart_dropdown' data-success='".__('was added to the cart', 'onetouch')."'><li class='cart_dropdown_first'>";
	$output .= "<a class='cart_dropdown_link' href='".$link."'><i class='icon-basket-1'></i></a>";
	$output .= "<div class='dropdown_widget dropdown_widget_cart'>";
	$output .= '<div class="widget_shopping_cart_content"></div>';
	$output .= "</div>";
	$output .= "</li></ul>";

	echo $output;
}

function onetouch_woocommerce_cart_link()
{
	global $woocommerce, $onetouch_config;
	$cart_subtotal = $woocommerce->cart->get_cart_subtotal();
	$link = $woocommerce->cart->get_cart_url();

	
	$output = "";
	$output .= '<div class="simple-cart-link">';
	$output .= "<a class='cart_dropdown_link' href='".$link."'><span><i class='icon-basket'></i><span class='cart_subtotal'>".$cart_subtotal."</span>";
	$output .= "</span></a></div>";

	echo $output;
}



#
# modify shop overview column count
#
function onetouch_woocommerce_loop_columns()
{
	global $onetouch_config;
	return $onetouch_config['shop_overview_column'];
}


#
# modify shop overview product count
#

function onetouch_woocommerce_product_count()
{
	global $onetouch_config;
	return $onetouch_config['shop_overview_products'];
}


#
# filter cross sells on the cart page. display 4 on fullwidth pages and 3 on carts with sidebar
#

add_filter('woocommerce_cross_sells_total', 'onetouch_woocommerce_cross_sale_count');
add_filter('woocommerce_cross_sells_columns', 'onetouch_woocommerce_cross_sale_count');

function onetouch_woocommerce_cross_sale_count($count)
{
	return 4;
}

#
# move cross sells bellow the shipping
#

remove_action( 'woocommerce_cart_collaterals', 'woocommerce_cross_sell_display' );
add_action( 'woocommerce_after_cart', 'woocommerce_cross_sell_display' , 10);




#
# display tabs and related items within the summary wrapper
#
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10 );
add_action(    'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 1 );



#
# display upsells and related products within dedicated div with different column and number of products
#
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products',20);
remove_action( 'woocommerce_after_single_product', 'woocommerce_output_related_products',10);
add_action( 'woocommerce_after_single_product_summary', 'onetouch_woocommerce_output_related_products', 20);

function onetouch_woocommerce_output_related_products()
{
	global $onetouch_config;
	$output = "";

	ob_start();
	woocommerce_related_products($onetouch_config['shop_single_column_items'],$onetouch_config['shop_single_column']); // X products, X columns
	$content = ob_get_clean();
	if($content)
	{
		$output .= "<div class='product_column product_column_".$onetouch_config['shop_single_column']."'>";
		$output .= "<div class='ott-divider'></div><div class= 'ott-title-container' ><div class='section-title-content'>";
		$output .= "<h3>".(__('Related Products', 'onetouch'))."</h3>";
		$output .= "<span class='section-line'></span></div></div>";
		$output .= $content;
		$output .= "</div>";
	}
	

	$onetouch_config['woo_related'] = $output;
	
}




remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15 );
remove_action( 'woocommerce_after_single_product', 'woocommerce_upsell_display',10);
add_action( 'woocommerce_after_single_product_summary', 'onetouch_woocommerce_output_upsells', 21); // needs to be called after the "related product" function to inherit columns and product count

function onetouch_woocommerce_output_upsells()
{
	global $onetouch_config;

	$output = "";

	ob_start();
	woocommerce_upsell_display($onetouch_config['shop_single_column_items'],$onetouch_config['shop_single_column']); // 4 products, 4 columns
	$content = ob_get_clean();
	if($content)
	{
		$output .= "<div class='product_column product_column_".$onetouch_config['shop_single_column']."'>";
		//$output .= "<h3>".(__('You may also like', 'onetouch'))."</h3>";
		$output .= $content;
		$output .= "</div>";
	}

	$onetouch_config['woo_upsells'] = $output;

}

add_action( 'woocommerce_after_single_product_summary', 'onetouch_woocommerce_display_output_upsells', 30); //display the related products and upsells

function onetouch_woocommerce_display_output_upsells()
{
	global $onetouch_config;
	
	$products = $onetouch_config['woo_upsells'].$onetouch_config['woo_related'];
	
	if(!empty($products))
	{
		
		$output  = "</div></div></div>";
		$output .= '<div  class="onetouch-section "><div class="container"><div class="template-page content units">';		
		$output .= $products;
		
		echo $output;	
	}
}



#
# wrap single product image in an extra div
#
add_action( 'woocommerce_before_single_product_summary', 'onetouch_add_image_div', 2);
add_action( 'woocommerce_before_single_product_summary',  'onetouch_close_image_div', 20);
function onetouch_add_image_div()
{
	echo "<div class='span4 alpha single-image'>";
}

function onetouch_close_image_div()
{
	global $onetouch_config;
	$onetouch_config['currently_viewing'] = "shop_single";
	echo "</div>";
}


#
# wrap single product summary in an extra div
#
add_action( 'woocommerce_before_single_product_summary', 'onetouch_add_summary_div', 25);
add_action( 'woocommerce_after_single_product_summary',  'onetouch_close_div', 3);
function onetouch_add_summary_div()
{
	echo "<div class='span8 single-product-summary'>";
}


#
# displays a front end interface for modifying the shoplist query parameters like sorting order, product count etc
#
if(!function_exists('onetouch_woocommerce_frontend_search_params'))
{
	add_action( 'woocommerce_before_shop_loop', 'onetouch_woocommerce_frontend_search_params', 20);

	function onetouch_woocommerce_frontend_search_params()
	{
		global $onetouch_config;

		if(!empty($onetouch_config['woocommerce']['disable_sorting_options'])) return false;

		$product_order['default'] 	= __("Default Order",'onetouch');
		$product_order['title'] 	= __("Name",'onetouch');
		$product_order['price'] 	= __("Price",'onetouch');
		$product_order['date'] 		= __("Date",'onetouch');
		$product_order['popularity'] = __("Popularity",'onetouch');

		$product_sort['asc'] 		= __("Click to order products ascending",  'onetouch');
		$product_sort['desc'] 		= __("Click to order products descending",  'onetouch');

		$per_page_string 		 	= __("Products",'onetouch');


		$per_page 		 		 	= get_option('onetouch_woocommerce_product_count');
		if(!$per_page) $per_page 	= get_option('posts_per_page');
		if(!empty($onetouch_config['woocommerce']['default_posts_per_page'])) $per_page = $onetouch_config['woocommerce']['default_posts_per_page'];


		parse_str($_SERVER['QUERY_STRING'], $params);

		$po_key = !empty($onetouch_config['woocommerce']['product_order']) ? $onetouch_config['woocommerce']['product_order'] : 'default';
		$ps_key = !empty($onetouch_config['woocommerce']['product_sort'])  ? $onetouch_config['woocommerce']['product_sort'] : 'asc';
		$pc_key = !empty($onetouch_config['woocommerce']['product_count']) ? $onetouch_config['woocommerce']['product_count'] : $per_page;

		$ps_key = strtolower($ps_key);

		//generate markup
		$output  = "";
		$output .= "<div class='product-sorting'>";
		$output .= "    <ul class='sort-param sort-param-order'>";
		$output .= "    	<li><span class='currently-selected'>".__("Sort by",'onetouch')." <strong>".$product_order[$po_key]."</strong></span>";
		$output .= "    	<ul>";
		$output .= "    	<li".onetouch_woo_active_class($po_key, 'default')."><a href='".onetouch_woo_build_query_string($params, 'product_order', 'default')."'>	".$product_order['default']."</a></li>";
		$output .= "    	<li".onetouch_woo_active_class($po_key, 'title')."><a href='".onetouch_woo_build_query_string($params, 'product_order', 'title')."'>".$product_order['title']."</a></li>";
		$output .= "    	<li".onetouch_woo_active_class($po_key, 'price')."><a href='".onetouch_woo_build_query_string($params, 'product_order', 'price')."'>".$product_order['price']."</a></li>";
		$output .= "    	<li".onetouch_woo_active_class($po_key, 'date')."><a href='".onetouch_woo_build_query_string($params, 'product_order', 'date')."'>".$product_order['date']."</a></li>";
		$output .= "    	<li".onetouch_woo_active_class($po_key, 'popularity')."><a href='".onetouch_woo_build_query_string($params, 'product_order', 'popularity')."'>".$product_order['popularity']."</a></li>";
		$output .= "    	</ul>";
		$output .= "    	</li>";
		$output .= "    </ul>";

		$output .= "    <ul class='sort-param sort-param-sort'>";
		$output .= "    	<li>";
		if($ps_key == 'desc') 	$output .= "    		<a title='".$product_sort['asc']."' class='sort-param-asc'  href='".onetouch_woo_build_query_string($params, 'product_sort', 'asc')."'>".$product_sort['desc']."</a>";
		if($ps_key == 'asc') 	$output .= "    		<a title='".$product_sort['desc']."' class='sort-param-desc' href='".onetouch_woo_build_query_string($params, 'product_sort', 'desc')."'>".$product_sort['asc']."</a>";
		$output .= "    	</li>";
		$output .= "    </ul>";





		$output .= "</div>";
		echo $output;
	}
}

//helper function to create the active list class
if(!function_exists('onetouch_woo_active_class'))
{
	function onetouch_woo_active_class($key1, $key2)
	{
		if($key1 == $key2) return " class='current-param'";
	}
}


//helper function to build the query strings for the catalog ordering menu
if(!function_exists('onetouch_woo_build_query_string'))
{
	function onetouch_woo_build_query_string($params = array(), $overwrite_key, $overwrite_value)
	{
		$params[$overwrite_key] = $overwrite_value;
		return "?". http_build_query($params);
	}
}

//function that actually overwrites the query parameters
if(!function_exists('onetouch_woocommerce_overwrite_catalog_ordering'))
{
	add_action( 'woocommerce_get_catalog_ordering_args', 'onetouch_woocommerce_overwrite_catalog_ordering', 20);

	function onetouch_woocommerce_overwrite_catalog_ordering($args)
	{
		global $onetouch_config;
		
		if(!empty($onetouch_config['woocommerce']['disable_sorting_options'])) return $args;

		//check the folllowing get parameters and session vars. if they are set overwrite the defaults
		$check = array('product_order', 'product_count', 'product_sort');
		if(empty($onetouch_config['woocommerce'])) $onetouch_config['woocommerce'] = array();
	
		foreach($check as $key)
		{
			if(isset($_GET[$key]) ) $_SESSION['onetouch_woocommerce'][$key] = esc_attr($_GET[$key]);
			if(isset($_SESSION['onetouch_woocommerce'][$key]) ) $onetouch_config['woocommerce'][$key] = $_SESSION['onetouch_woocommerce'][$key];
		}
		
		
		// is user wants to use new product order remove the old sorting parameter
		if(isset($_GET['product_order']) && !isset($_GET['product_sort']) && isset($_SESSION['onetouch_woocommerce']['product_sort']))
		{
			unset($_SESSION['onetouch_woocommerce']['product_sort'], $onetouch_config['woocommerce']['product_sort']);
		}

		extract($onetouch_config['woocommerce']);

		// set the product order
		if(!empty($product_order))
		{
			switch ( $product_order ) {
				case 'date'  : $orderby = 'date'; $order = 'desc'; $meta_key = '';  break;
				case 'price' : $orderby = 'meta_value_num'; $order = 'asc'; $meta_key = '_price'; break;
				case 'popularity' : $orderby = 'meta_value_num'; $order = 'desc'; $meta_key = 'total_sales'; break;
				case 'title' : $orderby = 'title'; $order = 'asc'; $meta_key = ''; break;
				case 'default':
				default : $orderby = 'menu_order title'; $order = 'asc'; $meta_key = ''; break;
			}
		}

		// set the product count
		if(!empty($product_count) && is_numeric($product_count))
		{
			$onetouch_config['shop_overview_products'] = (int) $product_count;
		}

		//set the product sorting
		if(!empty($product_sort))
		{
			switch ( $product_sort ) {
				case 'desc' : $order = 'desc'; break;
				case 'asc' : $order = 'asc'; break;
				default : $order = 'asc'; break;
			}
		}


		if(isset($orderby)) $args['orderby'] = $orderby;
		if(isset($order)) 	$args['order'] = $order;
		if (!empty($meta_key))
		{
			$args['meta_key'] = $meta_key;
		}
	

		$onetouch_config['woocommerce']['product_sort'] = $args['order'];
		
		return $args;
	}


}



