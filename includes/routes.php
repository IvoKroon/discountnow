<?php
class Router{

    public $_route;

    public function __construct()
    {
        $this->_route = (isset($_GET['page']))?$_GET['page'] : null ;
//        if(isset())

        $this->renderPage();


    }

    public function renderPage(){
        if(isset($this->_route)) {
                if (file_exists(__DIR__ . "/views/$this->_route.php")) {
                    $page = __DIR__ . "/views/$this->_route.php";
                } else {
                    $page = __DIR__ . "/views/404.php";
                }
            }else{
                $page = __DIR__ . "/views/home.php";
            }
        if ($this->_route == "ajax") {
            require_once("includes/ajax/save_discount_ajax.php");
        }else {
            require_once("includes/template/header.php");
            require_once($page);
            require_once("includes/template/footer.php");
        }
    }

}