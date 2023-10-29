<?php

/*Смоделировать игровой процесс пошаговой стратегии. В игре принимают участие два игрока, у каждого игрока по 5 героев. 
У каждого героя есть свойства Жизнь (случайное число в диапазоне от 1000 до 2500) и Сила (случайное число в диапазоне от 20-170). 
Игровой процесс состоит из раундов. При каждом раунде поочередно герои первого игрока наносят урон в размере своей силы поочередно каждому герою второго игрока, затем урон наносят герои второго игрока героям первого, на этом раунд заканчивается и переход к следующему раунду. Игра продолжается до тех пор пока у одного из игроков не останется живых героев. Выводить на экран отчеты каждого раунда. */

$heroes1 = $heroes2 = [];

function getRandomHero()
{
    return [
        'health' => rand(1000, 2500),
        'strength' => rand(20, 170),
    ];
}

for ($i=0; $i<5; $i++) {
    $heroes1[] = getRandomHero();
    $heroes2[] = getRandomHero();
}
print_r($heroes1);
print_r($heroes2);


while (true) {
    foreach ($heroes1 as $key1 => $hero1) {
        if ($hero1['health'] <= 0) {
            unset($heroes1[$key1]);
        }
    }

    foreach ($heroes2 as $key2 => $hero2) {
        if ($hero2['health'] <= 0) {
            unset($heroes2[$key2]);
        }
    }

    if (count($heroes1) == 0 || count($heroes2) == 0) {
        break;
    }

    foreach ($heroes1 as $hero1) {
        foreach ($heroes2 as &$hero2) {
            $hero2['health'] -= $hero1['strength'];
        }
    }

    foreach ($heroes2 as $hero2) {
        foreach ($heroes1 as &$hero1) {
            $hero1['health'] -= $hero2['strength'];
        }
    }
}
echo '--------------------------------------------';
print_r($heroes1);
print_r($heroes2);