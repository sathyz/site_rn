<?php
include('php/util/db.php');

function get_files($dir){
	print("reading files for {$dir} <br/>");
	$d = opendir($dir);
	$files = array();
	while($f = readdir($d)){
		if ($f!=='.' && $f!=='..' && $f!=='_info.txt'){
			array_push($files,$f);
		}
	}
	return $files;
}

function save_bag($conn,$model, $filename){
	preg_match('/(?<model>[A-Z]+)(?<design>\d\d\d)(?<compartments>\d\d)(?<pockets>\d)(?<features>\w?)(?<ext>\.\w+)/', $filename, $matches);
	//XXX: Problem in this regex. doesn't work in php4
	$query = "insert into bags(model, design, compartments, pockets, features, file) values (" . 
          "'{$model}', {$matches['design']}, {$matches['compartments']}, {$matches['pockets']}," .
	  "'{$matches['features']}', '{$filename}');";
	print($query );//exec_query($conn, $query);
	run_query($conn,$query);
        print(".. DONE<br/>");
}

function is_bag_in_db($conn,$model, $bag){
	$query = "select id from bags where model = '{$model}' and file = '{$bag}'";
	$res = exec_query($conn,$query);
        print("{$query} - ");
        print_r($res);
	return isset($res[0]['id']);
}

function get_bags_from_db($conn){
	$query = "select id,model,file from bags";
	$res = exec_query($conn, $query);
	return $res;
}

function delete_bags($conn, $bags){
	 if(!$bags) return;

         if (sizeof($bags) == 1)
		$where = " id = {$bags[0]} ";
	 else
		$where = " id in (" . implode(',', $bags) . ") ";
         $query = "delete from bags where " . $where;
         print($query);
         run_query($conn, $query);
	 print(".. DONE<br/>");
}

require_once("php/config/constants.php");
$ini = parse_ini_file(SETTINGS,true);
$root = getenv('DOCUMENT_ROOT');
$album = "/{$root}/{$ini['dir']['root']}/{$ini['dir']['album']}";
$conn = init_db();

$bags_in_db = get_bags_from_db($conn);
$obsolete_files = array();
if($bags_in_db){
	foreach($bags_in_db as $rec){
		if(!file_exists("{$album}/{$rec['model']}/{$rec['file']}")){
			array_push($obsolete_files, $rec['id']);
		}
	}
}

delete_bags($conn, $obsolete_files);

$models = get_files($album);

foreach($models as $model){
	$pics = get_files($album.'/'.$model);
	foreach($pics as $pic){
		if(!is_bag_in_db($conn,$model,$pic)){
			save_bag($conn,$model,$pic);	
		}			
	}
}


//print($matches['model']." - ".$matches['design']." - ". $matches['compartments']. " - ". $matches['pockets']. " - " .$matches['features']);

//if(!isset($matches['features']) or !$matches['features']) $matches['features'] = 'null';

//print_r($matches);
//print_r($obsolete_files);
close_db($conn);
?>
