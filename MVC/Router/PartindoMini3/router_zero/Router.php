<?php

require 'Controller/ClientesController.php';

class Router
{
    private $urlController;
    private $urlAction;
    private $urlParam;
    private $url;

    public function __construct(){
        // Chamando o método url()
        $this->url();

        // Capturando a posição do controller, action e params da URL
        $this->urlController = isset($this->url[0]) ? $this->url[0] : null;
        $this->urlAction = isset($this->url[1]) ? $this->url[1] : 'index';// index é o action default

        $this->urlParams = array_values($this->url);
        $this->urlParams = array_splice($this->urlParams, 2);// Reduzindo o array de params

        // Caso não encontre um controller, execute o default com o action default
        if(!$this->urlController){
                    $this->urlController = new ClientesController();
                    $this->urlController->index();
        // Se o arquivo do controller existir
        }elseif(file_exists('Controller/ClientesController.php')){
            $this->urlController = new ClientesController();

            // Caso o action exista e seja chamável
            if(method_exists($this->urlController, $this->urlAction) && is_callable(array($this->urlController, $this->urlAction))){
				// Checar se os parâmetros não são vazios
                if (!empty($this->urlParams)) {
                    // Se existe chame o método e passe os argumentos para ele

                    call_user_func_array(array($this->urlController, $this->urlAction), $this->urlParams);
                // Caso o parâmetro seja vazio, chame o controller e o action
                } else {
                    $this->urlController->{$this->urlAction}();
                }
            // Caso o método não exista
            }elseif (strlen($this->urlAction) == 0) {// Caso nada exista na posição do action
                $this->urlController->index();
            // Caso apareça um action que não existe
            }else{ 
                echo '<h3>Método "'.$this->urlAction . '" não existe</h3>';
            }
        // Caso o controller não seja encontrado dispara o ErrorsController, passando action e controller como argumentos
        }else{
            $controller = 'Controller/ClientesController';
            if(method_exists($controller, $this->urlAction) && is_callable(array($controller, $this->urlAction))){
                $this->urlController = new ClientesController();
			    $action = $this->urlAction;
            }else{
                echo '<h3>Controller '.$this->urlController.' e/ou método "'.$this->urlAction . '" não existem</h3>';
            }
        }
    }

    // url2 recebe o diretório atual em path cheio
    // url1 recebe a URL cheia, menos o host
    // url recebe a diferença entre ambos, que é representada apenas pelo controller, action e params
    private function url(){
        $url2 = explode('/', dirname(dirname(__DIR__)));// Captura a URL
        $url1 = explode('/', $_SERVER['REQUEST_URI']);// Captura a URL

        $this->url=array();
        foreach($url1 as $value) {
            if(in_array($value, $url2)) {
                continue; // Cai fora do laço
            }else{
                array_push($this->url,$value); // Adiciona ao array
            }
        }
        return $this->url;
    }
}
