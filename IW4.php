<?php
/*Задача 1. Случайная строка.
Собрать строку из 10 случайных символов английского алфавита. Вывести на экран эту строку таким образом, чтобы все символы с четным порядковым номером (алфавитного порядка) были выделены жирным. */
// $alphabet = range ('a', 'z');
// $result = '';

// for ($i = 0; $i < 10; $i++) {
//     $randomIndex = rand(0, 25);
//     $result .= $alphabet[$randomIndex];
// }

// echo '<html><head><style>span.bold { font-weight: bold; }</style></head><body>';

// for ($i = 0; $i < strlen($result); $i++) {
//     if ($i % 2 == 0) {
//         echo '<span class="bold">' . $result[$i] . '</span>';
//     } else {
//         echo $result[$i];
//     }
// }

// echo '</body></html>';

/*Задача 2. Учим английский алфавит.
Собрать строку из 10 случайных символов латинского алфавита. Вывести на экран эту строку таким образом, чтобы все гласные были в верхнем регистре, а все согласные выделены курсивом. Обратите внимание на букву Y.
*/

// $alphabet = range('a', 'z');
// $result = '';

// for ($i = 0; $i < 10; $i++) {
//     $randIndex = rand(0, 25);
//     $result .= $alphabet[$randIndex];
// }

// echo '<html><head><style>span.italic { font-style: italic; }</style></head><body>';

// for ($i = 0; $i < strlen($result); $i++) {
//     $currentLetter = $result[$i];
//     $isVowel = in_array($currentLetter, ['a', 'e', 'i', 'o', 'u']);
//     if ($isVowel) {
//         echo '<span style="text-transform:uppercase;">' . $currentLetter . '</span>';
//     } else {
//         echo '<span class="italic">' . $currentLetter . '</span>';
//     }
// }

// echo '</body></html>';

/*Задача 3. Транслитерация.
Реализуйте функцию (translit), которая переводит все символы русского алфавита входящей строки в символы английского алфавита и возвращает её.*/

// function translit($inputString) 
// {
//     $transliteration = [
//         'а' => 'a', 'б' => 'b', 'в' => 'v', 'г' => 'g', 'д' => 'd',
//         'е' => 'e', 'ё' => 'yo', 'ж' => 'zh', 'з' => 'z', 'и' => 'i',
//         'й' => 'y', 'к' => 'k', 'л' => 'l', 'м' => 'm', 'н' => 'n',
//         'о' => 'o', 'п' => 'p', 'р' => 'r', 'с' => 's', 'т' => 't',
//         'у' => 'u', 'ф' => 'f', 'х' => 'kh', 'ц' => 'ts', 'ч' => 'ch',
//         'ш' => 'sh', 'щ' => 'shch', 'ъ' => '', 'ы' => 'y', 'ь' => '',
//         'э' => 'e', 'ю' => 'yu', 'я' => 'ya'
//     ];

//     $outputString = '';
//     for ($i=0; $i<mb_strlen($inputString, 'UTF-8'); $i++) {
//         $currentLetter = mb_substr($inputString, $i, 1, 'UTF-8');
//         $lowerCaseLetter = mb_strtolower($currentLetter, 'UTF-8');

//         if (isset($transliteration[$lowerCaseLetter])) {
//             $outputString .= mb_strtoupper($transliteration[$lowerCaseLetter], 'UTF-8');
//         } else {
//             $outputString .= $currentLetter;
//         }
//     }

//     return $outputString;
// }

// $inputString = 'Вышел заяц на крыльцо, почесать своё яйцо';
// $transliterationString = translit($inputString);
// echo $transliterationString;

/*Задача 4. Хитрое декодирование.
Дано 10-значное случайное число, необходимо преобразовать данное число в строку по следующему сценарию: сначала подбирается соответствующий символ из английского алфавита под двузначный номер, если такое возможно, иначе под однозначный номер. 
В качестве примера рассмотрим шестизначное число:
132722 = 13(n) - 2(c) - 7(h) - 22(w) = nchw */

$number = 8187673120;
$englishAlphabet = 'abcdefghijklmnopqrstuvwxyz';

$numberString = strval($number);
$result = '';
for ($i=0; $i<strlen($numberString); $i++) {
    $currentDigit = intval($numberString[$i]);
    if ($currentDigit > 0 && $currentDigit <= 26) {
        $result .= $englishAlphabet[$currentDigit - 1];
    }
}

echo $result;
