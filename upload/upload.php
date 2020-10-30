<?php 

//var_dump($_FILES);

//move_uploaded_file($_FILES['upload_file']['tmp_name'],'uploads/'.$_FILES['upload_file']['name']);


$folder_path= 'upload/';
$file_path = $folder_path.$_FILES['upload_file']['name'];

$uploadOk = 1;

if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["upload_file"]["tmp_name"]);
    if($check !== false) {
      echo "File is an image - " . $check["mime"] . ".";
      $uploadOk = 1;
    } else {
      echo "File is not an image.";
      $uploadOk = 0;
    }
}
?>