<?php if (ott_option('social_icons')) { ?>
<ul class="social_wrapper">
  <?php $ot_rss_url = ott_option('rss_url'); if(!empty($ot_rss_url)){?>
  <li><a class="ott-rss" title="Rss" href="<?php echo $ot_rss_url; ?>"> <i class="icon-rss shown"></i> <i class="icon-rss bottom"></i> </a></li>
  <?php }?>
  <?php $ot_twitter_username = ott_option('twitter_username'); if(!empty($ot_twitter_username)){?>
  <li><a class="ott-twitter"  title="Twitter" href="http://twitter.com/<?php echo $ot_twitter_username; ?>"> <i class="icon-twitter shown"></i> <i class="icon-twitter bottom"></i></a></li>
  <?php }?>
  <?php $ot_facebook_username = ott_option('facebook_username'); if(!empty($ot_facebook_username)){?>
  <li><a class="ott-facebook" title="Facebook" href="http://facebook.com/<?php echo $ot_facebook_username; ?>"> <i class="icon-facebook shown"></i> <i class="icon-facebook bottom"></i> </a></li>
  <?php }?>
  <?php $ot_flickr_username = ott_option('flickr_username'); if(!empty($ot_flickr_username)){ ?>
  <li><a class="ott-flickr" title="Flickr" href="http://flickr.com/people/<?php echo $ot_flickr_username; ?>"> <i class="icon-flickr-1 shown"></i> <i class="icon-flickr-1 bottom"></i> </a></li>
  <?php }?>
  <?php $ot_youtube_username = ott_option('youtube_username'); if(!empty($ot_youtube_username)){ ?>
  <li><a  class="ott-youtube" title="Youtube" href="http://youtube.com/user/<?php echo $ot_youtube_username; ?>"> <i class="icon-youtube shown"></i> <i class="icon-youtube bottom"></i></a></li>
  <?php }?>
  <?php 	$ot_vimeo_username = ott_option('vimeo_username'); 	if(!empty($ot_vimeo_username))	{?>
  <li><a class="ott-vimeo"  title="Vimeo" href="http://vimeo.com/<?php echo $ot_vimeo_username; ?>"> <i class="icon-vimeo"></i> </a></li>
  <?php 	}?>
  <?php $ot_tumblr_username = ott_option('tumblr_url');if(!empty($ot_tumblr_username))	{?>
  <li><a class="ott-tumblr" title="Tumblr" href="http://<?php echo $ot_tumblr_username; ?>.tumblr.com"> <i class="icon-tumblr"></i> </a></li>
  <?php 	}?>
  <?php $ot_google_username = ott_option('googleplus_username'); if(!empty($ot_google_username)){?>
  <li><a class="ott-google"  title="Google+" href="https://plus.google.com/u/0/<?php echo $ot_google_username; ?>"> <i class="icon-gplus"></i> </a></li>
  <?php	}	?>
  <?php $ot_dribbble_username = ott_option('dribbble_username'); if(!empty($ot_dribbble_username)){ ?>
  <li><a  class="ott-dribbble" title="Dribbble" href="http://dribbble.com/<?php echo $ot_dribbble_username; ?>"> <i class="icon-dribbble"></i> </a></li>
  <?php }	?>
  <?php $ot_linkedin_username = ott_option('linkedin_username');if(!empty($ot_linkedin_username))	{	?>
  <li><a class="ott-linked" title="Linkedin" href="<?php echo $ot_linkedin_username; ?>"> <i class="icon-linkedin-1"></i> </a></li>
  <?php }	?>
  <?php $ot_pinterest_username = ott_option('pinterest_username');	if(!empty($ot_pinterest_username)){		?>
  <li><a  class="ott-pinterest" title="Pinterest" href="http://pinterest.com/<?php echo $ot_pinterest_username; ?>" target="_blank"> <i class="icon-pinterest-squared"></i> </a></li>
  <?php }?>

  <?php $ot_instagram_username = ott_option('instagram_username'); if(!empty($ot_instagram_username)){?>
  <li><a  class="ott-instagram" title="Instagram" href="http://instagram.com/<?php echo $ot_instagram_username; ?>" target="_blank"> <i class="icon-instagram"></i> </a></li>
  <?php }?>

  <?php $ot_skype_link = ott_option('skype_username'); if(!empty($ot_skype_link)){?>
  <li><a  class="ott-skype"  title="skype" href="skype:<?php echo $ot_skype_link; ?>" target="_blank"> <i class="icon-skype-3"></i> </a></li>
  <?php }?>
</ul>
<?php } ?>