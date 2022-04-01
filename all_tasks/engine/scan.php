<?php
// построение идёт по 3 элемента в ряд исходя из grid правила в styles.css 
// $path = '../public_html/img'
// функцию makeImageList вызываю в шаблоне ../templates/index.php
// решение для первых 2 заданий:
/**
 * <a  href="../engine/detail.php?name=<?=$images[$i]?>"><img src="<?=$path?>/<?=$images[$i]?>"  width="200"  height="320"/></a>
 */
function makeImageList($path) {
$images = scandir("$path/small");
for($i=2;$i<count($images);$i++){?>
    <img src="<?=$path?>/small/<?=$images[$i]?>" data-image="<?=$images[$i]?>" class="image"  style="cursor:pointer"/>
    <div class="overlay" onclick="closeModal()"><div class="modal__active"><img src="<?=$path?>/big/<?=$images[$i]?>" data-image="<?=$images[$i]?>" class="image_max"  /></div> </div>
    <?php
    }}
    ?>
    