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
    <div class="logo_containter">
      <a href="<?= ROOT_URL ?>">
        <img class="logo" src="<?= ROOT_URL ?>includes/template/image/logo.png">
      </a>
    </div>

    <div class="login_register">
<!--      CHECK IF USER IS LOGGED IN -->
      <?php if(!$header->checkLoggedIn()){ ?>
        <a href="<?= ROOT_URL ?>inloggen">Login</a> / <a href="<?= ROOT_URL ?>registeren">Register</a>
      <?php }else{ ?>
<!--          SHOW DROPDOWN WHEN USER IS LOGGED IN NORMAL USER-->
        <div class="dropdown">
          <div class="" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
            <?= ucfirst($header->getSessionData()['name']) ?>
            <span class="caret"></span>
          </div>

          <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
            <!-- ADMIN NORMAL USER -->
            <?php if(SessionController::check("user_data")['level'] == 1){ ?>
              <!-- ADMIN USER -->
              <li><a href="<?= ROOT_URL ?>saved">Opgeslagen</a></li>
              <li><a href="<?= ROOT_URL ?>add_discount">add</a></li>
              <li><a href="<?= ROOT_URL ?>uitloggen">Uitloggen</a></li>

            <?php }else{ ?>
              <!-- NORMAL USER -->
              <li><a href="<?= ROOT_URL ?>saved">Opgeslagen</a></li>
              <li><a href="<?= ROOT_URL ?>uitloggen">Uitloggen</a></li>
            <?php }?>

          </ul>
        </div>

      <?php } ?>
    </div>
  </div>

<!--  navigation bar-->
  <nav class="navbar">
    <div class="container">
      <div id="navbar" class="collapse navbar-collapse">
        <ul class="nav navbar-nav">
          <li class="active"><a title="Homepage" href="<?= HOME_LINK ?>">Alle producten</a></li>
          <li><a title="Bedrijven" href="<?=ROOT_URL?>company">Bedrijven</a></li>
          <li><a title="Types" href="<?=ROOT_URL?>type">Types</a></li>
          <li><a title="Contact" href="<?=ROOT_URL?>contact">Contact</a></li>
        </ul>
      </div>
    </div>
  </nav>
</div>
<div id="container" class="container-fluid">
