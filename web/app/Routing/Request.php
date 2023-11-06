<?php

namespace App\Routing;

use App\Helpers\URL;
use App\Routing\Bag;

class Request
{
    public $method = null;
    public $input = null;
    public $params = null;
    private $url = null;
    private $route = null;

    public static function make()
    {
        return new self;
    }

    public static function init()
    {
        return self::make()->handle();
    }

    public function redirect($location = '/', $code = 200)
    {
        http_response_code($code);
        header("Location: " . $location);
    }

    private function __construct()
    {
        $this->setURL();
        $this->setHttpRequestMethod();
        $this->setInputBag();
        $this->setParamsBag();
        $this->fillInputBag();
        $this->setRoute();
        $this->fillParamsBag();
    }

    private function handle() {
        if ($this->route && $this->route->method === $this->method) {
            list($class, $action) = $this->route->handler;
            $classInstance = new $class(self::make());

            return call_user_func([$classInstance, $action]);
        } else {
            http_response_code(404);
            echo '<h1>Route Not Allowed</h1>';
            exit();
        }

        http_response_code(404);
        echo '<h1>404 - Not Found</h1>';
    }

    private function setURL()
    {
        $this->url = URL::sanitize($_SERVER["REQUEST_URI"]);
    }

    private function setHttpRequestMethod() {
        $this->method = strtoupper($_SERVER['REQUEST_METHOD']);
    }

    private function setInputBag() {
        $this->input = Bag::make();
    }

    private function setParamsBag() {
        $this->params = Bag::make();
    }

    private function setRoute() {
        foreach (Route::getAll() as $route) {
            $pattern = str_replace('/', '\/', $route->path);
            $pattern = preg_replace(
                '/{[A-Za-z0-9]+}/',
                '([A-Za-z0-9]+)',
                '/^' . $pattern . '$/i'
            );

            if (preg_match($pattern, $this->url, $match) && $route->method === $this->method) {
                $this->route = $route;
            }
        }
    }

    private function fillInputBag()
    {
        $inputPost = filter_input_array(INPUT_POST) ?: [];
        $inputGet = filter_input_array(INPUT_GET) ?: [];
        $inputArray = array_merge($inputPost, $inputGet);

        foreach ($inputArray as $key => $value){
            $this->input->set($key, $value);
        }
    }

    private function fillParamsBag()
    {
        $urlParts = explode('/', $this->url);
        $routeParts = explode('/', $this->route->path);

        foreach ($routeParts as $key => $value) {
            if (!empty($value)) {
                $value = str_replace('{', '', $value, $count1);
                $value = str_replace('}', '', $value, $count2);

                if ($count1 == 1 && $count2 == 1) {
                    $this->params->set($value, $urlParts[$key]);
                }
            }
        }
    }
}
