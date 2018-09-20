<?php

namespace Fort\ORM;

class Entity {
    public function isReady() 
    {
        $driver = new Driver();
        $driver->connect();
    } 
}
