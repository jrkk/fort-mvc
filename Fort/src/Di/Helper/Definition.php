<?php
namespace Fort\Di\Helper;

trait Definition {
    public function setName($name) {
        $this->name = $name;
        return $this;
    }
    public function getName(){
        return $this->name;
    }
}