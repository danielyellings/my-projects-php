<?php
/*Задача #1
Написать функцию divisors(...), которая принимает на вход число $n и выводит список всех его делителей через запятую. Решить задачу с помощью рекурсии. 
Например divisors(6): 1,2,3,6
 */
function divisors($n, $number = 1) 
{
    if ($number > $n) {
        return;
    }
    if ($n % $number == 0) {
        echo $number;
        if ($number != $n) {
            echo ', ';
        }
    }
    divisors($n, $number + 1);
}

echo 'divisors(10000): ';
divisors(10000);

/*Задача #2
Написать функцию isHappyNumber(...), которая принимает на вход шестизначное число, и возвращает true если число является счастливым (когда сумма первых трех цифр равна сумме последних), иначе возвращает false. Решить задачу с помощью рекурсии.
 */

 function isHappyNumber($number, $currentIndex = 1, $sum1 = 0, $sum2 = 0) 
 {
    if ($currentIndex == 7) {
        return $sum1 === $sum2;
    }
    $digit = $number % 10;
    return isHappyNumber(
        floor($number/10),
        $currentIndex + 1,
        $currentIndex <= 3 ? $sum1 + $digit : $sum1,
        $currentIndex > 3 ? $sum2 + $digit : $sum2
    );
}
$number = rand(100000, 999999);
$result = isHappyNumber($number);

if($result) {
    echo "$number - is HAPPY number";
} else {
    echo "$number - is NOT LUCKY number";
}

/*Задача #3
Написать функцию, принимающую на вход число $n и возвращающая сумму его цифр. Решить задачу с использованием рекурсии (без циклов).
*/

function recSum($n) 
{
    if($n == 0) {
        return $n;
    }
    if($n < 0) {
        $n = -$n;
    }
    $digit = 0;
    if ($n < 10) {
        return $n;
    }
    $digit = $n % 10;
    return $digit + recSum(floor($n/10));
}

echo recSum(123);

/*Задача #4
Написать функцию, которая принимает на вход целое положительное число $n и возвращает массив всех квадратных чисел от 1 до $n. Решить задачу с использованием рекурсии (без циклов).
К примеру если число $n=27, то результат должен быть массивом: [1, 4, 9, 16, 25]; */

function square($n) 
{
    if($n == 1) {
        return [1];
    }
    $numbers = square($n - 1);
    $squareN = $n * $n;
    $numbers[] = $squareN;
    return $numbers;
}

$n = 30;
$result = square($n);
print_r($result);



