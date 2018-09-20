<?php

namespace App\Entity;

abstract class DataList {

    // registry
    protected $data = [];

    abstract public function setItem($name, $value);
    abstract public function getItem($name);

}
