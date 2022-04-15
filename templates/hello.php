<?php
session_start();
include('../engine/config.php');
$login = $_SESSION['login'];
$sql = "SELECT * FROM `user` where `user_login`='$login'";
$res = mysqli_fetch_assoc(mysqli_query($connect,$sql));
?>

<?php if($_GET['success'] && $_SESSION['login']):?>
Приветствую, <?=$res['user_name']?>! Вы успешно залогинились<br>
Ваш логин: <?=$res['user_login']?><br>
Ваше имя: <?=$res['user_name']?><br>
<a href="./index.php">На главную страницу</a>
<?php
else:?>
    Вы ввели неверные данные
    <?php endif;?>



