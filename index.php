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

 <?php
     // include lightbox js/css files for gallery
     //if($q == "gallery") include('php/include/gallery.inc');     
     
     $show_ticker = ($q == "home");
     $show_slideshow = ($q== "home");

     if($show_ticker or $show_slideshow) include('php/include/home.inc');
 ?>

    <title>Rainbow Novelties - <?php echo $page['title'];?></title>
</head>
<body>
    <div id="page">
    <!-- Container -->
        <div id="main">

            <!-- Header -->
            <div id="header">

                 <div id="logo">
                     <a href="./" title="Go to Rainbow Novelties homepage"><img src="images/logo.gif" alt="Rainbow Novelties"></a>
                 </div>
                 <hr class="noscreen">
                 <!-- /nav -->

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
            </div> <!-- /header -->


            <!-- Page document -->
            <div id="doc-top"></div>
            <div id="doc" class="box">
                <?php if($show_slideshow) include("php/pages/slideshow.php"); ?>

                <div id="doc-text" <?php if($show_slideshow) echo "class=with-slideshow"; ?>>
                    <h2 id="doc-title"><span></span> <?php echo $page['title']; ?></h2>

                    <?php
                        if(!@include($PAGES_DIR.$page['file']))
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
		    if($show_ticker) include("php/pages/ticker.php");
		?>
	    </div>
        </div> <!-- /container -->

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
        </div> <!--/page-->
</body>
</html>
