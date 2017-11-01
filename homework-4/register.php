<?php
function registration_user()
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

       registration($dbh, $data);

        $sth = null;
        $dbh = null;

        header('Content-type: application/json');
        die(json_encode([
            'success' => 'Вы зарегистрированы',
            'redirect' => '/list'
        ]));

    } catch (PDOException $e) {
        http_response_code(500);
        create_error($e->getMessage());
    }
}

function registration($dbh, $data)
{
    if (is_login_exists($dbh, $data['login'])){
        http_response_code(403);
        create_error('Already exists');
    } else if ($data['password'] !== $data['password2']) {
        http_response_code(400);
        create_error('Passwords not the same');
    } else {
        put_new_user($dbh, $data);
    }
}

function put_new_user($dbh, $data)
{
    $cost = get_hash_cost();
    $password = password_hash($data['password'], PASSWORD_BCRYPT, ['cost' => $cost,]);

    $sql = 'INSERT INTO hm4_users(login, password) VALUES (?, ?)';

    $sth = $dbh->prepare($sql);
    $res = $sth->execute([$data['login'], $password]);

    if ($res) {
        $user = get_userid_by_login($dbh, $data);

        session_start();
        $_SESSION['id'] = $user[0]['id'];
        $_SESSION['time'] = time();
    } else {
        http_response_code(500);
        create_error();
    }
}