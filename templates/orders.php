<?php
session_start();
$login = $_SESSION['login'];
include('../engine/config.php');

$sql_is_adm = "SELECT * FROM `user` where `user_login`='$login'";
$res_is_adm = mysqli_fetch_assoc(mysqli_query($connect,$sql_is_adm));
$userId = $res_is_adm["id_user"];
if($res_is_adm['is_admin'] == 1) {
$sql = "SELECT * FROM `orders`";
}
else {
    $sql = "SELECT * FROM `orders` where user_id='$userId'";
}
$res = mysqli_query($connect,$sql);

// if($res_is_adm['is_admin'] == 1)
?>
<head>
    <style>
        td {
            border:1px solid grey;
            padding: 15px;
        }
    </style>
</head>
<table>
<?php
while($data = mysqli_fetch_assoc($res)):?>
<tr>
<td>ID: <?=$data['id']?></td>
<td>USER: <?=$data['user_id']?></td>
<td>
    <?php
    $user_id = $data['user_id'];
    $sqlGoods = "SELECT * FROM `cart` WHERE `user_id`='$user_id'";
    $resGoods = mysqli_query($connect,$sqlGoods);
    while($dataGoods = mysqli_fetch_assoc($resGoods)):?>

    <li>Товар <?php 
    echo "№".$dataGoods['good_id'];
    $good_id = $dataGoods['good_id'];
    $sql_good_title_price = "SELECT `title`, `price` FROM `goods` WHERE `id`='$good_id'";
    $res_title_price = mysqli_query($connect,$sql_good_title_price);
    $data_title_price = mysqli_fetch_assoc($res_title_price);
    echo "-".$data_title_price['price']."руб";
    
    ?>(<?=$dataGoods['count']?> шт.)</li>
    <?php 
    endwhile;
    ?>

</td>
<td>SUMM: <?=$data['sum']?></td>
<?php
if($res_is_adm['is_admin'] == 1):?>
<td>STATUS: <select name="status" data-id="<?=$data['id']?>">


    <option value="Active">Active</option>
    <option value="Rejected">Rejected</option>
    <option value="Done">Done</option>
    </select>
</td>
<?php else:?>
    <td>STATUS: <?=$data['status']?></td>
<?php endif;?>
</td>
</tr>
<script>
    let st = document.querySelectorAll("#status > option");
    console.log(st);
    let item;
    switch ('<?=$data['status']?>') {
        case 'Active':
            st[0].setAttribute("selected","");   
            break;
        case 'Rejected':
            st[1].setAttribute("selected","");   
            break;
        case 'Done':
            st[2].setAttribute("selected","");   
            break;
    
        default:
            break;
    }
</script>
<script>
    let id = <?=$data['id']?>;
        document.querySelector("select[data-id='<?=$data['id']?>']").addEventListener('change', (e) => {
            let status = e.target.value;
                fetch(`../engine/orderstatus.php?id=${id}&status=${status}`, {method: "POST"});
                alert('Статус изменен');
        });

</script>

<?php endwhile;?>
</table>
