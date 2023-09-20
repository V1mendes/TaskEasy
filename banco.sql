create database cadastro;
use cadastro;

create table cadastros(
id_cad int primary key auto_increment, 
nome_completo varchar(300), 
email varchar(300),
senha  varchar(300)
); 