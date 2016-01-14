<?php

$company = new CompanyController();
$data_array = $company->load_data();
//foreach ($data as $row){
//    echo $row['amound_discount'];
//    echo '</br>';
//}

?>
<div class="title_container">
    <h1 class="title_top">Bedrijven</h1>
</div>
<div class="content">
    <div class="row">
        <?php
        $i = 0;
        foreach($data_array as $row):?>

            <div class="col-md-3 col-xs-6 disc_block_company">
                <a href="company_detail/<?= $row['id']  ?>">
                    <div class="disc_block_content">
                        <div class="image_holder">
    <!--                        <div class="amount_discounts">--><?//= $row['count_disc'] ?><!--</div>-->
                            <img class="disc_img" title="<?= ucfirst($row['name']) ?>" src="<?= ROOT_URL ?>includes/views/images/tree_dummy.jpg">
                        </div>
                            <h4 class="disc_block_header"><?= ucfirst($row['name'])  ?></h4>
                            <button class="btn " type="button">
                                Kortingen <span class="badge"><?= $row['count_disc'] ?></span>
                            </button>
    <!--                    <p>--><?//= $row['count_disc'] ?><!--</p>-->
                    </div>
                </a>
            </div>
        <?php endforeach ?>
    </div>
</div>

