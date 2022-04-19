<?php
include 'config.php';
$cart_id = $_GET['id'];
$count = $_GET['count'];

$sql_cart_upd = "UPDATE `cart` SET `count`='$count' WHERE id='$cart_id'";

mysqli_query($connect,$sql_cart_upd);
