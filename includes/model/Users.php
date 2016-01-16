<?php

/**
 * Created by PhpStorm.
 * User: ivokroon
 * Date: 04/12/15
 * Time: 14:32
 */
class Users extends model
{
//    private $users = [];
    private $_email, $_hash, $_password, $_data;


    public function set($email,$first_name,$last_name,$password,$gender){
        //check if email not exist
        if(!$this->find_by_email($email)) {
            try {
                $query = "INSERT INTO `users` (`email`, `password`, `name`, `lastname`,`gender`)VALUES
                                          (:email,:password,:first_name,:last_name,:gender);";
                $stmt = $this->connection->prepare($query);
                $stmt->execute(array(
                    ":email" => $email,
                    ":first_name" => $first_name,
                    ":last_name" => $last_name,
                    ":password" => $password,
                    ":gender" => $gender
                ));

                $id = $this->connection->lastInsertId();
                SessionController::set('user_session', array(
                    "user_id" => $id,
                    "name" => $first_name. " " . $last_name,
                    "level" => 0
                ));
                RedirectController::to(ROOT_URL."succes");
                return "Success";
            }catch (PDOException $e){
                return "Error : $e";
            }
        }
        return "Email is al eens gebruikt.";
    }

    public function getUserByUserId(){
        $session = SessionController::get("user_session");
        $user_id = $session['user_id'];

        try{
            $query = "SELECT * FROM users WHERE id = :user_id";
            $stmt = $this->connection->prepare($query);
            $stmt->execute(array(":user_id"=>$user_id));
            $result = $stmt->fetch();
            return $result;
        }catch(PDOException $e){
            return $e->getMessage();
        }
    }

    public function find_by_email($user){
            if($user) {
                $query = "SELECT * FROM users WHERE  email = :field_data";
                $stmt = $this->connection->prepare($query);
                $stmt->execute(array(
                    ":field_data" => $user
                ));
                $this->_data = $stmt->fetch();
                if(count($this->_data)) {
                    return true;
                }
            }
        return false;
    }

    public function login($email = null, $user_password = null){
        //check if email exists in data base
        //check if password is set
        if($this->find_by_email($email) && $user_password){
            $this->_email = $email;
            $this->_password = $user_password;
            $this->_hash = $this->_data['password'];

            if(Encryption::checkPassword($this->_password, $this->_hash)){
                //set the data in a session.
                    SessionController::set('user_session', array(
                        "user_id" => $this->_data['id'],
                        "name" => $this->_data['name'] . " " . $this->_data['lastname'],
                        "level" => $this->_data['level']
                    ));

                RedirectController::to(ROOT_URL);
            }
        }

    return false;
    }

    private function getPasswordOffUser($user_id){
        try{
            $query = "SELECT password FROM users WHERE id = :id";
            $stmt = $this->connection->prepare($query);
            $stmt->execute(array(
                ":id"=> $user_id
            ));
            $result = $stmt->fetch();
            $password = $result['password'];

            return $password;

        }catch (PDOException $e){
            return $e->getMessage();
        }
    }

    private function updatePassword($new_password){
        $new_password = Encryption::setPassword($new_password);
        try{
            $query = "UPDATE users SET password = :pass";
            $stmt = $this->connection->prepare($query);
            if($stmt->execute(array(":pass" => $new_password))){
                return true;
            }else{
                return false;
            }

        }catch (PDOException $e){
            return $e->getMessage();
        }
    }

    public function newPassword($old_pass,$new_pass,$new_pass_check){
        $session = SessionController::get("user_session");
        $user_id = $session['user_id'];

        if($new_pass == $new_pass_check) {
            $password_hash = $this->getPasswordOffUser($user_id);
            if(Encryption::checkPassword($old_pass,$password_hash)){
                //Success
                return $this->updatePassword($new_pass);
            }else{
                return "Verkeerd wachtwoord ingevuld.";
            }

        }else{
            return "De wachtwoorden zijn niet hetzelfde.";
        }
    }

}