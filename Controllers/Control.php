<?php
class Control extends MainController {
    function __construct() {
        parent::__construct();
        
        
        $model_class = get_class($this).'Model';
       
        $this->checkAuth_adm();
    }
    public function index() {
                $this->view->render('Control/index');
    }
    
    function logout() {
        Session::destroy();
        header('location:'. URL . 'index' );
        exit;
    }


}
