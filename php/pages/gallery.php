  <ul>
    <?php
        // XXX allow easy way for admin to add images
        // how about using DB?
        include('../util/db.php');
        $conn = init_db();
	$images = get_images($conn, $_REQUEST['model']);
	close_db($conn);
	$dir = array(
	'album' => '/test/images/album/',
	'thumbs' => '/test/images/thumbs/',
	);

        if($images){
	foreach($images as $image){
          // FIXME handle pagination
          // FIXME remove footer for the image on zooming ( it has NaN and caption as Untitled which looks ugly)
	  echo "<li> "
	       	  ."<a href=$dir[album]$image[file] rel=lightbox[gallery]>"
                    ."<img src=$dir[thumbs]$image[file]>"
                  ."</a>"
               ."</li>";
	}
	}
    ?>
  </ul>
