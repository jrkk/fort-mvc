<?php
namespace Fort\Di;

use Fort\Log\Log;
use Fort\Di\Definition\Definition;
use Fort\Di\Definition\ClassDefinition;

use Fort\Exception\NotFoundException;
use Fort\Exception\ContainerException;

class Ioc implements InjectionInterface {
    
    private static $resolved;

    private static $definitions;

    protected static $logger;

    public static function init(Log &$logger) {
        self::$logger = $logger;
        self::$resolved = new ObjectContainer();
        self::$definitions = new ObjectContainer();
        self::$resolved->setLogger(self::$logger);
        self::$definitions->setLogger(self::$logger);
    }

    public static function isResolved($name) {
        try {
            if(self::$resolved->has($name)) return true;
        } catch ( NotFoundException $nfe  ) {
            self::$logger->notice('Object not Found in resolved Items', $nfe);
        } catch ( Exception $e ) {
            self::$logger->notice('Object not Found in resolved Items', $e);
        }
        return false;
    }

    public static function getDefinition($name, $class) {
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

    public static function make($name, array $parameters = []){
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
    public static function call($callable, array $parameters = []){

    }
    public static function set(string $name, $value) {

    }
    public static function getKnownEntryNames(){

    }
    public static function resolveDefinition(Definition $definition, array $parameters = []){
        self::$logger->info('IOC > resolve all dependencies '.var_export(func_get_args(), true));    
    }
    public static function inject($instance) {

    }
    private static function makeId($name) {
        return str_replace(
            ["\\"],
            [''],
            $name
        );
    }

}