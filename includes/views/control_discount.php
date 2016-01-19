<?php

$user = new UsersController();
$user->checkCompanyLoggedIn();

$discount = new Discount();

if(isset($_GET['id'])) {
    $discount_data = $discount->getOneDiscountById($_GET['id']);
    $discount_code = new DiscountCodes();
//    if($discount_code->checkUserBelongsToDiscount($_GET['id'])){
//        if(isset($_POST['submit'])){
//
//            echo $d_code_controller->checkDiscount();
//        }
//    }else{
//        RedirectController::redirectToHome();
//    }
    if(isset($_POST['submit'])) {
        $d_code_controller = new DiscountCodeController();
        echo $d_code_controller->checkDiscount();
    }
//   TODO Check if user can check discount
//    Check the discount
}else{
    RedirectController::redirectToHome();
}




?>

<h1>Controlleer Kortingscode - <?= $discount_data['title'] ?></h1>

<form method="post" >
    <div class="form-group-lg">
        <label for="naam">Code</label>
        <input type="text" class="form-control " id="naam" name="name" placeholder="Code">
    </div>
    <input type="submit" name="submit" class="check_discount" value="Controleren">
</form>
