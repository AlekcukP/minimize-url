<?php

namespace App\Database;

use PDO;
use App\Database\Connection;

class DB
{
    private static $statement;
    private static $params;
    private static $connection;

    /**
     * Get PDO connection instance
     *
     * @return mixed
     */
    public static function getConnection()
    {
        if (!self::$connection) {
            self::$connection = Connection::create();
        }

        return self::$connection;
    }

    /**
     * Set SQL query
     *
     * @param string $sql
     * @param mixed $data
     * @return self
     */
    public static function query($sql, $data = null)
    {
        $db = self::getConnection();

        $stmt = $db->prepare($sql);

        $params = [];

        if ($data) {
            foreach ($data as $key => $value) {
                if ($value) {
                    $params[$key] = htmlspecialchars(strip_tags($value));
                }
            }
        }

        self::$statement = $stmt;
        self::$params = $params;

        return new static();
    }

    /**
     * Run the SQL query
     *
     * @return mixed
     */
    public static function run()
    {
        return self::$statement->execute(self::$params);
    }

    /**
     * Run the SQL query and
     * get all the result
     *
     * @return array
     */
    public static function get()
    {
        self::$statement->execute(self::$params);
        $total = self::$statement->rowCount();

        $result = [];

        if ($total > 0) {
            while ($row = self::$statement->fetch(PDO::FETCH_ASSOC)) {
                array_push($result, (object) $row);
            }
        }
        return $result;
    }

    /**
     * Run the SQL query and
     * get the first result
     *
     * @return object
     */
    public static function first()
    {
        self::$statement->execute(self::$params);
        $total = self::$statement->rowCount();

        $result = [];

        if ($total > 0) {
            while ($row = self::$statement->fetch(PDO::FETCH_ASSOC)) {
                array_push($result, (object) $row);
            }

            return array_shift($result);
        } else {
            return null;
        }
    }

    /**
     * Get last inserted ID
     *
     * @return string|int
     */
    public static function insertedId()
    {
        $db = self::$connection;

        return $db->lastInsertId();
    }
}
