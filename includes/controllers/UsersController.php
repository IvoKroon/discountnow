<?php
class UsersController{

    private $_user_model;

    public function __construct()
    {
        $this->_user_model = new Users();
    }

    public function login($email, $password){
        return $this->_user_model->login($email,$password);
    }

    public function checkLoggedIn(){
        $user = new SessionController();
        if(!isset($user->get("user_session")['user_id'])){
            RedirectController::to(ROOT_URL."inloggen");
        }
    }

    public function checkCompanyLoggedIn(){
        $user = new SessionController();
        if(isset($user->get("user_session")['user_id'])){
            if($user->get("user_session")['level'] != 1){
                RedirectController::to(ROOT_URL."404");
            }
        }else{
            RedirectController::to(ROOT_URL."login");
        }
    }

    public function setNewPassword(){
        if(isset($_POST['old_pass']) && isset($_POST['new_pass']) && isset($_POST['new_pass_check'])){
            $old_pass = $_POST['old_pass'];
            $new_pass = $_POST['new_pass'];
            $new_pass_check = $_POST['new_pass_check'];

            return $this->_user_model->newPassword($old_pass,$new_pass,$new_pass_check);
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
//                                    $user = new Users();
                                    return $this->_user_model->set($email,$first_name,$last_name,$pass,$gender);
                                }else{
                                    return "Wachtwoorden moeten wel hetzelfde zijn.";
                                }
                        }
                    }
                }
            }
        }else{
            return "Er is iets niet ingevuld.";
        }
        return "Er is iets fout gegaan";
    }

    public function logout(){
        SessionController::delete("user_session");
    }
}