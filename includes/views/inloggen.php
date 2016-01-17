<?php

if(isset($_POST['submit'])) {
    $user = new UsersController();
    $email = $_POST['email'];
    $password = $_POST['password'];

    if($data = $user->login($email,$password)){
        header("location: http://localhost/discountnow/");
    }else{
        echo 'Er ging iets fout probeer het nog eens. '.$data;
    }
}

?>
<h1 class="title_top_center text-center">Inloggen</h1>

<form method="post" class="form-horizontal regis_form center-block">
    <div class="form-group">
        <label class="col-sm-3 control-label">Email</label>
        <div class="col-sm-9">
            <input class="form-control" type="text" name="email" placeholder="email">
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label">Password</label>
        <div class="col-sm-9">
            <input class="form-control" type="password" name="password" placeholder="password">
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-3"></div>
        <div class="col-sm-9"><input type="submit" name="submit" value="Inloggen"></div>
    </div>
</form>
