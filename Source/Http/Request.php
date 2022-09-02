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

    /**
     * Cabeçalho da requisição
     *
     * @var array
     */
    private $headers = [];

    public function __construct()
    {
        $this->headers = getallheaders();
        $this->httpMethod = $_SERVER['REQUEST_METHOD'];        
        $this->URI = $_SERVER["REQUEST_URI"];
    }

    /**
     * Método responsável por retornar a URI da requisição
     *
     * @return string
     */
    public function getURI()
    {
        return $this->URI;
    }

    /**
     * Método responsável por retornar o método da requisição
     *
     * @return string
     */
    public function getHttpMethod()
    {
        return $this->httpMethod;
    }

    /**
     * Método responsável por retornar o cabeçalho da requisição
     *
     * @return array
     */
    public function getHeaders()
    {
        return $this->headers;
    }
}