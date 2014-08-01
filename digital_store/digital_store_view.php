<?php
  session_start();
  include("../php_library/dbConnect.php");
  include("../php_library/dbSubmit.php");
 
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="../css/menu.css" />
<link rel="stylesheet" type="text/css" href="../css/common.css" />
<link rel="stylesheet" type="text/css" href="css/digital_store_view.css" />

<link rel="stylesheet" type="text/css" href="css/jquery.jqzoom.css"> 


<script src="javascript/jquery-1.6.js" type="text/javascript"></script>
<script type="text/javascript" src="javascript/jquery.jqzoom-core.js"></script> 
<script type="text/javascript" src="javascript/digital_store_view.js"></script>
<script type="text/javascript"src="javascript/jquery.bpopup-x.x.x.min.js"></script>

<title>Digital Store</title>
</head>

<body>
<?php include '../php_library/header.php'; ?>

<?php 
$category = $_GET['category'];
$productID = $_GET['id'];

$sql = "select * from ".$category." where ID='".$productID."'";
$result = mysql_query ($sql);
$row = mysql_fetch_array($result);
$imgs = $row['images'];
echo '<div id="vertical_menu1"> 
      
       <ul>
            
            <li><a class="vertical_drop" href="/maison56/digital_store/digital_store.php?category=jackets">Jackets </a></li>
            <li><a class="vertical_drop" href="/maison56/digital_store/digital_store.php?category=dresses">Dresses </a></li>
            <li><a class="vertical_drop"href="/maison56/digital_store/digital_store.php?category=topwear">Topwear</a></li>
            <li><a class="vertical_drop"href="/maison56/digital_store/digital_store.php?category=trowsers">Trowsers</a></li>
            <li><a class="vertical_drop"href="/maison56/digital_store/digital_store.php?category=skirts">Skirts</a></li>
            </li>
            <li><a class="vertical_drop" href="/maison56/digital_store/digital_store.php?category=shoes">Shoes</a></li>
            <li><a class="vertical_drop" href="/maison56/digital_store/digital_store.php?category=bags">Bags</a></li>
            <li><a class="vertical_drop" href="/maison56/digital_store/digital_store.php?category=accessories">Accessories</a></li>
            <li><a class="vertical_drop" href="/maison56/digital_store/digital_store.php?category=swimmwear">Swimwear</a></li>
            
        </ul>
           
 </div>';
echo '<div id="main_content"> 
		 
	  	<div id="left_div"> 
	  		<div id="all_product_images">
				<ul id="thumblist" > '; 
				if ($imgs > 1) {
					
					for ($i=0; $i<$imgs; $i++) {
					
					echo '<li><a  href="javascript:void(0);" rel="{gallery: \'gal1\', smallimage: \'../products/'.$category.'/'.$productID.'/thumb/'.$i.'.jpg\',largeimage: \'../products/'.$category.'/'.$productID.'/'.$i.'.jpg\'}"> <img src="../products/'.$category.'/'.$productID.'/thumb/'.$i.'.jpg"> </a></li>';
				}
				
				
				}
				
		 echo '</ul>	
			</div>
			<div id="selected_image">
				 <a href="../products/'.$category.'/'.$productID.'/0.jpg " class="jqzoom" rel="gal1">
					<img src="../products/'.$category.'/'.$productID.'/thumb/0.jpg"  style="border: 1px solid #A5A5A5;" ">
				</a>
			</div>
		
	  	</div>
		<div id="right_div"> 
		
			<div id="basic_information"> 
				<h1>  '.$row['title'].' </h1>';
				if ($row['price']==TRUE)
				echo '<p> EUR '.$row['price'].'</p>';
   echo	   '</div>';
			$code = substr($category, 0, 3);
