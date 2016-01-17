<?php

//check if user with a company
$user = new UsersController();
$user->checkCompanyLoggedIn();

$type = new Type();
$type_dat = $type->get_all_titles();


if(isset($_POST['submit'])){
    $discount = new DiscountController();
    $message = $discount->addDiscount();
}
?>
<div class="title_container">
    <h1 class="title_top">Korting toevoegen</h1>
</div>
    <form method="post" class="form-horizontal regis_form center-block add_discount_form">
        <div class="form-group">
            <label class="col-sm-3">Titel</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" name="title" placeholder="Titel">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3">Description</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" name="description" placeholder="Beschrijving">
            </div>
        </div>

        <div class="form-group add_discount_kind">
            <label class="col-sm-3">Soort</label>
            <div class="col-sm-9">
                <select class="form-control style_value" name="style" >
                    <option value="0">1 Code (iedereen dezelfde code)</option>
                    <option value="1">Meerder willekeurige codes (automatisch verschillende codes)</option>
                    <option value="2">Zonder code (Advertentie)</option>
                </select>
            </div>
        </div>

        <div class="form-group add_discount_code">
            <label class="col-sm-3">Code</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" name="code" placeholder="Code">
            </div>
        </div>

        <div class="form-group add_discount_korting">
            <label class="col-sm-3 class=">Kortingsoort</label>
            <div class="col-sm-9">
                <div class="input-group">
                    <span class="input-group-addon">
                        € <input type="radio" name="kind"  aria-label="" value="1" checked>
                        % <input type="radio" name="kind" aria-label="" value="2">
                    </span>
                    <input type="text" name="amount" class="form-control amount_textfield" placeholder="Korting">
                </div>
            </div>
        </div>

        <div class="form-group add_discount_type">
            <label class="col-sm-3">Type</label>
            <div class="col-sm-9">
                <select class="form-control" name="type_id">
                    <?php foreach($type_dat as $row): ?>
                        <option value="<?= $row['id'] ?>"><?= $row['name'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3">Startdatum</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" name="start_date" id="datepicker">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3" >Einddatum</label>
            <div class="col-sm-9">
                <input type="text" name="end_date" class="form-control" id="datepicker2">
            </div>
        </div>



        <?php if(isset($message) && $message){ ?>
            <div class="alert alert-success" role="alert">Het toevoegen is gelukt!</div>
        <?php }else if(isset($message)){ ?>
            <div class="alert alert-danger" role="alert">Er ging iets fout probeer het nog eens.</div>
        <?php } ?>

        <input type="submit" name="submit" value="Toevoegen">
    </form>
