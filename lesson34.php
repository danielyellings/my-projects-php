<?php

function getRestsFromPage($page)
{
    $subject = file_get_contents('https://restoran.kz/restaurant?page=' . $page);
    $pattern = '/<a class="link-inherit-color" href="(.+?)">(.+?)<\/a>/u';
    $result = [];
    
    preg_match_all($pattern, $subject, $result);
    
    $rests = [];
    
    foreach ($result[2] as $i => $name) {
        $rests[] = [
            'name' => $name,
            'link' => $result[1][$i],
        ];
    }
    
    $pattern = '/<li class="d-flex mr-5 mb-3"><svg class="icon icon_md flex-none mr-3" aria-hidden="true"><use xlink:href="(.+?)"><\/use><\/svg>(.+?)<\/li>/u';
    $result = [];
    preg_match_all($pattern, $subject, $result);
    
    foreach ($rests as $i => $rest) {
        $rests[$i]['cuisine'] = $result[2][$i*3];
        $rests[$i]['price'] = $result[2][$i*3+1];
        $rests[$i]['options'] = $result[2][$i*3+2];
    }
    
    return $rests;
}

function getMaxPage($page)
{
    return 2;
    $subject = file_get_contents('https://restoran.kz/restaurant?page=' . $page);
    $pattern = '/<a.+?href="\/restaurant\?page=([0-9]+)">[0-9]+<\/a>/u';
    $result = [];
    preg_match_all($pattern, $subject, $result);
    $max = max($result[1]);
    if ($max <= $page) {
        return $page;
    } else {
        return getMaxPage($max);
    }
}

$max = getMaxPage(1);
$rests = [];
for ($i=1; $i<=$max; $i++) {
    $rests = array_merge($rests, getRestsFromPage($i));
}

$host = '127.0.0.1';
$db   = 'db_rests';
$user = 'root';
$pass = '';
$charset = 'utf8';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$opt = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];
$pdo = new PDO($dsn, $user, $pass, $opt);
