<?php $detailController = new DetailController();
$data = $detailController->showDetailData();
?>
<h1><?= $data['title'] ?> </h1>
<p><?= $data['description'] ?></p>

