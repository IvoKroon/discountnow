<?php

spl_autoload_register(function($class) {
    if(file_exists(__DIR__."/../controllers/$class.php"))
    {
        require_once(__DIR__."/../controllers/$class.php");
    } else if(file_exists(__DIR__."/../model/$class.php"))
    {

        require_once(__DIR__."/../model/$class.php");
    }



});