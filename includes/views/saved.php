<?php

$user = new UsersController();
$user->checkLoggedIn();

$getAllSaved = new DiscountSavedController();
$allSaved = $getAllSaved->showAll();
?>

<div class="row">
    <?php foreach($allSaved as $row): ?>
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