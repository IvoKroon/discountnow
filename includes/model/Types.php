<?php

class Types extends Model
{
    public function set(){

    }
    public function get($id){

    }
    public function all(){
        try{
            $query = "SELECT * FROM types";
            $this->connection->query($query)->fetchAll(PDO::FETCH_ASSOC);
        }catch (PDOException $e){
            return $e->errorInfo;
        }
    }
}