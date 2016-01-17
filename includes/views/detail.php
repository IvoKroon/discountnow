<?php

$detailController = new DetailController();
$data = $detailController->showDetailData();
//print_r()
?>
<h1><?= $data['data']['title'] ?> </h1>
<p><?= $data['data']['description'] ?></p>
<?php if($data['saved']){  ?>
    <button value="<?= $data['data']['id'] ?>" data-discountid="<?= $data['data']['id'] ?>" class="save_button_disc de_save_button">Verwijderen</button>
<?php }else{ ?>
    <button value="<?= $data['data']['id'] ?>" data-discountid="<?= $data['data']['id'] ?>" class="save_button_disc">Opslaan</button>
<?php }
?>

<button>Gebruiken</button>
