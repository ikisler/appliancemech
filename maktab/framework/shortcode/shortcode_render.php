<?php

/* ================================================================================== */
/*      Item Title Shortcode
  /* ================================================================================== */
if (!function_exists('shortcode_ott_item_title')) {

    function shortcode_ott_item_title($atts, $content) {
		
		 $item_link = !empty($atts['item_link']) ? $atts['item_link'] : '';
		 $item_icon = !empty($atts['item_icon']) ? $atts['item_icon'] : '';
	
		    $output = '<div class="ott-title-container">';
            $output .= '<div class="section-title-content">';
			$output .= !empty($item_icon) ? ('<i class="'.$atts['item_icon'].'"></i>') : '';
            $output .= '<h3 class="ott-section-title">' . rawUrlDecode($atts['title']) . '</h3>';			
            $output .= !empty($item_link) ? ('<a class="more-section" href="'.$atts['item_link'].'">'. rawUrlDecode($atts['item_link_text']) .'</a>') : '';
			$output .= '<span class="section-line"></span>';			
            $output .= '</div></div>';

        return $output;
    }

}
add_shortcode('ott_item_title', 'shortcode_ott_item_title');



/* ================================================================================== */
/*      Accordion Shortcode
  /* ================================================================================== */

// Accordion container
if (!function_exists('shortcode_ott_accordion')) {

    function shortcode_ott_accordion($atts, $content) {
        $output = '<div class="ott-accordion">';
        $output .= do_shortcode($content);
        $output .= '</div>';
        return $output;
    }

}
add_shortcode('ott_accordion', 'shortcode_ott_accordion');
// Accordion Item
if (!function_exists('shortcode_ott_accordion_item')) {

    function shortcode_ott_accordion_item($atts, $content) {
        if(isMobile()&&!ott_option('moblile_animation')){$atts['item_animation']='none';}
        $expand = (!empty($atts['item_expand']) && $atts['item_expand'] == 'true') ? true : false;
        $class='';
        $animated=false;
        if(isset($atts['item_animation'])&&$atts['item_animation']!=='none'){
            $animated=true;
            $class .= ' ott-animate-gen';
            $atts['item_animation_offset'] = isset($atts['item_animation_offset']) ? str_replace(' ','',$atts['item_animation_offset']) : '';
            $atts['item_animation_offset'] = empty($atts['item_animation_offset']) ? 'bottom-in-view' : $atts['item_animation_offset'];
        }
        
        $output = '<div class="accordion-group '.$class.'"'.($animated?' data-gen="'.$atts['item_animation'].'" data-gen-offset="'.$atts['item_animation_offset'].'" style="opacity:0;"':'').'>';
        $output .= '<div class="accordion-heading">';
        $output .= '<a class="accordion-toggle ' . ($expand ? ' active' : '') . '" data-toggle="collapse" data-parent="" href="#" >';
		$output .=	'<i class="' . $atts['item_icon'] . '"></i>';
        $output .= $atts['item_title'];
        $output .= '<span class="ott-check"><i class="icon-plus"></i><i class="icon-minus"></i></span>';
        $output .= '</a>';
        $output .= '</div>';
        $output .= '<div class="accordion-body collapse' . ($expand ? ' in' : '') . '" >';
        $output .= '<div class="accordion-inner">';
        $output .= apply_filters("the_content", $content);
        $output .= '</div>';
        $output .= '</div>';
        $output .= '</div>';


        return $output;
    }

}
add_shortcode('ott_accordion_item', 'shortcode_ott_accordion_item');



/* ================================================================================== */
/*      List Shortcode
  /* ================================================================================== */

// List container
if (!function_exists('shortcode_ott_list')) {

    function shortcode_ott_list($atts, $content) {
        $output = '<ul class="ott-list">';
        $output .= do_shortcode($content);
        $output .= '</ul>';
        return $output;
    }

}
add_shortcode('ott_list', 'shortcode_ott_list');
// List Item
if (!function_exists('shortcode_ott_list_item')) {

    function shortcode_ott_list_item($atts, $content) {
        if(isMobile()&&!ott_option('moblile_animation')){$atts['item_animation']='none';}
        $class='';
        $animated=false;
        if(isset($atts['item_animation'])&&$atts['item_animation']!=='none'){
            $animated=true;
            $class .= ' ott-animate-gen';
            $atts['item_animation_offset'] = isset($atts['item_animation_offset']) ? str_replace(' ','',$atts['item_animation_offset']) : '';
            $atts['item_animation_offset'] = empty($atts['item_animation_offset']) ? 'bottom-in-view' : $atts['item_animation_offset'];
        }
        $output = '<li class="'.$class.'"'.($animated?' data-gen="'.$atts['item_animation'].'" data-gen-offset="'.$atts['item_animation_offset'].'" style="opacity:0;"':'').'><i class="' . $atts['item_icon'] . '"></i>' . do_shortcode($content) . '</li>';
        return $output;
    }

}
add_shortcode('ott_list_item', 'shortcode_ott_list_item');



/* ================================================================================== */
/*      Toggle Shortcode
  /* ================================================================================== */

// Toggle container
if (!function_exists('shortcode_ott_toggle')) {

    function shortcode_ott_toggle($atts, $content) {
        $output = '<div class="ott-toggle">';
        $output .= do_shortcode($content);
        $output .= '</div>';
        return $output;
    }

}
add_shortcode('ott_toggle', 'shortcode_ott_toggle');
// Toggle Item
if (!function_exists('shortcode_ott_toggle_item')) {

    function shortcode_ott_toggle_item($atts, $content) {
        $atts['color'] = isset($atts['color'])?$atts['color']:'';
        $expand = (!empty($atts['item_expand']) && $atts['item_expand'] == 'true') ? true : false;
        if(isMobile()&&!ott_option('moblile_animation')){$atts['item_animation']='none';}
        $class='';
        $animated=false;
        if(isset($atts['item_animation'])&&$atts['item_animation']!=='none'){
            $animated=true;
            $class .= ' ott-animate-gen';
            $atts['item_animation_offset'] = isset($atts['item_animation_offset']) ? str_replace(' ','',$atts['item_animation_offset']) : '';
            $atts['item_animation_offset'] = empty($atts['item_animation_offset']) ? 'bottom-in-view' : $atts['item_animation_offset'];
        }
        $output = '<div class="accordion-group'.$class.'"'.($animated?' data-gen="'.$atts['item_animation'].'" data-gen-offset="'.$atts['item_animation_offset'].'" style="opacity:0;"':'').'>';
        $output .= '<div class="accordion-heading ' . ($expand ? ' active' : '') . '">';
        $output .= '<a class="accordion-toggle toggle ' . ($expand ? ' active' : '') . '" data-toggle="collapse" href="#" ><i class="' . $atts['item_icon'] . '"></i>';
        $output .= $atts['item_title'];
        $output .= '<span class="ott-check"><i class="icon-plus"></i><i class="icon-minus"></i></span>';
        $output .= '</a>';
        $output .= '</div>';
        $output .= '<div class="accordion-body collapse' . ($expand ? ' in' : '') . '" >';
        $output .= '<div class="accordion-inner">';
        $output .= apply_filters("the_content", $content);
        $output .= '</div>';
        $output .= '</div>';
        $output .= '</div>';

        return $output;
    }

}
add_shortcode('ott_toggle_item', 'shortcode_ott_toggle_item');



/* ================================================================================== */
/*      Tab Shortcode
  /* ================================================================================== */

// Tab container
if (!function_exists('shortcode_ott_tab')) {

    function shortcode_ott_tab($atts, $content) {
        $position = (!empty($atts['position']) || $atts['position'] != 'top') ? (' tabs-' . $atts['position']) : '';
        $output = '<div class="ott-tab tabbable' . $position . '">';
        $output .= do_shortcode($content);
        $output .= '<ul class="nav nav-tabs"></ul>';
        $output .= '<div class="tab-content"></div>';
        $output .= '</div>';
        return $output;
    }

}
add_shortcode('ott_tab', 'shortcode_ott_tab');
// Tab Item
if (!function_exists('shortcode_ott_tab_item')) {

    function shortcode_ott_tab_item($atts, $content) {
        $atts = shortcode_atts(array(
            'title_icon' => '',
            'title' => '',
                ), $atts);
        $output = '<li>';
        $output .= '<a href="">';
        if (!empty($atts['title_icon'])) {
            $output .= '<i class="' . $atts['title_icon'] . '"></i>';
        }
        if (!empty($atts['title'])) {
            $output .= '<span>' . $atts['title'] . '</span>';
        }
        $output .= '</a>';
        $output .= '</li>';
        $output .= '<div class="tab-pane" id="">';
        $output .= apply_filters("the_content", $content);
        $output .= '</div>';
        return $output;
    }

}
add_shortcode('ott_tab_item', 'shortcode_ott_tab_item');



/* ================================================================================== */
/*      Blog Shortcode
  /* ================================================================================== */
if (!function_exists('shortcode_ott_blog')) {

    function shortcode_ott_blog($atts, $content) {
        global $paged, $ott_options;
        $output = '<div class="ott-blog">';
        $query = Array(
            'post_type' => 'post',
            'posts_per_page' => $atts['post_count'],
            'paged' => $paged,
        );
        $cats = empty($atts['category_ids']) ? false : explode(",", $atts['category_ids']);
        if ($cats) {
            $query['tax_query'] = Array(Array(
                    'taxonomy' => 'category',
                    'terms' => $cats,
                    'field' => 'id'
                )
            );
        }
        $ott_options['pagination'] = isset($atts['pagination'])?$atts['pagination']:'none';
        $ott_options['excerpt_count'] = $atts['excerpt_count'];
        $ott_options['more_text'] = $atts['more_text'];
		
		$atts['layout'] = !empty($atts['layout']) ? $atts['layout'] : 'standard';
		
        if($atts['layout_size']==='span9'){
			$ott_options['layout'] = 'standard';
            if($atts['layout']!='standard')
                $ott_options['layout']='3';
        }elseif($atts['layout_size']==='span12'){
            switch ($atts['layout']){
                case '2':{ $ott_options['layout']='6';break;}
                case '3':{ $ott_options['layout']='4';break;}
                case '4':{ $ott_options['layout']='3';break;}
                case 'standard':{ $ott_options['layout']='standard';break;}
            }
        }
        
        if($ott_options['pagination']==='infinite'){
            wp_enqueue_script('blog-infinitescroll', THEME_DIR . '/assets/js/blog-infinitescroll.js', false, false, true);
        }
        if($ott_options['layout'] != 'standard'){
                wp_enqueue_script('isotope', THEME_DIR . '/assets/js/jquery.isotope.min.js', false, false, true);

        }
		
        query_posts($query);
        ob_start();
        get_template_part("loop");
        $output .= ob_get_clean();
        wp_reset_query();
        $output .= '</div>';
        return $output;
    }

}
add_shortcode('ott_blog', 'shortcode_ott_blog');



/* ================================================================================== */
/*      Column Shortcode
  /* ================================================================================== */
if (!function_exists('shortcode_ott_column')) {

    function shortcode_ott_column($atts, $content) {
        $output = apply_filters("the_content", $content);
        return $output;
    }

}
add_shortcode('ott_column', 'shortcode_ott_column');



/* ================================================================================== */
/*      Item Shortcode Container
  /* ================================================================================== */
if (!function_exists('shortcode_ott_item')) {

    function shortcode_ott_item($atts, $content) {
        if ($atts['row_type'] === 'row') {
            $atts['size'] = $atts['layout_size'];
        } else {
            if ($atts['layout_size'] === 'span3') {
                $atts['size'] = 'span12';
            }
        }
        if(isMobile()&&!ott_option('moblile_animation')){$atts['item_animation']='none';}
        $class='';
        $animated=false;
        if(isset($atts['item_animation'])&&$atts['item_animation']!=='none'){
            $animated=true;
            $class .= ' ott-animate-gen';
            $atts['item_animation_offset'] = isset($atts['item_animation_offset']) ? str_replace(' ','',$atts['item_animation_offset']) : '';
            $atts['item_animation_offset'] = empty($atts['item_animation_offset']) ? 'bottom-in-view' : $atts['item_animation_offset'];
        }
        
        $output = '<div class="ott-element ' . $atts['size'] . ' ' . $atts['class'] .$class. '" '.($animated?'data-gen="'.$atts['item_animation'].'" data-gen-offset="'.$atts['item_animation_offset'].'" style="opacity:0;"':'').'>' . do_shortcode($content) . '</div>';
        return $output;
    }

}
add_shortcode('ott_item', 'shortcode_ott_item');








/* ================================================================================== */
/*      Layout Shortcode
  /* ================================================================================== */
if (!function_exists('shortcode_ott_layout')) {

    function shortcode_ott_layout($atts, $content) {
        $output = '<div class="' . pbTextToFoundation($atts['size']) . ' ' . $atts['layout_custom_class'] . '">' . do_shortcode($content) . '</div>';
        return $output;
    }

}
add_shortcode('ott_layout', 'shortcode_ott_layout');



/* ================================================================================== */
/*      Core Content Shortcode
  /* ================================================================================== */
if (!function_exists('shortcode_ott_content')) {

    function shortcode_ott_content() {
        return apply_filters("the_content", get_the_content());
    }

}
add_shortcode('ott_content', 'shortcode_ott_content');



/* ================================================================================== */
/*      Service Shortcode
  /* ================================================================================== */
if (!function_exists('shortcode_ott_service')) {

    function shortcode_ott_service($atts, $content) {
		 $style='';
        

        if(isMobile()&&!ott_option('moblile_animation')){$atts['item_animation']='none';}
        $class='';
        $animated=false;
        if(isset($atts['item_animation'])&&$atts['item_animation']!=='none'){
            $animated=true;
            $class .= ' ott-animate-gen';
            $atts['item_animation_offset'] = isset($atts['item_animation_offset']) ? str_replace(' ','',$atts['item_animation_offset']) : '';
            $atts['item_animation_offset'] = empty($atts['item_animation_offset']) ? 'bottom-in-view' : $atts['item_animation_offset'];
        }
		
        $output = '<div class="ott-featured '  .$class. '"'.($animated?' data-gen="'.$atts['item_animation'].'" data-gen-offset="'.$atts['item_animation_offset'].'" "':'').' >';
        $output .= do_shortcode($content);
        $output .= '</div>';
        return $output;
    }

}
add_shortcode('ott_service', 'shortcode_ott_service');



