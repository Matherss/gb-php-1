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

function mathOperation($a,$b,$operation) {
    switch ($operation) {
        case '+':
            echo sum($a,$b);
            break;
        
        case '-':
            echo minus($a,$b);
            break;
        
        case '*':
            echo multi($a,$b);
            break;
        
        case '/':
            echo divide($a,$b);
            break;

    }
}

mathOperation(3,5,"*");