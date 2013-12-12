<?php
class Dashboard extends MainController {
    function __construct() {
        parent::__construct();
        
        
        $model_class = get_class($this).'Model';
       
        $this->checkAuth();
    }
    public function index() {
                $this->view->render('Dashboard/index');
    }
    
    function logout() {
        Session::destroy();
        header('location:'. URL . 'index' );
        exit;
    }


}