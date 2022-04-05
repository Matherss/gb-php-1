<?php
// построение идёт по 3 элемента в ряд исходя из grid правила в styles.css 
// $path = '../public_html/img'
// функцию makeImageList вызываю в шаблоне ../templates/index.php





function makeImageList($path) {
    include 'config.php';
    $sql = "SELECT * FROM images ORDER BY views DESC"; // берем всё из бд с сортировкой по убиванию просмотров
    
   
$res = mysqli_query($connect,$sql);

while($data = mysqli_fetch_assoc($res)):?>

    <img src="<?=$path?>/small/<?=$data['title']?>" id="<?=$data['id']?>" data-image="<?=$data['title']?>" class="image" title="Размер: <?=$data['size']?>" onclick="incrementView(<?=$data['id']?>)"  style="cursor:pointer"/>
    <div class="overlay" onclick="closeModal()"><div class="modal__active"><img src="<?=$data['src']?>" data-image="<?=$data['title']?>" class="image_max"  /></div> </div>
<?php endwhile;
mysqli_close($connect);
};
    ?>