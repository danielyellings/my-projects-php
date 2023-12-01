<?php

include "./db.php";
# I - Connection
$pdo = getPDO();

# II - Preparation
/** *-этот символ означает передачу всех параметров без перечисления */
$stmt = $pdo->prepare("
    SELECT
        `rests`.*,
        `categories`.`label` AS `category`,
        `rests_cuisines`.`id_rest`,
        `rests_cuisines`.`id_cuisine`,
        `cuisines`.`name` AS `cuisine-name`
    FROM
        `rests`
    LEFT JOIN
        `categories`
        ON `rests`.`category` = `categories`.`id`
    LEFT JOIN
        `rests_cuisines`
        ON `rests`.`id` = `rests_cuisines`.`id_rest`
    LEFT JOIN
        `cuisines`
        ON `rests_cuisines`.`id_cuisine` = `cuisines`.`id`
");

# III - Execution
$stmt->execute([
]);

$rests = $stmt->fetchAll();
$stmt = $pdo->prepare("SELECT * FROM `categories`");
$stmt->execute();
$categories = $stmt->fetchAll();

print_r($rests);