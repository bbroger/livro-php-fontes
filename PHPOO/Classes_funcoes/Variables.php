<?php

class Variables {
    
    // Retorna o domínio - $v->domain();// localhost
    public function serverDomain(){
        $result = $_SERVER['SERVER_NAME'];
        return $result;
    }

    // Retorna o IP
    public function serverIp(){
        $result = $_SERVER['SERVER_ADDR'];
        return $result;
    }

    // Retorna o método de envio de dados: GET/POST/REQUEST
    public function serverMethod(){
        $result = $_SERVER['REQUEST_METHOD'];
        return $result;
    }

    // Retorna o path completo do arquivo atual
    public function serverPath(){
        $result = $_SERVER['DOCUMENT_ROOT'];
        return $result;
    }

    // Retorna a porta em uso pelo servidor web
    public function serverPort(){
        $result = $_SERVER['SERVER_PORT'];
        return $result;
    }

    // Retorna o nome do script atual
    public function serverScript(){
        $result = $_SERVER['SCRIPT_NAME'];
        return $result;
    }

    // Retorna o path completo do diretório atual
    public function serverDir(){
        $result = __DIR__;
        return $result;
    }

    // Retorna o atual. Exemplo: /var/www/html/projeto => projeto
    public function serverCurDir(){
        $result = basename(__DIR__);
        return $result;
    }

    // Retorna o path completo até o arquivo atual, inclusive
    public function serverFile(){
        $result = __FILE__;
        return $result;
    }

}

//$v = new Variables();
//print $v->serverFile();
