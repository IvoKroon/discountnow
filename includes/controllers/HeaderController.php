<?php

class HeaderController
{
    public function titleMaker()
    {
        //check if id is set
        if(isset($_GET['id'])){
            //if id is set, set the title to the discount title
            $id = $_GET['id'];
            $discount = new Discount();
            $title = $discount->getTitle($id);
            return $title['title'];
        }
        return (isset($_GET['page'])) ? ucfirst($_GET['page']) : "Homepage";
    }

    public function setActive(){
        if(isset($_GET['page'])){
            if($_GET['page'] == "company"){
                return "company";
            }else if($_GET['page'] == "type"){
                return "type";
            }else if($_GET['page'] == "contact"){
                return "contact";
            }else if($_GET['page'] == "saved"){
                return "saved";
            }else if($_GET['page'] == "profile"){
                return "profile";
            }
        }else{
            return "hompage";
        }
    }

    public function checkLoggedIn(){
        return SessionController::check("user_session");
    }

    public function getSessionData(){
        return SessionController::get("user_session");
    }
}