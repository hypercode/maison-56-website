<div id="header">
	
    <div id="logo"> 
        <a href="../index.php"><img src="/maison56/img/logo.png"></a>
         <?php 
	if ($isAdmin)
		echo '<a href="/maison56/login/logout.php" class="submit_button" id="logout" >Log Out</a>';
	?>
    </div> 
   
    <div id="menu"> 
       <ul class="nav">
            <li><a id="home" href='/maison56'>Home</a></li>	
            <li  class="dropdown"> <a id="digital_store" href="#">Digital Store</a>
                <ul>
                    <li class="dropdown"> <a href="#">Clothing</a>
                        <ul>
                        	<li><a class="drop" href='/maison56/digital_store/digital_store.php?category=jackets'>Jackets </a></li>
                            <li><a class="drop" href='/maison56/digital_store/digital_store.php?category=dresses'>Dresses </a></li>
                            <li><a class="drop"href='/maison56/digital_store/digital_store.php?category=topwear'>Topwear</a></li>
                            <li><a class="drop"href='/maison56/digital_store/digital_store.php?category=trowsers'>Trowsers</a></li>
                            <li><a class="drop"href='/maison56/digital_store/digital_store.php?category=skirts'>Skirts</a></li>
                        </ul>
                    </li>
                    <li><a class="drop" href='/maison56/digital_store/digital_store.php?category=shoes'>Shoes</a></li>
                    <li><a class="drop" href='/maison56/digital_store/digital_store.php?category=bags'>Bags</a></li>
                    <li><a class="drop" href='/maison56/digital_store/digital_store.php?category=accessories'>Accessories</a></li>
                    <li><a class="drop" href='/maison56/digital_store/digital_store.php?category=swimmwear'>Swimwear</a></li>
                    
                </ul>
            </li>
            <li ><a id="campaing" href='/maison56/campaing/campaing.php' >Campaing</a></li>
            <li><a id="store_locator" href='/maison56/store_locator/store.php'>Store Locator</a></li>
            <li><a id="new_items" href='/maison56/digital_store/new_items.php'>What's New</a></li>
            <li><a id="contact" href="/maison56/contact.php">Contact</a></li>
        </ul>
        
        
    </div>
 </div>
