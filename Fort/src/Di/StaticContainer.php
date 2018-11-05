<?php
namespace Fort\Di;

interface StaticContainer {
    public static function setLogger($logger);
    public static function get($name);
    public static function has($name);
    public static function set($name, $object);
    public static function remove($name);
}