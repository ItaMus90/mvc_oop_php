<?php

namespace Helper\Route;

use Exception;

class Route{

    /**
     * @var string
     */
    private $pattern = '';
    /**
     * @var string
     */
    private $controller = '';
    /**
     * @var string
     */
    private $method = '';

    /**
     * Route constructor.
     * @param array $options
     *
     * @throws Exception
     */
    public function __construct(array $options){
        $this->handle($options);
    }

    /**
     * @param array $options
     * @throws Exception
     */
    public function handle(array $options){


        if (!isset($options['pattern'])){
            throw new Exception('Pattern is required');
        }

        if (!isset($options['controller'])){
            throw new Exception('Controller is required');
        }

        if (!isset($options['method'])){
            throw new Exception('Method is required');
        }

        $this->pattern = $options['pattern'];
        $this->controller = $options['controller'];
        $this->method = $options['method'];

    }

    /**
     * @param string $pattern
     * @return Route
     */
    public function setPattern(string $pattern): Route{

        $this->pattern = $pattern;
        return $this;

    }

    /**
     * @return string
     */
    public function getPattern(): string{
        return $this->pattern;
    }

    /**
     * @return string
     */
    public function getController(): string{
        return $this->controller;
    }

    /**
     * @param string $controller
     * @return Route
     */
    public function setController(string $controller): Route{
        $this->controller = $controller;
    }

    /**
     * @return string
     */
    public function getMethod(): string{
        return $this->method;
    }

    /**
     * @param string $method
     * @return Route
     */
    public function setMethod(string $method): Route{
        $this->method = $method;
    }

}