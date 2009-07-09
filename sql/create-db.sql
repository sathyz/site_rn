create table pages(  name varchar(30) unique not null, id INT NOT NULL AUTO_INCREMENT PRIMARY KEY, display_name varchar(50) not null, page_index INT NOT NULL DEFAULT 0, file varchar(30) not null);


CREATE TABLE `tabs` (
`id` INT NOT NULL AUTO_INCREMENT ,
`name` VARCHAR( 30 ) NOT NULL ,
`display_name` VARCHAR( 64 ) ,
`tab_index` INT DEFAULT '-1' NOT NULL ,
PRIMARY KEY ( `id` ) ,
UNIQUE (
`name`
)
) TYPE = MYISAM ;

CREATE TABLE `pages` (
`name` VARCHAR( 32 ) NOT NULL ,
`id` INT NOT NULL AUTO_INCREMENT ,
`display_name` VARCHAR( 64 ) NOT NULL ,
`file` VARCHAR( 32 ) NOT NULL ,
`tab_id` INT DEFAULT '1' NOT NULL ,
PRIMARY KEY ( `id` ) ,
UNIQUE (
`name`
)
) TYPE = MYISAM ;
