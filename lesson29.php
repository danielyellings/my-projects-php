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

/**Задача: Создание класса для работы с продуктами
Создайте класс Product, который представляет продукт в интернет-магазине. У продукта должны быть следующие свойства:
id (уникальный идентификатор продукта).
name (название продукта).
price (цена продукта).
description (описание продукта).
Также создайте методы для этого класса:
getInfo(), который будет выводить информацию о продукте, включая название, цену и описание.
setPrice($newPrice), который позволит изменить цену продукта.
setDescription($newDescription), который позволит изменить описание продукта.
Создайте несколько экземпляров класса Product и продемонстрируйте, как использовать свойства и методы для работы с продуктами.

 */

class Product
{
    var $id;
    var $productName;
    var $price;
    var $desciption;

    function __construct($id, $productName, $price, $desciption)
    {
        $this->id = $id;
        $this->productName = $productName;
        $this->price = $price;
        $this->desciption = $desciption;
    }

    function getInfo()
    {
        echo "Название: {$this->name}\n";
        echo "Цена: {$this->price}\n";
        echo "Описание: {$this->desciption}\n";
    }

    function setPrice($newPrice)
    {
        $this->price = $newPrice;
    }

    function setDescription($newDescription)
    {
        $this->desciption = $newDescription;
    }
}

$product1 = new Product($id, $productName, $price, $description);
$product1->name = 'Смартфон';
$product1->price = '500';
$product1->desciption = 'Мощный смартфон с большим экраном.';

/**Выводим инфу о продукте */
$product1->getInfo();
// Изменяем цену продукта
$product1->setPrice(650);
// Изменяем описание продукта
$product1->setDescription('Смартфон с отличной камерой.');
// Выводим обновленную информацию о продукте\
$product1->getInfo();

