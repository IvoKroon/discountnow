<?php

$discounts = new Discount();
$getNewest = $discounts->getAllNewestDiscounts();
?>
<h1>Nieuwste</h1>
<div class="row">
        <?php foreach($getNewest as $row):?>
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