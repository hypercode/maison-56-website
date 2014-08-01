<?php
session_start();

include('dbConnect.php');

$isAdmin=isset($_SESSION['admin']);


if($isAdmin) {
	
  $item_url = $_POST["item_url"];
  $sql = "insert into new_items(url) values ('".$item_url."')";
  $result = mysql_query($sql);
  if(!$result)
		echo 'ERROR'; 
  else {
  		$allowedExts = array("jpeg", "jpg");
		$temp = explode(".", $_FILES["file"]["name"]);
		$extension = end($temp);
		
		$result = mysql_query("show table status like 'new_items'");
		$row = mysql_fetch_array($result);
		$nextId = $row['Auto_increment'];
		$id = --$nextId;  
		echo $id;
		if (($_FILES["file"]["type"] == "image/jpeg") || ($_FILES["file"]["type"] == "image/jpg") && in_array($extension, $allowedExts)) {
		  if ($_FILES["file"]["error"] > 0) {
			echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
		  }
		  else {
			  if (file_exists("../digital_store/new_items_images/" . $_FILES["file"]["name"])) {
				echo $_FILES["file"]["name"] . " already exists. ";
			}
			else
			{
			  mkdir("../digital_store/new_items_images/".$id."", 0755);
			  //mkdir("../digital_store/new_items_images/".$id."/thumb/", 0755);
			  $filename = $_FILES["file"]["name"];
			  $extension = end(explode(".", $filename));
			  $newfilename = $id.".".$extension;
			  move_uploaded_file($_FILES["file"]["tmp_name"],"../digital_store/new_items_images/".$id."/" . $newfilename);
			 
			  
		/*	  //-----------------Create the thumbnail-----------------------
			  $src = "../digital_store/new_items_images/".$id."/" . $newfilename."";
			  $dest = "../digital_store/new_items_images/".$id."/thumb/" . $newfilename."";
			  $desired_width = 400;
			 // $desired_height = 450;
			  
			  $source_image = imagecreatefromjpeg($src);
			  $width = imagesx($source_image);
			  $height = imagesy($source_image);
			  
			  $desired_height = floor($height * ($desired_width / $width));
			 // $desired_width = floor($width * ($desired_height / $height));
			  
			  $virtual_image = imagecreatetruecolor($desired_width, $desired_height);
			  imagecopyresampled($virtual_image, $source_image, 0, 0, 0, 0, $desired_width, $desired_height, $width, $height);
			  imagejpeg($virtual_image, $dest );*/
		   }
		  }
		   
		} else {
		  echo "Invalid file,try again!";
		}
				
				
		  }
  		header("Location: ../digital_store/new_items.php");
}
		
	 
	 
?>