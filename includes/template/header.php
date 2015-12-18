<?php
session_start();
require_once(__DIR__."/../controllers/HeaderController.php");
$header = new HeaderController();

if($header->checkLoggedIn()) {
  $user_data = $header->getSessionData();
}else{
  $user_data = '';
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title><?= $header->titleMaker() ?></title>
<!--  Load bootstrap css-->
  <link rel="stylesheet" href="<?= ROOT_URL ?>includes/template/bootstrap/css/bootstrap.min.css">
<!--  Load font-->
  <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
<!--  Load main stylesheet-->
  <link href="<?= ROOT_URL ?>includes/template/stylesheet/stylesheet_main.css" rel="stylesheet" type="text/css" />
<!--  Load bootstrap javascript-->
  <script src="<?= ROOT_URL ?>includes/template/bootstrap/js/bootstrap.min.js"></script>
<!--  Load own jquery-->
  <script src="<?= ROOT_URL ?>includes/template/javascript/jquery.js"></script>

</head>
<body>
<!-- Fixed navbar -->
<div id="header">
  <div class="header_top">
    <div class="logo">Kortingennu</div>
    <div class="login_register">
      <a href="inloggen">Login</a> / <a href="registeren">Register</a>
    </div>
  </div>
  <nav class="navbar">
    <div class="container">
      <div id="navbar" class="collapse navbar-collapse">
        <ul class="nav navbar-nav">
          <li class="active"><a href="<?= HOME_LINK ?>">Alle producten</a></li>
          <li><a title="Bedrijven" href="bedrijven">Bedrijven</a></li>
          <li><a title="Bedrijven" href="type">Types</a></li>
          <li><a title="Bedrijven" href="contact">Contact</a></li>
        </ul>
      </div><!--/.nav-collapse -->
    </div>
  </nav>
</div>
<div id="container">

