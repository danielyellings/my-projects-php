<?php

/**Задача 2. Больше - меньше.
Игра больше меньше между двумя игроками. При каждой партии игроки загадывают числа от 0 до 9999. Один из игроков выносит догадку о том, что его число больше или меньше загаданного числа соперника. Если он отгадал, то к его счету добавляется 1 балл. Разыграть 5 партий. Вывести имя победителя. Игроки отгадывают по очереди. */

class Player
{
    var $name;
    var $score;

    function __construct($name)
    {
        $this->name = $name;
        $this->score = 0;
    }

    function guessNumber($opponentNumber)
    {
        $myNumber = rand(0, 9999);
        if ($myNumber > $opponentNumber) {
            return "больше";
        } else {
            return "меньше";
        }
    }
}

$player1 = new Player('Игрок 1');
$player2 = new Player('Игрок 2');

for ($i=1; $i<=5; $i++) {
    $opponentNumber = rand(0, 9999);

    $guess1 = $player1->guessNumber($opponentNumber);
    $guess2 = $player2->guessNumber($opponentNumber);

    echo "Раунд $i: Игрок 1 думает, что число $guess1 больше чем $opponentNumber. Игрок 2 думает, что число $guess2 больше чем $opponentNumber.\n";
 //Kто правильно угадал
    if ($guess1 === 'больше' && $guess2 === 'меньше') {
        $player1->score++;
    } elseif ($guess1 === 'меньше' && $guess2 === 'больше') {
        $player2->score++;
    }
}

if ($player1->score > $player2->score) {
    echo "{$player1->name} побеждает с счетом {$player1->score} - {$player2->score}!\n";
} elseif ($player2->score > $player1->score) {
    echo "{$player2->name} побеждает с счетом {$player2->score} - {$player1->score}!\n";
} else {
    echo "Ничья! Счет {$player1->score} - {$player2->score}.\n";
}