<?php

// $x = 5;
// $y = 5;
// $sumTotal = 0;

// for ($i = 0; $i < $y; $i++) {
//     $sumTotal = $sumTotal + $x;
// }

// echo $total;


/*2 ZADACHA*/

// $rand = (rand(500, 5000) * 2);
// $num = 0;
// echo $rand;

// for ( ; $rand >= 50; $num++) {
//     $rand = $rand/2;
// }
// echo  ' ' . $num;

/*4 ZADACHA Найти все числа кратные 3 в диапазоне от 100 до 2000. */

// for ($i = 0; $i <= 2000; $i++) {
//     if ($i % 3 == 0) {
//         echo $i . PHP_EOL;
//     }
// }

/*5 ZADACHA Найтие все числа кратные и 3 и 5  в диапазоне от 1000 до 2000 */

// for ($i = 1000; $i <= 2000; $i++) {
//     if ($i % 3 == 0 && $i % 5 == 0) {
//         echo $i . PHP_EOL;
//     }
// }

/*6 ZADACHA Найти все числа в диапазоне от 5000 до 1000 кратные 7 или 9, но не кратные обоим этим числам. */

// for ($i = 5000; $i >= 1000; $i--) {
//     if (($i % 7 == 0 || $i % 9 == 0) && !($i % 7 == 0 && $i % 9 == 0)) {
//         echo $i . PHP_EOL;
//     }
// }

/*7 ZADACHA Выведите на экран все простые числа в диапазоне от 100 до 200. Посчитайте их количество и также выведите на экран.*/
// $count = 0;
// for ($i = 100; $i <= 200; $i++) {
//     $prime = true;
//     for ($j = 2; $j < $i; $j++) {
//         if ($i % $j == 0) {
//             $prime = false;
//             break;
//         }
//     }
//     if ($prime) {
//         echo $i . PHP_EOL;
//         $count++;
//     }
// }
// echo "Total primes found: " . $count;

/*8 ZADACHA Вывести таблицу умножения с использованием вложенных циклов в следующем виде:

    1х1=1;
    1x2=2;
    1x3=3;
    …
    9x8=72
    9x9=81
 */

// for ($i = 1; $i < 10; $i++) {
//     for ($j = 1; $j < 10; $j++) {
//         echo "$i x $j = " . $i * $j . PHP_EOL . "<br>";
//     }
// }

/* Task Есть HTML код который выводит таблицу состоящую из двух строк, каждая из которых состоит из двух ячеек, в которое записано число 0. Создайте таблицу (11х11) предоставленную на рисунке. */
$n = "\n";
echo $n . '<table border=1>' . $n;
for ($j=0; $j<11; $j++){
    echo '<tr>' . $n;
          for ($i=0; $i<11; $i++) {
            if($i == $j || $i+$j == 10) {
                echo "<td>-X-</td>" . $n;
            } else {
                echo "<td>---</td>" . $n;
            }
          }
    echo '</tr>' . $n;
}
echo  '</table>' . $n;