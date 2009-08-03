update tabs set tab_index=8 where name='contact';
update tabs set tab_index=7, display_name='Blog' where name='blogs';

update pages set display_name=null where name='home';

alter table tabs add column external_url varchar(128);
update tabs set external_url='http://rainbownovelties.wordpress.com/' where name='blogs';

insert into pages (name, display_name, file, tab_id) values ('privacy', 'Privacy Policy', 'privacy.html', 1);
insert into pages (name, display_name, file, tab_id) values ('disclaimer', 'Legal Displaimer', 'disclaimer.html', 1);
insert into pages (name, display_name, file, tab_id) values ('terms', 'Terms of Use', 'terms.html', 1);
insert into pages (name, display_name, file, tab_id) values ('site_map', 'Site map', 'site_map.php', 1);
