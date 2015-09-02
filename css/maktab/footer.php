</div>
</section>
<!-- End Main -->
<!-- Start Footer -->

<footer id="footer">
  <?php if (ott_option("footer_widget")) { ?>
  
  <!-- Start Container-->
  <div class="ott-footer-widgets">
    <div class="container">
      <div class="row-fluid">
        <?php
                $grid = ott_option('footer_layout') ? ott_option('footer_layout') : '3-3-3-3';
                $i = 1;
                foreach (explode('-', $grid) as $g) {
                    echo '<div class="span' . $g . ' col-' . $i . '">';
                    dynamic_sidebar("footer-sidebar-$i");
                    echo '</div>';
                    $i++;
                }
                ?>
      </div>
    </div>
  </div>
  <!-- End Container -->
  
  <?php } ?>
  <!-- End Footer -->
  <?php if(ott_option('footer_bottom')) { ?>
  <div id="bottom" > 
    <!-- Start Container -->
    <div class="container">
      <div class="row-fluid">
        <?php if(ott_option('footer_contacts')) { ?>
        <div class="footer-contacts">
          <div class="span8">
            <h6>Contact Us</h6>
            <div class="bottom_contact"><span class="address"> <i class="icon-location-3"></i>
              <?php if (ott_option('map_adreess')) { ?>
              <?php echo ott_option('map_adreess') ?>
              <?php 	}?>
              </span> <span class="phone"> <i class="icon-phone"></i>
              <?php if (ott_option('contact_phone')) { ?>
              <?php echo ott_option('contact_phone') ?>
              <?php 	}?>
              </span> <span class="mail"><i class="icon-email"></i> <a href="mailto:<?php echo ott_option('ott_contact_email') ?>">
              <?php if (ott_option('ott_contact_email')) { ?>
              <?php echo ott_option('ott_contact_email') ?>
              <?php 	}?>
              </a></span></div>
          </div>
          <div class="span4">
            <h6>Stay Connected</h6>
            <?php   include(TEMPLATEPATH . '/inc/lib/com/social-bottom.php'); ?>
          </div>
        </div>
        <?php } ?>
      </div>
      <div class="row-fluid">
        <div class="span6">
          <div class="copyright">
            <p><?php echo stripslashes(ott_option('copyright_text')); ?></p>
          </div>

        </div>
        <div class="badkittyurl"><p>Website designed by <a href="http://www.badkittystudios.com" target="blank">Bad Kitty Studios</a></p></div>
        <div class="span6">
          <div class="ott-footer-menu">
            <?php footer_menu(); ?>
          </div>
        </div>
      </div>
    </div>
    
    <!-- End Container --> 
  </div>
  <?php } ?>
</footer>
<?php
global $ott_end;
echo $ott_end;
?>
<?php
/* Google Analytics Code */
echo stripslashes(ott_option('tracking_code'));

$gotop = __('Scroll to top', 'otouch');
echo '<a id="scrollUp" title="'.$gotop.'"><i class="icon-up-open-1"></i></a>';
?>
<?php wp_footer(); ?>
</body></html>