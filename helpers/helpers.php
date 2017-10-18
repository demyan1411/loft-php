<?php

function get_error($text = 'OOPS, something went wrong...')
{
    echo $text;
    return false;
}

function is_operator($operator)
{
    return in_array($operator, ['+', '-', '*', '/']);
}

function count_task($numbers, $operator)
{
    if (!is_operator($operator))
        return get_error();

    $result = $numbers[0];
    foreach ($numbers as $num) {
        if (!is_numeric($num)) return get_error();
        if ($num === $numbers[0]) continue;

        $result = eval("return $result $operator $num;");
    }

    return $result;
}

function create_table($a, $b)
{
    $table = '<table border="1">';

    for ($tr = 1; $tr <= $a; $tr++) {
        $table .= '<tr>';

        for ($td = 1; $td <= $b; $td++) {
            $table .= '<td>' . $tr * $td . '</td>';
        }

        $table .= '</tr>';
    }

    $table .= '</table>';

    return $table;
}

function utf8_strrev($str)
{
    preg_match_all('/./us', $str, $ar);
    return join('', array_reverse($ar[0]));
}

function set_smile()
{
    echo '<pre>' ,
        '
                           nnnmmm
            \||\       ;;;;%%%@@@@@@       \ //,
             V|/     %;;%%%%%@@@@@@@@@@  ===Y//
             68=== ;;;;%%%%%%@@@@@@@@@@@@    @Y
             ;Y   ;;%;%%%%%%@@@@@@@@@@@@@@    Y
             ;Y  ;;;+;%%%%%%@@@@@@@@@@@@@@@    Y
             ;Y__;;;+;%%%%%%@@@@@@@@@@@@@@i;;__Y
            iiY"";;   "uu%@@@@@@@@@@uu"   @"";;;>
                   Y     "UUUUUUUUU"     @@
                   `;       ___ _       @
                     `;.  ,====\\=.  .;\'
                       ``""""`==\\==\'
                              `;=====
                                ===
    
        ' ,
        '</pre>';

    return false;
}

function open_file($file)
{
    if (!file_exists($file))
        return get_error();

    return file_get_contents($file, true);
}