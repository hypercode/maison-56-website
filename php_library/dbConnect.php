<?php
   
  error_reporting(E_ERROR);
  //------------------------------------------------------------------ 
  $dbhost='localhost';
  $dbuser='root';
  $server = mysql_connect($dbhost,$dbuser);
  
  if(!$server) 
     die('Could not connect: ' . mysql_error());
    
 
  $db=mysql_select_db('maison56',$server);
   
  if (!$db)
      die ('Can\'t connect to database : ' . mysql_error());
   
   mysql_query("SET NAMES 'utf8'", $server);
   
   
   
	   
?>