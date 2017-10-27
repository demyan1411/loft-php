<?php

function connect_database()
{
    $dsn = 'mysql:host=localhost;dbname=loft_php';
    $user = 'root';
    $password = 'qwe';

    $dbh = new PDO($dsn, $user, $password);
    $dbh->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

    return $dbh;
}