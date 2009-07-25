create table bags(model varchar(2) not null, design INT NOT NULL, compartments INT NOT NULL DEFAULT 0, pockets INT NOT NULL DEFAULT 0, features varchar(8), file varchar(32), id INT NOT NULL AUTO_INCREMENT PRIMARY KEY);

create table features( name varchar(32) not null, code varchar(8) not null unique);

create table bag_types( name varchar(32) not null, code varchar(8) not null unique);
