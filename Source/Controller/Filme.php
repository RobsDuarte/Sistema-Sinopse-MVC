<?php

namespace Source\Controller;

use Source\Utils\View;

Class Filme
{
    public static function getFilme()
    {
        $film = View::getViewContent("filme");
        return View::render('template',[
        "page_content" =>  $film
    ]);
    }
}