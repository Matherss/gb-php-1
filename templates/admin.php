
<head>
    <style>
    table{
        width:100vw;
    }
    td{
        width:calc(100%/7);
    }

    </style>
</head>
<a href="../templates/">на главную</a>
<table>
    <tr>
        <td>ID</td>
        <td>TITLE</td>
        <td>PRICE</td>
        <td>INFO</td>
        <td>IMG</td>
        <td>SAVE</td>
        <td>DEL</td>
    </tr>
</table>
<?php
 include '../engine/config.php';
 $sql = "SELECT * FROM goods"; 
//  ../engine/editGood.php

$res = mysqli_query($connect,$sql);

while($data = mysqli_fetch_assoc($res)):?>
<form action="../engine/editGood.php" method="post" enctype="multipart/form-data" id="<?=$data['id']?>">
<table>
    <tr>
        <td><input type="hidden" name="id" value="<?= $data['id']?>"><?= $data['id']?></td>
        <td><input type="text" name="title" value="<?= $data['title']?>"></td>
        <td><input type="text" name="price" value="<?= $data['price']?>"></td>
        <td><input type="text" name="info" value="<?= $data['info']?>"></td>
        <td><input type="hidden" name="old_img" value="<?=$data['img']?>"><input name="img" value="<?= $data['img']?>" type="file" accept="image/jpeg"></td>
        <td><input type="submit" name="action" value="edit" id="<?=$data['id']?>"></input></td>
        <td><input type="submit" name="action" value="delete" id="<?=$data['id']?>"></input></td>
    </tr>
</table>
</form>
<?php endwhile;
mysqli_close($connect);
?>