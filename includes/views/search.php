<?php

$search = new SearchController();
$search_data = $search->searching();

$discount = $search_data['discount'];
$company = $search_data['company'];
?>

<h1 class="title_top_center">Zoeken</h1>

<?php if(count($discount) == 0 && count($company) == 0){
    ?>
    <h3>Niks gevonden.</h3>
    <?php
}else{
    if(count($discount) != 0){
    ?>

<div class="title_container">
    <h1 class="title_top">Kortingen</h1>
</div>
<div class="row">
    <?php foreach($discount as $row):?>
        <div class="col-md-3 col-xs-6 disc_block">
            <a href="detail/<?= $row['id']  ?>">
                <div class="disc_block_content">
                    <img class="disc_img" title="<?= $row['title'] ?>" src="<?= ROOT_URL ?>includes/views/images/tree_dummy.jpg">
                    <h4><?= ucfirst($row['title']) ?></h4>
                    <p class="disc_block_description"><?= $row['description'] ?></p>
                </div>
            </a>
        </div>
    <?php endforeach ?>
</div>
<?php }

    if(count($company) != 0){
        ?>
<div class="title_container">
    <h1 class="title_top">Bedrijven</h1><a class="title_link" href="<?= ROOT_URL ?>company">Alle</a>
</div>
<div class="row">
    <?php foreach($company as $row):?>
        <div class="col-md-3 col-xs-6 disc_block">
            <a href="company_detail/<?= $row['id']  ?>">
                <div class="disc_block_content">
                    <img class="disc_img" title="<?= $row['name'] ?>" src="<?= ROOT_URL ?>includes/views/images/tree_dummy.jpg">
                    <h4><?= ucfirst($row['name']) ?></h4>
                    <p class="disc_block_description"><?= $row['type_name'] ?></p>
                </div>
            </a>
        </div>
    <?php endforeach ?>
</div>
        <?php }
}?>