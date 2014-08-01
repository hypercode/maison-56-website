$(document).ready(function() {
	$("#main_content_s").load("fetch_pages.php", {'page':0}, function() {$("#1-page").addClass('active');});  //initial page number to load
	
	$(".paginate_click").click(function (e) {
		
		//$("#main_content_s").prepend('<div class="loading-indication"><img src="../../img/ajax-loader.gif" /> Loading...</div>');
		
		var clicked_id = $(this).attr("id").split("-"); //ID of clicked element, split() to get page number.
		var page_num = parseInt(clicked_id[0]); //clicked_id[0] holds the page number we need 
		
		$('.paginate_click').removeClass('active'); //remove any active class
		
        //post page number and load returned data into result element
        //notice (page_num-1), subtract 1 to get actual starting point
		$("#main_content_s").load("fetch_pages.php", {'page':(page_num-1)}, function(){

		});

		$(this).addClass('active'); //add active class to currently clicked element (style purpose)
		
		return false; //prevent going to herf link
	});	
});