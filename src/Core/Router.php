<?php

namespace App\Core;

use App\Controller\HomeController;

class Router
{
    public function run()
    {
        $path = isset($_SERVER["PATH_INFO"]) ? $_SERVER["PATH_INFO"] : "/";
        $pathExplode = explode("/", $path);
        $controller = $pathExplode[1] ? ucwords($pathExplode[1]) : "Home";
        $controller = "App\Controller\\".$controller."Controller";
        $method = $pathExplode[2] ?? "index";

        $controller = new $controller;
        $controller->$method();
    }
}
