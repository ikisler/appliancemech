<?php get_header(); ?>
<?php the_post();
			$team_page_select = ott_option('team_page_select');
 ?>

<article id="post-<?php the_ID(); ?>" <?php post_class('single-team');?>>
  <div class="row">
    <div class="span4">
      <?php  global $post;   ?>
      <div class="frame">
        <?php single_team_image(370, 370,false); ?>
      </div>
    </div>
    <div class="span8">
      <div class="single-portfolio-inner">
        <div class="tm_title_single">
          <div class="ott-title-container">
            <div class="section-title-content">
            <?php $tm_position = get_metabox("position"); ?>
              <h3 class="ott-section-title">
                <?php the_title();?> <span class="team_postion"> - <?php echo $tm_position ;?> </span> <span class="section-line"></span>
              </h3>
</div>
            <div class="single_pagination pagination"> <span><i class="icon-left-open"></i>
              <?php previous_post_link('%link', ';', FALSE); ?>
              </span><?php if ($team_page_select !="") { ?> <span><a href="<?php echo $team_page_select ;?>"><i class="icon-th"></i></a></span><?php } ?> <span><i class="icon-right-open"></i>
              <?php next_post_link('%link', ';', FALSE); ?>
              </span> </div>
          </div>
        </div>
                      
              
        <?php the_content(); ?>
        <div class="member-social entry-meta">
          <div class="ott-social-icon">
            <?php
			  			$twitter_id =  get_metabox("twitter");
						$facebook_id = get_metabox("facebook");
						$google = get_metabox("google");
						$linkedin_URL = get_metabox("linkedin");
						$dribble_id = get_metabox("dribbble");

			  ?>
            <?php if ($facebook_id !="") { ?>
            <a href="http://facebook.com/<?php echo $facebook_id;?>" target="_blank" class="so-facebook"><span class="icon-facebook icon-in"></span></a>
            <?php } ?>
            <?php if ($google !="") { ?>
            <a href="<?php echo $google;?>" target="_blank" class="so-gplus"><span class="icon-gplus icon-in"></span></a>
            <?php } ?>
            <?php if ($twitter_id !="") { ?>
            <a href="http://twitter.com/<?php echo $twitter_id;?>" target="_blank" class="so-twitter"><span class="icon-twitter icon-in"></span></a>
            <?php } ?>
            <?php if ($linkedin_URL !="") { ?>
            <a href="<?php echo $linkedin_URL;?>" target="_blank" class="so-linkedin"><span class="icon-linkedin icon-in"></span></a>
            <?php } ?>
            <?php if ($dribble_id !="") { ?>
            <a href="http://dribbble.com/<?php echo $dribble_id;?>" target="_blank" class="so-dribbble"><span class="icon-dribbble-1 icon-in"></span></a>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</article>
<?php 
if(!ott_option('port_related')) {
    related_portfolios();
}?>
<?php get_footer(); ?>
