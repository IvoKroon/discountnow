<?php
/**
 * Created by PhpStorm.
 * User: ivokroon
 * Date: 08/12/15
 * Time: 14:28
 */
class Model extends Db
{

    public function __construct()
    {
        parent::__construct(HOST,USER_NAME,PASSWORD,DATABASE);

    }
}