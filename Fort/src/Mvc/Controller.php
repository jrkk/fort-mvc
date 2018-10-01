<?php

namespace Fort\Mvc;

use Fort\Di\Container;

class Controller {
    use App\Config\Autload;
    private $container = null;

    function __construct()
    {
        $this->container = new Container();
    }

    function __autoload() {

    }

}