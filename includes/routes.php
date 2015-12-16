<?php
class Router{

    public $_route;

    public function __construct()
    {
        $this->_route = (isset($_GET['page']))?$_GET['page'] : null ;
        $this->renderPage();
    }

    public function renderPage(){
        if(isset($this->_route)){
            if(file_exists(__DIR__."/views/$this->_route.php")){
                require_once(__DIR__."/views/$this->_route.php");
            }else{
                require_once(__DIR__."/views/error.php");
            }
        }else{
            require_once(__DIR__."/views/home.php");
        }
    }

}