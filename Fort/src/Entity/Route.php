<?php

namespace Fort\Entity;

use Fort\Exception\RouterException;

class Route {

    protected $name = '';

    protected $match = '';

    protected $routeIndex = 0;

    protected $class = '';

    protected $method = '';

    protected $params = [];

    protected $protocol = 'http'; 

    protected $host = [];

    protected $requestMethod = [];

    function __construct( 
        $class,
        $method = 'action',
        $params = [],
        $protocol = 'http', 
        $host = [],
        $requestMethod = []
    ) {
        if( $class === '' || $method === '' ) {
            throw new RouterException('Route is not configured properly');
        }

        $this->class = $class;
        $this->method = $method;
        $this->params = $params;

        $this->protocol = $protocol;
        $this->host = $host;
        $this->requestMethod =  $requestMethod;
    }

    public function mapping(
        $name,
        $match,
        $routeIndex
    ) {
        $this->$name = $name;
        $this->match = $match;
        $this->routeIndex = $routeIndex;
    }

    public function getController() {
        return $this->class;
    }

    public function getMatchExpression() {
        $this->match = "{$this->match}";
        $expression = str_replace([
            " "
            ],[
            ""
            ],$this->match);
        $expression = addcslashes($expression,'/');
        return $expression;
    }
    
}

