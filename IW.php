<?php

$day = rand(1, 7);
$birthday = "1998-07-03";

$birthday_day = date('N', strtotime($birthday));
$days_diff = $birthday_day - $day;

if ($days_diff < 0) {
    $days_diff += 7;
}

$birthday_weekday = date('l', strtotime("$birthday - $days_diff days"));

echo "Если месяц начнется с " . date('l', strtotime("2023-06-01 - $day days")) . ", то мой день рождения будет в $birthday_weekday.";

echo "<br>";

/*ZADACHA 2
Условие задачи:
Земляне засекли НЛО на расстояннии $s (случайное число от 0 - 1500) км от земли.  Опеределить в каком из слоев атмосферы оно находится.
Вывести на экран ответ в след виде: 

Высота: 700км - это Экзосфера (500 - 1500)
*/
echo "<br>";

$s = rand(7, 1500);

if($s >= 7 && $s <= 20) {
    echo "Height is " . $s . " km. This is troposphere.";
} elseif ($s > 20 && $s <= 50) {
    echo "Height is " . $s . " km. This is stratosphere.";
} elseif ($s > 50 && $s <= 85) {
    echo "Height is " . $s . " km. This is mezosphere.";
} elseif ($s > 85 && $s <= 500) {
    echo "Height is " . $s . " km. This is termosphere.";
} elseif ($s > 500 && $s <=1500) {
    echo "Height is " . $s . " km. This is exosphere";
};

echo "<br>";
/*ZaDACHA 3
Задача 3. Даем НЛО больше свободы.
Условие задачи:
Учитывая разный диапазон высот слоев атмосферы, НЛО чаще всего будет оказываться в экзосфере. Перепишите сценарий программы из задачи 2 таким образом, чтобы НЛО могло появляться в каждом слое атмосферы с равной вероятностью. Выводить ответ в таком же виде как и в предыдущей задаче.
*/
echo "<br>";

$s = rand(0, 1500);

if ($s < 20) {
    $height = rand(7, 20);
    echo "Height is " . $height . " km. This is troposphere";
} elseif ($s < 50) {
    $height = rand(21, 50);
    echo "Height is " . $height . " km. This is stratosphere";
} elseif ($s < 85) {
    $height = rand(51, 85);
    echo "Height is " . $height . " km. This is mesosphere";
} elseif ($s < 500) {
    $height = rand(86, 500);
    echo "Height is " . $height . " km. This is termosphere";
} elseif ($s < 1500) {
    $height = rand(501, 1500);
    echo "Height is " . $height . " km. This is exosphere";
}

echo "<br>";

/* ZADACHA 4 
Задача 4. Сколько вам лет?
Для целого числа $k (случайное число от 1 до 99) напечатать фразу «Мне k лет», учитывая при этом, что при некоторых значениях $k слово «лет» надо заменить на слово «год» или «года». 

Например, 11 лет, 22 года, 51 год.
*/
echo "<br>";

$k = rand(1, 99);

if ($k == 1 || $k == 21 || $k == 31 || $k == 41 || $k == 51 || $k == 61 || $k == 71 || $k == 81 || $k == 91) {
    echo "Мне " . $k . " год";
} elseif ($k > 1 && $k < 5 || $k > 21 && $k <=24 || $k > 31 && $k <=34 || $k > 41 && $k <= 44 || $k > 51 && $k <= 54 || $k > 61 && $k <= 64 || $k > 71 && $k <= 74 || $k > 81 && $k <= 84 || $k > 91 && $k <= 94) {
    echo "Мне " . $k . " года";
} elseif ($k > 5 && $k <= 20 || $k > 24 && $k <= 30 || $k > 34 && $k <= 40 || $k > 44 && $k <= 50 || $k > 54 && $k <= 60 || $k > 64 && $k <= 70 || $k > 74 && $k <= 80 || $k > 84 && $k <= 90 || $k > 94 && $k <= 99) {
    echo "Мне " . $k . " лет";
}


/*ZADACHA 5
В теплице стоит автоматизированная система управления климатом. 
Оперирует система двумя параметрами:
 - текущая температура $t (случайное число от -40 до 45) 
 - текущая влажность $f (случайное число от 0 до 100)
А также есть оптимальные показатели температуры $t_normal = 20 и влажности $f_normal = 50, которые должна поддерживать система. 
Система управляет следующими устройствами с различными уровнями мощности:
- кондиционер (минимальный, умеренный, средний, максимальный);
- конвекторный обогреватель (минимальный, умеренный, средний, максимальный);
- система орошения (минимальный, средний, максимальный).
       */
echo "<br>";
echo "<br>";

$t = rand(-40, 45);
$f = rand(0, 100);
$t_normal = 20;
$f_normal = 50;

$dt = $t_normal - $t;
$df = $t_normal - $f;

if ($dt <= -25) {
    echo "кондиционер МАКС, обогреватель ВЫКЛ";
} elseif ($dt > -25 && $dt <= -15) {
    echo "кондиционер СРЕДНИЙ, обогреватель ВЫКЛ";
} elseif ($dt > -15 && $dt <= -8) {
    echo "кондиционер, обогреватель ВЫКЛ";
} elseif ($dt > -8 && $dt < 0) {
    echo "кондиционер МИН, обогреватель ВЫКЛ";
} elseif ($dt > 0 && $dt <= 8) {
    echo "кондиционер ВЫКЛ, обогреватель МИН";
} elseif ($dt > 8 && $dt <= 15) {
    echo "кондиционер ВЫКЛ, обогреватель УМЕРНЕННЫЙ";
} elseif ($dt > 15 && $dt <=25) {
    echo "кондиционер ВЫКЛ, обогреватель СРЕДНИЙ";
} elseif ($dt > 25) {
    echo "кондиционер ВЫКЛ, обогреватель МАКС";
}
echo "<br>";
if ($df <= -25) {
    echo "орошение ВЫКЛ, обогреватель средний";
} elseif ($df > -25 && $df <= -10) {
    echo "орошение ВЫКЛ, обогреватель умеренный";
} elseif ($df > -10 && $df <= 0) {
    echo "орошение ВЫКЛ, обогреватель МИН";
} elseif ($df > 0 && $df <= 10) {
    echo "орошение МИН, обогреватель ВЫКЛ";
} elseif ($df > 10 && $df <= 25) {
    echo "орошение ВЫКЛ, обогреватель ВЫКЛ";
} elseif ($df > 25) {
    echo "орошение МАКС, обогреватель ВЫКЛ";
}
echo "<br>";
echo "df: " . $df;
echo "<br>";
echo "dt: " . $dt;