<?php
session_start();

$login = $_SESSION['login'];
echo $login."<br>";
$count = $_GET['count'];
$good_id = $_GET['id'];

include('config.php');

$sql_user = "SELECT `id_user` FROM `user` WHERE `user_login`='$login'";

$sql_good = "SELECT `id`, `title`, `price` FROM `goods` WHERE id='$good_id'";

$sql_cart = "SELECT `count` FROM `goods` WHERE good_id='$good_id'";


$res_user = mysqli_fetch_assoc(mysqli_query($connect,$sql_user))['id_user'];


$sql_cart_add = "INSERT INTO `cart`(`good_id`, `count`, `user_id`) VALUES ('$good_id','$count','$res_user')";
$res_good = mysqli_query($connect,$sql_good);
if(mysqli_query($connect,$sql_cart_add)) {
    header("Location:../templates/");
} else {
    print mysqli_error($connect);

}