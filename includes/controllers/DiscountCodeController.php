<?php

class DiscountCodeController
{
    private $_discount_code;

    public function __construct()
    {
        $this->_discount_code = new DiscountCodes();
    }

    public function addNewRandomCode($id)
    {
//        return $id;
        return $this->_discount_code->makeNewDiscountCode($id);
    }
}