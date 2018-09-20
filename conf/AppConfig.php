<?php

namespace App\Config;

use App\Config\Enums\Protocols;
use App\Config\Enums\Environments as ENV;
use App\Config\Enums\HttpMethods as RM;

interface AppConfig {
    const ENVIORNMENT = ENV::DEV;
    const DOMAIN = 'www.abhibus.com';
    const PROTOCOL = Protocols::HTTP;
    const HTTPVERSION = '1.0';
    const DELIMITER = '/';
    const ALLOWEDMETHODS = [RM::GET, RM::POST];
}