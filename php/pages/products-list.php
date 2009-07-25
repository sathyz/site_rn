<div id="products-list" class="lpane">
        <ul class="ul-01">
            <?php
	        $bag_types = get_bag_types($conn);
	        foreach($bag_types as $bag_type){
	            print("<li><a href='index.php?page=products&model=$bag_type[code]'>$bag_type[name]</a></li>");
	        }
	       ?>
        </ul>
</div>
