<?php

namespace Fort\Entity;

class BaseConfig {
    
    protected $configurations = [];
    protected $classMap = [];

    public function setConfig($key, $val) {
        $this->configurations[$key] = $val;
        return $this;
    }

    public function getConfig($key) {
        return !isset($this->configurations[$key]) ?  false : $this->configurations[$key];
    }

    public function setConfigurations($configurations = []) {
        if(!empty($configurations) && count($configurations) > 0)
            $this->configurations = array_merge($this->configurations, $configurations);
    }

    public function getConfigurations() {
        return $configurations;
    }

}