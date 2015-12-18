<?php
class DiscountController {

    private $_discount;

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

}