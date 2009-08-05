<?php
/**
Open the directory and get the files

@param http_img_dir directory to open/read
@return array of files in the directory sorted by name

**/
function get_logos($http_img_dir){
$ROOT = getenv("DOCUMENT_ROOT");

$d = $ROOT . $http_img_dir; //'/var/www/'.'/test/images/Logo'
//echo($d);
$dir = opendir($d); #open directory
$files = array();
while ($f = readdir($dir)) { #read one file name
	//echo $f;
        
	if ($f!=='.' && $f!=='..'){ #if does not match . and ..
	    array_push($files,"$f"); //XXX: this includes any file that is in the directory. Make sure there is no thumbs.db
	}
}
sort($files);
return $files;
}
?>
