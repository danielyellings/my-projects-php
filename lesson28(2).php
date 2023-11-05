<?php

class Hero
{
    private $number;
    /*Уровень здоровья */
    private $health;
    /*Начальный уровень здоровья */
    private $originalHealth;
    /*Уровень силы */
    private $strength;
    /** @var Player */
    private $player;

    public function __construct($number, $health, $strength)
    {
        $this->number = $number;
        $this->health = $this->originalHealth = $health;
        $this->strength = $strength;
    }
    public function setPlayer($player)
    {
        $this->player = $player;
    }

    public function takeDamage($amount, $hero = null)
    {   
        $this->health -= $amount;
        if ($this->health <= 0) {
            if ($hero !== null) {
                
                
                if (rand(0,1)) {
                    echo 'Герой ' . $this->number . ' нанес предсмертный удар силой - '
                                  . $this->strength*0.1 . "\n";
                    $hero->takeDamage($this->strength*0.1);
                } else {
                    echo 'Герой ' . $this->number . ' взорвал гранату силой - '
                         . $this->strength*2 . "\n";
                    foreach ($hero->player->getHeroes() as $enemyHero) {
                        $enemyHero->takeDamage($this->strength * 2);
                    }
                }
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

    public function attack($enemyHero)
    {
        if ($this->health > 0) {
            echo 'Герой ' . $this->number . ' (' . $this->health . ')  атакует '
                . $enemyHero->number . ' (' . $enemyHero->health . ')' . "\n";
            $enemyHero->takeDamage($this->strength, $this);
        }
    }
}

class Player
{
    private $heroes = [];
    public function __construct($heroes)
    {
        foreach ($heroes as $hero) {
            $hero->setPlayer($this);
        }
        $this->heroes = $heroes;
    }

    public function getHeroes()
    {
        return $this->heroes;
    }

    public function removeHero($diedHero)
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
    private $player1;
    /** @var Player - второй игрок */
    private $player2;

    public function __construct($player1, $player2)
    {
        $this->player1 = $player1;
        $this->player2 = $player2;
    }

    public function battle()
    {
        while (true) {

            if (! $this->player1->getHeroes()) {
                echo "Победил игрок 2";
                break;
            }
            if (! $this->player2->getHeroes()) {
                echo "Победил игрок 1";
                break;
            }

            echo 'Игрок 1 атакует' . "\n";
            foreach ($this->player1->getHeroes() as $hero1) {
                foreach ($this->player2->getHeroes() as $hero2) {
                    $hero1->attack($hero2);
                }
            }
            echo 'Игрок 2 атакует' . "\n";
            foreach ($this->player2->getHeroes() as $hero2) {
                foreach ($this->player1->getHeroes() as $hero1) {
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