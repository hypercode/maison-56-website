 <?php
    if(isset($_POST["send"]))
	{
		    $to = "info@maison56.gr";
			$subject = substr($_POST["comments"],0,70)."...";
			$product = "http://localhost/maison56/digital_store/digital_store_view.php?category=bags&id=7";
			$product_size = $_POST['size'];
			$customer_phone = $_POST['telephone'];
			$from = $_POST["name"];
			$headers = "From: ".$from;
			
			$message = "Ο/Η ".$_POST["name"]." με αριθμό τηλεφώνου ".$customer_phone." ενδιαφέρεται για το προιόν : ".$product." σε μέγεθος <br> ".$product_size." </br>";
			$message1 =$_POST["message"]."\r\n\r\n";
			
			if(mail($to,$subject,$message.$message1,$headers))
			   echo '<p>Το μήνυμά σου εστάλη επιτυχώς '.$_POST["name"].'.<br/>Θα σου απαντήσουμε το συντομότερο.
			         <a href="contact.php">
					 <img src="icons/Success.png" width="15" height="15" style="margin-bottom:-3px">
					 </a></p>';
			else
			  echo '<p>Το μήνυμά σου απέτυχε να σταλθεί.<br/>Παρακαλώ προσπαθήσε ξανά.
			        <a href="contact.php"><img src="icons/Sign Error.png" width="15" height="15"></a></p>';
	}
	else
	 echo 'Tray again,there was an error';

    
   
  ?>