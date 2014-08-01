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
<link rel="stylesheet" type="text/css" href="../digital_store/css/digital_store.css" />


<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>


<script type="text/javascript" src="../javascript/index.js"></script>
<script type="text/javascript" src="javascript/digital_store.js"></script>
<title>Digital Store</title>
</head>

<body>

<?php include '../php_library/header.php'; ?>
<div id="vertical_menu"> 
      
       <ul>
            
            <li><a class="vertical_drop" href='/maison56/digital_store/digital_store.php?category=jackets'>Jackets </a></li>
            <li><a class="vertical_drop" href='/maison56/digital_store/digital_store.php?category=dresses'>Dresses </a></li>
            <li><a class="vertical_drop"href='/maison56/digital_store/digital_store.php?category=topwear'>Topwear</a></li>
            <li><a class="vertical_drop"href='/maison56/digital_store/digital_store.php?category=trowsers'>Trowsers</a></li>
            <li><a class="vertical_drop"href='/maison56/digital_store/digital_store.php?category=skirts'>Skirts</a></li>
			<li><a class="vertical_drop" href='/maison56/digital_store/digital_store.php?category=shoes'>Shoes</a></li>
            <li><a class="vertical_drop" href='/maison56/digital_store/digital_store.php?category=bags'>Bags</a></li>
            <li><a class="vertical_drop" href='/maison56/digital_store/digital_store.php?category=accessories'>Accessories</a></li>
            <li><a class="vertical_drop" href='/maison56/digital_store/digital_store.php?category=swimmwear'>Swimwear</a></li>
            
        </ul>
           
 </div>
<?php 
$isAdmin=isset($_SESSION['admin']);
$category = $_GET['category'];

if ($isAdmin) {
	echo '<button class="submit_button" id="my-button" onclick="add_item(\''.$category.'\')"> add item </button> ';	
}

if ($isAdmin)
	echo '<div id="main_content_edit">'; 
else
	echo '<div id="main_content_store">'; 

	
	
		$sql = "select * from ".$category." order by time desc";
		$result = mysql_query ($sql);
		while($row = mysql_fetch_array($result)) {
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
								 if ($row['price'] == TRUE)
								 	echo '<p class="info2"> EUR '.$row['price'].'</p>';
					  echo  '</div>';
					}/*<h5 class="info"> '.$row['summary'].'</h5>	*/
					if($isAdmin)
					{
							echo '<button class="delete submit_button">Delete</button>
							      	<button class="save submit_button">Update</button>';
					}
					
        echo '</div>';
		}
		
		

echo '</div>';
echo '<div id="add_item_content">
		
		<div id="add_item">
			<button class = "submit_button" id="show_products"> close </button>
			<form method="post" action="../php_library/dbStore_item.php" enctype="multipart/form-data"> 
				<label>Title: </label><input name="title" type="text"/> <br>
				<label>Summary: </label> <textarea name="summary" type="text"> </textarea> <br>
				<label>Price: </label> <input name="price" type="text"/> <br>
				<input id="category" name="category" type="hidden"/> <br>
				<label>Sizes: </label><input class="info" name="sizes" type="text" /><br>
				Image1(only jpg) : <input id="file" name="file[]" type="file"/> <br>
				Image2(only jpg) : <input id="file" name="file[]" type="file"/> <br>
				Image3(only jpg) : <input id="file" name="file[]" type="file"/> <br>
				Image4(only jpg) : <input id="file" name="file[]" type="file"/> <br>
				Image5(only jpg) : <input id="file" name="file[]" type="file"/> <br>
				Image6(only jpg) : <input id="file" name="file[]" type="file"/> <br>
				<button class="submit_button" type="submit"> save </button>
			</form>
		</div>
	 </div>';
?>

<?php include '../php_library/footer.php'; ?>
</body>
</html>