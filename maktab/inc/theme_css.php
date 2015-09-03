<?php

function theme_option_styles() {

    function hex2rgb($hex) {
        $hex = str_replace("#", "", $hex);

        if (strlen($hex) == 3) {
            $r = hexdec(substr($hex, 0, 1) . substr($hex, 0, 1));
            $g = hexdec(substr($hex, 1, 1) . substr($hex, 1, 1));
            $b = hexdec(substr($hex, 2, 1) . substr($hex, 2, 1));
        } else {
            $r = hexdec(substr($hex, 0, 2));
            $g = hexdec(substr($hex, 2, 2));
            $b = hexdec(substr($hex, 4, 2));
        }
        $rgb = array($r, $g, $b);
        return implode(",", $rgb); // returns the rgb values separated by commas
        //return $rgb; // returns an array with the rgb values
    }
    ?>

    <!-- Custom CSS -->

    <style>
        body {
            font-family: "<?php echo ott_option('body_text_font', "face"); ?>", Arial, Helvetica, sans-serif;
            font-size: <?php echo ott_option('body_text_font', 'size'); ?>; 
            font-weight: <?php echo ott_option('body_text_font', 'style'); ?>; 
            color: <?php echo ott_option('body_text_font', 'color'); ?>;
            <?php
            if (ott_option('theme_layout') == 'boxed') {
                if (ott_option('background_color') != "") {
                    echo 'background-color: ' . ott_option('background_color') . ';';
                }
                if (ott_option('mainbackground_image') != "") {
                    echo 'background-image: url(' . ott_option('mainbackground_image') . ');';
                }
                if (ott_option('background_repeat') != 'Strech Image') {
                    echo 'background-repeat: ' . ott_option('background_repeat') . ';';
                } else {
                    echo '-webkit-background-size: cover; -moz-background-size: cover; -o-background-size: cover; background-size: cover;';
                }
                echo "background-attachment: fixed;";

            }
            ?>
}

		#mainpage{
			 <?php
			if (ott_option('theme_layout') == 'boxed') {
				                echo "margin-top:" . ott_option('margin_top') . "px;";
                echo "margin-bottom:" . ott_option('margin_bottom') . "px";
				
				
				} ?>
				
		}


        h1,h2,h3,h4,h5,h6,
        .btn,button, .ott-portfolio .ott-filter ul,
        input[type="submit"],
        input[type="reset"],
        input[type="button"],
        .accordion-heading .accordion-toggle,
        .ott-service-content a,
        .isotope-container .loop-block a.more-link, .ott-featured-box span.title_sec, .testi-name span , .ott-milestones-content p, .nav-tabs > li > a span{font-family: <?php echo ott_option('heading_font'); ?>;}
        h1{ font-size: <?php echo ott_option('h1_spec_font', 'size'); ?>; color: <?php echo ott_option('h1_spec_font', 'color'); ?>; }
        h2{ font-size: <?php echo ott_option('h2_spec_font', 'size'); ?>; color: <?php echo ott_option('h2_spec_font', 'color'); ?>; }
        h3,  .news-content h3 a{ font-size: <?php echo ott_option('h3_spec_font', 'size'); ?>;  }
		.news-content h3 a, h2.loop-title a, .loop-media .link-text a , .news-content h3 a, .ott-carousel-post .carousel-content h3 a, 
		.inner_product_header h3 a
		{ color: <?php echo ott_option('h3_spec_font', 'color'); ?>; }
		
        h4{ font-size: <?php echo ott_option('h4_spec_font', 'size'); ?>; color: <?php echo ott_option('h4_spec_font', 'color'); ?>; }
        h5{ font-size: <?php echo ott_option('h5_spec_font', 'size'); ?>; color: <?php echo ott_option('h5_spec_font', 'color'); ?>; }
        h6{ font-size: <?php echo ott_option('h6_spec_font', 'size'); ?>; color: <?php echo ott_option('h6_spec_font', 'color'); ?>; }

       <?php if(ott_option('link_color')!='') {?> a,.ott-callout h1 a,#sidebar ul.menu .current_page_item a,.sf-menu > li.current_page_item > a{ color: <?php echo ott_option('link_color'); ?>; }<?php } ?>
        <?php if(ott_option('link_hover_color')!='') {?>a:hover, a:focus,.loop-meta a:hover,article .loop-content a.more-link:hover, .news-content h3 a:hover, h2.loop-title a:hover, .loop-media .link-text a:hover , .news-content h3 a:hover,  .carousel-meta > div a:hover, .inner_product_header h3 a:hover{ color: <?php echo ott_option('link_hover_color'); ?>; }<?php } ?>
		
		<?php if(ott_option('main_background')!='') {?> #main { background-color: <?php echo ott_option('main_background'); ?>;} <?php } ?>

		<?php if(ott_option('heading_title_font')!='') {?>h2.portfolio-title, .ott-iconed-box-content h2, .carousel-container .inner_product_header h3, .ott-carousel-post .carousel-content h3, h2.loop-title, .loop-media .link-text, .news-content h3, h2.loop-title a, .loop-media .link-text, .news-content h3 a, .ott-carousel-post .carousel-content h3 a, .ott-featured-box span.title_sec, .accordion-heading .accordion-toggle, .testi-name span, .ott-iconed-text-content h4, .ott-sidenews .ott-items li h2.sidenew-title {font-family: "<?php echo ott_option('heading_title_font', 'face');?>";}<?php } ?> 

		h2.portfolio-title, .ott-iconed-box-content h2, .carousel-container .inner_product_header h3, .ott-carousel-post .carousel-content h3, h2.loop-title, .loop-media .link-text, .news-content h3, h2.loop-title a, .loop-media .link-text, .news-content h3 a, .ott-carousel-post .carousel-content h3 a, .ott-featured-box span.title_sec, .accordion-heading .accordion-toggle, .testi-name span, .ott-iconed-text-content h4, .ott-sidenews .ott-items li h2.sidenew-title { font-size: <?php echo ott_option('heading_title_font', 'size'); ?>; color: <?php echo ott_option('heading_title_font', 'color'); ?>; font-style: <?php echo ott_option('heading_title_font', 'style'); ?>;		 }



			
        /* Top Bar ------------------------------------------------------------------------ */

		<?php if(ott_option('sec_heading_font')!='') {?>.ott-title-container h3, h3.widget-title {font-family: "<?php echo ott_option('sec_heading_font')?>";}<?php } ?> 	
		<?php if(ott_option('mil_heading_font')!='') {?>.ott-milestones-count , .ott-milestones-content p, .progress_bar  h4.progress_title, .progress_bar .progress_number, .ott-pricing-header h1{ font-family: <?php echo ott_option('mil_heading_font') ;?> }<?php } ?> 	
		<?php if(ott_option('ptitle_heading_font')!='') {?>#page-title h1	 {font-family: "<?php echo ott_option('ptitle_heading_font')?>" ;}<?php } ?> 	
		<?php if(ott_option('Page_header_text')!='') {?>#page-title h1	 {font-size: <?php echo ott_option('Page_header_text')?>px; line-height:1.1}<?php } ?> 	
		<?php if(ott_option('Page_header_color')!='') {?>#page-title h1	 {color: <?php echo ott_option('Page_header_color');?> ;}<?php } ?> 	
		
		
		
		<?php if(ott_option('psubtitle_heading_font')!='') {?> #page-title h3 {font-family: "<?php echo ott_option('psubtitle_heading_font')?>" ;}<?php } ?> 	
		<?php if(ott_option('Page_desc_color')!='') {?> #page-title h3{color: <?php echo ott_option('Page_desc_color');?> ;}<?php } ?> 	
		<?php if(ott_option('Page_subheader_text')!='') {?> #page-title h3 {font-size: "<?php echo ott_option('Page_subheader_text')?>px" ;}<?php } ?> 	
		
		
		
		
		<?php if(ott_option('toppage_background')!='') {?> .top-page-sec {background: <?php echo ott_option('toppage_background');?>;}<?php } ?> 	
		<?php if(ott_option('toppage_text')!='') {?> .ott-acc-menu-wrap a,  nav.langes-menu .menu li.parent > a{color: <?php echo ott_option('toppage_text');?>;}<?php } ?> 	
		<?php if(ott_option('toppage_text_hover')!='') {?> .ott-acc-menu-wrap a:hover, nav.langes-menu .menu li.parent > a:hover{color: <?php echo ott_option('toppage_text_hover');?>;}<?php } ?> 	

		<?php if(ott_option('toppage_border')!='') {?> .top-page-sec {border-bottom-color:  <?php echo ott_option('toppage_border');?>;}<?php } ?> 	
		
		<?php if(ott_option('cart_bg')!='') {?>  .cart_dropdown, #header .top-page-sec .cart_dropdown { background-color: <?php echo ott_option('cart_bg');?>;} <?php } ?> 
		<?php if(ott_option('cart_border')!='') {?>  .cart_dropdown, #header .top-page-sec .cart_dropdown { border-color: <?php echo ott_option('cart_border');?>;} <?php } ?> 
	
		
				
		<?php if(ott_option('cart_icon')!='') {?>  .cart_dropdown i {color: <?php echo ott_option('cart_icon');?>;}<?php }?> 		
		<?php if(ott_option('sidebar_widgets_title')!='') {?>#sidebar h3.widget-title  {font-family: <?php echo ott_option('sidebar_widgets_title', 'face');?>, Arial, Helvetica, sans-serif;font-size: <?php echo ott_option('sidebar_widgets_title', 'size');?>;font-weight: <?php echo ott_option('sidebar_widgets_title', 'style');?>;color: <?php echo ott_option('sidebar_widgets_title', 'color');?>;}<?php } ?> 
		<?php if(ott_option('toppage_social')!='') {?> #header .social_wrapper li a i { color: <?php echo ott_option('toppage_social');?>;}<?php } ?> 

        /* Header ------------------------------------------------------------------------ */  
       <?php if(ott_option('header_background')!='') {?> #header, .slider_top, #page-title, #slider-home .flexslider { background-color: <?php echo ott_option('header_background'); ?>; } <?php } ?> 
		<?php if(ott_option('slider_background')!='') {?>#slider-home   { background-color: <?php echo ott_option('slider_background'); ?>; } <?php } ?> 
		 <?php if(ott_option('Page_header_background')!='') {?>  #page-title {background-color: <?php echo ott_option('Page_header_background'); ?>;)}<?php } ?> 
		  <?php if(ott_option('Page_title_border_color')!='') {?>  #page-title, #slider-home, .background-flex > .container {border-color: <?php echo ott_option('Page_title_border_color'); ?>;)}
		  <?php } ?>
		  <?php if(ott_option('Page_title_border_color')!='') {?>  #slider-home:after  , #page-title:after , .background-flex > .container:after{border-top-color: <?php echo ott_option('Page_title_border_color'); ?>;)}<?php } ?>  
		  <?php if(ott_option('Page_title_patt_color')!='') {?>  #page-title .pattern {background-color: <?php echo ott_option('Page_title_patt_color'); ?>;)}<?php } ?> 
	  
		  
		  
		<?php if(ott_option('slide_heading_font')!='') {?>.flex-slider-caption h2, .camera_caption h3 {font-family: "<?php echo ott_option('slide_heading_font') ?>";} <?php } ?> 
		<?php if(ott_option('slide_heading_color')!='') {?>.flex-slider-caption h2, .camera_caption h3 {color: <?php echo ott_option('slide_heading_color') ?>;} <?php } ?> 
		<?php if(ott_option('slide_heading_text')!='') {?>.flex-slider-caption h2, .camera_caption h3 {font-size: <?php echo ott_option('slide_heading_text') ?>px; line-height: 1.6;}	 <?php } ?> 
		
		<?php if (ott_option('social_bar')) { ?>
		@media (min-width: 319px) and (max-width: 480px) {
		.header-top .one-third { padding-top: 60px ;}
		
		}
		@media (max-width: 767px) {
			.show-mobile-menu-wrap {position:relative;top:auto; right:auto;width:100%}
			.show-mobile-menu {float:right}		
		}
		@media (min-width: 768px) and (max-width: 979px) { 
			.show-mobile-menu-wrap {position:relative;top:auto; right:auto;width:100%}
			.show-mobile-menu {float:right}	
		}
		
		<?php } ?> 
		<?php if(ott_option('theme_width')=='1000re') {?><?php if (ott_option('header_saerch')) { ?>.ott-menu-container{max-width:740px}<?php } ?> <?php } ?> 
		<?php if(ott_option('theme_width')=='1260re') {?><?php if (ott_option('header_saerch')) { ?>.ott-menu-container{max-width:900px}<?php } ?> <?php } ?> 
		
		<?php if (ott_option('gary_effect')) { ?>
		.gary-image img, .flickr-channel a img{
filter: url("data:image/svg+xml;utf8,<svg xmlns=\'http://www.w3.org/2000/svg\'><filter id=\'grayscale\'><feColorMatrix type=\'matrix\' values=\'0.3333 0.3333 0.3333 0 0 0.3333 0.3333 0.3333 0 0 0.3333 0.3333 0.3333 0 0 0 0 0 1 0\'/></filter></svg>#grayscale"); /* Firefox 10+, Firefox on Android */
filter: gray; /* IE6-9 */
-webkit-filter: grayscale(100%); /* Chrome 19+, Safari 6+, Safari 6+ iOS */
}

.gary-image:hover img, .gallery-container:hover .gary-image img,  .flickr-channel a img:hover{
	 filter: url("data:image/svg+xml;utf8,<svg xmlns=\'http://www.w3.org/2000/svg\'><filter id=\'grayscale\'><feColorMatrix type=\'matrix\' values=\'1 0 0 0 0, 0 1 0 0 0, 0 0 1 0 0, 0 0 0 1 0\'/></filter></svg>#grayscale");
-webkit-filter: grayscale(0%);
}

		<?php } ?> 
		
		
		<?php if (ott_option('tp_langs')) { ?>
			.ott-acc-menu-wrap .ott-acc-inside a:last-child {-webkit-border-top-left-radius: 0px;-webkit-border-bottom-left-radius: 0px;-moz-border-radius-topleft: 0px;-moz-border-radius-bottomleft: 0px;border-top-left-radius: 0px;border-bottom-left-radius: 0px; border-left:0px;}
		<?php } ?> 
		
		<?php if (ott_option('shoppage_breadcrumb_enable')) { ?>
		
		.woocommerce-breadcrumb {display:block;}
		<?php } ?> 

        /* Navigation ------------------------------------------------------------------------ */ 

       <?php if(ott_option('menu_top')!='') {?> #header .menu-container{ margin-top: <?php echo ott_option('menu_top'); ?>px; } #header.stuck  .menu-container { margin-top: 0px; }  <?php } ?> 
   <?php if(ott_option('menu_font')!='') { ?>ul.sf-menu > li a{ font-family: "<?php echo ott_option('menu_font', "face"); ?>", Arial, Helvetica, sans-serif; 
font-size: <?php echo ott_option('menu_font', 'size'); ?>; font-weight: <?php echo ott_option('menu_font', 'style'); ?>; color: <?php echo ott_option('menu_font', 'color'); ?>; }<?php }?>
       <?php if(ott_option('submenu_bg')!='') { ?>  ul.sf-menu > li.current-menu-item,ul.sf-menu > li.current_page_item{ background-color: <?php echo ott_option('menu_hover_background'); ?>; }<?php }?>
        <?php if(ott_option('menu_hover')!='') { ?>ul.sf-menu > li.current-page-item > a, ul.sf-menu > li a:hover,ul.sf-menu > li.current-menu-item > a,ul.sf-menu > li.current-menu-item[class^="icon-"]:before, ul.sf-menu > li.current-menu-item[class*=" icon-"]:before,ul.sf-menu > li.current_page_ancestor[class^="icon-"]:before, ul.sf-menu > li.current_page_ancestor[class*=" icon-"]:before,ul.sf-menu > li:hover > a, ul.sf-menu > li.current_page_ancestor > a,ul.sf-menu > li.current-menu-ancestor >a{ color: <?php echo ott_option('menu_hover'); ?>; }<?php }?>
        <?php if(ott_option('submenu_bg')!='') { ?> ul.sf-menu li ul li { background: <?php echo ott_option('submenu_bg'); ?>; }<?php }?>
       <?php if(ott_option('submenu_hover_background')!='') { ?> ul.sf-menu li ul li:hover { background: <?php echo ott_option('submenu_hover_background'); ?>; }<?php }?>
        <?php if(ott_option('submenu_link')!='') { ?> ul.sf-menu li ul li.current-menu-item a,ul.sf-menu li ul li a { color: <?php echo ott_option('submenu_link'); ?>; }<?php }?>
        <?php if(ott_option('submenu_hover')!='') { ?> ul.sf-menu li ul li a:hover,ul.sf-menu li ul li.current-menu-item a,ul.sf-menu li ul li.current_page_item a { color: <?php echo ott_option('submenu_hover'); ?>; }<?php }?>
		<?php if(ott_option('submenu_font')!='') { ?>  ul.sf-menu > li ul li a { font-family: <?php echo ott_option('submenu_font', 'face'); ?>, Arial, Helvetica, sans-serif; font-size: <?php echo ott_option('submenu_font', 'size'); ?>; font-weight: <?php echo ott_option('submenu_font', 'style'); ?>; color: <?php echo ott_option('submenu_font', 'color'); ?>;}<?php }?>


        /* Main ------------------------------------------------------------------------ */  
        #main { background: <?php echo ott_option('body_background'); ?>; }

        /* Footer ------------------------------------------------------------------------ */  

			<?php if(ott_option('footer_background')!='') {?>  #footer {background-color: <?php echo ott_option('footer_background');?>;} <?php }?>  
						<?php if(ott_option('footer_background')!='') {?>  #bottom:before {border-top-color: <?php echo ott_option('footer_background');?>;} <?php }?>  

			<?php if(ott_option('footer_text_color')!='') { ?>  #footer .ott-footer-widgets { color: <?php echo ott_option('footer_text_color'); ?>;} <?php }?>  
			<?php if(ott_option('footer_widgets_title')!='') {?> #footer h3.widget-title , .footer-contacts h6 { font-family: <?php echo ott_option('footer_widgets_title', 'face');?>, Arial, Helvetica, sans-serif;
					font-size: <?php echo ott_option('footer_widgets_title', 'size');?>;
					font-weight: <?php echo ott_option('footer_widgets_title', 'style');?>;
					color: <?php echo ott_option('footer_widgets_title', 'color');?>;}<?php }?> 
			<?php if(ott_option('footer_link_color')!='') { ?>  #footer a, #footer .ott-recent-posts-widget h4 a, #footer  .widget a, #footer  .contact-info-widget ul i, #footer .contact-info-widget a, #footer .contact-info-widget a i {
					 color: <?php echo ott_option('footer_link_color'); ?>;}<?php }?>  
			 <?php if(ott_option('footer_link_hover_color')!='') { ?>  #footer a:hover, #footer .ott-recent-posts-widget h4 a:hover, #footer .ott-recent-posts-widget h4 a:hover { color: <?php echo ott_option('footer_link_hover_color'); ?>;} <?php }?>								
			 <?php if(ott_option('copyrights_bg')!='') { ?>  #bottom { background-color:<?php echo ott_option('copyrights_bg'); ?>;} <?php }?>  
			 <?php if(ott_option('copyrights_text_color')!='') {?> .footer-contacts h6 , #bottom .bottom_contact span, #bottom, .footer-social-links h2, .copyright p { color: <?php echo ott_option('copyrights_text_color'); ?>;} <?php }?>  
			 <?php if(ott_option('copyrights_link_color')!='') { ?>  #bottom .social_wrapper a i,  #bottom a, #bottom .footer-menu a , #bottom .bottom_contact span a{ color: <?php echo ott_option('copyrights_link_color'); ?>;} <?php }?>  
			 <?php if(ott_option('copyrights_link_color_hover')!='') {?> #bottom .social_wrapper a i:hover,  #bottom a:hover, #bottom .footer-menu a:hover, #bottom .bottom_contact span a:hover { color: <?php echo ott_option('copyrights_link_color_hover'); ?>;} <?php }?> 
			<?php if (ott_option('shoppage_title')) { ?> .woocommerce-page #page-title{display:block} <?php }?> 

	
	

        /* General Color ------------------------------------------------------------------------ */ 

       <?php if (ott_option('primary_color')) { ?> ::selection{ background: <?php echo ott_option('primary_color'); ?>; }
        ::-moz-selection{ background: <?php echo ott_option('primary_color'); ?>; }
        .sub-title{color: <?php echo ott_option('body_text_font', 'color'); ?>;}	
         .ui-slider-handle{ background: <?php echo ott_option('primary_color'); ?> !important; }
        button,input[type="submit"],input[type="reset"],input[type="button"],.content-meta,.comment-block .comment span.comment-splash, .woocommerce span.onsale, .woocommerce-page span.onsale, 
        .woocommerce a.button.alt, .woocommerce-page a.button.alt, .woocommerce button.button.alt, .woocommerce-page button.button.alt, .woocommerce input.button.alt, 
		.woocommerce-page input.button.alt, .woocommerce #respond input#submit.alt, .woocommerce-page #respond input#submit.alt, .woocommerce #content input.button.alt, 
		.woocommerce-page #content input.button.alt, .btn-iconed:hover{ background: <?php echo ott_option('primary_color'); ?>; }
        .team-member ul.ott-social-icon li a:hover,ul.ott-social-icon li a:hover{ background-color: <?php echo ott_option('primary_color'); ?>; }
        footer#footer .ott-recent-posts-widget .meta a,.highlight,.ott-top-bar-info a,.ott-title-container h3 span,a.live-preview,#sidebar ul.menu li.current_page_item a,h3.error404 span,.total strong,.woocommerce ul.products li.product .price,  .woocommerce-page ul.products li.product .price, nav.langes-menu div.current-language, .contact-left span a, .contact-icon i, .team-member h2 a:hover, .team-figcaption-inner span,  .loop-block  blockquote span, .inner_product:hover .inner_product_header h3, a.more-section, 	h2.portfolio-title a:hover
		{ color: <?php echo ott_option('primary_color'); ?>; }
        .ott-top-service-text div:last-child,h2.loop-title a:hover,#sidebar a:hover,a.live-preview:hover,.pagination ul>li>a.current, .pagination ul>li>span.current, .pagination ul>li>a:hover,.list_carousel li .carousel-content h3:hover a, nav.langes-menu .menu li > a:hover,  .testi-name a,  #search-click i, .ott-title-container i, nav.langes-menu div.current-language span, .accordion-toggle.active i, .accordion-toggle.active, .loop-block a.more-link ,  .caption-bottom .btn, #mainpage .price, div .stock, ul.contact-bottom > li a:hover i.icon-out, aside > ul li a:hover, .flex-link i,  .itemco-wrap h2.itemco-title a:hover
		, #header .social_wrapper li:hover a i, .teaser-content p, #mainpage .onetouch_cart_buttons .button:hover, .ott-testimonial-content h2, span.ott-date, .likeit span, .likeit i, .single_pagination span:hover i, .single  .likeit i:hover, #sidebar aside.widget.pages ul li a:hover, #sidebar aside.widget.pages li.current-menu-item a, #sidebar aside.widget.widget_nav_menu ul li a:hover, #sidebar aside.widget.widget_nav_menu li.current-menu-item a, .nav-tabs > li.active > a span, .nav-tabs > li.active > a i, .ott-accordion.about .accordion-group .accordion-heading .accordion-toggle.active, .ott-accordion.about .accordion-group .accordion-heading .accordion-toggle:hover, .dropdown_widget ul.cart_list li a:hover, .news-month, .inf-btn:hover, .member-social .ott-social-icon  a:hover, .contact-right a:hover  i, .service-content h4,
		a.sidenews-link, #sidebar aside.widget ul.menu li a:hover, #sidebar aside.widget ul.menu li.current-menu-item a, .ott-side-box:hover  .ott-icon-block i,
		.ott-sidenews .ott-items li h2.sidenew-title a:hover, .terms-list a:hover, ul.loop-meta li span.date, ul.loop-meta li a
		{ color: <?php echo ott_option('primary_color'); ?>; }
		
        .team-member .loop-image,ul.sf-menu > li:hover > a, .sf-menu > li.current_page_item > a, .sf-menu > li.current_page_ancestor > a, .sf-menu > li.current-menu-ancestor > a, .sf-menu > li.current-menu-item > a,ul.sf-menu > li.current-menu-item,a.live-preview, ul.sf-menu > li.current_page_ancestor, .btn-iconed,  .btn-iconed:hover{ border-color: <?php echo ott_option('primary_color'); ?>; }
        ul.sf-menu > li.current-page-item,.ott-testimonials .carousel-arrow a.carousel-prev:hover, .ott-testimonials .carousel-arrow a.carousel-next:hover, .ott-filter ul li a:hover, .ott-filter ul li a.selected, .ott-icontxt-block,  .flex-control-nav li a.active, .flex-control-nav li a:hover, .caption-bottom .btn span, .featured-bottom-btn, a.more-link-service, .flex_caption_side_inner, #slider-home.side-flex .flex-direction-nav, #mainpage .onsale, .tp-bullets.simplebullets.round .bullet:hover, .tp-bullets.simplebullets.round .bullet.selected, .tp-bullets.simplebullets.navbar .bullet:hover, .tp-bullets.simplebullets.navbar .bullet.selected
, .header-top:before		, .image-links a.btn-border:hover, .carousel-content .loop-format, .blog-main .one-third .meta-container .loop-format, ul.ott-list > li > i,
.ott-testimonials .ts-title, #header.stuck .mobile-menu-icon span
		{ background:<?php echo ott_option('primary_color'); ?>; }
		
		.header-right .social_wrapper li:hover, .ott-iconed-box:hover, .item-inner:hover, .ott-teaser:hover, .inner_product:hover , .inf-btn:hover,
		.ott-pricing-box:hover, .tagcloud a:hover, #sidebar aside.widget.social_link_widgte ul li:hover, .ott-featured-box:hover, input[type="text"]:focus, input[type="password"]:focus, input[type="email"]:focus, textarea:focus, .search-form-top input[type="text"]:focus, #footer aside.widget.social_link_widgte ul li:hover,
		.contact-right a:hover, .ott-service-box .service-content-text, .ott-about-wrap:hover
		
		{
			border-bottom-color:	<?php echo ott_option('primary_color'); ?>
		}
		
        .image-overlay.hover-zoom ,article .loop-format,.btn, .ott-carousel-portfolio .portfolio-content-full, ul.contact-bottom > li a  {background-color:<?php echo ott_option('primary_color'); ?>;}
		
		.teaser-btn,  .ott-featured-box:hover .ott-featured-icon.hover i{ background-color:<?php echo ott_option('primary_color'); ?> !important; }
		.ott-icontxt-block:before{ box-shadow: 0 0 0 3px <?php echo ott_option('primary_color'); ?> ;	}
		 .teaser-btn:hover, #mainpage .widget_price_filter .price_slider_wrapper .price_slider .ui-slider-handle , .flickr-channel a:hover, .dribbble-widget a:hover,
		 div ul.product_list_widget li a:hover img, aside.widget div.recent-posts-list div a:hover img, aside.widget div.recent-posts-side div a:hover img, .caption-bottom .btn, .ott-featured-box:hover .ott-featured-icon.hover i{
		border-color: <?php echo ott_option('primary_color') ?> !important; }
		.btn-iconed {border-color: <?php echo ott_option('primary_color') ?> ; }
		#slider-home.side-flex .flex-direction-nav:before{border-top-color: <?php echo ott_option('primary_color') ?> }
		 .tmbutton, .tmbutton:hover,  p.form-submit input, .flex-slider-caption h2:after, .camera_caption h3:after, .show-mobile-menu .mobile-menu-icon span,
		 .ott-side-box:hover .ott-iconed-box-content h2:after
		{ background-color:<?php echo ott_option('primary_color'); ?>; }
		.tabs-top > .nav-tabs .active > a, .tabs-top > .nav-tabs .active > a:hover, .tabs-top > .nav-tabs .active > a:focus{
				border-top-color: <?php echo ott_option('primary_color') ?> !important; }
		.tabs-left > .nav-tabs .active > a, .tabs-left > .nav-tabs .active > a:hover, .tabs-left > .nav-tabs .active > a:focus, .ott-testimonial-content p, blockquote{
			border-left-color: <?php echo ott_option('primary_color') ?> !important; 
		}
		
		 .tabs-right > .nav-tabs .active > a, .tabs-right > .nav-tabs .active > a:hover, .tabs-right > .nav-tabs .active > a:focus,
		 #sidebar aside.widget.pages li.current-menu-item, #sidebar aside.widget.widget_nav_menu li.current-menu-item
		 {
			 border-right-color: <?php echo ott_option('primary_color') ?> !important; 
		 }
		
		  p a.featured-btn:hover,  a.featured-btn:hover,   .menu > li.parent:after{
		color: <?php echo ott_option('primary_color') ?> !important; 		}
		
		a.more-link,  .testimonial-info a, .accordion-heading .accordion-toggle:hover , #sidebar  aside.widget  a:hover, .loop-media blockquote span, .sub-title, blockquote:before, #footer .price, #footer .price span, #footer del, #footer ins, .product_list_widget span.amount, .header-tool-free h3.ott-tool, .header-tool-free span.ott-tool-msg{ color: <?php echo ott_option('primary_color'); ?> ; }
		
		.ott-pricing-footer  .btn-flat{
			border-color: <?php echo ott_option('primary_color') ?>
		}
        .image-overlay, .loop-image:hover .overlay {background-color: rgba(234, 234, 234, 0.5); }		
		.portfolio-inner:hover .overlay { background-color: rgba(234, 234, 234, 0.5); }	
		 .gallery-container .carousel-arrow a.carousel-prev:hover, .gallery-container .carousel-arrow a.carousel-next:hover {
background-color: <?php echo "rgba(" . hex2rgb(ott_option('primary_color')) . ",.7)" ?>;
}
	.service-content{background-color: #fff;}

		} <?php }?> 
        @media (min-width: 768px) and (max-width: 979px) { 
            header#header,header#header.stuck{ background: <?php echo ott_option('logo_bg') ? ott_option('primary_color') : '#fff'; ?>; }
        }
        @media (min-width: 768px) and (max-width: 979px) { 
            .mobile-menu-icon span{ background: <?php echo ott_option('logo_bg') ? '#fff' : ott_option('primary_color'); ?>; }
        }
		
		
		
        <?php echo ott_option('custom_css'); ?>
    </style>

    <?php
}

add_action('wp_head', 'theme_option_styles', 100);
?>