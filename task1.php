<?php
$a = 0;

while ($a <= 100) {
    if($a === 0){
        $a++;
        continue;
    }
    if ($a%3 === 0) echo $a . '<br>';
    $a++;
};