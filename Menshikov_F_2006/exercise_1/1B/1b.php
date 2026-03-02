<?php

$N = 3;
$S = 10;

$numbers = [15, 25, 30];

//calculate index
$index = sizeof($numbers) - 1;
$expressions = [];

// function that create all possible expressions;
function createExpression ($index, $numbers, &$expressions = []) {
    if ($index == 0) {
        for ($i = 0; $i < sizeof($expressions); $i++) {
            $expressions[$i] = array_merge([$numbers[0]], $expressions[$i]);
        }
        return;
    }
    
    if (empty($expressions)) {
        $expressions[] = ["+", $numbers[$index]];
        $expressions[] = ["-", $numbers[$index]];
        
        createExpression($index - 1, $numbers, $expressions);
        
        return;
    }
    
    foreach ($expressions as $exp) {
        $tmpExpressions[] = array_merge(["+"], [$numbers[$index]], $exp);
        $tmpExpressions[] = array_merge(["-"], [$numbers[$index]], $exp);
    }
    
    $expressions = $tmpExpressions;
    
    createExpression($index - 1, $numbers, $expressions);    
}

// function that check all expressions
function checkExpressions (&$expressions, $sum) {
    foreach ($expressions as $i => $exp) {    
        $currentSum = $exp[0];
        for ($y = 1; $y < sizeof($exp);) {        
            if ($exp[$y] === "+") {
                $currentSum += $exp[$y+1];
                $y += 2;
            } elseif ($exp[$y] === "-") {
                $currentSum -= $exp[$y+1];
                $y += 2;
            }
        }
        
        if ($currentSum != $sum) {
            unset($expressions[$i]);
        }
    }
}

//create all possible expressions
createExpression($index, $numbers, $expressions);
//check expressions
checkExpressions($expressions, $S);

if ($expressions) {
    foreach ($expressions as $exp) {
        echo implode($exp) . "=" . $S . PHP_EOL;
    }
} else {
    echo "No solution" . PHP_EOL;
}

