<?php
class socialinks extends WP_Widget {

    function socialinks() {
        $widget_ops = array(
            'classname' => 'social_link_widgte',
            'description' => 'Social Links'
        );
        $control_ops = array('width' => 80, 'height' => 80);
        parent::WP_Widget(false, 'OTT Social Links', $widget_ops, $control_ops);
    }

    function form($instance) {
        $instance = wp_parse_args((array) $instance, array('contact_title' => ''));
		$contact_title = isset($instance['contact_title']) ? strip_tags($instance['contact_title']) : '';

        ?>
        <p>
            <label for="<?php echo $this->get_field_id('contact_title'); ?>"><?php _e('Title:', 'otouch'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('contact_title'); ?>" name="<?php echo $this->get_field_name('contact_title'); ?>" type="text" value="<?php echo esc_attr($contact_title); ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('contact_msg'); ?>"><?php _e('Message:', 'otouch'); ?></label>
        <?php
    }

    function update($new_instance, $old_instance) {
        $instance = $old_instance;
        $instance['contact_title'] = strip_tags($new_instance['contact_title']);

        return $instance;
    }

    function widget($args, $instance) {
        extract($args);
		
        $contact_title = apply_filters('widget_contact_title', empty($instance['contact_title']) ? '' : $instance['contact_title'], $instance);
		 $rss_url = ott_option('rss_url');
        $twitter_username = ott_option('twitter_username');
        $facebook_username = ott_option('facebook_username');
        $ot_flickr_username = ott_option('ot_flickr_username');
        $youtube_username = ott_option('youtube_username');
		$vimeo_username = ott_option('vimeo_username');
		$tumblr_url = ott_option('tumblr_url');
		$googleplus_username = ott_option('googleplus_username');
		$dribbble_username = ott_option('dribbble_username');
		$linkedin_username = ott_option('linkedin_username');
		$pinterest_username = ott_option('pinterest_username');
		$instagram_username = ott_option('instagram_username');
		$skype_username = ott_option('skype_username');
	
        $class = apply_filters('widget_class', empty($instance['class']) ? '' : $instance['class'], $instance);

        echo $before_widget;

        $contact_title = $contact_title;
        
        if (!empty($contact_title)) {
            echo $before_title . $contact_title . $after_title;
        }
        echo '<div class="social-links-widget">';
            echo '<ul>';
				if(!empty($rss_url)){
                    echo '<li ><a  title="Facebook" href="'.$rss_url.'"> <i class="icon-rss"></i> </a></li>';
                }
                if(!empty($twitter_username)){
                    echo '<li><a  href="http://twitter.com/'.$twitter_username.'"> <i class="icon-twitter"></i> </a></li>';
                }
                if(!empty($facebook_username)){
                    echo '<li><a  href="http://facebook.com/'.$facebook_username.'"> <i class="icon-facebook"></i> </a></li>';
                }
                if(!empty($ot_flickr_username)){
                    echo '<li><a href="http://flickr.com/people/'.$ot_flickr_username.'"> <i class="icon-flickr"></i> </a></li>';
                }
				if(!empty($youtube_username)){
                    echo '<li><a  title="Facebook" href="http://youtube.com/user/'.$youtube_username.'"> <i class="icon-youtube"></i> </a></li>';
                }
				if(!empty($vimeo_username)){
                    echo '<li><a href="http://vimeo.com/'.$vimeo_username.'"> <i class="icon-vimeo"></i> </a></li>';
                }
				if(!empty($tumblr_url)){
                    echo '<li><a  href="'.$tumblr_url.'"> <i class="icon-tumblr"></i> </a></li>';
                }
				if(!empty($googleplus_username)){
                    echo '<li><a href="https://plus.google.com/u/0/'.$googleplus_username.'"> <i class="icon-gplus"></i> </a></li>';
                }
				if(!empty($dribbble_username)){
                    echo '<li><a  href="http://dribbble.com/'.$dribbble_username.'"> <i class="icon-dribbble"></i> </a></li>';
                }
				if(!empty($linkedin_username)){
                    echo '<li><a  href="'.$linkedin_username.'"> <i class="icon-linkedin-1"></i> </a></li>';
                }
				if(!empty($pinterest_username)){
                    echo '<li><a  href="http://pinterest.com/'.$pinterest_username.'"> <i class="icon-pinterest-squared"></i> </a></li>';
                } 
				if(!empty($instagram_username)){
                    echo '<li><a href="http://instagram.com/'.$instagram_username.'"> <i class="icon-instagram"></i> </a></li>';
                }
				if(!empty($skype_username)){
                    echo '<li><a  href="'.$skype_username.'"> <i class="icon-skype-3"></i> </a></li>';
                }         
            echo '</ul>';
        echo '</div>';
        ?>

        <?php
        echo $after_widget;
    }

}

add_action('widgets_init', create_function('', 'return register_widget("socialinks");'));
?>