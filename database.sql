CREATE DATABASE imovel;
USE imovel;
CREATE TABLE proprietario(
        CPF varchar(20) PRIMARY KEY,
        nome varchar(50) not null,
        dataNascimento date
    );
CREATE TABLE corretor(
        CPF varchar(20) PRIMARY KEY,
        nome varchar(50) not null,
        dataNascimento date
    );
CREATE TABLE imovel(
        id int PRIMARY KEY AUTO_INCREMENT,
        cidade varchar(20) not null,
        bairro varchar(20) not null,
        rua varchar(50) not null,
        numero int not null,
        complemento varchar(15),
        CEP char(10),
        CPF_prop varchar(20),
        FOREIGN KEY(CPF_prop) REFERENCES proprietario(CPF)
    );
CREATE TABLE inquilino(
        CPF varchar(20) PRIMARY KEY,
        nome varchar(50) not null,
        dataNascimento date,
        salario decimal(7,2),
        id_imovel int,
        FOREIGN KEY(id_imovel) REFERENCES imovel(id)
    );
CREATE TABLE contactar(
        id int PRIMARY KEY AUTO_INCREMENT,
        dataContato date not null,
        CPF_prop varchar(20),
        CPF_Co varchar(20),
        FOREIGN KEY(CPF_prop) REFERENCES proprietario(CPF),
        FOREIGN KEY(CPF_Co) REFERENCES corretor(CPF)
    );
CREATE TABLE atender(
        id int PRIMARY KEY AUTO_INCREMENT,
        dataAtendimento date not null,
        CPF_Co varchar(20),
        CPF_inq varchar(20),
        FOREIGN KEY(CPF_Co) REFERENCES corretor(CPF),
        FOREIGN KEY(CPF_inq) REFERENCES inquilino(CPF)
    );