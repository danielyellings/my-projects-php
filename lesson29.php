<?php

/**Задача 1. Генератор людей.
Придумайте 3 массива для имен, фамилий и отчеств. Опишите класс людей Human как объектов с совокупностью трех свойств (name, surname, patronymic). Собрать массив из 20 людей со случайным набором ФИО. */

$names = ['Daniyar','Dina','Alexey','Zhumaniyaz','Albert','Nursultan','Aidyn','Alibek','Serik','Daulet','Gulnaz','Gauhar','Dinara','Leonid','Vladimir','Dastan','Aigul','Temir','Evgeni','Ainagul'];
$surnames = ['Yerkinov','Zhumukov','Itaev','Akhmediyev','Montaeva','Serikov','Anuarberkkyzy','Kuznetsov','Smith','Leontev','Sarsenbek','Yermekov','Isataev','Utepbergenov','Ivanov','Sidorov','Yellings','Petrov','Kozlov','Sokolov'];
$patronymics = ['Serikovich','Petrovich','Zhanatovich','Dmitriev','Pavlovich','Toshich','Cornwell','Sidorovich','Artemyev','Dastanovich','Daniyarovich','Alexeyevich','Pavlovich','Andreevna','Olegovich','Mikhailovich','Sairanovich','Itaevich','Rusich'];

class Human
{
    var $name;
    var $surname;
    var $patronymic;

    function __construct($name, $surname, $patronymic)
    {
        $this->name = $name;
        $this->surname = $surname;
        $this->patronymic = $patronymic;
    }
}

$people = [];
for ($i=0; $i<20; $i++) {
    $randomName = $names[array_rand($names)];
    $randomSurname = $surnames[array_rand($surnames)];
    $randomPatronymic = $patronymic[array_rand($patronymics)];

    $people[] = new Human($randomName, $randomSurname, $randomPatronymic);
}

foreach ($people as $person) {
    echo "{$person->name} {$person->surname} {$person->patronymic}\n";
}