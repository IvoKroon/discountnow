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

    public function getCompanyById($id){
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


}