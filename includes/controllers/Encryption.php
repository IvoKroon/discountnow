<?php

class Encryption
{
    /*
     * Make hash / make password
     */

    private static function makeHash($password){
        return password_hash($password,PASSWORD_BCRYPT);
    }

    public static function setPassword($password){
        return self::makeHash($password);
    }

    /*
     * Check password
     */
    private static function check($password = null, $hash = null){
        return password_verify($password,$hash);
    }

    public static function checkPassword($password, $hash){
        return self::check($password, $hash);
    }

}