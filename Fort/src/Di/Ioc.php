<?php
namespace Fort\Di;

use Fort\Log\Log;
use Fort\Di\Definition\Definition;
use Fort\Di\Definition\ClassDefinition;

use Fort\Exception\NotFoundException;
use Fort\Exception\ContainerException;

class Ioc {
    
    private static $registry;
    private static $resolved;
    private static $buffer;
    private static $definitions;

    protected static $logger;

    public static function init(Log &$logger) {
        self::$logger = $logger;

        self::$resolved = new ObjectContainer();
        self::$definitions = new ObjectContainer();
        self::$buffer = new ObjectContainer();
        self::$registry = new Container();

        self::$resolved->setLogger(self::$logger);
        self::$definitions->setLogger(self::$logger);
        self::$buffer->setLogger(self::$logger);
    }

    public static function get($name) {
        if(self::$registry->has($name)) {
            $container = self::$registry->get($name);
            return self::${$container}->has($name);
        } 
        return false;
    }

    public static function has($name) {
        if(self::$registry->has($name)) {
            $container = self::$registry->get($name);
            return self::${$container}->has($name);
        } 
        return false;
    }

    public static function set($name, $object, $scope) {
        $description = [ 'key' => $name , 'scope' => $scope ];
    }

    public static function buffered($name) {

    }

    public static function move($name, $source, $target) {

    }

    private static function makeObjectId($name) {
        return str_replace(
            ["\\"],
            ['_'],
            $name
        );
    }

}