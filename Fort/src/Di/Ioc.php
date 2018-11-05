<?php
namespace Fort\Di;

use Fort\Log\Log;
use Fort\Di\Definition\Definition;
use Fort\Di\Definition\ClassDefinition;

use Fort\Exception\NotFoundException;
use Fort\Exception\ContainerException;

class Ioc extends ObjectContainer {

    private static $buffer = [];

    public static function init() {

    }

    public static function setBuffer($name, $class) {
        self::$logger->info('Ioc > set buffer item [ name :'.$name.' => '.$class.']');
        self::$buffer[$name] = $class;
    }

    public static function isBuffered($name) {
        self::$logger->info('Ioc > check has already in buffer :'.$name);
        return !empty(self::$buffer[$name]);
    }

    public function getKnownEntries() {
        return self::$buffer;
    }
    
    private static function makeObjectId($name) {
        return str_replace(
            ["\\"],
            ['_'],
            $name
        );
    }

}