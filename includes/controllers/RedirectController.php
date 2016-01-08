<?php
class RedirectController{

    public static function to($link){
        header("location: $link");
    }
    public static function error(){
        print ob_get_level ();
        if ( headers_sent($path, $lineno) ) {
            echo '<pre>Debug: output started at ', $path, ':', $lineno, "</pre>\n";
        }
        header("location: ".ROOT_URL."404.php");
    }

    public static function redirectToHome(){
        $actual_link = ROOT_URL;
        header("location: $actual_link");
    }

//    public function error2(){
//        header("location: ".ROOT_URL."includes/views/404.php");
//    }

//    public static
}