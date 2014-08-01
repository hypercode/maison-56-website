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
<link rel="stylesheet" type="text/css" href="../digital_store/css/new_items.css" />



<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script type="text/javascript" src="../javascript/index.js"></script>
<script type="text/javascript" src="javascript/digital_store.js"></script>
<script type="text/javascript" src="javascript/new_items.js"></script>

<title>What's New</title>
</head>

<body>

<?php include '../php_library/header.php'; ?>
<?php 
$isAdmin=isset($_SESSION['admin']);

if ($isAdmin) {
	echo '<button class="submit_button" id="my-button" onclick="add_item()"> add item </button> ';	
}

if ($isAdmin)
	echo '<div id="main_content_edit">'; 
else
	echo '<div id="main_content_store">'; 



		$sql = "select * from new_items order by time desc";
		$result = mysql_query ($sql);
		while($row = mysql_fetch_array($result)) {
		   
	      	 if($isAdmin) {
				 echo '<div class="item_box_edit" id="'.$row['ID'].'"> 
						<a href="'.$row['url'].'">
							<img class ="prod_img" src="new_items_images/'.$row['ID'].'/'.$row['ID'].'.jpg" alt="photo"  /> 
						</a>';
			 }
			 else {
					echo '<div class="item_box" id="'.$row['ID'].'"> 
						<a href="'.$row['url'].'">
							<img class ="prod_img" src="new_items_images/'.$row['ID'].'/'.$row['ID'].'.jpg" alt="photo"  /> 
						</a>'; 
			 }
		   	 
			if($isAdmin)
			{
			   echo '<label>URL: </label><input class="info" size="50" value="'.$row['url'].'"/> </br>';
			}
		
			if($isAdmin)
			{
					echo '<button class="delete_nt submit_button">Delete</button>
						  <button class="save_nt submit_button">Update</button>';
			}
					
        echo '</div>';
		}
		
		

echo '</div>';
echo '<div id="add_item_content">
		
		<div id="add_item">
			<button class = "submit_button" id="show_products"> close </button>
			<form method="post" action="../php_library/dbStore_new_items.php" enctype="multipart/form-data">
			 
				<label>URL: </label> <input name="item_url" size="70" type="text"/> <br>
				Image(only jpg) : <input id="file" name="file" type="file"/> <br>
				
				<button class="submit_button" type="submit"> save </button>
			</form>
		</div>
	 </div>';
?>

<?php include '../php_library/footer.php'; ?>

</body>
</html>