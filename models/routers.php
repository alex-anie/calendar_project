<?php

$url = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);

$routes = [];

// import the routes array and assign the page to the path
function router(string $path, string $page){
    global $routes;
    
    $routes[$path] = $page;
}


function resolve(){
    global $routes, $url;

    if(array_key_exists($url, $routes)){
        require_once '../' . $routes[$url];
    }else {
        require_once '../includes/404.php';
    }
}