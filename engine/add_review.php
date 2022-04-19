<?php
include('config.php');


if ($_POST['add']) {
    $name = substr((string)htmlspecialchars(strip_tags($_POST['user_name'])), 0, 64);
    $text = (string)htmlspecialchars(strip_tags($_POST['text']));

    mysqli_query($connect, "INSERT INTO `reviews`(`user_name`, `text`) VALUES ('$name','$text')");
    mysqli_close($connect);
    // header("location:../templates/index.php");
}