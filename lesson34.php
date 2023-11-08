<?php

function getRestsFromPage($page)
{
    $subject = file_get_contents('https://restoran.kz/restaurant?page=' . $page);
    $pattern = '/<a class="link-inherit-color" href="(.+?)">(.+?)<\/a>/u';
    $result = [];
    
    preg_match_all($pattern, $subject, $result);
    
    $rests = [];
    
    foreach ($result[2] as $i => $name) {
        $rests[] = [
            'name' => $name,
            'link' => $result[1][$i],
        ];
    }
    
    $pattern = '/<li class="d-flex mr-5 mb-3"><svg class="icon icon_md flex-none mr-3" aria-hidden="true"><use xlink:href="(.+?)"><\/use><\/svg>(.+?)<\/li>/u';
    $result = [];
    preg_match_all($pattern, $subject, $result);
    
    foreach ($rests as $i => $rest) {
        $rests[$i]['cuisine'] = $result[2][$i*3];
        $rests[$i]['price'] = $result[2][$i*3+1];
        $rests[$i]['options'] = $result[2][$i*3+2];
    }
    
    return $rests;
}

function getMaxPage($page)
{
    $subject = file_get_contents('https://restoran.kz/restaurant?page=' . $page);
    $pattern = '/<a.+?href="\/restaurant\?page=([0-9]+)">[0-9]+<\/a>/u';
    $result = [];
    preg_match_all($pattern, $subject, $result);
    return max($result[1]);
}

echo getMaxPage(7);


//print_r(getRestsFromPage(10));
