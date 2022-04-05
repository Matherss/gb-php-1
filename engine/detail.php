<?php
if($_GET['name']){?><a href="<?= $_SERVER['HTTP_REFERER']?>">Вернуться</a><br>
<img src="../public_html/img/<?=$_GET['name']?>" alt="" width="500"/>

<?php
}
?>