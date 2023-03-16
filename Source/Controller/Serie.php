<?php

namespace Source\Controller;

use Source\Utils\View;

Class Serie
{
    public static function getSerie()
    {
        $serie = View::getViewContent("serie");
        return View::render('template',[
        "page_content" =>  $serie
    ]);
    }
}