<!-- Image slideshow -->
    <div class="lpane">
        <!-- <div id="slideshow-logo"> </div> -->
        <div id="slideshow">
        <?php
            require_once("php/config/constants.php");
            //XXX show loading data.. 
            if($show_slideshow){
                require_once('php/util/logo-helper.php');
		
		$ini = parse_ini_file(SETTINGS,true);
		$env = $ini['dir']['root'];
		$ticker_dir = $ini['dir']['ticker'];
		$image_dir = "/{$env}/${ticker_dir}/";
		$slides = get_logos($image_dir);
                /*print_r($slides);
		$slides = array('2.jpg', '3.jpg', '4.jpg');*/

                // XXX: add limit for images to be loaded 
                function print_slide($image, $index, $prefix){
                        echo "<img src='$prefix$image' alt='$image'/>";
                }

                array_walk($slides,'print_slide',$image_dir);
            }
        ?>
        </div> <!-- /slideshow -->
     </div>
