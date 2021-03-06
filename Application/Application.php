<?php

namespace Application;

class Application
{
    private static $instance = null;
    private static $frontcontroller = null;
    private static $routelist = null;
    private static $route;

    private function __construct()
    {
        session_start();
        spl_autoload_register(array("\Application\Application", "load"));
        include '../controllers/Controller.php';
        $this->run();
        include_once "../config/config.php";
        date_default_timezone_set(timezone);
        include_once '../config/web/route.php';
    }

    //getInstance method

    public static function getApp()
    {
        if (self::$instance == null) {
            self::$instance = new self;
        }
        return self::$instance;
    }

    private function run()
    {
        self::$route = \Application\FrontControllers::$route;
        $route = new Route();
        if (strtolower($_SERVER['REQUEST_METHOD']) == 'get') {
            self::$routelist = $route->getGetRoute();
            self::$frontcontroller = \Application\FrontControllers::getInstance(self::$routelist);
        } elseif (strtolower($_SERVER['REQUEST_METHOD']) == 'post') {
            self::$routelist = $route->getPostRoute();
            self::$frontcontroller = \Application\FrontControllers::getInstance(self::$routelist);
        } else {
            echo 'Method dint exist';
        }
    }

    public function load($class)
    {
        $dir = str_replace('\Application', '', __DIR__);

        include_once $dir . '\\' . $class . '.php';
    }
}