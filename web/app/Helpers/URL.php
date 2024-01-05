<?php

namespace App\Helpers;

class URL
{
    /**
     * Return app host
     *
     * @return string
     */
    public static function getHost()
    {
        return $_SERVER['HTTP_HOST'];
    }

    /**
     * Return app base URL
     *
     * @return string
     */
    public static function getBaseUrl()
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

    /**
     * Get key from the minimized URL string
     *
     * @param string $url
     * @return string
     */
    public static function getKeyFromURL($url)
    {
        $parts = explode('/', $url);
        return end($parts);
    }

    /**
     * Ensure the URL has a protocol (scheme) and append it if missing
     *
     * @param string $url
     * @return string
     */
    public static function ensureScheme($url)
    {
        $parsed = parse_url($url);

        if (empty($parsed['scheme'])) {
            $url = 'https://' . ltrim($url, '/');
        }

        return $url;
    }

    /**
     * Generates a unique URL key of the specified length.
     *
     * @param int $length
     * @return string
     */
    public static function generateKey($length = 6) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $urlKey = '';

        for ($i = 0; $i < $length; $i++) {
            $urlKey .= $characters[rand(0, $charactersLength - 1)];
        }

        return $urlKey;
    }
}
