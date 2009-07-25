    <script>
          function showGallery(model){
	  jQuery.get('php/pages/gallery.php?model='+model.href.split('#')[1], function (data){
		  document.getElementById('col-text').innerHTML = data;
	  });
	}
    </script>
    
<div id="products-list" class="lpane">
        <ul class="ul-01">
            <?php
	        $bag_types = get_bag_types($conn);
	        foreach($bag_types as $bag_type){
	            print("<li><a href=#$bag_type[code] onclick='showGallery(this);'>$bag_type[name]</a></li>");
	        }
	       ?>
        </ul>
</div>
