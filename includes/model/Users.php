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
        if($this->find_by_email($email)) {
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
                return "Success";
            }catch (PDOException $e){
                return "Error : $e";
            }
        }
        return "Email already in use!";
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
                $session = new SessionController();
                    $session->set('user_session', array(
                        "user_id" => $this->_data['id'],
                        "name" => $this->_data['name'] . " " . $this->_data['lastname'],
                        "level" => $this->_data['level']
                    ));

                $session->set("level",$this->_data['level']);
                return true;
//                RedirectController::to("/kortingennu/");
            }
        }

    return false;
    }

}