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
        $sql = "INSERT INTO " . self::$table_name . " (`original_url`) VALUES (:original_url)";

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
    public static function incrementClickCounter($id)
    {
        $sql = "CALL IncrementUrlMapRedirects(:id)";

        return DB::query($sql, ['id' => $id])->run();
    }
}
