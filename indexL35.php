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
");

# III - Execution
$stmt->execute();
var_dump($stmt->fetchAll());