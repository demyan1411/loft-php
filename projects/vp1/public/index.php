<?php

namespace Pug;

//require_once '../../../vendor/autoload.php';
//error_reporting(E_ALL);
//ini_set('display_errors', 1);

require 'bootstrap.php';
//
$app->action('admin', function () {
//    echo 'admin';
});

$app->action('qwe', function () {
//    echo 'admin';
});


//print_r(isset($_SERVER['PATH_INFO']) ? $_SERVER['PATH_INFO'] :
//    (isset($argv, $argv[1]) ? $argv[1] : ''));

//echo 'asdsd';

//'2017/10/19 02:20:31 [error] 5772#2160: *1
//"e:/openserver/domains/php/projects/vp1/public/admin/index.php" is not found
//(3: The system cannot find the path specified), client: 127.0.0.1, server: vp1, request: "GET /admin/ HTTP/1.1", host: "vp1"'

//require_once '../../../helpers/helpers.php';

//print_r($_SERVER['PATH_INFO']);
//
if (isset($_SERVER['PATH_INFO'])) echo $_SERVER['PATH_INFO'];

//$content = open_file('pages/index.html');
////
//echo $content;

//mysql_connect();
//$pug = new Pug(array(
//    'pretty' => true,
//    'cache' => 'pathto/writable/cachefolder/'
//));
//
//$data = [
//    'items' => [
//        [
//            'route' => 'login',
//            'name' => 'The Login page example'
//        ],
//        [
//            'route' => 'cities',
//            'name' => 'The City API search example'
//        ]
//    ]
//];
//
//
//$pug = new Pug([
//    'cache' => '../cached'
//]);
//
//$output = $pug->render('pages/index.pug', $data);
//
//echo $output;
