<?php

/*1. Написать функцию getAbc, возвращающую  алфавит английских символов  в виде строки. 
'abcdefghijklmnopqrstuvwxyz'*/

function getAbc()
{
    return 'abcdefghijklmnopqrstuvwxyz';
}

/*2. Написать функцию getArrayOfStrings, возвращающую массив из заданного количества элементов, каждый из которых является набором из случайных симоволов латинского алфавита произвольной длины.*/
function getRandomString($length = null)
{
    if($length == null) {
        $length = rand(5, 10);
    }
    $abc = getAbc();
    $string = '';
    for ($i=0; $i<$length; $i++) {
        $random = rand(0, mb_strlen($abc) - 1);
        $string = $string . mb_substr($abc, $random, 1);
    }
    return $string;
}

function getArrayOfStrings($num)
{
    $result = [];
    for ($i=0; $i<$num; $i++) {
        $result[] = getRandomString();
    }
    return $result;
}

// var_dump (getArrayOfStrings(8));

/*Написать функцию transformToUpperCase, которая принимает на вход строку и набор символов, которые необходимо преобразовать в верхний регистр.
К примеру:
    echo transformToUpperCase(
        'helloworld',
        'hw'
    ); # HelloWorld */

// $str = 'helloworld';
// $search = 'hw';
function transformToUpperCase($str, $search)
{
    for ($j=0; $j<mb_strlen($search); $j++) {
        $symbol = mb_substr($search, $j, 1);
        for($i=0; $i<mb_strlen($str); $i++) {
            $partOne = mb_substr($str, 0, $i);
            $partTwo = mb_substr($str, $i, 1);
            $partThree = mb_substr($str, $i+1);
            if ($partTwo == $symbol) {
                $partTwo = mb_strtoupper($partTwo);
            }
            $str = $partOne . $partTwo . $partThree;
        }
    }
    return $str;
}

// echo transformToUpperCase(
//     'helloworld',
//     'hw'
// );

/*Условие задачи:

Написать функцию transformToUpperCase, которая принимает на вход строку и набор символов, которые необходимо преобразовать в верхний регистр.
К примеру:
echo transformToUpperCase('helloworld', 'hw'); # HelloWorld */


function transformToUpperCase2($str, $search)
{
    for ($i=0; $i<mb_strlen($search); $i++) {
        $symbol = mb_substr($search, $i, 1);
        $pos = mb_strpos($str, $symbol);
    
        while ($pos !== false) {
            $partOne = mb_substr($str, 0, $pos);
            $partTwo = mb_substr($str, $pos, 1);
            $partThree = mb_substr($str, $pos+1);
    
            if($partTwo == $symbol) {
                $partTwo = mb_strtoupper($partTwo);
            }
            $str = $partOne . $partTwo . $partThree;
            $pos = mb_strpos($str, $symbol, $pos+1);
        }
    }
    
    return $str;
}

// echo transformToUpperCase(
//         'helloworld',
//         'ed'
//     );

/*Написать функцию findAndPaste, которая принимает на вход строку $str, набор искомых символов $search и строку вставки $paste. Данная функция делает вставку строки $paste перед каждым найденным символом строки $search в строке $str и возвращает ее.
К примеру: 
echo findAndPaste(‘helloworld’, ‘hw’, ‘!’); # - !hello!world */

function findAndPaste($str, $search, $paste)
{
    for ($i=0; $i<mb_strlen($str); $i++) {
        for ($j=0; $j<mb_strlen($search); $j++) {
            $searchSymbol = mb_substr($search, $j, 1);
            $partOne = mb_substr($str, 0, $i);
            $partTwo = mb_substr($str, $i, 1);
            $partThree = mb_substr($str, $i+1);
        
            if ($partTwo == $searchSymbol) {
                $partTwo = $paste . $partTwo;
                $i = $i + mb_strlen($paste);
            }
        
           $str = $partOne . $partTwo . $partThree;
        }
    }
    return $str;
}
 
echo findAndPaste('helloworld', 'hw', '!');