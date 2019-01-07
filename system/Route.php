<?php

namespace Application;
class Route
{
	public static $route = array();


	public function __construct()
	{


	}

	public static function get($route, $controller)
	{
		self::$route[$route] = $controller;

	}

	public static function getRoute()
	{
		return self::$route;
	}
}

include_once '../config/web/route.php';

