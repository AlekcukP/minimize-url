<?php

namespace App\Models;

use App\Database\DB;

class UrlMap
{
    /**
     * Table Name
     *
     * @var string
     */
    private static $table_name = "url_map";

    /**
     * Get url record by ID
     *
     * @param int $id
     * @return mixed
     */
    public static function findById($id)
    {
        $sql = "SELECT * FROM " . self::$table_name . " WHERE `id` = :id";

        return DB::query($sql, ['id' => $id])->first();
    }

    /**
     * Get url record by url key
     *
     * @param int $urlKey
     * @return mixed
     */
    public static function findByKey($urlKey)
    {
        $sql = "SELECT * FROM " . self::$table_name . " WHERE `url_key` = :url_key";

        return DB::query($sql, ['url_key' => $urlKey])->first();
    }

    /**
     * Get url record by original URL
     *
     * @param int $id
     * @return mixed
     */
    public static function findByOriginalUrl($originalUrl)
    {
        $sql = "SELECT * FROM " . self::$table_name . " WHERE `original_url` = :original_url";

        return DB::query($sql, ['original_url' => $originalUrl])->first();
    }

    /**
     * Create a minimized URL
     *
     * @param string $originalUrl
     * @return mixed
     */
    public static function create($values)
    {
        $sql = (
            "INSERT INTO " .
            self::$table_name .
            " (`url_key`, `original_url`, `expires_at`) VALUES (:url_key, :original_url, :expires_at)"
        );

        if ($result = DB::query($sql, $values)->run()) {
            return self::findById(DB::insertedId());
        }

        return $result;
    }

    /**
     * Increment URL click count
     *
     * @param int $id
     * @return mixed
     */
    public static function incrementRedirectsCount($id)
    {
        $sql = "UPDATE url_map SET redirects = redirects + 1 WHERE id = :id";

        return DB::query($sql, ['id' => $id])->run();
    }

    /**
     * Checks if the URL key already existed in DB
     *
     * @param string $urlKey
     * @return boolean
     */
    public static function isKeyExists($urlKey)
    {
        $sql = "SELECT COUNT(*) as `count` FROM url_map WHERE url_key = :url_key";

        $result = DB::query($sql, ['url_key' => $urlKey])->first();

        return boolval(intval($result->count));
    }
}
