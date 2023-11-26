<?php

include './functions.php';
include './db.php';

$pdo = getPDO();
$rests = [];

$stmt = $pdo->prepare("
    SELECT
        *
    FROM
        `categories`
");

$stmt->execute();

$types = $stmt->fetchAll();

foreach ($types as $type) {
    $max = getMaxPage($type['type'], 1);
    for ($i=1; $i<=$max; $i++) {
        $rests = array_merge($rests, getRestsFromPage($type['type'],$i));
    }
}

foreach ($rests as &$rest) {
    foreach ($types as $type) {
        if ($type['type'] == $rest['category']) {
            $id = $type['id'];
        }
    }
    $rest['category'] = $id;
}


$cuisines = [];
foreach ($rests as $rest)  {
    $cuisines = array_merge($cuisines, $rest['cuisine'] ?? []);
}

$cuisines = array_unique($cuisines); /**убирает одинаковые элементы из массива */
print_r($cuisines);

$stmt = $pdo->prepare("TRUNCATE TABLE `cuisines`");
$stmt->execute();

$stmt = $pdo->prepare("
    INSERT INTO
        `cuisines` (
            `name`
        ) VALUES (
            :name
        )
");

foreach ($cuisines as $cuisine) {
    $stmt->execute([
        ':name' => $cuisine, 
    ]);
}

$stmt = $pdo->prepare("TRUNCATE TABLE `rests`");
$stmt->execute();

# II Preparation of request
$stmt = $pdo->prepare("
    INSERT INTO
        `rests` (
            `category`,
            `name`,
            `link`,
            `price_min`,
            `price_max`,
            `options`
        ) VALUES (
            :category,
            :name,
            :link,
            :price_min,
            :price_max,
            :options
        )
");
# III Execution of request
foreach ($rests as $rest) {
    $stmt->execute([
            ':category' => $rest['category'],
            ':name' => $rest['name'],
            ':link' => $rest['link'],
            ':price_min' => $rest['price']['min'],
            ':price_max' => $rest['price']['max'],
            ':options' => isset($rest['options']) ? $rest['options'] : '',
        ]);
}