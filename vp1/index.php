<?php

require_once '../helpers/helpers.php';

$content = open_file('frontend/index.html');

echo $content;

mysql_connect();

