<?php
  session_start();
  include("../php_library/dbConnect.php");
  include("../php_library/dbSubmit.php");
 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html><head>
        <title>campaign</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
		<script src="js/cufon-yui.js" type="text/javascript"></script>
        <script src='js/campaing.js' type="text/javascript"></script>
		  <script src='../javascript/index.js' type="text/javascript"></script>
        
		
		<link rel="stylesheet" type="text/css" href='../css/common.css' />
		<link rel="stylesheet" type="text/css" href='../css/menu.css' />
        <link rel="stylesheet" href="css/style.css" type="text/css" media="screen"/>
       
		
    </head>
    <body>
    	<?php include '../php_library/header.php'; ?>
        
		
		<div id="fp_gallery" class="fp_gallery">
        
		  <!--  <img src='images/bgimg.jpg' class="fp_bgImage" />
			<div class="fp_bgPattern"></div>
			<h4> Our Camapaing </h4>-->
			

			<ul id="fp_galleryList" class="fp_galleryList">
				<li >Manolo</li>
				<li >Maison 56</li>
			</ul> 
			<div id="fp_thumbContainer">
				<div id="fp_thumbScroller">
					<div class="container">
						<div class="content">
							<div><a href="#"><img src="images/album1/thumbs/1.jpg" alt="images/album1/1.jpg" class="thumb" /></a></div>
						</div>
						<div class="content">
							<div><a href="#"><img src="images/album1/thumbs/2.jpg" alt="images/album1/2.jpg" class="thumb" /></a></div>
						</div>
						<div class="content">
							<div><a href="#"><img src="images/album1/thumbs/3.jpg" alt="images/album1/3.jpg" class="thumb" /></a></div>
						</div>
						
					</div>
					<div class="container">
						<div class="content">
							<div><a href="#"><img src="images/album2/thumbs/1.jpg" alt="images/album2/1.jpg" class="thumb" /></a></div>
						</div>
						<div class="content">
							<div><a href="#"><img src="images/album2/thumbs/2.jpg" alt="images/album2/2.jpg" class="thumb" /></a></div>
						</div>
						<div class="content">
							<div><a href="#"><img src="images/album2/thumbs/3.jpg" alt="images/album2/3.jpg" class="thumb" /></a></div>
						</div>
						<div class="content">
							<div><a href="#"><img src="images/album2/thumbs/1.jpg" alt="images/album2/1.jpg" class="thumb" /></a></div>
						</div>
						<div class="content">
							<div><a href="#"><img src="images/album2/thumbs/2.jpg" alt="images/album2/2.jpg" class="thumb" /></a></div>
						</div>
						<div class="content">
							<div><a href="#"><img src="images/album2/thumbs/3.jpg" alt="images/album2/3.jpg" class="thumb" /></a></div>
						</div>						
						<div class="content">
							<div><a href="#"><img src="images/album2/thumbs/1.jpg" alt="images/album2/1.jpg" class="thumb" /></a></div>
						</div>
						<div class="content">
							<div><a href="#"><img src="images/album2/thumbs/2.jpg" alt="images/album2/2.jpg" class="thumb" /></a></div>
						</div>
						<div class="content">
							<div><a href="#"><img src="images/album2/thumbs/3.jpg" alt="images/album2/3.jpg" class="thumb" /></a></div>
						</div>						
						<div class="content">
							<div><a href="#"><img src="images/album2/thumbs/1.jpg" alt="images/album2/1.jpg" class="thumb" /></a></div>
						</div>
						<div class="content">
							<div><a href="#"><img src="images/album2/thumbs/2.jpg" alt="images/album2/2.jpg" class="thumb" /></a></div>
						</div>
						<div class="content">
							<div><a href="#"><img src="images/album2/thumbs/3.jpg" alt="images/album2/3.jpg" class="thumb" /></a></div>
						</div>
						<div class="content">
							<div><a href="#"><img src="images/album2/thumbs/1.jpg" alt="images/album2/1.jpg" class="thumb" /></a></div>
						</div>
						<div class="content">
							<div><a href="#"><img src="images/album2/thumbs/2.jpg" alt="images/album2/2.jpg" class="thumb" /></a></div>
						</div>
						<div class="content">
							<div><a href="#"><img src="images/album2/thumbs/3.jpg" alt="images/album2/3.jpg" class="thumb" /></a></div>
						</div>

					</div>
					
				</div>
			</div>

			<div id="fp_scrollWrapper" class="fp_scrollWrapper">
				<span id="fp_prev_thumb" class="fp_prev_thumb"></span>
				<div id="slider" class="slider"></div>
				<span id="fp_next_thumb" class="fp_next_thumb"></span>
			</div>

			<div id="fp_overlay" class="fp_overlay"></div>
			<div id="fp_loading" class="fp_loading"></div>
			<div id="fp_next" class="fp_next"></div>
			<div id="fp_prev" class="fp_prev"></div>
			<div id="fp_close" class="fp_close">Close preview</div> 
		</div> 
        <?php include '../php_library/footer.php'; ?>
        
		<!--  JAVASCRIPT -->
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/jquery-ui.min.js"></script>
		<script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
		<script type="text/javascript">
			
		</script>
    </body>
</html>