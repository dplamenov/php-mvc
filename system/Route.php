<?php

namespace Application;
class Route
{
	public static $route_get = array();


	public function __construct()
	{


	}

	public static function get($route, $controller)
	{
		self::$route_get[$route] = $controller;

	}

	public static function getRoute()
	{
		return self::$route_get;
	}
}

include_once '../config/web/route.php';

