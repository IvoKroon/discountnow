<?php
$data = new HomeController();
$discounts = new DiscountController();
//$type = new TypeController();
$data_newest = $discounts->showNewestDiscounts();
$data_top4 = $discounts->showTop4Best();
?>
<!--<h1 xmlns="http://www.w3.org/1999/html">Home</h1>-->
<div class="disc_block_holder">
    <div class="title_container">
        <h2 class="title_top">Nieuwste</h2><a class="title_link" href="<?= ROOT_URL ?>nieuwste">bekijk alles</a>
    </div>
    <div class="row">
        <?php foreach($data_top4 as $row):?>
            <div class="col-md-3 col disc_block">
                <a href="detail/<?= $row['id']  ?>">
                    <div class="disc_block_content">
                        <img class="disc_img" title="<?= $row['title'] ?>" src="<?= ROOT_URL ?>includes/views/images/tree_dummy.jpg">
                        <h4><?= $row['title']  ?></h4>
                        <p class="disc_block_description"><?= $row['description'] ?></p>
                    </div>
                </a>
            </div>
        <?php endforeach ?>
    </div>
</div>


<div class="disc_block_holder">
    <div class="title_container">
        <h2 class="title_top">Top 40</h2><a class="title_link" href="">bekijk alles</a>
    </div>
    <div class="row">
    <?php foreach($data_top4 as $row):?>
        <div class="col-md-3 col disc_block">
                <a href="detail/<?= $row['id']  ?>">
                    <div class="disc_block_content">
                        <img class="disc_img" title="<?= $row['title'] ?>" src="<?= ROOT_URL ?>includes/views/images/tree_dummy.jpg">
                        <h4><?= $row['title']  ?></h4>
                        <p class="disc_block_description"><?= $row['description'] ?></p>
                    </div>
                </a>
        </div>
    <?php endforeach ?>
    </div>
</div>
