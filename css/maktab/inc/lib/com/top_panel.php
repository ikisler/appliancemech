<div id="top_panel">
  <!-- optional top bar content. remove #hello with contents to disable the hello bar and its functionality -->
  <!-- #hello BEGIN -->
        <?php
			$top_msg = ott_option('toll_free');
			
		?>

  <div id="panel">
    <div class="container">
    	<p><span><?php echo ($top_msg) ? stripslashes($top_msg) : " SALES : 1-887-932-7111 - onethouchtheme@gmail.com ";?></span> </p>

				

    <a href="#" class="close"><i class="icon-cancel-4"></i></a> <a href="#" class="open"><i class="icon-angle-double-down"></i></a>
    <!-- #hello_bar END -->
    </div>
  </div>
  <!-- #hello_bar END -->
</div>
