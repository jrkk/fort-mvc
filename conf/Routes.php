<?php

namespace App\Config;

use Fort\Entity\Route;

trait Routes {
    function appRoutes() {
        self::setRoute('index', 'bus/home', 
            new Route(
                '\App\Bus\Controller\HomeController',
                'index'
            )
        );
        self::setRoute('login', 'auth/login', 
            new Route(
                '\App\Auth\Controllers\HomeController',
                'index'
            )
        );
    }
}