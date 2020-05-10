<?php

$this->get('/', 'PagesController@home');
$this->get('/cep', 'PagesController@cep');
$this->get('/quem-somos', 'PagesController@quemSomos');
$this->get('/contato', 'PagesController@contato');
$this->get('/contato2', 'PagesController@contato2');
$this->get('/clientes', 'ClientesController@index');
