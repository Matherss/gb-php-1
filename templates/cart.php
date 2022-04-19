<?php
session_start();
include('../engine/config.php');

$login = $_SESSION['login'];

$sql_user = "SELECT `id_user` FROM `user` WHERE `user_login`='$login'";
$res_user = mysqli_fetch_assoc(mysqli_query($connect,$sql_user))['id_user'];

$sql_cart = "SELECT * FROM cart WHERE `user_id`='$res_user'";



?>
<head>
    <script>
        const editCart = (link) => {
            fetch(link, { method: 'POST'});
            alert('Товар удален из корзины');
            document.location.reload(); //сделал для удобства, потому что не отображается сразу удаление
        }
        const saveNewCount = (link,idGood) => {
            let count = document.querySelector(`#count_${idGood}`);
            let data = {
        id: idGood,
        count: +count.value
    };
            console.log((count));
            fetch(link+`?id=${idGood}&count=${count.value}`, { method: 'POST'});
            alert('Новое количество сохранено');
            document.location.reload(); //Необходимо для изменения линка для оформления заказа
        }

    </script>
</head>
<a href="./index.php">На главную</a>
<br>

Ваша корзина:
<table border="1">
    <?php 
    $res = mysqli_query($connect,$sql_cart);
    $cart_id= $data['id'];

$sql_cart_upd = "UPDATE `cart` SET `count`=count+$count WHERE id='$cart_id'";
$sum;

    while($data = mysqli_fetch_assoc($res)):?>
    <tr>
        <td>id:<?=$data['id']?></td>
        <td>good_id:<?=$data['good_id']?></td>
        <td>good_title:<?php
        $good_id = $data['good_id'];
        $sql_good_title_price = "SELECT `title`, `price` FROM `goods` WHERE `id`='$good_id'";
        $res_title_price = mysqli_query($connect,$sql_good_title_price);
        $data_title_price = mysqli_fetch_assoc($res_title_price);
        $sum += $data_title_price['price']*$data['count'];
        echo $data_title_price['title'];
        ?></td>
        <td>price: <?=$data_title_price['price']?>$</td>
        <td>count:<input id="count_<?=$data['id']?>" style="width:50px"type="number" name="count" min="1" value="<?=$data['count']?>"></td>
        <td data-price="<?=$data['count']*$data_title_price['price']?>">fullPrice: <?=$data['count']*$data_title_price['price']?>$</td>
        <td>user_id:<?=$data['user_id']?></td>
        <td><button onclick="saveNewCount('../engine/saveNewCount.php',<?=$data['id']?>)">Сохранить новое количество</button></td>
        <td><button onclick="editCart('../engine/deleteFromCart.php?id=<?=$data['id']?>')">Удалить из корзины</button></td>
    </tr>

<?php endwhile;
mysqli_close($connect);
?>

</table>

<h1>FULLPRICE: <span id="full">0</span>$</h1>
<button id="saver" onclick="saveOrder(`../engine/saveOrder.php?id=<?=$res_user?>&sum=<?=$sum?>`)">Оформить заказ</button>

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
 
 const saveOrder = (link) => {
            fetch(link, { method: 'POST'});
            alert('Заказ добавлен в обработку');
        }
</script>