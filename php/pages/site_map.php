<h3><a href='index.php?page=home' title='RN'>RN</a></h3>
    <ul class='ul-01'>
        <li><a href='index.php?page=privacy' title='Privacy Policy'>Privacy Policy</a></li>
        <li><a href='index.php?page=disclaimer' title='Legal Disclaimer'>Legal Disclaimer</a></li>
        <li><a href='index.php?page=terms' title='Terms of Use'>Terms of Use</a></li>
    </ul>

<h3><a href='index.php?page=about' title='About'>About</a></h3>

<h3><a href='index.php?page=products' title='Products'>Products</a></h3>
    <ul class='ul-01'>
        <li><a href='index.php?page=products&amp;model=CA' title='Casual Bags'>Casual Bags</a></li>
        <li><a href='index.php?page=products&amp;model=FI' title='Executive Bags'>Executive Bags</a></li>
        <li><a href='index.php?page=products&amp;model=IN' title='Industrial Bags'>Industrial Bags</a></li>
        <li><a href='index.php?page=products&amp;model=LS' title='Ladies Bags'>Ladies Bags</a></li>
        <li><a href='index.php?page=products&amp;model=LP' title='Laptop Backpacks'>Laptop Backpacks</a></li>
        <li><a href='index.php?page=products&amp;model=SC' title='School/Tiffin Bags'>School/Tiffin Bags</a></li>
        <li><a href='index.php?page=products&amp;model=SH' title='Shopping Bags'>Shopping Bags</a></li>
        <li><a href='index.php?page=products&amp;model=TR' title='Travel Bags'>Travel Bags</a></li>

    </ul>

<h3><a href='index.php?page=services' title='Services'>Services</a></h3>

<h3><a href='index.php?page=b2b' title='B2B'>B2B</a></h3>

<h3><a href='index.php?page=careers' title='Careers'>Careers</a></h3>

<h3><a href='http://rainbownovelties.wordpress.com/'>Blog</a></h3>

<h3><a href='index.php?page=contact' title='Contact Us'>Contact Us</a></h3>



<?php
/*
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
*/
?>
