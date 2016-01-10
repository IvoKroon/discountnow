<?php
class UsersController{


    public function login($email, $password){
        $user = new Users();
        return $user->login($email,$password);
    }

    public function checkLoggedIn(){
        $user = new SessionController();
        if(!isset($user->get("user_session")['user_id'])){
            RedirectController::to(ROOT_URL."inloggen");
        }
    }



    public function register(){
        //check if data in post if filled

        if(CheckDataController::checkArrayData($_POST)){
            $email = $_POST['email'];
            $first_name = $_POST['name'];
            $last_name = $_POST['lastname'];
            $age = $_POST['age'];
            $gender = $_POST['gender'];
            $pass = $_POST['pass'];
            $pass_check = $_POST['checkpass'];

            if(CheckDataController::checkEmail($email)){
                if(CheckDataController::checkNotNumeric($first_name)){
                    if(CheckDataController::checkNotNumeric($last_name)){
                        if(CheckDataController::checkNumeric($age)){
                                if($pass == $pass_check) {
                                    $pass = Encryption::setPassword($pass);
                                    $user = new Users();
                                    return "data : email = $email ".$user->set($email,$first_name,$last_name,$pass,$gender);
                                }
                        }
                    }
                }
            }
        }else{
            return "Something not filled in";
        }
        return "Some Error";
    }

    public function logout(){
        SessionController::delete("user_session");
    }
}