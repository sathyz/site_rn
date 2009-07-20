
<link rel="stylesheet"  type="text/css" href="css/ticker.css">
<script type="text/javascript" src="js/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="js/jquery.li-scroller.1.0.js"></script>
<script type="text/javascript" src="js/slideshow.js"></script>

<script type="text/javascript">

$(function() {
    setInterval( "slideSwitch()", 5000 );
    $("ul#ticker01").liScroll(); // scroll the logos
});

</script>
