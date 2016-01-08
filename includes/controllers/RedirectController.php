<?php
class RedirectController{

    public static function to($link){
        header("location: $link");
    }
    public static function error(){
        header("location: ".ROOT_URL."includes/views/404.php");
    }
}