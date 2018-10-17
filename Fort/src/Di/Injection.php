<?php
namespace Fort\Di;

class Injection implements InjectionInterface {
    public function isResolved($name) {
        try {
            if(self::$resolved->has($name)) return true;
        } catch ( NotFoundException $nfe  ) {
            self::$logger->notice('Object not Found in resolved Items', $nfe);
        } catch ( Exception $e ) {
            self::$logger->notice('Object not Found in resolved Items', $e);
        }
        return false;
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
        self::$logger->info('IOC > create definition for '.var_export(func_get_args(), true));    
        
        // check weather defination has exists
        try {

            $id = self::makeId($name);

            if( !self::$definitions->has($id) ) {
                $definition = new ClassDefinition($name);
                $definition->setClass($name);  
                self::$definitions->set($id, $definition);
                self::$logger->info('IOC > definition has created');
                return $definition;
            } else {
                self::$logger->info('IOC > definition has retrived from container'); 
                return self::$definitions->get($id);
            }

        } catch ( NotFoundException $nfe ) {
            self::$logger('IOC > definition not found '.$nfe->getTraceAsString());
        } catch ( Exception $e ) {
            self::$logger('IOC > definitions container throws an exception '.$nfe->getTraceAsString());
        }

    }
    public function call($callable, array $parameters = []){

    }
    public function set(string $name, $value) {

    }
    public function getKnownEntryNames(){

    }
    public function resolveDefinition(Definition $definition, array $parameters = []){
        self::$logger->info('IOC > resolve all dependencies '.var_export(func_get_args(), true));    
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