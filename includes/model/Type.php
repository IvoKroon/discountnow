<?php

class Type extends Model
{
    public function set(){

    }
    public function get($id){
        try{
            $query = "SELECT * FROM type WHERE id = :id";
            $stmt = $this->connection->prepare($query);
            $stmt->execute(array(
                ":id"=>$id
            ));
            $return_data = $stmt->fetch(PDO::FETCH_ASSOC);
        }catch (PDOException $e){
            return $e->errorInfo;
        }
        return $return_data;

    }

    public function all(){
        try{
            $query = "SELECT * FROM type";
            $return_data = $this->connection->query($query)->fetchAll(PDO::FETCH_ASSOC);
        }catch (PDOException $e){
            return $e->errorInfo;
        }
        return $return_data;
    }

    public function getTitleById($id){
        try{
            $query = "SELECT * FROM type WHERE id = :id";
            $stmt = $this->connection->prepare($query);
            $stmt->execute(array(":id"=>$id));
            $return_data = $stmt->fetch(PDO_FETCH_MODE);
        }catch (PDOException $e){
            return $e->errorInfo;
        }
        return $return_data;
    }
}