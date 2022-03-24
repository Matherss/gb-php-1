<?php
function sum($a,$b) {
    return $a + $b;
}
function minus($a,$b) {
    return $a - $b;
}
function multi($a,$b) {
    return $a * $b;
}
function divide($a,$b) {
    return $a / $b;
}

echo "SUMMA = " . sum(2,2) . "<br>";
echo "MINUS = " . minus(4,2) . "<br>";
echo "MULTI = " . multi(2,3) . "<br>";
echo "DIVIDE = " . divide(10,2) . "<br>";