<?php

namespace App\Helper\HTTP\Locator;

use App\Helper\HTTP\Request\Request;
use App\Helper\HTTP\Route\Route;

class Locator{

    /**
     * @var Request
     */
    private $request;

    /**
     * @var array
     */
    private $routes;

    const DELIMITER = '#';

    /**
     * Locator constructor.
     * @param Request $request
     * @param array $routes
     */
    public function __construct(Request $request, array $routes = []){

        $this->request = $request;
        $this->setRoutes($routes);

    }

    /**
     * @param array $routes
     * @return Locator
     */
    public function setRoutes(array $routes) :Locator{

        $this->routes = $routes;
        return $this;

    }


    /**
     * @param Route $routeToCheck
     * @param string $queryString
     * @return null|Route
     */
    public function routeMatch(Route $routeToCheck, string $queryString): ?Route{

        $foundRoute = null;

        $check = preg_match(self::createPattern($routeToCheck), $queryString, $matches);

        if($check){
            $foundRoute = $routeToCheck;
        }

        return $foundRoute;

    }


    /**
     * @return Route|null
     */
    public function locate() :?Route{

        $foundRoute = null;

        if(empty($this->routes)){
            return null;
        }

        $queryString = $this->request->getPath();

        foreach ($this->routes as $route){

            $foundRoute = $this->routeMatch($route, $queryString);

            if($foundRoute instanceof Route){
                break;
            }

        }

        return $foundRoute;

    }


    /**
     * @param Route $route
     * @return string
     */
    public static function createPattern(Route $route) :string{
        return self::DELIMITER . '^' . $route->getPattern() . '$' . self::DELIMITER;
    }

}