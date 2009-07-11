<?php
	include("php/util/db.php");
   $q = isset($_REQUEST["page"])?$_REQUEST["page"]:"home" ;
   $PAGES_DIR = "./php/pages/";
	$conn = init_db();
   $page = get_page($conn,$q);
   $tabs = get_tabs($conn);
	close_db($conn);
   //page - file, name, display_name
?>

<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta http-equiv="content-language" content="en">
    <meta name="robots" content="all,follow">

    <meta name="author" content="skumar"lang="en">

    <meta name="description" content="Rainbow Novelties specialises in all kinds of bags..">
    <meta name="keywords" content="novelties, bags, rainbow">

    <link rel="stylesheet"  type="text/css" href="css/reset.css">
    <link rel="stylesheet"  type="text/css" href="css/main.css">
    <link rel="stylesheet"  type="text/css" href="css/style.css">
    <link rel="stylesheet"  type="text/css" href="css/ticker.css">

    <title>Rainbow Novelties - <?php echo $page['title'];?></title>
    
    <script type="text/javascript" src="js/jquery-1.3.2.min.js"></script>
    <script type="text/javascript" src="js/jquery.li-scroller.1.0.js"></script>

 <?php
     // include lightbox js/css files for gallery
     if($q == "gallery") include('php/include/gallery.inc');
 ?>

<script type="text/javascript">

/*** 
    Simple jQuery Slideshow Script
    Released by Jon Raasch (jonraasch.com) under FreeBSD license: free to use or modify, not responsible for anything, etc.  Please link out to me if you like it :)
***/

function slideSwitch() {
    var $active = $('#slideshow IMG.active');

    if ( $active.length == 0 ) $active = $('#slideshow IMG:last');

    // use this to pull the images in the order they appear in the markup
    var $next =  $active.next().length ? $active.next()
        : $('#slideshow IMG:first');

    // uncomment the 3 lines below to pull the images in random order
    
    // var $sibs  = $active.siblings();
    // var rndNum = Math.floor(Math.random() * $sibs.length );
    // var $next  = $( $sibs[ rndNum ] );


    $active.addClass('last-active');

    $next.css({opacity: 0.0})
        .addClass('active')
        .animate({opacity: 1.0}, 1000, function() {
            $active.removeClass('active last-active');
        });
}

$(function() {
    setInterval( "slideSwitch()", 5000 );
    $("ul#ticker01").liScroll(); // scroll the logos
});

</script>

</head><body>
<!-- Container -->
<div id="main">

    <!-- Header -->
    <div id="header">

        <h1 id="logo"><a href="./" title="Go to Rainbow Novelties homepage"><img src="images/logo.gif" alt="Rainbow Novelties"></a></h1>
        <hr class="noscreen">
         <!-- /nav -->

    </div> <!-- /header -->
    
    <!-- Menu -->
    <div id="menu">

        <ul>
        <?php
			foreach($tabs as $tab){
				print("<li ".($tab['name']==$page['tab']? "id=menu-active":"") ."><a href=index.php?page=$tab[name]>$tab[display_name]</a></li>");			
			}
			
        ?>
        </ul>
        
    <hr class="noscreen">
    </div> <!-- /menu -->

    <!-- Page document -->
    <div id="doc-top"></div>
    <div id="doc" class="box">
        <!-- Image slideshow -->
        <div id="doc-right">
        

            <div id="slideshow" class="box" >
            <?php
            @include('./php/cache/slideshow.php');
            
			// XXX: add limit for images to be loaded 
				function print_slide(&$image, $index){
					echo("<img src=\"images/slideshow/".$image."\" alt=\"Slideshow Image ".$index."\" />");				
				}         
            
            array_walk($slides,'print_slide');
            ?>
            </div> <!-- /box -->
        
        </div> <!-- /doc-right -->
 
        
        <div id="doc-text">

            <h2 id="doc-title"><span></span> <?php echo $page['title']?></h2>
            
            <?php
            if(!include($PAGES_DIR.$page['file']))
	            echo "Page under construction";
	         // the file is not present...
            ?>
            
        </div> <!-- /doc-text -->
        
    
    </div> <!-- /doc -->
    <div id="doc-bottom"></div>
    
    <hr class="noscreen">
    
    <hr class="noscreen">
    
    <div id="ticker">
      <?php
        include("php/pages/ticker.php"); 
      ?>
    </div>

    <!-- Footer -->
    <div id="footer">
	        <ul class="f-right">
					<li><a href="#">Privacy Policy</a></li>
					<li><a href="#">Legal Disclaimer</a></li>
					<li><a href="#">Terms of Use</a></li>
					<li><a href="#">Site map</a></li>
	        </ul>

        <p>Copyright ©&nbsp;2008 <strong><a href="#">Rainbow Novelties</a></strong>, All Rights Reserved ®</p>

    </div> <!-- /footer -->

</div> <!-- /container -->

</body>

</html>
