<?php

namespace Mvc\Controller;

class ErrorsController
{
    public function index($controller, $action)
    {
        require SRC . 'views/errors/index.php';
    }
}

