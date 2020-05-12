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
