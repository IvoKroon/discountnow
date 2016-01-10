<?php

$user = new UsersController();
$user->checkLoggedIn();

$getAllSaved = new DiscountSavedController();
$allSaved = $getAllSaved->showAll();

foreach($allSaved as $row):

?>

    <h1><?= $row['title'] ?></h1>

<?php

endforeach;