<?php function makeReviewsList() {
    include 'config.php';
    $sql = "SELECT * FROM reviews"; // берем всё из бд с сортировкой по убиванию просмотров
    
   
$res = mysqli_query($connect,$sql);

while($data = mysqli_fetch_assoc($res)):?>

   <div style="background:var(--secondary-color);">
       <div style="color:red;font-weight:bold"><?=$data['user_name']?>:</div>
       <div style="color:black;"> <?=$data['text']?> <br><span style="font-size:12px">(<?=$data['date']?>)</span></div>
       <hr/>
   </div>
<?php endwhile;
mysqli_close($connect);
};
    ?>