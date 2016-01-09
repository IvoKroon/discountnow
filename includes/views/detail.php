<?php $detailController = new DetailController();
$data = $detailController->showDetailData();
?>
<h1><?= $data['title'] ?> </h1>
<p><?= $data['description'] ?></p>
<button value="<?= $data['id'] ?>" class="save_button_disc">Opslaan</button>
