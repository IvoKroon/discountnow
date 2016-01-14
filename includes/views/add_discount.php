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
    <form method="post">
        <div class="form-group">
            <label for="exampleInputEmail1">Titel</label>
            <input type="text" class="form-control" name="title" placeholder="titel">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Description</label>
            <input type="text" class="form-control" name="description" placeholder="Beschrijving">
        </div>
        <div class="form-group">
            <label class="">Korting</label>
            <div class="input-group">
                <span class="input-group-addon">
                    € <input type="radio" name="kind"  aria-label="" value="1" checked>
                    % <input type="radio" name="kind" aria-label="" value="2">
                </span>
                <input type="text" name="amount" class="form-control amount_textfield" placeholder="Korting">
            </div>
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">Type</label>
            <select class="form-control" name="type_id">
                <?php foreach($type_dat as $row): ?>
                    <option value="<?= $row['id'] ?>"><?= $row['name'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">Start datum</label>
            <input type="text" class="form-control" name="start_date" id="datepicker">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Start datum</label>
            <input type="text" name="end_date" class="form-control" id="datepicker2">
        </div>



        <?php if(isset($message) && $message){ ?>
            <div class="alert alert-success" role="alert">Het toevoegen is gelukt!</div>
        <?php }else if(isset($message)){ ?>
            <div class="alert alert-danger" role="alert">Er ging iets fout probeer het nog eens.</div>
        <?php } ?>

        <input type="submit" name="submit" value="Toevoegen">
    </form>
