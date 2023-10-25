<?php

/*Написать функцию, возвращающую сумму (customSum) двух заданных чисел. 
Написать функцию, возвращающую разность (customDiff) двух заданных чисел.
С помощью функций суммы и разницы вычислить выражение (11 + 2) - (4 + 20).
 */

function customSum($a, $b) 
{
    return $a + $b;
} 
function customDiff($a, $b) 
{
    return $a - $b;
}

$a = customSum(11, 2);
$b = customSum(4, 20);
// echo customDiff($a, $b);

/*Написать функцию, возвращающую массив из 10 случайных чисел.
Написать функцию, вычисляющую сумму элементов массива.*/

function randArray() 
{
    $arr = [];
    for ($i=0; $i<5; $i++) {
        $arr[$i] = rand(0, 10);
    }
    return $arr;
}
// print_r(randArray());

function arraySum($arr) 
{
    $sum = 0;
    for ($i=0; $i<5; $i++) {
        $sum = $sum + $arr[$i];
    }
    return $sum;
}

$arr = randArray();
print_r($arr);
echo arraySum($arr);