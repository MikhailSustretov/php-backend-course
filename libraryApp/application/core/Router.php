<?php

namespace application\core;

use application\core\View;

class Router
{

    protected $routes = [];
    protected $params = [];

    function __construct()
    {
        $arr = require_once 'application/config/routes.php';

        foreach ($arr as $route => $controllerParts) {
            $this->addRoute($route, $controllerParts);
        }
    }

    public function addRoute($route, $routeParams)
    {
        $route = '#^' . $route . '$#';
        $this->routes[$route] = $routeParams;
    }

    public function match()
    {
        $url = trim($_SERVER['REQUEST_URI'], '/');

        foreach ($this->routes as $routePattern => $controllerParts) {

            if (preg_match($routePattern, $url, $matches)) {

                $internalRoute = preg_replace("$routePattern", $controllerParts['action'], $url);

                $this->params['controller'] = $controllerParts['controller'];

                $uriSegments = explode('/', $internalRoute);

                $this->params['action'] = array_shift($uriSegments);

                if (count($uriSegments)) {
                    $this->params['actionParams'] = $uriSegments;
                }

                return true;
            }
        }
        return false;
    }

    public function run()
    {
        if ($this->match()) {

            $path = 'application\controllers\\' . $this->params['controller'] . 'Controller';

            if (class_exists($path)) {
                $action = 'action' . $this->params['action'];

                if (method_exists($path, $action)) {

                    $controller = new $path($this->params);
                                                                            //if there is actionParams then it is actionParams
                                                                            //else it is empty array
                        call_user_func_array(array($controller, $action), $this->params['actionParams'] ?? []);

                } else {

                    View::errorCode(404);
                }
            } else {

                View::errorCode(404);
            }

        } else {
            View::errorCode(404);
        }
    }
}
















