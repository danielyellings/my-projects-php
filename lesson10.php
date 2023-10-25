<?php

/* Определить, является ли заданное шестизначное число счастливым. 
Счастливым называют такое шестизначное число, что сумма его первых трех цифр равна сумме его последних трех цифр.*/

$a = rand(100000, 999999);
$sum1 = 0;
$sum2 = 0;
$count = 0;

$i = $a;
A:
if($i > 0) {
    $k = $i % 10;
    echo $k;
    $i = $i - $k;
    if ($count < 3) {
        $sum1 = $sum1 + $k;
    } else {
        $sum2 = $sum2 + $k;
    }
    $count++;
    $i = $i/10;
    goto A;
}
echo '<br>';

if ($sum1 == $sum2) {
    echo $a .  " - Lucky number!";
} else {
    echo $a .  " - Ordinary number.";
}

// for ($i = $a; $i > 0; $i = $i/10) {
//     $k = $i % 10;
//     echo $k;
//     $i = $i - $k;
// }