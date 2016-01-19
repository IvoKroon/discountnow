<?php

class SessionController
{
    public static function check($name){
        return (isset($_SESSION[$name]))?true :false;
    }

    public static function get($name){
        if(self::check($name)) {
            return $_SESSION[$name];
        }else{
            return false;
        }
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