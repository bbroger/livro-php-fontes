<?php

namespace app\controller;

use app\core\Controller;

class ClientesController extends Controller
{
    public function index()
    {
        $this->load('clientes/index');
    }
}
