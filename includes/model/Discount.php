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

    public function getNewestDiscounts(){
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
}