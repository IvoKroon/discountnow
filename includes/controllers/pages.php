<?php
class Pages {
    public function home() {
        $users = Users::getAll();
        print_r($users);
        require_once('views/pages/home.php');
    }

    public function error() {
        require_once('views/pages/error.php');
    }
}