$(document).ready(function(e) {
	
	
	//-------Delete product---------------------------
	$(document).on("click",".delete_nt",function(){
		 	
			$productID = $(this).parent().attr("id");
			$product = $(this).parent();
				
			var dataToSend =[  
								  ["Table","new_items"],
								  ["Function","delete_nt"],
								  ["ProductID",$productID]								
						   ]					  
			var jsonString=JSON.stringify(dataToSend);
			$.ajax({
		         type:'POST',
				 url:'../php_library/dbSubmit.php',
				 data:{data: jsonString},
				 success : function(data) {
					
					$product.remove();	 
				 }
           });	
			
	     });	
		 
	  //---------Edit product--------------------------	 
	  $(document).on("click",".save_nt",function(){
		  	
		    $parent = $(this).parent();
			$productID = $(this).parent().attr("id");
			
			$url = $('input',$parent).eq(0).val();
			
			$product = $(this).parent();
			 	
			var dataToSend =[  
								  ["Table","new_items"],
								  ["Function","update_nt"],
								  ["ProductID",$productID],
								  ["Url",$url],
								 					
						   ]					  
			var jsonString=JSON.stringify(dataToSend);
			$.ajax({
				 type:'POST',
				 url:'../php_library/dbSubmit.php',
				 data:{data: jsonString},
				 success : function(data) {
					 
					alert("Item updated");
					 
					 
				 }
		   });	
		
	 });
	 
	
	
});
	
	
//----------------Add product-----------------------
function add_item(){
	
	$("#main_content").fadeOut(10);
	$("#add_item_content").fadeIn(10);
	
}
