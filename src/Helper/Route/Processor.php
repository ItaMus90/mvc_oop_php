<?php

namespace Helper\Route;
use Exception;

class Processor{

    /**
     * @param Router $router
     * @param string $currentURI
     * @return mixed
     *
     * @throws Exception
     */
    public function process(Router $router, string $currentURI){

        $knownRoute = $router->process($currentURI);
        $controllerName = $knownRoute->getController();

        $controller = new $controllerName();

        return $controller->{$knownRoute->getMethod()}();

    }

    /**
     * @param array $routes
     * @return Router
     *
     * @throws Exception
     */
    public function make(array $routes){

        $router = new Router();

        foreach ($routes as $routeData){

            $route = new Route($routeData);
            $router->register($route);

        }

        return $router;
    }

}