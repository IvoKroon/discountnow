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
            if (isset($_POST['title']) &&
                isset($_POST['description']) &&
                isset($_POST['type_id']) &&
                isset($_POST['start_date']) && CheckDataController::checkDate($_POST['start_date'],"m/d/Y") &&
                isset($_POST['end_date']) && CheckDataController::checkDate($_POST['end_date'],"m/d/Y") &&
//                isset($_POST['kind']) &&
//                isset($_POST['amount'])&&
                isset($_POST['style'])
            ) {

                if($_POST['style'] == 0) {
                    if (isset($_POST['kind']) && isset($_POST['code']) && isset($_POST['amount'])) {
                        $kind = htmlentities($_POST['kind']);
                        $code = htmlentities($_POST['code']);
                        $amount = htmlentities($_POST['amount']);
                    }else{
                        return false;
                    }

                }else if($_POST['style'] == 1) {
                    if (isset($_POST['kind']) &&  isset($_POST['amount'])) {
                        $kind = htmlentities($_POST['kind']);
                        $amount = htmlentities($_POST['amount']);
                        $code = null;
                    }else{
                        return false;
                    }

                }else if($_POST['style'] == 2){
                    $kind = null;
                    $amount = null;
                    $code = null;
                }else{
                    return false;
                }

                $style = htmlentities($_POST['style']);
                $name = htmlentities($_POST['title']);
                $description = htmlentities($_POST['description']);
                $type_id = htmlentities($_POST['type_id']);
                $start_date = htmlentities(date($_POST['start_date']));
                $end_date = htmlentities(date($_POST['end_date']));
                $start_date = FunctionController::StringToSqlDate($start_date);
                $end_date = FunctionController::StringToSqlDate($end_date);

                $discount = new Discount();

                return $discount->addNewDiscount
                    ($name,
                    $description,
                    $type_id,
                    $amount,
                    $start_date,
                    $end_date,
                    $kind,
                    $code,
                    $style);

            } else {
                return false;
            }
        }
    }



    public function SetSavedDiscount(){

    }

}