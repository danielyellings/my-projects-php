<?php

include './functions.php';
include './db.php';

$pdo = getPDO();

$max = getMaxPage(1);
$rests = [];
for ($i=1; $i<=$max; $i++) {
    $rests = array_merge($rests, getRestsFromPage($i));
}

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
foreach ($rests as $rest) {
    $stmt->execute([
            ':name' => $rest['name'],
            ':link' => $rest['link'],
            ':cuisine' => isset($rest['cuisine']) ? $rest['cuisine'] : '',
            ':price' => isset($rest['price']) ? $rest['price'] : '',
            ':options' => isset($rest['options']) ? $rest['options'] : '',
        ]);
}