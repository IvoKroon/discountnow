<?php
require_once("includes/settings.php");
//session class
require_once("includes/controllers/SessionController.php");
require_once("includes/controllers/RedirectController.php");

require_once("includes/bootstrap/autoload.php");
//if()
require_once("includes/routes.php");
new Router();

