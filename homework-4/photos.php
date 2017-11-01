<?php

function get_all_photos()
{
    try {
        $dbh = connect_database();

        $sql = 'SELECT photo from hm4_users WHERE photo IS NOT NULL';
        $sth = $dbh->query($sql);
        $photos = $sth->fetchAll(PDO::FETCH_NAMED);

        $sth = null;
        $dbh = null;

        return ['photos' => $photos];

    } catch (PDOException $e) {
        http_response_code(500);
        create_error($e->getMessage());
    }
}

function delete_photo() {
    $data = get_request_data();
    $photo = $data['photo'];

    try {
        $dbh = connect_database();

        $sql = "UPDATE hm4_users SET photo = ? WHERE photo = '$photo'";

        $sth = $dbh->prepare($sql);
        $res = $sth->execute([null]);

        if($photo && file_exists("photos/$photo"))
            unlink("photos/$photo");

        $sth = null;
        $dbh = null;

        header('Content-type: application/json');
        die(json_encode([
            'success' => 'Фото удалено'
        ]));

    } catch (PDOException $e) {
        http_response_code(500);
        create_error($e->getMessage());
    }
}

