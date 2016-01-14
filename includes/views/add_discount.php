<?php

//check if user with a company
$user = new UsersController();
$user->checkCompanyLoggedIn();

$type = new Type();
$type_dat = $type->get_all_titles();


if(isset($_POST['submit'])){
    $discount = new DiscountController();
    echo "gedaan ".$discount->addDiscount();
}
?>
<h1>Kortings codes toevoegen</h1>
    <form method="post">
        <input type="text" name="title" placeholder="titel">
        <input type="text" name="description" placeholder="Beschrijving">
        <select name="kind">
            <option value="1">€</option>
            <option value="2">%</option>
        </select>
        <input type="text" name="amount" placeholder="Korting">


        <select name="type_id">
            <?php foreach($type_dat as $row): ?>
                <option value="<?= $row['id'] ?>"><?= $row['name'] ?></option>
            <?php endforeach; ?>
        </select>

        <p>Start date: <input type="text" name="start_date" id="datepicker"></p>
        <p>End date: <input type="text" name="end_date" id="datepicker2"></p>

        <input type="submit" name="submit" value="Toevoegen">
    </form>
