<?php
class Suit
{
    private $isTrump = false;
    private $type;
    public function __construct($type)
    {
        $this->type = $type;
    }
    public function setTrump($trump)
    {
        $this->isTrump = $trump;
    }
    public function isTrump()
    {
        return $this->isTrump;
    }
}
class Card
{
    private $rang;
    private $label;
    private $suit;

    public function __construct($rang, $label, $suit)
    {
        $this->rang = $rang;
        $this->label = $label;
        $this->suit = $suit;
    }
    public function getSuit()
    {
        return $this->suit;
    }
    public function getRang()
    {
        $level = 0;
        if ($this->suit->isTrump()) {
            $level = 10;
        }
        return $this->rang + $level;
    }
}

class Player
{
    private $name;
    private $cards = [];

    public function __construct($name)
    {
        $this->name = $name;
    }
    public function setCard($card)
    {
        $this->cards[] = $card;
    }
    public function calc()
    {
        $power = 0;
        foreach ($this->cards as $card) {
            $power += $card->getRang();
        }
        return $power;
    }
}

$rangs = [
    '6', '7', '8', '9', '10', 'V', 'D', 'K', 'T',
];

$suits = [new Suit('hearts'), new Suit('diamonds'), new Suit('clubs'), new Suit('spades')];
$cards = [];
foreach ($suits as $suit) {
    foreach ($rangs as $rang => $label) {
        $cards[] = new Card($rang+1, $label, $suit);
    }
}

shuffle($cards);

$players = [new Player('Бывалый'), new Player('Безыменянный')];

$i = 0;
foreach ($cards as $card) {
    $players[$i%2]->setCard($card);
    if ($i == 11) {
        break;
    }
    $i++;
}

$trumpSuit = $cards[$i++]->getSuit();
$trumpSuit->setTrump(true);

var_dump([
    $players[0]->calc(),
    $players[1]->calc(),
]);


var_dump($trumpSuit);

var_dump($players);