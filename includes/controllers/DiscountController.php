<?php
class DiscountController {

    public $_discount;

    public function __construct()
    {
        $this->_discount = new Discount();
    }

    public function showDetailTitle(){

    }

    public function showNewestDiscounts(){
        return $this->_discount->getNewestDiscounts();
    }

    public function showTop4Best(){
        return $this->_discount->getNewestDiscounts();
    }

    public function getAllDiscountsByType(){
        if(isset($_GET['id'])){
            $type_id = $_GET['id'];
            return $this->_discount->showAllDiscountsByTypeId($type_id);
        }
    }

    public function SetSavedDiscount(){

    }

}