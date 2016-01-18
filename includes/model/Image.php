<?php

class Image extends Model
{
    public function loadImage($id){
        $query = "SELECT * FROM images WHERE id = :id";
        try{
            $stmt = $this->connection->prepare($query);
            $stmt->execute(array(":id"=>$id));
            return $stmt->fetch();
        }catch (PDOException $e){
            return $e->getMessage();
        }
    }
}