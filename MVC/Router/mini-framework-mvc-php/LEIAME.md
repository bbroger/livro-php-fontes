Executar

composer update

Trocar o .htaccess original do raiz por este

RewriteEngine on
RewriteRule ^(.*) public/$1 [L]


Ajustar a constante BASE em app/config/config.php para o diretório do aplicativo

define('BASE', '/mini-framework-mvc-php/');

Pode ser alterado

O arquivo para se alterar e adicionar rotas fica em
app/config/Router.php

Para adicionar outra estrutura:
- Adicionar um método num controller existente ou criar um novo controller: controller/ClientesController.php
- Adicionar a respectiva view: app/view/clientes
- Adicionar a entrada no Routes: $this->get('/clientes', 'ClientesController@index');

Para adicionar a entrada ao menu
- app/view/partials
Editar o arquivo header.twig.php

Original
https://github.com/satellasoft/mini-framework-mvc-php
https://www.youtube.com/watch?v=A1rVfAZ4hk8&list=PLuJ48A-nezofjoofb9b62TxoSCg9zSQmI&index=2

