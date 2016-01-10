<?php

/**
 * Created by PhpStorm.
 * User: ivokroon
 * Date: 08/12/15
 * Time: 20:02
 */
class DetailController
{
    private $_discount;
    private $_saved_discount;

    public function __construct()
    {
        $this->_discount = new Discount();
        $this->_saved_discount = new DiscountSaved();
    }

    public function showDetailData(){
        if(isset($_GET['id'])){
            $saved = $this->_saved_discount->checkDiscountIsSavedByUserId($_GET['id']);
            return array("saved"=>$saved, "data"=>$this->_discount->getOneDiscountById($_GET['id']));
        }else{
            header("location:".HOME_LINK);
            return false;
        }
    }
}