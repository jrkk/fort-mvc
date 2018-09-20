<?php
ini_set('display_errors','On');
error_reporting(E_ALL);
header('Content-Type: text/plain');

require_once "../vendor/autoload.php";

$app = new Fort\Bootstrap();
$app->start();
