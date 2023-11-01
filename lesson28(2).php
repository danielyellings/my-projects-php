<?php

class Hero
{
    var $number;
    /*Уровень здоровья */
    var $health;
    /*Начальный уровень здоровья */
    var $originalHealth;
    /*Уровень силы */
    var $strength;
    /** @var Player */
    var $player;

    function __construct($number, $health, $strength)
    {
        $this->number = $number;
        $this->health = $this->originalHealth = $health;
        $this->strength = $strength;
    }
    function setPlayer($player)
    {
        $this->player = $player;
    }

    function takeDamage($amount, $hero = null)
    {   
        $this->health -= $amount;
        if ($this->health <= 0) {
            if ($hero !== null) {
                $hero->takeDamage($this->strength*0.1);
                echo 'Герой ' . $this->number . ' нанес предсмертный удар силой - '
                     . $this->strength*0.1 . "\n";
            }
            $this->player->removeHero($this);
        } else {
            $Adrenaline = $this->originalHealth * 0.1;
            if ($this->health < $Adrenaline) {  
                $Adrenaline *= 0.5;
                $this->health += $Adrenaline;
                echo 'Герой ' . $this->number . ' вкокол адреналин и получил +' . $Adrenaline . ' к здоровью!!!' . "\n";
            }
        }
        }

    function attack($enemyHero)
    {
        echo 'Герой ' . $this->number . ' (' . $this->health . ')  атакует '
            . $enemyHero->number . ' (' . $enemyHero->health . ')' . "\n";
        $enemyHero->takeDamage($this->strength, $this);
        }
    }

class Player
{
    var $heroes = [];
    function __construct($heroes)
    {
        foreach ($heroes as $hero) {
            $hero->setPlayer($this);
        }
        $this->heroes = $heroes;
    }

    function removeHero($diedHero)
    {
        foreach ($this->heroes as $key => $hero) {
            if ($hero === $diedHero) {
                unset($this->heroes[$key]);
            }
        }
    }
}

class Game
{
    /** @var Player  - первый игрок*/
    var $player1;
    /** @var Player - второй игрок */
    var $player2;

    function __construct($player1, $player2)
    {
        $this->player1 = $player1;
        $this->player2 = $player2;
    }

    function battle()
    {
        while (true) {

            if (! $this->player1->heroes) {
                echo "Победил игрок 2";
                break;
            }
            if (! $this->player2->heroes) {
                echo "Победил игрок 1";
                break;
            }

            echo 'Игрок 1 атакует' . "\n";
            foreach ($this->player1->heroes as $hero1) {
                foreach ($this->player2->heroes as $hero2) {
                    $hero1->attack($hero2);
                }
            }
            echo 'Игрок 2 атакует' . "\n";
            foreach ($this->player2->heroes as $hero2) {
                foreach ($this->player1->heroes as $hero1) {
                    $hero2->attack($hero1);
                }
            }
        }
    }
}

$heroes1 = $heroes2 = [];
for ($i=0; $i<5; $i++) {
    $heroes1[] = new Hero($i+1, rand(1000, 2500), rand(100, 170));
    $heroes2[] = new Hero($i+1, rand(1000, 2500), rand(100, 170));
}

$game = new Game(
    new Player($heroes1), 
    new Player($heroes2)
);

$game->battle();