<?php
  session_start();
  include("../php_library/dbConnect.php");
  include("../php_library/dbSubmit.php");
  
$isAdmin = isset($_SESSION['admin']);
$category = $_GET['category'];

$results = mysql_query("SELECT COUNT(*) FROM ".$category."");

$get_total_rows = mysql_fetch_array($results); //total records

$item_per_page = 12;
//break total records into pages
$pages = ceil($get_total_rows[0]/$item_per_page);	

//create pagination
if($pages > 1)
{
	$pagination	= '';
	$pagination	.= '<ul class="paginate">';
	for($i = 1; $i<=$pages; $i++)	//was <
	{
		$pagination .= '<li><a href="#" class="paginate_click" id="'.$i.'-page">'.$i.'</a></li>';
	}
	$pagination .= '</ul>';
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="../css/menu.css" />
<link rel="stylesheet" type="text/css" href="../css/common.css" />
<link rel="stylesheet" type="text/css" href="css/digital_store.css" />


<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script type="text/javascript" src="../javascript/index.js"></script>
<script type="text/javascript" src="javascript/digital_store.js"></script>
<?php 
if ($isAdmin)
	echo '<script type="text/javascript" src="javascript/paging_admin.js"> </script>';
else
	echo '<script type="text/javascript" src="javascript/paging_store.js"> </script>';
?>
<title>Digital Store</title>
</head>

<body>

<?php include '../php_library/header.php'; 

echo '<span style="display:none;" id="categoryId">'.$category.'</span>';

?>
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

if ($isAdmin) {
	echo '<button class="submit_button" id="my-button" onclick="add_item(\''.$category.'\')"> add item </button> ';	
}

if ($isAdmin)
	echo '<div id="main_content_edit">'; 
else
	echo '<div id="main_content_store">'; 

	
echo '</div>';
echo $pagination;
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