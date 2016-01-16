<?php

if(isset($_POST['submit'])){
    $user = new UsersController();
    $response = $user->register();
}

?>

<h1 class="title_top_center text-center">Registeren</h1>

<form method="post" class="form-horizontal regis_form center-block">
    <div class="form-group">
        <label class="col-sm-3 control-label">Email *</label>
        <div class="col-sm-9">
            <input class="form-control" name="email" type="text" placeholder="Email">
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label">Naam *</label>
        <div class="col-sm-9">
            <input class="form-control" name="name" type="text" placeholder="Naam">
        </div>
    </div>
    <div class="form-group">
            <label class="col-sm-3 control-label">Achternaam *</label>
        <div class="col-sm-9">
            <input class="form-control" name="lastname" type="text" placeholder="Achternaam">
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label">Leeftijd *</label>
        <div class="col-sm-9">
            <input class="form-control" name="age" type="text" placeholder="Leeftijd">
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label">Geslacht *</label>
        <div class="col-sm-9">
<!--            <input class="form-control" name="gender" type="text" placeholder="Geslacht">-->
            <input type="radio" name="gender" checked="checked" value="Man"> Man
            <input type="radio" name="gender" value="Vrouw"> Vrouw
            <input type="radio" name="gender" value="Anders"> Anders
        </div>
    </div>

    <div class="form-group" >
            <label class="col-sm-3 control-label">Password *</label>
        <div class="col-sm-9">
            <input class="form-control" name="pass" type="password" placeholder="Password">
        </div>
    </div>

    <div class="form-group">
            <label class="col-sm-3 control-label">Submit password *</label>
        <div class="col-sm-9">
            <input class="form-control" name="checkpass" type="password" placeholder="Password">
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-3"></div>
        <label class="col-sm-9">Verplicht = *</label>
    </div>
    <?php if(isset($response)){ ?>
    <div class="form-group">
        <div class="col-sm-3"></div>
        <label class="col-sm-9 red_text"><?= $response ?></label>
    </div>
    <?php } ?>
    <div class="form-group">
        <div class="col-sm-3"></div>
        <div class="col-sm-9"><input type="submit" name="submit" value="Aanmaken"></div>
    </div>
</form>