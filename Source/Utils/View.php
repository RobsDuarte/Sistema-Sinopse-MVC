<?php

namespace Source\Utils;

class View
{
    private static $variables = [];

    /**
     * Método responsável por definir as variaveis que serão substituidas nas páginas
     *
     * @param array $vars
     * @return void
     */
    public static function init($vars = [])
    {
        self::$variables = $vars;
    }

    /**
     * Método responsável por retornar a view pedida
     *
     * @param string $view
     * @return string
     */
    private static function getViewContent($view)
    {
        $file = __DIR__.'/../../View/'.$view.".html";        
        return file_exists($file) ?  file_get_contents($file) : 'Página não existe' ;
    }

    /**
     * Método responsável por ler o contéudo do diretorio e transforma-lo em string para o navegador interpretar
     *
     * @param string $view
     * @return string
     */
    public static function render($view, $vars = [])
    {
        $vars = array_merge(self::$variables,$vars);
        $keys = array_keys($vars);        
        $keys = array_map(function($element){ return '{{'.$element.'}}';},$keys);
        $content = self::getViewContent($view);        
        return  str_replace($keys,array_values($vars),$content);       
    }
}