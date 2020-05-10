<?php

// Mostra o diretório atual /backup/www/router, independente de em que nível esteja
define('ROOT', dirname(__DIR__) . DIRECTORY_SEPARATOR . basename(__DIR__) . DIRECTORY_SEPARATOR );///backup/www/testes/tt/router/
define('SRC', ROOT . 'src' . DIRECTORY_SEPARATOR); // /backup/www/src
define('BASE_DIR', __DIR__);
define('URI',$_SERVER['REQUEST_URI']);
define('URL_PUBLIC_FOLDER', 'public');
define('URL_PROTOCOL', '//');
define('URL_DOMAIN', $_SERVER['HTTP_HOST']);
define('URL_SUB_FOLDER', str_replace(URL_PUBLIC_FOLDER, '', dirname($_SERVER['SCRIPT_NAME'])));
define('URL', URL_PROTOCOL . URL_DOMAIN . URL_SUB_FOLDER);
define('CONTROLLER_DEFAULT', 'clientes');
define('DIR_NAME', 'router');// Nome do diretório do aplicativo

function dd($params = [], $die = true)
{
    echo '<pre>';
    print_r($params);
    echo '</pre>';

    if ($die) die();
}

