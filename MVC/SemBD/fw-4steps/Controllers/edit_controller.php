<?php
      
    /**
    * The home page controller
    */
class EditController
{
        private $model;
      
        function __construct($model)
        {
            $this->model = $model;
        }
      
        public function edit()
        {
            return $this->model->edit();
        }
}
