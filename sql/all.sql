CREATE DATABASE ristorantegianluca_franquias CHARACTER SET utf8 COLLATE utf8_general_ci;

USE ristorantegianluca_franquias;

CREATE TABLE franquias (
	id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    nome VARCHAR(100) NOT NULL,
    telefone VARCHAR(13) NOT NULL,
    endereco VARCHAR(200) NOT NULL,
    PRIMARY KEY(id)
);

CREATE TABLE usuarios (
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    nome VARCHAR(200) NOT NULL,
    email VARCHAR(200) UNIQUE NOT NULL,
    senha VARCHAR(200) NOT NULL,
    PRIMARY KEY(id)
);

CREATE TABLE tokens (
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    usuarios_id INT UNSIGNED NOT NULL,
    token VARCHAR(1000) NOT NULL,
    refresh_token VARCHAR(1000) NOT NULL,
    PRIMARY KEY(id),
    expired_at DATETIME NOT NULL,
    active TINYINT UNSIGNED NOT NULL DEFAULT 1,
    CONSTRAINT fk_tokens_usuarios_id_usuarios_id
        FOREIGN KEY (usuarios_id) REFERENCES usuarios(id)
);

INSERT INTO franquias (nome, telefone, endereco)
VALUES  ('Matriz Porto Alegre', '(51)3259-1229', 'Rua 24 de Outubro, 820');

INSERT INTO usuarios (
    nome,
    email,
    senha
) VALUES (
    'dionardo',
    'dionardogianluca@gmail.com',
    '$argon2i$v=19$m=65536,t=4,p=1$WEJmOWw0VW1ldGFBd0ZJSQ$UbFmw6cINs16cfWk7y3zDh+pdoI0/7/xosUpg9qMBIY'
);