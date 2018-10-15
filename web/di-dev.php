<?php

namespace App;

ini_set('display_errors','On');
error_reporting(E_ALL);
header('Content-Type: text/plain');

require_once "../vendor/autoload.php";

use Fort\Log\Log;
use Fort\Di\Ioc;
use Fort\Di\DI;

$log = new Log();

Ioc::init($log);
DI::init($log);

DI::create('router', '\Fort\Router\Router');

echo "\n\n-------------------------------------------------------------------------------------------- ";
$log->push();