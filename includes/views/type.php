<?php
$types = new Type();
$all_types = $types->all();

?>
<h1>Types</h1>
<div class="type_content">
    <?php foreach($all_types as $type): ?>
            <a href="category/<?= $type['id'] ?>">
                <div class="row type_row">
<!--                    <div class="rowTypes">-->
                        <img class="col-xs-1 imgType" src="<?= ROOT_URL ?>includes/views/images/tree_dummy.jpg">
<!--                    </div>-->
                    <div class="col-xs-11 rowTypes">
                            <div class="contentTypes">
                               <h3><?= $type['name'] ?> <span class="badge"> <?= $type['amount_discount'] ?> </span></h3>

                            </div>
                    </div>
                </div>
            </a>
    <?php endforeach;?>
</div>
