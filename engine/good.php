<?php
session_start();?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../assets/style.css" />
    <script src="../assets/main.js" defer></script>
    <title>Title</title>
    <style>
        fieldset {
            max-width:50vw;
            margin: 0 auto;
            padding: 5px;
        }
        
    </style>
  </head>


  <body>
<?php 
    include 'config.php';
    $id = $_GET['id'];
    $sql = "SELECT * FROM goods WHERE id=$id"; 
    
   
$res = mysqli_query($connect,$sql);

$data = mysqli_fetch_assoc($res)
?>

<img style="max-width:50vw" src="../img/big/<?=$data['img']?>"><br>


<fieldset><legend align="left">Название товара:</legend><?=$data['title']?></fieldset><br>
<fieldset><legend align="left">Цена:</legend><?=$data['price']?>$</fieldset><br>
<fieldset><legend align="left">Описание:</legend><?=$data['info']?></fieldset><br>
<label for="count">Количество</label>
<input type="number" id="count" name="count" value="1" min="1"/><br>



<a href="addToCart.php?id=<?=$data['id']?>&count=1" id="addLink">Добавить в корзину</a>

<br>
<a href="<?=$_SERVER["HTTP_REFERER"];?>">Вернуться</a>
<?php 
mysqli_close($connect);
    ?>  
<script>
 document.querySelector('#count').addEventListener('input', (e) => {
    const el = document.querySelector("#addLink");
    const url = new URL(el.href);
    url.searchParams.set('count', e.target.value);
    el.href = url.href;
});
  </script>
    </body>
    </html>