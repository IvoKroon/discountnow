<?php

/**
 * Created by PhpStorm.
 * User: ivokroon
 * Date: 08/12/15
 * Time: 11:41
 */
class Discount extends Model
{
    private $products = [];
//    private $product = [];


    public function set(){

    }

    public function getAll(){
        try {
            $query = "SELECT * FROM discount";
            $this->products = $this->connection->query($query)->fetchAll();
        }catch (PDOException $e){
            return "ERROR".$e;
        }
        return $this->products;
    }

    public function getTitle($id){
        try{
            $query = "SELECT title FROM discount WHERE id = :id";
            $stmt = $this->connection->prepare($query);
            $stmt->execute(array(":id"=>$id));
            $product = $stmt->fetch();
        }catch (PDOException $e){
            return "Error". $e;
        }
        return $product;
    }
    public function getOneDiscountById($id){
        try{
            $query = "SELECT * FROM discount WHERE id = :id";
            $statement = $this->connection->prepare($query);
            $statement->execute(array(":id" => $id));
            $this->products = $statement->fetch();
        }catch (PDOException $e){
            return "ERROR ".$e;
        }
        return $this->products;
    }

    public function getFourNewestDiscounts(){
        try {
            //select the first 4 dates
            $query = "SELECT *, MAX(start_date)  FROM discount GROUP BY id LIMIT 4;";
            $stmt = $this->connection->query($query);
            $return_data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }catch (PDOException $e){
            return "ERROR";
        }
        return $return_data;
    }

    public function getAllNewestDiscounts(){
        try {
            //select the first 4 dates
            $query = "SELECT *, MAX(start_date)  FROM discount GROUP BY id LIMIT 20;";
            $stmt = $this->connection->query($query);
            $return_data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }catch (PDOException $e){
            return "ERROR";
        }
        return $return_data;
    }

    public function getMostUsed(){
        try{
            $query = "SELECT discount_id FROM discount_codes WHERE used = 1 GROUP BY discount_id LIMIT 4";
            $return_data = $this->connection->query($query)->fetchAll(PDO::FETCH_ASSOC);

        }catch (PDOException $e){
            return $e;
        }
        return $return_data;
    }

    public function showAllDiscountsByTypeId($id)
    {
        try {
            $query = "SELECT * FROM discount WHERE type_id = :id";
            $stmt = $this->connection->prepare($query);
            $stmt->execute(array(
                ":id" => $id
            ));
            $return_data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return $e->errorInfo;
        }
        return $return_data;
    }

    public function addNewDiscount($title,$description,$type_id,$amount,$startdate,$enddate,$points = 0,$kind = 0 ){
        $company = new Company();
        $company_id = $company->getCompanyByUserId($this->_user_id)['id'];

        $image_id = 1;

        try{

            $query = "INSERT INTO
                      discount (title,description,typy_id,kind,image_id,points,company_id,amount,end_data,start_date)
                      VALUES (:title,:description,:type_id,:kind,:image_id,:points,:company_id,:amount,:end_date,:start_date)";

            $stmt = $this->connection->prepare($query);
            $stmt->bindParam(':title',$title);
            $stmt->bindParam(':description',$description);
            $stmt->bindParam(':type_id',$type_id);
            $stmt->bindParam(':kind',$kind);
            $stmt->bindParam(':image_id',$image_id);
            $stmt->bindParam(':points',$points);
            $stmt->bindParam(':company_id',$company_id);
            $stmt->bindParam(':company_id',$company_id);
            $stmt->bindParam(':amount',$amount);
            $stmt->bindParam(':end_date',$enddate);
            $stmt->bindParam(':start_date',$startdate);

            $stmt->execute();

            return ($stmt->fetch())? true: false;
        }catch (PDOException $e){
            return $e->getMessage();
        }
    }
}