<?php

namespace Fort\Di;

use Psr\Container\ContainerInterface;

use Fort\Exception\NotFoundException;
use Fort\Exception\ContainerException;

class Container implements ContainerInterface  {

    public function get($id) {
        if(!is_string($id) || !isset($this->{$id})) {
            throw new ContainerException();
        }
        return $this->{$id};
    }

    public function has($id) {
        if(!is_string($id)) {
            throw new NotFoundException();
        }
        return isset($this->{$id}) ? true : false ;
    }

    public function set($id, $content) {
        if(!is_string($id)) {
            throw new ContainerException();
        }
        $this->{$id} = $content;
    }

}