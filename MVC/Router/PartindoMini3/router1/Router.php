<?php

class Router
{
    private $urlController;
    private $urlAction;
    private $urlParam;
    private $url;

    public function __construct(){
        // Chamando o método url()
        $this->url();

        // Capturando a posição do controller, action e param da URL
        $this->urlController = isset($this->url[0]) ? $this->url[0] : null;
        $this->urlAction = isset($this->url[1]) ? $this->url[1] : 'index';// index é o action default
        $this->urlParams = array_values($this->url);
        $this->urlParams = array_splice($this->urlParams, 2);// Reduzindo o array de params

        // Armazenando em $file o path completo do controller atual para file_exists($file)
        $file = SRC . 'Controller/' . ucfirst($this->urlController) . 'Controller.php';

        // Caso não encontre um controller
        if(!$this->urlController){
            require_once SRC.'Controller'.DIRECTORY_SEPARATOR . ucfirst(CONTROLLER_DEFAULT).'Controller.php';
			// Se nenhum controller for encontrado chame o Controller default com a index action
			$controllerDefault = ucfirst(CONTROLLER_DEFAULT) . 'Controller';
			$page = new $controllerDefault;
            $page->index();// Assume como default clientes/index

        // Se o arquivo do controller existir
        }elseif(file_exists($file)){
            require_once SRC.'Controller'.DIRECTORY_SEPARATOR . ucfirst($this->urlController).'Controller.php';
            $controller = ucfirst($this->urlController) . 'Controller';
            $this->urlController = new $controller();

            // Caso o action exista e seja chamável
            if(method_exists($controller, $this->urlAction) && is_callable(array($controller, $this->urlAction))){
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
            require_once SRC.'Controller'.DIRECTORY_SEPARATOR . 'ErrorsController.php';
			$action = $this->urlAction;
            $page = new ErrorsController();
            $page->index($action,$this->urlController);
        }
    }

    // Criar função que receba o diretório atual (BASE_DIR), peque o count e então remova a primeira parte, deixando apenas o 
    // controller e action, param
    // Os segmentos controller,action e param serão fixos independente do  nível do diretório do aplicativo
    private function url(){
        $this->url = explode('/', URI);// Captura a URL
        $ret = array_search(DIR_NAME,$this->url); // Captura o índice de DIR_NAME que se soma a 1 abaixo
        // Caso o aplicativo seja instalado no quarto nível abaixo do raiz, então somar 4 para que fique $ret+5 abaixo
        $this->url = array_splice($this->url, $ret+1); // Remove todos os elementos da URL, deixando apenas controller, action e param
        return $this->url;
    }
}
