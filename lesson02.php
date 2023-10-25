<?php
/*1 zadacha */
echo rand(0, 100);
echo "<br>";
/*2 zadacha */
$a = rand(0, 100);
echo $a;

echo "<br>";
/*3 zadacha */
$random = rand(-100, 100);

if ($random > 0) {
    echo "Positive: " . $random;
} elseif ($random < 0) {
    echo "Negative: " . $random;
} else {
    echo "Zero";
}
echo "<br>";
/*4 ZAdacha */

$a = rand(-100, 100);
$b = rand(-100, 100);
$c = rand(-100, 100);

$max_number = max($a, $b, $c);
echo $max_number . " this is the biggest number" . " between ('$a', '$b', '$c')";