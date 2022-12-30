<?php
use Source\Controller\Home;
use Source\Controller\Filme;

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

