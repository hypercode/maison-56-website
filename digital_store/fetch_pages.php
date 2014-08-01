<?php
session_start();
include("../php_library/dbConnect.php");



//sanitize post value
$page_number = filter_var($_POST["page"], FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH);

$isAdmin=isset($_SESSION['admin']);

//validate page number is really numaric
if(!is_numeric($page_number)){die('Invalid page number!');}
$item_per_page = 6;
//get current starting point of records
$position = ($page_number * $item_per_page);

//Limit our results within a specified range. 
$results = mysql_query("SELECT * FROM new_items ORDER BY time desc LIMIT $position, $item_per_page");

//output results from database
echo '<ul class="page_result">';
while($row = mysql_fetch_array($results)) {
	 if($isAdmin) {
		 echo  '<div class="item_box_edit" id="'.$row['ID'].'"> 
		 		
				<a href="'.$row['url'].'">
					<img class ="prod_img" src="new_items_images/'.$row['ID'].'/'.$row['ID'].'.jpg" alt="photo"  /> 
				</a>
				<label>URL: </label><input class="info" size="50" value="'.$row['url'].'"/> </br>
				<button class="delete_nt submit_button">Delete</button>
				<button class="save_nt submit_button">Update</button>';
				
				
	 }
	 else {
		 echo  '<div class="item_box" id="'.$row['ID'].'"> 
				<a href="'.$row['url'].'">
					<img class ="prod_img" src="new_items_images/'.$row['ID'].'/'.$row['ID'].'.jpg" alt="photo"  /> 
				</a>'; 
	 }
	    echo '</div>';			   	 
	
	
}
echo '</ul>';

?>

