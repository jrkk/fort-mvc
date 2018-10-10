<?php

namespace App\Config;

use Fort\Config;

trait Logger {
    protected $config = [
        'ext' => '.log',
        'path' => Config::BASEPATH.'storage'. Config::DELIMITER .'logs',
        'filePrefix' => 'log-'
    ];
    protected $allowedModes = ['debug','info'];
}