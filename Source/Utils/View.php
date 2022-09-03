<?php

namespace Source\Utils;

class View
{
    private static function getViewContent($view)
    {
        $file = __DIR__.'/../../View/'.$view.".html";        
        return file_exists($file) ?  $file : 'Página não existe' ;
    }

    public static function render($view)
    {
        $content = self::getViewContent($view);
        return file_get_contents($content);
    }
}