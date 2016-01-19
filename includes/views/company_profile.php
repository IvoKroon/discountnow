<?php
$user = new UsersController();
$user->checkCompanyLoggedIn();

$company = new Company();
$comp_data = $company->getCompanyByUserId();



if(isset($_POST['submit'])){
    $comp_controler = new CompanyController();
    echo $comp_controler->update_date();
}

$type = new Type();
$typ_data = $type->getTitleById($comp_data['type_id']);

$types = $type->all();


?>
<div class="title_container">
    <h1 class="title_top">Admin profiel</h1>
</div>
<form method="post">
    <input type="hidden" value="<?= $comp_data['id'] ?>" name="id">
    <div class="form-group">
        <label>Bedrijfs naam</label>
        <input type="text" name="company_name" class="form-control" value="<?= $comp_data['name'] ?>">
    </div>

    <div class="form-group">
        <label>Bedrijfs naam</label>
        <select class="form-control" name="type">
            <option name="type" selected="selected"  value="<?= $typ_data['id'] ?>" ><?= $typ_data['name'] ?></option>
            <?php foreach($types as $type): ?>
            <option name="type" value="<?= $type['id'] ?>"><?= $type['name'] ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <input type="submit" name="submit" value="Aanpassen">
</form>