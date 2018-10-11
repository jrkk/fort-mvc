<?php

namespace App\Config;

use Fort\Prototype\Protocols;
use Fort\Prototype\Environments as ENV;
use Fort\Prototype\HttpMethods as RM;

// configuration that used in bootstrap the application.
interface AppConfig {
    const ENVIORNMENT = ENV::DEV;
    const DOMAIN = 'www.fortphp.com';
    const PROTOCOL = Protocols::HTTP;
    const HTTPVERSION = '1.0';
    const DELIMITER = '/';
    const ALLOWEDMETHODS = [RM::GET, RM::POST];
    const APPDIR = "/";
    const BASEPATH = "C:\\Projects\\fort-mvc\\";
}