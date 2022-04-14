<?php
session_start();
include('../engine/config.php');

$login = $_SESSION['login'];

$sql_user = "SELECT `id_user` FROM `user` WHERE `user_login`='$login'";
$res_user = mysqli_fetch_assoc(mysqli_query($connect,$sql_user))['id_user'];

$sql_cart = "SELECT * FROM cart WHERE `user_id`='$res_user'";




?>
<a href="./index.php">На главную</a>
<br>

Ваша корзина:
<table border="1">
    <?php 
    $res = mysqli_query($connect,$sql_cart);

    while($data = mysqli_fetch_assoc($res)):?>
    <tr>
        <td>id:<?=$data['id']?></td>
        <td>good_id:<?=$data['good_id']?></td>
        <td>good_title:<?php
        $good_id = $data['good_id'];
        $sql_good_title_price = "SELECT `title`, `price` FROM `goods` WHERE `id`='$good_id'";
        $res_title_price = mysqli_query($connect,$sql_good_title_price);
        $data_title_price = mysqli_fetch_assoc($res_title_price);
        echo $data_title_price['title'];
        ?></td>
        <td>price: <?=$data_title_price['price']?>$</td>
        <td>count:<?=$data['count']?></td>
        <td data-price="<?=$data['count']*$data_title_price['price']?>">fullPrice: <?=$data['count']*$data_title_price['price']?>$</td>
        <td>user_id:<?=$data['user_id']?></td>
        <td><a href="../engine/deleteFromCart.php?id=<?=$data['id']?>">Удалить из корзины</a></td>
    </tr>

<?php endwhile;
mysqli_close($connect);
?>

</table>

<h1>FULLPRICE: <span id="full">0</span>$</h1>

<script>
    let fullPrice = document.querySelectorAll('td[data-price]');
    let res =[];
    for(i=0;i<fullPrice.length;i++)
 {    
     res.push(+fullPrice[i].dataset.price);
 }
 let full=0;
 for (j=0;j<res.length;j++) {
full += res[j];
 }
 document.querySelector('#full').innerText = full.toLocaleString();
</script>