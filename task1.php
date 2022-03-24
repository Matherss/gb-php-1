<?php $a = 5;
$b = 2;

echo "\$a = $a <br>";
echo "\$b = $b <br>";

if ($a>=0 && $b>=0) {
    echo $a-$b;
}elseif ($a<0 && $b <0) {
    echo $a*$b;
}else {
    echo $a+$b;
}