<?php

class Router
{
    private static array $params = [];

    public static function route()
    {

        $controller =  self::getResponserController();
        echo "<pre>";
        echo "</pre>";

        return (new $controller)(...self::$params);
    }

    private static function getRequestUrl()
    {
        $pos = strpos($_SERVER['REQUEST_URI'], '/');
        return substr_replace($_SERVER['REQUEST_URI'], '', $pos, 1);
    }

    private static function getAppUrls()
    {
        return require_once __DIR__ . '/../urls/urls.php';
    }

    private static function getResponserController()
    {
        $url = self::getRequestUrl();
        $urls = self::getAppUrls();

        $match = self::findMatchUrl($url, $urls);

        $rawContoller = $urls[$match];

        return self::parseController($rawContoller);
    }

    private static function findMatchUrl(string $needle, array $haystack): string
    {
        foreach ($haystack as $url => $controller) {
            $sybleParts = explode('/', $url);
            $needleParts = explode('/', $needle);

            if (count($sybleParts) !== count($needleParts)) {
                continue;
            }
            $found = true;
            for ($index = 0; $index < count($sybleParts); $index++) {

                preg_match("/^\{.*\}$/", $sybleParts[$index], $matches);

                if (preg_match("/^\{.*\}$/", $sybleParts[$index], $matches)) {
                    self::$params[] = $needleParts[$index];
                    continue;
                }

                if ($sybleParts[$index] !== $needleParts[$index]) {
                    self::$params = [];
                    $found = false;
                    break;
                }
            }
            if ($found) {
                return $url;
            }
        }
        throw new Exception("Route $needle Not Found");
    }

    private static function parseController(string $rawContoller)
    {
        preg_match("/.*\/(controllers\/.*)/", $rawContoller, $matches);

        if (count($matches) != 2) {
            throw new Exception('invalid route');
        }
        try {
            require_once __DIR__ . "/../{$matches[1]}";
            preg_match("/^.*\/(.*)\.php/", $matches[1], $matches);
            return $matches[1];
        } catch (Exception $e) {
            throw new Exception('Controller Not Fount.');
        }
    }
}

// /var/www/html/controllers/UserController.php
// /home/amir/projects/library/src/controllers/UserController.php