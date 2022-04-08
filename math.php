<?php
function operationProcess($a,$b,$operation) {
    if(!$b) {
        $b=0;
    }
    if(!$a) {
        $a=0;
    }
    switch ($operation) {
        case '+':
            return $a + $b;

        case '-':
            return $a - $b;
        
        case '/':
            if($b == 0) return 'Делить на ноль нельзя';
            return $a / $b;

        case '*':
            return $a * $b;
        
        default:
            return 'Ошибка оператора';
    }
}