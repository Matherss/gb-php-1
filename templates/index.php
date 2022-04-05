<?php 
 include_once('../engine/scan.php');

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Gallery</title>
    <link rel="stylesheet" href="../public_html/css/styles.css">
    
  </head>
  
  <body>
    <main>
      <div class="wrapper">
      <div class="imgs_wrapper"><?php
      makeImageList('../public_html/img') ?></div>
      <div class="form_wrapper">
        <form action="../engine/server.php" method="POST" enctype="multipart/form-data">
          <input type="file" name="photo" accept="image/*">
          <input type="submit" value="Загрузить">
        </form>
      </div>
      <div class="deleter"><button onclick="deleteAllImages()">Удалить все фотографии</button></div>
    </div>
    </main>
    <script src="../public_html/js/main.js"></script>
  </body>
</html>