// Service Item
if (!function_exists('shortcode_ott_service_item')) {

    function shortcode_ott_service_item($atts, $content) {
        $style = '';
        $thumb = '';
        $thumbType = isset($atts['thumb_type']) ? $atts['thumb_type'] : 'fa';
        $style_for_desc = '';
        $margin_for_desc = '';
        if ($atts['service_style'] === 'style_2') {
            $style = 'left-service';
            $style_for_desc = 'desc_unstyle';
            $margin_for_desc = ' margin-left:' . ($thumbType === 'fa' ? ($atts['fa_size'] + $atts['fa_padding'] + $atts['fa_padding'] + 30) : ($thumbType === 'image'?(intval($atts['service_thumb_width']) + 30):(intval($atts['cc_size']) + 15))) . 'px;';
            if($thumbType === 'cc'){$margin_for_desc.='margin-right:15px;';}
        }
		 if ($atts['service_style'] === 'style_3') {
            $style = 'right-service';
            $style_for_desc = 'desc_unstyle';
            $margin_for_desc = ' margin-right:' . ($thumbType === 'fa' ? ($atts['fa_size'] + $atts['fa_padding'] + $atts['fa_padding'] + 30) : ($thumbType === 'image'?(intval($atts['service_thumb_width']) + 30):(intval($atts['cc_size']) + 15))) . 'px;';
            if($thumbType === 'cc'){$margin_for_desc.='margin-right:15px;';}
        }
        if ($thumbType === 'image') {
            $thumb = isset($atts['service_thumb']) ? '<img title="' . $atts['title'] . '" width="' . $atts['service_thumb_width'] . '" src="' . $atts['service_thumb'] . '" />' : '';
        } elseif ($thumbType === 'fa') {
            $thumb = do_shortcode('[ott_fontawesome fa_type="' . $atts['fa_type'] . '" fa_size="' . $atts['fa_size'] . '" fa_padding="' . $atts['fa_padding'] . '" fa_color="' . $atts['fa_color'] . '" fa_bg_color="' . $atts['fa_bg_color'] . '" fa_border_color="' . $atts['fa_border_color'] . '" fa_rounded="' . $atts['fa_rounded'] . '" fa_icon="' . $atts['fa_icon'] . '"]');
        } elseif ($thumbType === 'cc') {
            $thumb = do_shortcode('[ott_chart_circle cc_type="' . $atts['cc_type'] . '" cc_line_width="' . $atts['cc_line_width'] . '" cc_text="' . $atts['cc_text'] . '" cc_percent="' . $atts['cc_percent'] . '" cc_size="' . $atts['cc_size'] . '" cc_font_size="' . $atts['cc_font_size'] . '" cc_font_color="' . $atts['cc_font_color'] . '" cc_color="' . $atts['cc_color'] . '" cc_track_color="' . $atts['cc_track_color'] . '" cc_icon="' . $atts['cc_icon'] . '"]');
        }
        if(isMobile()&&!ott_option('moblile_animation')){$atts['item_animation']='none';}
        $class='';
        $animated=false;
        if(isset($atts['item_animation'])&&$atts['item_animation']!=='none'){
            $animated=true;
            $class .= ' ott-animate-gen';
            $atts['item_animation_offset'] = isset($atts['item_animation_offset']) ? str_replace(' ','',$atts['item_animation_offset']) : '';
            $atts['item_animation_offset'] = empty($atts['item_animation_offset']) ? 'bottom-in-view' : $atts['item_animation_offset'];
        }

      $output = '<div class="ott-featured-box ' . $style .$class. '"'.($animated?' data-gen="'.$atts['item_animation'].'" data-gen-offset="'.$atts['item_animation_offset'].'" style="opacity:0;"':'').'>';
        $output .= '<div class="ott-featured-icon '. $atts['hover_style']. '" >' . $thumb . '</div>';
        $output .= '<div class="ott-featured-content ' . $style_for_desc . '" style="' . $margin_for_desc . '">';
        $output .= '<span class="title_sec">' . $atts['title'] . '</span>';
        $output .= '<p>' . do_shortcode($content) . '</p>';
        if (!empty($atts['more_url']))
            $output .= '<p><a class="featured-btn" href="' . $atts['more_url'] . '" target="' . $atts['more_target'] . '"><i class="icon-right-dir"></i>' . $atts['more_text'] . '</a></p>';
        $output .= '</div>';
        $output .= '</div>';

        return $output;
    }

}
add_shortcode('ott_service_item', 'shortcode_ott_service_item');


/* ================================================================================== */
/*      Service Box Shortcode
/* ================================================================================== */

if (!function_exists('shortcode_ott_service_box')) {
    function shortcode_ott_service_box($atts, $content) {
		
		
       if (!empty($atts['image'])) {
            $thumb = '<img src="'.$atts['image'].'" />';
        }

		
        $desc_text = !empty($atts['description_text'])?$atts['description_text']:'';
        
        $Callout_bt = isset($atts['iconed_box_link_txt']) ? $atts['iconed_box_link_txt'] : '';
        $Callout_bt_url = $atts['iconed_box_link'] ;
		$Callout_bt_full = '<a href="' . $Callout_bt_url . '"   class="btn btn-border rounded btn-small"><i class="icon-right-dir"></i>' . $Callout_bt . '<span></span></a>';
		


		$output = '<div class="ott-service-box">';	
				$output .= '<div class="ott-servie-image" >';

		     if ($Callout_bt_url != '') {
                $output .= '<a href="' . $Callout_bt_url . '" class="loop-image gary-image  ">'.$thumb.'</a>';

            } else {
				$output .= '<div class="gary-image" >';
                $output .= $thumb ;
				$output .= '</div>';
            }

				$output .= '</div>';

		$output .= '<div class="service-content"><div class="service-content-inner"><p>'.$atts['servicebox_subtitle'].'</p><h4>'.$atts['iconed_box_title'].'</h4>';
		$output .=	 '</div></div>';	
		$output .= '<div class="service-content-text"><div class="service-text-inner"><p>'.$atts['iconed_box_ccontent'].'</p>';
		$output .= '</div></div>';

		$output .= '</div>';
		
      return $output;
    }

}
add_shortcode('ott_service_box', 'shortcode_ott_service_box');


/* ================================================================================== */
/*      Iconed Box Shortcode
/* ================================================================================== */

if (!function_exists('shortcode_ott_iconed_box')) {
    function shortcode_ott_iconed_box($atts, $content) {

        $desc_text = !empty($atts['description_text'])?$atts['description_text']:'';
        
		$color=!empty($atts['color']) ? (' style="color:'.$atts['color'].'"'):'';   
		$icon_color=!empty($atts['icon_color']) ? (' style="background-color:'.$atts['icon_color'].'"'):''; 
		$text_color =!empty($atts['text_color']) ? (' style="color:'.$atts['text_color'].'"'):''; 

		

		$output = '<div class="ott-iconed-box">';		
		$output .= '<div class="iconed-box-inner"><div class="ott-icon-block">';
		$output .= '<i class="'.$atts['item_icon'].'"></i></div>';
		$output .= '<div class="ott-iconed-box-content">';
		$output .= '<h2>'.$atts['iconed_box_title'].'</h2>';
		$output .= '<p>'.$atts['iconed_box_ccontent'].'</p>';
        if (!empty($atts['iconed_box_link']))
            $output .= '<p><a class="featured-btn" href="' . $atts['iconed_box_link'] . '" ><i class="icon-right-dir"></i>' . $atts['iconed_box_link_txt'] . '</a></p>';
       
		$output .= '</div>';
		$output .= '</div></div>';
      return $output;
    }

}
add_shortcode('ott_iconed_box', 'shortcode_ott_iconed_box');






/* ================================================================================== */
/*      Iconed Box Shortcode
/* ================================================================================== */

if (!function_exists('shortcode_ott_side_Featured')) {
    function shortcode_ott_side_Featured($atts, $content) {

        $desc_text = !empty($atts['description_text'])?$atts['description_text']:'';
        
        $Callout_bt = isset($atts['iconed_box_link_txt']) ? $atts['iconed_box_link_txt'] : '';
        $Callout_bt_url = !empty($atts['iconed_box_link']) ? $atts['iconed_box_link'] : '#';
		$color=!empty($atts['color']) ? (' style="color:'.$atts['color'].'"'):'';   
		$icon_color=!empty($atts['icon_color']) ? (' style="background-color:'.$atts['icon_color'].'"'):''; 
		
		$Header_color =!empty($atts['header_color']) ? (' style="color:'.$atts['header_color'].'"'):''; 
		$text_color =!empty($atts['text_color']) ? (' style="color:'.$atts['text_color'].'"'):''; 

		

		$output = '<div class="ott-side-box">';		
		$output .= '<div class="iconed-box-inner"><div class="ott-icon-block">';
		$output .= '<i class="'.$atts['item_icon'].'"></i></div>';
		$output .= '<div class="ott-iconed-box-content">';
		$output .= '<h2 '.$Header_color.' >'.$atts['iconed_box_title'].'</h2>';
		$output .= '<p '.$text_color.' >'.$atts['iconed_box_ccontent'].'</p>';
       if (!empty($atts['iconed_box_link']))
            $output .= '<a class="featured-btn" href="' . $atts['iconed_box_link'] . '" ><i class="icon-right-dir"></i>' . $atts['iconed_box_link_txt'] . '</a>';
		$output .= '</div>';
		$output .= '</div></div>';
      return $output;
    }

}
add_shortcode('ott_side_Featured', 'shortcode_ott_side_Featured');



/* ================================================================================== */
/*      Iconed Text Shortcode
/* ================================================================================== */

if (!function_exists('shortcode_ott_iconed_text')) {
    function shortcode_ott_iconed_text($atts, $content) {

		$output = '<div class="ott-iconed-text">';		
		$output .= '<div class="ott-about-wrap"><div class="ott-icontxt-block">';
		$output .= '<i class="'.$atts['item_icon'].'"></i></div>';
		$output .= '<div class="ott-iconed-text-content">';
		$output .= '<h4>'.$atts['iconed_box_title'].'</h4>';
		$output .= '<p>'.$atts['iconed_box_ccontent'].'</p>';
		$output .= '</div>';
		$output .= '</div></div>';
      return $output;
    }

}
add_shortcode('ott_iconed_text', 'shortcode_ott_iconed_text');





/* ================================================================================== */
/*      Milestones Shortcode
  /* ================================================================================== */
if (!function_exists('shortcode_ott_milestones')) {

    function shortcode_ott_milestones($atts, $content) {
        $output = '<div class="ott-milestones">';
        $output .= do_shortcode($content);
        $output .= '</div>';
        return $output;
    }

}
add_shortcode('ott_milestones', 'shortcode_ott_milestones');

// Milestones Item
if (!function_exists('shortcode_ott_milestones_item')) {

    function shortcode_ott_milestones_item($atts, $content) {
        $atts['thumb_type']=isset($atts['thumb_type'])?$atts['thumb_type']:'fa';
        $thumb='';
        if($atts['thumb_type']==='fa'){
            $thumb = do_shortcode('[ott_fontawesome fa_type="' . $atts['fa_type'] . '" fa_size="' . $atts['fa_size'] . '" fa_padding="' . $atts['fa_padding'] . '" fa_color="' . $atts['fa_color'] . '" fa_bg_color="' . $atts['fa_bg_color'] . '" fa_border_color="' . $atts['fa_border_color'] . '" fa_rounded="' . $atts['fa_rounded'] . '" fa_icon="' . $atts['fa_icon'] . '"]');
        }else{
            $thumb = '<img src="'.$atts['image'].'" />';
        }
        if(isMobile()&&!ott_option('moblile_animation')){$atts['item_animation']='none';}
        $class='';
        $animated=false;
        if(isset($atts['item_animation'])&&$atts['item_animation']!=='none'){
            $animated=true;
            $class .= ' ott-animate-gen';
            $atts['item_animation_offset'] = isset($atts['item_animation_offset']) ? str_replace(' ','',$atts['item_animation_offset']) : '';
            $atts['item_animation_offset'] = empty($atts['item_animation_offset']) ? 'bottom-in-view' : $atts['item_animation_offset'];
        }
        $output = '<div class="ott-milestones-box ott-animate'.$class.'"'.($animated?' data-gen="'.$atts['item_animation'].'" data-gen-offset="'.$atts['item_animation_offset'].'" style="opacity:0;"':'').'>';
        $output .= '<div class="ott-milestones-icon">' . $thumb . '</div>';
        $output .= '<div class="ott-milestones-content">';
        $output .= '<div class="ott-milestones-count clearfix">';
        foreach (str_split($atts['count']) as $count) {
            $output .= '<div class="ott-milestones-show">';
            $output .= '<ul class="">';
            $count = intval($count);
            for ($i = 0; $i <= $count; $i++) {
                $output .= '<li class="">';
                $output .= $i;
                $output .= '</li>';
            }
            $output .= '</ul>';
            $output .= '</div>';
        }
        $output .= '</div><div class="line-divider"><span></span></div>';
        $output .= '<p>' . $atts['title'] . '</p>';
        $output .= '</div>';
        $output .= '</div>';
        return $output;
    }

}
add_shortcode('ott_milestones_item', 'shortcode_ott_milestones_item');



/* ================================================================================== */
/*      Font Awesome Shortcode
  /* ================================================================================== */
