<?php
if(!is_singular('post') || ott_option('blog_title')!="") {   

    if(is_singular('post') || is_home()) {
		  if(ott_option("post_sintitle")) {
        if(ott_option('blog_title')!="") {
            $title = "<h1 class='page-title'>".apply_filters('widget_title', ott_option('blog_title'))."</h1>";        
            $subtitle = ott_option('blog_subtitle')!="" ? ('<h3>'.apply_filters('widget_title', ott_option("blog_subtitle")).'</h3>') : '';
        }
		  }
    }  else {
        $subtitle = "";
        if(is_page()) {
            $title = get_featuredtext();
			$title = get_featuredtext();     
            if (get_metabox("subtitle") != "") {
                $subtitle = "<h3>".apply_filters('widget_text', get_metabox("subtitle"))."</h3>";
            }
            if(get_metabox("bg_image") != "") {
                $bgimage = get_metabox("bg_image");
            }
        } elseif(is_singular('ott_portfolio')) {
            $title = get_featuredtext();
			
            $title = "<h1 class='page-title'>".apply_filters('widget_title', ott_option('sportfolio_title'))."</h1>";        

            if (get_metabox("subtitle") != "") {
                $subtitle = "<h3>".apply_filters('widget_text', get_metabox("subtitle"))."</h3>";
            }
            if(ott_option("title_bg_image") != "") {
                $bgimage = ott_option("title_bg_image");
            }
			else {
                $bgimage = ott_option("worksingle_bg_image");
            }
        }
		elseif(is_singular('ott_team')) {
            $title = get_featuredtext();
			
            $title = "<h1 class='page-title'>".apply_filters('widget_title', ott_option('steam_title'))."</h1>";        

            if(ott_option('steam_subtitle')!="") {
            $subtitle = ott_option('steam_subtitle')!="" ? ('<h3>'.apply_filters('widget_title', ott_option("steam_subtitle")).'</h3>') : '';
            }
			
			if(ott_option("title_bg_image") != "") {
                $bgimage = ott_option("title_bg_image");
            }
			else {
                $bgimage = ott_option("team_background");
            }

        }
		elseif(is_singular('ott_gallery')) {
			
            $title = "<h1 class='page-title'>".apply_filters('widget_title', ott_option('sgallery_title'))."</h1>";        

            if(ott_option('steam_subtitle')!="") {
            $subtitle = ott_option('sgallery_subtitle')!="" ? ('<h3>'.apply_filters('widget_title', ott_option("sgallery_subtitle")).'</h3>') : '';
            }
			if(ott_option("title_bg_image") != "") {
                $bgimage = ott_option("title_bg_image");
            }
			else {
                $bgimage = ott_option("gallery_background");
            }
        }
				
		else {
            $title = get_featuredtext();
        }
    }
	
	
}



$breadcrumb = false;
$class = 'span12';
if(get_metabox("breadcrumps")=="true") {
    $breadcrumb = true;
 } else if(get_metabox("breadcrumps")!="false") {
    if(ott_option("breadcrumps")) {
        $breadcrumb = true;
    }
}
$ebreadcrumb = "";
if($breadcrumb){ ob_start(); echo '<div class="">'; breadcrumbs(); echo '</div>'; $ebreadcrumb = ob_get_clean();}


$background = isset($bgimage) ? $bgimage : ott_option('title_bg_image');



if(onetouch_woocommerce_enabled() && get_post_type() == 'product'){
	
	$background = isset($bgimage) ? $bgimage : ott_option('shop_background');

	$shop_title =  ott_option('shop_title');
	$shop_subtitle =  ott_option('shop_subtitle');
	
    ob_start();
    echo "<h1 class='page-title'>";
    echo $shop_title;
    echo "</h1>";
	 echo "<h3 class='page-title'>";
    echo $shop_subtitle;
    echo "</h3>";
    $title = ob_get_clean();
    ob_start();
    woocommerce_breadcrumb();
    $ebreadcrumb = ob_get_clean();
}


if(isset($title)) { ?>
<!-- Start Feature -->

<section id="page-title" class="<?php echo !empty($background) ? (' withbg') : '';?> left" <?php echo !empty($background) ? (' style="background-image: url('.$background.')"') : '';  ?> > 
  <!-- Start Container -->
  <div class="pattern"></div>
  <div class="container" >
    <div class="row ott-header-page ">
      <div class="span12">
        <div class='title-wrap'>
          <div class='title-wrap-inner'> <?php echo $title.$subtitle; ?> </div>
        </div>
      </div>
      <?php echo $ebreadcrumb; ?> </div>
  </div>
  <!-- End Container --> 
</section>
<!-- End Feature -->
<?php } ?>
