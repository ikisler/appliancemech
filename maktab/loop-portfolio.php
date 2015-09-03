<?php
global $ott_options,$portAtts;
if (have_posts ()) {
    echo '<div class="row">';
        echo '<div class="isotope-container ott-items">';
            while (have_posts ()) { the_post();
                $args = array('orderby' => 'none');
                $class = isset($ott_options['column'])?"span".$ott_options['column']:'span3';
                $height = !empty($ott_options['height']) ? $ott_options['height'] : ott_option('port_height');
                $width = 270;
                if($class=='span6'){
                    $width = 570;
                }elseif($class=='span4'){
                    $width = 370;  
                }                
                $cats = wp_get_post_terms($post->ID, 'cat_portfolio', $args);
                foreach ($cats as $catalog) {
                    $class .= " category-" . $catalog->slug;
                } ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class($class); ?>>
					<div class="item-inner">
                    
                  
				<?php
                    $ids = get_metabox('gallery_image_ids');
                    $video_embed = get_metabox('format_video_embed');
                    $video_url   = get_metabox('pretty_video_url');
					$category =  get_the_term_list(get_the_ID(), 'cat_portfolio');

                    if (has_post_thumbnail($post->ID)) {
                        if(!empty($video_url)&&get_metabox('pretty_video')==='true'){
                            portfolio_image($width,$height,true,$video_url);                            
                        }else{
                            portfolio_image($width,$height);
                        }
                    } elseif($ids!="false" && $ids!="") {
                        portfolio_gallery($width,$height,$ids);
                    } elseif(!empty($video_embed)) {
                        echo apply_filters("the_content", htmlspecialchars_decode($video_embed));
                    } ?>

                    <div class="portfolio-content">
                        <div class="portfolio_top"></div>
           
                        <h2 class="portfolio-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                       <span class="terms-list"><?php echo $category ?></span>
                        
                       
                    	
                        
                     </div>
                </article><?php
            }
        echo '</div>';
    echo '</div>';
    if($ott_options['pagination']=="simple"){
        pagination();
    }elseif($ott_options['pagination']=="infinite"){
        infinite();
    }
    wp_reset_query();
}