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

function filterHeroes($heroes)
{
    foreach ($heroes as $key => $hero) {
        if ($hero['health'] <= 0) {
            unset($heroes[$key]);
        }
    }
    return $heroes;
}

function battle($heroes1, $heroes2, $player)
{
    echo 'Игрок ' . $player . ' атакует!' . "\n";
    foreach ($heroes1 as $key1 => $hero1) {
        foreach ($heroes2 as $key2 => &$hero2) {
            $hero2['health'] -= $hero1['strength'];
            echo 'Герой ' . ($key1 + 1) . ' (' . $hero1['health'] . ')  атакует '
                . ($key2 + 1) . ' (' . $hero2['health'] . ')' . "\n";
            if ($heroes2['health'] <= 0) {
                unset($heroes2[$key2]);
            }
        }
    }
    echo '--------------------------------------------' . "\n";

    return $heroes2;
}

while (true) {
    $heroes1 = filterHeroes($heroes1);
    $heroes2 = filterHeroes($heroes2);

    if (count($heroes1) == 0 || count($heroes2) == 0) {
        break;
    }

    $heroes2 = battle($heroes1, $heroes2, 1);
    $heroes1 = battle($heroes2, $heroes1, 2);
}


print_r($heroes1);
print_r($heroes2);