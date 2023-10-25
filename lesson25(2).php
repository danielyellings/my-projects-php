<?php
$subject = file_get_contents('https://restoran.kz/restaurant');
$pattern = '/<div class="mb-5">/u';
$blocks = preg_split($pattern, $subject);
unset($blocks[0]);

$rests = [];
foreach ($blocks as $block) {
    $pattern = '/<a class="link-inherit-color" href="(.+?)">(.+?)<\/a>/u';
    $result = [];
    preg_match_all($pattern, $block, $result);

    $rest = [
        'name' => $result[2][0],
        'link' => $result[1][0],
    ];
    $pattern = '/<li class="d-flex mr-5 mb-3"><svg class="icon icon_md flex-none mr-3" aria-hidden="true"><use xlink:href="(.+?)"><\/use><\/svg>(.+?)<\/li>/u';
    $result = [];
    preg_match_all($pattern, $block, $result);

    $paramsMap = [
        '#icon-plate' => 'cuisine',
        '#icon-kz-tenge-in-circle' => 'price',
        '#icon-lightning-in-circle' => 'options',
    ];

    foreach ($paramsMap as $k => $v) {
        $index = array_search($k, $result[1]);
        if ($index !== false) {
            $rest[$v] = $result[2][$index];
        }
    }
    $rests[] = $rest;
}

print_r($rests);

die();

$pattern = '/<a class="link-inherit-color" href="(.+?)">(.+?)<\/a>/u';
$result = [];

preg_match_all($pattern, $subject, $result);
print_r($result);

$rests = [];

foreach ($result[2] as $i => $name) {
    $rests[] = [
        'name' => $name,
        'link' => $result[1][$i],
    ];
}
print_r($rests);


$result = [];
preg_match_all($pattern, $subject, $result);
print_r($result[2]);

foreach ($rests as $i => $rest) {
    $rests[$i]['cuisine'] = $result[2][$i*3];
    $rests[$i]['price'] = $result[2][$i*3+1];
    $rests[$i]['options'] = $result[2][$i*3+2];
}
print_r($rests);








