<?php

namespace App\Controllers;

use App\Controllers\Controller;
use App\View\View;
use App\Models\UrlMap;

class IndexController extends Controller
{
    public function index()
    {
        return View::render('pages/main.php', [
            'default_expires_date' => date(
                'Y-m-d',
                strtotime(date('Y-m-d') . ' +3 days')
            )
        ]);
    }

    public function redirect()
    {
        if ($this->request->params->has('urlKey')) {
            if ($url = UrlMap::findByKey($this->request->params->get('urlKey'))) {
                if (strtotime($url->expires_at) < strtotime(date('Y-m-d H:i:s'))) {
                    return $this->errorView('Link has been expired');
                }

                UrlMap::incrementRedirects($url->id);
                return $this->request->redirect($url->original_url);
            }
        }

        $this->request->redirect();
    }
}
