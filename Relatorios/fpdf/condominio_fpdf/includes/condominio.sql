CREATE TABLE recibos (
    codigo int not null auto_increment primary key,
    nome character(40),
    vencimento date,
    agua_total numeric(12,2),
    pessoas_total integer,
    apartamento character(3),
    pessoas integer,
    cota_agua numeric(12,2),
    cota_condominio numeric(12,2),
    cota_reserva numeric(12,2)
);

CREATE TABLE usuario (
    login char(12) primary key,
    senha character(32) NOT NULL,
    nome character(45) NOT NULL,
    email character(50)
);

CREATE TABLE despesas (
    codigo int AUTO_INCREMENT PRIMARY KEY,
    descricao character(40),
    data date,
    unidade character(3),
    quantidade numeric(12,2),
    preco_unit numeric(12,2)
);
