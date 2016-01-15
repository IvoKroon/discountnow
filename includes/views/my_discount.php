<?php
$user = new UsersController();
$user->checkCompanyLoggedIn();

$discount = new Discount();
$all_discount = $discount->getDiscountAsAdmin();

$disc = new MyDiscountController();
?>
<div class="title_container">
    <h1 class="title_top">Mijn Kortingen</h1>
</div>

<div class="type_content">
    <?php foreach($all_discount as $discount): ?>
        <a href="admin_detail/<?= $discount['id'] ?>">
            <div class="row type_row">
                <div class="col-xs-1 rowTypes">
                    <img class="imgType" src="<?= ROOT_URL ?>includes/views/images/tree_dummy.jpg">
                </div>
                <div class="col-xs-11 rowTypes">
                    <div class="contentTypes">
                        <h3><?= $discount['title'] ?> </h3>
                        <div class="get_state"><?= $disc->getStatus($discount['start_date'],$discount['end_date']) ?></div>
                    </div>
                </div>
            </div>
        </a>
    <?php endforeach;?>
</div>



