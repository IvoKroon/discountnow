<?php
ob_start();
session_start();
require_once(__DIR__."/../controllers/HeaderController.php");
$header = new HeaderController();
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

</head>
<body>
<!-- Fixed navbar -->
<div id="header">
  <div class="header_top">
    <div class="logo">Kortingennu</div>
    <div class="login_register">
      <?php if(!$header->checkLoggedIn()){ ?>
        <a href="<?= ROOT_URL ?>inloggen">Login</a> / <a href="<?= ROOT_URL ?>registeren">Register</a>
      <?php }else{ ?>
<!--        <a href="profile">--><?//= $header->getSessionData()['name']; ?><!--</a>-->
        <div class="dropdown">
          <div class="" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
            <?= $header->getSessionData()['name'] ?>
            <span class="caret"></span>
          </div>
          <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
            <li><a href="<?= ROOT_URL ?>saved">Opgeslagen</a></li>
            <li><a href="<?= ROOT_URL ?>uitloggen">Uitloggen</a></li>
          </ul>
        </div>
      <?php } ?>
    </div>
  </div>
  <nav class="navbar">
    <div class="container">
      <div id="navbar" class="collapse navbar-collapse">
        <ul class="nav navbar-nav">
          <li class="active"><a title="Homepage" href="<?= HOME_LINK ?>">Alle producten</a></li>
          <li><a title="Bedrijven" href="<?=ROOT_URL?>company">Bedrijven</a></li>
          <li><a title="Types" href="<?=ROOT_URL?>type">Types</a></li>
          <li><a title="Contact" href="<?=ROOT_URL?>contact">Contact</a></li>
        </ul>
      </div><!--/.nav-collapse -->
    </div>
  </nav>
</div>
<div id="container" class="container-fluid">
