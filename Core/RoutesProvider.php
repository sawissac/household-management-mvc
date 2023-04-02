<?php

namespace Core;

class RoutesProvider
{
    public static function is($route, $callback, &$routes)
    {
        array_push($routes, $route);

        $uri = self::url();

        if ($uri === $route) {
            $callback();
        }
    }

    public static function end($callback, $routes)
    {
        $uri = self::url();

        if (!in_array($uri, $routes)) {
            $callback();
        }
    }

    public static function url()
    {
        return parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    }

    public static function server($callback)
    {
        $callback($_SERVER['REQUEST_METHOD'],(object) $_REQUEST);
    }
}
