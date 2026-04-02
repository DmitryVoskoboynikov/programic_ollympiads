<?php

echo "Task 1D." . PHP_EOL;

$point1 = [0, 0];
$point2 = [100, 0];
$point3 = [0, 100];
$dot    = [100, 100];

// Function of createing equation by coordinates of two dotes.
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

// Detect cases.
// 1. 90 degrees angle at the left and two of three dotes on same line at the bottom.

$x1 = 0;
$y1 = 100;
$x2 = 100;
$y2 = 0;
$equation = createEquationByTwoDotes($x1, $y1, $x2, $y2);
echo implode($equation) . PHP_EOL;

// Create lines.
$lines = [];
for ($y1; $y1 >= $y2; $y1--) {
    $x = ($equation[5] - ($equation[2] * $y1)) / $equation[0];
    $lines[$y1] = [$x1, $x];
}

// 2. 90 degrees angle at the right and two of three dotes on same line at the bottom.

// Create lines.

// 3. ...


// Test output of lines.
/**
foreach ($lines as $y => $range) {
    echo $y . " - [" . implode(", ", $range) . "]" . PHP_EOL;
}
*/

// Check if dot in triangle.
if (isset($lines[$dot[1]]) && ($dot[0] >= $lines[$dot[1]][0] && $dot[0] <= $lines[$dot[1]][1])) {
    echo "In" . PHP_EOL;
} else {
    echo "Out" . PHP_EOL;
}

