
<?php
include 'config.php';
$id = $_GET['id'];
$status = $_GET['status'];

$sql = "UPDATE `orders` SET `status`='$status' WHERE id='$id'";

mysqli_query($connect,$sql);
