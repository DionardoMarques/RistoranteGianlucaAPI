<?php

//Criação das variáveis globais de ambiente que podem ser usadas em qualquer parte da aplicação.
putenv('DISPLAY_ERROS_DETAILS =' . true);

//Definição das informações para acesso do Banco de Dados
putenv('RISTORANTEGIANLUCA_FRANQUIAS_MYSQL_HOST=localhost');
putenv('RISTORANTEGIANLUCA_FRANQUIAS_MYSQL_DBNAME=ristorantegianluca_franquias');
putenv('RISTORANTEGIANLUCA_FRANQUIAS_MYSQL_USER=root');
putenv('RISTORANTEGIANLUCA_FRANQUIAS_MYSQL_PASSWORD=');
putenv('RISTORANTEGIANLUCA_FRANQUIAS_MYSQL_PORT=3306');

putenv('JWT_SECRET_KEY=apirestful');