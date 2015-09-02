<!DOCTYPE html>
<!--[if IE 7 ]>    <html class="ie7"> <![endif]-->
<!--[if IE 8 ]>    <html class="ie8"> <![endif]-->
<html <?php language_attributes(); ?>>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- Mobile Specific Metas
        ================================================== -->
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<?php current_title(); ?>
<?php favicon(); ?>
<!--[if lt IE 9]><script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
<!--[if IE 7]><link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/fontello/css/fontello-ie7.css"><![endif]-->
<?php
        facebookOpenGraphMeta();
        global $ott_end;
        $ott_start = $ott_end = '';
        if (ott_option('theme_layout') == "boxed") {
            $ott_start = '<div id="mainpage" class="theme-boxed ott-home-main">';
            $ott_end = '</div>';
        }
		 elseif (ott_option('theme_layout') == "fullwidth") {
            $ott_start = '<div id="mainpage" class="theme-wide-slider">';
            $ott_end = '</div>';
        }
		
		else {
            $ott_start = '<div id="mainpage" >';
            $ott_end = '</div>';
        }

        wp_head();
        ?>
</head>
<body <?php body_class('loading') ?>>
<?php if (ott_option('slide_bar')) { ?>
<?php   include(TEMPLATEPATH . '/inc/lib/com/top_panel.php'); ?>
<?php } ?>
<div id="one-page-home"></div>
<?php echo $ott_start; ?> 
<!--   include(TEMPLATEPATH . '/inc/lib/com/page-top.php'); ?>
<!-- Start Header -->
<header id="header"<?php echo ott_option('menu_fixed')&&!preg_match('/(alcatel|amoi|android|avantgo|blackberry|benq|cell|cricket|docomo|elaine|htc|iemobile|iphone|ipad|ipaq|ipod|j2me|java|midp|mini|mmp|mobi|motorola|nec-|nokia|palm|panasonic|philips|phone|sagem|sharp|sie-|smartphone|sony|symbian|t-mobile|telus|up\.browser|up\.link|vodafone|wap|webos|wireless|xda|xoom|zte)/i', $_SERVER['HTTP_USER_AGENT']) ? ' class="affix"' : ''; ?>>
  <div class="row-fluid">
    <div class="header-top">
      <div class="container">
        <div class="one-third">
          <?php theme_logo(); ?>
        </div>
        <div class="two-third last">
          <div class="stucy-menu">
            <?php theme_menu(); ?>
          </div>
           <?php if (ott_option('social_bar')) { ?>
          <div class="header-right">
            <div class="contact-us-button"><a href="contact" style="color: rgb(255, 255, 255);" target="_self" class="btn btn-flat rounded medium"><i class="icon-right-big"></i>Get A Quote<span style="color: rgb(225, 46, 54);"></span></a></div>
            
            <!-- <div class="one">
            	<?php   include(TEMPLATEPATH . '/inc/lib/com/social-header.php'); ?>
            </div> -->
          </div>
           <?php 	}?>
        </div>
         <div class="one show-mobile-menu-wrap">
         <div class="contact-us-button"><a href="contact" style="color: rgb(255, 255, 255);" target="_self" class="btn btn-flat rounded medium"><i class="icon-right-big"></i>Get A Quote<span style="color: rgb(225, 46, 54);"></span></a></div>	
        <div class="show-mobile-menu hidden-desktop clearfix">
          <div class="mobile-menu-text">
            <?php _e('Menu', 'otouch'); ?>
          </div>
          <div class="mobile-menu-icon"> <span></span><span></span><span></span><span></span> </div>
        </div>
        
        </div>
      </div>
    </div>
   
    <div class="header-bottom">
      <div class="container">
        <nav class="menu-container">
          <?php theme_menu(); ?>
           <?php if (ott_option('header_saerch')) { ?>
          <div class="search-form-top" >
                <form  method="get"   action="<?php echo home_url(); ?>/">
                  <input type="text" class="search-txt"  value="<?php echo __('enter search keyword','otouch');?>"  name="s" id="s"/>
                  <input type="submit" id="search_submit" value="search"/>
                </form>
              </div>
              <?php 	}?>
        </nav>
      </div>
    </div>
    
  </div>
 
  	  <nav id="mobile-menu">
    <div class="container">
      <?php mobile_menu(); ?>
    </div>
  </nav>

</header>

<!-- End Header -->
<?php get_template_part('slider'); ?>
<!-- Start Loading -->
<section id="loading"></section>
<!-- End   Loading --> 
<!-- Start Main -->
<section id="main">
<div <?php echo is_page() ? 'id="page"' : 'class="container"'; ?>>
