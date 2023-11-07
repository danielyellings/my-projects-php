<?php

/**
 * Задача 1. Кукольный театр.
Интерфейсы кукольного театра:

PerformInterface - все объекты реализующие данный интерфейс умеют выступать

Субъекты кукольного театра: 
Кукла:
интерфейсы: PerformInterface
характеристики: тип, пол, возраст, цвет, текст.
умеет: выступать - проговаривает собственный текст.
Кукловод:
интерфейсы: PerformInterface
характеристики: пол, тип голоса, талант (1-10), куклы (2 шт). 
умеет: выступать - запускает выступление каждой куклы поочереди.
Актер:
интерфейсы: PerformInterface
характеристики: пол, возраст, текст.
умеет: выступать - проговаривает собственный текст.
Постановка
характеристики: очередь (массив) из объектов PerformInterface (Актеры, Кукловоды)
умеет:  добавлять к очереди объект PerformInterface, запускать выступление.
Зритель:
характеристики: реакция (текст описывающий эмоцию: Браво! На бис! И т.д.)
умеет: аплодировать.
Театр:
характеристики: Постановка, Зрители
умеет: запускать театр (сначала Постановка, потом реакция Зрителей)
 */


interface PerformInterface 
{
    public function perform();
}


class Puppet implements PerformInterface
{
    private $type;
    private $gender;
    private $age;
    private $color;
    private $text;

    public function __construct($type, $gender, $age, $color, $text)
    {
        $this->type = $type;
        $this->gender = $gender;
        $this->age = $age;
        $this->color = $color;
        $this->text = $text;
    }

    public function perform()
    {
        echo "Кукла выступает: " . $this->text . "\n";
    }
}

class Puppeteer implements PerformInterface
{
    private $gender;
    private $voicetype;
    private $talent;
    private $puppets = [];

    public function __construct($gender, $voicetype, $talent)
    {
        $this->gender = $gender;
        $this->voicetype = $voicetype;
        $this->talent = $talent;
    }

    public function addPuppet($puppet)
    {
        $this->puppets[] = $puppet;
    }
    public function perform()
    {
        foreach ($this->puppets as $puppet) {
            $puppet->perform();
        }
    }
}

class Actor implements PerformInterface
{
    private $gender;
    private $age;
    private $text;

    public function __construct($gender, $age, $text)
    {
        $this->gender = $gender;
        $this->age = $age;
        $this->text = $text;
    }

    public function perform()
    {
        echo "Актер выступает: " . $this->text . "\n";
    }
}

class Performance
{
    private $queue = [];

    public function addToQueue(PerformInterface $performer)
    {
        $this->queue[] = $performer;
    }

    public function startPerformance()
    {
        foreach ($this->queue as $performer) {
            $performer->perform();
        }
    }
}

class Audience
{
    private $reaction;

    public function __construct($reaction)
    {
        $this->reaction = $reaction;
    }

    public function applaud()
    {
        echo "Зрители реагируют: " . $this->reaction . "\n";
    }
}

class Theater
{
    private $performance;
    private $audience = [];

    public function __construct($performance)
    {
        $this->performance = $performance;
    }

    public function addAudience($audience)
    {
        $this->audience[] = $audience;
    }

    public function startTheater()
    {
        $this->performance->startPerformance();
        foreach ($this->audience as $audience) {
            $audience->applaud();
        }
    }
}   
