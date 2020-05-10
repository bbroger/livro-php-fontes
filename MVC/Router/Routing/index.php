<?php

//require 'uteis.php';
require 'Router.php';

/**
 * Create a new router instance.
 */
$router = new Router($_SERVER);

/**
 * Add a "hello" route that prints to the screen.
 */
$router->addRoute('hello', function() {
    echo 'Well, hello there!!';
});

$router->addRoute('vai', function() {
    echo 'Como vai?!';
});

// O primeiro parâmetro não deve ser precedido de barra (/)
$router->addRoute('index', function() {
    require_once 'views/index.php';
});

/**
 * Run it!
 */
$router->run();

