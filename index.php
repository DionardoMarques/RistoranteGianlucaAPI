<?php

//Inclusão de arquivos (Chamamento)
//O require_once garante que arquivos incluídos anteriormente não serão incluídos novamente na aplicação.
//Ao invés de dar require em todos os arquivos, estarei utilizando o (psr-4) (*Padrão autoload para carregar automaticamente os arquivos) para realizar isso de forma automática no arquivo (composer.json).

require_once './vendor/autoload.php';
require_once './env.php';
require_once './src/slimConfiguration.php';
require_once './src/basicAuth.php';
require_once './src/jwtAuth.php';
require_once './routes/index.php';
