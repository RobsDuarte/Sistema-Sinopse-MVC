<?php

namespace Source\Http;

class Request 
{
    /**
     * Método da requisição (GET,POST,...)
     *
     * @var string
     */
    private $httpMethod;

    /**
     * URI da requesição Ex:http://www.test.com
     *
     * @var [type]
     */
    private $URI;

    public function getURI()
    {
        return $this->URI;
    }

    public function getHttpMethod()
    {
        $this->httpMethod;
    }
}