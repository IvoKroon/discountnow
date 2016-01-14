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

    public function addDiscount()
    {
        if (isset($_POST['submit'])) {
            $title = $_POST['start_date'];
            $date = date("d/m/Y");
            if (isset($_POST['title']) &&
                isset($_POST['description']) &&
                isset($_POST['type_id']) &&
                isset($_POST['start_date']) && CheckDataController::checkDate($_POST['start_date'],"m/d/Y") &&
                isset($_POST['end_date']) && CheckDataController::checkDate($_POST['end_date'],"m/d/Y") &&
                isset($_POST['kind']) &&
                isset($_POST['amount'])
            ) {
                $name = htmlentities($_POST['title']);
                $description = htmlentities($_POST['description']);
                $type_id = htmlentities($_POST['type_id']);
                $start_date = htmlentities(date($_POST['start_date']));
                $end_date = htmlentities(date($_POST['end_date']));
                $amount = htmlentities($_POST['amount']);
                $kind = htmlentities($_POST['kind']);
                $start_date = FunctionController::StringToSqlDate($start_date);
                $end_date = FunctionController::StringToSqlDate($end_date);

                $discount = new Discount();
                return $discount->addNewDiscount($name, $description, $type_id, $amount, $start_date, $end_date, $kind);
            } else {
                return "Error";
            }
        }
    }



    public function SetSavedDiscount(){

    }

}