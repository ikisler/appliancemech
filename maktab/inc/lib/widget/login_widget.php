<?php 
//**  Text  Widgets */
class LoginWidget extends WP_Widget
{
    function LoginWidget(){
		$widget_ops = array('description' => 'Custom Login Widget');
		parent::WP_Widget(false,$name='OTT Login',$widget_ops);
    }

  /* Front-end */
	    function widget($args, $instance){
		extract($args);
		$title = apply_filters('widget_title', empty($instance['title']) ? 'Adsense' : $instance['title']);

		echo $before_widget;

		if ( $title )
		echo $before_title . $title . $after_title;
?>
<?php
	global $user_identity, $user_level;
	$user_login = '';
	$redirect = $_SERVER['REQUEST_URI'];
	if ( is_user_logged_in() ) { ?>

<div class="log_wrapper">
<div class="logged">
  <?php esc_html_e('Welcome', 'otouch'); ?>
  <strong><?php echo $user_identity; ?></strong>.
 </div>
 <div class="login_ctl">
<?php wp_register(); ?>
<div class="logout"><a href="<?php echo esc_url( wp_logout_url( $redirect ) ); ?>">
  <?php esc_attr_e('Logout', 'otouch'); ?>
  </a></div></div></div>

<?php } else { ?>
<div class="loginDiv">
  <form action="<?php echo home_url(); ?>/wp-login.php" method="post">
    <fieldset class="inputset">
    <input type="text" name="log" id="log" value="<?php echo __('User Name','otouch') ?>" size="20" />
    </fieldset>
    <fieldset class="inputset">
    <input type="password" name="pwd" id="pwd" size="20"  value="<?php echo __('Password','otouch') ?>"  />
    </fieldset>
    <fieldset>
    </label>
	<div class="links">
	   	<span> <input type="submit" class="tmbutton small" name="submit" value="<?php echo __('Login', 'otouch'); ?>" /></span>
   </div>
    </fieldset>
    <fieldset>
    <input type="hidden" name="redirect_to" value="<?php echo esc_url( $redirect ); ?>"/>
    </fieldset>
  </form>
  
</div>
<?php } 
            
echo $after_widget; 
            
    }

/*Save*/
    function update($new_instance, $old_instance){
		$instance = $old_instance;
		$instance['title'] = stripslashes($new_instance['title']);

		return $instance;
	}

/* Back End. */
    function form($instance){
		//Defaults
		$instance = wp_parse_args( (array) $instance, array('title'=>'Login Widget') );
		$title = htmlspecialchars($instance['title']);

		# Title
		echo '<p><label for="' . $this->get_field_id('title') . '">' . 'Title:' . '</label><input class="widefat" id="' . $this->get_field_id('title') . '" name="' . $this->get_field_name('title') . '" type="text" value="' . $title . '" /></p>';
	
	
	}

}
// register ArchiveWidget
add_action('widgets_init', create_function('', 'return register_widget("LoginWidget");'));

?>