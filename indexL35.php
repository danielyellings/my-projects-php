<?php

include "./db.php";
# I - Connection
$pdo = getPDO();

# II - Preparation
/** *-этот символ означает передачу всех параметров без перечисления */
$stmt = $pdo->prepare("
    SELECT
        *
    FROM
        `rests`
    WHERE
        (`price_min`+`price_max`)/2 > :min
        AND (`price_min`+`price_max`)/2 < :max
");

# III - Execution
$stmt->execute([
    ':min' => 10000,
    ':max' => 20000
]);
print_r($stmt->fetchAll());