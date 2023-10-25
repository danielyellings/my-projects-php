<?php
/*Задача #1 Написать функцию, принимающую на вход массив и возвращающую сумму всех чисел этого массива.*/
function arraySum($arr) 
{
    $sum = 0;
    for ($i=0; $i<count($arr); $i++) {
        $sum = $sum + $arr[$i];
    }
    return $sum;
}

echo arraySum($arr);

/* Задача #2
Написать функцию, которая принимает на вход массив и возвращает максимальное число из этого массива. 
*/
function maxNumber($arr) 
{
    $max = $arr[0];
    for ($i=1; $i<count($arr); $i++) {
        if ($arr[$i] > $max) {
            $max = $arr[$i];
        }
    }
    return $max;
}

echo maxNumber($arr);

/*Задача #3
Написать функцию, принимающую в качестве аргумента массив и возвращающая с этого массива массив с только четными числами.
 */

function evenNumbers($arr) 
{
    $evenArray = [];
    for ($i=0; $i<count($arr); $i++) {
        if ($arr[$i] % 2 == 0) {
            $evenArray[] = $arr[$i]; 
        }
    }
    return $evenArray;
}
$arr = [1, 2, 3, 4, 5, 6];
print_r(evenNumbers($arr));

/*Задача #4
Написать функцию, принимающую в качестве аргумента целое число и возвращающая массив чисел, на которые это число делится без остатка. Вывести результат на экран со случайным числом.
*/

function getNumber($a) 
{
    $numbers = [];
    for ($i=1; $i<=$a; $i++) {
        if ($a%$i == 0) {
            $numbers[] = $i;
        }
    }
    return $numbers;
}

$a = 24;
$numbers = getnumber($a);
echo print_r($numbers);

/*Задача #5
Описать функцию addRightDigit($a, $b), добавляющую к целому положительному числу $a справа цифру $b ($b лежит в диапазоне 0–9).
Пример: 
   $a = 708; $b = 2;
   addRightDigit($a,$b) - должна вернуть 7082
*/

function addRightDigit($a, $b) 
{
    $myNumber = $a . $b;
    return $myNumber;
}

echo addRightDigit(888,9);

/*Задача #6
Описать функцию timeToHMS($time), определяющую по времени $time (в секундах) содержащееся в нем количество часов, минут и секунд.
Пример: $time = 3070
00:51:10
*/

function timeToHMS($time) 
{
    $hours = floor($time/3600);
    $time = $time - $hours*3600;
    $minutes = floor(($time/3600)/60);
    $time = $time - $minutes*60;
    $seconds = $time;

    $formattedTime = sprintf("%02d:%02d:%02d", $hours, $minutes, $seconds);
    return $formattedTime;
}

$time = 10000;
$result = timeToHMS($time);
echo $result;