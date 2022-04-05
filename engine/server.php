<?php
$pathSmall = "../public_html/img/small/".$_FILES['photo']['name']; 
$path = "../public_html/img/big/".$_FILES['photo']['name']; 
$size = $_FILES['photo']['size'];
$name = $_FILES['photo']['name'];
if(move_uploaded_file($_FILES['photo']['tmp_name'], $path)) {
    list($width, $height) = getimagesize($path); // берем размер оригинала
    $image_p = imagecreatetruecolor(200, 320); // создаем пустую картинку
    $image = imagecreatefromjpeg($path); // создаем картинку из оригинала
    imagecopyresampled($image_p, $image, 0, 0, 0, 0, 200, 320, $width, $height); //копируем image в image_p с изменением размера
    imagejpeg($image_p,$pathSmall); // создаем маленькое изображение в папке small
    include_once('config.php');
    $sql = "INSERT INTO `images`(`title`, `src`, `size`) VALUES ('$name','$path','$size')";
    if(mysqli_query($connect,$sql)){
        header("Location: ../templates/index.php");
    } else {
        echo mysqli_error($connect);
    }
    mysqli_close($connect);

    
    exit;
}
