<?php
require_once("includes/settings.php");
//session class
//require_once("includes/controllers/SessionController.php");
require_once("includes/bootstrap/autoload.php");
require_once("includes/template/header.php");

require_once("includes/routes.php");

new Router();

require_once("includes/template/footer.php");

//master

