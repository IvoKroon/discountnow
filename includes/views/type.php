<?php
$types = new TypeController();
$all_types = $types->getAllTypes();

?>
<h1>Types</h1>
<div class="type_content">
    <?php foreach($all_types as $types): ?>
            <a href="category/<?= $types['id'] ?>">
                <div class="row type_row">
                    <div class="col-xs-1 rowTypes">
                        <img class="imgType" src="<?= ROOT_URL ?>includes/views/images/tree_dummy.jpg">
                    </div>
                    <div class="col-xs-11 rowTypes">
                            <div class="contentTypes">
                               <h3><?= $types['name'] ?> <span class="badge"> 4 </span></h3>

                            </div>
                    </div>
                </div>
            </a>
    <?php endforeach;?>
</div>
