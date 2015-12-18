<?php

class TypesController
{
    private $_types;
    public function __construct()
    {
        $this->_types = new Types();
    }

    public function getAllTypes(){
        $this->_types->all();
    }

}