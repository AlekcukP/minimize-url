<?php

namespace App\Controllers;

use App\Controllers\Controller;
use App\View\View;
use App\Models\UrlMap;

class IndexController extends Controller
{
    public function index()
    {
        return View::render('pages/main.php');
    }

    public function redirect()
    {
        if ($urlKey = $this->request->params->get('urlKey')) {
            if ($url = UrlMap::findByKey($urlKey)) {
                UrlMap::incrementClickCounter($url->id);
                return $this->request->redirect($url->original_url);
            }
        }

        $this->request->redirect();
    }
}
