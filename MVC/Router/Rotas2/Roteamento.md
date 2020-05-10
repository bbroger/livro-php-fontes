# Roteamento

Roteamento é o que acontece quando uma aplicação determina qual controller e action será executado baseado em uma URL requisitada.

Uma rota é um caminho para acessar um recurso através da composição de uma URL válida.

Exemplo:
O framework recebe a URL http://localhost/users/list.html e executa o controller Users e o action list().

Nós precisamos ser hábeis para processar qualquer rota que não case com as que nós definimos para existentes controllers e actions ou mostrar uma mensagem de erro apropriada.

Como uma requisição/request é atendida por uma resposta/response:

- A requisição é recebida pela aplicação
- A aplicação quebra a requisição em seus componentes: métodos (GET, POST, etc), host, path, etc.
- A aplicação procura por uma rota definida que case com a requisição
- Logo que encontre ela determina o controller e o action para atendê-la/response


Rotas não semânticas estão desatualizadas. Não existe razão para um usuário ver uma longa cadeia de query strings na URL. URLs assim não são fáceis de memorizar e expoem a configuração do servidor.

Uma classe para roteamento deve ser capaz de distinguir o tipo de HTTP request. Um request tipo GET requisita geralmente o retorno de um ou mais recursos.
O tipo POST cria um novo recurso.
PUP ou PATCH atualiza um existente.
DELETE remove um recurso existente.

## Protocolo HTTP

Ele é responsável por prover uma interface uma interface para a web. Ele permite que ocorra a troca de dados entre um dispositivo cliente e um servidor.

Quando um cliente faz um pedido de uma página (ou qualquer outro recurso) para um servidor que “fala” HTTP, ele está fazendo um Request. O servidor por sua vez tem a habilidade de compreender esse pedido e responder a ele com um Response. Esse ciclo se repete o tempo todo e quando você programa em PHP passa boa parte do tempo fazendo isso acontecer.

A PSR-7 (https://www.php-fig.org/psr/psr-7/) é a especificação de um conjunto de métodos que podem vir a ser usados para gerenciar Requests, Responses, Messages, e etc.

As Messages serão montadas no cliente para compor um Request informando alguns dados, em especial o método (Method) e que as Responses serão criadas no servidor respondendo no mesmo método.

Os métodos HTTP mais comuns são GET e POST.

## Uma classe simples de Rota
```php
<?php
namespace Hero;
class Router
{
    private $routes = [];
  
    /**
         * @return string
         */
        public function method()
        {
            return isset($_SERVER['REQUEST_METHOD']) ? strtolower($_SERVER['REQUEST_METHOD']) : 'cli';
        }
        /**
         * @return string
         */
        public function uri()
        {
            $self = isset($_SERVER['PHP_SELF']) ? str_replace('index.php/', '', $_SERVER['PHP_SELF']) : '';
            $uri = isset($_SERVER['QUERY_STRING']) ? $_SERVER['QUERY_STRING'] : '';
            if ($self !== $uri) {
                $peaces = explode('/', $self);
                array_pop($peaces);
                $start = implode('/', $peaces);
                $search = '/' . preg_quote($start, '/') . '/';
                $uri = preg_replace($search, '', $uri, 1);
                }
            }
            return $uri;
        }

    public function on($method, $path, $callback) 
    { 
        $method = strtolower($method);
        if (!isset($this->routes[$method])) {
            $this->routes[$method] = [];
        }
        $uri = substr($path, 0, 1) !== '/' ? '/' . $path : $path;
        $pattern = str_replace('/', '\/', $uri);
        $route = '/^' . $pattern . '$/';
        $this->routes[$method][$route] = $callback;
        return $this;
    }
  
    function run($method, $uri)
    {
        $method = strtolower($method);
        if (!isset($this->routes[$method])) {
            return null;
        }
        foreach ($this->routes[$method] as $route => $callback) {
            if (preg_match($route, $uri, $parameters)) {
                array_shift($parameters);
                return call_user_func_array($callback, $parameters);
            }
        }
        return null;
    }
}
```
.htaccess

# sudo a2enmod modrewrite
```php
Options +FollowSymLinks

RewriteEngine On
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule ^(.*)$ index.php [NC,L]
```
index.php
```php
<?php
define('__APP_ROOT__', dirname(__DIR__));
require __APP_ROOT__ . '/vendor/autoload.php';
use Hero\Router;
$router = new Router();
$router
    ->on('GET', 'path/to/action', function () {
        return 'this is a hero return';
    });
echo $router->run($router->method(), $router->uri());

composer dump-autoload
```

Quanto mais simples para o desenvolvedor mais popular a ferramenta se torna, mas note que sempre tem um custo simplificar algo.

## Mais detalhes em:

https://phpzm.rocks/php-like-a-boss-3-construa-seu-router-e024ea32ee8a
https://github.com/phpzm/like-a-boss-3
