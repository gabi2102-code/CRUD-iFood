create database ifood;
use ifood;

create table clientes(
    id int auto_increment primary key,
    nome varchar(100) not null,
    email varchar(100) not null,
    telefone varchar(20)
    endereco varchar (200)
);

create table restaurante(
    id int auto_increment primary key,
    nome varchar(100) not null,
    categoria varchar(100) not null,
    telefone varchar(20),
    endereco varchar (20),
    
);

create table pedidos(
    id int auto_increment primary key,
    cliente_id int not null,
    restaurante_id int not null,
    data_pedido datetime  not null,
    valor decimal (10,2) not null,
    status varchar (50) not null
   
    foreign key (cliente_id) references clientes(id)
    foreign key (restaurante_id) references restaurante(id)
);