if (!function_exists('shortcode_ott_fontawesome')) {

    function shortcode_ott_fontawesome($atts, $content) {
        $atts['fa_size']=str_replace('px','',$atts['fa_size']);
        $atts['fa_padding']=str_replace('px','',$atts['fa_padding']);
        $atts['fa_rounded']=str_replace('px','',$atts['fa_rounded']);
        $style = 'text-align:center;';
        $style .='font-size:' . $atts['fa_size'] . 'px;';
        $style .='width:' . $atts['fa_size'] . 'px;';
        $style .='line-height:' . $atts['fa_size'] . 'px;';
        $style .='padding:' . $atts['fa_padding'] . 'px;';
        $style .='color:' . $atts['fa_color'] . ';';
        $style .='background-color:' . $atts['fa_bg_color'] . ';';
        $style .='border-color:' . $atts['fa_border_color'] . ';';
        $style .='border-width:' . $atts['fa_rounded'] . 'px;';
        $output = '<i class="ott-font-awesome ' . $atts['fa_icon'] . ' ' . $atts['fa_type'] . '" style="display: inline-block;border-style: solid;' . $style . '"></i>';
        return $output;
    }

}
add_shortcode('ott_fontawesome', 'shortcode_ott_fontawesome');



/* ================================================================================== */
/*      Chart Circle Shortcode
  /* ================================================================================== */
if (!function_exists('shortcode_ott_chart_circle')) {

    function shortcode_ott_chart_circle($atts, $content) {
        wp_enqueue_script('easy-pie-chart', THEME_DIR . '/assets/js/jquery.easy-pie-chart.js', false, false, true);
        $atts = shortcode_atts(array(
            'cc_type' => 'cc',
            'cc_line_width' => '10',
            'cc_text' => '40%',
            'cc_percent' => '40',
            'cc_size' => '100',
            'cc_font_size' => '24',
            'cc_font_color' => '#000',
            'cc_color' => '#ecf0f1',
            'cc_track_color' => '#E12E36',
            'cc_icon' => 'icon-umbrella',
            'item_animation_offset'=>'',
        ), $atts);
        if(isMobile()&&!ott_option('moblile_animation')){$atts['item_animation_offset']='none';}
        $atts['item_animation_offset'] = isset($atts['item_animation_offset']) ? str_replace(' ','',$atts['item_animation_offset']) : '';
        $atts['item_animation_offset'] = empty($atts['item_animation_offset']) ? 'bottom-in-view' : $atts['item_animation_offset'];

        $style = 'display:block; text-align:center; margin: 0 auto;';
        $style.='width:' . $atts['cc_size'] . 'px;';
        $style.='line-height:' . $atts['cc_size'] . 'px;';
        $cStyle = '';
        $cStyle.='color:' . $atts['cc_font_color'] . ';';
        $cStyle.='font-size:' . $atts['cc_font_size'] . 'px;';
        $data = '';
        $data .= ' data-percent="0"';
        $data .= ' data-percent-update="' . $atts['cc_percent'] . '"';
        $data .= ' data-line-width="' . $atts['cc_line_width'] . '"';
        $data .= ' data-size="' . $atts['cc_size'] . '"';
        $data .= ' data-color="' . $atts['cc_color'] . '"';
        $data .= ' data-track-color="' . $atts['cc_track_color'] . '"';
        $data .= ' data-gen-offset="'.$atts['item_animation_offset'].'"';
        $output = '';
        $output .='<div class="ott-chart-cricle ott-animate"' . $data . '>';
        $output .='<span style="' . $cStyle . '">';
        if ($atts['cc_type'] === 'fa') {
            $output .='<i class="' . $atts['cc_icon'] . '" style="' . $style . '"></i>';
        } else {
            $output .=$atts['cc_text'];
        }
        $output .='</span>';
        $output .='</div>';
        return $output;
    }

}
add_shortcode('ott_chart_circle', 'shortcode_ott_chart_circle');



/* ================================================================================== */
/*      Chart Graph Shortcode
  /* ================================================================================== */

// Chart Graph Container
if (!function_exists('shortcode_ott_chart_graph')) {

    function shortcode_ott_chart_graph($atts, $content) {
        wp_enqueue_script('chart', THEME_DIR . '/assets/js/Chart.min.js', false, false, true);
        $atts = shortcode_atts(array(
            'labels' => '',
            'item_height' => '',
            'type' => 'Line',
            'item_animation_offset'=>'',
        ), $atts);
        if(isMobile()&&!ott_option('moblile_animation')){$atts['item_animation_offset']='none';}
        $atts['item_animation_offset'] = isset($atts['item_animation_offset']) ? str_replace(' ','',$atts['item_animation_offset']) : '';
        $atts['item_animation_offset'] = empty($atts['item_animation_offset']) ? 'bottom-in-view' : $atts['item_animation_offset'];
        
        $atts['item_height'] = str_replace(' ','',$atts['item_height']);
        $output  = '<div class="ott-chart-graph ott-animate ott-redraw not-drawed" data-labels="' . $atts['labels'] . '" data-type="' . $atts['type'] . '" data-gen-offset="'.$atts['item_animation_offset'].'" data-item-height="'.$atts['item_height'].'">';
            $output .= '<ul style="display:none;" class="data">';
                $output .= do_shortcode($content);
            $output .= '</ul>';
            $output .= '<canvas></canvas>';
        $output .= '</div>';
        return $output;
    }

}
add_shortcode('ott_chart_graph', 'shortcode_ott_chart_graph');
// Chart Graph Item
if (!function_exists('shortcode_ott_chart_graph_item')) {

    function shortcode_ott_chart_graph_item($atts, $content) {
        $atts = shortcode_atts(array(
            'datas' => '',
            'fill_color' => '',
            'stroke_color' => '',
            'point_color' => '',
            'point_stroke_color' => '',
                ), $atts);
        $output = '<li data-datas="' . $atts['datas'] . '" data-fill-color="' . $atts['fill_color'] . '" data-stroke-color="' . $atts['stroke_color'] . '" data-point-color="' . $atts['point_color'] . '" data-point-stroke-color="' . $atts['point_stroke_color'] . '"></li>';
        return $output;
    }

}
add_shortcode('ott_chart_graph_item', 'shortcode_ott_chart_graph_item');



/* ================================================================================== */
/*      Chart Pie Shortcode
  /* ================================================================================== */

// Chart Pie Container
if (!function_exists('shortcode_ott_chart_pie')) {

    function shortcode_ott_chart_pie($atts, $content) {
        wp_enqueue_script('chart', THEME_DIR . '/assets/js/Chart.min.js', false, false, true);
        $atts = shortcode_atts(array(
            'type' => 'PolarArea',
            'item_animation_offset'=>'',
        ), $atts);
        if(isMobile()&&!ott_option('moblile_animation')){$atts['item_animation_offset']='none';}
        $atts['item_animation_offset'] = isset($atts['item_animation_offset']) ? str_replace(' ','',$atts['item_animation_offset']) : '';
        $atts['item_animation_offset'] = empty($atts['item_animation_offset']) ? 'bottom-in-view' : $atts['item_animation_offset'];
        $output = '<div class="ott-chart-pie ott-animate ott-redraw not-drawed" data-type="' . $atts['type'] . '" data-gen-offset="'.$atts['item_animation_offset'].'">';
            $output .= '<ul style="display:none;" class="data">';
                $output .= do_shortcode($content);
            $output .= '</ul>';
            $output .= '<canvas></canvas>';
        $output .= '</div>';
        return $output;
    }

}
add_shortcode('ott_chart_pie', 'shortcode_ott_chart_pie');
// Chart Pie Item
if (!function_exists('shortcode_ott_chart_pie_item')) {

    function shortcode_ott_chart_pie_item($atts, $content) {
        $atts = shortcode_atts(array(
            'value' => '',
            'color' => '',
                ), $atts);
        $output = '<li data-value="' . $atts['value'] . '" data-color="' . $atts['color'] . '"></li>';
        return $output;
    }

}
add_shortcode('ott_chart_pie_item', 'shortcode_ott_chart_pie_item');



/* ================================================================================== */
/*      Divider Shortcode
  /* ================================================================================== */

if (!function_exists('shortcode_ott_divider')) {

    function shortcode_ott_divider($atts, $content) {
        if($atts['type'] == 'space')
            $output = '<div style="margin-bottom:'.$atts['height'].'px; margin-top:'.$atts['height'].'px;"></div>';
        else
		if($atts['type'] == 'icon')
            $output = '<div class="ott_divider_icon" style="margin-bottom:'.$atts['height'].'px; margin-top:'.$atts['height'].'px;"><span><i class="' . $atts['item_icon'] . '"></span></i></div>';
        else
		if($atts['type'] == 'header_divider')
            $output = '<div class="hr-short hr-' . $atts['align'] . '"><span class="hr-inner"><span class="hr-inner-style"></span></span></div>';
        else
            $output = '<div class="ott-divider" style="margin-bottom:'.$atts['height'].'px;; margin-top:'.$atts['height'].'px"></div>';
        return $output;
    }


}
add_shortcode('ott_divider', 'shortcode_ott_divider');





/* ================================================================================== */
/*      Image Slider Shortcode
  /* ================================================================================== */
//  Image Slider Container
if (!function_exists('shortcode_ott_image')) {

    function shortcode_ott_image($atts, $content) {
        $output = '<div class="gallery-container clearfix">';
        $output .= '<div class="gallery-slide">';
        $output .= do_shortcode($content);
        $output .= '</div>';
        $output .= '<div class="carousel-arrow">';
        $output .= '<a class="carousel-prev" href="#"><i class="icon-left-open-1"></i></a>';
        $output .= '<a class="carousel-next" href="#"><i class="icon-right-open-1"></i></a>';
        $output .= '</div>';
        $output .= '</div>';
        return $output;
    }

}
add_shortcode('ott_image', 'shortcode_ott_image');
//  Image Slider Item
if (!function_exists('shortcode_ott_image_item')) {

    function shortcode_ott_image_item($atts, $content) {
        $output = '<div class="slide-item">';
        $output .= '<img src="' . $atts['url'] . '" alt="' . get_the_title() . '" style="width:100%;">';
        $output .= '</div>';
        return $output;
    }

}
add_shortcode('ott_image_item', 'shortcode_ott_image_item');


/* ================================================================================== */
/*      Messagebox Shortcode
  /* ================================================================================== */

// Messagebox container
if (!function_exists('shortcode_message_box')) {

    function shortcode_message_box($atts, $content) {
        $output = '<div class="ott-message-box">';
        $output .= do_shortcode($content);
        $output .= '</div>';
        return $output;
    }

}
add_shortcode('ott_message_box', 'shortcode_message_box');
// Messagebox Item
if (!function_exists('shortcode_ott_message_box_item')) {

    function shortcode_ott_message_box_item($atts, $content) {
        $type = "alert-default";
        $icon = '';
        if ($atts['type'] == 'default') {
            
        } elseif ($atts['type'] == 'alert') {
            $type = "";
            $icon = '<i class="icon-warning-sign"></i>';
        } elseif ($atts['type'] == 'info') {
            $type = "alert-info";
            $icon = '<i class="icon-info-sign"></i>';
        } elseif ($atts['type'] == 'success') {
            $type = "alert-success";
            $icon = '<i class="icon-ok-sign"></i>';
        } elseif ($atts['type'] == 'error') {
            $type = "alert-error";
            $icon = '<i class="icon-remove"></i>';
        }
        if(isMobile()&&!ott_option('moblile_animation')){$atts['item_animation']='none';}
        $class='';
        $animated=false;
        if(isset($atts['item_animation'])&&$atts['item_animation']!=='none'){
            $animated=true;
            $class .= ' ott-animate-gen';
            $atts['item_animation_offset'] = isset($atts['item_animation_offset']) ? str_replace(' ','',$atts['item_animation_offset']) : '';
            $atts['item_animation_offset'] = empty($atts['item_animation_offset']) ? 'bottom-in-view' : $atts['item_animation_offset'];
        }
        $output  = '<div class="alert ' . $type . $class . '"'.($animated?' data-gen="'.$atts['item_animation'].'" data-gen-offset="'.$atts['item_animation_offset'].'" style="opacity:0;"':'').'>';
        $output .= '<button type="button" class="close" data-dismiss="alert">&times;</button>';
        $output .= do_shortcode($content);
        $output .= $icon;
        $output .= '</div>';

        return $output;
    }

}
add_shortcode('ott_message_box_item', 'shortcode_ott_message_box_item');



/* ================================================================================== */
/*      Progress Shortcode
  /* ================================================================================== */
if (!function_exists('shortcode_ott_progress')) {

    function shortcode_ott_progress($atts, $content) {
        return do_shortcode($content);
    }

}
add_shortcode('ott_progress', 'shortcode_ott_progress');
if (!function_exists('shortcode_ott_progress_item')) {

    function shortcode_ott_progress_item($atts, $content) {
        if(isMobile()&&!ott_option('moblile_animation')){$atts['item_animation']='none';}
        $class='';
        $animated=false;
        if(isset($atts['item_animation'])&&$atts['item_animation']!=='none'){
            $animated=true;
            $class .= ' ott-animate-gen';
            $atts['item_animation_offset'] = isset($atts['item_animation_offset']) ? str_replace(' ','',$atts['item_animation_offset']) : '';
            $atts['item_animation_offset'] = empty($atts['item_animation_offset']) ? 'bottom-in-view' : $atts['item_animation_offset'];
        }
        
        $output = '<div class="progress_bar" '.$class.'"'.($animated?' data-gen="'.$atts['item_animation'].'" data-gen-offset="'.$atts['item_animation_offset'].'" style="opacity:0;"':'').'"><h4 class="progress_title">'. $atts['progress_title'].'</h4><div class="progress">';
		
        if ($atts['type'] == 'animated')
            $output = '<div class="progress_bar '.$class.'"'.($animated?' data-gen="'.$atts['item_animation'].'" data-gen-offset="'.$atts['item_animation_offset'].'" style="opacity:0;"':'').'"><h4 class="progress_title">'. $atts['progress_title'].'</h4><div class="progress progress-striped active">';
			
        elseif ($atts['type'] == 'striped')
			$output = '<div class="progress_bar '.$class.'"'.($animated?' data-gen="'.$atts['item_animation'].'" data-gen-offset="'.$atts['item_animation_offset'].'" style="opacity:0;"':'').'"><h4 class="progress_title">'. $atts['progress_title'].'</h4><div class="progress progress-striped">'; 
		
			$output .= '<div class="bar ' . ($atts['type'] == 'default' ? 'ott-bi' : '') . '" style="width: ' . $atts['percent'] . '%;background-color: ' . $atts['color'] . '"><span class="progress_number">' . $atts['percent'] . '%</span></div>';
			$output .= '</div></div>';
        return $output;
    }

}
add_shortcode('ott_progress_item', 'shortcode_ott_progress_item');





