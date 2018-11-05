<?php

namespace Fort\Mvc;

use Fort\Config;
//use App\Config\Config;
use Fort\Http\Request;
use Fort\Http\Response;

class Controller {
    use \App\Config\Autoload;
    private $autoloads = [
        'uri' => "\\Fort\\Http\\Uri",
        'request' => "\\Fort\\Http\\Request",
        'response' => "\\Fort\\Http\\Response"
    ];
    function __construct(Request $request, Response $response)
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