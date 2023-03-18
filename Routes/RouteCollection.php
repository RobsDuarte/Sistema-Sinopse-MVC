<?php
use Source\Controller\Home;
use Source\Controller\Filme;
use Source\Controller\Serie;
use Source\Controller\Anime;
use Source\Controller\Manga;

$MyRouter->get('/',[
    function()
    {  
        return  Home::getHome();
    }
]);

$MyRouter->get('/filmes',[
    function()
    {  
        return  Filme::getFilme();
    }
]);

$MyRouter->get('/series',[
    function()
    {  
        return  Serie::getSerie();
    }
]);

$MyRouter->get('/animes',[
    function()
    {  
        return  Anime::getAnime();
    }
]);


$MyRouter->get('/mangas',[
    function()
    {  
        return  Manga::getManga();
    }
]);