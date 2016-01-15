<?php
if(isset($_GET['id'])) {
    $discount = new Discount();
    $discount = $discount->getOneDiscountById($_GET['id']);
}else{
    RedirectController::error();
}
?>
<h1>Detail -  <?= $discount['title'] ?></h1>
