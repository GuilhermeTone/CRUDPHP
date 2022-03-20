create database titansoftware;

use titansoftware;

create table produtotitan (
-- usei o collate latin1_general_ci para ser indiferente maiusculas e minusculas
produto_id int AUTO_INCREMENT PRIMARY KEY ,
produtos varchar(250) COLLATE latin1_general_ci,
cor varchar(250) COLLATE latin1_general_ci,
preco decimal (8,2)
);