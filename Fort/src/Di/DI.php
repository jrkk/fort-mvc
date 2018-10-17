<?php

namespace Fort\Di;

use Psr\Container\ContainerInterface;

use Fort\Log\Log;

use Fort\Exception\NotFoundException;
use Fort\Exception\ContainerException;

class DI  {
    
    private static $logger;

    private static $objects;

    private static $injection;

    public static function init(Log &$logger){
        self::$logger = $logger;
        self::$objects = new ObjectContainer();
        if(self::$objects instanceof ObjectContainer) {
            self::$logger->info('Objects Container has created');
        }
        Ioc::init($logger);
    }

    public static function create($name, $class, array $parameters = []) {
        self::$logger->info(__FUNCTION__.': called '.var_export(func_get_args(), true));
        try {
            $object = self::$objects->get($name);
        } catch( NotFoundException $nfe ) {
            self::$logger->info(' Un expected exception throwed :'.$nfe->getTraceAsString());
        } catch ( ContainerException $ce ) {   
            self::$logger->info(' Object not Found ( need to create ) :'.$ce->getTraceAsString());
            $definition = Ioc::make($class, $parameters);
            var_export($definition);
            Ioc::resolveDefinition($definition, $parameters);
        } catch ( Exception $e ) {
            self::$logger->info(' Un expected exception throwed :'.$nfe->getTraceAsString());
        }

    }
}