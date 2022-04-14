<?php
include('config.php');

$login = $_POST['login'] ? strip_tags($_POST['login']) : '';
$password = $_POST['password'] ? strip_tags($_POST['password']) : '';
$rememberme = $_POST['rememberme'] ? strip_tags($_POST['rememberme']) : '';
// $salt = strrev(md5($login));  - Пока что отключил за ненадобностью, но не удалил, чтобы Вы видели, что я в курсе :)
// $pass = $salt.md5($password);
$pass = md5($password);
$sql = "select id_user from user where user_login='$login' and user_password='$pass'";

$res = mysqli_query($connect,$sql) or die("Error".mysqli_error($connect));

if(mysqli_num_rows($res)) {

    if($rememberme) {
        setcookie("login",$login, time() + 3600 * 24 * 7, "/templates");
        // setcookie("password",$password, time() + 3600 * 24 * 7, "/templates"); - отключено
    }
    session_start();
    $_SESSION['login'] = $login;
    $_SESSION['password'] = $password;

    header("Location: ../templates/hello.php?success=1");

} else {
    header("Location: /templates/hello.php?success=0");
}