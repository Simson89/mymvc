<?php

class MainView {

    function __construct() {
        
    }

    public function render($name) {
        require 'Views/layout/header.php'; 
        require 'Views/'.$name.'.php';
        require 'Views/layout/footer.php'; 
       
    }
}