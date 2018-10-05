<?php

namespace Fort\Mvc;

use Fort\Di\Container;

class Controller {
    use \App\Config\Autoload;
    private $container = null;

    function __construct()
    {
        $this->container = new Container();
        var_export($this->$DEVELOP);
    }

    function __invoke($name, $arguments)
    {
         var_export($name);
         var_export($arguments);
    }

    function __call($name, $arguments)
    {
         var_export($name);
         var_export($arguments);
    }


    function __autoload() {

    }

}