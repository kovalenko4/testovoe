<?php
/**
 * Created by PhpStorm.
 * User: Pashulya
 * Date: 22.11.2017
 * Time: 19:43
 */

function prepareString($str) {
    $matches = [];
    //https://regex101.com/ - тут я получал паттерн, для регулярки
    preg_match_all('/\{((?>[^{}]+)|(?R))*\}/uU', $str, $matches);
    $i = 1;
    echo "matches array\n";
    print_r($matches);

    foreach ($matches[0] as $match) {
        echo "match: $match\n";
        echo "iteration #$i\n";
        $placeholderLength = strlen($match);
        echo "placeholderLength: $placeholderLength\n";
        $placeholderPosition = strpos($str, $match);
        echo "placeholderPosition: $placeholderPosition\n";

        $placeholder = substr($match, 1, strlen($match) - 2);
        echo "placeholder: $placeholder\n";

        $replacer = '';
        if (strpos($placeholder, '{')) {
            echo "if in $i iteration\n";
            $placeholder = prepareString($placeholder);
        }

        $options = explode('|', $placeholder);
        echo "array options: \n";
        print_r($options);
        echo "\n";
        $replacer = $options[array_rand($options)];
        echo "replacer: $replacer\n";


        $str = substr_replace($str, $replacer, $placeholderPosition, $placeholderLength);
        echo "$str in $i iteration\n";

        $i++;
    }

    return $str;
}
$mainString = '{Пожалуйста|Просто} сделайте так, чтобы это {удивительное|крутое|простое} тестовое предложение {изменялось 
{быстро|мгновенно} случайным образом|менялось каждый раз}.';
$preparedString = prepareString($mainString);

echo $preparedString;