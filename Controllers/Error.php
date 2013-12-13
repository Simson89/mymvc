<?php
class Error extends MainController {

  
    function __construct() {
        parent::__construct();
    }

      
      
    public function index() {
         $this->view->msg="404, brak takiej strony";
        $this->view->render('Error/index');
    }

    
  
    


}