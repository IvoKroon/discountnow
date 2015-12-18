<?php
$data = new HomeController();
$discounts = new DiscountController();
$data_newest = $discounts->showNewestDiscounts();
$data_top4 = $discounts->showTop4Best();
?>
<!--<h1 xmlns="http://www.w3.org/1999/html">Home</h1>-->
    <div class="disc_block_content">
        <div class="title_container">
            <h2 class="title_top">Nieuwste kortingen</h2><a class="title_link" href="">bekijke nieuwste</a>
        </div>

    <?php foreach($data_newest as $row):?>

        <div class="disc_block">
            <h4><?= $row['title']  ?></h4>
            <p><?= $row['description'] ?></p>
            <a href="detail/<?= $row['id']  ?>" <button> Bekijken </button></a>
        </div>

    <?php endforeach ?>

    </div>

<div class="disc_block_content">
    <div class="title_container">
        <h2 class="title_top">Top 40</h2><a class="title_link" href="">bekijk alles</a>
    </div>

    <?php foreach($data_top4 as $row):?>

        <div class="disc_block">
            <h4><?= $row['title']  ?></h4>
            <p><?= $row['description'] ?></p>
            <a href="detail/<?= $row['id']  ?>" <button> Bekijken </button></a>
        </div>

    <?php endforeach ?>

</div>
