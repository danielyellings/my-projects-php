<?php

$a = 5;
$b = 4;
$c = $a + $b;
$b = $b + 1;
#$c = $c - 1;
# AND: &&
# OR : ||

if ($c < 9 || $b > 4) {
    echo 'Yahoo!';
} else {
    echo 'Noooo!';
}

#echo $c;
/*
    $i = 0;
    A:
    if ($i < 10) {
        echo $i;
        $i = $i + 1;
        goto A;
    }
*/
echo '<br>';

for ($i = 0; $i < 10; $i = $i + 1) {
    echo $i;
}

echo 'End';