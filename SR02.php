<?php

// $a = rand(100, 999);
// $b = rand(100, 999);

// echo "A: $a\n";
// echo "B: $b\n";

// $a_digits = str_split($a);
// $b_digits = str_split($b);

// $a_digits = array_pad($a_digits, 3, 0);
// $b_digits = array_pad($b_digits, 3, 0);

// $result = [];

// foreach ($b_digits as $b_digit) {
//     $partial = $a * $b_digit;
//     $result[] = $partial % 10;
//     $carry = (int)($partial / 10);
//     if ($carry > 0) {
//         $a_digits[0] = $a_digits + $carry;
//     }
// }

// echo implode('', array_reverse($result));

/*ZADACHA 2 Дан массив $arr из 10 случайных чисел от 1 до 10. Найдите произведение элементов массива*/
// $arr = [];
// $product = 1;
//  for ($i = 0; $i <= 10; $i++) {
//      $arr[] = rand(1, 10);
// }

// for ($i = 0; $i < count($arr); $i++) {
//     $product *= $arr[$i];
// }
// print_r($arr);
// echo $product;

/*ZADACHA 3 Дан массив $arr из 10 случайных чисел от -100 до 100. Соберите в массив $arr1 все отрицательные значения.*/

// $arr = [];
// $arr1 = [];

// for($i = 0; $i < 10; $i++) {
//     $arr[] = rand(-100, 100);
//     if($arr[$i] < 0) {
//         $arr1[] = $arr[$i]; 
//       }
// }

// print_r($arr);
// print_r($arr1);

/* Задача #4
Дан массив $arr из 10 случайных чисел от 1 до 100. Соберите в массив $evens четные числа, а в массив $odds нечетные.*/

// $arr = [];
// $evens = [];
// $odds = [];

// for ($i = 0; $i <= 10; $i++) {
//     $arr[] = rand(1, 100);
//     if($arr[$i] % 2 == 0) {
//         $evens[] = $arr[$i];
//     } else {
//         $odds[] = $arr[$i];
//     }
// }

// print_r($arr);
// print_r($evens);
// print_r($odds);

/*Задача #5 Даны массив $arr1 из 100 случайных чисел от 1 до 100 и два случайных числа $a и $b в диапазоне 10 до 100. Собрать в массив $arr2 числа из массива $arr1, индексы которых лежат в диапазоне от меньшего ($a или $b) числа до большего  ($a или $b).*/

// $arr1 = [];
// $arr2 = [];
// $a = rand(10, 100);
// $b = rand(10, 100);
// echo "A: " . $a . PHP_EOL;
// echo "B: " . $b; 

// for ($i = 0; $i < 100; $i++) {
//     $arr1[] = rand(1, 100);
//     if($i >= min($a, $b) && $i <= max($a, $b)) {
//         $arr2[] = $arr1[$i];
//     }
// }

// print_r($arr1);
// print_r($arr2);

/*Задача #6
Дан массив $arr из 10 случайных чисел от -100 до 100. Замените все положительные числа на 1, а все отрицательные на 0;*/

// $arr = [];

// for ($i = 0; $i < 10; $i++) {
//     $arr[] = rand(-100, 100);
//     if ($arr[$i] > 0) {
//         $arr[$i] = 1;
//     } else {
//         $arr[$i] = 0;
//     }
// }

// print_r($arr);

/*Задача #7
Дан массив $arr из 10 случайных чисел от 0 до 100. Поменяйте местами максимальный и минимальный элементы.*/

// $arr = [];

// for ($i = 0; $i < 10; $i++) {
//     $arr[] = rand(0, 100);
// }

// $minIndex = array_search(min($arr), $arr);
// $maxIndex = array_search(max($arr), $arr);

// $vremya = $arr[$minIndex];
// $arr[$minIndex] = $arr[$maxIndex];
// $arr[$maxIndex] = $vremya;

// print_r($arr);

/*Задача #8
Дан массив $arr из 20 случайных чисел (0 или 1). Найдите длину самой длинной цепочки повторяющихся чисел в данном массиве. 
К примеру в массиве [0, 0, 1, 1, 0, 0, 0, 0, 1, 1, 0], длина самой длинной цепочки будет 4 .*/

$arr = [];
$currentChain = 1;
$maxChain = 1;

for ($i = 0; $i < 20; $i++) {
    $arr[] = rand(0, 1);
    if($arr[$i] == $arr[$i - 1]) {
        $currentChain++;
    } else {
        $currentChain = 1;
    }
    if($currentChain > $maxChain) {
        $maxChain = $currentChain;
    }
}
echo $maxChain;
print_r($arr);
