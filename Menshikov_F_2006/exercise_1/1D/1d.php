<?php

echo "Task 1D." . PHP_EOL;

$point1 = [0, 0];
$point2 = [100, 0];
$point3 = [0, 100];
$dot    = [10, 10];

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

// Function that return maxX of two dotes.
function getPointWithMaxXFromTwoPoints($point1, $point2) {
    if ($point1[0] >= $point2[0]) 
        return $point1;
    else
        return $point2;
}

// Function that rightly detect case
function detectCase($point1, $point2, $point3) {    
    $maxY = max($point1[1], $point2[1], $point3[1]);
    $minY = min($point1[1], $point2[1], $point3[1]);

    //calculate number of points with the same maxY
    $arrayOfPointsWithTheSameMaxY = [];
    if ($point1[1] === $maxY) $arrayOfPointsWithTheSameMaxY[] = $point1;
    if ($point2[1] === $maxY) $arrayOfPointsWithTheSameMaxY[] = $point2;
    if ($point3[1] === $maxY) $arrayOfPointsWithTheSameMaxY[] = $point3;
    //var_dump($arrayOfPointsWithTheSameMaxY);
    
    //calculate number of points with the same minY
    $arrayOfPointsWithTheSameMinY = [];
    if ($point1[1] === $minY) $arrayOfPointsWithTheSameMinY[] = $point1;
    if ($point2[1] === $minY) $arrayOfPointsWithTheSameMinY[] = $point2;
    if ($point3[1] === $minY) $arrayOfPointsWithTheSameMinY[] = $point3;
    //var_dump($arrayOfPointsWithTheSameMinY);
    
    // First 5 cases if two of three dotes on the same line at the bottom.
    if (sizeof($arrayOfPointsWithTheSameMinY) == 2) 
    {
        // 1. 90 degrees angle at the left.
        $pointWithMaxXFromTwoPoints = getPointWithMaxXFromTwoPoints(
            $arrayOfPointsWithTheSameMinY[0], 
            $arrayOfPointsWithTheSameMinY[1]
        );
    
        if ($pointWithMaxXFromTwoPoints[0] > $arrayOfPointsWithTheSameMaxY[0][0]) {
            //$x1 = 0;
            //$y1 = 100;
            //$x2 = 100;
            //$y2 = 0;
            $x1 = $arrayOfPointsWithTheSameMaxY[0][0];
            $y1 = $arrayOfPointsWithTheSameMaxY[0][1];
            $x2 = $pointWithMaxXFromTwoPoints[0];
            $y2 = $pointWithMaxXFromTwoPoints[1];
            
            $equation = createEquationByTwoDotes($x1, $y1, $x2, $y2);
        
            return [1, "equations" => [$equation]];
        }    
        
        // 2. 90 degrees angle at the right.
        
    }
    
    // Second 5 cases if two of three dotes on the same line at the top.
    if (sizeof($arrayOfPointsWithTheSameMaxY) == 2) 
    {
    
    }
}

$case = detectCase($point1, $point2, $point3);
var_dump($case);

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

