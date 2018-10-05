<?php

namespace Fort;

use Psr\Log\AbstractLogger;
use Psr\Log\LoggerInterface;

class Logger extends AbstractLogger implements LoggerInterface
{
    public function log($level, $message, $context = []) 
    {
        var_dump($level, $message, $context);
    }
}
