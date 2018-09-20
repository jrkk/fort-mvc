<?php

namespace Fort;

use Fort\Helper\App;

class Bootstrap {

    protected $config = null;

    function __construct() {
        $this->config = new Config();
    }

    public function start() 
    {
        $router = new Router;
        $router->init($this->config);
       //var_dump($this->config->getConfig('protocol'));  
       //var_dump(App::uri());
       //$request = new Request();
       //echo $request->getProtocolVersion();
    }
}