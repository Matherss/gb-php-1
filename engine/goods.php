<?php function makeGoodsList() {
    include 'config.php';
    $sql = "SELECT * FROM goods"; // берем всё из бд с сортировкой по убиванию просмотров
    
   
$res = mysqli_query($connect,$sql);

while($data = mysqli_fetch_assoc($res)):?>

<div class="good" id="good_<?=$data['id']?>">
          <div class="good__title"><?=$data['title']?></div>
          <div class="good__content"><div style="min-height:100px"><img src="../img/small/<?=$data['img']?>" alt=""></div><br><?=$data['info']?> <h1><?=$data['price']?>$</h1><br><a href="../engine/good.php?id=<?=$data['id']?>">Подробнее</a></div>
          
        </div>
<?php endwhile;
mysqli_close($connect);
};
    ?>