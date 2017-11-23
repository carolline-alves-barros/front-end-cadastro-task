create database task;

use task;

CREATE TABLE users (
id int(11) NOT NULL auto_increment,
nome varchar(100) NOT NULL,
descricao varchar(100) NOT NULL,
prioridade varchar(2) NOT NULL,
usuario varchar(100) NOT NULL,
PRIMARY KEY (id)
);