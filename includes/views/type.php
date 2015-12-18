<?php
//$types = new TypesController();
//$all_types = $types->getAllTypes();
$data = new DiscountController();
?>
<h1>Types</h1>
<ul>

<?php foreach($all_types as $types): ?>

    <li><?= $types['name'] ?></li>

<?php endforeach;?>

</ul>
