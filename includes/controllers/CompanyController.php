<?php

/**
 * Created by PhpStorm.
 * User: ivokroon
 * Date: 05/01/16
 * Time: 11:46
 */
class CompanyController
{
    public $_company;

    public function __construct()
    {
        $this->_company = new Company();
    }

    public function load_data(){
        return $this->_company->getAll();
    }

    public function update_date(){
        if(isset($_POST["submit"]) && isset($_POST['company_name']) && isset($_POST['type']) && isset($_POST['id'])){
            $name = htmlentities($_POST['company_name']);
            $type = htmlentities($_POST['type']);
            $id = htmlentities(CheckDataController::checkNumeric($_POST['id']));
            $company = new Company();
            if($company->updateCompany($name,$type,$id)){
                return "Aangepast";
            }else{
                return "Error";
            }
        }else{
            return"empty";
        }
    }

}