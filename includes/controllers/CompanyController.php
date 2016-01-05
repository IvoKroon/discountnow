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

    public function detail_data(){
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $company = $this->_company->getCompanyById($id);
//                print_r($company);
            print_r($company);
            if(!empty($company)){
                return $company;
            }else{
                RedirectController::to()
                return null;
            }
        }else{
            return null;
        }
    }

}