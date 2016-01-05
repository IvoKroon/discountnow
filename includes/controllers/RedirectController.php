<?php
class RedirectController{

    public static function to($link){
        header("location: $link");
    }
    public static function error($link){
        header("location: $link");
    }
}