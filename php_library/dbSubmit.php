<?php
session_start();

include('dbConnect.php');
include('files.php');

$isAdmin=isset($_SESSION['admin']);

$data = json_decode(stripslashes($_POST['data']),true);
$table = $data[0][1];
$function = $data[1][1];


if($isAdmin) {

     if($function=='update')
	 {
		 $ID = $data[2][1];
		 $title = $data[3][1];
		 $summary = $data[4][1];
		 $price = $data[5][1];
		 $sizes = $data[6][1];
		 
		 $sql = "update ".$table." set title='". $title."',summary='".$summary."',price='".$price."',sizes='".$sizes."' where ID='".$ID."'";
		 $result = mysql_query($sql);
		 if($result)
		 	echo 'OK';
		 else
			echo 'ERROR';
		 
	 }
	 else if($function=='update_nt')
	 {
		 $ID = $data[2][1];
		 $url = $data[3][1];
		 
		 $sql = "update ".$table." set url='".$url."' where ID='".$ID."'";
		 $result = mysql_query($sql);
		 if($result)
		 	echo 'OK';
		 else
			echo 'ERROR';
		 
	 }
	 else if($function=='delete')	
	 {
		 $ID = $data[2][1];
		 $sql = "delete from ".$table." where ID='".$ID."'";
		 
		 $result = mysql_query($sql);
		 
		 if($result)
		 {
			deleteDir("../products/".$table."/".$ID."/");
			
			echo 'OK';
		 }
		 else
		 	echo 'ERROR';
	 }
	 else if($function=='delete_nt')	
	 {
		 $ID = $data[2][1];
		 $sql = "delete from ".$table." where ID='".$ID."'";
		 
		 $result = mysql_query($sql);
		 
		 if($result)
		 {
			deleteDir("../digital_store/new_items_images/".$ID."/");
			
			echo 'OK';
		 }
		 else
		 	echo 'ERROR';
	 }
	 else if($function=='save') {			// for the index page
		
		$ID = $data[2][1];
		
		
		if ($data[3][1] == 1) 
			$sql = "update home set category='".$table."',item='".$ID."' where ID=1";
		
		else 
			$sql = "update home set category='".$table."',item='".$ID."' where ID=2";
		
		$result = mysql_query($sql);
		if($result)
		 	echo 'OK';
		 else
			echo 'ERROR';
			 
	}
	else if($function=='save_sum'){
		
		$ID = $data[2][1];
		$sum_value = $data[3][1];
		
		$sql = "update home set summary='".$sum_value."' where ID='".$ID."'";
		
		$result = mysql_query($sql);
		if($result)
		 	echo 'OK';
		 else
			echo 'ERROR';
		}
	
	
}


?>