<?php

namespace App\Config;

use App\Entity\Route;

trait Routes {
    function __construct() {
        self::setRoute('index', 'bus/home/(\d*)', 
            new Route(
                '\App\Bus\Controllers\HomeController',
                'getAction'
            )
        );
        self::setRoute('login', 'auth/login', 
            new Route(
                '\App\Auth\Controllers\HomeController',
                'getAction'
            )
        );
    }
}