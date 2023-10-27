<?php
class User 
{
    var $name;
    var $access = 'простой смертный';
    function __construct($name)
    {
        $this->name = $name;
    }
    function sayHello()
    {
        echo $this->name . ': Всем привет! Меня зовут, ' . $this->name . '! И я - ' . $this->access . '!<br>';
    }
    function letsCode(User $user)
    {
        echo $this->name . ': Привет, ' . $user->name . '! Я - ' . $this->name . ', пойдем кодить!<br>';
    }
}

$akim = new User('Аким');
$gulnaz = new User('Гульназ');

$akim->sayHello();
$gulnaz->sayHello();
$akim->letsCode($gulnaz);