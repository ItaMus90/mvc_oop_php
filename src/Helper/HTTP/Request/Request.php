<?php

namespace App\Helper\HTTP\Request;

class Request{

    /**
     * @var string
     */
    private $path = '';

    /**
     * @var string
     */
    private $method = '';


    public function __construct(string $queryString = '', string $method = ''){

        if (false === empty($queryString)){
            $this->setPath($queryString);
        }

        if (false === empty($method)){
            $this->setMethod($method);
        }

    }

    /**
     * @return string
     */
    public function getPath(): string{
        return $this->path;
    }

    /**
     * @return string
     */
    public function getMethod(): string{
        return $this->method;
    }

    /**
     * @param string $queryString
     * @return Request
     */
    public function setPath(string $queryString): Request{

        $path = parse_url($queryString, PHP_URL_PATH);

        if(false === empty($path)){
            $this->path = $path;
        }


        return $this;

    }


    /**
     * @param string $method
     * @return Request
     */
    public function setMethod(string $method): Request{

        $this->method = strtoupper($method);
        return $this;

    }


}