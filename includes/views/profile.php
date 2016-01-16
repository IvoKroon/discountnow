<?php

$user = new Users();
$user = $user->getUserByUserId();
?>


<h1><?= $user['name'].' '.$user['lastname'] ?></h1>