<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<?php
include('php/util/db.php');
include('php/util/common.php');

$q = isset($_REQUEST["page"])?$_REQUEST["page"]:"home" ;
$PAGES_DIR = "./php/pages/";
$conn = init_db();
$page = get_page($conn,$q);
$tabs = get_tabs($conn);
//page - file, name, display_name

$show_ticker = $show_slideshow = ($q == "home");
?>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta http-equiv="content-language" content="en" />
    <meta name="robots" content="all,follow" />

    <meta name="author" lang="en" content="All: Satheesh Kumar M [sathyz.wordpress.com]; e-mail: sathyz@gmail.com" />

    <meta name="description" content="..." />
    <meta name="keywords" content="..." />

    <link rel="stylesheet" media="screen,projection" type="text/css" href="css/reset.css" />
    <link rel="stylesheet" media="screen,projection" type="text/css" href="css/main.css" />
    <!--[if lte IE 6]><link rel="stylesheet" type="text/css" href="css/main-msie.css" /><![endif]-->
    <link rel="stylesheet" media="screen,projection" type="text/css" href="css/style.css" />
    <link rel="stylesheet" media="print" type="text/css" href="css/print.css" />

    <?php
        @include("php/include/{$q}.inc");
    ?>
    
    <title>Rainbow Novelties <?php if($page['title'])echo "- " . $page['title'];?></title>
</head>

<body>

<div id="main">

    <!-- Header -->
    <div id="header">



    </div> <!-- /header -->
    
    <!-- Tray -->
    <div id="tray">

        <ul>
                         <?php
                             foreach($tabs as $tab){
                                 $url = $tab['external_url']? "'{$tab['external_url']}' target='_blank'":"'index.php?page={$tab['name']}'";
                                 print("<li ".($tab['name']==$page['tab']? "id='tray-active'":""). ">"
                                        ."<a href={$url}>{$tab['display_name']}</a>"
                                        ."</li>");
                             }
                         ?>
        </ul>
        
        <!-- Search -->
        <div id="search" class="box">
            <form action="http://www.google.com/search" target="new" method="get">
                <div class="box">
                    <div id="search-input"><span class="noscreen">Search:</span><input type="text" size="30" name="q" value="Search" /></div>
                    <div id="search-submit"><input type="image" src="design/search-submit.gif" value="OK" /></div>
                    <input type="hidden" name="sitesearch" value="www.rainbownovelties.in"/>
                </div>
            </form>
        </div> <!-- /search -->

    <hr class="noscreen" />
    </div> <!-- /tray -->

    <!-- Promo -->
    <div id="col-top"></div>
    <div id="col" class="box">
    
        
        <!-- space for slideshow -->
        <?php 
        $split_page = true;
        if($show_slideshow) include("php/pages/slideshow.php"); 	
        else $split_page = false; // if not any of the above cases
        ?>

        <div id="col-text" <?php if($split_page) print("class='rpane'")?>>

                <?php
                    if($page['title']){
                        print("<h2 id='slogan'><span></span>{$page['title']}</h2>");
                    }
                    if(!@include($PAGES_DIR.$page['file'])){
                             echo "Page under construction";
                    }
                    // the file is not present...
                ?>      
        </div> <!-- /col-text -->
    
    </div> <!-- /col -->
    <div id="col-bottom"></div>
    
    <hr class="noscreen" />
    

    <!-- Footer -->
    <div id="footer">
        <?php
        if($show_ticker) include("php/pages/ticker.php");
        ?>
        <p class="f-right">
        <?php
         $_links = array('privacy', 'disclaimer', 'terms', 'site_map');
         foreach($_links as $_link){
            print(link_to($conn, $_link)." ");
         }
         ?>
        </p>

        <p>Copyright &copy;&nbsp;2009 <strong><a href="index.php">Rainbow Novelties</a></strong>, All Rights Reserved &reg;. Site by <a href="http://twitter.com/sathyz" target="_blank">sathyz</a> </p>

    </div> <!-- /footer -->

</div> <!-- /main -->
<?php close_db($conn);?>
</body>
</html>
