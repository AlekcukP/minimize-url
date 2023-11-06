<?php

namespace App\Controllers;

use App\Routing\Request;

class Controller
{
    public $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }
}
