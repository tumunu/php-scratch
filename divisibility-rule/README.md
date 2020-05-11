# Divisibility rule of 99

[Trying https://mathschallenge.net/full/divisible_by_99](https://mathschallenge.net/full/divisible_by_99)

```bash
$ php divisible.php 
......The correct of a set using the digits 1 to 9 that is divisible by 99 is:Array
(
    [0] => 6
    [1] => 7
    [2] => 2
    [3] => 8
    [4] => 1
    [5] => 9
    [6] => 3
    [7] => 4
    [8] => 5
)
The odd set is:Array
(
    [0] => 6
    [1] => 2
    [2] => 1
    [3] => 3
    [4] => 5
)
The even set is:Array
(
    [0] => 7
    [1] => 8
    [2] => 9
    [3] => 4
)
We know this because 28 - 17 = 11 which is divisible by 11
```

Divisible by 99 Problem
=======================

Find the smallest number that is made up of each of the digits 1 through 9 exactly once and is divisible by 99

>For example:  123456789 / 99 = the result should be a whole number.
 
The first thing to note is that 1 + 2 + … + 9 = 45 and as the sum of the digits is divisible by 9 then any arrangement of those digits will produce a number that is divisible by 9.  So problem becomes finding the smallest number that is divisible by 11.

>To test if a number is divisible by 11 we find a (the sum of digits in the odd positions) and b (the sum >of digits in the even positions).
 
If we are finding if a number is divisible by 99 why do we care about whether it is divisible by 9 or 11?  A number is divisible by 99 if, and only if, the number is divisible by both 9 and 11.

>For example:  Is 45144 divisible by 99?
>Answer:  Yes
>
>Solution:  The digit sum of 45144 is
>
>    4+5+1+4+4=18
>
>Since 18 is divisible by 9, 45144 is divisible by 9.
>
>The alternate digit difference (numbers in odd and even positions) of 45144 is
>
>    (4+1+4)-(4+5)=0
>
>Since 0 is divisible by 11, 45144 is divisible by 11.
>
>Therefore, 45144 is divisible by 99.

If a – b is divisible by 11 then so too is the number.

>For example:  Using the number 95953
>9 +9 + 3 = 21
>
>5 + 5 = 10
>
>21 – 10 = 11
>
>Therefore we know that 95953 is divisible by 11

The problem in PHP
------------------

It is possible to find odd and even numbers in PHP using a modulo operation.

>In computing, the modulo operation finds the remainder of division of one number by another.
 
Given two positive numbers, a (the dividend) and n (the divisor), a modulo n can be thought of as the remainder, on division of a by n.

>For example:  7 modulo 3 would evaluate to 1, while 9 modulo 3 would evaluate to 0
 
We can test if the position of a number is odd or even using a script similar to the following snippet:

>If ( $variable % 2) {
>    echo “$variable is odd”;
>
>} else {
>
>    echo “$variable is even”;
>
>}

The modulo operation symbol in PHP is %

>### To solve the problem with PHP
>
>1. Set up an array of the divisible set {1,2,3,4,5,6,7,8,9} 
>For example: 
>$divisibleSet = array(); 
>for($loopCount=1; $loopCount<10; $loopCount++) { 
>    $divisibleSet[]=$loopCount; 
>} 
>
>2. Using the foreach construct, if conditional statement and the modulos function separate the divisible >set into odd and even sets {1,3,5,7,9} and {2,4,6,8} 
>For example: 
>$oddSet = array(); 
>$evenSet=array(); 
>foreach($divisibleSet as $key=>$value) { 
>    if($key % 2) { 
>        $oddSet[] = $value; 
>    } else { 
>        $evenSet[] = $value; 
>    } 
>}
> 
>3. Sum arrays  
>For example: 
>array_sum($oddSet); 
>array_sum($evenSet); 
>
>4. Verify that each set is divisible by 11 
>For example: 
>$isOddSetSumDivisble = array_sum($oddSet); 
>if($isOddSetSumDivisible % 11 == 0) { 
>    // number is divisible by 11 
>} else { 
>    // number is not divisible by 11 
>} 
>
>5. If failed randomise the divisible set and repeat step 2. 
>For example: 
>shuffle($divisibleSet);
 
Because we have no idea how long it will take our programme to solve the divisible by 99 problem we need create a loop.  The loop will continue to do the calculations required until we are satisfied with the results. 

In the examples above we have used too types of constructs that are loops; foreach and for.  We could for example create a loop to run the calculations for 100 cycles.

>for($mainLoop=0;$mainLoop>100;$mainLoop+1){
>    // do calculations
>
>}

In the example below we use an infinite loop that will cycle until we decide to break the cycle.

>do {
>    // do calculations
>
>    break; 
>} while(0);

