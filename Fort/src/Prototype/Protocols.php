<?php

namespace App\Config\Enums;

class Protocols {

    const HTTP = 'http';
    const HTTPS = 'https';

    const SSL = false;

    const protocols = [    
        'http' => [ '1.0' , '1.1' ],
        'https' => [ '1.0' ],
        'TSL' => [ '1.X' , '2.X' , '3.X' ]
    ];

    public static function isExactProtocol( $protocol, $version ) {
        if( in_array( $protocol, array_values(self::protocols) ) 
            &&  in_array( $version, self::protocols[$protocol] ) )
            return true;
        return false;
    }

    public static function isAllowedProtocol($protocol) {
        if( $protocol === self::HTTP || $protocol === self::HTTPS )
            return true;
        return false;
    }
}