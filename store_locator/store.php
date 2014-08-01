<?php
  session_start();
  include("../php_library/dbConnect.php");
  include("../php_library/dbSubmit.php");
 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="../css/menu.css" />
<link rel="stylesheet" type="text/css" href='../css/common.css' />

<link rel="stylesheet" type="text/css" href='../store_locator/css/storeLocator.css' />
<link rel="stylesheet" type="text/css" href="css/prettyPhoto.css" />
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<script type="text/javascript"src="../digital_store/javascript/jquery.bpopup-x.x.x.min.js"></script>
<script type="text/javascript" src="js/jquery.prettyPhoto.js"></script>
<title>Store Locator</title>
</head>

<body>

	<?php include '../php_library/header.php'; ?>
    <div id="main_content"> 
       <img src="images/background3.png" border="0" usemap="#Map">
       <map name="Map" id="Map">
         <area shape="rect" coords="306,125,405,154" href="store.php" alt="View On Map" />
       </map>
       
       <button class="map_button" id="my-button"> View on map </button>
       <div id="element_to_pop_up">
				<a class="b-close">x<a/>
				<img src="images/map.png">
					
				
	  </div>
      <div id="store_images"> 
      	<a href="images/fullscreen/foto1.jpg" rel="prettyPhoto[pp_gal]" ><img src="images/thumbnails/foto1.jpg" width="60" height="60" /></a>
		<a href="images/fullscreen/foto2.jpg" rel="prettyPhoto[pp_gal]"><img src="images/thumbnails/foto2.jpg" width="60" height="60"  /></a>
		<a href="images/fullscreen/foto3.jpg" rel="prettyPhoto[pp_gal]"><img src="images/thumbnails/foto3.jpg" width="60" height="60"  /></a>
		<a href="images/fullscreen/foto4.jpg" rel="prettyPhoto[pp_gal]"><img src="images/thumbnails/foto4.jpg" width="60" height="60" /></a>
        <a href="images/fullscreen/foto5.jpg" rel="prettyPhoto[pp_gal]"><img src="images/thumbnails/foto5.jpg" width="60" height="60"  /></a>
        <a href="images/fullscreen/foto2.jpg" rel="prettyPhoto[pp_gal]"><img src="images/thumbnails/foto2.jpg" width="60" height="60"  /></a>
      </div>
    <?php include '../php_library/footer.php'; ?>
    
<script type="text/javascript" charset="utf-8">
  $(document).ready(function(){
    $("a[rel^='prettyPhoto']").prettyPhoto();
  });
</script>
</body>
</html>