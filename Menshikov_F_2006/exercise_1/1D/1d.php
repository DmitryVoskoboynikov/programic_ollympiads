<?php

echo "Task 1D." . PHP_EOL;

$point1 = [0, 0];
$point2 = [100, 0];
$point3 = [0, 100];
$dot    = [100, 100];

// Function of createing equation by  coordinates two dotes.
function createEquationByTwoDotes($x1, $y1, $x2, $y2) {
// y - y2    x - x2
// ------- = -------
// y1 - y2   x1 - x2

// 1. y1 - y2 and x1 - x2. 
    $leftDenominator  = $y1 - $y2;
    $rightDenominator = $x1 - $x2;
    
// 2. X coefficient = $leftDenominator.   
    $xCoefficient = $leftDenominator;
    //echo $xCoefficient . PHP_EOL;
    
// 3. Y coefficient = $rightDenominator multiply on (-1).
    $yCoefficient = $rightDenominator * (-1);
    //echo $yCoefficient . PHP_EOL;
    
// 4. Right value = $rightDenominator * (-1 * $y2) - $leftDenominator * (-1 * $x2).
    $rightValue = $rightDenominator * (-1 * $y2) - $leftDenominator * (-1 * $x2);
    //echo $rightValue . PHP_EOL;
    
    return [$xCoefficient, 'x', $yCoefficient, 'y', '=', $rightValue];
}

$equation = createEquationByTwoDotes(0, 100, 100, 0);
//echo implode($equation) . PHP_EOL;

// Detect case.

$flag = false;

if ($flag) {
    echo "In";
} else {
    echo "Out" . PHP_EOL;
}

