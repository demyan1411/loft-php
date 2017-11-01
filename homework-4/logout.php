<?php

function logout()
{
    start_session();

    $_SESSION = [];

    destroy_session();

    header('Location: /', true, 303);
}