<?php

function get_admin_data()
{
    try {
        $dbh = connect_database();

        $sql = 'SELECT * from users';
        $sth = $dbh->query($sql);
        $users = $sth->fetchAll(PDO::FETCH_NAMED);

        $sql = 'SELECT * from orders';
        $sth = $dbh->query($sql);
        $orders = $sth->fetchAll(PDO::FETCH_NAMED);

        $data = ['users' => $users, 'orders' => $orders];

        $dbh = null;
        $sth = null;

        return $data;

    } catch (PDOException $e) {
        http_response_code(500);
        create_error($e->getMessage());
    }
}