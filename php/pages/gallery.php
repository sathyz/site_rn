    <?php
        // XXX allow easy way for admin to add images
        // how about using DB?
// include('../util/db.php');
require_once('php/config/constants.php');

function get_images_data($conn,$model){
	$images = get_images($conn, $model);
	//close_db($conn);
        $ini = parse_ini_file(SETTINGS,true);
    
    $data = '';
    if($images){
            $data .= "<ul class='ul-bags' id='thumbs_ul'>";
	foreach($images as $image){
          // FIXME handle pagination
	  $data .= "<li> "
	       	  ."<a href='/{$ini['dir']['root']}/{$ini['dir']['album']}/{$image['model']}/{$image['file']}' rel=lightbox-bags>"
                    ."<img class='thumb_img' src='/{$ini['dir']['root']}/{$ini['dir']['thumbs']}/{$image['model']}/{$image['file']}'>"
                  ."</a>"
               ."</li>";
    }
            $data .= "</ul> <!-- / ul-bags-->";
    }
    return $data;
}
    ?>
