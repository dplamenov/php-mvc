<?php


namespace Application;


class FrontControllers
{
	public static $route;
	public static $routes;

	private function __construct()
	{
	}

	public static function getInstance($routelist)
	{
		$uri = $_SERVER['REQUEST_URI'];
		$route = str_replace("index.php", "", $_SERVER['SCRIPT_NAME']);
		$route = str_replace($route, "", $uri);
		self::$route = $route;

		$i = 0;
		self::$routes = $routelist;
		foreach (self::$routes as $route => $controller) {
			self::$routes[$route] = $controller;
			$route_new = str_replace("/", "", $route);


			if (self::$route == $route_new) {
				try {

					$method = explode("@", $controller)[1];
					$controller = explode("@", $controller)[0];
					include_once '../controllers/' . $controller . '.php';
					$object = new $controller;
					if (method_exists($object, $method)) {
						echo $object->$method();
					} else {
						throw new \Exception("<h1 style=\"color: red\">Error: Method didnt exists</h1>");
					}

					$i++;
				} catch (\Exception $e) {
					echo $e->getMessage();
				}
			}

		}
		if (self::$route == "") {
			self::$route = "/";
		}
		if ($i == 0) {
			echo '<h1 style="color: red">Error: Route "' . $uri . '" is not declared in route file</h1>';
		}


		return 0;


	}
}