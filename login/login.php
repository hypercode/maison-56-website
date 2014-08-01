<?php
  session_start();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href='css/login.css' />
<title>Login</title>
</head>

<body>

  <?php 
	
	if(isset($_POST["login"]))
	{
	 if(($_POST["username"] == "admin") && ($_POST["password"] == "maison") ) {
		$_SESSION['admin']='admin';
		header("Location: ../index.php");
	 }else
	  echo 'Wrong username or password';
	}
	else
	{
		echo '<div id="form" > 
			  <form method="post" action="login.php">
				username: <input type="text" name="username"><br>
				password: <input type="password" name="password"> 
				<input type="submit" name="login" value="login">
			  </form>
		    </div>';
	}
	
	
		
  ?>
  
</body>
</html>