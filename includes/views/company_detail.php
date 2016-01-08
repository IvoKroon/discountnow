<?php
$company = new Company_detailController();
$company_detail = $company->detail_data();

?>

<h1><?= $company_detail['name'] ?></h1>
