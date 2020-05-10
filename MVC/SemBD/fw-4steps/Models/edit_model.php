<?php

    /**
    * The home page model
    */
class EditModel
{
      
    private $message = 'Welcome to edit page.';
      
    function __construct()
    {
      
    }
      
    public function edit()
    {
        return $this->message;
    }
      
}

