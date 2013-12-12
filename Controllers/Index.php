<?php
class Index extends MainController {

  
    function __construct() {
        parent::__construct();
        $this->loadModel(get_class($this));
     
        
        $model_class = get_class($this).'Model';
        $view_class = get_class($this).'View';
        $this->model = new $model_class;
    }
    public function index() {
                $this->view->render('Index/index');

    }

   
    
    public function show($id) {
        
        $this->view->note=$this->model->getArticle($id);
        $this->view->render("Index/show");
    }


}