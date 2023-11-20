<?php

include './functions.php';
include './db.php';

$pdo = getPDO();
$rests = [];
$types = [
    [
        'type' => 'restaurant',
        'label' => 'Рестораны',
    ],
    [
        'type' => 'pub',
        'label' => 'Пабы, бары',
    ],
    [
        'type' => 'cafe',
        'label' => 'Кафе',
    ],
];

foreach ($types as $type) {
    $max = getMaxPage($type['type'], 1);
    for ($i=1; $i<=$max; $i++) {
        $rests = array_merge($rests, getRestsFromPage($type['type'],$i));
    }
}

foreach ($rests as &$rest) {
    foreach ($types as $type) {
        if ($type['type'] == $rest['category']) {
            $label = $type['label'];
        }
    }
    $rest['category'] = $label;
}

print_r($rests);

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
            `cuisine`,
            `options`
        ) VALUES (
            :category,
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
            ':category' => $rest['category'],
            ':name' => $rest['name'],
            ':link' => $rest['link'],
            ':cuisine' => isset($rest['cuisine']) ? $rest['cuisine'] : '',
            ':price_min' => $rest['price']['min'],
            ':price_max' => $rest['price']['max'],
            ':options' => isset($rest['options']) ? $rest['options'] : '',
        ]);
}