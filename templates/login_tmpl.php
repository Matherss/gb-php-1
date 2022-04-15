<?php session_start(); 

if($_SESSION['login']):?>
<h1>Вы уже вошли как <?=$_SESSION['login'];?></h1><br>
<a href="./index.php">На главную</a>
<?php
else:?>
<div style="display:flex;justify-content:space-around;">
<div>
<h1>Войти</h1>
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
</div>
<div>
<h1>Регистрация</h1>
<form action="../engine/register.php" method="post">
<p> <label for="login">Логин</label><br>
    <input type="text" name="login" /></p>
    <p> <label for="password">Пароль</label><br>
        <input type="password" name="password" /></p>
    <p> <label for="name">Имя</label><br>
        <input type="text" name="name" /></p>
    <p>
<p><input type="submit" value="Зарегистрироваться" /></p>
</form>
</div>
</div>

<?php endif; ?>