<?php
$types = new TypeController();
$all_types = $types->getAllTypes();

?>
<h1>Types</h1>

<div class="typeContent">
    <?php foreach($all_types as $types): ?>
        <a href="category/<?= $types['id'] ?>">
            <div id="row ">
                <div class="col-md-2 rowTypes">
                    <img class="imgType" src="<?= ROOT_URL ?>includes/views/images/tree_dummy.jpg">
                </div>
                <div class="col-md-10 rowTypes">
                        <div class="contentTypes">
                           <p><?= $types['name'] ?></p>
                        </div>
                </div>
            </div>
        </a>
    <?php endforeach;?>
</div>

