<?php

namespace Pug;

require_once '../../vendor/autoload.php';

require_once '../connect.php';
require_once '../submit.php';
require_once '../admin.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);

$uri = str_replace('/', '', $_SERVER['REQUEST_URI']);

if ($uri === '') open_view('index');

if ($uri === 'admin') {
    $data = get_admin_data();
    open_view($uri, $data);
}

if ($uri == 'submit') {
    submit_form();
}

function open_view($uri, $data = [])
{
    $pug = new Pug(['cache' => '../../cached']);
    $output = $pug->render("views/$uri.pug", $data);
    echo $output;
}
