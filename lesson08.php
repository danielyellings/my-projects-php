<?php

/*Собрать массив из 10 случайных чисел от 0 до 100. Выведите на экран элемент с максимальным значением и его индекс. */

// $arr = [];
// for ($i = 0; $i < 10; $i++) {
//     $arr[$i] = rand(0, 100);
// }

// $index = 0;
// $max = $arr[$index];
// for ($i = 1; $i < 10; $i++) {
//     if ($max < $arr[$i]) {
//         $max = $arr[$i];
//         $index = $i;
//     }
// }

// print_r($arr);
// echo "Max: " . $max . " Index: " . $index . "\n";

/*Собрать массив из 10 случайных чисел от 0 до 100. Уменьшите каждое значение в массиве в 3 раза. */

// $arr = [];
// for ($i = 0; $i < 10; $i++) {
//     $arr[$i] = rand(0, 100);
// }

// print_r($arr);

// for ($i = 0; $i < 10; $i++) {
//     $arr[$i] = $arr[$i]/3;
// }

// print_r($arr);

/*Собрать два массива $arr1и $arr2 из 10 случайных чисел от 0 до 100. Сравнивая каждое значение из массива $arr1 c соответствующим значением из массива $arr2, записать в третий массив $arr3 большие значения, а в $arr4 меньшие. */

$arr1 = [];
$arr2 = [];
$arr3 = [];
$arr4 = [];

for ($i = 0; $i < 10; $i++) {
    $arr1[$i] = rand(0, 100); 
    $arr2[$i] = rand(0, 100); 
}

print_r($arr1);
print_r($arr2);

for ($i = 0; $i < 10; $i++) {
    if ($arr1[$i] > $arr2[$i]) {
        $arr3[$i] = $arr1[$i];
        $arr4[$i] = $arr2[$i];
    } else {
        $arr3[$i] = $arr2[$i];
        $arr4[$i] = $arr1[$i];
    }
    }

print_r($arr3);
print_r($arr4);

