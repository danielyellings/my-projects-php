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
}

$hero1 = new Hero(rand(1000, 2500), rand(100, 170));
$hero2 = new Hero(rand(1000, 2500), rand(100, 170));

var_dump($hero1);
var_dump($hero2);