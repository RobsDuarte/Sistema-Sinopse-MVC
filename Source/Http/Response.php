<?php

namespace Source\Http;

class Response
{

    /**
     * Codigo do STATUS da HTTP da response( 200 é OK, The request has benn succeeded)
     *
     * @var integer
     */
    private $httpCode = 200;

    /**
     * Cabeçalho do response
     *
     * @var array
     */
    private $headers = [];

    /**
     * Tipo do contéudo que está sendo retornado pelo Response
     *
     * @var string
     */
    private $contentType = 'text/html';

    /**
     * Contéudo que será retornado pelo response
     *
     * @var string
     */
    private $content;

    /**
     * Construtor da classe Response
     *
     * @param integer $httpCode
     * @param string $content
     * @param string $contentType
     */
    public function __construct($httpCode,$content,$contentType = "text/html")
    {
        $this->httpCode = $httpCode;
        $this->content = $content;
        $this->contentType = $contentType;       
    }

    /**
     * Método responsável por enviar o header para o navegador
     *
     * @return void
     */
    public function sendHeader()
    {
        http_response_code($this->httpCode);
        foreach($this->headers as $key=>$value)
        {
            header($key.':'.$value);
        }
    }

    public function sendResponse()
    {
        $this->sendHeader();
        return $this->content;
    }
}