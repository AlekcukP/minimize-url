<?php

namespace App\Controllers;

use App\Routing\Request;
use App\View\View;

class Controller
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function renderErrorView(
        string $error = 'Error: Sorry, something went wrong.',
        int $code = 400
    ) {
        http_response_code($code);

        return View::render("error.php", ["error" => $error]);
    }
}
