<?php

class Login extends MainController {
    function __construct() {
        parent::__construct();
        
        
        $this->loadModel(get_class($this));
        
        $model_class = get_class($this).'Model';
        $view_class = get_class($this).'View';
        $this->model = new $model_class;
        
    }
    public function index() {
                $this->view->render('Login/index');

    }
    
    function run() {
         $this->model->run();
    }
}
