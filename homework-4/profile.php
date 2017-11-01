<?php

function update_profile()
{
    $data = [];
    foreach($_POST as $key => $param) {
        if (!empty($param)) $data[$key] = strip_tags($param);
    }
    $file = $_FILES['file'];

    if (empty($data) && $file['size'] === 0) {
        http_response_code(400);
        create_error('The data is not updated. Fill in at least one field.');
    }

    try {
        $dbh = connect_database();

        session_start([
            'read_and_close' => true
        ]);

        if (!empty($data))
            update_user_data($dbh, $data);

        if ($file['size'] !== 0)
            upload_file($dbh, $file);

        $sth = null;
        $dbh = null;

        header('Content-type: application/json');
        die(json_encode([
            'success' => 'Вы успешно обновили себя'
        ]));

    } catch (PDOException $e) {
        http_response_code(500);
        create_error($e->getMessage());
    }
}

function update_user_data($dbh, $data)
{
    $id = (int) $_SESSION['id'];

    $sql = "UPDATE hm4_users SET ";
    $arr = [];

    foreach ($data as $key => $value) {
        $sql .= " $key = ?,";
        array_push($arr, $value);
    }

    $sql = substr($sql, 0, -1);
    $sql .= " WHERE id = $id";

    $sth = $dbh->prepare($sql);
    $res = $sth->execute($arr);

    return $res;
}

function upload_file($dbh, $file) {
    if ($file['error'] !== 0) {
        http_response_code(400);
        create_error('Upload failed');
    }

    $file_info = pathinfo($file['name']);
    $ext = $file_info['extension'];
    $exts = ['jpeg','jpg','png','gif'];
    $types = [1,2,3];

    if (!in_array($ext, $exts)) {
        http_response_code(400);
        create_error('Invalid file Extension');
    }

    if (!in_array(exif_imagetype($file['tmp_name']), $types)) {
        http_response_code(400);
        create_error('Invalid file Type');
    }

    if ($file['size'] > 100000) {
        http_response_code(400);
        create_error('File too big');
    }

    $name = $file['name'];
    $id = (int) $_SESSION['id'];
    if (move_uploaded_file($file['tmp_name'], "photos/$id.$ext")) {

        $sql = "UPDATE hm4_users SET photo = ? WHERE id = $id";

        $sth = $dbh->prepare($sql);
        $res = $sth->execute(["$id.$ext"]);

        return $res;
    }
    else {
        http_response_code(400);
        create_error('Please load file by method POST');
    }
}