<?php
$user = new UsersController();

$user->logout();
RedirectController::redirectToHome();
?>
