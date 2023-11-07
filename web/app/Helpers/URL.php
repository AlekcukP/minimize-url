<?php

namespace App\Helpers;

class URL
{
    /**
     * Return app host
     *
     * @return string
     */
    public static function host()
    {
        return $_SERVER['HTTP_HOST'];
    }

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

    /**
     * Validate URL
     *
     * @param string $url
     * @return boolean
     */
    public static function validate($url)
    {
        return filter_var($url, FILTER_VALIDATE_URL);
    }

    public static function getKeyFromURL($url)
    {
        $parts = explode('/', $url);
        return end($parts);
    }
}
