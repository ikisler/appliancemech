<?php if (ott_option('social_bar')) { ?>

<div class="top-page-sec visible-desktop 	">
  <div class="row-fluid">
    <div class="container">
      <div class="span12">
        <div class="span8">
          <div class="top-left">
            <?php if (ott_option('tp_langs')) { ?>
            <?php echo ott_langs_links() ?>
            <?php 	}?>
            <?php   include(TEMPLATEPATH . '/inc/lib/com/social-header.php'); ?>
          </div>
        </div>
        <div class="span4">
          <div class="top-right">
            <?php if (ott_option('tp_menu')) { ?>
            <?php echo ott_top_links() ?>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php } ?>
