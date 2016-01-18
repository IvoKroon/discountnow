<?php
$discountCodes = new DiscountCodes();
$detailController = new DetailController();
$image = new Image();
$discount_code_controller = new DiscountCodeController();

$data = $detailController->showDetailData();

$image_data = $image->loadImage($data['data']['image_id']);

$discount_code = $discountCodes->getCodeByUserId($data['data']['id']);
?>
<input type="hidden" class="d_id" value="<?= $data['data']['id'] ?>">
<input type="hidden" class="discount_used" value="<?= $discount_code? 1 : 2 ?>">
<div cslass="row detail_data">
    <div class="col-md-8">
        <img class="detail_image" src="<?= ROOT_URL ?>includes/views/images/<?= $image_data['image'] ?>" title="<?= $image_data['title'] ?>">
    </div>
    <div class="col-md-4">
        <h1 class="text-center"><?= ucfirst($data['data']['title']) ?> </h1>
    </div>
    <div class="col-md-4 extra_data">
        <p class="text-center">Einddatum : <b><?= $data['data']['end_date'] ?></b></p>
    </div>
    <div class="col-md-4 text-center">

        <?php if($data['saved']){  ?>
            <button value="<?= $data['data']['id'] ?>" data-discountid="<?= $data['data']['id'] ?>" class="save_button_disc de_save_button">Verwijderen</button>
        <?php }else{ ?>
            <button value="<?= $data['data']['id'] ?>" data-discountid="<?= $data['data']['id'] ?>" class="save_button_disc">Opslaan</button>
        <?php }

        if($data['data']['style'] != 2){
        ?>
    </div>
    <div class="col-md-4 text-center">
<!--        <button>Gebruiken</button>-->
        <button type="button" class="use_discount" data-toggle="modal" data-target="#myModal">
            Gebruiken
        </button>
    </div>
    <?php } ?>

    </d>
</div>
<div class="col-md-8 desciption_holder"><?= $data['data']['description'] ?></div>



<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel"><?= ucfirst($data['data']['title']) ?></h4>
            </div>
            <div class="modal-body">
                <?php
                    if ($data['data']['style'] == 0) {
                    ?>
                        Code : <p class="code_field"><?= $data['data']['code'] ?></p>
                <?php
                    }else if($data['data']['style'] == 1){
                        if($discount_code){
                    ?>
                            Code : <p class="code_field"><?= $discount_code['code'] ?></p>
                    <?php
                        }else{
                            ?>
                            Code : <p class="code_field"></p>
<!--                            Code : <p class="code_field">--><?//= $discount_code_controller->addNewRandomCode() ?><!--</p>-->
                    <?php

                        }
                    }
                ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
<!--                <button type="button" class="btn btn-primary">Save changes</button>-->
            </div>
        </div>
    </div>
</div>
