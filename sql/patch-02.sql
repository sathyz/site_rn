#
# Author : Satheesh Kumar Mohan <sathyz@gmail.com>
# Date : Jul 29, 2009
# 1. Use RN for home tab, place holder till we fix showing rn log in the tab 
# 2. Added tab blogs, TODO: blogs tab is an external link should handle that.
update tabs set display_name = 'RN' where name = 'home';
insert into tabs(name,display_name, tab_index) values ('blogs','Blogs',8);
