<?php

function task1($arr, $isReturn = false) {
    $result = '';
    foreach ($arr as $str) {
        echo "<p>$str</p>";
        $result .= "<p>$str</p>";
    }

    if ($isReturn) return $result;
}

$task1 = array('qwe', 'asd', 'zxc');
//$task1_result = task1($task1, true);
//var_dump($task1_result);

function task2($arr, $operator) {
    $result = 0;
    foreach ($arr as $num) {
        $result = eval("return $result $operator $num;");
    }

    echo $result;
}

$task2 = array(1, 2, 3, 4);
task2($task2, 'qwe');



//echo 123
