<?php

class SessionController
{
    public static function check($name){
        return (isset($_SESSION[$name]))?true :false;
    }

    public static function get($name){
        return $_SESSION[$name];
    }

    public static function set($name,$value){

        return $_SESSION[$name] = $value;
    }

    public static function delete($name){
        if(self::check($name)){
            unset($_SESSION[$name]);
        }
    }
}