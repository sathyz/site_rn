    <?php
        // XXX allow easy way for admin to add images
        // how about using DB?
// include('../util/db.php');

function get_images_data($conn,$model){
	$images = get_images($conn, $model);
	//close_db($conn);
	$dir = array(
	'album' => '/test/images/album/',
	'thumbs' => '/test/images/thumbs/',
	);
    
    $data = '';
    if($images){
            $data .= "<ul class='ul-bags'";
	foreach($images as $image){
          // FIXME handle pagination
          // FIXME remove footer for the image on zooming ( it has NaN and caption as Untitled which looks ugly)
	  $data .= "<li> "
	       	  ."<a href=$dir[album]$image[file] rel=lightbox-bags>"
                    ."<img src=$dir[thumbs]$image[file]>"
                  ."</a>"
               ."</li>";
    }
            $data .= "</ul> <!-- / ul-bags-->";
    }
    return $data;
}
    ?>
