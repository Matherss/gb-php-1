<?php $a = 5;
$b = 2;
// можно использовать rand, но логика будет такая же

echo "\$a = $a <br>";
echo "\$b = $b <br>";

if ($a>=0 && $b>=0) {
    echo $a-$b;
}elseif ($a<0 && $b <0) {
    echo $a*$b;
}else {
    echo $a+$b;
}