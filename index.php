<?php
  session_start();
  include("php_library/dbConnect.php");
  include("php_library/dbSubmit.php");
  
  $isAdmin=isset($_SESSION['admin']);
 
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css/index.css" />
<link rel="stylesheet" type="text/css" href="css/menu.css" />
<link rel="stylesheet" type="text/css" href="css/common.css" />


<link rel="stylesheet" type="text/css" href='plugins/image_slider/css/style.css' />
<!--<link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300|Playfair+Display:400italic' rel='stylesheet' type='text/css' />-->

<!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script> -->

<script type="text/javascript" src="javascript/jquery-1.6.js"></script>
<script type="text/javascript" src="javascript/index.js"></script>
<script type="text/javascript" src="plugins/image_slider/js/jquery.eislideshow.js"></script>
<script type="text/javascript" src="plugins/image_slider/js/jquery.easing.1.3.js"></script>


<title>home</title>

</head>

<body >

<?php include '../maison56/php_library/header.php'; ?>

<div id="content"> 
	<div id="main_content">
        <div id="ei-slider" class="ei-slider">
            <ul class="ei-slider-large">
               
                <li>
                    <img src="plugins/image_slider/images/large/1.jpg" alt="image01" />
                    <div class="ei-title">
                       <!-- <h2>Creative</h2>
                        <h3>Duet</h3>-->
                    </div>
                </li>
                <li>
                    <img src="plugins/image_slider/images/large/2.jpg" alt="image02" />
                    <div class="ei-title">
                      <!--  <h2>Friendly</h2>
                        <h3>Devil</h3>-->
                    </div>
                </li>
                <li>
                    <img src="plugins/image_slider/images/large/3.jpg" alt="image03"/>
                    <div class="ei-title">
                        <!--<h2>Tranquilent</h2>
                        <h3>Compatriot</h3>-->
                    </div>
                </li>
                <!--<li>
                    <img src="plugins/image_slider/images/large/4.jpg" alt="image04"/>
                    <div class="ei-title">
                        <h2>Insecure</h2>
                        <h3>Hussler</h3>
                    </div>
                </li>
                <li>
                    <img src="plugins/image_slider/images/large/5.jpg" alt="image05"/>
                    <div class="ei-title">
                        <h2>Loving</h2>
                        <h3>Rebel</h3>
                    </div>
                </li>
                <li>
                    <img src="plugins/image_slider/images/large/7.jpg" alt="image07"/>
                    <div class="ei-title">
                        <h2>Crazy</h2>
                        <h3>Friend</h3>
                    </div>
                </li>-->
            </ul>
            <ul class="ei-slider-thumbs" id="slideshow" >
                <li class="ei-slider-element">Current</li>
                <!--<li><a href="#">Slide 6</a><img src="plugins/image_slider/images/thumbs/6.jpg" alt="thumb06" /></li>-->
                <li><a href="#">Slide 1</a><img src="plugins/image_slider/images/thumbs/1.jpg" alt="thumb01" /></li>
                <li><a href="#">Slide 2</a><img src="plugins/image_slider/images/thumbs/2.jpg" alt="thumb02" /></li>
                <li><a href="#">Slide 3</a><img src="plugins/image_slider/images/thumbs/3.jpg" alt="thumb03" /></li>
               <!-- <li><a href="#">Slide 4</a><img src="plugins/image_slider/images/thumbs/4.jpg" alt="thumb04" /></li>
                <li><a href="#">Slide 5</a><img src="plugins/image_slider/images/thumbs/5.jpg" alt="thumb05" /></li>
                <li><a href="#">Slide 7</a><img src="plugins/image_slider/images/thumbs/7.jpg" alt="thumb07" /></li>-->
            </ul><!-- ei-slider-thumbs -->
        </div><!-- ei-slider -->
        <div id="new_arrivals"> 
       
            <div id="new_item1">
            	
            	<?php 
				if ($isAdmin) {
					echo '<input id="product1" type="text" placeholder="copy url here..." size="50"/>
					 	  <button style="float:right;" onclick="save_item(1)"> save </button>';
				}
				?>
                <?php 
				$sql = "select * from home where ID='1'";
				$result = mysql_query ($sql);
				$row = mysql_fetch_array($result);
				echo '<a id="img1" href="http://localhost/maison56/digital_store/digital_store_view.php?category='.$row['category'].'&id='.$row['item'].'">
					 	<img src="products/'.$row['category'].'/'.$row['item'].'/0.jpg">
					  </a>';
				?>
                
                
                <div class="details">
                	<?php 
					if ($isAdmin)
						echo '<input id="prod1" value="'.$row['summary'].'" size="70"/>
						      <button style="float:right;" onclick="save_sum(1)"> save </button>';
					else
						echo '<p> '.$row['summary'].' </p>'; 
					?>
               		
			    </div>
            </div>
             
            <div id="new_item2">
            	 
            	<?php 
				if ($isAdmin) {
					echo '<input id="product2" type="text" placeholder="copy url here..." size="50"/>
						  <button style="float:right;" onclick="save_item(2)"> save </button>';
					
				}
				?>
                <?php 
				$sql = "select * from home where ID='2'";
				$result = mysql_query ($sql);
				$row = mysql_fetch_array($result);
				echo '<a id="img2" href="http://localhost/maison56/digital_store/digital_store_view.php?category='.$row['category'].'&id='.$row['item'].'"> <img src="products/'.$row['category'].'/'.$row['item'].'/0.jpg"> </a>';
				?>
                <div class="details">
                	<?php 
					if ($isAdmin)
						echo '<input id="prod2" value="'.$row['summary'].'" size="70"/>
						 	  <button style="float:right;" onclick="save_sum(2)"> save </button>';
					else
						echo '<p> '.$row['summary'].' </p>'; 
					?>
				</div>
            </div>
        </div>        
		
	</div>
   
</div>
	 <?php include '../maison56/php_library/footer.php'; ?>

</body>




</html>