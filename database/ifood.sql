create database ifood;
use ifood;

create table clientes(
    id int auto_increment primary key,
    nome varchar(100) not null,
    email varchar(100) not null,
    telefone varchar(20)
);

create table restaurante(
    id int auto_increment primary key,
    nome varchar(100) not null,
    categoria varchar(50) not null,
    telefone varchar(20),
    endereco int,
    foreign key (cliente_id) references clientes(id)
    
);

create table pedidos(
    id int auto_increment primary key,
    cliente_id varchar(100) not null,
    restaurante_id varchar(50) not null,
    data_pedido varchar(20),
    data_pedidos 
    foreign key (cliente_id) references clientes(id)
    
);
