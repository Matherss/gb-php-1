<?php
include 'config.php';
$cart_id = $_GET['id'];

$sql = "DELETE FROM `cart` WHERE id='$cart_id'";

if(mysqli_query($connect,$sql)) {
    header('Location:../templates/cart.php');
}

