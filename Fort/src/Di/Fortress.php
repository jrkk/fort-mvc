<?php

/**
 * Simple DI 
 * 
 * 
 */

namespace Fort\Di;

use Psr\Container\ContainerInterface;

class Fortress extends ContainerInterface {
    
    private static $container = null;

    function __construct()
    {
        self::$container = new Container();
    }

    public static function create($class, $classlist) {
        
    }

    public static function get($name)  {

    }

    public static function has($name) {

    }

}