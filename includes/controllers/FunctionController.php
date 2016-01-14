<?php

/**
 * Created by PhpStorm.
 * User: ivokroon
 * Date: 14/01/16
 * Time: 11:59
 */
class FunctionController
{
    public static function stringToSqlDate($str_date){

        $time = strtotime($str_date);
        $date = date('Y-m-d',$time);
        return $date;
    }

}