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
            return $this->errorView('Missed URL string');
        }

        if (!URL::validate($this->request->input->get('u'))) {
            return $this->errorView('Invalid URL');
        }

        if (!$expires_at = $this->request->input->get('d')) {
            $expires_at = date('Y-m-d', strtotime(date('Y-m-d') . ' +3 days'));
        }

        $url = UrlMap::create([
            'original_url' => $this->request->input->get('u'),
            'expires_at' => date('Y-m-d H:i:s', strtotime($expires_at)),
        ]);

        if (!$url) {
            return $this->errorView();
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
            return $this->errorView('Missed minimized URL string');
        }

        $url = UrlMap::findByKey($this->request->params->get('urlKey'));

        if (!$url) {
            return $this->errorView();
        }

        return View::render('pages/total.php', [
            'host_url' => URL::host() . '/' . $url->url_key,
            'minimized_url' => URL::base() . '/' . $url->url_key,
            'redirects' => $url->redirects,
        ]);
    }

    public function track()
    {
        if (!$this->request->input->has('m')) {
            return $this->errorView('Missed minimized URL string');
        }

        if (
            !URL::validate($this->request->input->get('m')) ||
            !$key = URL::getKeyFromURL($this->request->input->get('m'))
        ) {
            return $this->errorView('Invalid URL');
        }

        if (!$url = UrlMap::findByKey($key)) {
            return $this->errorView('Invalid URL');
        }

        $this->request->redirect('/url/count/' . $url->url_key);
    }

    public function counter()
    {
        return View::render('pages/counter.php', [
            'host' => URL::host(),
        ]);
    }
}
