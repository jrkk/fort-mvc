<?php

namespace Fort\Di;

use Psr\Container\ContainerInterface;
use Fort\Log\LoggerInterface;

use Fort\Exception\NotFoundException;
use Fort\Exception\ContainerException;

class ObjectContainer implements ContainerInterface,LoggerInterface   {
    use \Fort\Log\Logger;

    private $registry = [];

    public function get($id) {
        if(!is_string($id) || !isset($this->registry[$id])) {
            throw new ContainerException();
        }
        return $this->registry[$id];
    }

    public function has($id) {
        if(!is_string($id)) {
            throw new NotFoundException();
        }
        return isset($this->registry[$id]) ? true : false ;
    }

    public function setObject($id, &$object) {
        if(!is_string($id) || !is_object($object) ) {
            throw new ContainerException();
        }
        $this->registry[$id] = $object;
    }

}