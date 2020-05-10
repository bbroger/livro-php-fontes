<?php

namespace App\Controllers;

use \Core\View;

/**
 * Clientes controller
 *
 * PHP version 7.0
 */
class Clientes extends \Core\Controller
{

    /**
     * Show the index page
     *
     * @return void
     */
    public function indexAction()
    {
        View::renderTemplate('Clientes/index.html');
    }

    public function editAction()
    {
        View::renderTemplate('Clientes/edit.html');
    }

}
