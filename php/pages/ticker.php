<!-- logo ticker -->
 <div id="smallScroller">
    <div class="scrollingHotSpotLeft"></div>
    <div class="scrollingHotSpotRight"></div>
    <div class="scrollWrapper">
        <div class="scrollableArea">
            <?php
		require_once('php/util/logo-helper.php');
		require_once('php/config/constants.php');
		
		$ini = parse_ini_file(SETTINGS,true);
		$logo_dir = "/{$ini['dir']['root']}/{$ini['dir']['logo']}/";
		
		function add_logo($image, $key, $logo_dir){
			echo "<img src='$logo_dir$image' alt='$image' />";
		}

                $logos = get_logos($logo_dir);
		array_walk($logos, 'add_logo', $logo_dir);
	    ?>
	</div>
    </div>
</div>
