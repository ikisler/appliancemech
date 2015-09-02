<?php
class contactinfo extends WP_Widget {

    function contactinfo() {
        $widget_ops = array(
            'classname' => 'flickr_widget',
            'description' => 'Contact info.'
        );
        $control_ops = array('width' => 80, 'height' => 80);
        parent::WP_Widget(false, 'OTT contact info', $widget_ops, $control_ops);
    }

    function form($instance) {
        $instance = wp_parse_args((array) $instance, array('contact_title' => ''));
        $contact_msg = isset($instance['contact_msg']) ? strip_tags($instance['contact_msg']) : '';
		$contact_title = isset($instance['contact_title']) ? strip_tags($instance['contact_title']) : '';
        $contact_address = isset($instance['contact_address']) ? strip_tags($instance['contact_address']) : '';
        $contact_address = isset($instance['contact_address_line2']) ? strip_tags($instance['contact_address_line2']) : '';

        $contact_phone = isset($instance['contact_phone']) ? strip_tags($instance['contact_phone']) : '';
        $contact_email_url = isset($instance['contact_email_url']) ? strip_tags($instance['contact_email_url']) : '';
        $contact_web_url = isset($instance['contact_web_url']) ? strip_tags($instance['contact_web_url']) : '';
        $contact_facebook_url = isset($instance['contact_facebook_url']) ? strip_tags($instance['contact_facebook_url']) : '';
        $contact_linked_url = isset($instance['contact_linked_url']) ? strip_tags($instance['contact_linked_url']) : '';
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('contact_title'); ?>"><?php _e('Title:', 'otouch'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('contact_title'); ?>" name="<?php echo $this->get_field_name('contact_title'); ?>" type="text" value="<?php echo esc_attr($contact_title); ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('contact_msg'); ?>"><?php _e('Message:', 'otouch'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('contact_msg'); ?>" name="<?php echo $this->get_field_name('contact_msg'); ?>" type="text" value="<?php echo esc_attr($contact_msg); ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('contact_address'); ?>"><?php _e('Address:', 'otouch'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('contact_address'); ?>" name="<?php echo $this->get_field_name('contact_address'); ?>" type="text" value="<?php echo esc_attr($contact_address); ?>" />
        </p>
          <p>
            <label for="<?php echo $this->get_field_id('contact_address_line2'); ?>"><?php _e('Address line2:', 'otouch'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('contact_address_line2'); ?>" name="<?php echo $this->get_field_name('contact_address_line2'); ?>" type="text" value="<?php echo esc_attr($contact_address_line2); ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('contact_phone'); ?>"><?php _e('Phone number:', 'otouch'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('contact_phone'); ?>" name="<?php echo $this->get_field_name('contact_phone'); ?>" type="text" value="<?php echo esc_attr($contact_phone); ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('contact_email_url'); ?>"><?php _e('Email:', 'otouch'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('contact_email_url'); ?>" name="<?php echo $this->get_field_name('contact_email_url'); ?>" type="text" value="<?php echo esc_attr($contact_email_url); ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('contact_web_url'); ?>"><?php _e('Web:', 'otouch'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('contact_web_url'); ?>" name="<?php echo $this->get_field_name('contact_web_url'); ?>" type="text" value="<?php echo esc_attr($contact_web_url); ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('contact_web_url'); ?>"><?php _e('Web link url:', 'otouch'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('contact_web_url'); ?>" name="<?php echo $this->get_field_name('contact_web_url'); ?>" type="text" value="<?php echo esc_attr($contact_web_url); ?>" />
        </p>
        <?php
    }

    function update($new_instance, $old_instance) {
        $instance = $old_instance;
		$instance['contact_msg'] = strip_tags($new_instance['contact_msg']);
        $instance['contact_title'] = strip_tags($new_instance['contact_title']);
        $instance['contact_address'] = strip_tags($new_instance['contact_address']);
        $instance['contact_address_line2'] = strip_tags($new_instance['contact_address_line2']);	
        $instance['contact_phone'] = strip_tags($new_instance['contact_phone']);
        $instance['contact_email_url'] = strip_tags($new_instance['contact_email_url']);
        $instance['contact_web_url'] = strip_tags($new_instance['contact_web_url']);

        return $instance;
    }

    function widget($args, $instance) {
        extract($args);
		 $contact_msg = apply_filters('widget_contact_msg', empty($instance['contact_msg']) ? '' : $instance['contact_msg'], $instance);
        $contact_title = apply_filters('widget_contact_title', empty($instance['contact_title']) ? '' : $instance['contact_title'], $instance);
        $contact_address = apply_filters('widget_contact_address', empty($instance['contact_address']) ? '' : $instance['contact_address'], $instance);
        $contact_address_line2 = apply_filters('contact_address_line2', empty($instance['contact_address_line2']) ? '' : $instance['contact_address_line2'], $instance);		
        $contact_phone = apply_filters('widget_contact_phone', empty($instance['contact_phone']) ? '' : $instance['contact_phone'], $instance);
        $contact_email_url = apply_filters('widget_contact_email_url', empty($instance['contact_email_url']) ? '' : $instance['contact_email_url'], $instance);
        $contact_web_url = apply_filters('widget_contact_web_url', empty($instance['contact_web_url']) ? '' : $instance['contact_web_url'], $instance);
	
        $class = apply_filters('widget_class', empty($instance['class']) ? '' : $instance['class'], $instance);

        echo $before_widget;

        $contact_title = $contact_title;
        
        if (!empty($contact_title)) {
            echo $before_title . $contact_title . $after_title;
        }
        echo '<div class="contact-info-widget">';
            echo '<ul>';
				if(!empty($contact_msg)){
                    echo '<li class="contact_msg"><div>'.$contact_msg.'</div></li>';
                }
                if(!empty($contact_address)){
                    echo '<li><i class="icon-map-1"></i><div>'.$contact_address.'</br>'.$contact_address_line2.'</div></li>';
                }
  
                if(!empty($contact_phone)){
                    echo '<li><i class="icon-phone"></i><div>'.$contact_phone.'</div></li>';
                }
				if(!empty($contact_email_url)){
                    echo '<li><i class="icon-mail-alt"></i><div><a target="_blank" href="mailto:'.  $contact_email_url.'">'.$contact_email_url.'</a></div></li>';
                }
				 if(!empty($contact_web_url)){
                    echo '<li><i class="icon-globe"></i><div><a target="_blank" href="'.  $contact_web_url.'">'.$contact_web_url.'</a></div></li>';
                }
            
            echo '</ul>';
        echo '</div>';
        ?>

        <?php
        echo $after_widget;
    }

}

add_action('widgets_init', create_function('', 'return register_widget("contactinfo");'));
?>