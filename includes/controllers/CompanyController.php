<?php

/**
 * Created by PhpStorm.
 * User: ivokroon
 * Date: 05/01/16
 * Time: 11:46
 */
class CompanyController
{
    private $_company;

    public function __construct()
    {
        $this->_company = new Company();
    }

    public function load_data(){
        return $this->_company->getAll();
    }

}