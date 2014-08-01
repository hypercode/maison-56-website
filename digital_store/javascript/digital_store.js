$(document).ready(function(e) {
	
	
	 //-------Delete product---------------------------
	 $(document).on("click",".delete",function(){
		 
			$productID=$(this).parent().attr("id");
			$category=$(this).parent().attr("class").split("_");
			$category=$category[0];
	
			$product=$(this).parent();
				
			var dataToSend =[  
								  ["Table",$category],
								  ["Function","delete"],
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
	  $(document).on("click",".save",function(){
		  	
		    $parent=$(this).parent();
			$productID=$(this).parent().attr("id");
			$category=$(this).parent().attr("class").split("_");
			$category=$category[0];
			
			/*$('input',$parent).each(function(index, element) {
            	    
            });*/
			
			$title = $('input',$parent).eq(0).val();
			$summary = $('input',$parent).eq(1).val();
			$price = $('input',$parent).eq(2).val();
			$sizes = $('input',$parent).eq(3).val();
			$product=$(this).parent();
			 	
			var dataToSend =[  
								  ["Table",$category],
								  ["Function","update"],
								  ["ProductID",$productID],
								  ["Title",$title],
								  ["Summary",$summary],
								  ["Price",$price],
								  ["Sizes",$sizes]					
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
	 
	
	 $("#show_products").click(function(){
		 
		$("#main_content").fadeIn(10);
		$("#add_item_content").fadeOut(10);
		
	});
	
	//-----------------------------------------------------
	
	$(".m_w").mouseover(function(){
		
		$productID=$(this).parent().attr("id");
		$category=$(this).parent().attr("class").split("_");
		$category=$category[0];
		
		$('a img',this).attr("src","../products/"+$category+"/"+$productID+"/1.jpg ");
		
		
		
		
	});
	
	$(".m_w").mouseout(function(){
		$productID=$(this).parent().attr("id");
		$category=$(this).parent().attr("class").split("_");
		$category=$category[0];
		
	    $('a img',this).attr("src","../products/"+$category+"/"+$productID+"/0.jpg ");	
		
	});
	
	
});
	
	
//----------------Add product-----------------------
function add_item(category){
	
	$("#main_content").fadeOut(10);
	$("#add_item_content").fadeIn(10);
	$category = category;		// store the category to the hidden input
	$("#category").val($category);
	
	
	
}
