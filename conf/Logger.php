<?php

namespace App\Config;

use Fort\Config;

trait Logger {
    protected $config = [
        'ext' => '.log',
        'path' => Config::APPDIR.'storage/logs',
        'filePrefix' => 'log-'
    ];
    protected $allowedModes = ['debug','info'];
}