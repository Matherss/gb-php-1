<?php
if ($_POST['addgood']) {
$pathSmall = "../img/small/".$_FILES['img']['name']; 
$path = "../img/big/".$_FILES['img']['name']; 
$title = substr((string)htmlspecialchars(strip_tags($_POST['title'])), 0, 64);
$price = (string)htmlspecialchars(strip_tags($_POST['price']));
$info = (string)htmlspecialchars(strip_tags($_POST['info']));
$img = $_FILES['img']['name'];
if(move_uploaded_file($_FILES['img']['tmp_name'], $path)) {
    list($width, $height) = getimagesize($path); // берем размер оригинала
    $image_p = imagecreatetruecolor(200, 100); // создаем пустую картинку
    $image = imagecreatefromjpeg($path); // создаем картинку из оригинала
    imagecopyresampled($image_p, $image, 0, 0, 0, 0, 200, 100, $width, $height); //копируем image в image_p с изменением размера
    imagejpeg($image_p,$pathSmall); // создаем маленькое изображение в папке small
    include_once('config.php');
    // INSERT INTO `goods`(`id`, `title`, `price`, `info`, `img`) VALUES ('[value-1]','[value-2]','[value-3]','[value-4]','[value-5]')
    $sql = "INSERT INTO `goods`(`title`, `price`, `info`, `img`) VALUES ('$title','$price','$info','$img')";
    mysqli_query($connect,$sql);
    mysqli_close($connect);

    header("Location:../templates/");
    exit;
}

}