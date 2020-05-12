CREATE DATABASE ristorantegianluca_franquias CHARACTER SET utf8 COLLATE utf8_general_ci;

USE ristorantegianluca_franquias;

CREATE TABLE franquias (
	id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    nome VARCHAR(100) NOT NULL,
    telefone VARCHAR(13) NOT NULL,
    endereco VARCHAR(200) NOT NULL,
    PRIMARY KEY(id)
);