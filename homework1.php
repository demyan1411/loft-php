<?php

// Задание #1
$name = 'Demyan';
$age = 26;
echo "My name is $name. <br>";
echo "I'm $age years all. <br>";
echo '" ! | \\ / \' " \\ <br><br>';


// Задание #2
echo 'Дана задача: На школьной выставке 80 рисунков. <br>
      23 из них выполнены фломастерами, 40 карандашами, а остальные — красками. <br>
      Сколько рисунков, выполненные красками, на школьной выставке? <br><br>';
$all_pictures = 80;
$felt_pen_pictures = 23;
$pencil_pictures = 40;
$paints_pictures = $all_pictures - $felt_pen_pictures - $pencil_pictures;
echo "Решение: $all_pictures - $felt_pen_pictures - $pencil_pictures = $paints_pictures. <br>";
echo "Ответ: красками, на школьной выставке выполнено - $paints_pictures. <br><br>";


// Задание #3
define('PI', 3.14, true);
if (defined('PI') === true) {
    echo 'PI - ' . PI . '<br><br>';
}
//PI = 'qwwe';


// Задание #4
function is_work($age = NULL) {
    if (!is_int($age) || $age > 100 || $age < 0) {
        $answer = 'Неизвестный возраст';
    } elseif ($age > 65) {
        $answer = 'Вам пора на пенсию';
    } elseif ($age >= 18) {
        $answer = 'Вам еще работать и работать';
    } else {
        $answer = 'Вам ещё рано работать';
    }

    return 'Возраст ' . $age . ' - ' . $answer . '<br><br>';
}

$age = rand(1, 100);
echo is_work($age);


// Задание #5
function what_day($day) {
    switch ($day) {
        case 1:
        case 2:
        case 3:
        case 4:
        case 5:
            $result = $day . ' Это рабочий день';
            break;
        case 6:
        case 7:
            $result = $day . ' Это выходной день';
            break;
        default:
            $result = $day . ' Неизвестный день';
    }

    return 'День ' . $result . '<br><br>';
}

$day = rand(0, 8);
echo what_day($day);


// Задание #6
$bmw = array(
    'model' => 'X5',
    'speed' => 120,
    'doors' => 5,
    'year'  => '2015'
);

$toyota = array(
    'model' => 'RAV4',
    'speed' => 180,
    'doors' => 4,
    'year'  => '2010'
);

$opel = array(
    'model' => 'MOKKA',
    'speed' => 160,
    'doors' => 3,
    'year'  => '2017'
);

$cars = array('bmv' => $bmw, 'toyota' => $toyota, 'opel' => $opel);
foreach ($cars as $car => $features) {
    echo "CAR $car <br>";
    foreach ($features as $feature => $value) {
        echo $value . ' ';
    }
    echo '<br>';
}
echo '<br>';


// Задание #7
$table = '<table border="1">';

for ($tr = 1; $tr <= 10; $tr++) {
    $table .= '<tr>';

    for ($td = 1; $td <= 10; $td++) {
        $table .= '<td>';
        if (($tr % 2) === 0 && ($td % 2) === 0) {
            $table .= '(' . $tr * $td . ')';
        } elseif (($tr % 2) !== 0 && ($td % 2) !== 0) {
            $table .= '[' . $tr * $td . ']';
        } else {
            $table .= $tr * $td;
        }
        $table .= '</td>';
    }

    $table .= '</tr>';
}

$table .= '</table>';
echo $table . '<br><br>';


// Задание #8
$str = 'qwe asd zxc';
echo "$str <br>";
$arr = explode(" ", $str);
print_r($arr);
echo '<br>';

$count = count($arr) - 1;
$i = 0;
while ($i <= $count / 2) {

    //  Это видимо правильный вариант
    //    $el = $arr[$i];
    //    $arr[$i] = $arr[$count - $i];
    //    $arr[$count - $i] = $el;

    // Но мне больше, тогда уж, понравился такой =)
    list($arr[$i], $arr[$count - $i]) = array($arr[$count - $i], $arr[$i]);

    $i++;
}
echo implode('|', $arr);

//$reversed = array_reverse($arr); // так было бы проще =)

//$new_arr = array();
//$i = count($arr) - 1;
//while ($i >= 0) {
////    array_push($new_arr, $arr[$i]);
////    echo $arr[$i];
////    if ($i !== 0) echo '|';
//
//    $i--;
//}
//echo '<br>';
//echo implode('|', $new_arr);



