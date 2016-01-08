<?php
$discount = new DiscountController();
$types = new TypeController();
$all_discounts = $discount->getAllDiscountsByType();
$title = $types->getTypeTitle();
?>

<h2 class="page_title"><?= $title['name']  ?></h2>
<!--<ul>-->
<!--    --><?php //foreach($all_discounts as $discount):?>
<!---->
<!--        <li>--><?//= $discount['title'] ?><!--</li>-->
<!---->
<!--    --><?php //endforeach;?>
<!--</ul>-->

<div class="row">
    <?php foreach($all_discounts as $row):?>
        <div class="col-md-3 col disc_block">
            <a href="../detail/<?= $row['id']  ?>">
                <div class="disc_block_content">
                    <img class="disc_img" title="<?= $row['title'] ?>" src="<?= ROOT_URL ?>includes/views/images/tree_dummy.jpg">
                    <h4><?= $row['title']  ?></h4>
                    <p class="disc_block_description"><?= $row['description'] ?></p>
                </div>
            </a>
        </div>
    <?php endforeach ?>
</div>
