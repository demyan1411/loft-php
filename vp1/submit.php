<?php

function submit_form()
{
    $data = get_request_data();
    $data = set_null($data);

    try {
        $dbh = connect_database();
        get_authorized($dbh, $data);
        $order_info = add_order($dbh, $data);

        if ($order_info['order_id']) {
            create_letter($dbh, $data, $order_info);

            header('Content-type: application/json');
            die(json_encode(['success' => 'Ваш заказ оформлен']));
        }

    } catch (PDOException $e) {
        http_response_code(500);
        create_error($e->getMessage());
    }

}

function get_request_data()
{
    $rawPostBody = file_get_contents('php://input');
    return json_decode($rawPostBody, true);
}

function get_authorized($dbh, $data)
{
    if (empty($data['email'])) {
        http_response_code(400);
        create_error('Not email');
    }
    if(!is_email_exists($dbh, $data['email'])) {
        put_new_user($dbh, $data);
    }
}

function is_email_exists($dbh, $email)
{
    $sql = "SELECT name, email FROM users WHERE email = '$email'";

    $sth = $dbh->query($sql);
    $data = $sth->fetchAll(PDO::FETCH_NAMED);

    return empty($data) ? false : true;
}

function put_new_user($dbh, $data)
{
    $sql = 'INSERT INTO users(name, email, phone) VALUES (?, ?, ?)';

    $sth = $dbh->prepare($sql);
    $res = $sth->execute([$data['name'], $data['email'], $data['phone']]);
}

function add_order($dbh, $data)
{
    $sql = 'INSERT INTO orders 
              (street, home, part, appt, floor, comment, payment, callback, user_id) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)';

    $user_id = get_user_id_by_email($dbh, $data['email']);

    $sth = $dbh->prepare($sql);
    $res = $sth->execute([
        $data['street'],
        $data['home'],
        $data['part'],
        $data['appt'],
        $data['floor'],
        $data['comment'],
        $data['payment'],
        $data['callback'],
        $user_id
    ]);

    $order_id = false;
    if ($res) $order_id = $dbh->lastInsertId();

    return ['order_id' => $order_id, 'user_id' => $user_id];
}

function get_user_id_by_email($dbh, $email)
{
    $sql = "SELECT id FROM users WHERE email = '$email'";
    $sth = $dbh->query($sql);
    $data = $sth->fetchAll(PDO::FETCH_NAMED);

    return $data[0]['id'] ? $data[0]['id'] : false;
}

function create_letter($dbh, $data, $order_info)
{
    $user_id = $order_info['user_id'];
    $sql = "SELECT count(user_id) FROM orders WHERE user_id = $user_id";

    $sth = $dbh->query($sql);
    $count = $sth->fetchAll(PDO::FETCH_NAMED);

    $count_orders = $count[0]['count(user_id)'];

    $str = sprintf('
    Заказ № %s
    Ваш заказ будет доставлен по адресу: ул %s, дом %s, корпус %s, квартира %s, этаж %s.
    Содержимое заказа - DarkBeefBurger за 500 рублей, 1 шт.
    Спасибо - это ваш %s заказ.
    ',

        $order_info['order_id'],
        $data['street'],
        $data['home'],
        $data['part'],
        $data['appt'],
        $data['floor'],
        $count_orders
    );
    $date = date('d-m-Y__H-i-s');

    file_put_contents("orders/$date.txt", $str);
}

function create_error($error_text)
{
    header('Content-type: application/json');
    die(json_encode(['error' => $error_text]));
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
