<?php
  include("../php_library/dbConnect.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href='css/upload.css' />
<title>Upload</title>
</head>
<?php 
	
	if (($_POST["username"] != "admin") && ($_POST["password"] != "maison") ) 
		echo "try again";
		
	
	else {
		echo '<div id="content"> 
				<a href="../upload/upload.php?category=index"> Index Clothing </a> <br><br>
				<a href="../upload/upload.php?category=dress"> Dress Clothing </a><br><br>
				<a href="../upload/upload.php?category=casual"> Casual Clothing </a><br><br>
				<a href="../upload/upload.php?category=shoes"> Shoes </a><br><br>
				<a href="../upload/upload.php?category=bags"> Bags </a><br><br>
				<a href="../upload/upload.php?category=accessories"> Accessories </a><br><br>
				<a href="../upload/upload.php?category=swimmwear"> Swimmwear </a><br>
			</div>';
		
		
		
	}
		
?>

<body>
</body>
</html>
