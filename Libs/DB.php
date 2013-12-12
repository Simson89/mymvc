<?php

class DB extends PDO{

    private $db;

    function __construct() {
        try{
        parent::__construct(DB_TYPE.':host='.DB_HOST.';dbname='.DB_NAME.';charset=utf8', DB_USER, DB_PASS);
        //$this->db = new PDO('mysql:host=localhost;dbname=mymvc;charset=utf8', 'root', '');
       return $this->db;
        }
        
 catch (PDOException $msg)
 {
            echo $msg='Błąd połączenia z bazą danych!';
 }
        
    }

    

}