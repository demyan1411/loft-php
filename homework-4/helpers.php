<?php

function get_request_data()
{
    $rawPostBody = file_get_contents('php://input');
    return json_decode($rawPostBody, true);
}

function is_login_exists($dbh, $login)
{
    $sql = "SELECT login FROM hm4_users WHERE login = '$login'";

    $sth = $dbh->query($sql);
    $data = $sth->fetchAll(PDO::FETCH_NAMED);

    return empty($data) ? false : true;
}

function get_userid_by_login($dbh, $data)
{
    $login = $data['login'];
    $sql = "SELECT * FROM hm4_users WHERE login = '$login'";

    $sth = $dbh->query($sql);
    $user = $sth->fetchAll(PDO::FETCH_NAMED);

    return $user;
}

function create_error($error_text = 'Something went wrong')
{
    header('Content-type: application/json');
    die(json_encode(['error' => $error_text]));
}

function get_hash_cost() {
    $timeTarget = 0.15;

    $cost = 8;
    do {
        $cost++;
        $start = microtime(true);
        password_hash("test", PASSWORD_BCRYPT, ["cost" => $cost]);
        $end = microtime(true);
    } while (($end - $start) < $timeTarget);

   return $cost;
}

function set_null($data)
{
    foreach ($data as $key => $val) {
        if ((is_array($val) && empty($val)) || empty($val)) {
            $data[$key] = null;
        }

        if (is_array($val) && !empty($val)) {
            $data[$key] = implode(', ', $val);
        }
    }

    return $data;
}
