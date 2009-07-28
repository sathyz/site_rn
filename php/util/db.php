<?php
define('SETTINGS','php/config/settings.ini');

function init_db(){
        $ini = parse_ini_file(SETTINGS,true);
	$host = $ini['db']['host'];
	$user = $ini['db']["username"];
	$password = $ini['db']['passwd'];
	$db = $ini['db']['db'];
	
	$conn = mysql_connect($host,$user,$password) or die(mysql_error());
//	print("mysql_connect $host, $user, $password ");	
	
	mysql_select_db($db);
//	print("mysql_select_db $db");	
	return $conn;
}

function exec_query( $conn,$query){
	$res = mysql_query($query, $conn)
		or die(mysql_errno().', '.mysql_error());
	
   while ($row = mysql_fetch_assoc($res)) {
       $return[] = $row;
   }
//   mysql_free_result($res);
//   print_r($return);
   return $return;
}

function get_tabs($conn){
	//$query = "select name, display_name, file from pages order by page_index";
	$query = "select name, display_name from tabs where tab_index > -1 order by tab_index";
	return exec_query($conn, $query);
}

function get_page($conn, $page_name){
	$query = "select page.name as name, page.display_name as title, " 
		."page.file as file, "
		."(select name from tabs where id = page.tab_id) as tab " 
		."from pages page  " 
		."where page.name='$page_name'";
//	print("$query");
	$res = exec_query($conn,$query);
	
	if(!$res){
		return get_page($conn, "404");
	}
	
	return $res[0];
}

function get_bag_types($conn){
        $query = "select name as name,code as code from bag_types "
                 . " order by lower(name)";
        return exec_query($conn, $query);
}

function get_images($conn, $model){
	$query = "select file from bags where model='$model' and file is not null";
	return exec_query($conn, $query);
}

function close_db($conn){
	mysql_close($conn);
}

?>
