<?php
  session_start();
  include("php_library/dbConnect.php");
  include("php_library/dbSubmit.php");
 
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link rel="stylesheet" type="text/css" href="css/menu.css" />
<link rel="stylesheet" type="text/css" href="css/common.css" />
<link rel="stylesheet" type="text/css" href="css/contact.css" />
<script src="javascript/jquery-1.6.js" type="text/javascript"></script>
<title>Contact</title>

</head>

<body>
<?php include 'php_library/header.php'; ?>
	 <div id="main_content"> 
     	
     	  <div id="form"> 
            <h3> Contact us </h3>
            <form  id="contact_form" name="htmlform" method="post" action="file:///G|/studentOffer/html_form_send.php">
                <table width="450px">
                </tr>
                <tr>
                 <td valign="top">
                  <label for="first_name">First Name </label>
                 </td>
                 <td valign="top">
                  <input  type="text" name="first_name" maxlength="50" size="30">
                 </td>
                </tr>
                
                <tr>
                 <td valign="top"">
                  <label for="last_name">Last Name </label>
                 </td>
                 <td valign="top">
                  <input  type="text" name="last_name" maxlength="50" size="30">
                 </td>
                </tr>
                <tr>
                 <td valign="top">
                  <label for="email">Email Address </label>
                 </td>
                 <td valign="top">
                  <input  type="text" name="email" maxlength="80" size="30">
                 </td>
                
                </tr>
                <tr>
                 <td valign="top">
                  <label for="telephone">Telephone Number</label>
                 </td>
                 <td valign="top">
                  <input  type="text" name="telephone" maxlength="30" size="30">
                 </td>
                </tr>
                <tr>
                 <td valign="right">
                  <label for="comments"> Your message</label>
                 </td>
                 <td valign="top">
                  <textarea  name="comments" maxlength="1000" cols="25" rows="6"></textarea>
                 </td>
                
                </tr>
               
                </table>
                <button class = "submit_button" type="submit" > Submit </button>
        </form>
    
    </div>
     </div>
   
<?php include 'php_library/footer.php'; ?>	
</body>
</html>