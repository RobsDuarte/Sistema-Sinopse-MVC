<?php

namespace Source\Controller;

use Source\Utils\View;

class Manga
{
    public static function getManga()
    {
        $manga = View::getViewContent('manga');
        return View::render('template',[
            'page_content' => $manga
        ]);
    }
}