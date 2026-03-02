<?php

ini_set('display_errors', 0);

$M = 2;
$N = 5;

$result = [];

for ($M; $M <= $N; $M++) {
    //echo $M . PHP_EOL;
    
    $ifSimple = true;
    
    $mediana = floor($M / 2); // Не проверяем деление на числа которые больше половины числа.
    
    for ($number = 2; $number <= $mediana; $number++) {
    
        if ( $M % $number == 0 && $number != $M) {
            $ifSimple = false;
            break;
        }
    }
    
    if ($ifSimple) {
        $result[] = $M;
    }
}

if (!empty($result)) {
    foreach ($result as $res) {
        echo $res . PHP_EOL;
    }
} else {
    echo "Absent";
}
