<?php
class Router{

    public $_route;

    public function __construct()
    {
        $this->_route = (isset($_GET['page']))?$_GET['page'] : null ;
        $this->renderPage();
    }

//    public function renderModel(){
//        if($this->_route != "") {
//            if (isset($this->_route)) {
//                if (file_exists(__DIR__ . "/model/" . ucfirst($this->_route) . ".php")) {
//                    require_once(__DIR__ . "/model/" . ucfirst($this->_route) . ".php");
//                }
//
//            }else{
////                require_once(__DIR__ . "/controllers/HomeController.php");
//            }
//        }else{
////            require_once(__DIR__ . "/controllers/HomeController.php");
//        }
//    }
//
//
//    public function renderController(){
//        if($this->_route != "") {
//            if (isset($this->_route)) {
//                if (file_exists(__DIR__ . "/controllers/" . ucfirst($this->_route) . "Controller.php")) {
//                    require_once(__DIR__ . "/controllers/" . ucfirst($this->_route) . "Controller.php");
//                }
//
//            }else{
//                require_once(__DIR__ . "/controllers/HomeController.php");
//            }
//        }else{
//            require_once(__DIR__ . "/controllers/HomeController.php");
//        }
//    }

    public function renderPage(){
        if(isset($this->_route)){
            if(file_exists(__DIR__."/views/$this->_route.php")){
                $page = __DIR__."/views/$this->_route.php";
            }else{
                $page = __DIR__."/views/404.php";
            }
        }else{
            $page = __DIR__."/views/home.php";
        }

//        ob_start();
        require_once($page);
//        $content = ob_get_clean();
//        echo $content;
    }

}
//
//try {
//    //Get the url from the .htaccess rewrite & check existence (if not: 404!)
//    $currentPage = (!isset($_GET['url']) || $_GET['url'] == "" ? "home" : $_GET['url']);
//    $phpFile = $currentPage . ".php";
//    if (!file_exists(INCLUDES_PATH . "pages/" . $phpFile)) {
//        header('HTTP/1.0 404 Not Found');
//        $phpFile = '404.php';
//    }
//
//    //Require file for logic
//    require_once "pages/" . $phpFile;
//
//    //Use output buffers to capture template data from require statement and store in $content
//    ob_start();
//    require_once "pages/templates/" . $phpFile;
//    $content = ob_get_clean();
//} catch (Exception $e) {
//    //Set error
//    $errors[] = "Oops, try to fix your error please: " . $e->getMessage() . " on line " . $e->getLine() . " of " . $e->getFile();
//}