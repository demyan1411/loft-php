<?php

function login_user()
{
    $data = get_request_data();

    try {
        $dbh = connect_database();

        foreach($data as $param) {
            if (empty($param)) {
                http_response_code(400);
                create_error('Not valid data');
            }
        }

        login($dbh, $data);

        $sth = null;
        $dbh = null;

        header('Content-type: application/json');
        die(json_encode([
            'success' => 'Вы зашли',
            'redirect' => '/list'
        ]));

    } catch (PDOException $e) {
        http_response_code(500);
        create_error($e->getMessage());
    }
}

function login($dbh, $data)
{
    if (is_login_exists($dbh, $data['login'])) {
        $user = get_userid_by_login($dbh, $data);

        verify_password($data, $user);

    } else {
        http_response_code(403);
        create_error('Login not found');
    }
}

function verify_password($data, $user)
{
    if (password_verify($data['password'], $user[0]['password'])) {
        session_start();
        $_SESSION['id'] = $user[0]['id'];
        $_SESSION['time'] = time();
    } else {
        http_response_code(418);
        create_error('Bad password');
    }
}