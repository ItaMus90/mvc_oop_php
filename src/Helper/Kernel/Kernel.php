<?php

namespace App\Helper\Kernel;

use App\Helper\HTTP\Locator\Locator;
use App\Helper\HTTP\Request\Request;
use App\Helper\HTTP\Route\Route;
use Exception;

class Kernel{

    public static function boot(array $routes){

        $currentURI = Kernel::getURI($_SERVER['REQUEST_URI']);
        $request = new Request($currentURI, $_SERVER['REQUEST_METHOD']);
        $locator = new Locator($request, $routes);

        $route = $locator->locate();

        if(false === $route instanceof Route){
            throw new Exception('Cannot find page', 404);
        }

        $controllerName = $route->getController();

        $controller = new $controllerName();
        return $controller->{$route->getAction()}();

    }

    public static function getURI($currentURI){
        /**
         * This is temporery solution
         * need to create Virtual Host for
         * the /projects/oop_course/public/
         */
        $currentURI = explode("/",$currentURI);

        unset($currentURI[0]);
        unset($currentURI[1]);
        unset($currentURI[2]);
        unset($currentURI[3]);
        $currentURI = '/' . implode("/", $currentURI);

        return $currentURI;

    }
}

//



/** @var  $currentURI  start*/
//
//

/** @var  $currentURI  end*/

//$processor = new Processor();
//
//$router = $processor->make($routes);
////return $processor->process($router, $currentURI);
//return $processor->run($router, $currentURI);
