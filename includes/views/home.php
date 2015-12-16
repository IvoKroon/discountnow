<?php $data = new HomeController();

?>
<h1 xmlns="http://www.w3.org/1999/html">Home</h1>
    <div class="disc_block_content">

    <?php foreach($data->showAllData() as $row):?>

        <div class="disc_block">
            <h4><?= $row['title']  ?></h4>
            <p><?= $row['description'] ?></p>
            <a href="detail/<?= $row['id']  ?>" <button> Bekijken </button></a>
        </div>

    <?php endforeach ?>

    </div>
