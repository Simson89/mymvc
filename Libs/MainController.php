<?php
class MainController {

    function __construct() {
        $this->view = new MainView();
    }
    
    public function loadModel($name) {
        //echo 'zzz1111'.get_class($this);
        $file = 'Models/'.get_class($this).'Model.php';
        if (file_exists($file)){
            require_once $file;
            //$this->model = new $name.'Model()';
            
        }
        
    }
    
    protected function checkAuth() {
        Session::init();
        $logged = Session::get('loggedIn');
        if($logged == false) {
            Session::destroy();
            header('location:'.URL.'login');
            exit;
        }
        
    }

    protected function checkAuth_adm() {
    Session::init();
    $logged_adm = Session::get('adm_loggedIn');
    if($logged_adm == false) {
    Session::destroy();
    header('location:'.URL.'admin');
    exit;
        }  
        
   }
    
    
    
    
    
    
  
    
  
   

}
