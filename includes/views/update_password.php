<?php

$user = new UsersController();
$user->checkLoggedIn();

$response =  $user->setNewPassword();

?>

<div class="title_container">
    <h1 class="title_top">Nieuw wachtwoord instellen</h1>
</div>

<form method="post">
    <div class="form-group">
        <label >Oud wachtwoord</label>
        <input type="password" name="old_pass" class="form-control" placeholder="Oud wachtwoord">
    </div>

    <div class="form-group">
        <label >Nieuw wachtwoord</label>
        <input type="password" name="new_pass" class="form-control" placeholder="Nieuw wachtwoord">
    </div>

    <div class="form-group">
        <label >Nieuw wachtwoord check</label>
        <input type="password" name="new_pass_check" class="form-control" placeholder="Check wachtwoord">
    </div>

    <?php if(isset($response)){
        if($response){
        ?>

        <div class="form-group">
            <label class="green_text">Wachtwoord aangepast</label>
        </div>

            <?php }else{ ?>

        <div class="form-group">
            <label class="red_text"><?= $response ?></label>
        </div>

    <?php }} ?>

    <div class="form-group">
        <input type="submit" name="submit" value="Aanpassen">
    </div>
</form>

