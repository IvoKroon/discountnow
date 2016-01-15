<?php

/**
 * Created by PhpStorm.
 * User: ivokroon
 * Date: 15/01/16
 * Time: 09:46
 */
class ImageUploadController
{
    private $_sizes;
    private $_target_upload;

    public function __construct()
    {
        $this->_target_upload = ROOT_URL."includes/views/images/";
        $this->_sizes = 500000;
    }

    public function upload_image(){
    try {
        //check if there is an error.
        if (!isset($_FILES['fileToUpload']['error']) || is_array($_FILES['fileToUpload']['error'])) {
            throw new RuntimeException('Invalid parameters.');
        }

        //check what the error is.
        switch ($_FILES['fileToUpload']['error']) {
            case UPLOAD_ERR_OK:
                break;
            case UPLOAD_ERR_NO_FILE:
                throw new RuntimeException('No file sent.');
            case UPLOAD_ERR_INI_SIZE:
            case UPLOAD_ERR_FORM_SIZE:
                throw new RuntimeException('Exceeded filesize limit.');
            default:
                throw new RuntimeException('Unknown errors.');
        }

        if($_FILES['fileToUpload']['size'] > 500000){
            throw new RuntimeException('Exceeded filesize limit.');
        }

        $file_info = new finfo(FILEINFO_MIME_TYPE);
        $file_info = $file_info->file($_FILES['fileToUpload']['tmp_name']);
        if (false === $ext = array_search($file_info,
                array(
                    'jpg' => 'image/jpeg',
                    'png' => 'image/png',
                    'gif' => 'image/gif',
                ),
                true
            )) {
            throw new RuntimeException('Invalid file format.');
        }

        $image_to_upload = move_uploaded_file("test.jpg",$this->_target_upload);

        if (!move_uploaded_file(
            $_FILES['fileToUpload']['tmp_name'],
            $string = sprintf($this->_target_upload.'%s.%s',
                $sha = sha1_file($_FILES['fileToUpload']['tmp_name']),
                $ext
            )
        )) {
            throw new RuntimeException('Failed to move uploaded file. '.$string. " - ". $ext. " - " . $sha);
        }

        return 'File is uploaded successfully.';


    }catch (RuntimeException $e){
        return $e;
    }
//        $data = $_FILES['fileToUpload']['name'];
//        $size = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    }

    private function checkImageSize($image){
//        if($image[])
    }

}



//$target_dir = "uploads/";
//$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
//$uploadOk = 1;
//$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
//// Check if image file is a actual image or fake image
//if(isset($_POST["submit"])) {
//    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
//    if($check !== false) {
//        echo "File is an image - " . $check["mime"] . ".";
//        $uploadOk = 1;
//    } else {
//        echo "File is not an image.";
//        $uploadOk = 0;
//    }
//}
// Check if file already exists
//if (file_exists($target_file)) {
//    echo "Sorry, file already exists.";
//    $uploadOk = 0;
//}
//// Check file size
//if ($_FILES["fileToUpload"]["size"] > 500000) {
//    echo "Sorry, your file is too large.";
//    $uploadOk = 0;
//}
//// Allow certain file formats
//if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
//    && $imageFileType != "gif" ) {
//    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
//    $uploadOk = 0;
//}
//// Check if $uploadOk is set to 0 by an error
//if ($uploadOk == 0) {
//    echo "Sorry, your file was not uploaded.";
//// if everything is ok, try to upload file
//} else {
//    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
//        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
//    } else {
//        echo "Sorry, there was an error uploading your file.";
//    }
//}