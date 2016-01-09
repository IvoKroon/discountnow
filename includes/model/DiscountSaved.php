<?php

/**
 * Created by PhpStorm.
 * User: ivokroon
 * Date: 08/01/16
 * Time: 16:11
 */
class DiscountSaved extends Model
{
    public function get(){

        $query = "SELECT discount.title, discount.end_date
                  FROM discount
                  INNER JOIN discount_saved
                  ON discount_saved.discount_id = discount.id
                  WHERE discount_saved.user_id = :id";
        $stmt = $this->connection->prepare($query);
        $stmt->execute(array(":id", //TODO get session user id))
    }

}