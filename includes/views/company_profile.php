<?php
$user = new UsersController();
$user->checkCompanyLoggedIn();

$company = new Company();
$comp_data = $company->getCompanyByUserId();

$type = new Type();
$typ_data = $type->getTitleById($comp_data['type_id']);


?>

<h1><?= $comp_data['name'] ?></h1>
<h4><?= $typ_data['name'] ?></h4>