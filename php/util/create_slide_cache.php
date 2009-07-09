<?php
include_once('../../config.php');
$dir = $base_dir.$slideshow_dir;
$filename = $base_dir."php/cache/slideshow.php";

$dh  = opendir($dir);
while (false !== ($fname = readdir($dh))) {
	if($fname != '.' && $fname != '..')
    $files[] = $fname;
}

sort($files);

$content = "<?php \$slides = ".var_export($files, true)."; ?>";

if(is_writable($filename)){
	if (!$handle = fopen($filename, 'w')) {
		echo "Cannot open slideshow cache";
		exit;
	}
	if (fwrite($handle, $content) === FALSE) {
        echo "Cannot write to slideshow cache";
        exit;
    }
    echo "slideshow cache created successfully..";
    fclose($handle);
}else {
    echo "The file slideshow cache is not writable : ".$filename;
}

?>
