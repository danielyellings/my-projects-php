<?php

interface FightableInterface
{
    public function takeDamage($amount, FightableInterface $hero = null);
    public function attack(FightableInterface $hero);
    public function getStrength();
    public function getHealth();
    public function getNumber();
    public function getPlayer();
}

class Bunker implements FightableInterface
{
    private $heroes = [];
    private $health;
    private $player;
    private $number = 'Бункер';

    public function __construct($heroes, Player $player)
    {
        $this->heroes = $heroes;
        $this->health = rand(1000, 2000);
        $this->player = $player;
    }

    public function takeDamage($amount, FightableInterface $hero = null)
    {
        $this->health -= $amount;
        if ($this->health <= 0) {
            $this->player->setHeroes($this->heroes);
        }
    }

    public function attack(FightableInterface $hero)
    {
        if ($this->health > 0) {
            $damage = $this->getStrength();
            echo 'Герои с бункера наносят коллективный урон (' . $damage . ') герою '
                . $hero->getNumber() . ' (' . $hero->getHealth() . ')' . "\n";
            $hero->takeDamage($damage, $this);
        }
    }

    public function getStrength()
    {
        $damage = 0;
        foreach ($this->heroes as $hero) {
            $damage += $hero->getStrength();
        }
        return $damage;
    }

    public function getHealth()
    {
        return $this->health;
    }

    public function getNumber()
    {
        return $this->number;
    }

    public function getPlayer()
    {
        return $this->player;
    }
}

class Hero implements FightableInterface
{
    private $number;
    private $health;
    private $originalHealth;
    private $strength;
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

    public function getStrength()
    {
        return $this->strength;
    }

    public function getHealth()
    {
        return $this->health;
    }

    public function getNumber()
    {
        return $this->number;
    }

    public function getPlayer()
    {
        return $this->player;
    }

    public function takeDamage($amount, FightableInterface $hero = null)
    {
        $this->health -= $amount;
        if ($this->health <= 0) {
            if ($hero !== null) {
                if (rand(0, 1)) {
                    echo 'Герой ' . $this->number . ' нанес предсмертный удар силой - '
                        . $this->strength * 0.1 . "\n";
                    $hero->takeDamage($this->strength * 0.1);
                } else {
                    echo 'Герой ' . $this->number . ' взорвал гранату силой - '
                        . $this->strength * 2 . "\n";
                    foreach ($hero->getPlayer()->getHeroes() as $enemyHero) {
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
                echo 'Герой ' . $this->number . ' вколол адреналин и получил +' . $Adrenaline . ' к здоровью!!!' . "\n";
            }
        }
    }

    public function attack(FightableInterface $enemyHero)
    {
        if ($this->health > 0) {
            echo 'Герой ' . $this->number . ' (' . $this->health . ')  атакует '
                . $enemyHero->getNumber() . ' (' . $enemyHero->getHealth() . ')' . "\n";
            $enemyHero->takeDamage($this->strength, $this);
        }
    }
}

class Player
{
    private $heroes = [];
    private $bunkerUsed = false;

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

    public function setHeroes($heroes)
    {
        $this->heroes = $heroes;
    }

    public function removeHero($diedHero)
    {
        foreach ($this->heroes as $key => $hero) {
            if ($hero === $diedHero) {
                unset($this->heroes[$key]);
            }
        }

        if (!$this->bunkerUsed) {
            echo 'Игрок поместил героев в бункер ' . "\n";
            $this->heroes = [new Bunker($this->heroes, $this)];
            $this->bunkerUsed = true;
        }
    }
}

class Game
{
    private $player1;
    private $player2;

    public function __construct($player1, $player2)
    {
        $this->player1 = $player1;
        $this->player2 = $player2;
    }

    public function battle()
    {
        $round = 0;

        while (true) {
            $round++;

            if (empty($this->player1->getHeroes())) {
                echo "Победил игрок 2\n";
                break;
            }
            if (empty($this->player2->getHeroes())) {
                echo "Победил игрок 1\n";
                break;
            }

            echo "Раунд $round:\n";

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
for ($i = 0; $i < 5; $i++) {
    $heroes1[] = new Hero($i + 1, rand(1000, 2500), rand(100, 170));
    $heroes2[] = new Hero($i + 1, rand(1000, 2500), rand(100, 170));
}

$game = new Game(
    new Player($heroes1),
    new Player($heroes2)
);

$game->battle();
