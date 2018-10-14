<?php

ini_set('display_errors','On');
error_reporting(E_ALL);
header('Content-Type: text/plain');

require_once "../vendor/autoload.php";

$log = new \Fort\Log\Log();

class DI  {
    
    /**
     * Default logger object 
     * we can inject and invoke this object in furtur.
     */
    private static $logger;

    /**
     * All dependencies list
     */
    private static $dependencies = [];

    /**
     * Resolved Entries
     */
    private static $resolved ;

    /**
     * Container Object 
     */
    private static $container ;

    public static function init() {
        self::$container = new \Fort\Di\Container();
    }   

    public static function setLogger(\Fort\log\log $logger) {
        self::$logger = $logger;
    }
   
    public static function create1($class) {
        $reflectionClass = new ReflectionClass($class);
        $name = $reflectionClass->getShortName();
        self::$logger->info('registration class for: '.$name);
        $namespace = $reflectionClass->getNamespaceName();
        self::$logger->info('registration namespace for: '.$namespace);
        $finalNameSpace = self::registerNamespace($namespace);
        self::$logger->info('returned registred namspace: '.$finalNameSpace);
        self::$logger->push();
    }

    public static function Create($name, $class) {

        if(Ioc::isResolved($name)) {
            return self::$container->get($name)->getDescription();
        }

    }

    public static function has($class) {
        self::$logger->info('Finding object for'.$class);
        self::$logger->push();
        return self::$container->has($class);
    }

    private static function registerNamespace($namespace) {

        $namespace = str_replace(
            ["\\"],
            ['_'],
            $namespace
        );

        if(!isset(self::$dependencies[$namespace])) {
            self::$logger->info($namespace.' -> namespace has regsitered successfuly');
            self::$dependencies[$namespace] = [];
        } else {
            self::$logger->info($namespace.' -> namespace has already register');
        }

        return $namespace;
    }

    private static function AutoWire() {

    }
}



DI::setLogger($log);
DI::init();
DI::has('\App\Bus\Controller\LoginController');
DI::create("\App\Bus\Controller\LoginController");
