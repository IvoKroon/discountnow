<?php
$types = new TypeController();
$all_types = $types->getAllTypes();

?>
<h1>Types</h1>
<ul>

<?php foreach($all_types as $types): ?>

    <li><a href="category/<?= $types['id'] ?>"><?= $types['name'] ?></a></li>

<?php endforeach;?>

</ul>
