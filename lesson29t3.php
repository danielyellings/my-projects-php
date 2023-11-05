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


$kozir = $masti[array_rand($masti)];
echo "Козырь: $kozir\n";

$players = ['Player1', 'Player2', 'Player3', 'Player4'];
$razdacha = [];


for ($i = 0; $i < count($players); $i++) {
    $razdacha[$players[$i]] = array_slice($kolodaKart, 0, 6);
}

$kozirCounts = [];
foreach ($players as $player) {
    $kozirCounts[$player] = 0;
    foreach ($razdacha[$player] as $card) {
        $masti = substr($card, -5); 

        // является ли масть козырем
        if ($masti === $kozir) {
            $kozirCounts[$player]++;
        }
    }
}

$maxKozirPlayer = '';
$maxKozirCount = 0;

foreach ($players as $player) {
    if ($kozirCounts[$player] > $maxKozirCount) {
        $maxKozirCount = $kozirCounts[$player];
        $maxKozirPlayer = $player;
    }
}

echo "Игрок $maxKozirPlayer имеет наибольшее количество козырей: $maxKozirCount козырей.\n";
