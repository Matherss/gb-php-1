<?php
include('../engine/reviews.php');
include('../engine/add_review.php');
include('../engine/goods.php');
session_start();

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../assets/style.css" />
    <script src="../assets/main.js" defer></script>
    <title>Title</title>
  </head>
  <body>
    <?php
echo $_SESSION['login'];
    
    if($_GET['success'] && $_SESSION['login']):?>
    <h1>Вы вошли под логином: <?=$_SESSION['login']?></h1>
    <?php
    endif;
    ?>
    <header>
      <nav><a href="./admin.php">Админка</a><a href="./addgood.php">Добавление нового товара</a><a href="./login_tmpl.php">Зайти</a><a href="./cart.php">Корзина</a></nav>
    </header>
    <div class="body__wrapper">
    <main>
      <section class="goods">
      <?php makeGoodsList()?>
      </section>
    </main>
    <section class="reviews">
      <div class="reviews__content">
        <h1>Отзывы</h1><?php makeReviewsList()?>
      </div>
      <div class="reviews__form">
      <h1>Оставить отзыв</h1>
        <form action="#" method="POST">
          <label for="user_name">Ваше имя</label>
          <input type="text" name="user_name" id="" required/>
          <label for="text">Ваш отзыв</label>
          <input type="text" name="text" id="" required/>
          <input type="submit" value="Отправить" name="add" />
        </form>
      </div>
    </section>
    </div>
  </body>
</html>
