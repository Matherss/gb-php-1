<?php
include('config.php');

$user_login = $_POST['login'] ? strip_tags($_POST['login']) : '';
$user_password = $_POST['password'] ? strip_tags($_POST['password']) : '';
$user_name = $_POST['name'] ? strip_tags($_POST['name']) : '';
// $salt = strrev(md5($login));  - Пока что отключил за ненадобностью, но не удалил, чтобы Вы видели, что я в курсе :)
// $pass = $salt.md5($password);
$pass = md5($user_password);
$sql = "INSERT INTO `user`(`user_name`, `user_login`, `user_password`,`is_admin`) VALUES ('$user_name','$user_login','$user_password','0')";

$res = mysqli_query($connect,$sql) or die("Error".mysqli_error($connect));


    session_start();
    $_SESSION['login'] = $user_login;
    $_SESSION['password'] = $user_password;

    header("Location: ../templates/hello.php?success=1");

