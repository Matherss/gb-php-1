<?php
include('config.php');
$id = $_POST['id'];
$option = $_POST['action'];
$title = $_POST['title'];
$price = $_POST['price'];
$info = $_POST['info'];
$old_img = $_POST['old_img'];
$pathSmall = "../img/small/".$_FILES['img']['name']; 
$path = "../img/big/".$_FILES['img']['name']; 
$img = $_FILES['img']['name'];

    switch ($option) {
        case 'delete':
            $sql = "DELETE FROM `goods` WHERE id=$id";
            array_map('unlink', glob("../img/big/$old_img"));
            array_map('unlink', glob("../img/small/$old_img"));
            break;
        case 'edit':
            $sql = "UPDATE `goods` SET `title`='$title',`price`='$price',`info`='$info' WHERE id=$id";

            break;
        
        default:

            break;
    }


print_r($_POST);
mysqli_query($connect,$sql);

if(move_uploaded_file($_FILES['img']['tmp_name'], $path)) {
    list($width, $height) = getimagesize($path); // берем размер оригинала
    $image_p = imagecreatetruecolor(200, 100); // создаем пустую картинку
    $image = imagecreatefromjpeg($path); // создаем картинку из оригинала
    imagecopyresampled($image_p, $image, 0, 0, 0, 0, 200, 100, $width, $height); //копируем image в image_p с изменением размера
    imagejpeg($image_p,$pathSmall); // создаем маленькое изображение в папке small
    $photoSql = "UPDATE `goods` SET `img`='$img' WHERE id=$id";
    mysqli_query($connect,$photoSql);
    array_map('unlink', glob("../img/big/$old_img"));
    array_map('unlink', glob("../img/small/$old_img"));
}
mysqli_close($connect);


header("Location:../templates/admin.php");