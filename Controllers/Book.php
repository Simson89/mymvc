<?php
class Book extends MainController {
    function __construct() {
        parent::__construct();
        $this->checkAuth();
        $model_class = get_class($this).'Model';
        $name = get_class($this);
        $this->loadModel($name);
        $this->model = new $model_class;
    }
    public function index() {    
                $books = $this->model->showAll();
                $this->view->books = $books;
                $this->view->render('Book/index');
    }
    public function show($book_id) {
        $book = $this->model->getBook($book_id);
        $authors = $this->model->getAuthors($book_id);   
        $this->view->book = $book;
        $this->view->authors = $authors;
        $this->view->render('Book/show');           
    }
    public function borrow($book_id) {
        $user_id = Session::get('user_id');
        echo $user_id;
        $borrowing = $this->model->borrowBook($book_id, $user_id);
         $this->view->msg="Książka została wypożyczona!";
        header('location:'. URL . 'book/index' );
       
    }
    
    public function addBook() {
        $this->view->render('Book/addBook');
        //$this->model->addBook();
    }
    
    public function addNew() {
        $title = $_POST['title'];
        $description = $_POST['description'];
        $add = $this->model->addBook($title, $description);
    }
  


}