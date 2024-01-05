<?php

namespace App\Controllers;

use App\Controllers\Controller;
use App\View\View;
use App\Models\UrlMap;
use App\Helpers\URL;

class MainController extends Controller
{
    public function displayMainPage()
    {
        return View::render('pages/main.php');
    }

    public function redirectToOriginalUrl()
    {
        if ($this->request->params->has('urlKey')) {
            if ($url = UrlMap::findByKey($this->request->params->get('urlKey'))) {
                if (strtotime($url->expires_at) < strtotime(date('Y-m-d H:i:s'))) {
                    return $this->renderErrorView('Error: Link has been expired');
                }

                UrlMap::incrementRedirectsCount($url->id);
                return $this->request->redirect($url->original_url);
            }
        }

        return $this->request->redirect();
    }
}
