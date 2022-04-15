<?php
session_start();



$login = $_SESSION['login'];
echo $login."<br>";
$count = $_GET['count'];
$good_id = $_GET['id'];

include('config.php');

$sql_user = "SELECT `id_user` FROM `user` WHERE `user_login`='$login'";
$res_user = mysqli_fetch_assoc(mysqli_query($connect,$sql_user))['id_user'];

// $sql_good = "SELECT `id`, `title`, `price` FROM `goods` WHERE id='$good_id'";
// $res_good = mysqli_query($connect,$sql_good);

$sql_cart = "SELECT `id` FROM `cart` WHERE `good_id`='$good_id' and `user_id`='$res_user'";
$res_cart = mysqli_query($connect,$sql_cart);
$cart_id = null;

if ($res= mysqli_fetch_assoc($res_cart)) {
    $cart_id = $res['id'];
    $sql_cart_upd = "UPDATE `cart` SET `count`=count+$count WHERE id='$cart_id'";
    mysqli_query($connect,$sql_cart_upd);
    header("Location:../templates/");
} else {
    $sql_cart_add = "INSERT INTO `cart`(`good_id`, `count`, `user_id`) VALUES ('$good_id','$count','$res_user')";

    if(mysqli_query($connect,$sql_cart_add)) {
        header("Location:../templates/");
    } else {
        print mysqli_error($connect);
    
    }

};






print_r(error_get_last());
