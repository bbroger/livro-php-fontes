<?php

          /**
          * The home page view
          */
class EditView
{
      
              private $model;
      
              private $controller;
      
      
              function __construct($controller, $model)
              {
                  $this->controller = $controller;
      
                  $this->model = $model;
      
                  print "Edit - ";
              }
      
              public function edit()
              {
                  return $this->controller->sayWelcome();
              }
      
              public function action()
              {
                  return $this->controller->takeAction();
              }
      
}
