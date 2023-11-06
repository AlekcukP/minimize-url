<?php

namespace App\Helpers;

class Config {
    /**
     * Configs directory path
     *
     * @var string
     */
    private static $path = __DIR__ . '/../config';

    /**
     * Config array
     *
     * @var array
     */
    protected static $config = [];

    /**
     * Load the configuration from a file
     *
     * @param string $configFile
     * @return void
     */
    public static function load($config) {
        $configFilePath = self::$path . '/' . $config;

        if (file_exists($configFilePath)) {
            $config = include $configFilePath;
            self::$config = array_merge(self::$config, $config);
        }
    }

    /**
     * Get a configuration value by key
     *
     * @param string $key
     * @param string $default
     * @return string
     */
    public static function get($key, $default = null) {
        $keys = explode('.', $key);
        $configValue = self::$config;

        foreach ($keys as $subkey) {
            if (isset($configValue[$subkey])) {
                $configValue = $configValue[$subkey];
            } else {
                return $default;
            }
        }

        return $configValue;
    }
}
