<?php

namespace Fort\Di;

use Psr\Container\ContainerInterface;

use Fort\Log\Log;

use Fort\Exception\NotFoundException;
use Fort\Exception\ContainerException;

class DI  {
    
    private static $logger;

    private static $injection;

    public static function init(Log &$logger){
        self::$logger = $logger;
        Ioc::setLogger($logger);
        self::$injection = new Injection($logger);
    }

    public static function create($name, $class, array $parameters = []) {
        self::$logger->info(__FUNCTION__.': called '.var_export(func_get_args(), true));
        try {
            $object = Ioc::get($name);
        } catch( NotFoundException $nfe ) {
            self::$logger->info(' Un expected exception throwed :'.$nfe->getTraceAsString());
        } catch ( ContainerException $ce ) {   
            self::$logger->info(' Object not Found ( need to create ) :'.$ce->getTraceAsString());
            if(!Ioc::isBuffered($name)) {
                $definition = self::$injection->make($class, $parameters);
                if($definition instanceof Definition) {
                    $definition->setName($name);
                    Ioc::setBuffer($name, $class);
                    self::$logger->info('Definition has reslvoved and definition ['.$definition->getName().']');
                }
            } else {
                self::$logger->info('Already cached on identified');
            }
        } catch ( Exception $e ) {
            self::$logger->info(' Un expected exception throwed :'.$nfe->getTraceAsString());
        }

    }
}