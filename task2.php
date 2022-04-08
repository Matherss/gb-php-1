<?php
include('math.php');
?>

<form action="#" method="post" enctype="multipart/form">
    <input type="number" name="operandA" id="" placeholder="первое число"/>
   
    <input type="number" name="operandB" id=""  placeholder="второе число"/>
<input type="submit" name="operation" value="+">Сложение</input>
<input type="submit"  name="operation" value="-">Вычитание</input>
<input type="submit"  name="operation" value="/">Деление</input>
<input type="submit"  name="operation" value="*">Умножение</input>
</form>
Результат: <?=operationProcess($_POST['operandA'],$_POST['operandB'],$_POST['operation'])?>