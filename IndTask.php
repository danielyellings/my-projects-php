<?php

/*Самостоятельное решение задачи на циклы
Дано случайное число от 1 до 999 999. Определить количество цифр в данном числе. Генерацию числа необходимо сделать таким образом, чтобы разрядность формировалась с равной долей вероятности. Т.е. к примеру 2-значные цифры (от 10 до 100) генерировались также часто как и 5-значные (10000 - 99999).
*/
$min_digits = 1;
$max_digits = 6;
$num_digits = rand($min_digits, $max_digits);
echo $num_digits;
$min_value = pow(10, $num_digits - 1);
$max_value = pow(10, $num_digits) - 1;
