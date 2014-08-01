$(document).ready(function(){
	 $(function() {
                $('#ei-slider').eislideshow({
					easing		: 'easeOutExpo',
					titleeasing	: 'easeOutExpo',
					titlespeed	: 1200
                });
     });
/*	 
	$windowHeight=$(window).height(); 
	$headerHeight=$('#header').height();
	$footerHeight=$('#footer').height();
	$mainBodyHeight=$('#main_content_store').height(); 
	$fixedHeight=$windowHeight-$headerHeight-$footerHeight-31;
	
	//alert("window height: "+$windowHeight+"\n"+"document height: "+$bodyHeight);
	if($mainBodyHeight < $fixedHeight)
	   $('#main_content_store').height($fixedHeight);
	   
*/


});




function save_item (column) {
	
	
	value = $("#product"+column).val();
	sum_value = $("#prod"+column).val();
	
	tmp = value.split("?");
	tmp1 = tmp[1];
	tmp2 = tmp1.split("&");
	tmp3 = tmp2[0];
	tmp4 = tmp3.split("=");
	category = tmp4[1];		
	tmp4 = tmp2[1].split("=");
	product_id = tmp4[1];  
	
	//alert(category + "," + product_id);
	var dataToSend =[  
					  ["Table",category],
					  ["Function","save"],
					  ["ProductID",product_id],
					  ["Item",column]
									
				 	]	
					  
	var jsonString=JSON.stringify(dataToSend);
	$.ajax({
		 type:'POST',
		 url:'php_library/dbSubmit.php',
		 data:{data: jsonString},
		 success : function(data) {
				
				 $('#img'+column).attr('href','http://localhost/maison56/digital_store/digital_store_view.php?category='+category+'&id='+product_id);
				 $('#img'+column+' img').attr('src','products/'+category+'/'+product_id+'/0.jpg');
		
		 }
   });	
	
}
function save_sum(column) {
	
	sum_value = $("#prod"+column).val();
	var dataToSend =[  
					  ["Table","home"],
					  ["Function","save_sum"],
					  ["Item",column],
					  ["summary",sum_value]
					]	
					  
	var jsonString=JSON.stringify(dataToSend);
	$.ajax({
		 type:'POST',
		 url:'php_library/dbSubmit.php',
		 data:{data: jsonString},
		 success : function(data) {
				
				 if(data == "OK")
				 	$("#prod"+column).val(sum_value);
				else
					alert("There was an error,try again");	
			
		 }
   });	

}

