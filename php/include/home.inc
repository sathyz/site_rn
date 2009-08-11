
<link rel="stylesheet"  type="text/css" href="css/ticker.css" />
<link rel="stylesheet"  type="text/css" href="css/slideshow.css" />
<link rel="stylesheet"  type="text/css" href="css/smoothDivScroll.css" />


<script type="text/javascript" src="js/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="js/jquery.scrollTo-min.js"></script>
<script type="text/javascript" src="js/jquery.smoothDivScroll-0.9-min.js"></script>
<script type="text/javascript" src="js/slideshow.js"></script>


<script type="text/javascript">

$(document).ready(function() {
    setInterval( "slideSwitch()", 5000 );
    $("div#smallScroller").smoothDivScroll({mouseDownSpeedBooster: 2, autoScroll:"always",autoScrollDirection: "endlessloop", pauseAutoScroll: "mouseover"});
});

</script>
