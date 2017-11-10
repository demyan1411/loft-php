<?php

namespace Hm5;

use Hm5\Models as Models;

class App
{
    public function __construct()
    {
        new Models\Car();
    }
}