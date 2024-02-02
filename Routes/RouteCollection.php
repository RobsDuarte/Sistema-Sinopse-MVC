<?php

use Source\Controller\Home;

$MyRouter->get('/',[
    function()
    {  
        return  Home::getHome();
    }
]);