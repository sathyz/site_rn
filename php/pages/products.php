<div id="gal-container">
    <div class="album">
    </div>

    <div id="prod-list">
        <ul class="ul-01">
            <?php
            $conn = init_db();
	    $bag_types = get_bag_types($conn);
	    foreach($bag_types as $bag_type){
	        print("<li><a href=#$bag_type[code]>$bag_type[name]</a></li>");
	    }
	    ?>
        </ul>
     </div>
</div>
