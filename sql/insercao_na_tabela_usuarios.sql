INSERT INTO usuarios (
    nome,
    email,
    senha
) VALUES (
    'dionardo',
    'dionardogianluca@gmail.com',
    '$argon2i$v=19$m=65536,t=4,p=1$WEJmOWw0VW1ldGFBd0ZJSQ$UbFmw6cINs16cfWk7y3zDh+pdoI0/7/xosUpg9qMBIY'
);
-- A senha foi gerada a partir do sistema de geração de senhas de Rest do PHP, que é o Password Rest implementado no PHP 7.2 com o Argon2I.
-- Comandos realizados no terminal para geração de senha:
-- php -a
-- echo password_hash('apirestful' , PASSWORD_ARGON2I);
-- A parte que está entre aspas simples é da preferência do usuário, poderá ser qualquer coisa, pois baseado na senha escolhida será gerada a senha baseada no Password Rest.