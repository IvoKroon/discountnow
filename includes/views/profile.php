<?php

$user = new Users();
$user = $user->getUserByUserId();

if(isset($_POST['submit'])) {
    $user_c = new UsersController();
    if($result = $user_c->updateUserProfile()){
        echo 'DONE';
        RedirectController::to(ROOT_URL."profile");
    }else{
        echo 'error'.$result;
    }
}
?>
<form method="post" >
    <div class="form-group">
        <label for="naam">Naam</label>
        <input type="text" class="form-control" id="naam" value="<?= $user['name'] ?>" name="name" placeholder="Naam">
    </div>

    <div class="form-group">
        <label for="lastname">Achternaam</label>
        <input type="text" class="form-control" id="lastname" value="<?= $user['lastname'] ?>" name="lastname" placeholder="Achternaam">
    </div>

    <div class="form-group">
        <label for="email">Email</label>
        <input type="text" class="form-control" value="<?= $user['email']?>" id="email" name="email" placeholder="Email">
    </div>
    <label>
        <a href="<?= ROOT_URL."update_password" ?>">Wachtwoord aanpassen </a>
    </label></br>

    <input type="submit" name="submit" class="btn btn-default" value="Aanpassen">
</form>

