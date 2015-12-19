<?php

class TypeController
{
    private $_types;
    public function __construct()
    {
        $this->_types = new Type();
    }

    public function getAllTypes(){
        return $this->_types->all();
    }
    public function getTypeTitle(){
            return (isset($_GET['id']))? $this->_types->getTitleById($_GET['id']): Null;
    }




}