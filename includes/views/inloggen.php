<?php

if(isset($_POST['submit'])) {
    $user = new UsersController();
    $email = $_POST['email'];
    $password = $_POST['password'];

    if($data = $user->login($email,$password)){
        echo 'gelukt';
    }else{
        echo 'Er ging iets fout probeer het nog eens. '.$data;
    }
}

?>

<h1>Inloggen</h1>
<form method="post">
    <input type="text" name="email" placeholder="email">
    <input type="password" name="password" placeholder="password">
    <input type="submit" name="submit" value="Inloggen">
</form>
