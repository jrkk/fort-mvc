<?php

namespace Fort\Mvc;

use Fort\Config;
//use App\Config\Config;

class Controller {
    use \App\Config\Autoload;
    private $autoloads = [
        'uri' => "\\Fort\Uri",
        'request' => "\\Fort\\Request",
        'response' => "\\Fort\\Response"
    ];
    function __construct()
    {
        $configuration = self::$ENVS[config::ENVIORNMENT];
        $this->autoloads = array_merge($this->autoloads, self::${$configuration});
        $this->__autoload();
    }
    function __autoload() {
        foreach($this->autoloads as $index => $value ) {
            if(!isset($this->$index)) {
                $this->$index = new $value();
            }
        }
    }

}