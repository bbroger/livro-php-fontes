<?php

require_once "core/router.php";

print '<a href="about">About</a><br>';
print '<a href="produtos">Produtos</a><br><br><br>';

route('/', function () {
    return "Hello World";
});

route('/about', function () {
    return "Hello form the about route";
});

route('/como', function () {
    return "Como vai você?";
});

route('/produtos', function () {
    require 'Controller/ProdutosController.php';
    $prod = new ProdutosController();
    echo $prod->index();
});

$action = $_SERVER['REQUEST_URI'];
dispatch($action);
