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


}