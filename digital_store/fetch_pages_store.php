<?php
session_start();
include("../php_library/dbConnect.php");

//sanitize post value
$page_number = filter_var($_POST["page"], FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH);

$isAdmin=isset($_SESSION['admin']);
$category = $_GET['category'];

//echo $_SERVER['PHP_SELF']."?category=".$_GET['category'];
//validate page number is really numaric
if(!is_numeric($page_number)){die('Invalid page number!');}
$item_per_page = 12;
//get current starting point of records
$position = ($page_number * $item_per_page);

//Limit our results within a specified range. 
$results = mysql_query("SELECT * FROM ".$category." ORDER BY time desc LIMIT $position, $item_per_page");

//output results from database
echo '<ul class="page_result">';

while($row = mysql_fetch_array($results)) {
	 if ($isAdmin)
		   	 echo '<div class="'.$category.'_edit" id="'.$row['ID'].'">';
	       else
		   	 echo '<div class="'.$category.'_box" id="'.$row['ID'].'"> ';
		   			
		   			if (file_exists("../products/".$category."/".$row['ID']."/1.jpg") && !($isAdmin)) {
	       echo			'<div class="item_img m_w"> 
							<a href="/maison56/digital_store/digital_store_view.php?category='.$category.'&id='.$row[0].'">
								<img class ="prod_img" src="../products/'.$category.'/'.$row['ID'].'/thumb/0.jpg" alt="photo"  /> 
							</a>
						</div>';
						
					}
					else {
	       echo			'<div class="item_img"> 
							<a href="/maison56/digital_store/digital_store_view.php?category='.$category.'&id='.$row[0].'">
								<img class ="prod_img" src="../products/'.$category.'/'.$row['ID'].'/thumb/0.jpg" alt="photo"  /> 
							</a>
            			</div>';
					}
        			
					if($isAdmin)
					{
					   echo '<div class="product_info1">
								 <label>Title: </label><input class="info" value="'.$row['title'].'"/> </br>
								 <label>Summary: </label><input class="info" value="'.$row['summary'].'" size="40"/> </br>
								 <label>Price: </label><input class="info" value="'.$row['price'].'"/> </br>
								 <label>Sizes: </label><input class="info" value="'.$row['sizes'].'"/>
						    </div>';
					}
					else
					{
						echo '<div class="product_info">
								<h4 class="info"> '.$row['title'].'</h4>';
								if ($row['summary'] == TRUE)
									echo '<div id="summ"><h5 class="info"> '.$row['summary'].'</h5></div>';
								else
									echo '<div id="summ"><h5 class="info"> - </h5></div>';
								if ($row['price'] == TRUE)
								 	echo '<p class="info2"> EUR '.$row['price'].'</p>';
								else
									echo '<p class="info2"> - </p>';
					  echo  '</div>';
					}/*<h5 class="info"> '.$row['summary'].'</h5>	*/
					if($isAdmin)
					{
							echo '<button class="delete submit_button">Delete</button>
							      	<button class="save submit_button">Update</button>';
					}
					
        echo '</div>';
}
echo '</ul>';

?>

