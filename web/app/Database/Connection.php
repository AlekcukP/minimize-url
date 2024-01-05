<?php

namespace App\Database;

use App\View\View;
use App\Controllers\Controller;
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
            http_response_code(500);

            return View::render(
                "error.php",
                ["error" => "Connection error: " . $e->getMessage()]
            );
        }
    }
}
