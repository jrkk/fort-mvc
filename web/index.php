<?php

ini_set('display_errors','On');
error_reporting(E_ALL);

header('Content-Type: text/plain');

require_once "../vendor/autoload.php";
try {
    $app = new Fort\Bootstrap();
    $app->start();
} catch ( Exception $e ) {
    var_export($e);
}
