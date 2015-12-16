<?php

class CheckDataController
{
    //check email
    public static function checkEmail($email){
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    public static function checkNumeric($number){
        return is_numeric($number);
    }

    public static function checkNotNumeric($number){
        return !is_numeric($number);
    }

    public static function checkBool($bool){
        return is_bool($bool);
    }

    public static function checkArrayData($array){
        foreach($array as $key => $row ){
            if(empty($row)){
                return false;
            }
        }
        return true;
    }
}