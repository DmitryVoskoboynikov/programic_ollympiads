<?php

echo "Task 1F." . PHP_EOL;

$hand = [10, 11, 12, 13, 1];

/** Create array combinations that contains repeats and their count. */
$combinations = array();
for ($i = 0; $i < count($hand); $i++) {
   if (!empty($combinations[$hand[$i]])) {
       $combinations[$hand[$i]]++;
   } else {
       $combinations[$hand[$i]] = 1;
   }
}

//var_dump($combinations);

/** Find max count of repeats in combinations array. */
$max = 0;

foreach ($combinations as $number => $count) {
    if ($count > $max) {
        $max = $count;
    }
}

//var_dump($max);
//var_dump(count($combinations));

/** 1. Check if have "Impossible". */
if ($max === 5 && count($combinations) == 1) {
    echo "Impossible" . PHP_EOL;
    die();
}

/** 2. Check if have "Four of a kind". */
if ($max === 4 && count($combinations) == 2) {
    echo "Four of a kind" . PHP_EOL;
    die();
}

/** 3. Check if have "Full House". */
if ($max === 3 && count($combinations) == 2) {
    echo "Full House" . PHP_EOL;
    die();
}

/** 4. Check if have "Three of a kind". */
if ($max === 3 && count($combinations) == 3) {
    echo "Three of a kind" . PHP_EOL;
    die();
}

/** 5. Check if have "Two Pairs". */
if ($max === 2 && count($combinations) == 3) {
    echo "Two Pairs" . PHP_EOL;
    die();
}

/** 6. Check if have "One Pair". */
if ($max === 2 && count($combinations) == 4) {
    echo "One Pair" . PHP_EOL;
    die();
}

/** Last sort hand to find "Straight" */
sort($hand);
$straight = true;

for ($i = 0; $i < count($hand) - 1; $i++) {
    if ($hand[$i+1] - $hand[$i] > 1) {
        $straight = false;
    }
}

if ($straight) {
    echo "Straight" . PHP_EOL;
    die();
}

echo "Nothing" . PHP_EOL;

