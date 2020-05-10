<?php

// Mostra o diretório atual /backup/www/router, independente de em que nível esteja
define('ROOT', dirname(__DIR__) . DIRECTORY_SEPARATOR . basename(__DIR__) . DIRECTORY_SEPARATOR );///backup/www/testes/tt/router/
define('SRC', ROOT . 'src' . DIRECTORY_SEPARATOR); // /backup/www/src
define('CONTROLLER_DEFAULT', 'Clientes');

function dd($params = [], $die = true){
    echo '<pre>';
    print_r($params);
    echo '</pre>';

    if ($die) die();
}

