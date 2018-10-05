<?php

namespace App\Config;

trait Autoload {
    protected $DEVELOPE = [ 'enable' => true ];
    protected $PRODUCTION = [ 'enable' => false ];
    protected $STAGING = [ 'enable' => false ];
}