<?php

namespace Fort\Di;

use Fort\Exception\NotFoundException;
use Fort\Exception\ContainerException;

class ObjectContainer implements StaticContainer  {

    protected static $logger;

    public static function setLogger($logger) {
        self::$logger = $logger;
    }
    
    public static function get($name) {
        if(!is_string($name) || !isset(self::${$name})) {
            throw new ContainerException();
        }
        return self::${$name};
    }

    public static function has($id) {
        if(!is_string($id)) {
            throw new NotFoundException();
        }
        return isset(self::${$name}) ? true : false ;
    }

    public static function set($id, $object) {
        if(!is_string($id) || !is_object($object) ) {
            throw new ContainerException();
        }
        self::${$name} = $object;
    }

    public static function remove($id) {
        if(!is_string($id) || !is_object($object) ) {
            throw new ContainerException();
        }
        unset(self::${$name});
    }

}