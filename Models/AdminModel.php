<?php
class AdminModel extends MainModel {

    function __construct() {
        parent::__construct();
       
    }
    
    public function adm_login() {
        $login = $_POST['login'];
        $password = $_POST['password'];
        $sth = $this->db->prepare ("SELECT * from admin where login= :login and password= MD5(:password)");
        $sth->execute(array(
            ':login' => $login,
            ':password' => $password
                
        ));
        
        $data = $sth->fetchAll();
        $count = $sth->rowCount();
        if($count > 0) {
            
            Session::init();
            Session::set('admin', true);
            Session::set('admin', $data[0]['login']);
            Session::set('admin_id', $data[0]['id']);
            header('location:'.URL.'control');
            
        }
        else {
            header('location:'.URL.'admin');
        }
        
    }
}
