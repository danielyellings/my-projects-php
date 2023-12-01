<?php

$host = '127.0.0.1';
$db   = 'db_films';
$user = 'root';
$pass = '';
$charset = 'utf8';

$dbopts = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false
];

$pdo = new PDO("mysql:host=$host;dbname=$db;charset=$charset", $user, $pass, $dbopts);

function get_film_data($html)
{
    $matches = [];

    if (preg_match('/<td>&laquo;(.*?)&raquo;<\/td>/u', $html, $matches)) {
        
        $slogan = $matches[0];
    } else {
        $slogan = '';
    }

    if (preg_match('/<span itemprop="name">(.*?)<\/span>/u', $html, $matches)) {
        $director = $matches[1];
    } else {
        $director = '';
    }

    if (preg_match('/<a href="country\/(?:.*?)\/">(.*?)<\/a>/u', $html, $matches)) {
        $country = $matches[1];
    } else {
        $country = '';
    }
    if (preg_match('/<span itemprop="name">(.*?)<\/span>/u', $html, $matches)) {
        $actor = $matches[2];
    } else {
        $actor = '';
    }


    return compact('slogan', 'director', 'country', 'actor');
}

$directory = __DIR__ . '/films';

foreach (scandir($directory) as $filename) {
    if (is_file($directory . '/' . $filename)) {
        $html = file_get_contents($directory . '/' . $filename);
        $data = get_film_data($html);

        $sql = "INSERT INTO films (slogan, director, country)
                VALUES (:slogan, :director, :country)";

        $stmt = $pdo->prepare($sql);

        $stmt->bindValue(':slogan', $data['slogan']);
        $stmt->bindValue(':director', $data['director']);
        $stmt->bindValue(':country', $data['country']);

        $stmt->execute();
    }
}

function get_actor_data($html)
{
    $matches = [];

    if (preg_match('/<span itemprop="name">(.*?)<\/span>/u', $html, $matches)) {
        $actor_name = $matches[1];
        list($first_name, $last_name) = explode(' ', $actor_name, 2);
    } else {
        $first_name = $last_name = '';
    }

    return compact('first_name', 'last_name');
}

foreach (scandir($directory) as $filename) {
    if (is_file($directory . '/' . $filename)) {
        $html = file_get_contents($directory . '/' . $filename);
        $film_data = get_film_data($html);
        $actor_data = get_actor_data($html);

        $sql = "INSERT INTO actors (first_name, last_name) VALUES (:first_name, :last_name)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':first_name', $actor_data['first_name']);
        $stmt->bindValue(':last_name', $actor_data['last_name']);
        $stmt->execute();

        // Получение actor_id только что добавленного актера
        $actor_id = $pdo->lastInsertId();

        // Вставка данных о фильме
        $sql = "INSERT INTO films (title, year, director, slogan, country, genre) 
                VALUES (:title, :year, :director, :slogan, :country, :genre)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':title', $film_data['title']);
        $stmt->bindValue(':year', $film_data['year']);
        $stmt->bindValue(':director', $film_data['director']);
        $stmt->bindValue(':slogan', $film_data['slogan']);
        $stmt->bindValue(':country', $film_data['country']);
        $stmt->bindValue(':genre', $film_data['genre']);
        $stmt->execute();

        // Получение film_id только что добавленного фильма
        $film_id = $pdo->lastInsertId();

        // Вставка связи актера с фильмом
        $sql = "INSERT INTO film_actor_relation (film_id, actor_id) VALUES (:film_id, :actor_id)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':film_id', $film_id);
        $stmt->bindValue(':actor_id', $actor_id);
        $stmt->execute();
    }
} 
