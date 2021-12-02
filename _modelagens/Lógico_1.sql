/* Lógico_1: */

CREATE TABLE contatos (
    endereco varchar(150),
    desc varchar(280),
    fone varchar(15),
    nome varchar(200),
    id int PRIMARY KEY,
    users_id bigint
);

CREATE TABLE clientes (
    id bigint PRIMARY KEY,
    nome varchar(200),
    endereco varchar(150),
    cadastro_nacional varchar(14) UNIQUE,
    cep varchar(8),
    fone varchar(15),
    obs varchar(280),
    contato_id int,
    cidade_id int,
    users_id bigint
);

CREATE TABLE cidades (
    id int PRIMARY KEY,
    name varchar(64),
    estado_id int
);

CREATE TABLE estados (
    id int PRIMARY KEY,
    name varchar(64),
    abbr varchar(2),
    UNIQUE (abbr, name)
);

CREATE TABLE ctes (
    id bigint PRIMARY KEY,
    numero_nf varchar(20),
    valor_nf double,
    numero_cte varchar(20),
    valor_cte double,
    data_chegada date,
    data_entrega date,
    tipo_pagamento enum('CIF', 'FOB'),
    volume int,
    obs varchar(280),
    pode_alterar tinyint,
    finalizado tinyint,
    remetente_id bigint,
    destinatario_id clientes,
    user_id bigint,
    cidade_remetente_id int,
    cidade_destinataria_id cidades,
    transportadora_id int,
    UNIQUE (numero_cte, numero_nf)
);

CREATE TABLE users (
    id bigint PRIMARY KEY,
    nome varchar(200),
    email varchar(100) UNIQUE,
    password varchar(100),
    ssw_usuario varchar(50),
    ssw_senha varchar(100),
    ssw_cpf varchar(11),
    ssw_dom varchar(10)
);

CREATE TABLE despesas (
    id bigint(20) PRIMARY KEY,
    categoria enum('Água', 'Luz', 'Aluguel', 'Manutenção', 'Outros'),
    data date,
    valor double,
    user_id bigint
);

CREATE TABLE transportadoras (
    id int PRIMARY KEY,
    cnpj varchar(14) UNIQUE,
    nome varchar(200)
);
 
ALTER TABLE contatos ADD CONSTRAINT FK_contatos_2
    FOREIGN KEY (users_id)
    REFERENCES users (id)
    ON DELETE CASCADE;
 
ALTER TABLE clientes ADD CONSTRAINT FK_clientes_2
    FOREIGN KEY (contato_id)
    REFERENCES contatos (id)
    ON DELETE CASCADE;
 
ALTER TABLE clientes ADD CONSTRAINT FK_clientes_3
    FOREIGN KEY (cidade_id)
    REFERENCES cidades (id)
    ON DELETE RESTRICT;
 
ALTER TABLE clientes ADD CONSTRAINT FK_clientes_4
    FOREIGN KEY (users_id)
    REFERENCES users (id)
    ON DELETE CASCADE;
 
ALTER TABLE cidades ADD CONSTRAINT FK_cidades_2
    FOREIGN KEY (estado_id)
    REFERENCES estados (id)
    ON DELETE CASCADE;
 
ALTER TABLE ctes ADD CONSTRAINT FK_ctes_2
    FOREIGN KEY (remetente_id, destinatario_id)
    REFERENCES clientes (id, id)
    ON DELETE RESTRICT;
 
ALTER TABLE ctes ADD CONSTRAINT FK_ctes_3
    FOREIGN KEY (user_id)
    REFERENCES users (id)
    ON DELETE CASCADE;
 
ALTER TABLE ctes ADD CONSTRAINT FK_ctes_4
    FOREIGN KEY (cidade_remetente_id, cidade_destinataria_id)
    REFERENCES cidades (id, id)
    ON DELETE CASCADE;
 
ALTER TABLE ctes ADD CONSTRAINT FK_ctes_5
    FOREIGN KEY (transportadora_id)
    REFERENCES transportadoras (id)
    ON DELETE CASCADE;
 
ALTER TABLE despesas ADD CONSTRAINT FK_despesas_2
    FOREIGN KEY (user_id)
    REFERENCES users (id)
    ON DELETE CASCADE;