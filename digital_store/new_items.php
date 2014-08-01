<?php
  session_start();
  include("../php_library/dbConnect.php");
  include("../php_library/dbSubmit.php");
  
$isAdmin=isset($_SESSION['admin']); 
$results = mysql_query("SELECT COUNT(*) FROM new_items");

$get_total_rows = mysql_fetch_array($results); //total records

$item_per_page = 6;
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
<link rel="stylesheet" type="text/css" href="../digital_store/css/digital_store.css" />
<link rel="stylesheet" type="text/css" href="css/new_items.css" />

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script type="text/javascript" src="../javascript/index.js"></script>
<script type="text/javascript" src="javascript/digital_store.js"></script>
<script type="text/javascript" src="javascript/new_items/new_items.js"></script>

<?php 
if ($isAdmin)
	echo '<script type="text/javascript" src="javascript/new_items/paging_admin.js"> </script>';
else
	echo '<script type="text/javascript" src="javascript/new_items/paging_store.js"> </script>';
?>

<title>What's New</title>
</head>

<body>

<?php include '../php_library/header.php'; ?>

<?php 


if ($isAdmin) {
	echo '<button class="submit_button" id="my-button" onclick="add_item()"> add item </button> ';	
}

if ($isAdmin)
	echo '<div id="main_content_e">'; 
else
	echo '<div id="main_content_s">'; 


	echo '</div>';
    echo $pagination;
	
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