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

        if(SessionController::check("user_session")){
            return $this->_discount_code->makeNewDiscountCode($id);
        }else{
            return 2;
        }
    }
}