<?php

namespace Fort\Factory;

trait Enum {
    public function hasConstant($name) {
        $constant = "get_class()::$name";
        return (isset($constant) ? true : false);
    } 
    public function getConfig($name) {
        $constant = "self::$name";
        return constant($constant);
    }
}