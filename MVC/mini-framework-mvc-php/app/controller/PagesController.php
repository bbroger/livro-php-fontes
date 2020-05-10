<?php

namespace app\controller;

use app\core\Controller;

class PagesController extends Controller
{
    public function home()
    {
        $this->load('home/main');
    }

    public function quemSomos()
    {
        $this->load('quem-somos/main');
    }

    public function contato()
    {
        $this->load('contato/main');
    }

    public function contato2()
    {
        $this->load('contato2/main');
    }

    public function cep()
    {
        $this->load('cep/main');
    }
}
