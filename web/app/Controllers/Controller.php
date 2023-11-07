<?php

namespace App\Controllers;

use App\Routing\Request;
use App\View\View;

class Controller
{
    public $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function errorView(
        $error = 'Oops... something went wrong',
        $code = 400
    ) {
        http_response_code($code);
        return View::render("error.php", ["error"=> $error]);
    }
}
