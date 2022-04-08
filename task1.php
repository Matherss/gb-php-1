<?php 
include('math.php')
?>

<form action="#" method="post" enctype="multipart/form">
    <input type="number" name="operandA" id="" placeholder="первое число"/>
    <select name="operation"> 
  <option value="+" selected>+</option>
  <option value="-">-</option>
  <option value="/">/</option>
  <option value="*">*</option>
</select>
    <input type="number" name="operandB" id=""  placeholder="второе число"/>
<input type="submit" value="Посчитать">
</form>
Результат: <?=operationProcess($_POST['operandA'],$_POST['operandB'],$_POST['operation'])?>
