<?php

// Carregar as configurações da aplicação (error reporting etc.)
require_once 'config.php';
require_once 'Router.php';

// Iniciar a aplicação através do Router
$app = new Router();
