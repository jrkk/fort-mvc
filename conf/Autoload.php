<?php

namespace App\Config;

use Fort\Prototype\Environments as ENV;

trait Autoload {
    protected static $ENVS = [ 
        ENV::DEV => 'DEVELOPE',
        ENV::STAGE => 'STAGING',
        ENV::PROD => 'PRODUCTION'
    ];
    protected static $DEVELOPE = [ 
        
    ];
    protected static $PRODUCTION = [  

    ];
    protected static $STAGING = [  

    ];
}