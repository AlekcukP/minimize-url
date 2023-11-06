<?php

namespace App\Routing;

class Bag
{
    /**
     * Keep all the parameters
     *
     * @var array
     */
    protected $bag = [];

    /**
     * Creates new instance
     *
     * @return ParamsBag
     */
    public static function make()
    {
        return new self();
    }

    /**
     * Get parameter value
     *
     * @param string $key
     * @param mixed $default
     * @return mixed
     */
    public function get($key, $default = null){
        if (array_key_exists($key, $this->bag)){
            return $this->bag[$key];
        }

        return $default;
    }

    /**
     * Set paramters key & value
     *
     * @param string $key
     * @param mixed $value
     * @return void
     */
    public function set($key, $value)
    {
        $this->bag[$key] = $value;
    }

    /**
     * Checks if parameter exists
     *
     * @param string $key
     * @return boolean
     */
    public function has($key){
        return array_key_exists($key, $this->bag);
    }

    /**
     * Get the parameter array
     *
     * @return array
     */
    public function all()
    {
        return $this->bag;
    }
}