echo       '<div id="all_buttons">
				<div id="buttons"> 
					<button style = "color:black;" class="btn" id="summary" > Περιγραφή </button> <span> | </span>
					<button class="btn" id="buy"> Εκδήλωση Ενδιαφέροντος</button>
				</div>
				<button class="submit_button" id="my-button"> Τηλεφωνική παραγγελία </button>
			</div>
			<div id="element_to_pop_up">
				<a class="b-close">x<a/>
				<div id="call_div_content"> 
					<h4 style="text-align:center;"> Τηλεφωνική Παραγγελία</h4>
					<div id="call_div_detalis"> 
						<div id="item_img"> 
							<a href="/maison56/digital_store/digital_store_view.php?category='.$category.'&id='.$row[0].'">
								<img class ="prod_img" src="../products/'.$category.'/'.$row['ID'].'/thumb/0.jpg" alt="photo"  /> 
							</a>
						</div>
						<div id="item_img_1"> 
							<div id="product_info">
							<h4 class="info"> '.$row['title'].'</h4>
							<div id="summ"><h5 class="info"> '.$row['summary'].'</h5></div>
							<p class="info2"> EUR '.$row['price'].'</p>
							<p style="bottom:0;float:bottom;">ΤΗΛΕΦΩΝΟ: 241 041 0902 </p>
						 </div>
						 <div id="hours"> 
							 <h5 style="margin-bottom:12px;text-align:center;"> ΩΡΑΡΙΟ ΚΑΤΑΣΤΗΜΑΤΟΣ</h5>
							 <p> ΔΕΥΤΕΡΑ-ΤΕΤΑΡΤΗ: 09:30 - 14:30 , 17:00 - 21:00</p>
							 <p> ΤΡΙΤΗ-ΠΕΜΠΤΗ: 09:30 - 15:00</p>
							 <p> ΠΑΡΑΣΚΕΥΤΗ: 09:30 - 14:30 , 17:00 - 21:000</p>
							 <p> ΣΑΒΒΑΤΟ: 09:30 - 15:30</p>
						 </div>
						</div>
						
					</div>
					
				</div>
			</div>
			
		
			<div id="information">
				<div id="summary_div"> 
					
					<p> '.$row['summary'].'</p>	
					
				</div>
				<div id="buy_product_div">
					<form method="post" action="../php_library/buy_product.php">
						 <table id="buy_product_table" width="450px" >
							</tr>
							<tr>
							 <td valign="top">
							  <label for="size">Size </label>
							 </td>
							 <td valign="top">
							  
							  <select class="size_select" name="size"> ';
							  $prices = explode(",", $row['sizes']);
							  
							  for($i=0; $i<count($prices); $i++) {
						 	echo '<option > '.$prices[$i].' </option>';
							  }  
							  
							echo    '</select>
							
							 </td>
							
							</tr>
							<tr>
							 
							 <td valign="top">
							  <label for="name">Ονοματεπώυμο </label>
							 </td>
							 <td valign="top">
							  <input class="input_text" type="text" name="name" maxlength="50" size="30">
							 </td>
							</tr>
							<tr>
							 <td valign="top">
							  <label for="telephone">Τηλέφωνο</label>
							 </td>
							 <td valign="top">
							  <input class="input_text" type="text" name="telephone" maxlength="30" size="30">
							 </td>
							</tr>
							<tr>
							 <td valign="top">
							  <label for="address">Διεύθυνση</label>
							 </td>
							 <td valign="top">
							  <input class="input_text" type="text" name="address" maxlength="30" size="30">
							 </td>
							</tr>
							<tr>
							 <td valign="top">
							  <label for="city">Πόλη</label>
							 </td>
							 <td valign="top">
							  <input class="input_text" type="text" name="city" maxlength="30" size="30">
							 </td>
							</tr>
							<tr>
							 <td valign="top">
							  <label for="address_code">Τ.Κ</label>
							 </td>
							 <td valign="top">
							  <input class="input_text" type="text" name="address_code" maxlength="30" size="30">
							 </td>
							</tr>
							<tr>
							 <td valign="top">
							  <label for="comments">Σχόλια </label>
							 </td>
							 <td valign="top">
							  <textarea  name="comments" maxlength="1000" cols="25" rows="6">Γράψτε εδώ τα σχόλιά σας...</textarea>
							 </td>
							
							</tr>
							<tr >
							 <td colspan="2" style="text-align:center;" >
							  
							  <button class = "submit_button" type="submit" > Αγορά </button> 
							 </td>
							</tr>
							</table>
							<input id="product_category" name="product_category"  type="hidden" value="'.$category.'"/>
							<input id="product_id" name="product_id"   type="hidden" value="'.$productID.'"/>
						 
					</form> 
				</div>
			</div>
		</div>
</div> ';
		
		
?>

<?php include '../php_library/footer.php'; ?>
<!--<h6 style="text-transform:uppercase;"> ITEM CODE: '.p.$code.$productID.'</h6>-->
</body>
</html>