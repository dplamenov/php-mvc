<?php

namespace Application;


class FrontControllers extends Request
{
    public static $route;
    public static $routes;

    private function __construct()
    {
    }

    private static function methodDidnotExists()
    {
        throw new \Exception("<h1 style=\"color: red\">Error: Method didnt exists</h1>");
    }

    public static function getInstance($routelist)
    {
        $uri = $_SERVER['REQUEST_URI'];
        $route = str_replace("index.php", "", $_SERVER['SCRIPT_NAME']);
        $route = str_replace($route, "", $uri);
        self::$route = $route;

        $i = 0;

        if (count($routelist) == 0) {
            echo '<h1 style="color: red">Error: Route error</h1>';
        }
        self::$routes = $routelist;

        foreach (self::$routes as $route => $controller) {
            self::$routes[$route] = $controller;
            $route_new = ltrim($route, '/');

            if (self::$route == $route_new) {
                if ($controller instanceof \Closure) {
                    echo $controller();
                    $i++;
                } else {
                    try {
                        $method = explode("@", $controller)[1];
                        $controller = explode("@", $controller)[0];
                        include_once '../controllers/' . $controller . '.php';
                        $object = new $controller;
                        if (method_exists($object, $method)) {
                            echo $object->$method(new Request());
                        } else {
                            self::methodDidnotExists();
                        }
                        $i++;
                    } catch (\Exception $e) {
                        echo $e->getMessage();
                    }
                }

            } elseif (substr($route_new, 0, strlen('{')) == '{') {
                $route_new = str_replace('{', '', $route_new);
                $route_new = str_replace('}', '', $route_new);
                $requestUri = $_SERVER['REQUEST_URI'];
                $request = str_replace('/index.php', '', $_SERVER['PHP_SELF']);
                $param = ltrim($requestUri, '/');
                if ($controller instanceof \Closure) {
                    echo $controller();
                    $i++;
                } elseif (substr_count($route, '/') == substr_count($request, '/')) {

                    $_GET[$route_new] = self::$route;
                    unset($_GET['url']);
                    $method = explode("@", $controller)[1];
                    $controller = explode("@", $controller)[0];
                    include_once '../controllers/' . $controller . '.php';
                    $object = new $controller;
                    if (method_exists($object, $method)) {
                        echo $object->$method(new Request(), $param);
                    } else {
                        self::methodDidnotExists();
                    }
                    $i++;
                }
            }
            if ($i != 0) {
                break;
            }
        }
        if (self::$route == "") {
            self::$route = "/";
        }
        if ($i == 0) {
            $uri = $_SERVER['REQUEST_URI'];
            echo '<h1 style="color: red">Error: Route "' . $uri . '" is not declared in route file. Method: ' . $_SERVER['REQUEST_METHOD'] . '</h1>';
        }
            return 0;
    }
}