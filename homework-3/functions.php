<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

function task1($file)
{
    if (file_exists($file)) {
        $xml = simplexml_load_file($file);
    }

    $str = '';

    $date = new DateTime($xml['OrderDate']);
    $str .= '<h1>Order number - ' . $xml['PurchaseOrderNumber'] . ' from ' . $date->format('d.m.Y') . '</h1>';

    foreach ($xml->Address as $address) {
        $str .= '<h3>' . $address['Type'] . ' Address </h3>';
        $str .= sprintf('
                <p>
                    Name - %s <br>
                    Address - %s, %s, %s, %s <br>
                    Zip - %s <br>

                </p>',

            $address->Name,
            $address->Country,
            $address->State,
            $address->City,
            $address->Street,
            $address->Zip
        );
    }

    $str .= '<h3>Items</h3>';

    foreach ($xml->Items->Item as $item) {
        $str .= sprintf('
                <p>
                    Part number - %s <br>
                    Product name - %s <br>
                    Quantity - %d <br>
                    Price - %s <br>
                ',
            $item['PartNumber'],
            $item->ProductName,
            $item->Quantity,
            number_format((float) $item->USPrice, 2)
        );

        if ($item->Comment) $str .= 'Comment - ' . $item->Comment;
        if ($item->ShipDate) {
            $date = new DateTime($item->ShipDate);
            $str .= 'Ship Date - ' . $date->format('d.m.Y');
        }

        $str .= '</p>';
    }

    $str .= '<h3>Delivery Notes</h3>' . '<p>' . $xml->DeliveryNotes . '</p>';

    echo $str;
}

function task2()
{
    $arr = [
        'qwe' => ['q', 'w', 'e'],
        'asd' => [
            'a',
            's',
            'd' => [1, 2, 3]
        ],
        'zxc'
    ];

//    $arr2 = [
//        'qwe' => 'QWQWEQWE',
//        'asd' => [
//            's',
//            's',
//            'd' => [1, 2, 4]
//        ],
//        'zxc'
//    ];

    file_put_contents('output.json', json_encode($arr));
    $new_arr = json_decode(file_get_contents('output.json', true), true);

    if (rand(1, 1)) {
        $new_arr = [
            'qwe' => 'QWEQWE',
            'asd' => [
                's',
                's',
                'd' => [1, 2, 4]
            ],
            'zxc'
        ];
    }

    file_put_contents('output2.json', json_encode($new_arr));

    $output1 = json_decode(file_get_contents('output.json', true), true);
    $output2 = json_decode(file_get_contents('output2.json', true), true);

    echo '<pre>';
    $diff = array_recursive_diff($output1, $output2);

//    $diff = array_diff(array_map('json_encode', $output1), array_map('json_encode', $output2));
//    $diff = array_map('json_decode', $diff);

    print_r($diff);
}

function array_recursive_diff($arr1, $arr2) {
    $result = [];

    foreach ($arr1 as $key => $val) {
        if (is_array($arr2) && array_key_exists($key, $arr2)) {

            if (is_array($val)) {

                $recursive_diff = array_recursive_diff($val, $arr2[$key]);

                if (count($recursive_diff)) {
                    $result[$key] = $recursive_diff;
                }

            } else {

                if ($val != $arr2[$key]){
                    $result[$key] = $val;
                }
            }

        } else {
            $result[$key] = $val;
        }
    }

    return $result;
}

function task3()
{
    $arr = [];
    for($i = 1; $i <= 50; $i++) {
        array_push($arr, rand(1, 100));
    }

    $fp = fopen('csv.csv', 'w');
    fputcsv($fp, $arr);
    fclose($fp);

    $fp = fopen('csv.csv', 'r');
    $csv = fgetcsv($fp);
    fclose($fp);

    echo array_reduce($csv, function($carry, $item) {
        return ($item % 2) === 0 ? $carry += $item : $carry;
    },0);
}

function task4()
{
    $url = 'https://en.wikipedia.org/w/api.php?action=query&titles=Main%20Page&prop=revisions&rvprop=content&format=json';
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_URL, $url);

    $result = curl_exec($ch);

    curl_close($ch);

    $json_array = json_decode($result, true);

    array_walk_recursive($json_array, function($item, $key) {
        if ($key === 'pageid') echo "$key - $item <br>";
        if ($key === 'title') echo "$key - $item <br>";
    });
}