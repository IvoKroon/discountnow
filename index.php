<?php
require_once("includes/settings.php");
//session class
require_once("includes/controllers/SessionController.php");
require_once("includes/controllers/RedirectController.php");

require_once("includes/bootstrap/autoload.php");

require_once("includes/routes.php");

require_once("includes/template/header.php");
new Router();



require_once("includes/template/footer.php");
//ob_end_flush();

//Developer

