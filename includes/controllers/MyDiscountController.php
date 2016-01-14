<?php

class MyDiscountController
{
    public function getStatus($start,$end){
        $now = date("Y-m-d");
        
        if($now > $start && $now < $end ){
            return "Bezig";
        }else if($now < $start){
            return "Gepland";
        }else{
            return "Geweest";
        }
    }

}