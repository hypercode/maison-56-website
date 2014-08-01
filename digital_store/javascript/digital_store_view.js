$(document).ready(function(e) {
	
	
	$("#summary").click(function(){
			
	    $("#buy_product_div").fadeOut(100);
		$("#summary_div").fadeIn(1500);	
				
	});
	
	$("#buy").click(function(){
			
		$("#summary_div").fadeOut(100);	
		$("#buy_product_div").fadeIn(1500);		
	});
	
	$('.jqzoom').jqzoom({
            zoomType: 'standard',
            lens:true,
            preloadImages: false,
            alwaysOn:false
     });
	 
	$("#summary").click(function(){
		$(this).css({"color":"black"});
		$("#buy").css({"color":"#A5A5A5"});
	});
	
	$("#buy").click(function(){
		$(this).css({"color":"black"});
		$("#summary").css({"color":"#A5A5A5"});
	});
	
	
});

