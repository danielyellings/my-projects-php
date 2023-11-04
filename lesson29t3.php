<?php

/**Задача 3. Игра в дурака.
Есть колода из 36 игральных карт (от 6 до тузов). Перемешать колоду карт и раздать на четырех игроков. Вывести на экран козырь. И ФИО игрока у кого больше шансов выиграть.
 */

$imyaKarty = ['6', '7', '8', '9', '10', 'Valet', 'Dama', 'Korol', 'Tuz'];
$masti = ['Chervi', 'Kresti', 'Piki', 'Bubni'];
$kolodaKart = [];

foreach ($masti as $mast) {
    foreach ($imyaKart as $karta) {
        $card = $karta . ' ' . $mast;
        $kolodaKart[] = $card;
    }
}

shuffle($kolodaKart);
$kozir = $masti[array_rand($masti)];
echo "Козырь: $kozir\n";

$players = ['Player1', 'Player2', 'Player3', 'Player4'];
$razdacha = [];
for ($i=0; $i<count($players); $i++) {
    $razdacha[$players[$i]] = array_slice($kolodaKart, 0, 6);
}

$kozirCounts = [];

foreach ($players as $player) {
    $kozirCounts[$player] = 0;
    foreach ($razdacha[$player] as $card) {
        $imyaKarty = $card[0];
        $masti = substr($card, 1);
        }
        if ($masti === $kozir) {
            $kozirCounts++;
        }
    }