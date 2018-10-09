<?php

namespace App\Config;

use Fort\Router\Route;

trait Routes {
    function appRoutes() {
        self::setRoute('index', 'home', 
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