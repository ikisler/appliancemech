jQuery(function($){
	$(document).ready(function(){
		
 
 $(function() {

    $('#top_panel').css({ marginTop: -40 });

    // if hello contents are enabled
    if($('#panel').length != 0) {
      $('#top_panel').css({'margin': '0'});
      
      if($.cookie("hellobar") === 'closed') {
        $('#top_panel').css({ marginTop: -40 });
        $('#top_panel .open').css({ marginTop: 110 });
      }
      
      $('#top_panel .close').live('click', function(event){
        event.preventDefault();
        $('#top_panel').animate({ marginTop: -40 }, 600, 'easeOutBounce');
        $('#top_panel .open').animate({ marginTop: 110 }, 600, 'linear');

        $.cookie("hellobar", "closed", { path: '/', expires: 14 });
      });

      $('#top_panel .open').live('click', function(event){
        event.preventDefault();
        $('#top_panel').animate({ marginTop: 0 }, 600, 'easeOutBounce');
        $('#top_panel .open').css({ marginTop: -50 }, 600, 'linear');

        $.cookie("hellobar", "open", { path: '/', expires: 14 });
      });
    }
    
  });
 
         $('#top_panel .open').delay(400).slideDown("slow");


	}); // END doc ready
}); // END function