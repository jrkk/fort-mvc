<?php

namespace Fort;

use Fort\Exception\ControllerNotFoundException;

class Router {
    use \App\Config\Routes;
    protected $routes = [];
    protected $routeIndex = 0;
    protected $matches = [];
    public function setRoute($name, $match, $route) {
        $route->mapping($name, $match, ++$this->routeIndex);
        $this->matches[$route->getMatchExpression()] = $name;
        $this->routes[$name] = $route;
    }
    public function init() {
        $this->appRoutes();
        if(Config::APPDIR) {
            $uri = new Uri();
            $path = $uri->getPath();   
            $path = str_replace(Config::APPDIR, "", $path);
            if($path === '' ) $path = 'index';
        }
        foreach($this->matches as $pattern => $match ) {

            $pattern = '/^'.addcslashes($pattern,'/').'$/';

            if(preg_match($pattern, $path, $matches)) {
                unset($matches[0]);
                $controllerClass = $this->routes[$match]->getController();
                $controller = new $controllerClass();
                
                if($controller instanceof \Fort\Mvc\Controller) {
                    
                    $method  = $this->routes[$match]->getMethod();
                    if(method_exists ( $controller , $method )) {
                        $params = $this->routes[$match]->getParams($matches);
                        call_user_func_array([$controller, $method],$params);
                    } else {
                        throw new \Fort\Exception\ControllerActionException();
                    }

                } else {
                    throw new \Fort\Exception\ControllerNotFoundException();
                }
            } 
        }
    }
}
