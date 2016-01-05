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
    public function countTaskOffCompany($id){
        try {
            $query = "  SELECT company.id, company.name, COUNT(discount.id) as count
                        FROM company
                        LEFT JOIN discount
                        ON company.id = discount.company_id
                        GROUP BY company.name
                        ORDER BY company.id
                        ";
            $stmt = $this->connection->prepare($query);
            $stmt->execute(array(":company_id" => $id));
            $result = $stmt->fetch();
        }catch (PDOException $e){
            return $e->getMessage();
        }
        print_r($result);
        return $result;

    }


}