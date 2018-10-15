<?php
namespace Fort\Di\Definition;

class ClassDefinition implements Definition {
    use \Fort\Di\Helper\Definition;

    protected $reflection = null ;

    function setClass($class) {
        try {
            $this->reflection = new \ReflectionClass($class);
            return $this->reflection->getName();
        } catch ( ReflectionException $re ) {
            var_export($class);
            var_export($re);
            $this->logger->info('Throws reflection exception: reflection object not created ');
        }
        return false;
    }

}