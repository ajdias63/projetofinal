create database login;

use login;

create table pacientes(
    idusuario int primary key auto_increment,
    nome varchar (30),
    telefone varchar (15),
    email varchar (30),
    foto varchar (30),
    login varchar (20) unique,
    senha varchar (50),
    perfil enum ('adm','user')
);
insert into pacientes values (null,'anna julia', '1111-2222', 'annaj@gmail.com', 'foto1.jpg', 'administrador',md5('2208'),'adm');
insert into pacientes values (null,'maria', '2222-5555', 'maria@gmail.com', 'foto2.jpg', 'usuario',md5('abc'),'user');


select * from pacientes;