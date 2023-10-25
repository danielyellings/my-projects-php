<?php
#1 zadacha
$random_number = rand(0, 1000);

if ($random_number > 99 && $random_number < 1000) {
    echo "This number has 3 digits";
} else {
    echo "This number doesn't have 3 digits";
}

echo '<br>';

#2 zadacha

$math_grade = rand(1, 5);
$physics_grade = rand(1, 5);
$chemistry_grade = rand(1, 5);
$literature_grade = rand(1, 5);
$language_grade = rand(1, 5);

$average_grade = ($math_grade + $physics_grade + $chemistry_grade + $literature_grade + $language_grade) / 5;
$br = "<br>";

echo " Math: " . $math_grade . $br;
echo " Physics: " . $physics_grade . $br;
echo " Chemistry: " . $chemistry_grade . $br;
echo " Literature: " . $literature_grade . $br;
echo " Language " . $language_grade . $br;
echo $average_grade . " this is average grade" . $br;

if ($average_grade < 3.5) {
    if ($math_grade != 5 && $physics_grade != 5 && $chemistry_grade != 5 && $literature_grade != 5 && $language_grade != 5) {
        echo "This student can't go to the next class";
    } else {
        echo "This student goes to the next class";
    }
} else {
    echo "This student goes to the next class";
}

echo "<br>";

/*Задача номер number 3
Дана масса груза в граммах (случайное число). Нужно вывести массу в удобном виде для человека, следующим образом: 

если > 1000000, то в тоннах
если > 100000, то в цейтнерах
если > 1000, то в килограммах
Либо оставляем в граммах
*/

$weight = rand(1, 1500000);

if ($weight > 1000 && $weight < 100000) {
    echo $weight / 1000 . " kgs";
} elseif ($weight >= 100000 && $weight < 1000000) {
    echo $weight / 10000 . " centners";
} elseif ($weight >= 1000000) {
    echo $weight / 1000000 . " tones";
}

