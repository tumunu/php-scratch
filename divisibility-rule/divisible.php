<?php
// Divisible by 99

// set up variables
$divisibleSet = array();
$oddSet = array();
$evenSet = array();
$subtractedArraySums = 0;
$solutionFound = 0;

// initialise divisible set

for($loopCount=1; $loopCount<10; $loopCount++) {

    // add $loopCount value to $divisibleSet array
    $divisibleSet[] = $loopCount;
}

// loop through the calculations until a solution is found
do {

    // separate the divisible set in odd and even sets based on the digits position
    // within the divisible set
    foreach($divisibleSet as $key => $value) {
        if($key % 2) {

            // the position of $value is even
            $evenSet[] = $value;

        } else {

            // the position of $value is odd
            $oddSet[] = $value;
        }
    } 
    
    // sum odd and even set arrays
    $isOddSetSumDivisible = array_sum($oddSet);
    $isEvenSetSumDivisible = array_sum($evenSet);
    
    // check if the sum of the odd set minus the sum of the even set is divisible by 11
    if(($isEvenSetSumDivisible - $isOddSetSumDivisible) % 11 == 0) {

        // the substraction sum is divisble by 11
        $subtractedArraySums = 1;

    } else {

        // the substraction sum is NOT divisible by 11
        $subtractedArraySums = 0;
    }

    // if the subtraction sum is divisible by 11 then the problem has been solved
    if($subtractedArraySums == 1) {

        // problem is solved
        $solutionFound = 1;
        
        echo "";
        echo "The correct of a set using the digits 1 to 9 that is divisible by 99 is:";
        print_r($divisibleSet);
        echo "";
        echo "The odd set is:";
        print_r($oddSet);
        echo "";
        echo "The even set is:";
        print_r($evenSet);
        echo "";
        echo "We know this because ".$isEvenSetSumDivisible." - ".$isOddSetSumDivisible. " = ";
        echo ($isEvenSetSumDivisible - $isOddSetSumDivisible)." which is divisible by 11";
        echo "";      
    } else {

        // shuffle the divisible set and cycle through the calculations again
        shuffle($divisibleSet);
        
        // empty the odd & even arrays
        unset($oddSet);
        unset($evenSet);
        
        echo ".";
    }

} while ($solutionFound == 0);
