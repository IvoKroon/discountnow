<?php
/**
 * Created by PhpStorm.
 * User: ivokroon
 * Date: 08/12/15
 * Time: 14:28
 */
class Model extends Db
{
    protected $_user_id;
    public function __construct()
    {
        parent::__construct(HOST,USER_NAME,PASSWORD,DATABASE);
        $this->_user_id = $this->getUserId();
    }

    public function getUserId(){
        $session = new SessionController();
        $user_id = $session->get('user_session')['user_id'];
        return $user_id;
    }
}