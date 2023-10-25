<?php

/*Написать функцию, принимающую на вход число и возвращающая в качестве результата все простые числа от 1 до $n; Решить задачу с использованием рекурсии.*/

$n = 10;
print_r(getSimples($n));
// for ($i = 2; $i <= $n; $i++) {
//     if (isSimple($i) == true) {
//         $arr[] = $i;
//     }
// }

function getSimples($n)
{
    $arr = [];
    if (isSimple($n)) {
        $arr[] = $n;
    }
    if($n > 1) {
        $arr2 = getSimples($n - 1);
        var_dump($n);
        print_r($arr2);
        for($i = 0; $i < count($arr2); $i++) {
            $arr[] = $arr2[$i];
        }
    }
    print_r($arr);
    echo '------------------' . "\n";
    return $arr;
}

function isSimple($a)
{
    $count = 0;
    for($j = $a; $j > 0; $j--) {
        if($a % $j == 0) {
            $count++;
        }
    }
    if($count == 2) {
        return true;
    } else {
        return false;
    }
}