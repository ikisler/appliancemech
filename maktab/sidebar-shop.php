<div class="span3 sidebar-container">
<section id="sidebar">
      <?php if ( !function_exists('dynamic_sidebar')

						|| !dynamic_sidebar("Shop Sidebar") ) : ?>
      <?php echo "<div class='section_title clearfix'>	<h5 >No Widget found</h5> </div>
									<div class='footertext'>
									Please Add a Footer widget.
									</div>"; ?>
      <?php endif; ?>

</section>
</div>