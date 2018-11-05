<?php
namespace Fort\Di;

use Fort\Di\Definition\Definition;
use Fort\Di\Definition\ClassDefinition;

use Fort\Exceptions\ContainerException;

class Injection implements InjectionInterface {

    private $logger = null;

    function __construct($logger){
        $this->logger = $logger;
    }

    public function getDefinition($name, $class) {
        try {
            if(self::$definitions->has($name)) {
                
            }
        } catch ( NotFoundException $nfe  ) {
            self::$logger->notice('Object not Found in resolved Items', $nfe);
        } catch ( Exception $e ) {
            self::$logger->notice('Object not Found in resolved Items', $e);
        }
        return false;
    }

    public function make($name, array $parameters = []){
        
        $this->logger->info('Injection > create definition for '.var_export(func_get_args(), true));    

        try {
            
            $definition = new ClassDefinition($name); 
            $this->logger->info('Injection > Definition has created for :'.$name);
            $definition->constructor($parameters);
            return $definition;
            
        } catch ( Exception $e ) {
            $this->logger->info('Injection > definitions container throws an exception '.$nfe->getTraceAsString());
        }

    }
    public function call($callable, array $parameters = []){

    }
    public function set(string $name, $value) {

    }
    public function getKnownEntryNames(){

    }
    public function resolveDefinition(Definition $definition, array &$parameters){
        $this->logger->info('IOC > resolve all dependencies '.var_export(func_get_args(), true));

        // check and resolved definition.
        if(Ioc::isResolved($definition->getName())) {
            return Ioc::get($definition->getName());
        }

        // Un buffered Items could not be processed.
        if(!Ioc::isBuffered($definition->getName())) {
            return false;
        }   

        $dependencies = $definition->getDependencies();
        //self::set($definition->getName(), $definition);
        if(count($dependencies) > 0) {  
            foreach($dependencies as $dependency) {
                var_export($dependency->getName());
                var_export($dependency->getClass());
                try {
                    $object = Ioc::get($dependency->getName(), $dependency->getClass());
                    if($object && !$object instanceof Definition) {
                        $parameters [] = $dependency->getName(); 
                    }
                } catch ( ContainerException $ce ) {
                    var_export("Exceptional case");
                    DI::create($dependency->getName(), $dependency->getClass());
                }
                
            }
        } 

        var_export($parameters);

    }
    public function inject($instance) {

    }
    private function makeId($name) {
        return str_replace(
            ["\\"],
            [''],
            $name
        );
    }
}