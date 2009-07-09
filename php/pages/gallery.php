<table>


<?php

$dir = '/var/www/test/images/thumbs/';
//print("$dir");

$dh  = opendir($dir);
while (false !== ($filename = readdir($dh))) {
	if($filename != '.' && $filename != '..')
    $files[] = $filename;
}

for($i=0; $i<$files.size; $i++){
echo("<tr><td>$files[$i]</td></tr>")
}
?>




</table>