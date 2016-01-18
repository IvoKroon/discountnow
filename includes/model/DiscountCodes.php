<?php

class DiscountCodes extends Model{

    public function getCodeByUserId($d_id){
        $query = "SELECT * FROM discount_codes WHERE users_id = :id AND discount_id = :d_id";
        try{
            $stmt = $this->connection->prepare($query);
            $stmt->execute(array(":id"=>$this->_user_id,":d_id"=>$d_id));
            $result = $stmt->fetch();

            if(!$result){
                return false;
            }else{
                return $result;
            }
        }catch (PDOException $e){
            return $e->getMessage();
        }
    }

    private function genarateCode($length = 10){
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    public function makeNewDiscountCode($d_id){
//        return "test";
        if($this->getCodeByUserId($d_id)){
            return false;
        }
        $random_code = $this->genarateCode();
        $query = "INSERT INTO discount_codes (code,discount_id,users_id) VALUES (:random_code, :d_id, :u_id)";
        try {
            $stmt = $this->connection->prepare($query);
            if ($stmt->execute(array(
                ":random_code" => $random_code,
                ":d_id" => $d_id,
                ":u_id" => $this->_user_id
            ))
            ) {
                return $random_code;
            } else {
                return false;
            }
        }catch (PDOException $e){
            return $e;
        }

    }
}