<?php

namespace Fort\Helper;

trait Counter {
    private static $counter;
    public function increment() {
        self::$counter++;
    }
    public function decrement() {
        self::$counter--;
    }
    public function getState() {
        return self::$counter;
    }
}