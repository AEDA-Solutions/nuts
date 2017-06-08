CREATE DATABASE Nuts;

use `Nuts`;

create table netdata 
(
	id int (11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    latitude float DEFAULT NULL,
	longitude float DEFAULT NULL,
    ping float DEFAULT NULL,
    packetloss float DEFAULT NULL,
    download_speed float DEFAULT NULL,
    gitter float

);

create table users 
(
	id varchar (9) NOT NULL PRIMARY KEY,
    `name` varchar (100) NOT NULL,
    email varchar (100) NOT NULL,
    `password` varchar (32) NOT NULL,
    course varchar (100) NOT NULL

);
