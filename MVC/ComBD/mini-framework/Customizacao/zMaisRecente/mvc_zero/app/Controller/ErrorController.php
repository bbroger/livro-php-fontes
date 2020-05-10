<?php
declare(strict_types = 1);
namespace Mvc\Controller;

class ErrorController
{
    public function index($controller = null, $action = null)
    {
        // load views
        require APP . 'templates/_includes/header.php';
        require APP . 'templates/error/index.php';
        require APP . 'templates/_includes/footer.php';
    }
}

