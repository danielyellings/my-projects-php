<?php

// $arr = [
//     'hll' => 'Hello',
//     'World',
// ];
// $i = 0;
// foreach ($arr as $key => $value) {
//     echo $key . ' => ' . $value . '<br>';
//     $i++;
// }

// echo "Number of iteration: " . $i;


function getMembers($file) 
{
    $desc = file_get_contents($file);
    $pattern = '/<span itemprop="name">(.+?)<\/span>/u';
    $matches = [];
    
    preg_match_all($pattern, $desc, $matches);
    return $matches[1];
}

$dir = './films/';
$files = scandir($dir);
$names = [];
foreach ($files as $file) {
    if ($file == '.' || $file == '..') {
        continue;
    }
    $members = getMembers($dir . $file);
    foreach ($members as $member) {
        if (! isset($names[$member])) {
            $names[$member] = 0;
        }
        $names[$member] += 1;
    }
}

print_r($names);