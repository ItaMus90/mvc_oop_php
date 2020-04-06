<?php

namespace App\Helper\Route;

use Exception;

class Mapper{

    /**
     * @param Router $router
     * @param string $currentURI
     * @return mixed
     *
     * @throws Exception
     */
    public function run(Router $router, string $currentURI){
        //1)Get path from $currentURI
        $parseURL = parse_url($currentURI);

        $path = $parseURL['path'];
        //2)Get array of routes

        foreach ($router->getRoutes() as $pattern => $route){
            //3)Check instance of route
            if(FALSE === $route instanceof Route){
                //4)Throw exception
                throw new Exception("This not a route");

            }

            //4)Handle pattern
            if(preg_match('#^'.$pattern.'$#',$path, $matches)){
                //5)Construct controller
                $controllerName = $route->getController();
                $controller = new $controllerName();

                break;

            }

        }


        //6)Get method
        //7)Return method
        return $controller->{$route->getMethod()}();


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