<?php

if(isset($_POST['submit'])){
    $user = new UsersController();
    echo $user->register();
}

?>
<form method="post">
    <div id="row"><label>Email</label> <input name="email" type="text" placeholder="Email"></div>
    <div id="row"><label>Naam</label> <input name="name" type="text" placeholder="Naam"></div>
    <div id="row"><label>Achternaam</label> <input name="lastname" type="text" placeholder="Achternaam"></div>
    <div id="row"><label>Leeftijd</label> <input name="age" type="text" placeholder="Leeftijd"></div>
    <div id="row"><label>Geslacht</label> <input name="gender" type="text" placeholder="Geslacht"></div>
    <div id="row"><label>Password</label> <input name="pass" type="password" placeholder="Password"></div>
    <div id="row"><label>Submit password</label> <input name="checkpass" type="password" placeholder="Password"></div>
    <div id="row"><input type="submit" name="submit" value="Aanmaken"></div>
</form>