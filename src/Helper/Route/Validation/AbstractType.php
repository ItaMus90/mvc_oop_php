<?php

namespace App\Helper\Route\Validation;

use App\Helper\Route\Route;

abstract class AbstractType {

    /**
     * @var Route
     */
    protected $route;

    /**
     * @param Route $route
     */
    public function setRoute(Route $route){
       $this->route = $route;
    }

}