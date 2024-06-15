<?php

class Router
{
    public static function route()
    {
 
        // require_once __DIR__ . '/../controllers/UserController.php';
        $controller =  self::getResponserController();

        return (new $controller)();
    }

    private static function getRequestUrl()
    {
        return str_replace('/', '', $_SERVER['REQUEST_URI']);
    }

    private static function getAppUrls()
    {
        return require_once __DIR__ . '/../urls/urls.php';
    } 

    private static function getResponserController()
    {
        $url = self::getRequestUrl();
        $urls = self::getAppUrls();

        return self::parseController($urls[$url]);
    }

    private static function parseController(string $rawContoller)
    {
        preg_match("/.*\/(controllers\/.*)/", $rawContoller, $matches);

        if(count($matches) != 2){
            throw new Exception('invalid route');
        }
        try{
            require_once __DIR__ . "/../{$matches[1]}";
            preg_match("/^.*\/(.*)\.php/", $matches[1], $matches);
            return $matches[1];

        }catch(Exception $e){
            throw new Exception('Controller Not Fount.');
        }
    }
}

// /var/www/html/controllers/UserController.php
// /home/amir/projects/library/src/controllers/UserController.php