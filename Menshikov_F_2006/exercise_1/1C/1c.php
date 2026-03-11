<?php

echo "Task 1C." . PHP_EOL;

//$N = 6;
$numbers = [2, 5, 3, 4, 6, 1];

foreach ($numbers as $n) {
    echo $n . " ";
}

echo PHP_EOL;

// Increasing sequences.
$sequences = [];

function createSequences($currentIndex, $numbers, $seq, &$sequences) {
   $currentValue = $numbers[$currentIndex];
   
   $flag = true;
   
   for ($index = $currentIndex + 1; $index < sizeof($numbers); $index++) {
       if ($currentValue < $numbers[$index]) {
           createSequences($index, $numbers, array_merge($seq, [$numbers[$index]]), $sequences);
           $flag = false;
       }
   }
   
   if ($flag) {
       $sequences[] = $seq;
   }
}

createSequences(0, $numbers, [$numbers[0]], $sequences);

$maxSize = 0;
foreach ($sequences as $seq) {
    if (sizeof($seq) > $maxSize) {
        $maxSize = sizeof($seq);
    }
    
    echo implode(' ', $seq) . PHP_EOL;
}

echo "longest(s) --->" . PHP_EOL;

foreach ($sequences as $seq) {
    if (sizeof($seq) == $maxSize) {
        echo implode(' ', $seq) . PHP_EOL;
    }
}


