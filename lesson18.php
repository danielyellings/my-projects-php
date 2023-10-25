<?php

/*Создать функцию, котора я возвращает массив с заданным количеством случайных чисел в заданном диапозоне */

function buildArray($n=10, $a=0, $b=10) {
    $arr = [];
    for ($i=0; $i<=$n; $i++) {
        $arr[] = rand($a, $b);
    }
    return $arr;
}

// $arr1 = buildArray(7, 3, 10);
// print_r($arr1);

/*Собрать массив из 10 массивов со случайным количеством случайных чисел в диапозоне от 0 до 100. И далее:
    1)Собрать суммы вложенных массивов в отдельном массиве
    2)Собрать максимумы всех массивов в отдельном массиве
    3)Собрать минимумы всех массивов в отдельном массиве */

function customSum($arr) 
{
    $sum = 0;
    for($i=0; $i<count($arr); $i++) {
        $sum = $arr[$i] + $sum;
    }
    return $sum;
}

function customMaxOrMin($arr, $max = true)
{
    $result = $arr[0];
    for ($i=1; $i<count($arr); $i++) {
        if($max){
            if($result < $arr[$i]) {
                $result = $arr[$i];
            }
        } else {
            if($result > $arr[$i]) {
                $result = $arr[$i];
            }
        }
    }
    return $result;
}

$arr = [];
for ($i=0; $i<10; $i++) {
    $arr[$i] = buildArray(rand(1, 5), 0, 100);
}

$arrMax = [];
for ($i=0; $i<count($arr); $i++) {
    $arrMax[$i] =  customMaxOrMin($arr[$i], true);
}

$arrMin = [];
for ($i=0; $i<count($arr); $i++) {
    $arrMin[$i] = customMaxOrMin($arr[$i], false);
}

print_r($arr);
print_r($arrMax);
print_r($arrMin);