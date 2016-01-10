<?php

class JsonController
{
    public static function jsonSuccess(){
        $json = json_encode(array("Status"=>"Success"));
        return $json;
    }

    public static function jsonError(){
        $json = json_encode(array("Status"=>"Error"));
        return $json;
    }

    public static function jsonMessage($message){
        $json = json_encode(array("Message"=>$message));
        return $json;
    }

}