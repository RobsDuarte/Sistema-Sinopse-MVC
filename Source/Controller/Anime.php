<?php

namespace Source\Controller;

use Source\Utils\View;

class Anime
{
    public static function getAnime()
    {
        $anime = View::getViewContent('anime');
        return View::render('template',[
            'page_content' => $anime
        ]);
    }
}