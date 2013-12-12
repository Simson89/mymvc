<?php
class LoginModel extends MainModel {

    function __construct() {
        parent::__construct();
       
    }
    
    
    public function test() {
       //$this->db
    }
    
    public function run() {
        $login = $_POST['login'];
        $password = $_POST['password'];
        $sth = $this->db->prepare ("SELECT * from users where login= :login and password= MD5(:password)");
        $sth->execute(array(
            ':login' => $login,
            ':password' => $password
                
        ));
        
        $data = $sth->fetchAll();
        $count = $sth->rowCount();
        if($count > 0) {
            
            Session::init();
            Session::set('loggedIn', true);
            Session::set('user', $data[0]['login']);
            Session::set('user_id', $data[0]['user_id']);
            header('location:'.URL.'dashboard');
            
        }
        else {
            header('location:'.URL.'login');
        }
        
    }
}