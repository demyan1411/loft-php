<?php

function get_all_users()
{
    try {
        $dbh = connect_database();

        $sql = 'SELECT login, name, age, description, photo from hm4_users';
        $sth = $dbh->query($sql);
        $users = $sth->fetchAll(PDO::FETCH_NAMED);

        $sth = null;
        $dbh = null;

        return ['users' => $users];

    } catch (PDOException $e) {
        http_response_code(500);
        create_error($e->getMessage());
    }
}

function delete_user()
{
    $data = get_request_data();
    $login = $data['login'];

    try {
        $dbh = connect_database();

        $sql = "SELECT photo FROM hm4_users WHERE login = '$login'";

        $sth = $dbh->query($sql);
        $photo = $sth->fetchAll(PDO::FETCH_NAMED);
        $photo = $photo[0]['photo'];

        $sql = "DELETE FROM hm4_users WHERE login = ?";
        $sth = $dbh->prepare($sql);
        $res = $sth->execute([$login]);

        if($photo && file_exists("photos/$photo"))
            unlink("photos/$photo");

        $sth = null;
        $dbh = null;

        header('Content-type: application/json');
        die(json_encode([
            'success' => 'Юзер удален'
        ]));

    } catch (PDOException $e) {
        http_response_code(500);
        create_error($e->getMessage());
    }
}