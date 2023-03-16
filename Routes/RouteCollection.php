<?php
use Source\Controller\Home;
use Source\Controller\Filme;
use Source\Controller\Serie;

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

