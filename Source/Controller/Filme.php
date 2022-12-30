<?php

namespace Source\Controller;

use Source\Utils\View;

Class Filme
{
    public static function getFilme()
    {
        return View::render('filme');
    }
}