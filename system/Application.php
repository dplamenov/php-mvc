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
		spl_autoload_register(array("\Application\Application", "load"));

		$this->run();

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

		self::$routelist = \Application\Route::$route;
		self::$frontcontroller = \Application\FrontControllers::getInstance(self::$routelist);


	}

	public function load($class)
	{
		$class = str_replace("Application\\", "", $class);
		include_once $class . '.php';
	}

}