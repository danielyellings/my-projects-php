<?php

include './functions.php';

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

# I Connection to DB
$pdo = new PDO($dsn, $user, $pass, $opt);

$stmt = $pdo->prepare("TRUNCATE TABLE `db_rests`.`rests`");

# II Preparation of request
$stmt = $pdo->prepare("
    INSERT INTO
        `rests` (
            `name`,
            `link`,
            `cuisine`,
            `price`,
            `options`
        ) VALUES (
            :name,
            :link,
            :cuisine,
            :price,
            :options
        )
");
# III Execution of request
print_r($rests);
foreach ($rests as $rest) {
    $stmt->execute([
            ':name' => $rest['name'],
            ':link' => $rest['link'],
            ':cuisine' => isset($rest['cuisine']) ?? '',
            ':price' => isset($rest['price']) ?? '',
            ':options' => isset($rest['options']) ? $rest['options'] : '',
        ]);
}