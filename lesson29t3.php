<?php

/**Задача 3. Игра в дурака.
Есть колода из 36 игральных карт (от 6 до тузов). Перемешать колоду карт и раздать на четырех игроков. Вывести на экран козырь. И ФИО игрока у кого больше шансов выиграть.
 */

$imyaKarty = ['6', '7', '8', '9', '10', 'Valet', 'Dama', 'Korol', 'Tuz'];
$masti = ['Chervi', 'Kresti', 'Piki', 'Bubni'];
$kolodaKart = [];

// Создаем колоду карт
foreach ($masti as $mast) {
    foreach ($imyaKarty as $karta) {
        $card = $karta . ' ' . $mast;
        $kolodaKart[] = $card;
    }
}

shuffle($kolodaKart);

// Выбираем случайную масть как козырь
$kozir = $masti[array_rand($masti)];
echo "Козырь: $kozir\n";

$players = ['Player1', 'Player2', 'Player3', 'Player4'];
$razdacha = [];

// Раздаем карты игрокам
for ($i = 0; $i < count($players); $i++) {
    $razdacha[$players[$i]] = array_slice($kolodaKart, 0, 6);
}

$kozirCounts = [];

// Подсчитываем количество козырей у каждого игрока
foreach ($players as $player) {
    $kozirCounts[$player] = 0;
    foreach ($razdacha[$player] as $card) {
        // Получаем масть карты (последний символ)
        $masti = substr($card, -5); // <<<< Изменил эту строку

        // Проверяем, является ли масть козырем
        if ($masti === $kozir) {
            $kozirCounts[$player]++;
        }
    }
}

$maxKozirPlayer = '';
$maxKozirCount = 0;

// Определяем игрока с наибольшим количеством козырей
foreach ($players as $player) {
    if ($kozirCounts[$player] > $maxKozirCount) {
        $maxKozirCount = $kozirCounts[$player];
        $maxKozirPlayer = $player;
    }
}

echo "Игрок $maxKozirPlayer имеет наибольшее количество козырей: $maxKozirCount козырей.\n";
