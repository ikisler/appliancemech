<?php

class ott_Widget_Advertising_300_250 extends WP_Widget {
	
	function ott_Widget_Advertising_300_250() {
		
		$widget_ops = array('classname' => 'widget_advertising_300_250', 'description' => __('Displays your 300 x 250 ads', 'otouch'));	
		$this -> WP_Widget('ott-advertising-300-250', __('OTT Advertising 300 x 250', 'otouch'), $widget_ops);
		
	}
	
	function widget($args, $instance) {
		
		extract($args);
		
		$title = apply_filters('widget_title', $instance['title']);
		
		if (empty($title)) $title = false;
		
		$number = absint($instance['number']);
		
		$instance_ad_title = array();
		$instance_ad_image = array();
		$instance_ad_link = array();
		
		for ($i = 1; $i <= $number; $i++) {
			
			$ad_title = 'ad_'.$i.'_title';
			$instance_ad_title[$i] = isset($instance[$ad_title]) ? $instance[$ad_title] : '';
			$ad_image = 'ad_'.$i.'_image';
			$instance_ad_image[$i] = isset($instance[$ad_image]) ? $instance[$ad_image] : '';
			$ad_link = 'ad_'.$i.'_link';
			$instance_ad_link[$i] = isset($instance[$ad_link]) ? $instance[$ad_link] : '';
			
		}
		
		echo '<!-- pk start pk-advertising-300-250 widget -->
'.$before_widget.'
	';
		
		if ($title) {
			
			echo $before_title;
			echo $title;
			echo $after_title;
			
		}
?>

<?php for ($i = 1; $i <= $number; $i++) : ?>
	<a href="<?php echo $instance_ad_link[$i]; ?>" title="<?php echo $instance_ad_title[$i]; ?>"><img src="<?php echo $instance_ad_image[$i]; ?>" alt="<?php echo $instance_ad_title[$i]; ?>" style="width:100%;" /></a>
<?php endfor; ?>
<?php

		echo $after_widget.'
<!-- pk end pk-advertising-300-250 widget -->

';
		
	}
	
	function update($new_instance, $old_instance) {
		
		$instance = $old_instance;
		
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['number'] = $new_instance['number'];
		
		for ($i = 1; $i <= absint($instance['number']); $i++) {
			
			$instance['ad_'.$i.'_title'] = strip_tags($new_instance['ad_'.$i.'_title']);
			$instance['ad_'.$i.'_image'] = strip_tags($new_instance['ad_'.$i.'_image']);
			$instance['ad_'.$i.'_link'] = strip_tags($new_instance['ad_'.$i.'_link']);
			
		}
		
		return $instance;
		
	}
	
	function form($instance) {
		
		$title = isset($instance['title']) ? esc_attr($instance['title']) : '';
		$number = isset($instance['number']) ? absint($instance['number']) : 1;
		
		$instance_ad_title = array();
		$instance_ad_image = array();
		$instance_ad_link = array();
		
		for ($i = 1; $i <= $number; $i++) {
			
			$ad_title = 'ad_'.$i.'_title';
			$instance_ad_title[$i] = isset($instance[$ad_title]) ? $instance[$ad_title] : '';
			$ad_image = 'ad_'.$i.'_image';
			$instance_ad_image[$i] = isset($instance[$ad_image]) ? esc_attr($instance[$ad_image]) : '';
			$ad_link = 'ad_'.$i.'_link';
			$instance_ad_link[$i] = isset($instance[$ad_link]) ? esc_attr($instance[$ad_link]) : '';
			
		}
?>
		<p><label for="<?php echo $this -> get_field_id('title'); ?>"><?php _e('Title:', 'otouch'); ?></label>
		<input class="widefat" id="<?php echo $this -> get_field_id('title'); ?>" name="<?php echo $this -> get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></p>
		
		<p><label for="<?php echo $this -> get_field_id('number'); ?>"><?php _e('Number of ads to show:', 'otouch'); ?></label>
		<input class="widefat" id="<?php echo $this -> get_field_id('number'); ?>" name="<?php echo $this -> get_field_name('number'); ?>" type="text" value="<?php echo $number; ?>" /></p>
		
		<div>
<?php for ($i = 1; $i <= $number; $i++) : $ad_title = 'ad_'.$i.'_title'; $ad_image = 'ad_'.$i.'_image'; $ad_link = 'ad_'.$i.'_link'; ?>
			<div>
				<p><strong><?php _e('Advertise', 'otouch'); ?> <?php echo $i; ?>:</strong></p>
				<p><label for="<?php echo $this -> get_field_id($ad_title); ?>"><?php _e('Title:', 'otouch'); ?></label>
				<input class="widefat" id="<?php echo $this -> get_field_id($ad_title); ?>" name="<?php echo $this -> get_field_name($ad_title); ?>" type="text" value="<?php echo $instance_ad_title[$i]; ?>" /></p>
				<p><label for="<?php echo $this -> get_field_id($ad_image); ?>"><?php _e('Image URL:', 'otouch'); ?></label>
				<input class="widefat" id="<?php echo $this -> get_field_id($ad_image); ?>" name="<?php echo $this -> get_field_name($ad_image); ?>" type="text" value="<?php echo $instance_ad_image[$i]; ?>" /></p>
				<p><label for="<?php echo $this -> get_field_id($ad_link); ?>"><?php _e('Link:', 'otouch'); ?></label>
				<input class="widefat" id="<?php echo $this -> get_field_id($ad_link); ?>" name="<?php echo $this -> get_field_name($ad_link); ?>" type="text" value="<?php echo $instance_ad_link[$i]; ?>" /></p>
			</div>
<?php endfor;?>
		</div>
<?php
	}
	
}

function ott_Widget_Advertising_300_250() {
	
	register_widget('ott_Widget_Advertising_300_250');
	
}

add_action('widgets_init', 'ott_Widget_Advertising_300_250');

?>