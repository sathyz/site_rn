<?php
function link_to($conn, $page){
   $_link = get_page_link($conn,$page);
   return "<a href='index.php?page={$_link['name']}'>$_link[display_name]</a>";
}
?>
