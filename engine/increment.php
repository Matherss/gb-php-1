<?php


// Увеличиваем число просмотров на 1 при открытии модалки с большим изображением
    $id = $_GET['id'];
    include 'config.php';
    $updSql = "update images SET views=views+1 where id=$id";
    mysqli_query($connect,$updSql);
    mysqli_close($connect);
    
    
