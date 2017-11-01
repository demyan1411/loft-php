<?php

function start_session()
{
    $session = session_start([
        'use_strict_mode' => true
    ]);
}

function is_session()
{
    return !empty($_SESSION) && $_SESSION['id'];
}

function destroy_session()
{
    if (ini_get("session.use_cookies")) {
        setcookie(session_name(), '', time() - 42000);
    }

    session_destroy();
}