<?php

include "./db.php";
# I - Connection
$pdo = getPDO();

# II - Preparation
/** *-этот символ означает передачу всех параметров без перечисления */
$stmt = $pdo->prepare("
    SELECT
        `rests`.*,
        `categories`.`label` AS `category`
    FROM
        `rests`
    LEFT JOIN
        `categories`
        ON `rests`.`category` = `categories`.`id`
    WHERE
        (`price_min`+`price_max`)/2 > :min
        AND (`price_min`+`price_max`)/2 < :max
");

# III - Execution
$stmt->execute([
    ':min' => 10000,
    ':max' => 20000
]);

$rests = $stmt->fetchAll();
$stmt = $pdo->prepare("SELECT * FROM `categories`");
$stmt->execute();
$categories = $stmt->fetchAll();

print_r($rests);