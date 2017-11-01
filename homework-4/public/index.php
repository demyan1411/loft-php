<?php

namespace Pug;

require_once '../../vendor/autoload.php';

require_once '../connect.php';
require_once '../helpers.php';
require_once '../session.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);

$uri = str_replace('/', '', $_SERVER['REQUEST_URI']);

///////////// API /////////////////

if($uri === 'registration') {
    require_once '../register.php';
    registration_user();
    die();
}

if($uri === 'login') {
    require_once '../login.php';
    login_user();
    die();
}

if($uri === 'logout') {
    require_once '../logout.php';
    logout();
    die();
}

if($uri === 'update-profile') {
    require_once '../profile.php';
    update_profile();
    die();
}

if($uri === 'delete-user') {
    require_once '../list.php';
    delete_user();
    die();
}

if($uri === 'delete-photo') {
    require_once '../photos.php';
    delete_photo();
    die();
}


///////////// Web routing /////////

start_session();
$is_session = is_session();

if ($_SESSION && $_SESSION['time'] && time() - $_SESSION['time'] >= 1800)
    header('Location: /logout', true, 303);

if ($_SESSION && $_SESSION['time'])
    $_SESSION['time'] = time();


if ($uri === '') {
    if ($is_session)
        header('Location: /list', true, 303);

    open_view('index');
}

if ($uri === 'reg') {
    if ($is_session)
        header('Location: /list', true, 303);

    open_view('reg');
}

if ($uri === 'filelist') {
    if (!$is_session)
        header('Location: /', true, 303);

    require_once '../photos.php';
    $data = get_all_photos();
    open_view('filelist', $data);
}

if ($uri === 'list') {
    if (!$is_session)
        header('Location: /', true, 303);

    require_once '../list.php';
    $data = get_all_users();

    open_view('list', $data);
}

if ($uri === 'profile') {
    if (!$is_session)
        header('Location: /', true, 303);

    open_view('profile');
}


function open_view($uri, $data = [])
{
    $data['is_auth'] = false;

    if (!is_session()) destroy_session();
    else $data['is_auth'] = true;

    $pug = new Pug(['cache' => '../../cached']);
    // ['cache' => '../../cached']);
    $output = $pug->render("views/$uri.pug", $data);
    echo $output;
    die();
}
