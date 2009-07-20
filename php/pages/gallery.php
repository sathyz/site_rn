<div id="gallery" class="section">
  <ul>
    <?php
        // XXX allow easy way for admin to add images
        // how about using DB?
	$images = array(
	'1_1.jpg',
	'1_2.jpg',
	'1_3.jpg',
	'2_1.jpg',
	'2_2.jpg',
	'3_1.jpg',
	'G1.jpg',
	'G2.jpg',
	);       

	$dir = array(
	'album' => 'images/album/',
	'thumbs' => 'images/thumbs/',
	);


	foreach($images as $image){
          // FIXME handle pagination
          // FIXME remove footer for the image on zooming ( it has NaN and caption as Untitled which looks ugly)
	  echo "<li> "
	       	  ."<a href=$dir[album]$image rel=lightbox[gallery]>"
                    ."<img src=$dir[thumbs]$image>"
                  ."</a>"
               ."</li>";
	}
    ?>
  </ul>
</div>
