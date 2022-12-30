<?php

namespace Source\Http;

use \Closure;
use \Exception;

class Router
{
    /**
     * URL da página
     *
     * @var string
     */
    private $URL;

    /**
     * prefixo  de todas as páginas  -> / <-. Ex: www.test.com/
     *
     * @var string
     */
    private $prefix;

    /**
     * Instância da classe Request. Requisição de url feita para o roteador
     *
     * @var Request
     */
    private $request;

    /**
     * Instancia da classe Response. Resposta do roteador para a url requisitada
     *
     * @var Response
     */
    private $response;

    /**
     * Coleção das rotas aceitas pelo roteador
     *
     * @var array
     */
    private $routes = [];


    /**
     * Construtor da classe router
     *
     * @param string $url
     */
    public function __construct($url)
    {
        $this->request = new Request();         
        $this->URL = $url; 
        $this->setPrefix();
    }

    /**
     * Método responsável por definir o prefixo de todas as rotas
     *
     * @return void
     */
    public function setPrefix()
    {
        $this->prefix =  parse_url($this->URL, PHP_URL_PATH);              
    }

    /**
     * Método responsável por adicionar uma rota de get no roteador
     *
     * @param string $route
     * @param function $callback
     * @return void
     */
    public function get($route,$callback)
    {
        $this->addRoute('GET',$route,$callback);
    }

    /**
     * Método responsável por adicionar uma rota a lista de rotas do roteador
     *
     * @param string $method
     * @param string $route
     * @param array $params
     * @return void
     */
    public function addRoute($method,$route,$params)
    {
        foreach($params as $key=>$callback)
        {
            if($callback instanceof Closure)
            {
                $params['controller'] = $callback;
                unset($params[$key]);                
            }
        }
        $this->addPatternRoute($route,$method,$params);
    }

    /**
     * Método responsável por adicionar o padrão de rotas
     *
     * @param string $route
     * @param string $method
     * @param array $params
     * @return void
     */

    public function addPatternRoute($route,$method,$params)
    {
        $patternRoute = '/^'.str_replace('/','\/',$route).'$/';
        $this->routes[$patternRoute][$method] = $params;       
    }

    /**
     * Método responsável por recortar o prefixo único de todas as rotas. Ex: www.teste.com/home , irá retornar home
     *
     * @return string
     */
    public function getRoutePrefix()
    {
        $URI = $this->request->getURI();
        $URI_prefix = explode($this->prefix,$URI); 
        //var_dump($URI_prefix);                           
        return end($URI_prefix);
    }

    /**
     * Método responsável por retornar a rota pedida pela request
     *
     * @return array
     */
    public function getRoute()
    {
        $prefix = $this->getRoutePrefix();
        $http_method = $this->request->getHttpMethod();
      
        foreach($this->routes as $patternRoute=>$method)
        {             
            if(preg_match($patternRoute,$prefix))    
            {                       
                if(isset($method[$http_method]))
                {                    
                    return $method[$http_method];
                }
                throw new Exception("Método não permitido",405);
            }          
        }
        throw new Exception("URL não encontrada",404);
    }

    /**
     * Método responsável por responder a request dando um response
     *
     * @return void
     */
    public function run()
    {
        try
        {            
            $route = $this->getRoute();
            
            if(!isset($route['controller']))
            {
                throw new Exception("URL não pode ser processada");
            }
            $this->response = new Response(200,call_user_func($route['controller']));  
            return $this->response->sendResponse();           
        }
        catch(Exception $e)
        {
            $this->response = new Response($e->getCode(),$e->getMessage());    
            return $this->response->sendResponse();         
        }
    }
}