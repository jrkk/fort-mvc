<?php

namespace Fort;

use App\Entity\BaseConfig;
use App\Config\AppConfig;

class Config extends BaseConfig implements AppConfig {
    public function startEnviornment() {

    }
    public function load($configClass) {
        $className = "\\App\\Config\\Env\\".self::ENVIORNMENT."\\{$configClass}";
        $object = new $className();
        $objectName = strtolower($configClass);
        $this->classMap[$objectName] = get_class($object);
        $this->{$objectName} = $object; 
    }
}