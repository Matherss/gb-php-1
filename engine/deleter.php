<?php


    include 'config.php';
 $delSql = "DELETE FROM `images`";
mysqli_query($connect,$delSql);
mysqli_close($connect);
// Очищаем папки от удаленных из бд фоток:
array_map('unlink', glob('../public_html/img/big/*'));
array_map('unlink', glob('../public_html/img/small/*'));
header("Location:../templates/index.php");
exit;
