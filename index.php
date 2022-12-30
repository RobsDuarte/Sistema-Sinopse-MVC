<?php

require __DIR__."/vendor/autoload.php";

use Source\Http\Router;
use Source\Utils\View;

define("URL","http://localhost/projetos/Sistema-Sinopse-MVC");

View::init([
    'URL' => URL
]);

$MyRouter = new Router(URL);

include __DIR__."/Routes/RouteCollection.php";

echo $MyRouter->run();