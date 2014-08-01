<?php
session_start();

include('dbConnect.php');

$isAdmin=isset($_SESSION['admin']);


if($isAdmin) {
	
  $category = $_POST["category"];
  $title = $_POST["title"];
  $summary = $_POST["summary"];
  $price = $_POST["price"];
  $sizes = $_POST["sizes"];
  $images = 0;
  $sql = "insert into " .$category."(title,summary,price,images,sizes)  values ('". $title."','".$summary."','".$price."','".$images."','".$sizes."')";
  $result = mysql_query($sql);
  if(!$result)
		echo 'ERROR'; 
  else {
		$result = mysql_query("show table status like '$category'");
		$row = mysql_fetch_array($result);
		$nextId = $row['Auto_increment'];
		$id = --$nextId;  
		$i = 0;
		$imgs = 0;
  	foreach ($_FILES['file']['name'] as $f => $name) {
		
		  $allowedExts = array("jpeg", "jpg");
		  $temp = explode(".", $name);
		  $extension = end($temp);
		  
		  if ( ($_FILES["file"]["type"][$f] == "image/jpeg") || ($_FILES["file"]["type"][$f] == "image/jpg") && in_array($extension, $allowedExts))
		  {
		  if ($_FILES["file"]["error"][$f] > 0) {
				echo "Return Code: " . $_FILES["file"]["error"][$f] . "<br>";
		  }
		  else
			{
			
		
			if (file_exists("../products/".$category."/" . $name)) {
				echo $_FILES["file"]["name"][$f] . " already exists. ";
			}
			else
			{
			  mkdir("../products/".$category."/".$id."", 0755);
			  mkdir("../products/".$category."/".$id."/thumb/", 0755);
			  $filename = $name;
			  $extension = end(explode(".", $filename));
			  $newfilename = $i.".".$extension;
			  move_uploaded_file($_FILES["file"]["tmp_name"][$f],"../products/".$category."/".$id."/" . $newfilename);
			  $imgs  = $imgs + 1;
			  
			  //-----------------Create the thumbnail-----------------------
			  $src = "../products/".$category."/".$id."/" . $newfilename."";
			  $dest = "../products/".$category."/".$id."/thumb/" . $newfilename."";
			  $desired_width = 400;
			 // $desired_height = 450;
			  
			  $source_image = imagecreatefromjpeg($src);
			  $width = imagesx($source_image);
			  $height = imagesy($source_image);
			  
			  $desired_height = floor($height * ($desired_width / $width));
			 // $desired_width = floor($width * ($desired_height / $height));
			  
			  $virtual_image = imagecreatetruecolor($desired_width, $desired_height);
			  imagecopyresampled($virtual_image, $source_image, 0, 0, 0, 0, $desired_width, $desired_height, $width, $height);
			  imagejpeg($virtual_image, $dest );
				  
				  
			 
				  
			}
			}
		}
	else
		  echo "Invalid file,try again";
	
	$i = $i + 1;
	}
		
  }
  
	$sql = "update ".$category." set images='".$imgs."' where ID='".$id."'";
	$result = mysql_query($sql);
    header("Location: ../digital_store/digital_store.php?category=".$category."");
}
		
	 
	 
?>