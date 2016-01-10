<?php
session_start();
$session = new SessionController();
$userId = $session->get("user_session")['user_id'];
print_r($userId);
if(isset($_POST['data'])) {



    switch ($_POST['data']){
        case "remove_saved":
            if(isset($_POST["dId"])){

                $discountSaved = new DiscountSaved();
                $dId = $_POST['dId'];

                echo $discountSaved->removeSavedDiscount($dId,$userId)? JsonController::jsonSuccess(): JsonController::jsonError();

            }else{
                JsonController::jsonMessage("Error no id found!");
            }
            break;

        case "add_saved":
            if(isset($_POST['dId'])){

                $discountSaved = new DiscountSaved();
                $dId = $_POST['dId'];
                echo $discountSaved->addSavedDiscount($dId,$userId)? JsonController::jsonSuccess(): JsonController::jsonError();

            }else{
                JsonController::jsonMessage("Error no id found");
            }

    }

}else{

}