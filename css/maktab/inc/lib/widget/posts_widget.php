<?php

	// Register widget
	add_action( 'widgets_init', 'init_ws_recent_posts' );
	function init_ws_recent_posts() { return register_widget('ws_recent_posts'); }
	
	class ws_recent_posts extends WP_Widget {
		function ws_recent_posts() {
			parent::WP_Widget( 'ws_recent_custom_posts', $name = 'OTT Recent Posts' );
		}
	
		function widget( $args, $instance ) {
			global $post;
			extract($args);
						
			// Widget Options
			$title 	 = apply_filters('widget_title', $instance['title'] ); // Title		
			$number	 = $instance['number']; // Number of posts to show
			
			echo $before_widget;
			
		    if ( $title ) echo $before_title . $title . $after_title;
				
			$recent_posts = new WP_Query(
				array(
					'post_type' => 'post',
					'posts_per_page' => $number
					)
			);
			
			if( $recent_posts->have_posts() ) : 
			
			?>
			
			<div class="recent-posts-side">
				
				<?php while( $recent_posts->have_posts()) : $recent_posts->the_post();
				
				$post_title = get_the_title();
				$post_author = get_the_author_link();
				$post_date = get_the_date();
				$post_categories = get_the_category_list();
				$post_comments = get_comments_number();
				$post_permalink = get_permalink();
				$thumb_image = get_post_thumbnail_id();
				$thumb_img_url = wp_get_attachment_url( $thumb_image, 'widget-image' );
				$image = aq_resize( $thumb_img_url, 50, 50, true, false);
				?>
				<div>
					<a href="<?php echo $post_permalink; ?>" class="recent-post-image gary-image">
						<?php if ($image) { ?>
						<img src="<?php echo $image[0]; ?>" width="<?php echo $image[1]; ?>" height="<?php echo $image[2]; ?>" />
						<?php } ?>
					</a>
					<div class="recent-post-details">
						<a class="recent-post-title" href="<?php echo $post_permalink; ?>" title="<?php echo $post_title; ?>"><?php echo $post_title; ?></a>
						<span><?php printf($post_date); ?></span>	
					</div>
				</div>
				
				<?php wp_reset_query(); endwhile; ?>
			</div>
				
			<?php endif; ?>			
			
			<?php
			
			echo $after_widget;
		}
	
		/* Widget control update */
		function update( $new_instance, $old_instance ) {
			$instance    = $old_instance;
				
			$instance['title']  = strip_tags( $new_instance['title'] );
			$instance['number'] = strip_tags( $new_instance['number'] );
			return $instance;
		}
		
		/* Widget settings */
		function form( $instance ) {	
		
			    // Set defaults if instance doesn't already exist
			    if ( $instance ) {
					$title  = $instance['title'];
			        $number = $instance['number'];
			    } else {
				    // Defaults
					$title  = '';
			        $number = '5';
			    }
				
				// The widget form
				?>
				<p>
					<label for="<?php echo $this->get_field_id('title'); ?>"><?php echo __( 'Title:', 'otouch' ); ?></label>
					<input id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" class="widefat" />
				</p>
				<p>
					<label for="<?php echo $this->get_field_id('number'); ?>"><?php echo __( 'Number of posts to show:', 'otouch'); ?></label>
					<input id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" type="text" value="<?php echo $number; ?>" size="3" />
				</p>
		<?php 
		}
	
	}

?>