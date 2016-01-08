<?php
//require_once(ROOT_URL."includes/controllers/DiscountController.php");
//require_once(ROOT_URL."includes/controllers/DiscountController.php");
/**
 * Created by PhpStorm.
 * User: ivokroon
 * Date: 08/12/15
 * Time: 14:49
 */
class HomeController
{
    public function showAllData(){
        $model = new Discount();
        return $model->getAll();
    }

    public function showSession(){
        $user_data = SessionController::get("user_session");
        return $user_data;
    }

    public function checkLoggedIn(){
        return (SessionController::check("user_session"));
    }

}