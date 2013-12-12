<?php
class IndexModel extends MainModel {

    function __construct() {
        parent::__construct();
    }
    
    public  function getArticle($id){
       $art = "Artykuł ma id: $id";
       return $art;
    }

    
}