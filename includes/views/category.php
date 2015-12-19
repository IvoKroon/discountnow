<?php
$discount = new DiscountController();
$types = new TypeController();
$all_discounts = $discount->getAllDiscountsByType();
$title = $types->getTypeTitle();
?>

<h2><?= $title['name']  ?></h2>
<ul>
    <?php foreach($all_discounts as $discount):?>

        <li><?= $discount['title'] ?></li>

    <?php endforeach;?>
</ul>
