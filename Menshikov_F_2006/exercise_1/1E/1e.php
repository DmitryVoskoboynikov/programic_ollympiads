<?php

echo "Task 1E." . PHP_EOL;

$a = 2;
$n = 3;

//echo pow($a, $n) . PHP_EOL;

function myPow($a, $n) {
    //$res = 'undefined';
    
    if ($n === 1) {
        return $a;   
    } else {
        return $res = myPow($a, --$n) * $a;
    }
    //echo $res . PHP_EOL;
}

echo myPow($a, $n) . PHP_EOL;



