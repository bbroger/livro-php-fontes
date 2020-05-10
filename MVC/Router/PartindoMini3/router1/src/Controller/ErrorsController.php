<?php

class ErrorsController
{
    public function index($action,$controller){
        print '<h3>Errors: Este controller '.$controller.' e/ou '.$action.' não existem</h3>';
    }
}
