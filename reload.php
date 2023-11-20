<?php

include './functions.php';
include './db.php';

$pdo = getPDO();

$max = getMaxPage(1);
$rests = [];
for ($i=1; $i<=$max; $i++) {
    $rests = array_merge($rests, getRestsFromPage($i));
}

print_r($rests);

$stmt = $pdo->prepare("TRUNCATE TABLE `db_rests`.`rests`");

# II Preparation of request
$stmt = $pdo->prepare("
    INSERT INTO
        `rests` (
            `name`,
            `link`,
            `price_min`,
            `price_max`,
            `cuisine`,
            `options`
        ) VALUES (
            :name,
            :link,
            :price_min,
            :price_max,
            :cuisine,
            :options
        )
");
# III Execution of request
foreach ($rests as $rest) {
    $stmt->execute([
            ':name' => $rest['name'],
            ':link' => $rest['link'],
            ':cuisine' => isset($rest['cuisine']) ? $rest['cuisine'] : '',
            ':price_min' => $rest['price']['min'],
            ':price_max' => $rest['price']['max'],
            ':options' => isset($rest['options']) ? $rest['options'] : '',
        ]);
}