/* ================================================================================== */
/*      Sidebar Shortcode
  /* ================================================================================== */
if (!function_exists('shortcode_ott_sidebar')) {

    function shortcode_ott_sidebar($atts, $content) {
        ob_start();
        echo '<section id="sidebar">';
        if (!dynamic_sidebar($atts['name'])) {
            print 'There is no widget. You should add your widgets into <strong>';
            print $atts['name'];
            print '</strong> sidebar area on <strong>Appearance => Widgets</strong> of your dashboard. <br/><br/>';
        }
        echo '</section>';
        $output = ob_get_clean();
        return $output;
    }

}
add_shortcode('ott_sidebar', 'shortcode_ott_sidebar');






/* ================================================================================== */
/*      Video Shortcode
  /* ================================================================================== */
if (!function_exists('shortcode_ott_video')) {

    function shortcode_ott_video($atts, $content) {

        $video_embed = $content;
        $video_thumb = $atts['video_thumb'];
        $video_m4v = $atts['video_m4v'];
        $video_type = $atts['insert_type'];

        ob_start();

        if ($video_type == 'type_embed') {
            echo apply_filters("the_content", $video_embed);
        } elseif (!empty($video_m4v)) {
            global $post;
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
        $output = ob_get_clean();
        return $output;
    }

}
add_shortcode('ott_video', 'shortcode_ott_video');





/* ================================================================================== */
/*      Callout Shortcode
  /* ================================================================================== */

if (!function_exists('shortcode_ott_callout')) {
    function shortcode_ott_callout($atts, $content) {
        $Callout_bt = isset($atts['btn_text']) ? $atts['btn_text'] : '';
        $Callout_bt_url = !empty($atts['btn_url']) ? $atts['btn_url'] : '#';
        $Callout_bt_color = !empty($atts['btn_url']) ? (' style="background-color:'.$atts['btn_color'].';border-color:'.$atts['btn_color'].'"') : '#';
        $Callout_bt_target = isset($atts['btn_target']) ? $atts['btn_target'] : '_blank';
		$Callout_bt_icon = isset($atts['btn_icon']) ? $atts['btn_icon'] : '';
		
        $Callout_bt_full='<a href="'.$Callout_bt_url.'"'.$Callout_bt_color.' target="'.$Callout_bt_target.'" class="btn btn-flat rounded medium"><i class="'.$Callout_bt_icon.'"></i>'.$Callout_bt.'<span></span></a>';

        $output = '<div class="ott-callout">';
        $output .= '<div class="callout-text">';
        $output .= '<h1>' . do_shortcode($content) . '</h1>';
        $output .= '<p>' . $atts['description'] . '</p>';
        
        $output .= '</div>';
		$output .=!empty($Callout_bt) ? $Callout_bt_full : '';
        $output .= '</div>';

        return $output;
    }
}
add_shortcode('ott_callout', 'shortcode_ott_callout');




/* ================================================================================== */
/*      Callout Small Shortcode
  /* ================================================================================== */

if (!function_exists('shortcode_ott_callout_small')) {
    function shortcode_ott_callout_small($atts, $content) {
        $Callout_bt = isset($atts['btn_text']) ? $atts['btn_text'] : '';
        $Callout_bt_url = !empty($atts['btn_url']) ? $atts['btn_url'] : '#';
        $Callout_bt_color = !empty($atts['btn_url']) ? (' style="background-color:'.$atts['btn_color'].';border-color:'.$atts['btn_color'].'"') : '#';
        $Callout_bt_target = isset($atts['btn_target']) ? $atts['btn_target'] : '_blank';
		$Callout_bt_icon = isset($atts['btn_icon']) ? $atts['btn_icon'] : '';

		
		
        $Callout_bt_full = '<a href="' . $Callout_bt_url . '"' . $Callout_bt_color . ' target="' . $Callout_bt_target . '" class="btn btn-flat rounded medium" ><i class="'.$Callout_bt_icon.'"></i>' . $Callout_bt . '<span></span></a>';
        
		
        $output = '<div class="ott-callout small' . (!empty($Callout_bt) ? ' with-button' : '') . '">';
        $output .= '<div class="callout-text">';
        $output .= '<h1>' . do_shortcode($content) . '</h1>';
        $output .=!empty($Callout_bt) ? $Callout_bt_full : '';
        $output .= '</div>';
        $output .= '</div>';


        return $output;
    }
}
add_shortcode('ott_callout_small', 'shortcode_ott_callout_small');




/* ================================================================================== */
/*      Iconed title Shortcode
  /* ================================================================================== */

if (!function_exists('shortcode_ott_icon_title')) {
    function shortcode_ott_icon_title($atts, $content) {
        $icon= isset($atts['item_icon']) ? $atts['item_icon'] : '';
		$sec_title = isset($atts['sec_title']) ? $atts['sec_title'] : '';

		    $output = '<div class="ott-title-container indv">';
            $output .= '<div class="section-title-content">';
			$output .= !empty($item_icon) ? ('<i class="'.$atts['item_icon'].'"></i>') : '';
            $output .= '<h3 class="ott-section-title">' .$sec_title. '</h3>';			
            $output .= !empty($item_link) ? ('<a class="more-section" href="'.$atts['item_link'].'">'. rawUrlDecode($atts['item_link_text']) .'</a>') : '';
            $output .= '</div></div>';

        return $output;
    }
}
add_shortcode('ott_icon_title', 'shortcode_ott_icon_title');


/* ================================================================================== */
/*      Callout Shortcode
/* ================================================================================== */

if (!function_exists('shortcode_ott_teaser')) {
    function shortcode_ott_teaser($atts, $content) {
        
        $Callout_bt=isset($atts['btn_text'])?$atts['btn_text']:'';
		$btn_color =isset($atts['btn_color'])?$atts['btn_color']:'';
        $Callout_bt_url=!empty($atts['btn_url'])?to_url($atts['btn_url']):'#';
        $Callout_bt_color=!empty($atts['btn_url'])?(' style="background-color:'.$btn_color.'"'):'#';
        $Callout_bt_target=isset($atts['btn_target'])?$atts['btn_target']:'_blank';
		$Callout_bt_icon = isset($atts['btn_icon']) ? $atts['btn_icon'] : '';
        $Callout_bt_full='<a href="'.$Callout_bt_url.'"'.$Callout_bt_color.' target="'.$Callout_bt_target.'" class="btn btn-flat rounded large"><i class="'.$Callout_bt_icon.'"></i>'.$Callout_bt.'<span></span></a>';
        
;	

		
		
		
        $output = '<div class="ott-teaser'.(!empty($Callout_bt) ? ' with-button' : '').'">';
        $output .= '<div class="callout-text"><div class="teaser-content">';
        $output .= '<h3>'.do_shortcode($content).'</h3>';
        $output .= '<p>' . $atts['description'] . '</p>';
        $output .= ' </div>';        
        $output .= !empty($Callout_bt) ? $Callout_bt_full : '';
        $output .= '</div>';
        $output .= '</div>';

        return $output;
    }
}
add_shortcode('ott_teaser', 'shortcode_ott_teaser');


/* ================================================================================== */
/*      Callout Shortcode
/* ================================================================================== */

if (!function_exists('shortcode_ott_text_block')) {
    function shortcode_ott_text_block($atts, $content) {
        
		
        $Callout_bt = isset($atts['btn_text']) ? $atts['btn_text'] : '';
        $Callout_bt_url = !empty($atts['btn_url']) ? $atts['btn_url'] : '#';
        $Callout_bt_color = !empty($atts['btn_color']) ? (' style="background-color:'.$atts['btn_color'].';border-color:'.$atts['btn_color'].'"') : '#';
        $Callout_bt_target = isset($atts['btn_target']) ? $atts['btn_target'] : '_blank';

        $Callout_bt_full = '<a href="' . $Callout_bt_url . '" target="' . $Callout_bt_target . '" '. $Callout_bt_color.' class="btn btn-flat rounded large">' . $Callout_bt . '<span></span></a>';

		
        $output = '<div class="ott-text-block">';
        $output .= '<div class="text-block-content">';
		$output .= '<h2>'.$atts['callout_text'].'</h2>';
		$output .= '<div class="ott_divider_icon" ><span><i class="' . $atts['item_icon'] . '"></i></span></div>';
		$output .= '<p>'.do_shortcode($content).'</p>';
		$output .=!empty($Callout_bt) ? $Callout_bt_full : '';
        $output .= '</div>';
        $output .= '</div>';

        return $output;
    }
}
add_shortcode('ott_text_block', 'shortcode_ott_text_block');




/* ================================================================================== */
/*      Background Text Shortcode
/* ================================================================================== */

if (!function_exists('shortcode_ott_background_Text')) {
    function shortcode_ott_background_Text($atts, $content) {
        
		
        $Callout_bt = isset($atts['btn_text']) ? $atts['btn_text'] : '';
        $Callout_bt_url = !empty($atts['btn_url']) ? $atts['btn_url'] : '#';
        $Callout_bt_color = !empty($atts['btn_url']) ? (' style="background-color:'.$atts['btn_color'].';border-color:'.$atts['btn_color'].'"') : '#';
		$style=!empty($atts['background_color']) ? (' style="background-color:'.$atts['background_color'].'"'):''; 
		$text_color=!empty($atts['text_color']) ? (' style="color:'.$atts['text_color'].'"'):''; 

        $Callout_bt_target = isset($atts['btn_target']) ? $atts['btn_target'] : '_blank';
			
        $Callout_bt_full = '<a href="' . $Callout_bt_url . '"' . $Callout_bt_color . ' target="' . $Callout_bt_target . '" class="btn btn-flat btn-small btn-dashed">' . $Callout_bt . '</a>';
		
		
        $output = '<div class="ott-background-block" '.$style.'>';
        $output .= '<div class="text-background-text">';
		$output .= '<h3 '.$text_color.'>'.$atts['callout_text'].'</h3>';
		$output .= '<p '.$text_color.'>'.do_shortcode($content).'</p>';
        $output .= ' </div>';   
		$output .=!empty($Callout_bt) ? $Callout_bt_full : '';

        $output .= '</div>';

        return $output;
    }
}
add_shortcode('ott_background_Text', 'shortcode_ott_background_Text');



/* ================================================================================== */
/*      Image Block Shortcode
/* ================================================================================== */

if (!function_exists('shortcode_ott_image_block')) {
    function shortcode_ott_image_block($atts, $content) {
        
            $thumb = isset($atts['image']) ? '<img " src="' . $atts['image'] . '" />' : '';

		
        $output = '<div class="ott-image-block '.$atts['img_flaot'].'">';
        $output .= '<div class="ott-image-block-wrap">' . $thumb . '</div>';
        $output .= '</div>';

        return $output;
    }
}
add_shortcode('ott_image_block', 'shortcode_ott_image_block');





/* ================================================================================== */
/*      Contact Info Shortcode
/* ================================================================================== */

if (!function_exists('shortcode_ott_contactinfo')) {
    function shortcode_ott_contactinfo($atts, $content) {
		
		if (!empty($atts['title_icon'])) {
            $output .= '<a href="' . $atts['contact_twitter_url'] . '"><i class="icon-email icon-in"></i><i class="icon-email icon-out"></i></a>';
        }

        

        $output = '<div class="ott-contact-info"><div class="ott-contact-info-wrap"><div class="row-fluid ">';
		$output .='<div class="contact-med"><div class="contact-left"><div class="contact-left-inner"><h5><i class="' . $atts['item_icon'] . ' contact-info-icon"></i>'. $atts['contact_adess'] .'</h5>';
		$output .='<span class="contact-phone"><i class="icon-phone-1"></i>' . $atts['contact_phone'] . '</span>';
		$output .='</div></div><div class="contact-right"><div class="contact-right-inner">';	
		if (!empty($atts['contact_email'])) {
            $output .= '<a href="' . $atts['contact_email'] . '"><i class="icon-email"></i></a>';
        }
		if (!empty($atts['contact_facebook_url'])) {
            $output .= '<a href="' . $atts['contact_facebook_url'] . '"><i class="icon-facebook"></i></a>';
        }
		if (!empty($atts['contact_facebook_url'])) {
            $output .= '<a href="' . $atts['contact_twitter_url'] . '"><i class="icon-twitter-2"></i></a>';
        }
		if (!empty($atts['contact_linked_url'])) {
            $output .= '<a href="' . $atts['contact_linked_url'] . '"><i class="icon-linkedin-1"></i></a>';
        }			
		$output .='</div></div></div>';

        $output .= '</div></div></div>';

        return $output;
    }
}
add_shortcode('ott_contactinfo', 'shortcode_ott_contactinfo');




/* ================================================================================== */
/*      Revolution Slider Shortcode
  /* ================================================================================== */

if (!function_exists('shortcode_ott_slider')) {

    function shortcode_ott_slider($atts, $content) {
        if ($atts["id"] > 0) {
            $output = do_shortcode('[rev_slider '.$atts["id"].']');
        } else {
            $output = '<pre>' . __('Choose Slider', 'otouch') . '</pre>';
        }

        return $output;
    }

}
add_shortcode('ott_slider', 'shortcode_ott_slider');





/* ================================================================================== */
/*      Pricing Table Shortcode
  /* ================================================================================== */

if (!function_exists('shortcode_ott_pricing_table')) {

    function shortcode_ott_pricing_table($atts, $content) {
        $output = '<div class="ott-pricing clearfix">';
        $query = Array(
            'post_type' => 'ott_price',
            'posts_per_page' => $atts['column'],
        );
        $cats = empty($atts['price_category_list']) ? false : explode(",", $atts['price_category_list']);
        if ($cats) {
            $query['tax_query'] = Array(Array(
                    'taxonomy' => 'cat_price',
                    'terms' => $cats,
                    'field' => 'id'
                )
            );
        }
        switch ($atts['column']) {
            case'2': {
                    $columnWidth = 'ott-pricing-two';
                    break;
                }
            case'3': {
                    $columnWidth = 'ott-pricing-three';
                    break;
                }
            case'4': {
                    $columnWidth = 'ott-pricing-four';
                    break;
                }
            case'5': {
                    $columnWidth = 'ott-pricing-five';
                    break;
                }
        }
        query_posts($query);
        while (have_posts()) {
            the_post();
            $subprice = get_metabox('subprice') ? get_metabox('subprice') : '.00';
            $color = get_metabox('color') != '' ? (' style="background-color:' . get_metabox('color') . '"') : '';
			$btncolor = get_metabox('color') != '' ? (' style="background-color:' . get_metabox('color') . '; border-color:' . get_metabox('color') . '"') : ''; 
            $price_featured = get_metabox('type') == 'featured' ? true : false;
            $price_elemnts = get_metabox('type') == 'element' ? true : false;

            $output .= '<div class="' . $columnWidth . ' ott-pricing-col">';
            $output .= '<div class="ott-pricing-box '.($price_featured ? ' featured' : '').'   ">';
			$output .= '<div class="ott-pricing-header" '. $color . '>';
            $output .= '<h1>' . get_the_title() . '</h1><div class="ott-pricing-top"  >';
            $output .= '<span>' . get_metabox('price') . '<em>'.$subprice.'</em></span>';
			$output .= '<span class="price-dur">' . get_metabox('time') . '</span>' ;

            $output .= '</div></div>';
					 if(get_metabox('subtitle')!="") $output .= ('<div class="ott-pricing-value"  '. $color . '><span>'.get_metabox('subtitle').'</span></div>');

            $output .= '<div class="ott-pricing-box-wrap">';
            $output .= '<div class="ott-pricing-bottom">';
            $output .= get_the_content();
            $output .= '</div>';
            if (get_metabox('buttontext') != "") {
                $output .= '<div class="ott-pricing-footer">';
                $output .= '<a href="' . (get_metabox('buttonlink') != "" ? get_metabox('buttonlink') : "#") . '" class="btn btn-flat rounded small"' . $btncolor . '>' . get_metabox('buttontext') . '</a>';
                $output .= '</div>';
            }
            $output .= '</div></div>';
            $output .= '</div>';
        }
        wp_reset_query();
        $output .= '</div>';

        return $output;
    }

}
add_shortcode('ott_pricing_table', 'shortcode_ott_pricing_table');





/* ================================================================================== */
/*      Testimonials Shortcode
  /* ================================================================================== */

if (!function_exists('shortcode_ott_testimonials')) {

    function shortcode_ott_testimonials($atts, $content) {
        $direction = empty($atts['direction']) ? 'up' : $atts['direction'];
        $duration = empty($atts['duration']) ? '1000' : $atts['duration'];
        $timeout = empty($atts['timeout']) ? '2000' : $atts['timeout'];
        $output = '<div class="ott-testimonial-inner"><div class="ott-testimonials clearfix" data-direction="' . $direction . '" data-duration="' . $duration . '" data-timeout="' . $timeout . '"><ul>';
        
		$query = Array(
            'post_type' => 'ott_testimonial',
            'posts_per_page' => $atts['count'],
        );
        $cats = empty($atts['category_ids']) ? false : explode(",", $atts['category_ids']);
        if ($cats) {
            $query['tax_query'] = Array(Array(
                    'taxonomy' => 'cat_testimonial',
                    'terms' => $cats,
                    'field' => 'id'
                )
            );
        }
        query_posts($query);
        while (have_posts()) {
            the_post();
            $output .= '<li>';
            $output .= '<div class="testimonial-item clearfix">';
            

			$output .= '<div class="ott-testimonial-content"><p>';
			$output .= get_the_content();
            $output .= '<h2>' . get_metabox('name') . '</h2> <a href="' . get_metabox('url') . '">' . get_metabox('company') . '</a>';	
            $output .= '</div>';
            
            $output .= '</div>';
            $output .= '</li>';
        }
        wp_reset_query();
        $output .= '</ul>';
		$output .= '<div class="ts-title"></div>';
		
        $output .= '<div class="carousel-arrow">';
        $output .= '<a class="carousel-prev" href="#"><i class="icon-left-open-1"></i></a>';
        $output .= '<a class="carousel-next" href="#"><i class="icon-right-open-1"></i></a>';
        $output .= '</div>';

        $output .= '</div></div>';

        return $output;
    }

}
add_shortcode('ott_testimonials', 'shortcode_ott_testimonials');


/* ================================================================================== */
/*      Testimonials List Shortcode
  /* ================================================================================== */

if (!function_exists('shortcode_ott_testimonials_list')) {

    function shortcode_ott_testimonials_list($atts, $content) {
        $output = '<div class="ott-testimonials-list clearfix"><ul>';
        $query = Array(
            'post_type' => 'ott_testimonial',
            'posts_per_page' => $atts['count'],
        );
        $cats = empty($atts['category_ids']) ? false : explode(",", $atts['category_ids']);
        if ($cats) {
            $query['tax_query'] = Array(Array(
                    'taxonomy' => 'cat_testimonial',
                    'terms' => $cats,
                    'field' => 'id'
                )
            );
        }
        query_posts($query);
        while (have_posts()) {
            the_post();
            $output .= '<li>';
            $output .= '<div class="">';
            $output .= '<div class="testimonial-list-content"><div class="ott-testimonial-list-content">';
            $output .= get_the_content();
			$output .= '<p class="testi-name"><span>' . get_metabox('name') . ' <a href="' . get_metabox('url') . '">' . get_metabox('company') . '</a></span></p>' ;
			$output .= '</div></div>';
			$output .= '<div class="testimonial-author"><div class="testi-image">';
            $output .= post_image_show(50, 50);
            $output .= '</div>';	
            $output .= '</div>';
            
            $output .= '</div>';
            $output .= '</li>';
        }
        wp_reset_query();
        $output .= '</ul>';
        $output .= '</div>';

        return $output;
    }

}
add_shortcode('ott_testimonials_list', 'shortcode_ott_testimonials_list');




/* ================================================================================== */
/*      Team Shortcode
  /* ================================================================================== */

if (!function_exists('shortcode_ott_team')) {

    function shortcode_ott_team($atts, $content) {
        $output = '<div class="ott-our-team ott-items">';
        $query = Array(
            'post_type' => 'ott_team',
            'posts_per_page' => $atts['count'],
        );
        $cats = empty($atts['category_ids']) ? false : explode(",", $atts['category_ids']);
        if ($cats) {
            $query['tax_query'] = Array(Array(
                    'taxonomy' => 'cat_team',
                    'terms' => $cats,
                    'field' => 'id'
                )
            );
			 $expand = (!empty($atts['single_link']) && $atts['single_link'] == 'true') ? true : false;

        }
        $width = 270;
        $height = $atts['height'];
        query_posts($query);
        while (have_posts()) {
            the_post();
            $output .= '<div class="team-member span3"><div class="item-inner">';
                $output .= '<div class="member-image loop-image gary-image">';
                    $output .= post_image_show($width, $height);
					$output .= '<div class="image-overlay"><div class="image-links">';
					$output .= ' <a class="btn btn-border"  href=""><i class="icon-camera-4"></i></a>';
                $output .='</div></div>';

                $output .='</div>';
		

                    $output .= '<div class="team-figcaption"><div class="team-figcaption-inner">';
                $output .= '<h2 class="portfolio-title ">';
                    if($atts['single_link']== 'true'){$output .= '<a title="'.get_the_title().'" href="'.get_permalink().'">';}
                        $output .=  get_the_title();
                    if($atts['single_link']== 'true'){$output .= '</a>';}
                $output .= '</h2>';
                if (get_metabox('position') != "")
                    $output .= '<span>' . get_metabox('position') . '</span>';
            $output .= '</div>';

                    $teamContent= substr(get_the_excerpt(), 0,50);
					$team_more = 'ReadMore' ;
					
                    if(!empty($teamContent)){
                        $output .='<div class="team-figcontent">';
                            $output .='<div class="team-content"><span>';
                                $output .=$teamContent;
                            $output .='</span></div>';

                        $output .='</div>';
                    }
                $output .='';
			 $output .= '</div>';
			 								            if (get_metabox('facebook') != "" || get_metabox('google') != "" || get_metabox('twitter') != "" || get_metabox('linkedin') != "") {
                $output .= '<div class="member-social bottom-meta"><div class="ott-social-icon">';
                    if(get_metabox('facebook')!="")
                        $output .= '<a href="http://facebook.com/'.get_metabox('facebook').'" target="_blank" class="so-facebook"><span class="icon-facebook icon-in"></span></a>';
                    if(get_metabox('google')!="")
                        $output .= '<a href="'.to_url  (get_metabox('google')).'" target="_blank" class="so-gplus"><span class="icon-gplus icon-in"></span></a>';
                    if(get_metabox('twitter')!="")
                        $output .= '<a href="http://twitter.com/'.get_metabox('twitter').'" target="_blank" class="so-twitter"><span class="icon-twitter icon-in"></span>/a>';
                    if(get_metabox('linkedin')!="")
                        $output .= '<a href="'.to_url (get_metabox('linkedin')).'" target="_blank" class="so-linkedin"><span class="icon-linkedin icon-in"></span></a>';
                    if(get_metabox('dribbble')!="")
                        $output .= '<a href="http://dribbble.com/'.get_metabox('dribbble').'" target="_blank" class="so-dribbble"><span class="icon-dribbble-1 icon-in"></span></a>';

                $output .= '</div></div>';
            }
            $output .= '</div></div>';
        }
        wp_reset_query();
        $output .= '</div>';

        return $output;
    }

}
add_shortcode('ott_team', 'shortcode_ott_team');





/* ================================================================================== */
/*      Image Block Shortcode
/* ================================================================================== */

if (!function_exists('shortcode_ott_image_box')) {
    function shortcode_ott_image_box($atts, $content) {
		
		$style ='';        
        $style .='background-image:url(' . $atts['image'] . ');';

        $Callout_bt = isset($atts['btn_text']) ? $atts['btn_text'] : '';
        $Callout_bt_url = !empty($atts['btn_url']) ? $atts['btn_url'] : '#';
        $Callout_bt_color = !empty($atts['btn_url']) ? (' style="background-color:'.$atts['btn_color'].';border-color:'.$atts['btn_color'].'"') : '#';
        $Callout_bt_target = isset($atts['btn_target']) ? $atts['btn_target'] : '_blank';
        $Callout_bt_full = '<a href="' . $Callout_bt_url . '"  target="' . $Callout_bt_target . '" class="ad-link"><i class="icon-link-ext"></i></a>';
		

		
        $output = '<div class="ott-image-box" style="'.$style.'">';
		 $output .=!empty($Callout_bt) ? $Callout_bt_full : '';
		 $output .= '<div class="ott-image-box-content"><h3>'.$atts['textblock_ad'].'</h3>' ;
		 $output .= '</div>';
        $output .= '</div>';

        return $output;
    }
}
add_shortcode('ott_image_box', 'shortcode_ott_image_box');



/* ================================================================================== */
/*      Twitter Shortcode
  /* ================================================================================== */

function twitter_build($atts) {
    require_once (THEME_PATH . "/framework/twitteroauth.php");
    $atts = shortcode_atts(array(
        'consumerkey' => ott_option('consumerkey'),
        'consumersecret' => ott_option('consumersecret'),
        'accesstoken' => ott_option('accesstoken'),
        'accesstokensecret' => ott_option('accesstokensecret'),
        'cachetime' => '1',
        'username' => 'otouch',
        'tweetstoshow' => '10',
            ), $atts);
    //check settings and die if not set
    if (empty($atts['consumerkey']) || empty($atts['consumersecret']) || empty($atts['accesstoken']) || empty($atts['accesstokensecret']) || !isset($atts['cachetime']) || empty($atts['username'])) {
        return '<strong>' . __('Due to Twitter API changed you must insert Twitter APP. Check Our theme Options there you have Option for FB Twitter API, insert the Keys One Time', 'otouch') . '</strong>';
    }
    //check if cache needs update
    $ott_twitter_last_cache_time = get_option('ott_twitter_last_cache_time_' . $atts['username']);
    $diff = time() - $ott_twitter_last_cache_time;
    $crt = $atts['cachetime'] * 3600;

    //yes, it needs update			
    if ($diff >= $crt || empty($ott_twitter_last_cache_time)) {
        $connection = new TwitterOAuth($atts['consumerkey'], $atts['consumersecret'], $atts['accesstoken'], $atts['accesstokensecret']);
        $tweets = $connection->get("https://api.twitter.com/1.1/statuses/user_timeline.json?screen_name=" . $atts['username'] . "&count=10") or die('Couldn\'t retrieve tweets! Wrong username?');
        if (!empty($tweets->errors)) {
            if ($tweets->errors[0]->message == 'Invalid or expired token') {
                return '<strong>' . $tweets->errors[0]->message . '!</strong><br />'.__('You\'ll need to regenerate it <a href="https://dev.twitter.com/apps" target="_blank">here</a>!','otouch');
            } else {
                return '<strong>' . $tweets->errors[0]->message . '</strong>';
            }
            return;
        }
        $tweets_array = array();
        for ($i = 0; is_array($tweets) && $i <= count($tweets); $i++) {
            if (!empty($tweets[$i])) {
                $tweets_array[$i]['created_at'] = $tweets[$i]->created_at;
                $tweets_array[$i]['text'] = $tweets[$i]->text;
                $tweets_array[$i]['status_id'] = $tweets[$i]->id_str;
            }
        }
        //save tweets to wp option 		
        update_option('ott_twitter_tweets_' . $atts['username'], serialize($tweets_array));
        update_option('ott_twitter_last_cache_time_' . $atts['username'], time());
        echo '<!-- twitter cache has been updated! -->';
    }
    //convert links to clickable format
    if (!function_exists('convert_links')) {

        function convert_links($status, $targetBlank = true, $linkMaxLen = 250) {
            // the target
            $target = $targetBlank ? " target=\"_blank\" " : "";
            // convert link to url
            $status = preg_replace("/((http:\/\/|https:\/\/)[^ )]+)/e", "'<a href=\"$1\" title=\"$1\" $target >'. ((strlen('$1')>=$linkMaxLen ? substr('$1',0,$linkMaxLen).'...':'$1')).'</a>'", $status);
            // convert @ to follow
            $status = preg_replace("/(@([_a-z0-9\-]+))/i", "<a href=\"http://twitter.com/$2\" title=\"Follow $2\" $target >$1</a>", $status);
            // convert # to search
            $status = preg_replace("/(#([_a-z0-9\-]+))/i", "<a href=\"https://twitter.com/search?q=$2\" title=\"Search $1\" $target >$1</a>", $status);
            // return the status
            return $status;
        }

    }
    //convert dates to readable format
    if (!function_exists('relative_time')) {

        function relative_time($a) {
            //get current timestampt
            $b = strtotime("now");
            //get timestamp when tweet created
            $c = strtotime($a);
            //get difference
            $d = $b - $c;
            //calculate different time values
            $minute = 60;
            $hour = $minute * 60;
            $day = $hour * 24;
            $week = $day * 7;
            if (is_numeric($d) && $d > 0) {
                //if less then 3 seconds
                if ($d < 3)
                    return (ott_option('ott_car_rn') ? ott_option('ott_car_rn') : __('right now', 'otouch'));
                //if less then minute
                if ($d < $minute)
                    return floor($d) . (ott_option('ott_car_sa') ? ott_option('ott_car_sa') : __(' seconds ago', 'otouch'));
                //if less then 2 minutes
                if ($d < $minute * 2)
                    return (ott_option('ott_car_aoma') ? ott_option('ott_car_aoma') : __('about 1 minute ago', 'otouch'));
                //if less then hour
                if ($d < $hour)
                    return floor($d / $minute) . (ott_option('ott_car_ma') ? ott_option('ott_car_ma') : __(' minutes ago', 'otouch'));
                //if less then 2 hours
                if ($d < $hour * 2)
                    return (ott_option('ott_car_aoha') ? ott_option('ott_car_aoha') : __('about 1 hour ago', 'otouch'));
                //if less then day
                if ($d < $day)
                    return floor($d / $hour) . (ott_option('ott_car_ha') ? ott_option('ott_car_ha') : __(' hours ago', 'otouch'));
                //if more then day, but less then 2 days
                if ($d > $day && $d < $day * 2)
                    return (ott_option('ott_car_yes') ? ott_option('ott_car_yes') : __('yesterday', 'otouch'));
                //if less then year
                if ($d < $day * 365)
                    return floor($d / $day) . (ott_option('ott_car_da') ? ott_option('ott_car_da') : __(' days ago', 'otouch'));
                //else return more than a year
                return __("over a year ago","otouch");
                return (ott_option('ott_car_oaya') ? ott_option('ott_car_oaya') : __('over a year ago', 'otouch'));
            }
        }

    }
    $ott_twitter_tweets = maybe_unserialize(get_option('ott_twitter_tweets_' . $atts['username']));
    return $ott_twitter_tweets;
}

if (!function_exists('shortcode_ott_twitter')) {

    function shortcode_ott_twitter($atts, $content) {
        $ott_twitter_tweets = twitter_build($atts);
        if (is_array($ott_twitter_tweets)) {
            $output = '<div class="ott-twitter twitter-list">';
            $output.='<ul class="jtwt">';
            $fctr = '1';
            foreach ($ott_twitter_tweets as $tweet) {
                $output.='<li class="span4"><div  class="twitter-content"><p  class="twitter-inner"><span><i class="icon-twitter-3"></i>' . convert_links($tweet['text']) . '<br /></span></p></div></li>';
                if ($fctr == $atts['tweetstoshow']) {
                    break;
                }
                $fctr++;
            }
            $output.='</ul>';
            $output.='</div>';
            return $output;
        } else {
            return $ott_twitter_tweets;
        }
    }

}
add_shortcode('ott_twitter', 'shortcode_ott_twitter');



if (!function_exists('shortcode_ott_twitter_carousel')) {

    function shortcode_ott_twitter_carousel($atts, $content) {
        $ott_twitter_tweets = twitter_build($atts);
        if (is_array($ott_twitter_tweets)) {
            $arrow = '<div class="carousel-arrow ott-carrow">';
            $arrow .= '<a class="carousel-prev" href="#"><i class="icon-left-open-1"></i></a>';
            $arrow .= '<a class="carousel-next" href="#"><i class="icon-right-open-1"></i></a>';
            $arrow .= '</div>';
            $output = '<div class="ott-twitter">';
            $output .= '<div class="carousel-container">';
            $output .= '<div class="ott-carousel-twitter list_carousel">';
            $output.='<ul class="jtwt ott-carousel">';
            $fctr = '1';
            foreach ($ott_twitter_tweets as $tweet) {
                $output.='<li><span><i class="icon-twitter-3"></i>' . convert_links($tweet['text']) . '</span><a class="twitter_time" target="_blank" href="http://twitter.com/' . $atts['username'] . '/statuses/' . $tweet['status_id'] . '"></a></li>';
                if ($fctr == $atts['tweetstoshow']) {
                    break;
                }
                $fctr++;
            }
            $output.='</ul>';
            $output .= $arrow;
            $output.='</div>';
            $output.='</div>';
            $output.='</div>';
            return $output;
        } else {
            return $ott_twitter_tweets;
        }
    }

}
add_shortcode('ott_twitter_carousel', 'shortcode_ott_twitter_carousel');





/* ================================================================================== */
/*      Portfolio Shortcode
  /* ================================================================================== */

if (!function_exists('shortcode_ott_portfolio')) {

    function shortcode_ott_portfolio($atts, $content) {
        $atts = shortcode_atts(array(
            'layout_size' => 'span12',
            'pagination' => 'simple',
            'height' => '',
            'column' => '4',
            'count' => 12,
            'filter' => 'none',
            'category_ids' => '',
            'hide_hover' => 'false',
            'hide_favorites' => 'false',
            'button_text' => '',
            'link_type'   => 'view_large',
            'order' => ''
        ), $atts);
        global $portAtts, $paged, $ott_options;
        $portAtts = $atts;
        if ($atts['layout_size'] === 'span3') {
            $ott_options['column'] = '1';
        } elseif ($atts['layout_size'] === 'span9') {
            $ott_options['column'] = '3';
        } elseif ($atts['layout_size'] === 'span12') {
            switch ($atts['column']) {
                case '2': {
                        $ott_options['column'] = '6';
                        break;
                    }
                case '3': {
                        $ott_options['column'] = '4';
                        break;
                    }
                case '4': {
                        $ott_options['column'] = '3';
                        break;
                    }
            }
        }

        if (get_query_var('paged'))
            $my_page = get_query_var('paged');
        else {
            if (get_query_var('page'))
                $my_page = get_query_var('page');
            else
                $my_page = 1;
            set_query_var('paged', $my_page);
        }
        wp_enqueue_script('isotope', THEME_DIR . '/assets/js/jquery.isotope.min.js', false, false, true);
        $ott_options['pagination'] = $atts['pagination'];
        $ott_options['height'] = $atts['height'];
        $query = Array(
            'post_type' => 'ott_portfolio',
            'posts_per_page' => $atts['count'],
        );
        if ($ott_options['pagination'] == "simple" || $ott_options['pagination'] == "infinite") {
            $query['paged'] = $my_page;
        }
        $cats = empty($atts['category_ids']) ? false : explode(",", $atts['category_ids']);
        if ($cats) {
            $query['tax_query'] = Array(Array(
                    'taxonomy' => 'cat_portfolio',
                    'terms' => $cats,
                    'field' => 'id'
                )
            );
        }
        if (!empty($atts['order'])) {
            switch ($atts['order']) {
                case "date_asc":
                    $query['orderby'] = 'date';
                    $query['order'] = 'ASC';                    
                    break;
                case "title_asc":
                    $query['orderby'] = 'title';
                    $query['order'] = 'ASC';                    
                    break;
                case "title_desc":
                    $query['orderby'] = 'title';
                    $query['order'] = 'DESC';
                    break;
                case "random":
                    $query['orderby'] = 'rand';
                    break;
            }
        }
        $output = '<div class="ott-portfolio without_text">';
        $filter = (!empty($atts['filter']) && $atts['filter'] == 'true') ? true : false;
        if ($filter) {
            $output .= '<div class="ott-filter">';
            $output .= '<ul class="filters option-set clearfix post-category inline" data-option-key="filter">';
            $output .= '<li><a href="#filter" data-option-value="*" class="selected">' . (ott_option('portfolio_show_all') ? ott_option('portfolio_show_all') : __('Show All', 'otouch')) . '</a></li>';
            if ($cats) {
                $filters = $cats;
            } else {
                $filters = get_terms('cat_portfolio');
            }
            foreach ($filters as $category) {
                if ($cats) {
                    $category = get_term_by('id', $category, 'cat_portfolio');
                }
                $output .= '<li class="hidden"><a href="#filter" data-option-value=".category-' . $category->slug . '" title="' . $category->name . '">' . $category->name . '</a></li>';
            }
            $output .= '</ul></div>';
        }
        if(!is_tax())
            query_posts($query);
        ob_start();
        get_template_part("loop", "portfolio");
        $output .= ob_get_clean();
        wp_reset_query();
        $output .= '</div>';
        return $output;
    }

}

function portfolio_script() {
    wp_enqueue_script('isotope', THEME_DIR . '/assets/js/jquery.isotope.min.js', false, false, true);
}

add_shortcode('ott_portfolio', 'shortcode_ott_portfolio');



/* ================================================================================== */
/*      sidenews Shortcode
  /* ================================================================================== */

if (!function_exists('shortcode_ott_sidenews')) {

    function shortcode_ott_sidenews($atts, $content) {
        global $portAtts;
        $portAtts = $atts;
        $atts['excerpt_count']=isset($atts['excerpt_count'])?intval($atts['excerpt_count']):10;
        $more_text      = !empty($atts['more_text'])     ?$atts['more_text']     :(ott_option('translate_readmore') ? ott_option('translate_readmore') : __('Read More', 'otouch'));
        $more_text_show = isset($atts['more_text_show'])?$atts['more_text_show']:'false';
        
        $hide_meta      = isset($atts['hide_meta'])?$atts['hide_meta']:'false';
        $post_count     = isset($atts['post_count']) ? $atts['post_count'] : '';
		
		
        $post_category_list = isset($atts['post_category_list']) ? $atts['post_category_list'] : '';


        $output = '<div class="ott-sidenews">';
        $output .= '<div class="">';
        $output .= '<ul class="ott-items">';
        $query = Array(
            'post_type' => 'post',
            'posts_per_page' => $post_count,
        );
        $cats = explode(",", $post_category_list);
        if (!empty($cats[0])) {
            $query['tax_query'] = Array(Array(
                    'taxonomy' => 'category',
                    'terms' => $cats,
                    'field' => 'id'
                )
            );
        }
        // START - LOOP
        query_posts($query);
        while (have_posts()){ the_post();
	            $output .= '<li>';
                $output .= '<div class="sidenews-content">';
 
                    
                    $output .= '<div class="news-content"><div class="sidenew-image loop-image gary-image">';
												$output .= '<a href="'.get_permalink().'">';
                                    $output .= post_image_show(60,60);
                                $output .= '</a>';		
					$output .= '</div><div class="sidenews-right"><h2 class="sidenew-title"><a href="'.get_permalink().'" >'.get_the_title().'</a></h2>';
					$output .= '<span>'.to_excerpt(get_the_content(), $atts['excerpt_count']).'</span>';
                        $output .= '<a href="'.get_permalink().'" class="sidenews-link">'.apply_filters("widget_title", $more_text).'</a><div>';
                    
                $output .= '</div></div>';
            $output .= '</li>';
        }
        wp_reset_query();
        // END   - LOOP
        $output .= '</ul>';
        $output .= '<div class="clearfix"></div>';
        $output .= '</div>';
        $output .= '</div>';
        return $output;
    }

}

add_shortcode('ott_sidenews', 'shortcode_ott_sidenews');



/* ================================================================================== */
/*      Gallery Shortcode
  /* ================================================================================== */

if (!function_exists('shortcode_ott_gallery')) {

    function shortcode_ott_gallery($atts, $content) {
        global $paged, $ott_options;
        $output = '<div class="ott-blog ott-galleries ott-items">';
        $query = Array(
            'post_type' => 'ott_gallery',
            'posts_per_page' => $atts['post_count'],
            'paged' => $paged,
        );
        $cats = empty($atts['category_ids']) ? false : explode(",", $atts['category_ids']);
        if ($cats) {
            $query['tax_query'] = Array(Array(
                    'taxonomy' => 'cat_gallery',
                    'terms' => $cats,
                    'field' => 'id'
                )
            );
        }
        $ott_options['pagination'] = isset($atts['pagination'])?$atts['pagination']:'none';
        $ott_options['excerpt_count'] = $atts['excerpt_count'];
        $ott_options['more_text'] = $atts['more_text'];
		$ott_options['height'] = $atts['height'];
		
		$atts['layout'] = !empty($atts['layout']) ? $atts['layout'] : 'standard';
		
        
        if($ott_options['pagination']==='infinite'){
            wp_enqueue_script('blog-infinitescroll', THEME_DIR . '/assets/js/blog-infinitescroll.js', false, false, true);
        }
          wp_enqueue_script('isotope', THEME_DIR . '/assets/js/jquery.isotope.min.js', false, false, true);


		
        query_posts($query);
        ob_start();
        get_template_part("loop", "gallery");
        $output .= ob_get_clean();
        wp_reset_query();
        $output .= '</div>';
        return $output;
    }

}
add_shortcode('ott_gallery', 'shortcode_ott_gallery');







/* ================================================================================== */
/*      Recent Posts Shortcode
  /* ================================================================================== */

if (!function_exists('shortcode_ott_recent_posts')) {

    function shortcode_ott_recent_posts($atts, $content) {
        global $portAtts;
        $portAtts = $atts;
        $atts['excerpt_count']=isset($atts['excerpt_count'])?intval($atts['excerpt_count']):50;
        $more_text      = !empty($atts['more_text'])     ?$atts['more_text']     :(ott_option('translate_readmore') ? ott_option('translate_readmore') : __('Continue Reading', 'otouch'));
        $more_text_show = isset($atts['more_text_show'])?$atts['more_text_show']:'false';
        
        $hide_meta      = isset($atts['hide_meta'])?$atts['hide_meta']:'false';
        $post_count     = isset($atts['post_count']) ? $atts['post_count'] : '';
		
		
        $post_category_list = isset($atts['post_category_list']) ? $atts['post_category_list'] : '';
        $arrow = '<div class="carousel-arrow ott-carrow"><div class="carousel-arrow-wrap">';
        $arrow .= '<a class="carousel-prev" href="#"><i class="icon-left-open-1"></i></a>';
	
        $arrow .= '<a class="carousel-next" href="#"><i class="icon-right-open-1"></i></a>';
        $arrow .= '</div></div>';

        $output = '<div class="carousel-container">';
        $output .= '<div class="ott-carousel-post list_carousel">';
        $output .= '<ul class="ott-carousel">';
        $query = Array(
            'post_type' => 'post',
            'posts_per_page' => $post_count,
        );
        $cats = explode(",", $post_category_list);
        if (!empty($cats[0])) {
            $query['tax_query'] = Array(Array(
                    'taxonomy' => 'category',
                    'terms' => $cats,
                    'field' => 'id'
                )
            );
        }
        if (!empty($atts['order'])) {
            switch ($atts['order']) {
                case "date_asc":
                    $query['orderby'] = 'date';
                    $query['order'] = 'ASC';                    
                    break;
                case "title_asc":
                    $query['orderby'] = 'title';
                    $query['order'] = 'ASC';                    
                    break;
                case "title_desc":
                    $query['orderby'] = 'title';
                    $query['order'] = 'DESC';
                    break;
                case "random":
                    $query['orderby'] = 'rand';
                    break;
            }
        }
        $imgwidth = 400;
        // START - LOOP
        query_posts($query);
        while (have_posts()){ the_post();
            $imgheight = $atts['image_height'];
			$format = get_post_format() == "" ? "standard" : get_post_format();
            $output .= '<li class="item-inner">';
                if(get_post_format()=="video"){
                    $output .= '<div class="carousel-video">';
                    ob_start();
                    format_video();
                    $output .= ob_get_clean();
                    $output .= '</div>';
					
                }else{
                    if(post_image_show()){
                        ob_start();
                        post_image($imgwidth, $imgheight);
                        $output .= ob_get_clean();
                    }
                }
                $output .= '<div class="carousel-content">';
					$output .= '<div  class="portfolio_top"></div>';
                    $output .= '<h3><a href="'.get_permalink().'" class="carousel-post-title">'.get_the_title().'</a></h3>';
                    $output .= '<p>'.to_excerpt(get_the_content(), $atts['excerpt_count']).'</p>';
					$output .= '<div class="loop-format"> <span class="post-format '.apply_filters("widget_title", $format).' "></span> </div>';
					
					
					$output .= '</div>';
					                    if($hide_meta !='true'){
                        $output .= '<div class="bottom-meta"> <span class="ott-date"><i class="icon-clock-1"></i>'.get_the_time('j M Y') .'</span></i>';
							if($more_text_show==='true'){
								$output .= '<a class="ott-more-item" href="'.get_permalink().'" class="more-link">'.apply_filters("widget_title", $more_text).'</a>';
							}
                    }
                $output .= '</div>';
            $output .= '</li>';
        }
        wp_reset_query();
        // END   - LOOP
        $output .= '</ul>';
        $output .= '<div class="clearfix"></div>';
        $output .= $arrow;
        $output .= '</div>';
        $output .= '</div>';
        return $output;
    }

}
add_shortcode('ott_recent_posts', 'shortcode_ott_recent_posts');





/* ================================================================================== */
/*      Recent News Shortcode
  /* ================================================================================== */

if (!function_exists('shortcode_ott_recent_news')) {

    function shortcode_ott_recent_news($atts, $content) {
        global $portAtts;
        $portAtts = $atts;
        $atts['excerpt_count']=isset($atts['excerpt_count'])?intval($atts['excerpt_count']):50;
        $more_text      = !empty($atts['more_text'])     ?$atts['more_text']     :(ott_option('translate_readmore') ? ott_option('translate_readmore') : __('Continue Reading', 'otouch'));
        $more_text_show = isset($atts['more_text_show'])?$atts['more_text_show']:'false';
        
        $hide_meta      = isset($atts['hide_meta'])?$atts['hide_meta']:'false';
        $post_count     = isset($atts['post_count']) ? $atts['post_count'] : '';
		
		
        $post_category_list = isset($atts['post_category_list']) ? $atts['post_category_list'] : '';
        $arrow = '<div class="carousel-arrow ott-carrow"><div class="carousel-arrow-wrap">';
        $arrow .= '<a class="carousel-prev" href="#"><i class="icon-left-open-1"></i></a>';
	
        $arrow .= '<a class="carousel-next" href="#"><i class="icon-right-open-1"></i></a>';
        $arrow .= '</div></div>';

        $output = '<div class="carousel-container">';
        $output .= '<div class="ott-carousel-news list_carousel">';
        $output .= '<ul class="ott-carousel">';
        $query = Array(
            'post_type' => 'post',
            'posts_per_page' => $post_count,
        );
        $cats = explode(",", $post_category_list);
        if (!empty($cats[0])) {
            $query['tax_query'] = Array(Array(
                    'taxonomy' => 'category',
                    'terms' => $cats,
                    'field' => 'id'
                )
            );
        }
        if (!empty($atts['order'])) {
            switch ($atts['order']) {
                case "date_asc":
                    $query['orderby'] = 'date';
                    $query['order'] = 'ASC';                    
                    break;
                case "title_asc":
                    $query['orderby'] = 'title';
                    $query['order'] = 'ASC';                    
                    break;
                case "title_desc":
                    $query['orderby'] = 'title';
                    $query['order'] = 'DESC';
                    break;
                case "random":
                    $query['orderby'] = 'rand';
                    break;
            }
        }
        $imgwidth = 400;
        // START - LOOP
        query_posts($query);
        while (have_posts()){ the_post();
	            $output .= '<li>';
                $output .= '<div class="carousel-contentfr">';
 
                    
                    $output .= '<div class="news-content "><div class="news-date"><span class="news-month">'.get_the_time('M').'</span><span class="news-day">'.get_the_time('j').'</span></div>';
					$output .= '<div class="carousel-content-right"><h2 class="loop-title"><a href="'.get_permalink().'" class="carousel-post-title">'.get_the_title().'</a></h2>';
					$output .= '<p>'.to_excerpt(get_the_content(), $atts['excerpt_count']).'</p>';
                $output .= '</div>';
            $output .= '</li>';
        }
        wp_reset_query();
        // END   - LOOP
        $output .= '</ul>';
        $output .= '<div class="clearfix"></div>';
        $output .= $arrow;
        $output .= '</div>';
        $output .= '</div>';
        return $output;
    }

}
add_shortcode('ott_recent_news', 'shortcode_ott_recent_news');




/* ================================================================================== */
/*      Product Caro
  /* ================================================================================== */

if (!function_exists('shortcode_ott_recent_products')) {

    function shortcode_ott_recent_products($atts, $content) {
        global $portAtts;
        $portAtts = $atts;
        $atts['excerpt_count']=isset($atts['excerpt_count'])?intval($atts['excerpt_count']):50;
        $more_text      = !empty($atts['more_text'])     ?$atts['more_text']     :(ott_option('translate_readmore') ? ott_option('translate_readmore') : __('Continue Reading', 'otouch'));
        $more_text_show = isset($atts['more_text_show'])?$atts['more_text_show']:'false';
        
        $hide_meta      = isset($atts['hide_meta'])?$atts['hide_meta']:'false';
        $post_count     = isset($atts['post_count']) ? $atts['post_count'] : '';
        $post_category_list = isset($atts['post_category_list']) ? $atts['post_category_list'] : '';
        $arrow = '<div class="carousel-arrow ott-carrow"><div class="carousel-arrow-wrap">';
        $arrow .= '<a class="carousel-prev" href="#"><i class="icon-left-open-1"></i></a>';
        $arrow .= '<a class="carousel-next" href="#"><i class="icon-right-open-1"></i></a>';
        $arrow .= '</div></div>';
		
		if(onetouch_woocommerce_enabled() ){


        $output = '<div class="carousel-container">';
        $output .= '<div class="ott-carousel-product list_carousel">';
        $output .= '<ul class="ott-carousel">';
		
		 
        $query = Array(
            'post_type' => 'product',
            'posts_per_page' => $post_count,
        );
		
        if (!empty($atts['order'])) {
            switch ($atts['order']) {
                case "date_asc":
                    $query['orderby'] = 'date';
                    $query['order'] = 'ASC';                    
                    break;
                case "title_asc":
                    $query['orderby'] = 'title';
                    $query['order'] = 'ASC';                    
                    break;
                case "title_desc":
                    $query['orderby'] = 'title';
                    $query['order'] = 'DESC';
                    break;
                case "random":
                    $query['orderby'] = 'rand';
                    break;
            }
        }
        $imgwidth = 370;
        // START - LOOP
        query_posts($query);
        while (have_posts()){ the_post();
            $imgheight = $atts['image_height'];
            $output .= '<li>';
						 $imgheight = $atts['image_height'];
						 	$output .='<div class="inner_product"><div class="ott-carproduct-inner">';
							$output .= '<div class="loop-image gary-image"><a href="'.get_permalink().'">';
                                    $output .= post_image_show($imgwidth,$imgheight);
									
									 $output .= '<div class="image-overlay"><div class="image-links">';
									 $output .= '<a class="btn btn-border" href="'.get_permalink().'"><i class="icon-camera-4"></i></a></div></div>';
                                $output .= '</a></div>';			global $post, $product;
							$output .='<div class="inner_product_header"><div class="portfolio_top"></div>';
							 if($product->is_on_sale()){
                                  $output .='<span class="onsale">'.__('Sale!', 'woocommerce').'</span>' ; 	
                                }
							 $output .= '<h3><a href="'.get_permalink().'" class="subtitle">'.get_the_title().'</a></h3>';
							 $output .='<span class="price">';
							  $output .= $product->get_price_html(); 
							  $output .='</span>';
							 $output .='</div></div>';
							$output .='<div class="onetouch_cart_buttons">';						
					 $output .= '<a class="button show_details_button" href="'.get_permalink($product->id).'">';
					 $output .='<i class="icon-doc-text-1"></i><span>'.__('Show details', 'onetouch').'</span>' ;	
					 $output .= '</a>';				
							 $output .='</div>';
							 

							  $output .='</div>';

            $output .= '</li>';
        }
        wp_reset_query();
        // END   - LOOP
        $output .= '</ul>';
        $output .= '<div class="clearfix"></div>';
        $output .= $arrow;
        $output .= '</div>';
        $output .= '</div>';
		} else {
			$output = '<span>'.__('Please Enable Woocommerce plug-in', 'onetouch').'</span>';
		}
        return $output;
    }

}
add_shortcode('ott_recent_products', 'shortcode_ott_recent_products');





/* ================================================================================== */
/*      Recent Portfolios Slider Shortcode
  /* ================================================================================== */

if (!function_exists('shortcode_ott_recent_portfolios')) {

    function shortcode_ott_recent_portfolios($atts, $content) {
        global $portAtts;
        $hide_favorites = isset($atts['hide_favorites']) ? $atts['hide_favorites'] : 'false';
        $portAtts = $atts;
        $post_count = isset($atts['post_count']) ? $atts['post_count'] : '';
		$more_text      = !empty($atts['more_text'])     ?$atts['more_text']     :(ott_option('translate_readmore') ? ott_option('translate_readmore') : __('Continue Reading', 'otouch'));
        $desc_title = !empty($atts['description_title']) ? $atts['description_title'] : '';
        $desc_text = !empty($atts['description_text']) ? $atts['description_text'] : '';
        $port_category_list = isset($atts['port_category_list']) ? $atts['port_category_list'] : '';
        $arrow = '<div class="carousel-arrow ott-carrow">';
        $arrow .= '<a class="carousel-prev" href="#"><i class="icon-left-open-1"></i></a>';
        $arrow .= '<a class="carousel-next" href="#"><i class="icon-right-open-1"></i></a>';
        $arrow .= '</div>';
        $output = '';
        if (!empty($desc_text)) {
            $output .= '<div class="row-fluid carousel-container">';
            $output .= '<div class="span3 carousel-text ">';
            $output .=!empty($desc_title) ? ('<div class="ott-title-container medium  left" ><div class="ott-title-container"><h3 class="ott-section-title">' . $desc_title . '</h3></div></div>') : '';
            $output .= '<p>' . $desc_text . '</p>';
            $output .= $arrow . '</div>';
            $output .= '<div class="span9">';
        } else {
            $output .= '<div class="carousel-container">';
        }


        $output .= '<div class="ott-carousel-portfolio list_carousel">';
        $output .= '<ul class="ott-carousel">';
        $query = Array(
            'post_type' => 'ott_portfolio',
            'posts_per_page' => $post_count,
        );
        $cats = explode(",", $port_category_list);
        if (!empty($cats[0])) {
            $query['tax_query'] = Array(Array(
                    'taxonomy' => 'cat_portfolio',
                    'terms' => $cats,
                    'field' => 'id'
                )
            );
        }
        if (!empty($atts['order'])) {
            switch ($atts['order']) {
                case "date_asc":
                    $query['orderby'] = 'date';
                    $query['order'] = 'ASC';                    
                    break;
                case "title_asc":
                    $query['orderby'] = 'title';
                    $query['order'] = 'ASC';                    
                    break;
                case "title_desc":
                    $query['orderby'] = 'title';
                    $query['order'] = 'DESC';
                    break;
                case "random":
                    $query['orderby'] = 'rand';
                    break;
            }
        }
        $imgwidth = 290;
        // START - LOOP
        query_posts($query);
        while (have_posts()){ the_post();
            global $post;
            $imgheight = $atts['image_height'];

            $output .= '<li><div class="item-inner">';
                $ids = get_metabox('gallery_image_ids');
                $video_embed = get_metabox('format_video_embed');
                $video_url   = get_metabox('pretty_video_url');
                  $category =  get_the_term_list(get_the_ID(), 'cat_portfolio');
                ob_start();                
                
                if (has_post_thumbnail($post->ID)) {
                    if(!empty($video_url)&&get_metabox('pretty_video')==='true'){
                        portfolio_image($imgwidth,$imgheight,true,$video_url);                            
                    }else{
                        portfolio_image($imgwidth,$imgheight);
                    }
                } elseif($ids!="false" && $ids!="") {
                    portfolio_gallery($imgwidth,$imgheight,$ids);
                } elseif(!empty($video_embed)) {
                    echo '<div class="carousel-video">';
                    echo apply_filters("the_content", htmlspecialchars_decode($video_embed));
                    echo '</div>';
                }
                
                $output .= ob_get_clean();




                $output .= '<div class="portfolio-content">';
				
					  $output .= '<div class="portfolio_top"></div>';
                        $output .= '<h2 class="portfolio-title"><a href="'.get_permalink().'">'.get_the_title().'</a></h2>';
      					$output .= '<span class="terms-list">'.$category.'</span>';

						
			
						

                $output .= '</div>';
            $output .= '</div></li>';
        }
        wp_reset_query();
        // END   - LOOP
        $output .= '</ul>';
        $output .= '<div class="clearfix"></div>';
        if(empty($desc_text)) $output .= $arrow;
        $output .= '</div>';
        if (!empty($desc_text)) {
            $output .= '</div>';
        }
        $output .= '</div>';
        return $output;
    }
}
add_shortcode('ott_recent_portfolios', 'shortcode_ott_recent_portfolios');









/* ================================================================================== */
/*      Partner Shortcode
  /* ================================================================================== */

if (!function_exists('shortcode_ott_partner')) {

    function shortcode_ott_partner($atts, $content) {
        $category_list = isset($atts['partner_category_list']) ? $atts['partner_category_list'] : '';
        $arrow = '<div class="carousel-arrow ott-carrow">';
        $arrow .= '<a class="carousel-prev" href="#"><i class="icon-left-open-1"></i></a>';
        $arrow .= '<a class="carousel-next" href="#"><i class="icon-right-open-1"></i></a>';
        $arrow .= '</div>';

        $output = '<div class="carousel-container">';

        $output .= '<div class="ott-carousel-partner list_carousel">';
        $output .= '<ul class="ott-carousel">';
        $query = Array(
            'post_type' => 'ott_partner',
            'posts_per_page' => -1,
        );
        $cats = explode(",", $category_list);
        $imgwidth = 270;
        if (!empty($cats[0])) {
            $query['tax_query'] = Array(Array(
                    'taxonomy' => 'cat_partner',
                    'terms' => $cats,
                    'field' => 'id'
                )
            );
        }
        if (!empty($atts['order'])) {
            switch ($atts['order']) {
                case "date_asc":
                    $query['orderby'] = 'date';
                    $query['order'] = 'ASC';                    
                    break;
                case "title_asc":
                    $query['orderby'] = 'title';
                    $query['order'] = 'ASC';                    
                    break;
                case "title_desc":
                    $query['orderby'] = 'title';
                    $query['order'] = 'DESC';
                    break;
                case "random":
                    $query['orderby'] = 'rand';
                    break;
            }
        }
        // START - LOOP
        query_posts($query);
        while (have_posts()) {
            the_post();
            $imgheight = $atts['image_height'];
            $output .= '<li style="height:'.$imgheight .'">';
            if (get_metabox('link') != '') {
                $output .= '<a href="' . to_url(get_metabox('link')) . '" target="_blank">';
                $output .= post_image_show($imgwidth, $imgheight);
                $output .= '</a>';
            } else {
                $output .= post_image_show($imgwidth, $imgheight);
            }
            $output .= '</li>';
        }
        wp_reset_query();
        // END   - LOOP
        $output .= '</ul>';
        $output .= '<div class="clearfix"></div>';
        $output .= $arrow;
        $output .= '</div>';
        $output .= '</div>';
        return $output;
    }

}
add_shortcode('ott_partner', 'shortcode_ott_partner');





/* ================================================================================== */
/*      Partner List Shortcode
  /* ================================================================================== */

if (!function_exists('shortcode_ott_partner_list')) {

    function shortcode_ott_partner_list($atts, $content) {
        $category_list = isset($atts['partner_category_list']) ? $atts['partner_category_list'] : '';


        $output = '<div class="partner-container">';

        $output .= '<div class="ott-partner">';
        $output .= '<div class="ott-items">';
        $query = Array(
            'post_type' => 'ott_partner',
            'posts_per_page' => $atts['count'],

        );
        $cats = explode(",", $category_list);
        $imgwidth = 270;
        if (!empty($cats[0])) {
            $query['tax_query'] = Array(Array(
                    'taxonomy' => 'cat_partner',
                    'terms' => $cats,
                    'field' => 'id'
                )
            );
        }
		        $atts = shortcode_atts(array(
            'layout_size' => 'span12',
            'pagination' => 'simple',
            'image_height' => '',
            'column' => '4',
            'count' => 12,
            'order' => ''
        ), $atts);

		        global $portAtts, $paged, $ott_options;
        $portAtts = $atts;
        if ($atts['layout_size'] === 'span3') {
            $ott_options['column'] = '1';
        } elseif ($atts['layout_size'] === 'span9') {
            $ott_options['column'] = '3';
        } elseif ($atts['layout_size'] === 'span12') {
            switch ($atts['column']) {
                case '6': {
                        $ott_options['column'] = '2';
                        break;
                    }
                case '3': {
                        $ott_options['column'] = '4';
                        break;
                    }
                case '4': {
                        $ott_options['column'] = '3';
                        break;
                    }
            }
        }
		

        if (!empty($atts['order'])) {
            switch ($atts['order']) {
                case "date_asc":
                    $query['orderby'] = 'date';
                    $query['order'] = 'ASC';                    
                    break;
                case "title_asc":
                    $query['orderby'] = 'title';
                    $query['order'] = 'ASC';                    
                    break;
                case "title_desc":
                    $query['orderby'] = 'title';
                    $query['order'] = 'DESC';
                    break;
                case "random":
                    $query['orderby'] = 'rand';
                    break;
            }
        }
		  $class = isset($ott_options['column'])?"span".$ott_options['column']:'span3';

        // START - LOOP
        query_posts($query);
        while (have_posts()) {
            the_post();
            $imgheight = $atts['image_height'];
            $output .= '<div class="'.$class.'"><div class="item-inner">';
            if (get_metabox('link') != '') {
                $output .= '<a href="' . to_url(get_metabox('link')) . '" target="_blank">';
                $output .= post_image_show($imgwidth, $imgheight);
                $output .= '</a>';
            } else {
                $output .= post_image_show($imgwidth, $imgheight);
            }
            $output .= '</div></div>';
        }
        wp_reset_query();
        // END   - LOOP
        $output .= '</div>';
        $output .= '</div></div>';
        return $output;
    }

}
add_shortcode('ott_partner_list', 'shortcode_ott_partner_list');






/* ================================================================================== */
/*      Dropcap Shortcode
  /* ================================================================================== */

if (!function_exists('shortcode_ott_dropcap')) {

    function shortcode_ott_dropcap($atts, $content) {
        $class = '';
        $style = 'style="background-color: ' . $atts['color'] . ';"';
        if ($atts['style'] == 'circle') {
            $class = ' cap_circle';
        } elseif ($atts['style'] == 'circle_border') {
            $class = ' cap_circle cap_border';
            $style = 'style="border-color: ' . $atts['color'] . '; color: ' . $atts['color'] . '"';
        } elseif ($atts['style'] == 'square_border') {
            $class = ' cap_border';
            $style = 'style="border-color: ' . $atts['color'] . '; color: ' . $atts['color'] . '"';
        }
        return '<span class="ott-dropcap' . $class . '" ' . $style . '>' . $content . '</span>';
    }

}
add_shortcode('ott_dropcap', 'shortcode_ott_dropcap');





/* ================================================================================== */
/*      Button Shortcode
  /* ================================================================================== */

if (!function_exists('shortcode_ott_button')) {

    function shortcode_ott_button($atts, $content) {
        $rounded = !empty($atts['rounded']) && $atts['rounded'] == 'true' ? ' rounded' : '';
        $link = !empty($atts['link']) ? $atts['link'] : '#';
        $style = !empty($atts['style']) ? (' btn-' . $atts['style']) : '';
        $hover = !empty($atts['hover']) ? (' btn-' . $atts['hover']) : '';
        $size = !empty($atts['size']) ? (' btn-' . $atts['size']) : '';
        $target = !empty($atts['target']) ? ($atts['target']) : '_blank';
        $icon = !empty($atts['icon']) ? (' ' . $atts['icon']) : '';
		
        $color = '';
        if(!empty($atts['color'])) {
            $color = ' style="border-color:' . $atts['color'] . ';';
            $color .= (!empty($atts['style']) && $atts['style'] === 'border' ? ('color:' . $atts['color']) : ('background-color:' . $atts['color'])).'"';
        }
        return '<a href="' . $link . '" target="' . $target . '" class="btn' . $rounded . $style . $size . $hover . $icon .  '"' . $color . '>' . $content . '<span></span></a>';
    }

}
add_shortcode('ott_button', 'shortcode_ott_button');





/* ================================================================================== */
/*      Label Shortcode
  /* ================================================================================== */

if (!function_exists('shortcode_ott_label')) {

    function shortcode_ott_label($atts, $content) {
        $color = !empty($atts['color']) ? (' style="background:' . $atts['color'] . '"') : '';
        return '<span class="label"' . $color . '>' . $content . '</span>';
    }

}
add_shortcode('ott_label', 'shortcode_ott_label');




/* ================================================================================== */
/*      ColumnShortcode Shortcode
  /* ================================================================================== */

// ColumnShortcode container
if (!function_exists('shortcode_ott_sh_column')) {

    function shortcode_ott_sh_column($atts, $content) {
        $output = '<div class="ott-column-shortcode row-fluid">';
        $output .= do_shortcode($content);
        $output .= '</div>';
        return $output;
    }

}
add_shortcode('ott_sh_column', 'shortcode_ott_sh_column');
// ColumnShortcode Item
if (!function_exists('shortcode_ott_sh_column_item')) {

    function shortcode_ott_sh_column_item($atts, $content) {
        extract(shortcode_atts(array(
            'column_size'           => '1 / 3',
            'item_animation'        => 'none',
            'item_animation_offset' => 'bottom-in-view',
        ), $atts));
        if(isMobile()&&!ott_option('moblile_animation')){$atts['item_animation']='none';}
        $class='';
        $animated=false;
        if(isset($atts['item_animation'])&&$atts['item_animation']!=='none'){
            $animated=true;
            $class .= ' ott-animate-gen';
            $atts['item_animation_offset'] = isset($atts['item_animation_offset']) ? str_replace(' ','',$atts['item_animation_offset']) : '';
            $atts['item_animation_offset'] = empty($atts['item_animation_offset']) ? 'bottom-in-view' : $atts['item_animation_offset'];
        }
        $output = '<div class="' . pbTextToFoundation($column_size) . ' '.$class.'"'.($animated?' data-gen="'.$atts['item_animation'].'" data-gen-offset="'.$atts['item_animation_offset'].'" style="opacity:0;"':'').'>';
        $output .= do_shortcode($content);
        $output .= '</div>';

        return $output;
    }

}
add_shortcode('ott_sh_column_item', 'shortcode_ott_sh_column_item');





/* ================================================================================== */
/*      PHP Shortcode
/* ================================================================================== */

if (!function_exists('shortcode_ott_html')) {
    function shortcode_ott_html($atts, $content) {
        ob_start();
        $output .= do_shortcode($content);
        return $output;

        return $output;
    }
}
add_shortcode('ott_html', 'shortcode_ott_html');



 /* ================================================================================== */
/*      Product Show Shortcode
/* ================================================================================== */

if (!function_exists('shortcode_ott_product_show')) {
    function shortcode_ott_product_show($atts, $content) {
        global $paged,$ott_options;
		if(onetouch_woocommerce_enabled()){

        $output = '<div class="ott-product">';
        ob_start();
	  	 $output .=  do_shortcode('[recent_products per_page="'.$atts['product_count'].'" columns="4" orderby="date" order="desc"]');
        $output .= ob_get_clean();
        $output .= '</div>';
					} else {
			$output = '<span>'.__('Please Enable Woocommerce plug-in', 'onetouch').'</span>';
		}
        return $output;
    }
}
add_shortcode('ott_product_show', 'shortcode_ott_product_show');



 /* ================================================================================== */
/*      Featured Products  Shortcode
/* ================================================================================== */

if (!function_exists('shortcode_ott_product_featured')) {
    function shortcode_ott_product_featured($atts, $content) {
        global $paged,$ott_options;
		if(onetouch_woocommerce_enabled()){

        $output = '<div class="ott-product">';
        ob_start();
	  	 $output .=  do_shortcode('[featured_products per_page="'.$atts['product_count'].'" columns="4" orderby="date" order="desc"]');

        $output .= ob_get_clean();
        wp_reset_query();
        $output .= '</div>';
			} else {
			$output = '<span>'.__('Please Enable Woocommerce plug-in', 'onetouch').'</span>';
		}
        return $output;
    }
}
add_shortcode('ott_product_featured', 'shortcode_ott_product_featured');
