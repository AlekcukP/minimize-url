<?php

namespace App\Controllers;

use App\Controllers\Controller;
use App\Models\UrlMap;
use App\View\View;
use App\Helpers\URL;
use DateTime;

class UrlController extends Controller
{
    public function minimizeUrl()
    {
        if (!$this->request->input->has('u')) {
            return $this->renderErrorView('Error: Missed URL string');
        }

        $originalUrl = URL::ensureScheme($this->request->input->get('u'));

        if (!URL::validate($originalUrl)) {
            return $this->renderErrorView('Error: Invalid URL');
        }

        if ($url = UrlMap::findByOriginalUrl($originalUrl)) {
            return $this->renderMinimizedUrlView($url);
        }

        if (!$expiresAt = $this->request->input->get('d')) {
            $expiresAt = date('Y-m-d', strtotime(date('Y-m-d') . ' +3 days'));
        }

        $urlKey = URL::generateKey();

        if (UrlMap::isKeyExists($urlKey)) {
            do {
                $urlKey = URL::generateKey();
            } while (UrlMap::isKeyExists($urlKey));
        }

        $url = UrlMap::create([
            'url_key' => $urlKey,
            'original_url' => $originalUrl,
            'expires_at' => date('Y-m-d H:i:s', strtotime($expiresAt))
        ]);

        if (!$url) {
            return $this->renderErrorView();
        }

        return $this->renderMinimizedUrlView($url);
    }

    public function displayMinimizedUrlClicksCount()
    {
        if (!$this->request->params->has('urlKey')) {
            return $this->renderErrorView('Error: Missed minimized URL string');
        }

        $url = UrlMap::findByKey($this->request->params->get('urlKey'));

        if (!$url) {
            return $this->renderErrorView();
        }

        return View::render('pages/total.php', [
            'host_url' => URL::getHost() . '/' . $url->url_key,
            'minimized_url' => URL::getBaseUrl() . '/' . $url->url_key,
            'redirects' => $url->redirects,
        ]);
    }

    public function countMinimizedUrlClicks()
    {
        if (!$this->request->input->has('m')) {
            return $this->renderErrorView('Error: Missed minimized URL string');
        }

        if (
            !URL::validate($this->request->input->get('m')) ||
            !$key = URL::getKeyFromURL($this->request->input->get('m'))
        ) {
            return $this->renderErrorView('Error: Invalid URL');
        }

        if (!$url = UrlMap::findByKey($key)) {
            return $this->renderErrorView('Error: Invalid URL');
        }

        $this->request->redirect('/url/count/' . $url->url_key);
    }

    public function displayUrlClickCounter()
    {
        return View::render('pages/counter.php', [
            'host' => URL::getHost(),
        ]);
    }

    private function renderMinimizedUrlView(object $url)
    {
        $expiresDateTime = new DateTime($url->expires_at);

        return View::render('pages/minimized.php', [
            'url_key' => $url->url_key,
            'minimized_url' => URL::getBaseUrl() . '/' . $url->url_key,
            'original_url' => $url->original_url,
            'expires_at' => $expiresDateTime->format('Y-m-d')
        ]);
    }
}
