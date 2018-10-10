<?php

namespace App\Config;

use Fort\Config;

trait Logger {
    protected $config = [
        'ext' => '.log',
        'path' => Config::BASEPATH.'storage'. Config::DELIMITER .'logs',
        'filePrefix' => 'log-',
        'permission' => 0777,
        'stamp' => 'Y-m-d-H-i',
    ];
    protected $allowedModes = ['debug','info'];
}