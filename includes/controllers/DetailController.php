<?php

/**
 * Created by PhpStorm.
 * User: ivokroon
 * Date: 08/12/15
 * Time: 20:02
 */
class DetailController
{
    public function showDetailData(){
        if(isset($_GET['id'])){
            $discount = new Discount();
            return $discount->getOneDiscountById($_GET['id']);
        }else{
            header("location:".HOME_LINK);
            return false;
        }
    }
}