<?php

$weight = rand(1, 10000000);

if ($weight > 1000000) {
   echo $weight/1000000 + "tones";
} elseif ($weight > 100000) {
    echo $weight/100000 + "centners";
} elseif ($weight > 1000) {
    echo $weight/1000 + "kilos";
} else {
    echo $weight;
}

echo $weight;
