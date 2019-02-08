<?php

namespace Application;
class Route
{
    private static $route_get = array();
    private static $route_post = array();


    public static function get($route, $controller)
    {
        if ($controller) {
            self::$route_get[$route] = $controller;
        }


    }

    public static function getGetRoute()
    {
        return self::$route_get;
    }

    public static function post($route, $controller)
    {
        if ($controller) {
            self::$route_get[$route] = $controller;
        }

    }

    public static function getPostRoute()
    {
        return self::$route_post;
    }
}

include_once '../config/web/route.php';

