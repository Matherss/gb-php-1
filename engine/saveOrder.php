
<?php
include 'config.php';
$id = $_GET['id'];
$sum = $_GET['sum'];


$sql = "INSERT INTO `orders`(`user_id`, `status`, `sum`) VALUES ('$id','Active','$sum')";

mysqli_query($connect,$sql);
