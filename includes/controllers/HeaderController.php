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

    public function checkLoggedIn(){
        return SessionController::check("user_session");
    }

    public function getSessionData(){
        return SessionController::get("user_session");
    }
}