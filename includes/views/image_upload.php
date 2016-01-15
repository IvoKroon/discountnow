<?php

if(isset($_POST['submit'])) {
    $files = new ImageUploadController();
    echo $files->upload_image();
}

?>

<form method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload Image" name="submit">
</form>