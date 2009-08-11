<?php

function get_link($page){
	return "<a href='index.php?page={$page['name']}' title='{$page['display_name']}'>{$page['display_name']}</a>";
}

function print_tab_link($link){
	echo "<h3>{$link}</h3>";
}

$tabs = get_tabs($conn);

foreach($tabs as $tab){
	if($tab['external_url']) {
		print_tab_link("<a href='{$tab['external_url']}'>{$tab['display_name']}</a>");
		continue;
	}
	$query = "select name, display_name from pages where tab_id = {$tab['id']}";
	$pages = exec_query($conn, $query);
	print_tab_link(get_link($tab));
        $li = "";
	foreach($pages as $page){
		if(!$page['name'] || $page['name']== $tab['name'] || $page['name']=='404') continue;
		$li .= "<li>". get_link($page) . "</li>";
	}

	if($li) echo "<ul class='ul-01'>{$li}</ul>";
}

?>
