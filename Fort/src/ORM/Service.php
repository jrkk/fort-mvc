<?php

namespace Fort\ORM;

class Service {
    public function isReady() 
    {
        $driver = new Driver();
        $driver->connect();
    } 
}