/* Criando o Banco de Dados com as tabelas */

CREATE DATABASE Nuts;

use `Nuts`;

create table netdata 
(
    id int (11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    latitude float DEFAULT NULL,
    longitude float DEFAULT NULL,
    usertime datetime NOT NULL DEFAULT GETDATE(),
    ping float DEFAULT NULL,
    packetloss float DEFAULT NULL,
    download_speed float DEFAULT NULL,
    upload_speed float DEFAULT NULL,
    jitter float DEFAULT NULL,
    user_avaliation int DEFAULT NULL

);

create table users 
(
    id int (11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    reg varchar (12) NOT NULL,
    name varchar (100) NOT NULL,
    email varchar (100) NOT NULL,
    password varchar (32) NOT NULL,
    course varchar (100) NOT NULL

);

            /* Adicionando as chaves estrangeiras. */


    alter table netdata
    add column fk_user int (11);

    alter table netdata
    add foreign key (fk_user)
    references users (id);
    

   ;
    
    


    /*      ***FUNÇÃO SELECT DE USUARIOS ASSOCIADOS AOS SEUS NETDATAS A SER APLICADO***
    
    
    
        select users.name, netdata.latitude, netdata.longitude, netdata.ping,
        netdata.download_speed, netdta.upload_speed, netdata.pacletloss, netdata.gitter
        
        from netdata join users
        
        on users.id = netdata.fk_users;
    
    
    */
