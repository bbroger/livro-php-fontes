<?php

namespace App\Controllers;

use \Core\View;

/**
 * Vendedores controller
 *
 * PHP version 7.0
 */
class Vendedores extends \Core\Controller
{

    /**
     * Show the index page
     *
     * @return void
     */
    public function indexAction()
    {
        View::renderTemplate('Vendedores/index.html');
    }

    public function editAction()
    {
        View::renderTemplate('Vendedores/edit.html');
    }

}
