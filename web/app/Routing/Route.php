<?php

namespace App\Routing;

class Route
{
    private const METHOD_GET = "GET";
    private const METHOD_POST = "POST";

    /**
     * Route Path
     *
     * @var string
     */
    public $path;

    /**
     * Route Request Method
     *
     * @var string
     */
    public $method;

    /**
     * Route Handler
     *
     * @var array
     */
    public $handler;

    /**
     * Keep all the routes
     *
     * @var array
     */
    private static $routes = [];

    /**
     * Constructor
     *
     * @param string $method
     * @param string $path
     * @param array $handler
     */
    public function __construct($method, $path, $handler)
    {
        $this->method = $method;
        $this->path = $path;
        $this->handler = $handler;
    }

    /**
     * Add GET route
     *
     * @param string $path
     * @param array $handler
     * @return void
     */
    public static function get($path, $handler)
    {
        self::$routes[] = new Route(self::METHOD_GET, $path, $handler);
    }

    /**
     * Add POST route
     *
     * @param string $path
     * @param array $handler
     * @return void
     */
    public static function post($path, $handler)
    {
        self::$routes[] = new Route(self::METHOD_POST, $path, $handler);
    }

    /**
     * Get the routes array
     *
     * @return array
     */
    public static function getAll()
    {
        return self::$routes;
    }
}
