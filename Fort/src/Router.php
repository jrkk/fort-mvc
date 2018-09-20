<?php

namespace Fort;

class Router {
    use \App\Config\Routes;
    protected $routes = [];
    protected $routeIndex = 0;
    protected $matches = [];
    public function setRoute($name, $match, $route) {
        $route->mapping($name, $match, ++$this->routeIndex);
        $this->matches[$route->getMatchExpression()] = $match;
        $this->routes[$name] = $route;
    }
    public function init(&$appConfig) {
        $appConfig->load('Config');
        if($appConfig->config->hasConstant('APPDIR')) {
            $uri = new Uri();
            $path = $uri->getPath();   
            $path = str_replace($appConfig->config->getConfig('APPDIR'), "", $path);
            if($path === '' ) $path = 'index';
        }
        var_export($path);
        var_export($this->routes);
        var_export($this->matches);

        foreach($this->matches as $pattern => $match ) {
            if(preg_match('/^'.$pattern.'$/', $path, $matches)) {
                var_export([$match, $pattern, $matches]);
            } 
        }
    }
}
