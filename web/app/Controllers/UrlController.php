<?php

namespace App\Controllers;

use App\Controllers\Controller;
use App\Models\UrlMap;
use App\View\View;
use App\Helpers\URL;

class UrlController extends Controller
{
    public function minimize()
    {
        if (!$this->request->input->has('u')) {
            return $this->request->redirect('/url/error', 400);
        }

        $url = UrlMap::create([
            'original_url' => $this->request->input->get('u')
        ]);

        if (!$url) {
            return $this->request->redirect('/url/error', 400);
        }

        return View::render('pages/minimized.php', [
            'url_key' => $url->url_key,
            'minimized_url' => URL::base() . '/' . $url->url_key,
            'original_url' => $url->original_url,
            'expires_at' => $url->expires_at
        ]);
    }

    public function count()
    {
        if (!$this->request->params->has('urlKey')) {
            return $this->request->redirect();
        }

        $url = UrlMap::create($this->request->params->get('urlKey'));

        if (!$url) {
            return $this->request->redirect('/url/error', 400);
        }

        return View::render('pages/minimized.php', [
            'url_key' => $url->url_key,
            'minimized_url' => URL::base() . '/' . $url->url_key,
            'original_url' => $url->original_url,
            'expires_at' => $url->expires_at
        ]);
    }

    public function error()
    {
        return View::render('pages/error.php');
    }
}
