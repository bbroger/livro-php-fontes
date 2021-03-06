<?php
declare(strict_types = 1);
namespace Mini\View;

class ClientesView
{
    // Os que recebem null como default é por conta de que alguns actions não os usam como o add()
	public function render($controller, $action, $todos=null, $soma=null,$um=null){
        require_once SRC . 'templates/_includes/header.php';
        require_once SRC . 'templates/'.$controller.'/'.$action.'.php';
        require_once SRC . 'templates/_includes/footer.php';
	}
}

