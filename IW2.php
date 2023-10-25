<?php
/*ZADACHA 1
Вывести на экран все нечетные числа диапазоне от случайного числа $a(1, 70) до 100 */
$a = rand(1, 70);
echo $a;
for ($i = $a; $i <= 100; $i++) {
    if ($i % 2 == 1) {
        echo $i;
    }
}

echo "<br>";

/*ZADACHA 2 
Вывести на экран сумму всех нечетных чисел в диапазоне от случайного числа $a (1, 80) до случайного числа $b (40, 150)*/
$a = rand(1, 80);
$b = rand(40, 150);
$total = 0;
echo $a;
echo $b;


for ($i = $a; $i <= $b; $i++) {
    if ($i % 2 == 1) {
        echo $i;
        $total = $total + $i;
    }
}

echo "<br>";
echo "<br>";
echo "<br>";

/*ZADACHA 3 
Дано случайное число от 1 до 999 999. Определить количество цифр в данном числе. Генерацию числа необходимо сделать таким образом, чтобы разрядность формировалась с равной долей вероятности. Т.е. к примеру 2-значные цифры (от 10 до 100) генерировались также часто как и 5-значные (10000 - 99999).
*/

$min_digits = 1;
$max_digits = 6;

$num_digits = rand($min_digits, $max_digits);

$min_num = pow(10, $num_digits - 1);
$max_num = pow(10, $num_digits) - 1;
$rand_num = rand($min_num, $max_num);

echo "случайное число: $rand_num<br>";
$num_lenght = strlen((string)$rand_num);
echo "количество цифр: $num_lenght";