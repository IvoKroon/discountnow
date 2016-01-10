<?php

/**
 * Created by PhpStorm.
 * User: ivokroon
 * Date: 08/01/16
 * Time: 16:10
 */
class DiscountSavedController
{

    private $_discountSaved;

    public function __construct()
    {
        $this->_discountSaved = new DiscountSaved();
    }

    public function showAll(){
        return $this->_discountSaved->get();
    }
}