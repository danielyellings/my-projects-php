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
        print_r($matches[0]);
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

    return compact('slogan', 'director', 'country');
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

error_log(print_r($variable, TRUE));
