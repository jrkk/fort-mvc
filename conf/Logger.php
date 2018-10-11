<?php

namespace App\Config;

use Fort\Config;

trait Logger {
    protected $config = [
        'ext' => '.log',
        'path' => Config::BASEPATH.'storage'. Config::DELIMITER .'logs',
        'filePrefix' => '',
        'permission' => 0777,
        'stamp' => 'Y-m-d-H-i/3',
    ];
    protected $allowedModes = ['debug','info'];
    
}