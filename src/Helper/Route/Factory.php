<?php

namespace App\Helper\Route;

class Factory{

    /**
     * @param array $options
     * @return Route
     */
    public function make(array $options):Route {

        $route = new Route();
        $route->setAction($options['action'])
            ->setController($options['controller'])
            ->setMethods($options['method'])
            ->setPattern($options['pattern']);

        return $route;

    }

}