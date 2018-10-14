<?php
namespace APP\FrontController;

ini_set('display_errors','On');
error_reporting(E_ALL);
header('Content-Type: text/plain');

require_once "../vendor/autoload.php";

$log = new \Fort\Log\Log();
$flog = new \Fort\Drivers\Log\FileLogger();

class Container extends \Fort\Di\Container implements \Fort\Log\LoggerInterface {
    use \Fort\Log\Logger;

    function model() {
        $this->logger->info('Container created ready to serve');  
    }

    public function create($class) {
        $this->logger->info(" Requested class to create object for ".$class);
        //$object = new $class();
        //var_export($object);
        $reflector = new \ReflectionClass($class);
        var_export($reflector);
        var_export($reflector->getConstructor());

        $constructor = new \ReflectionMethod($class, '__construct');
        var_export($constructor->getNumberOfParameters());
        var_export($constructor->getParameters());

        $indexAction = new \ReflectionMethod($class, 'indexAction');
        var_export($indexAction->getNumberOfParameters());
        var_export($indexAction->getParameters());

        foreach($indexAction->getParameters() as $parameter) {
            $refelctParam = new \ReflectionParameter([$class, 'indexAction'], $parameter->name);
            var_export($refelctParam->getClass());
        }

        //$controller = new $class([],'jrkkkiran');
        //$controller->indexAction(new \Fort\Request(),new \Fort\Response());

    }

    function __destruct() {
        $this->logger->push();
    }
    
}

$container = new Container();
$container->setLogger($log);
$container->model();

$controller = $container->create("\App\Bus\Controller\LoginController");