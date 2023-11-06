<?php

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../app/routes.php';

use App\Routing\Request;
use App\Helpers\Config;

Config::load('db.php');

Request::init();
