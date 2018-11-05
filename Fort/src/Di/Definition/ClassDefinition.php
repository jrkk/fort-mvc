<?php
namespace Fort\Di\Definition;

use Fort\Di\DI;

class ClassDefinition implements Definition {

    use \Fort\Di\Helper\Definition;

    private $name = '';
    private $className = '';
    private $dependencies = [];

    function __construct($class)  {
        $this->className = $class;
    }
    
    public function constructor($parameters)  {
        var_dump(get_object_vars($this));
        try {
            $constructor = new \ReflectionMethod($this->className, '__construct');
            $arguments = $constructor->getParameters();
            foreach($arguments as $dependency) {
                var_export($dependency->getName());
                var_export($dependency->getClass());
                DI::create($dependency->getName(), $dependency->getClass());
                if(!isset($this->dependencies[$dependency->getName()]))
                    $this->dependencies[$dependency->getName()] = $dependency->getClass();
                
            }
        } catch ( \ReflectionException $re ) {
            if($re->getMessage() !== 'Method Fort\\Router\\Router::__construct() does not exist')
                var_export($re);
        }
    }

    public function inject() {
        $reflection = new \ReflectionClass($this->className);
        $instance = $reflection->newInstanceArgs($this->dependencies);
        return $instance;
    }

}