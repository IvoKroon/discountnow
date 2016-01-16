<?php

/**
 * Created by PhpStorm.
 * User: ivokroon
 * Date: 05/01/16
 * Time: 11:32
 */
class Company extends Model
{
    private $_companys = [];

    public function getAll(){

        try {
            $query = "  SELECT company.id, company.name, COUNT(discount.id) as count_disc
                        FROM company
                        LEFT JOIN discount
                        ON company.id = discount.company_id
                        GROUP BY company.name
                        ORDER BY count_disc DESC";
            $this->_companys = $this->connection->query($query)->fetchAll();
        } catch(PDOException $e){
            return $e->getMessage();
        }
        return $this->_companys;

    }

    public function checkIdWithCompany($id){
//        return "huh";
        try {
            $query = "SELECT COUNT(id) FROM company WHERE id = :id";
            $stmt = $this->connection->prepare($query);
            $stmt->execute(array(":id",$id));
            $result = $stmt->fetch();
//            return ($result == 0)? false: true;
            return "YEAH";
        }catch (PDOException $e){
            return "error";
        }


    }

    public function getCompanyById($id){
//        echo $this->checkIdWithCompany(2);
        try{
            $query = "SELECT * FROM company WHERE id = :id";
            $stmt = $this->connection->prepare($query);
            $stmt->execute(array(":id" => $id));
            $result = $stmt->fetch();
            if(!$result) {
                return null;
            }
        }catch (PDOException $e){
            return $e;
        }
        return $result;
    }

    public function getCompanyByUserId(){
        try {
            $query = "SELECT * FROM company WHERE user_id = :id";
            $stmt = $this->connection->prepare($query);
            $stmt->execute(array(":id"=>$this->_user_id));
            $result = $stmt->fetch();
            return $result;
        }catch (PDOException $e){
            return $e->getMessage();
        }
    }

    public function updateCompany($name,$type,$c_id){
        try{
            $query = "UPDATE company SET name = :name, type_id = :type WHERE id = :id";
            $stmt = $this->connection->prepare($query);
            if($stmt->execute(array(":name"=>$name,":type"=>$type,":id"=>$c_id))){
                return true;
            }else{
                return false;
            }
        }catch (PDOException $e){
            return $e;
        }
    }


}