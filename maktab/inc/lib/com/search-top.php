<div class="search-top-warp">
  <form  method="get"   action="<?php echo home_url(); ?>/">
    <input type="text" class="search-txt"  value="<?php echo __('enter search keyword','otouch');?>" onblur="if (this.value == ''){this.value = '<?php echo __('enter search keyword','otouch');?>'; }" onfocus="if (this.value == '<?php echo __('enter search keyword','otouch');?>') {this.value = ''; }"   name="s" id="s"/>
    <input type="submit" id="header_search_submit" value="search"/>
  </form>
</div>
