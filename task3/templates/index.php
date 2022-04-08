<?php
include('../engine/reviews.php');
include('../engine/add_review.php');
include('../engine/goods.php')
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
    <header>
      <nav><a href="./admin.php">Админка</a><a href="./addgood.php">Добавление нового товара</a><a href="#"><s>Пустая ссылка</s></a></nav>
    </header>
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
  </body>
</html>
