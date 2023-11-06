<?php

namespace App\Helpers;

class URL
{
    /**
     * Return app base URL
     *
     * @return string
     */
    public static function base()
    {
        $hostName = $_SERVER['HTTP_HOST'];
        $protocol = strtolower(substr($_SERVER["SERVER_PROTOCOL"],0,5)) == 'https://'?'https://':'http://';

        return $protocol . $hostName;
    }

    /**
     * Sanitize a given URL
     *
     * @param string $url
     * @return string
     */
    public static function sanitize($url)
    {
        return htmlspecialchars(strip_tags($url));
    }
}
