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
        return $this->_discount->getFourNewestDiscounts();
    }

    public function showTop4Best(){
        return $this->_discount->getFourNewestDiscounts();
    }

    public function getAllDiscountsByType(){
        if(isset($_GET['id'])){
            $type_id = $_GET['id'];
            return $this->_discount->showAllDiscountsByTypeId($type_id);
        }
    }

    public function addDiscount(){
        if(isset($_POST['name'])){
            if(isset($_POST['description'])){
                if(isset($_POST['amount']) && CheckDataController::checkNumeric($_POST['amount'])){
                    $name = html_entity_decode($_POST['name']);
                    $description =html_entity_decode($_POST['description']);
                    $amount = html_entity_decode($_POST['amount']);
                    $discount = new Discount();
                    return $discount->addNewDiscount();


                }else{
                    return "Er is een fout in amount opgetreden";
                }
            }else{
                return "Er is iets fout gegaan met description";
            }
        }else{
            return "Er is iets fout gegaan met de titel";
        }

    }



    public function SetSavedDiscount(){

    }

}