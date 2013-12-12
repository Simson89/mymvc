<?php

class Bootstrap {

    function __construct() {
        
    }

    public function run() {
        
        require 'config/paths.php';
        require 'config/database.php';
        require_once 'Libs/MainController.php';
        require_once 'Libs/MainModel.php';
        require_once 'Libs/MainView.php';
        require_once 'Libs/DB.php';
        require_once 'Libs/Session.php';

        if (empty($_GET['url'])) {
            require 'Controllers/Index.php';
            $controller = new Index();
            $controller->index();
            return false;
        } else {


            $url = $_GET['url'];
            $url = rtrim($url, '/');
            $url = explode('/', $url);

            $file = 'Controllers/' . $url[0] . '.php';
            if (!file_exists($file)) {
                require 'Controllers/Error.php';
                $controller = new Error();
                $controller->index();
            } else {
                require_once 'Controllers/' . $url[0] . '.php';

                $controller_name = $url[0];
                $controller = new $controller_name;
                
                //echo '666';
                if (isset($url[1])) {
                    $action_name = $url[1];
                    
                    if (isset($url[2])) {
                        $controller->$action_name($url[2]);
                    } else {
                        $controller->$action_name();
                    }
                    
                    
                }
                else {
                       
                        $controller->index();
                    
                    }
                
            }
        }
           
    }

    
}