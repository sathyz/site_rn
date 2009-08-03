
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
