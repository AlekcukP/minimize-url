<?php

namespace App\Database;

use App\Helpers\Config;
use PDO;

class Connection
{
    /**
     * Establish database connection
     *
     * @return mixed
     */
    public static function create()
    {
        try {
            $connection = new PDO(
                "mysql:host=" . Config::get('db.host') . ";dbname=" . Config::get('db.name'),
                Config::get('db.username'),
                Config::get('db.password')
            );
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $connection->exec("SET names utf8");

            return $connection;
        } catch(\PDOException $e) {
            echo "Connection error: " . $e->getMessage();
        }
    }
}
