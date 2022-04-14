<?php session_start(); 

if($_SESSION['login']):?>
<h1>Вы уже вошли как <?=$_SESSION['login'];?></h1><br>
<a href="./index.php">На главную</a>
<?php
else:?>
<form action="../engine/login.php" method="post">
<p> <label for="login">Логин</label><br>
    <input type="text" name="login" value="<?=$_SESSION['login']?>" /></p>
<p> <label for="password">Пароль</label><br>
    <input type="password" name="password" value="<?=$_SESSION['password']?>"  /></p>
<p>
    <label for="rememberme">Запомнить</label><br>
    <input type="checkbox" name="rememberme" /></p>
<p><input type="submit" value="Войти" /></p>
</form>

<?php endif; ?>