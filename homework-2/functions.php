<?php

function task1($arr, $isReturn = false)
{
    $result = '';
    foreach ($arr as $str) {
        echo "<p>$str</p>";
        $result .= "<p>$str</p>";
    }

    if ($isReturn) return $result;
}

function task2($numbers, $operator)
{
    echo count_task($numbers, $operator);
}

function task3(...$args)
{
    $operator = $args[0];
    $numbers = array_slice($args, 1);

    echo count_task($numbers, $operator);
}

function task4($a, $b)
{
    if (!is_int($a) || !is_int($b))
        return get_error('You must pass the integers');

    echo create_table($a, $b);
}

function is_palindrom($str)
{
    if (!is_string($str))
        return get_error("$str - not a string");

    $str = str_replace(' ', '', mb_strtolower($str));
    $new_str = utf8_strrev($str);

    return $str === $new_str ? true : false;
}

function task5 ($str) {
    if (is_palindrom($str))
        echo "$str – строка, одинаково читающаяся в обоих направлениях.";
}

function task6()
{
    echo date('d.m.Y H:i'), '<br>';
    $date = new DateTime('24.02.2016 00:00:00');
    echo $date->getTimestamp();
}

function task7()
{
    echo str_replace('К', '',  'Карл у Клары украл Кораллы'), '<br>';
    echo str_replace('Две', 'Три', 'Две бутылки лимонада');
}

function task8($str)
{
    $regular = '/RX packets:(\d+)|:\)/i';
    preg_match_all($regular, $str, $matches);
    if (in_array(':)', $matches[0])) return set_smile();

    $packets = array_filter($matches[1], function($param) {
        return !empty($param);
    });

    $result = 'Сети нет';
    if ($packets[0] > 1000) $result = 'Сеть есть';

    return $result;
}

function task9($file)
{
    if (!file_exists($file))
        return get_error("$file - не существует");

    return file_get_contents($file, true);
}

function task10($path, $data)
{
    file_put_contents($path, $data);
}