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
    public function getRang()
    {
        return $this->rang;
    }
    public function setRang($rang)
    {
        $this->rang = $rang;
    }
}

$rangs = [
    '6', '7', '8', '9', '10', 'V', 'D', 'K', 'T',
];

$suits = ['hearts', 'diamonds', 'clubs', 'spades'];
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

echo $cards[++$i]->getSuit();

var_dump($players);