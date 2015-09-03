<?php
class whyWidget extends WP_Widget {

    function whyWidget() {
        $widget_ops = array(
            'classname' => 'whyWidget',
            'description' => 'Why Us.'
        );
        $control_ops = array('width' => 80, 'height' => 80);
        parent::WP_Widget(false, 'OTT Why Us', $widget_ops, $control_ops);
    }

    function form($instance) {
        $instance = wp_parse_args((array) $instance, array('why_title' => ''));
		$why_title = isset($instance['why_title']) ? strip_tags($instance['why_title']) : '';


        $why_line1 = isset($instance['why_line1']) ? strip_tags($instance['why_line1']) : '';
        $why_line2 = isset($instance['why_line2']) ? strip_tags($instance['why_line2']) : '';
        $why_line3 = isset($instance['why_line3']) ? strip_tags($instance['why_line3']) : '';
        $why_line4 = isset($instance['why_line4']) ? strip_tags($instance['why_line4']) : '';
        $why_line5 = isset($instance['why_line5']) ? strip_tags($instance['why_line5']) : '';

        ?>
        <p>
            <label for="<?php echo $this->get_field_id('why_title'); ?>"><?php _e('Title:', 'otouch'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('why_title'); ?>" name="<?php echo $this->get_field_name('why_title'); ?>" type="text" value="<?php echo esc_attr($why_title); ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('why_line1'); ?>"><?php _e('Why Us Line 1:', 'otouch'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('why_line1'); ?>" name="<?php echo $this->get_field_name('why_line1'); ?>" type="text" value="<?php echo esc_attr($why_line1); ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('why_line2'); ?>"><?php _e('Why Us Line 2:', 'otouch'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('why_line2'); ?>" name="<?php echo $this->get_field_name('why_line2'); ?>" type="text" value="<?php echo esc_attr($why_line2); ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('why_line3'); ?>"><?php _e('Why Us Line 3:', 'otouch'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('why_line3'); ?>" name="<?php echo $this->get_field_name('why_line3'); ?>" type="text" value="<?php echo esc_attr($why_line3); ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('why_line4'); ?>"><?php _e('Why Us Line 4 :', 'otouch'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('why_line4'); ?>" name="<?php echo $this->get_field_name('why_line4'); ?>" type="text" value="<?php echo esc_attr($why_line4); ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('why_line5'); ?>"><?php _e('Why Us Line 5 :', 'otouch'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('why_line5'); ?>" name="<?php echo $this->get_field_name('why_line5'); ?>" type="text" value="<?php echo esc_attr($why_line5); ?>" />
        </p>

        <?php
    }

    function update($new_instance, $old_instance) {
        $instance = $old_instance;
		$instance['why_line1'] = strip_tags($new_instance['why_line1']);
        $instance['why_title'] = strip_tags($new_instance['why_title']);
        $instance['why_line2'] = strip_tags($new_instance['why_line2']);
        $instance['why_line3'] = strip_tags($new_instance['why_line3']);
        $instance['why_line4'] = strip_tags($new_instance['why_line4']);
        $instance['why_line5'] = strip_tags($new_instance['why_line5']);

        return $instance;
    }

    function widget($args, $instance) {
        extract($args);
		 $why_title = apply_filters('widget_why_title', empty($instance['why_title']) ? '' : $instance['why_title'], $instance);
        $why_line1 = apply_filters('widget_why_line1', empty($instance['why_line1']) ? '' : $instance['why_line1'], $instance);
        $why_line2 = apply_filters('widget_why_line2', empty($instance['why_line2']) ? '' : $instance['why_line2'], $instance);
        $why_line3 = apply_filters('widget_why_line3', empty($instance['why_line3']) ? '' : $instance['why_line3'], $instance);
        $why_line4 = apply_filters('widget_why_line4', empty($instance['why_line4']) ? '' : $instance['why_line4'], $instance);
        $why_line5 = apply_filters('widget_why_line5', empty($instance['why_line5']) ? '' : $instance['why_line5'], $instance);
	
        $class = apply_filters('widget_class', empty($instance['class']) ? '' : $instance['class'], $instance);

        echo $before_widget;

        $why_title = $why_title;
        
        if (!empty($why_title)) {
            echo $before_title . $why_title . $after_title;
        }
        echo ' <div class="whyus">';
            echo '<ul>';
				if(!empty($why_line1)){
                    echo '<li class="contact_msg"><span>'.$why_line1.'</span></li>';
                }
                if(!empty($why_line2)){
                    echo '<li><span>'.$why_line2.'</span></li>';
                }
                if(!empty($why_line3)){
                    echo '<li><span>'.$why_line3.'</span></span>';
                }
                if(!empty($why_line4)){
                    echo '<li><span>'.$why_line4.'</span></li>';
                }
				if(!empty($why_line5)){
                    echo '<li><span>'.$why_line5.'</span></li>';
                }
				 if(!empty($contact_web_url)){
                    echo '<li><span>'.$contact_web_url.'</span></li>';
                }
            
            echo '</ul>';
        echo '</div>';
        ?>

        <?php
        echo $after_widget;
    }

}

add_action('widgets_init', create_function('', 'return register_widget("whyWidget");'));
?>