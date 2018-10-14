<?php
namespace Fort\Di;

use \Fort\Log\Log;

use Fort\Exception\NotFoundException;
use Fort\Exception\ContainerException;

class Ioc {
    
    private static $resolved;

    private static $definitions;

    protected static $logger;

    public static function init($logger) {
        if($logger instanceof Log) {
            self::$logger = $logger;
        } else {
            throw new NotFoundException('Logger is not found intiate the Ioc Bridge');
        }       
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


}