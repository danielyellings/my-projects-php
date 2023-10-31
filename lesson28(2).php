<?php

class Hero
{
    /*Уровень здоровья */
    var $health;
    /*Уровень силы */
    var $strength;

    function __construct($health, $strength)
    {
        $this->health = $health;
        $this->strength = $strength;
    }

    function takeDamage($amount)
    {   
        var_dump($this);
        $this->health -= $amount;
    }
    function attack($enemyHero)
    {
        var_dump($this);
        var_dump($enemyHero);
        echo '--------------------------------' . "\n";
        $enemyHero->takeDamage($this->strength);
    }
}

$hero1 = new Hero(rand(1000, 2500), rand(100, 170));
$hero2 = new Hero(rand(1000, 2500), rand(100, 170));

$hero1->attack($hero2);
echo '--------------------------------' . "\n";
var_dump($hero1);
var_dump($hero2);