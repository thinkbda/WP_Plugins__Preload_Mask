(function($){
	
	$(document).ready(function(){
		
		$('div.bda-preload-mask').height($(document).outerHeight(true));
		
	});
	
	$(window).load(function(){
		
		$('div.bda-preload-mask').delay(200).fadeOut(500,function(){
			$(this).remove();
		});
		
	});
	
})(jQuery);
