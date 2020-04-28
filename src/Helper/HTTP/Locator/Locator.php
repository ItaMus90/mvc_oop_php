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
        $this->routes = $routes;

    }

    /**
     * @param Route $routeToCheck
     * @param string $queryString
     * @return null|array
     */
    public function routeMatch(Route $routeToCheck, string $queryString): ?array{

        $foundRoute = null;

        preg_match(self::createPattern($routeToCheck), $queryString, $matches);

        if(false === empty($matches)){
            return $matches;
        }

        return null;

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

            $matches = $this->routeMatch($route, $queryString);

            if(false === empty($matches)){

                unset($matches[0]);
                $this->request->setParameters($matches);
                $foundRoute = $route;
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
        /**
         * @todo replace {id} with param pattern
         */
        return self::DELIMITER . '^' . $route->getPattern() . '$' . self::DELIMITER;
    }

}