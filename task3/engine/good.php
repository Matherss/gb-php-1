
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


<a href="<?=$_SERVER["HTTP_REFERER"];?>">Вернуться</a>
<?php 
mysqli_close($connect);
    ?>
    </body>
    </html>