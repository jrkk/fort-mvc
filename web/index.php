<?php

ini_set('display_errors','On');
error_reporting(E_ALL);
header('Content-Type: text/plain');

require_once "../vendor/autoload.php";

$log = new \Fort\Log\Log();
$flog = new \Fort\Drivers\Log\FileLogger();

class Container implements \Fort\Log\LoggerInterface {
    use \Fort\Log\Logger;

    function doLog() {
        $this->logger->debug('container intialized');
        $this->logger->debug('controller intialized');
        $this->logger->debug('Header intialized');
        $this->logger->push();
    }

}

$container = new Container();
$container->setLogger($flog);
$container->doLog();

